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

require_once __DIR__ . '/CactiStubs.php';
require_once dirname(__DIR__) . '/doctor_functions.php';

beforeEach(function () {
	$GLOBALS['doctor_health_saved_rows'] = $GLOBALS['doctor_test_rows'];
});

afterEach(function () {
	$GLOBALS['doctor_test_rows'] = $GLOBALS['doctor_health_saved_rows'];
});

function doctor_test_health_status($overrides = []) {
	return array_merge([
		'uptime' => 172800, 'uptime_since_flush_status' => 86400,
		'threads_connected' => 10, 'max_used_connections' => 20,
		'connections' => 1000, 'threads_created' => 49,
		'innodb_buffer_pool_read_requests' => 10000, 'innodb_buffer_pool_reads' => 99,
		'created_tmp_tables' => 1000, 'created_tmp_disk_tables' => 249,
		'innodb_log_waits' => 0, 'queries' => 1000, 'slow_queries' => 9
	], $overrides);
}

function doctor_test_health_variables($overrides = []) {
	return array_merge(['max_connections' => 100, 'thread_handling' => 'one-thread-per-connection'], $overrides);
}

function doctor_test_health_by_id($results) {
	$indexed = [];
	foreach ($results as $result) {
		$indexed[$result['id']] = $result;
	}

	return $indexed;
}

function doctor_test_health_rows($values) {
	$rows = [];
	foreach ($values as $name => $value) {
		$rows[] = ['Variable_name' => $name, 'Value' => (string) $value];
	}

	return $rows;
}

test('representative health sample below each threshold passes without repairs', function () {
	$results = doctor_analyze_database_health(doctor_test_health_status(), doctor_test_health_variables());
	expect($results)->toHaveCount(7);
	foreach ($results as $result) {
		expect($result['status'])->toBe('pass')
			->and($result['repairable'])->toBeFalse()
			->and($result['repair'])->toBe('');
	}
});

test('interval counters use deltas when a prior sample is available', function () {
	$now = time();
	$current = doctor_test_health_status([
		'uptime' => 200000, 'innodb_buffer_pool_reads' => 1200,
		'innodb_buffer_pool_read_requests' => 110000,
		'created_tmp_tables' => 12000, 'created_tmp_disk_tables' => 4000,
		'connections' => 11000, 'threads_created' => 2000,
		'queries' => 11000, 'slow_queries' => 1000
	]);
	$previous = ['captured' => $now - 3600, 'metrics' => [
		'uptime' => 196400, 'innodb_buffer_pool_reads' => 100,
		'innodb_buffer_pool_read_requests' => 100000,
		'created_tmp_tables' => 10000, 'created_tmp_disk_tables' => 2000,
		'connections' => 10000, 'threads_created' => 1000,
		'queries' => 10000, 'slow_queries' => 100
	]];
	$results = doctor_test_health_by_id(doctor_analyze_database_health($current, doctor_test_health_variables(), $previous));
	expect($results['database.temporary_tables']['detail'])->toContain('Interval created_tmp_disk_tables / created_tmp_tables: 2000 / 2000')
		->and($results['database.slow_queries']['detail'])->toContain('Interval slow_queries / queries: 900 / 1000');
});

test('counter decreases after an independent reset are reported as not assessed', function () {
	$previous = ['captured' => time() - 3600, 'metrics' => ['uptime' => 172800, 'slow_queries' => 900, 'queries' => 9000]];
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status(['slow_queries' => 10, 'queries' => 1000]), doctor_test_health_variables(), $previous));
	expect($results['database.slow_queries']['status'])->toBe('warn')
		->and($results['database.slow_queries']['assessment'])->toBe('not_assessed')
		->and($results['database.slow_queries']['detail'])->toContain('reset');
});

test('missing prior interval counters retain a cumulative label', function () {
	$previous = ['captured' => time() - 3600, 'metrics' => ['uptime' => 172800]];
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status(), doctor_test_health_variables(), $previous));
	expect($results['database.slow_queries']['detail'])->toContain('Cumulative slow_queries / queries');
});

