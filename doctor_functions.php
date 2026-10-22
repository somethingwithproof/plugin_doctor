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

/**
 * Run the initial set of non-mutating installation checks.
 *
 * @return array<int,array<string,mixed>>
 */
function doctor_run_checks() {
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
	// The path passed doctor_binary_execution_refusal() and both arguments are escaped constants.
	$output = @shell_exec(cacti_escapeshellarg($path) . ' -d display_errors=stderr -d display_startup_errors=0 -r ' . cacti_escapeshellarg($code)); // nosemgrep: php.lang.security.exec-use.exec-use
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
	$minimum  = doctor_database_recommended_version($identity['server']);

	if ($identity['version'] === 'unknown') {
		return doctor_result('database.version', 'Prerequisites', 'fail', 'Supported database server', 'Doctor could not determine the database server version from ' . $raw . '.');
	}

	$status = version_compare($identity['version'], $minimum, '>=') ? 'pass' : 'warn';
	$detail = $identity['server'] . ' ' . $identity['version'] . ' detected; this Cacti branch recommends ' . $identity['server'] . ' ' . $minimum . ' or newer.';

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
	$status = $size !== false && $size > doctor_threshold('doctor_log_warn_mb', 100) * 1048576 ? 'warn' : 'pass';
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
	$snmp       = doctor_snmp_recommended_version();
	$binaries = [
		'path_php_binary' => ['label' => 'PHP CLI', 'argument' => '-v', 'pattern' => '/PHP\s+([0-9]+\.[0-9]+(?:\.[0-9]+)?)/i', 'minimum' => doctor_php_minimum_version()],
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
			} elseif ($specification['minimum'] === '') {
				$detail .= ' Detected version ' . $version . '.';
			} elseif (version_compare($version, $specification['minimum'], '<')) {
				$below   = isset($specification['below']) ? $specification['below'] : 'fail';
				$status  = $below;
				$detail .= ' Detected version ' . $version . '; version ' . $specification['minimum'] . ' or newer is ' . ($below === 'warn' ? 'recommended.' : 'required.');
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
		return doctor_result('cacti.schema_version', 'Cacti', 'fail', 'Database schema version', 'The version table is empty or unreadable, so the schema version is unknown.');
	}

	if ($databaseVersion === 'new_install') {
		return doctor_result('cacti.schema_version', 'Cacti', 'fail', 'Database schema version', 'The version table still reads new_install, so the installer never finished. Open install/ in a browser to complete it.');
	}

	$order = version_compare($database, $code);

	if ($order < 0) {
		return doctor_result('cacti.schema_version', 'Cacti', 'fail', 'Database schema version', 'The database schema is at ' . $database . ' but the installed code is ' . $code . '. Open install/ in a browser to finish the upgrade.');
	}

	if ($order > 0) {
		return doctor_result('cacti.schema_version', 'Cacti', 'warn', 'Database schema version', 'The database schema (' . $database . ') is newer than the installed code (' . $code . '). The code may have been rolled back.');
	}

	return doctor_result('cacti.schema_version', 'Cacti', 'pass', 'Database schema version', 'The database schema (' . $database . ') matches the installed code.');
}

/** @return array<string,mixed> */
function doctor_check_schema_version() {
	$database = (string) db_fetch_cell('SELECT cacti FROM version LIMIT 1', '', false);

	return doctor_evaluate_schema_version($database, defined('CACTI_VERSION') ? (string) CACTI_VERSION : '');
}

