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

/**
 * Install the Doctor plugin hooks, realms, and workflow tables.
 *
 * @return void
 */
function plugin_doctor_install() {
	doctor_setup_hooks();
	doctor_setup_realms();
	require_once __DIR__ . '/doctor_workflows.php';
	doctor_setup_workflows();
}

/**
 * Keep the original realm ID and grants as Administrator during upgrades.
 *
 * @return bool
 */
function doctor_setup_realms() {
	api_plugin_register_realm('doctor', 'doctor.php', __('Doctor Administrator', 'doctor'), 1);
	api_plugin_register_realm('doctor', 'doctor_operator.php', __('Doctor Operator', 'doctor'), 0);
	api_plugin_register_realm('doctor', 'doctor_view.php', __('Doctor Viewer', 'doctor'), 0);
	// Cacti 1.2.20 returns no value from registration; verify persisted realms.
	foreach (['doctor.php', 'doctor_operator.php', 'doctor_view.php'] as $file) {
		if (!db_fetch_cell_prepared('SELECT id FROM plugin_realms WHERE plugin = ? AND file = ?', ['doctor', $file])) {
			return false;
		}
	}
	return true;
}

/**
 * Registration is idempotent, so enabling or upgrading the plugin can call it
 * again to add hooks introduced by a newer version. Cacti 1.2.x and later
 * reject registration from a function whose name lacks install, upgrade, or
 * setup.
 *
 * @param bool $enable
 * @return void
 */
function doctor_setup_hooks($enable = false) {
	api_plugin_register_hook('doctor', 'config_arrays', 'doctor_config_arrays', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'config_settings', 'doctor_config_settings', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'draw_navigation_text', 'doctor_draw_navigation_text', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'is_console_page', 'doctor_is_console_page', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'poller_bottom', 'doctor_poller_bottom', 'doctor_functions.php', $enable);
	api_plugin_register_hook('doctor', 'abilities_register', 'doctor_abilities_register', 'doctor_abilities.php', $enable);
	api_plugin_register_hook('doctor', 'casc_register_providers', 'doctor_casc_register_providers', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'api_register_resources', 'doctor_api_register_resources', 'setup.php', $enable);
}

/**
 * Remove plugin-owned tables and settings when uninstalling Doctor.
 *
 * @return void
 */
function plugin_doctor_uninstall() {
	db_execute('DROP TABLE IF EXISTS plugin_doctor_acceptance');
	db_execute('DROP TABLE IF EXISTS plugin_doctor_audit');
	db_execute("DELETE FROM settings WHERE name LIKE 'doctor\\_%'");
}

/**
 * Verify that Doctor hooks, realms, and workflow tables are configured.
 *
 * @return bool
 */
function plugin_doctor_check_config() {
	doctor_setup_hooks();

	require_once __DIR__ . '/doctor_workflows.php';
	return doctor_setup_realms() && doctor_setup_workflows();
}

/**
 * Report whether Doctor has pending upgrade migrations.
 *
 * @return bool
 */
function plugin_doctor_upgrade() {
	return false;
}

/**
 * Parse and return plugin metadata from INFO.
 *
 * @return array<string,string>
 */
function plugin_doctor_version() {
	global $config;

	$info = parse_ini_file($config['base_path'] . '/plugins/doctor/INFO', true);

	return is_array($info) && isset($info['info']) ? $info['info'] : [];
}

/**
 * Synchronize hooks/realms/workflows on upgrades and register Doctor navigation.
 *
 * @return void
 */
function doctor_config_arrays() {
	global $menu;

	// Installs enabled before a version that added hooks still need them registered.
	$info    = plugin_doctor_version();
	$version = isset($info['version']) ? $info['version'] : '';

	if ($version !== '' && read_config_option('doctor_hooks_version') !== $version) {
		doctor_setup_hooks(true);
		set_config_option('doctor_hooks_version', $version);
	}

	require_once __DIR__ . '/doctor_access.php';
	if (read_config_option('doctor_access_version') !== '1' && doctor_setup_realms()) {
		set_config_option('doctor_access_version', '1');
	}
	require_once __DIR__ . '/doctor_workflows.php';
	if (read_config_option('doctor_workflows_version') !== '1' && doctor_setup_workflows()) {
		set_config_option('doctor_workflows_version', '1');
	}
	$level = doctor_access_level();
	$pages = [1 => 'doctor_view.php', 2 => 'doctor_operator.php', 3 => 'doctor.php'];
	if (isset($pages[$level])) {
		$menu[__('Utilities')]['plugins/doctor/' . $pages[$level]] = __('Cacti Doctor', 'doctor');
	}

	if (function_exists('auth_augment_roles')) {
		auth_augment_roles(__('System Administration'), ['doctor.php']);
	}
}