test('health warnings start at the documented threshold', function ($counter, $value, $id, $advice) {
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status([$counter => $value]), doctor_test_health_variables()));
	expect($results['database.' . $id]['status'])->toBe('warn')
		->and($results['database.' . $id]['detail'])->toContain($advice);
})->with([
	['threads_connected', 80, 'connection_capacity', 'memory headroom'],
	['max_used_connections', 80, 'connection_capacity', 'historical peak'],
	['innodb_buffer_pool_reads', 100, 'buffer_pool_reads', 'query plans'],
	['created_tmp_disk_tables', 250, 'temporary_tables', 'data types'],
	['threads_created', 50, 'thread_cache', 'connection reuse'],
	['slow_queries', 10, 'slow_queries', 'long_query_time'],
	['innodb_log_waits', 1, 'redo_log_waits', 'historical count']
]);

test('short restarted flushed or inconsistent observation windows defer cumulative advice', function ($overrides) {
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status($overrides), doctor_test_health_variables()));
	foreach (['health_sample', 'buffer_pool_reads', 'temporary_tables', 'thread_cache', 'slow_queries', 'redo_log_waits'] as $id) {
		expect($results['database.' . $id]['status'])->toBe('warn')
			->and($results['database.' . $id]['detail'])->toContain('deferred');
	}
	expect($results['database.connection_capacity']['status'])->toBe('pass');
})->with([
	[['uptime' => 86399, 'uptime_since_flush_status' => 86399]],
	[['uptime_since_flush_status' => 0]],
	[['uptime' => null]],
	[['uptime_since_flush_status' => 172801]]
]);

test('low activity and inconsistent counter pairs do not produce tuning advice', function ($overrides, $id, $reason) {
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status($overrides), doctor_test_health_variables()));
	expect($results['database.' . $id]['status'])->toBe('warn')
		->and($results['database.' . $id]['detail'])->toContain($reason)
		->and($results['database.' . $id]['detail'])->not->toContain('Review query plans');
})->with([
	[['innodb_buffer_pool_read_requests' => 9999], 'buffer_pool_reads', 'Insufficient activity'],
	[['created_tmp_tables' => 999], 'temporary_tables', 'Insufficient activity'],
	[['connections' => 0], 'thread_cache', 'Insufficient activity'],
	[['queries' => 999], 'slow_queries', 'Insufficient activity'],
	[['innodb_buffer_pool_reads' => 10001], 'buffer_pool_reads', 'inconsistent'],
	[['created_tmp_disk_tables' => null], 'temporary_tables', 'missing or invalid']
]);

test('zero counters are valid and missing counters are not an idle server', function () {
	$empty = doctor_analyze_database_health([], []);
	foreach ($empty as $result) {
		expect($result['status'])->toBe('warn');
	}
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status(['threads_connected' => 0, 'max_used_connections' => 0, 'innodb_buffer_pool_reads' => 0]), doctor_test_health_variables()));
	expect($results['database.connection_capacity']['status'])->toBe('pass')
		->and($results['database.buffer_pool_reads']['status'])->toBe('pass');
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status(), doctor_test_health_variables(['max_connections' => 0])));
	expect($results['database.connection_capacity']['status'])->toBe('warn');
});

test('thread pools and unknown modes do not receive one-thread-per-connection advice', function ($mode) {
	$results = doctor_test_health_by_id(doctor_analyze_database_health(doctor_test_health_status(['threads_created' => 1000]), doctor_test_health_variables(['thread_handling' => $mode])));
	expect($results['database.thread_cache']['status'])->toBe('warn')
		->and($results['database.thread_cache']['detail'])->toContain('not assessed')
		->and($results['database.thread_cache']['detail'])->not->toContain('thread_cache_size');
})->with(['pool-of-threads', 'loaded-dynamically', 'no-threads', null]);