/** @return array<string,mixed> */
function doctor_evaluate_poller_runtime($runtime, $interval, $warnPercent = 80) {
	if ($runtime <= 0) {
		return doctor_result('poller.runtime', 'Poller', 'pass', 'Main poller run time', 'No completed run time is recorded yet.');
	}

	$detail = 'The last main-poller run took ' . round($runtime, 1) . ' seconds of the ' . $interval . '-second interval.';

	if ($runtime >= $interval) {
		return doctor_result('poller.runtime', 'Poller', 'fail', 'Main poller run time', $detail . ' Runs that outlast the interval overlap and lose data; add poller processes or threads, or use Spine.');
	}

	if ($runtime >= $interval * $warnPercent / 100) {
		return doctor_result('poller.runtime', 'Poller', 'warn', 'Main poller run time', $detail . ' Little headroom remains before polls overlap.');
	}

	return doctor_result('poller.runtime', 'Poller', 'pass', 'Main poller run time', $detail);
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
		return doctor_result('poller.output_backlog', 'Poller', 'warn', 'Unprocessed poller output', $stale . ' poller_output rows are older than two polling intervals and were never written to RRD files. Check the Cacti log for "Poller Output Table not Empty" and confirm max_heap_table_size is large enough.');
	}

	return doctor_result('poller.output_backlog', 'Poller', 'pass', 'Unprocessed poller output', 'No stale rows remain in poller_output.');
}

/**
 * @param array<int,array<string,string>> $pollers
 * @return array<string,mixed>
 */
function doctor_evaluate_remote_pollers($pollers, $interval, $now) {
	if (!cacti_sizeof($pollers)) {
		return doctor_result('poller.remote', 'Poller', 'pass', 'Remote pollers', 'No remote pollers are enabled.');
	}

	$threshold = max(900, $interval * 3);
	$stale     = [];

	foreach ($pollers as $poller) {
		$lastUpdate = (int) $poller['last_update'];

		if ($lastUpdate <= 0) {
			$stale[] = $poller['name'] . ' (ID ' . $poller['id'] . ') has never reported';
		} elseif ($now - $lastUpdate > $threshold) {
			$stale[] = $poller['name'] . ' (ID ' . $poller['id'] . ') last reported ' . ($now - $lastUpdate) . ' seconds ago';
		}
	}

	if ($stale !== []) {
		return doctor_result('poller.remote', 'Poller', 'fail', 'Remote pollers', implode('; ', $stale) . '. The failure threshold is ' . $threshold . ' seconds.');
	}

	return doctor_result('poller.remote', 'Poller', 'pass', 'Remote pollers', cacti_sizeof($pollers) . ' enabled remote pollers reported within ' . $threshold . ' seconds.');
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
		return doctor_result('cacti.plugin_files', 'Cacti', 'fail', 'Enabled plugin files', 'Enabled plugins are missing from ' . $plugins . ': ' . implode(', ', $missing) . '. Restore their files or disable them in Plugin Management.');
	}

	return doctor_result('cacti.plugin_files', 'Cacti', 'pass', 'Enabled plugin files', 'Every enabled plugin has its setup.php in place.');
}

/**
 * Boost stores the last run as a timestamp or, on some releases, a date string.
 *
 * @return array<string,mixed>
 */
function doctor_evaluate_boost($enabled, $rows, $maxRecords, $lastRun, $intervalMinutes, $now) {
	if (!$enabled) {
		return doctor_result('poller.boost', 'Poller', 'pass', 'Boost RRD updates', 'Boost is disabled, so the poller writes RRD files directly.');
	}

	$lastRun = is_numeric($lastRun) ? (int) $lastRun : (int) strtotime((string) $lastRun);
	$window  = max(1, (int) $intervalMinutes) * 60 * 2;

	if ($lastRun <= 0) {
		return doctor_result('poller.boost', 'Poller', 'warn', 'Boost RRD updates', 'Boost is enabled but has no recorded run. This can be expected before its first flush.');
	}

	$age = max(0, $now - $lastRun);

	if ($age > $window) {
		return doctor_result('poller.boost', 'Poller', 'fail', 'Boost RRD updates', 'Boost last flushed ' . $age . ' seconds ago, more than twice its ' . (int) $intervalMinutes . '-minute interval. Graphs stop updating until it runs; check the Cacti log for BOOST errors.');
	}

	if ($maxRecords > 0 && $rows > $maxRecords) {
		return doctor_result('poller.boost', 'Poller', 'warn', 'Boost RRD updates', 'poller_output_boost holds ' . $rows . ' rows, above the ' . $maxRecords . '-row limit that forces a flush. Boost is falling behind.');
	}

	return doctor_result('poller.boost', 'Poller', 'pass', 'Boost RRD updates', 'Boost last flushed ' . $age . ' seconds ago with ' . $rows . ' rows waiting.');
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
		return doctor_result('filesystem.rrd_files', 'Filesystem', 'warn', 'RRD files', count($missing) . ' of ' . count($sources) . ' active data sources have no RRD file, for example ' . implode(', ', array_slice($missing, 0, 3)) . '. New data sources get one after their first poll; otherwise check the RRA directory and its permissions.');
	}

	return doctor_result('filesystem.rrd_files', 'Filesystem', 'pass', 'RRD files', 'All ' . count($sources) . ' active data sources have an RRD file.');
}

