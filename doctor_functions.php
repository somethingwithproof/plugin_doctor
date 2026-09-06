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

/**
 * Run the initial set of non-mutating installation checks.
 *
 * @return array<int,array<string,mixed>>
 */
function doctor_run_checks(): array {
	$results   = [];
	$results[] = doctor_check_cacti_version();
	$results[] = doctor_check_php_version();
	$results[] = doctor_check_php_extensions();
	$results[] = doctor_check_database();
	$results[] = doctor_check_core_tables();
	$results[] = doctor_check_runtime_directories();
	$results[] = doctor_check_rrdtool();
	$results[] = doctor_check_poller_freshness();

	return $results;
}

/**
 * @return array<string,mixed>
 */
function doctor_result(string $id, string $category, string $status, string $summary, string $detail, string $repair = ''): array {
	return [
		'id'         => $id,
		'category'   => $category,
		'status'     => $status,
		'summary'    => $summary,
		'detail'     => $detail,
		'repair'     => $repair,
		'repairable' => $repair !== ''
	];
}

/** @return array<string,mixed> */
function doctor_check_cacti_version(): array {
	$version = defined('CACTI_VERSION') ? (string) CACTI_VERSION : 'unknown';
	$status  = $version !== 'unknown' && version_compare($version, '1.2.20', '>=') ? 'pass' : 'fail';

	return doctor_result('cacti.version', 'Cacti', $status, 'Supported Cacti version', 'Detected ' . $version . '; Doctor requires Cacti 1.2.20 or newer.');
}

/** @return array<string,mixed> */
function doctor_check_php_version(): array {
	$status = version_compare(PHP_VERSION, '8.1.0', '>=') ? 'pass' : 'fail';

	return doctor_result('php.version', 'PHP', $status, 'Supported PHP version', 'Detected PHP ' . PHP_VERSION . '; Cacti Doctor requires PHP 8.1 or newer.');
}

/** @return array<string,mixed> */
function doctor_check_php_extensions(): array {
	$required = ['ctype', 'date', 'filter', 'json', 'mysqli', 'pcre', 'session'];
	$missing  = [];

	foreach ($required as $extension) {
		if (!extension_loaded($extension)) {
			$missing[] = $extension;
		}
	}

	if ($missing !== []) {
		return doctor_result('php.extensions', 'PHP', 'fail', 'Required PHP extensions', 'Missing: ' . implode(', ', $missing) . '. Install them through the operating system package manager.');
	}

	return doctor_result('php.extensions', 'PHP', 'pass', 'Required PHP extensions', 'All baseline extensions are loaded.');
}

/** @return array<string,mixed> */
function doctor_check_database(): array {
	try {
		$answer = db_fetch_cell('SELECT 1');
	} catch (Throwable $error) {
		return doctor_result('database.connection', 'Database', 'fail', 'Database connection', 'Query failed: ' . $error->getMessage());
	}

	return doctor_result('database.connection', 'Database', (int) $answer === 1 ? 'pass' : 'fail', 'Database connection', (int) $answer === 1 ? 'A read-only query completed successfully.' : 'The database returned an unexpected result.');
}

/** @return array<string,mixed> */
function doctor_check_core_tables(): array {
	$required = ['settings', 'host', 'data_template_data', 'poller'];
	$missing  = [];

	foreach ($required as $table) {
		if (!db_table_exists($table, false)) {
			$missing[] = $table;
		}
	}

	$status = $missing === [] ? 'pass' : 'fail';
	$detail = $missing === [] ? 'Core tables used by Cacti are present.' : 'Missing core tables: ' . implode(', ', $missing) . '. Restore or upgrade the database before attempting other repairs.';

	return doctor_result('database.core_tables', 'Database', $status, 'Core database tables', $detail);
}

/**
 * @return array<string,string>
 */
function doctor_runtime_directories(): array {
	$base = defined('CACTI_PATH_BASE') ? (string) CACTI_PATH_BASE : dirname(__DIR__, 2);

	return [
		'cache' => $base . '/cache',
		'log'   => defined('CACTI_PATH_LOG') ? (string) CACTI_PATH_LOG : $base . '/log',
		'rra'   => defined('CACTI_PATH_RRA') ? (string) CACTI_PATH_RRA : $base . '/rra'
	];
}

