# Cacti Doctor

Cacti Doctor is an administrator tool for diagnosing Cacti installations and applying small, explicitly selected repairs.

The initial release checks:

- Cacti and PHP version compatibility
- required and recommended PHP extensions
- PHP memory, execution-time, and timezone configuration
- database connectivity, supported server version, UTF-8 configuration, timezone tables, and core tables
- writable cache, log, and RRA directories
- configuration-file permission safety and Cacti log writability/size
- configured PHP CLI, RRDtool, Net-SNMP, and conditional Spine executables, including prerequisite versions where applicable
- poller type, interval, and main-poller freshness

Diagnostics never modify the installation. Repairs use a fixed allow-list, require an authenticated administrator action in the web UI or `--yes` on the CLI, reject paths outside the Cacti installation, refuse symbolic links, and write an entry to the Cacti log.

## Installation

Clone or unpack the repository as `plugins/doctor` inside a Cacti installation. The directory must be named `doctor`, not `plugin_doctor`.

Install and enable **Cacti Doctor** from **Configuration > Plugin Management**. Grant the **Cacti Doctor** realm to administrators who should have access. The report appears under **Utilities > Cacti Doctor**.

## CLI

From the Cacti root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

The command exits with status `1` when any diagnostic fails and status `2` when a repair was requested without confirmation.

## Repair policy

Version 0.2.0 includes one narrow repair: create missing Cacti runtime directories and add owner read/write/execute bits without removing existing permissions. It does not change ownership, follow symbolic links, run shell commands, rewrite configuration, or mutate Cacti application data.

Future repairs should remain individually reviewable and must include a diagnostic, an allow-listed repair handler, confirmation, audit logging, and tests.

## Requirements

- Cacti 1.2.20 or newer
- PHP 8.1 or newer

## License

GPL-2.0-or-later. See `LICENSE`.
