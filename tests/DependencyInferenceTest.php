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

require_once __DIR__ . '/CactiStubs.php';
require_once dirname(__DIR__) . '/doctor_functions.php';

test('dependency graph models the Cacti causal chain and maps check IDs to nodes', function () {
	$graph = doctor_dependency_graph();

	expect($graph)->toBe([
		'database'          => ['poller'],
		'poller'            => ['filesystem'],
		'filesystem'        => ['remote_collectors'],
		'remote_collectors' => ['plugins'],
		'plugins'           => []
	]);

	expect(doctor_dependency_node('database.connection'))->toBe('database')
		->and(doctor_dependency_node('poller.freshness'))->toBe('poller')
		->and(doctor_dependency_node('filesystem.disk_space'))->toBe('filesystem')
		->and(doctor_dependency_node('rrd.freshness'))->toBe('filesystem')
		->and(doctor_dependency_node('poller.remote'))->toBe('remote_collectors')
		->and(doctor_dependency_node('cacti.plugin_files'))->toBe('plugins')
		->and(doctor_dependency_node(['id' => 'sample.queue', 'plugin' => 'sample']))->toBe('plugins')
		->and(doctor_dependency_node('binary.snmpwalk'))->toBeNull()
		->and(doctor_dependency_node('php.version'))->toBeNull()
		->and(doctor_dependency_node(''))->toBeNull();

	expect(doctor_dependency_ancestors('database'))->toBe([])
		->and(doctor_dependency_ancestors('poller'))->toBe(['database'])
		->and(doctor_dependency_ancestors('filesystem'))->toBe(['database', 'poller'])
		->and(doctor_dependency_ancestors('remote_collectors'))->toBe(['database', 'poller', 'filesystem'])
		->and(doctor_dependency_ancestors('plugins'))->toBe(['database', 'poller', 'filesystem', 'remote_collectors'])
		->and(doctor_dependency_ancestors('unknown'))->toBe([]);
});

test('cascading database failure suppresses downstream poller, filesystem, remote collector, and plugin symptoms', function () {
	$pluginCheck = doctor_result('sample.queue', 'Sample', 'warn', 'Sample queue', 'Queue backed up.');
	$pluginCheck['plugin'] = 'sample';

	$results = [
		doctor_result('database.connection', 'Database', 'fail', 'Database connection', 'Connection refused.'),
		doctor_result('poller.freshness', 'Poller', 'fail', 'Main poller freshness', 'Poller stalled.'),
		doctor_result('filesystem.rrd_stale', 'Filesystem', 'warn', 'RRD update freshness', 'RRDs are stale.'),
		doctor_result('poller.remote', 'Poller', 'fail', 'Remote pollers', 'Remote collector offline.'),
		doctor_result('cacti.plugin_files', 'Cacti', 'fail', 'Enabled plugin files', 'Missing plugin file.'),
		$pluginCheck
	];

	$inferred = doctor_infer_root_causes($results);
	$byId     = [];
	foreach ($inferred as $item) {
		$byId[$item['id']] = $item;
	}

	expect($byId['database.connection'])->not->toHaveKey('root_cause_id')
		->and($byId['database.connection']['suppressed_symptoms'])->toBe([
			'poller.freshness',
			'filesystem.rrd_stale',
			'poller.remote',
			'cacti.plugin_files',
			'sample.queue'
		]);

	foreach (['poller.freshness', 'filesystem.rrd_stale', 'poller.remote', 'cacti.plugin_files', 'sample.queue'] as $symptomId) {
		expect($byId[$symptomId]['root_cause_id'])->toBe('database.connection');
	}

	// Verify existing statuses, IDs, categories, and summary counts remain untouched.
	expect(doctor_result_counts($inferred))->toBe(doctor_result_counts($results))
		->and($byId['poller.freshness']['status'])->toBe('fail')
		->and($byId['filesystem.rrd_stale']['status'])->toBe('warn');

	$summary = doctor_dependency_summary($inferred);
	expect($summary['root_causes'])->toBe(['database.connection'])
		->and($summary['root_cause_count'])->toBe(1)
		->and($summary['suppressed_count'])->toBe(5)
		->and($summary['groups'])->toBe([
			'database.connection' => [
				'poller.freshness',
				'filesystem.rrd_stale',
				'poller.remote',
				'cacti.plugin_files',
				'sample.queue'
			]
		]);
});

