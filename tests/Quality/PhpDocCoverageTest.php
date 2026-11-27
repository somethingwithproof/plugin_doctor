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

if (!function_exists('doctor_test_collect_phpdoc_violations')) {
	/**
	 * Parse a PHP file using token_get_all() and verify that every named
	 * class/interface/trait and function/method carries a PHPDoc block with
	 * matching @param tags for all parameters and @return for non-constructors.
	 *
	 * @param string $path
	 * @param string $relativePath
	 * @return array<int,string>
	 */
	function doctor_test_collect_phpdoc_violations($path, $relativePath) {
		$contents   = file_get_contents($path);
		$tokens     = token_get_all($contents === false ? '' : $contents);
		$count      = count($tokens);
		$violations = [];
		$modifiers  = [T_PUBLIC, T_PROTECTED, T_PRIVATE, T_STATIC, T_ABSTRACT, T_FINAL];

		for ($i = 0; $i < $count; $i++) {
			if (!is_array($tokens[$i])) {
				continue;
			}

			$tokenType = $tokens[$i][0];
			$line      = $tokens[$i][2];

			if (in_array($tokenType, [T_CLASS, T_INTERFACE, T_TRAIT], true)) {
				// Find class/interface/trait name.
				$name = '';
				for ($j = $i + 1; $j < $count; $j++) {
					if (is_array($tokens[$j]) && $tokens[$j][0] === T_WHITESPACE) {
						continue;
					}
					if (is_array($tokens[$j]) && $tokens[$j][0] === T_STRING) {
						$name = $tokens[$j][1];
					}
					break;
				}
				if ($name === '') {
					continue;
				}

				$doc = doctor_test_find_preceding_docblock($tokens, $i, $modifiers);
				if ($doc === null) {
					$violations[] = $relativePath . ':' . $line . ' ' . $name . ' is missing a PHPDoc block';
				}
				continue;
			}

			if ($tokenType !== T_FUNCTION) {
				continue;
			}

			// Skip closures: function(...) or function &(...).
			$nameIdx = null;
			for ($j = $i + 1; $j < $count; $j++) {
				if (is_array($tokens[$j]) && $tokens[$j][0] === T_WHITESPACE) {
					continue;
				}
				if ($tokens[$j] === '&') {
					continue;
				}
				if (is_array($tokens[$j]) && $tokens[$j][0] === T_STRING) {
					$nameIdx = $j;
				}
				break;
			}

			if ($nameIdx === null) {
				continue;
			}

			$fnName = $tokens[$nameIdx][1];
			$doc    = doctor_test_find_preceding_docblock($tokens, $i, $modifiers);

			if ($doc === null) {
				$violations[] = $relativePath . ':' . $line . ' function ' . $fnName . '() is missing a PHPDoc block';
				continue;
			}

			// Extract parameter names from the function signature.
			$params = doctor_test_extract_function_params($tokens, $nameIdx + 1);
			foreach ($params as $param) {
				if (!preg_match('/@param\s+\S[^\r\n]*\s+(?:\.\.\.)?\$' . preg_quote($param, '/') . '\b/', $doc)) {
					$violations[] = $relativePath . ':' . $line . ' function ' . $fnName . '() is missing @param for $' . $param;
				}
			}

			if ($fnName !== '__construct' && strpos($doc, '@return') === false) {
				$violations[] = $relativePath . ':' . $line . ' function ' . $fnName . '() is missing @return';
			}
		}

		return $violations;
	}
}

if (!function_exists('doctor_test_find_preceding_docblock')) {
	/**
	 * Locate the T_DOC_COMMENT immediately preceding a declaration token.
	 *
	 * @param array<int,mixed> $tokens
	 * @param int $index
	 * @param array<int,int> $modifiers
	 * @return string|null
	 */
	function doctor_test_find_preceding_docblock($tokens, $index, $modifiers) {
		for ($j = $index - 1; $j >= 0; $j--) {
			$tok = $tokens[$j];
			if (is_array($tok)) {
				if ($tok[0] === T_WHITESPACE || in_array($tok[0], $modifiers, true)) {
					continue;
				}
				if ($tok[0] === T_DOC_COMMENT) {
					return $tok[1];
				}
				if ($tok[0] === T_COMMENT) {
					continue;
				}
			}
			break;
		}

		return null;
	}
}

if (!function_exists('doctor_test_extract_function_params')) {
	/**
	 * Extract top-level parameter variable names from a function parameter list.
	 *
	 * @param array<int,mixed> $tokens
	 * @param int $start
	 * @return array<int,string>
	 */
	function doctor_test_extract_function_params($tokens, $start) {
		$count  = count($tokens);
		$params = [];
		$depth  = 0;
		$inDefault = false;

		for ($i = $start; $i < $count; $i++) {
			$tok = $tokens[$i];
			if ($tok === '(') {
				$depth++;
				continue;
			}
			if ($tok === ')') {
				$depth--;
				if ($depth <= 0) {
					break;
				}
				continue;
			}
			if ($depth !== 1) {
				continue;
			}
			if ($tok === '=') {
				$inDefault = true;
				continue;
			}
			if ($tok === ',') {
				$inDefault = false;
				continue;
			}
			if (!$inDefault && is_array($tok) && $tok[0] === T_VARIABLE) {
				$params[] = ltrim($tok[1], '$');
			}
		}

		return $params;
	}
}

test('100% of production PHP functions, classes, and methods have complete PHPDoc blocks', function () {
	$root  = dirname(dirname(__DIR__));
	$files = glob($root . '/*.php');
	if (!is_array($files)) {
		$files = [];
	}
	if (is_file($root . '/cli/doctor.php')) {
		$files[] = $root . '/cli/doctor.php';
	}
	sort($files);

	expect($files)->not->toBeEmpty();

	$violations = [];
	foreach ($files as $file) {
		$relative = ltrim(substr($file, strlen($root)), '/');
		$violations = array_merge($violations, doctor_test_collect_phpdoc_violations($file, $relative));
	}

	expect($violations)->toBe([]);
});
