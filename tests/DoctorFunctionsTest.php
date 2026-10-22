<?php

require_once __DIR__ . '/CactiStubs.php';
require_once dirname(__DIR__) . '/doctor_functions.php';

test('result counts include pass warning and failure outcomes', function () {
	$results = [
		doctor_result('one', 'Test', 'pass', 'One', 'Passed'),
		doctor_result('two', 'Test', 'warn', 'Two', 'Warning'),
		doctor_result('three', 'Test', 'fail', 'Three', 'Failed'),
		doctor_result('four', 'Test', 'pass', 'Four', 'Passed')
	];

	expect(doctor_result_counts($results))->toBe(['pass' => 2, 'warn' => 1, 'fail' => 1]);
});

test('unknown repairs fail closed', function () {
	$result = doctor_run_repair('not_registered');

	expect($result['status'])->toBe('fail')
		->and($result['repairable'])->toBeFalse();
});

test('runtime directory repair is the only initial allow-listed repair', function () {
	expect(array_keys(doctor_available_repairs()))->toBe(['runtime_directories']);
});

test('PHP memory values are converted to bytes', function () {
	expect(doctor_ini_bytes('-1'))->toBe(-1)
		->and(doctor_ini_bytes('128M'))->toBe(134217728)
		->and(doctor_ini_bytes('1G'))->toBe(1073741824)
		->and(doctor_ini_bytes('512K'))->toBe(524288);
});

test('MariaDB compatibility prefixes do not hide the server version', function () {
	$identity = doctor_database_identity('5.5.5-10.11.6-MariaDB-0+deb12u1');

	expect($identity['server'])->toBe('MariaDB')
		->and($identity['version'])->toBe('10.11.6');
});

test('MySQL server versions are identified', function () {
	$identity = doctor_database_identity('8.0.36-0ubuntu0.22.04.1');

	expect($identity['server'])->toBe('MySQL')
		->and($identity['version'])->toBe('8.0.36');
});

test('attribute escaping works without a Cacti helper', function () {
	expect(doctor_html_escape_attr('value\'"<'))->toBe('value&#039;&quot;&lt;');
});

test('legacy Cacti defaults to its historical PHP floor', function () {
	expect(doctor_php_minimum_version())->toBe('5.4.0');
});

test('parent paths are resolved without the PHP 7 dirname levels argument', function () {
	expect(doctor_parent_directory('/srv/cacti/plugins/doctor', 2))->toBe('/srv/cacti');
});

test('configured binaries must carry the expected file name before Doctor executes them', function () {
	expect(doctor_binary_execution_refusal('path_rrdtool', '/usr/bin/rrdtool', false))->toBe('')
		->and(doctor_binary_execution_refusal('path_php_binary', '/usr/bin/php8.2', false))->toBe('')
		->and(doctor_binary_execution_refusal('path_snmpwalk', 'C:/net-snmp/bin/snmpwalk.exe', false))->toBe('')
		->and(doctor_binary_execution_refusal('path_rrdtool', '/tmp/payload.sh', false))->not->toBe('')
		->and(doctor_binary_execution_refusal('path_php_binary', '/bin/sh', false))->not->toBe('')
		->and(doctor_binary_execution_refusal('path_unknown', '/usr/bin/rrdtool', false))->not->toBe('');
});

test('configured binaries are never executed with root privileges', function () {
	expect(doctor_binary_execution_refusal('path_rrdtool', '/usr/bin/rrdtool', true))->not->toBe('');
});

test('a misnamed RRDtool path is reported without being executed', function () {
	$directory = doctor_test_directory();
	$marker    = $directory . '/executed';
	$GLOBALS['doctor_test_settings'] = [
		'path_rrdtool' => doctor_test_executable($directory, 'payload', 'touch ' . escapeshellarg($marker))
	];

	$results = doctor_check_required_binaries(false);

	expect($results[1]['id'])->toBe('binary.rrdtool')
		->and($results[1]['status'])->toBe('warn')
		->and(file_exists($marker))->toBeFalse();
});

