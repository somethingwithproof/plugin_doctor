<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: osisi cactus yi stethoscope. Chọpụta nsogbu. Dozie. Nyochaa.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Ọnọdụ Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Ikikere: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ na 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor bụ plugin Cacti nke na-achọpụta nsogbu dị na nrụnye n'otu mgbe ma na-eme obere ndozi naanị mgbe onye nchịkwa rịọrọ ya.

**Ọnọdụ: ọ dị n'imepe, tupu 1.0.** Ntọhapụ kachasị ọhụrụ bụ [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Mmelite a na-agbakwunye katalọgụ Hindi na Arabic na ntuziaka ndị ọrụ a sụgharịrị asụgharị n'elu ohere dabere na ọrụ, nchọpụta nsogbu a na-eduzi, nnyocha ịdị ọhụrụ RRD nke nwere oke, nlele mbụ nke ndozi na akụkọ nnyocha, mwepụ ịdọ aka ná ntị a nabatara, na nsụgharị dị na 0.6.0. Lee [CHANGELOG.md](../../../CHANGELOG.md) maka nkọwa zuru ezu.

## Foto ihuenyo

Ntọala nchọpụta nsogbu na nhazi oge n'ime nrụnye ngosi Cacti 1.2.31 dịpụrụ adịpụ
nke na-arụ ọrụ na PHP 8.3.36, gụnyere nnyocha nkwekọrịta Cacti PHP, nkwado nchekwa
sitere n'isi mmalite, na ahụike database. Ịdọ aka ná ntị na ọdịda e gosipụtara
ebe a na-akọwa gburugburu ngosi ahụ.

![Tebụl nchọpụta nsogbu Doctor nwere nsonaazụ gafere, ịdọ aka ná ntị, na ọdịda](../../screenshots/diagnostics.png)

![Ntọala nhazi oge, ọkwa mkpu, na oke nke Doctor](../../screenshots/settings.png)

Nsogbu Cacti na-apụtakarị dị ka mgbaàmà: eserese ndị tọgbọrọ chakoo, poller kwụsịrị, ma ọ bụ plugin na-ekweghị nrụnye. Ihe na-akpatakarị ya bụ ihe dị mkpa nke gbanwere, dị ka mgbakwunye PHP na-efu n'ime nrụnye CLI, ndekọ log nke poller enweghị ike ide ihe na ya, ụzọ RRDtool na-atụ aka na binary na-ezighị ezi, ma ọ bụ database na-enweghị tebụl mpaghara oge. Doctor na-enyocha ihe ndị ahụ dị mkpa ozugbo ma na-akọwa nke ọ bụla dị ka gafere, ịdọ aka ná ntị, ma ọ bụ dara n'iji otu ahịrịokwu kọwaa ihe ọ chọtara. Otu akụkọ ahụ dị na ibe weebụ, na ahịrị iwu, yana dị ka JSON maka nlekọta.

## Ihe ọ na-enyocha

| Mpaghara | Nnyocha |
|---|---|
| Doctor | Ma Doctor n'onwe ya na-agba ọsọ dị ka root, nke ga-eme ka nnyocha ikike kọwaa akaụntụ na-ezighị ezi |
| Cacti na PHP | Ụdị Cacti, nkwalite nke onye nrụnye na-emeghị ka ọ gwụchaa, plugins e nyere ike nke faịlụ ha na-efu, nkwekọrịta PHP na ngwugwu Cacti arụnyere, ọnọdụ nkwado nchekwa PHP sitere n'isi mmalite |
| Mgbakwunye PHP | Mgbakwunye ndị dị mkpa na PHP weebụ na na PHP CLI nke poller na-eji, tinyere atụmatụ ndị a tụrụ aro |
| Nhazi PHP | `memory_limit`, `max_execution_time`, na `date.timezone`, n'iji ndụmọdụ nke Cacti n'onwe ya |
| Database | Njikọ, ụdị sava ma e jiri ya tụnyere ndụmọdụ Cacti, usoro mkpụrụedemede UTF-8, tebụl mpaghara oge, tebụl ndị isi, ndịiche elekere site na sava PHP, na ntọala InnoDB nke Cacti na-egosi dị ka njehie |
| Ahụike database | Ikike njikọ, ọgụgụ buffer-pool, tebụl nwa oge dị na diski, mmepụta thread njikọ, okwu na-adị nwayọọ, na nchere log-buffer InnoDB, yana ndụmọdụ nhazi dabere na ibu ọrụ |
| Usoro faịlụ | Ndekọ cache, log, na RRA ndị a na-ede ihe na ha; ohere efu maka faịlụ RRD; isi mmalite data na-arụ ọrụ na-enweghị faịlụ RRD ma ọ bụ mmelite faịlụ gafere oge; `include/config.php` ka ọ ghara ịbụ nke onye ọ bụla nwere ike ịgụ; log Cacti nke a na-ede ihe na ya ma ghara ịkarị oke ibu |
| Binaries | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, na Spine mgbe ọ bụ poller ahaziri, gụnyere ụdị ebe Cacti kwuru otu |
| Log | Njehie dị n'etiti ahịrị log Cacti kachasị ọhụrụ, yana ozi kachasị apụta ugboro ugboro |
| Ngwaọrụ | Ngwaọrụ e nyere ike ndị dara ma ọ bụ na-agbake, atọ ndị dara ogologo oge kachasị na njehie ikpeazụ ha, na ọdịda mgbe ọtụtụ ngwaọrụ dara n'otu oge |
| Poller | Ụdị poller na oge etiti ya, oge kemgbe isi poller mechara rụchaa ikpeazụ, oge ọrụ ma e jiri ya tụnyere oge etiti ahụ, mmepụta poller nke na-erughị faịlụ RRD ma ọlị, ndị poller dịpụrụ adịpụ kwụsịrị ịkọ akụkọ, Boost kwụsịrị ịrụ ọrụ, na nhazi Spine nke na-atụ aka na database dị iche |

Nnyocha ọ bụla nwere ID kwụsiri ike, dị ka `database.timezone` ma ọ bụ `binary.rrdtool`, ka scripts wee nwee ike dabere na nsonaazụ nke ọ bụla. Plugins ndị e nyere ike nwere ike ịgbakwunye nnyocha ndị ọzọ na mgbakwunye ngwugwu nkwado site na hook `doctor_register_checks`, Doctor na-egosikwara `plugin_mcp` ikike nnyocha ọgụgụ naanị site na `abilities_register`.

## Mapụ koodu na nnwale

