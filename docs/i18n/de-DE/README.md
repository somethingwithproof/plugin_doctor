<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: ein Kaktus mit einem Stethoskop. Diagnostizieren. Beheben. Überwachen.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Quality-Gate-Status"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lizenz: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ und 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor ist ein Cacti-Plugin, das eine Installation in einem Durchgang diagnostiziert und kleinere Reparaturen nur dann durchführt, wenn ein Administrator dies anfordert.

**Status: in Entwicklung, vor Version 1.0.** Die neueste Version ist [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Dieser Patch ergänzt die rollenbezogene Zugriffssteuerung, die geführte Diagnose, bereichsbezogene RRD-Aktualitätsprüfungen, Reparaturvorschauen und den Audit-Verlauf, akzeptierte Warnungsausnahmen sowie die Übersetzungen aus Version 0.6.0 um Hindi- und Arabisch-Kataloge sowie übersetzte Benutzerhandbücher. Details finden Sie in [CHANGELOG.md](../../../CHANGELOG.md).

## Screenshots

Diagnose- und Zeitplanungseinstellungen in einer isolierten Cacti-1.2.31-Demonstrationsinstallation unter PHP 8.3.36, einschließlich der Prüfungen auf Cacti-PHP-Kompatibilität, Upstream-Sicherheits-Support und Datenbankzustand. Die hier gezeigten Warnungen und Fehler beschreiben diese Demo-Umgebung.

![Diagnosetabelle von Doctor mit Ergebnissen für „Bestanden“, „Warnung“ und „Fehler“](../../screenshots/diagnostics.png)

![Einstellungen von Doctor für Zeitplanung, Alarme und Schwellenwerte](../../screenshots/settings.png)

Probleme mit Cacti zeigen sich meist als Symptome: leere Graphen, ein gestoppter Poller oder ein Plugin, das sich nicht installieren lässt. Die Ursache ist häufig eine abgewichene Voraussetzung – etwa eine fehlende PHP-Erweiterung im CLI-Build, ein Protokollverzeichnis ohne Schreibrechte für den Poller, ein RRDtool-Pfad, der auf die falsche Binärdatei verweist, oder eine Datenbank ohne Zeitzonentabellen. Doctor prüft diese Voraussetzungen direkt und meldet jede einzelne als Bestanden, Warnung oder Fehler zusammen mit einem erläuternden Satz zum Befund. Derselbe Bericht steht auf einer Webseite, auf der Befehlszeile sowie als JSON für das Monitoring zur Verfügung.

## Was geprüft wird

| Bereich | Prüfungen |
|---|---|
| Doctor | Ob Doctor selbst als root ausgeführt wird, da Berechtigungsprüfungen sonst für das falsche Benutzerkonto gelten würden |
| Cacti und PHP | Cacti-Version, ein vom Installer nie abgeschlossenes Upgrade, aktivierte Plugins mit fehlenden Dateien, PHP-Kompatibilität mit dem installierten Cacti-Paket, Upstream-Sicherheits-Support-Status von PHP |
| PHP-Erweiterungen | Erforderliche Erweiterungen im Web-PHP und im vom Poller verwendeten CLI-PHP sowie empfohlene Funktionen |
| PHP-Konfiguration | `memory_limit`, `max_execution_time` und `date.timezone` gemäß Cactis eigenen Empfehlungen |
| Datenbank | Konnektivität, Serverversion im Vergleich zur Cacti-Empfehlung, UTF-8-Zeichensatz, Zeitzonentabellen, Kerntabellen, Zeitabweichung gegenüber dem PHP-Host sowie die InnoDB-Einstellungen, die Cacti als Fehler meldet |
| Datenbankzustand | Verbindungskapazität, Buffer-Pool-Lesevorgänge, temporäre Festplattentabellen, Erstellung von Verbindungs-Threads, langsame Anweisungen und InnoDB-Log-Buffer-Wartezeiten, jeweils mit lastabhängigen Optimierungsvorschlägen |
| Dateisystem | Beschreibbare Cache-, Log- und RRA-Verzeichnisse; freier Speicherplatz für RRD-Dateien; aktive Datenquellen ohne RRD-Datei oder mit überfälligen Dateiaktualisierungen; `include/config.php` nicht für alle lesbar; Cacti-Protokoll beschreibbar und nicht übergroß |
| Binärdateien | PHP-CLI, RRDtool, `snmpget`, `snmpwalk` sowie Spine, sofern er als Poller konfiguriert ist – einschließlich der Versionen, sofern Cacti eine angibt |
| Protokoll | Fehler in den jüngsten Zeilen des Cacti-Protokolls mit der häufigsten Meldung |
| Geräte | Aktivierte Geräte, die ausgefallen sind oder sich erholen, die drei am längsten ausgefallenen Geräte mit ihrer letzten Fehlermeldung sowie ein Fehlerstatus, wenn die meisten Geräte gleichzeitig ausgefallen sind |
| Poller | Poller-Typ und -Intervall, Zeit seit dem letzten Abschluss des Haupt-Pollers, Laufzeit im Verhältnis zum Intervall, Poller-Ausgaben, die nie eine RRD-Datei erreicht haben, Remote-Poller, die keine Meldungen mehr senden, ein hängender Boost-Prozess und eine Spine-Konfiguration, die auf eine andere Datenbank verweist |

Jede Prüfung besitzt eine stabile ID wie `database.timezone` oder `binary.rrdtool`, sodass Skripte gezielt auf einzelne Ergebnisse zugreifen können.

## Code- und Testübersicht

| Verhalten | Implementierung | Testabdeckung in diesem Repository |
|---|---|---|
| Diagnoseprüfungen und stabile Berichts-IDs | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Rollenbezogener Zugriff und geschwärzte Webberichte | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Geführte Symptomuntersuchungen | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD-Aktualität und Behandlung verzögerter Schreibvorgänge | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Reparaturvorschauen, Audit-Verlauf und akzeptierte Warnungen | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Geplante Prüfungen und Alarmübergänge | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Diese Verweise benennen die Implementierung und die Testabdeckung; sie bedeuten nicht, dass jeder CI-Job für die aktuelle Revision erfolgreich war. Prüfen Sie den Workflow-Lauf für die Revision, die Sie bereitstellen möchten.

## Hinweise zum Datenbankzustand

Der native PHP-Analyzer von Doctor liest über die bestehende Datenbankverbindung von Cacti eine festgelegte Auswahl globaler MySQL- oder MariaDB-Zähler aus. Er führt pro Bericht zwei schreibgeschützte Abfragen aus, benötigt weder zusätzliche Zugangsdaten noch eine ausführbare Datei und ändert niemals die Datenbankkonfiguration. Diese Prüfungen erscheinen im Webbericht, auf der CLI, in der JSON- und Monitoring-Ausgabe, im Support-Paket sowie in der geplanten Statusverfolgung.

| Prüf-ID | Auslöser für eine Untersuchung |
|---|---|
| `database.health_sample` | Weniger als 24 Stunden seit dem Start oder `FLUSH STATUS` oder nicht verfügbare bzw. inkonsistente Laufzeit |
| `database.connection_capacity` | Aktuelle oder protokollierte Spitzenverbindungen von mindestens 80 % des aktuellen Werts von `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` mindestens 1 % bei mindestens 10.000 Leseanforderungen |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` mindestens 25 % bei mindestens 1.000 temporären Tabellen |
| `database.thread_cache` | `Threads_created / Connections` mindestens 5 % bei mindestens 1.000 Verbindungsversuchen und `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` mindestens 1 % bei mindestens 1.000 Anweisungen |
| `database.redo_log_waits` | `Innodb_log_waits` ungleich null |

Hierbei handelt es sich um Untersuchungsschwellenwerte von Doctor, nicht um Konfigurationsvorgaben der Hersteller. Mit Ausnahme der Verbindungskapazität erfordern kumulative Hinweise das oben genannte Beobachtungsfenster. Fehlende, fehlerhafte, doppelte oder übergroße Zähler, unzureichende Aktivität sowie nicht unterstützte Thread-Modi erzeugen Warnungen statt eines gesunden Befunds oder einer Optimierungsempfehlung. Warnungen können den Nagios-Status und geplante Alarme beeinflussen, wenn **Alert on Warnings** aktiviert ist.

Betrachten Sie die gemessenen Zähler und die Empfehlung stets gemeinsam. Kumulative Werte belegen keine aktuelle Auslastung; Zähler können unterschiedliche Rücksetzzeitpunkte haben und stellen keinen atomaren Schnappschuss dar. Spitzenwerte bei Verbindungen können auf einem älteren Limit beruhen. Die Anzahl langsamer Abfragen hängt von `long_query_time` ab, und der MySQL-Zähler für temporäre Festplattentabellen erfasst Memory-Mapped-Dateien unter Umständen nicht. Ein niedriges Verhältnis beweist nicht, dass kein Engpass vorliegt. Prüfen Sie Trends unter einer repräsentativen Arbeitslast, analysieren Sie Ausführungspläne sowie die Wiederverwendung von Verbindungen und messen Sie den Arbeitsspeicher auf dem **Datenbank-Host**, bevor Sie Puffer oder Verbindungslimits ändern.

Wenn Metriken nicht verfügbar sind, prüfen Sie die Serverunterstützung sowie die Berechtigungen des Cacti-Kontos für `SHOW GLOBAL STATUS` und `SHOW GLOBAL VARIABLES`; Doctor fordert keine erhöhten Zugangsdaten an. Die Zählerdefinitionen stammen aus der [MySQL-Referenz für Statusvariablen](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) und der [MariaDB-Referenz für Statusvariablen](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Es werden weder Skripte noch Code von MySQLTuner verwendet.

Es ist keine Schema- oder Konfigurationsmigration erforderlich. Stellen Sie die Plugin-Dateien wie gewohnt bereit; ein Zurücksetzen dieser Dateien entfernt die hinzugefügten Diagnosefunktionen. Bestehende geplante Zustände werden beim nächsten Lauf aktualisiert.

## Sicherheitskonzept

Ein Diagnosetool läuft mit den Berechtigungen des Pollers oder des Webservers und liest Pfade aus der Einstellungstabelle aus. Daher muss es sorgfältig kontrollieren, was es ausführt und verändert.

- Diagnosen erfolgen ausschließlich lesend. Sie ändern niemals Dateien, Einstellungen oder Daten.
- Doctor führt eine konfigurierte Binärdatei nur dann aus, wenn ihr Dateiname dem erwarteten Programm entspricht (`php`, `rrdtool`, `snmpget` oder `snmpwalk`). Andernfalls könnte jeder mit Schreibzugriff auf die Einstellungstabelle festlegen, was Doctor ausführt. Jeder andere Name wird als Warnung gemeldet und nicht ausgeführt.
- Doctor führt konfigurierte Binärdateien niemals als root aus und meldet, wenn es selbst als root ausgeführt wird.
- Reparaturen stammen aus einer fest definierten Positivliste (Allowlist). Jede Reparatur erfordert eine authentifizierte Administrator-Aktion in der Weboberfläche oder `--yes` auf der Befehlszeile (CLI) und wird im Cacti-Protokoll vermerkt.

## Releases

Die Versionsnummern folgen SemVer und stimmen mit der Datei `INFO` des Plugins überein. Informationen zu Versionsauswahl, CI-Prüfungen, Paketinhalt, Prüfsummen und Rollback-Anweisungen finden Sie im
[Release-Prozess](../../releasing.md).

## Installation

Laden Sie `doctor-VERSION.tar.gz` oder `doctor-VERSION.zip` sowie `SHA256SUMS` von
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) herunter.
Überprüfen Sie die SHA-256-Prüfsumme des Archivs und entpacken Sie anschließend das darin enthaltene Verzeichnis `doctor/` in das Verzeichnis `plugins/` von Cacti. Dies sind die installierbaren Pakete; die automatisch von GitHub erzeugten Quellcode-Archive verwenden einen anderen Verzeichnisnamen. Um unveröffentlichte Änderungen aus `develop` auszuführen, installieren Sie das Plugin aus einem Quellcode-Checkout.

Für Quellcode-Checkouts:

Klonen oder entpacken Sie das Repository als `plugins/doctor` innerhalb einer Cacti-Installation. Das Verzeichnis muss `doctor` heißen, nicht `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Installieren und aktivieren Sie **Cacti Doctor** unter **Konfiguration > Plugin-Verwaltung** und weisen Sie anschließend über die Cacti-Benutzer- oder Gruppenberechtigungen den Bereich **Doctor Viewer**, **Doctor Operator** oder **Doctor Administrator** zu. Bestehende **Cacti Doctor**-Berechtigungen behalten nach einem Upgrade den Administrator-Zugriff. Der Bericht erscheint unter **Werkzeuge > Cacti Doctor**.

## Sprachen

Doctor liefert 45 nicht-englische Übersetzungskataloge unter `locales/po/` und `locales/LC_MESSAGES/` aus, die Broad-Tier-1- (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), afrikanische (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`) und asiatische (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) Gebietsschemata abdecken. Cacti zeigt einen Katalog an, sobald die Sprachunterstützung aktiviert ist (**Konfiguration > Einstellungen > Allgemein > Sprachunterstützung**) und ein Benutzer ein Gebietsschema auswählt, das Cacti in seiner Sprachauswahl bereitstellt; Kataloge für Gebietsschemata, die noch nicht in der Sprachauswahl von Cacti aufgeführt sind, werden wirksam, sobald Cacti sie hinzufügt. Die Webseite, die Einstellungen sowie die von der Befehlszeile ausgegebenen Meldungen und Berichtstexte folgen der Cacti-Sprache; der Befehlszeilenbericht selbst verwendet die Cacti-Standardsprache, die Englisch bleibt, sofern Sie sie nicht ändern.

Maschinenlesbare Ausgaben werden niemals übersetzt: Prüf-IDs, JSON-Schlüssel und Statuswerte, die Ausgaben von `--format=nagios` und `--format=prometheus`, Protokollzeilen sowie die Abschnittsüberschriften des Support-Pakets bleiben auf Englisch, damit Skripte und Monitoring-Systeme in jeder Sprache weiterhin funktionieren. Die Texte `summary` und `detail` jeder Prüfung sind der einzige übersetzte Teil des JSON-Berichts.

Ein Katalog für lateinamerikanisches Spanisch (`es-419`) wird ebenfalls mitgeliefert, jedoch bieten weder Cacti 1.2 noch Cacti 1.3 ein entsprechendes Gebietsschema zur Auswahl an. Er wird daher erst wirksam, wenn Cacti ein solches hinzufügt. Wählen Sie bis dahin Spanisch (`es-ES`).

Cacti lädt den Sprachkatalog eines Plugins sowohl unter 1.2.x als auch unter 1.3 aus `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` mit `doctor` als Textdomäne (1.3 löst das Plugin-Verzeichnis über seinen konfigurierbaren Plugin-Pfad auf).

## Zugriffsebenen

| Bereich | Berechtigungen |
|---|---|
| Doctor Viewer | Lesen der neuesten zeitgesteuerten Prüfstatus, des Beobachtungszeitpunkts, der Aktualität und der letzten aggregierten Verlaufsdaten. Keine Diagnosebefehle, Rohdetails, Konfigurationen oder Reparaturen. |
| Doctor Operator | Ausführen eines Diagnoseberichts mit einem Prozesslimit von 120 Sekunden, Einsehen geschwärzter Details und Bestätigen von Befunden. Keine Einstellungsänderungen oder Reparaturen. |
| Doctor Administrator | Berechtigungen des Operators sowie die vorhandenen Reparaturen der Positivliste und die Doctor-Einstellungen. Reparaturen und Einstellungen erfordern zudem den Cacti-Bereich Einstellungen/Systemwerkzeuge. |

Das Menü „Werkzeuge“ öffnet die Seite für den höchsten Doctor-Bereich, der dem Benutzer zugewiesen wurde, einschließlich Gruppenberechtigungen. Neue Viewer- und Operator-Bereiche erhalten keine automatischen Zuweisungen. Die ursprüngliche Bereichs-ID bleibt als Administrator an `doctor.php` gebunden, sodass bestehende Benutzer- und Gruppenzugriffe erhalten bleiben.

Viewer-Daten stammen aus zeitgesteuerten Prüfungen. Aktivieren Sie die Zeitplanung, bevor Sie Viewer-Zugriff gewähren; fehlende oder überfällige Beobachtungen werden als **unknown** angezeigt, niemals als fehlerfrei. Der Verlauf speichert die letzten 20 zeitgesteuerten aggregierten Zählwerte und schließt den Gerätestatus aus. Operatoren starten neue Diagnosen explizit; normale Seitenaktualisierungen verwenden den letzten Bericht ihrer Sitzung.

Gerätedetails und Gesamtwerte richten sich nach den Geräteberechtigungen des aktuellen Benutzers. Protokollauszüge erfordern zusätzlich den Cacti-Bereich Protokollverwaltung. Geheimnisse werden maskiert, bevor Diagnosedetails in der Websitzung gespeichert oder dargestellt werden. Der CLI-Zugriff wird weiterhin über das Betriebssystemkonto geregelt.

Bestätigungen sind personenbezogen und werden im Cacti-Protokoll erfasst. Sie gelten nur für denselben Befund und denselben Nachweis; geänderte Nachweise erfordern eine erneute Bestätigung. Sie ändern niemals den Status (bestanden/Warnung/fehlgeschlagen), unterdrücken keine Benachrichtigungen und markieren eine fehlgeschlagene Prüfung nicht als fehlerfrei. Dies ist getrennt von Ausnahmen für akzeptierte Warnungen zu betrachten, die sich auf die Benachrichtigungsrichtlinie auswirken, ohne den beobachteten Status zu ändern, und weiter unten beschrieben werden.

Jede Aktion erfordert POST und ein gültiges CSRF-Token. Reparaturen zeigen eine separate Bestätigungsseite mit einem nicht absendenden „Abbrechen“-Link an und protokollieren den ausführenden Benutzer sowie das Ergebnis im Cacti-Protokoll.

## Befehlszeile

Führen Sie diese Befehle aus dem Cacti-Stammverzeichnis als Cacti-Poller-Benutzer aus, nicht als root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Die Textausgabe gibt pro Prüfung eine Zeile mit Status, Kategorie, Zusammenfassung und Detail aus. `--json` gibt ein `summary`-Objekt mit den Statuszählern sowie ein `checks`-Array aus, dessen Einträge `id`, `category`, `status`, `summary`, `detail` und – sofern eine Reparatur aus der Positivliste zutrifft – `repair`/`repairable` enthalten.

| Exit-Status | Bedeutung |
|---|---|
| `0` | Keine Prüfung ist fehlgeschlagen, oder die angeforderte Reparatur war erfolgreich. Warnungen ändern den Exit-Status nicht. |
| `1` | Mindestens eine Prüfung ist fehlgeschlagen, oder eine angeforderte Reparatur war nicht erfolgreich. |
| `2` | Verwendungsfehler: ein Reparaturlauf ohne `--yes` (`--preview` benötigt dies nicht), eine unbekannte Reparatur-ID, ein unbekanntes Ausgabeformat, eine nicht unterstützte Kombination aus `--symptom` und Format oder eine nicht auffindbare Cacti-Installation. |

Cacti erhöht `memory_limit` für jedes CLI-Skript, sodass die Prüfung der PHP-Laufzeitkonfiguration nur auf der Webseite aussagekräftig ist.

## Zeitgesteuerte Prüfungen und Benachrichtigungen

Aktivieren Sie unter **Konfiguration > Einstellungen > Doctor** die Option **Prüfungen zeitgesteuert ausführen** und wählen Sie ein Intervall zwischen 15 Minuten und einem Tag. Nach jedem fälligen Poller-Zyklus führt Doctor jede Prüfung in einem Hintergrundprozess aus, sodass die Laufzeit des Pollers selbst unbeeinträchtigt bleibt.

Jeder Lauf zeichnet den beobachteten Status jeder Prüfung auf. Aktive Warnungsausnahmen beeinflussen die Benachrichtigungsrichtlinie, ohne diese Beobachtung zu verändern. Wenn eine Prüfung fehlschlägt oder nicht mehr fehlschlägt, schreibt Doctor die Änderung in das Cacti-Protokoll und sendet – sofern **E-Mail-Adressen für Benachrichtigungen** festgelegt ist – eine E-Mail über die Mail-Einstellungen von Cacti an diese Adressen. **Bei Warnungen benachrichtigen** berücksichtigt zusätzlich Übergänge in den und aus dem Warnstatus. Der erste Lauf erfasst lediglich einen Ausgangszustand (Baseline).

Zeitgesteuerte Berichte laufen auf dem primären Poller unter einer Datenbank-Advisory-Sperre und unterliegen einem Worker-Limit von zwei Minuten. Doctor meldet den letzten Start sowie den letzten erfolgreichen Abschluss, sodass fehlende oder veraltete Ergebnisse sichtbar sind. Ergebnisse gelten für die Dauer des Intervalls zuzüglich eines Poller-Zyklus und drei Minuten als aktuell. Ein unvollständiger Lauf wird nach 5, 10, 20 und weiteren Minuten bis hin zum regulären Intervall wiederholt. Fehlgeschlagene Benachrichtigungszustellungen werden für bis zu drei Wiederholungsversuche mit steigenden Verzögerungen vorgehalten; korrigieren Sie danach die Mail-Einstellungen von Cacti und führen Sie `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` als Poller-Benutzer aus. Die Annahme durch den Mailserver bestätigt nicht die Zustellung im Posteingang.

Dieselbe Registerkarte legt die Schwellenwerte für die Poller-Laufzeit (80 % des Intervalls), den freien RRA-Speicherplatz (Warnung unter 10 %, Fehler unter 2 %), die Datenbank-Zeitabweichung (Warnung über 5 Sekunden, Fehler über 60) und die Größe des Cacti-Protokolls (100 MB) fest. Leere oder ungültige Werte fallen auf diese Standardwerte zurück.

## Monitoring-Integration

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` gibt eine Statuszeile mit Leistungsdaten aus und beendet das Programm mit `0` (OK), `1` (WARNING) oder `2` (CRITICAL), sodass Nagios, Icinga oder jedes kompatible System den Aufruf direkt ausführen kann. `--format=prometheus` schreibt das Prometheus-Textformat für den Textfile-Collector von node_exporter: `cacti_doctor_check_status` pro Prüfung (0 für bestanden oder akzeptierte Warnung, 1 für handlungsrelevante Warnung, 2 für Fehler), `cacti_doctor_check_observed_status` vor Ausnahmen, `cacti_doctor_check_accepted`, `cacti_doctor_checks` pro Status sowie `cacti_doctor_last_run_timestamp_seconds`. JSON-Prüfeinträge enthalten ein `assessment`-Feld; `not_assessed` bedeutet, dass die Prüfung anhand der verfügbaren Daten zu keinem Ergebnis gelangen konnte.

## Support-Paket

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Das Paket ist eine einzelne Textdatei mit den Versionen von Doctor, Cacti, PHP, Betriebssystem und Datenbank, Poller- und Boost-Statistiken, dem vollständigen Bericht sowie den letzten 200 Zeilen des Cacti-Protokolls. Werte, die auf Namen wie Passwort, Secret, Token, Community und Key folgen, werden maskiert. Doctor erstellt die Datei so, dass sie nur vom Eigentümer gelesen werden kann, und verweigert das Überschreiben einer bereits vorhandenen Datei. Prüfen Sie die Datei, bevor Sie sie irgendwo veröffentlichen.

## Reparaturrichtlinie

Doctor enthält eine Reparaturfunktion, `runtime_directories`. Sie erstellt fehlende Cacti-Laufzeitverzeichnisse und fügt Lese-, Schreib- und Ausführungsrechte für den Eigentümer hinzu, ohne bestehende Berechtigungen zu entfernen.

Sie zielt unter Cacti 1.3 auf `$cache_path`, `$log_path` und `$rra_path` ab, andernfalls auf die Verzeichnisse `cache`, `log` und `rra` der Installation. Bereits beschreibbare Verzeichnisse werden übersprungen; Verzeichnisse außerhalb der Cacti-Installation (wie etwa ein Protokollverzeichnis unter `/var/log`), symbolische Links sowie eine Ausführung als root werden abgelehnt. Die Funktion folgt niemals `path_cactilog`, sodass eine innerhalb eines Code-Verzeichnisses konfigurierte Protokolldatei die Reparatur nicht dorthin umleiten kann. Die Diagnose prüft in jeder Version weiterhin das Verzeichnis der konfigurierten Protokolldatei.

Sie ändert keine Eigentümer, führt keine Shell-Befehle aus, schreibt keine Konfiguration um und verändert keine Cacti-Anwendungsdaten. Neue Reparaturen müssen jeweils eine Diagnose, einen auf einer Positivliste geführten Handler, eine Bestätigung, eine Audit-Protokollierung und Tests umfassen.

## Symptome untersuchen

Operatoren und Administratoren können auf der Doctor-Seite **Symptom untersuchen** auswählen. Dieselben Regeln stehen über `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` oder `alerts_missing` mit Text- oder JSON-Ausgabe zur Verfügung. Support-Bundles enthalten relevante Symptomuntersuchungen.

Jeder Kandidat führt die beobachteten Prüfungen sowie einen nächsten Überprüfungsschritt auf. Kandidaten sind Hypothesen, keine bestätigten Grundursachen. Fehlende, nicht bewertete oder veraltete Beobachtungen begründen niemals eine Ursache. Web-Untersuchungen verwenden den nach Berechtigungen gefilterten Bericht; CLI-Berichte nutzen die Zugriffsrechte des Betriebssystemkontos.

## Aktualität von RRD-Updates

`filesystem.rrd_stale` prüft bis zu 500 aktive Datenquellen und schließt deaktivierte sowie nicht erreichbare Geräte aus. Bei größeren Installationen wechselt die Stichprobe stündlich, sodass wiederholte Durchläufe unterschiedliche Dateien abdecken. Die Prüfung vergleicht die Änderungszeitpunkte der Dateien mit dem größten Wert aus Poller-Intervall, Quell-RRD-Schrittweite und Profil-Schrittweite, multipliziert mit **RRD-Veralterungsintervalle** (Standardwert 3). Angezeigt werden die drei ältesten veralteten Dateien sowie die Anzahl der betroffenen Geräte. Web-Ergebnisse enthalten nur freigegebene Geräte.

`filesystem.rrd_files` ist eine separate Existenzprüfung. Sie sucht nach der RRD-Datei von bis zu 5.000 aktiven Datenquellen, einschließlich solcher auf deaktivierten oder nicht erreichbaren Geräten, und verwendet dieselbe stündliche Stichprobe.

Boost addiert das Doppelte seines konfigurierten Flush-Intervalls als Toleranz für Schreibvorgänge auf den Datenträger. Für einen anderen verzögerten Schreiber konfigurieren Sie **Toleranz für verzögerte RRD-Schreibvorgänge (Sekunden)**. Eine angekündigte `RRDCACHED_ADDRESS` ohne konfigurierte Toleranz oder ein ungültiges Boost-Intervall führt zu einem nicht bewerteten Ergebnis. Doctor leert niemals einen Cache, um diese Prüfung durchzuführen. Der Änderungszeitpunkt ist ein Nachweis für Datenträgeraktivität, kein Beweis für eine erfolgreiche Datenerfassung. Externes Caching, das Doctor nicht erkennen kann, muss explizit konfiguriert werden.

Fehlende, nicht lesbare und in die Zukunft datierte Dateien werden in den Details gezählt. Das Ergebnis lautet nur dann nicht bewertet, wenn keine der Stichprobendateien lesbar ist. Ein stichprobenbasiertes Ergebnis weist darauf hin, dass es nur einen Teil der Installation abdeckt; eine bestandene Prüfung gilt nicht für nicht geprüfte Dateien.

## Reparaturvorschau und Audit-Verlauf

Die Reparaturseite für Administratoren zeigt jeden betroffenen Pfad, die vorgeschlagene Aktion, die aktuellen Berechtigungen und die Zielberechtigungen an. Die Genehmigung ist an diese Vorschau, den handelnden Benutzer und eine Gültigkeitsdauer von fünf Minuten gebunden. Durch die Bestätigung wird die Vorschau verbraucht; ein verändertes Dateisystem erfordert eine neue Vorschau. Eine Ausführung als root, Pfade außerhalb der Installation, reparaturbedürftige Links und nicht erfüllte Dateisystemberechtigungen verhindern eine Genehmigung.

`--repair=runtime_directories --preview` gibt einen schreibgeschützten JSON-Plan aus. `--repair=runtime_directories --yes` genehmigt einen neu berechneten CLI-Plan und prüft ihn vor der Ausführung erneut. Das CLI-Konto muss bereits zur Reparatur der Installation berechtigt sein; es erbt keine Web-Rollen.

Ein strukturierter `repair.started`-Datensatz muss vor jeder Änderung am Dateisystem gespeichert werden. Ein verknüpfter `repair.completed`-Datensatz enthält den Schnappschuss nach der Reparatur und das Überprüfungsergebnis. Ein unterbrochener Vorgang hinterlässt einen Start-Datensatz zur weiteren Untersuchung. Ein Fehler beim Abschluss-Audit wird auch dann als Fehlschlag gemeldet, wenn Änderungen am Dateisystem vorgenommen wurden. Doctor fügt Eigentümerberechtigungen hinzu und erstellt Verzeichnisse; ein automatisches Rollback wird nicht versucht.

Administratoren mit der Cacti-Berechtigung „Settings/System Utilities“ können die neuesten 20 Audit-Einträge auf der Doctor-Seite einsehen. Das Plugin speichert die neuesten 200 Datensätze in `plugin_doctor_audit`; das Cacti-Protokoll erfasst zudem deren IDs, Aktionen und Akteure. Audit-Nutzdaten werden geschwärzt.

## Akzeptierte Warnungen

Administratoren mit der Cacti-Berechtigung „Settings/System Utilities“ können auf der Doctor-Seite aus einer aktuellen, bewerteten Warnung eine **Warnausnahme** erstellen. Eine Ausnahme erfordert einen Verantwortlichen, einen Grund und ein UTC-Überprüfungsdatum innerhalb von 90 Tagen. Sie läuft um Mitternacht UTC zu Beginn dieses Datums ab. Es können bis zu 100 Ausnahmen konfiguriert werden. Die Liste zeigt abgelaufene Einträge sowie IDs an, die im aktuellen Bericht nicht vorhanden sind, und ermöglicht deren Entfernung.

Die beobachtete Warnung bleibt sichtbar, zusammen mit ihrem Verantwortlichen, dem Grund und dem Ablaufdatum in den Diagnosedetails. JSON behält den beobachteten Status bei und fügt die Metadaten `accepted` und `acceptance` hinzu. Nagios schließt aktive akzeptierte Warnungen von seinem Exit-Schweregrad aus, nennt sie aber in seiner Ausgabe. Prometheus exportiert sowohl den beobachteten als auch den handlungsrelevanten Schweregrad. Der reguläre CLI-Exit-Status bleibt unverändert: Warnungen beenden bereits mit null, Fehler mit eins.

Geplante Warnungsbenachrichtigungen werden unterdrückt, solange die Ausnahme gilt; nach Ablauf oder Entfernung ist eine weiterhin bestehende Warnung wieder für Warnungsbenachrichtigungen berechtigt. Übergänge in einen Fehlerzustand sowie die Wiederherstellung nach einem Fehler lösen weiterhin Benachrichtigungen aus. Ein nicht bewertetes Ergebnis oder ein Fehler kann nicht akzeptiert werden. Persönliche Bestätigungen sind davon getrennt und unterdrücken nichts. Das Erstellen und Entfernen von Ausnahmen erfolgt transaktional zusammen mit dem Audit-Datensatz.

Beim Upgrade werden `plugin_doctor_audit` und `plugin_doctor_acceptance` erstellt, ohne Cacti-Anwendungsdaten zu verändern. Exportieren Sie vor der Deinstallation alle benötigten Verlaufsdaten: Bei der Deinstallation werden beide Plugin-Tabellen und die zugehörigen Einstellungen entfernt. Beim Zurücksetzen der Plugin-Dateien bleiben die Tabellen für Untersuchungen erhalten, ältere Versionen berücksichtigen jedoch keine Warnausnahmen.

## Anforderungen

| Cacti | PHP | Hinweise |
|---|---|---|
| 1.2.20 | 5.4 oder neuer | Doctors eigener Code ist zu PHP 5.4 kompatibel, sodass er Altsysteme vor einem Upgrade diagnostizieren kann |
| 1.2.31 | 8.0 oder neuer | Cactis `composer.json` erfordert `>=8.0` |
| Aktuelles 1.2.x | 8.2 oder neuer | Cactis `composer.json` erfordert `>=8.2` |
| `develop` (1.3) | 8.3 oder neuer | Cactis `composer.json` erfordert `^8.3` |

Die Zeile **PHP-Kompatibilität mit der installierten Cacti-Version** vergleicht die laufende PHP-Version mit der PHP-Anforderung in Cactis eigener Root-`composer.json`, einschließlich der Obergrenze einer Caret-Einschränkung wie `^8.3`. Die konfigurierte PHP-CLI-Programmdatei wird gegen dieselbe Anforderung geprüft. Doctor erkennt die von diesen Cacti-Paketen verwendeten Einschränkungsformen `>=` und `^`. Eine nicht lesbare, fehlerhafte, fehlende oder nicht erkannte Anforderung erzeugt eine Warnung; Cacti-1.2.20–1.2.30-Installationen ohne Manifest behalten ihre dokumentierte PHP-5.4-Untergrenze des Installers bei. Doctors eigene PHP-5.4-Kompatibilität begründet keine Kompatibilität mit einer neueren Cacti-Installation.

Die Zeile **Upstream-Sicherheitsunterstützung für PHP** beantwortet eine separate Frage: Erhält dieser PHP-Release-Zweig noch Sicherheitskorrekturen vom PHP-Projekt? Sie meldet das veröffentlichte Enddatum der Sicherheitsunterstützung für den Zweig und warnt nach diesem Datum. Beispielsweise kann PHP 8.1 die Laufzeitanforderung einer älteren Cacti-Installation erfüllen, während es keine Upstream-Sicherheitskorrekturen mehr erhält. Ein bestandenes Ergebnis bedeutet nicht, dass das installierte Patch-Release aktuell ist, und Doctor kann nicht feststellen, ob ein Betriebssystemanbieter zurückportierte Korrekturen bereitstellt.

Die Support-Daten sind aus dem [PHP-Support-Zeitplan](https://www.php.net/supported-versions.php) und der [End-of-Life-Liste](https://www.php.net/eol.php) in Doctor gebündelt, zuletzt geprüft am 2026-11-08. Unbekannte Zweige und Vorabversionen erzeugen eine Warnung statt einer angenommenen Bestätigung. Während der Diagnose erfolgt keine Netzwerkanfrage. Aktualisieren Sie Doctors Support-Daten, wenn PHP einen neuen Zeitplan veröffentlicht. Bestehende JSON-/Monitoring-IDs `php.version` und `php.security_baseline` bleiben unverändert.

## Entwicklung

Die Unit-Testsuite verwendet Pest und läuft unter PHP 8.2 oder neuer:

```console
composer install
composer test
```

Die Tests ersetzen die von Doctor aufgerufenen Cacti-Funktionen durch kleine Platzhalter in `tests/CactiStubs.php`, sodass sie ohne eine Cacti-Installation laufen.

GitHub Actions führt bei jedem Push und Pull Request vier Arten von Prüfungen aus:

- `php -l` für jede PHP-Datei unter PHP 5.4, 5.6, 7.0, 7.1, 7.4 sowie 8.0 bis 8.4.
- Die Unit-Testsuite unter PHP 8.2, 8.3 und 8.4.
- `locales/build_gettext.sh --check`, das bei einer veralteten Übersetzungsvorlage, einem unvollständigen oder als „fuzzy“ markierten Katalog oder einem kompilierten Katalog fehlschlägt, der von seiner Quelle abweicht.
- Sieben Integrationsjobs, die Cacti 1.2.20, den aktuellen 1.2.x-Zweig und `develop` gegen MySQL und MariaDB sowohl mit cmd.php als auch mit Spine installieren. Jeder Job installiert und aktiviert das Plugin, führt den vollständigen CLI-Bericht aus und prüft das Berichtsschema, die Gesamtsummen, die erwarteten Status sowie den genauen Satz an Fehlern. Anschließend beschädigt er einen Binärpfad und den Poller-Zeitstempel, bestätigt die Meldung beider Fehler, stellt sie wieder her, testet die Reparatur samt Bestätigung und führt Deaktivierung, Aktivierung, Deinstallation sowie Neuinstallation aus. Der JSON-Bericht wird bei Fehlschlag eines Jobs als Artefakt aufbewahrt.

## Mitwirken

Pull-Requests richten Sie bitte an `develop`. Halten Sie Produktivdateien kompatibel mit PHP 5.4 und verwenden Sie den Stil von Cacti: Tabulatoren, Zeichenketten in einfachen Anführungszeichen sowie Cacti-Hilfsfunktionen wie `read_config_option()` und `db_fetch_cell()`. Fügen Sie für jede Verhaltensänderung einen Unit-Test hinzu, signieren Sie Ihre Commits (`git commit -s`) und ergänzen Sie eine Zeile in `CHANGELOG.md`.

### Übersetzungen

Umschließen Sie jede für Benutzer sichtbare Meldung mit `__('...', 'doctor')` (oder `__n()`, `__x()`, `__esc()`) und verwenden Sie für einen Satz, der einen Wert enthält, eine einzelne Formatzeichenkette mit fortlaufenden Platzhaltern `%s`/`%d`, statt Einzelteile zu verketten. Die Funktion `__()` von Cacti formatiert eine Meldung nur dann, wenn sie einen Formatbezeichner enthält, und unterstützt keine positionellen `%1$s`-Formen. Außerdem wandelt sie `%%` vor dem Formatieren in `%` um, fügen Sie daher niemals ein literales Prozentzeichen in eine Meldung ein: Übergeben Sie den Wert samt Zeichen als Argument (`__('Usage: %s', '50%', 'doctor')`). Protokollzeilen bleiben auf Englisch: Verwenden Sie `doctor_repair_message()` für Reparaturtexte und `doctor_n_()` für Meldungen, die protokolliert und erst bei der Anzeige übersetzt werden. Lassen Sie Prüf-IDs, JSON-Schlüssel, Status-Schlüsselwörter, Monitoring-Ausgaben und Protokollzeilen unübersetzt.

`locales/build_gettext.sh` erzeugt die Vorlage `locales/po/cacti.pot` neu, führt sie mit jedem Katalog `locales/po/<locale>.po` zusammen und kompiliert `locales/LC_MESSAGES/<locale>.mo`; committen Sie alle drei Dateien. Die CI führt `sh locales/build_gettext.sh --check` aus und schlägt fehl, wenn die Vorlage veraltet ist oder einem Katalog ein Eintrag fehlt bzw. ein unscharfer („fuzzy“) Eintrag vorliegt, ein Platzhalter abweicht oder eine kompilierte Datei nicht aktuell ist. Bei einer geänderten Meldung müssen die Übersetzungen daher im selben Pull-Request aktualisiert werden. Dafür wird GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`) benötigt. Eine neue Sprache entspricht einer neuen Datei `<locale>.po`, benannt nach der Locale-Konvention von Cacti (zum Beispiel `pt-BR`).

## Sicherheit

Melden Sie Sicherheitslücken vertraulich wie in [SECURITY.md](../../../SECURITY.md) beschrieben und nicht über öffentliche Issues.

## Lizenz

Copyright (C) 2026 Thomas Vincent. Veröffentlicht unter der GNU General Public License, Version 2 oder höher. Siehe [LICENSE](../../../LICENSE).