/**
 * Build a numeric threshold textbox setting descriptor for Cacti settings UI.
 *
 * @param string $name
 * @param string $description
 * @param string $default
 * @return array<string,string>
 */
function doctor_threshold_setting($name, $description, $default) {
	return [
		'friendly_name' => $name,
		'description'   => $description,
		'method'        => 'textbox',
		'default'       => $default,
		'max_length'    => '5',
		'size'          => '5'
	];
}

/**
 * Register Doctor's configuration tab and settings in Cacti Settings.
 *
 * @return void
 */
function doctor_config_settings() {
	global $tabs, $settings;

	require_once __DIR__ . '/doctor_access.php';
	if (PHP_SAPI !== 'cli' && !doctor_can_configure()) {
		return;
	}

	$tabs['doctor'] = __('Doctor', 'doctor');

	$settings['doctor'] = [
		'doctor_header' => [
			'friendly_name' => __('Scheduled Checks', 'doctor'),
			'method'        => 'spacer'
		],
		'doctor_schedule_enabled' => [
			'friendly_name' => __('Run Checks on a Schedule', 'doctor'),
			'description'   => __('Run every Doctor check in the background after the poller and record each check\'s status.', 'doctor'),
			'method'        => 'checkbox',
			'default'       => ''
		],
		'doctor_schedule_interval' => [
			'friendly_name' => __('Check Interval', 'doctor'),
			'description'   => __('How often the scheduled checks run.', 'doctor'),
			'method'        => 'drop_array',
			'default'       => '60',
			'array'         => [
				'15'   => __('Every 15 Minutes', 'doctor'),
				'60'   => __('Every Hour', 'doctor'),
				'360'  => __('Every 6 Hours', 'doctor'),
				'1440' => __('Every Day', 'doctor')
			]
		],
		'doctor_alert_emails' => [
			'friendly_name' => __('Alert Email Addresses', 'doctor'),
			'description'   => __('Comma-separated addresses to email when a check starts or stops failing. Leave empty to only log changes to the Cacti log.', 'doctor'),
			'method'        => 'textbox',
			'default'       => '',
			'max_length'    => '255',
			'size'          => '60'
		],
		'doctor_alert_warnings' => [
			'friendly_name' => __('Alert on Warnings', 'doctor'),
			'description'   => __('Also alert when a check moves into or out of a warning.', 'doctor'),
			'method'        => 'checkbox',
			'default'       => ''
		],
		'doctor_thresholds_header' => [
			'friendly_name' => __('Thresholds', 'doctor'),
			'method'        => 'spacer'
		],
		'doctor_poller_warn_percent' => doctor_threshold_setting(__('Poller Run Time Warning (percent)', 'doctor'), __('Warn when the last main-poller run used this share of the polling interval. Runs that take the whole interval always fail.', 'doctor'), '80'),
		'doctor_disk_warn_percent'   => doctor_threshold_setting(__('RRA Disk Free Warning (percent)', 'doctor'), __('Warn when free space on the RRA file system drops below this percentage.', 'doctor'), '10'),
		'doctor_disk_fail_percent'   => doctor_threshold_setting(__('RRA Disk Free Failure (percent)', 'doctor'), __('Fail when free space on the RRA file system drops below this percentage.', 'doctor'), '2'),
		'doctor_clock_warn_seconds'  => doctor_threshold_setting(__('Clock Drift Warning (seconds)', 'doctor'), __('Warn when the database and PHP clocks differ by more than this.', 'doctor'), '5'),
		'doctor_clock_fail_seconds'  => doctor_threshold_setting(__('Clock Drift Failure (seconds)', 'doctor'), __('Fail when the database and PHP clocks differ by more than this.', 'doctor'), '60'),
		'doctor_rrd_stale_intervals' => doctor_threshold_setting(__('RRD Stale Intervals', 'doctor'), __('Warn after this many collection intervals without a file update (1 to 100).', 'doctor'), '3'),
		'doctor_rrd_deferred_seconds' => doctor_threshold_setting(__('Deferred RRD Write Allowance (seconds)', 'doctor'), __('Additional disk-write delay for external caching (0 to 86400). Boost adds its own allowance.', 'doctor'), '0'),
		'doctor_log_warn_mb'         => doctor_threshold_setting(__('Cacti Log Size Warning (MB)', 'doctor'), __('Warn when the Cacti log grows beyond this size, which usually means log rotation is not running.', 'doctor'), '100')
	];
}

