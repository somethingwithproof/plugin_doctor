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
function doctor_run_checks() {
	$results   = [];
	$results[] = doctor_check_privileges(doctor_running_as_root());
	$results[] = doctor_check_cacti_version();
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
	$results[] = doctor_check_core_tables();
	$results[] = doctor_check_runtime_directories();
	$results[] = doctor_check_config_file_security();
	$results[] = doctor_check_cacti_log();
	$results   = array_merge($results, doctor_check_required_binaries());
	$results[] = doctor_check_poller_configuration();
	$results[] = doctor_check_poller_freshness();

	return $results;
}

/**
 * @return array<string,mixed>
 */
function doctor_result($id, $category, $status, $summary, $detail, $repair = '') {
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

function doctor_php_minimum_version($cactiVersion = null) {
	return doctor_is_cacti_13($cactiVersion) ? '8.3.0' : '5.4.0';
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

	return doctor_result('cacti.version', 'Cacti', $status, 'Supported Cacti version', 'Detected ' . $version . '; Doctor requires Cacti 1.2.20 or newer.');
}

/** @return array<string,mixed> */
function doctor_check_php_version() {
	$minimum = doctor_php_minimum_version();
	$status  = version_compare(PHP_VERSION, $minimum, '>=') ? 'pass' : 'fail';

	return doctor_result('php.version', 'PHP', $status, 'Supported PHP version', 'Detected PHP ' . PHP_VERSION . '; this Cacti branch requires PHP ' . $minimum . ' or newer.');
}

function doctor_check_php_security_baseline() {
	if (version_compare(PHP_VERSION, '8.2.0', '<')) {
		return doctor_result('php.security_baseline', 'Security', 'warn', 'PHP security baseline', 'This legacy PHP version is below Doctor\'s recommended PHP 8.2 security baseline. Confirm that your operating-system vendor still supplies security patches and plan an upgrade.');
	}

	return doctor_result('php.security_baseline', 'Security', 'pass', 'PHP security baseline', 'PHP meets Doctor\'s recommended PHP 8.2 or newer security baseline.');
}

/** @return array<string,mixed> */
function doctor_check_php_extensions() {
	$required = doctor_required_php_extensions();
	$missing  = [];
	$context  = PHP_SAPI === 'cli' ? 'current CLI' : 'web';

	foreach ($required as $extension) {
		if (!extension_loaded($extension)) {
			$missing[] = $extension;
		}
	}

	if ($missing !== []) {
		return doctor_result('php.extensions', 'Prerequisites', 'fail', 'Required ' . $context . ' PHP extensions', 'Missing: ' . implode(', ', $missing) . '. Install them through the operating system package manager.');
	}

	return doctor_result('php.extensions', 'Prerequisites', 'pass', 'Required ' . $context . ' PHP extensions', 'All PHP extensions required by the Cacti installer are loaded in this PHP context.');
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
		return 'Doctor does not execute configured binaries while running as root.';
	}

	if (!isset($names[$option]) || !preg_match($names[$option], basename($path))) {
		return 'The file name ' . basename($path) . ' is not expected for ' . $option . ', so Doctor did not execute it.';
	}

	return '';
}

/** @return array<string,mixed> */
function doctor_check_privileges($privileged) {
	if ($privileged) {
		return doctor_result('doctor.privileges', 'Doctor', 'warn', 'Doctor privileges', 'Doctor is running as root, so permission checks describe root rather than the web server or poller account, configured binaries are not executed, and repairs are refused. Run Doctor as the Cacti poller user.');
	}

	return doctor_result('doctor.privileges', 'Doctor', 'pass', 'Doctor privileges', 'Doctor is running without root privileges.');
}