| Omume | Mmejuputa | Ihe akaebe nnwale dị na repository a |
|---|---|---|
| Nnyocha nchọpụta nsogbu na ID akụkọ kwụsiri ike | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Hook nnyocha plugin (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Ikike nnyocha MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Ohere dabere na ọrụ na akụkọ weebụ e degharịrị ihe nzuzo | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Nnyocha mgbaàmà a na-eduzi | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Ịdị ọhụrụ RRD na njikwa ide ihe e yigharịrị | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Nlele mbụ nke ndozi, akụkọ nnyocha, na ịdọ aka ná ntị a nabatara | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Nnyocha a haziri oge na mgbanwe ọkwa mkpu | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Ntụaka ndị a na-egosi mmejuputa na mkpuchi nnwale; ha anaghị ekwu
na ọrụ CI ọ bụla agafeela maka ngbanwe dị ugbu a. Lelee ọsọ workflow
maka ngbanwe ị na-eme atụmatụ itinye n'ọrụ.

## Ndụmọdụ ahụike database

Onye nyocha PHP nke Doctor na-agụ otu usoro ngụkọ MySQL ma ọ bụ MariaDB zuru ụwa ọnụ site na njikọ database Cacti dị adị. Ọ na-eme ajụjụ ọgụgụ naanị abụọ maka akụkọ ọ bụla, ọ dịghị achọ nzere ma ọ bụ faịlụ mmemme ọzọ, ma ọ naghị agbanwe nhazi database ma ọlị. Nnyocha ndị a na-apụta n'akụkọ weebụ, CLI, JSON, mmepụta nlekọta, ngwugwu nkwado, na nsochi ọnọdụ a haziri oge.

| ID Nnyocha | Ihe na-akpalite nnyocha |
|---|---|
| `database.health_sample` | Ihe na-erughị awa 24 kemgbe mmalite ma ọ bụ `FLUSH STATUS`, ma ọ bụ oge ọrụ adịghị/ekwekọghị |
| `database.connection_capacity` | Njikọ dị ugbu a ma ọ bụ nke kachasị elu e dekọrọ dịkarịa ala 80% nke `max_connections` dị ugbu a |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` dịkarịa ala 1%, yana opekata mpe arịrịọ ọgụgụ 10,000 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` dịkarịa ala 25%, yana opekata mpe tebụl nwa oge 1,000 |
| `database.thread_cache` | `Threads_created / Connections` dịkarịa ala 5%, yana opekata mpe mgbalị njikọ 1,000 na `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` dịkarịa ala 1%, yana opekata mpe okwu 1,000 |
| `database.redo_log_waits` | `Innodb_log_waits` na-abụghị efu |

Ndị a bụ oke nnyocha nke Doctor, ọ bụghị ebumnuche nhazi nke ndị na-emepụta ya. Ewezuga ikike njikọ, ndụmọdụ mkpokọta chọrọ oge nleba anya dị n'elu. Ngụkọ na-efu, nke emebiri emebi, nke e depụtara ugboro abụọ, ma ọ bụ nke buru ibu karịa oke, ọrụ na-ezughị ezu, na ụdị thread a na-akwadoghị na-ewepụta ịdọ aka ná ntị kama ịbụ ikpe ahụike ma ọ bụ ndụmọdụ nhazi. Ịdọ aka ná ntị nwere ike imetụta ọnọdụ Nagios na ọkwa mkpu a haziri oge mgbe e nyere **Ọkwa Mkpu maka Ịdọ Aka Ná Ntị** ike.

Gụọ ngụkọ ndị e tụrụ na ndụmọdụ ọnụ. Ọnụọgụ mkpokọta anaghị egosi ibu ọrụ dị ugbu a; ngụkọ nwere ike inwe akụkọ ntọgharị dị iche iche ma ha abụghị foto oge otu ugboro. Njikọ kachasị elu nwere ike igosi oke ochie. Ngụkọ ajụjụ nwayọọ dabere na `long_query_time`, na ngụkọ tebụl nwa oge diski nke MySQL nwere ike ịhapụ faịlụ e debere na ebe nchekwa. Nkeji dị ala anaghị egosi na enweghị ihe mgbochi. Kwenye usoro n'okpuru ibu ọrụ nnọchiteanya, nyochaa atụmatụ ajụjụ na ojiji njikọ ọzọ, ma tụọ ebe nchekwa dị na **sava database** tupu ịgbanwe buffers ma ọ bụ oke njikọ.

Ọ bụrụ na atụmatụ adịghị, lelee nkwado sava na ohere akaụntụ Cacti nwere na `SHOW GLOBAL STATUS` na `SHOW GLOBAL VARIABLES`; Doctor anaghị arịọ nzere dị elu karịa. Nkọwa ngụkọ sitere na [ntụaka mgbanwe ọnọdụ MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) na [ntụaka mgbanwe ọnọdụ MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Enweghị script ma ọ bụ koodu MySQLTuner e ji mee ihe.

Enweghị mbufe schema ma ọ bụ nhazi dị mkpa. Tinye faịlụ plugin n'ụzọ nkịtị; iweghachi faịlụ ndị ahụ na-ewepụ nchọpụta nsogbu e tinyere. A na-eme ka ọnọdụ a haziri oge dị adị dị ọhụrụ n'ọsọ na-esote.

## Otu o si echekwa nchekwa

Ngwaọrụ nnyocha na-eji ikike nke poller ma ọ bụ sava weebụ arụ ọrụ ma na-agụ ụzọ faịlụ site na tebụl ntọala, ya mere ọ ga-akpachara anya maka ihe ọ na-eme ma na-agbanwe.

- Nnyocha bụ naanị maka ọgụgụ. Ha anaghị agbanwe faịlụ, ntọala, ma ọ bụ data ma ọlị.
- Doctor na-agba faịlụ mmemme a haziri naanị mgbe aha faịlụ ya kwekọrọ na mmemme a tụrụ anya ya (`php`, `rrdtool`, `snmpget`, ma ọ bụ `snmpwalk`). Ma ọ bụghị ya, onye ọ bụla nwere ike ide ihe na tebụl ntọala ga-ahọrọ ihe Doctor na-agba. A na-akọ aha ọ bụla ọzọ dị ka ịdọ aka ná ntị ma anaghị agba ya.
- Doctor anaghị agba faịlụ mmemme a haziri dị ka root, ọ na-akọkwa mgbe ọ na-arụ ọrụ dị ka root.
- Ndozi na-esite na ndepụta nkwado a kapịrị ọnụ. Nke ọ bụla chọrọ omume onye nchịkwa e nyochara ikike ya na UI weebụ ma ọ bụ `--yes` na CLI, a na-edekwa nke ọ bụla na ndekọ Cacti.

## Mwepụta

Ụdị dị iche iche na-agbaso SemVer ma kwekọọ na faịlụ `INFO` nke plugin ahụ. Lee
[usoro mwepụta](../../releasing.md) maka nhọrọ ụdị, ọnụ ụzọ CI, ihe dị n'ime ngwugwu,
nlele checksum, na ntụziaka nlọghachi azụ.

## Nrụnye

Budata `doctor-VERSION.tar.gz` ma ọ bụ `doctor-VERSION.zip` na `SHA256SUMS` site na
[Mwepụta GitHub](https://github.com/somethingwithproof/plugin_doctor/releases).
Nyochaa checksum SHA-256 nke ebe nchekwa ahụ, wee wepụta ndekọ `doctor/` ya banye
n'ime ndekọ `plugins/` nke Cacti. Ndị a bụ ngwugwu a pụrụ ịwụnye; ebe nchekwa isi mmalite
akpaka nke GitHub nwere aha ndekọ dị iche. Iji gbaa ọrụ a na-ewepụtabeghị
site na `develop`, wụnye site na nbudata isi mmalite.

Maka nbudata isi mmalite:

Mepụtagharịa ma ọ bụ tọghe ebe nchekwa ahụ dị ka `plugins/doctor` n'ime nrụnye Cacti. Aha ndekọ ahụ ga-abụrịrị `doctor`, ọ bụghị `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Wụnye ma gbanye **Cacti Doctor** site na **Nhazi > Njikwa Plugin**, wee nye ikike mpaghara **Doctor Viewer**, **Doctor Operator**, ma ọ bụ **Doctor Administrator** site na ikike onye ọrụ ma ọ bụ otu Cacti. Ikike **Cacti Doctor** dị adị na-ejigide ohere Administrator mgbe emelitechara. Akụkọ ahụ na-apụta n'okpuru **Ngwaọrụ > Cacti Doctor**.

## Asụsụ

Doctor na-eweta katalọgụ ntụgharị asụsụ 48 na-abụghị Bekee n'okpuru `locales/po/` na `locales/LC_MESSAGES/` nke gụnyere mpaghara asụsụ Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Afrịka (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Eshia (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), na Ndịda Ọwụwa Anyanwụ Yurop (`bs-BA`, `hr-HR`, `sr-RS`). Cacti na-egosi katalọgụ ozugbo agbanyere nkwado asụsụ (**Nhazi > Ntọala > Izugbe > Nkwado Asụsụ**) ma onye ọrụ họrọ mpaghara asụsụ nke Cacti na-egosipụta n'ihe nhọrọ asụsụ ya; katalọgụ maka mpaghara asụsụ ndị a na-edepụtabeghị n'ihe nhọrọ Cacti na-amalite ịrụ ọrụ ozugbo Cacti tinyere ha. Ibe weebụ, ntọala, na ozi na ederede akụkọ nke ahịrị iwu na-ebipụta na-agbaso asụsụ Cacti; akụkọ ahịrị iwu n'onwe ya na-eji asụsụ ndabara Cacti, nke na-anọgide n'asụsụ Bekee belụsọ ma ị gbanwee ya.

Anaghị atụgharị mmepụta igwe na-agụ ma ọlị: ID nnyocha, igodo JSON na uru ọnọdụ, mmepụta `--format=nagios` na `--format=prometheus`, ahịrị ndekọ, na isiokwu ngalaba nke ngwugwu nkwado na-anọgide n'asụsụ Bekee ka edemede na nlekota wee nọgide na-arụ ọrụ n'asụsụ ọ bụla. Ederede `summary` na `detail` nke nnyocha ọ bụla bụ naanị akụkụ a tụgharịrị n'akụkọ JSON.

Katalọgụ Spanish nke Latin America (`es-419`) sokwa na-abịa, mana ma Cacti 1.2 ma Cacti 1.3 enweghị mpaghara asụsụ Spanish nke Latin America a ga-ahọrọ, ya mere ọ na-amalite ịrụ ọrụ naanị mgbe Cacti tinyere otu. Ruo mgbe ahụ, họrọ Spanish (`es-ES`).

Cacti na-ebu katalọgụ nke plugin site na `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` ebe `doctor` bụ ngalaba ederede, na 1.2.x na 1.3 otu ahụ (1.3 na-achọta ndekọ plugin site na ụzọ plugins ya a pụrụ ịhazi).

## Ọkwa ohere

| Mpaghara Ikike | Ike Ọrụ |
|---|---|
| Doctor Viewer | Gụọ ọnọdụ nnyocha oge kachasị ọhụrụ, oge nlele, ịdị ọhụrụ na akụkọ nchịkọta na-adịbeghị anya. Enweghị iwu nnyocha, nkọwa raw, nhazi ma ọ bụ ndozi. |
| Doctor Operator | Gbaa akụkọ nnyocha nwere oke usoro nke sekọnd 120, nyochaa nkọwa e zoro ezo, ma kweta nchọpụta. Enweghị mgbanwe ntọala ma ọ bụ ndozi. |
| Doctor Administrator | Ike Operator tinyere ndozi dị na ndepụta nkwado na ntọala Doctor. Ndozi na ntọala chọkwara mpaghara Settings/System Utilities nke Cacti. |

Menu Utilities na-emepe ibe maka mpaghara ikike Doctor kachasị elu e nyere onye ọrụ, gụnyere ikike otu. Mpaghara Viewer na Operator ọhụrụ anaghị enweta ikike akpaka ọ bụla. ID mpaghara mbụ na-anọgide na-ejikọta na `doctor.php` dị ka Administrator, na-echekwa ohere onye ọrụ na otu dị adị.

Data Viewer na-esite na nnyocha e mere n'oge. Gbanye nhazi oge tupu inye ohere Viewer; nlele na-efu ma ọ bụ nke gafere oge na-egosi **amaghị**, ọ dịghị mgbe ọ na-egosi ahụike. Akụkọ ihe mere eme na-edobe ọnụọgụgụ nchịkọta oge 20 ikpeazụ ma wepụ ọnọdụ ngwaọrụ. Ndị Operator na-amalite nnyocha ọhụrụ n'ụzọ doro anya; mmeghari ibe nkịtị na-eji akụkọ ikpeazụ nke nnọkọ ha.

Nkọwa ngwaọrụ na ngụkọta na-eji ikike ngwaọrụ nke onye ọrụ dị ugbu a. Mpempe akwụkwọ ndekọ chọkwara mpaghara Log Administration nke Cacti. A na-ekpuchi ihe nzuzo tupu e chekwaa nkọwa nnyocha na nnọkọ weebụ ma ọ bụ gosipụta ha. Ohere CLI na-anọgide na-achịkwa site na akaụntụ sistemụ arụmọrụ.

Nkwenye bụ nke onwe ma na-edekọ ya na ndekọ Cacti. Ha na-emetụta naanị otu nchọpụta na ihe akaebe ahụ; ihe akaebe gbanwere chọrọ nkwenye ọhụrụ. Ha anaghị agbanwe ọnọdụ pass/warn/fail, gbochie ọkwa, ma ọ bụ kaa nnyocha na-ada ada dị ka ahụike. Nke a dị iche na ndị ewepụrụ maka ịdọ aka ná ntị a nabatara, nke na-emetụta iwu ọkwa n'agbanweghị ọnọdụ a hụrụ ma kọwaa ya n'okpuru.

Omume ọ bụla chọrọ POST na token CSRF ziri ezi. Ndozi na-egosi ibe nkwenye dị iche nwere njikọ Kagbuo nke na-adịghị eziga fọm, ma na-edekọ onye ọrụ mere ya na nsonaazụ ya na ndekọ Cacti.

## Ahịrị iwu

Gbaa ndị a site na mgbọrọgwụ Cacti dị ka onye ọrụ poller Cacti, ọ bụghị root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Mmepụta ederede na-ebipụta otu ahịrị maka nnyocha ọ bụla yana ọnọdụ ya, ụdị ya, nchịkọta ya, na nkọwa ya. `--json` na-ebipụta ihe `summary` nwere ọnụọgụgụ ọnọdụ na usoro `checks` nke ndenye ya bu `id`, `category`, `status`, `summary`, `detail`, na `repair`/`repairable` mgbe ndozi dị na ndepụta nkwado metụtara.

| Ọnọdụ ọpụpụ | Ihe ọ pụtara |
|---|---|
| `0` | Enweghị nnyocha dara, ma ọ bụ ndozi a rịọrọ gara nke ọma. Ịdọ aka ná ntị anaghị agbanwe ọnọdụ ọpụpụ. |
| `1` | Ma ọ dịkarịa ala otu nnyocha dara, ma ọ bụ ndozi a rịọrọ agaghị nke ọma. |
| `2` | Njehie ojiji: ndozi a gbara n'enweghị `--yes` (`--preview` achọghị ya), ID ndozi a na-amaghị, usoro mmepụta a na-amaghị, njikọta `--symptom` ma ọ bụ usoro a na-akwadoghị, ma ọ bụ nrụnye Cacti a na-enweghị ike ịchọta. |

Cacti na-ebuli `memory_limit` maka edemede CLI ọ bụla, ya mere nnyocha nhazi oge ngafe PHP bara uru naanị n'ibe weebụ.

## Nnyocha e mere n'oge na ọkwa

N'okpuru **Nhazi > Ntọala > Doctor**, gbanye **Gbaa Nnyocha na Nhazi Oge** ma họrọ oge etiti site na nkeji 15 ruo otu ụbọchị. Mgbe okirikiri poller ọ bụla ruru oge, Doctor na-agba nnyocha ọ bụla n'usoro dị n'azụ, ya mere oge ọrụ nke poller n'onwe ya anaghị emetụta.

Ọgba ọ bụla na-edekọ ọnọdụ a hụrụ nke nnyocha ọ bụla. Ndị ewepụrụ maka ịdọ aka ná ntị na-arụ ọrụ na-emetụta iwu ọkwa n'agbanweghị nlele ahụ. Mgbe nnyocha malitere ma ọ bụ kwụsị ịda, Doctor na-ede mgbanwe ahụ na ndekọ Cacti ma, ọ bụrụ na edobere **Adreesị Ozi-e Maka Ọkwa**, na-eziga ozi-e na adreesị ndị ahụ site na ntọala ozi Cacti. **Dọọ Aka ná Ntị na Ịdọ Aka ná Ntị** na-agbakwunye mgbanwe mbata na mpụta nke ịdọ aka ná ntị. Ọgba mbụ na-edekọ naanị ntọala mbụ.

Akụkọ e mere n'oge na-agba na poller bụ isi n'okpuru mkpọchi ndụmọdụ nke nchekwa data ma nwee oke onye ọrụ nkeji abụọ. Doctor na-akọ mmalite ikpeazụ na mmecha gara nke ọma ka nsonaazụ na-efu ma ọ bụ nke ochie wee pụta ìhè. A na-agụta nsonaazụ dị ka nke dị ugbu a maka oge etiti ahụ tinyere otu okirikiri polling na nkeji atọ. A na-anwalegharị ọgba na-emechaghị mgbe nkeji 5, 10, 20 na karịa gasịrị, ruo na oge etiti nkịtị. A na-echekwa nnyefe ọkwa dara ada maka ihe ruru ugboro atọ nke nwalegharị na nkwụsịtụ na-abawanye; mgbe nke ahụ gasịrị, dozie ntọala ozi Cacti ma gbaa `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` dị ka onye ọrụ poller. Nnabata sava ozi anaghị ekwenye nnyefe n'ime igbe mbata.

Otu taabụ ahụ na-edozi oke maka oge ọrụ poller (80% nke oge etiti), ohere diski efu nke RRA (dọọ aka ná ntị n'okpuru 10%, daa n'okpuru 2%), mgbanwe elekere nchekwa data (dọọ aka ná ntị karịa sekọnd 5, daa karịa 60), na nha ndekọ Cacti (100 MB). Uru tọgbọ chakoo ma ọ bụ ndị na-abaghị uru na-alaghachi na ndabara ndị a.

## Njikọta nlekota

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` na-ebipụta otu ahịrị ọnọdụ nwere data arụmọrụ ma pụọ na `0` (OK), `1` (WARNING), ma ọ bụ `2` (CRITICAL), ka Nagios, Icinga, ma ọ bụ sistemụ ọ bụla kwekọrọ wee nwee ike ịgba ya ozugbo. `--format=prometheus` na-ede usoro ederede Prometheus maka onye nchịkọta textfile nke node_exporter: `cacti_doctor_check_status` maka nnyocha ọ bụla (0 ịgafe ma ọ bụ ịdọ aka ná ntị a nabatara, 1 ịdọ aka ná ntị chọrọ omume, 2 ọdịda), `cacti_doctor_check_observed_status` tupu ndị ewepụrụ, `cacti_doctor_check_accepted`, `cacti_doctor_checks` maka ọnọdụ ọ bụla, na `cacti_doctor_last_run_timestamp_seconds`. Ahịrị nnyocha JSON gụnyere ngalaba `assessment`; `not_assessed` pụtara na nnyocha ahụ enweghị ike iru nkwubi okwu site na data dịnụ.

## Ngwugwu nkwado

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Ngwugwu ahụ bụ otu faịlụ ederede nwere ụdị Doctor, Cacti, PHP, OS, na nchekwa data, ọnụọgụgụ poller na Boost, akụkọ zuru ezu, mgbakwunye ngwugwu nkwado ọ bụla nke plugin n'okpuru `== Plugin attachments`, na ahịrị 200 ikpeazụ nke ndekọ Cacti. A na-ekpuchi uru ndị na-eso aha okwuntụghe, ihe nzuzo, token, community, na igodo. Doctor na-emepụta faịlụ ahụ ka ọ bụrụ naanị onye nwe ya nwere ike ịgụ ma jụ idekwasị faịlụ dị adị. Nyochaa ya tupu ị bipụta ya ebe ọ bụla.

## Iwu nrụzi

Doctor gụnyere otu nrụzi, `runtime_directories`. Ọ na-emepụta ndekọ oge mmezu Cacti ndị na-efu efu ma na-agbakwunye ikike ọgụgụ, edemede, na mmezu nke onye nwe ya n'ewepụghị ikike ndị dị adị.

Ọ na-elekwasị anya na `$cache_path`, `$log_path`, na `$rra_path` na Cacti 1.3, ma ọ bụ ndekọ `cache`, `log`, na `rra` nke nrụnye ahụ ma ọ bụrụ na ọ bụghị ya. Ọ na-amafe ndekọ ndị a na-edepụtali ihe na ha, na-ajụ ndekọ ndị dị na mpụga nrụnye Cacti (dị ka ndekọ ndekọta n'okpuru `/var/log`), na-ajụ njikọ nnọchianya, ma na-ajụ ịgba ọsọ dị ka root. Ọ dịghị mgbe ọ na-eso `path_cactilog`, ya mere faịlụ ndekọta a haziri n'ime ndekọ koodu enweghị ike iduga nrụzi ahụ ebe ahụ. Nnyocha ahụ ka na-enyocha ndekọ faịlụ ndekọta a haziri na ntọhapụ ọ bụla.

Ọ naghị agbanwe onye nwe ya, ọ naghị agba iwu shell, ọ naghị edegharị nhazi, ma ọ bụ gbanwee data ngwa Cacti. Nrụzi ọhụrụ ọ bụla ga-agụnyerịrị nnyocha, onye njikwa dị na ndepụta ikike, nkwenye, ndekọta nyocha, na ule.

## Ịnyocha mgbaàmà

Ndị ọrụ na Ndị nchịkwa nwere ike ịhọrọ **Nyochaa mgbaàmà** na ibe Doctor. Otu iwu ahụ dị site na `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, ma ọ bụ `alerts_missing`, yana mmepụta ederede ma ọ bụ JSON. Ngwugwu nkwado gụnyere nnyocha mgbaàmà ndị dị mkpa.

Ihe ndị a tụrụ aro nke ọ bụla na-edepụta nyocha ndị a hụrụ na nzọụkwụ nkwenye na-esonụ. Ihe ndị a tụrụ aro bụ echiche nyocha, ha abụghị isi ihe kpatara ya a kwadoro. Nleba anya na-efu efu, nke a na-enyochaabeghị ma ọ bụ nke ochie anaghị egosipụta ihe kpatara ya. Nnyocha weebụ na-eji mkpesa a tụlere site na ikike; mkpesa CLI na-eji ohere akaụntụ sistemụ arụmọrụ.

## Ịdị ọhụrụ nke mmelite RRD

`filesystem.rrd_stale` na-enyocha ihe ruru isi mmalite data 500 na-arụ ọrụ, ewezuga ngwaọrụ ndị agbanyụrụ na ndị dara ada. Na nrụnye buru ibu, ihe nlele ahụ na-agbanwe kwa elekere, ya mere mmezu ugboro ugboro na-ekpuchi faịlụ dị iche iche. Ọ na-atụnyere oge mgbanwe faịlụ na nke kacha ukwuu n'etiti oge poller, nzọụkwụ RRD isi mmalite na nzọụkwụ profaịlụ, mụbaa ya na **Oge Nkwụsị RRD** (ndabere 3). Ọ na-egosi faịlụ atọ kacha ochie kwụsịrị ọrụ na ọnụọgụgụ ngwaọrụ metụtara. Nsonaazụ weebụ gụnyere naanị ngwaọrụ ndị e nyere ikike.

`filesystem.rrd_files` bụ nyocha ịdị adị dị iche. Ọ na-achọ faịlụ RRD nke ihe ruru isi mmalite data 5,000 na-arụ ọrụ, gụnyere ndị dị na ngwaọrụ agbanyụrụ ma ọ bụ ndị dara ada, ma na-eji otu ihe nlele kwa elekere ahụ.

Boost na-agbakwunye okpukpu abụọ nke oge nkwụsịtụ e haziri ahazi dị ka ohere edemede diski. Maka onye edemede ọzọ e yigharịrị, hazie **Ohere Edemede RRD E Yigharịrị (sekọnd)**. `RRDCACHED_ADDRESS` a kpọsara n'enweghị ohere, ma ọ bụ oge Boost na-adịghị mma, na-ewepụta nsonaazụ a na-enyochaabeghị. Doctor anaghị ekpochapụ cache iji mee nyocha a. Oge mgbanwe bụ ihe akaebe nke ọrụ diski, ọ bụghị ihe akaebe nke nchịkọta data gara nke ọma. Caching mpụga nke Doctor enweghị ike ịchọpụta ka a ga-ahazirịrị n'ụzọ doro anya.

A na-agụ faịlụ ndị na-efu efu, ndị a na-apụghị ịgụ na ndị nwere ụbọchị ọdịnihu na nkọwa. Nsonaazụ na-abụ nke a na-enyochaabeghị naanị mgbe ọ nweghị faịlụ a nwalere a pụrụ ịgụ. Nsonaazụ nlele na-ekwu na ọ na-ekpuchi naanị akụkụ nke nrụnye ahụ; ngafe anaghị ekpuchi faịlụ ndị a na-anwalebeghị.

## Nlele mbụ nke nrụzi na akụkọ nyocha

Ibe nrụzi nke Onye nchịkwa na-egosi ụzọ ọ bụla metụtara, omume a tụrụ aro, ikike dị ugbu a na ikike e lekwasịrị anya. Nkwado jikọtara ya na nlele mbụ ahụ, onye ọrụ na-eme ihe na oge ndụ nkeji ise. Nkwenye na-eri nlele mbụ ahụ; sistemụ faịlụ gbanwere chọrọ nlele mbụ ọzọ. Mmezu dị ka root, ụzọ ndị dị na mpụga nrụnye, njikọ ndị chọrọ nrụzi na ikike sistemụ faịlụ na-ezughị ezu na-egbochi nkwado.

`--repair=runtime_directories --preview` na-ebipụta atụmatụ JSON nke ọgụgụ naanị. `--repair=runtime_directories --yes` na-akwado atụmatụ CLI a gbakọrọ ọhụrụ ma na-enyocha ya ọzọ tupu mmezu. Akaụntụ CLI ga-enwerịrị ikike ịrụzi nrụnye ahụ; ọ naghị eketa ọrụ weebụ.

A ga-echekwarịrị ndekọ `repair.started` a haziri ahazi tupu mgbanwe sistemụ faịlụ ọ bụla. Ndekọ `repair.completed` jikọtara ọnụ nwere foto mgbe nrụzi gasịrị na nsonaazụ nkwenye. Ọrụ a kwụsịrị n'etiti na-ahapụ ndekọ malitere maka nnyocha. A na-akọ ọdịda nyocha mmezu dị ka ọdịda ọ bụrụgodị na mgbanwe sistemụ faịlụ mere. Doctor na-agbakwunye ikike onye nwe ya ma na-emepụta ndekọ; ọ naghị anwa iweghachi azụ n'onwe ya.

Ndị nchịkwa nwere ikike Settings/System Utilities nke Cacti nwere ike ịgụ ntinye nyocha 20 kacha ọhụrụ na ibe Doctor. Plọgịn ahụ na-edobe ndekọ 200 kacha ọhụrụ na `plugin_doctor_audit`; ndekọta Cacti na-edekọkwa ID ha, omume ha na ndị mere ya. A na-ekpuchi ozi nzuzo dị na ibu nyocha.

## Ịdọ aka na ntị a nabatara

Ndị nchịkwa nwere ikike Settings/System Utilities nke Cacti nwere ike imepụta **Mgbapụ ịdọ aka na ntị** site na ịdọ aka na ntị ọhụrụ a nyochara na ibe Doctor. Mgbapụ chọrọ onye nwe ya, ihe kpatara ya na ụbọchị nyocha UTC n'ime ụbọchị 90. Ọ na-agwụ n'etiti abalị UTC na mmalite nke ụbọchị ahụ. Enwere ike ịhazi ihe ruru mgbapụ 100. Ndepụta ahụ na-egosipụta ntinye ndị gwụrụ agwụ na ID ndị na-adịghị na mkpesa dị ugbu a, ma na-enye ohere iwepụ ha.

Ịdọ aka na ntị a hụrụ na-anọgide na-apụta ìhè, yana onye nwe ya, ihe kpatara ya na mgbe ọ na-agwụ na nkọwa nnyocha. JSON na-edobe ọnọdụ a hụrụ ma na-agbakwunye metadata `accepted` na `acceptance`. Nagios na-ewepụ ịdọ aka na ntị a nabatara na-arụ ọrụ n'ogo ọpụpụ ya mana ọ na-akpọ aha ha na mmepụta ya. Prometheus na-ebupụ ma ogo a hụrụ ma ogo a ga-eme ihe. Ọnọdụ ọpụpụ CLI nkịtị na-anọgide otu: ịdọ aka na ntị na-apụ na efu, ọdịda na-apụ na otu.

A na-egbochi ọkwa ịdọ aka na ntị a haziri ahazi mgbe mgbapụ ahụ na-arụ ọrụ; njedebe ma ọ bụ mwepụ na-eme ka ịdọ aka na ntị na-aga n'ihu ruo eru maka ọkwa ịdọ aka na ntị ọzọ. Mgbanwe ọdịda na ngbake site na ọdịda na-anọgide na-eru eru maka ọkwa. Enweghị ike ịnabata nsonaazụ a na-enyochaabeghị ma ọ bụ ọdịda. Nkwenye nkeonwe dị iche ma ọ naghị egbochi ihe ọ bụla. Mmepụta na mwepụ mgbapụ na-arụkọ ọrụ dị ka otu azụmahịa na ndekọ nyocha.

Mmelite elu na-emepụta `plugin_doctor_audit` na `plugin_doctor_acceptance` n'agbanweghị data ngwa Cacti. Bupụ akụkọ ọ bụla ị chọrọ tupu iwepụ: mwepụ na-ewepụ ma tebụl plọgịn abụọ ahụ ma ntọala ya. Iweghachi faịlụ plọgịn na-ahapụ tebụl ndị ahụ ka ha dị maka nnyocha, mana ụdị ochie anaghị asọpụrụ mgbapụ ịdọ aka na ntị.

## Nnyocha plugin (`doctor_register_checks`)

Plugins Cacti e nyere ike nwere ike inye nnyocha nchọpụta nsogbu nke ọgụgụ naanị na mgbakwunye ngwugwu nkwado nhọrọ site na ịdebanye aha hook `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor na-akpọ plugins e nyere ike ma na-abụghị nke ejikọtara ọnụ ndị e debanyere aha na `doctor_register_checks` (na-amafe `doctor` na `cacti`), na-achọta faịlụ hook kpọmkwem n'ime ndekọ nke plugin ahụ n'onwe ya. Callback ahụ na-anata `['mode' => 'run' | 'list', 'plugin' => '<slug>']` ma weghachite ma ọ bụ ndepụta nke nkọwa nnyocha ma ọ bụ envelopu nwere `checks` na `attachments` nhọrọ:

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

A na-enyochacha nkọwa nnyocha plugin ọ bụla tupu e tinye ya:

- Igodo achọrọ: `id`, `plugin`, `category`, `title`, `status`, `message`, `details`, na `remediation`.
- `plugin` ga-adabarịrị na slug plugin e debanyere aha (`[a-z0-9_]{1,64}`). `id` ga-adabarịrị na `[a-z0-9_.]{1,128}`, malite na `<plugin>.`, ma ghara ịdaba n'otu ID nnyocha isi ma ọ bụ nke plugin ọzọ dị adị.
- `status` ga-abụrịrị `ok`, `warn`, `fail`, ma ọ bụ `info`. `ok` na-egosipụta dị ka `pass` n'akụkọ Doctor; `info` bụ maka ozi naanị ma ọ naghị akpata ọdịda na CLI, Nagios, Prometheus, ma ọ bụ ọkwa a haziri oge.
- `category` (ruo bytes 64) na `title` (ruo bytes 256) ga-abụrịrị eriri na-enweghị oghere efu na-enweghị mkpụrụedemede njikwa. `message` (na-enweghị oghere efu, ruo bytes 2048) na `remediation` (ruo bytes 2048) ga-abụrịrị eriri ederede.
- `details` na-anabata eriri ederede (ruo bytes 8192) ma ọ bụ usoro scalar/nested array (omimi kachasị 4, JSON e debere ruo bytes 16384; a na-ajụ objects na resources).
- Mgbakwunye ngwugwu nkwado nhọrọ chọrọ `title` na-abụghị efu (ruo bytes 128, enweghị mkpụrụedemede njikwa) na eriri `content` ruo bytes 65536 (64 KiB).

Doctor na-amanye oke nke nnyocha 32 na mgbakwunye 8 maka plugin ọ bụla (nnyocha plugin 64 na mgbakwunye 32 na mkpokọta). Hook ọ bụla na-agba n'ime oke `try`/`catch` nke ya ka e wee kpuchie ihe nzuzo dị na mwepu ma ọ bụ data na-abụghị array ma dekọọ ha na ndekọ Cacti (ngalaba `DOCTOR`) n'emetụtaghị nnyocha isi ma ọ bụ plugins ndị ọzọ. A na-ajụ nkọwa ndị emebiri emebi ma dekọọ ha na ndekọ ebe ndị ziri ezi sitere n'otu plugin ahụ ka na-aga n'ihu. Nnyocha plugin na-abụ mgbe niile maka ọgụgụ naanị (`repairable: false`), a na-ekpuchikwa uru eriri na igodo nzuzo tupu ngosi, mbupụ, ma ọ bụ nchikọta. Nnyocha plugin a kwadoro na-apụta na UI weebụ, mmepụta CLI ederede/JSON/Nagios/Prometheus, nsochi ọnọdụ a haziri oge, na ngwugwu nkwado.

## Njikọta MCP (`abilities_register`)

Doctor na-edebanye aha hook `abilities_register` (`doctor_abilities_register` na `doctor_abilities.php`) ka `plugin_mcp` wee chọpụta ikike nnyocha ya mgbe e nyere ma plugins abụọ ahụ ike. Doctor na-edebanye aha ụdị `diagnostics` (`Diagnostics`) na ikike abụọ nke ọgụgụ naanị, nke na-adịghị emebi ihe, na nke idempotent:

| ID Ikike | Arụmụka nhọrọ | Mmepụta |
|---|---|---|
| `doctor-run-checks` | `category` (eriri, kachasị mkpụrụedemede 64), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) na ruo `findings` 256 e kpuchiri ihe nzuzo (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (eriri, kachasị mkpụrụedemede 64), `plugin` (eriri, kachasị mkpụrụedemede 64) | Ruo `checks` 256 (`id`, `plugin`, `category`, `title`) nke na-ekpuchi nnyocha 45 niile e tinyere n'ime ya tinyere nnyocha plugins e nyere ike |

Ikike abụọ ahụ bụ naanị maka ọgụgụ ma ha anaghị eme nrụzi ọ bụla. Na mgbakwunye na mpaghara ikike na njikwa ngosi ikike nke `plugin_mcp` n'onwe ya (ikike plugin na-ebido zoro ezo na MCP ruo mgbe onye nchịkwa gosipụtara ha), Doctor chọrọ ka onye nwe token nwee **Doctor Viewer** ma ọ bụ mpaghara ikike Doctor dị elu karịa. `doctor-run-checks` na-ejedebe `devices.health` na ngwaọrụ e nyere onye nwe token ikike, na-agụnye `logging.recent_errors` naanị mgbe onye ọrụ nwere mpaghara Cacti 18 ma ọ bụ 19, na-ahapụ `filesystem.rrd_files`, ma na-agụnye `filesystem.rrd_stale` nwere oke ngwaọrụ naanị maka **Doctor Operator** ma ọ bụ **Doctor Administrator**.

## Ihe ndị a chọrọ

| Cacti | PHP | Ndetu |
|---|---|---|
| 1.2.20 | 5.4 ma ọ bụ karịa | Koodu Doctor n'onwe ya dakọtara na PHP 5.4 ka o wee nwee ike ịchọpụta nsogbu sistemụ ochie tupu mmelite elu |
| 1.2.31 | 8.0 ma ọ bụ karịa | `composer.json` nke Cacti chọrọ `>=8.0` |
| 1.2.x dị ugbu a | 8.2 ma ọ bụ karịa | `composer.json` nke Cacti chọrọ `>=8.2` |
| `develop` (1.3) | 8.3 ma ọ bụ karịa | `composer.json` nke Cacti chọrọ `^8.3` |

Ahịrị **Ndakọrịta PHP na Cacti arụnyere** na-atụnyere ụdị PHP na-agba ọsọ na ihe PHP chọrọ na mgbọrọgwụ `composer.json` nke Cacti n'onwe ya, gụnyere oke elu nke mgbochi caret dị ka `^8.3`. A na-enyocha faịlụ mmezu PHP CLI a haziri ahazi megide otu ihe ahụ a chọrọ. Doctor na-amata ụdị mgbochi `>=` na `^` nke ngwugwu Cacti ndị a na-eji. Ihe a chọrọ na-apụghị ịgụ, nke e mebiri emebi, nke na-efu efu, ma ọ bụ nke a na-amaghị na-ewepụta ịdọ aka na ntị; nrụnye Cacti 1.2.20–1.2.30 na-enweghị manifest na-edobe oke ala nrụnye PHP 5.4 ha e dekọrọ. Ndakọrịta PHP 5.4 nke Doctor n'onwe ya anaghị egosipụta ndakọrịta na nrụnye Cacti ọhụrụ.

Ahịrị **Nkwado nchekwa PHP si n'isi mmalite** na-aza ajụjụ dị iche: alaka ntọhapụ PHP ahụ ọ ka na-enweta ndozi nchekwa site na ọrụ PHP? Ọ na-akọ ụbọchị njedebe nkwado nchekwa alaka ahụ e bipụtara ma na-adọ aka na ntị mgbe ụbọchị ahụ gasịrị. Dị ka ihe atụ, PHP 8.1 nwere ike imezu ihe nrụnye Cacti ochie chọrọ n'oge mmezu ebe ọ na-enwetaghịzi ndozi nchekwa si n'isi mmalite. Nsonaazụ ngafe apụtaghị na ntọhapụ patch arụnyere dị ugbu a, na Doctor enweghị ike ikpebi ma onye na-ere OS na-enye ndozi e weghachiri azụ.

E jikọtara ụbọchị nkwado na Doctor site na [usoro oge nkwado PHP](https://www.php.net/supported-versions.php) na [ndepụta njedebe ndụ](https://www.php.net/eol.php), nke e nyochara ikpeazụ na 2026-11-08. Alaka ndị a na-amaghị na ntọhapụ tupu oge eruo na-ewepụta ịdọ aka na ntị kama ịbụ ngafe a tụrụ anya. Enweghị arịrịọ netwọkụ a na-eme n'oge nnyocha. Melite data nkwado Doctor mgbe PHP bipụtara usoro oge ọhụrụ. ID JSON/nleba anya dị adị `php.version` na `php.security_baseline` agbanweghị.

## Mmepe

Usoro ule otu na-eji Pest na nyocha static na-eji PHPStan (ọkwa 6), ha abụọ na PHP 8.2 ma ọ bụ karịa:

```console
composer install
composer phpstan
composer test
```

Ule ndị ahụ na-eji obere ndị nnọchianya dị na `tests/CactiStubs.php` dochie ọrụ Cacti ndị Doctor na-akpọ, ya mere ha na-agba ọsọ n'enweghị nrụnye Cacti.

GitHub Actions na-eme ụdị nyocha ise na push na pull request ọ bụla:

- Nnwale nkwekọrịta ngwugwu mwepụta (`tests/test_release.py`) na owuwu ebe nchekwa (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, nke na-ada ma ọ bụrụ na ndebiri ntụgharị asụsụ emeela ochie, katalọgụ ezughị ezu ma ọ bụ nke na-edochaghị anya, ma ọ bụ katalọgụ a chịkọtara dị iche na isi mmalite ya.
- `php -l` na faịlụ PHP ọ bụla n'okpuru PHP 5.4, 5.6, 7.0, 7.1, 7.4, na 8.0 ruo 8.4.
- `composer phpstan` (PHPStan ọkwa 6) na `composer test` (usoro ule otu Pest) na PHP 8.2, 8.3, na 8.4.
- Ọrụ njikọta asaa ndị na-arụnye Cacti 1.2.20, alaka 1.2.x dị ugbu a, na `develop` megide MySQL na MariaDB, yana ma cmd.php ma Spine. Ọrụ ọ bụla na-arụnye ma na-agbanye plọgịn ahụ, na-agba mkpesa CLI zuru ezu, ma na-enyocha atụmatụ mkpesa, ngụkọta nchịkọta, ọnọdụ a tụrụ anya, na kpọmkwem usoro ọdịda. Ọ na-emebi ụzọ binary na akara oge poller, na-akwado na a kọrọ ha abụọ, na-eweghachi ha, na-anwale nrụzi na nkwenye ya, ma na-agba gbanyụọ, gbanye, wepụ, na rụnyeghachi. A na-echekwa mkpesa JSON dị ka artifact mgbe ọrụ dara.

## Ntinye aka

A na-eziga pull request na `develop`. Debe faịlụ mmepụta ka ha kwekọọ na PHP 5.4 ma jiri ụdị Cacti: taabụ, eriri edemede nwere otu akara nkwudo, na ngwa inyeaka Cacti dịka `read_config_option()` na `db_fetch_cell()`. Tinye ule nkeji (unit test) maka mgbanwe omume ọ bụla, bịanye aka na ntinye koodu gị (`git commit -s`), ma tinye otu ahịrị na `CHANGELOG.md`.

### Ntụgharị asụsụ

Fụchie ozi ọ bụla onye ọrụ na-ahụ n'ime `__('...', 'doctor')` (ma ọ bụ `__n()`, `__x()`, `__esc()`), ma nye ahịrịokwu nwere uru otu eriri nhazi nwere ebe njide `%s`/`%d` n'usoro kama ijikọ iberibe okwu. `__()` nke Cacti na-ahazi ozi naanị mgbe o nwere nkọwa nhazi ma ọ naghị akwado ụdị `%1$s` dabere n'ọnọdụ. Ọ na-agbanwekwa `%%` ka ọ bụrụ `%` tupu nhazi, ya mere etinyela akara pasentị n'onwe ya n'ime ozi: nyefee uru ahụ na akara ya dị ka arụmụka (`__('Usage: %s', '50%', 'doctor')`). Ahịrị ndekọ na-anọgide n'asụsụ Bekee: jiri `doctor_repair_message()` maka ederede nrụzi na `doctor_n_()` maka ozi a na-edekọ ma na-atụgharị asụsụ naanị ebe e gosipụtara ha. Hapụ ID nyocha, igodo JSON, mkpụrụokwu ọnọdụ, mmepụta nleba anya, na ahịrị ndekọ n'atụgharịghị ha asụsụ.

`locales/build_gettext.sh` na-emepụtagharị ndebiri `locales/po/cacti.pot`, na-ejikọ ya n'ime katalọgụ ọ bụla `locales/po/<locale>.po`, ma na-achịkọta `locales/LC_MESSAGES/<locale>.mo`; tinye ha atọ niile na commit. CI na-agba `sh locales/build_gettext.sh --check`, nke na-ada mgbe ndebiri meworo ochie ma ọ bụ mgbe katalọgụ na-efu ma ọ bụ nwee ntinye na-edochaghị anya (fuzzy), mgbe ebe njide dị iche, ma ọ bụ mgbe faịlụ a chịkọtara adịghịzi ọhụrụ. Ya mere, ozi gbanwere chọrọ ka e melite ntụgharị asụsụ ya n'otu pull request ahụ. Ọ chọrọ GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Asụsụ ọhụrụ bụ `<locale>.po` ọhụrụ nke a kpọrọ aha dị ka Cacti si akpọ asụsụ mpaghara ya (dịka ọmụmaatụ `pt-BR`).

## Nchekwa

Kọọ adịghị ike nchekwa na nzuzo dị ka e si kọwaa na [SECURITY.md](../../../SECURITY.md), ọ bụghị n'okwu ọha.

## Ikikere

Nwebisiinka (C) 2026 Thomas Vincent. E wepụtara ya n'okpuru GNU General Public License, nsụgharị 2 ma ọ bụ nke ọhụrụ karịa. Hụ [LICENSE](../../../LICENSE).
