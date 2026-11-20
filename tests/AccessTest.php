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
require_once dirname(__DIR__) . '/doctor_access.php';
require_once dirname(__DIR__) . '/setup.php';

beforeEach(function () {
	$_SESSION = ['sess_user_id' => 7];
	$GLOBALS['doctor_test_realms'] = ['doctor.php' => 20, 'doctor_operator.php' => 21, 'doctor_view.php' => 22];
	$GLOBALS['doctor_test_grants'] = [];
	$GLOBALS['doctor_test_allowed_devices'] = [];
	$GLOBALS['doctor_test_settings'] = [];
});

afterEach(function () {
	$_SESSION = [];
	$GLOBALS['doctor_test_grants'] = [];
});

test('the highest explicitly granted Doctor realm determines capabilities', function ($grants, $level) {
	$GLOBALS['doctor_test_grants'] = $grants;
	expect(doctor_access_level())->toBe($level);
})->with([[[], 0], [[15], 0], [[122], 1], [[121], 2], [[120], 3], [[120, 121, 122], 3]]);

test('anonymous sessions fail closed despite realm grants', function () {
	$GLOBALS['doctor_test_grants'] = [120, 15];
	$_SESSION = [];
	expect(doctor_access_level())->toBe(0)->and(doctor_can_configure())->toBeFalse();
});

test('action authorization checks method csrf realm and core permission', function ($grants, $action, $method, $csrf, $status) {
	$GLOBALS['doctor_test_grants'] = $grants;
	expect(doctor_action_status($action, $method, $csrf))->toBe($status);
})->with([
	[[122], 'run', 'POST', true, 403], [[122], 'acknowledge', 'POST', true, 403],
	[[121], 'run', 'POST', true, 200], [[121], 'acknowledge', 'POST', true, 200],
	[[121, 15], 'repair', 'POST', true, 403], [[120], 'repair', 'POST', true, 403],
	[[120, 15], 'repair', 'POST', true, 200], [[120, 15], 'repair', 'GET', true, 405],
	[[120, 15], 'repair', 'POST', false, 403], [[120, 15], 'other', 'POST', true, 400],
	[[], 'run', 'POST', true, 403], [[121], 'run', 'GET', true, 405]
]);

test('registration keeps legacy grants on Administrator and does not merge realms', function () {
	$GLOBALS['doctor_test_registrations'] = [];
	expect(doctor_setup_realms())->toBeTrue();
	expect($GLOBALS['doctor_test_registrations'])->toBe([
		['doctor', 'doctor.php', 'Doctor Administrator', 1],
		['doctor', 'doctor_operator.php', 'Doctor Operator', 0],
		['doctor', 'doctor_view.php', 'Doctor Viewer', 0]
	]);
});

test('viewer snapshots contain no global device status or diagnostics and expire', function () {
	$GLOBALS['doctor_test_settings'] = ['doctor_schedule_enabled' => 'on', 'doctor_last_completed' => '1000', 'doctor_state' => 'database.clock=pass;devices.health=fail;poller.runtime=warn'];
	$report = doctor_viewer_results(1001);
	expect($report['fresh'])->toBeTrue()->and(array_column($report['results'], 'id'))->toBe(['database.clock', 'poller.runtime'])
		->and(array_column($report['results'], 'detail'))->toBe(['', '']);
	expect(array_column(doctor_viewer_results(5000)['results'], 'status'))->toBe(['unknown', 'unknown']);
	expect(doctor_viewer_results(999)['fresh'])->toBeFalse();
});

test('viewer rows use the canonical category rather than the capitalized id prefix', function () {
	$GLOBALS['doctor_test_settings'] = ['doctor_schedule_enabled' => 'on', 'doctor_last_completed' => '1000', 'doctor_state' => 'php.version=pass;binary.snmpget=pass;poller.runtime=warn'];
	expect(array_column(doctor_viewer_results(1001)['results'], 'category'))->toBe(['PHP', 'Prerequisites', 'Poller']);
});

test('viewer rows use the producer category for checks whose prefix spans several categories', function () {
	$GLOBALS['doctor_test_settings'] = ['doctor_schedule_enabled' => 'on', 'doctor_last_completed' => '1000', 'doctor_state' => 'php.security_baseline=pass;php.extensions=pass;database.health_sample=warn'];
	expect(array_column(doctor_viewer_results(1001)['results'], 'category'))->toBe(['Security', 'Prerequisites', 'Database health']);
});

test('the web device list orders outages without a failure time last', function () {
	$GLOBALS['doctor_test_allowed_devices'] = [];
	doctor_visible_devices();
	expect($GLOBALS['doctor_test_device_order'])->toContain('UNIX_TIMESTAMP(status_fail_date)');
});

test('web reports redact secrets and replace global device and log information', function () {
	$GLOBALS['doctor_test_allowed_devices'] = [['id' => 9, 'status' => 1, 'description' => 'Allowed device', 'hostname' => 'allowed.example', 'status_fail_date' => '2026-11-01', 'status_last_error' => 'community=secret']];
	$input = [
		doctor_result('devices.health', 'Devices', 'fail', 'Global', 'HIDDEN DEVICE'),
		doctor_result('logging.recent_errors', 'Logging', 'warn', 'Errors', 'HIDDEN LOG'),
		doctor_result('database.clock', 'Database', 'warn', 'Clock', 'password="secret" offset=12')
	];
	$output = doctor_web_results($input);
	$text = json_encode($output);
	expect($text)->not->toContain('HIDDEN', 'secret')->and($text)->toContain('Allowed device', 'offset=12');
	$GLOBALS['doctor_test_grants'] = [18];
	expect(array_column(doctor_web_results($input), 'id'))->toContain('logging.recent_errors');
});

