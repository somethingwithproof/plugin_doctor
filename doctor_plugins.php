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

define('DOCTOR_PLUGIN_MAX_CHECKS_PER_PLUGIN', 32);
define('DOCTOR_PLUGIN_MAX_CHECKS_TOTAL', 64);
define('DOCTOR_PLUGIN_MAX_ATTACHMENTS_PER_PLUGIN', 8);
define('DOCTOR_PLUGIN_MAX_ATTACHMENTS_TOTAL', 32);
define('DOCTOR_PLUGIN_MAX_ATTACHMENT_BYTES', 65536);
define('DOCTOR_PLUGIN_MAX_DEBUG_SECTIONS_PER_PLUGIN', 8);
define('DOCTOR_PLUGIN_MAX_DEBUG_SECTIONS_TOTAL', 32);
define('DOCTOR_PLUGIN_MAX_DEBUG_FIELDS_PER_SECTION', 64);
define('DOCTOR_PLUGIN_MAX_DEBUG_VALUE_BYTES', 2048);
define('DOCTOR_PLUGIN_SECRET_KEY_PATTERN', '/(?:authorization|password|passwd|passphrase|pass|secret|token|community|api[_-]?key|auth[_-]?key|priv(?:ate)?[_-]?key)/i');

/**
 * Resolve a hook file strictly inside a plugin's directory.
 *
 * @param string $plugin
 * @param string $file
 * @return string|false
 */
