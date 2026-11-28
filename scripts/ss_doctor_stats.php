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

/**
 * Return the ordered list of Cacti script-server telemetry metric keys emitted
 * by Doctor self-graphing.
 *
 * @return array<int,string>
 */
function doctor_script_server_metric_keys() {
	return array(
		'checks_total',
		'checks_ok',
		'checks_warn',
		'checks_fail',
		'root_causes',
		'suppressed_symptoms',
		'plugin_checks'
	);
}

/**
 * Return an all-unknown ('U') metric map used when diagnostics cannot execute,
 * preventing false zeros in Cacti RRD graphs.
 *
 * @return array<string,string>
 */
function doctor_script_server_unknown_metrics() {
	$metrics = array();
	foreach (doctor_script_server_metric_keys() as $key) {
		$metrics[$key] = 'U';
	}

	return $metrics;
}

/**
 * Compute safe, secret-free aggregate telemetry counters from a Doctor check
 * result set.
 *
 * @param mixed $results
 * @return array<string,int|string>
 */
function doctor_stats_from_results($results) {
	if (!is_array($results)) {
		return doctor_script_server_unknown_metrics();
	}

	$checksTotal  = 0;
	$checksOk     = 0;
	$checksWarn   = 0;
	$checksFail   = 0;
	$pluginChecks = 0;

	foreach ($results as $result) {
		if (!is_array($result) || !isset($result['status']) || !is_string($result['status'])) {
			continue;
		}

		$checksTotal++;
		$status = $result['status'];
		if ($status === 'pass' || $status === 'ok') {
			$checksOk++;
		} elseif ($status === 'warn') {
			$checksWarn++;
		} elseif ($status === 'fail') {
			$checksFail++;
		}

		if (isset($result['plugin'])
			&& is_string($result['plugin'])
			&& $result['plugin'] !== ''
			&& $result['plugin'] !== 'doctor') {
			$pluginChecks++;
		}
	}

	$rootCauses         = 0;
	$suppressedSymptoms = 0;
	if (function_exists('doctor_dependency_summary')) {
		$summary            = doctor_dependency_summary($results);
		$rootCauses         = (int) $summary['root_cause_count'];
		$suppressedSymptoms = (int) $summary['suppressed_count'];
	}

	return array(
		'checks_total'        => $checksTotal,
		'checks_ok'           => $checksOk,
		'checks_warn'         => $checksWarn,
		'checks_fail'         => $checksFail,
		'root_causes'         => $rootCauses,
		'suppressed_symptoms' => $suppressedSymptoms,
		'plugin_checks'       => $pluginChecks
	);
}

/**
 * Format Doctor self-graphing counters as a Cacti script-server field:value
 * telemetry line. Only non-negative integers and RRDtool 'U' are emitted.
 *
 * @param array<string,int|string> $metrics
 * @return string
 */
function doctor_format_script_server_metrics($metrics) {
	$parts = array();

	foreach (doctor_script_server_metric_keys() as $key) {
		$raw   = isset($metrics[$key]) ? $metrics[$key] : 'U';
		$value = (is_int($raw) && $raw >= 0) ? (string) $raw : 'U';
		$parts[] = $key . ':' . $value;
	}

	return implode(' ', $parts);
}

/**
 * Cacti PHP Script Server entry point emitting secret-free Doctor diagnostic
 * telemetry as space-separated field:value pairs.
 *
 * @param array<int,array<string,mixed>>|null $results Optional precomputed check results for testing.
 * @return string
 */
function ss_doctor_stats($results = null) {
	try {
		if ($results === null) {
			if (!function_exists('doctor_run_checks')) {
				require_once dirname(__DIR__) . '/doctor_functions.php';
			}
			$results = doctor_run_checks();
		}

		return doctor_format_script_server_metrics(doctor_stats_from_results($results));
	} catch (Exception $error) {
		return doctor_format_script_server_metrics(doctor_script_server_unknown_metrics());
	} catch (Throwable $error) {
		return doctor_format_script_server_metrics(doctor_script_server_unknown_metrics());
	}
}

if (!isset($called_by_script_server)
	&& PHP_SAPI === 'cli'
	&& isset($_SERVER['SCRIPT_FILENAME'])
	&& realpath((string) $_SERVER['SCRIPT_FILENAME']) === realpath(__FILE__)) {
	$cactiBase = dirname(dirname(dirname(__DIR__)));
	if (is_file($cactiBase . '/include/cli_check.php')) {
		chdir($cactiBase);
		include_once './include/cli_check.php';
		include_once './plugins/doctor/doctor_functions.php';
		print ss_doctor_stats() . PHP_EOL;
	} else {
		print doctor_format_script_server_metrics(doctor_script_server_unknown_metrics()) . PHP_EOL;
	}
}
