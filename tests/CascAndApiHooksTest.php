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
require_once dirname(__DIR__) . '/setup.php';
require_once dirname(__DIR__) . '/doctor_functions.php';
require_once dirname(__DIR__) . '/doctor_access.php';

if (!class_exists('DoctorTestCascRegistrar')) {
	class DoctorTestCascRegistrar {
		/** @var array<int,array<string,mixed>> */
		public $registered = [];

		public function register($provider) {
			$this->registered[] = $provider;
		}
	}
}

beforeEach(function () {
	$_SESSION = ['sess_user_id' => 7];
	$GLOBALS['doctor_test_realms'] = [
		'doctor.php'          => 20,
		'doctor_operator.php' => 21,
		'doctor_view.php'     => 22
	];
	$GLOBALS['doctor_test_grants']             = [120, 15];
	$GLOBALS['doctor_test_settings']           = [];
	$GLOBALS['doctor_test_hook_registrations'] = [];
	$GLOBALS['doctor_test_registrations']      = [];
	$GLOBALS['config']                         = ['base_path' => dirname(dirname(dirname(__DIR__)))];
	doctor_test_workflow_database();
});

afterEach(function () {
	unset($GLOBALS['doctor_test_pdo']);
	$_SESSION = [];
	$GLOBALS['doctor_test_grants'] = [];
});

test('doctor_setup_hooks registers all 8 hooks including CaSC and API decoupled hooks', function () {
	doctor_setup_hooks(true);

	expect($GLOBALS['doctor_test_hook_registrations'])->toHaveCount(8)
		->and($GLOBALS['doctor_test_hook_registrations'])->toContain([
			'doctor', 'casc_register_providers', 'doctor_casc_register_providers', 'setup.php', true
		])
		->and($GLOBALS['doctor_test_hook_registrations'])->toContain([
			'doctor', 'api_register_resources', 'doctor_api_register_resources', 'setup.php', true
		]);
});

test('doctor_casc_register_providers returns a plain-array provider and supports registrar objects and arrays', function () {
	$direct = doctor_casc_register_providers();
	expect($direct['slug'])->toBe('doctor')
		->and($direct['schemaVersion'])->toBe('1.0')
		->and($direct['export'])->toBe('doctor_casc_export')
		->and($direct['validate'])->toBe('doctor_casc_validate')
		->and($direct['plan'])->toBe('doctor_casc_plan')
		->and($direct['apply'])->toBe('doctor_casc_apply')
		->and($direct['describeSchema'])->toBe('doctor_casc_describe_schema')
		->and($direct['schema']['schemaFile'])->toBe('schema/doctor.schema.yaml')
		->and(is_callable($direct['export']))->toBeTrue()
		->and(is_callable($direct['validate']))->toBeTrue()
		->and(is_callable($direct['plan']))->toBeTrue()
		->and(is_callable($direct['apply']))->toBeTrue()
		->and(is_callable($direct['describeSchema']))->toBeTrue();

	$registrar = new DoctorTestCascRegistrar();
	$returned  = doctor_casc_register_providers($registrar);
	expect($returned['slug'])->toBe('doctor')
		->and($registrar->registered)->toHaveCount(1)
		->and($registrar->registered[0]['slug'])->toBe('doctor');

	$collected = doctor_casc_register_providers([]);
	expect($collected)->toHaveKey('doctor')
		->and($collected['doctor']['slug'])->toBe('doctor');
});

test('CaSC export, validate, plan, and apply manage config settings while rejecting runtime state', function () {
	$GLOBALS['doctor_test_settings'] = [
		'doctor_schedule_enabled'  => 'on',
		'doctor_schedule_interval' => '360',
		'doctor_state'             => 'database.connection=pass',
		'doctor_hooks_version'     => '0.6.1'
	];

	$exported = doctor_casc_export();
	expect($exported['schemaVersion'])->toBe('1.0')
		->and($exported['config']['doctor_schedule_enabled'])->toBe('on')
		->and($exported['config']['doctor_schedule_interval'])->toBe('360')
		->and($exported['config']['doctor_poller_warn_percent'])->toBe('80')
		->and($exported['config'])->not->toHaveKey('doctor_state')
		->and($exported['config'])->not->toHaveKey('doctor_hooks_version');

	// Reject non-arrays, unknown keys, state keys, bad types, and inconsistent thresholds.
	expect(doctor_casc_validate('invalid')['valid'])->toBeFalse()
		->and(doctor_casc_validate(['config' => 'not-array'])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_state' => 'x'])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['unknown_key' => '1'])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_schedule_interval' => '999'])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_schedule_enabled' => 'maybe'])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_alert_emails' => "bad\nheader"])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_poller_warn_percent' => 150])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_poller_warn_percent' => 'abc'])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_disk_warn_percent' => 5, 'doctor_disk_fail_percent' => 10])['valid'])->toBeFalse()
		->and(doctor_casc_validate(['doctor_clock_warn_seconds' => 60, 'doctor_clock_fail_seconds' => 30])['valid'])->toBeFalse();

	$desired = [
		'config' => [
			'doctor_schedule_enabled'    => false,
			'doctor_schedule_interval'   => '15',
			'doctor_alert_emails'        => 'ops@example.test',
			'doctor_alert_warnings'      => true,
			'doctor_poller_warn_percent' => 75,
			'doctor_disk_warn_percent'   => 15,
			'doctor_disk_fail_percent'   => 5,
			'doctor_clock_warn_seconds'  => 10,
			'doctor_clock_fail_seconds'  => 120
		]
	];

	expect(doctor_casc_validate($desired)['valid'])->toBeTrue();

	$plan = doctor_casc_plan($desired);
	expect($plan['valid'])->toBeTrue()
		->and($plan['changes'])->not->toBeEmpty();

	$applied = doctor_casc_apply($desired);
	expect($applied['applied'])->toBeTrue()
		->and($GLOBALS['doctor_test_settings']['doctor_schedule_enabled'])->toBe('')
		->and($GLOBALS['doctor_test_settings']['doctor_schedule_interval'])->toBe('15')
		->and($GLOBALS['doctor_test_settings']['doctor_alert_emails'])->toBe('ops@example.test')
		->and($GLOBALS['doctor_test_settings']['doctor_alert_warnings'])->toBe('on')
		->and($GLOBALS['doctor_test_settings']['doctor_poller_warn_percent'])->toBe('75');

	// Re-planning after apply yields zero changes.
	expect(doctor_casc_plan($desired)['changes'])->toBe([]);

	// Applying invalid payload fails closed without mutating settings.
	$failedApply = doctor_casc_apply(['doctor_state' => 'injected']);
	expect($failedApply['applied'])->toBeFalse()
		->and($GLOBALS['doctor_test_settings']['doctor_state'])->toBe('database.connection=pass');
});

