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
	$GLOBALS['doctor_test_realms'] = ['doctor.php' => 20];
	$GLOBALS['doctor_test_grants'] = [120, 15];
	$GLOBALS['doctor_test_settings'] = [];
	doctor_test_workflow_database();
});
afterEach(function () {
	unset($GLOBALS['doctor_test_pdo'], $GLOBALS['doctor_test_audit_fail']);
	$_SESSION = []; $GLOBALS['doctor_test_grants'] = [];
});

test('warning acceptance preserves observations but suppresses actionable warning severity', function () {
	$results = [doctor_result('database.clock', 'Database', 'warn', 'Clock', '10 seconds')];
	expect(doctor_change_acceptance($results, 'database.clock', 'Ops', 'Awaiting NTP maintenance', time() + 3600))->toBeTrue();
	$accepted = doctor_apply_acceptances($results);
	expect($accepted[0]['status'])->toBe('warn')->and($accepted[0]['accepted'])->toBeTrue()
		->and(doctor_format_nagios($accepted)['code'])->toBe(0)
		->and(doctor_format_nagios($accepted)['text'])->toContain('accepted warnings')
		->and(doctor_format_prometheus($accepted, time()))->toContain('cacti_doctor_check_status{id="database.clock",category="Database"} 0', 'cacti_doctor_check_observed_status{id="database.clock",category="Database"} 1');
	$results[0]['status'] = 'fail';
	$failed = doctor_apply_acceptances($results);
	expect($failed[0]['accepted'])->toBeFalse()->and(doctor_format_nagios($failed)['code'])->toBe(2);
	$results[0]['status'] = 'warn';
	expect(doctor_apply_acceptances($results, time() + 7200)[0]['accepted'])->toBeFalse();
	expect(doctor_change_acceptance([], 'database.clock', '', '', 0, true))->toBeTrue()->and(doctor_acceptances())->toBe([]);
});

test('invalid warning exceptions and unknown checks are refused', function ($status, $assessment, $id, $owner, $reason, $age) {
	$r = [doctor_result('database.clock', 'Database', $status, 'Clock', '', '', $assessment)];
	expect(doctor_change_acceptance($r, $id, $owner, $reason, time() + $age))->toBeFalse()->and(doctor_acceptances())->toBe([]);
})->with([
	['fail', 'assessed', 'database.clock', 'Ops', 'Reason', 3600],
	['warn', 'not_assessed', 'database.clock', 'Ops', 'Reason', 3600],
	['warn', 'assessed', 'unknown', 'Ops', 'Reason', 3600],
	['warn', 'assessed', 'database.clock', '', 'Reason', 3600],
	['warn', 'assessed', 'database.clock', 'Ops', '', 3600],
	['warn', 'assessed', 'database.clock', 'Ops', 'Reason', -1],
	['warn', 'assessed', 'database.clock', 'Ops', 'Reason', 91 * 86400]
]);

test('an exception whose owner or reason cannot be redacted is refused before any write', function () {
	$r = [doctor_result('database.clock', 'Database', 'warn', 'Clock', '')];
	$jit = ini_get('pcre.jit');
	$limit = ini_get('pcre.backtrack_limit');
	ini_set('pcre.jit', '0');
	ini_set('pcre.backtrack_limit', '5');
	$refused = doctor_change_acceptance($r, 'database.clock', 'Ops', 'Reason', time() + 3600);
	ini_set('pcre.jit', $jit);
	ini_set('pcre.backtrack_limit', $limit);
	$audits = $GLOBALS['doctor_test_pdo']->query('SELECT COUNT(*) FROM plugin_doctor_audit')->fetchColumn();
	expect($refused)->toBeFalse()->and(doctor_acceptances())->toBe([])->and((int) $audits)->toBe(0)
		->and(doctor_change_acceptance($r, 'database.clock', 'Ops', 'Reason', time() + 3600))->toBeTrue();
});

test('audit failure rolls back an exception', function () {
	$GLOBALS['doctor_test_audit_fail'] = true;
	expect(doctor_change_acceptance([doctor_result('x', 'Test', 'warn', '', '')], 'x', 'Ops', 'Reason', time() + 3600))->toBeFalse()->and(doctor_acceptances())->toBe([]);
});

