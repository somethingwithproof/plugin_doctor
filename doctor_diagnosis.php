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

function doctor_symptoms() {
	return [
		'graphs_stopped' => __('Graphs stopped updating', 'doctor'),
		'slow_polling' => __('Polling is slow', 'doctor'),
		'devices_missing' => __('Devices are missing or unavailable', 'doctor'),
		'alerts_missing' => __('Doctor alerts are missing', 'doctor')
	];
}

/** Rules explain observations; they cannot establish causality from correlated symptoms. */
function doctor_diagnose($symptom, $results, $fresh = true) {
	$rules = [
		'graphs_stopped' => [
			[['poller.freshness', 'poller.remote'], __('Collection may have stopped.', 'doctor'), __('Check the poller scheduler and the affected poller log, then verify a new completed cycle.', 'doctor')],
			[['poller.boost', 'poller.output_backlog'], __('Collected values may not be reaching disk.', 'doctor'), __('Inspect the output queue and Boost flush history; verify that the queue drains and RRD timestamps advance.', 'doctor')],
			[['filesystem.runtime_directories', 'filesystem.disk_space', 'filesystem.rrd_files', 'filesystem.rrd_stale'], __('RRD storage needs investigation.', 'doctor'), __('Check storage capacity, runtime-directory permissions and the last RRD update; account for deferred writes.', 'doctor')]
		],
		'slow_polling' => [
			[['poller.runtime', 'devices.health'], __('Collection work may be exceeding its time budget.', 'doctor'), __('Compare cycle duration with the polling interval and inspect device timeouts before increasing concurrency.', 'doctor')],
			[['database.connection_capacity', 'database.buffer_pool_reads', 'database.temporary_tables', 'database.slow_queries', 'database.redo_log_waits'], __('Database pressure may be contributing to slow polling.', 'doctor'), __('Compare database counters during a slow cycle and inspect query plans before changing server limits.', 'doctor')]
		],
		'devices_missing' => [
			[['devices.health', 'poller.remote', 'binary.snmpget', 'binary.snmpwalk', 'poller.spine_config'], __('Collection prerequisites or reachability may be failing.', 'doctor'), __('Verify the affected device permissions, reachability, credentials and assigned poller using Cacti diagnostics.', 'doctor')]
		],
		'alerts_missing' => [
			[['doctor.schedule', 'doctor.alert_delivery'], __('Scheduled checks or mail delivery need attention.', 'doctor'), __('Verify scheduling and recipient settings, inspect retained delivery attempts, and send a Cacti test email.', 'doctor')]
		]
	];
	if (!isset($rules[$symptom])) {
		return false;
	}
	$diagnosis = ['symptom' => $symptom, 'assessment' => 'inconclusive', 'candidates' => [], 'unassessed' => []];
	if (!$fresh) {
		return $diagnosis;
	}
	$byId = [];
	foreach ($results as $result) {
		$byId[$result['id']] = $result;
	}
	foreach ($rules[$symptom] as $rule) {
		$evidence = [];
		foreach ($rule[0] as $id) {
			if (!isset($byId[$id]) || (isset($byId[$id]['assessment']) && $byId[$id]['assessment'] !== 'assessed')) {
				$diagnosis['unassessed'][] = $id;
				continue;
			}
			$r = $byId[$id];
			if (in_array($r['status'], ['warn', 'fail'], true)) {
				$evidence[] = ['id' => $id, 'status' => $r['status'], 'detail' => doctor_redact($r['detail'])];
			}
		}
		if ($evidence !== []) {
			$diagnosis['candidates'][] = ['classification' => 'possible_cause', 'explanation' => $rule[1], 'evidence' => $evidence, 'next_step' => $rule[2]];
		}
	}
	if ($diagnosis['candidates'] !== []) {
		$diagnosis['assessment'] = 'hypotheses';
	}
	return $diagnosis;
}

function doctor_diagnosis_text($diagnosis) {
	$lines = [__('Possible causes require verification; matching checks do not establish a root cause.', 'doctor')];
	if ($diagnosis['candidates'] === []) {
		$lines[] = __('No cause is established by the available observations. Run fresh diagnostics and investigate the symptom directly.', 'doctor');
	}
	foreach ($diagnosis['candidates'] as $candidate) {
		$lines[] = $candidate['explanation'];
		foreach ($candidate['evidence'] as $evidence) {
			$lines[] = '  ' . $evidence['id'] . ' [' . $evidence['status'] . ']: ' . $evidence['detail'];
		}
		$lines[] = $candidate['next_step'];
	}
	return implode("\n", $lines);
}
