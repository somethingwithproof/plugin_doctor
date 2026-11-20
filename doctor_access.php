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

/** Higher levels include lower capabilities; Cacti resolves user and group grants. */
function doctor_access_level() {
	if (empty($_SESSION['sess_user_id']) || !function_exists('is_realm_allowed')) {
		return 0;
	}
	foreach ([3 => 'doctor.php', 2 => 'doctor_operator.php', 1 => 'doctor_view.php'] as $level => $file) {
		$id = db_fetch_cell_prepared('SELECT id FROM plugin_realms WHERE plugin = ? AND file = ?', ['doctor', $file]);
		if ($id && is_realm_allowed((int) $id + 100)) {
			return $level;
		}
	}
	return 0;
}

function doctor_can_configure() {
	return doctor_access_level() === 3 && is_realm_allowed(15);
}

/** Every state-changing request passes this guard before work or output. */
function doctor_action_status($action, $method, $csrf) {
	$level = doctor_access_level();
	if (!in_array($action, ['run', 'acknowledge', 'repair', 'accept', 'unaccept'], true)) {
		return 400;
	}
	if ($method !== 'POST') {
		return 405;
	}
	if (!$csrf || $level < 2 || (in_array($action, ['repair', 'accept', 'unaccept'], true) && !doctor_can_configure())) {
		return 403;
	}
	return 200;
}

/** Device counts and descriptions must use the current user's Cacti ACLs. */
function doctor_visible_devices() {
	if (!function_exists('get_allowed_devices')) {
		return doctor_result('devices.health', 'Devices', 'warn', __('Device availability', 'doctor'), __('Device permissions could not be evaluated.', 'doctor'), '', 'not_assessed');
	}
	$devices = get_allowed_devices("h.disabled = ''", 'COALESCE(UNIX_TIMESTAMP(status_fail_date), 0) <= 0, status_fail_date, id');
	$counts = ['total' => 0, 'down' => 0, 'recovering' => 0];
	$offenders = [];
	foreach ($devices as $device) {
		$counts['total']++;
		$counts['down'] += (int) $device['status'] === 1 ? 1 : 0;
		$counts['recovering'] += (int) $device['status'] === 2 ? 1 : 0;
		if ((int) $device['status'] === 1 && count($offenders) < 3) {
			$device['failed'] = strtotime($device['status_fail_date']);
			$offenders[] = $device;
		}
	}
	return doctor_evaluate_devices($counts, $offenders);
}

/** Remove fields a web report does not need and redact before caching or rendering. */
function doctor_web_results($results) {
	$visible = [];
	foreach ($results as $result) {
		if (!isset($result['id'], $result['category'], $result['status'], $result['summary'], $result['detail'])
			|| !is_string($result['id']) || !preg_match('/\A[a-z0-9_.]+\z/', $result['id'])
			|| !in_array($result['status'], ['pass', 'warn', 'fail'], true)) {
			continue;
		}
		// Replace the installation-wide device check and the CLI-only PHP settings.
		if (in_array($result['id'], ['devices.health', 'filesystem.rrd_files', 'filesystem.rrd_stale', 'php.configuration'], true)) {
			continue;
		}
		if ($result['id'] === 'logging.recent_errors' && !is_realm_allowed(18)) {
			continue;
		}
		$repair = isset($result['repair']) && isset(doctor_available_repairs()[$result['repair']]) ? $result['repair'] : '';
		$visible[] = doctor_result($result['id'], (string) $result['category'], $result['status'], doctor_redact((string) $result['summary']), doctor_redact((string) $result['detail']), $repair,
			isset($result['assessment']) ? $result['assessment'] : 'assessed');
	}
	$visible[] = doctor_visible_devices();
	if (function_exists('get_allowed_devices')) {
		$ids = [];
		foreach (get_allowed_devices() as $device) {
			$ids[] = (int) $device['id'];
		}
		$visible[] = doctor_check_rrd_stale($ids);
	}
	$visible[] = doctor_check_php_configuration();
	foreach ($visible as &$result) {
		$result['detail'] = doctor_redact($result['detail']);
	}
	unset($result);
	return doctor_apply_acceptances($visible);
}