test('malformed and oversized database counters remain unknown', function ($value) {
	$metrics = doctor_database_metrics([['Variable_name' => 'Uptime', 'Value' => $value]], ['Uptime']);
	expect($metrics)->toBe(['uptime' => null]);
})->with(['', '-1', '1.5', '1e3', ' 100', '100 ', 'NaN', 'INF', '9007199254740992', '18446744073709551615', null, true, false, 1.5, [[]]]);

test('normalization accepts server strings but rejects duplicate unknown or malformed rows', function () {
	$metrics = doctor_database_metrics([
		['Variable_name' => 'UPTIME', 'Value' => '86400'],
		['Variable_name' => 'Zero', 'Value' => 0],
		['Variable_name' => 'Limit', 'Value' => '9007199254740991'],
		['Variable_name' => 'Threads_created', 'Value' => '1'],
		['Variable_name' => 'threads_created', 'Value' => '2'],
		['Variable_name' => 'thread_handling', 'Value' => 'one-thread-per-connection'],
		['Variable_name' => 'unrequested', 'Value' => 'sensitive'],
		['Variable_name' => []], false, []
	], ['Uptime', 'Zero', 'Limit', 'Threads_created', 'thread_handling']);
	expect($metrics)->toBe(['uptime' => 86400.0, 'zero' => 0.0, 'limit' => 9007199254740991.0, 'threads_created' => null, 'thread_handling' => 'one-thread-per-connection'])
		->and(doctor_database_metrics(false, ['Uptime']))->toBe([])
		->and(doctor_database_metrics([['Variable_name' => 'thread_handling', 'Value' => '<unknown>']], ['thread_handling']))->toBe(['thread_handling' => null]);
});

test('health collection uses exactly two bounded reads and exposes advice through monitoring formats', function () {
	$statusSql = "SHOW GLOBAL STATUS WHERE Variable_name IN ('Uptime', 'Uptime_since_flush_status', 'Threads_connected', 'Max_used_connections', 'Connections', 'Threads_created', 'Innodb_buffer_pool_read_requests', 'Innodb_buffer_pool_reads', 'Created_tmp_tables', 'Created_tmp_disk_tables', 'Innodb_log_waits', 'Queries', 'Slow_queries')";
	$variablesSql = "SHOW GLOBAL VARIABLES WHERE Variable_name IN ('max_connections', 'thread_handling')";
	$GLOBALS['doctor_test_rows'] = [
		$statusSql => doctor_test_health_rows(doctor_test_health_status(['innodb_log_waits' => 1])),
		$variablesSql => doctor_test_health_rows(doctor_test_health_variables())
	];
	$GLOBALS['doctor_test_queries'] = [];
	$results = doctor_check_database_health();
	expect($GLOBALS['doctor_test_queries'])->toBe([$statusSql, $variablesSql])
		->and(doctor_result_counts($results))->toBe(['pass' => 6, 'warn' => 1, 'fail' => 0])
		->and(doctor_format_nagios($results)['code'])->toBe(1)
		->and(doctor_format_prometheus($results, 1700000000))->toContain('cacti_doctor_check_status{id="database.redo_log_waits",category="Database health"} 1');
	$GLOBALS['doctor_test_rows'][$statusSql] = false;
	foreach (doctor_check_database_health() as $result) {
		expect($result['status'])->toBe('warn');
	}
	$GLOBALS['doctor_test_rows'][$statusSql] = doctor_test_health_rows(doctor_test_health_status());
	$GLOBALS['doctor_test_rows'][$variablesSql] = false;
	$results = doctor_test_health_by_id(doctor_check_database_health());
	expect($results['database.connection_capacity']['status'])->toBe('warn')
		->and($results['database.thread_cache']['status'])->toBe('warn')
		->and($results['database.buffer_pool_reads']['status'])->toBe('pass');
});
