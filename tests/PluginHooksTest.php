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

if (!function_exists('doctor_test_hook_valid_plugin')) {
	function doctor_test_hook_valid_plugin($context) {
		return [
			'checks' => [
				[
					'id'          => 'sample.queue_depth',
					'plugin'      => 'sample',
					'category'    => 'Sample',
					'title'       => 'Sample queue depth',
					'status'      => 'ok',
					'message'     => 'Queue is healthy.',
					'details'     => ['pending' => 0, 'workers' => 4],
					'remediation' => ''
				],
				[
					'id'          => 'sample.cache_notice',
					'plugin'      => 'sample',
					'category'    => 'Sample',
					'title'       => 'Sample cache telemetry',
					'status'      => 'info',
					'message'     => 'Cache hit rate is 98%.',
					'details'     => 'hits=9800 misses=200',
					'remediation' => ''
				],
				[
					'id'          => 'sample.license_expiry',
					'plugin'      => 'sample',
					'category'    => 'Sample',
					'title'       => 'Sample threshold alert',
					'status'      => 'warn',
					'message'     => 'Retry queue growing for token=topsecretvalue',
					'details'     => 'password="hidden-password"',
					'remediation' => 'Check worker logs and restart queue consumer.'
				]
			],
			'attachments' => [
				[
					'title'   => 'Sample diagnostics',
					'content' => "worker=ok\napi_key=supersecret123\nAuthorization: Bearer mybearertoken\n"
				]
			]
		];
	}
}

if (!function_exists('doctor_test_hook_malformed_plugin')) {
	function doctor_test_hook_malformed_plugin($context) {
		return [
			// Missing required keys
			['id' => 'badplug.missing', 'plugin' => 'badplug', 'status' => 'ok'],
			// Invalid status (must be ok|warn|fail|info)
			[
				'id' => 'badplug.bad_status', 'plugin' => 'badplug', 'category' => 'Bad',
				'title' => 'Bad status', 'status' => 'pass', 'message' => 'msg',
				'details' => '', 'remediation' => ''
			],
			// Spoofed plugin name
			[
				'id' => 'other.spoof', 'plugin' => 'other', 'category' => 'Bad',
				'title' => 'Spoof', 'status' => 'ok', 'message' => 'msg',
				'details' => '', 'remediation' => ''
			],
			// Check ID without plugin prefix (attempted core collision)
			[
				'id' => 'database.connection', 'plugin' => 'badplug', 'category' => 'Database',
				'title' => 'Collision', 'status' => 'fail', 'message' => 'msg',
				'details' => '', 'remediation' => ''
			],
			// Non-scalar object in details
			[
				'id' => 'badplug.bad_details', 'plugin' => 'badplug', 'category' => 'Bad',
				'title' => 'Bad details', 'status' => 'warn', 'message' => 'msg',
				'details' => new stdClass(), 'remediation' => ''
			],
			// Valid descriptor alongside malformed ones
			[
				'id' => 'badplug.valid_one', 'plugin' => 'badplug', 'category' => 'Bad',
				'title' => 'Valid fallback', 'status' => 'fail', 'message' => 'Connection refused.',
				'details' => 'port=9090', 'remediation' => 'Verify daemon status.'
			]
		];
	}
}

if (!function_exists('doctor_test_hook_throwing_plugin')) {
	function doctor_test_hook_throwing_plugin($context) {
		throw new RuntimeException('boom with password=leakedsecret');
	}
}

if (!function_exists('doctor_test_hook_non_array_plugin')) {
	function doctor_test_hook_non_array_plugin($context) {
		return 'not-an-array';
	}
}

if (!function_exists('doctor_test_hook_disabled_plugin')) {
	function doctor_test_hook_disabled_plugin($context) {
		throw new LogicException('disabled plugin hook must never execute');
	}
}

beforeEach(function () {
	$GLOBALS['doctor_test_plugin_hooks']    = [];
	$GLOBALS['doctor_test_enabled_plugins'] = ['sample', 'badplug', 'broken', 'nonarray'];
	$GLOBALS['doctor_test_log']             = [];
	$GLOBALS['doctor_test_grants']          = [];
	$GLOBALS['doctor_test_allowed_devices'] = [];
});

afterEach(function () {
	$GLOBALS['doctor_test_plugin_hooks'] = [];
	unset($GLOBALS['doctor_test_enabled_plugins']);
});