/**
 * Add breadcrumb navigation entries for Doctor's web entry pages.
 *
 * @param array<string,array<string,mixed>> $nav
 * @return array<string,array<string,mixed>>
 */
function doctor_draw_navigation_text($nav) {
	$nav['doctor.php:'] = [
		'title'   => __('Cacti Doctor', 'doctor'),
		'mapping' => 'index.php:',
		'url'     => 'doctor.php',
		'level'   => '1'
	];

	$nav['doctor_view.php:'] = $nav['doctor.php:'];
	$nav['doctor_view.php:']['url'] = 'doctor_view.php';
	$nav['doctor_operator.php:'] = $nav['doctor.php:'];
	$nav['doctor_operator.php:']['url'] = 'doctor_operator.php';

	return $nav;
}

/**
 * Identify whether a URL targets one of Doctor's console pages.
 *
 * @param string $url
 * @return bool
 */
function doctor_is_console_page($url) {
	return preg_match('/doctor(?:_view|_operator)?\.php/', $url) === 1;
}

/**
 * Describe Doctor's static configuration schema with a strict split between
 * declarative config settings and runtime state.
 *
 * @return array<string,mixed>
 */
function doctor_casc_describe_schema() {
	return [
		'plugin'        => 'doctor',
		'schemaVersion' => '1.0',
		'schemaFile'    => 'schema/doctor.schema.yaml',
		'config'        => [
			'doctor_schedule_enabled'     => ['type' => 'checkbox', 'enum' => ['', 'on'], 'default' => ''],
			'doctor_schedule_interval'    => ['type' => 'enum', 'enum' => ['15', '60', '360', '1440'], 'default' => '60'],
			'doctor_alert_emails'         => ['type' => 'string', 'maxLength' => 255, 'default' => ''],
			'doctor_alert_warnings'       => ['type' => 'checkbox', 'enum' => ['', 'on'], 'default' => ''],
			'doctor_poller_warn_percent'  => ['type' => 'integer', 'minimum' => 1, 'maximum' => 99, 'default' => '80'],
			'doctor_disk_warn_percent'    => ['type' => 'integer', 'minimum' => 1, 'maximum' => 99, 'default' => '10'],
			'doctor_disk_fail_percent'    => ['type' => 'integer', 'minimum' => 1, 'maximum' => 99, 'default' => '2'],
			'doctor_clock_warn_seconds'   => ['type' => 'integer', 'minimum' => 1, 'maximum' => 86400, 'default' => '5'],
			'doctor_clock_fail_seconds'   => ['type' => 'integer', 'minimum' => 1, 'maximum' => 86400, 'default' => '60'],
			'doctor_rrd_stale_intervals'  => ['type' => 'integer', 'minimum' => 1, 'maximum' => 100, 'default' => '3'],
			'doctor_rrd_deferred_seconds' => ['type' => 'integer', 'minimum' => 0, 'maximum' => 86400, 'default' => '0'],
			'doctor_log_warn_mb'          => ['type' => 'integer', 'minimum' => 1, 'maximum' => 1048576, 'default' => '100']
		],
		'state' => [
			'settings' => [
				'doctor_state',
				'doctor_alert_state',
				'doctor_alert_pending',
				'doctor_alert_last_success',
				'doctor_report_history',
				'doctor_database_sample',
				'doctor_last_started',
				'doctor_last_completed',
				'doctor_last_launch',
				'doctor_last_alert_launch',
				'doctor_last_run',
				'doctor_schedule_failures',
				'doctor_hooks_version',
				'doctor_access_version',
				'doctor_workflows_version'
			],
			'tables' => [
				'plugin_doctor_acceptance',
				'plugin_doctor_audit'
			]
		]
	];
}

/**
 * Export declarative Doctor configuration settings without runtime state.
 *
 * @return array{schemaVersion:string,config:array<string,string>}
 */
