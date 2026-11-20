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

if (!defined('DOCTOR_WEB_REQUEST')) {
	http_response_code(404);
	exit;
}

$access = doctor_access_level();
if ($access === 0) {
	http_response_code(403);
	exit;
}
$pages = [1 => 'doctor_view.php', 2 => 'doctor_operator.php', 3 => 'doctor.php'];
$page = $pages[$access];
$cached = isset($_SESSION['doctor_report']) ? $_SESSION['doctor_report'] : [];
if (!isset($cached['user']) || $cached['user'] !== (int) $_SESSION['sess_user_id']) {
	$cached = [];
}
// Re-evaluate device/log permissions even when the report predates a grant change.
$results = $access >= 2 && isset($cached['results']) ? doctor_web_results($cached['results']) : [];
$action = (string) get_request_var('action');
$confirm = '';
$error = '';
if ($action !== '' && $action !== 'default') {
	$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';
	$status = doctor_action_status($action, $method, $method === 'POST' && csrf_check(false));
	if ($status !== 200) {
		http_response_code($status);
		if ($status === 405) {
			header('Allow: POST');
		}
		exit;
	}
	if ($action === 'run') {
		$cached = doctor_run_web_checks();
		if (isset($cached['error'])) {
			$error = $cached['error'];
			unset($_SESSION['doctor_report']);
			$results = [];
		} else {
			$_SESSION['doctor_report'] = $cached;
			$results = $cached['results'];
			cacti_log('Doctor diagnostics requested by user ' . (int) $_SESSION['sess_user_id'], false, 'DOCTOR');
		}
	} elseif ($action === 'acknowledge') {
		if (empty($cached['time']) || time() < $cached['time'] || time() - $cached['time'] > doctor_report_max_age()
			|| !doctor_acknowledge($results, (string) get_nfilter_request_var('check_id'), (string) get_nfilter_request_var('fingerprint'))) {
			http_response_code(409);
			$error = __('The finding could not be acknowledged. Run Doctor again, then acknowledge the current result.', 'doctor');
		}
	} elseif ($action === 'accept' || $action === 'unaccept') {
		$date = (string) get_nfilter_request_var('expires');
		$expires = preg_match('/\A[0-9]{4}-[0-9]{2}-[0-9]{2}\z/', $date) ? strtotime($date . ' 00:00:00 UTC') : false;
		if ($expires !== false && gmdate('Y-m-d', $expires) !== $date) {
			$expires = false;
		}
		if (($action === 'accept' && (empty($cached['time']) || time() < $cached['time'] || time() - $cached['time'] > doctor_report_max_age()))
			|| !doctor_change_acceptance($results, (string) get_nfilter_request_var('check_id'), (string) get_nfilter_request_var('owner'),
				(string) get_nfilter_request_var('reason'), $expires === false ? 0 : $expires, $action === 'unaccept')) {
			http_response_code(409);
			$error = __('The warning exception could not be saved. Use a fresh assessed warning, an owner, a reason and an expiry within 90 days.', 'doctor');
		}
		$results = doctor_apply_acceptances($results);
	} elseif ($action === 'repair') {
		$repair = (string) get_nfilter_request_var('repair_id');
		if (!isset(doctor_available_repairs()[$repair])) {
			http_response_code(400);
			exit;
		}
		if (get_request_var('confirmed') !== 'yes') {
			$confirm = $repair;
			$_SESSION['doctor_repair_plan'] = doctor_repair_snapshot();
			$_SESSION['doctor_repair_plan']['created'] = time();
			$_SESSION['doctor_repair_plan']['actor'] = doctor_actor();
		} else {
			$plan = isset($_SESSION['doctor_repair_plan']) ? $_SESSION['doctor_repair_plan'] : [];
			unset($_SESSION['doctor_repair_plan']);
			if (!isset($plan['fingerprint']) || get_nfilter_request_var('plan') !== $plan['fingerprint']) {
				http_response_code(409);
				exit;
			}
			$result = doctor_execute_repair_plan($plan);
			cacti_log('Doctor repair ' . $repair . ' by user ' . (int) $_SESSION['sess_user_id'] . ': ' . $result['status'] . ' - ' . doctor_redact(isset($result['log']) ? $result['log'] : $result['detail']), false, 'DOCTOR');
			raise_message('doctor_repair', doctor_redact($result['summary'] . ': ' . $result['detail']), $result['status'] === 'pass' ? MESSAGE_LEVEL_INFO : MESSAGE_LEVEL_ERROR);
			unset($_SESSION['doctor_report']);
			header('Location: ' . $page);
			exit;
		}
	}
}

$observed = isset($cached['time']) ? (int) $cached['time'] : 0;
$fresh = $observed > 0 && time() >= $observed && time() - $observed <= doctor_report_max_age();
if ($access === 1) {
	$view = doctor_viewer_results(time());
	$results = $view['results'];
	$results = doctor_apply_acceptances($results);
	$observed = $view['time'];
	$fresh = $view['fresh'];
}

