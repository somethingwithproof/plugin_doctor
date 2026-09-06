<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/doctor_functions.php';

test('result counts include pass warning and failure outcomes', function (): void {
	$results = [
		doctor_result('one', 'Test', 'pass', 'One', 'Passed'),
		doctor_result('two', 'Test', 'warn', 'Two', 'Warning'),
		doctor_result('three', 'Test', 'fail', 'Three', 'Failed'),
		doctor_result('four', 'Test', 'pass', 'Four', 'Passed')
	];

	expect(doctor_result_counts($results))->toBe(['pass' => 2, 'warn' => 1, 'fail' => 1]);
});

test('unknown repairs fail closed', function (): void {
	$result = doctor_run_repair('not_registered');

	expect($result['status'])->toBe('fail')
		->and($result['repairable'])->toBeFalse();
});

test('runtime directory repair is the only initial allow-listed repair', function (): void {
	expect(array_keys(doctor_available_repairs()))->toBe(['runtime_directories']);
});
