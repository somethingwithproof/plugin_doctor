<?php

/*
 * Minimal stand-ins for the Cacti functions Doctor calls, so checks can run
 * outside a Cacti installation. Tests set $GLOBALS['doctor_test_settings'],
 * $GLOBALS['doctor_test_cells'], and $GLOBALS['doctor_test_rows'] to control
 * what Cacti would return.
 */

$GLOBALS['doctor_test_settings'] = [];
$GLOBALS['doctor_test_cells']    = [];
$GLOBALS['doctor_test_rows']     = [];
$GLOBALS['doctor_test_log']      = [];
$GLOBALS['doctor_test_mail']     = [];
$GLOBALS['doctor_test_spawned']  = [];

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
		return isset($GLOBALS['doctor_test_cells'][$sql]) ? $GLOBALS['doctor_test_cells'][$sql] : false;
	}
}

if (!function_exists('db_fetch_assoc')) {
	function db_fetch_assoc($sql, $log = true) {
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

		return '';
	}
}

if (!function_exists('exec_background')) {
	function exec_background($filename, $args = '', $redirect_args = '') {
		$GLOBALS['doctor_test_spawned'][] = $filename . ' ' . $args;
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
