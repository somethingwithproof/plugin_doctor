# Changelog

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