/** @return array<string,mixed> */
function doctor_evaluate_disk_space($free, $total, $path, $warnPercent = 10, $failPercent = 2) {
	if ($free === false || $total === false || $total <= 0) {
		return doctor_result('filesystem.disk_space', 'Filesystem', 'warn', 'RRA disk space', 'Doctor could not measure free space for ' . $path . '.');
	}

	$percent = $free / $total * 100;
	$detail  = round($percent, 1) . '% (' . round($free / 1073741824, 1) . ' GiB) free on the file system holding ' . $path . '.';

	if ($percent < $failPercent) {
		return doctor_result('filesystem.disk_space', 'Filesystem', 'fail', 'RRA disk space', $detail . ' RRD updates fail silently when the disk fills.');
	}

	if ($percent < $warnPercent) {
		return doctor_result('filesystem.disk_space', 'Filesystem', 'warn', 'RRA disk space', $detail);
	}

	return doctor_result('filesystem.disk_space', 'Filesystem', 'pass', 'RRA disk space', $detail);
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
		return doctor_result('database.clock', 'Database', 'warn', 'Database clock', 'Doctor could not read the database clock.');
	}

	$drift  = abs((int) $phpTime - (int) $databaseTime);
	$detail = 'The database and PHP clocks differ by ' . $drift . ' seconds.';

	if ($drift > $failSeconds) {
		return doctor_result('database.clock', 'Database', 'fail', 'Database clock', $detail . ' Poll timestamps will be misaligned; synchronise both hosts with NTP.');
	}

	if ($drift > $warnSeconds) {
		return doctor_result('database.clock', 'Database', 'warn', 'Database clock', $detail . ' Synchronise both hosts with NTP.');
	}

	return doctor_result('database.clock', 'Database', 'pass', 'Database clock', $detail);
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
		return doctor_result('poller.spine_config', 'Poller', 'pass', 'Spine configuration', 'Spine is not the configured poller.');
	}

	$database = $database === null ? (string) $database_default : $database;
	$user     = $user === null ? (string) $database_username : $user;
	$path     = (string) read_config_option('path_spine_config', true);

	if ($path === '') {
		return doctor_result('poller.spine_config', 'Poller', 'warn', 'Spine configuration', 'path_spine_config is not set, so Spine uses its compiled-in search path and Doctor cannot verify which file it reads.');
	}

	$contents = is_file($path) && is_readable($path) ? @file_get_contents($path) : false;

	if ($contents === false) {
		return doctor_result('poller.spine_config', 'Poller', 'fail', 'Spine configuration', 'The Spine configuration file is missing or unreadable: ' . $path . '.');
	}

	$settings = [];

	foreach (preg_split('/\r?\n/', $contents) as $line) {
		if (preg_match('/^\s*(DB_Database|DB_User)\s+(\S+)/', $line, $matches)) {
			$settings[$matches[1]] = $matches[2];
		}
	}

	$problems = [];

	if (isset($settings['DB_Database']) && $settings['DB_Database'] !== $database) {
		$problems[] = 'DB_Database is ' . $settings['DB_Database'] . ' but Cacti uses ' . $database;
	}

	if (isset($settings['DB_User']) && $settings['DB_User'] !== $user) {
		$problems[] = 'DB_User is ' . $settings['DB_User'] . ' but Cacti uses ' . $user;
	}

	$mode = fileperms($path);
	if ($mode !== false && ($mode & 0004)) {
		$problems[] = 'the file is world-readable and holds the database password';
	}

	if ($problems !== []) {
		return doctor_result('poller.spine_config', 'Poller', 'warn', 'Spine configuration', $path . ': ' . implode('; ', $problems) . '.');
	}

	return doctor_result('poller.spine_config', 'Poller', 'pass', 'Spine configuration', $path . ' uses the same database and user as Cacti.');
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
			$disabled[] = $name . ' is ' . $variables[$name];
		}
	}

	if ($disabled !== []) {
		return doctor_result('database.innodb', 'Database', 'warn', 'InnoDB safety settings', implode('; ', $disabled) . '. Cacti recommends ON; doublewrite may stay off only on ZFS or similar journaling storage.');
	}

	return doctor_result('database.innodb', 'Database', 'pass', 'InnoDB safety settings', 'innodb_file_per_table and innodb_doublewrite are enabled.');
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
		return doctor_result('logging.recent_errors', 'Logging', 'pass', 'Recent log errors', 'None of the last ' . count($lines) . ' log lines report an error.');
	}

	arsort($messages);
	$top = key($messages);

	return doctor_result('logging.recent_errors', 'Logging', 'warn', 'Recent log errors', $errors . ' of the last ' . count($lines) . ' log lines report an error. Most frequent (' . current($messages) . 'x): ' . substr($top, 0, 200));
}

