<?php
/*
 +-------------------------------------------------------------------------+
 | Copyright (C) 2026 Thomas Vincent                                       |
 |                                                                         |
 | This program is free software; you can redistribute it and/or           |
 | modify it under the terms of the GNU General Public License             |
 | as published by the Free Software Foundation; either version 2          |
 | of the License, or (at your option) any later version.                  |
 +-------------------------------------------------------------------------+
*/

$invokedPath = isset($argv[0]) ? (string) $argv[0] : __FILE__;

if ($invokedPath === '' || $invokedPath[0] !== DIRECTORY_SEPARATOR) {
	$invokedPath = getcwd() . DIRECTORY_SEPARATOR . $invokedPath;
}

$cactiBase = dirname(dirname(dirname(dirname($invokedPath))));

if (!is_file($cactiBase . '/include/cli_check.php')) {
	$cactiBase = dirname(dirname(dirname(__DIR__)));
}

if (!is_file($cactiBase . '/include/cli_check.php')) {
	fwrite(STDERR, 'Unable to locate the Cacti installation. Install Doctor as plugins/doctor.' . PHP_EOL);
	exit(2);
}

$options = getopt('', ['json', 'format:', 'bundle:', 'scheduled', 'scheduled-worker', 'due', 'retry-alerts', 'repair:', 'yes', 'help']);

// Supervise bootstrap too: a stalled connection must not leave a worker forever.
if (isset($options['scheduled'])) {
	include_once dirname(__DIR__) . '/doctor_scheduling.php';
	$arguments = [PHP_BINARY, __FILE__, '--scheduled-worker'];
	foreach (['due', 'retry-alerts'] as $flag) {
		if (isset($options[$flag])) {
			$arguments[] = '--' . $flag;
		}
	}
	$outcome = doctor_process($arguments, 120);
	print $outcome['stdout'];
	if ($outcome['error'] !== '' || $outcome['code'] !== 0) {
		fwrite(STDERR, ($outcome['error'] !== '' ? $outcome['error'] : 'Doctor scheduled worker failed. Check the Cacti log.') . PHP_EOL);
	}
	exit($outcome['code'] === 0 ? 0 : 1);
}

chdir($cactiBase);
include_once('./include/cli_check.php');
include_once('./plugins/doctor/doctor_functions.php');

if (isset($options['help'])) {
	print 'Usage: php plugins/doctor/cli/doctor.php [--json | --format=text|json|nagios|prometheus]' . PHP_EOL;
	print '       php plugins/doctor/cli/doctor.php --bundle=PATH' . PHP_EOL;
	print '       php plugins/doctor/cli/doctor.php --repair=REPAIR_ID --yes' . PHP_EOL;
	print '       php plugins/doctor/cli/doctor.php --scheduled [--retry-alerts]' . PHP_EOL;
	print __('Available repairs: %s', implode(', ', array_keys(doctor_available_repairs())), 'doctor') . PHP_EOL;
	exit(0);
}

$format = isset($options['json']) ? 'json' : (isset($options['format']) ? (string) $options['format'] : 'text');

if (!in_array($format, ['text', 'json', 'nagios', 'prometheus'], true)) {
	fwrite(STDERR, __('Unknown format %s. Use text, json, nagios, or prometheus.', $format, 'doctor') . PHP_EOL);
	exit(2);
}

if (isset($options['scheduled-worker'])) {
	exit(doctor_scheduled_worker(isset($options['due']), isset($options['retry-alerts'])));
}

if (isset($options['bundle'])) {
	$logPath = (string) read_config_option('path_cactilog', true);
	$logPath = $logPath !== '' ? $logPath : $cactiBase . '/log/cacti.log';
	$bundle  = doctor_build_bundle(doctor_run_checks(), doctor_bundle_context(), doctor_read_log_tail($logPath, 200));
	$error   = doctor_write_bundle((string) $options['bundle'], $bundle);

	if ($error !== '') {
		fwrite(STDERR, $error . PHP_EOL);
		exit(1);
	}

	print __('Wrote %s. Review it before sharing; values after password, secret, token, and community names are masked.', $options['bundle'], 'doctor') . PHP_EOL;
	exit(0);
}

if (isset($options['repair'])) {
	if (!isset($options['yes'])) {
		fwrite(STDERR, __('Refusing to repair without --yes.', 'doctor') . PHP_EOL);
		exit(2);
	}

	$repairResult = doctor_run_repair((string) $options['repair']);
	cacti_log('Doctor CLI repair ' . str_replace(["\r", "\n"], ' ', (string) $options['repair']) . ': ' . $repairResult['status'] . ' - ' . $repairResult['detail'], false, 'DOCTOR');

	if ($format === 'json') {
		print json_encode($repairResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
	} else {
		print strtoupper((string) $repairResult['status']) . ' ' . $repairResult['summary'] . ': ' . $repairResult['detail'] . PHP_EOL;
	}

	exit($repairResult['status'] === 'pass' ? 0 : 1);
}

$results = doctor_run_checks();

if ($format === 'nagios') {
	$nagios = doctor_format_nagios($results);
	print $nagios['text'] . PHP_EOL;
	exit($nagios['code']);
}

if ($format === 'prometheus') {
	print doctor_format_prometheus($results, time());
	exit(0);
}

if ($format === 'json') {
	print json_encode(['summary' => doctor_result_counts($results), 'checks' => $results], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
} else {
	foreach ($results as $result) {
		print str_pad(strtoupper((string) $result['status']), 5) . ' [' . $result['category'] . '] ' . $result['summary'] . ' - ' . $result['detail'] . PHP_EOL;
	}
}

$counts = doctor_result_counts($results);
exit($counts['fail'] > 0 ? 1 : 0);
