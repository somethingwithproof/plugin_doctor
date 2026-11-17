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

// Executed only in a subprocess by WebAccessTest, never as a web endpoint.
if (PHP_SAPI !== 'cli') { http_response_code(404); exit; }
$input = json_decode($argv[1], true);
require dirname(__DIR__) . '/CactiStubs.php';
$fixtureRoot = sys_get_temp_dir() . '/doctor-web-' . getmypid();
mkdir($fixtureRoot, 0700);
define('CACTI_PATH_BASE', $fixtureRoot);
require dirname(dirname(__DIR__)) . '/doctor_functions.php';
require dirname(dirname(__DIR__)) . '/doctor_access.php';
$GLOBALS['doctor_test_realms'] = ['doctor.php' => 20, 'doctor_operator.php' => 21, 'doctor_view.php' => 22];
$GLOBALS['doctor_test_grants'] = $input['grants'];
$_SESSION = ['sess_user_id' => 7, 'doctor_report' => [
	'user' => 7, 'time' => time() - (isset($input['age']) ? $input['age'] : 0), 'results' => [doctor_result('database.clock', 'Database', 'fail', 'Clock', 'private detail', 'runtime_directories')]
]];
$GLOBALS['doctor_test_settings'] = ['doctor_schedule_enabled' => 'on', 'doctor_state' => 'database.clock=fail', 'doctor_last_completed' => (string) time()];
$_SERVER['REQUEST_METHOD'] = $input['method'];
function get_request_var($name) { global $input; return isset($input[$name]) ? $input[$name] : ''; }
function get_nfilter_request_var($name) { return get_request_var($name); }
function csrf_check($fatal = true) { global $input; return $input['csrf']; }
function html_escape($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
function top_header() {}
function bottom_footer() {}
function html_start_box($title, $width, $color, $padding, $align, $action) { print '<table>'; }
function html_end_box() { print '</table>'; }
function html_header($headers) { print '<tr><th>' . implode('</th><th>', $headers) . '</th></tr>'; }
function form_start($action, $id = '', $multipart = false) { print '<form method="post" action="' . $action . '">'; }
function form_end($save = true) { print '</form>'; }
function raise_message($name, $message, $level) {}
define('MESSAGE_LEVEL_INFO', 1);
define('MESSAGE_LEVEL_ERROR', 2);
define('DOCTOR_WEB_REQUEST', true);
http_response_code(200);
ob_start();
register_shutdown_function(function () {
	global $fixtureRoot;
	foreach (['cache', 'log', 'rra'] as $directory) {
		if (is_dir($fixtureRoot . '/' . $directory)) { rmdir($fixtureRoot . '/' . $directory); }
	}
	rmdir($fixtureRoot);
	$html = ob_get_clean();
	print json_encode(['status' => http_response_code(), 'html' => $html, 'log' => $GLOBALS['doctor_test_log']]);
});
require dirname(dirname(__DIR__)) . '/doctor_web.php';
