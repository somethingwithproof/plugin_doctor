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

require_once __DIR__ . '/doctor_scheduling.php';

/**
 * Run the initial set of non-mutating installation checks.
 *
 * @return array<int,array<string,mixed>>
 */
function doctor_run_checks(&$databaseSample = null, $previousDatabaseSample = []) {
	$results   = [];
	$results[] = doctor_check_privileges(doctor_running_as_root());
	$results[] = doctor_check_cacti_version();
	$results[] = doctor_check_schema_version();
	$results[] = doctor_check_php_version();
	$results[] = doctor_check_php_security_baseline();
	$results[] = doctor_check_php_extensions();
	$results[] = doctor_check_cli_php_extensions();
	$results[] = doctor_check_optional_php_extensions();
	$results[] = doctor_check_php_configuration();
	$results[] = doctor_check_database();
	$results[] = doctor_check_database_version();
	$results[] = doctor_check_database_charset();
	$results[] = doctor_check_database_timezone_support();
	$results[] = doctor_check_clock();
	$results[] = doctor_check_innodb();
	$results   = array_merge($results, doctor_check_database_health($databaseSample, $previousDatabaseSample));
	$results[] = doctor_check_core_tables();
	$results[] = doctor_check_plugin_files();
	$results[] = doctor_check_runtime_directories();
	$results[] = doctor_check_disk_space();
	$results[] = doctor_check_rrd_files();
	$results[] = doctor_check_config_file_security();
	$results[] = doctor_check_cacti_log();
	$results[] = doctor_check_recent_log_errors();
	$results   = array_merge($results, doctor_check_required_binaries());
	$results[] = doctor_check_poller_configuration();
	$results[] = doctor_check_spine_config();
	$results[] = doctor_check_poller_freshness();
	$results[] = doctor_check_poller_runtime();
	$results[] = doctor_check_poller_output();
	$results[] = doctor_check_remote_pollers();
	$results[] = doctor_check_boost();
	$results[] = doctor_check_devices();
	$results[] = doctor_check_schedule(time());
	$results[] = doctor_check_alert_delivery(time());

	return $results;
}

/**
 * @return array<string,mixed>
 */
function doctor_result($id, $category, $status, $summary, $detail, $repair = '', $assessment = 'assessed') {
	return [
		'id'         => $id,
		'category'   => $category,
		'status'     => $status,
		'summary'    => $summary,
		'detail'     => $detail,
		'repair'     => $repair,
		'repairable' => $repair !== '',
		'assessment' => $assessment
	];
}

/**
 * Collect health counters and the thread-handling mode, never query text or accounts.
 * Two bounded reads cover the entire analysis on the existing Cacti connection.
 *
 * @return array<int,array<string,mixed>>
 */
function doctor_check_database_health(&$sample = null, $previous = []) {
	$statusNames = ['Uptime', 'Uptime_since_flush_status', 'Threads_connected', 'Max_used_connections', 'Connections', 'Threads_created', 'Innodb_buffer_pool_read_requests', 'Innodb_buffer_pool_reads', 'Created_tmp_tables', 'Created_tmp_disk_tables', 'Innodb_log_waits', 'Queries', 'Slow_queries'];
	$variableNames = ['max_connections', 'thread_handling'];
	$status = db_fetch_assoc("SHOW GLOBAL STATUS WHERE Variable_name IN ('" . implode("', '", $statusNames) . "')", false);
	$variables = db_fetch_assoc("SHOW GLOBAL VARIABLES WHERE Variable_name IN ('" . implode("', '", $variableNames) . "')", false);

	$metrics = doctor_database_metrics($status, $statusNames);
	$variables = doctor_database_metrics($variables, $variableNames);
	$sample = ['captured' => time(), 'metrics' => $metrics];
	return doctor_analyze_database_health($metrics, $variables, $previous);
}

/** @return array<string,float|string|null> */
function doctor_database_metrics($rows, $allowed) {
	$numbers = [];
	$allowed = array_map('strtolower', $allowed);

	if (!is_array($rows)) {
		return $numbers;
	}

	foreach ($rows as $row) {
		if (!is_array($row) || !isset($row['Variable_name']) || !is_string($row['Variable_name'])) {
			continue;
		}

		$name = strtolower($row['Variable_name']);
		if (!in_array($name, $allowed, true)) {
			continue;
		}

		// Conflicting/duplicate rows and malformed counters are unknown, not zero.
		if (array_key_exists($name, $numbers)) {
			$numbers[$name] = null;
			continue;
		}

		$numbers[$name] = null;
		if (!isset($row['Value']) || (!is_string($row['Value']) && !is_int($row['Value']))) {
			continue;
		}

		$value = (string) $row['Value'];
		if ($name === 'thread_handling') {
			if (in_array($value, ['one-thread-per-connection', 'pool-of-threads', 'loaded-dynamically', 'no-threads'], true)) {
				$numbers[$name] = $value;
			}
		} elseif (strlen($value) <= 16 && preg_match('/\A[0-9]+\z/', $value) && (float) $value <= 9007199254740991.0) {
			$numbers[$name] = (float) $value;
		}
	}

	return $numbers;
}

/**
 * Advisory thresholds are investigation triggers, not configuration targets.
 * Cumulative counters cannot establish current load or available database RAM.
 *
 * @param array<string,float|null> $status
 * @param array<string,float|string|null> $variables
 * @return array<int,array<string,mixed>>
 */
function doctor_analyze_database_health($status, $variables, $previous = []) {
	$results = [];
	$sampleReady = isset($status['uptime'], $status['uptime_since_flush_status'])
		&& $status['uptime'] >= 86400 && $status['uptime_since_flush_status'] >= 86400
		&& $status['uptime_since_flush_status'] <= $status['uptime'];
	$sampleDetail = $sampleReady
		? __('At least 24 hours since server startup and FLUSH STATUS. Counters are cumulative and may have different reset histories; confirm trends during a representative workload before tuning.', 'doctor')
		: __('Cumulative tuning advice is deferred: obtain valid uptime and at least 24 hours since startup and FLUSH STATUS. Missing metrics or an inconsistent sample cannot establish database health.', 'doctor');
	$results[] = doctor_result('database.health_sample', 'Database health', $sampleReady ? 'pass' : 'warn', __('Database observation window', 'doctor'), $sampleDetail);
	$sample = isset($previous['metrics'], $previous['captured']) && is_array($previous['metrics']) && is_numeric($previous['captured'])
		? $previous : [];
	$deltaReady = $sampleReady && $sample !== [] && isset($status['uptime'], $sample['metrics']['uptime'])
		&& $status['uptime'] >= $sample['metrics']['uptime'] && isset($sample['captured']) && time() > (int) $sample['captured'];

	$connectionStatus = 'warn';
	$connectionDetail = __('Connection metrics are unavailable or invalid. Check access to SHOW GLOBAL STATUS and SHOW GLOBAL VARIABLES; do not treat missing metrics as an idle server.', 'doctor');
	if (isset($status['threads_connected'], $status['max_used_connections'], $variables['max_connections']) && $variables['max_connections'] > 0) {
		$current = 100 * $status['threads_connected'] / $variables['max_connections'];
		$peak = 100 * $status['max_used_connections'] / $variables['max_connections'];
		$connectionStatus = $current >= 80 || $peak >= 80 ? 'warn' : 'pass';
		$connectionDetail = __('Current connections: %.0f / %.0f (%s); recorded peak: %.0f (%s of the current limit).', $status['threads_connected'], $variables['max_connections'], sprintf('%.1f%%', $current), $status['max_used_connections'], sprintf('%.1f%%', $peak), 'doctor');
		if ($connectionStatus === 'warn') {
			$connectionDetail .= ' ' . __('Review connection pooling and poller concurrency. Check database-host memory headroom before raising max_connections; the historical peak may reflect an older limit.', 'doctor');
		}
	}
	$results[] = doctor_result('database.connection_capacity', 'Database health', $connectionStatus, __('Connection capacity', 'doctor'), $connectionDetail);

	$rules = [
		['buffer_pool_reads', __('InnoDB buffer pool reads', 'doctor'), 'innodb_buffer_pool_reads', 'innodb_buffer_pool_read_requests', 10000, 1, __('Review query plans and the working set. Consider innodb_buffer_pool_size only after measuring memory available on the database host; a cumulative miss ratio alone does not prove memory pressure.', 'doctor')],
		['temporary_tables', __('On-disk temporary tables', 'doctor'), 'created_tmp_disk_tables', 'created_tmp_tables', 1000, 25, __('Review query plans, sorting, grouping, and temporary-table data types before changing memory limits. Some tables must use disk; memory limits and accounting differ between MySQL and MariaDB versions.', 'doctor')],
		['thread_cache', __('Connection thread creation', 'doctor'), 'threads_created', 'connections', 1000, 5, __('Review connection reuse and thread_cache_size. Check the server thread-handling mode before tuning; thread-pool implementations do not behave like one-thread-per-connection servers.', 'doctor')],
		['slow_queries', __('Slow statements', 'doctor'), 'slow_queries', 'queries', 1000, 1, __('Review slow-query logging, long_query_time, and query plans before changing server buffers. This counter depends on the configured slow-query threshold and does not identify individual statements.', 'doctor')]
	];

	foreach ($rules as $rule) {
		list($id, $title, $numerator, $denominator, $minimum, $limit, $advice) = $rule;
		$level = 'warn';
		$detail = __('Cumulative advice deferred until the observation window is sufficient.', 'doctor');
		$assessment = 'not_assessed';
		if ($id === 'thread_cache' && (!isset($variables['thread_handling']) || $variables['thread_handling'] !== 'one-thread-per-connection')) {
			$detail = __('Thread-cache advice is not assessed: thread_handling is unavailable or is not one-thread-per-connection. Review the active thread-pool implementation instead.', 'doctor');
		} elseif ($sampleReady) {
			if (!isset($status[$numerator], $status[$denominator])) {
			$detail = __('Required counters are missing or invalid: %s, %s. Check server-version support and monitoring permissions.', $numerator, $denominator, 'doctor');
			$assessment = 'not_assessed';
			} elseif ($deltaReady && (isset($sample['metrics'][$numerator], $sample['metrics'][$denominator])
				&& ($status[$numerator] < $sample['metrics'][$numerator] || $status[$denominator] < $sample['metrics'][$denominator]))) {
				$detail = __('A counter reset since the prior sample; collect another representative interval before tuning.', 'doctor');
				$results[] = doctor_result('database.' . $id, 'Database health', 'warn', $title, $detail, '', 'not_assessed');
				continue;
			} elseif ($status[$denominator] < $minimum) {
				$detail = __('Insufficient activity: %.0f %s; at least %d observations are needed for this advisory.', $status[$denominator], $denominator, $minimum, 'doctor');
			} elseif ($status[$numerator] > $status[$denominator]) {
				$detail = __('Counters are inconsistent or were reset independently. Collect a new representative sample before tuning.', 'doctor');
			} else {
				$assessment = 'assessed';
				$values = [$status[$numerator], $status[$denominator]];
				$interval = $deltaReady && isset($sample['metrics'][$numerator], $sample['metrics'][$denominator]);
				if ($interval) {
					$values = [$status[$numerator] - $sample['metrics'][$numerator], $status[$denominator] - $sample['metrics'][$denominator]];
				}
				if ($values[1] < $minimum || $values[0] > $values[1]) {
				$detail = __('The interval sample is too small or counters reset; collect another representative interval before tuning.', 'doctor');
				$results[] = doctor_result('database.' . $id, 'Database health', 'warn', $title, $detail, '', 'not_assessed');
					continue;
				}
				$ratio = 100 * $values[0] / $values[1];
				$level = $ratio >= $limit ? 'warn' : 'pass';
				$detail = $interval
					? __('Interval %s / %s: %.0f / %.0f (%s); investigation threshold: %s.', $numerator, $denominator, $values[0], $values[1], sprintf('%.1f%%', $ratio), sprintf('%d%%', $limit), 'doctor')
					: __('Cumulative %s / %s: %.0f / %.0f (%s); investigation threshold: %s.', $numerator, $denominator, $values[0], $values[1], sprintf('%.1f%%', $ratio), sprintf('%d%%', $limit), 'doctor');
				if ($id === 'temporary_tables') {
					$detail .= ' ' . __('This counter can omit memory-mapped temporary files on MySQL; a low ratio does not rule out disk use.', 'doctor');
				}
				if ($level === 'warn') {
					$detail .= ' ' . $advice;
				}
			}
		}
		$results[] = doctor_result('database.' . $id, 'Database health', $level, $title, $detail, '', $assessment);
	}

	$redoLevel = 'warn';
	$redoDetail = __('Redo-log advice deferred until the observation window is sufficient and Innodb_log_waits is available.', 'doctor');
	if ($sampleReady && isset($status['innodb_log_waits'])) {
		$redoLevel = $status['innodb_log_waits'] > 0 ? 'warn' : 'pass';
		$redoDetail = __('Cumulative Innodb_log_waits: %.0f.', $status['innodb_log_waits'], 'doctor');
		if ($redoLevel === 'warn') {
			$redoDetail .= ' ' . __('Investigate transaction sizes, log-buffer pressure, and storage latency. Recheck the rate under load before considering innodb_log_buffer_size; this historical count is not evidence of a current stall.', 'doctor');
		}
	}
	$results[] = doctor_result('database.redo_log_waits', 'Database health', $redoLevel, __('InnoDB log-buffer waits', 'doctor'), $redoDetail);

	return $results;
}