test('a misnamed PHP CLI path is not executed to list extensions', function () {
	$directory = doctor_test_directory();
	$marker    = $directory . '/executed';
	$GLOBALS['doctor_test_settings'] = [
		'path_php_binary' => doctor_test_executable($directory, 'payload', 'touch ' . escapeshellarg($marker))
	];

	$result = doctor_check_cli_php_extensions(false);

	expect($result['status'])->toBe('warn')
		->and(file_exists($marker))->toBeFalse();
});

test('a correctly named binary is not executed when Doctor runs as root', function () {
	$directory = doctor_test_directory();
	$marker    = $directory . '/executed';
	$GLOBALS['doctor_test_settings'] = [
		'path_rrdtool' => doctor_test_executable($directory, 'rrdtool', 'touch ' . escapeshellarg($marker) . '; echo "RRDtool 1.7.2"')
	];

	$results = doctor_check_required_binaries(true);

	expect($results[1]['status'])->toBe('warn')
		->and(file_exists($marker))->toBeFalse();
});

test('running as root is reported because writability results describe root', function () {
	expect(doctor_check_privileges(true)['status'])->toBe('warn')
		->and(doctor_check_privileges(false)['status'])->toBe('pass');
});

test('Cacti 1.3 requires the PHP release its composer.json declares', function () {
	expect(doctor_php_minimum_version('1.3.0'))->toBe('8.3.0')
		->and(doctor_php_minimum_version('1.2.30'))->toBe('5.4.0');
});

test('the RRDtool floor follows the oldest release each Cacti branch supports', function () {
	unset($GLOBALS['rrdtool_versions']);

	expect(doctor_rrdtool_minimum_version('1.2.20'))->toBe('1.3.0')
		->and(doctor_rrdtool_minimum_version('1.3.0'))->toBe('1.5.0');
});

test('the RRDtool floor is read from Cacti when its version list is loaded', function () {
	$GLOBALS['rrdtool_versions'] = ['1.6.0' => 'RRDtool 1.6+', '1.7.0' => 'RRDtool 1.7+'];

	expect(doctor_rrdtool_minimum_version('1.3.0'))->toBe('1.6.0');

	unset($GLOBALS['rrdtool_versions']);
});

test('a 15-second poller interval is accepted', function () {
	unset($GLOBALS['poller_intervals']);
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '1', 'poller_interval' => '15'];

	expect(doctor_check_poller_configuration()['status'])->toBe('pass');
});

test('poller intervals are read from Cacti when its interval list is loaded', function () {
	$GLOBALS['poller_intervals']     = [45 => 'Every 45 Seconds'];
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '1', 'poller_interval' => '45'];

	expect(doctor_check_poller_configuration()['status'])->toBe('pass');

	unset($GLOBALS['poller_intervals']);
});

