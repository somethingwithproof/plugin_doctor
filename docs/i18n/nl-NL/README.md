<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: een cactus met een stethoscoop. Diagnosticeren. Herstellen. Monitoren.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Quality Gate-status"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licentie: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ en 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor is een Cacti-plug-in die een installatie in één keer diagnosticeert en alleen kleine reparaties uitvoert wanneer een beheerder daarom vraagt.

**Status: in ontwikkeling, vóór 1.0.** De nieuwste release is [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Deze patch voegt Hindi en Arabische catalogi en vertaalde gebruikershandleidingen toe aan de rolgebaseerde toegang, begeleide diagnose, gerichte RRD-actualiteitscontroles, reparatievoorbeelden en auditgeschiedenis, geaccepteerde waarschuwingsuitzonderingen en vertalingen uit 0.6.0. Zie [CHANGELOG.md](../../../CHANGELOG.md) voor details.

## Schermafbeeldingen

Diagnostiek en planningsinstellingen in een geïsoleerde Cacti 1.2.31-demonstratie-installatie
op PHP 8.3.36, inclusief de controles voor Cacti PHP-compatibiliteit, upstream
beveiligingsondersteuning en databasegezondheid. De hier getoonde waarschuwingen en fouten
beschrijven die demo-omgeving.

![Diagnostische tabel van Doctor met resultaten voor geslaagd, waarschuwing en fout](../../screenshots/diagnostics.png)

![Instellingen van Doctor voor planning, meldingen en drempelwaarden](../../screenshots/settings.png)

Cacti-problemen uiten zich meestal als symptomen: lege grafieken, een gestopte poller of een plug-in die niet wil installeren. De oorzaak is vaak een verlopen randvoorwaarde, zoals een ontbrekende PHP-extensie in de CLI-build, een logmap waarin de poller niet kan schrijven, een RRDtool-pad dat naar het verkeerde binaire bestand verwijst of een database zonder tijdzone-tabellen. Doctor controleert deze randvoorwaarden rechtstreeks en rapporteert elke controle als geslaagd, waarschuwing of fout, met een zin die uitlegt wat er is aangetroffen. Hetzelfde rapport is beschikbaar op een webpagina, op de opdrachtregel en als JSON voor monitoring.

## Wat het controleert

| Onderdeel | Controles |
|---|---|
| Doctor | Of Doctor zelf als root draait, waardoor machtigingscontroles het verkeerde account zouden beschrijven |
| Cacti en PHP | Cacti-versie, een upgrade die het installatieprogramma nooit heeft afgerond, ingeschakelde plug-ins waarvan de bestanden ontbreken, PHP-compatibiliteit met het geïnstalleerde Cacti-pakket, status van upstream PHP-beveiligingsondersteuning |
| PHP-extensies | Vereiste extensies in de web-PHP en in de CLI-PHP die de poller gebruikt, plus aanbevolen functies |
| PHP-configuratie | `memory_limit`, `max_execution_time` en `date.timezone`, op basis van de eigen aanbevelingen van Cacti |
| Database | Connectiviteit, serverversie vergeleken met de aanbeveling van Cacti, UTF-8-tekenset, tijdzone-tabellen, kerntabellen, klokafwijking ten opzichte van de PHP-host en de InnoDB-instellingen die Cacti als fouten markeert |
| Databasegezondheid | Verbindingscapaciteit, buffer-pool-leesbewerkingen, tijdelijke schijftabellen, aanmaak van verbindingsthreads, trage instructies en InnoDB log-buffer-wachttijden, met werklastafhankelijke optimalisatiesuggesties |
| Bestandssysteem | Schrijfbare cache-, log- en RRA-mappen; vrije ruimte voor RRD-bestanden; actieve gegevensbronnen zonder RRD-bestand of met achterstallige bestandsupdates; `include/config.php` niet leesbaar voor iedereen; Cacti-log schrijfbaar en niet te groot |
| Binaire bestanden | PHP CLI, RRDtool, `snmpget`, `snmpwalk` en Spine wanneer dat de geconfigureerde poller is, inclusief versies waar Cacti er een vermeldt |
| Log | Fouten in de meest recente regels van het Cacti-logboek, met het meest voorkomende bericht |
| Apparaten | Ingeschakelde apparaten die offline zijn of herstellen, de drie apparaten die het langst offline zijn met hun laatste foutmelding, en een foutmelding wanneer de meeste apparaten tegelijk offline zijn |
| Poller | Pollertype en -interval, tijd sinds de hoofdpoller voor het laatst is voltooid, uitvoertijd ten opzichte van het interval, poller-uitvoer die nooit een RRD-bestand heeft bereikt, externe pollers die gestopt zijn met rapporteren, een vastgelopen Boost en een Spine-configuratie die naar een andere database verwijst |

Elke controle heeft een stabiele ID, zoals `database.timezone` of `binary.rrdtool`, zodat scripts op afzonderlijke resultaten kunnen selecteren.

## Code- en testoverzicht

| Gedrag | Implementatie | Testbewijs in deze repository |
|---|---|---|
| Diagnostische controles en stabiele rapport-ID's | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Rolgebaseerde toegang en geschoonde webrapporten | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Begeleide symptoomonderzoeken | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD-actualiteit en verwerking van uitgestelde schrijfbewerkingen | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Reparatievoorbeelden, auditgeschiedenis en geaccepteerde waarschuwingen | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Geplande controles en statusovergangen voor meldingen | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Deze verwijzingen geven de implementatie en testdekking aan; ze zeggen niet
dat elke CI-taak voor de huidige revisie is geslaagd. Controleer de workflowuitvoering
voor de revisie die u wilt uitrollen.

## Advies over databasegezondheid

De native PHP-analyzer van Doctor leest een vaste set globale MySQL- of MariaDB-tellers uit via de bestaande databaseverbinding van Cacti. De analyzer voert twee alleen-lezen query's per rapport uit, vereist geen extra inloggegevens of uitvoerbaar bestand en wijzigt nooit de databaseconfiguratie. Deze controles verschijnen in het webrapport, de CLI, JSON, monitoringuitvoer, het ondersteuningspakket en de statusregistratie van geplande controles.

| Controle-ID | Onderzoeksdrempel |
|---|---|
| `database.health_sample` | Minder dan 24 uur sinds opstarten of `FLUSH STATUS`, of onbeschikbare/inconsistente uptime |
| `database.connection_capacity` | Huidig aantal verbindingen of vastgelegde piek minstens 80% van de huidige `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` minstens 1%, met minstens 10.000 leesverzoeken |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` minstens 25%, met minstens 1.000 tijdelijke tabellen |
| `database.thread_cache` | `Threads_created / Connections` minstens 5%, met minstens 1.000 verbindingspogingen en `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` minstens 1%, met minstens 1.000 instructies |
| `database.redo_log_waits` | `Innodb_log_waits` ongelijk aan nul |

Dit zijn de onderzoeksdrempels van Doctor, geen configuratiedoelen van de leverancier. Behalve voor de verbindingscapaciteit vereist cumulatief advies het bovenstaande observatievenster. Ontbrekende, ongeldige, dubbele of buiten het bereik vallende tellers, onvoldoende activiteit en niet-ondersteunde threadmodi leveren waarschuwingen op in plaats van een gezonde beoordeling of een optimalisatieadvies. Waarschuwingen kunnen van invloed zijn op de Nagios-status en geplande meldingen wanneer **Melden bij waarschuwingen** is ingeschakeld.

Lees de gemeten tellers en de suggestie altijd samen. Cumulatieve waarden geven niet de actuele belasting weer; tellers kunnen verschillende resetgeschiedenissen hebben en vormen geen atomaire momentopname. Piekverbindingen kunnen een oudere limiet weerspiegelen. Het aantal trage query's hangt af van `long_query_time`, en de teller voor tijdelijke schijftabellen van MySQL kan geheugen-gemapte bestanden buiten beschouwing laten. Een lage verhouding bewijst niet dat er geen knelpunt is. Bevestig trends onder een representatieve werklast, bekijk queryplannen en hergebruik van verbindingen, en meet het geheugen op de **databasehost** voordat u buffers of verbindingslimieten aanpast.

Als statistieken niet beschikbaar zijn, controleer dan de serverondersteuning en de toegang van het Cacti-account tot `SHOW GLOBAL STATUS` en `SHOW GLOBAL VARIABLES`; Doctor vraagt geen verhoogde machtigingen aan. Tellerdefinities zijn afkomstig uit de [MySQL-naslag voor statusvariabelen](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) en de [MariaDB-naslag voor statusvariabelen](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Er wordt geen MySQLTuner-script of -code gebruikt.

Er is geen schema- of configuratiemigratie nodig. Installeer de plug-inbestanden op de gebruikelijke manier; door die bestanden terug te draaien worden de toegevoegde controles verwijderd. Bestaande geplande statusgegevens worden bij de volgende uitvoering vernieuwd.

## Hoe het veilig blijft

Een diagnostisch hulpmiddel draait met de rechten van de poller of de webserver en leest paden uit de instellingentabel, dus het moet voorzichtig zijn met wat het uitvoert en wijzigt.

- Diagnostiek is alleen-lezen. Bestanden, instellingen of gegevens worden nooit gewijzigd.
- Doctor voert een geconfigureerd binair bestand alleen uit als de bestandsnaam overeenkomt met het verwachte programma (`php`, `rrdtool`, `snmpget` of `snmpwalk`). Iedereen die naar de instellingentabel kan schrijven, zou anders kunnen kiezen wat Doctor uitvoert. Elke andere naam wordt als waarschuwing gerapporteerd en niet uitgevoerd.
- Doctor voert geconfigureerde binaire bestanden nooit als root uit en meldt wanneer het als root draait.
- Herstelacties komen uit een vaste acceptatielijst. Elke actie vereist een geauthenticeerde beheerdersactie in de webinterface of `--yes` op de opdrachtregel, en elke actie wordt naar het Cacti-logboek geschreven.

## Releases

Versies volgen SemVer en komen overeen met het `INFO`-bestand van de plug-in. Zie het
[releaseproces](../../releasing.md) voor versiekeuze, CI-gates, pakketinhoud,
controlesommen en instructies voor terugdraaien.

## Installatie

Download `doctor-VERSION.tar.gz` of `doctor-VERSION.zip` en `SHA256SUMS` van
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Controleer de SHA-256-controlesom van het archief en pak vervolgens de map `doctor/` uit in
de map `plugins/` van Cacti. Dit zijn de installeerbare pakketten; de automatische
bronarchieven van GitHub hebben een andere mapnaam. Om niet-uitgebrachte
wijzigingen uit `develop` te gebruiken, installeert u vanuit een broncheckout.

Voor broncheckouts:

Kloon of pak de repository uit als `plugins/doctor` binnen een Cacti-installatie. De map moet `doctor` heten, niet `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Installeer en schakel **Cacti Doctor** in via **Configuration > Plugin Management**, en ken vervolgens de realm **Doctor Viewer**, **Doctor Operator** of **Doctor Administrator** toe via de gebruikers- of groepsrechten in Cacti. Bestaande **Cacti Doctor**-rechten behouden Administrator-toegang na een upgrade. Het rapport verschijnt onder **Utilities > Cacti Doctor**.

## Talen

Doctor wordt geleverd met vertalingen in het Spaans (Spanje, `es-ES`), Frans (`fr-FR`), Duits (`de-DE`), Vereenvoudigd Chinees (`zh-CN`), Hindi (`hi-IN`), Arabisch (`ar-SA`) en Japans (`ja-JP`). Cacti toont deze zodra taalondersteuning is ingeschakeld (**Configuration > Settings > General > Language Support**) en een gebruiker de taal kiest. De webpagina, de instellingen en de meldingen en rapporttekst die de opdrachtregel afdrukt, volgen de taal van Cacti; het opdrachtregelrapport zelf gebruikt de standaardtaal van Cacti, die Engels blijft tenzij u deze wijzigt.

Machineleesbare uitvoer wordt nooit vertaald: controle-ID's, JSON-sleutels en statuswaarden, de uitvoer van `--format=nagios` en `--format=prometheus`, logregels en de sectiekoppen van de ondersteuningsbundel blijven in het Engels zodat scripts en monitoring in elke taal blijven werken. De tekst van `summary` en `detail` van elke controle is het enige vertaalde onderdeel van het JSON-rapport.

Een Latijns-Amerikaans Spaanse catalogus (`es-419`) wordt ook meegeleverd, maar noch Cacti 1.2 noch Cacti 1.3 heeft een Latijns-Amerikaans Spaanse locale om te selecteren, dus deze wordt pas actief wanneer Cacti er een toevoegt. Kies tot die tijd Spaans (`es-ES`).

Cacti laadt de catalogus van een plug-in uit `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` met `doctor` als tekstdomein, op zowel 1.2.x als 1.3 (1.3 bepaalt de plug-inmap via het configureerbare pad voor plug-ins).

## Toegangsniveaus

| Realm | Mogelijkheden |
|---|---|
| Doctor Viewer | De nieuwste geplande controlestatussen, observatietijd, actualiteit en recente geaggregeerde geschiedenis lezen. Geen diagnostische opdrachten, ruwe details, configuratie of herstelacties. |
| Doctor Operator | Een diagnostisch rapport uitvoeren met een proceslimiet van 120 seconden, geredigeerde details inspecteren en bevindingen bevestigen. Geen instellingen wijzigen of herstelacties uitvoeren. |
| Doctor Administrator | Mogelijkheden van Operator plus de bestaande herstelacties uit de acceptatielijst en Doctor-instellingen. Herstelacties en instellingen vereisen ook de Cacti-realm Settings/System Utilities. |

Het menu Utilities opent de pagina voor de hoogste Doctor-realm die aan de gebruiker is toegekend, inclusief groepstoekenningen. Nieuwe Viewer- en Operator-realms krijgen geen automatische toekenningen. De oorspronkelijke realm-ID blijft gekoppeld aan `doctor.php` als Administrator, waardoor bestaande gebruikers- en groepstoegang behouden blijft.

Viewer-gegevens zijn afkomstig van geplande controles. Schakel planning in voordat u Viewer-toegang verleent; ontbrekende of achterstallige observaties tonen **unknown**, nooit healthy. De geschiedenis bewaart de laatste 20 geplande geaggregeerde tellingen en sluit apparaatstatussen uit. Operators starten expliciet nieuwe diagnostiek; gewone paginavernieuwingen gebruiken het laatste rapport van hun sessie.

Apparaatdetails en totalen gebruiken de apparaatrechten van de huidige gebruiker. Logfragmenten vereisen bovendien de Cacti-realm Log Administration. Geheimen worden gemaskeerd voordat diagnostische details in de websessie worden opgeslagen of weergegeven. Toegang via de opdrachtregel blijft beheerd worden door het account van het besturingssysteem.

Bevestigingen zijn persoonlijk en worden vastgelegd in het Cacti-logboek. Ze gelden alleen voor dezelfde bevinding en hetzelfde bewijs; gewijzigd bewijs vereist een nieuwe bevestiging. Ze wijzigen nooit de status pass/warn/fail, onderdrukken geen meldingen en markeren een falende controle nooit als gezond. Dit staat los van uitzonderingen voor geaccepteerde waarschuwingen, die het meldingsbeleid beïnvloeden zonder de waargenomen status te wijzigen en hieronder worden beschreven.

Elke actie vereist POST en een geldig CSRF-token. Herstelacties tonen een afzonderlijke bevestigingspagina met een niet-verzendende Cancel-link en leggen de uitvoerende gebruiker en het resultaat vast in het Cacti-logboek.

## Opdrachtregel

Voer deze opdrachten uit vanuit de Cacti-hoofdmap als de Cacti-pollergebruiker, niet als root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Tekstuitvoer drukt één regel per controle af met de status, categorie, samenvatting en details. `--json` drukt een `summary`-object af met statustellingen en een `checks`-array waarvan de items `id`, `category`, `status`, `summary`, `detail` en `repair`/`repairable` bevatten wanneer een herstelactie uit de acceptatielijst van toepassing is.

| Exitstatus | Betekenis |
|---|---|
| `0` | Geen enkele controle is mislukt, of de gevraagde herstelactie is geslaagd. Waarschuwingen veranderen de exitstatus niet. |
| `1` | Ten minste één controle is mislukt, of een gevraagde herstelactie is niet geslaagd. |
| `2` | Gebruiksfout: een herstelactie uitgevoerd zonder `--yes` (`--preview` heeft dit niet nodig), een onbekende herstel-ID, een onbekend uitvoerformaat, een niet-ondersteunde combinatie van `--symptom` of formaat, of een Cacti-installatie die niet kan worden gevonden. |

Cacti verhoogt `memory_limit` voor elk CLI-script, dus de controle van de PHP-runtimeconfiguratie is alleen zinvol op de webpagina.

## Geplande controles en meldingen

Schakel onder **Configuration > Settings > Doctor** de optie **Run Checks on a Schedule** in en kies een interval van 15 minuten tot een dag. Na elke pollercyclus die aan de beurt is, voert Doctor elke controle uit in een achtergrondproces, zodat de eigen uitvoertijd van de poller niet wordt beïnvloed.

Elke uitvoering legt de waargenomen status van elke controle vast. Actieve uitzonderingen voor waarschuwingen beïnvloeden het meldingsbeleid zonder die observatie te wijzigen. Wanneer een controle begint of stopt met falen, schrijft Doctor de wijziging naar het Cacti-logboek en, als **Alert Email Addresses** is ingesteld, e-mailt die adressen via de e-mailinstellingen van Cacti. **Alert on Warnings** voegt wijzigingen naar en vanuit waarschuwingen toe. De eerste uitvoering legt alleen een basislijn vast.

Geplande rapporten worden uitgevoerd op de primaire poller onder een database-advisory-lock en hebben een worker-limiet van twee minuten. Doctor rapporteert de laatste start en succesvolle voltooiing zodat ontbrekende of verouderde resultaten zichtbaar zijn. Resultaten gelden als actueel gedurende het interval plus één pollingcyclus en drie minuten. Een uitvoering die niet wordt voltooid, wordt opnieuw geprobeerd na 5, 10, 20 en meer minuten, tot het normale interval. Mislukte meldingsbezorging wordt bewaard voor maximaal drie nieuwe pogingen met oplopende vertragingen; corrigeer daarna de e-mailinstellingen van Cacti en voer `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` uit als de pollergebruiker. Acceptatie door de mailserver bevestigt geen bezorging in het postvak IN.

Hetzelfde tabblad stelt de drempelwaarden in voor de uitvoertijd van de poller (80% van het interval), vrije schijfruimte voor RRA (waarschuwing onder 10%, fout onder 2%), klokafwijking van de database (waarschuwing boven 5 seconden, fout boven 60) en grootte van het Cacti-logboek (100 MB). Lege of ongeldige waarden vallen terug op deze standaardwaarden.

## Monitoringintegratie

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` drukt één statusregel met prestatiegegevens af en sluit af met `0` (OK), `1` (WARNING) of `2` (CRITICAL), zodat Nagios, Icinga of elk compatibel systeem het rechtstreeks kan uitvoeren. `--format=prometheus` schrijft het Prometheus-tekstformaat voor de textfile-collector van node_exporter: `cacti_doctor_check_status` per controle (0 geslaagd of geaccepteerde waarschuwing, 1 waarschuwing die actie vereist, 2 fout), `cacti_doctor_check_observed_status` vóór uitzonderingen, `cacti_doctor_check_accepted`, `cacti_doctor_checks` per status en `cacti_doctor_last_run_timestamp_seconds`. JSON-controlerijen bevatten een veld `assessment`; `not_assessed` betekent dat de controle geen conclusie kon trekken uit de beschikbare gegevens.

## Ondersteuningsbundel

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

De bundel is één tekstbestand met de versies van Doctor, Cacti, PHP, het besturingssysteem en de database, poller- en Boost-statistieken, het volledige rapport en de laatste 200 regels van het Cacti-logboek. Waarden die volgen op password-, secret-, token-, community- en key-namen worden gemaskeerd. Doctor maakt het bestand alleen leesbaar voor de eigenaar en weigert een bestaand bestand te overschrijven. Controleer het voordat u het ergens plaatst.

## Herstelbeleid

Doctor bevat één herstelactie: `runtime_directories`. Deze maakt ontbrekende Cacti-runtimemappen aan en voegt lees-, schrijf- en uitvoerbits voor de eigenaar toe zonder bestaande machtigingen te verwijderen.

De herstelactie richt zich op `$cache_path`, `$log_path` en `$rra_path` in Cacti 1.3, of anders op de mappen `cache`, `log` en `rra` van de installatie. Mappen die al beschrijfbaar zijn worden overgeslagen; mappen buiten de Cacti-installatie (zoals een logmap onder `/var/log`), symbolische links en uitvoering als root worden geweigerd. `path_cactilog` wordt nooit gevolgd, zodat een logbestand dat in een codemap is geconfigureerd de herstelactie daar niet naartoe kan omleiden. De diagnostiek controleert bij elke release nog steeds de map van het geconfigureerde logbestand.

De actie wijzigt geen eigendom, voert geen shell-opdrachten uit, herschrijft geen configuratie en past geen Cacti-applicatiegegevens aan. Nieuwe herstelacties moeten elk een diagnose, een op een allowlist geplaatste handler, bevestiging, auditlogging en tests bevatten.

## Symptomen onderzoeken

Operators en Administrators kunnen op de Doctor-pagina **Symptoom onderzoeken** selecteren. Dezelfde regels zijn beschikbaar via `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` of `alerts_missing`, met tekst- of JSON-uitvoer. Ondersteuningsbundels bevatten relevante symptoomonderzoeken.

Elke kandidaat vermeldt de waargenomen controles en een volgende verificatiestap. Kandidaten zijn hypothesen, geen bevestigde hoofdoorzaken. Ontbrekende, niet-beoordeelde of verouderde waarnemingen stellen nooit een oorzaak vast. Webonderzoeken gebruiken het op machtigingen gefilterde rapport; CLI-rapporten gebruiken de toegang van het besturingssysteemaccount.

## Actualiteit van RRD-updates

`filesystem.rrd_stale` controleert maximaal 500 actieve gegevensbronnen, met uitzondering van uitgeschakelde en niet-bereikbare apparaten. Bij grotere installaties verandert de steekproef elk uur, zodat herhaalde uitvoeringen verschillende bestanden bestrijken. De controle vergelijkt de wijzigingstijden van bestanden met het grootste van het poller-interval, de RRD-stap van de bron en de profielstap, vermenigvuldigd met **RRD-verouderingsintervallen** (standaard 3). De controle toont de drie oudste verouderde bestanden en het aantal getroffen apparaten. Webresultaten bevatten alleen toegestane apparaten.

`filesystem.rrd_files` is een afzonderlijke controle op het bestaan van bestanden. Deze zoekt naar het RRD-bestand van maximaal 5.000 actieve gegevensbronnen, inclusief die op uitgeschakelde of niet-bereikbare apparaten, en gebruikt dezelfde uurlijkse steekproef.

Boost voegt tweemaal zijn geconfigureerde flush-interval toe als speling voor schijfschrijfbewerkingen. Configureer voor een andere uitgestelde schrijver **Toegestane uitgestelde RRD-schrijftijd (seconden)**. Een geadverteerd `RRDCACHED_ADDRESS` zonder speling, of een ongeldig Boost-interval, levert een niet-beoordeeld resultaat op. Doctor flusht nooit een cache om deze controle uit te voeren. De wijzigingstijd is bewijs van schijfactiviteit, geen bewijs van geslaagde gegevensverzameling. Externe caching die Doctor niet kan detecteren, moet expliciet worden geconfigureerd.

Ontbrekende, onleesbare en in de toekomst gedateerde bestanden worden in de details meegeteld. Het resultaat is alleen niet-beoordeeld wanneer geen enkel bestand in de steekproef leesbaar is. Een steekproefresultaat geeft aan dat het slechts een deel van de installatie bestrijkt; een geslaagde controle geldt niet voor bestanden buiten de steekproef.

## Herstelvoorbeelden en auditgeschiedenis

De herstelpagina voor Administrators toont elk getroffen pad, de voorgestelde actie, de huidige machtigingen en de doelmachtigingen. Goedkeuring is gekoppeld aan dat voorbeeld, de uitvoerende gebruiker en een geldigheidsduur van vijf minuten. Bevestiging verbruikt het voorbeeld; een gewijzigd bestandssysteem vereist een nieuw voorbeeld. Uitvoering als root, paden buiten de installatie, links die herstel vereisen en niet-vervulde bestandssysteemmachtigingen voorkomen goedkeuring.

`--repair=runtime_directories --preview` drukt een alleen-lezen JSON-plan af. `--repair=runtime_directories --yes` keurt een nieuw berekend CLI-plan goed en controleert dit opnieuw vóór uitvoering. Het CLI-account moet al gemachtigd zijn om de installatie te herstellen; het erft geen webrollen.

Een gestructureerd record `repair.started` moet worden opgeslagen vóór elke wijziging aan het bestandssysteem. Een gekoppeld record `repair.completed` bevat de momentopname na herstel en het verificatieresultaat. Een onderbroken bewerking laat een gestart record achter voor onderzoek. Een fout bij de voltooiingsaudit wordt gerapporteerd als een mislukking, zelfs als er wijzigingen aan het bestandssysteem zijn opgetreden. Doctor voegt eigenaarsmachtigingen toe en maakt mappen aan; het probeert geen automatische rollback uit te voeren.

Administrators met de Cacti-machtiging Instellingen/Systeemhulpprogramma's kunnen de laatste 20 auditvermeldingen lezen op de Doctor-pagina. De plugin bewaart de laatste 200 records in `plugin_doctor_audit`; het Cacti-logboek legt ook hun ID's, acties en uitvoerders vast. Audit-payloads worden geredigeerd.

## Geaccepteerde waarschuwingen

Administrators met de Cacti-machtiging Instellingen/Systeemhulpprogramma's kunnen een **Waarschuwingsuitzondering** aanmaken vanuit een recente, beoordeelde waarschuwing op de Doctor-pagina. Een uitzondering vereist een eigenaar, een reden en een UTC-evaluatiedatum binnen 90 dagen. Deze verloopt om middernacht UTC aan het begin van die datum. Er kunnen maximaal 100 uitzonderingen worden geconfigureerd. De lijst toont verlopen vermeldingen en ID's die niet in het huidige rapport aanwezig zijn, en maakt verwijdering mogelijk.

De waargenomen waarschuwing blijft zichtbaar, met de eigenaar, reden en vervaldatum in de diagnostische details. JSON behoudt de waargenomen status en voegt de metagegevens `accepted` en `acceptance` toe. Nagios sluit actief geaccepteerde waarschuwingen uit van zijn exit-ernst, maar noemt ze in de uitvoer. Prometheus exporteert zowel de waargenomen als de bruikbare ernst. De normale CLI-exitstatus blijft ongewijzigd: waarschuwingen eindigen al met nul, fouten met één.

Geplande waarschuwingsmeldingen worden onderdrukt zolang de uitzondering van toepassing is; na verloop of verwijdering komt een aanhoudende waarschuwing opnieuw in aanmerking voor waarschuwingsmeldingen. Overgangen naar een foutstatus en herstel vanuit een foutstatus blijven in aanmerking komen voor meldingen. Een niet-beoordeeld resultaat of een fout kan niet worden geaccepteerd. Persoonlijke bevestiging staat hier los van en onderdrukt niets. Het aanmaken en verwijderen van uitzonderingen is transactioneel met het auditrecord.

Een upgrade maakt `plugin_doctor_audit` en `plugin_doctor_acceptance` aan zonder Cacti-applicatiegegevens te wijzigen. Exporteer eventuele benodigde geschiedenis voordat u de plugin verwijdert: bij het verwijderen worden beide plugintabellen en de instellingen ervan verwijderd. Als u teruggaat naar oudere pluginbestanden, blijven de tabellen beschikbaar voor onderzoek, maar oudere versies houden geen rekening met waarschuwingsuitzonderingen.

## Vereisten

| Cacti | PHP | Opmerkingen |
|---|---|---|
| 1.2.20 | 5.4 of nieuwer | De eigen code van Doctor is compatibel met PHP 5.4, zodat verouderde systemen vóór een upgrade kunnen worden gediagnosticeerd |
| 1.2.31 | 8.0 of nieuwer | Cacti's `composer.json` vereist `>=8.0` |
| Huidige 1.2.x | 8.2 of nieuwer | Cacti's `composer.json` vereist `>=8.2` |
| `develop` (1.3) | 8.3 of nieuwer | Cacti's `composer.json` vereist `^8.3` |

De rij **PHP-compatibiliteit met geïnstalleerde Cacti** vergelijkt de actieve PHP-versie met de PHP-vereiste in `composer.json` in de hoofdmap van Cacti, inclusief de bovengrens van een caret-beperking zoals `^8.3`. Het geconfigureerde uitvoerbare PHP CLI-bestand wordt aan dezelfde vereiste getoetst. Doctor herkent de beperkingsvormen `>=` en `^` die door deze Cacti-pakketten worden gebruikt. Een onleesbare, ongeldige, ontbrekende of niet-herkende vereiste levert een waarschuwing op; Cacti 1.2.20–1.2.30-installaties zonder manifest behouden hun gedocumenteerde PHP 5.4-installatievereiste. Doctors eigen compatibiliteit met PHP 5.4 toont geen compatibiliteit met een nieuwere Cacti-installatie aan.

De rij **Upstream beveiligingsondersteuning voor PHP** beantwoordt een afzonderlijke vraag: ontvangt die PHP-releasebranch nog beveiligingsoplossingen van het PHP-project? Deze meldt de gepubliceerde einddatum van de beveiligingsondersteuning voor de branch en geeft na die datum een waarschuwing. PHP 8.1 kan bijvoorbeeld voldoen aan de runtimevereiste van een oudere Cacti-installatie terwijl het geen upstream beveiligingsoplossingen meer ontvangt. Een geslaagd resultaat betekent niet dat de geïnstalleerde patchrelease actueel is, en Doctor kan niet vaststellen of een OS-leverancier gebackporteerde oplossingen levert.

Ondersteuningsdatums zijn meegeleverd met Doctor op basis van het [PHP-ondersteuningsschema](https://www.php.net/supported-versions.php) en de [end-of-life-lijst](https://www.php.net/eol.php), voor het laatst gecontroleerd op 2026-11-08. Onbekende branches en prereleases leveren een waarschuwing op in plaats van een verondersteld geslaagd resultaat. Tijdens de diagnostiek wordt er geen netwerkverzoek uitgevoerd. Werk de ondersteuningsgegevens van Doctor bij wanneer PHP een nieuw schema publiceert. De bestaande JSON-/monitoring-ID's `php.version` en `php.security_baseline` zijn ongewijzigd.

## Ontwikkeling

De unittestsuite maakt gebruik van Pest en draait op PHP 8.2 of nieuwer:

```console
composer install
composer test
```

De tests vervangen de Cacti-functies die Doctor aanroept door kleine stubs in `tests/CactiStubs.php`, zodat ze zonder een Cacti-installatie kunnen draaien.

GitHub Actions voert bij elke push en pull request vier soorten controles uit:

- `php -l` op elk PHP-bestand onder PHP 5.4, 5.6, 7.0, 7.1, 7.4 en 8.0 tot en met 8.4.
- De unittestsuite op PHP 8.2, 8.3 en 8.4.
- `locales/build_gettext.sh --check`, wat mislukt bij een verouderde vertaalsjabloon, een onvolledige of fuzzy catalogus, of een gecompileerde catalogus die afwijkt van de bron.
- Zeven integratietaken die Cacti 1.2.20, de huidige 1.2.x-branch en `develop` installeren met MySQL en MariaDB, met zowel cmd.php als Spine. Elke taak installeert en schakelt de plugin in, voert het volledige CLI-rapport uit en controleert het rapportschema, de samenvattingstotalen, de verwachte statussen en de exacte reeks fouten. Vervolgens maakt de taak een binair pad en de poller-tijdstempel ongeldig, bevestigt dat beide worden gemeld, herstelt ze, test de herstelactie en de bevestiging ervan, en voert uitschakelen, inschakelen, verwijderen en opnieuw installeren uit. Het JSON-rapport wordt als artefact bewaard wanneer een taak mislukt.

## Bijdragen

Pull requests gaan naar `develop`. Houd productiebestanden compatibel met PHP 5.4 en gebruik de stijl van Cacti: tabs, strings met enkele aanhalingstekens en Cacti-helpers zoals `read_config_option()` en `db_fetch_cell()`. Voeg voor elke gedragswijziging een unittest toe, onderteken je commits (`git commit -s`) en voeg een regel toe aan `CHANGELOG.md`.

### Vertalingen

Plaats elk voor de gebruiker zichtbaar bericht in `__('...', 'doctor')` (of `__n()`, `__x()`, `__esc()`) en geef een zin die een waarde bevat één enkele formatstring met opeenvolgende `%s`/`%d`-placeholders in plaats van losse delen samen te voegen. De functie `__()` van Cacti formatteert een bericht alleen wanneer het een formaatspecificatie bevat en ondersteunt geen positionele `%1$s`-vormen. Ook zet deze `%%` vóór het formatteren om in `%`, dus zet nooit een letterlijk procentteken in een bericht: geef de waarde inclusief het teken mee als argument (`__('Usage: %s', '50%', 'doctor')`). Logregels blijven in het Engels: gebruik `doctor_repair_message()` voor herstelteksten en `doctor_n_()` voor berichten die worden gelogd en alleen worden vertaald op de plek waar ze worden weergegeven. Laat controle-ID's, JSON-sleutels, statustrefwoorden, monitoringuitvoer en logregels onvertaald.

`locales/build_gettext.sh` genereert het sjabloon `locales/po/cacti.pot` opnieuw, voegt het samen met elke catalogus `locales/po/<locale>.po` en compileert `locales/LC_MESSAGES/<locale>.mo`; commit alle drie. CI voert `sh locales/build_gettext.sh --check` uit, wat mislukt als het sjabloon verouderd is, als een catalogus een item mist of een fuzzy-item bevat, als een placeholder verschilt of als een gecompileerd bestand niet actueel is. Voor een gewijzigd bericht moeten de vertalingen daarom in dezelfde pull request worden bijgewerkt. Hiervoor is GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`) vereist. Een nieuwe taal is een nieuw bestand `<locale>.po` met dezelfde naamgeving voor locales als Cacti gebruikt (bijvoorbeeld `pt-BR`).

## Beveiliging

Meld kwetsbaarheden privé zoals beschreven in [SECURITY.md](../../../SECURITY.md), en niet via openbare issues.

## Licentie

Copyright (C) 2026 Thomas Vincent. Uitgebracht onder de GNU General Public License, versie 2 of hoger. Zie [LICENSE](../../../LICENSE).
