<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="images/doctor_logo_dark.png">
		<img src="images/doctor_logo.png" width="360" alt="Cacti Doctor: a cactus wearing a stethoscope. Diagnose. Fix. Monitor.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="License: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ and 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor is a Cacti plugin that diagnoses an installation in one pass and applies small repairs only when an administrator asks for them.

Cacti problems usually surface as symptoms: empty graphs, a poller that stopped, a plugin that will not install. The cause is often a prerequisite that drifted, such as a missing PHP extension in the CLI build, a log directory the poller cannot write, an RRDtool path that points at the wrong binary, or a database without timezone tables. Doctor checks those prerequisites directly and reports each one as pass, warn, or fail with a sentence explaining what it found. The same report is available on a web page, on the command line, and as JSON for monitoring.

## What it checks

| Area | Checks |
|---|---|
| Doctor | Whether Doctor itself runs as root, which would make permission checks describe the wrong account |
| Cacti and PHP | Cacti version, PHP version for the installed Cacti branch, PHP security baseline |
| PHP extensions | Required extensions in the web PHP and in the CLI PHP the poller uses, plus recommended features |
| PHP configuration | `memory_limit`, `max_execution_time`, and `date.timezone`, using Cacti's own recommendations |
| Database | Connectivity, server version against Cacti's recommendation, UTF-8 character set, timezone tables, core tables |
| Filesystem | Writable cache, log, and RRA directories; `include/config.php` not world-readable; Cacti log writable and not oversized |
| Binaries | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, and Spine when it is the configured poller, including versions where Cacti states one |
| Poller | Poller type and interval, and the time since the main poller last completed a run |

Every check has a stable ID, such as `database.timezone` or `binary.rrdtool`, so scripts can key on individual results.

## How it stays safe

A diagnostic tool runs with the poller's or web server's privileges and reads paths from the settings table, so it has to be careful about what it executes and modifies.

- Diagnostics are read-only. They never change files, settings, or data.
- Doctor runs a configured binary only when its file name matches the expected program (`php`, `rrdtool`, `snmpget`, or `snmpwalk`). Anyone who can write the settings table could otherwise choose what Doctor runs. Any other name is reported as a warning and is not executed.
- Doctor never runs configured binaries as root, and it reports when it is running as root.
- Repairs come from a fixed allow-list. Each one needs an authenticated administrator action in the web UI or `--yes` on the CLI, and each one is written to the Cacti log.

## Installation

Clone or unpack the repository as `plugins/doctor` inside a Cacti installation. The directory must be named `doctor`, not `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Install and enable **Cacti Doctor** from **Configuration > Plugin Management**, then grant the **Cacti Doctor** realm to administrators who should have access. The report appears under **Utilities > Cacti Doctor**.

## Command line

Run these from the Cacti root as the Cacti poller user, not root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Text output prints one line per check with its status, category, summary, and detail. `--json` prints a `summary` object with status counts and a `checks` array whose entries carry `id`, `category`, `status`, `summary`, `detail`, and `repair`/`repairable` when an allow-listed repair applies.

| Exit status | Meaning |
|---|---|
| `0` | No check failed, or the requested repair succeeded. Warnings do not change the exit status. |
| `1` | At least one check failed, or a requested repair did not succeed. |
| `2` | A repair was requested without `--yes`. |

Cacti raises `memory_limit` for every CLI script, so the PHP runtime configuration check is only meaningful on the web page.

## Repair policy

Version 0.4.0 includes one repair, `runtime_directories`. It creates missing Cacti runtime directories and adds owner read, write, and execute bits without removing existing permissions.

It targets `$cache_path`, `$log_path`, and `$rra_path` on Cacti 1.3, or the installation's `cache`, `log`, and `rra` directories otherwise. It skips directories that are already writable, refuses directories outside the Cacti installation (such as a log directory under `/var/log`), refuses symbolic links, and refuses to run as root. It never follows `path_cactilog`, so a log file configured inside a code directory cannot redirect the repair there. The diagnostic still checks the configured log file's directory on every release.

It does not change ownership, run shell commands, rewrite configuration, or modify Cacti application data. New repairs must each include a diagnostic, an allow-listed handler, confirmation, audit logging, and tests.

## Requirements

| Cacti | PHP | Notes |
|---|---|---|
| 1.2.20 | 5.4 or newer | Doctor's own code is PHP 5.4 compatible so it can diagnose legacy systems before an upgrade |
| Current 1.2.x | 8.2 or newer | Cacti's `composer.json` requires `>=8.2` |
| `develop` (1.3) | 8.3 or newer | Cacti's `composer.json` requires `^8.3` |

PHP below 8.2 triggers a security-baseline warning. Compatibility with legacy PHP is meant for diagnosing old systems, not for keeping them in service.

## Development

The unit suite uses Pest and runs on PHP 8.2 or newer:

```console
composer install
composer test
```

The tests replace the Cacti functions Doctor calls with small stand-ins in `tests/CactiStubs.php`, so they run without a Cacti installation.

GitHub Actions runs three layers of checks on every push and pull request:

- `php -l` on every PHP file under PHP 5.4, 5.6, 7.0, 7.1, 7.4, and 8.0 through 8.4.
- The unit suite on PHP 8.2, 8.3, and 8.4.
- Seven integration jobs that install Cacti 1.2.20, the current 1.2.x branch, and `develop` against MySQL and MariaDB, with both cmd.php and Spine. Each job installs and enables the plugin, runs the full CLI report, and checks the report schema, summary totals, expected statuses, and the exact set of failures. It then breaks a binary path and the poller timestamp, confirms both are reported, restores them, exercises the repair and its confirmation, and runs disable, enable, uninstall, and reinstall. The JSON report is kept as an artifact when a job fails.

## Contributing

Pull requests go to `develop`. Keep production files PHP 5.4 compatible and use Cacti's style: tabs, single-quoted strings, and Cacti helpers such as `read_config_option()` and `db_fetch_cell()`. Add a unit test for each behavior change, sign off your commits (`git commit -s`), and add a line to `CHANGELOG.md`.

## Security

Report vulnerabilities privately as described in [SECURITY.md](SECURITY.md), not in public issues.

## License

Copyright (C) 2026 Thomas Vincent. Released under the GNU General Public License, version 2 or later. See [LICENSE](LICENSE).