function doctor_html_escape_attr($value) {
	if (function_exists('html_escape_attr')) {
		return html_escape_attr($value);
	}

	return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function doctor_parent_directory($path, $levels) {
	while ($levels > 0) {
		$path = dirname($path);
		$levels--;
	}

	return $path;
}

function doctor_is_cacti_13($cactiVersion = null) {
	if ($cactiVersion === null) {
		$cactiVersion = defined('CACTI_VERSION') ? (string) CACTI_VERSION : '';
	}

	return $cactiVersion !== '' && version_compare($cactiVersion, '1.3.0', '>=');
}

/**
 * Read the installed Cacti package, not Doctor's own PHP compatibility floor.
 * Only the constraint forms used by supported Cacti packages are interpreted.
 */
function doctor_php_requirement($base = null, $cactiVersion = null) {
	$base = $base === null ? doctor_base_path() : $base;
	$cactiVersion = $cactiVersion === null ? (defined('CACTI_VERSION') ? (string) CACTI_VERSION : 'unknown') : $cactiVersion;
	$requirement = ['cacti' => $cactiVersion, 'minimum' => '', 'maximum' => '', 'source' => ''];
	$manifest = $base . '/composer.json';

	if (file_exists($manifest) || is_link($manifest)) {
		$contents = is_file($manifest) ? @file_get_contents($manifest, false, null, 0, 1048577) : false;
		$data = is_string($contents) && strlen($contents) <= 1048576 ? json_decode($contents, true) : null;
		if (!is_array($data) || !isset($data['require']) || !is_array($data['require']) || !isset($data['require']['php']) || !is_string($data['require']['php'])) {
			return $requirement;
		}
		$constraint = trim($data['require']['php']);
		if (!preg_match('/\A(>=|\^)\s*([1-9][0-9]?)\.([0-9]{1,2})(?:\.([0-9]{1,4}))?\z/', $constraint, $match)) {
			return $requirement;
		}
		$requirement['minimum'] = $match[2] . '.' . $match[3] . '.' . (isset($match[4]) ? $match[4] : '0');
		$requirement['maximum'] = $match[1] === '^' ? ((int) $match[2] + 1) . '.0.0' : '';
		$requirement['source'] = __('installed Cacti composer.json', 'doctor');
	} elseif (preg_match('/\A1\.2\.(2[0-9]|30)\z/', $cactiVersion)) {
		// These legacy releases have no root Composer PHP requirement; their installer uses 5.4.
		$requirement['minimum'] = '5.4.0';
		$requirement['source'] = __('Cacti %s installer requirement', $cactiVersion, 'doctor');
	}

	return $requirement;
}

function doctor_evaluate_php_compatibility($phpVersion, $requirement) {
	$summary = __('PHP compatibility with installed Cacti', 'doctor');
	$detail = __('Running PHP %s; installed Cacti %s.', $phpVersion, $requirement['cacti'], 'doctor') . ' ';
	if ($requirement['minimum'] === '') {
		return doctor_result('php.version', 'PHP', 'warn', $summary, $detail . __('Could not establish Cacti\'s PHP requirement. Check the installed Cacti composer.json or release documentation; Doctor does not assume compatibility.', 'doctor'));
	}
	$compatible = version_compare($phpVersion, $requirement['minimum'], '>=')
		&& ($requirement['maximum'] === '' || version_compare($phpVersion, $requirement['maximum'], '<'));
	$range = $requirement['maximum'] !== ''
		? __('PHP >= %s and < %s', $requirement['minimum'], $requirement['maximum'], 'doctor')
		: __('PHP >= %s', $requirement['minimum'], 'doctor');
	$detail .= $compatible
		? __('Requires %s (%s). Running PHP meets that requirement.', $range, $requirement['source'], 'doctor')
		: __('Requires %s (%s). Running PHP does not meet that requirement.', $range, $requirement['source'], 'doctor');

	return doctor_result('php.version', 'PHP', $compatible ? 'pass' : 'fail', $summary, $detail);
}

// Cacti only warns below these, from the version row in utilities_get_mysql_recommendations().
function doctor_database_recommended_version($server, $cactiVersion = null) {
	if (!doctor_is_cacti_13($cactiVersion)) {
		return '5.6.0';
	}

	return $server === 'MariaDB' ? '10.11.0' : '8.4.0';
}

// Cacti 1.2.20, the oldest supported release, documents no Net-SNMP version.
function doctor_snmp_recommended_version($cactiVersion = null) {
	return doctor_is_cacti_13($cactiVersion) ? '5.9.0' : '';
}

/**
 * Cacti lists every RRDtool release it can drive in $rrdtool_versions, oldest
 * first. The fallbacks match the first entry on 1.2.x and develop.
 */
function doctor_rrdtool_minimum_version($cactiVersion = null) {
	global $rrdtool_versions;

	if (isset($rrdtool_versions) && is_array($rrdtool_versions) && cacti_sizeof($rrdtool_versions)) {
		$versions = array_keys($rrdtool_versions);

		return (string) $versions[0];
	}

	return doctor_is_cacti_13($cactiVersion) ? '1.5.0' : '1.3.0';
}

/** @return array<string,mixed> */
function doctor_check_cacti_version() {
	$version = defined('CACTI_VERSION') ? (string) CACTI_VERSION : 'unknown';
	$status  = $version !== 'unknown' && version_compare($version, '1.2.20', '>=') ? 'pass' : 'fail';

	return doctor_result('cacti.version', 'Cacti', $status, __('Supported Cacti version', 'doctor'), __('Detected %s; Doctor requires Cacti 1.2.20 or newer.', $version, 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_php_version($phpVersion = null, $base = null, $cactiVersion = null) {
	return doctor_evaluate_php_compatibility($phpVersion === null ? PHP_VERSION : $phpVersion, doctor_php_requirement($base, $cactiVersion));
}

function doctor_check_php_security_baseline($phpVersion = null, $today = null) {
	$phpVersion = $phpVersion === null ? PHP_VERSION : $phpVersion;
	$today = $today === null ? gmdate('Y-m-d') : $today;
	$summary = __('PHP upstream security support', 'doctor');
	$scope = ' ' . __('This checks the PHP release branch, not whether this patch release is up to date or whether your OS vendor backports fixes. Cacti compatibility is checked separately.', 'doctor');
	// php.net/supported-versions.php and php.net/eol.php, verified 2026-11-08.
	$securityEnds = [
		'5.4' => '2015-09-03', '5.5' => '2016-07-21', '5.6' => '2018-12-31',
		'7.0' => '2019-01-10', '7.1' => '2019-12-01', '7.2' => '2020-11-30',
		'7.3' => '2021-12-06', '7.4' => '2022-11-28', '8.0' => '2023-11-26',
		'8.1' => '2025-12-31', '8.2' => '2026-12-31', '8.3' => '2027-12-31',
		'8.4' => '2028-12-31', '8.5' => '2029-12-31'
	];
	if (!preg_match('/\A([0-9]+\.[0-9]+)\.[0-9]+(?:[-+].*)?\z/', $phpVersion, $match)
		|| preg_match('/alpha|beta|rc|dev/i', $phpVersion) || !isset($securityEnds[$match[1]])) {
		return doctor_result('php.security_baseline', 'Security', 'warn', $summary, __('Running PHP %s; upstream security-support status is unknown or this is a prerelease. Check https://www.php.net/supported-versions.php and update Doctor\'s support data.', $phpVersion, 'doctor') . $scope);
	}
	$end = $securityEnds[$match[1]];
	$supported = $today <= $end;
	$detail = $supported
		? __('Running PHP %s; PHP %s receives upstream security fixes through %s.', $phpVersion, $match[1], $end, 'doctor')
		: __('Running PHP %s; PHP %s no longer receives upstream security fixes; support ended %s. Upgrade to a supported PHP branch compatible with your Cacti installation, or confirm security maintenance with your OS vendor.', $phpVersion, $match[1], $end, 'doctor');

	return doctor_result('php.security_baseline', 'Security', $supported ? 'pass' : 'warn', $summary, $detail . $scope);
}

/** @return array<string,mixed> */
function doctor_check_php_extensions() {
	$required = doctor_required_php_extensions();
	$missing  = [];
	$summary  = PHP_SAPI === 'cli' ? __('Required current CLI PHP extensions', 'doctor') : __('Required web PHP extensions', 'doctor');

	foreach ($required as $extension) {
		if (!extension_loaded($extension)) {
			$missing[] = $extension;
		}
	}

	if ($missing !== []) {
		return doctor_result('php.extensions', 'Prerequisites', 'fail', $summary, __('Missing: %s. Install them through the operating system package manager.', implode(', ', $missing), 'doctor'));
	}

	return doctor_result('php.extensions', 'Prerequisites', 'pass', $summary, __('All PHP extensions required by the Cacti installer are loaded in this PHP context.', 'doctor'));
}

/** @return array<int,string> */
function doctor_required_php_extensions($cli = false) {
	$required = [
		'ctype', 'date', 'filter', 'gd', 'gmp', 'hash', 'json',
		'ldap', 'mbstring', 'openssl', 'pcre', 'PDO', 'pdo_mysql',
		'session', 'simplexml', 'sockets', 'spl', 'standard', 'xml', 'zlib'
	];

	if (doctor_is_cacti_13()) {
		$required[] = 'curl';
		$required[] = 'intl';
	}

	if (defined('CACTI_SERVER_OS') && CACTI_SERVER_OS === 'unix') {
		$required[] = 'posix';
		if ($cli && doctor_is_cacti_13()) {
			$required[] = 'pcntl';
		}
	} elseif (defined('CACTI_SERVER_OS') && CACTI_SERVER_OS === 'win32') {
		$required[] = 'com_dotnet';
	}

	return $required;
}

function doctor_running_as_root() {
	$windows = defined('CACTI_SERVER_OS') ? CACTI_SERVER_OS === 'win32' : DIRECTORY_SEPARATOR === '\\';

	return doctor_effective_user_is_root(function_exists('posix_geteuid') ? posix_geteuid() : null, $windows);
}

/**
 * Windows has no root account. Elsewhere an undeterminable user is treated as
 * root so a missing posix extension cannot unlock binary execution or repairs.
 */
function doctor_effective_user_is_root($euid, $windows) {
	if ($windows) {
		return false;
	}

	return $euid === null || $euid === 0;
}

function doctor_shell_exec_available() {
	return function_exists('shell_exec') && (!function_exists('is_function_enabled') || is_function_enabled('shell_exec'));
}

/**
 * Explain why Doctor will not execute a binary named in the settings table,
 * or return an empty string when it may.
 *
 * Anyone who can write the settings table could otherwise choose what Doctor
 * runs, and the CLI is often started as root. Cacti 1.2.x applies a similar
 * file-name rule to path_php_binary. php-cgi and php-fpm are excluded because
 * they do not accept -r.
 */
function doctor_binary_execution_refusal($option, $path, $privileged) {
	$names = [
		'path_php_binary' => '/^php(?:-win)?[0-9.]*(?:\.exe)?$/i',
		'path_rrdtool'    => '/^rrdtool(?:-?[0-9.]+)?(?:\.exe)?$/i',
		'path_snmpget'    => '/^snmpget(?:-?[0-9.]+)?(?:\.exe)?$/i',
		'path_snmpwalk'   => '/^snmpwalk(?:-?[0-9.]+)?(?:\.exe)?$/i'
	];

	if ($privileged) {
		return __('Doctor does not execute configured binaries while running as root.', 'doctor');
	}

	if (!isset($names[$option]) || !preg_match($names[$option], basename($path))) {
		return __('The file name %s is not expected for %s, so Doctor did not execute it.', basename($path), $option, 'doctor');
	}

	return '';
}

/** @return array<string,mixed> */
function doctor_check_privileges($privileged) {
	if ($privileged) {
		return doctor_result('doctor.privileges', 'Doctor', 'warn', __('Doctor privileges', 'doctor'), __('Doctor is running as root, so permission checks describe root rather than the web server or poller account, configured binaries are not executed, and repairs are refused. Run Doctor as the Cacti poller user.', 'doctor'));
	}

	return doctor_result('doctor.privileges', 'Doctor', 'pass', __('Doctor privileges', 'doctor'), __('Doctor is running without root privileges.', 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_cli_php_extensions($privileged = null) {
	$privileged = $privileged === null ? doctor_running_as_root() : $privileged;
	$path       = (string) read_config_option('path_php_binary', true);

	if ($path === '' || !is_file($path) || !is_executable($path)) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'fail', __('Required CLI PHP extensions', 'doctor'), __('The configured PHP CLI executable is unavailable, so its extensions cannot be checked.', 'doctor'));
	}

	$refusal = doctor_binary_execution_refusal('path_php_binary', $path, $privileged);

	if ($refusal !== '') {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'warn', __('Required CLI PHP extensions', 'doctor'), $refusal);
	}

	if (!doctor_shell_exec_available()) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'warn', __('Required CLI PHP extensions', 'doctor'), __('shell_exec() is disabled, so Doctor cannot compare the CLI PHP extensions with Cacti requirements.', 'doctor'));
	}

	$code   = 'echo json_encode(get_loaded_extensions());';
	// Startup warnings, such as an extension loaded twice, print to stdout by default and would corrupt the JSON.
	// The path passed doctor_binary_execution_refusal() and both arguments are escaped constants.
	$output = @shell_exec(cacti_escapeshellarg($path) . ' -d display_errors=stderr -d display_startup_errors=0 -r ' . cacti_escapeshellarg($code)); // nosemgrep: php.lang.security.exec-use.exec-use
	$loaded = is_string($output) ? json_decode($output, true) : null;

	if (!is_array($loaded)) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'fail', __('Required CLI PHP extensions', 'doctor'), __('The configured PHP CLI executable did not return a valid extension list.', 'doctor'));
	}

	$loaded  = array_map('strtolower', $loaded);
	$missing = [];

	foreach (doctor_required_php_extensions(true) as $extension) {
		if (!in_array(strtolower($extension), $loaded, true)) {
			$missing[] = $extension;
		}
	}

	if ($missing !== []) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'fail', __('Required CLI PHP extensions', 'doctor'), __('Missing from CLI PHP: %s. The web and CLI PHP configurations are separate on many systems.', implode(', ', $missing), 'doctor'));
	}

	return doctor_result('php.cli_extensions', 'Prerequisites', 'pass', __('Required CLI PHP extensions', 'doctor'), __('The configured PHP CLI has every extension required by Cacti.', 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_optional_php_extensions() {
	$missing = [];

	foreach (['gettext', 'snmp'] as $extension) {
		if (!extension_loaded($extension)) {
			$missing[] = $extension;
		}
	}

	if (!function_exists('imagettfbbox') || !function_exists('imagettftext')) {
		$missing[] = __('GD TrueType support', 'doctor');
	}

	if ($missing !== []) {
		return doctor_result('php.optional_extensions', 'Prerequisites', 'warn', __('Recommended PHP features', 'doctor'), __('Unavailable: %s. Cacti can run without these features, but related functionality may be limited.', implode(', ', $missing), 'doctor'));
	}

	return doctor_result('php.optional_extensions', 'Prerequisites', 'pass', __('Recommended PHP features', 'doctor'), __('The optional gettext, SNMP, and GD TrueType features are available.', 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_php_configuration() {
	return doctor_evaluate_php_configuration((string) ini_get('memory_limit'), (int) ini_get('max_execution_time'), (string) ini_get('date.timezone'), PHP_VERSION);
}

/**
 * Apply the thresholds from Cacti's utility_php_verify_recommends(). The
 * timezone comes from date.timezone because date_default_timezone_get()
 * silently falls back to UTC when it is unset.
 *
 * @return array<string,mixed>
 */
function doctor_evaluate_php_configuration($memoryRaw, $execution, $timezone, $phpVersion) {
	$memory      = doctor_ini_bytes($memoryRaw);
	$recommended = version_compare($phpVersion, '7.0.0', '<') ? 800 : 400;
	$problems    = [];

	if ($memory > 0 && $memory < $recommended * 1024 * 1024) {
		$problems[] = __('memory_limit is %s (%dM or more is recommended)', $memoryRaw, $recommended, 'doctor');
	}

	if ($execution > 0 && $execution < 60) {
		$problems[] = __('max_execution_time is %d seconds (60 or more is recommended)', $execution, 'doctor');
	}

	if ($timezone === '') {
		$problems[] = __('date.timezone is not set', 'doctor');
	}

	$detail = 'memory_limit=' . $memoryRaw . ', max_execution_time=' . $execution . ', date.timezone=' . ($timezone !== '' ? $timezone : __('unset', 'doctor')) . '.';

	if ($problems !== []) {
		return doctor_result('php.configuration', 'Prerequisites', 'warn', __('PHP runtime configuration', 'doctor'), __('%s. Current values: %s', implode('; ', $problems), $detail, 'doctor'));
	}

	return doctor_result('php.configuration', 'Prerequisites', 'pass', __('PHP runtime configuration', 'doctor'), $detail);
}

function doctor_ini_bytes($value) {
	$value = trim($value);

	if ($value === '' || $value === '-1') {
		return $value === '-1' ? -1 : 0;
	}

	$unit   = strtolower(substr($value, -1));
	$number = (float) $value;

	if ($unit === 'g') {
		$number *= 1024;
	}

	if ($unit === 'g' || $unit === 'm') {
		$number *= 1024;
	}

	if ($unit === 'g' || $unit === 'm' || $unit === 'k') {
		$number *= 1024;
	}

	return (int) $number;
}

/** @return array<string,mixed> */
function doctor_check_database() {
	try {
		$answer = db_fetch_cell('SELECT 1');
	} catch (Exception $error) {
		return doctor_result('database.connection', 'Database', 'fail', __('Database connection', 'doctor'), __('Query failed: %s', $error->getMessage(), 'doctor'));
	}

	return doctor_result('database.connection', 'Database', (int) $answer === 1 ? 'pass' : 'fail', __('Database connection', 'doctor'), (int) $answer === 1 ? __('A read-only query completed successfully.', 'doctor') : __('The database returned an unexpected result.', 'doctor'));
}

/**
 * @return array{server:string,version:string,raw:string}
 */
function doctor_database_identity($raw) {
	$server  = stripos($raw, 'MariaDB') !== false ? 'MariaDB' : 'MySQL';
	$version = 'unknown';

	if ($server === 'MariaDB' && preg_match('/([0-9]+\.[0-9]+(?:\.[0-9]+)?)-MariaDB/i', $raw, $matches)) {
		$version = $matches[1];
	} elseif (preg_match('/([0-9]+\.[0-9]+(?:\.[0-9]+)?)/', $raw, $matches)) {
		$version = $matches[1];
	}

	return ['server' => $server, 'version' => $version, 'raw' => $raw];
}

/** @return array<string,mixed> */
function doctor_check_database_version() {
	$raw      = (string) db_fetch_cell('SELECT VERSION()', '', false);
	$identity = doctor_database_identity($raw);
	$minimum  = doctor_database_recommended_version($identity['server']);

	if ($identity['version'] === 'unknown') {
		return doctor_result('database.version', 'Prerequisites', 'fail', __('Supported database server', 'doctor'), __('Doctor could not determine the database server version from %s.', $raw, 'doctor'));
	}

	$status = version_compare($identity['version'], $minimum, '>=') ? 'pass' : 'warn';
	$detail = __('%s %s detected; this Cacti branch recommends %s %s or newer.', $identity['server'], $identity['version'], $identity['server'], $minimum, 'doctor');

	return doctor_result('database.version', 'Prerequisites', $status, __('Supported database server', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_database_charset() {
	$charset   = (string) db_fetch_cell('SELECT @@character_set_database', '', false);
	$collation = (string) db_fetch_cell('SELECT @@collation_database', '', false);
	$status    = strtolower($charset) === 'utf8mb4' ? 'pass' : 'fail';
	$detail    = __('Database character set is %s and collation is %s. Cacti requires utf8mb4.', $charset !== '' ? $charset : __('unknown', 'doctor'), $collation !== '' ? $collation : __('unknown', 'doctor'), 'doctor');

	return doctor_result('database.charset', 'Prerequisites', $status, __('Database character set', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_database_timezone_support() {
	$count = db_fetch_cell('SELECT COUNT(*) FROM mysql.time_zone_name', '', false);

	if ($count === false || $count === null || $count === '') {
		return doctor_result('database.timezone', 'Prerequisites', 'fail', __('Database timezone support', 'doctor'), __('The Cacti database account cannot read mysql.time_zone_name. Grant SELECT access and populate the database timezone tables.', 'doctor'));
	}

	$status = (int) $count > 0 ? 'pass' : 'fail';
	$detail = $status === 'pass' ? __('The database timezone table is accessible and contains %d entries.', (int) $count, 'doctor') : __('The database timezone table is accessible but empty. Populate the system timezone tables.', 'doctor');

	return doctor_result('database.timezone', 'Prerequisites', $status, __('Database timezone support', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_core_tables() {
	$required = ['settings', 'host', 'data_template_data', 'poller'];
	$missing  = [];

	foreach ($required as $table) {
		if (!db_table_exists($table, false)) {
			$missing[] = $table;
		}
	}

	$status = $missing === [] ? 'pass' : 'fail';
	$detail = $missing === [] ? __('Core tables used by Cacti are present.', 'doctor') : __('Missing core tables: %s. Restore or upgrade the database before attempting other repairs.', implode(', ', $missing), 'doctor');

	return doctor_result('database.core_tables', 'Database', $status, __('Core database tables', 'doctor'), $detail);
}

function doctor_base_path() {
	return defined('CACTI_PATH_BASE') ? (string) CACTI_PATH_BASE : doctor_parent_directory(__DIR__, 2);
}

/**
 * The repair ignores path_cactilog: a log file may be configured anywhere,
 * including a code directory such as include/, and the repair must only ever
 * touch Cacti's own runtime directories.
 *
 * @return array<string,string>
 */
function doctor_repair_directories($base = null) {
	$base = $base === null ? doctor_base_path() : $base;

	return [
		'cache' => defined('CACTI_PATH_CACHE') ? (string) CACTI_PATH_CACHE : $base . '/cache',
		'log'   => defined('CACTI_PATH_LOG') ? (string) CACTI_PATH_LOG : $base . '/log',
		'rra'   => defined('CACTI_PATH_RRA') ? (string) CACTI_PATH_RRA : $base . '/rra'
	];
}

/**
 * Cacti 1.3 lets config.php relocate the cache, log, and RRA directories, and
 * every release lets path_cactilog move the log, so honor both before falling
 * back to the installation tree.
 *
 * @return array<string,string>
 */
function doctor_runtime_directories($base = null) {
	$directories = doctor_repair_directories($base);
	$logFile     = (string) read_config_option('path_cactilog', true);

	if ($logFile !== '') {
		$directories['log'] = dirname($logFile);
	}

	return $directories;
}

/** @return array<string,mixed> */
function doctor_check_runtime_directories($base = null) {
	$problems   = [];
	$repairable = false;
	$targets    = doctor_repair_directories($base);

	foreach (doctor_runtime_directories($base) as $name => $path) {
		if (!is_dir($path)) {
			$problems[] = __('%s is missing (%s)', $name, $path, 'doctor');
		} elseif (!is_writable($path)) {
			$problems[] = __('%s is not writable (%s)', $name, $path, 'doctor');
		} else {
			continue;
		}

		if (in_array($path, $targets, true)) {
			$repairable = true;
		}
	}

	if ($problems === []) {
		return doctor_result('filesystem.runtime_directories', 'Filesystem', 'pass', __('Runtime directories', 'doctor'), __('The cache, log, and RRA directories exist and are writable.', 'doctor'));
	}

	return doctor_result('filesystem.runtime_directories', 'Filesystem', 'fail', __('Runtime directories', 'doctor'), implode('; ', $problems), $repairable ? 'runtime_directories' : '');
}

/** @return array<string,mixed> */
function doctor_check_config_file_security($path = null) {
	$path = $path === null ? doctor_base_path() . '/include/config.php' : $path;
	$mode = @fileperms($path);

	if (!is_file($path) || !is_readable($path)) {
		return doctor_result('filesystem.config', 'Filesystem', 'fail', __('Cacti configuration file', 'doctor'), __('include/config.php is missing or unreadable.', 'doctor'));
	}

	if (defined('CACTI_SERVER_OS') && CACTI_SERVER_OS === 'win32') {
		return doctor_result('filesystem.config', 'Filesystem', 'pass', __('Cacti configuration file', 'doctor'), __('include/config.php is readable. POSIX mode-bit checks do not apply on Windows.', 'doctor'));
	}

	if ($mode !== false && ($mode & 0002) !== 0) {
		return doctor_result('filesystem.config', 'Filesystem', 'fail', __('Cacti configuration file', 'doctor'), __('include/config.php is writable by other users. Remove world-write permission because this file contains database credentials.', 'doctor'));
	}

	if ($mode !== false && ($mode & 0020) !== 0) {
		return doctor_result('filesystem.config', 'Filesystem', 'warn', __('Cacti configuration file', 'doctor'), __('include/config.php is group-writable. Confirm that every member of the owning group is trusted.', 'doctor'));
	}

	if ($mode !== false && ($mode & 0004) !== 0) {
		return doctor_result('filesystem.config', 'Filesystem', 'warn', __('Cacti configuration file', 'doctor'), __('include/config.php is readable by all local users and contains database credentials. Restrict it to the owner and the web server group.', 'doctor'));
	}

	return doctor_result('filesystem.config', 'Filesystem', 'pass', __('Cacti configuration file', 'doctor'), __('include/config.php is readable and is not world-readable, group-writable, or world-writable.', 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_cacti_log() {
	$base = doctor_base_path();
	$path = (string) read_config_option('path_cactilog', true);
	$path = $path !== '' ? $path : $base . '/log/cacti.log';

	if (!file_exists($path)) {
		$status = is_writable(dirname($path)) ? 'warn' : 'fail';
		return doctor_result('logging.cacti', 'Logging', $status, __('Cacti log file', 'doctor'), is_writable(dirname($path)) ? __('The log file does not exist. Its parent directory is writable, so Cacti can create it.', 'doctor') : __('The log file does not exist. Its parent directory is not writable.', 'doctor'));
	}

	if (!is_file($path) || !is_readable($path) || !is_writable($path)) {
		return doctor_result('logging.cacti', 'Logging', 'fail', __('Cacti log file', 'doctor'), __('The configured log path must be a readable and writable regular file.', 'doctor'));
	}

	$size   = filesize($path);
	$status = $size !== false && $size > doctor_threshold('doctor_log_warn_mb', 100) * 1048576 ? 'warn' : 'pass';
	$detail = $size !== false ? __('The log is readable and writable and is %s MiB.', round($size / 1048576, 1), 'doctor') : __('The log is readable and writable.', 'doctor');

	if ($status === 'warn') {
		$detail .= ' ' . __('Verify that Cacti log rotation is enabled.', 'doctor');
	}

	return doctor_result('logging.cacti', 'Logging', $status, __('Cacti log file', 'doctor'), $detail);
}

/**
 * @return array<int,array<string,mixed>>
 */
function doctor_check_required_binaries($privileged = null, $base = null, $cactiVersion = null) {
	$privileged = $privileged === null ? doctor_running_as_root() : $privileged;
	$snmp       = doctor_snmp_recommended_version();
	$binaries = [
		'path_php_binary' => ['label' => 'PHP CLI', 'argument' => '-v', 'pattern' => '/PHP\s+([0-9]+\.[0-9]+(?:\.[0-9]+)?(?:[A-Za-z][A-Za-z0-9]*|[-+][A-Za-z0-9.+-]+)?)/i', 'minimum' => ''],
		'path_rrdtool'    => ['label' => 'RRDtool', 'argument' => '--version', 'pattern' => '/RRDtool\s+([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => doctor_rrdtool_minimum_version()],
		'path_snmpget'    => ['label' => 'Net-SNMP snmpget', 'argument' => '-V', 'pattern' => '/NET-SNMP version:\s*([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => $snmp, 'below' => 'warn'],
		'path_snmpwalk'   => ['label' => 'Net-SNMP snmpwalk', 'argument' => '-V', 'pattern' => '/NET-SNMP version:\s*([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => $snmp, 'below' => 'warn']
	];

	if ((string) read_config_option('poller_type', true) === '2') {
		$binaries['path_spine'] = ['label' => 'Spine poller', 'argument' => '', 'pattern' => '', 'minimum' => ''];
	}

	$results = [];

	foreach ($binaries as $option => $specification) {
		$path   = (string) read_config_option($option, true);
		$status = $path !== '' && is_file($path) && is_executable($path) ? 'pass' : 'fail';
		if ($status === 'pass') {
			$detail = __('Executable found at %s.', $path, 'doctor');
		} else {
			$detail = $path !== '' ? __('The %s setting is empty, missing, or not executable: %s', $option, $path, 'doctor') : __('The %s setting is empty, missing, or not executable.', $option, 'doctor');
		}

		if ($status === 'pass' && $specification['pattern'] !== '') {
			$refusal = doctor_binary_execution_refusal($option, $path, $privileged);
			$version = $refusal === '' ? doctor_probe_binary_version($path, $specification['argument'], $specification['pattern']) : null;

			if ($refusal !== '') {
				$status  = 'warn';
				$detail .= ' ' . $refusal;
			} elseif ($version === null) {
				$status  = 'warn';
				$detail .= ' ' . __('Doctor could not determine its version.', 'doctor');
			} elseif ($option === 'path_php_binary') {
				$compatibility = doctor_evaluate_php_compatibility($version, doctor_php_requirement($base, $cactiVersion));
				$status = $compatibility['status'];
				$detail .= ' ' . $compatibility['detail'];
			} elseif ($specification['minimum'] === '') {
				$detail .= ' ' . __('Detected version %s.', $version, 'doctor');
			} elseif (version_compare($version, $specification['minimum'], '<')) {
				$below   = isset($specification['below']) ? $specification['below'] : 'fail';
				$status  = $below;
				$detail .= ' ' . ($below === 'warn'
					? __('Detected version %s; version %s or newer is recommended.', $version, $specification['minimum'], 'doctor')
					: __('Detected version %s; version %s or newer is required.', $version, $specification['minimum'], 'doctor'));
			} else {
				$detail .= ' ' . __('Detected version %s; minimum is %s.', $version, $specification['minimum'], 'doctor');
			}
		}

		$results[] = doctor_result('binary.' . substr($option, 5), 'Prerequisites', $status, __('%s executable', $specification['label'], 'doctor'), $detail);
	}

	return $results;
}

function doctor_probe_binary_version($path, $argument, $pattern) {
	if (!doctor_shell_exec_available()) {
		return null;
	}

	$command = cacti_escapeshellarg($path);
	if ($argument !== '') {
		$command .= ' ' . cacti_escapeshellarg($argument);
	}
	$command .= ' 2>&1';
	// Callers pass only paths accepted by doctor_binary_execution_refusal() and fixed version flags.
	$output = @shell_exec($command); // nosemgrep: php.lang.security.exec-use.exec-use

	if (!is_string($output) || !preg_match($pattern, $output, $matches)) {
		return null;
	}

	return $matches[1];
}

/**
 * @return array<int,int>
 */
function doctor_supported_poller_intervals() {
	global $poller_intervals;

	if (isset($poller_intervals) && is_array($poller_intervals) && cacti_sizeof($poller_intervals)) {
		return array_map('intval', array_keys($poller_intervals));
	}

	return [10, 15, 20, 30, 60, 300];
}

/** @return array<string,mixed> */
function doctor_check_poller_configuration() {
	$type     = (string) read_config_option('poller_type', true);
	$interval = (int) read_config_option('poller_interval', true);
	$problems = [];

	if (!in_array($type, ['1', '2'], true)) {
		$problems[] = __('poller_type is not cmd.php or Spine', 'doctor');
	}

	if (!in_array($interval, doctor_supported_poller_intervals(), true)) {
		$problems[] = __('poller_interval is not a supported value', 'doctor');
	}

	if ($problems !== []) {
		return doctor_result('poller.configuration', 'Poller', 'fail', __('Poller configuration', 'doctor'), implode('; ', $problems) . '.');
	}

	return doctor_result('poller.configuration', 'Poller', 'pass', __('Poller configuration', 'doctor'), __('Poller is %s with a %d-second interval.', $type === '2' ? 'Spine' : 'cmd.php', $interval, 'doctor'));
}

/**
 * poller_lastrun_1 is written when a poll starts, so a poller that crashes
 * every cycle still looks current. poller.last_update is written with the
 * run statistics only after the main poller finishes.
 *
 * @return array<string,mixed>
 */
function doctor_check_poller_freshness() {
	$lastRun  = (int) db_fetch_cell('SELECT UNIX_TIMESTAMP(last_update) FROM poller WHERE id = 1', '', false);
	$interval = (int) read_config_option('poller_interval', true);
	$interval = $interval > 0 ? $interval : 300;

	if ($lastRun <= 0) {
		return doctor_result('poller.freshness', 'Poller', 'warn', __('Main poller freshness', 'doctor'), __('No completed main-poller run was found. This can be expected before the first poll.', 'doctor'));
	}

	$age       = max(0, time() - $lastRun);
	$threshold = max(900, $interval * 3);
	$status    = $age <= $threshold ? 'pass' : 'fail';
	$detail    = __('Last completed run was %d seconds ago; failure threshold is %d seconds.', $age, $threshold, 'doctor');

	return doctor_result('poller.freshness', 'Poller', $status, __('Main poller freshness', 'doctor'), $detail);
}

function doctor_threshold($name, $default) {
	$value = read_config_option($name, true);

	return is_numeric($value) && $value > 0 ? (float) $value : (float) $default;
}

function doctor_poller_interval() {
	$interval = (int) read_config_option('poller_interval', true);

	return $interval > 0 ? $interval : 300;
}

function doctor_short_version($version) {
	return implode('.', array_slice(explode('.', (string) $version), 0, 3));
}

/**
 * Copying in new code without running the installer leaves the schema behind,
 * and Cacti then redirects every web request to install/. Only the first three
 * version parts are compared because develop builds append a build stamp.
 *
 * @return array<string,mixed>
 */
function doctor_evaluate_schema_version($databaseVersion, $codeVersion) {
	$databaseVersion = trim((string) $databaseVersion);
	$database        = doctor_short_version($databaseVersion);
	$code            = doctor_short_version($codeVersion);

	if ($databaseVersion === '') {
		return doctor_result('cacti.schema_version', 'Cacti', 'fail', __('Database schema version', 'doctor'), __('The version table is empty or unreadable, so the schema version is unknown.', 'doctor'));
	}

	if ($databaseVersion === 'new_install') {
		return doctor_result('cacti.schema_version', 'Cacti', 'fail', __('Database schema version', 'doctor'), __('The version table still reads new_install, so the installer never finished. Open install/ in a browser to complete it.', 'doctor'));
	}

	$order = version_compare($database, $code);

	if ($order < 0) {
		return doctor_result('cacti.schema_version', 'Cacti', 'fail', __('Database schema version', 'doctor'), __('The database schema is at %s but the installed code is %s. Open install/ in a browser to finish the upgrade.', $database, $code, 'doctor'));
	}

	if ($order > 0) {
		return doctor_result('cacti.schema_version', 'Cacti', 'warn', __('Database schema version', 'doctor'), __('The database schema (%s) is newer than the installed code (%s). The code may have been rolled back.', $database, $code, 'doctor'));
	}

	return doctor_result('cacti.schema_version', 'Cacti', 'pass', __('Database schema version', 'doctor'), __('The database schema (%s) matches the installed code.', $database, 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_schema_version() {
	$database = (string) db_fetch_cell('SELECT cacti FROM version LIMIT 1', '', false);

	return doctor_evaluate_schema_version($database, defined('CACTI_VERSION') ? (string) CACTI_VERSION : '');
}

/** @return array<string,mixed> */
function doctor_evaluate_poller_runtime($runtime, $interval, $warnPercent = 80) {
	if ($runtime <= 0) {
		return doctor_result('poller.runtime', 'Poller', 'pass', __('Main poller run time', 'doctor'), __('No completed run time is recorded yet.', 'doctor'));
	}

	$detail = __('The last main-poller run took %s seconds of the %d-second interval.', round($runtime, 1), $interval, 'doctor');

	if ($runtime >= $interval) {
		return doctor_result('poller.runtime', 'Poller', 'fail', __('Main poller run time', 'doctor'), $detail . ' ' . __('Runs that outlast the interval overlap and lose data; add poller processes or threads, or use Spine.', 'doctor'));
	}

	if ($runtime >= $interval * $warnPercent / 100) {
		return doctor_result('poller.runtime', 'Poller', 'warn', __('Main poller run time', 'doctor'), $detail . ' ' . __('Little headroom remains before polls overlap.', 'doctor'));
	}

	return doctor_result('poller.runtime', 'Poller', 'pass', __('Main poller run time', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_poller_runtime() {
	$runtime = (float) db_fetch_cell('SELECT total_time FROM poller WHERE id = 1', '', false);

	return doctor_evaluate_poller_runtime($runtime, doctor_poller_interval(), doctor_threshold('doctor_poller_warn_percent', 80));
}

/**
 * Rows are expected while a poll is running, so only rows older than two
 * intervals count. They are results that never reached an RRD file.
 *
 * @return array<string,mixed>
 */
function doctor_check_poller_output() {
	$interval = doctor_poller_interval();
	$stale    = (int) db_fetch_cell_prepared('SELECT COUNT(*) FROM poller_output WHERE time < FROM_UNIXTIME(UNIX_TIMESTAMP() - ?)', [$interval * 2], '', false);

	if ($stale > 0) {
		return doctor_result('poller.output_backlog', 'Poller', 'warn', __('Unprocessed poller output', 'doctor'), __('%d poller_output rows are older than two polling intervals and were never written to RRD files. Check the Cacti log for "Poller Output Table not Empty" and confirm max_heap_table_size is large enough.', $stale, 'doctor'));
	}

	return doctor_result('poller.output_backlog', 'Poller', 'pass', __('Unprocessed poller output', 'doctor'), __('No stale rows remain in poller_output.', 'doctor'));
}

/**
 * @param array<int,array<string,string>> $pollers
 * @return array<string,mixed>
 */
function doctor_evaluate_remote_pollers($pollers, $interval, $now) {
	if (!cacti_sizeof($pollers)) {
		return doctor_result('poller.remote', 'Poller', 'pass', __('Remote pollers', 'doctor'), __('No remote pollers are enabled.', 'doctor'));
	}

	$threshold = max(900, $interval * 3);
	$stale     = [];

	foreach ($pollers as $poller) {
		$lastUpdate = (int) $poller['last_update'];

		if ($lastUpdate <= 0) {
			$stale[] = __('%s (ID %s) has never reported', $poller['name'], $poller['id'], 'doctor');
		} elseif ($now - $lastUpdate > $threshold) {
			$stale[] = __('%s (ID %s) last reported %d seconds ago', $poller['name'], $poller['id'], $now - $lastUpdate, 'doctor');
		}
	}

	if ($stale !== []) {
		return doctor_result('poller.remote', 'Poller', 'fail', __('Remote pollers', 'doctor'), implode('; ', $stale) . '. ' . __('The failure threshold is %d seconds.', $threshold, 'doctor'));
	}

	return doctor_result('poller.remote', 'Poller', 'pass', __('Remote pollers', 'doctor'), __('%d enabled remote pollers reported within %d seconds.', cacti_sizeof($pollers), $threshold, 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_remote_pollers() {
	$pollers = db_fetch_assoc("SELECT id, name, UNIX_TIMESTAMP(last_update) AS last_update FROM poller WHERE id > 1 AND disabled = ''", false);

	return doctor_evaluate_remote_pollers(is_array($pollers) ? $pollers : [], doctor_poller_interval(), time());
}

/** @return array<string,mixed> */
function doctor_check_plugin_files($base = null) {
	if ($base !== null) {
		$plugins = $base . '/plugins';
	} else {
		$plugins = defined('CACTI_PATH_PLUGINS') ? (string) CACTI_PATH_PLUGINS : doctor_base_path() . '/plugins';
	}

	$rows    = db_fetch_assoc('SELECT directory FROM plugin_config WHERE status = 1', false);
	$missing = [];

	foreach ((is_array($rows) ? $rows : []) as $row) {
		if (!is_file($plugins . '/' . $row['directory'] . '/setup.php')) {
			$missing[] = $row['directory'];
		}
	}

	if ($missing !== []) {
		return doctor_result('cacti.plugin_files', 'Cacti', 'fail', __('Enabled plugin files', 'doctor'), __('Enabled plugins are missing from %s: %s. Restore their files or disable them in Plugin Management.', $plugins, implode(', ', $missing), 'doctor'));
	}

	return doctor_result('cacti.plugin_files', 'Cacti', 'pass', __('Enabled plugin files', 'doctor'), __('Every enabled plugin has its setup.php in place.', 'doctor'));
}

/**
 * Boost stores the last run as a timestamp or, on some releases, a date string.
 *
 * @return array<string,mixed>
 */
function doctor_evaluate_boost($enabled, $rows, $maxRecords, $lastRun, $intervalMinutes, $now) {
	if (!$enabled) {
		return doctor_result('poller.boost', 'Poller', 'pass', __('Boost RRD updates', 'doctor'), __('Boost is disabled, so the poller writes RRD files directly.', 'doctor'));
	}

	$lastRun = is_numeric($lastRun) ? (int) $lastRun : (int) strtotime((string) $lastRun);
	$window  = max(1, (int) $intervalMinutes) * 60 * 2;

	if ($lastRun <= 0) {
		return doctor_result('poller.boost', 'Poller', 'warn', __('Boost RRD updates', 'doctor'), __('Boost is enabled but has no recorded run. This can be expected before its first flush.', 'doctor'));
	}

	$age = max(0, $now - $lastRun);

	if ($age > $window) {
		return doctor_result('poller.boost', 'Poller', 'fail', __('Boost RRD updates', 'doctor'), __('Boost last flushed %d seconds ago, more than twice its %d-minute interval. Graphs stop updating until it runs; check the Cacti log for BOOST errors.', $age, (int) $intervalMinutes, 'doctor'));
	}

	if ($maxRecords > 0 && $rows > $maxRecords) {
		return doctor_result('poller.boost', 'Poller', 'warn', __('Boost RRD updates', 'doctor'), __('poller_output_boost holds %d rows, above the %d-row limit that forces a flush. Boost is falling behind.', $rows, $maxRecords, 'doctor'));
	}

	return doctor_result('poller.boost', 'Poller', 'pass', __('Boost RRD updates', 'doctor'), __('Boost last flushed %d seconds ago with %d rows waiting.', $age, $rows, 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_boost() {
	$enabled = (string) read_config_option('boost_rrd_update_enable', true) === 'on';
	$rows    = $enabled ? (int) db_fetch_cell('SELECT COUNT(*) FROM poller_output_boost', '', false) : 0;

	return doctor_evaluate_boost(
		$enabled,
		$rows,
		(int) read_config_option('boost_rrd_update_max_records', true),
		read_config_option('boost_last_run_time', true),
		(int) read_config_option('boost_rrd_update_interval', true),
		time()
	);
}

/** @return array<string,mixed> */
function doctor_check_rrd_files($rra = null) {
	$rra     = $rra === null ? doctor_repair_directories()['rra'] : $rra;
	$sources = db_fetch_assoc("SELECT local_data_id, data_source_path FROM data_template_data WHERE local_data_id > 0 AND active = 'on' AND data_source_path != ''", false);
	$sources = is_array($sources) ? $sources : [];
	$missing = [];

	foreach ($sources as $source) {
		$path = str_replace('<path_rra>', $rra, $source['data_source_path']);

		if (!file_exists($path)) {
			$missing[] = $path;
		}
	}

	if ($missing !== []) {
		return doctor_result('filesystem.rrd_files', 'Filesystem', 'warn', __('RRD files', 'doctor'), __('%d of %d active data sources have no RRD file, for example %s. New data sources get one after their first poll; otherwise check the RRA directory and its permissions.', count($missing), count($sources), implode(', ', array_slice($missing, 0, 3)), 'doctor'));
	}

	return doctor_result('filesystem.rrd_files', 'Filesystem', 'pass', __('RRD files', 'doctor'), __('All %d active data sources have an RRD file.', count($sources), 'doctor'));
}

/** @return array<string,mixed> */
function doctor_evaluate_disk_space($free, $total, $path, $warnPercent = 10, $failPercent = 2) {
	if ($free === false || $total === false || $total <= 0) {
		return doctor_result('filesystem.disk_space', 'Filesystem', 'warn', __('RRA disk space', 'doctor'), __('Doctor could not measure free space for %s.', $path, 'doctor'));
	}

	$percent = $free / $total * 100;
	$detail  = __('%s (%s GiB) free on the file system holding %s.', round($percent, 1) . '%', round($free / 1073741824, 1), $path, 'doctor');

	if ($percent < $failPercent) {
		return doctor_result('filesystem.disk_space', 'Filesystem', 'fail', __('RRA disk space', 'doctor'), $detail . ' ' . __('RRD updates fail silently when the disk fills.', 'doctor'));
	}

	if ($percent < $warnPercent) {
		return doctor_result('filesystem.disk_space', 'Filesystem', 'warn', __('RRA disk space', 'doctor'), $detail);
	}

	return doctor_result('filesystem.disk_space', 'Filesystem', 'pass', __('RRA disk space', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_disk_space($directory = null) {
	$directory = $directory === null ? doctor_repair_directories()['rra'] : $directory;

	return doctor_evaluate_disk_space(@disk_free_space($directory), @disk_total_space($directory), $directory, doctor_threshold('doctor_disk_warn_percent', 10), doctor_threshold('doctor_disk_fail_percent', 2));
}

/**
 * UNIX_TIMESTAMP() ignores time zones, so any gap is real clock drift between
 * the database host and the poller host.
 *
 * @return array<string,mixed>
 */
function doctor_evaluate_clock($databaseTime, $phpTime, $warnSeconds = 5, $failSeconds = 60) {
	if ($databaseTime === false || (int) $databaseTime <= 0) {
		return doctor_result('database.clock', 'Database', 'warn', __('Database clock', 'doctor'), __('Doctor could not read the database clock.', 'doctor'));
	}

	$drift  = abs((int) $phpTime - (int) $databaseTime);
	$detail = __('The database and PHP clocks differ by %d seconds.', $drift, 'doctor');

	if ($drift > $failSeconds) {
		return doctor_result('database.clock', 'Database', 'fail', __('Database clock', 'doctor'), $detail . ' ' . __('Poll timestamps will be misaligned; synchronise both hosts with NTP.', 'doctor'));
	}

	if ($drift > $warnSeconds) {
		return doctor_result('database.clock', 'Database', 'warn', __('Database clock', 'doctor'), $detail . ' ' . __('Synchronise both hosts with NTP.', 'doctor'));
	}

	return doctor_result('database.clock', 'Database', 'pass', __('Database clock', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_clock() {
	return doctor_evaluate_clock(db_fetch_cell('SELECT UNIX_TIMESTAMP()', '', false), time(), doctor_threshold('doctor_clock_warn_seconds', 5), doctor_threshold('doctor_clock_fail_seconds', 60));
}

/**
 * Spine reads its own spine.conf rather than Cacti's config.php, so the two
 * can silently point at different databases.
 *
 * @return array<string,mixed>
 */
function doctor_check_spine_config($database = null, $user = null) {
	global $database_default, $database_username;

	if ((string) read_config_option('poller_type', true) !== '2') {
		return doctor_result('poller.spine_config', 'Poller', 'pass', __('Spine configuration', 'doctor'), __('Spine is not the configured poller.', 'doctor'));
	}

	$database = $database === null ? (string) $database_default : $database;
	$user     = $user === null ? (string) $database_username : $user;
	$path     = (string) read_config_option('path_spine_config', true);

	if ($path === '') {
		return doctor_result('poller.spine_config', 'Poller', 'warn', __('Spine configuration', 'doctor'), __('path_spine_config is not set, so Spine uses its compiled-in search path and Doctor cannot verify which file it reads.', 'doctor'));
	}

	$contents = is_file($path) && is_readable($path) ? @file_get_contents($path) : false;

	if ($contents === false) {
		return doctor_result('poller.spine_config', 'Poller', 'fail', __('Spine configuration', 'doctor'), __('The Spine configuration file is missing or unreadable: %s.', $path, 'doctor'));
	}

	$settings = [];

	foreach (preg_split('/\r?\n/', $contents) as $line) {
		if (preg_match('/^\s*(DB_Database|DB_User)\s+(\S+)/', $line, $matches)) {
			$settings[$matches[1]] = $matches[2];
		}
	}

	$problems = [];

	if (isset($settings['DB_Database']) && $settings['DB_Database'] !== $database) {
		$problems[] = __('DB_Database is %s but Cacti uses %s', $settings['DB_Database'], $database, 'doctor');
	}

	if (isset($settings['DB_User']) && $settings['DB_User'] !== $user) {
		$problems[] = __('DB_User is %s but Cacti uses %s', $settings['DB_User'], $user, 'doctor');
	}

	$mode = fileperms($path);
	if ($mode !== false && ($mode & 0004)) {
		$problems[] = __('the file is world-readable and holds the database password', 'doctor');
	}

	if ($problems !== []) {
		return doctor_result('poller.spine_config', 'Poller', 'warn', __('Spine configuration', 'doctor'), $path . ': ' . implode('; ', $problems) . '.');
	}

	return doctor_result('poller.spine_config', 'Poller', 'pass', __('Spine configuration', 'doctor'), __('%s uses the same database and user as Cacti.', $path, 'doctor'));
}

/**
 * @param array<string,string> $variables
 * @return array<string,mixed>
 */
function doctor_evaluate_innodb($variables) {
	$enabled  = ['ON', '1', 'DETECT_AND_RECOVER', 'FAST'];
	$disabled = [];

	foreach (['innodb_file_per_table', 'innodb_doublewrite'] as $name) {
		if (isset($variables[$name]) && !in_array(strtoupper((string) $variables[$name]), $enabled, true)) {
			$disabled[] = __('%s is %s', $name, $variables[$name], 'doctor');
		}
	}

	if ($disabled !== []) {
		return doctor_result('database.innodb', 'Database', 'warn', __('InnoDB safety settings', 'doctor'), implode('; ', $disabled) . '. ' . __('Cacti recommends ON; doublewrite may stay off only on ZFS or similar journaling storage.', 'doctor'));
	}

	return doctor_result('database.innodb', 'Database', 'pass', __('InnoDB safety settings', 'doctor'), __('innodb_file_per_table and innodb_doublewrite are enabled.', 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_innodb() {
	$rows      = db_fetch_assoc("SHOW GLOBAL VARIABLES WHERE Variable_name IN ('innodb_file_per_table', 'innodb_doublewrite')", false);
	$variables = [];

	foreach ((is_array($rows) ? $rows : []) as $row) {
		$variables[$row['Variable_name']] = $row['Value'];
	}

	return doctor_evaluate_innodb($variables);
}

/**
 * Reads at most $bytes from the end of the file so a multi-gigabyte log
 * cannot exhaust memory.
 *
 * @return array<int,string>
 */
function doctor_read_log_tail($path, $maxLines = 1000, $bytes = 2097152) {
	$size   = @filesize($path);
	$handle = $size !== false ? @fopen($path, 'rb') : false;

	if ($handle === false) {
		return [];
	}

	if ($size > $bytes) {
		fseek($handle, -$bytes, SEEK_END);
	}

	$contents = stream_get_contents($handle);
	fclose($handle);

	$lines = preg_split('/\r?\n/', trim((string) $contents));

	// A partial first line is likely when the read starts mid-file.
	if ($size > $bytes) {
		array_shift($lines);
	}

	return array_values(array_slice(array_filter($lines, 'strlen'), -$maxLines));
}

/**
 * @param array<int,string> $lines
 * @return array<string,mixed>
 */
function doctor_evaluate_log_lines($lines) {
	$messages = [];
	$errors   = 0;

	foreach ($lines as $line) {
		if (!preg_match('/\bERROR\b|\bFATAL\b|SQL Error/', $line)) {
			continue;
		}

		$errors++;
		$message = preg_replace('/^.*? - /', '', $line, 1);
		$message = preg_replace('/[0-9]+/', '#', $message);
		$messages[$message] = isset($messages[$message]) ? $messages[$message] + 1 : 1;
	}

	if ($errors === 0) {
		return doctor_result('logging.recent_errors', 'Logging', 'pass', __('Recent log errors', 'doctor'), __('None of the last %d log lines report an error.', count($lines), 'doctor'));
	}

	arsort($messages);
	$top = key($messages);

	return doctor_result('logging.recent_errors', 'Logging', 'warn', __('Recent log errors', 'doctor'), __('%d of the last %d log lines report an error. Most frequent (%dx): %s', $errors, count($lines), current($messages), substr($top, 0, 200), 'doctor'));
}

/** @return array<string,mixed> */
function doctor_check_recent_log_errors() {
	$path = (string) read_config_option('path_cactilog', true);
	$path = $path !== '' ? $path : doctor_base_path() . '/log/cacti.log';

	if (!is_file($path) || !is_readable($path)) {
		return doctor_result('logging.recent_errors', 'Logging', 'pass', __('Recent log errors', 'doctor'), __('The Cacti log is not readable; see the Cacti log file check.', 'doctor'));
	}

	return doctor_evaluate_log_lines(doctor_read_log_tail($path));
}

/**
 * A few down devices is routine; more than half suggests the poller host or
 * its network rather than the devices themselves.
 *
 * @param array<string,mixed> $counts
 * @param array<int,array<string,string>>|false $offenders
 * @return array<string,mixed>
 */
function doctor_evaluate_devices($counts, $offenders) {
	$total      = (int) $counts['total'];
	$down       = (int) $counts['down'];
	$recovering = (int) $counts['recovering'];

	if ($total === 0) {
		return doctor_result('devices.health', 'Devices', 'pass', __('Device availability', 'doctor'), __('No enabled devices are configured.', 'doctor'));
	}

	if ($down === 0 && $recovering === 0) {
		return doctor_result('devices.health', 'Devices', 'pass', __('Device availability', 'doctor'), __('All %d enabled devices are up.', $total, 'doctor'));
	}

	$detail = __('%d of %d enabled devices are down and %d recovering.', $down, $total, $recovering, 'doctor');
	$listed = [];

	if (!is_array($offenders)) {
		$detail   .= ' ' . __('The down devices could not be listed.', 'doctor');
		$offenders = [];
	}

	foreach ($offenders as $device) {
		$entry = $device['description'] . ' (' . $device['hostname'] . ')';

		if ((int) $device['failed'] > 0) {
			$entry = __('%s down since %s', $entry, date('Y-m-d H:i', (int) $device['failed']), 'doctor');
		}

		if ($device['status_last_error'] !== '') {
			$entry .= ': ' . $device['status_last_error'];
		}

		$listed[] = $entry;
	}

	if ($listed !== []) {
		$detail .= ' ' . __('Longest down: %s.', implode('; ', $listed), 'doctor');
	}

	if ($total >= 4 && $down * 2 > $total) {
		return doctor_result('devices.health', 'Devices', 'fail', __('Device availability', 'doctor'), $detail . ' ' . __('With most devices down, check the poller host\'s network and SNMP settings first.', 'doctor'));
	}

	return doctor_result('devices.health', 'Devices', 'warn', __('Device availability', 'doctor'), $detail);
}

/** @return array<string,mixed> */
function doctor_check_devices() {
	$counts = db_fetch_assoc("SELECT COUNT(*) AS total, SUM(status = 1) AS down, SUM(status = 2) AS recovering FROM host WHERE disabled = '' AND deleted = ''", false);

	if (!is_array($counts) || !isset($counts[0])) {
		return doctor_result('devices.health', 'Devices', 'warn', __('Device availability', 'doctor'), __('Doctor could not read device status from the host table.', 'doctor'));
	}

	// Outages without a recorded failure time sort last so they cannot crowd out dated ones.
	$offenders = db_fetch_assoc("SELECT description, hostname, UNIX_TIMESTAMP(status_fail_date) AS failed, status_last_error FROM host WHERE disabled = '' AND deleted = '' AND status = 1 ORDER BY COALESCE(UNIX_TIMESTAMP(status_fail_date), 0) <= 0, status_fail_date, id LIMIT 3", false);

	return doctor_evaluate_devices($counts[0], $offenders);
}

/**
 * Check states are stored as id=status pairs in one setting so scheduled
 * runs need no table of their own.
 *
 * @param array<int,array<string,mixed>> $results
 */
function doctor_state_encode($results) {
	$pairs = [];

	foreach ($results as $result) {
		$pairs[] = $result['id'] . '=' . $result['status'];
	}

	return implode(';', $pairs);
}

/** @return array<string,string> */
function doctor_state_decode($text) {
	$state = [];

	foreach (explode(';', (string) $text) as $pair) {
		$parts = explode('=', $pair, 2);

		if (count($parts) === 2 && $parts[0] !== '') {
			$state[$parts[0]] = $parts[1];
		}
	}

	return $state;
}

/**
 * The first run only records a baseline. Without $includeWarnings, only
 * changes into or out of a failure are reported.
 *
 * @param array<string,string> $previous
 * @param array<int,array<string,mixed>> $results
 * @return array<int,array<string,string>>
 */
function doctor_state_changes($previous, $results, $includeWarnings) {
	if ($previous === []) {
		return [];
	}

	$changes = [];

	foreach ($results as $result) {
		$to   = (string) $result['status'];
		$from = isset($previous[$result['id']]) ? $previous[$result['id']] : 'new';

		if ($from === $to || ($from === 'new' && $to === 'pass')) {
			continue;
		}

		if (!$includeWarnings && $from !== 'fail' && $to !== 'fail') {
			continue;
		}

		$changes[] = [
			'id'      => (string) $result['id'],
			'summary' => (string) $result['summary'],
			'from'    => $from,
			'to'      => $to,
			'detail'  => (string) $result['detail']
		];
	}

	return $changes;
}

/**
 * @param array<int,array<string,string>> $changes
 * @param array<string,int> $counts
 * @return array{subject:string,body:string}
 */
function doctor_alert_message($changes, $counts, $host) {
	$subject = __('Cacti Doctor on %s: %d failed, %d warnings', $host, $counts['fail'], $counts['warn'], 'doctor');
	$lines   = [__('%d Cacti Doctor checks changed status on %s.', count($changes), $host, 'doctor'), ''];

	foreach ($changes as $change) {
		$lines[] = $change['summary'] . ': ' . strtoupper($change['from']) . ' -> ' . strtoupper($change['to']);
		$lines[] = '  ' . $change['detail'];
	}

	$lines[] = '';
	$lines[] = __('Totals: %d passed, %d warnings, %d failed.', $counts['pass'], $counts['warn'], $counts['fail'], 'doctor');

	return ['subject' => $subject, 'body' => implode("\n", $lines) . "\n"];
}

function doctor_schedule_due($lastRun, $intervalMinutes, $now) {
	return (int) $lastRun <= 0 || $now - (int) $lastRun >= max(1, (int) $intervalMinutes) * 60;
}

/**
 * @param array<int,array<string,mixed>> $results
 * @return array<int,array<string,string>>
 */
/**
 * @param array<int,array<string,mixed>> $results
 * @return array{text:string,code:int}
 */
function doctor_format_nagios($results) {
	$counts = doctor_result_counts($results);
	$failed = [];
	$warned = [];

	foreach ($results as $result) {
		if ($result['status'] === 'fail') {
			$failed[] = $result['id'];
		} elseif ($result['status'] === 'warn') {
			$warned[] = $result['id'];
		}
	}

	if ($failed !== []) {
		$state = 'CRITICAL';
		$code  = 2;
	} elseif ($warned !== []) {
		$state = 'WARNING';
		$code  = 1;
	} else {
		$state = 'OK';
		$code  = 0;
	}

	$parts = [];

	if ($failed !== []) {
		$parts[] = count($failed) . ' failed: ' . implode(', ', $failed);
	}

	if ($warned !== []) {
		$parts[] = count($warned) . ' warnings: ' . implode(', ', $warned);
	}

	$summary = $parts !== [] ? implode('; ', $parts) : count($results) . ' checks passed';
	$perf    = 'pass=' . $counts['pass'] . ' warn=' . $counts['warn'] . ' fail=' . $counts['fail'];

	return ['text' => 'DOCTOR ' . $state . ' - ' . $summary . ' | ' . $perf, 'code' => $code];
}

function doctor_prometheus_label($value) {
	return str_replace(['\\', '"', "\n"], ['\\\\', '\\"', '\\n'], (string) $value);
}

/**
 * Prometheus text exposition for the node_exporter textfile collector.
 * Check status is 0 for pass, 1 for warn, and 2 for fail.
 *
 * @param array<int,array<string,mixed>> $results
 */
function doctor_format_prometheus($results, $now) {
	$levels = ['pass' => 0, 'warn' => 1, 'fail' => 2];
	$lines  = [
		'# HELP cacti_doctor_check_status Cacti Doctor check status: 0 pass, 1 warn, 2 fail.',
		'# TYPE cacti_doctor_check_status gauge'
	];

	foreach ($results as $result) {
		$lines[] = 'cacti_doctor_check_status{id="' . doctor_prometheus_label($result['id']) . '",category="' . doctor_prometheus_label($result['category']) . '"} ' . $levels[$result['status']];
	}

	$lines[] = '# HELP cacti_doctor_checks Number of Cacti Doctor checks by status.';
	$lines[] = '# TYPE cacti_doctor_checks gauge';

	foreach (doctor_result_counts($results) as $status => $count) {
		$lines[] = 'cacti_doctor_checks{status="' . $status . '"} ' . $count;
	}

	$lines[] = '# HELP cacti_doctor_last_run_timestamp_seconds When the checks ran.';
	$lines[] = '# TYPE cacti_doctor_last_run_timestamp_seconds gauge';
	$lines[] = 'cacti_doctor_last_run_timestamp_seconds ' . (int) $now;

	return implode("\n", $lines) . "\n";
}

/**
 * Masks values that follow password, secret, token, or SNMP community and
 * key names, so a support bundle can be shared publicly.
 */
function doctor_redact($text) {
	$text = (string) $text;
	$keys = 'password|passwd|passphrase|pass|secret|token|community|api[_-]?key|auth[_-]?key|priv(?:ate)?[_-]?key';

	// Only indented or empty lines continue a YAML scalar; a new log record
	// must retain its own key for redaction. Accept log-style escapes as well
	// as YAML doubled quotes, since bundle text does not identify its format.
	$continuation = '(?:\r?\n(?![ \t]*["\']?\w*(?:' . $keys . ')\b["\']?[ \t]*[=:])(?=[ \t]|\r?$))';
	$doubleQuoted = '"(?>\\\\(?:[^\r\n]|' . $continuation . ')|[^"\\\\\r\n]|' . $continuation . ')*';
	$singleQuoted = '\'(?>\'\'|\\\\[^\r\n]|[^\'\\\\\r\n]|' . $continuation . ')*';
	// Prefer a complete scalar before falling back to a truncated record.
	$quotedValue = $doubleQuoted . '"|' . $singleQuoted . '\\\\?\'|'
		. $doubleQuoted . '\\\\?(?=\r?$)|' . $singleQuoted . '\\\\?(?=\r?$)';
	$text = preg_replace_callback('/(\w*(?:' . $keys . ')\b["\']?\s*:\s*)(' . $quotedValue . ')/im', function ($matches) {
		$quote = $matches[2][0];

		return $matches[1] . $quote . '[redacted]' . $quote;
	}, $text);

	// Quoted value after a key (keyword, optionally prefixed by word chars so
	// api_token / snmp_community match) + separator: JSON, YAML, and ini.
	// Consume escaped characters together and fail closed at the line ending
	// when a truncated log value has no closing quote.
	$text = preg_replace('/(\w*(?:' . $keys . ')\b["\']?\s*[=:]\s*)(["\'])(?:\\\\[^\r\n]|(?!\2)[^\\\\\r\n])*+(?:\2|\\\\?(?=\r?$))/im', '$1$2[redacted]$2', $text);

	// Unquoted value after a key + "=" or ":" separator.
	$text = preg_replace('/(\w*(?:' . $keys . ')\b["\']?\s*[=:]\s*)(?!["\'])[^\s;,"\'\r\n]+/i', '$1[redacted]', $text);

	// Keyword followed by a space-separated value with no separator (e.g. an SNMP
	// community, or "DB_Pass s3cret"). Fail-closed: this can also redact the word
	// after the keyword in prose, which is acceptable for a shareable bundle.
	$text = preg_replace('/(\w*(?:' . $keys . ')\b\s+)(?!["\'])[^\s;,"\'\r\n]+/i', '$1[redacted]', $text);

	// Password in a URL userinfo: scheme://user:PASSWORD@host.
	$text = preg_replace('/(\b[a-z][a-z0-9+.\-]*:\/\/[^:\/@?#\s]+:)[^\/\s?#]+(@)/i', '$1[redacted]$2', $text);

	return $text;
}

/**
 * @param array<int,array<string,mixed>> $results
 * @param array<string,string> $context
 * @param array<int,string> $logLines
 */
function doctor_build_bundle($results, $context, $logLines) {
	$lines = ['Cacti Doctor support bundle', 'Generated: ' . date('Y-m-d H:i:s T'), '', '== Environment'];

	foreach ($context as $name => $value) {
		$lines[] = $name . ': ' . $value;
	}

	$lines[] = '';
	$lines[] = '== Report';

	foreach ($results as $result) {
		$lines[] = str_pad(strtoupper((string) $result['status']), 5) . ' [' . $result['category'] . '] ' . $result['summary'] . ' - ' . $result['detail'];
	}

	$lines[] = '';
	$lines[] = '== Cacti log (last ' . count($logLines) . ' lines)';

	foreach ($logLines as $line) {
		$lines[] = $line;
	}

	return doctor_redact(implode("\n", $lines)) . "\n";
}

/**
 * Creates the file exclusively and readable only by its owner, so a bundle
 * never replaces an existing file or becomes readable by others.
 *
 * @return string Empty on success, otherwise the reason it failed.
 */
function doctor_write_bundle($path, $contents) {
	if (file_exists($path)) {
		return __('Refusing to overwrite %s.', $path, 'doctor');
	}

	// The umask makes the file private from the moment it exists.
	$umask  = umask(0077);
	$handle = @fopen($path, 'x');
	umask($umask);

	if ($handle === false) {
		return __('Cannot create %s.', $path, 'doctor');
	}

	$stat = fstat($handle);

	if ($stat === false || ($stat['mode'] & 0077) !== 0) {
		fclose($handle);

		return __('Could not make %s private.', $path, 'doctor');
	}

	$written = fwrite($handle, $contents);
	fclose($handle);

	return $written === strlen($contents) ? '' : __('Writing %s failed.', $path, 'doctor');
}

/** @return array<string,string> */
function doctor_bundle_context() {
	$context = [
		'Doctor'   => (string) doctor_plugin_version(),
		'Cacti'    => defined('CACTI_VERSION') ? (string) CACTI_VERSION : 'unknown',
		'PHP'      => PHP_VERSION . ' (' . PHP_SAPI . ')',
		'OS'       => php_uname('s') . ' ' . php_uname('r'),
		'Database' => (string) db_fetch_cell('SELECT VERSION()', '', false)
	];

	foreach (['stats_poller', 'stats_boost', 'poller_type', 'poller_interval', 'boost_rrd_update_enable'] as $setting) {
		$context[$setting] = (string) read_config_option($setting, true);
	}

	return $context;
}

function doctor_plugin_version() {
	$info = @parse_ini_file(__DIR__ . '/INFO', true);

	return is_array($info) && isset($info['info']['version']) ? $info['info']['version'] : 'unknown';
}

/**
 * @return array<string,array<string,string>>
 */
function doctor_available_repairs() {
	return [
		'runtime_directories' => [
			'label'       => __('Repair runtime directories', 'doctor'),
			'description' => __('Create missing cache, log, and RRA directories and add owner read/write/execute permission without removing existing permissions.', 'doctor')
		]
	];
}

/**
 * Run one allow-listed repair and return its outcome.
 *
 * @return array<string,mixed>
 */
function doctor_run_repair($repair, $privileged = null) {
	if (!isset(doctor_available_repairs()[$repair])) {
		return doctor_result('repair.' . $repair, 'Repair', 'fail', __('Unknown repair', 'doctor'), __('The requested repair is not allow-listed.', 'doctor'));
	}

	if ($repair === 'runtime_directories') {
		return doctor_repair_runtime_directories(null, null, $privileged);
	}

	return doctor_result('repair.' . $repair, 'Repair', 'fail', __('Repair unavailable', 'doctor'), __('No repair handler is registered.', 'doctor'));
}

/**
 * @param array<string,string>|null $directories
 * @return array<string,mixed>
 */
function doctor_repair_runtime_directories($base = null, $directories = null, $privileged = null) {
	$privileged  = $privileged === null ? doctor_running_as_root() : $privileged;
	$base        = realpath($base === null ? doctor_base_path() : $base);
	$directories = $directories === null ? doctor_repair_directories($base) : $directories;

	// Directories created by root are unwritable for the web server and poller.
	if ($privileged) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', __('Repair runtime directories', 'doctor'), __('Repairs are refused while running as root. Run Doctor as the Cacti poller user.', 'doctor'));
	}

	if ($base === false) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', __('Repair runtime directories', 'doctor'), __('The Cacti base directory cannot be resolved.', 'doctor'));
	}

	$prefix = rtrim($base, '/') . '/';
	$errors = [];

	foreach ($directories as $name => $path) {
		if (is_dir($path) && is_writable($path)) {
			continue;
		}

		$parent = realpath(dirname($path));

		if ($parent === false || ($parent !== $base && strpos($parent . '/', $prefix) !== 0)) {
			$errors[] = __('%s: path is outside the Cacti installation', $name, 'doctor');
			continue;
		}

		if (is_link($path)) {
			$errors[] = __('%s: symbolic links are not repaired', $name, 'doctor');
			continue;
		}

		if (!file_exists($path) && !mkdir($path, 0775, false)) {
			$errors[] = __('%s: directory creation failed', $name, 'doctor');
			continue;
		}

		$mode = fileperms($path);
		if ($mode === false || (!is_writable($path) && !chmod($path, ($mode & 0777) | 0700))) {
			$errors[] = __('%s: could not add owner permissions', $name, 'doctor');
			continue;
		}

		clearstatcache();

		if (!is_dir($path) || !is_writable($path)) {
			$errors[] = __('%s: still not a writable directory', $name, 'doctor');
		}
	}

	if ($errors !== []) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', __('Repair runtime directories', 'doctor'), implode('; ', $errors));
	}

	return doctor_result('repair.runtime_directories', 'Repair', 'pass', __('Repair runtime directories', 'doctor'), __('Runtime directories now exist and are writable by the current process.', 'doctor'));
}

/**
 * Check categories stay English in reports, JSON, and metrics so scripts keep
 * working in every language; only screens translate them.
 */
function doctor_category_label($category) {
	$labels = [
		'Cacti'           => __('Cacti', 'doctor'),
		'Database'        => __('Database', 'doctor'),
		'Database health' => __('Database health', 'doctor'),
		'Devices'         => __('Devices', 'doctor'),
		'Doctor'          => __('Doctor', 'doctor'),
		'Filesystem'      => __('Filesystem', 'doctor'),
		'Logging'         => __('Logging', 'doctor'),
		'PHP'             => __('PHP', 'doctor'),
		'Poller'          => __('Poller', 'doctor'),
		'Prerequisites'   => __('Prerequisites', 'doctor'),
		'Repair'          => __('Repair', 'doctor'),
		'Security'        => __('Security', 'doctor')
	];

	return isset($labels[$category]) ? $labels[$category] : (string) $category;
}

/**
 * Status keywords stay lowercase and English in machine output; screens show
 * a translated label.
 */
function doctor_status_label($status) {
	$labels = [
		'pass' => __('PASS', 'doctor'),
		'warn' => __('WARN', 'doctor'),
		'fail' => __('FAIL', 'doctor')
	];

	return isset($labels[$status]) ? $labels[$status] : strtoupper((string) $status);
}

/**
 * @param array<int,array<string,mixed>> $results
 * @return array<string,int>
 */
function doctor_result_counts($results) {
	$counts = ['pass' => 0, 'warn' => 0, 'fail' => 0];

	foreach ($results as $result) {
		$status = isset($result['status']) ? (string) $result['status'] : 'fail';
		if (isset($counts[$status])) {
			$counts[$status]++;
		}
	}

	return $counts;
}
