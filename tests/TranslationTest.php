<?php
// SPDX-License-Identifier: GPL-2.0-or-later
// SPDX-FileCopyrightText: 2026 Thomas Vincent

require_once __DIR__ . '/CactiStubs.php';
require_once dirname(__DIR__) . '/doctor_functions.php';

test('every check category has a translatable screen label', function () {
	$categories = [];

	foreach (['doctor_functions.php', 'doctor_scheduling.php'] as $file) {
		$source = file_get_contents(dirname(__DIR__) . '/' . $file);
		preg_match_all("/doctor_result\\('[^']+', '([^']+)'/", $source, $matches);
		$categories = array_merge($categories, $matches[1]);
	}

	$functions = file_get_contents(dirname(__DIR__) . '/doctor_functions.php');

	expect(array_unique($categories))->not->toBeEmpty();

	foreach (array_unique($categories) as $category) {
		expect(preg_match("/'" . preg_quote($category, '/') . "'\\s*=> __\\('" . preg_quote($category, '/') . "', 'doctor'\\)/", $functions))->toBe(1, "No label for category $category");
	}
});

test('screen labels fall back to the stable English keyword', function () {
	expect(doctor_status_label('pass'))->toBe('PASS')
		->and(doctor_status_label('warn'))->toBe('WARN')
		->and(doctor_status_label('fail'))->toBe('FAIL')
		->and(doctor_status_label('other'))->toBe('OTHER')
		->and(doctor_category_label('Database health'))->toBe('Database health')
		->and(doctor_category_label('Unlisted'))->toBe('Unlisted');
});

test('report data stays English and untranslated by status or category', function () {
	$result = doctor_check_privileges(false);

	expect($result['id'])->toBe('doctor.privileges')
		->and($result['category'])->toBe('Doctor')
		->and($result['status'])->toBe('pass');
	expect(doctor_format_nagios([$result])['text'])->toStartWith('DOCTOR OK - ');
	expect(doctor_format_prometheus([$result], 0))->toContain('cacti_doctor_check_status{id="doctor.privileges",category="Doctor"} 0');
});

test('message templates avoid the percent escape that Cacti applies before formatting', function () {
	// Cacti's __() turns %% into % before it calls sprintf(), so a literal percent
	// sign must travel in an argument rather than in the message.
	$template = file_get_contents(dirname(__DIR__) . '/locales/po/cacti.pot');

	expect($template)->not->toContain('%%');
});