/** @return array<string,mixed> */
function doctor_check_cli_php_extensions($privileged = null) {
	$privileged = $privileged === null ? doctor_running_as_root() : $privileged;
	$path       = (string) read_config_option('path_php_binary', true);

	if ($path === '' || !is_file($path) || !is_executable($path)) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'fail', 'Required CLI PHP extensions', 'The configured PHP CLI executable is unavailable, so its extensions cannot be checked.');
	}

	$refusal = doctor_binary_execution_refusal('path_php_binary', $path, $privileged);

	if ($refusal !== '') {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'warn', 'Required CLI PHP extensions', $refusal);
	}

	if (!doctor_shell_exec_available()) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'warn', 'Required CLI PHP extensions', 'shell_exec() is disabled, so Doctor cannot compare the CLI PHP extensions with Cacti requirements.');
	}

	$code   = 'echo json_encode(get_loaded_extensions());';
	// Startup warnings, such as an extension loaded twice, print to stdout by default and would corrupt the JSON.
	$output = @shell_exec(cacti_escapeshellarg($path) . ' -d display_errors=stderr -d display_startup_errors=0 -r ' . cacti_escapeshellarg($code));
	$loaded = is_string($output) ? json_decode($output, true) : null;

	if (!is_array($loaded)) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'fail', 'Required CLI PHP extensions', 'The configured PHP CLI executable did not return a valid extension list.');
	}

	$loaded  = array_map('strtolower', $loaded);
	$missing = [];

	foreach (doctor_required_php_extensions(true) as $extension) {
		if (!in_array(strtolower($extension), $loaded, true)) {
			$missing[] = $extension;
		}
	}

	if ($missing !== []) {
		return doctor_result('php.cli_extensions', 'Prerequisites', 'fail', 'Required CLI PHP extensions', 'Missing from CLI PHP: ' . implode(', ', $missing) . '. The web and CLI PHP configurations are separate on many systems.');
	}

	return doctor_result('php.cli_extensions', 'Prerequisites', 'pass', 'Required CLI PHP extensions', 'The configured PHP CLI has every extension required by Cacti.');
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
		$missing[] = 'GD TrueType support';
	}

	if ($missing !== []) {
		return doctor_result('php.optional_extensions', 'Prerequisites', 'warn', 'Recommended PHP features', 'Unavailable: ' . implode(', ', $missing) . '. Cacti can run without these features, but related functionality may be limited.');
	}

	return doctor_result('php.optional_extensions', 'Prerequisites', 'pass', 'Recommended PHP features', 'The optional gettext, SNMP, and GD TrueType features are available.');
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
		$problems[] = 'memory_limit is ' . $memoryRaw . ' (' . $recommended . 'M or more is recommended)';
	}

	if ($execution > 0 && $execution < 60) {
		$problems[] = 'max_execution_time is ' . $execution . ' seconds (60 or more is recommended)';
	}

	if ($timezone === '') {
		$problems[] = 'date.timezone is not set';
	}

	$detail = 'memory_limit=' . $memoryRaw . ', max_execution_time=' . $execution . ', date.timezone=' . ($timezone !== '' ? $timezone : 'unset') . '.';

	if ($problems !== []) {
		return doctor_result('php.configuration', 'Prerequisites', 'warn', 'PHP runtime configuration', implode('; ', $problems) . '. Current values: ' . $detail);
	}

	return doctor_result('php.configuration', 'Prerequisites', 'pass', 'PHP runtime configuration', $detail);
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
		return doctor_result('database.connection', 'Database', 'fail', 'Database connection', 'Query failed: ' . $error->getMessage());
	}

	return doctor_result('database.connection', 'Database', (int) $answer === 1 ? 'pass' : 'fail', 'Database connection', (int) $answer === 1 ? 'A read-only query completed successfully.' : 'The database returned an unexpected result.');
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
	$is13     = doctor_is_cacti_13();
	$minimum  = $is13 ? ($identity['server'] === 'MariaDB' ? '10.2.0' : '8.0.0') : '5.6.0';
	$status   = $identity['version'] !== 'unknown' && version_compare($identity['version'], $minimum, '>=') ? 'pass' : 'fail';
	$detail   = $identity['server'] . ' ' . $identity['version'] . ' detected; this Cacti branch requires ' . $identity['server'] . ' ' . $minimum . ' or newer.';

	return doctor_result('database.version', 'Prerequisites', $status, 'Supported database server', $detail);
}

/** @return array<string,mixed> */
function doctor_check_database_charset() {
	$charset   = (string) db_fetch_cell('SELECT @@character_set_database', '', false);
	$collation = (string) db_fetch_cell('SELECT @@collation_database', '', false);
	$status    = strtolower($charset) === 'utf8mb4' ? 'pass' : 'fail';
	$detail    = 'Database character set is ' . ($charset !== '' ? $charset : 'unknown') . ' and collation is ' . ($collation !== '' ? $collation : 'unknown') . '. Cacti requires utf8mb4.';

	return doctor_result('database.charset', 'Prerequisites', $status, 'Database character set', $detail);
}