test('an unset PHP timezone is reported even though PHP falls back to UTC', function () {
	$result = doctor_evaluate_php_configuration('-1', 0, '', '8.2.0');

	expect($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('date.timezone');
});

test('memory below the Cacti recommendation of 400M warns on PHP 7 and newer', function () {
	expect(doctor_evaluate_php_configuration('256M', 0, 'UTC', '8.2.0')['status'])->toBe('warn')
		->and(doctor_evaluate_php_configuration('400M', 0, 'UTC', '8.2.0')['status'])->toBe('pass');
});

test('memory below the Cacti recommendation of 800M warns on PHP 5', function () {
	expect(doctor_evaluate_php_configuration('512M', 0, 'UTC', '5.6.40')['status'])->toBe('warn')
		->and(doctor_evaluate_php_configuration('800M', 0, 'UTC', '5.6.40')['status'])->toBe('pass');
});

test('the log directory follows the configured Cacti log file', function () {
	$GLOBALS['doctor_test_settings'] = ['path_cactilog' => '/var/log/cacti/cacti.log'];

	$directories = doctor_runtime_directories('/srv/cacti');

	expect($directories['log'])->toBe('/var/log/cacti')
		->and($directories['cache'])->toBe('/srv/cacti/cache')
		->and($directories['rra'])->toBe('/srv/cacti/rra');
});

test('the log directory defaults to the installation when no log file is configured', function () {
	$GLOBALS['doctor_test_settings'] = [];

	expect(doctor_runtime_directories('/srv/cacti')['log'])->toBe('/srv/cacti/log');
});

test('the cache directory follows the Cacti 1.3 cache path', function () {
	$code = 'define("CACTI_PATH_CACHE", "/var/cache/cacti");'
		. 'require ' . var_export(__DIR__ . '/CactiStubs.php', true) . ';'
		. 'require ' . var_export(dirname(__DIR__) . '/doctor_functions.php', true) . ';'
		. 'echo doctor_runtime_directories("/srv/cacti")["cache"];';

	expect(shell_exec(escapeshellarg(PHP_BINARY) . ' -r ' . escapeshellarg($code)))->toBe('/var/cache/cacti');
});

test('PHP startup warnings do not hide the CLI extension list', function () {
	$scanDirectory = doctor_test_directory();
	file_put_contents($scanDirectory . '/zz-doctor.ini', "display_errors=On\ndisplay_startup_errors=On\nextension=doctor_missing_extension\n");
	$previous = getenv('PHP_INI_SCAN_DIR');
	putenv('PHP_INI_SCAN_DIR=' . $scanDirectory);
	$GLOBALS['doctor_test_settings'] = ['path_php_binary' => PHP_BINARY];

	$result = doctor_check_cli_php_extensions(false);

	putenv($previous === false ? 'PHP_INI_SCAN_DIR' : 'PHP_INI_SCAN_DIR=' . $previous);

	expect($result['detail'])->not->toContain('did not return a valid extension list');
});

test('a poller that keeps starting but never completes is stale', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '300', 'poller_lastrun_1' => (string) time()];
	$GLOBALS['doctor_test_cells']    = ['SELECT UNIX_TIMESTAMP(last_update) FROM poller WHERE id = 1' => (string) (time() - 7200)];

	expect(doctor_check_poller_freshness()['status'])->toBe('fail');
});

test('a recently completed poll is fresh', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '300'];
	$GLOBALS['doctor_test_cells']    = ['SELECT UNIX_TIMESTAMP(last_update) FROM poller WHERE id = 1' => (string) (time() - 60)];

	expect(doctor_check_poller_freshness()['status'])->toBe('pass');
});

test('a poller that has never completed warns', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '300', 'poller_lastrun_1' => (string) time()];
	$GLOBALS['doctor_test_cells']    = ['SELECT UNIX_TIMESTAMP(last_update) FROM poller WHERE id = 1' => '0'];

	expect(doctor_check_poller_freshness()['status'])->toBe('warn');
});

test('the runtime repair creates a missing directory inside the installation', function () {
	$base = doctor_test_directory();

	$result = doctor_repair_runtime_directories($base, ['cache' => $base . '/cache'], false);

	expect($result['status'])->toBe('pass')
		->and(is_dir($base . '/cache'))->toBeTrue();
});

