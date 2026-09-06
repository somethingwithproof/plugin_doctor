<?php

/*
 +-------------------------------------------------------------------------+
 | Copyright (C) 2004-2026 The Cacti Group                                 |
 |                                                                         |
 | This program is free software; you can redistribute it and/or           |
 | modify it under the terms of the GNU General Public License             |
 | as published by the Free Software Foundation; either version 2          |
 | of the License, or (at your option) any later version.                  |
 +-------------------------------------------------------------------------+
*/

if ($argc < 2) {
	fwrite(STDERR, 'Usage: php AssertDoctorReport.php REPORT.json [--failures=ID,ID] [CHECK_ID=STATUS ...]' . PHP_EOL);
	exit(2);
}

$contents = @file_get_contents($argv[1]);
$report   = is_string($contents) ? json_decode($contents, true) : null;

if (!is_array($report) || !isset($report['summary']) || !is_array($report['summary']) || !isset($report['checks']) || !is_array($report['checks'])) {
	fwrite(STDERR, 'Doctor report is not valid JSON with summary and checks members.' . PHP_EOL);
	exit(1);
}

if (count($report['checks']) < 20) {
	fwrite(STDERR, 'Doctor report contains fewer than 20 checks.' . PHP_EOL);
	exit(1);
}

$allowedStatuses = array('pass', 'warn', 'fail');
$actualSummary   = array('pass' => 0, 'warn' => 0, 'fail' => 0);
$checksById      = array();

foreach ($report['checks'] as $index => $check) {
	if (!is_array($check)) {
		fwrite(STDERR, 'Check ' . $index . ' is not an object.' . PHP_EOL);
		exit(1);
	}

	foreach (array('id', 'category', 'status', 'summary', 'detail', 'repair', 'repairable') as $field) {
		if (!array_key_exists($field, $check)) {
			fwrite(STDERR, 'Check ' . $index . ' is missing field ' . $field . '.' . PHP_EOL);
			exit(1);
		}
	}

	$id     = (string) $check['id'];
	$status = (string) $check['status'];

	if ($id === '' || isset($checksById[$id])) {
		fwrite(STDERR, 'Doctor check IDs must be non-empty and unique; invalid ID: ' . $id . PHP_EOL);
		exit(1);
	}

	if (!in_array($status, $allowedStatuses, true)) {
		fwrite(STDERR, 'Check ' . $id . ' has invalid status ' . $status . '.' . PHP_EOL);
		exit(1);
	}

	if (!is_bool($check['repairable'])) {
		fwrite(STDERR, 'Check ' . $id . ' has a non-boolean repairable field.' . PHP_EOL);
		exit(1);
	}

	if ($check['repairable'] !== ($check['repair'] !== '')) {
		fwrite(STDERR, 'Check ' . $id . ' has inconsistent repair metadata.' . PHP_EOL);
		exit(1);
	}

	$checksById[$id] = $check;
	$actualSummary[$status]++;
}

foreach ($actualSummary as $status => $count) {
	if (!isset($report['summary'][$status]) || (int) $report['summary'][$status] !== $count) {
		fwrite(STDERR, 'Summary count for ' . $status . ' does not match the checks.' . PHP_EOL);
		exit(1);
	}
}

for ($argument = 2; $argument < $argc; $argument++) {
	if (strpos($argv[$argument], '--failures=') === 0) {
		$expectedFailures = substr($argv[$argument], strlen('--failures='));
		$expectedFailures = $expectedFailures === false || $expectedFailures === '' ? array() : explode(',', $expectedFailures);
		$actualFailures   = array();

		foreach ($checksById as $id => $check) {
			if ($check['status'] === 'fail') {
				$actualFailures[] = $id;
			}
		}

		sort($expectedFailures);
		sort($actualFailures);

		if (count($actualFailures) !== count($expectedFailures) || count(array_diff($actualFailures, $expectedFailures)) !== 0 || count(array_diff($expectedFailures, $actualFailures)) !== 0) {
			fwrite(STDERR, 'Expected failing checks [' . implode(', ', $expectedFailures) . '], got [' . implode(', ', $actualFailures) . '].' . PHP_EOL);
			exit(1);
		}

		continue;
	}

	$expectation = explode('=', $argv[$argument], 2);

	if (count($expectation) !== 2 || $expectation[0] === '' || !in_array($expectation[1], $allowedStatuses, true)) {
		fwrite(STDERR, 'Invalid expectation: ' . $argv[$argument] . PHP_EOL);
		exit(2);
	}

	$id             = $expectation[0];
	$expectedStatus = $expectation[1];

	if (!isset($checksById[$id])) {
		fwrite(STDERR, 'Expected check is missing: ' . $id . PHP_EOL);
		exit(1);
	}

	if ($checksById[$id]['status'] !== $expectedStatus) {
		fwrite(STDERR, 'Expected ' . $id . '=' . $expectedStatus . ', got ' . $checksById[$id]['status'] . ': ' . $checksById[$id]['detail'] . PHP_EOL);
		exit(1);
	}
}

print 'Validated ' . count($report['checks']) . ' Doctor checks.' . PHP_EOL;