/** @return array<string,mixed> */
function doctor_check_database_timezone_support() {
	$count = db_fetch_cell('SELECT COUNT(*) FROM mysql.time_zone_name', '', false);

	if ($count === false || $count === null || $count === '') {
		return doctor_result('database.timezone', 'Prerequisites', 'fail', 'Database timezone support', 'The Cacti database account cannot read mysql.time_zone_name. Grant SELECT access and populate the database timezone tables.');
	}

	$status = (int) $count > 0 ? 'pass' : 'fail';
	$detail = $status === 'pass' ? 'The database timezone table is accessible and contains ' . (int) $count . ' entries.' : 'The database timezone table is accessible but empty. Populate the system timezone tables.';

	return doctor_result('database.timezone', 'Prerequisites', $status, 'Database timezone support', $detail);
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
	$detail = $missing === [] ? 'Core tables used by Cacti are present.' : 'Missing core tables: ' . implode(', ', $missing) . '. Restore or upgrade the database before attempting other repairs.';

	return doctor_result('database.core_tables', 'Database', $status, 'Core database tables', $detail);
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
			$problems[] = $name . ' is missing (' . $path . ')';
		} elseif (!is_writable($path)) {
			$problems[] = $name . ' is not writable (' . $path . ')';
		} else {
			continue;
		}

		if (in_array($path, $targets, true)) {
			$repairable = true;
		}
	}

	if ($problems === []) {
		return doctor_result('filesystem.runtime_directories', 'Filesystem', 'pass', 'Runtime directories', 'The cache, log, and RRA directories exist and are writable.');
	}

	return doctor_result('filesystem.runtime_directories', 'Filesystem', 'fail', 'Runtime directories', implode('; ', $problems), $repairable ? 'runtime_directories' : '');
}

/** @return array<string,mixed> */
function doctor_check_config_file_security($path = null) {
	$path = $path === null ? doctor_base_path() . '/include/config.php' : $path;
	$mode = @fileperms($path);

	if (!is_file($path) || !is_readable($path)) {
		return doctor_result('filesystem.config', 'Filesystem', 'fail', 'Cacti configuration file', 'include/config.php is missing or unreadable.');
	}

	if (defined('CACTI_SERVER_OS') && CACTI_SERVER_OS === 'win32') {
		return doctor_result('filesystem.config', 'Filesystem', 'pass', 'Cacti configuration file', 'include/config.php is readable. POSIX mode-bit checks do not apply on Windows.');
	}

	if ($mode !== false && ($mode & 0002) !== 0) {
		return doctor_result('filesystem.config', 'Filesystem', 'fail', 'Cacti configuration file', 'include/config.php is writable by other users. Remove world-write permission because this file contains database credentials.');
	}

	if ($mode !== false && ($mode & 0020) !== 0) {
		return doctor_result('filesystem.config', 'Filesystem', 'warn', 'Cacti configuration file', 'include/config.php is group-writable. Confirm that every member of the owning group is trusted.');
	}

	if ($mode !== false && ($mode & 0004) !== 0) {
		return doctor_result('filesystem.config', 'Filesystem', 'warn', 'Cacti configuration file', 'include/config.php is readable by all local users and contains database credentials. Restrict it to the owner and the web server group.');
	}

	return doctor_result('filesystem.config', 'Filesystem', 'pass', 'Cacti configuration file', 'include/config.php is readable and is not world-readable, group-writable, or world-writable.');
}

/** @return array<string,mixed> */
function doctor_check_cacti_log() {
	$base = doctor_base_path();
	$path = (string) read_config_option('path_cactilog', true);
	$path = $path !== '' ? $path : $base . '/log/cacti.log';

	if (!file_exists($path)) {
		$status = is_writable(dirname($path)) ? 'warn' : 'fail';
		return doctor_result('logging.cacti', 'Logging', $status, 'Cacti log file', 'The log file does not exist. Its parent directory is ' . (is_writable(dirname($path)) ? 'writable, so Cacti can create it.' : 'not writable.'));
	}

	if (!is_file($path) || !is_readable($path) || !is_writable($path)) {
		return doctor_result('logging.cacti', 'Logging', 'fail', 'Cacti log file', 'The configured log path must be a readable and writable regular file.');
	}

	$size   = filesize($path);
	$status = $size !== false && $size > 100 * 1024 * 1024 ? 'warn' : 'pass';
	$detail = 'The log is readable and writable';
	$detail .= $size !== false ? ' and is ' . round($size / 1048576, 1) . ' MiB.' : '.';

	if ($status === 'warn') {
		$detail .= ' Verify that Cacti log rotation is enabled.';
	}

	return doctor_result('logging.cacti', 'Logging', $status, 'Cacti log file', $detail);
}

/**
 * @return array<int,array<string,mixed>>
 */