function doctor_casc_export() {
	$schema = doctor_casc_describe_schema();
	$config = [];

	foreach ($schema['config'] as $key => $spec) {
		$raw = read_config_option($key, true);
		if ($raw === false || $raw === null || ($raw === '' && $spec['type'] !== 'checkbox' && $spec['type'] !== 'string')) {
			$config[$key] = (string) $spec['default'];
		} else {
			$config[$key] = (string) $raw;
		}
	}

	return [
		'schemaVersion' => '1.0',
		'config'        => $config
	];
}

/**
 * Validate a desired Doctor configuration payload against the static schema.
 *
 * Rejects unknown keys, runtime state keys, invalid types, and out-of-range
 * threshold values.
 *
 * @param mixed $payload
 * @return array{valid:bool,errors:array<int,string>}
 */
function doctor_casc_validate($payload) {
	if (!is_array($payload)) {
		return ['valid' => false, 'errors' => ['Payload must be an array.']];
	}

	$values = array_key_exists('config', $payload) ? $payload['config'] : $payload;
	if (!is_array($values)) {
		return ['valid' => false, 'errors' => ['Config section must be an array.']];
	}

	$schema    = doctor_casc_describe_schema();
	$allowed   = $schema['config'];
	$stateKeys = $schema['state']['settings'];
	$errors    = [];
	$resolved  = [];

	foreach ($values as $key => $value) {
		if (!is_string($key)) {
			$errors[] = 'Configuration keys must be strings.';
			continue;
		}

		if (in_array($key, $stateKeys, true)) {
			$errors[] = 'Runtime state key cannot be managed as config: ' . $key;
			continue;
		}

		if (!isset($allowed[$key])) {
			$errors[] = 'Unknown configuration key: ' . $key;
			continue;
		}

		$spec = $allowed[$key];
		if ($spec['type'] === 'checkbox') {
			if (is_bool($value)) {
				$normalized = $value ? 'on' : '';
			} elseif (is_string($value) && in_array($value, ['', 'on'], true)) {
				$normalized = $value;
			} else {
				$errors[] = 'Invalid checkbox value for ' . $key . '; expected "", "on", or boolean.';
				continue;
			}
			$resolved[$key] = $normalized;
		} elseif ($spec['type'] === 'enum') {
			$str = is_int($value) || is_string($value) ? (string) $value : null;
			if ($str === null || !in_array($str, $spec['enum'], true)) {
				$errors[] = 'Invalid value for ' . $key . '; allowed: ' . implode(', ', $spec['enum']) . '.';
				continue;
			}
			$resolved[$key] = $str;
		} elseif ($spec['type'] === 'string') {
			if (!is_string($value)) {
				$errors[] = 'Expected string value for ' . $key . '.';
				continue;
			}
			if (strlen($value) > $spec['maxLength'] || preg_match('/[\x00-\x1f\x7f]/', $value)) {
				$errors[] = 'Value for ' . $key . ' exceeds length limit or contains control characters.';
				continue;
			}
			$resolved[$key] = $value;
		} elseif ($spec['type'] === 'integer') {
			if (is_int($value)) {
				$intVal = $value;
			} elseif (is_string($value) && preg_match('/\A[0-9]+\z/', $value)) {
				$intVal = (int) $value;
			} else {
				$errors[] = 'Expected integer value for ' . $key . '.';
				continue;
			}
			if ($intVal < $spec['minimum'] || $intVal > $spec['maximum']) {
				$errors[] = 'Value for ' . $key . ' must be between ' . $spec['minimum'] . ' and ' . $spec['maximum'] . '.';
				continue;
			}
			$resolved[$key] = (string) $intVal;
		}
	}

	if (isset($resolved['doctor_disk_fail_percent'], $resolved['doctor_disk_warn_percent'])
		&& (int) $resolved['doctor_disk_fail_percent'] >= (int) $resolved['doctor_disk_warn_percent']) {
		$errors[] = 'doctor_disk_fail_percent must be lower than doctor_disk_warn_percent.';
	}

	if (isset($resolved['doctor_clock_warn_seconds'], $resolved['doctor_clock_fail_seconds'])
		&& (int) $resolved['doctor_clock_warn_seconds'] >= (int) $resolved['doctor_clock_fail_seconds']) {
		$errors[] = 'doctor_clock_warn_seconds must be lower than doctor_clock_fail_seconds.';
	}

	return [
		'valid'  => $errors === [],
		'errors' => $errors
	];
}

