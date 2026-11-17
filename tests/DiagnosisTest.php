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


test('symptom investigations cite observed failures without claiming a proven root cause', function () {
	$r = [doctor_result('poller.boost', 'Poller', 'fail', 'Boost', 'Stopped; password=hidden')];
	$d = doctor_diagnose('graphs_stopped', $r);
	expect($d['assessment'])->toBe('hypotheses')->and($d['candidates'][0]['classification'])->toBe('possible_cause')
		->and($d['candidates'][0]['evidence'][0]['id'])->toBe('poller.boost')->and(json_encode($d))->not->toContain('hidden');
	expect(doctor_diagnosis_text($d))->toContain('do not establish a root cause', 'Boost');
});

test('missing stale and unassessed evidence never establishes a cause', function () {
	$r = [doctor_result('poller.boost', 'Poller', 'warn', 'Boost', 'Unknown', '', 'not_assessed')];
	expect(doctor_diagnose('graphs_stopped', $r)['assessment'])->toBe('inconclusive')
		->and(doctor_diagnose('graphs_stopped', $r, false)['candidates'])->toBe([])
		->and(doctor_diagnose('unsupported', $r))->toBeFalse();
});

test('each supported symptom can explain its relevant evidence', function ($symptom, $id) {
	$r = [doctor_result($id, 'Test', 'warn', 'Check', 'Observed')];
	expect(doctor_diagnose($symptom, $r)['candidates'])->not->toBeEmpty();
})->with([['graphs_stopped', 'filesystem.runtime_directories'], ['slow_polling', 'database.slow_queries'], ['devices_missing', 'devices.health'], ['alerts_missing', 'doctor.alert_delivery']]);


test('unavailable database measurements cannot create tuning hypotheses or accepted warnings', function () {
	$results = doctor_analyze_database_health([], []);
	$d = doctor_diagnose('slow_polling', $results);
	expect($d['assessment'])->toBe('inconclusive');
	foreach ($results as $result) {
		expect($result['assessment'])->toBe('not_assessed');
	}
});
