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
require_once dirname(__DIR__) . '/doctor_abilities.php';

if (!class_exists('DoctorTestRegistrar')) {
	class DoctorTestRegistrar {
		/** @var array<string,string> */
		public $categories = [];

		/** @var array<string,array<string,mixed>> */
		public $abilities = [];

		public function registerCategory($id, $label) {
			if (isset($this->categories[$id])) {
				throw new LogicException('Duplicate category');
			}
			$this->categories[$id] = $label;
		}

		public function register($id, $definition) {
			if (strpos($id, 'doctor-') !== 0) {
				throw new LogicException('Namespace mismatch');
			}
			$this->abilities[$id] = $definition;
		}
	}
}

if (!function_exists('doctor_test_ability_plugin_hook')) {
	function doctor_test_ability_plugin_hook($context) {
		return [
			[
				'id'          => 'extra.health',
				'plugin'      => 'extra',
				'category'    => 'Extra',
				'title'       => 'Extra plugin check',
				'status'      => 'warn',
				'message'     => 'Token password=supersecret leaked in check.',
				'details'     => '',
				'remediation' => 'Rotate credential.'
			]
		];
	}
}

beforeEach(function () {
	$GLOBALS['doctor_test_realms'] = [
		'doctor.php'          => 20,
		'doctor_operator.php' => 21,
		'doctor_view.php'     => 22
	];
	$GLOBALS['doctor_test_user_grants']     = [];
	$GLOBALS['doctor_test_plugin_hooks']    = [];
	$GLOBALS['doctor_test_enabled_plugins'] = ['extra'];
	$GLOBALS['doctor_test_hook_registrations'] = [];
	$GLOBALS['doctor_test_settings']        = [];
	$GLOBALS['doctor_test_allowed_devices'] = [];
	$GLOBALS['doctor_test_log']             = [];
});

afterEach(function () {
	unset($GLOBALS['doctor_test_user_grants']);
	unset($GLOBALS['doctor_test_enabled_plugins']);
	$GLOBALS['doctor_test_plugin_hooks'] = [];
});

test('setup registers the abilities_register hook alongside core Doctor hooks', function () {
	doctor_setup_hooks(true);

	expect($GLOBALS['doctor_test_hook_registrations'])->toContain([
		'doctor', 'abilities_register', 'doctor_abilities_register', 'doctor_abilities.php', true
	]);
});

test('abilities_register registers read-only doctor-run-checks and doctor-list-checks with closed schemas', function () {
	$registrar = new DoctorTestRegistrar();
	doctor_abilities_register($registrar);

	expect($registrar->categories)->toHaveKey('diagnostics')
		->and(array_keys($registrar->abilities))->toBe(['doctor-run-checks', 'doctor-list-checks']);

	$expectedKeys = ['label', 'description', 'category', 'input_schema', 'output_schema', 'annotations', 'permission', 'execute'];
	foreach ($registrar->abilities as $id => $definition) {
		expect(array_keys($definition))->toBe($expectedKeys)
			->and($definition['annotations'])->toBe([
				'readOnly'    => true,
				'destructive' => false,
				'idempotent'  => true
			])
			->and($definition['input_schema']['type'])->toBe('object')
			->and($definition['input_schema']['additionalProperties'])->toBeFalse()
			->and($definition['output_schema']['type'])->toBe('object')
			->and($definition['output_schema']['additionalProperties'])->toBeFalse()
			->and(is_callable($definition['permission']))->toBeTrue()
			->and(is_callable($definition['execute']))->toBeTrue();
	}

	// Registering when category already exists must not throw.
	$duplicate = new DoctorTestRegistrar();
	$duplicate->registerCategory('diagnostics', 'Diagnostics');
	doctor_abilities_register($duplicate);
	expect(array_keys($duplicate->abilities))->toBe(['doctor-run-checks', 'doctor-list-checks']);
});

