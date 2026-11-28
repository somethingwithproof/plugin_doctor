<!--
SPDX-FileCopyrightText: 2026 Thomas Vincent <thomasvincent@gmail.com>
SPDX-License-Identifier: GPL-2.0-or-later
-->

# Performance Profile and Algorithmic Audit

This document records the measured performance profile of `plugin_doctor` hot paths, the algorithmic and PCRE bottlenecks identified during code review, and the measured before/after results after remediation.

## Methodology

All timings were collected with PHP 8.4.25 CLI using `hrtime(true)` and `memory_get_peak_usage(true)` against deterministic workloads sized above typical single-host Cacti deployments:

- Causal root-cause inference (`doctor_infer_root_causes`) over 1,000 checks spanning all five subsystem nodes (`database`, `poller`, `filesystem`, `remote_collectors`, `plugins`), averaged across 50 iterations.
- Secret redaction (`doctor_redact`) over 5,000 realistic Cacti log lines (4% carrying passwords, tokens, or credentials; 10% error lines; 86% routine poller stats) measured both per line and as a single joined support-bundle string, averaged across 3 iterations.
- Log scanning (`doctor_evaluate_log_lines`) over 5,000 log lines (10 iterations) and tail reading (`doctor_read_log_tail`) over a 2 MiB / 20,000-line log requesting the last 1,000 lines (10 iterations).
- Plugin hook check validation (`doctor_validate_plugin_check`) over 1,000 descriptors (3 iterations).
- RRD staleness evaluation (`doctor_evaluate_rrd_stale`) over 500 stale RRD sources (50 iterations).

All production PHP changes retain strict PHP 5.4 syntax compatibility and fail-closed redaction behavior.

## Bottlenecks Found and Fixed

### 1. Repeated Reverse-Graph Rebuilds in Causal Root-Cause Inference (`doctor_dependencies.php`)

- **Before**: `doctor_infer_root_causes()` scanned the check list three times, resolved `doctor_dependency_node()` twice per failing check, and invoked `doctor_dependency_ancestors()` on every failing or warning check. Each call to `doctor_dependency_ancestors()` rebuilt the reverse-edge adjacency map from scratch and ran a BFS with `array_shift()` (linear shift per dequeue).
- **Fix**: Memoized the precomputed ancestor table in `doctor_dependency_ancestors()` using an index-pointer BFS (`O(V + E)` once per process). Merged the first two passes of `doctor_infer_root_causes()` and precomputed `$rootByNode` once per graph node so every check resolves its highest failing upstream root cause in `O(1)` (`O(C + V + E)` total).

### 2. Unnecessary PCRE Scans and Word-Prefix Backtracking in Secret Redaction (`doctor_functions.php`)

- **Before**: `doctor_redact_patterns()` executed six full PCRE passes on every input string, including four patterns anchored on `\b\w*(?:$keys)\b`. On long non-secret identifiers across clean log lines, PCRE attempted word-boundary prefix backtracking on every word in every line, even when no secret keyword, auth scheme, or URL existed in the line.
- **Fix**: Cached compiled pattern strings once per process and added semantically equivalent literal/keyword prechecks (`stripos` for `bearer`/`basic`, unprefixed keyword presence scan without `\b\w*` backtracking, delimiter/quote checks, and `strpos($text, '://')`). Multiline support-bundle text skips clean lines in `O(1)` while grouping any line containing a secret keyword together with immediately following empty or indented lines so multiline YAML quoted scalars retain exact redaction semantics and fail-closed `DOCTOR_REDACTION_FAILED` behavior on any PCRE error.

### 3. Duplicate Redaction in Plugin Check Validation (`doctor_plugins.php`)

- **Before**: `doctor_validate_plugin_check()` redacted `$title`, `$message`, `$remediation`, and `$details` twice per descriptor (once for `doctor_result()` and again when populating `title`, `message`, `details`, and `remediation`).
- **Fix**: Redact each field once and assemble `detail` from the already-redacted values.

### 4. Whole-Window Array Allocation in Log Tailing and Error Scanning (`doctor_functions.php`)

- **Before**: `doctor_read_log_tail()` split the full 2 MiB tail with `preg_split()`, copied it through `array_filter()`, sliced the tail, and re-indexed with `array_values()`, allocating ~20,000 strings to return 1,000. `doctor_evaluate_log_lines()` ran regex matching on every non-error line and used a lazy regex to strip the timestamp prefix.
- **Fix**: Scan backwards from the end of the 2 MiB buffer using `strrpos()` negative offsets so at most `$maxLines` strings are allocated. In `doctor_evaluate_log_lines()`, skip lines lacking `ERROR`, `FATAL`, or `SQL Error` before running the word-boundary regex, and strip the ` - ` prefix with `strpos()` + `substr()`.

### 5. Full Sort for Top-3 Stale RRD Examples (`doctor_rrd.php`)

- **Before**: `doctor_evaluate_rrd_stale()` formatted description strings for all stale sources and ran `usort()` (`O(S log S)`) before keeping only `array_slice($stale, 0, 3)`.
- **Fix**: Maintain a fixed 3-element descending top-age list in `O(1)` per source and format strings only for the 3 retained examples.

## Measured Results (PHP 8.4.25)

| Hot Path | Workload | Before (ms/iter) | After (ms/iter) | Speedup | Peak Memory Change |
| --- | --- | ---: | ---: | ---: | --- |
| `doctor_infer_root_causes()` | 1,000 checks (50 iters) | 1.537 ms | 0.455 ms | 3.4x | 8.00 MiB -> 8.00 MiB |
| `doctor_redact()` (per-line) | 5,000 log lines (3 iters) | 328.771 ms | 33.942 ms | 9.7x | 8.00 MiB -> 8.00 MiB |
| `doctor_redact()` (joined bundle) | 5,000 lines, ~600 KiB (3 iters) | 355.045 ms | 33.941 ms | 10.5x | 12.00 MiB -> 12.00 MiB |
| `doctor_evaluate_log_lines()` | 5,000 log lines (10 iters) | 2.174 ms | 0.779 ms | 2.8x | 12.00 MiB -> 12.00 MiB |
| `doctor_read_log_tail()` | 2 MiB / 20k lines -> 1k (10 iters) | 2.741 ms | 0.737 ms | 3.7x | 16.03 MiB -> 14.03 MiB (-2.00 MiB) |
| `doctor_validate_plugin_check()` | 1,000 plugin checks (3 iters) | 151.164 ms | 8.479 ms | 17.8x | 16.03 MiB -> 14.03 MiB |
| `doctor_evaluate_rrd_stale()` | 500 stale RRDs (50 iters) | 0.579 ms | 0.151 ms | 3.8x | 16.03 MiB -> 14.03 MiB |

## Telemetry Overhead

Self-graphing script-server telemetry (`scripts/ss_doctor_stats.php`) computes `checks_total`, `checks_ok`, `checks_warn`, `checks_fail`, `root_causes`, `suppressed_symptoms`, and `plugin_checks` in a single linear pass over the check results plus the `O(C)` dependency summary. On execution or database failure, every field returns RRDtool unknown (`U`) rather than `0`.