/** @return array<string,mixed> */
function doctor_check_recent_log_errors() {
	$path = (string) read_config_option('path_cactilog', true);
	$path = $path !== '' ? $path : doctor_base_path() . '/log/cacti.log';

	if (!is_file($path) || !is_readable($path)) {
		return doctor_result('logging.recent_errors', 'Logging', 'pass', 'Recent log errors', 'The Cacti log is not readable; see the Cacti log file check.');
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
		return doctor_result('devices.health', 'Devices', 'pass', 'Device availability', 'No enabled devices are configured.');
	}

	if ($down === 0 && $recovering === 0) {
		return doctor_result('devices.health', 'Devices', 'pass', 'Device availability', 'All ' . $total . ' enabled devices are up.');
	}

	$detail = $down . ' of ' . $total . ' enabled devices are down and ' . $recovering . ' recovering.';
	$listed = [];

	if (!is_array($offenders)) {
		$detail   .= ' The down devices could not be listed.';
		$offenders = [];
	}

	foreach ($offenders as $device) {
		$entry = $device['description'] . ' (' . $device['hostname'] . ')';

		if ((int) $device['failed'] > 0) {
			$entry .= ' down since ' . date('Y-m-d H:i', (int) $device['failed']);
		}

		if ($device['status_last_error'] !== '') {
			$entry .= ': ' . $device['status_last_error'];
		}

		$listed[] = $entry;
	}

	if ($listed !== []) {
		$detail .= ' Longest down: ' . implode('; ', $listed) . '.';
	}

	if ($total >= 4 && $down * 2 > $total) {
		return doctor_result('devices.health', 'Devices', 'fail', 'Device availability', $detail . ' With most devices down, check the poller host\'s network and SNMP settings first.');
	}

	return doctor_result('devices.health', 'Devices', 'warn', 'Device availability', $detail);
}

