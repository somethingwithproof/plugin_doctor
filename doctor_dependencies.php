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
 * Precomputes the ancestor table once per process so repeated inference passes
 * avoid rebuilding the reverse adjacency list or calling array_shift().
 *
 * @param string $node
 * @return array<int,string>
 */
function doctor_dependency_ancestors($node) {
	static $ancestorsByNode = null;

	if ($ancestorsByNode === null) {
		$graph   = doctor_dependency_graph();
		$parents = array();

		foreach ($graph as $upstream => $children) {
			foreach ($children as $child) {
				if (!isset($parents[$child])) {
					$parents[$child] = array();
				}
				$parents[$child][] = $upstream;
			}
		}

		$ancestorsByNode = array();

		foreach ($graph as $target => $unused) {
			$visited   = array($target => true);
			$ancestors = array();
			$queue     = array($target);
			$head      = 0;

			while ($head < count($queue)) {
				$current = $queue[$head];
				$head++;

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
			$ancestorsByNode[$target] = array_reverse($ancestors);
		}
	}

	return isset($ancestorsByNode[$node]) ? $ancestorsByNode[$node] : array();
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
		return array();
	}

	// Single first pass: clear prior inference annotations, index check IDs,
	// cache each failing/warning check's dependency node, and record primary failures.
	$annotated            = array();
	$primaryFailureByNode = array();
	$indexById            = array();
	$candidateIndices     = array();
	$nodeByIndex          = array();

	foreach ($results as $index => $result) {
		if (!is_array($result)) {
			$annotated[$index] = $result;
			continue;
		}

		unset($result['root_cause_id'], $result['suppressed_symptoms']);
		$annotated[$index] = $result;

		if (!isset($result['id'], $result['status'])
			|| !is_string($result['id']) || !is_string($result['status'])) {
			continue;
		}

		$id             = $result['id'];
		$status         = $result['status'];
		$indexById[$id] = $index;

		if ($status !== 'fail' && $status !== 'warn') {
			continue;
		}

		$node = doctor_dependency_node($result);
		if ($node === null) {
			continue;
		}

		$candidateIndices[]  = $index;
		$nodeByIndex[$index] = $node;

		if ($status === 'fail' && !isset($primaryFailureByNode[$node])) {
			$primaryFailureByNode[$node] = $id;
		}
	}

	if ($primaryFailureByNode === array()) {
		return $annotated;
	}

	// Precompute the highest failing upstream root ID once per graph node
	// so every check resolves its upstream cause in O(1).
	$rootByNode = array();
	foreach (doctor_dependency_graph() as $graphNode => $unused) {
		foreach (doctor_dependency_ancestors($graphNode) as $ancestor) {
			if (isset($primaryFailureByNode[$ancestor])) {
				$rootByNode[$graphNode] = $primaryFailureByNode[$ancestor];
				break;
			}
		}
	}

	if ($rootByNode === array()) {
		return $annotated;
	}

	$suppressedByRoot = array();

	foreach ($candidateIndices as $index) {
		$node = $nodeByIndex[$index];
		if (!isset($rootByNode[$node])) {
			continue;
		}

		$rootId  = $rootByNode[$node];
		$checkId = $annotated[$index]['id'];
		if ($rootId === $checkId) {
			continue;
		}

		$annotated[$index]['root_cause_id'] = $rootId;
		if (!isset($suppressedByRoot[$rootId])) {
			$suppressedByRoot[$rootId] = array();
		}
		$suppressedByRoot[$rootId][] = $checkId;
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
