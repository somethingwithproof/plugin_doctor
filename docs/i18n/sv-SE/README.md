<!-- Source: README.md; SHA256: ee03c7ac68aca21c8155c29b5b43a1f206c2f0c379c8b07bb4113919c18aafde -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: en kaktus med ett stetoskop. Diagnostisera. Åtgärda. Övervaka.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status för Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licens: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ och 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor är ett Cacti-tillägg som diagnostiserar en installation i en enda körning och utför mindre reparationer först när en administratör begär det.

**Status: under utveckling, före 1.0.** Den senaste utgåvan är [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Denna patch lägger till språkkataloger för hindi och arabiska samt översatta användarguider utöver den rollbegränsade åtkomsten, guidade diagnostiken, avgränsade kontroller av RRD-aktualitet, förhandsgranskningar av reparationer och granskningshistorik, accepterade varningsundantag samt översättningar i 0.6.0. Se [CHANGELOG.md](../../../CHANGELOG.md) för mer information.

## Skärmbilder

Diagnostik- och schemaläggningsinställningar i en isolerad demonstrationsinstallation av Cacti 1.2.31 med PHP 8.3.36, inklusive kontrollerna av PHP-kompatibilitet för Cacti, säkerhetsstöd uppströms och databashälsa. De varningar och fel som visas här beskriver den demonstrationsmiljön.

![Doctors diagnostiktabell med godkända resultat, varningar och fel](../../screenshots/diagnostics.png)

![Doctors inställningar för schemaläggning, aviseringar och tröskelvärden](../../screenshots/settings.png)

Problem i Cacti visar sig ofta som symtom: tomma grafer, en poller som har stannat eller ett tillägg som inte går att installera. Orsaken är ofta en förutsättning som har ändrats, till exempel ett saknat PHP-tillägg i CLI-bygget, en loggkatalog som pollern inte kan skriva till, en RRDtool-sökväg som pekar på fel binär eller en databas utan tidszonstabeller. Doctor kontrollerar dessa förutsättningar direkt och rapporterar var och en som godkänd, varning eller fel tillsammans med en mening som förklarar vad som hittades. Samma rapport finns tillgänglig på en webbsida, via kommandoraden och som JSON för övervakning.

## Vad som kontrolleras

| Område | Kontroller |
|---|---|
| Doctor | Om Doctor själv körs som root, vilket skulle få behörighetskontroller att beskriva fel konto |
| Cacti och PHP | Cacti-version, en uppgradering som installationsprogrammet aldrig slutförde, aktiverade tillägg vars filer saknas, PHP-kompatibilitet med det installerade Cacti-paketet, status för PHP:s säkerhetsstöd uppströms |
| PHP-tillägg | Nödvändiga tillägg i webb-PHP och i den CLI-PHP som pollern använder, samt rekommenderade funktioner |
| PHP-konfiguration | `memory_limit`, `max_execution_time` och `date.timezone` enligt Cactis egna rekommendationer |
| Databas | Anslutningsbarhet, serverversion mot Cactis rekommendation, UTF-8-teckenuppsättning, tidszonstabeller, kärntabeller, klockavvikelse från PHP-värden samt de InnoDB-inställningar som Cacti flaggar som fel |
| Databashälsa | Anslutningskapacitet, läsningar från buffertpoolen, temporära tabeller på disk, skapande av anslutningstrådar, långsamma satser och väntetider i InnoDB-loggbufferten, med arbetslastberoende justeringsförslag |
| Filsystem | Skrivbara cache-, logg- och RRA-kataloger; ledigt utrymme för RRD-filer; aktiva datakällor som saknar RRD-fil eller har försenade filuppdateringar; att `include/config.php` inte är läsbar för alla; att Cacti-loggen är skrivbar och inte för stor |
| Binärer | PHP CLI, RRDtool, `snmpget`, `snmpwalk` och Spine när den är konfigurerad poller, inklusive versioner där Cacti anger en |
| Logg | Fel bland de senaste raderna i Cacti-loggen, med det vanligaste meddelandet |
| Enheter | Aktiverade enheter som är nere eller håller på att återhämta sig, de tre som varit nere längst med sitt senaste fel samt ett felutfall när de flesta enheterna är nere samtidigt |
| Poller | Pollertyp och intervall, tid sedan huvudpollern senast slutfördes, körtid i förhållande till intervallet, pollerutdata som aldrig nådde en RRD-fil, fjärrpollers som slutat rapportera, en avstannad Boost samt en Spine-konfiguration som pekar på en annan databas |

Varje kontroll har ett stabilt ID, såsom `database.timezone` eller `binary.rrdtool`, så att skript kan referera till enskilda resultat.

## Kod- och testöversikt

| Beteende | Implementering | Testbelägg i detta arkiv |
|---|---|---|
| Diagnostiska kontroller och stabila rapport-ID:n | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Rollbegränsad åtkomst och maskerade webbrapporter | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Guidade symtomutredningar | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD-aktualitet och hantering av uppskjutna skrivningar | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Förhandsgranskningar av reparationer, granskningshistorik och accepterade varningar | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Schemalagda kontroller och aviseringsövergångar | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Dessa referenser anger implementeringen och testtäckningen; de säger inte att varje CI-jobb har passerat för den aktuella revisionen. Kontrollera arbetsflödeskörningen för den revision du planerar att driftsätta.

## Råd om databashälsa

Doctors inbyggda PHP-analysator läser en fast uppsättning globala MySQL- eller MariaDB-räknare via Cactis befintliga databasanslutning. Den gör två skrivskyddade frågor per rapport, kräver inga extra inloggningsuppgifter eller körbara filer och ändrar aldrig databaskonfigurationen. Dessa kontroller visas i webbrapporten, CLI, JSON, övervakningsutdata, supportpaketet och den schemalagda statusspårningen.

| Kontroll-ID | Utlösare för utredning |
|---|---|
| `database.health_sample` | Mindre än 24 timmar sedan start eller `FLUSH STATUS`, eller otillgänglig/inkonsekvent drifttid |
| `database.connection_capacity` | Aktuella eller registrerade toppanslutningar minst 80 % av aktuellt `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` minst 1 %, med minst 10 000 läsbegäranden |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` minst 25 %, med minst 1 000 temporära tabeller |
| `database.thread_cache` | `Threads_created / Connections` minst 5 %, med minst 1 000 anslutningsförsök och `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` minst 1 %, med minst 1 000 satser |
| `database.redo_log_waits` | Nollskilt `Innodb_log_waits` |

Detta är Doctors tröskelvärden för utredning, inte leverantörens konfigurationsmål. Med undantag för anslutningskapaciteten kräver kumulativa råd observationsfönstret ovan. Saknade, felaktigt formaterade, duplicerade eller för stora räknare, otillräcklig aktivitet samt trådlägen som inte stöds ger varningar i stället för ett friskt utlåtande eller en justeringsrekommendation. Varningar kan påverka Nagios-status och schemalagda aviseringar när **Avisera vid varningar** är aktiverat.

Läs de uppmätta räknarna och förslaget tillsammans. Kumulativa värden fastställer inte aktuell belastning; räknare kan ha olika återställningshistorik och utgör inte en atomär ögonblicksbild. Toppanslutningar kan återspegla en äldre gräns. Antalet långsamma frågor beror på `long_query_time`, och MySQL:s räknare för temporära tabeller på disk kan utelämna minnesmappade filer. En låg kvot bevisar inte att det saknas en flaskhals. Bekräfta trender under en representativ arbetslast, granska frågeplaner och återanvändning av anslutningar samt mät minnet på **databasvärden** innan du ändrar buffertar eller anslutningsgränser.

Om mätvärden saknas, kontrollera serverstödet och Cacti-kontots behörighet till `SHOW GLOBAL STATUS` och `SHOW GLOBAL VARIABLES`; Doctor begär inte förhöjda behörigheter. Räknardefinitionerna kommer från [MySQL:s referens för statusvariabler](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) och [MariaDB:s referens för statusvariabler](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Inget skript eller någon kod från MySQLTuner används.

Ingen schema- eller konfigurationsmigrering behövs. Driftsätt tilläggsfilerna som vanligt; att återställa dessa filer tar bort den tillagda diagnostiken. Befintlig schemalagd status uppdateras vid nästa körning.

## Hur säkerheten upprätthålls

Ett diagnostikverktyg körs med pollerns eller webbserverns behörigheter och läser sökvägar från inställningstabellen, så det måste vara försiktigt med vad det exekverar och ändrar.

- Diagnostiken är skrivskyddad. Den ändrar aldrig filer, inställningar eller data.
- Doctor kör endast en konfigurerad binärfil när dess filnamn motsvarar det förväntade programmet (`php`, `rrdtool`, `snmpget` eller `snmpwalk`). Annars skulle vem som helst som kan skriva till inställningstabellen kunna välja vad Doctor kör. Alla andra namn rapporteras som en varning och exekveras inte.
- Doctor kör aldrig konfigurerade binärfiler som root, och det rapporterar när det körs som root.
- Reparationer kommer från en fast tillåten lista (allow-list). Varje reparation kräver en autentiserad administratörsåtgärd i webbgränssnittet eller `--yes` i CLI, och varje reparation skrivs till Cacti-loggen.

## Utgåvor

Versioner följer SemVer och motsvarar pluginets `INFO`-fil. Se
[releaseprocessen](../../releasing.md) för versionsval, CI-grindar,
paketinnehåll, kontrollsummor och återställningsinstruktioner.

## Installation

Ladda ner `doctor-VERSION.tar.gz` eller `doctor-VERSION.zip` och `SHA256SUMS` från
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Verifiera arkivets SHA-256-kontrollsumma och extrahera sedan dess `doctor/`-katalog till
Cactis `plugins/`-katalog. Dessa är de installerbara paketen; GitHubs
automatiska källkodsarkiv har ett annat katalognamn. För att köra outgiven
kod från `develop`, installera från en källkodscheckout.

För källkodscheckouts:

Klona eller packa upp arkivet som `plugins/doctor` i en Cacti-installation. Katalogen måste heta `doctor`, inte `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Installera och aktivera **Cacti Doctor** under **Configuration > Plugin Management** och tilldela sedan behörighetsområdet **Doctor Viewer**, **Doctor Operator** eller **Doctor Administrator** via Cactis användar- eller gruppbehörigheter. Befintliga **Cacti Doctor**-tilldelningar behåller Administrator-åtkomst efter uppgradering. Rapporten visas under **Utilities > Cacti Doctor**.

## Språk

Doctor levereras med 48 icke-engelska översättningskataloger under `locales/po/` och `locales/LC_MESSAGES/` som omfattar språklägen inom Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`) samt afrikanska (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), asiatiska (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) och sydösteuropeiska (`bs-BA`, `hr-HR`, `sr-RS`) språklägen. Cacti visar en katalog när språkstöd är aktiverat (**Configuration > Settings > General > Language Support**) och en användare väljer ett språkläge som Cacti tillgängliggör i sin språkväljare; kataloger för språklägen som ännu inte finns listade i Cactis språkväljare träder i kraft när Cacti lägger till dem. Webbsidan, inställningarna samt meddelanden och rapporttext som kommandoraden skriver ut följer Cactis språk; själva kommandoradsrapporten använder Cactis standardspråk, som förblir engelska om du inte ändrar det.

Maskinläsbar utdata översätts aldrig: kontroll-ID:n, JSON-nycklar och statusvärden, utdata för `--format=nagios` och `--format=prometheus`, loggrader och rubrikerna för supportpaketets avsnitt förblir på engelska så att skript och övervakning fortsätter fungera på alla språk. Fälten `summary` och `detail` för varje kontroll är den enda översatta delen av JSON-rapporten.

En latinamerikansk spansk språkkatalog (`es-419`) ingår också, men varken Cacti 1.2 eller Cacti 1.3 har en latinamerikansk spansk lokal att välja, så den träder i kraft först när Cacti lägger till en sådan. Tills dess väljer du spanska (`es-ES`).

Cacti läser in ett plugins språkkatalog från `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` med `doctor` som textdomän, på både 1.2.x och 1.3 (1.3 löser upp pluginkatalogen via sin konfigurerbara plugins-sökväg).

## Åtkomstnivåer

| Behörighetsområde | Rättigheter |
|---|---|
| Doctor Viewer | Läsa senaste schemalagda kontrollstatusar, observationstid, aktualitet och nylig aggregerad historik. Inga diagnostikkommandon, råa detaljer, konfiguration eller reparationer. |
| Doctor Operator | Köra en diagnostikrapport med en processgräns på 120 sekunder, granska maskerade detaljer och kvittera fynd. Inga inställningsändringar eller reparationer. |
| Doctor Administrator | Operator-rättigheter plus befintliga tillåtna reparationer (allow-listed) och Doctor-inställningar. Reparationer och inställningar kräver även Cactis behörighetsområde Settings/System Utilities. |

Utilities-menyn öppnar sidan för det högsta Doctor-behörighetsområde som tilldelats användaren, inklusive grupptilldelningar. Nya Viewer- och Operator-områden får inga automatiska tilldelningar. Det ursprungliga behörighetsområdes-ID:t förblir knutet till `doctor.php` som Administrator, vilket bevarar befintlig användar- och gruppåtkomst.

Viewer-data kommer från schemalagda kontroller. Aktivera schemaläggning innan du ger Viewer-åtkomst; saknade eller försenade observationer visar **unknown**, aldrig felfri. Historiken sparar de senaste 20 schemalagda aggregerade räkningarna och exkluderar enhetsstatus. Operators startar nya diagnostikkörningar uttryckligen; vanliga siduppdateringar använder sessionens senaste rapport.

Enhetsdetaljer och summor använder den aktuella användarens enhetsbehörigheter. Loggutdrag kräver dessutom Cactis behörighetsområde Log Administration. Hemligheter maskeras innan diagnostikdetaljer lagras i webbsessionen eller renderas. CLI-åtkomst styrs fortfarande av operativsystemets konto.

Kvitteringar är personliga och registreras i Cacti-loggen. De gäller endast samma fynd och bevis; ändrade bevis kräver en ny kvittering. De ändrar aldrig statusen godkänd/varning/fel, undertrycker inte larm och markerar aldrig en felande kontroll som felfri. Detta är skilt från undantag för accepterade varningar, som påverkar larmpolicyn utan att ändra den observerade statusen och beskrivs nedan.

Varje åtgärd kräver POST och en giltig CSRF-token. Reparationer visar en separat bekräftelsesida med en Cancel-länk som inte skickar formuläret, och registrerar den utförande användaren och resultatet i Cacti-loggen.

## Kommandorad

Kör dessa från Cactis rotkatalog som Cactis polleranvändare, inte root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Textutdata skriver ut en rad per kontroll med dess status, kategori, sammanfattning och detalj. `--json` skriver ut ett `summary`-objekt med statusräkningar och en `checks`-array vars poster innehåller `id`, `category`, `status`, `summary`, `detail` samt `repair`/`repairable` när en tillåten reparation är tillämplig.

| Slutstatus | Betydelse |
|---|---|
| `0` | Ingen kontroll misslyckades, eller den begärda reparationen lyckades. Varningar ändrar inte slutstatusen. |
| `1` | Minst en kontroll misslyckades, eller en begärd reparation lyckades inte. |
| `2` | Användningsfel: en reparation körd utan `--yes` (`--preview` behöver det inte), ett okänt reparations-ID, ett okänt utdataformat, en kombination av `--symptom` och format som inte stöds, eller en Cacti-installation som inte kan hittas. |

Cacti höjer `memory_limit` för varje CLI-skript, så kontrollen av PHP-körtidskonfigurationen är endast meningsfull på webbsidan.

## Schemalagda kontroller och larm

Under **Configuration > Settings > Doctor** aktiverar du **Run Checks on a Schedule** och väljer ett intervall från 15 minuter till ett dygn. Efter varje pollercykel som förfaller kör Doctor varje kontroll i en bakgrundsprocess, så pollerns egen körtid påverkas inte.

Varje körning registrerar varje kontrolls observerade status. Aktiva varningsundantag påverkar larmpolicyn utan att ändra den observationen. När en kontroll börjar eller slutar fallera skriver Doctor ändringen till Cacti-loggen och, om **Alert Email Addresses** är angivet, skickar e-post till dessa adresser via Cactis e-postinställningar. **Alert on Warnings** lägger till övergångar in i och ut ur varningar. Den första körningen registrerar bara en baslinje.

Schemalagda rapporter körs på den primära pollern under ett rådgivande databaslås (advisory lock) och har en arbetsgräns på två minuter. Doctor rapporterar den senaste starten och lyckade slutförandet så att saknade eller föråldrade resultat syns. Resultat räknas som aktuella under intervallet plus en pollercykel och tre minuter. En körning som inte slutförs försöks igen efter 5, 10, 20 och fler minuter, upp till det normala intervallet. Misslyckad larmleverans sparas för upp till tre nya försök med ökande fördröjning; därefter korrigerar du Cactis e-postinställningar och kör `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` som polleranvändaren. Att e-postservern accepterar meddelandet bekräftar inte leverans till inkorgen.

Samma flik anger tröskelvärden för pollerns körtid (80 % av intervallet), ledigt diskutrymme för RRA (varning under 10 %, fel under 2 %), databasklockans avvikelse (varning över 5 sekunder, fel över 60) och Cacti-loggens storlek (100 MB). Tomma eller ogiltiga värden faller tillbaka till dessa standardvärden.

## Övervakningsintegration

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` skriver ut en statusrad med prestandadata och avslutar med `0` (OK), `1` (WARNING) eller `2` (CRITICAL), så Nagios, Icinga eller valfritt kompatibelt system kan köra det direkt. `--format=prometheus` skriver Prometheus-textformatet för node_exporters textfile collector: `cacti_doctor_check_status` per kontroll (0 godkänd eller accepterad varning, 1 åtgärdsbar varning, 2 fel), `cacti_doctor_check_observed_status` före undantag, `cacti_doctor_check_accepted`, `cacti_doctor_checks` per status och `cacti_doctor_last_run_timestamp_seconds`. JSON-kontrollrader innehåller ett `assessment`-fält; `not_assessed` betyder att kontrollen inte kunde dra en slutsats från tillgängliga data.

## Supportpaket

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Paketet är en enda textfil med versioner av Doctor, Cacti, PHP, OS och databas, poller- och Boost-statistik, den fullständiga rapporten samt de senaste 200 raderna i Cacti-loggen. Värden som följer efter namn på lösenord, hemlighet, token, community och nyckel maskeras. Doctor skapar filen läsbar endast för dess ägare och vägrar skriva över en befintlig fil. Granska den innan du publicerar den någonstans.

## Reparationspolicy

Doctor innehåller en reparation, `runtime_directories`. Den skapar saknade körtidskataloger för Cacti och lägger till läs-, skriv- och körningsrättigheter för ägaren utan att ta bort befintliga behörigheter.

Den riktar in sig på `$cache_path`, `$log_path` och `$rra_path` i Cacti 1.3, eller annars installationens kataloger `cache`, `log` och `rra`. Den hoppar över kataloger som redan är skrivbara, avvisar kataloger utanför Cacti-installationen (till exempel en loggkatalog under `/var/log`), avvisar symboliska länkar och vägrar köra som root. Den följer aldrig `path_cactilog`, så en loggfil som konfigurerats i en kodkatalog kan inte omdirigera reparationen dit. Diagnostiken kontrollerar fortfarande katalogen för den konfigurerade loggfilen i alla versioner.

Den ändrar inte ägarskap, kör inga skalkommandon, skriver inte om konfiguration och modifierar inte Cactis applikationsdata. Nya reparationer måste var och en innehålla en diagnostik, en tillåten hanterare, bekräftelse, granskningsloggning och tester.

## Undersöka symtom

Operatörer och administratörer kan välja **Undersök ett symtom** på Doctor-sidan. Samma regler finns tillgängliga via `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` eller `alerts_missing`, med text- eller JSON-utdata. Supportpaket inkluderar relevanta symtomundersökningar.

Varje kandidat listar de observerade kontrollerna och ett nästa verifieringssteg. Kandidater är hypoteser, inte bekräftade grundorsaker. Saknade, obedömda eller inaktuella observationer fastställer aldrig en orsak. Webbundersökningar använder den behörighetsfiltrerade rapporten; CLI-rapporter använder operativsystemskontots åtkomst.

## Aktualitet för RRD-uppdateringar

`filesystem.rrd_stale` kontrollerar upp till 500 aktiva datakällor, exklusive inaktiverade och nere enheter. På större installationer ändras urvalet varje timme, så upprepade körningar täcker olika filer. Den jämför filernas ändringstider med det största av pollerintervallet, källans RRD-steg och profilsteget, multiplicerat med **RRD-intervall för inaktualitet** (standard 3). Den visar de tre äldsta inaktuella filerna och antalet berörda enheter. Webbresultat inkluderar endast tillåtna enheter.

`filesystem.rrd_files` är en separat existenskontroll. Den letar efter RRD-filen för upp till 5 000 aktiva datakällor, inklusive de på inaktiverade eller nere enheter, och använder samma timvisa urval.

Boost lägger till dubbla sitt konfigurerade tömningsintervall som tolerans för diskskrivning. För en annan fördröjd skrivare konfigurerar du **Tolerans för fördröjd RRD-skrivning (sekunder)**. En annonserad `RRDCACHED_ADDRESS` utan tolerans, eller ett ogiltigt Boost-intervall, ger ett obedömt resultat. Doctor tömmer aldrig en cache för att utföra denna kontroll. Ändringstid är ett tecken på diskaktivitet, inte ett bevis på lyckad datainsamling. Extern cachning som Doctor inte kan upptäcka måste konfigureras uttryckligen.

Saknade, oläsbara och framtidsdaterade filer räknas i detaljerna. Resultatet blir obedömt endast när ingen fil i urvalet är läsbar. Ett urvalsresultat anger att det endast täcker en del av installationen; ett godkänt resultat omfattar inte filer utanför urvalet.

## Förhandsgranskning av reparationer och granskningshistorik

Administratörens reparationssida visar varje berörd sökväg, dess föreslagna åtgärd, aktuella behörigheter och målbehörigheter. Godkännandet är knutet till den förhandsgranskningen, den utförande användaren och en livstid på fem minuter. Bekräftelsen förbrukar förhandsgranskningen; ett ändrat filsystem kräver en ny förhandsgranskning. Körning som root, sökvägar utanför installationen, länkar som kräver reparation och ouppfyllda filsystembehörigheter förhindrar godkännande.

`--repair=runtime_directories --preview` skriver ut en skrivskyddad JSON-plan. `--repair=runtime_directories --yes` godkänner en nyligen beräknad CLI-plan och kontrollerar den på nytt före körning. CLI-kontot måste redan ha behörighet att reparera installationen; det ärver inte webbroller.

En strukturerad `repair.started`-post måste sparas före varje ändring i filsystemet. En länkad `repair.completed`-post innehåller ögonblicksbilden efter reparationen och verifieringsresultatet. En avbruten åtgärd lämnar kvar en startad post för utredning. Ett fel vid slutförandegranskningen rapporteras som ett fel även om ändringar i filsystemet har skett. Doctor lägger till ägarbehörigheter och skapar kataloger; den försöker inte göra automatisk återställning.

Administratörer med Cactis behörighet Settings/System Utilities kan läsa de 20 senaste granskningsposterna på Doctor-sidan. Tillägget behåller de 200 senaste posterna i `plugin_doctor_audit`; Cacti-loggen registrerar också deras ID:n, åtgärder och aktörer. Granskningsdata maskeras.

## Accepterade varningar

Administratörer med Cactis behörighet Settings/System Utilities kan skapa ett **Varningsundantag** från en aktuell, bedömd varning på Doctor-sidan. Ett undantag kräver en ägare, en orsak och ett UTC-granskningsdatum inom 90 dagar. Det löper ut vid midnatt UTC i början av det datumet. Upp till 100 undantag kan konfigureras. Listan visar utgångna poster och ID:n som inte finns i den aktuella rapporten, och tillåter borttagning.

Den observerade varningen förblir synlig, med dess ägare, orsak och utgångsdatum i diagnostikdetaljerna. JSON behåller den observerade statusen och lägger till `accepted`- och `acceptance`-metadata. Nagios exkluderar aktiva accepterade varningar från sin slutkodsnivå men namnger dem i sin utdata. Prometheus exporterar både observerad och åtgärdskrävande allvarlighetsgrad. Vanlig CLI-slutkod förblir oförändrad: varningar returnerar redan noll och fel returnerar ett.

Schemalagda varningsaviseringar undertrycks medan undantaget gäller; när det löper ut eller tas bort blir en kvarstående varning aktuell för varningsaviseringar igen. Övergångar till fel och återhämtning från fel förblir aktuella för aviseringar. Ett obedömt resultat eller ett fel kan inte accepteras. Personlig kvittering är separat och undertrycker ingenting. Skapande och borttagning av undantag sker transaktionellt med granskningsposten.

Uppgradering skapar `plugin_doctor_audit` och `plugin_doctor_acceptance` utan att ändra Cactis applikationsdata. Exportera den historik du behöver innan avinstallation: avinstallation tar bort båda tilläggstabellerna och dess inställningar. Att återställa tilläggsfilerna lämnar tabellerna tillgängliga för utredning, men äldre versioner respekterar inte varningsundantag.

## Krav

| Cacti | PHP | Anteckningar |
|---|---|---|
| 1.2.20 | 5.4 eller nyare | Doctors egen kod är kompatibel med PHP 5.4 så att den kan diagnostisera äldre system före en uppgradering |
| 1.2.31 | 8.0 eller nyare | Cactis `composer.json` kräver `>=8.0` |
| Aktuell 1.2.x | 8.2 eller nyare | Cactis `composer.json` kräver `>=8.2` |
| `develop` (1.3) | 8.3 eller nyare | Cactis `composer.json` kräver `^8.3` |

Raden **PHP-kompatibilitet med installerad Cacti** jämför den körande PHP-versionen med PHP-kravet i Cactis egen `composer.json` i roten, inklusive den övre gränsen för ett caret-villkor som `^8.3`. Den konfigurerade PHP CLI-körbara filen kontrolleras mot samma krav. Doctor känner igen villkorsformerna `>=` och `^` som används av dessa Cacti-paket. Ett oläsbart, felformaterat, saknat eller okänt krav ger en varning; Cacti 1.2.20–1.2.30-installationer utan manifest behåller sitt dokumenterade lägsta installationskrav på PHP 5.4. Doctors egen kompatibilitet med PHP 5.4 innebär inte kompatibilitet med en nyare Cacti-installation.

Raden **PHP-säkerhetsstöd uppströms** besvarar en separat fråga: får den aktuella PHP-utgåvans gren fortfarande säkerhetsfixar från PHP-projektet? Den rapporterar grenens publicerade slutdatum för säkerhetsstöd och varnar efter det datumet. Till exempel kan PHP 8.1 uppfylla körtidskravet för en äldre Cacti-installation trots att den inte längre får säkerhetsfixar uppströms. Ett godkänt resultat betyder inte att den installerade korrigeringsversionen är aktuell, och Doctor kan inte avgöra om en operativsystemsleverantör tillhandahåller bakåtporterade fixar.

Stöddatum levereras med Doctor från [PHP:s supportschema](https://www.php.net/supported-versions.php) och [lista över utgångna versioner](https://www.php.net/eol.php), senast kontrollerat 2026-11-08. Okända grenar och förhandsversioner ger en varning i stället för ett antaget godkännande. Inga nätverksbegäranden görs under diagnostiken. Uppdatera Doctors supportdata när PHP publicerar ett nytt schema. Befintliga JSON- och övervaknings-ID:n `php.version` och `php.security_baseline` är oförändrade.

## Utveckling

Enhetstestsviten använder Pest och körs på PHP 8.2 eller nyare:

```console
composer install
composer test
```

Testerna ersätter de Cacti-funktioner som Doctor anropar med små ersättningsfunktioner i `tests/CactiStubs.php`, så att de kan köras utan en Cacti-installation.

GitHub Actions kör fyra typer av kontroller vid varje push och pull request:

- `php -l` på varje PHP-fil under PHP 5.4, 5.6, 7.0, 7.1, 7.4 och 8.0 till 8.4.
- Enhetstestsviten på PHP 8.2, 8.3 och 8.4.
- `locales/build_gettext.sh --check`, som misslyckas vid en föråldrad översättningsmall, en ofullständig eller osäker (fuzzy) katalog eller en kompilerad katalog som skiljer sig från källan.
- Sju integrationsjobb som installerar Cacti 1.2.20, den aktuella 1.2.x-grenen och `develop` mot MySQL och MariaDB, med både cmd.php och Spine. Varje jobb installerar och aktiverar tillägget, kör den fullständiga CLI-rapporten och kontrollerar rapportschemat, sammanfattningssummor, förväntade statusar och den exakta uppsättningen fel. Därefter bryter det en binärsökväg och pollarens tidsstämpel, bekräftar att båda rapporteras, återställer dem, testar reparationen och dess bekräftelse samt kör inaktivering, aktivering, avinstallation och ominstallation. JSON-rapporten sparas som en artefakt när ett jobb misslyckas.

## Bidra

Pull requests skickas till `develop`. Håll produktionsfiler kompatibla med PHP 5.4 och använd Cactis kodstil: tabbar, enkla citattecken och Cactis hjälpfunktioner som `read_config_option()` och `db_fetch_cell()`. Lägg till ett enhetstest för varje beteendeändring, signera dina commits (`git commit -s`) och lägg till en rad i `CHANGELOG.md`.

### Översättningar

Omslut varje användarsynligt meddelande med `__('...', 'doctor')` (eller `__n()`, `__x()`, `__esc()`), och ge en mening som innehåller ett värde en enda formatsträng med sekventiella `%s`/`%d`-platshållare i stället för att sammanfoga delar. Cactis `__()` formaterar bara ett meddelande när det innehåller en formatspecificerare och stöder inte positionella `%1$s`-former. Den omvandlar också `%%` till `%` före formatering, så lägg aldrig in ett bokstavligt procenttecken i ett meddelande: skicka värdet med sitt tecken som ett argument (`__('Usage: %s', '50%', 'doctor')`). Loggrader förblir på engelska: använd `doctor_repair_message()` för reparationstext och `doctor_n_()` för meddelanden som loggas och översätts endast där de visas. Lämna kontroll-ID:n, JSON-nycklar, statusnyckelord, övervakningsutdata och loggrader oöversatta.

`locales/build_gettext.sh` återskapar mallen `locales/po/cacti.pot`, sammanfogar den i varje katalog `locales/po/<locale>.po` och kompilerar `locales/LC_MESSAGES/<locale>.mo`; committa alla tre. CI kör `sh locales/build_gettext.sh --check`, vilket misslyckas när mallen är inaktuell eller en katalog saknar en post eller har en otydlig (fuzzy) post, en platshållare skiljer sig åt eller en kompilerad fil är föråldrad. Ett ändrat meddelande behöver därför få sina översättningar uppdaterade i samma pull request. Det kräver GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Ett nytt språk är en ny `<locale>.po` namngiven så som Cacti namnger sina lokaler (till exempel `pt-BR`).

## Säkerhet

Rapportera sårbarheter privat enligt beskrivningen i [SECURITY.md](../../../SECURITY.md), inte i offentliga ärenden.

## Licens

Copyright (C) 2026 Thomas Vincent. Släppt under GNU General Public License, version 2 eller senare. Se [LICENSE](../../../LICENSE).