function doctor_check_required_binaries($privileged = null) {
	$privileged = $privileged === null ? doctor_running_as_root() : $privileged;
	$is13       = doctor_is_cacti_13();
	$binaries = [
		'path_php_binary' => ['label' => 'PHP CLI', 'argument' => '-v', 'pattern' => '/PHP\s+([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => doctor_php_minimum_version()],
		'path_rrdtool'    => ['label' => 'RRDtool', 'argument' => '--version', 'pattern' => '/RRDtool\s+([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => doctor_rrdtool_minimum_version()],
		'path_snmpget'    => ['label' => 'Net-SNMP snmpget', 'argument' => '-V', 'pattern' => '/NET-SNMP version:\s*([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => $is13 ? '5.8.0' : '5.5.0'],
		'path_snmpwalk'   => ['label' => 'Net-SNMP snmpwalk', 'argument' => '-V', 'pattern' => '/NET-SNMP version:\s*([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => $is13 ? '5.8.0' : '5.5.0']
	];

	if ((string) read_config_option('poller_type', true) === '2') {
		$binaries['path_spine'] = ['label' => 'Spine poller', 'argument' => '', 'pattern' => '', 'minimum' => ''];
	}

	$results = [];

	foreach ($binaries as $option => $specification) {
		$path   = (string) read_config_option($option, true);
		$status = $path !== '' && is_file($path) && is_executable($path) ? 'pass' : 'fail';
		$detail = $status === 'pass' ? 'Executable found at ' . $path . '.' : 'The ' . $option . ' setting is empty, missing, or not executable' . ($path !== '' ? ': ' . $path : '.');

		if ($status === 'pass' && $specification['pattern'] !== '') {
			$refusal = doctor_binary_execution_refusal($option, $path, $privileged);
			$version = $refusal === '' ? doctor_probe_binary_version($path, $specification['argument'], $specification['pattern']) : null;

			if ($refusal !== '') {
				$status  = 'warn';
				$detail .= ' ' . $refusal;
			} elseif ($version === null) {
				$status  = 'warn';
				$detail .= ' Doctor could not determine its version.';
			} elseif (version_compare($version, $specification['minimum'], '<')) {
				$status  = 'fail';
				$detail .= ' Detected version ' . $version . '; version ' . $specification['minimum'] . ' or newer is required.';
			} else {
				$detail .= ' Detected version ' . $version . '; minimum is ' . $specification['minimum'] . '.';
			}
		}

		$results[] = doctor_result('binary.' . substr($option, 5), 'Prerequisites', $status, $specification['label'] . ' executable', $detail);
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
	$output = @shell_exec($command);

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
		$problems[] = 'poller_type is not cmd.php or Spine';
	}

	if (!in_array($interval, doctor_supported_poller_intervals(), true)) {
		$problems[] = 'poller_interval is not a supported value';
	}

	if ($problems !== []) {
		return doctor_result('poller.configuration', 'Poller', 'fail', 'Poller configuration', implode('; ', $problems) . '.');
	}

	return doctor_result('poller.configuration', 'Poller', 'pass', 'Poller configuration', 'Poller is ' . ($type === '2' ? 'Spine' : 'cmd.php') . ' with a ' . $interval . '-second interval.');
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
		return doctor_result('poller.freshness', 'Poller', 'warn', 'Main poller freshness', 'No completed main-poller run was found. This can be expected before the first poll.');
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
function doctor_available_repairs() {
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
function doctor_run_repair($repair, $privileged = null) {
	if (!isset(doctor_available_repairs()[$repair])) {
		return doctor_result('repair.' . $repair, 'Repair', 'fail', 'Unknown repair', 'The requested repair is not allow-listed.');
	}

	if ($repair === 'runtime_directories') {
		return doctor_repair_runtime_directories(null, null, $privileged);
	}

	return doctor_result('repair.' . $repair, 'Repair', 'fail', 'Repair unavailable', 'No repair handler is registered.');
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
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', 'Repair runtime directories', 'Repairs are refused while running as root. Run Doctor as the Cacti poller user.');
	}

	if ($base === false) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', 'Repair runtime directories', 'The Cacti base directory cannot be resolved.');
	}

	$prefix = rtrim($base, '/') . '/';
	$errors = [];

	foreach ($directories as $name => $path) {
		if (is_dir($path) && is_writable($path)) {
			continue;
		}

		$parent = realpath(dirname($path));

		if ($parent === false || ($parent !== $base && strpos($parent . '/', $prefix) !== 0)) {
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
			continue;
		}

		clearstatcache();

		if (!is_dir($path) || !is_writable($path)) {
			$errors[] = $name . ': still not a writable directory';
		}
	}

	if ($errors !== []) {
		return doctor_result('repair.runtime_directories', 'Repair', 'fail', 'Repair runtime directories', implode('; ', $errors));
	}

	return doctor_result('repair.runtime_directories', 'Repair', 'pass', 'Repair runtime directories', 'Runtime directories now exist and are writable by the current process.');
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