/** Reuse the existing supervised CLI; never accept a command or arguments from a request. */
function doctor_run_web_checks() {
	$php = (string) read_config_option('path_php_binary');
	$refusal = doctor_binary_execution_refusal('path_php_binary', $php, doctor_running_as_root());
	if ($refusal !== '' || !is_file($php) || !is_executable($php)) {
		return ['error' => __('The configured PHP CLI cannot run Doctor checks.', 'doctor')];
	}
	$run = doctor_process([$php, doctor_base_path() . '/plugins/doctor/cli/doctor.php', '--json'], 120);
	$report = json_decode($run['stdout'], true);
	if ($run['error'] !== '' || !in_array($run['code'], [0, 1], true) || !isset($report['checks']) || !is_array($report['checks']) || count($report['checks']) > 128) {
		return ['error' => __('Doctor checks failed or exceeded their time limit. Review the Doctor log.', 'doctor')];
	}
	return ['results' => doctor_web_results($report['checks']), 'time' => time(), 'user' => (int) $_SESSION['sess_user_id']];
}

/** Viewers read compact scheduled state, never raw diagnostic details or global device totals. */
function doctor_viewer_results($now) {
	$completed = (int) read_config_option('doctor_last_completed', true);
	$state = doctor_state_decode(read_config_option('doctor_state', true));
	$fresh = read_config_option('doctor_schedule_enabled', true) === 'on' && $completed > 0 && $now >= $completed && $now - $completed <= doctor_schedule_interval() + 180;
	$results = [];
	foreach ($state as $id => $status) {
		if (in_array($id, ['devices.health', 'filesystem.rrd_files', 'filesystem.rrd_stale'], true) || !preg_match('/\A[a-z0-9_.]+\z/', $id) || !in_array($status, ['pass', 'warn', 'fail'], true)) {
			continue;
		}
		$parts = explode('.', $id);
		$checkCategories = ['php.security_baseline' => 'Security', 'php.extensions' => 'Prerequisites', 'database.health_sample' => 'Database health'];
		$categories = ['cacti' => 'Cacti', 'database' => 'Database', 'devices' => 'Devices', 'doctor' => 'Doctor', 'filesystem' => 'Filesystem', 'logging' => 'Logging', 'php' => 'PHP', 'poller' => 'Poller', 'binary' => 'Prerequisites'];
		$results[] = doctor_result($id, isset($checkCategories[$id]) ? $checkCategories[$id] : (isset($categories[$parts[0]]) ? $categories[$parts[0]] : ucfirst($parts[0])), $fresh ? $status : 'unknown', $id, '', '', $fresh ? 'assessed' : 'not_assessed');
	}
	return ['results' => $results, 'time' => $completed, 'fresh' => $fresh];
}

function doctor_finding_fingerprint($result) {
	return hash('sha256', json_encode([$result['id'], $result['status'], isset($result['evidence']) ? $result['evidence'] : $result['detail']]));
}

/** Acknowledgments are personal, expire when evidence changes, and never alter health or alerts. */
function doctor_acknowledge($results, $id, $fingerprint) {
	foreach ($results as $result) {
		if ($result['id'] === $id && in_array($result['status'], ['warn', 'fail'], true) && doctor_finding_fingerprint($result) === $fingerprint) {
			$user = (int) $_SESSION['sess_user_id'];
			set_config_option('doctor_ack_' . $user . '_' . $id, $fingerprint);
			cacti_log('Doctor finding ' . $id . ' acknowledged by user ' . $user . '; health status unchanged', false, 'DOCTOR');
			return true;
		}
	}
	return false;
}