test('doctor_api_register_resources appends read-only descriptors referencing schema/doctor.schema.yaml', function () {
	$existing  = [['path' => 'other/resource']];
	$resources = doctor_api_register_resources($existing);

	expect($resources)->toHaveCount(4)
		->and($resources[0]['path'])->toBe('other/resource');

	$doctorResources = array_slice($resources, 1);
	expect(array_column($doctorResources, 'path'))->toBe(['doctor/checks', 'doctor/report', 'doctor/debug-info']);

	foreach ($doctorResources as $resource) {
		expect($resource['plugin'])->toBe('doctor')
			->and($resource['methods'])->toBe(['GET'])
			->and($resource['readOnly'])->toBeTrue()
			->and($resource['schema'])->toBe('schema/doctor.schema.yaml');
	}

	expect(is_file(dirname(__DIR__) . '/schema/doctor.schema.yaml'))->toBeTrue();
});

test('setup lifecycle, navigation, settings, and console page helpers behave as expected', function () {
	plugin_doctor_install();
	expect($GLOBALS['doctor_test_hook_registrations'])->toHaveCount(8);

	expect(plugin_doctor_check_config())->toBeTrue()
		->and(plugin_doctor_upgrade())->toBeFalse();

	$nav = doctor_draw_navigation_text([]);
	expect($nav)->toHaveKeys(['doctor.php:', 'doctor_view.php:', 'doctor_operator.php:'])
		->and($nav['doctor_view.php:']['url'])->toBe('doctor_view.php')
		->and($nav['doctor_operator.php:']['url'])->toBe('doctor_operator.php');

	expect(doctor_is_console_page('plugins/doctor/doctor.php'))->toBeTrue()
		->and(doctor_is_console_page('plugins/doctor/doctor_view.php'))->toBeTrue()
		->and(doctor_is_console_page('plugins/doctor/doctor_operator.php'))->toBeTrue()
		->and(doctor_is_console_page('graphs.php'))->toBeFalse();

	global $menu, $tabs, $settings;
	$menu     = [];
	$tabs     = [];
	$settings = [];
	$base     = doctor_test_directory();
	mkdir($base . '/plugins/doctor', 0700, true);
	copy(dirname(__DIR__) . '/INFO', $base . '/plugins/doctor/INFO');
	$GLOBALS['config'] = ['base_path' => $base];

	$version = plugin_doctor_version();
	expect($version)->toHaveKey('version');

	doctor_config_arrays();
	expect($GLOBALS['doctor_test_settings']['doctor_hooks_version'])->toBe($version['version'])
		->and($GLOBALS['doctor_test_settings']['doctor_access_version'])->toBe('1')
		->and($GLOBALS['doctor_test_settings']['doctor_workflows_version'])->toBe('1')
		->and($menu['Utilities'])->toHaveKey('plugins/doctor/doctor.php');

	doctor_config_settings();
	expect($tabs)->toHaveKey('doctor')
		->and($settings['doctor'])->toHaveKey('doctor_schedule_enabled')
		->and($settings['doctor'])->toHaveKey('doctor_log_warn_mb');

	$GLOBALS['doctor_test_pdo']->exec('CREATE TABLE settings (name TEXT PRIMARY KEY, value TEXT)');
	plugin_doctor_uninstall();
	$tables = $GLOBALS['doctor_test_pdo']->query("SELECT name FROM sqlite_master WHERE type='table' AND name LIKE 'plugin_doctor_%'")->fetchAll(PDO::FETCH_COLUMN);
	expect($tables)->toBe([]);
});
