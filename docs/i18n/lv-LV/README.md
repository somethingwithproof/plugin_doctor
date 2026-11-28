<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Latviešu](README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktuss ar stetoskopu. Diagnosticēt. Labot. Uzraudzīt.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Quality Gate statuss"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licence: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ un 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor ir Cacti spraudnis, kas vienā piegājienā diagnosticē instalāciju un veic nelielus labojumus tikai tad, kad administrators tos pieprasa.

**Statuss: izstrādes stadijā, pirms 1.0.** Jaunākais laidiens ir [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Šis labojums papildina 0.6.0 laidiena lomām piesaistīto piekļuvi, vadīto diagnostiku, ierobežotās RRD aktualitātes pārbaudes, labošanas priekšskatījumus un audita vēsturi, pieņemto brīdinājumu izņēmumus un tulkojumus ar hindi un arābu valodas katalogiem un tulkotām lietotāja rokasgrāmatām. Sīkāku informāciju skatiet [CHANGELOG.md](../../../CHANGELOG.md).

## Ekrānuzņēmumi

Diagnostikas un plānošanas iestatījumi izolētā Cacti 1.2.31 demonstrācijas instalācijā ar PHP 8.3.36, tostarp Cacti PHP saderības, augšstraumes drošības atbalsta un datubāzes stāvokļa pārbaudes. Šeit redzamie brīdinājumi un kļūmes attiecas uz šo demonstrācijas vidi.

![Doctor diagnostikas tabula ar izpildīto, brīdinājumu un kļūmju rezultātiem](../../screenshots/diagnostics.png)

![Doctor plānošanas, paziņojumu un sliekšņu iestatījumi](../../screenshots/settings.png)

Cacti problēmas parasti izpaužas kā simptomi: tukši grafiki, apstājies aptaujātājs vai spraudnis, kuru nevar instalēt. Cēlonis bieži ir novirze kādam priekšnosacījumam, piemēram, trūkstošs PHP paplašinājums CLI būvējumā, žurnāla direktorijs, kurā aptaujātājs nevar rakstīt, RRDtool ceļš, kas norāda uz nepareizu izpildāmo failu, vai datubāze bez laika joslu tabulām. Doctor pārbauda šos priekšnosacījumus tieši un ziņo par katru kā izpildītu, brīdinājumu vai kļūmi ar skaidrojošu teikumu par konstatēto. Tas pats pārskats ir pieejams tīmekļa lapā, komandrindā un JSON formātā uzraudzībai.

## Ko tas pārbauda

| Joma | Pārbaudes |
|---|---|
| Doctor | Vai pats Doctor darbojas kā root, kā dēļ atļauju pārbaudes attiektos uz nepareizu kontu |
| Cacti un PHP | Cacti versija, instalētāja nepabeigta jaunināšana, iespējoti spraudņi ar trūkstošiem failiem, PHP saderība ar instalēto Cacti pakotni, PHP augšstraumes drošības atbalsta statuss |
| PHP paplašinājumi | Nepieciešamie paplašinājumi tīmekļa PHP un aptaujātāja izmantotajā CLI PHP, kā arī ieteicamās iespējas |
| PHP konfigurācija | `memory_limit`, `max_execution_time` un `date.timezone`, balstoties uz paša Cacti ieteikumiem |
| Datubāze | Savienojamība, servera versija pret Cacti ieteikumu, UTF-8 rakstzīmju kopa, laika joslu tabulas, pamattabulas, pulksteņa nobīde no PHP resursdatora un InnoDB iestatījumi, kurus Cacti atzīmē kā kļūdas |
| Datubāzes stāvoklis | Savienojumu ietilpība, buferpūla lasījumi, pagaidu tabulas uz diska, savienojumu pavedienu izveide, lēni vaicājumi un InnoDB žurnāla bufera gaidīšanas ar no slodzes atkarīgiem pielāgošanas ieteikumiem |
| Failu sistēma | Rakstāmi kešatmiņas, žurnāla un RRA direktoriji; brīvā vieta RRD failiem; aktīvi datu avoti bez RRD faila vai ar nokavētiem failu atjauninājumiem; `include/config.php` nav vispārēji lasāms; Cacti žurnāls ir rakstāms un nepārsniedz pieļaujamo izmēru |
| Izpildāmie faili | PHP CLI, RRDtool, `snmpget`, `snmpwalk` un Spine, ja tas ir konfigurētais aptaujātājs, ieskaitot versijas, ja Cacti tās nosaka |
| Žurnāls | Kļūdas jaunākajās Cacti žurnāla rindās ar visbiežāko ziņojumu |
| Ierīces | Iespējotas ierīces, kas nedarbojas vai atjaunojas, trīs visilgāk nedarbojošās ar pēdējo kļūdu, kā arī kļūme, kad lielākā daļa ierīču nedarbojas vienlaikus |
| Aptaujātājs | Aptaujātāja tips un intervāls, laiks kopš galvenā aptaujātāja pēdējās pabeigšanas, darbības laiks pret intervālu, aptaujātāja izvade, kas nenonāca līdz RRD failam, attālie aptaujātāji, kas pārstāja ziņot, iestrēdzis Boost un Spine konfigurācija, kas norāda uz citu datubāzi |

Katrai pārbaudei ir stabils ID, piemēram, `database.timezone` vai `binary.rrdtool`, tāpēc skripti var atsaukties uz konkrētiem rezultātiem. Iespējoti spraudņi var pievienot papildu pārbaudes un atbalsta pakotnes pielikumus, izmantojot āķi `doctor_register_checks`, un Doctor nodrošina tikai lasāmas diagnostikas spējas spraudnim `plugin_mcp` ar `abilities_register` palīdzību.

## Koda un testu karte

| Uzvedība | Implementācija | Testu pierādījumi šajā repozitorijā |
|---|---|---|
| Diagnostikas pārbaudes un stabili pārskata ID | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Spraudņu pārbaužu āķis (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| MCP diagnostikas spējas (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Lomām piesaistīta piekļuve un maskēti tīmekļa pārskati | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Vadīta simptomu izmeklēšana | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD aktualitāte un atliktās ierakstīšanas apstrāde | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Labošanas priekšskatījumi, audita vēsture un pieņemtie brīdinājumi | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Ieplānotās pārbaudes un paziņojumu pārejas | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Šīs atsauces identificē implementāciju un testu pārklājumu; tās nenozīmē, ka katrs CI darbs pašreizējai revīzijai ir izdevies. Pārbaudiet darbplūsmas izpildi tai revīzijai, kuru plānojat izvietot.

## Datubāzes stāvokļa ieteikumi

Doctor iebūvētais PHP analizators nolasa fiksētu globālo MySQL vai MariaDB skaitītāju kopu, izmantojot esošo Cacti datubāzes savienojumu. Katram pārskatam tas veic divus tikai lasāmus vaicājumus, neprasa papildu akreditācijas datus vai izpildāmos failus un nekad nemaina datubāzes konfigurāciju. Šīs pārbaudes parādās tīmekļa pārskatā, CLI, JSON, uzraudzības izvadē, atbalsta pakotnē un ieplānotajā statusa izsekošanā.

| Pārbaudes ID | Izmeklēšanas slieksnis |
|---|---|
| `database.health_sample` | Mazāk nekā 24 stundas kopš palaišanas vai `FLUSH STATUS`, vai nepieejams/nekonsekvents darbības laiks |
| `database.connection_capacity` | Pašreizējie vai reģistrētie maksimālie savienojumi vismaz 80% no pašreizējā `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` vismaz 1% ar vismaz 10 000 lasīšanas pieprasījumiem |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` vismaz 25% ar vismaz 1 000 pagaidu tabulām |
| `database.thread_cache` | `Threads_created / Connections` vismaz 5% ar vismaz 1 000 savienojuma mēģinājumiem un `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` vismaz 1% ar vismaz 1 000 priekšrakstiem |
| `database.redo_log_waits` | Nulles nevienāds `Innodb_log_waits` |

Tie ir Doctor izmeklēšanas sliekšņi, nevis piegādātāju konfigurācijas mērķi. Izņemot savienojumu ietilpību, kumulatīvajiem ieteikumiem nepieciešams iepriekš norādītais novērošanas logs. Trūkstoši, nepareizi formatēti, dublēti vai pārmērīgi skaitītāji, nepietiekama aktivitāte un neatbalstīti pavedienu režīmi rada brīdinājumus, nevis veselīga stāvokļa vērtējumu vai pielāgošanas ieteikumu. Brīdinājumi var ietekmēt Nagios statusu un ieplānotos paziņojumus, kad ir iespējota opcija **Paziņot par brīdinājumiem**.

Lasiet izmērītos skaitītājus un ieteikumu kopā. Kumulatīvās vērtības nepierāda pašreizējo slodzi; skaitītājiem var būt dažādi atiestatīšanas laiki, un tie neveido atomisku momentuzņēmumu. Maksimālais savienojumu skaits var atspoguļot vecāku limitu. Lēno vaicājumu skaits ir atkarīgs no `long_query_time`, un MySQL pagaidu diska tabulu skaitītājs var neiekļaut atmiņā kartētus failus. Zema attiecība nepierāda, ka nav sastrēguma. Pirms buferu vai savienojumu limitu maiņas apstipriniet tendences tipiskas slodzes apstākļos, pārskatiet vaicājumu plānus un savienojumu atkārtotu izmantošanu, kā arī izmēriet atmiņu **datubāzes resursdatorā**.

Ja rādītāji nav pieejami, pārbaudiet servera atbalstu un Cacti konta piekļuvi `SHOW GLOBAL STATUS` un `SHOW GLOBAL VARIABLES`; Doctor nepieprasa paaugstinātas privilēģijas. Skaitītāju definīcijas ir ņemtas no [MySQL statusa mainīgo atsauces](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) un [MariaDB statusa mainīgo atsauces](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Netiek izmantots neviens MySQLTuner skripts vai kods.

Nav nepieciešama shēmas vai konfigurācijas migrācija. Izvietojiet spraudņa failus kā parasti; šo failu atjaunošana uz iepriekšējo versiju noņem pievienoto diagnostiku. Esošais ieplānotais stāvoklis tiek atsvaidzināts nākamajā izpildē.

## Kā tas saglabā drošību

Diagnostikas rīks darbojas ar aptaujātāja vai tīmekļa servera privilēģijām un nolasa ceļus no iestatījumu tabulas, tāpēc tam rūpīgi jākontrolē, ko tas palaiž un maina.

- Diagnostika ir tikai lasāma. Tā nekad nemaina failus, iestatījumus vai datus.
- Doctor palaiž konfigurētu izpildāmo failu tikai tad, ja tā faila nosaukums atbilst gaidītajai programmai (`php`, `rrdtool`, `snmpget` vai `snmpwalk`). Pretējā gadījumā jebkurš, kurš var rakstīt iestatījumu tabulā, varētu izvēlēties, ko Doctor palaiž. Jebkurš cits nosaukums tiek ziņots kā brīdinājums un netiek izpildīts.
- Doctor nekad nepalaiž konfigurētos izpildāmos failus kā root un ziņo, kad pats darbojas kā root.
- Labojumi nāk no fiksēta atļauto saraksta. Katram ir nepieciešama autentificēta administratora darbība tīmekļa saskarnē vai `--yes` komandrindā, un katrs tiek ierakstīts Cacti žurnālā.

## Laidieni

Versijas atbilst SemVer un sakrīt ar spraudņa failu `INFO`. Versijas izvēli, CI vārtus, pakotnes saturu, kontrolsummas un atgriešanas instrukcijas skatiet [laidienu procesā](../../releasing.md).

## Instalēšana

Lejupielādējiet `doctor-VERSION.tar.gz` vai `doctor-VERSION.zip` un `SHA256SUMS` no [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Pārbaudiet arhīva SHA-256 kontrolsummu, pēc tam izvelciet tā direktoriju `doctor/` Cacti direktorijā `plugins/`. Tās ir instalējamās pakotnes; GitHub automātiskajiem pirmkoda arhīviem ir cits direktorija nosaukums. Lai palaistu nepublicētu kodu no `develop`, instalējiet no pirmkoda klona.

Pirmkoda instalēšanai:

Klonējiet vai atpakojiet repozitoriju kā `plugins/doctor` Cacti instalācijā. Direktorija nosaukumam jābūt `doctor`, nevis `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Instalējiet un iespējojiet **Cacti Doctor** sadaļā **Konfigurācija > Spraudņu pārvaldība**, pēc tam ar Cacti lietotāju vai grupu atļaujām piešķiriet **Doctor skatītājs**, **Doctor operators** vai **Doctor administrators** apgabalu. Esošās **Cacti Doctor** piešķirtās tiesības pēc jaunināšanas saglabā administratora piekļuvi. Pārskats parādās sadaļā **Utilītas > Cacti Doctor**.

## Valodas

Doctor ietver 48 tulkojumu katalogus citās valodās zem `locales/po/` un `locales/LC_MESSAGES/`, aptverot Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Āfrikas (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Āzijas (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) un Dienvidaustrumeiropas (`bs-BA`, `hr-HR`, `sr-RS`) lokalizācijas. Cacti parāda katalogu, tiklīdz ir ieslēgts valodu atbalsts (**Konfigurācija > Iestatījumi > Vispārīgi > Valodu atbalsts**) un lietotājs izvēlas lokalizāciju, kuru Cacti piedāvā savā valodu atlasē; katalogi lokalizācijām, kas vēl nav Cacti atlasē, stāsies spēkā, kad Cacti tās pievienos. Tīmekļa lapa, iestatījumi un komandrindas ziņojumi un pārskata teksts seko Cacti valodai; pats komandrindas pārskats izmanto Cacti noklusējuma valodu, kas paliek angļu valodā, ja vien to nemaināt.

Mašīnlasāmā izvade nekad netiek tulkota: pārbaužu ID, JSON atslēgas un statusa vērtības, `--format=nagios` un `--format=prometheus` izvade, žurnāla rindas un atbalsta pakotnes sadaļu virsraksti paliek angļu valodā, lai skripti un uzraudzība darbotos katrā valodā. Katras pārbaudes teksti `summary` un `detail` ir vienīgā tulkotā JSON pārskata daļa.

Ir iekļauts arī Latīņamerikas spāņu valodas katalogs (`es-419`), taču ne Cacti 1.2, ne Cacti 1.3 nepiedāvā Latīņamerikas spāņu lokalizāciju, tāpēc tas darbosies tikai tad, kad Cacti to pievienos. Līdz tam izvēlieties spāņu valodu (`es-ES`).

Cacti ielādē spraudņa katalogu no `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` ar teksta domēnu `doctor` gan 1.2.x, gan 1.3 versijā (1.3 atrisina spraudņu direktoriju caur tā konfigurējamo spraudņu ceļu).

## Piekļuves līmeņi

| Apgabals | Iespējas |
|---|---|
| Doctor skatītājs | Lasīt jaunākos ieplānoto pārbaužu statusus, novērošanas laiku, aktualitāti un neseno apkopoto vēsturi. Nav diagnostikas komandu, neapstrādātu detaļu, konfigurācijas vai labojumu. |
| Doctor operators | Palaist diagnostikas pārskatu ar 120 sekunžu procesa ierobežojumu, apskatīt maskētas detaļas un apstiprināt konstatējumus. Nav iestatījumu maiņas vai labojumu. |
| Doctor administrators | Operatora iespējas, kā arī esošā atļauto saraksta labošana un Doctor iestatījumi. Labojumiem un iestatījumiem nepieciešams arī Cacti apgabals Settings/System Utilities. |

Izvēlne Utilītas atver lapu augstākajam lietotājam piešķirtajam Doctor apgabalam, ieskaitot grupu piešķīrumus. Jaunie Skatītāja un Operatora apgabali nesaņem automātiskus piešķīrumus. Sākotnējais apgabala ID paliek piesaistīts `doctor.php` kā Administrators, saglabājot esošo lietotāju un grupu piekļuvi.

Skatītāja dati nāk no ieplānotajām pārbaudēm. Pirms Skatītāja piekļuves piešķiršanas iespējojiet plānošanu; trūkstoši vai nokavēti novērojumi parādās kā **nezināms**, nekad kā vesels. Vēsture saglabā pēdējos 20 ieplānotos apkopotos skaitļus un neietver ierīču statusu. Operatori nepārprotami sāk jaunu diagnostiku; parasta lapas atsvaidzināšana izmanto sesijas pēdējo pārskatu.

Ierīču detaļas un kopsummas izmanto pašreizējā lietotāja ierīču atļaujas. Žurnāla fragmentiem papildus nepieciešams Cacti apgabals Log Administration. Noslēpumi tiek maskēti pirms diagnostikas detaļu saglabāšanas tīmekļa sesijā vai parādīšanas. CLI piekļuvi joprojām nosaka operētājsistēmas konts.

Apstiprinājumi ir personiski un tiek ierakstīti Cacti žurnālā. Tie attiecas tikai uz to pašu konstatējumu un pierādījumiem; mainīti pierādījumi prasa jaunu apstiprinājumu. Tie nekad nemaina izpildīts/brīdinājums/kļūme statusu, nenomāc paziņojumus un neatzīmē neveiksmīgu pārbaudi kā veselu. Tas ir atsevišķi no pieņemto brīdinājumu izņēmumiem, kas ietekmē paziņojumu politiku, nemainot novēroto statusu, un ir aprakstīti tālāk.

Katra darbība prasa POST un derīgu CSRF marķieri. Labojumi parāda atsevišķu apstiprināšanas lapu ar neiesniedzošu saiti Atcelt un ieraksta darbību veicošo lietotāju un rezultātu Cacti žurnālā.

## Komandrinda

Palaidiet šīs komandas no Cacti saknes direktorija kā Cacti aptaujātāja lietotājs, nevis root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Teksta izvade drukā vienu rindu katrai pārbaudei ar tās statusu, kategoriju, kopsavilkumu un detaļām. `--json` izdrukā `summary` objektu ar statusu skaitļiem un `checks` masīvu, kura ierakstos ir `id`, `category`, `status`, `summary`, `detail` un `repair`/`repairable`, ja ir piemērojams atļauto saraksta labojums.

| Izejas kods | Nozīme |
|---|---|
| `0` | Neviena pārbaude neizgāzās, vai pieprasītais labojums izdevās. Brīdinājumi nemaina izejas kodu. |
| `1` | Vismaz viena pārbaude neizdevās, vai pieprasītais labojums neizdevās. |
| `2` | Lietošanas kļūda: labošana palaista bez `--yes` (`--preview` tas nav vajadzīgs), nezināms labojuma ID, nezināms izvades formāts, neatbalstīta `--symptom` vai formāta kombinācija, vai nevar atrast Cacti instalāciju. |

Cacti palielina `memory_limit` katram CLI skriptam, tāpēc PHP izpildlaika konfigurācijas pārbaudei ir nozīme tikai tīmekļa lapā.

## Ieplānotās pārbaudes un paziņojumi

Sadaļā **Konfigurācija > Iestatījumi > Doctor** ieslēdziet **Palaist pārbaudes pēc grafika** un izvēlieties intervālu no 15 minūtēm līdz vienai dienai. Pēc katra atbilstošā aptaujātāja cikla Doctor palaiž visas pārbaudes fona procesā, tāpēc paša aptaujātāja darbības laiks netiek ietekmēts.

Katra izpilde reģistrē katras pārbaudes novēroto statusu. Aktīvie brīdinājumu izņēmumi ietekmē paziņojumu politiku, nemainot šo novērojumu. Kad pārbaude sāk vai beidz ciest neveiksmi, Doctor ieraksta izmaiņas Cacti žurnālā un, ja ir norādītas **Paziņojumu e-pasta adreses**, nosūta uz tām e-pastu ar Cacti pasta iestatījumiem. **Paziņot par brīdinājumiem** pievieno pārejas brīdinājumā un ārā no tā. Pirmā izpilde tikai reģistrē bāzes stāvokli.

Ieplānotie pārskati darbojas primārajā aptaujātājā ar datubāzes konsultatīvo bloķēšanu un divu minūšu darba ierobežojumu. Doctor ziņo par pēdējo sākumu un veiksmīgo pabeigšanu, tāpēc trūkstoši vai novecojuši rezultāti ir redzami. Rezultāti tiek uzskatīti par aktuāliem intervāla, plus viena aptaujas cikla un trīs minūšu garumā. Nepabeigta izpilde tiek atkārtota pēc 5, 10, 20 un vairāk minūtēm līdz parastajam intervālam. Neizdevušās paziņojumu piegādes tiek saglabātas līdz trim atkārtotiem mēģinājumiem ar pieaugošām aizkavēm; pēc tam izlabojiet Cacti pasta iestatījumus un palaidiet `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` kā aptaujātāja lietotājs. Pasta servera pieņemšana neapstiprina piegādi iesūtnē.

Tajā pašā cilnē iestata sliekšņus aptaujātāja darbības laikam (80% no intervāla), RRA brīvajai diska vietai (brīdinājums zem 10%, kļūme zem 2%), datubāzes pulksteņa nobīdei (brīdinājums virs 5 sekundēm, kļūme virs 60) un Cacti žurnāla izmēram (100 MB). Tukšas vai nederīgas vērtības atgriežas pie šiem noklusējumiem.

## Uzraudzības integrācija

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` izdrukā vienu statusa rindu ar veiktspējas datiem un beidz darbu ar kodu `0` (OK), `1` (WARNING) vai `2` (CRITICAL), tāpēc Nagios, Icinga vai jebkura saderīga sistēma to var palaist tieši. `--format=prometheus` raksta Prometheus teksta formātu node_exporter textfile vācējam: `cacti_doctor_check_status` katrai pārbaudei (0 izpildīts vai pieņemts brīdinājums, 1 rīcībai nozīmīgs brīdinājums, 2 kļūme), `cacti_doctor_check_observed_status` pirms izņēmumiem, `cacti_doctor_check_accepted`, `cacti_doctor_checks` pa statusiem un `cacti_doctor_last_run_timestamp_seconds`. JSON pārbaužu rindās ir lauks `assessment`; `not_assessed` nozīmē, ka pārbaude no pieejamajiem datiem nevarēja izdarīt secinājumu.

## Atbalsta pakotne

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Pakotne ir viens teksta fails ar Doctor, Cacti, PHP, OS un datubāzes versijām, aptaujātāja un Boost statistiku, pilnu pārskatu, spraudņu atbalsta pakotnes pielikumiem zem `== Plugin attachments` un pēdējām 200 Cacti žurnāla rindām. Vērtības aiz paroles, noslēpuma, marķiera, kopienas un atslēgas nosaukumiem tiek maskētas. Doctor izveido failu lasāmu tikai tā īpašniekam un atsakās pārrakstīt esošu failu. Pirms publicēšanas pārskatiet to.

## Labošanas politika

Doctor ietver vienu labojumu — `runtime_directories`. Tas izveido trūkstošos Cacti izpildes direktorijus un pievieno īpašniekam lasīšanas, rakstīšanas un izpildes bitus, nenoņemot esošās atļaujas.

Cacti 1.3 versijā tas mērķē uz `$cache_path`, `$log_path` un `$rra_path`, bet citādi uz instalācijas direktorijiem `cache`, `log` un `rra`. Tas izlaiž jau rakstāmus direktorijus, atsaka direktorijus ārpus Cacti instalācijas (piemēram, žurnāla direktoriju zem `/var/log`), atsaka simboliskās saites un atsaka darbību kā root. Tas nekad neseko `path_cactilog`, tāpēc koda direktorijā konfigurēts žurnāla fails nevar tur novirzīt labošanu. Diagnostika katrā laidienā joprojām pārbauda konfigurētā žurnāla faila direktoriju.

Tas nemaina īpašumtiesības, nepalaid čaulas komandas, nepārraksta konfigurāciju un nemaina Cacti lietojumprogrammas datus. Katram jaunam labojumam jāietver diagnostika, atļauto saraksta apstrādātājs, apstiprinājums, audita žurnalēšana un testi.

## Simptomu izmeklēšana

Operatori un administratori Doctor lapā var izvēlēties **Izmeklēt simptomu**. Tie paši noteikumi ir pieejami ar `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` vai `alerts_missing` teksta vai JSON izvadē. Atbalsta pakotnes ietver attiecīgās simptomu izmeklēšanas.

Katrs kandidāts uzskaita novērotās pārbaudes un nākamo pārbaudes soli. Kandidāti ir hipotēzes, nevis apstiprināti pamatcēloņi. Trūkstoši, nenovērtēti vai novecojuši novērojumi nekad nenosaka cēloni. Tīmekļa izmeklēšanas izmanto pēc atļaujām filtrētu pārskatu; CLI pārskati izmanto operētājsistēmas konta piekļuvi.

## RRD atjauninājumu aktualitāte

`filesystem.rrd_stale` pārbauda līdz 500 aktīviem datu avotiem, izslēdzot atspējotas un nedarbojošās ierīces. Lielākās instalācijās izlase mainās katru stundu, tāpēc atkārtotas izpildes aptver dažādus failus. Tas salīdzina failu modificēšanas laikus ar lielāko no aptaujātāja intervāla, avota RRD soļa un profila soļa, reizinātu ar **RRD novecošanās intervāli** (noklusējums 3). Tas parāda trīs vecākos novecojušos failus un skarto ierīču skaitu. Tīmekļa rezultāti ietver tikai atļautās ierīces.

`filesystem.rrd_files` ir atsevišķa esamības pārbaude. Tā meklē RRD failu līdz 5 000 aktīviem datu avotiem, ieskaitot tos, kas atrodas uz atspējotām vai nedarbojošām ierīcēm, un izmanto to pašu ikstundas izlasi.

Boost pievieno divkāršu savu konfigurēto ierakstīšanas intervālu kā diska ierakstīšanas pielaidi. Citam atliktajam rakstītājam konfigurējiet **Atliktās RRD ierakstīšanas pielaide (sekundes)**. Norādīts `RRDCACHED_ADDRESS` bez pielaides vai nederīgs Boost intervāls rada nenovērtētu rezultātu. Doctor nekad neiztukšo kešatmiņu, lai veiktu šo pārbaudi. Modificēšanas laiks ir pierādījums diska aktivitātei, nevis veiksmīgai datu vākšanai. Ārējā kešošana, kuru Doctor nevar noteikt, jākonfigurē tieši.

Trūkstoši, nelasāmi un nākotnes datēti faili tiek saskaitīti detaļās. Rezultāts ir nenovērtēts tikai tad, ja neviens izlases fails nav lasāms. Izlases rezultāts norāda, ka tas aptver tikai daļu instalācijas; sekmīga pārbaude neattiecas uz nepārbaudītiem failiem.

## Labošanas priekšskatījumi un audita vēsture

Administratora labošanas lapa parāda katru skarto ceļu, piedāvāto darbību, pašreizējās atļaujas un mērķa atļaujas. Apstiprinājums ir piesaistīts šim priekšskatījumam, darbību veicošajam lietotājam un piecu minūšu derīguma termiņam. Apstiprināšana patērē priekšskatījumu; mainīta failu sistēma prasa jaunu priekšskatījumu. Darbība kā root, ceļi ārpus instalācijas, labojamas saites un neizpildītas failu sistēmas atļaujas neļauj apstiprināt.

`--repair=runtime_directories --preview` izdrukā tikai lasāmu JSON plānu. `--repair=runtime_directories --yes` apstiprina svaigi aprēķinātu CLI plānu un pārbauda to vēlreiz pirms izpildes. CLI kontam jau jābūt pilnvarotam labot instalāciju; tas nemanto tīmekļa lomas.

Pirms jebkādām failu sistēmas izmaiņām jāsaglabā strukturēts `repair.started` ieraksts. Saistītais `repair.completed` ieraksts satur momentuzņēmumu pēc labošanas un pārbaudes rezultātu. Pārtraukta darbība atstāj sākuma ierakstu izmeklēšanai. Pabeigšanas audita kļūme tiek ziņota kā kļūme pat tad, ja failu sistēmā notika izmaiņas. Doctor pievieno īpašnieka atļaujas un izveido direktorijus; tas nemēģina automātiski atgriezt izmaiņas.

Administratori ar Cacti atļauju Settings/System Utilities Doctor lapā var lasīt pēdējos 20 audita ierakstus. Spraudnis saglabā pēdējos 200 ierakstus tabulā `plugin_doctor_audit`; arī Cacti žurnāls reģistrē to ID, darbības un veicējus. Audita dati ir maskēti.

## Pieņemtie brīdinājumi

Administratori ar Cacti atļauju Settings/System Utilities Doctor lapā var izveidot **Brīdinājuma izņēmumu** no svaiga, novērtēta brīdinājuma. Izņēmumam nepieciešams atbildīgais, iemesls un UTC pārskatīšanas datums 90 dienu laikā. Tā termiņš beidzas pusnaktī UTC šī datuma sākumā. Var konfigurēt līdz 100 izņēmumiem. Sarakstā tiek rādīti ieraksti ar beigušos termiņu un ID, kas nav pašreizējā pārskatā, un to var noņemt.

Novērotais brīdinājums paliek redzams kopā ar atbildīgo, iemeslu un termiņu diagnostikas detaļās. JSON saglabā novēroto statusu un pievieno metadatus `accepted` un `acceptance`. Nagios izslēdz aktīvos pieņemtos brīdinājumus no sava izejas smaguma, bet nosauc tos izvadē. Prometheus eksportē gan novēroto, gan rīcībai nozīmīgo smagumu. Parastais CLI izejas statuss nemainās: brīdinājumi jau atgriež nulli, kļūmes — viens.

Kamēr izņēmums ir spēkā, ieplānotie brīdinājumu paziņojumi tiek nomākti; termiņa beigas vai noņemšana atkal padara turpinātu brīdinājumu piemērotu brīdinājumu paziņojumiem. Pārejas uz kļūmi un atkopšanās no kļūmes joprojām rada paziņojumus. Nenovērtētu rezultātu vai kļūmi nevar pieņemt. Personiskais apstiprinājums ir atsevišķs un neko nenomāc. Izņēmumu izveide un noņemšana notiek transakcijā kopā ar audita ierakstu.

Jaunināšana izveido `plugin_doctor_audit` un `plugin_doctor_acceptance`, nemainot Cacti lietojumprogrammas datus. Pirms atinstalēšanas eksportējiet nepieciešamo vēsturi: atinstalēšana noņem abas spraudņa tabulas un tā iestatījumus. Spraudņa failu atgriešana atstāj tabulas izmeklēšanai, taču vecākas versijas neņem vērā brīdinājumu izņēmumus.

## Spraudņu pārbaudes (`doctor_register_checks`)

Iespējoti Cacti spraudņi var pievienot tikai lasāmas diagnostikas pārbaudes un neobligātus atbalsta pakotnes pielikumus, reģistrējot āķi `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor izsauc iespējotus, neintegrētus spraudņus, kas reģistrēti uz `doctor_register_checks` (izlaižot `doctor` un `cacti`), atrisinot āķa failu stingri paša spraudņa direktorijā. Atzvanīšanas funkcija saņem `['mode' => 'run' | 'list', 'plugin' => '<slug>']` un atgriež vai nu pārbaužu aprakstītāju sarakstu, vai aploksni ar `checks` un neobligātiem `attachments`:

```php
function sample_doctor_checks($context) {
	return [
		'checks' => [
			[
				'id'          => 'sample.queue_depth',
				'plugin'      => 'sample',
				'category'    => 'Sample',
				'title'       => 'Sample queue depth',
				'status'      => 'ok',
				'message'     => 'Queue is healthy.',
				'details'     => ['pending' => 0],
				'remediation' => ''
			]
		],
		'attachments' => [
			[
				'title'   => 'Sample diagnostics',
				'content' => "worker=ok\n"
			]
		]
	];
}
```

Katrs spraudņa pārbaudes aprakstītājs pirms iekļaušanas tiek validēts:

- Obligātās atslēgas: `id`, `plugin`, `category`, `title`, `status`, `message`, `details` un `remediation`.
- `plugin` jāatbilst reģistrētajam spraudņa nosaukumam (`[a-z0-9_]{1,64}`). `id` jāatbilst `[a-z0-9_.]{1,128}`, jāsākas ar `<plugin>.` un nedrīkst sakrist ar esošu pamata vai spraudņa pārbaudes ID.
- `status` jābūt `ok`, `warn`, `fail` vai `info`. Doctor pārskatos `ok` tiek attēlots kā `pass`; `info` ir informatīvs un neizraisa kļūmes CLI, Nagios, Prometheus vai ieplānotajos paziņojumos.
- `category` (līdz 64 baitiem) un `title` (līdz 256 baitiem) jābūt netukšām virknēm bez vadības rakstzīmēm. `message` (netukša, līdz 2048 baitiem) un `remediation` (līdz 2048 baitiem) jābūt virknēm.
- `details` pieņem virkni (līdz 8192 baitiem) vai skalāru/ligzdotu masīvu (maks. dziļums 4, JSON kodēts līdz 16384 baitiem; objekti un resursi tiek noraidīti).
- Neobligātajiem atbalsta pakotnes pielikumiem nepieciešams netukšs `title` (līdz 128 baitiem, bez vadības rakstzīmēm) un `content` virkne līdz 65536 baitiem (64 KiB).

Doctor piemēro ierobežojumu 32 pārbaudes un 8 pielikumi vienam spraudnim (kopā 64 spraudņu pārbaudes un 32 pielikumi). Katrs āķis tiek izpildīts savā `try`/`catch` robežā, tāpēc izņēmumi vai ne-masīva dati tiek maskēti un reģistrēti Cacti žurnālā (`DOCTOR` sadaļa), neietekmējot pamata pārbaudes vai citus spraudņus. Nepareizi aprakstītāji tiek noraidīti un reģistrēti, kamēr derīgie no tā paša spraudņa turpina darboties. Spraudņu pārbaudes vienmēr ir tikai lasāmas (`repairable: false`), un virkņu vērtības un jutīgās asociatīvās atslēgas tiek maskētas pirms attēlošanas, eksportēšanas vai pakošanas. Validētās spraudņu pārbaudes parādās tīmekļa saskarnē, CLI teksta/JSON/Nagios/Prometheus izvadē, ieplānotajā statusa izsekošanā un atbalsta pakotnēs.

## MCP integrācija (`abilities_register`)

Doctor reģistrē āķi `abilities_register` (`doctor_abilities_register` failā `doctor_abilities.php`), lai `plugin_mcp` atklātu tā diagnostikas spējas, kad abi spraudņi ir iespējoti. Doctor reģistrē kategoriju `diagnostics` (`Diagnostics`) un divas tikai lasāmas, nedestruktīvas, idempotentas spējas:

| Spējas ID | Neobligātie argumenti | Izvade |
|---|---|---|
| `doctor-run-checks` | `category` (virkne, maks. 64 rakstzīmes), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) un līdz 256 maskēti `findings` (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (virkne, maks. 64 rakstzīmes), `plugin` (virkne, maks. 64 rakstzīmes) | Līdz 256 `checks` (`id`, `plugin`, `category`, `title`), kas aptver visas 45 iebūvētās pārbaudes un iespējoto spraudņu pārbaudes |

Abas spējas ir stingri tikai lasāmas un nekad neveic labojumus. Papildus `plugin_mcp` paša apgabalu un spēju atklāšanas kontrolei (spraudņu spējas MCP sākotnēji ir slēptas, līdz administrators tās atklāj), Doctor pieprasa, lai marķiera īpašniekam būtu **Doctor skatītājs** vai augstāks Doctor apgabals. `doctor-run-checks` ierobežo `devices.health` līdz marķiera īpašniekam atļautajām ierīcēm, iekļauj `logging.recent_errors` tikai tad, ja lietotājam ir Cacti apgabals 18 vai 19, izlaiž `filesystem.rrd_files` un iekļauj ierīcēm ierobežotu `filesystem.rrd_stale` tikai **Doctor operatoram** vai **Doctor administratoram**.

## Prasības

| Cacti | PHP | Piezīmes |
|---|---|---|
| 1.2.20 | 5.4 vai jaunāka | Paša Doctor kods ir saderīgs ar PHP 5.4, lai tas varētu diagnosticēt mantotas sistēmas pirms jaunināšanas |
| 1.2.31 | 8.0 vai jaunāka | Cacti `composer.json` prasa `>=8.0` |
| Pašreizējā 1.2.x | 8.2 vai jaunāka | Cacti `composer.json` prasa `>=8.2` |
| `develop` (1.3) | 8.3 vai jaunāka | Cacti `composer.json` prasa `^8.3` |

Rinda **PHP saderība ar instalēto Cacti** salīdzina darbojošos PHP versiju ar PHP prasību Cacti saknes `composer.json` failā, ieskaitot jumtiņa ierobežojuma (piemēram, `^8.3`) augšējo robežu. Konfigurētais PHP CLI izpildāmais fails tiek pārbaudīts pret to pašu prasību. Doctor atpazīst šajās Cacti pakotnēs izmantotās ierobežojumu formas `>=` un `^`. Nelasāma, nepareizi formatēta, trūkstoša vai neatpazīta prasība rada brīdinājumu; Cacti 1.2.20–1.2.30 instalācijas bez manifesta saglabā savu dokumentēto PHP 5.4 instalētāja minimumu. Paša Doctor PHP 5.4 saderība nenosaka saderību ar jaunāku Cacti instalāciju.

Rinda **PHP augšstraumes drošības atbalsts** atbild uz atsevišķu jautājumu: vai šis PHP laidiena zars joprojām saņem drošības labojumus no PHP projekta? Tā ziņo zara publicēto drošības atbalsta beigu datumu un pēc šī datuma brīdina. Piemēram, PHP 8.1 var atbilst vecākas Cacti instalācijas izpildlaika prasībai, vienlaikus vairs nesaņemot augšstraumes drošības labojumus. Sekmīgs rezultāts nenozīmē, ka instalētais ielāpa laidiens ir aktuāls, un Doctor nevar noteikt, vai OS piegādātājs nodrošina pārnestos labojumus.

Atbalsta datumi ir iekļauti Doctor no [PHP atbalsta grafika](https://www.php.net/supported-versions.php) un [beigu saraksta](https://www.php.net/eol.php), pēdējo reizi pārbaudīti 2026-11-08. Nezināmi zari un priekšlaidumi rada brīdinājumu, nevis pieņemtu sekmīgu iznākumu. Diagnostikas laikā netiek veikts neviens tīkla pieprasījums. Atjauniniet Doctor atbalsta datus, kad PHP publicē jaunu grafiku. Esošie JSON/uzraudzības ID `php.version` un `php.security_baseline` paliek nemainīti.

## Izstrāde

Vienībtestu komplekts izmanto Pest un statiskā analīze izmanto PHPStan (6. līmenis), abi ar PHP 8.2 vai jaunāku:

```console
composer install
composer phpstan
composer test
```

Testi aizstāj Doctor izsauktās Cacti funkcijas ar nelieliem aizvietotājiem failā `tests/CactiStubs.php`, tāpēc tie darbojas bez Cacti instalācijas.

GitHub Actions katrā push un pull request izpilda piecu veidu pārbaudes:

- Laidienu pakošanas līgumtesti (`tests/test_release.py`) un arhīva būvējums (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, kas neizdodas, ja tulkojumu veidne ir novecojusi, katalogs ir nepilnīgs vai neskaidrs (`fuzzy`), vai kompilētais katalogs atšķiras no tā avota.
- `php -l` katram PHP failam zem PHP 5.4, 5.6, 7.0, 7.1, 7.4 un no 8.0 līdz 8.4.
- `composer phpstan` (PHPStan 6. līmenis) un `composer test` (Pest vienībtestu komplekts) zem PHP 8.2, 8.3 un 8.4.
- Septiņi integrācijas darbi, kas instalē Cacti 1.2.20, pašreizējo 1.2.x zaru un `develop` pret MySQL un MariaDB gan ar cmd.php, gan ar Spine. Katrs darbs instalē un iespējo spraudni, palaiž pilnu CLI pārskatu un pārbauda pārskata shēmu, kopsavilkuma summas, gaidītos statusus un precīzu kļūmju kopu. Pēc tam tas sabojā izpildāmā faila ceļu un aptaujātāja laika zīmogu, apstiprina, ka par abiem tiek ziņots, atjauno tos, pārbauda labošanu un tās apstiprinājumu, kā arī izpilda atspējošanu, iespējošanu, atinstalēšanu un atkārtotu instalēšanu. Darba neveiksmes gadījumā JSON pārskats tiek saglabāts kā artefakts.

## Ieguldījums

Pull pieprasījumus sūtiet uz `develop`. Saglabājiet produkcijas failus saderīgus ar PHP 5.4 un ievērojiet Cacti stilu: tabulācijas, vienpēdiņu virknes un Cacti palīgfunkcijas, piemēram, `read_config_option()` un `db_fetch_cell()`. Katrai uzvedības izmaiņai pievienojiet vienībtestu, parakstiet savus komitus (`git commit -s`) un pievienojiet rindu failā `CHANGELOG.md`.

### Tulkojumi

Ietveriet katru lietotājam redzamo ziņojumu funkcijā `__('...', 'doctor')` (vai `__n()`, `__x()`, `__esc()`), un teikumam, kas satur vērtību, izmantojiet vienu formāta virkni ar secīgiem `%s`/`%d` vietturiem, nevis apvienojiet daļas. Cacti `__()` formatē ziņojumu tikai tad, ja tajā ir formāta specifikators, un neatbalsta pozicionālās `%1$s` formas. Tā arī pirms formatēšanas pārvērš `%%` par `%`, tāpēc nekad nelieciet ziņojumā burtisku procentu zīmi: nododiet vērtību ar tās zīmi kā argumentu (`__('Usage: %s', '50%', 'doctor')`). Žurnāla rindas paliek angļu valodā: izmantojiet `doctor_repair_message()` labošanas tekstam un `doctor_n_()` ziņojumiem, kas tiek reģistrēti un tulkoti tikai attēlošanas vietā. Atstājiet pārbaužu ID, JSON atslēgas, statusa atslēgvārdus, uzraudzības izvadi un žurnāla rindas netulkotus.

`locales/build_gettext.sh` atkārtoti ģenerē veidni `locales/po/cacti.pot`, apvieno to ar katru katalogu `locales/po/<locale>.po` un kompilē `locales/LC_MESSAGES/<locale>.mo`; iesniedziet komitā visus trīs. CI izpilda `sh locales/build_gettext.sh --check`, kas neizdodas, ja veidne ir novecojusi vai katalogam trūkst ieraksta vai ir `fuzzy` ieraksts, atšķiras vietturis vai kompilētais fails ir novecojis. Tāpēc mainītam ziņojumam tajā pašā pull pieprasījumā jāatjaunina tulkojumi. Nepieciešams GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Jauna valoda ir jauns `<locale>.po` fails, nosaukts atbilstoši Cacti lokalizāciju nosaukumiem (piemēram, `pt-BR`).

## Drošība

Ziņojiet par ievainojamībām konfidenciāli, kā aprakstīts failā [SECURITY.md](../../../SECURITY.md), nevis publiskos pieteikumos.

## Licence

Copyright (C) 2026 Thomas Vincent. Izdots saskaņā ar GNU General Public License, 2. vai jaunāku versiju. Skatiet [LICENSE](../../../LICENSE).