test('scheduled exceptions retain raw status and expiry restores warning alerts', function () {
	$now = time();
	$r = [doctor_result('database.clock', 'Database', 'warn', 'Clock', '')];
	doctor_change_acceptance($r, 'database.clock', 'Ops', 'Reason', $now + 3600);
	$GLOBALS['doctor_test_settings'] = ['doctor_state' => 'database.clock=pass', 'doctor_alert_warnings' => 'on'];
	$GLOBALS['doctor_schedule_lock_held'] = true;
	expect(doctor_run_scheduled($r, $now))->toBe([])->and($GLOBALS['doctor_test_settings']['doctor_state'])->toBe('database.clock=warn');
	$changes = doctor_run_scheduled($r, $now + 7200);
	expect($changes)->toHaveCount(1)->and($changes[0]['from'])->toBe('accepted')->and($changes[0]['to'])->toBe('warn');
	$r[0]['status'] = 'fail';
	expect(doctor_run_scheduled($r, $now + 7201)[0]['to'])->toBe('fail');
	unset($GLOBALS['doctor_schedule_lock_held']);
});

test('accepted warning transitions survive the delivery queue through failure recovery and expiry', function () {
	$now = time();
	$r = [doctor_result('database.clock', 'Database', 'warn', 'Clock', '')];
	doctor_change_acceptance($r, 'database.clock', 'Ops', 'Reason', $now + 3600);
	$GLOBALS['doctor_test_settings'] = ['doctor_state' => 'database.clock=fail', 'doctor_alert_warnings' => 'on', 'doctor_alert_emails' => 'ops@example.test'];
	$GLOBALS['doctor_test_mail'] = [];
	unset($GLOBALS['doctor_test_mail_failure']);
	$GLOBALS['doctor_schedule_lock_held'] = true;
	doctor_run_scheduled($r, $now);
	doctor_retry_alerts($now);
	expect($GLOBALS['doctor_test_mail'][0]['body'])->toContain('fail -> accepted')->and(doctor_alert_pending())->toBe([]);
	$r[0]['status'] = 'fail';
	doctor_run_scheduled($r, $now + 1);
	doctor_retry_alerts($now + 1);
	expect($GLOBALS['doctor_test_mail'][1]['body'])->toContain('accepted -> fail');
	$r[0]['status'] = 'warn';
	doctor_run_scheduled($r, $now + 2);
	doctor_retry_alerts($now + 2);
	doctor_run_scheduled($r, $now + 7200);
	doctor_retry_alerts($now + 7200);
	expect($GLOBALS['doctor_test_mail'])->toHaveCount(4)->and($GLOBALS['doctor_test_mail'][3]['body'])->toContain('accepted -> warn')->and(doctor_alert_pending())->toBe([]);
	unset($GLOBALS['doctor_schedule_lock_held']);
});

test('retry suppresses newly accepted warning notifications but retains failure recovery', function () {
	$now = time();
	$r = [doctor_result('database.clock', 'Database', 'warn', 'Clock', '')];
	doctor_change_acceptance($r, 'database.clock', 'Ops', 'Reason', $now + 3600);
	$GLOBALS['doctor_test_settings']['doctor_alert_emails'] = 'ops@example.test';
	$GLOBALS['doctor_test_mail'] = [];
	unset($GLOBALS['doctor_test_mail_failure']);
	foreach (['pass', 'fail'] as $from) {
		$GLOBALS['doctor_test_settings']['doctor_alert_pending'] = json_encode(['events' => ['database.clock' => [$from, 'warn', $now]], 'attempts' => 0, 'next' => $now]);
		doctor_retry_alerts($now);
		expect(doctor_alert_pending())->toBe([]);
	}
	expect($GLOBALS['doctor_test_mail'])->toHaveCount(1)->and($GLOBALS['doctor_test_mail'][0]['body'])->toContain('fail -> warn');
});

test('repair previews refuse root external paths and symlinks and make no changes', function () {
	$base = doctor_test_directory();
	$paths = ['cache' => $base . '/cache'];
	$plan = doctor_repair_snapshot($base, $paths, false);
	expect($plan['allowed'])->toBeTrue()->and($plan['objects'][0]['action'])->toBe('create')->and(file_exists($paths['cache']))->toBeFalse();
	expect(doctor_repair_snapshot($base, $paths, true)['allowed'])->toBeFalse();
	expect(doctor_repair_snapshot($base, ['cache' => dirname($base) . '/outside-doctor'], false)['allowed'])->toBeFalse();
	symlink($base . '/missing', $base . '/cache');
	expect(doctor_repair_snapshot($base, $paths, false)['allowed'])->toBeFalse();
});

test('audit retention is bounded and payloads remain structured and redacted', function () {
	for ($i = 0; $i < 205; $i++) { doctor_audit('test', ['password' => 'privatevalue']); }
	$rows = $GLOBALS['doctor_test_pdo']->query('SELECT * FROM plugin_doctor_audit')->fetchAll(PDO::FETCH_ASSOC);
	expect($rows)->toHaveCount(200)->and(json_decode($rows[0]['payload'], true)['password'])->toBe('[redacted]');
});
