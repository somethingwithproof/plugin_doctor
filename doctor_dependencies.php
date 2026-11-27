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

/**
 * Return the directed causal dependency graph across Cacti subsystems.
 *
 * Modeled after Sherlock (Bahl et al., ACM SIGCOMM 2007): upstream subsystem
 * failures propagate downstream along directed edges so correlated downstream
 * symptoms can be grouped under their highest failing upstream cause without
 * mutating individual check statuses or counts.
 *
 * @return array<string,array<int,string>>
 */
function doctor_dependency_graph() {
	return [
		'database'          => ['poller'],
		'poller'            => ['filesystem'],
		'filesystem'        => ['remote_collectors'],
		'remote_collectors' => ['plugins'],
		'plugins'           => []
	];
}

/**
 * Map a check result array or check ID string to its subsystem node in the
 * dependency graph, or null when the check is independent of the graph.
 *
 * @param array<string,mixed>|string $check
 * @return string|null
 */
function doctor_dependency_node($check) {
	if (is_array($check)
		&& isset($check['plugin'])
		&& is_string($check['plugin'])
		&& $check['plugin'] !== ''
		&& $check['plugin'] !== 'doctor') {
		return 'plugins';
	}

	$id = '';
	if (is_array($check) && isset($check['id']) && is_string($check['id'])) {
		$id = $check['id'];
	} elseif (is_string($check)) {
		$id = $check;
	}

	if ($id === '') {
		return null;
	}

	if ($id === 'poller.remote') {
		return 'remote_collectors';
	}

	if ($id === 'cacti.plugin_files') {
		return 'plugins';
	}

	if (strpos($id, 'database.') === 0) {
		return 'database';
	}

	if (strpos($id, 'poller.') === 0) {
		return 'poller';
	}

	if (strpos($id, 'filesystem.') === 0 || strpos($id, 'rrd.') === 0) {
		return 'filesystem';
	}

	return null;
}

/**
 * Return all upstream ancestor nodes for a given dependency node, ordered from
 * the highest (most upstream) root node to the immediate parent.
 *
 * @param string $node
 * @return array<int,string>
 */
function doctor_dependency_ancestors($node) {
	$graph = doctor_dependency_graph();
	if (!isset($graph[$node])) {
		return [];
	}

	$parents = [];
	foreach ($graph as $upstream => $children) {
		foreach ($children as $child) {
			if (!isset($parents[$child])) {
				$parents[$child] = [];
			}
			$parents[$child][] = $upstream;
		}
	}

	$visited   = [$node => true];
	$ancestors = [];
	$queue     = [$node];

	while ($queue !== []) {
		$current = array_shift($queue);
		if (!isset($parents[$current])) {
			continue;
		}
		foreach ($parents[$current] as $parent) {
			if (isset($visited[$parent])) {
				continue;
			}
			$visited[$parent] = true;
			$ancestors[]      = $parent;
			$queue[]          = $parent;
		}
	}

	// Reverse so the highest upstream root node appears first.
	return array_reverse($ancestors);
}

/**
 * Annotate cascading downstream warning/failure checks with their upstream
 * failing root cause and record suppressed downstream symptom IDs on the
 * upstream root-cause check.
 *
 * Existing fields (id, category, status, summary, detail, repair, repairable,
 * assessment) are never altered. Safe to call repeatedly (idempotent).
 *
 * @param array<int,array<string,mixed>> $results
 * @return array<int,array<string,mixed>>
 */
function doctor_infer_root_causes($results) {
	if (!is_array($results)) {
		return [];
	}

	// Clear any prior inference annotations so repeated calls stay idempotent.
	$annotated = [];
	foreach ($results as $index => $result) {
		if (!is_array($result)) {
			$annotated[$index] = $result;
			continue;
		}
		unset($result['root_cause_id'], $result['suppressed_symptoms']);
		$annotated[$index] = $result;
	}

	// Record the primary (first) failing check ID and index for each graph node.
	$primaryFailureByNode = [];
	$indexById            = [];

	foreach ($annotated as $index => $result) {
		if (!is_array($result) || !isset($result['id'], $result['status'])
			|| !is_string($result['id']) || !is_string($result['status'])) {
			continue;
		}

		$id             = $result['id'];
		$indexById[$id] = $index;

		if ($result['status'] !== 'fail') {
			continue;
		}

		$node = doctor_dependency_node($result);
		if ($node !== null && !isset($primaryFailureByNode[$node])) {
			$primaryFailureByNode[$node] = $id;
		}
	}

	if ($primaryFailureByNode === []) {
		return $annotated;
	}

	$suppressedByRoot = [];

	foreach ($annotated as $index => $result) {
		if (!is_array($result) || !isset($result['id'], $result['status'])
			|| !is_string($result['id']) || !is_string($result['status'])) {
			continue;
		}

		if (!in_array($result['status'], ['fail', 'warn'], true)) {
			continue;
		}

		$node = doctor_dependency_node($result);
		if ($node === null) {
			continue;
		}

		$ancestors = doctor_dependency_ancestors($node);
		$rootId    = null;

		foreach ($ancestors as $ancestor) {
			if (isset($primaryFailureByNode[$ancestor])) {
				$rootId = $primaryFailureByNode[$ancestor];
				break;
			}
		}

		if ($rootId === null || $rootId === $result['id']) {
			continue;
		}

		$annotated[$index]['root_cause_id'] = $rootId;
		if (!isset($suppressedByRoot[$rootId])) {
			$suppressedByRoot[$rootId] = [];
		}
		$suppressedByRoot[$rootId][] = $result['id'];
	}

	foreach ($suppressedByRoot as $rootId => $symptoms) {
		if (isset($indexById[$rootId])) {
			$annotated[$indexById[$rootId]]['suppressed_symptoms'] = $symptoms;
		}
	}

	return $annotated;
}

/**
 * Summarize inferred root causes and suppressed downstream symptoms for a set
 * of Doctor check results.
 *
 * @param array<int,array<string,mixed>> $results
 * @return array{root_causes:array<int,string>,suppressed:array<int,string>,groups:array<string,array<int,string>>,root_cause_count:int,suppressed_count:int}
 */
function doctor_dependency_summary($results) {
	$annotated  = doctor_infer_root_causes($results);
	$rootCauses = [];
	$suppressed = [];
	$groups     = [];

	foreach ($annotated as $result) {
		if (!is_array($result) || !isset($result['id'], $result['status'])
			|| !is_string($result['id']) || !is_string($result['status'])) {
			continue;
		}

		$id = $result['id'];

		if (isset($result['root_cause_id']) && is_string($result['root_cause_id'])) {
			$suppressed[] = $id;
		} elseif ($result['status'] === 'fail') {
			$rootCauses[] = $id;
		}

		if (isset($result['suppressed_symptoms']) && is_array($result['suppressed_symptoms']) && $result['suppressed_symptoms'] !== []) {
			$groups[$id] = $result['suppressed_symptoms'];
		}
	}

	return [
		'root_causes'      => $rootCauses,
		'suppressed'       => $suppressed,
		'groups'           => $groups,
		'root_cause_count' => count($rootCauses),
		'suppressed_count' => count($suppressed)
	];
}
