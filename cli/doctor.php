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

$options = getopt('', ['json', 'format:', 'bundle:', 'debug-info', 'scheduled', 'scheduled-worker', 'due', 'retry-alerts', 'alerts-only', 'repair:', 'preview', 'symptom:', 'yes', 'help']);

// Supervise bootstrap too: a stalled connection must not leave a worker forever.
if (isset($options['scheduled'])) {
	include_once dirname(__DIR__) . '/doctor_scheduling.php';
	$arguments = [PHP_BINARY, __FILE__, '--scheduled-worker'];
	foreach (['due', 'retry-alerts', 'alerts-only'] as $flag) {
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
	print '       php plugins/doctor/cli/doctor.php --symptom=graphs_stopped|slow_polling|devices_missing|alerts_missing [--json]' . PHP_EOL;
	print '       php plugins/doctor/cli/doctor.php --debug-info [--json]' . PHP_EOL;
	print '       php plugins/doctor/cli/doctor.php --bundle=PATH' . PHP_EOL;
	print '       php plugins/doctor/cli/doctor.php --repair=REPAIR_ID [--preview | --yes]' . PHP_EOL;
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
	exit(doctor_scheduled_worker(isset($options['due']), isset($options['retry-alerts']), isset($options['alerts-only'])));
}

if (isset($options['debug-info'])) {
	$debugInfo = doctor_redact_debug_info(doctor_collect_plugin_debug_info());
	if ($format === 'json') {
		print json_encode(['sections' => $debugInfo], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
	} else {
		$formatted = doctor_format_debug_info($debugInfo);
		if ($formatted !== '') {
			print $formatted . PHP_EOL;
		}
	}
	exit(0);
}

if (isset($options['bundle'])) {
	$logPath = (string) read_config_option('path_cactilog', true);
	$logPath = $logPath !== '' ? $logPath : $cactiBase . '/log/cacti.log';
	// An unreadable log returns null; the bundle is still written with an empty log section.
	$logTail     = doctor_read_log_tail($logPath, 200);
	$sample      = null;
	$attachments = [];
	$results     = doctor_run_checks($sample, [], $attachments);
	$debugInfo   = doctor_collect_plugin_debug_info();
	$bundle      = doctor_build_bundle($results, doctor_bundle_context(), $logTail === null ? [] : $logTail, is_array($attachments) ? $attachments : [], $debugInfo);
	$error   = strpos($bundle, DOCTOR_REDACTION_FAILED) !== false
		? __('Redaction could not complete, so %s was not written.', $options['bundle'], 'doctor')
		: doctor_write_bundle((string) $options['bundle'], $bundle);

	if ($error !== '') {
		fwrite(STDERR, $error . PHP_EOL);
		exit(1);
	}

	print __('Wrote %s. Review it before sharing; values after password, secret, token, and community names are masked.', $options['bundle'], 'doctor') . PHP_EOL;
	exit(0);
}

if (isset($options['repair'])) {
	if (!isset(doctor_available_repairs()[(string) $options['repair']])) {
		fwrite(STDERR, __('Unknown repair', 'doctor') . PHP_EOL);
		exit(2);
	}
	$plan = doctor_repair_snapshot();
	$plan['created'] = time();
	$plan['actor'] = doctor_actor();
	if (isset($options['preview'])) {
		print json_encode($plan, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
		exit($plan['allowed'] ? 0 : 1);
	}
	if (!isset($options['yes'])) {
		fwrite(STDERR, __('Refusing to repair without --yes.', 'doctor') . PHP_EOL);
		exit(2);
	}

	$repairResult = doctor_execute_repair_plan($plan);
	cacti_log('Doctor CLI repair ' . str_replace(["\r", "\n"], ' ', (string) $options['repair']) . ': ' . $repairResult['status'] . ' - ' . (isset($repairResult['log']) ? $repairResult['log'] : $repairResult['detail']), false, 'DOCTOR');
	unset($repairResult['log']);

	if ($format === 'json') {
		print json_encode($repairResult, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
	} else {
		print strtoupper((string) $repairResult['status']) . ' ' . $repairResult['summary'] . ': ' . $repairResult['detail'] . PHP_EOL;
	}

	exit($repairResult['status'] === 'pass' ? 0 : 1);
}

$results = doctor_run_checks();
if (isset($options['symptom'])) {
	$diagnosis = doctor_diagnose((string) $options['symptom'], $results);
	if ($diagnosis === false || !in_array($format, ['text', 'json'], true)) {
		fwrite(STDERR, __('Select a supported symptom and text or JSON output.', 'doctor') . PHP_EOL);
		exit(2);
	}
	print ($format === 'json' ? json_encode($diagnosis, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : doctor_diagnosis_text($diagnosis)) . PHP_EOL;
	exit(0);
}

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
		print str_pad(strtoupper((string) $result['status']), 5) . ' [' . $result['category'] . '] ' . $result['summary'] . ' - ' . $result['detail'] . (doctor_warning_accepted($result) ? ' [' . __('Accepted warning', 'doctor') . ': ' . doctor_redact($result['acceptance']['owner'] . '; ' . $result['acceptance']['reason'] . '; ' . gmdate('Y-m-d', $result['acceptance']['expires'])) . ' UTC]' : '') . PHP_EOL;
	}
}

$counts = doctor_result_counts($results);
exit($counts['fail'] > 0 ? 1 : 0);
