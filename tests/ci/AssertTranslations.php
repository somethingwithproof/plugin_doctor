<?php
// SPDX-License-Identifier: GPL-2.0-or-later
// SPDX-FileCopyrightText: 2026 Thomas Vincent

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

/*
 * Runs from the Cacti root against an installed Cacti with Doctor enabled and
 * i18n_language_support turned on. Selects a language the way a user's session
 * remembers it, lets Cacti's own loader pick up the plugin's
 * compiled catalog, and checks that Doctor's real check results carry the
 * translation from that locale's .po file. Must parse on PHP 5.4.
 *
 *   php plugins/doctor/tests/ci/AssertTranslations.php LOCALE
 *   php plugins/doctor/tests/ci/AssertTranslations.php en-US
 *
 * en-US asserts the English text is unchanged. Exits 0 on success.
 */

if ($argc < 2 || !preg_match('/\A[a-z]{2}-[A-Za-z0-9]{2,4}\z/', $argv[1])) {
	fwrite(STDERR, 'Usage: php AssertTranslations.php LOCALE' . PHP_EOL);
	exit(2);
}

$locale  = $argv[1];
$catalog = dirname(dirname(dirname(__FILE__))) . '/locales/po/' . $locale . '.po';

if ($locale !== 'en-US' && !is_file($catalog)) {
	fwrite(STDERR, 'No catalog ' . $catalog . PHP_EOL);
	exit(2);
}

// Cacti refuses CLI scripts with request variables, so select the language the
// way the web UI remembers it after ?language=<locale>: in the user's session.
// Cacti's own loader then resolves the plugin catalog under locales/LC_MESSAGES.
$_SESSION['sess_user_language'] = $locale;

chdir(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
include_once './include/cli_check.php';
include_once './plugins/doctor/doctor_functions.php';

/** Decode one msgstr for a msgid from a .po file written by msgmerge --no-wrap. */
function doctor_test_translation($catalog, $msgid) {
	$contents = (string) file_get_contents($catalog);
	$pattern  = '/^msgid "' . preg_quote(addcslashes($msgid, "\"\\"), '/') . '"\nmsgstr "((?:[^"\\\\]|\\\\.)*)"/m';

	return preg_match($pattern, $contents, $match) ? stripcslashes($match[1]) : '';
}

$failures = 0;

function doctor_test_assert($label, $actual, $expected) {
	global $failures;

	if ($actual !== $expected) {
		$failures++;
		fwrite(STDERR, 'FAIL ' . $label . ': got "' . $actual . '", expected "' . $expected . '"' . PHP_EOL);
	}
}

$loaded = defined('CACTI_LOCALE') ? CACTI_LOCALE : '';
doctor_test_assert('Cacti selected the requested locale', $loaded, $locale);

$result = doctor_check_privileges(false);

if ($locale === 'en-US') {
	doctor_test_assert('summary stays English', $result['summary'], 'Doctor privileges');
	doctor_test_assert('detail stays English', $result['detail'], 'Doctor is running without root privileges.');
	doctor_test_assert('category stays English', $result['category'], 'Doctor');
	doctor_test_assert('status label stays English', doctor_status_label('pass'), 'PASS');
} else {
	foreach ([['Doctor privileges', $result['summary']], ['Doctor is running without root privileges.', $result['detail']]] as $pair) {
		$expected = doctor_test_translation($catalog, $pair[0]);

		if ($expected === '' || $expected === $pair[0]) {
			$failures++;
			fwrite(STDERR, 'FAIL no translation of "' . $pair[0] . '" in ' . $catalog . PHP_EOL);
		}

		doctor_test_assert('check text "' . $pair[0] . '"', $pair[1], $expected);
	}

	$format = doctor_test_translation($catalog, 'Installation health: %d passed, %d warnings, %d failed');
	doctor_test_assert('formatted text', __('Installation health: %d passed, %d warnings, %d failed', 1, 2, 3, 'doctor'), sprintf($format, 1, 2, 3));
	doctor_test_assert('status label', doctor_status_label('fail'), doctor_test_translation($catalog, 'FAIL'));

	// Machine-readable fields do not follow the language.
	doctor_test_assert('check id', $result['id'], 'doctor.privileges');
	doctor_test_assert('category stays English', $result['category'], 'Doctor');
	doctor_test_assert('category label', doctor_category_label('Doctor'), doctor_test_translation($catalog, 'Doctor'));
	$nagios = doctor_format_nagios(array($result));
	doctor_test_assert('Nagios keywords', substr($nagios['text'], 0, 12), 'DOCTOR OK - ');
}

if ($failures > 0) {
	exit(1);
}

echo 'ok ' . $locale . PHP_EOL;
