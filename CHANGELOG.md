# Changelog

## 0.4.0 - 2026-10-21

- Execute configured binaries only when their file names match the expected program, and never as root; warn instead of running anything else.
- Warn when Doctor runs as root and refuse repairs in that case.
- Require PHP 8.3 for Cacti 1.3 and take the RRDtool floor from Cacti's supported versions, so RRDtool 1.7 passes on develop.
- Warn instead of failing below the database versions Cacti recommends (MariaDB 10.11 or MySQL 8.4 on 1.3, 5.6 on 1.2), and below Net-SNMP 5.9 on 1.3 only.
- Accept every poller interval Cacti offers, including 15 seconds.
- Report an unset `date.timezone` and use Cacti's 400M (800M before PHP 7) memory recommendation.
- Measure poller freshness from the last completed run instead of the last start.
- Follow the configured log file and Cacti 1.3 path overrides for runtime directories.
- Keep PHP startup warnings from breaking the CLI extension check.
- Warn when `include/config.php` is world-readable.
- Verify that each repaired runtime directory is a writable directory before reporting success.
- Limit the runtime-directory repair to Cacti's own cache, log, and RRA directories, and skip ones that are already writable.

## 0.3.0 - 2026-09-06

- Support PHP 5.4-compatible parsing for legacy Cacti 1.2.x diagnostics.
- Select the PHP prerequisite floor from the installed Cacti branch.
- Warn when PHP is below the recommended maintained security baseline.
- Add CI syntax coverage for legacy PHP without lowering the Cacti 1.3.x requirement.
- Validate the complete diagnostic JSON contract and reject unexpected failures in integration jobs.
- Exercise real Spine discovery, controlled prerequisite failures, recovery, repair confirmation, and the full plugin lifecycle in CI.

## 0.2.0 - 2026-09-06

- Align prerequisite checks with Cacti's installer requirements.
- Check required and recommended PHP extensions and runtime configuration.
- Check database version, character set, and timezone-table access.
- Check all required executables and their minimum versions, and require Spine when selected.
- Check configuration-file permissions, log health, and poller configuration.
- Remove a dependency on an HTML escaping helper unavailable in supported Cacti releases.

## 0.1.0 - 2026-09-06

- Initial diagnostic dashboard and CLI.
- Add checks for runtime, database, filesystem, RRDtool, and poller health.
- Add a confirmed, allow-listed runtime-directory repair.