test('doctor_register_checks integrates valid plugin checks across formats and web results', function () {
	$GLOBALS['doctor_test_plugin_hooks']['doctor_register_checks'] = [
		['name' => 'sample', 'file' => 'setup.php', 'function' => 'doctor_test_hook_valid_plugin']
	];

	$attachments = [];
	$checks      = doctor_run_plugin_checks([], $attachments);

	expect($checks)->toHaveCount(3)
		->and($checks[0]['id'])->toBe('sample.queue_depth')
		->and($checks[0]['plugin'])->toBe('sample')
		->and($checks[0]['status'])->toBe('pass')
		->and($checks[0]['plugin_status'])->toBe('ok')
		->and($checks[0]['repairable'])->toBeFalse()
		->and($checks[0]['repair'])->toBe('')
		->and($checks[1]['id'])->toBe('sample.cache_notice')
		->and($checks[1]['status'])->toBe('info')
		->and($checks[2]['id'])->toBe('sample.license_expiry')
		->and($checks[2]['status'])->toBe('warn')
		->and($checks[2]['detail'])->not->toContain('topsecretvalue')
		->and($checks[2]['detail'])->not->toContain('hidden-password')
		->and($checks[2]['detail'])->toContain('Remediation: Check worker logs')
		->and($attachments)->toHaveCount(1);

	$nagios = doctor_format_nagios($checks);
	expect($nagios['code'])->toBe(1)
		->and($nagios['text'])->toContain('sample.license_expiry')
		->and($nagios['text'])->toContain('pass=1 warn=1 fail=0');

	$prom = doctor_format_prometheus($checks, 1700000000);
	expect($prom)->toContain('cacti_doctor_check_status{id="sample.queue_depth",category="Sample"} 0')
		->and($prom)->toContain('cacti_doctor_check_status{id="sample.cache_notice",category="Sample"} 0')
		->and($prom)->toContain('cacti_doctor_check_status{id="sample.license_expiry",category="Sample"} 1');

	$web = doctor_web_results($checks);
	$ids = array_column($web, 'id');
	expect($ids)->toContain('sample.queue_depth')
		->and($ids)->toContain('sample.cache_notice')
		->and($ids)->toContain('sample.license_expiry');
});

test('malformed plugin check descriptors are strictly rejected while valid ones succeed', function () {
	$GLOBALS['doctor_test_plugin_hooks']['doctor_register_checks'] = [
		['name' => 'badplug', 'file' => 'setup.php', 'function' => 'doctor_test_hook_malformed_plugin']
	];

	$checks = doctor_run_plugin_checks(['database.connection']);

	expect($checks)->toHaveCount(1)
		->and($checks[0]['id'])->toBe('badplug.valid_one')
		->and($checks[0]['status'])->toBe('fail')
		->and($checks[0]['remediation'])->toBe('Verify daemon status.');

	expect(implode("\n", $GLOBALS['doctor_test_log']))->toContain('Doctor rejected 5 invalid plugin check descriptor(s) from badplug');
});

test('throwing, non-array, and disabled plugin hooks are fault-isolated and never break core or healthy plugins', function () {
	$GLOBALS['doctor_test_plugin_hooks']['doctor_register_checks'] = [
		['name' => 'broken', 'file' => 'setup.php', 'function' => 'doctor_test_hook_throwing_plugin'],
		['name' => 'nonarray', 'file' => 'setup.php', 'function' => 'doctor_test_hook_non_array_plugin'],
		['name' => 'disabled', 'file' => 'setup.php', 'function' => 'doctor_test_hook_disabled_plugin'],
		['name' => 'sample', 'file' => 'setup.php', 'function' => 'doctor_test_hook_valid_plugin']
	];

	$sample      = null;
	$attachments = [];
	$results     = doctor_run_checks($sample, [], $attachments);
	$ids         = array_column($results, 'id');

	expect($ids)->toContain('cacti.version')
		->and($ids)->toContain('sample.queue_depth')
		->and($attachments)->toHaveCount(1);

	$logText = implode("\n", $GLOBALS['doctor_test_log']);
	expect($logText)->toContain('Doctor plugin check hook failed for broken')
		->and($logText)->not->toContain('leakedsecret')
		->and($logText)->toContain('Doctor plugin check hook failed for nonarray');
});

test('support bundle includes plugin attachments and redacts secrets across checks and attachments', function () {
	$GLOBALS['doctor_test_plugin_hooks']['doctor_register_checks'] = [
		['name' => 'sample', 'file' => 'setup.php', 'function' => 'doctor_test_hook_valid_plugin']
	];

	$attachments = [];
	$checks      = doctor_run_plugin_checks([], $attachments);
	$bundle      = doctor_build_bundle($checks, ['Doctor' => '0.6.1'], ['2026-11-26 - INFO ok'], $attachments);

	expect($bundle)->toContain('== Plugin attachments')
		->and($bundle)->toContain('--- [sample] Sample diagnostics')
		->and($bundle)->toContain('worker=ok')
		->and($bundle)->toContain('[redacted]')
		->and($bundle)->not->toContain('supersecret123')
		->and($bundle)->not->toContain('mybearertoken')
		->and($bundle)->not->toContain('topsecretvalue')
		->and($bundle)->not->toContain('hidden-password');
});

test('array details are recursively redacted and info transitions do not break scheduled alerts', function () {
	$validated = doctor_validate_plugin_check([
		'id'          => 'sample.array_secret',
		'plugin'      => 'sample',
		'category'    => 'Sample',
		'title'       => 'Array details',
		'status'      => 'info',
		'message'     => 'Info message.',
		'details'     => [
			'api_key' => 'never-leak-this',
			'nested'  => ['note' => 'Bearer anothersecretvalue', 'ok' => 42]
		],
		'remediation' => ''
	], 'sample');

	expect($validated)->not->toBeNull()
		->and($validated['details']['api_key'])->toBe('[redacted]')
		->and($validated['details']['nested']['note'])->not->toContain('anothersecretvalue')
		->and($validated['details']['nested']['ok'])->toBe(42);

	$GLOBALS['doctor_test_settings'] = [
		'doctor_alert_pending' => json_encode([
			'events'   => ['sample.array_secret' => ['info', 'fail', 1700000000]],
			'attempts' => 0,
			'next'     => 1700000000
		])
	];
	expect(doctor_alert_pending()['events'])->toHaveKey('sample.array_secret');
	expect(doctor_state_changes(['cacti.version' => 'pass'], [$validated], true))->toBe([]);
});