/**
 * Compute a dry-run change plan comparing desired Doctor configuration against
 * the current settings.
 *
 * @param mixed $desired
 * @return array{valid:bool,errors:array<int,string>,changes:array<int,array{key:string,from:string,to:string}>}
 */
function doctor_casc_plan($desired) {
	$validation = doctor_casc_validate($desired);
	if (!$validation['valid']) {
		return ['valid' => false, 'errors' => $validation['errors'], 'changes' => []];
	}

	$values  = is_array($desired) && array_key_exists('config', $desired) && is_array($desired['config']) ? $desired['config'] : (is_array($desired) ? $desired : []);
	$current = doctor_casc_export()['config'];
	$schema  = doctor_casc_describe_schema()['config'];
	$changes = [];

	foreach ($values as $key => $value) {
		if (!isset($schema[$key])) {
			continue;
		}
		if ($schema[$key]['type'] === 'checkbox' && is_bool($value)) {
			$target = $value ? 'on' : '';
		} else {
			$target = (string) $value;
		}
		$existing = isset($current[$key]) ? $current[$key] : (string) $schema[$key]['default'];
		if ($existing !== $target) {
			$changes[] = [
				'key'  => $key,
				'from' => $existing,
				'to'   => $target
			];
		}
	}

	return [
		'valid'   => true,
		'errors'  => [],
		'changes' => $changes
	];
}

/**
 * Validate and apply declarative Doctor configuration changes.
 *
 * @param mixed $desired
 * @return array{applied:bool,errors:array<int,string>,changes:array<int,array{key:string,from:string,to:string}>}
 */
function doctor_casc_apply($desired) {
	$plan = doctor_casc_plan($desired);
	if (!$plan['valid']) {
		return ['applied' => false, 'errors' => $plan['errors'], 'changes' => []];
	}

	foreach ($plan['changes'] as $change) {
		set_config_option($change['key'], $change['to']);
	}

	return [
		'applied' => true,
		'errors'  => [],
		'changes' => $plan['changes']
	];
}

/**
 * Register Doctor's plain-array configuration-as-code provider descriptor on
 * the casc_register_providers hook without importing any sibling plugin.
 *
 * @param mixed $registrar
 * @return array<string,mixed>
 */
function doctor_casc_register_providers($registrar = null) {
	$provider = [
		'slug'           => 'doctor',
		'schemaVersion'  => '1.0',
		'schema'         => doctor_casc_describe_schema(),
		'export'         => 'doctor_casc_export',
		'validate'       => 'doctor_casc_validate',
		'plan'           => 'doctor_casc_plan',
		'apply'          => 'doctor_casc_apply',
		'describeSchema' => 'doctor_casc_describe_schema'
	];

	if (is_object($registrar) && method_exists($registrar, 'register')) {
		$registrar->register($provider);
		return $provider;
	}

	if (is_array($registrar)) {
		$registrar['doctor'] = $provider;
		return $registrar;
	}

	return $provider;
}

/**
 * Append read-only Doctor API resource descriptors on the
 * api_register_resources hook without importing any sibling plugin.
 *
 * @param array<int|string,mixed> $resources
 * @return array<int|string,mixed>
 */
function doctor_api_register_resources($resources = []) {
	if (!is_array($resources)) {
		$resources = [];
	}

	$resources[] = [
		'path'        => 'doctor/checks',
		'plugin'      => 'doctor',
		'methods'     => ['GET'],
		'readOnly'    => true,
		'schema'      => 'schema/doctor.schema.yaml',
		'description' => 'List registered core and plugin Doctor checks.'
	];

	$resources[] = [
		'path'        => 'doctor/report',
		'plugin'      => 'doctor',
		'methods'     => ['GET'],
		'readOnly'    => true,
		'schema'      => 'schema/doctor.schema.yaml',
		'description' => 'Run read-only Doctor diagnostic checks and return a structured report.'
	];

	$resources[] = [
		'path'        => 'doctor/debug-info',
		'plugin'      => 'doctor',
		'methods'     => ['GET'],
		'readOnly'    => true,
		'schema'      => 'schema/doctor.schema.yaml',
		'description' => 'Return redacted plugin debug information sections.'
	];

	return $resources;
}
