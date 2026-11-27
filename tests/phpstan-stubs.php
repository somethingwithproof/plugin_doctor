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

if (!defined('CACTI_VERSION')) {
	define('CACTI_VERSION', '1.2.31');
}
if (!defined('CACTI_SERVER_OS')) {
	define('CACTI_SERVER_OS', 'unix');
}
if (!defined('CACTI_PATH_BASE')) {
	define('CACTI_PATH_BASE', '');
}
if (!defined('CACTI_PATH_CACHE')) {
	define('CACTI_PATH_CACHE', '');
}
if (!defined('CACTI_PATH_LOG')) {
	define('CACTI_PATH_LOG', '');
}
if (!defined('CACTI_PATH_RRA')) {
	define('CACTI_PATH_RRA', '');
}
if (!defined('CACTI_PATH_PLUGINS')) {
	define('CACTI_PATH_PLUGINS', '');
}
if (!defined('MESSAGE_LEVEL_INFO')) {
	define('MESSAGE_LEVEL_INFO', 1);
}
if (!defined('MESSAGE_LEVEL_ERROR')) {
	define('MESSAGE_LEVEL_ERROR', 2);
}

/** @return mixed */
function read_config_option($config_name, $force = false) {}

/** @return void */
function set_config_option($config_name, $value) {}

/** @return string */
function cacti_escapeshellarg($string, $quote = true) {}

/**
 * @param mixed $array
 * @return int
 */
function cacti_sizeof($array) {}

/** @return mixed */
function db_fetch_cell($sql, $col_name = '', $log = true, $db_conn = false) {}

/**
 * @param string $sql
 * @param array<int,mixed> $params
 * @param string $col_name
 * @param bool $log
 * @param mixed $db_conn
 * @return mixed
 */
function db_fetch_cell_prepared($sql, $params = [], $col_name = '', $log = true, $db_conn = false) {}

/**
 * @param string $sql
 * @param bool $log
 * @param mixed $db_conn
 * @return array<int,array<string,mixed>>|false
 */
function db_fetch_assoc($sql, $log = true, $db_conn = false) {}

/**
 * @param string $sql
 * @param array<int,mixed> $params
 * @param bool $log
 * @param mixed $db_conn
 * @return array<int,array<string,mixed>>|false
 */
function db_fetch_assoc_prepared($sql, $params = [], $log = true, $db_conn = false) {}

/** @return bool */
function db_execute($sql, $log = true, $db_conn = false) {}

/**
 * @param string $sql
 * @param array<int,mixed> $params
 * @param bool $log
 * @param mixed $db_conn
 * @return bool
 */
function db_execute_prepared($sql, $params = [], $log = true, $db_conn = false) {}

/** @return int|string */
function db_fetch_insert_id($db_conn = false) {}

/** @return bool */
function db_table_exists($table, $log = true, $db_conn = false) {}

/** @return bool */
function cacti_log($string, $output = false, $environ = 'CMDPHP', $level = '') {}

/** @return string */
function send_mail($to, $from, $subject, $body, $attachments = '', $headers = '', $html = false) {}

/** @return void */
function exec_background($filename, $args = '', $redirect_args = '') {}

/**
 * @param mixed $text
 * @param mixed $arg1
 * @param mixed $arg2
 * @param mixed $arg3
 * @param mixed $arg4
 * @param mixed $arg5
 * @param mixed $arg6
 * @param mixed $arg7
 * @param mixed $arg8
 * @param mixed $arg9
 * @return string
 */
function __($text = '', $arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null, $arg6 = null, $arg7 = null, $arg8 = null, $arg9 = null) {}

/** @return bool */
function is_realm_allowed($realm, $check_user = false) {}

/** @return bool */
function is_function_enabled($function_name) {}

/** @return bool */
function api_plugin_is_enabled($plugin) {}

/** @return string|false */
function cacti_plugin_path($plugin, $relative = '') {}

/** @return void */
function api_plugin_register_hook($plugin, $hook, $function, $file, $enable = false) {}

/** @return bool|void */
function api_plugin_register_realm($plugin, $file, $display, $admin = true) {}

/**
 * @param string $role
 * @param array<int,string> $files
 * @return void
 */
function auth_augment_roles($role, $files) {}

/**
 * @param string $sql_where
 * @param string $sql_order
 * @param string $sql_limit
 * @param int $total_rows
 * @param int $user_id
 * @param int $device_id
 * @return array<int,array<string,mixed>>
 */
function get_allowed_devices($sql_where = '', $sql_order = 'description', $sql_limit = '', &$total_rows = 0, $user_id = 0, $device_id = 0) {}

/** @return mixed */
function get_request_var($name, $default = '') {}

/** @return mixed */
function get_nfilter_request_var($name, $default = '') {}

/** @return bool */
function csrf_check($fatal = true) {}

/** @return string */
function html_escape($text) {}

/** @return string */
function html_escape_attr($text) {}

/** @return void */
function top_header() {}

/** @return void */
function bottom_footer() {}

/** @return void */
function html_start_box($title, $width, $color, $cell_padding, $align, $add_text) {}

/** @return void */
function html_end_box($trailing_br = true) {}

/**
 * @param array<int,string> $header_items
 * @return void
 */
function html_header($header_items) {}

/** @return void */
function form_start($action, $id = '', $multipart = false) {}

/** @return void */
function form_end($include_csrf = true) {}

/** @return void */
function raise_message($item, $message = '', $level = 1) {}
