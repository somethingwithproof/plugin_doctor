<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: igihingwa cya cactus cyambaye stetosikope. Suzuma. Kosora. Kurikirana.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Imiterere y'isuzuma ry'ireme"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Uruhushya: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ na 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor ni umugereka wa Cacti usuzuma iyinjizwa rya sisitemu mu nshuro imwe kandi ugakora amakosora mato gusa iyo umuyobozi wa sisitemu abisabye.

**Imiterere: irimo gutunganywa, mbere ya 1.0.** Verisiyo iheruka gusohoka ni [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Iki gice cyo gukosora cyongera inyandiko z'amagambo z'Igihindi n'Icyarabu hamwe n'inyobora z'abakoresha zisemuwe ku burenganzira bushingiye ku nshingano, isuzuma riyobowe, igenzura ry'ubushya bwa RRD rishingiye ku gice, incamake z'ibikosorwa n'amateka y'igenzura, ibirengagizwa ku miburo yemewe, hamwe n'ubusemuzi buri muri 0.6.0. Reba [CHANGELOG.md](../../../CHANGELOG.md) ku bisobanuro birambuye.

## Amafoto y'imikorere

Isuzuma n'igenamiterere rya gahunda mu iyinjizwa ry'igerageza ryitaruye rya Cacti 1.2.31 ikoresha PHP 8.3.36, harimo igenzura ry'ubwuzuzanye bwa Cacti na PHP, ubufasha bw'umutekano butangwa n'abakora PHP, n'igenzura ry'ubuzima bw'ububiko bw'amakuru. Imiburo n'ibibazo bigaragara hano bisobanura icyo cyitegererezo cy'igerageza.

![Imbonerahamwe y'isuzuma rya Doctor igaragaza ibisubizo byagenze neza, imiburo, n'ibyanze](../../screenshots/diagnostics.png)

![Igenamiterere rya Doctor rirebana na gahunda, impuruza, n'imipaka](../../screenshots/settings.png)

Ibibazo bya Cacti akenshi bigaragara nk'ibimenyetso: ibishushanyo birimo ubusa, poller yahagaze, cyangwa umugereka utemera kwinjizwa. Impamvu akenshi iba ari ibisabwa by'ibanze byahindutse, nk'umugereka wa PHP ubuze muri verisiyo ya CLI, ububiko bw'inyandiko z'imikorere poller idashobora kwandikamo, inzira ya RRDtool yerekeza kuri porogaramu itari yo, cyangwa ububiko bw'amakuru budafite imbonerahamwe z'amasaha y'akarere. Doctor igenzura ibyo bisabwa by'ibanze mu buryo butaziguye kandi igatanga raporo kuri buri kimwe nk'icyagenze neza, umuburo, cyangwa icyanze hamwe n'interuro isobanura ibyo yabonye. Raporo imwe iboneka ku rupapuro rwa interineti, ku murongo w'amabwiriza, no mu buryo bwa JSON bugenewe ikurikirana.

## Ibyo igenzura

| Igice | Ibigenzurwa |
|---|---|
| Doctor | Niba Doctor ubwayo ikora nka root, ibyo bikaba byatuma igenzura ry'uburenganzira risobanura konti itari yo |
| Cacti na PHP | Verisiyo ya Cacti, ivugurura porogaramu yinjiza itigeze irangiza, imigereka ikora ariko amadosiye yayo akaba abura, ubwuzuzanye bwa PHP na paki ya Cacti yinjijwe, n'imiterere y'ubufasha bw'umutekano bwa PHP ku isoko yayo |
| Imigereka ya PHP | Imigereka isabwa muri PHP yo ku rubuga no muri PHP ya CLI ikoreshwa na poller, hamwe n'ibice by'inyongera bisabwa |
| Igenamiterere rya PHP | `memory_limit`, `max_execution_time`, na `date.timezone`, hakoreshejwe inama z'ubwayo za Cacti |
| Ububiko bw'amakuru | Uburyo bwo guhuzwa, verisiyo ya seriveri ugereranyije n'inama ya Cacti, imyandikire y'inyuguti ya UTF-8, imbonerahamwe z'amasaha y'akarere, imbonerahamwe z'ibanze, itandukaniro ry'isaha ugereranyije na mudasobwa ya PHP, n'igenamiterere rya InnoDB Cacti igaragaza nk'amakosa |
| Ubuzima bw'ububiko bw'amakuru | Ubushobozi bwo guhuza, isomwa rya buffer-pool, imbonerahamwe z'agateganyo zo ku disiki, iremwa ry'imiyoboro yo guhuza, amabwiriza agenda buhoro, n'itegereza rya InnoDB log-buffer, hamwe n'inama zo kunoza zishingiye ku murimo ukoreshwa |
| Sisitemu y'amadosiye | Ububiko bwa cache, ubw'inyandiko z'imikorere, n'ubwa RRA bwandikwamo; umwanya usigaye w'amadosiye ya RRD; inkomoko z'amakuru zikora zidafite dosiye ya RRD cyangwa zitavugururwa ku gihe; `include/config.php` idashobora gusomwa na buri wese; inyandiko y'imikorere ya Cacti yandikwamo kandi itarengeje ubunini |
| Porogaramu zikora | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, na Spine igihe ari yo poller yatoranyijwe, harimo na verisiyo aho Cacti izitangaza |
| Inyandiko z'imikorere | Amakosa ari mu mirongo ya vuba y'inyandiko y'imikorere ya Cacti, hamwe n'ubutumwa bugaragara kenshi kurusha ubundi |
| Ibikoresho | Ibikoresho bifunguye byahagaze cyangwa birimo gusubira ku murongo, bitatu bimaze igihe kinini bihagaze hamwe n'ikosa ryabyo rya nyuma, n'ikosa igihe ibikoresho byinshi bihagaze icyarimwe |
| Poller | Ubwoko n'igihe poller ikorera, igihe gishize poller nkuru irangije gukora bwa nyuma, igihe cyo gukora ugereranyije n'intera yagenwe, ibyasohowe na poller bitageze muri dosiye ya RRD, za poller za kure zahagaze gutanga raporo, Boost yahagaze, n'igenamiterere rya Spine ryerekeza ku bundi bubiko bw'amakuru |

Buri genzura rigira umwirondoro udahinduka, nka `database.timezone` cyangwa `binary.rrdtool`, kugira ngo porogaramu zanditse zishobore kwibanda ku bisubizo byihariye. Imigereka ifunguye ishobora gutanga ibindi bigenzurwa n'imigereka y'umufuka w'ubufasha binyuze ku muhuza wa `doctor_register_checks`, kandi Doctor igaragaza ubushobozi bw'isuzuma bwo gusoma gusa kuri `plugin_mcp` binyuze kuri `abilities_register`.

## Ikarita ya kode n'iy'isuzuma

| Imikorere | Ishyirwa mu bikorwa | Ibimenyetso by'isuzuma muri ubu bubiko |
|---|---|---|
| Igenzura ry'isuzuma n'ibiranga raporo bidahinduka | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Umuhuza w'igenzura ry'imigereka (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Ubushobozi bw'isuzuma bwa MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Uburenganzira bushingiye ku nshingano na raporo zo ku rubuga zihishemo amakuru y'ibanga | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Isuzuma riyobowe rishingiye ku bimenyetso | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Ubushya bwa RRD n'imicungire y'iyandika ryimuriwe nyuma | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Incamake z'ibikosorwa, amateka y'igenzura, n'imiburo yemewe | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Igenzura riteganyijwe n'ihinduka ry'impuruza | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Izi nyandiko zerekana ishyirwa mu bikorwa n'ibipimo by'isuzuma; ntizivuga ko buri gikorwa cya CI cyatsinze kuri verisiyo iriho ubu. Genzura ibisubizo by'imirimo ya workflow kuri verisiyo uteganya gukoresha.

## Inama ku buzima bw'ububiko bw'amakuru

Isesengura rya PHP ry'umwimerere rya Doctor risoma urutonde ruzwi rw'imibare rusange ya MySQL cyangwa MariaDB binyuze ku muhuza w'ububiko bw'amakuru wa Cacti usanzweho. Rikora ibibazo bibiri byo gusoma gusa kuri buri raporo, ntirisaba uburenganzira bw'inyongera cyangwa indi porogaramu, kandi ntirihindura na rimwe igenamiterere ry'ububiko bw'amakuru. Iri genzura rigaragara muri raporo yo ku rubuga, muri CLI, muri JSON, mu bisohoka bigenewe ikurikirana, muri paki y'ubufasha, no mu ikurikirana ry'imiterere riteganyijwe.

| ID y'igenzura | Impamvu itangiza isesengura |
|---|---|
| `database.health_sample` | Munsi y'amasaha 24 kuva seriveri itangiye cyangwa hakozwe `FLUSH STATUS`, cyangwa igihe imaze ikora kitaboneka/kidahura |
| `database.connection_capacity` | Imihuza iriho ubu cyangwa umubare mwinshi wabayeho wibitswe nibura ugera kuri 80% bya `max_connections` iriho ubu |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` nibura ari 1%, hamwe nibura n'amabwiriza yo gusoma 10,000 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` nibura ari 25%, hamwe nibura n'imbonerahamwe z'agateganyo 1,000 |
| `database.thread_cache` | `Threads_created / Connections` nibura ari 5%, hamwe nibura n'ibigeragezo byo guhuza 1,000 kandi `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` nibura ari 1%, hamwe nibura n'amabwiriza 1,000 |
| `database.redo_log_waits` | `Innodb_log_waits` itari zero |

Iyi ni imipaka ya Doctor yo gutangiza isesengura, si intego z'igenamiterere zishyirwaho n'abakoze porogaramu. Uretse ubushobozi bwo guhuza, inama zishingiye ku mibare ikusanyijwe zisaba icyo gihe cyo gukurikirana cyavuzwe haruguru. Imibare ibura, idashyizwe mu buryo bukwiye, yikubye kabiri, cyangwa irenze ubunini, ibikorwa bidahagije, n'uburyo bwa thread butemewe bitanga imiburo aho gutanga umwanzuro w'ubuzima bwiza cyangwa inama yo kunoza. Imiburo ishobora kugira ingaruka ku miterere ya Nagios n'impuruza ziteganyijwe igihe **Tanga impuruza ku miburo** ifunguye.

Soma imibare yapimwe hamwe n'inama yatanzwe. Imibare ikusanyijwe ntigaragaza umutwaro uriho ubu; ibipimo bishobora kuba bifite amateka atandukanye yo gusubizwa ku busa kandi ntibifatwa nk'ifoto y'ako kanya yuzuye. Umubare mwinshi w'imihuza ushobora kugaragaza umupaka wa kera. Umubare w'amabwiriza agenda buhoro uterwa na `long_query_time`, kandi umubare w'imbonerahamwe z'agateganyo zo ku disiki muri MySQL ushobora gusiga amadosiye ari muri memory-mapped. Igipimo gito nticyemeza ko nta mbogamizi ihari. Emeza imigendekere mu murimo uhagarariye ukuri, suzuma gahunda z'amabwiriza n'uburyo imihuza yongera gukoreshwa, kandi upime ububiko bw'ako kanya kuri **mudasobwa ibitse ububiko bw'amakuru** mbere yo guhindura za buffer cyangwa imipaka y'imihuza.

Niba ibipimo bitaboneka, genzura niba seriveri ibishyigikira kandi niba konti ya Cacti ifite uburenganzira kuri `SHOW GLOBAL STATUS` na `SHOW GLOBAL VARIABLES`; Doctor ntisaba uburenganzira bwisumbuyeho. Ibisobanuro by'ibipimo biva muri [Inyandiko y'ibipimo by'imiterere ya MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) no muri [Inyandiko y'ibipimo by'imiterere ya MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Nta porogaramu cyangwa kode ya MySQLTuner ikoreshwa.

Nta kwimura imiterere y'ububiko bw'amakuru cyangwa igenamiterere bikenewe. Shyiraho amadosiye y'umugereka mu buryo busanzwe; gusubizaho ayo madosiye ya mbere bikuraho isuzuma ryongeweho. Imiterere isanzwe ya gahunda iteganyijwe ivugururwa mu ikorwa rikurikira.

## Uko gikomeza kubungabunga umutekano

Igikoresho cy'isuzuma gikora gifite uburenganzira bwa poller cyangwa ubwa seriveri y'urubuga kandi gisoma inzira mu mbonerahamwe y'amagenamiterere, bityo kigomba kwitondera ibyo gikoresha n'ibyo gihindura.

- Isuzuma risoma gusa. Ntiryigera rihindura dosiye, amagenamiterere cyangwa amakuru.
- Doctor ikoresha porogaramu yashyizweho gusa iyo izina rya dosiye yayo rihura na porogaramu yitezwe (`php`, `rrdtool`, `snmpget`, cyangwa `snmpwalk`). Bitabaye ibyo, umuntu wese ushobora kwandika mu mbonerahamwe y'amagenamiterere yashobora guhitamo icyo Doctor ikora. Irindi zina iryo ari ryo ryose ritangazwa nk'iburira kandi ntirikoreshwa.
- Doctor ntiyigera ikoresha porogaramu zashyizweho nka root, kandi itanga raporo iyo ikora nka root.
- Ibikorwa byo gusana biva ku rutonde rudahinduka rw'ibyemewe. Buri gikorwa gisaba igikorwa cy'umuyobozi wemejwe ku rubuga cyangwa `--yes` ku murongo w'amabwiriza (CLI), kandi buri cyose cyandikwa muri log ya Cacti.

## Imisohorere ya verisiyo

Verisiyo zikurikiza SemVer kandi zihura na dosiye `INFO` y'umugereka. Reba
[inzira yo gusohora verisiyo](../../releasing.md) kugira ngo umenye ibyerekeye guhitamo verisiyo, imipaka y'isuzuma ya CI, ibigize paki, checksums, n'amabwiriza yo gusubiza inyuma.

## Iyinjizaporogaramu

Kuramo `doctor-VERSION.tar.gz` cyangwa `doctor-VERSION.zip` na `SHA256SUMS` kuri
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Genzura SHA-256 checksum y'ububiko, hanyuma ukururemo ububiko bwa `doctor/` ubushyire mu bubiko bwa
`plugins/` bwa Cacti. Izi ni zo paki zishobora kwinjizwa; ububiko bwa kode bwikora bwa GitHub bufite izina ry'ububiko ritandukanye. Kugira ngo ukoreshe ibitarasohorwa
biri kuri `develop`, injiza ukoresheje kode y'ifatizo.

Ku bijyanye no kwinjiza ukoresheje kode y'ifatizo:

Koporora cyangwa ufungure ububiko nka `plugins/doctor` imbere muri Cacti yinjijwe. Ububiko bugomba kwitwa `doctor`, atari `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Injiza kandi ufungure **Cacti Doctor** unyuze kuri **Configuration > Plugin Management**, hanyuma utange urwego rwa **Doctor Viewer**, **Doctor Operator**, cyangwa **Doctor Administrator** ukoresheje uburenganzira bw'umukoresha cyangwa bw'itsinda muri Cacti. Uburenganzira busanzwe bwa **Cacti Doctor** bukomeza kugira ubushobozi bwa Administrator nyuma yo kuvugurura. Raporo igaragara munsi ya **Utilities > Cacti Doctor**.

## Indimi

Doctor izana kataloge 48 z'ubusobanuro zitari iz'Icyongereza munsi ya `locales/po/` na `locales/LC_MESSAGES/` zikubiyemo indimi z'uturere zo mu Cyiciro cya 1 cyagutse (Broad Tier 1) (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), izo muri Afurika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), izo muri Aziya (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), n'izo mu Burayi bw'Amajyepfo y'Iburasirazuba (`bs-BA`, `hr-HR`, `sr-RS`). Cacti igaragaza kataloge iyo inkunga y'indimi ifunguwe (**Configuration > Settings > General > Language Support**) kandi umukoresha agahitamo ururimi rw'akarere Cacti yerekana ku rutonde rwayo rwo guhitamo indimi; kataloge zigenewe indimi z'uturere zitarashyirwa ku rutonde rwa Cacti rwo guhitamo indimi zitangira gukora Cacti nimara kuzongeramo. Urupapuro rwo ku rubuga, amagenamiterere, n'ubutumwa hamwe n'inyandiko ya raporo yandikwa n'umurongo w'amabwiriza bikurikiza ururimi rwa Cacti; raporo ubwayo y'umurongo w'amabwiriza ikoresha ururimi rw'ibanze rwa Cacti, ruguma ari Icyongereza keretse uruhinduye.

Ibisohoka bisomwa na mashini ntibyigera bisobanurwa: ibiranga by'isuzuma, imfunguzo za JSON n'agaciro k'imimerere, ibisohoka bya `--format=nagios` na `--format=prometheus`, imirongo ya log, n'imitwe y'ibice by'umufuka w'ubufasha biguma mu Cyongereza kugira ngo za script n'ikurikirana bikomeze gukora mu rurimi urwo ari rwo rwose. Inyandiko ya `summary` na `detail` ya buri suzuma ni yo gice cyonyine gisobanurwa cya raporo ya JSON.

Urutonde rw'ubusobanuro bw'Icyispanyoli cyo muri Amerika y'Epfo (`es-419`) na rwo rurazana, ariko nta na Cacti 1.2 cyangwa Cacti 1.3 bifite ururimi rw'Icyispanyoli cyo muri Amerika y'Epfo rwo guhitamo, bityo rugira akamaro gusa igihe Cacti izaba irwongeyeho. Kugeza icyo gihe, hitamo Icyispanyoli (`es-ES`).

Cacti ikura urutonde rw'ubusobanuro bw'umugereka muri `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` ikoresheje `doctor` nk'ahantu h'inyandiko (text domain), kuri 1.2.x na 1.3 kimwe (1.3 ibona ububiko bw'imigereka inyuze ku nzira yayo y'imigereka ihindurwa).

## Inzego z'uburenganzira

| Urwego | Ubushobozi |
|---|---|
| Doctor Viewer | Gusoma imimerere y'isuzuma rya nyuma ryateguwe, igihe cy'igenzura, ubuvumbuzi buheruka n'amateka aheruka yegeranyijwe. Nta mabwiriza y'isuzuma, ibisobanuro birambuye bitatunganyijwe, igenamiterere cyangwa gusana. |
| Doctor Operator | Gukora raporo y'isuzuma mu masegonda atarenze 120, gusuzuma ibisobanuro byahishwe amakuru y'ibanga, no kwemeza ibyabonetse. Nta mpinduka z'amagenamiterere cyangwa gusana. |
| Doctor Administrator | Ubushobozi bwa Operator hamwe no gusana kuri ku rutonde rw'ibyemewe n'amagenamiterere ya Doctor. Gusana n'amagenamiterere bisaba kandi urwego rwa Cacti rwa Settings/System Utilities. |

Ibikubiyemo bya Utilities bifungura urupapuro rw'urwego rwa Doctor rwo hejuru umukoresha yahawe, harimo n'uburenganzira bw'itsinda. Inzego nshya za Viewer na Operator ntizihabwa uburenganzira bwikora. Indangamiterere y'urwego rw'umwimerere ikomeza guhuzwa na `doctor.php` nka Administrator, ibyo bikabungabunga uburenganzira busanzwe bw'umukoresha n'ubw'itsinda.

Amakuru ya Viewer aturuka ku masuzuma ateguwe. Fungura gahunda y'isuzuma mbere yo gutanga uburenganzira bwa Viewer; igenzura ryabuze cyangwa ryarengeje igihe ryerekana **unknown**, ntiryigera ryerekana ko ari bizima. Amateka abika imibare 20 ya nyuma yegeranyijwe yateguwe kandi ntiyitaho imimerere y'ibikoresho. Abakoresha ba Operator batangira isuzuma rishya ku buryo bugaragara; kuvugurura urupapuro bisanzwe bikoresha raporo ya nyuma yo mu gihe cyabo cy'ikoresha.

Ibisobanuro by'ibikoresho n'imibare yose bikoresha uburenganzira bw'ibikoresho bw'umukoresha uriho ubu. Ibice bya log bisaba kandi urwego rwa Log Administration rwa Cacti. Amabanga arahishwa mbere y'uko ibisobanuro by'isuzuma bibikwa mu gihe cy'ikoresha cyo ku rubuga cyangwa byerekanwa. Uburenganzira bwa CLI bukomeza kugengwa na konti ya sisitemu y'imikorere.

Kwemeza ibyabonetse ni igikorwa cy'umuntu ku giti cye kandi cyandikwa muri log ya Cacti. Bikora gusa ku kintu kimwe cyabonetse n'ibimenyetso bimwe; ibimenyetso byahindutse bisaba kwemezwa gushya. Ntibyigera bihindura imimerere yo gutsinda/iburira/gutsindwa, ntibihagarika amamenyesha, kandi ntibigaragaza isuzuma ryatsinzwe nk'irizima. Ibi bitandukanye n'ibyirengagijwe by'iburira ryemewe, bigira ingaruka kuri politiki y'amamenyesha bidahinduye imimerere yagaragaye kandi bisobanurwa hasi.

Buri gikorwa gisaba POST na token ya CSRF yemewe. Ibikorwa byo gusana byerekana urupapuro rwo kwemeza rwihariye rufite ihuza rya Cancel ritohereza ibaruwa, kandi byandika umukoresha wabikoze n'ibyavuyemo muri log ya Cacti.

## Umurongo w'amabwiriza

Koresha aya mabwiriza uhereye mu muzi wa Cacti nk'umukoresha wa poller wa Cacti, atari root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Ibisohoka mu nyandiko byandika umurongo umwe kuri buri suzuma birimo imimerere yaryo, icyiciro, incamake, n'ibisobanuro birambuye. `--json` yandika igikoresho cya `summary` kirimo imibare y'imimerere n'urutonde rwa `checks` rufite ibintu birimo `id`, `category`, `status`, `summary`, `detail`, na `repair`/`repairable` igihe gusana kuri ku rutonde rw'ibyemewe gukoreshwa.

| Imimerere yo gusohoka | Icyo bisobanuye |
|---|---|
| `0` | Nta suzuma ryatsinzwe, cyangwa igikorwa cyo gusana cyasabwe cyagenze neza. Amaburira ntahindura imimerere yo gusohoka. |
| `1` | Nibura isuzuma rimwe ryatsinzwe, cyangwa igikorwa cyo gusana cyasabwe ntikigenze neza. |
| `2` | Ikosa ry'imikoreshereze: gusana gukozwe nta `--yes` (`--preview` ntibisaba), indangamiterere yo gusana itazwi, imiterere y'ibisohoka itazwi, ihuzwa rya `--symptom` cyangwa imiterere ridashyigikiwe, cyangwa Cacti yinjijwe idashobora kuboneka. |

Cacti yongera `memory_limit` kuri buri script ya CLI, bityo isuzuma ry'igenamiterere ry'ikoresha rya PHP rifite akamaro gusa ku rupapuro rwo ku rubuga.

## Amasuzuma ateguwe n'amamenyesha

Munsi ya **Configuration > Settings > Doctor**, fungura **Run Checks on a Schedule** hanyuma uhitemo igihe kuva ku minota 15 kugeza ku munsi umwe. Nyuma ya buri gikorwa cya poller igihe cyacyo kigeze, Doctor ikora buri suzuma mu gikorwa cyo munsi (background), bityo igihe cya poller ubwayo ntigihungabana.

Buri nshuro ikozwe yandika imimerere yagaragaye ya buri suzuma. Ibyirengagijwe by'amaburira bikora bigira ingaruka kuri politiki y'amamenyesha bidahinduye iryo genzura. Iyo isuzuma ritangiye cyangwa rihagaritse gutsindwa, Doctor yandika iyo mpinduka muri log ya Cacti kandi, niba **Alert Email Addresses** byashyizweho, yohereza imeri kuri izo aderesi inyuze mu magenamiterere y'imeri ya Cacti. **Alert on Warnings** yongeraho impinduka zo kwinjira no gusohoka mu maburira. Inshuro ya mbere ibika gusa urugero fatizo.

Raporo ziteguwe zikora kuri poller y'ibanze zirinzwe n'ifunga ry'inyunganizi rya database kandi zifite igihe ntarengwa cy'iminota ibiri ku mukozi. Doctor itanga raporo y'itangira rya nyuma n'irangira ryagenze neza kugira ngo ibisubizo byabuze cyangwa bishaje bigaragare. Ibisubizo bifatwa nk'ibigezweho mu gihe cyagenwe hongeweho igikorwa kimwe cya polling n'iminota itatu. Inshuro itarangiye irasubirwamo nyuma y'iminota 5, 10, 20 n'indi, kugeza ku gihe gisanzwe. Kohereza amamenyesha kutagenze neza kubikwa kugeza ku nshuro eshatu zo gusubiramo hamwe n'ubukererwe bwiyongera; nyuma y'ibyo, kosora amagenamiterere y'imeri ya Cacti hanyuma ukoreshe `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` nk'umukoresha wa poller. Kwemerwa na seriveri y'imeri ntikwemeza ko byageze mu gasanduku k'imeri.

Ako kazu kamwe gashyiraho imipaka y'igihe cyo gukora kwa poller (80% y'igihe cyagenwe), umwanya w'ubusa ku disiki ya RRA (iburira munsi ya 10%, gutsindwa munsi ya 2%), gutandukana kw'isaha ya database (iburira hejuru y'amasegonda 5, gutsindwa hejuru ya 60), n'ubunini bwa log ya Cacti (100 MB). Agaciro katarimo cyangwa katemewe gasubira ku gaciro k'ibanze.

## Ihuza n'ibikoresho byo gukurikirana

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` yandika umurongo umwe w'imimerere hamwe n'amakuru y'imikorere kandi igasohoka na `0` (OK), `1` (WARNING), cyangwa `2` (CRITICAL), kugira ngo Nagios, Icinga, cyangwa indi sisitemu ijyanye na byo ishobore kubikoresha ako kanya. `--format=prometheus` yandika imiterere y'inyandiko ya Prometheus igenewe node_exporter textfile collector: `cacti_doctor_check_status` kuri buri suzuma (0 gutsinda cyangwa iburira ryemewe, 1 iburira risaba igikorwa, 2 gutsindwa), `cacti_doctor_check_observed_status` mbere y'ibyirengagijwe, `cacti_doctor_check_accepted`, `cacti_doctor_checks` kuri buri mimerere, na `cacti_doctor_last_run_timestamp_seconds`. Imirongo y'isuzuma ya JSON irimo umwanya wa `assessment`; `not_assessed` bisobanura ko isuzuma ritashoboye kugera ku mwanzuro rihereye ku makuru ahari.

## Umufuka w'ubufasha

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Umufuka w'ubufasha ni dosiye imwe y'inyandiko irimo verisiyo za Doctor, Cacti, PHP, OS, na database, imibare ya poller na Boost, raporo yose, imigereka iyo ari yo yose y'umufuka w'ubufasha iturutse ku migereka iri munsi ya `== Plugin attachments`, n'imirongo 200 ya nyuma ya log ya Cacti. Agaciro gakurikira amazina ya password, secret, token, community, na key karahishwa. Doctor ikora dosiye isomwa na nyirayo gusa kandi yanga kwandikira hejuru ya dosiye isanzweho. Yigenzure mbere yo kuyishyira ahantu aho ari ho hose.

## Politiki yo gusana

Doctor irimo uburyo bumwe bwo gusana, `runtime_directories`. Ikora ububiko bwa Cacti bwo mu gihe cyo gukora bubura kandi ikongeraho uburenganzira bwa nyirabwo bwo gusoma, kwandika no gukoresha itavanyeho uburenganzira busanzweho.

Yibanda kuri `$cache_path`, `$log_path`, na `$rra_path` kuri Cacti 1.3, cyangwa ku bubiko bwa `cache`, `log`, na `rra` bw'iyinjizwa rya porogaramu mu bindi bihe. Isimbuka ububiko busanzwe bwandikwamo, ikanga ububiko buri hanze y'aho Cacti yinjijwe (nk'ububiko bw'inyandiko z'ibyakozwe buri munsi ya `/var/log`), ikanga amahuza y'ibimenyetso (symbolic links), kandi ikanga gukora nka root. Ntiyigera ikurikira `path_cactilog`, ku buryo idosiye y'inyandiko z'ibyakozwe yagenwe imbere mu bubiko bwa kode idashobora kuyobora isana aho hantu. Isuzuma rikomeza kugenzura ububiko bw'idosiye y'inyandiko z'ibyakozwe yagenwe kuri buri verisiyo.

Ntihindura nyir'ububiko, ntishyira mu bikorwa amabwiriza ya shell, ntiyandikira bundi bushya igenamiterere, cyangwa ngo ihindure amakuru ya porogaramu ya Cacti. Buri buryo bushya bwo gusana bugomba kuba burimo isuzuma, umukozi wemewe ku rutonde rwemewe, kwemeza, kwandika mu gitabo cy'igenzura, n'amasuzuma.

## Gusesengura ibimenyetso

Abakoresha b'imirimo n'Abayobozi ba sisitemu bashobora guhitamo **Investigate a symptom** ku rupapuro rwa Doctor. Ayo mategeko amwe aboneka binyuze kuri `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, cyangwa `alerts_missing`, hamwe n'ibisohoka mu nyandiko cyangwa mu buryo bwa JSON. Amasashi y'ubufasha arimo isesengura ry'ibimenyetso bijyanye.

Buri gitekerezo gikubiyemo igenzura ryagaragaye n'intambwe ikurikira yo kugenzura. Ibitekerezo ni ibyemezo by'agateganyo, si impamvu nyamukuru zemejwe. Ibyagenzuwe bibuze, bitasuzumwe cyangwa bishaje ntibishobora kwemeza impamvu. Isesengura ryo ku rubuga rikoresha raporo yayunguruwe hakurikijwe uburenganzira; raporo za CLI zikoresha uburenganzira bwa konti ya sisitemu y'imikorere.

## Ubushya bw'ivugururwa rya RRD

`filesystem.rrd_stale` igenzura amasoko y'amakuru akora agera kuri 500, havuyemo ibikoresho byahagaritswe cyangwa bitari gukora. Ku nyinjizwa nini, icyitegererezo gihinduka buri saha, ku buryo ikoresha risubirwamo rigera ku madosiye atandukanye. Igereranya igihe idosiye yahinduriwe n'igisumba ibindi hagati y'intera ya poller, intambwe ya RRD y'isoko n'intambwe y'umwirondoro, gikubwe na **RRD Stale Intervals** (mburabuzi ni 3). Yerekana amadosiye atatu ashaje kurusha ayandi n'umubare w'ibikoresho byibasiwe. Ibisubizo byo ku rubuga birimo gusa ibikoresho byemewe.

`filesystem.rrd_files` ni igenzura ryihariye ryo kureba ko bihari. Rishakisha idosiye ya RRD y'amasoko y'amakuru akora agera ku 5,000, harimo n'ari ku bikoresho byahagaritswe cyangwa bitari gukora, kandi rigakoresha icyitegererezo kimwe cyo buri saha.

Boost yongeraho inshuro ebyiri z'intera yayo yo koherereza ku disiki nk'igihe cyo kwihanganira kwandika ku disiki. Ku wundi mwanditsi utindana, gena **Deferred RRD Write Allowance (seconds)**. `RRDCACHED_ADDRESS` yatangajwe nta gihe cyo kwihanganira, cyangwa intera ya Boost itemewe, bitanga igisubizo kitasuzumwe. Doctor ntiyigera isukura ububiko bw'agateganyo (cache) kugira ngo ikore iri genzura. Igihe cy'ihinduka ni ikimenyetso cy'ibikorwa ku disiki, si gihamya y'ikusanyamakuru ryagenze neza. Ububiko bw'agateganyo bwo hanze Doctor idashobora gutahura bugomba kugenerwa mu buryo bweruye.

Amadosiye abuze, adasomeka n'afite itariki yo mu gihe kizaza abariwa mu bisobanuro birambuye. Igisubizo kiba kitasuzumwe gusa iyo nta dosiye n'imwe yo mu cyitegererezo isomeka. Igisubizo cyafatiwe ku cyitegererezo kivuga ko kireba igice kimwe gusa cy'iyinjizwa; gutsinda ntibikubiyemo amadosiye atafatiweho icyitegererezo.

## Igaragaza ry'ibisanwa n'amateka y'igenzura

Urupapuro rw'umuyobozi rwo gusana rwerekana buri nzira yibasiwe, igikorwa giteganyijwe, uburenganzira buriho n'uburenganzira bugamijwe. Kwemera bifitanye isano n'iryo garagaza, umukoresha uri gukora n'igihe cy'iminota itanu. Kwemeza bikoresha iryo garagaza; sisitemu y'amadosiye yahindutse isaba irindi garagaza. Gukora nka root, inzira ziri hanze y'iyinjizwa, amahuza asaba gusanwa n'uburenganzira bwa sisitemu y'amadosiye butujujwe bibuza kwemerwa.

`--repair=runtime_directories --preview` yerekana gahunda ya JSON yo gusoma gusa. `--repair=runtime_directories --yes` yemera gahunda ya CLI imaze kubarwa kandi ikongera kuyigenzura mbere yo kuyishyira mu bikorwa. Konti ya CLI igomba kuba isanzwe ifite uburenganzira bwo gusana iyinjizwa; ntiyoroherezwa inshingano zo ku rubuga.

Inyandiko iteguye ya `repair.started` igomba kubikwa mbere y'uko habaho impinduka iyo ari yo yose muri sisitemu y'amadosiye. Inyandiko ifatanye ya `repair.completed` ikubiyemo ishusho ya nyuma yo gusana n'igisubizo cy'igenzura. Igikorwa gihagaritswe hagati gisiga inyandiko y'itangira kugira ngo gikurikiranwe. Kunanirwa kw'igenzura ryo gusoza gutangazwa nk'ikibazo n'iyo impinduka muri sisitemu y'amadosiye zaba zabaye. Doctor yongeraho uburenganzira bwa nyirabwo kandi igakora ububiko; ntigerageza gusubiza inyuma mu buryo bwikora.

Abayobozi bafite uburenganzira bwa Cacti bwa Settings/System Utilities bashobora gusoma inyandiko 20 ziheruka z'igenzura ku rupapuro rwa Doctor. Umugereka ubika inyandiko 200 ziheruka muri `plugin_doctor_audit`; inyandiko z'ibyakozwe za Cacti na zo zandika ID zazo, ibikorwa n'ababikoze. Amakuru y'ingenzi mu byagenzuwe arahishwa.

## Imiburo yemewe

Abayobozi bafite uburenganzira bwa Cacti bwa Settings/System Utilities bashobora gukora **Warning exception** bahereye ku muburo mushya kandi wasuzumwe ku rupapuro rwa Doctor. Iryo rengayobora risaba nyiraryo, impamvu n'itariki ya UTC yo kurisubiramo itarengeje iminsi 90. Rirangira mu gicuku cya UTC mu ntangiriro z'iyo tariki. Hashobora kugenerwa irengayobora rigera ku 100. Urutonde rwerekana ibyarangiye n'ama-ID atari muri raporo iriho, kandi rukemerera kubivanaho.

Umuburo wagaragaye ukomeza kugaragara, hamwe na nyirawo, impamvu n'igihe urangirira mu bisobanuro birambuye by'isuzuma. JSON igumana imiterere yagaragaye kandi ikongeraho amakuru ndangamiterere ya `accepted` na `acceptance`. Nagios ikura imiburo yemewe ikora mu buremere bw'isohoka ryayo ariko ikayivuga mu bisohoka byayo. Prometheus yohereza uburemere bwombi, ubwagaragaye n'ubugomba gukorwaho. Imiterere isanzwe y'isohoka rya CLI ntihinduka: imiburo isanzwe isohokana zeru, ibibazo bigasohokana rimwe.

Integuza z'imiburo ziteganyijwe zirahagarikwa mu gihe irengayobora rigikora; kurangira cyangwa gukurwaho bituma umuburo ukomeje wongera kwemererwa guhabwa integuza z'imiburo. Guhinduka kw'ibibazo no gukira ibibazo bikomeza kwemererwa guhabwa integuza. Igisubizo kitasuzumwe cyangwa ikibazo ntibishobora kwemerwa. Kwemera ku giti cyawe ni ukwihariye kandi ntacyo bihagarika. Gukora no gukuraho irengayobora bikorwa hamwe n'inyandiko y'igenzura nk'igikorwa kimwe.

Kuzamura verisiyo birema `plugin_doctor_audit` na `plugin_doctor_acceptance` bitahinduye amakuru ya porogaramu ya Cacti. Ohereza hanze amateka yose ukeneye mbere yo kuvanamo umugereka: kuvanamo bisiba imbonerahamwe zombi z'umugereka n'igenamiterere ryawo. Gusubiza inyuma amadosiye y'umugereka bisiga imbonerahamwe zihari kugira ngo zigenzurwe, ariko verisiyo za kera ntizubahiriza irengayobora ry'imiburo.

## Igenzura ry'imigereka (`doctor_register_checks`)

Imigereka ya Cacti ifunguye ishobora gutanga igenzura ry'isuzuma ryo gusoma gusa n'imigereka y'umufuka w'ubufasha itari itegeko yiyandikishije ku muhuza wa `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor ihamagara imigereka ifunguye kandi itavangiwe muri sisitemu yiyandikishije kuri `doctor_register_checks` (isimbuka `doctor` na `cacti`), igashaka dosiye y'umuhuza gusa imbere mu bubiko bw'uwo mugereka ubwawo. Umukozi uhamagarwa yakira `['mode' => 'run' | 'list', 'plugin' => '<slug>']` maze agasubiza urutonde rw'ibisobanuro by'igenzura cyangwa ibahasha irimo `checks` na `attachments` bitari itegeko:

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

Buri gisobanuro cy'igenzura ry'umugereka kigenzurwa mbere yo kongerwamo:

- Imfunguzo zisabwa: `id`, `plugin`, `category`, `title`, `status`, `message`, `details`, na `remediation`.
- `plugin` igomba guhura n'izina ry'umugereka ryanditswe (`[a-z0-9_]{1,64}`). `id` igomba guhura na `[a-z0-9_.]{1,128}`, igatangirana na `<plugin>.`, kandi ntiyagongana na ID y'igenzura ry'ibanze cyangwa ry'umugereka isanzweho.
- `status` igomba kuba `ok`, `warn`, `fail`, cyangwa `info`. `ok` ihinduka `pass` muri raporo za Doctor; `info` itanga amakuru gusa kandi ntizana ugutsindwa muri CLI, Nagios, Prometheus, cyangwa mu mamenyesha ateguwe.
- `category` (kugeza kuri bayiti 64) na `title` (kugeza kuri bayiti 256) bigomba kuba inyandiko zitarimo ubusa zidafite inyuguti zigenzura. `message` (itarimo ubusa, kugeza kuri bayiti 2048) na `remediation` (kugeza kuri bayiti 2048) bigomba kuba inyandiko.
- `details` yemera inyandiko (kugeza kuri bayiti 8192) cyangwa urutonde rwa scalar/ruri mu rundi (ubujyakuzimu bwa 4 ntarengwa, bwanditse muri JSON kugeza kuri bayiti 16384; ibikoresho bya object n'amasoko bya resource birangwa).
- Imigereka y'umufuka w'ubufasha itari itegeko isaba `title` itarimo ubusa (kugeza kuri bayiti 128, nta nyuguti zigenzura) n'inyandiko ya `content` kugeza kuri bayiti 65536 (64 KiB).

Doctor ishyiraho imipaka y'igenzura 32 n'imigereka 8 kuri buri mugereka (igenzura 64 ry'imigereka n'imigereka 32 yose hamwe). Buri muhuza ukora mu rubibi rwawo rwa `try`/`catch` kugira ngo amakosa cyangwa ibikubiyemo bitari urutonde bihishwe amakuru y'ibanga kandi byandikwe muri log ya Cacti (igice cya `DOCTOR`) bitabangamiye igenzura ry'ibanze cyangwa indi migereka. Ibisobanuro bidatunganye birangwa kandi bikandikwa muri log mu gihe ibyemewe byo muri uwo mugereka umwe bikomeza gukora. Igenzura ry'imigereka rihora ari iryo gusoma gusa (`repairable: false`), kandi agaciro k'inyandiko n'imfunguzo z'ibanga bihishwa mbere yo kubyerekana, kubyohereza, cyangwa kubifunga mu mufuka. Igenzura ry'imigereka ryemejwe rigaragara ku rubuga, mu bisohoka bya CLI bya text/JSON/Nagios/Prometheus, mu ikurikirana ry'imiterere riteguwe, no mu mifuka y'ubufasha.

## Ihuza na MCP (`abilities_register`)

Doctor yiyandikisha ku muhuza wa `abilities_register` (`doctor_abilities_register` muri `doctor_abilities.php`) kugira ngo `plugin_mcp` ibone ubushobozi bwayo bw'isuzuma igihe imigereka yombi ifunguye. Doctor yandika icyiciro cya `diagnostics` (`Diagnostics`) n'ubushobozi bubiri bwo gusoma gusa, butangiza, kandi budahindura igisubizo iyo busubiwemo:

| ID y'ubushobozi | Ibintu bishobora gutangwa | Ibisohoka |
|---|---|---|
| `doctor-run-checks` | `category` (inyandiko, ntarengwa inyuguti 64), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) na `findings` zihishwe kugeza kuri 256 (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (inyandiko, ntarengwa inyuguti 64), `plugin` (inyandiko, ntarengwa inyuguti 64) | `checks` kugeza kuri 256 (`id`, `plugin`, `category`, `title`) zikubiyemo amasuzuma yose 45 yubatswemo hamwe n'igenzura ry'imigereka ifunguye |

Ubwo bushobozi bwombi ni ubwo gusoma gusa kandi ntibwigera bukora ibikorwa byo gusana. Uretse igenzura ry'urwego no kugaragaza ubushobozi bwa `plugin_mcp` ubwayo (ubushobozi bw'imigereka butangira buhishe muri MCP kugeza umuyobozi abugaragaje), Doctor isaba ko nyir'umufunguzo (token) afite **Doctor Viewer** cyangwa urwego rwa Doctor ruri hejuru. `doctor-run-checks` igenera `devices.health` ku bikoresho byemerewe nyir'umufunguzo, igashyiramo `logging.recent_errors` gusa iyo umukoresha afite urwego rwa Cacti rwa 18 cyangwa 19, ikareka `filesystem.rrd_files`, kandi igashyiramo `filesystem.rrd_stale` igendeye ku bikoresho kuri **Doctor Operator** cyangwa **Doctor Administrator** gusa.

## Ibisabwa

| Cacti | PHP | Ibisobanuro |
|---|---|---|
| 1.2.20 | 5.4 cyangwa nshya kurushaho | Kode ya Doctor ubwayo ihuye na PHP 5.4 ku buryo ishobora gusuzuma sisitemu za kera mbere yo kuzamura verisiyo |
| 1.2.31 | 8.0 cyangwa nshya kurushaho | `composer.json` ya Cacti isaba `>=8.0` |
| 1.2.x iriho ubu | 8.2 cyangwa nshya kurushaho | `composer.json` ya Cacti isaba `>=8.2` |
| `develop` (1.3) | 8.3 cyangwa nshya kurushaho | `composer.json` ya Cacti isaba `^8.3` |

Umurongo wa **PHP compatibility with installed Cacti** ugereranya verisiyo ya PHP iri gukora n'ibisabwa bya PHP muri `composer.json` y'ibanze ya Cacti ubwayo, harimo n'imbibi yo hejuru y'imbogamizi ya caret nka `^8.3`. Porogaramu ya PHP CLI yagenwe igenzurwa ku bisabwa bimwe. Doctor imenya uburyo bw'imbogamizi bwa `>=` na `^` bukoreshwa n'aya mapaki ya Cacti. Ibisabwa bidasomeka, byanditse nabi, bibura, cyangwa bitazwi bitanga umuburo; iyinjizwa rya Cacti 1.2.20–1.2.30 ridafite inyandiko y'ibigize porogaramu rigumana igipimo cyo hasi cyanditswe cya PHP 5.4. Guhuza kwa Doctor ubwayo na PHP 5.4 ntibigaragaza guhuza n'iyinjizwa rishya rya Cacti.

Umurongo wa **PHP upstream security support** usubiza ikibazo cyihariye: ese iryo shami rya verisiyo ya PHP riracyahabwa ibikosora by'umutekano biturutse ku mushinga wa PHP? Utangaza itariki yatangajwe y'irangira ry'ubufasha bw'umutekano ku ishami kandi ugatanga umuburo nyuma y'iyo tariki. Urugero, PHP 8.1 ishobora kuzuza ibisabwa byo gukora by'iyinjizwa rya kera rya Cacti mu gihe itagihabwa ibikosora by'umutekano by'isoko. Igisubizo cyo gutsinda ntigisobanura ko verisiyo y'ibikosora yinjijwe ari nshya, kandi Doctor ntishobora kumenya niba utanga sisitemu y'imikorere atanga ibikosora byasubijwe inyuma.

Amatariki y'ubufasha abikwa hamwe na Doctor avuye kuri [gahunda y'ubufasha bwa PHP](https://www.php.net/supported-versions.php) na [urutonde rw'ibyageze ku musozo](https://www.php.net/eol.php), byaherukaga kugenzurwa ku wa 2026-11-08. Amashami atazwi na verisiyo z'igerageza zibanziriza isohoka bitanga umuburo aho gutanga ugutsinda gushingiye ku gukeka. Nta busabe bwo ku muyoboro bukorwa mu gihe cy'isuzuma. Vugurura amakuru y'ubufasha ya Doctor igihe PHP itangaje gahunda nshya. Ama-ID asanzwe ya JSON/igenzura `php.version` na `php.security_baseline` ntiyahindutse.

## Iterambere

Urutonde rw'amasuzuma y'ibice rukoresha Pest kandi isesengura ridahinduka rikoresha PHPStan (urwego rwa 6), byombi bikora kuri PHP 8.2 cyangwa nshya kurushaho:

```console
composer install
composer phpstan
composer test
```

Amasuzuma asimbuza imikorere ya Cacti Doctor ihamagara n'ibisimbura bito muri `tests/CactiStubs.php`, ku buryo akora nta yinjizwa rya Cacti ririho.

GitHub Actions ikora ubwoko butanu bw'igenzura kuri buri kohereza no kuri buri busabe bwo guhuza:

- Amasuzuma y'amasezerano yo gupakira verisiyo (`tests/test_release.py`) n'iyubakwa ry'ububiko (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, itsindwa iyo inyandikorugero y'ubusemuzi ishaje, urutonde rw'ubusemuzi rutuzuye cyangwa rufite gushidikanya, cyangwa urutonde rwakusanyijwe rutandukanye n'isoko yarwo.
- `php -l` kuri buri dosiye ya PHP munsi ya PHP 5.4, 5.6, 7.0, 7.1, 7.4, na 8.0 kugeza kuri 8.4.
- `composer phpstan` (PHPStan urwego rwa 6) na `composer test` (urutonde rw'amasuzuma y'ibice rwa Pest) kuri PHP 8.2, 8.3, na 8.4.
- Imirimo irindwi yo guhuza yinjiza Cacti 1.2.20, ishami rya 1.2.x ririho ubu, na `develop` ku bubiko bwa MySQL na MariaDB, ikoresheje cmd.php na Spine byombi. Buri murimo winjiza kandi ukemeza umugereka, ugakora raporo yuzuye ya CLI, kandi ukagenzura imiterere ya raporo, igiteranyo cy'incamake, imiterere iteganyijwe, n'urutonde nyarwo rw'ibibazo. Hanyuma wangiza inzira ya binary n'igihe cy'ikimenyetso cya poller, ukemeza ko byombi byatangajwe, ukabisubizaho, ukagerageza isana n'iyemeza ryaryo, kandi ugakora guhagarika, kwemeza, kuvanamo no kongera kwinjiza. Raporo ya JSON ibikwa nk'igihangano cy'ibyakozwe igihe umurimo utsinzwe.

## Gutanga umusanzu

Pull requests zoherezwa kuri `develop`. Tuma amadosiye akoreshwa muri production akorana na PHP 5.4 kandi ukoreshe imyandikire ya Cacti: za tab, imirongo y'inyandiko iri mu twuguruzo tumwe (single-quoted strings), n'imfashamikorere za Cacti nka `read_config_option()` na `db_fetch_cell()`. Ongeraho isuzuma ry'igice (unit test) kuri buri mpinduka y'imikorere, usinye commits zawe (`git commit -s`), kandi wongereho umurongo muri `CHANGELOG.md`.

### Ubusemuzi

Shyira buri butumwa bugaragarira umukoresha muri `__('...', 'doctor')` (cyangwa `__n()`, `__x()`, `__esc()`), kandi interuro irimo agaciro uyihe umwandiko umwe w'imiterere (format string) ufite ibimenyetso byikurikiranya `%s`/`%d` aho guteranya ibice. Umusemuzi wa Cacti `__()` utunganya imiterere y'ubutumwa gusa iyo bufite ikimenyetso cy'imiterere kandi ntushyigikira uburyo bw'umwanya wa `%1$s`. Unahindura `%%` ikaba `%` mbere yo gutunganya imiterere, ku bw'ibyo ntugashyire ikimenyetso cy'ijanisha ubwacyo mu butumwa: tanga agaciro hamwe n'ikimenyetso cyako nk'igipimo cyinjizwa (`__('Usage: %s', '50%', 'doctor')`). Imirongo y'inyandiko z'ibikorwa (log lines) iguma mu Cyongereza: koresha `doctor_repair_message()` ku nyandiko yo gusana na `doctor_n_()` ku butumwa bwandikwa muri log kandi bugasemurwa aho bugaragazwa gusa. Komeza utasemuye check IDs, imfunguzo za JSON, amagambo y'ingenzi y'imimerere, ibisohoka mu bugenzuzi (monitoring output), n'imirongo ya log.

`locales/build_gettext.sh` yongera gukora inyandikorugero `locales/po/cacti.pot`, ikayihuza na buri rutonde `locales/po/<locale>.po`, kandi ikegeranya `locales/LC_MESSAGES/<locale>.mo`; ohereza (commit) byose uko ari bitatu. CI ikoresha `sh locales/build_gettext.sh --check`, ikinanirwa iyo inyandikorugero ishaje cyangwa urutonde rubuze cyangwa rufite ijambo rishidikanywaho (fuzzy entry), ikimenyetso cy'umwanya gitandukanye, cyangwa dosiye yegeranyijwe itakijyanye n'igihe. Bityo rero, ubutumwa bwahinduwe bukeneye ko ubusemuzi bwabwo buvugururwa muri iyo pull request imwe. Bisaba GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Ururimi rushya ni dosiye nshya `<locale>.po` yitwa nk'uko Cacti yita indimi zayo (urugero `pt-BR`).

## Umutekano

Menyesha intege nke z'umutekano mu ibanga nk'uko bisobanurwa muri [SECURITY.md](../../../SECURITY.md), atari mu bibazo rusange (public issues).

## Uruhushya

Uburenganzira bw'umwanditsi (C) 2026 Thomas Vincent. Byasohowe munsi ya GNU General Public License, verisiyo ya 2 cyangwa iyayikurikiye. Reba [LICENSE](../../../LICENSE).
