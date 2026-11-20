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
 * ORDER BY fragment for a bounded sample that rotates hourly. An affine hash
 * modulo a prime spreads IDs evenly, so successive runs cover different
 * sources instead of always the oldest ones. Portable integer arithmetic only.
 */
function doctor_sample_order($column, $now) {
	$prime = 4294967311;
	$salt = (int) fmod(floor($now / 3600) * 2654435761, $prime);
	return '(' . $column . ' * 2654435761 + ' . $salt . ') % ' . $prime . ', ' . $column;
}

/** Inspect a bounded sample without flushing Boost or contacting an RRD daemon. */
function doctor_check_rrd_stale($allowedDevices = null, $now = null) {
	$now = $now === null ? time() : $now;
	$cap = 500;
	$where = '';
	if ($allowedDevices !== null) {
		$ids = array_map('intval', $allowedDevices);
		$where = ' AND h.id IN (' . ($ids === [] ? '0' : implode(',', $ids)) . ')';
	}
	$sql = "SELECT dtd.local_data_id, dtd.data_source_path, dtd.rrd_step, h.id AS host_id, h.description,
		dsp.step AS profile_step
		FROM data_template_data AS dtd
		INNER JOIN data_local AS dl ON dl.id = dtd.local_data_id
		INNER JOIN host AS h ON h.id = dl.host_id
		LEFT JOIN data_source_profiles AS dsp ON dsp.id = dtd.data_source_profile_id
		WHERE dtd.local_data_id > 0 AND dtd.active = 'on' AND dtd.data_source_path != ''
		AND (h.disabled = '' OR h.disabled IS NULL) AND h.status != 1" . $where . '
		ORDER BY ' . doctor_sample_order('dtd.local_data_id', $now) . ' LIMIT 501';
	$sources = db_fetch_assoc($sql, false);
	if (!is_array($sources)) {
		return doctor_result('filesystem.rrd_stale', 'Filesystem', 'warn', __('RRD update freshness', 'doctor'), __('Data source freshness could not be assessed.', 'doctor'), '', 'not_assessed');
	}
	$limited = count($sources) > $cap;
	$sources = array_slice($sources, 0, $cap);
	$rra = doctor_repair_directories()['rra'];
	foreach ($sources as &$source) {
		$path = str_replace('<path_rra>', $rra, $source['data_source_path']);
		// Never stat a stream wrapper supplied through a data source path.
		$resolved = strpos($path, '://') === false ? realpath($path) : false;
		$source['mtime'] = false;
		if ($resolved !== false && is_file($resolved)) {
			clearstatcache(true, $resolved);
			$source['mtime'] = @filemtime($resolved);
		}
		$source['path'] = $path;
	}
	unset($source);
	$intervals = doctor_threshold('doctor_rrd_stale_intervals', 3);
	$intervals = $intervals >= 1 && $intervals <= 100 ? (int) $intervals : 3;
	$deferred = doctor_threshold('doctor_rrd_deferred_seconds', 0);
	$deferred = $deferred >= 0 && $deferred <= 86400 ? (int) $deferred : 0;
	$boost = read_config_option('boost_rrd_update_enable', true) === 'on';
	$boostMinutes = read_config_option('boost_rrd_update_interval', true);
	if (($boost && (!is_numeric($boostMinutes) || $boostMinutes <= 0 || $boostMinutes > 1440))
		|| (getenv('RRDCACHED_ADDRESS') && $deferred === 0)) {
		return doctor_result('filesystem.rrd_stale', 'Filesystem', 'warn', __('RRD update freshness', 'doctor'), __('The deferred-write interval is unknown; configure it before judging file age.', 'doctor'), '', 'not_assessed');
	}
	return doctor_evaluate_rrd_stale($sources, $now, doctor_poller_interval(), $intervals, max($deferred, $boost ? (int) $boostMinutes * 120 : 0), $limited);
}

/** Modification age is evidence of stale disk writes, not proof of a collection failure. */
function doctor_evaluate_rrd_stale($sources, $now, $pollInterval, $intervals, $deferred, $limited) {
	$stale = [];
	$unknown = 0;
	$devices = [];
	$staleIds = [];
	foreach ($sources as $source) {
		$step = max($pollInterval, (int) $source['rrd_step'], (int) $source['profile_step']);
		$threshold = $step * $intervals + $deferred;
		$mtime = $source['mtime'];
		if ($mtime === false || $mtime <= 0 || $mtime > $now) {
			$unknown++;
			continue;
		}
		$age = $now - $mtime;
		if ($age > $threshold) {
			$devices[$source['host_id']] = true;
			$staleIds[] = isset($source['local_data_id']) ? (int) $source['local_data_id'] : $source['path'];
			$stale[] = ['age' => $age, 'text' => $source['description'] . ': ' . $source['path'] . ' (' . $age . 's)'];
		}
	}
	usort($stale, function ($a, $b) { return $a['age'] === $b['age'] ? 0 : ($a['age'] > $b['age'] ? -1 : 1); });
	$examples = [];
	foreach (array_slice($stale, 0, 3) as $entry) {
		$examples[] = $entry['text'];
	}
	$detail = __('Checked %d files; %d stale files across %d devices; %d unavailable or future-dated files.', count($sources), count($stale), count($devices), $unknown, 'doctor');
	if ($stale !== []) {
		$detail .= ' ' . implode('; ', $examples);
	}
	if ($limited) {
		$detail .= ' ' . __('Checked a sample of %d active data sources that rotates hourly; a pass does not cover every file.', count($sources), 'doctor');
	}
	$detail .= ' ' . __('File age includes the collection interval and configured deferred-write allowance; verify the poller and flush process before changing data.', 'doctor');
	// Missing files are reported by filesystem.rrd_files; only a sample with no readable file is unassessed.
	$assessment = $sources === [] ? 'not_applicable' : ($unknown === count($sources) ? 'not_assessed' : 'assessed');
	$result = doctor_result('filesystem.rrd_stale', 'Filesystem', $stale !== [] || $assessment === 'not_assessed' ? 'warn' : 'pass', __('RRD update freshness', 'doctor'), $detail, '', $assessment);
	// File ages in the detail grow every second, so an acknowledgment must bind to the stale set instead.
	sort($staleIds);
	$result['evidence'] = json_encode($staleIds);
	return $result;
}
