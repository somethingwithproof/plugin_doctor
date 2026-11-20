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

/*
 * Minimal stand-ins for the Cacti functions Doctor calls, so checks can run
 * outside a Cacti installation. Tests set $GLOBALS['doctor_test_settings'],
 * $GLOBALS['doctor_test_cells'], and $GLOBALS['doctor_test_rows'] to control
 * what Cacti would return.
 */

$GLOBALS['doctor_test_settings'] = [];
$GLOBALS['doctor_test_cells']    = [];
$GLOBALS['doctor_test_rows']     = [];
$GLOBALS['doctor_test_queries']  = [];
$GLOBALS['doctor_test_log']      = [];
$GLOBALS['doctor_test_mail']     = [];
$GLOBALS['doctor_test_spawned']  = [];
$GLOBALS['doctor_test_database'] = [];

if (!function_exists('read_config_option')) {
	function read_config_option($name, $force = false) {
		return isset($GLOBALS['doctor_test_settings'][$name]) ? $GLOBALS['doctor_test_settings'][$name] : '';
	}
}

if (!function_exists('cacti_escapeshellarg')) {
	function cacti_escapeshellarg($string, $quote = true) {
		return escapeshellarg($string);
	}
}

if (!function_exists('cacti_sizeof')) {
	function cacti_sizeof($array) {
		return is_array($array) || $array instanceof Countable ? count($array) : 0;
	}
}

if (!function_exists('db_fetch_cell')) {
	function db_fetch_cell($sql, $col_name = '', $log = true) {
		return isset($GLOBALS['doctor_test_cells'][$sql]) ? $GLOBALS['doctor_test_cells'][$sql] : false;
	}
}

if (!function_exists('db_fetch_cell_prepared')) {
	function db_fetch_cell_prepared($sql, $params = [], $col_name = '', $log = true) {
		if ($sql === 'SELECT id FROM plugin_realms WHERE plugin = ? AND file = ?') {
			return isset($GLOBALS['doctor_test_realms'][$params[1]]) ? $GLOBALS['doctor_test_realms'][$params[1]] : false;
		}
		return isset($GLOBALS['doctor_test_cells'][$sql]) ? $GLOBALS['doctor_test_cells'][$sql] : false;
	}
}

if (!function_exists('db_execute_prepared')) {
	function db_execute_prepared($sql, $params = [], $log = true) {
		$GLOBALS['doctor_test_database'][] = ['sql' => $sql, 'params' => $params];
		if (isset($GLOBALS['doctor_test_pdo']) && strpos($sql, 'plugin_doctor_') !== false) {
			if (!empty($GLOBALS['doctor_test_audit_fail']) && strpos($sql, 'INSERT INTO plugin_doctor_audit') === 0) {
				return false;
			}
			return $GLOBALS['doctor_test_pdo']->prepare($sql)->execute($params);
		}
		if (strpos($sql, 'INSERT INTO settings') === 0 && isset($params[0], $params[1])) {
			$GLOBALS['doctor_test_settings'][$params[0]] = $params[1];
			$GLOBALS['doctor_test_cells']["SELECT value FROM settings WHERE name = ? AND IS_USED_LOCK(CONCAT('doctor:', LEFT(SHA2(DATABASE(), 256), 56))) = CONNECTION_ID()"] = $params[1];
			return true;
		}
		return false;
	}
}

if (!function_exists('db_fetch_assoc')) {
	function db_fetch_assoc($sql, $log = true, $db_conn = false) {
		$GLOBALS['doctor_test_queries'][] = $sql;
		if (isset($GLOBALS['doctor_test_pdo']) && (strpos($sql, 'plugin_doctor_') !== false || (!empty($GLOBALS['doctor_test_rrd_sql']) && strpos($sql, 'FROM data_template_data AS') !== false))) {
			return $GLOBALS['doctor_test_pdo']->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		}
		return isset($GLOBALS['doctor_test_rows'][$sql]) ? $GLOBALS['doctor_test_rows'][$sql] : [];
	}
}

if (!function_exists('set_config_option')) {
	function set_config_option($name, $value) {
		$GLOBALS['doctor_test_settings'][$name] = $value;
	}
}

if (!function_exists('cacti_log')) {
	function cacti_log($string, $output = false, $environ = 'CMDPHP', $level = '') {
		$GLOBALS['doctor_test_log'][] = $environ . ': ' . $string;

		return true;
	}
}

if (!function_exists('send_mail')) {
	function send_mail($to, $from, $subject, $body, $attachments = '', $headers = '', $html = false) {
		$GLOBALS['doctor_test_mail'][] = ['to' => $to, 'subject' => $subject, 'body' => $body];
		return isset($GLOBALS['doctor_test_mail_failure']) ? $GLOBALS['doctor_test_mail_failure'] : '';
	}
}

if (!function_exists('exec_background')) {
	function exec_background($filename, $args = '', $redirect_args = '') {
		$GLOBALS['doctor_test_spawned'][] = $filename . ' ' . $args;
	}
}

if (!function_exists('__')) {
	// Like Cacti's __() for a plugin domain with no loaded translations: the text goes through sprintf().
	function __() {
		$args = func_get_args();

		return count($args) === 1 ? $args[0] : call_user_func_array('sprintf', $args);
	}
}

function doctor_test_directory() {
	$path = sys_get_temp_dir() . '/doctor-test-' . bin2hex(random_bytes(6));
	mkdir($path, 0700);

	return realpath($path);
}

function doctor_test_executable($directory, $name, $body) {
	$path = $directory . '/' . $name;
	file_put_contents($path, "#!/bin/sh\n" . $body . "\n");
	chmod($path, 0700);

	return $path;
}


function is_realm_allowed($realm, $check_user = false) {
	return in_array($realm, isset($GLOBALS['doctor_test_grants']) ? $GLOBALS['doctor_test_grants'] : [], true);
}

function get_allowed_devices($sql_where = '', $sql_order = 'description', $sql_limit = '', &$total_rows = 0, $user_id = 0, $device_id = 0) {
	$GLOBALS['doctor_test_device_order'] = $sql_order;

	return isset($GLOBALS['doctor_test_allowed_devices']) ? $GLOBALS['doctor_test_allowed_devices'] : [];
}

function api_plugin_register_realm($plugin, $file, $display, $admin = true) {
	$GLOBALS['doctor_test_registrations'][] = [$plugin, $file, $display, $admin];
	return true;
}

function db_execute($sql, $log = true, $db_conn = false) {
	if (!isset($GLOBALS['doctor_test_pdo'])) {
		return false;
	}
	return $GLOBALS['doctor_test_pdo']->exec($sql === 'START TRANSACTION' ? 'BEGIN' : $sql) !== false;
}

function db_fetch_insert_id($db_conn = false) {
	return $GLOBALS['doctor_test_pdo']->lastInsertId();
}

function db_table_exists($name, $db_conn = false, $refresh = false) {
	return isset($GLOBALS['doctor_test_pdo']) && strpos($name, 'plugin_doctor_') === 0;
}

function doctor_test_workflow_database() {
	$db = new PDO('sqlite::memory:');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->exec('CREATE TABLE plugin_doctor_audit (id INTEGER PRIMARY KEY AUTOINCREMENT, created INTEGER, actor TEXT, action TEXT, payload TEXT)');
	$db->exec('CREATE TABLE plugin_doctor_acceptance (check_id TEXT PRIMARY KEY, owner TEXT, reason TEXT, actor INTEGER, created INTEGER, expires INTEGER)');
	$GLOBALS['doctor_test_pdo'] = $db;
	return $db;
}