test('the runtime repair refuses symbolic links', function () {
	$base   = doctor_test_directory();
	$target = doctor_test_directory();
	chmod($target, 0500);
	symlink($target, $base . '/cache');

	$result = doctor_repair_runtime_directories($base, ['cache' => $base . '/cache'], false);
	clearstatcache();

	expect($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('symbolic links')
		->and(fileperms($target) & 0777)->toBe(0500);
})->skip(function_exists('posix_geteuid') && posix_geteuid() === 0, 'root can write a 0500 directory');

test('the runtime repair refuses directories outside the installation', function () {
	$base    = doctor_test_directory();
	$outside = doctor_test_directory();

	$result = doctor_repair_runtime_directories($base, ['log' => $outside . '/log'], false);

	expect($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('outside the Cacti installation')
		->and(file_exists($outside . '/log'))->toBeFalse();
});

test('the runtime repair refuses to run as root', function () {
	$base = doctor_test_directory();

	$result = doctor_repair_runtime_directories($base, ['cache' => $base . '/cache'], true);

	expect($result['status'])->toBe('fail')
		->and(file_exists($base . '/cache'))->toBeFalse();
});

test('the runtime repair does not report success for a file in place of a directory', function () {
	$base = doctor_test_directory();
	file_put_contents($base . '/cache', '');

	expect(doctor_repair_runtime_directories($base, ['cache' => $base . '/cache'], false)['status'])->toBe('fail');
});

test('a world-readable configuration file warns because it holds database credentials', function () {
	$path = doctor_test_directory() . '/config.php';
	file_put_contents($path, '<?php');
	chmod($path, 0644);

	$result = doctor_check_config_file_security($path);

	expect($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('readable by all local users');
});

test('a configuration file restricted to its owner and group passes', function () {
	$path = doctor_test_directory() . '/config.php';
	file_put_contents($path, '<?php');
	chmod($path, 0640);

	expect(doctor_check_config_file_security($path)['status'])->toBe('pass');
});

test('the runtime repair never follows the configured log file into code directories', function () {
	$base = doctor_test_directory();
	mkdir($base . '/include', 0555);
	$GLOBALS['doctor_test_settings'] = ['path_cactilog' => $base . '/include/cacti.log'];

	doctor_repair_runtime_directories($base, null, false);
	clearstatcache();

	expect(fileperms($base . '/include') & 0777)->toBe(0555);
});

test('the runtime repair skips healthy directories outside the installation', function () {
	$base    = doctor_test_directory();
	$outside = doctor_test_directory();

	$result = doctor_repair_runtime_directories($base, ['log' => $outside, 'cache' => $base . '/cache'], false);

	expect($result['status'])->toBe('pass')
		->and(is_dir($base . '/cache'))->toBeTrue();
});

test('no repair is offered when only a directory the repair cannot touch is broken', function () {
	$base = doctor_test_directory();
	mkdir($base . '/cache');
	mkdir($base . '/rra');
	$GLOBALS['doctor_test_settings'] = ['path_cactilog' => $base . '/missing/cacti.log'];

	$result = doctor_check_runtime_directories($base);

	expect($result['status'])->toBe('fail')
		->and($result['repairable'])->toBeFalse();
});

test('versioned binary names are recognized and PHP CGI or FPM binaries are not used for -r', function () {
	expect(doctor_binary_execution_refusal('path_rrdtool', '/opt/rrdtool-1.7/bin/rrdtool-1.7', false))->toBe('')
		->and(doctor_binary_execution_refusal('path_php_binary', 'C:/php/php-win.exe', false))->toBe('')
		->and(doctor_binary_execution_refusal('path_php_binary', '/usr/sbin/php-fpm8.2', false))->not->toBe('')
		->and(doctor_binary_execution_refusal('path_php_binary', '/usr/bin/php-cgi', false))->not->toBe('');
});

test('an unknown effective user on Unix is treated as root', function () {
	expect(doctor_effective_user_is_root(null, false))->toBeTrue()
		->and(doctor_effective_user_is_root(0, false))->toBeTrue()
		->and(doctor_effective_user_is_root(1000, false))->toBeFalse()
		->and(doctor_effective_user_is_root(null, true))->toBeFalse();
});

test('database recommendations follow the Cacti utility check for each branch', function () {
	expect(doctor_database_recommended_version('MariaDB', '1.3.0'))->toBe('10.11.0')
		->and(doctor_database_recommended_version('MySQL', '1.3.0'))->toBe('8.4.0')
		->and(doctor_database_recommended_version('MariaDB', '1.2.20'))->toBe('5.6.0')
		->and(doctor_database_recommended_version('MySQL', '1.2.20'))->toBe('5.6.0');
});

test('a database older than the recommendation warns instead of failing', function () {
	$GLOBALS['doctor_test_cells'] = ['SELECT VERSION()' => '5.5.62'];

	$result = doctor_check_database_version();

	expect($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('recommends MySQL 5.6.0');
});

test('an unrecognized database version still fails', function () {
	$GLOBALS['doctor_test_cells'] = ['SELECT VERSION()' => 'unparseable'];

	expect(doctor_check_database_version()['status'])->toBe('fail');
});

test('Net-SNMP is only compared against a version on Cacti 1.3', function () {
	expect(doctor_snmp_recommended_version('1.3.0'))->toBe('5.9.0')
		->and(doctor_snmp_recommended_version('1.2.20'))->toBe('');
});

test('an old Net-SNMP passes on Cacti 1.2 because that branch documents no minimum', function () {
	$directory = doctor_test_directory();
	$GLOBALS['doctor_test_settings'] = [
		'path_snmpget' => doctor_test_executable($directory, 'snmpget', 'echo "NET-SNMP version: 5.4.2"')
	];

	$results = doctor_check_required_binaries(false);

	expect($results[2]['id'])->toBe('binary.snmpget')
		->and($results[2]['status'])->toBe('pass')
		->and($results[2]['detail'])->toContain('Detected version 5.4.2');
});

test('a database schema behind the installed code fails', function () {
	$result = doctor_evaluate_schema_version('1.2.24', '1.2.25');

	expect($result['id'])->toBe('cacti.schema_version')
		->and($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('1.2.24')
		->and($result['detail'])->toContain('install/');
});

test('a database schema matching the code passes, ignoring development build suffixes', function () {
	expect(doctor_evaluate_schema_version('1.2.25', '1.2.25')['status'])->toBe('pass')
		->and(doctor_evaluate_schema_version('1.3.0', '1.3.0.99.1593739325')['status'])->toBe('pass');
});

test('an installation the installer never finished fails', function () {
	$result = doctor_evaluate_schema_version('new_install', '1.2.25');

	expect($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('installer');
});

test('a database schema newer than the code warns', function () {
	expect(doctor_evaluate_schema_version('1.2.26', '1.2.25')['status'])->toBe('warn');
});

test('an unreadable version table fails', function () {
	expect(doctor_evaluate_schema_version('', '1.2.25')['status'])->toBe('fail');
});

test('the schema check reads the version table', function () {
	$GLOBALS['doctor_test_cells'] = ['SELECT cacti FROM version LIMIT 1' => 'new_install'];

	expect(doctor_check_schema_version()['status'])->toBe('fail');
});

test('a poller run longer than the interval fails', function () {
	expect(doctor_evaluate_poller_runtime(310.5, 300)['status'])->toBe('fail')
		->and(doctor_evaluate_poller_runtime(250.0, 300)['status'])->toBe('warn')
		->and(doctor_evaluate_poller_runtime(120.0, 300)['status'])->toBe('pass')
		->and(doctor_evaluate_poller_runtime(0.0, 300)['status'])->toBe('pass');
});

test('the poller runtime comes from the last completed main-poller run', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '60'];
	$GLOBALS['doctor_test_cells']    = ['SELECT total_time FROM poller WHERE id = 1' => '75.2'];

	$result = doctor_check_poller_runtime();

	expect($result['id'])->toBe('poller.runtime')
		->and($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('75.2');
});

test('poller output older than two intervals warns', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '300'];
	$GLOBALS['doctor_test_cells']    = ['SELECT COUNT(*) FROM poller_output WHERE time < FROM_UNIXTIME(UNIX_TIMESTAMP() - ?)' => '42'];

	$result = doctor_check_poller_output();

	expect($result['id'])->toBe('poller.output_backlog')
		->and($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('42');
});

test('an empty poller output table passes', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '300'];
	$GLOBALS['doctor_test_cells']    = ['SELECT COUNT(*) FROM poller_output WHERE time < FROM_UNIXTIME(UNIX_TIMESTAMP() - ?)' => '0'];

	expect(doctor_check_poller_output()['status'])->toBe('pass');
});

test('an enabled remote poller that stopped reporting fails', function () {
	$now     = 1000000;
	$pollers = [
		['id' => '2', 'name' => 'Edge', 'last_update' => (string) ($now - 60)],
		['id' => '3', 'name' => 'Branch', 'last_update' => (string) ($now - 7200)]
	];

	$result = doctor_evaluate_remote_pollers($pollers, 300, $now);

	expect($result['id'])->toBe('poller.remote')
		->and($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('Branch')
		->and($result['detail'])->not->toContain('Edge');
});

test('no remote pollers passes', function () {
	expect(doctor_evaluate_remote_pollers([], 300, time())['status'])->toBe('pass');
});

test('remote pollers come from enabled poller rows other than the main poller', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_interval' => '300'];
	$GLOBALS['doctor_test_rows']     = [
		"SELECT id, name, UNIX_TIMESTAMP(last_update) AS last_update FROM poller WHERE id > 1 AND disabled = ''" => [
			['id' => '2', 'name' => 'Never', 'last_update' => '0']
		]
	];

	expect(doctor_check_remote_pollers()['status'])->toBe('fail');
});

test('an enabled plugin whose files are missing fails', function () {
	$base = doctor_test_directory();
	mkdir($base . '/plugins/present', 0700, true);
	touch($base . '/plugins/present/setup.php');
	$GLOBALS['doctor_test_rows'] = [
		'SELECT directory FROM plugin_config WHERE status = 1' => [['directory' => 'present'], ['directory' => 'removed']]
	];

	$result = doctor_check_plugin_files($base);

	expect($result['id'])->toBe('cacti.plugin_files')
		->and($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('removed')
		->and($result['detail'])->not->toContain('present');
});

test('enabled plugins with their files present pass', function () {
	$base = doctor_test_directory();
	mkdir($base . '/plugins/present', 0700, true);
	touch($base . '/plugins/present/setup.php');
	$GLOBALS['doctor_test_rows'] = ['SELECT directory FROM plugin_config WHERE status = 1' => [['directory' => 'present']]];

	expect(doctor_check_plugin_files($base)['status'])->toBe('pass');
});

test('Boost that has not flushed within two intervals fails', function () {
	$now = 1000000;

	$result = doctor_evaluate_boost(true, 100, 50000, $now - 7300, 60, $now);

	expect($result['id'])->toBe('poller.boost')
		->and($result['status'])->toBe('fail')
		->and($result['detail'])->toContain('7300')
		->and(doctor_evaluate_boost(true, 100, 50000, $now - 7200, 60, $now)['status'])->toBe('pass');
});

test('Boost backlog above the maximum record count warns', function () {
	$now = 1000000;

	expect(doctor_evaluate_boost(true, 60000, 50000, $now - 600, 60, $now)['status'])->toBe('warn');
});

test('Boost accepts the date string Cacti may store as the last run time', function () {
	$now = strtotime('2026-10-22 12:00:00');

	expect(doctor_evaluate_boost(true, 10, 50000, '2026-10-22 11:30:00', 60, $now)['status'])->toBe('pass');
});

test('disabled Boost passes', function () {
	expect(doctor_evaluate_boost(false, 999999, 1, 0, 60, time())['status'])->toBe('pass');
});

test('the Boost check reads Cacti settings and the boost table', function () {
	$GLOBALS['doctor_test_settings'] = [
		'boost_rrd_update_enable'      => 'on',
		'boost_rrd_update_max_records' => '1000',
		'boost_rrd_update_interval'    => '30',
		'boost_last_run_time'          => (string) (time() - 60)
	];
	$GLOBALS['doctor_test_cells'] = ['SELECT COUNT(*) FROM poller_output_boost' => '5000'];

	expect(doctor_check_boost()['status'])->toBe('warn');
});

test('active data sources without an RRD file warn with a sample', function () {
	$rra = doctor_test_directory();
	touch($rra . '/present_1.rrd');
	$GLOBALS['doctor_test_rows'] = [
		"SELECT local_data_id, data_source_path FROM data_template_data WHERE local_data_id > 0 AND active = 'on' AND data_source_path != ''" => [
			['local_data_id' => '1', 'data_source_path' => '<path_rra>/present_1.rrd'],
			['local_data_id' => '2', 'data_source_path' => '<path_rra>/missing_2.rrd']
		]
	];

	$result = doctor_check_rrd_files($rra);

	expect($result['id'])->toBe('filesystem.rrd_files')
		->and($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('1 of 2')
		->and($result['detail'])->toContain('missing_2.rrd')
		->and($result['detail'])->not->toContain('present_1.rrd');
});

test('all RRD files present passes', function () {
	$rra = doctor_test_directory();
	touch($rra . '/present_1.rrd');
	$GLOBALS['doctor_test_rows'] = [
		"SELECT local_data_id, data_source_path FROM data_template_data WHERE local_data_id > 0 AND active = 'on' AND data_source_path != ''" => [
			['local_data_id' => '1', 'data_source_path' => '<path_rra>/present_1.rrd']
		]
	];

	expect(doctor_check_rrd_files($rra)['status'])->toBe('pass');
});

test('disk space thresholds warn below 10 percent and fail below 2 percent', function () {
	expect(doctor_evaluate_disk_space(50, 100, '/rra')['status'])->toBe('pass')
		->and(doctor_evaluate_disk_space(5, 100, '/rra')['status'])->toBe('warn')
		->and(doctor_evaluate_disk_space(1, 100, '/rra')['status'])->toBe('fail')
		->and(doctor_evaluate_disk_space(false, false, '/rra')['status'])->toBe('warn');
});

test('the disk space check measures the RRA directory', function () {
	$result = doctor_check_disk_space(doctor_test_directory());

	expect($result['id'])->toBe('filesystem.disk_space')
		->and($result['status'])->not->toBe('');
});

test('database and PHP clocks that drift apart warn and then fail', function () {
	expect(doctor_evaluate_clock(1000, 1002)['status'])->toBe('pass')
		->and(doctor_evaluate_clock(1000, 1030)['status'])->toBe('warn')
		->and(doctor_evaluate_clock(1000, 1200)['status'])->toBe('fail')
		->and(doctor_evaluate_clock(false, 1000)['status'])->toBe('warn');
});

test('the clock check compares the database time with PHP', function () {
	$GLOBALS['doctor_test_cells'] = ['SELECT UNIX_TIMESTAMP()' => (string) (time() - 600)];

	$result = doctor_check_clock();

	expect($result['id'])->toBe('database.clock')
		->and($result['status'])->toBe('fail');
});

test('the Spine check is skipped when cmd.php polls', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '1'];

	expect(doctor_check_spine_config('cacti', 'cactiuser')['status'])->toBe('pass');
});

test('a Spine configuration pointing at another database warns without revealing the password', function () {
	$directory = doctor_test_directory();
	$path      = $directory . '/spine.conf';
	file_put_contents($path, "# comment\nDB_Host  localhost\nDB_Database  other\nDB_User cactiuser\nDB_Pass s3cret\n");
	chmod($path, 0600);
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '2', 'path_spine_config' => $path];

	$result = doctor_check_spine_config('cacti', 'cactiuser');

	expect($result['id'])->toBe('poller.spine_config')
		->and($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('DB_Database')
		->and($result['detail'])->not->toContain('s3cret');
});

test('a matching private Spine configuration passes', function () {
	$directory = doctor_test_directory();
	$path      = $directory . '/spine.conf';
	file_put_contents($path, "DB_Host localhost\nDB_Database cacti\nDB_User cactiuser\nDB_Pass x\n");
	chmod($path, 0600);
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '2', 'path_spine_config' => $path];

	expect(doctor_check_spine_config('cacti', 'cactiuser')['status'])->toBe('pass');
});

test('a world-readable Spine configuration warns because it holds the database password', function () {
	$directory = doctor_test_directory();
	$path      = $directory . '/spine.conf';
	file_put_contents($path, "DB_Database cacti\nDB_User cactiuser\n");
	chmod($path, 0644);
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '2', 'path_spine_config' => $path];

	expect(doctor_check_spine_config('cacti', 'cactiuser')['status'])->toBe('warn');
});

