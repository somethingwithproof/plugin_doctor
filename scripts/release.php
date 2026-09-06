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

if (PHP_SAPI !== 'cli') {
	exit(1);
}

function doctor_release_fail($message) {
	fwrite(STDERR, $message . PHP_EOL);
	exit(1);
}

function doctor_release_is_semver($version) {
	$identifier = '(?:0|[1-9][0-9]*|[0-9]*[A-Za-z-][0-9A-Za-z-]*)';
	return preg_match('/^(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)\.(0|[1-9][0-9]*)(?:-' . $identifier . '(?:\.' . $identifier . ')*)?(?:\+[0-9A-Za-z-]+(?:\.[0-9A-Za-z-]+)*)?$/D', $version) === 1;
}

function doctor_release_version($root) {
	$info = parse_ini_file($root . '/INFO', true);

	if ($info === false) {
		doctor_release_fail('INFO could not be parsed.');
	}

	if (!isset($info['info']) || !isset($info['info']['version'])) {
		doctor_release_fail('INFO does not contain info.version.');
	}

	$version = (string) $info['info']['version'];

	if (!doctor_release_is_semver($version)) {
		doctor_release_fail('INFO version is not valid SemVer: ' . $version);
	}
	if (strpos($version, '+') !== false) {
		doctor_release_fail('INFO version must not contain SemVer build metadata because GitHub rewrites + in asset names: ' . $version);
	}

	return $version;
}

function doctor_release_changelog_section($root, $version) {
	$contents = file_get_contents($root . '/CHANGELOG.md');

	if (!is_string($contents)) {
		doctor_release_fail('CHANGELOG.md could not be read.');
	}
	$contents = str_replace("\r\n", "\n", $contents);

	$headingPattern = '/^## ' . preg_quote($version, '/') . ' - [^\n]*$/m';
	if (preg_match($headingPattern, $contents, $headingMatch, PREG_OFFSET_CAPTURE) !== 1) {
		doctor_release_fail('CHANGELOG.md has no release heading for ' . $version . '.');
	}
	$start = $headingMatch[0][1];

	$lineEnd = strpos($contents, "\n", $start);
	if ($lineEnd === false) {
		doctor_release_fail('The changelog release heading has no body.');
	}

	$headingLine = substr($contents, $start, $lineEnd - $start);
	if (preg_match('/^## ' . preg_quote($version, '/') . ' - [0-9]{4}-[0-9]{2}-[0-9]{2}$/D', $headingLine) !== 1) {
		doctor_release_fail('The changelog heading must use: ## ' . $version . ' - YYYY-MM-DD');
	}

	$date      = substr($headingLine, -10);
	$dateParts = explode('-', $date);
	if (count($dateParts) !== 3 || !checkdate((int) $dateParts[1], (int) $dateParts[2], (int) $dateParts[0])) {
		doctor_release_fail('The changelog heading contains an invalid release date: ' . $date);
	}

	$bodyStart = $lineEnd + 1;
	$next      = false;
	$scan      = $bodyStart;
	$fence     = '';
	$fenceSize = 0;
	while ($scan < strlen($contents)) {
		$scanEnd = strpos($contents, "\n", $scan);
		if ($scanEnd === false) {
			$scanEnd = strlen($contents);
		}
		$scanLine = substr($contents, $scan, $scanEnd - $scan);
		if ($fence === '') {
			if (preg_match('/^ {0,3}(`{3,}|~{3,})/', $scanLine, $fenceMatch) === 1) {
				$fence     = substr($fenceMatch[1], 0, 1);
				$fenceSize = strlen($fenceMatch[1]);
			} elseif (strpos($scanLine, '## ') === 0) {
				$next = $scan;
				break;
			}
		} else {
			$closingFence = '/^ {0,3}' . preg_quote($fence, '/') . '{' . $fenceSize . ',}[ \t]*$/';
			if (preg_match($closingFence, $scanLine) === 1) {
				$fence = '';
			}
		}
		$scan = $scanEnd + 1;
	}
	$body      = $next === false ? substr($contents, $bodyStart) : substr($contents, $bodyStart, $next - $bodyStart);
	$body      = trim($body);

	if ($body === '') {
		doctor_release_fail('The changelog section for ' . $version . ' is empty.');
	}

	return $body;
}

$rootOverride = getenv('DOCTOR_RELEASE_ROOT');
$root         = $rootOverride === false || $rootOverride === '' ? dirname(__DIR__) : $rootOverride;
$command = isset($argv[1]) ? $argv[1] : 'validate';

if (!is_dir($root)) {
	doctor_release_fail('Release root is not a directory: ' . $root);
}

if ($command === 'semver') {
	if (!isset($argv[2])) {
		doctor_release_fail('Usage: php scripts/release.php semver VERSION');
	}

	exit(doctor_release_is_semver((string) $argv[2]) ? 0 : 1);
}

if ($command === 'normalize') {
	if (!isset($argv[2]) || !isset($argv[3]) || !is_dir($argv[2]) || !ctype_digit((string) $argv[3])) {
		doctor_release_fail('Usage: php scripts/release.php normalize DIRECTORY UNIX_TIMESTAMP');
	}

	$timestamp = (int) $argv[3];
	$iterator  = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($argv[2], FilesystemIterator::SKIP_DOTS),
		RecursiveIteratorIterator::CHILD_FIRST
	);

	foreach ($iterator as $item) {
		if ($item->isLink()) {
			doctor_release_fail('Refusing to normalize a symbolic link: ' . $item->getPathname());
		}
		if (!touch($item->getPathname(), $timestamp)) {
			doctor_release_fail('Could not normalize archive timestamp: ' . $item->getPathname());
		}
	}

	if (!touch($argv[2], $timestamp)) {
		doctor_release_fail('Could not normalize archive timestamp: ' . $argv[2]);
	}

	exit(0);
}

$version = doctor_release_version($root);

if ($command === 'version') {
	print $version . PHP_EOL;
	exit(0);
}

if ($command === 'validate') {
	if (isset($argv[2])) {
		$tag = (string) $argv[2];
		if ($tag !== 'v' . $version) {
			doctor_release_fail('Release tag ' . $tag . ' does not match INFO version v' . $version . '.');
		}
	}

	doctor_release_changelog_section($root, $version);
	print 'Validated release metadata for ' . $version . '.' . PHP_EOL;
	exit(0);
}

if ($command === 'notes') {
	print doctor_release_changelog_section($root, $version) . PHP_EOL;
	exit(0);
}

doctor_release_fail('Usage: php scripts/release.php validate [vVERSION] | version | notes | semver VERSION | normalize DIRECTORY UNIX_TIMESTAMP');
