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

chdir('../../../');
include_once('./include/cli_check.php');
include_once('./plugins/doctor/doctor_functions.php');

$options = getopt('', ['json', 'repair:', 'yes', 'help']);

if (isset($options['help'])) {
	print 'Usage: php plugins/doctor/cli/doctor.php [--json] [--repair=REPAIR_ID --yes]' . PHP_EOL;
	print 'Available repairs: ' . implode(', ', array_keys(doctor_available_repairs())) . PHP_EOL;
	exit(0);
}

if (isset($options['repair'])) {
	if (!isset($options['yes'])) {
		fwrite(STDERR, 'Refusing to repair without --yes.' . PHP_EOL);
		exit(2);
	}

	$repairResult = doctor_run_repair((string) $options['repair']);
	cacti_log('Doctor CLI repair ' . $options['repair'] . ': ' . $repairResult['status'] . ' - ' . $repairResult['detail'], false, 'DOCTOR');

	if (isset($options['json'])) {
		print json_encode($repairResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
	} else {
		print strtoupper((string) $repairResult['status']) . ' ' . $repairResult['summary'] . ': ' . $repairResult['detail'] . PHP_EOL;
	}

	exit($repairResult['status'] === 'pass' ? 0 : 1);
}

$results = doctor_run_checks();

if (isset($options['json'])) {
	print json_encode(['summary' => doctor_result_counts($results), 'checks' => $results], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
} else {
	foreach ($results as $result) {
		print str_pad(strtoupper((string) $result['status']), 5) . ' [' . $result['category'] . '] ' . $result['summary'] . ' - ' . $result['detail'] . PHP_EOL;
	}
}

$counts = doctor_result_counts($results);
exit($counts['fail'] > 0 ? 1 : 0);