test('Doctor MCP abilities gate access on Doctor Viewer realm and deny unprivileged users', function () {
	$GLOBALS['doctor_test_user_grants'] = [
		10 => [],
		11 => [15],
		12 => [122], // doctor_view.php (22 + 100)
		13 => [121], // doctor_operator.php (21 + 100)
		14 => [120]  // doctor.php (20 + 100)
	];

	$registrar = new DoctorTestRegistrar();
	doctor_abilities_register($registrar);

	foreach ($registrar->abilities as $definition) {
		$permission = $definition['permission'];
		expect(call_user_func($permission, 0))->toBeFalse()
			->and(call_user_func($permission, 10))->toBeFalse()
			->and(call_user_func($permission, 11))->toBeFalse()
			->and(call_user_func($permission, 12))->toBeTrue()
			->and(call_user_func($permission, 13))->toBeTrue()
			->and(call_user_func($permission, 14))->toBeTrue();
	}
});

test('doctor-list-checks returns core and plugin checks with category and plugin filters', function () {
	$GLOBALS['doctor_test_plugin_hooks']['doctor_register_checks'] = [
		['name' => 'extra', 'file' => 'setup.php', 'function' => 'doctor_test_ability_plugin_hook']
	];

	$all = doctor_ability_list_checks(12, new stdClass());
	$ids = array_column($all['checks'], 'id');
	expect($ids)->toContain('cacti.version')
		->and($ids)->toContain('extra.health');

	$onlyExtra = doctor_ability_list_checks(12, (object) ['plugin' => 'extra']);
	expect($onlyExtra['checks'])->toHaveCount(1)
		->and($onlyExtra['checks'][0]['id'])->toBe('extra.health')
		->and($onlyExtra['checks'][0]['category'])->toBe('Extra');

	$onlyDatabase = doctor_ability_list_checks(12, (object) ['category' => 'database']);
	expect($onlyDatabase['checks'])->not->toBeEmpty();
	foreach ($onlyDatabase['checks'] as $entry) {
		expect(strtolower($entry['category']))->toBe('database');
	}
});

test('doctor-run-checks returns redacted, filterable findings and never executes repairs', function () {
	$GLOBALS['doctor_test_user_grants'] = [
		12 => [122]
	];
	$GLOBALS['doctor_test_plugin_hooks']['doctor_register_checks'] = [
		['name' => 'extra', 'file' => 'setup.php', 'function' => 'doctor_test_ability_plugin_hook']
	];

	$base = doctor_test_directory();
	$GLOBALS['doctor_test_settings'] = ['path_cactilog' => $base . '/missing/cacti.log'];
	$repairDirs = doctor_repair_directories();
	$cacheExistedBefore = is_dir($repairDirs['cache']);

	$report = doctor_ability_run_checks(12, new stdClass());
	expect($report['summary']['total'])->toBe(count($report['findings']))
		->and($report['summary']['pass'] + $report['summary']['warn'] + $report['summary']['fail'] + $report['summary']['info'])
			->toBe($report['summary']['total'])
		->and(is_dir($repairDirs['cache']))->toBe($cacheExistedBefore);

	// Even operators never receive global filesystem.rrd_files paths via MCP.
	$GLOBALS['doctor_test_user_grants'][13] = [121];
	$operatorReport = doctor_ability_run_checks(13, new stdClass());
	expect(array_column($operatorReport['findings'], 'id'))->not->toContain('filesystem.rrd_files');

	$findingIds = array_column($report['findings'], 'id');
	expect($findingIds)->toContain('extra.health')
		->and($findingIds)->not->toContain('logging.recent_errors')
		->and($findingIds)->not->toContain('filesystem.rrd_files')
		->and($findingIds)->not->toContain('filesystem.rrd_stale');

	$filtered = doctor_ability_run_checks(12, (object) ['category' => 'Extra', 'status' => 'warn']);
	expect($filtered['findings'])->toHaveCount(1)
		->and($filtered['findings'][0]['id'])->toBe('extra.health')
		->and($filtered['findings'][0]['message'])->not->toContain('supersecret')
		->and($filtered['findings'][0]['message'])->toContain('[redacted]')
		->and($filtered['findings'][0]['remediation'])->toBe('Rotate credential.');
});
