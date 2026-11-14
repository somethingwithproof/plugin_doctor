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

/**
 * Only fixed Doctor CLI modes or validated binary probes call this helper.
 * exec replaces the POSIX shell so termination targets the actual worker.
 * PHP 5.4 cannot pass an argument array to proc_open().
 * @return array{code:int,stdout:string,stderr:string,error:string}
 */
function doctor_process($arguments, $seconds, $limit = 1048576) {
	$result = ['code' => -1, 'stdout' => '', 'stderr' => '', 'error' => ''];
	if (!function_exists('proc_open') || !function_exists('proc_terminate')) {
		$result['code'] = 1;
		$result['error'] = 'Process supervision is unavailable; enable proc_open and proc_terminate for the poller PHP runtime.';
		return $result;
	}
	$command = implode(' ', array_map('escapeshellarg', $arguments));
	if (DIRECTORY_SEPARATOR !== '\\') {
		$command = 'exec ' . $command;
	}
	$process = @proc_open($command, [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, null, null, ['bypass_shell' => true]); // nosemgrep: php.lang.security.exec-use.exec-use
	if (!is_resource($process)) {
		$result['code'] = 1;
		$result['error'] = 'Doctor could not start the supervised process.';
		return $result;
	}
	fclose($pipes[0]);
	stream_set_blocking($pipes[1], false);
	stream_set_blocking($pipes[2], false);
	$deadline = microtime(true) + $seconds;
	while (true) {
		foreach ([1 => 'stdout', 2 => 'stderr'] as $fd => $key) {
			$chunk = fread($pipes[$fd], 8192);
			if ($chunk === false) {
				$result['error'] = 'Doctor could not read the process output.';
				break;
			}
			$result[$key] .= $chunk;
		}
		$status = proc_get_status($process);
		if (strlen($result['stdout']) + strlen($result['stderr']) > $limit) {
			$result['error'] = 'Doctor process exceeded its output limit.';
		}
		if ($result['error'] !== '' || microtime(true) >= $deadline) {
			if ($result['error'] === '') {
				$result['error'] = 'Doctor process exceeded its ' . $seconds . '-second time limit.';
			}
			proc_terminate($process, 9);
			break;
		}
		if (!$status['running'] && feof($pipes[1]) && feof($pipes[2])) {
			if ($status['exitcode'] >= 0) {
				$result['code'] = $status['exitcode'];
			}
			break;
		}
		// Older PHP only reports the exit code once, even while output remains.
		if (!$status['running'] && $status['exitcode'] >= 0) {
			$result['code'] = $status['exitcode'];
		}
		usleep(10000);
	}
	fclose($pipes[1]);
	fclose($pipes[2]);
	$closed = proc_close($process);
	if ($result['code'] < 0 && $closed >= 0) {
		$result['code'] = $closed;
	}
	if ($result['error'] !== '') {
		$result['code'] = 1;
		$result['stdout'] = '';
		$result['stderr'] = '';
	}
	if ($result['code'] < 0) {
		$result['code'] = 1;
		$result['error'] = 'Doctor could not determine the supervised process exit status.';
	}
	return $result;
}

function doctor_schedule_lock_sql() {
	// Database-scoped, under MySQL's 64-byte named-lock limit; shared by collectors.
	return "CONCAT('doctor:', LEFT(SHA2(DATABASE(), 256), 56))";
}

/** Fail closed if a reconnect lost the session lock, including inside a write. */
function doctor_store_setting($name, $value) {
	if (!is_string($value) || strlen($value) > 4000) {
		throw new RuntimeException('Doctor state exceeds the supported settings size.');
	}
	if (empty($GLOBALS['doctor_schedule_lock_held'])) {
		set_config_option($name, $value);
		return;
	}
	$sql = 'INSERT INTO settings (name, value) SELECT ?, ? FROM DUAL WHERE IS_USED_LOCK(' . doctor_schedule_lock_sql() . ') = CONNECTION_ID() ON DUPLICATE KEY UPDATE value = VALUES(value)';
	if (!db_execute_prepared($sql, [$name, $value], false)
		|| (string) db_fetch_cell_prepared('SELECT value FROM settings WHERE name = ? AND IS_USED_LOCK(' . doctor_schedule_lock_sql() . ') = CONNECTION_ID()', [$name], '', false) !== $value) {
		throw new RuntimeException('Doctor could not confirm its state write or no longer owns the schedule lock.');
	}
}

/** @return array<string,mixed> */
function doctor_read_json_setting($name) {
	$text = read_config_option($name, true);
	if (!is_string($text) || strlen($text) > 4000) {
		return [];
	}
	$value = json_decode($text, true);
	return is_array($value) ? $value : [];
}

function doctor_schedule_interval() {
	$minutes = (string) read_config_option('doctor_schedule_interval', true);
	return in_array($minutes, ['15', '60', '360', '1440'], true) ? (int) $minutes * 60 : 3600;
}

/** @return array<string,mixed> */
function doctor_check_schedule($now) {
	if ((string) read_config_option('doctor_schedule_enabled', true) !== 'on') {
		return doctor_result('doctor.schedule', 'Doctor', 'pass', __('Scheduled report freshness', 'doctor'), __('Scheduled checks are disabled. Enable them in Settings > Doctor to retain samples and alert on changes.', 'doctor'), '', 'not_applicable');
	}
	$started = (int) read_config_option('doctor_last_started', true);
	$completed = (int) read_config_option('doctor_last_completed', true);
	$age = $now - $completed;
	$detail = __('Last started: %s; last completed: %s.', $started > 0 ? __('%s UTC', gmdate('Y-m-d H:i:s', $started), 'doctor') : __('never', 'doctor'), $completed > 0 ? __('%s UTC', gmdate('Y-m-d H:i:s', $completed), 'doctor') : __('never', 'doctor'), 'doctor');
	if ($completed <= 0 || $age < 0 || $age > doctor_schedule_interval() + 180 || ($started > $completed && $now - $started > 180)) {
		return doctor_result('doctor.schedule', 'Doctor', 'warn', __('Scheduled report freshness', 'doctor'), $detail . ' ' . __('Results are missing or stale. Check the primary poller and DOCTOR log for startup, timeout, or persistence errors.', 'doctor'), '', 'not_assessed');
	}
	return doctor_result('doctor.schedule', 'Doctor', 'pass', __('Scheduled report freshness', 'doctor'), $detail . ' ' . __('A completed diagnostic run is recent; this does not mean all checks passed.', 'doctor'));
}

/** Only compact transitions are retained, never logs, recipients, or credentials. */
function doctor_alert_pending() {
	$pending = doctor_read_json_setting('doctor_alert_pending');
	if ($pending === []) {
		return [];
	}
	if (!isset($pending['events'], $pending['attempts'], $pending['next']) || !is_array($pending['events']) || count($pending['events']) > 64
		|| !is_int($pending['attempts']) || $pending['attempts'] < 0 || $pending['attempts'] > 3 || !is_int($pending['next']) || $pending['next'] < 0) {
		throw new RuntimeException(__('Doctor alert state is invalid. Restore doctor_alert_pending from backup before retrying.', 'doctor'));
	}
	foreach ($pending['events'] as $id => $event) {
		if (!is_string($id) || !preg_match('/\A[a-z0-9_.]+\z/', $id) || !is_array($event) || count($event) !== 3
			|| !isset($event[0], $event[1], $event[2]) || !in_array($event[0], ['new', 'pass', 'warn', 'fail'], true)
			|| !in_array($event[1], ['pass', 'warn', 'fail'], true) || !is_int($event[2])) {
			throw new RuntimeException(__('Doctor alert transitions are invalid; no email was sent.', 'doctor'));
		}
	}
	return $pending;
}

function doctor_check_alert_delivery($now) {
	try {
		$pending = doctor_alert_pending();
	} catch (Exception $error) {
		return doctor_result('doctor.alert_delivery', 'Doctor', 'warn', __('Alert delivery', 'doctor'), $error->getMessage(), '', 'not_assessed');
	}
	if ($pending !== []) {
		$detail = __('%d check transitions await delivery; attempts: %d of 3.', count($pending['events']), $pending['attempts'], 'doctor');
		$detail .= ' ' . ($pending['attempts'] >= 3 ? __('Automatic retries exhausted. Correct Cacti mail settings, then run Doctor with --scheduled --retry-alerts as the poller user.', 'doctor') : __('Next eligible retry: %s UTC, after a primary poller cycle.', gmdate('Y-m-d H:i:s', $pending['next']), 'doctor'));
		if (trim((string) read_config_option('doctor_alert_emails', true)) === '') {
			$detail .= ' ' . __('No alert recipients are currently configured; pending transitions are retained.', 'doctor');
		}
		return doctor_result('doctor.alert_delivery', 'Doctor', 'warn', __('Alert delivery', 'doctor'), $detail);
	}
	return doctor_result('doctor.alert_delivery', 'Doctor', 'pass', __('Alert delivery', 'doctor'), __('No retained alert is awaiting delivery. Mail-server acceptance does not prove inbox delivery.', 'doctor'));
}

function doctor_retry_alerts($now, $retry = false) {
	$pending = doctor_alert_pending();
	$recipients = trim((string) read_config_option('doctor_alert_emails', true));
	if ($pending === [] || $recipients === '') {
		return;
	}
	if ($retry) {
		$pending['attempts'] = 0;
		$pending['next'] = $now;
	}
	if ($pending['attempts'] >= 3 || $pending['next'] > $now) {
		return;
	}
	// Record the attempt before network I/O: interruption cannot cause a retry storm.
	$pending['attempts']++;
	$pending['next'] = $now + 300 * pow(3, $pending['attempts'] - 1);
	doctor_store_setting('doctor_alert_pending', json_encode($pending));
	$lines = [__('Doctor retained status changes (UTC). Repeated changes for one check are coalesced; an out-and-back transition is retained.', 'doctor'), ''];
	foreach ($pending['events'] as $id => $event) {
		$lines[] = __('%s: %s -> %s (latest change %s)', $id, $event[0], $event[1], gmdate('Y-m-d H:i:s', $event[2]), 'doctor');
	}
	$lines[] = '';
	$lines[] = __('Open Utilities > Doctor for current measurements, recommended actions, and verification steps.', 'doctor');
	$error = send_mail($recipients, '', __('Cacti Doctor: %d retained status changes', count($pending['events']), 'doctor'), implode("\n", $lines));
	if ($error === '') {
		doctor_store_setting('doctor_alert_pending', '');
		doctor_store_setting('doctor_alert_last_success', (string) $now);
	} else {
		// Mailer errors can contain SMTP credentials or server responses.
		cacti_log('Doctor alert delivery failed; retained for a bounded retry. Check Cacti mail settings.', false, 'DOCTOR');
	}
}

/** Caller holds the schedule lock. Persist the outbox before acknowledging state. */
function doctor_run_scheduled($results, $now) {
	if (empty($GLOBALS['doctor_schedule_lock_held'])) {
		throw new RuntimeException('Doctor scheduled state can only be updated while holding its database lock.');
	}
	// Self-monitoring rows must not generate mail about their own pending mail.
	$tracked = array_values(array_filter($results, function ($result) {
		return !in_array($result['id'], ['doctor.schedule', 'doctor.alert_delivery'], true);
	}));
	$previous = doctor_state_decode(read_config_option('doctor_state', true));
	$changes = doctor_state_changes($previous, $tracked, (string) read_config_option('doctor_alert_warnings', true) === 'on');
	$pending = doctor_alert_pending();
	if ($changes !== [] && (trim((string) read_config_option('doctor_alert_emails', true)) !== '' || $pending !== [])) {
		if ($pending === []) {
			$pending = ['events' => [], 'attempts' => 0, 'next' => $now];
		}
		foreach ($changes as $change) {
			$id = $change['id'];
			$from = isset($pending['events'][$id]) ? $pending['events'][$id][0] : $change['from'];
			$pending['events'][$id] = [$from, $change['to'], $now];
		}
		if (count($pending['events']) > 64) {
			throw new RuntimeException('Doctor alert queue is full; retained state was not acknowledged.');
		}
		// New transitions renew the delivery budget, unchanged failures do not.
		$pending['attempts'] = 0;
		$pending['next'] = $now;
		doctor_store_setting('doctor_alert_pending', json_encode($pending));
	}
	doctor_store_setting('doctor_state', doctor_state_encode($tracked));
	doctor_store_setting('doctor_last_run', (string) $now);
	foreach ($changes as $change) {
		cacti_log('Doctor check ' . $change['id'] . ' changed from ' . $change['from'] . ' to ' . $change['to'], false, 'DOCTOR');
	}
	return $changes;
}

/** @return int CLI exit code; the supervisor bounds bootstrap, checks and mail. */
function doctor_scheduled_worker($dueOnly = false, $retry = false) {
	global $config;
	if (isset($config['poller_id']) && (int) $config['poller_id'] > 1) {
		cacti_log('Doctor scheduled checks run only on the primary poller.', false, 'DOCTOR');
		return 1;
	}
	if ((string) db_fetch_cell('SELECT GET_LOCK(' . doctor_schedule_lock_sql() . ', 0)', '', false) !== '1') {
		print __('Doctor schedule is already running or the database lock is unavailable.', 'doctor') . PHP_EOL;
		return 1;
	}
	$GLOBALS['doctor_schedule_lock_held'] = true;
	$exit = 0;
	try {
		$now = time();
		$completed = (int) read_config_option('doctor_last_completed', true);
		$runChecks = !$dueOnly || ($completed <= 0 || $now < $completed || $now - $completed >= doctor_schedule_interval());
		if ($dueOnly && (string) read_config_option('doctor_schedule_enabled', true) !== 'on') {
			$runChecks = false;
		}
		if ($runChecks) {
			doctor_store_setting('doctor_last_started', (string) $now);
			$sample = null;
			$previousSample = doctor_read_json_setting('doctor_database_sample');
			$results = doctor_run_checks($sample, $previousSample);
			$changes = doctor_run_scheduled($results, time());
			if (is_array($sample)) {
				doctor_store_setting('doctor_database_sample', json_encode($sample));
			}
			if (PHP_SAPI === 'cli' && function_exists('db_execute_prepared')) {
				doctor_store_setting('doctor_last_completed', (string) time());
			} else {
				set_config_option('doctor_last_completed', (string) time());
			}
			print count($changes) . ' checks changed status.' . PHP_EOL;
		}
		doctor_retry_alerts(time(), $retry);
	} catch (Exception $error) {
		cacti_log('Doctor scheduled run failed to complete; previous completion timestamp remains available. ' . doctor_redact($error->getMessage()), false, 'DOCTOR');
		$exit = 1;
	}
	db_fetch_cell('SELECT RELEASE_LOCK(' . doctor_schedule_lock_sql() . ')', '', false);
	$GLOBALS['doctor_schedule_lock_held'] = false;
	return $exit;
}

function doctor_poller_bottom() {
	global $config;
	if ((isset($config['poller_id']) && (int) $config['poller_id'] > 1) || (string) read_config_option('doctor_schedule_enabled', true) !== 'on') {
		return;
	}
	$now = time();
	$completed = (int) read_config_option('doctor_last_completed', true);
	$lastRun = (int) read_config_option('doctor_last_run', true);
	$due = $completed > 0
		? ($now < $completed || $now - $completed >= doctor_schedule_interval())
		: ($lastRun <= 0 || $now < $lastRun || $now - $lastRun >= doctor_schedule_interval());
	try {
		$pending = doctor_alert_pending();
		$due = $due || ($pending !== [] && $pending['attempts'] < 3 && $pending['next'] <= $now && trim((string) read_config_option('doctor_alert_emails', true)) !== '');
	} catch (Exception $error) {
		cacti_log($error->getMessage(), false, 'DOCTOR');
	}
	// A launch is not evidence of completion. The worker lock handles concurrent hooks.
	$launched = (int) read_config_option('doctor_last_launch', true);
	if (!$due || ($launched > $now || $now - $launched < 180)) {
		return;
	}
	$php = (string) read_config_option('path_php_binary', true);
	$refusal = doctor_binary_execution_refusal('path_php_binary', $php, doctor_running_as_root());
	if ($refusal !== '') {
		cacti_log('Doctor scheduled checks skipped: ' . $refusal, false, 'DOCTOR');
		return;
	}
	set_config_option('doctor_last_launch', (string) $now);
	set_config_option('doctor_last_run', (string) $now);
	exec_background($php, '-q ' . cacti_escapeshellarg($config['base_path'] . '/plugins/doctor/cli/doctor.php') . ' --scheduled --due'); // nosemgrep: php.lang.security.exec-use.exec-use
}
