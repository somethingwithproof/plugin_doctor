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

chdir('../../');
include_once('./include/auth.php');
include_once('./plugins/doctor/doctor_functions.php');

set_default_action();

if (get_request_var('action') === 'repair') {
	if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
		http_response_code(405);
		header('Allow: POST');
		exit;
	}

	if (!csrf_check(false)) {
		http_response_code(403);
		exit;
	}

	$repair = (string) get_nfilter_request_var('repair_id');
	$result = doctor_run_repair($repair);
	$level  = $result['status'] === 'pass' ? MESSAGE_LEVEL_INFO : MESSAGE_LEVEL_ERROR;

	cacti_log('Doctor repair ' . str_replace(["\r", "\n"], ' ', $repair) . ': ' . $result['status'] . ' - ' . $result['detail'], false, 'DOCTOR');
	raise_message('doctor_repair', $result['summary'] . ': ' . $result['detail'], $level);

	header('Location: doctor.php');
	exit;
}

$results = doctor_run_checks();
$counts  = doctor_result_counts($results);

top_header();

html_start_box(__('Cacti Doctor', 'doctor'), '100%', false, 3, 'center', '');
print '<tr class="tableHeader"><th colspan="5">' . html_escape(__('Installation health: %d passed, %d warnings, %d failed', $counts['pass'], $counts['warn'], $counts['fail'], 'doctor')) . '</th></tr>';
html_header([__('Status', 'doctor'), __('Category', 'doctor'), __('Check', 'doctor'), __('Details', 'doctor'), __('Action', 'doctor')]);

$row = 0;
foreach ($results as $result) {
	$statusClass = $result['status'] === 'pass' ? 'deviceUp' : ($result['status'] === 'warn' ? 'deviceRecovering' : 'deviceDown');
	print '<tr class="' . ($row++ % 2 ? 'even' : 'odd') . '">';
	print '<td><span class="' . $statusClass . '">' . html_escape(doctor_status_label((string) $result['status'])) . '</span></td>';
	print '<td>' . html_escape(doctor_category_label((string) $result['category'])) . '</td>';
	print '<td>' . html_escape((string) $result['summary']) . '</td>';
	print '<td>' . html_escape((string) $result['detail']) . '</td>';
	print '<td>';

	if ($result['repairable']) {
		$repairs = doctor_available_repairs();
		$repair  = (string) $result['repair'];
		form_start('doctor.php', 'doctor_repair_' . str_replace('.', '_', (string) $result['id']));
		print "<input type='hidden' name='action' value='repair'>";
		print "<input type='hidden' name='repair_id' value='" . doctor_html_escape_attr($repair) . "'>";
		print "<button class='ui-button ui-corner-all ui-widget' type='submit' title='" . doctor_html_escape_attr($repairs[$repair]['description']) . "'>" . html_escape($repairs[$repair]['label']) . '</button>';
		form_end(false);
	} else {
		print '&mdash;';
	}

	print '</td></tr>';
}

html_end_box();

print '<p class="textArea">' . html_escape(__('Diagnostics are read-only. Repairs only run after an authenticated, CSRF-protected POST and are logged to the Cacti log.', 'doctor')) . '</p>';

bottom_footer();