test('an unreadable Spine configuration fails', function () {
	$GLOBALS['doctor_test_settings'] = ['poller_type' => '2', 'path_spine_config' => '/doctor/does-not-exist/spine.conf'];

	expect(doctor_check_spine_config('cacti', 'cactiuser')['status'])->toBe('fail');
});

test('InnoDB settings Cacti flags as errors warn when off', function () {
	$result = doctor_evaluate_innodb(['innodb_file_per_table' => 'OFF', 'innodb_doublewrite' => 'ON']);

	expect($result['id'])->toBe('database.innodb')
		->and($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('innodb_file_per_table');
});

test('newer InnoDB doublewrite modes count as enabled', function () {
	expect(doctor_evaluate_innodb(['innodb_file_per_table' => 'ON', 'innodb_doublewrite' => 'DETECT_AND_RECOVER'])['status'])->toBe('pass')
		->and(doctor_evaluate_innodb(['innodb_file_per_table' => '1', 'innodb_doublewrite' => 'fast'])['status'])->toBe('pass');
});

test('the InnoDB check reads global variables', function () {
	$GLOBALS['doctor_test_rows'] = [
		"SHOW GLOBAL VARIABLES WHERE Variable_name IN ('innodb_file_per_table', 'innodb_doublewrite')" => [
			['Variable_name' => 'innodb_file_per_table', 'Value' => 'ON'],
			['Variable_name' => 'innodb_doublewrite', 'Value' => 'OFF']
		]
	];

	expect(doctor_check_innodb()['status'])->toBe('warn');
});

test('recent log errors warn and name the most frequent message', function () {
	$lines = [
		'2026-10-22 10:00:00 - SYSTEM STATS: Time:1.2',
		'2026-10-22 10:00:01 - CMDPHP ERROR: SNMP timeout on Device[12]',
		'2026-10-22 10:05:01 - CMDPHP ERROR: SNMP timeout on Device[14]',
		'2026-10-22 10:05:02 - DBCALL SQL Error: Table poller_item is full'
	];

	$result = doctor_evaluate_log_lines($lines);

	expect($result['id'])->toBe('logging.recent_errors')
		->and($result['status'])->toBe('warn')
		->and($result['detail'])->toContain('3 of the last 4')
		->and($result['detail'])->toContain('SNMP timeout on Device[#]');
});

test('a log without errors passes', function () {
	expect(doctor_evaluate_log_lines(['2026-10-22 10:00:00 - SYSTEM STATS: Time:1.2'])['status'])->toBe('pass');
});

test('only the tail of the log is read', function () {
	$directory = doctor_test_directory();
	$path      = $directory . '/cacti.log';
	file_put_contents($path, str_repeat("2026-10-22 09:00:00 - CMDPHP ERROR: old\n", 50) . str_repeat("2026-10-22 10:00:00 - SYSTEM STATS: ok\n", 20));

	expect(doctor_read_log_tail($path, 20))->toHaveCount(20)
		->and(doctor_read_log_tail($path, 20)[0])->toContain('STATS');
});
