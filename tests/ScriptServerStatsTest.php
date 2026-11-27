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
require_once dirname(__DIR__) . '/scripts/ss_doctor_stats.php';

test('ss_doctor_stats emits safe secret-free Cacti field:value telemetry with root-cause and plugin counts', function () {
	$pluginOk = doctor_result('sample.queue', 'Sample', 'pass', 'Sample queue', 'password=neverleak123');
	$pluginOk['plugin'] = 'sample';

	$pluginWarn = doctor_result('sample.backlog', 'Sample', 'warn', 'Sample backlog', 'token=neverleak456');
	$pluginWarn['plugin'] = 'sample';

	$results = [
		doctor_result('database.connection', 'Database', 'fail', 'Database connection', 'Connection refused.'),
		doctor_result('poller.freshness', 'Poller', 'fail', 'Main poller freshness', 'Poller stalled.'),
		doctor_result('filesystem.rrd_stale', 'Filesystem', 'warn', 'RRD freshness', 'RRDs stale.'),
		doctor_result('cacti.version', 'Cacti', 'pass', 'Cacti version', 'OK.'),
		doctor_result('sample.info', 'Sample', 'info', 'Info only', 'Informational.'),
		$pluginOk,
		$pluginWarn
	];

	$line = ss_doctor_stats($results);

	expect($line)->toBe('checks_total:7 checks_ok:2 checks_warn:2 checks_fail:2 root_causes:1 suppressed_symptoms:3 plugin_checks:2')
		->and($line)->not->toContain('neverleak123')
		->and($line)->not->toContain('neverleak456')
		->and($line)->toMatch('/^([a-z_]+:(?:[0-9]+|U))( [a-z_]+:(?:[0-9]+|U))*$/');
});

test('ss_doctor_stats returns RRDtool unknown U values on invalid input and never emits negative counts', function () {
	$unknown = doctor_stats_from_results(false);
	expect($unknown)->toBe([
		'checks_total'        => 'U',
		'checks_ok'           => 'U',
		'checks_warn'         => 'U',
		'checks_fail'         => 'U',
		'root_causes'         => 'U',
		'suppressed_symptoms' => 'U',
		'plugin_checks'       => 'U'
	]);

	$formatted = doctor_format_script_server_metrics(['checks_total' => -5, 'checks_ok' => 2]);
	expect($formatted)->toBe('checks_total:U checks_ok:2 checks_warn:U checks_fail:U root_causes:U suppressed_symptoms:U plugin_checks:U');
});

test('ss_doctor_stats handles empty check lists and standalone CLI execution without Cacti', function () {
	expect(ss_doctor_stats([]))->toBe('checks_total:0 checks_ok:0 checks_warn:0 checks_fail:0 root_causes:0 suppressed_symptoms:0 plugin_checks:0');

	$script = escapeshellarg(dirname(__DIR__) . '/scripts/ss_doctor_stats.php');
	$output = trim((string) shell_exec(escapeshellarg(PHP_BINARY) . ' ' . $script));
	expect($output)->toBe('checks_total:U checks_ok:U checks_warn:U checks_fail:U root_causes:U suppressed_symptoms:U plugin_checks:U');
});
