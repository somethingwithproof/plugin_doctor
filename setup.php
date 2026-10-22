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

function plugin_doctor_install() {
	doctor_register_hooks();
	api_plugin_register_realm('doctor', 'doctor.php', __('Cacti Doctor', 'doctor'), 1);
}

/**
 * Registration is idempotent, so enabling or upgrading the plugin can call it
 * again to add hooks introduced by a newer version.
 */
function doctor_register_hooks($enable = false) {
	api_plugin_register_hook('doctor', 'config_arrays', 'doctor_config_arrays', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'config_settings', 'doctor_config_settings', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'draw_navigation_text', 'doctor_draw_navigation_text', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'is_console_page', 'doctor_is_console_page', 'setup.php', $enable);
	api_plugin_register_hook('doctor', 'poller_bottom', 'doctor_poller_bottom', 'doctor_functions.php', $enable);
}

function plugin_doctor_uninstall() {
	db_execute("DELETE FROM settings WHERE name LIKE 'doctor\\_%'");
}

function plugin_doctor_check_config() {
	doctor_register_hooks();

	return true;
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
		doctor_register_hooks(true);
		set_config_option('doctor_hooks_version', $version);
	}

	$menu[__('Utilities')]['plugins/doctor/doctor.php'] = __('Cacti Doctor', 'doctor');

	if (function_exists('auth_augment_roles')) {
		auth_augment_roles(__('System Administration'), ['doctor.php']);
	}
}

function doctor_config_settings() {
	global $tabs, $settings;

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
		]
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

	return $nav;
}

function doctor_is_console_page($url) {
	return strpos($url, 'doctor.php') !== false;
}