function doctor_plugin_file($plugin, $file) {
	if (!is_string($plugin) || !is_string($file) || $plugin === '' || $file === '') {
		return false;
	}

	if (!preg_match('/\A[a-z0-9_]{1,64}\z/', $plugin) || strpos($file, '..') !== false || strpos($file, '\\') !== false || $file[0] === '/') {
		return false;
	}

	if (function_exists('cacti_plugin_path')) {
		$path = cacti_plugin_path($plugin, $file);
		return is_string($path) && is_file($path) ? $path : false;
	}

	$pluginsDir = defined('CACTI_PATH_PLUGINS') ? (string) CACTI_PATH_PLUGINS : doctor_base_path() . '/plugins';
	$pluginRoot = realpath($pluginsDir . '/' . $plugin);
	$candidate  = realpath($pluginsDir . '/' . $plugin . '/' . $file);

	if ($pluginRoot === false || $candidate === false || !is_file($candidate)) {
		return false;
	}

	$prefix = rtrim($pluginRoot, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
	if (strpos($candidate, $prefix) !== 0) {
		return false;
	}

	return $candidate;
}

/**
 * Validate and normalize plugin check details. Accepts a string or a scalar/nested array.
 *
 * @param mixed $details
 * @return array{valid:bool,value:mixed,text:string}
 */
function doctor_normalize_plugin_details($details) {
	if (is_string($details)) {
		if (strlen($details) > 8192) {
			return ['valid' => false, 'value' => '', 'text' => ''];
		}

		$trimmed = trim($details);
		return ['valid' => true, 'value' => $trimmed, 'text' => $trimmed];
	}

	if (is_array($details)) {
		if (!doctor_plugin_details_scalar_tree($details, 0)) {
			return ['valid' => false, 'value' => [], 'text' => ''];
		}

		$encoded = json_encode($details);
		if (!is_string($encoded) || strlen($encoded) > 16384) {
			return ['valid' => false, 'value' => [], 'text' => ''];
		}

		return ['valid' => true, 'value' => $details, 'text' => $details === [] ? '' : $encoded];
	}

	return ['valid' => false, 'value' => '', 'text' => ''];
}

/**
 * Reject objects, resources, and deeply nested structures in plugin check details.
 *
 * @param array<mixed> $value
 * @param int $depth
 * @return bool
 */
function doctor_plugin_details_scalar_tree($value, $depth) {
	if ($depth > 4) {
		return false;
	}

	foreach ($value as $item) {
		if (is_array($item)) {
			if (!doctor_plugin_details_scalar_tree($item, $depth + 1)) {
				return false;
			}
		} elseif ($item !== null && !is_scalar($item)) {
			return false;
		}
	}

	return true;
}

/**
 * Validate one check descriptor returned by a doctor_register_checks hook.
 *
 * Required keys: id, plugin, category, title, status (ok|warn|fail|info),
 * message, details, remediation.
 *
 * @param mixed $descriptor
 * @param string $expectedPlugin
 * @return array<string,mixed>|null
 */
function doctor_validate_plugin_check($descriptor, $expectedPlugin) {
	if (!is_array($descriptor)) {
		return null;
	}

	$required = ['id', 'plugin', 'category', 'title', 'status', 'message', 'details', 'remediation'];
	foreach ($required as $key) {
		if (!array_key_exists($key, $descriptor)) {
			return null;
		}
	}

	foreach (['id', 'plugin', 'category', 'title', 'status', 'message', 'remediation'] as $key) {
		if (!is_string($descriptor[$key])) {
			return null;
		}
	}

	$plugin      = trim($descriptor['plugin']);
	$id          = trim($descriptor['id']);
	$category    = trim($descriptor['category']);
	$title       = trim($descriptor['title']);
	$status      = trim($descriptor['status']);
	$message     = trim($descriptor['message']);
	$remediation = trim($descriptor['remediation']);

	if ($plugin === '' || $plugin !== $expectedPlugin || !preg_match('/\A[a-z0-9_]{1,64}\z/', $plugin)) {
		return null;
	}

	if ($id === '' || !preg_match('/\A[a-z0-9_.]{1,128}\z/', $id) || strpos($id, $plugin . '.') !== 0) {
		return null;
	}

	if ($category === '' || strlen($category) > 64 || preg_match('/[\x00-\x1f\x7f]/', $category)) {
		return null;
	}

	if ($title === '' || strlen($title) > 256 || preg_match('/[\x00-\x1f\x7f]/', $title)) {
		return null;
	}

	if (!in_array($status, ['ok', 'warn', 'fail', 'info'], true)) {
		return null;
	}

	if ($message === '' || strlen($message) > 2048) {
		return null;
	}

	if (strlen($remediation) > 2048) {
		return null;
	}

	$details = doctor_normalize_plugin_details($descriptor['details']);
	if (!$details['valid']) {
		return null;
	}

	$mappedStatus = $status === 'ok' ? 'pass' : $status;
	$detailParts  = [$message];
	if ($details['text'] !== '') {
		$detailParts[] = $details['text'];
	}
	if ($remediation !== '') {
		$detailParts[] = 'Remediation: ' . $remediation;
	}

	$result = doctor_result(
		$id,
		$category,
		$mappedStatus,
		doctor_redact($title),
		doctor_redact(implode(' ', $detailParts)),
		'',
		'assessed'
	);
	$result['plugin']        = $plugin;
	$result['plugin_status'] = $status;
	$result['title']         = doctor_redact($title);
	$result['message']       = doctor_redact($message);
	$result['details']       = doctor_redact_plugin_details($details['value']);
	$result['remediation']   = $remediation !== '' ? doctor_redact($remediation) : '';

	return $result;
}

/**
 * Recursively redact string values inside plugin check details, including
 * sensitive key-value pairs in associative arrays.
 *
 * @param mixed $value
 * @return mixed
 */
function doctor_redact_plugin_details($value) {
	if (is_string($value)) {
		return doctor_redact($value);
	}

	if (!is_array($value)) {
		return $value;
	}

	$sanitized = [];

	foreach ($value as $key => $item) {
		if (is_string($key) && preg_match(DOCTOR_PLUGIN_SECRET_KEY_PATTERN, $key)) {
			$sanitized[$key] = '[redacted]';
		} else {
			$sanitized[$key] = doctor_redact_plugin_details($item);
		}
	}

	return $sanitized;
}

/**
 * Validate one optional support-bundle attachment returned by a plugin hook.
 *
 * @param mixed $attachment
 * @param string $plugin
 * @return array{plugin:string,title:string,content:string}|null
 */
function doctor_validate_plugin_attachment($attachment, $plugin) {
	if (!is_array($attachment) || !isset($attachment['title'], $attachment['content'])
		|| !is_string($attachment['title']) || !is_string($attachment['content'])) {
		return null;
	}

	$title   = trim($attachment['title']);
	$content = $attachment['content'];

	if ($title === '' || strlen($title) > 128 || preg_match('/[\x00-\x1f\x7f]/', $title)) {
		return null;
	}

	if (strlen($content) > DOCTOR_PLUGIN_MAX_ATTACHMENT_BYTES) {
		return null;
	}

	return [
		'plugin'  => $plugin,
		'title'   => $title,
		'content' => $content
	];
}

/**
 * Invoke enabled plugins registered on the doctor_register_checks hook.
 *
 * Each plugin executes inside its own fault-isolation boundary so a broken or
 * throwing plugin never disrupts core Doctor checks or other plugins.
 *
 * @param array<int,string> $existingIds
 * @param string $mode
 * @return array{checks:array<int,array<string,mixed>>,attachments:array<int,array{plugin:string,title:string,content:string}>}
 */
function doctor_collect_plugin_extensions($existingIds = [], $mode = 'run') {
	global $plugins_integrated;

	$checks      = [];
	$attachments = [];
	$seenIds     = [];

	foreach ($existingIds as $existingId) {
		if (is_string($existingId) && $existingId !== '') {
			$seenIds[$existingId] = true;
		}
	}

	if (!function_exists('db_fetch_assoc_prepared')) {
		return ['checks' => $checks, 'attachments' => $attachments];
	}

	$hooks = db_fetch_assoc_prepared(
		'SELECT name, file, function FROM plugin_hooks WHERE hook = ? AND status = 1 ORDER BY name, function',
		['doctor_register_checks'],
		false
	);

	if (!is_array($hooks)) {
		return ['checks' => $checks, 'attachments' => $attachments];
	}

	$integrated = is_array($plugins_integrated) ? $plugins_integrated : [];

	foreach ($hooks as $hook) {
		if (!is_array($hook) || !isset($hook['name'], $hook['file'], $hook['function'])
			|| !is_string($hook['name']) || !is_string($hook['file']) || !is_string($hook['function'])) {
			continue;
		}

		$plugin   = trim($hook['name']);
		$file     = $hook['file'];
		$function = trim($hook['function']);

		if ($plugin === '' || $function === '' || in_array($plugin, ['doctor', 'cacti'], true)) {
			continue;
		}

		if (!preg_match('/\A[a-z0-9_]{1,64}\z/', $plugin)
			|| $file === ''
			|| strpos($file, '..') !== false
			|| strpos($file, '\\') !== false
			|| $file[0] === '/') {
			continue;
		}

		if (in_array($plugin, $integrated, true) || (function_exists('api_plugin_is_enabled') && !api_plugin_is_enabled($plugin))) {
			continue;
		}

		if (count($checks) >= DOCTOR_PLUGIN_MAX_CHECKS_TOTAL) {
			break;
		}

		$pluginChecks      = [];
		$pluginAttachments = [];
		$failed            = false;
		$errorMessage      = '';

		try {
			$path = doctor_plugin_file($plugin, $file);
			if ($path !== false) {
				include_once $path;
			}

			if (!function_exists($function)) {
				continue;
			}

			$payload = call_user_func($function, ['mode' => (string) $mode, 'plugin' => $plugin]);

			if (!is_array($payload)) {
				$failed       = true;
				$errorMessage = 'hook returned a non-array payload';
			} else {
				$rawChecks      = isset($payload['checks']) && is_array($payload['checks']) ? $payload['checks'] : $payload;
				$rawAttachments = isset($payload['attachments']) && is_array($payload['attachments']) ? $payload['attachments'] : [];

				// Avoid treating the associative envelope keys themselves as check descriptors.
				if (isset($payload['attachments']) && !isset($payload['checks'])) {
					$rawChecks = [];
				}

				$rejected = 0;
				foreach ($rawChecks as $descriptor) {
					if (count($pluginChecks) >= DOCTOR_PLUGIN_MAX_CHECKS_PER_PLUGIN
						|| count($checks) + count($pluginChecks) >= DOCTOR_PLUGIN_MAX_CHECKS_TOTAL) {
						break;
					}

					$validated = doctor_validate_plugin_check($descriptor, $plugin);
					if ($validated === null || isset($seenIds[$validated['id']])) {
						$rejected++;
						continue;
					}

					$seenIds[$validated['id']] = true;
					$pluginChecks[]            = $validated;
				}

				if ($rejected > 0) {
					cacti_log('Doctor rejected ' . $rejected . ' invalid plugin check descriptor(s) from ' . $plugin, false, 'DOCTOR');
				}

				foreach ($rawAttachments as $rawAttachment) {
					if (count($pluginAttachments) >= DOCTOR_PLUGIN_MAX_ATTACHMENTS_PER_PLUGIN
						|| count($attachments) + count($pluginAttachments) >= DOCTOR_PLUGIN_MAX_ATTACHMENTS_TOTAL) {
						break;
					}

					$validatedAttachment = doctor_validate_plugin_attachment($rawAttachment, $plugin);
					if ($validatedAttachment !== null) {
						$pluginAttachments[] = $validatedAttachment;
					}
				}
			}
		} catch (Exception $error) {
			$failed       = true;
			$errorMessage = doctor_redact($error->getMessage());
		} catch (Throwable $error) {
			$failed       = true;
			$errorMessage = doctor_redact($error->getMessage());
		}

		if ($failed) {
			cacti_log('Doctor plugin check hook failed for ' . $plugin . ': ' . $errorMessage, false, 'DOCTOR');
			continue;
		}

		foreach ($pluginChecks as $check) {
			$checks[] = $check;
		}
		foreach ($pluginAttachments as $attachment) {
			$attachments[] = $attachment;
		}
	}

	return ['checks' => $checks, 'attachments' => $attachments];
}

/**
 * Run enabled doctor_register_checks hooks and return validated check results.
 *
 * @param array<int,string> $existingIds
 * @param array<int,array{plugin:string,title:string,content:string}> $attachments
 * @return array<int,array<string,mixed>>
 */
function doctor_run_plugin_checks($existingIds = [], &$attachments = []) {
	$extensions  = doctor_collect_plugin_extensions($existingIds, 'run');
	$attachments = $extensions['attachments'];

	return $extensions['checks'];
}

/**
 * Validate and sanitize one debug-info section returned by a
 * doctor_register_debug_info hook.
 *
 * Modeled after the WordPress Site Health Debug Info API: each section has an
 * id prefixed by the plugin slug, a label, optional description and private
 * flag, and a bounded map of fields. Field keys matching the secret key pattern
 * are replaced with '[redacted]' and all string values are passed through
 * doctor_redact().
 *
 * @param mixed $section
 * @param string $expectedPlugin
 * @return array{id:string,plugin:string,label:string,description:string,private:bool,fields:array<string,array{label:string,value:mixed,private:bool,debug?:mixed}>}|null
 */
function doctor_validate_plugin_debug_info($section, $expectedPlugin) {
	if (!is_array($section)) {
		return null;
	}

	foreach (['id', 'plugin', 'label', 'fields'] as $key) {
		if (!array_key_exists($key, $section)) {
			return null;
		}
	}

	if (!is_string($section['id']) || !is_string($section['plugin']) || !is_string($section['label']) || !is_array($section['fields'])) {
		return null;
	}

	$plugin = trim($section['plugin']);
	$id     = trim($section['id']);
	$label  = trim($section['label']);

	if ($plugin === '' || $plugin !== $expectedPlugin || !preg_match('/\A[a-z0-9_]{1,64}\z/', $plugin)) {
		return null;
	}

	if ($id === '' || !preg_match('/\A[a-z0-9_.]{1,128}\z/', $id) || strpos($id, $plugin . '.') !== 0) {
		return null;
	}

	if ($label === '' || strlen($label) > 128 || preg_match('/[\x00-\x1f\x7f]/', $label)) {
		return null;
	}

	$description = '';
	if (array_key_exists('description', $section)) {
		if (!is_string($section['description'])) {
			return null;
		}
		$description = trim($section['description']);
		if (strlen($description) > 512 || preg_match('/[\x00-\x1f\x7f]/', $description)) {
			return null;
		}
	}

	$sectionPrivate = false;
	if (array_key_exists('private', $section)) {
		if (!is_bool($section['private'])) {
			return null;
		}
		$sectionPrivate = $section['private'];
	}

	$fields = [];
	foreach ($section['fields'] as $fieldKey => $fieldSpec) {
		if (count($fields) >= DOCTOR_PLUGIN_MAX_DEBUG_FIELDS_PER_SECTION) {
			break;
		}

		if (!is_string($fieldKey) || !preg_match('/\A[a-zA-Z0-9_.-]{1,128}\z/', $fieldKey)) {
			continue;
		}

		if (!is_array($fieldSpec) || !isset($fieldSpec['label']) || !is_string($fieldSpec['label']) || !array_key_exists('value', $fieldSpec)) {
			continue;
		}

		$fieldLabel = trim($fieldSpec['label']);
		if ($fieldLabel === '' || strlen($fieldLabel) > 128 || preg_match('/[\x00-\x1f\x7f]/', $fieldLabel)) {
			continue;
		}

		$rawValue = $fieldSpec['value'];
		if ($rawValue !== null && !is_scalar($rawValue)) {
			continue;
		}
		if (is_string($rawValue) && strlen($rawValue) > DOCTOR_PLUGIN_MAX_DEBUG_VALUE_BYTES) {
			continue;
		}

		$fieldPrivate = false;
		if (array_key_exists('private', $fieldSpec)) {
			if (!is_bool($fieldSpec['private'])) {
				continue;
			}
			$fieldPrivate = $fieldSpec['private'];
		}

		$hasDebug = array_key_exists('debug', $fieldSpec);
		$rawDebug = null;
		if ($hasDebug) {
			$rawDebug = $fieldSpec['debug'];
			if ($rawDebug !== null && !is_scalar($rawDebug)) {
				continue;
			}
			if (is_string($rawDebug) && strlen($rawDebug) > DOCTOR_PLUGIN_MAX_DEBUG_VALUE_BYTES) {
				continue;
			}
		}

		$isSecretKey = preg_match(DOCTOR_PLUGIN_SECRET_KEY_PATTERN, $fieldKey) === 1;
		if ($isSecretKey) {
			$value = '[redacted]';
			$debug = $hasDebug ? '[redacted]' : null;
		} else {
			$value = is_string($rawValue) ? doctor_redact($rawValue) : $rawValue;
			$debug = ($hasDebug && is_string($rawDebug)) ? doctor_redact($rawDebug) : $rawDebug;
		}

		$entry = [
			'label'   => doctor_redact($fieldLabel),
			'value'   => $value,
			'private' => $fieldPrivate
		];
		if ($hasDebug) {
			$entry['debug'] = $debug;
		}

		$fields[$fieldKey] = $entry;
	}

	return [
		'id'          => $id,
		'plugin'      => $plugin,
		'label'       => doctor_redact($label),
		'description' => $description !== '' ? doctor_redact($description) : '',
		'private'     => $sectionPrivate,
		'fields'      => $fields
	];
}

/**
 * Mask private debug-info sections and fields as '[private]' for redacted or
 * shareable outputs such as support bundles and CLI debug exports.
 *
 * @param array<int,array<string,mixed>> $sections
 * @return array<int,array<string,mixed>>
 */
function doctor_redact_debug_info($sections) {
	if (!is_array($sections)) {
		return [];
	}

	$masked = [];
	foreach ($sections as $section) {
		if (!is_array($section)) {
			continue;
		}

		$sectionPrivate = !empty($section['private']);
		$fields         = isset($section['fields']) && is_array($section['fields']) ? $section['fields'] : [];
		$maskedFields   = [];

		foreach ($fields as $key => $field) {
			if (!is_array($field)) {
				continue;
			}
			$fieldPrivate = $sectionPrivate || !empty($field['private']);
			if ($fieldPrivate) {
				$field['value'] = '[private]';
				if (array_key_exists('debug', $field)) {
					$field['debug'] = '[private]';
				}
			} elseif (isset($field['value']) && is_string($field['value'])) {
				$field['value'] = doctor_redact($field['value']);
				if (isset($field['debug']) && is_string($field['debug'])) {
					$field['debug'] = doctor_redact($field['debug']);
				}
			}
			$maskedFields[$key] = $field;
		}

		$section['fields'] = $maskedFields;
		$masked[]          = $section;
	}

	return $masked;
}

/**
 * Format plugin debug-info sections as redacted plain text for CLI output and
 * support bundles.
 *
 * @param array<int,array<string,mixed>> $sections
 * @return string
 */
function doctor_format_debug_info($sections) {
	$redacted = doctor_redact_debug_info($sections);
	$lines    = [];

	foreach ($redacted as $section) {
		if (!isset($section['plugin'], $section['label'], $section['id'])) {
			continue;
		}
		$lines[] = '--- [' . (string) $section['plugin'] . '] ' . (string) $section['label'] . ' (' . (string) $section['id'] . ')';
		if (isset($section['description']) && is_string($section['description']) && $section['description'] !== '') {
			$lines[] = $section['description'];
		}
		$fields = isset($section['fields']) && is_array($section['fields']) ? $section['fields'] : [];
		foreach ($fields as $key => $field) {
			if (!is_array($field) || !isset($field['label']) || !array_key_exists('value', $field)) {
				continue;
			}
			$val = $field['value'];
			if (is_bool($val)) {
				$valText = $val ? 'true' : 'false';
			} elseif ($val === null) {
				$valText = 'null';
			} else {
				$valText = (string) $val;
			}
			$lines[] = (string) $field['label'] . ' (' . (string) $key . '): ' . $valText;
		}
	}

	return implode("\n", $lines);
}

/**
 * Invoke enabled plugins registered on the doctor_register_debug_info hook and
 * return validated, secret-redacted debug-info sections.
 *
 * Enforces the same fault-isolation, plugin allow-list, file-path containment,
 * and bounding invariants as doctor_collect_plugin_extensions().
 *
 * @return array<int,array{id:string,plugin:string,label:string,description:string,private:bool,fields:array<string,array{label:string,value:mixed,private:bool,debug?:mixed}>}>
 */
function doctor_collect_plugin_debug_info() {
	global $plugins_integrated;

	$sections = [];
	$seenIds  = [];

	if (!function_exists('db_fetch_assoc_prepared')) {
		return $sections;
	}

	$hooks = db_fetch_assoc_prepared(
		'SELECT name, file, function FROM plugin_hooks WHERE hook = ? AND status = 1 ORDER BY name, function',
		['doctor_register_debug_info'],
		false
	);

	if (!is_array($hooks)) {
		return $sections;
	}

	$integrated = is_array($plugins_integrated) ? $plugins_integrated : [];

	foreach ($hooks as $hook) {
		if (!is_array($hook) || !isset($hook['name'], $hook['file'], $hook['function'])
			|| !is_string($hook['name']) || !is_string($hook['file']) || !is_string($hook['function'])) {
			continue;
		}

		$plugin   = trim($hook['name']);
		$file     = $hook['file'];
		$function = trim($hook['function']);

		if ($plugin === '' || $function === '' || in_array($plugin, ['doctor', 'cacti'], true)) {
			continue;
		}

		if (!preg_match('/\A[a-z0-9_]{1,64}\z/', $plugin)
			|| $file === ''
			|| strpos($file, '..') !== false
			|| strpos($file, '\\') !== false
			|| $file[0] === '/') {
			continue;
		}

		if (in_array($plugin, $integrated, true) || (function_exists('api_plugin_is_enabled') && !api_plugin_is_enabled($plugin))) {
			continue;
		}

		if (count($sections) >= DOCTOR_PLUGIN_MAX_DEBUG_SECTIONS_TOTAL) {
			break;
		}

		$pluginSections = [];
		$failed         = false;
		$errorMessage   = '';

		try {
			$path = doctor_plugin_file($plugin, $file);
			if ($path !== false) {
				include_once $path;
			}

			if (!function_exists($function)) {
				continue;
			}

			$payload = call_user_func($function, ['plugin' => $plugin]);

			if (!is_array($payload)) {
				$failed       = true;
				$errorMessage = 'hook returned a non-array payload';
			} else {
				$rawSections = isset($payload['sections']) && is_array($payload['sections']) ? $payload['sections'] : $payload;
				$rejected    = 0;

				foreach ($rawSections as $rawSection) {
					if (count($pluginSections) >= DOCTOR_PLUGIN_MAX_DEBUG_SECTIONS_PER_PLUGIN
						|| count($sections) + count($pluginSections) >= DOCTOR_PLUGIN_MAX_DEBUG_SECTIONS_TOTAL) {
						break;
					}

					$validated = doctor_validate_plugin_debug_info($rawSection, $plugin);
					if ($validated === null || isset($seenIds[$validated['id']])) {
						$rejected++;
						continue;
					}

					$seenIds[$validated['id']] = true;
					$pluginSections[]          = $validated;
				}

				if ($rejected > 0) {
					cacti_log('Doctor rejected ' . $rejected . ' invalid plugin debug info section(s) from ' . $plugin, false, 'DOCTOR');
				}
			}
		} catch (Exception $error) {
			$failed       = true;
			$errorMessage = doctor_redact($error->getMessage());
		} catch (Throwable $error) {
			$failed       = true;
			$errorMessage = doctor_redact($error->getMessage());
		}

		if ($failed) {
			cacti_log('Doctor plugin debug info hook failed for ' . $plugin . ': ' . $errorMessage, false, 'DOCTOR');
			continue;
		}

		foreach ($pluginSections as $section) {
			$sections[] = $section;
		}
	}

	return $sections;
}