/** Cacti's form helper supplies the CSRF token, including confirmation forms. */
function doctor_action_form($page, $action, $values, $label) {
	form_start($page);
	print "<input type='hidden' name='action' value='" . doctor_html_escape_attr($action) . "'>";
	foreach ($values as $name => $value) {
		print "<input type='hidden' name='" . doctor_html_escape_attr($name) . "' value='" . doctor_html_escape_attr($value) . "'>";
	}
	print "<button class='ui-button ui-corner-all ui-widget' type='submit'>" . html_escape($label) . '</button>';
	form_end(false);
}

top_header();
if ($error !== '') {
	print '<p class="textError">' . html_escape($error) . '</p>';
}
if ($confirm !== '') {
	$repairs = doctor_available_repairs();
	html_start_box(__('Confirm repair', 'doctor'), '100%', false, 3, 'center', '');
	print '<tr><td>' . html_escape($repairs[$confirm]['description']) . '</td></tr><tr><td>';
	$plan = $_SESSION['doctor_repair_plan'];
	print '<p>' . html_escape(__('Approval expires after five minutes and is invalidated by a changed filesystem. The acting account must be able to create directories or change owner permissions.', 'doctor')) . '</p><ul>';
	foreach ($plan['objects'] as $object) {
		$before = $object['mode'] === null ? '-' : sprintf('%04o', $object['mode']);
		$after = $object['target_mode'] === null ? '-' : sprintf('%04o', $object['target_mode']);
		print '<li>' . html_escape($object['path'] . ': ' . $object['action'] . ' (' . $before . ' -> ' . $after . ')') . '</li>';
	}
	print '</ul>';
	if ($plan['allowed']) {
		doctor_action_form($page, 'repair', ['repair_id' => $confirm, 'confirmed' => 'yes', 'plan' => $plan['fingerprint']], __('Confirm repair', 'doctor'));
	} else { print '<p>' . html_escape(__('Repair prerequisites are not met. No changes will be made.', 'doctor')) . '</p>'; }
	print '<a class="ui-button" href="' . html_escape($page) . '">' . html_escape(__('Cancel', 'doctor')) . '</a></td></tr>';
	html_end_box();
}

print '<p>' . html_escape($observed > 0 ? __('Last observation: %s UTC.', gmdate('Y-m-d H:i:s', $observed), 'doctor') : __('No completed diagnostic report is available.', 'doctor')) . '</p>';
if (!$fresh) {
	print '<p class="textWarning">' . html_escape(__('Health is unknown: observations are missing or stale.', 'doctor')) . '</p>';
}
if ($access >= 2) {
	doctor_action_form($page, 'run', [], __('Run diagnostic checks', 'doctor'));
}
if (doctor_can_configure()) {
	print '<p><a href="../../settings.php?tab=doctor">' . html_escape(__('Doctor settings', 'doctor')) . '</a></p>';
}

html_start_box(__('Cacti Doctor', 'doctor'), '100%', false, 3, 'center', '');
$counts = doctor_result_counts($results);
if ($fresh) {
	print '<tr class="tableHeader"><th colspan="' . ($access >= 2 ? 5 : 3) . '">' . html_escape(__('Installation health: %d passed, %d warnings, %d failed', $counts['pass'], $counts['warn'], $counts['fail'], 'doctor')) . '</th></tr>';
}
$headers = [__('Status', 'doctor'), __('Category', 'doctor'), __('Check', 'doctor')];
if ($access >= 2) {
	$headers[] = __('Details', 'doctor');
	$headers[] = __('Action', 'doctor');
}
html_header($headers);
$row = 0;
foreach ($results as $result) {
	$status = $fresh ? $result['status'] : 'unknown';
	$class = $status === 'pass' ? 'deviceUp' : ($status === 'fail' ? 'deviceDown' : 'textWarning');
	print '<tr class="' . ($row++ % 2 ? 'even' : 'odd') . '"><td><span class="' . $class . '">' . html_escape(doctor_status_label($status)) . '</span>' . ($fresh && doctor_warning_accepted($result) ? ' (' . html_escape(__('Accepted warning', 'doctor')) . ')' : '') . '</td>';
	print '<td>' . html_escape(doctor_category_label($result['category'])) . '</td><td>' . html_escape($result['summary']) . '</td>';
	if ($access >= 2) {
		print '<td>' . html_escape($result['detail']) . '</td><td>';
		if ($result['repairable'] && doctor_can_configure()) {
			$repairs = doctor_available_repairs();
			doctor_action_form($page, 'repair', ['repair_id' => $result['repair']], $repairs[$result['repair']]['label']);
		}
		if ($fresh && in_array($result['status'], ['warn', 'fail'], true)) {
			$fingerprint = doctor_finding_fingerprint($result);
			if (read_config_option('doctor_ack_' . (int) $_SESSION['sess_user_id'] . '_' . $result['id']) === $fingerprint) {
				print html_escape(__('Acknowledged; health status unchanged.', 'doctor'));
			} else {
				doctor_action_form($page, 'acknowledge', ['check_id' => $result['id'], 'fingerprint' => $fingerprint], __('Acknowledge', 'doctor'));
			}
		}
		if (doctor_warning_accepted($result)) {
			$policy = $result['acceptance'];
			print '<p>' . html_escape(__('Owner: %s; review by %s UTC. Reason: %s', $policy['owner'], gmdate('Y-m-d', $policy['expires']), $policy['reason'], 'doctor')) . '</p>';
		}
		print '</td>';
	}
	print '</tr>';
}
html_end_box();

