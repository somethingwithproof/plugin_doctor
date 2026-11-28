<?php
/*
 * SPDX-FileCopyrightText: 2026 Thomas Vincent <thomasvincent@gmail.com>
 * SPDX-License-Identifier: GPL-2.0-or-later
 *
 * This file is part of plugin_doctor, a plugin for Cacti.
 * https://github.com/somethingwithproof/plugin_doctor
 *
 * This program is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for
 * more details.
 */

/**
 * Plugin-owned records; application data is never repaired through raw SQL.
 *
 * @return bool
 */
function doctor_setup_workflows() {
	$audit = db_execute("CREATE TABLE IF NOT EXISTS plugin_doctor_audit (
		id bigint unsigned NOT NULL AUTO_INCREMENT, created bigint NOT NULL, actor varchar(64) NOT NULL,
		action varchar(64) NOT NULL, payload mediumtext NOT NULL, PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
	$accept = db_execute("CREATE TABLE IF NOT EXISTS plugin_doctor_acceptance (
		check_id varchar(128) NOT NULL, owner varchar(128) NOT NULL, reason varchar(512) NOT NULL,
		actor bigint unsigned NOT NULL, created bigint NOT NULL, expires bigint NOT NULL,
		PRIMARY KEY (check_id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
	return $audit && $accept;
}

/**
 * Return the normalized actor identifier for audit records.
 *
 * @return string
 */
function doctor_actor() {
	return PHP_SAPI === 'cli' && !defined('DOCTOR_WEB_REQUEST')
		? 'cli:' . (function_exists('posix_geteuid') ? posix_geteuid() : 'unknown')
		: 'user:' . (int) $_SESSION['sess_user_id'];
}

/**
 * Write before mutations; a failed audit must not silently permit an operation.
 *
 * @param string $action
 * @param mixed $payload
 * @return int|false
 */
function doctor_audit($action, $payload) {
	$json = json_encode($payload);
	if ($json === false || strlen($json) > 16000) {
		return false;
	}
	$json = doctor_redact($json);
	if ($json === DOCTOR_REDACTION_FAILED || !db_execute_prepared('INSERT INTO plugin_doctor_audit (created, actor, action, payload) VALUES (?, ?, ?, ?)', [time(), doctor_actor(), $action, $json], false)) {
		return false;
	}
	$id = (int) db_fetch_insert_id();
	// Keep a bounded history without replacing concurrent writers' records.
	if ($id > 200) {
		db_execute_prepared('DELETE FROM plugin_doctor_audit WHERE id <= ?', [$id - 200], false);
	}
	cacti_log('Doctor audit ' . $id . ' ' . $action . ' by ' . doctor_actor(), false, 'DOCTOR');
	return $id;
}

/**
 * Capture a fingerprinted pre-repair snapshot of Cacti runtime directories.
 *
 * @param string|null $base
 * @param array<string,string>|null $directories
 * @param bool|null $privileged
 * @return array<string,mixed>
 */
function doctor_repair_snapshot($base = null, $directories = null, $privileged = null) {
	$base = realpath($base === null ? doctor_base_path() : $base);
	$directories = $directories === null ? doctor_repair_directories() : $directories;
	$privileged = $privileged === null ? doctor_running_as_root() : $privileged;
	$rows = [];
	$allowed = !$privileged && $base !== false;
	foreach ($directories as $name => $path) {
		clearstatcache(true, $path);
		$stat = file_exists($path) || is_link($path) ? @lstat($path) : false;
		$parent = realpath(dirname($path));
		$inside = $base !== false && $parent !== false && ($parent === $base || strpos($parent . '/', rtrim($base, '/') . '/') === 0);
		$mode = $stat === false ? null : ($stat['mode'] & 0777);
		$writable = is_dir($path) && is_writable($path);
		$parentWritable = $parent !== false && is_writable($parent);
		$canChmod = $stat === false || !function_exists('posix_geteuid') || $stat['uid'] === posix_geteuid();
		$action = 'keep';
		if (!$writable) {
			if (!$inside || is_link($path) || ($stat !== false && !is_dir($path)) || $privileged || ($stat === false && !$parentWritable) || !$canChmod) {
				$action = 'refuse';
				$allowed = false;
			} else { $action = $stat === false ? 'create' : 'chmod'; }
		}
		$rows[] = ['name' => $name, 'path' => $path, 'action' => $action, 'mode' => $mode,
			'target_mode' => $action === 'create' ? (0775 & ~umask()) : ($action === 'chmod' ? ($mode | 0700) : $mode),
			'device' => $stat === false ? null : $stat['dev'], 'inode' => $stat === false ? null : $stat['ino'],
			'owner' => $stat === false ? null : $stat['uid'], 'parent' => $parent, 'parent_writable' => $parentWritable, 'writable' => $writable];
	}
	$snapshot = ['repair' => 'runtime_directories', 'base' => $base, 'allowed' => $allowed, 'objects' => $rows];
	$snapshot['fingerprint'] = hash('sha256', json_encode($snapshot));
	return $snapshot;
}

/**
 * Approval binds a specific plan to an actor, expires, and is consumed by the caller.
 *
 * @param array<string,mixed> $plan
 * @param int|null $now
 * @return array<string,mixed>
 */
function doctor_execute_repair_plan($plan, $now = null) {
	$now = $now === null ? time() : $now;
	$current = doctor_repair_snapshot();
	if (!isset($plan['fingerprint'], $plan['created'], $plan['actor']) || $plan['actor'] !== doctor_actor()
		|| $plan['created'] > $now || $now - $plan['created'] > 300 || !$current['allowed'] || $plan['fingerprint'] !== $current['fingerprint']) {
		return doctor_repair_result('repair.runtime_directories', 'fail', __('Repair refused', 'doctor'), [doctor_repair_message('The approved plan is expired or the filesystem changed. Preview the repair again.')]);
	}
	$started = doctor_audit('repair.started', ['approved' => $now, 'previewed' => $plan['created'], 'before' => $current]);
	if (!$started) {
		return doctor_repair_result('repair.runtime_directories', 'fail', __('Repair refused', 'doctor'), [doctor_repair_message('The audit record could not be saved. No repair was attempted.')]);
	}
	$result = doctor_run_repair('runtime_directories');
	$after = doctor_repair_snapshot();
	$verified = true;
	foreach ($after['objects'] as $object) {
		if (!$object['writable']) {
			$verified = false;
		}
	}
	if (!$verified) {
		$result['status'] = 'fail';
	}
	$result['verified'] = $verified;
	$result['audit_id'] = $started;
	$completed = doctor_audit('repair.completed', ['started' => $started, 'status' => $result['status'], 'verified' => $verified, 'after' => $after]);
	if (!$completed) {
		$result['status'] = 'fail';
		$result['detail'] .= ' ' . __('The completion audit failed; inspect the filesystem and the started audit record.', 'doctor');
		cacti_log('Doctor repair completion audit failed for start record ' . $started, false, 'DOCTOR');
	}
	return $result;
}

/**
 * Return up to 101 stored warning-acceptance records ordered by check ID.
 *
 * @return array<int,array<string,mixed>>
 */
function doctor_acceptances() {
	if (!function_exists('db_table_exists') || !db_table_exists('plugin_doctor_acceptance')) {
		return [];
	}
	$rows = db_fetch_assoc('SELECT check_id, owner, reason, actor, created, expires FROM plugin_doctor_acceptance ORDER BY check_id LIMIT 101', false);
	return is_array($rows) ? $rows : [];
}

/**
 * Keep observed status unchanged. Policy is reapplied when a cached report is read.
 *
 * @param array<int,array<string,mixed>> $results
 * @param int|null $now
 * @param array<int,array<string,mixed>>|null $policies
 * @return array<int,array<string,mixed>>
 */
function doctor_apply_acceptances($results, $now = null, $policies = null) {
	$now = $now === null ? time() : $now;
	$policies = $policies === null ? doctor_acceptances() : $policies;
	$byId = [];
	foreach ($policies as $policy) {
		if (isset($policy['check_id'], $policy['owner'], $policy['reason'], $policy['expires'], $policy['created'])
			&& $policy['created'] <= $now && $policy['expires'] > $now && $policy['expires'] - $policy['created'] <= 90 * 86400
			&& trim($policy['owner']) !== '' && trim($policy['reason']) !== '') {
			$policy['owner'] = doctor_redact($policy['owner']);
			$policy['reason'] = doctor_redact($policy['reason']);
			$byId[$policy['check_id']] = $policy;
		}
	}
	foreach ($results as &$result) {
		unset($result['acceptance']);
		$result['accepted'] = false;
		if ($result['status'] === 'warn' && (!isset($result['assessment']) || $result['assessment'] === 'assessed') && isset($byId[$result['id']])) {
			$result['accepted'] = true;
			$result['acceptance'] = $byId[$result['id']];
		}
	}
	unset($result);
	return $results;
}

/**
 * Return whether a check result carries an active, unexpired warning acceptance.
 *
 * @param array<string,mixed> $result
 * @return bool
 */
function doctor_warning_accepted($result) {
	return $result['status'] === 'warn' && !empty($result['accepted']) && isset($result['acceptance']['expires']) && $result['acceptance']['expires'] > time();
}

/**
 * Only fresh, observed warnings may be accepted; unknown checks and failures are refused.
 *
 * @param array<int,array<string,mixed>> $results
 * @param string $id
 * @param string $owner
 * @param string $reason
 * @param int $expires
 * @param bool $remove
 * @return bool
 */
function doctor_change_acceptance($results, $id, $owner, $reason, $expires, $remove = false) {
	$now = time();
	if (!doctor_can_configure() || !preg_match('/\A[a-z0-9_.]{1,128}\z/', $id)) {
		return false;
	}
	$owner = doctor_redact($owner);
	$reason = doctor_redact($reason);
	// A withheld field would be stored and audited in place of the real text.
	if ($owner === DOCTOR_REDACTION_FAILED || $reason === DOCTOR_REDACTION_FAILED) {
		return false;
	}
	$owner = trim($owner);
	$reason = trim($reason);
	if (!$remove) {
		$found = false;
		foreach ($results as $r) {
			if ($r['id'] === $id && $r['status'] === 'warn' && $r['assessment'] === 'assessed') {
				$found = true;
			}
		}
		if (!$found || $owner === '' || strlen($owner) > 128 || $reason === '' || strlen($reason) > 512
			|| !ctype_digit((string) $expires) || $expires <= $now || $expires > $now + 90 * 86400) { return false; }
		if (count(doctor_acceptances()) >= 100) {
			return false;
		}
	}
	if (!db_execute('START TRANSACTION')) {
		return false;
	}
	$payload = ['check_id' => $id, 'owner' => $owner, 'reason' => $reason, 'expires' => (int) $expires];
	$ok = $remove ? db_execute_prepared('DELETE FROM plugin_doctor_acceptance WHERE check_id = ?', [$id], false)
		: db_execute_prepared('REPLACE INTO plugin_doctor_acceptance (check_id, owner, reason, actor, created, expires) VALUES (?, ?, ?, ?, ?, ?)', [$id, $owner, $reason, (int) $_SESSION['sess_user_id'], $now, (int) $expires], false);
	if (!$ok || !doctor_audit($remove ? 'warning.removed' : 'warning.accepted', $payload)) {
		db_execute('ROLLBACK');
		return false;
	}
	if (!db_execute('COMMIT')) {
		db_execute('ROLLBACK');
		return false;
	}
	return true;
}
