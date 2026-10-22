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