test('intermediate upstream failure groups only downstream nodes and does not suppress independent failures', function () {
	$results = [
		doctor_result('database.connection', 'Database', 'pass', 'Database connection', 'OK.'),
		doctor_result('poller.freshness', 'Poller', 'pass', 'Main poller freshness', 'OK.'),
		doctor_result('filesystem.disk_space', 'Filesystem', 'fail', 'RRA disk space', 'Disk full.'),
		doctor_result('poller.remote', 'Poller', 'fail', 'Remote pollers', 'Sync failed.'),
		doctor_result('cacti.plugin_files', 'Cacti', 'warn', 'Enabled plugin files', 'Warning.'),
		doctor_result('binary.snmpwalk', 'Prerequisites', 'fail', 'Net-SNMP snmpwalk', 'Missing binary.')
	];

	$inferred = doctor_infer_root_causes($results);
	$byId     = [];
	foreach ($inferred as $item) {
		$byId[$item['id']] = $item;
	}

	expect($byId['filesystem.disk_space']['suppressed_symptoms'])->toBe(['poller.remote', 'cacti.plugin_files'])
		->and($byId['poller.remote']['root_cause_id'])->toBe('filesystem.disk_space')
		->and($byId['cacti.plugin_files']['root_cause_id'])->toBe('filesystem.disk_space')
		->and($byId['binary.snmpwalk'])->not->toHaveKey('root_cause_id')
		->and($byId['binary.snmpwalk'])->not->toHaveKey('suppressed_symptoms')
		->and($byId['database.connection'])->not->toHaveKey('suppressed_symptoms');

	$summary = doctor_dependency_summary($inferred);
	expect($summary['root_causes'])->toBe(['filesystem.disk_space', 'binary.snmpwalk'])
		->and($summary['suppressed'])->toBe(['poller.remote', 'cacti.plugin_files']);
});

test('healthy or warning-only upstream nodes never suppress downstream issues', function () {
	$results = [
		doctor_result('database.health_sample', 'Database health', 'warn', 'Observation window', 'Short uptime.'),
		doctor_result('poller.runtime', 'Poller', 'warn', 'Main poller run time', 'Near threshold.'),
		doctor_result('filesystem.rrd_stale', 'Filesystem', 'warn', 'RRD freshness', 'Stale file.'),
		doctor_result('poller.remote', 'Poller', 'fail', 'Remote pollers', 'Offline.'),
		doctor_result('cacti.plugin_files', 'Cacti', 'pass', 'Plugin files', 'All present.')
	];

	$inferred = doctor_infer_root_causes($results);
	$byId     = [];
	foreach ($inferred as $item) {
		$byId[$item['id']] = $item;
	}

	foreach ($inferred as $item) {
		expect($item)->not->toHaveKey('root_cause_id')
			->and($item)->not->toHaveKey('suppressed_symptoms');
	}

	$summary = doctor_dependency_summary($inferred);
	expect($summary['root_causes'])->toBe(['poller.remote'])
		->and($summary['suppressed'])->toBe([])
		->and($summary['groups'])->toBe([]);
});

test('root cause inference is idempotent and compatible with Nagios, Prometheus, and JSON outputs', function () {
	$results = [
		doctor_result('poller.freshness', 'Poller', 'fail', 'Main poller freshness', 'Stalled.'),
		doctor_result('cacti.plugin_files', 'Cacti', 'fail', 'Enabled plugin files', 'Missing.')
	];

	$once  = doctor_infer_root_causes($results);
	$twice = doctor_infer_root_causes($once);

	expect($twice)->toBe($once)
		->and($twice[0]['suppressed_symptoms'])->toBe(['cacti.plugin_files'])
		->and($twice[1]['root_cause_id'])->toBe('poller.freshness');

	$nagios = doctor_format_nagios($twice);
	expect($nagios['code'])->toBe(2)
		->and($nagios['text'])->toContain('fail=2');

	$prom = doctor_format_prometheus($twice, 1700000000);
	expect($prom)->toContain('cacti_doctor_checks{status="fail"} 2')
		->and($prom)->toContain('cacti_doctor_check_status{id="cacti.plugin_files",category="Cacti"} 2');
});