test('acknowledgment preserves status and rejects changed evidence or unknown checks', function () {
	$result = doctor_result('database.clock', 'Database', 'fail', 'Clock', '12 seconds');
	$fingerprint = doctor_finding_fingerprint($result);
	expect(doctor_acknowledge([$result], 'database.clock', $fingerprint))->toBeTrue();
	expect($result['status'])->toBe('fail')->and(doctor_result_counts([$result])['fail'])->toBe(1);
	expect($GLOBALS['doctor_test_settings']['doctor_ack_7_database.clock'])->toBe($fingerprint);
	$result['detail'] = '14 seconds';
	expect(doctor_acknowledge([$result], 'database.clock', $fingerprint))->toBeFalse();
	expect(doctor_acknowledge([$result], 'unknown', $fingerprint))->toBeFalse();
});


test('the bounded web runner validates a real CLI report and filters its output', function () {
	if (doctor_running_as_root()) { $this->markTestSkipped('Configured binaries are refused as root.'); }
	$base = doctor_test_directory();
	mkdir($base . '/plugins/doctor/cli', 0700, true);
	$check = doctor_result('database.clock', 'Database', 'fail', 'Clock', 'password="hidden" offset=12');
	file_put_contents($base . '/plugins/doctor/cli/doctor.php', '<?php echo ' . var_export(json_encode(['checks' => [$check]]), true) . '; exit(1);');
	$script = '<?php define("CACTI_PATH_BASE", ' . var_export($base, true) . '); ' .
		'require ' . var_export(__DIR__ . '/CactiStubs.php', true) . '; ' .
		'require ' . var_export(dirname(__DIR__) . '/doctor_functions.php', true) . '; ' .
		'require ' . var_export(dirname(__DIR__) . '/doctor_access.php', true) . '; ' .
		'$_SESSION["sess_user_id"] = 7; $GLOBALS["doctor_test_settings"]["path_php_binary"] = PHP_BINARY; echo json_encode(doctor_run_web_checks());';
	file_put_contents($base . '/run.php', $script);
	exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($base . '/run.php'), $output, $code);
	$report = json_decode(implode("\n", $output), true);
	expect($code)->toBe(0)->and($report)->toHaveKeys(['results', 'time', 'user'])->and($report['user'])->toBe(7)
		->and(json_encode($report))->not->toContain('hidden')->and($report['results'][0]['status'])->toBe('fail');
	file_put_contents($base . '/plugins/doctor/cli/doctor.php', '<?php echo "invalid";');
	$output = [];
	exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($base . '/run.php'), $output, $code);
	expect(json_decode(implode("\n", $output), true))->toHaveKey('error');
	$GLOBALS['doctor_test_settings']['path_php_binary'] = '/usr/bin/unexpected';
	expect(doctor_run_web_checks())->toHaveKey('error');
});

test('incomplete realm registration remains eligible for retry', function () {
	unset($GLOBALS['doctor_test_realms']['doctor_view.php']);
	expect(doctor_setup_realms())->toBeFalse();
});

test('scheduled viewer history stays bounded and excludes device counts and details', function () {
	$GLOBALS['doctor_test_settings'] = [];
	$GLOBALS['doctor_schedule_lock_held'] = true;
	$results = [doctor_result('devices.health', 'Devices', 'fail', 'Devices', 'private device'), doctor_result('database.clock', 'Database', 'warn', 'Clock', 'private offset')];
	for ($i = 0; $i < 22; $i++) { doctor_run_scheduled($results, 1700000000 + $i); }
	$history = doctor_read_json_setting('doctor_report_history');
	expect($history)->toHaveCount(20)->and($history[0])->toBe([1700000002, 0, 1, 0])
		->and($history[19])->toBe([1700000021, 0, 1, 0])
		->and($GLOBALS['doctor_test_settings']['doctor_report_history'])->not->toContain('private');
	unset($GLOBALS['doctor_schedule_lock_held']);
});

test('disabled scheduling invalidates viewer freshness', function () {
	$GLOBALS['doctor_test_settings'] = ['doctor_last_completed' => (string) time(), 'doctor_state' => 'database.clock=pass'];
	expect(doctor_viewer_results(time())['fresh'])->toBeFalse();
});

test('web reports omit installation-wide RRD paths', function () {
	$results = doctor_web_results([doctor_result('filesystem.rrd_files', 'Filesystem', 'warn', 'RRD', '/private/device.rrd')]);
	expect(array_column($results, 'id'))->not->toContain('filesystem.rrd_files');
});

test('HTTP authorization credentials are redacted', function ($text) {
	expect(doctor_redact($text))->not->toContain('sensitivevalue');
})->with(['Authorization: Bearer sensitivevalue', 'Authorization: sensitivevalue', 'Authorization: Basic sensitivevalue', 'bearer sensitivevalue', '"Authorization": "Bearer sensitivevalue"']);

test('credential schemes preserve escaped quoted secret boundaries', function ($scheme) {
	foreach (['"', "'"] as $quote) {
		$value = $scheme . ' abc' . chr(92) . $quote . 'sensitivevalue';
		$text = 'password: ' . $quote . $value . $quote . '; host=localhost';
		expect(doctor_redact($text))->toBe('password: ' . $quote . '[redacted]' . $quote . '; host=localhost');
	}
})->with(['Basic', 'Bearer']);
