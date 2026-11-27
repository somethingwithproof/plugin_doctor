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

require_once __DIR__ . '/doctor_functions.php';
require_once __DIR__ . '/doctor_access.php';

/**
 * Static catalog of built-in Doctor diagnostic checks.
 *
 * @return array<int,array{id:string,plugin:string,category:string,title:string}>
 */
function doctor_core_check_catalog() {
	return [
		['id' => 'doctor.privileges', 'plugin' => 'doctor', 'category' => 'Doctor', 'title' => 'Doctor privileges'],
		['id' => 'cacti.version', 'plugin' => 'doctor', 'category' => 'Cacti', 'title' => 'Supported Cacti version'],
		['id' => 'cacti.schema_version', 'plugin' => 'doctor', 'category' => 'Cacti', 'title' => 'Database schema version'],
		['id' => 'php.version', 'plugin' => 'doctor', 'category' => 'PHP', 'title' => 'PHP compatibility with installed Cacti'],
		['id' => 'php.security_baseline', 'plugin' => 'doctor', 'category' => 'Security', 'title' => 'PHP upstream security support'],
		['id' => 'php.extensions', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Required PHP extensions'],
		['id' => 'php.cli_extensions', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Required CLI PHP extensions'],
		['id' => 'php.optional_extensions', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Recommended PHP features'],
		['id' => 'php.configuration', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'PHP runtime configuration'],
		['id' => 'database.connection', 'plugin' => 'doctor', 'category' => 'Database', 'title' => 'Database connection'],
		['id' => 'database.version', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Supported database server'],
		['id' => 'database.charset', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Database character set'],
		['id' => 'database.timezone', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Database timezone support'],
		['id' => 'database.clock', 'plugin' => 'doctor', 'category' => 'Database', 'title' => 'Database clock'],
		['id' => 'database.innodb', 'plugin' => 'doctor', 'category' => 'Database', 'title' => 'InnoDB safety settings'],
		['id' => 'database.health_sample', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'Database observation window'],
		['id' => 'database.connection_capacity', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'Connection capacity'],
		['id' => 'database.buffer_pool_reads', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'InnoDB buffer pool reads'],
		['id' => 'database.temporary_tables', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'On-disk temporary tables'],
		['id' => 'database.thread_cache', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'Connection thread creation'],
		['id' => 'database.slow_queries', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'Slow statements'],
		['id' => 'database.redo_log_waits', 'plugin' => 'doctor', 'category' => 'Database health', 'title' => 'InnoDB log-buffer waits'],
		['id' => 'database.core_tables', 'plugin' => 'doctor', 'category' => 'Database', 'title' => 'Core database tables'],
		['id' => 'cacti.plugin_files', 'plugin' => 'doctor', 'category' => 'Cacti', 'title' => 'Enabled plugin files'],
		['id' => 'filesystem.runtime_directories', 'plugin' => 'doctor', 'category' => 'Filesystem', 'title' => 'Runtime directories'],
		['id' => 'filesystem.disk_space', 'plugin' => 'doctor', 'category' => 'Filesystem', 'title' => 'RRA disk space'],
		['id' => 'filesystem.rrd_files', 'plugin' => 'doctor', 'category' => 'Filesystem', 'title' => 'RRD files'],
		['id' => 'filesystem.rrd_stale', 'plugin' => 'doctor', 'category' => 'Filesystem', 'title' => 'RRD update freshness'],
		['id' => 'filesystem.config', 'plugin' => 'doctor', 'category' => 'Filesystem', 'title' => 'Cacti configuration file'],
		['id' => 'logging.cacti', 'plugin' => 'doctor', 'category' => 'Logging', 'title' => 'Cacti log file'],
		['id' => 'logging.recent_errors', 'plugin' => 'doctor', 'category' => 'Logging', 'title' => 'Recent log errors'],
		['id' => 'binary.php_binary', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'PHP CLI executable'],
		['id' => 'binary.rrdtool', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'RRDtool executable'],
		['id' => 'binary.snmpget', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Net-SNMP snmpget executable'],
		['id' => 'binary.snmpwalk', 'plugin' => 'doctor', 'category' => 'Prerequisites', 'title' => 'Net-SNMP snmpwalk executable'],
		['id' => 'poller.configuration', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Poller configuration'],
		['id' => 'poller.spine_config', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Spine configuration'],
		['id' => 'poller.freshness', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Main poller freshness'],
		['id' => 'poller.runtime', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Main poller run time'],
		['id' => 'poller.output_backlog', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Unprocessed poller output'],
		['id' => 'poller.remote', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Remote pollers'],
		['id' => 'poller.boost', 'plugin' => 'doctor', 'category' => 'Poller', 'title' => 'Boost RRD updates'],
		['id' => 'devices.health', 'plugin' => 'doctor', 'category' => 'Devices', 'title' => 'Device availability'],
		['id' => 'doctor.schedule', 'plugin' => 'doctor', 'category' => 'Doctor', 'title' => 'Scheduled report freshness'],
		['id' => 'doctor.alert_delivery', 'plugin' => 'doctor', 'category' => 'Doctor', 'title' => 'Alert delivery']
	];
}

/**
 * Authorize MCP ability calls using the token owner's Doctor Viewer realm (or higher).
 *
 * @param int $userId
 * @return bool
 */
function doctor_ability_allowed($userId) {
	return doctor_user_access_level((int) $userId) >= 1;
}

/**
 * Evaluate permitted devices for an explicit user ID, never falling back to global host totals.
 *
 * @param int $userId
 * @return array<string,mixed>
 */
function doctor_ability_visible_devices($userId) {
	if (!function_exists('get_allowed_devices')) {
		return doctor_result('devices.health', 'Devices', 'warn', 'Device availability', 'Device permissions could not be evaluated.', '', 'not_assessed');
	}

	$total   = -1;
	$devices = get_allowed_devices("h.disabled = ''", 'COALESCE(UNIX_TIMESTAMP(h.status_fail_date), 0) <= 0, h.status_fail_date, h.id', '', $total, (int) $userId);
	$counts  = ['total' => 0, 'down' => 0, 'recovering' => 0];
	$offenders = [];

	foreach (is_array($devices) ? $devices : [] as $device) {
		$counts['total']++;
		$counts['down'] += (int) $device['status'] === 1 ? 1 : 0;
		$counts['recovering'] += (int) $device['status'] === 2 ? 1 : 0;
		if ((int) $device['status'] === 1 && count($offenders) < 3) {
			$failedTime = isset($device['status_fail_date']) ? strtotime((string) $device['status_fail_date']) : false;
			$offenders[] = [
				'description'       => isset($device['description']) ? (string) $device['description'] : '',
				'hostname'          => isset($device['hostname']) ? (string) $device['hostname'] : '',
				'failed'            => (string) ($failedTime !== false ? $failedTime : 0),
				'status_last_error' => isset($device['status_last_error']) ? (string) $device['status_last_error'] : ''
			];
		}
	}

	return doctor_evaluate_devices($counts, $offenders);
}

/**
 * Execute the doctor-run-checks ability (read-only; never runs repairs).
 *
 * @param int $userId
 * @param object $args
 * @return array{summary:array{total:int,pass:int,warn:int,fail:int,info:int},findings:array<int,array{id:string,plugin:string,category:string,title:string,status:string,message:string,remediation:string}>}
 */
function doctor_ability_run_checks($userId, $args) {
	$userId         = (int) $userId;
	$level          = doctor_user_access_level($userId);
	$canViewLogs    = function_exists('is_realm_allowed') && (is_realm_allowed(18, $userId) || is_realm_allowed(19, $userId));
	$categoryFilter = isset($args->category) && is_string($args->category) ? strtolower(trim($args->category)) : '';
	$statusFilter   = isset($args->status) && is_string($args->status) ? strtolower(trim($args->status)) : '';
	if ($statusFilter === 'ok') {
		$statusFilter = 'pass';
	}

	$rawResults = doctor_run_checks();
	$findings   = [];
	$summary    = ['total' => 0, 'pass' => 0, 'warn' => 0, 'fail' => 0, 'info' => 0];

	foreach ($rawResults as $result) {
		if (!is_array($result) || !isset($result['id'], $result['category'], $result['status'], $result['summary'], $result['detail'])) {
			continue;
		}

		$id = (string) $result['id'];
		if ($id === 'logging.recent_errors' && !$canViewLogs) {
			continue;
		}

		if ($level < 2 && in_array($id, ['filesystem.rrd_files', 'filesystem.rrd_stale'], true)) {
			continue;
		}

		if ($id === 'devices.health') {
			$result = doctor_ability_visible_devices($userId);
		}

		$status = (string) $result['status'];
		if ($status === 'ok') {
			$status = 'pass';
		}
		if (!in_array($status, ['pass', 'warn', 'fail', 'info'], true)) {
			continue;
		}

		$category = (string) $result['category'];
		if ($categoryFilter !== '' && strtolower($category) !== $categoryFilter) {
			continue;
		}

		if ($statusFilter !== '' && $status !== $statusFilter) {
			continue;
		}

		$plugin      = isset($result['plugin']) && is_string($result['plugin']) && $result['plugin'] !== '' ? $result['plugin'] : 'doctor';
		$title       = doctor_redact((string) (isset($result['title']) ? $result['title'] : $result['summary']));
		$message     = doctor_redact((string) $result['detail']);
		$remediation = isset($result['remediation']) && is_string($result['remediation']) && $result['remediation'] !== ''
			? doctor_redact($result['remediation'])
			: '';

		$findings[] = [
			'id'          => $id,
			'plugin'      => $plugin,
			'category'    => $category,
			'title'       => $title,
			'status'      => $status,
			'message'     => $message,
			'remediation' => $remediation
		];

		$summary['total']++;
		$summary[$status]++;

		if (count($findings) >= 256) {
			break;
		}
	}

	return [
		'summary'  => $summary,
		'findings' => $findings
	];
}

/**
 * Execute the doctor-list-checks ability (catalog of registered core and plugin checks).
 *
 * @param int $userId
 * @param object $args
 * @return array{checks:array<int,array{id:string,plugin:string,category:string,title:string}>}
 */
function doctor_ability_list_checks($userId, $args) {
	$categoryFilter = isset($args->category) && is_string($args->category) ? strtolower(trim($args->category)) : '';
	$pluginFilter   = isset($args->plugin) && is_string($args->plugin) ? strtolower(trim($args->plugin)) : '';

	$catalog = doctor_core_check_catalog();
	$coreIds = [];
	foreach ($catalog as $item) {
		$coreIds[] = $item['id'];
	}

	$extensions = doctor_collect_plugin_extensions($coreIds, 'list');
	foreach ($extensions['checks'] as $pluginCheck) {
		$catalog[] = [
			'id'       => (string) $pluginCheck['id'],
			'plugin'   => (string) $pluginCheck['plugin'],
			'category' => (string) $pluginCheck['category'],
			'title'    => doctor_redact((string) (isset($pluginCheck['title']) ? $pluginCheck['title'] : $pluginCheck['summary']))
		];
	}

	$checks = [];
	foreach ($catalog as $entry) {
		if ($categoryFilter !== '' && strtolower($entry['category']) !== $categoryFilter) {
			continue;
		}

		if ($pluginFilter !== '' && strtolower($entry['plugin']) !== $pluginFilter) {
			continue;
		}

		$checks[] = [
			'id'       => $entry['id'],
			'plugin'   => $entry['plugin'],
			'category' => $entry['category'],
			'title'    => doctor_redact($entry['title'])
		];

		if (count($checks) >= 256) {
			break;
		}
	}

	return ['checks' => $checks];
}

/**
 * Register read-only Doctor diagnostic abilities on the MCP abilities_register hook.
 *
 * @param object $registrar
 * @return void
 */
function doctor_abilities_register($registrar) {
	if (!is_object($registrar) || !method_exists($registrar, 'register')) {
		return;
	}

	if (method_exists($registrar, 'registerCategory')) {
		try {
			$registrar->registerCategory('diagnostics', 'Diagnostics');
		} catch (Throwable $error) {
			// Category may already exist if registered earlier.
		} catch (Exception $error) { // @phpstan-ignore-line PHP 5.4 lacks Throwable
			// Category may already exist if registered earlier.
		}
	}

	$annotations = [
		'readOnly'    => true,
		'destructive' => false,
		'idempotent'  => true
	];

	$registrar->register('doctor-run-checks', [
		'label'         => 'Run Doctor diagnostic checks',
		'description'   => 'Run read-only Cacti Doctor diagnostic checks and return summary counts and findings filterable by category or status. Never executes repairs.',
		'category'      => 'diagnostics',
		'input_schema'  => [
			'type'                 => 'object',
			'properties'           => [
				'category' => ['type' => 'string', 'maxLength' => 64],
				'status'   => ['type' => 'string', 'enum' => ['pass', 'ok', 'warn', 'fail', 'info']]
			],
			'additionalProperties' => false
		],
		'output_schema' => [
			'type'       => 'object',
			'properties' => [
				'summary' => [
					'type'       => 'object',
					'properties' => [
						'total' => ['type' => 'integer', 'minimum' => 0],
						'pass'  => ['type' => 'integer', 'minimum' => 0],
						'warn'  => ['type' => 'integer', 'minimum' => 0],
						'fail'  => ['type' => 'integer', 'minimum' => 0],
						'info'  => ['type' => 'integer', 'minimum' => 0]
					],
					'required'             => ['total', 'pass', 'warn', 'fail', 'info'],
					'additionalProperties' => false
				],
				'findings' => [
					'type'     => 'array',
					'maxItems' => 256,
					'items'    => [
						'type'       => 'object',
						'properties' => [
							'id'          => ['type' => 'string'],
							'plugin'      => ['type' => 'string'],
							'category'    => ['type' => 'string'],
							'title'       => ['type' => 'string'],
							'status'      => ['type' => 'string', 'enum' => ['pass', 'warn', 'fail', 'info']],
							'message'     => ['type' => 'string'],
							'remediation' => ['type' => 'string']
						],
						'required'             => ['id', 'plugin', 'category', 'title', 'status', 'message', 'remediation'],
						'additionalProperties' => false
					]
				]
			],
			'required'             => ['summary', 'findings'],
			'additionalProperties' => false
		],
		'annotations' => $annotations,
		'permission'  => 'doctor_ability_allowed',
		'execute'     => 'doctor_ability_run_checks'
	]);

	$registrar->register('doctor-list-checks', [
		'label'         => 'List Doctor diagnostic checks',
		'description'   => 'List the catalog of registered core and plugin Cacti Doctor diagnostic checks.',
		'category'      => 'diagnostics',
		'input_schema'  => [
			'type'                 => 'object',
			'properties'           => [
				'category' => ['type' => 'string', 'maxLength' => 64],
				'plugin'   => ['type' => 'string', 'maxLength' => 64]
			],
			'additionalProperties' => false
		],
		'output_schema' => [
			'type'       => 'object',
			'properties' => [
				'checks' => [
					'type'     => 'array',
					'maxItems' => 256,
					'items'    => [
						'type'       => 'object',
						'properties' => [
							'id'       => ['type' => 'string'],
							'plugin'   => ['type' => 'string'],
							'category' => ['type' => 'string'],
							'title'    => ['type' => 'string']
						],
						'required'             => ['id', 'plugin', 'category', 'title'],
						'additionalProperties' => false
					]
				]
			],
			'required'             => ['checks'],
			'additionalProperties' => false
		],
		'annotations' => $annotations,
		'permission'  => 'doctor_ability_allowed',
		'execute'     => 'doctor_ability_list_checks'
	]);
}
