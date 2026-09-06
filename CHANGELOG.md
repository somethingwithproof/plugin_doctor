# Changelog

## 0.3.0 - 2026-09-06

- Support PHP 5.4-compatible parsing for legacy Cacti 1.2.x diagnostics.
- Select the PHP prerequisite floor from the installed Cacti branch.
- Warn when PHP is below the recommended maintained security baseline.
- Add CI syntax coverage for legacy PHP without lowering the Cacti 1.3.x requirement.
- Validate the complete diagnostic JSON contract and reject unexpected failures in integration jobs.
- Exercise real Spine discovery, controlled prerequisite failures, recovery, repair confirmation, and the full plugin lifecycle in CI.
- Add a GitHub-native SemVer release workflow with full CI qualification, installable archives, checksums, and provenance attestations.

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
