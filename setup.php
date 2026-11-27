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

function plugin_doctor_install() {
	doctor_setup_hooks();
	doctor_setup_realms();
	require_once __DIR__ . '/doctor_workflows.php';
	doctor_setup_workflows();
}

/** Keep the original realm ID and grants as Administrator during upgrades. */
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
 */
function doctor_setup_hooks($enable = false) {
	api_plugin_register_hook('doctor', 'config_arrays', 'doctor_config_arrays', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'config_settings', 'doctor_config_settings', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'draw_navigation_text', 'doctor_draw_navigation_text', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'is_console_page', 'doctor_is_console_page', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'poller_bottom', 'doctor_poller_bottom', 'doctor_functions.php', $enable);
	api_plugin_register_hook('doctor', 'abilities_register', 'doctor_abilities_register', 'doctor_abilities.php', $enable);
}

function plugin_doctor_uninstall() {
	db_execute('DROP TABLE IF EXISTS plugin_doctor_acceptance');
	db_execute('DROP TABLE IF EXISTS plugin_doctor_audit');
	db_execute("DELETE FROM settings WHERE name LIKE 'doctor\\_%'");
}

function plugin_doctor_check_config() {
	doctor_setup_hooks();

	require_once __DIR__ . '/doctor_workflows.php';
	return doctor_setup_realms() && doctor_setup_workflows();
}

function plugin_doctor_upgrade() {
	return false;
}

/**
 * @return array<string,string>
 */
function plugin_doctor_version() {
	global $config;

	$info = parse_ini_file($config['base_path'] . '/plugins/doctor/INFO', true);

	return is_array($info) && isset($info['info']) ? $info['info'] : [];
}

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

/** @return array<string,string> */
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

function doctor_is_console_page($url) {
	return preg_match('/doctor(?:_view|_operator)?\.php/', $url) === 1;
}
