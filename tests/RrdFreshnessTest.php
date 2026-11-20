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


function doctor_rrd_source($age, $now = 10000, $step = 300) {
	return ['mtime' => $age === false ? false : $now - $age, 'rrd_step' => $step, 'profile_step' => $step, 'host_id' => 1, 'description' => 'Device', 'path' => '/rra/device.rrd'];
}

test('RRD freshness uses collection intervals and respects the exact boundary', function () {
	expect(doctor_evaluate_rrd_stale([doctor_rrd_source(900)], 10000, 300, 3, 0, false)['status'])->toBe('pass')
		->and(doctor_evaluate_rrd_stale([doctor_rrd_source(901)], 10000, 300, 3, 0, false)['status'])->toBe('warn')
		->and(doctor_evaluate_rrd_stale([doctor_rrd_source(1200, 10000, 600)], 10000, 300, 3, 0, false)['status'])->toBe('pass');
});

test('Boost or external cache delay is added before declaring a file stale', function () {
	expect(doctor_evaluate_rrd_stale([doctor_rrd_source(7200)], 10000, 300, 3, 7200, false)['status'])->toBe('pass')
		->and(doctor_evaluate_rrd_stale([doctor_rrd_source(8101)], 10000, 300, 3, 7200, false)['status'])->toBe('warn');
});

test('RRD sets with no readable file are explicitly unassessed', function ($sources) {
	$r = doctor_evaluate_rrd_stale($sources, 10000, 300, 3, 0, false);
	expect($r['status'])->toBe('warn')->and($r['assessment'])->toBe('not_assessed');
})->with([[[doctor_rrd_source(false)]], [[doctor_rrd_source(-5)]]]);

test('a capped sample or some missing files still assess the readable files', function ($sources, $limited) {
	$r = doctor_evaluate_rrd_stale($sources, 10000, 300, 3, 0, $limited);
	expect($r['status'])->toBe('pass')->and($r['assessment'])->toBe('assessed');
})->with([[[doctor_rrd_source(0)], true], [[doctor_rrd_source(0), doctor_rrd_source(false)], false]]);

test('no data sources is not applicable rather than a warning', function () {
	$r = doctor_evaluate_rrd_stale([], 10000, 300, 3, 0, false);
	expect($r['status'])->toBe('pass')->and($r['assessment'])->toBe('not_applicable');
});

test('the RRD sample rotates hourly and is stable within an hour', function () {
	expect(doctor_sample_order('id', 3600 * 10))->toBe(doctor_sample_order('id', 3600 * 10 + 3599))
		->and(doctor_sample_order('id', 3600 * 10))->not->toBe(doctor_sample_order('id', 3600 * 11));
});

test('stale RRD fingerprints ignore file ages that change every second', function () {
	$a = doctor_evaluate_rrd_stale([doctor_rrd_source(5000)], 10000, 300, 3, 0, false);
	$b = doctor_evaluate_rrd_stale([doctor_rrd_source(5001)], 10001, 300, 3, 0, false);
	$other = doctor_rrd_source(5000);
	$other['path'] = '/rra/other.rrd';
	$c = doctor_evaluate_rrd_stale([$other], 10000, 300, 3, 0, false);
	expect($a['detail'])->not->toBe($b['detail'])
		->and(doctor_finding_fingerprint($a))->toBe(doctor_finding_fingerprint($b))
		->and(doctor_finding_fingerprint($a))->not->toBe(doctor_finding_fingerprint($c));
});

test('an acknowledgment of stale RRD files survives file ages advancing', function () {
	$old = doctor_rrd_source(5000);
	$old['local_data_id'] = 7;
	$first = doctor_evaluate_rrd_stale([$old], 10000, 300, 3, 0, false);
	$later = doctor_evaluate_rrd_stale([$old], 10600, 300, 3, 0, false);
	$other = $old;
	$other['local_data_id'] = 8;
	expect($first['detail'])->not->toBe($later['detail'])
		->and(doctor_finding_fingerprint($later))->toBe(doctor_finding_fingerprint($first))
		->and(doctor_finding_fingerprint(doctor_evaluate_rrd_stale([$other], 10000, 300, 3, 0, false)))->not->toBe(doctor_finding_fingerprint($first));
});

test('stale RRD details show the three oldest files and a distinct device count', function () {
	$rows = [];
	foreach ([1000, 2000, 3000, 4000] as $i => $age) {
		$r = doctor_rrd_source($age);
		$r['path'] = 'file' . $i;
		$r['host_id'] = $i % 2;
		$rows[] = $r;
	}
	$r = doctor_evaluate_rrd_stale($rows, 10000, 300, 3, 0, false);
	expect($r['detail'])->toContain('4 stale files across 2 devices', 'file3', 'file2', 'file1')->not->toContain('file0');
});

test('RRD collection applies active device and user filters using real file ages', function () {
	$db = doctor_test_workflow_database();
	$GLOBALS['doctor_test_rrd_sql'] = true;
	$db->exec('CREATE TABLE data_template_data (local_data_id INTEGER, data_source_path TEXT, rrd_step INTEGER, active TEXT, data_source_profile_id INTEGER)');
	$db->exec('CREATE TABLE data_local (id INTEGER, host_id INTEGER)');
	$db->exec('CREATE TABLE host (id INTEGER, description TEXT, disabled TEXT, status INTEGER)');
	$db->exec('CREATE TABLE data_source_profiles (id INTEGER, step INTEGER)');
	$directory = doctor_test_directory();
	$path = $directory . '/test.rrd';
	file_put_contents($path, 'fixture');
	touch($path, time() - 10000);
	for ($i = 1; $i <= 4; $i++) {
		$db->prepare('INSERT INTO host VALUES (?, ?, ?, ?)')->execute([$i, 'device-' . $i, $i === 3 ? 'on' : '', $i === 4 ? 1 : 3]);
		$db->prepare('INSERT INTO data_local VALUES (?, ?)')->execute([$i, $i]);
		$db->prepare('INSERT INTO data_template_data VALUES (?, ?, 300, ?, 0)')->execute([$i, $path, 'on']);
	}
	$GLOBALS['doctor_test_settings'] = [];
	$r = doctor_check_rrd_stale([1, 3, 4]);
	expect($r['detail'])->toContain('1 stale files across 1 devices', 'device-1')->not->toContain('device-2', 'device-3', 'device-4');
	$GLOBALS['doctor_test_settings']['boost_rrd_update_enable'] = 'on';
	$GLOBALS['doctor_test_settings']['boost_rrd_update_interval'] = 'invalid';
	expect(doctor_check_rrd_stale([1])['assessment'])->toBe('not_assessed');
	unset($GLOBALS['doctor_test_pdo'], $GLOBALS['doctor_test_rrd_sql']);
});