/** @return array<string,mixed> */
function doctor_check_runtime_directories(): array {
	$problems = [];

	foreach (doctor_runtime_directories() as $name => $path) {
		if (!is_dir($path)) {
			$problems[] = $name . ' is missing (' . $path . ')';
		} elseif (!is_writable($path)) {
			$problems[] = $name . ' is not writable (' . $path . ')';
		}
	}

	if ($problems === []) {
		return doctor_result('filesystem.runtime_directories', 'Filesystem', 'pass', 'Runtime directories', 'The cache, log, and RRA directories exist and are writable.');
	}

	return doctor_result('filesystem.runtime_directories', 'Filesystem', 'fail', 'Runtime directories', implode('; ', $problems), 'runtime_directories');
}

/** @return array<string,mixed> */
function doctor_check_rrdtool(): array {
	$path = (string) read_config_option('path_rrdtool', true);

	if ($path === '') {
		return doctor_result('binary.rrdtool', 'Binaries', 'fail', 'RRDtool executable', 'The RRDtool path is not configured.');
	}

	$status = is_file($path) && is_executable($path) ? 'pass' : 'fail';
	$detail = $status === 'pass' ? 'Executable found at ' . $path . '.' : 'Configured path is missing or not executable: ' . $path;

	return doctor_result('binary.rrdtool', 'Binaries', $status, 'RRDtool executable', $detail);
}

/** @return array<string,mixed> */
function doctor_check_poller_freshness(): array {
	$lastRun = (int) read_config_option('poller_lastrun_1', true);
	$interval = (int) read_config_option('poller_interval', true);
	$interval = $interval > 0 ? $interval : 300;

	if ($lastRun <= 0) {
		return doctor_result('poller.freshness', 'Poller', 'warn', 'Main poller freshness', 'No completed main-poller timestamp was found. This can be expected before the first poll.');
	}

	$age       = max(0, time() - $lastRun);
	$threshold = max(900, $interval * 3);
	$status    = $age <= $threshold ? 'pass' : 'fail';
	$detail    = 'Last completed run was ' . $age . ' seconds ago; failure threshold is ' . $threshold . ' seconds.';

	return doctor_result('poller.freshness', 'Poller', $status, 'Main poller freshness', $detail);
}

/**
 * @return array<string,array<string,string>>
 */
function doctor_available_repairs(): array {
	return [
		'runtime_directories' => [
			'label'       => 'Repair runtime directories',
			'description' => 'Create missing cache, log, and RRA directories and add owner read/write/execute permission without removing existing permissions.'
		]
	];
}

/**
 * Run one allow-listed repair and return its outcome.
 *
 * @return array<string,mixed>
 */
function doctor_run_repair(string $repair): array {
	if (!isset(doctor_available_repairs()[$repair])) {
		return doctor_result('repair.' . $repair, 'Repair', 'fail', 'Unknown repair', 'The requested repair is not allow-listed.');
	}

	if ($repair === 'runtime_directories') {
		return doctor_repair_runtime_directories();
	}

	return doctor_result('repair.' . $repair, 'Repair', 'fail', 'Repair unavailable', 'No repair handler is registered.');
}

/** @return array<string,mixed> */
function doctor_repair_runtime_directories(): array {
	$base = realpath(defined('CACTI_PATH_BASE') ? (string) CACTI_PATH_BASE : dirname(__DIR__, 2));

	if ($base === false) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', 'Repair runtime directories', 'The Cacti base directory cannot be resolved.');
	}

	$errors = [];

	foreach (doctor_runtime_directories() as $name => $path) {
		$parent = realpath(dirname($path));

		if ($parent === false || ($parent !== $base && strpos($parent . '/', $base . '/') !== 0)) {
			$errors[] = $name . ': path is outside the Cacti installation';
			continue;
		}

		if (is_link($path)) {
			$errors[] = $name . ': symbolic links are not repaired';
			continue;
		}

		if (!file_exists($path) && !mkdir($path, 0775, false)) {
			$errors[] = $name . ': directory creation failed';
			continue;
		}

		$mode = fileperms($path);
		if ($mode === false || (!is_writable($path) && !chmod($path, ($mode & 0777) | 0700))) {
			$errors[] = $name . ': could not add owner permissions';
		}
	}

	clearstatcache();

	if ($errors !== []) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', 'Repair runtime directories', implode('; ', $errors));
	}

	return doctor_result('repair.runtime_directories', 'Repair', 'pass', 'Repair runtime directories', 'Runtime directories now exist and are writable by the current process.');
}

/**
 * @param array<int,array<string,mixed>> $results
 * @return array<string,int>
 */
function doctor_result_counts(array $results): array {
	$counts = ['pass' => 0, 'warn' => 0, 'fail' => 0];

	foreach ($results as $result) {
		$status = (string) ($result['status'] ?? 'fail');
		if (isset($counts[$status])) {
			$counts[$status]++;
		}
	}

	return $counts;
}