/** @return array<string,mixed> */
function doctor_check_devices() {
	$counts = db_fetch_assoc("SELECT COUNT(*) AS total, SUM(status = 1) AS down, SUM(status = 2) AS recovering FROM host WHERE disabled = '' AND deleted = ''", false);

	if (!is_array($counts) || !isset($counts[0])) {
		return doctor_result('devices.health', 'Devices', 'warn', 'Device availability', 'Doctor could not read device status from the host table.');
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
	$subject = 'Cacti Doctor on ' . $host . ': ' . $counts['fail'] . ' failed, ' . $counts['warn'] . ' warnings';
	$lines   = [count($changes) . ' Cacti Doctor checks changed status on ' . $host . '.', ''];

	foreach ($changes as $change) {
		$lines[] = $change['summary'] . ': ' . strtoupper($change['from']) . ' -> ' . strtoupper($change['to']);
		$lines[] = '  ' . $change['detail'];
	}

	$lines[] = '';
	$lines[] = 'Totals: ' . $counts['pass'] . ' passed, ' . $counts['warn'] . ' warnings, ' . $counts['fail'] . ' failed.';

	return ['subject' => $subject, 'body' => implode("\n", $lines) . "\n"];
}

function doctor_schedule_due($lastRun, $intervalMinutes, $now) {
	return (int) $lastRun <= 0 || $now - (int) $lastRun >= max(1, (int) $intervalMinutes) * 60;
}

/**
 * @param array<int,array<string,mixed>> $results
 * @return array<int,array<string,string>>
 */
function doctor_run_scheduled($results, $now) {
	$previous = doctor_state_decode(read_config_option('doctor_state', true));
	$changes  = doctor_state_changes($previous, $results, (string) read_config_option('doctor_alert_warnings', true) === 'on');

	set_config_option('doctor_state', doctor_state_encode($results));
	set_config_option('doctor_last_run', (string) $now);

	foreach ($changes as $change) {
		cacti_log('Doctor check ' . $change['id'] . ' changed from ' . $change['from'] . ' to ' . $change['to'] . ': ' . $change['detail'], false, 'DOCTOR');
	}

	$recipients = trim((string) read_config_option('doctor_alert_emails', true));

	if ($changes !== [] && $recipients !== '') {
		$alert = doctor_alert_message($changes, doctor_result_counts($results), php_uname('n'));
		$error = send_mail($recipients, '', $alert['subject'], $alert['body']);

		if ($error !== '') {
			cacti_log('Doctor could not send the alert email: ' . $error, false, 'DOCTOR');
		}
	}

	return $changes;
}

/**
 * Runs from the poller_bottom hook. The checks run in a background CLI
 * process so they never extend the poller's own run time.
 */
function doctor_poller_bottom() {
	global $config;

	if ((string) read_config_option('doctor_schedule_enabled', true) !== 'on') {
		return;
	}

	$now = time();

	if (!doctor_schedule_due(read_config_option('doctor_last_run', true), read_config_option('doctor_schedule_interval', true), $now)) {
		return;
	}

	$php     = (string) read_config_option('path_php_binary', true);
	$refusal = doctor_binary_execution_refusal('path_php_binary', $php, doctor_running_as_root());

	if ($refusal !== '') {
		cacti_log('Doctor scheduled checks skipped: ' . $refusal, false, 'DOCTOR');
		return;
	}

	// Recording the start here stops the next poller cycle from launching a second run.
	set_config_option('doctor_last_run', (string) $now);
	// The binary passed doctor_binary_execution_refusal() and the script path is fixed and escaped.
	exec_background($php, '-q ' . cacti_escapeshellarg($config['base_path'] . '/plugins/doctor/cli/doctor.php') . ' --scheduled'); // nosemgrep: php.lang.security.exec-use.exec-use
}

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
	return preg_replace('/(\w*(?:password|passwd|pass|secret|token|community|auth_?key|priv_?key))\b(\s*[=:]\s*|\s+)([\'"]?)[^\s\'";]+/i', '$1$2$3[redacted]', (string) $text);
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
		return 'Refusing to overwrite ' . $path . '.';
	}

	// The umask makes the file private from the moment it exists.
	$umask  = umask(0077);
	$handle = @fopen($path, 'x');
	umask($umask);

	if ($handle === false) {
		return 'Cannot create ' . $path . '.';
	}

	$stat = fstat($handle);

	if ($stat === false || ($stat['mode'] & 0077) !== 0) {
		fclose($handle);

		return 'Could not make ' . $path . ' private.';
	}

	$written = fwrite($handle, $contents);
	fclose($handle);

	return $written === strlen($contents) ? '' : 'Writing ' . $path . ' failed.';
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