if ($access >= 2) {
	print '<form method="get" action="' . html_escape($page) . '"><label for="doctor_symptom">' . html_escape(__('Investigate a symptom', 'doctor')) . '</label> ';
	print '<select id="doctor_symptom" name="symptom">';
	$symptom = (string) get_nfilter_request_var('symptom');
	foreach (doctor_symptoms() as $id => $label) {
		print '<option value="' . html_escape($id) . '"' . ($id === $symptom ? ' selected' : '') . '>' . html_escape($label) . '</option>';
	}
	print '</select> <button type="submit">' . html_escape(__('Investigate', 'doctor')) . '</button></form>';
	$diagnosis = doctor_diagnose($symptom, $results, $fresh);
	if ($diagnosis !== false) {
		print '<pre style="white-space:pre-wrap;overflow-wrap:anywhere">' . html_escape(doctor_diagnosis_text($diagnosis)) . '</pre>';
	}
}

$history = doctor_read_json_setting('doctor_report_history');
if ($history !== []) {
	html_start_box(__('Recent scheduled checks', 'doctor'), '100%', false, 3, 'center', '');
	html_header([__('Observation (UTC)', 'doctor'), __('Passed', 'doctor'), __('Warnings', 'doctor'), __('Failed', 'doctor')]);
	foreach ($history as $sample) {
		if (is_array($sample) && count($sample) === 4) {
			print '<tr><td>' . html_escape(gmdate('Y-m-d H:i:s', (int) $sample[0])) . '</td><td>' . (int) $sample[1] . '</td><td>' . (int) $sample[2] . '</td><td>' . (int) $sample[3] . '</td></tr>';
		}
	}
	html_end_box();
}
if (doctor_can_configure()) {
	html_start_box(__('Warning exceptions', 'doctor'), '100%', false, 3, 'center', '');
	print '<tr><td>';
	form_start($page);
	print '<input type="hidden" name="action" value="accept">';
	print '<p><label for="doctor_check">' . html_escape(__('Check', 'doctor')) . '</label> <select name="check_id" id="doctor_check" style="max-width:100%">';
	foreach ($results as $r) {
		if ($fresh && $r['status'] === 'warn' && $r['assessment'] === 'assessed') {
			print '<option value="' . html_escape($r['id']) . '">' . html_escape($r['summary']) . '</option>';
		}
	}
	print '</select></p>';
	foreach (['owner' => __('Owner', 'doctor'), 'reason' => __('Reason', 'doctor'), 'expires' => __('Review date (UTC)', 'doctor')] as $name => $label) {
		print '<p><label for="doctor_' . $name . '">' . html_escape($label) . '</label><br><input style="width:100%;max-width:30em;box-sizing:border-box" required id="doctor_' . $name . '" name="' . $name . '" type="' . ($name === 'expires' ? 'date' : 'text') . '" maxlength="' . ($name === 'reason' ? 512 : 128) . '"></p>';
	}
	print '<button type="submit">' . html_escape(__('Accept warning', 'doctor')) . '</button>';
	form_end(false);
	print '</td></tr>';
	$known = [];
	foreach ($results as $r) {
		$known[$r['id']] = true;
	}
	foreach (doctor_acceptances() as $policy) {
		print '<tr><td>' . html_escape($policy['check_id'] . ': ' . $policy['owner'] . ' / ' . $policy['reason'] . ' / ' . gmdate('Y-m-d', $policy['expires']) . ' UTC') . ' ';
		if ($policy['expires'] <= time()) {
			print html_escape(__('Expired', 'doctor'));
		}
		if (!isset($known[$policy['check_id']])) {
			print ' ' . html_escape(__('Check not present in this report; verify its ID.', 'doctor'));
		}
		doctor_action_form($page, 'unaccept', ['check_id' => $policy['check_id']], __('Remove exception', 'doctor'));
		print '</td></tr>';
	}
	html_end_box();
	html_start_box(__('Audit history', 'doctor'), '100%', false, 3, 'center', '');
	html_header([__('Observation (UTC)', 'doctor'), __('Action', 'doctor'), __('Details', 'doctor')]);
	$auditRows = db_fetch_assoc('SELECT id, created, actor, action, payload FROM plugin_doctor_audit ORDER BY id DESC LIMIT 20', false);
	foreach (is_array($auditRows) ? $auditRows : [] as $audit) {
		print '<tr><td>' . html_escape(gmdate('Y-m-d H:i:s', $audit['created'])) . '</td><td>' . html_escape($audit['actor'] . ': ' . $audit['action']) . '</td><td><details><summary>#' . (int) $audit['id'] . '</summary><pre style="white-space:pre-wrap;overflow-wrap:anywhere">' . html_escape(doctor_redact($audit['payload'])) . '</pre></details></td></tr>';
	}
	html_end_box();
}
bottom_footer();
