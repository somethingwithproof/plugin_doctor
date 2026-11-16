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

function doctor_web_request($grants, $action = '', $method = 'GET', $csrf = true, $extra = []) {
	$input = array_merge(['grants' => $grants, 'action' => $action, 'method' => $method, 'csrf' => $csrf], $extra);
	exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(__DIR__ . '/Fixtures/web_request.php') . ' ' . escapeshellarg(json_encode($input)), $output, $status);
	expect($status)->toBe(0);
	$result = json_decode(implode("\n", $output), true);
	expect($result)->toBeArray();
	return $result;
}

test('the real web controller refuses unauthorized actions before repair execution', function ($grants, $action, $method, $csrf, $expected) {
	$result = doctor_web_request($grants, $action, $method, $csrf, ['repair_id' => 'runtime_directories', 'confirmed' => 'yes']);
	expect($result['status'])->toBe($expected)->and($result['log'])->toBe([]);
})->with([
	[[], '', 'GET', true, 403], [[122], 'repair', 'POST', true, 403],
	[[121, 15], 'repair', 'POST', true, 403], [[120], 'repair', 'POST', true, 403],
	[[120, 15], 'repair', 'GET', true, 405], [[120, 15], 'repair', 'POST', false, 403],
	[[122], 'run', 'POST', true, 403], [[122], 'acknowledge', 'POST', true, 403]
]);

test('viewer rendering omits diagnostics and action forms', function () {
	$result = doctor_web_request([122]);
	expect($result['status'])->toBe(200)->and($result['html'])->toContain('database.clock', 'FAIL')
		->and($result['html'])->not->toContain('private detail', '<form', 'Doctor settings');
});

test('operators can investigate and acknowledge but cannot see repair or settings controls', function () {
	$result = doctor_web_request([121, 15]);
	expect($result['status'])->toBe(200)->and($result['html'])->toContain('private detail', 'Run diagnostic checks', 'Acknowledge')
		->and($result['html'])->not->toContain("value='repair'", 'Doctor settings');
});

test('an administrator must confirm before an allow-listed repair runs', function () {
	$result = doctor_web_request([120, 15], 'repair', 'POST', true, ['repair_id' => 'runtime_directories']);
	expect($result['status'])->toBe(200)->and($result['html'])->toContain('Confirm repair', '>Cancel</a>')->and($result['log'])->toBe([]);
	$result = doctor_web_request([120, 15], 'repair', 'POST', true, ['repair_id' => 'runtime_directories', 'confirmed' => 'yes']);
	expect($result['status'])->toBe(302)->and(implode("\n", $result['log']))->toContain('Doctor repair runtime_directories by user 7');
});

test('stale reports cannot be acknowledged by a forged POST', function () {
	$result = doctor_web_request([121], 'acknowledge', 'POST', true, ['age' => 86400, 'check_id' => 'database.clock', 'fingerprint' => hash('sha256', json_encode(['database.clock', 'fail', 'private detail']))]);
	expect($result['status'])->toBe(409)->and($result['log'])->toBe([]);
});
