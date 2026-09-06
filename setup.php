<?php
/*
 +-------------------------------------------------------------------------+
 | Copyright (C) 2004-2026 The Cacti Group                                 |
 |                                                                         |
 | This program is free software; you can redistribute it and/or           |
 | modify it under the terms of the GNU General Public License             |
 | as published by the Free Software Foundation; either version 2          |
 | of the License, or (at your option) any later version.                  |
 +-------------------------------------------------------------------------+
*/

function plugin_doctor_install() {
	api_plugin_register_hook('doctor', 'config_arrays', 'doctor_config_arrays', 'setup.php');
	api_plugin_register_hook('doctor', 'draw_navigation_text', 'doctor_draw_navigation_text', 'setup.php');
	api_plugin_register_hook('doctor', 'is_console_page', 'doctor_is_console_page', 'setup.php');
	api_plugin_register_realm('doctor', 'doctor.php', __('Cacti Doctor', 'doctor'), 1);
}

function plugin_doctor_uninstall() {
	// Doctor stores no database state, so uninstall is intentionally non-destructive.
}

function plugin_doctor_check_config() {
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

	$menu[__('Utilities')]['plugins/doctor/doctor.php'] = __('Cacti Doctor', 'doctor');

	if (function_exists('auth_augment_roles')) {
		auth_augment_roles(__('System Administration'), ['doctor.php']);
	}
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
