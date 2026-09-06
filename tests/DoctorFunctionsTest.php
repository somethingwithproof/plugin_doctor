<?php

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
