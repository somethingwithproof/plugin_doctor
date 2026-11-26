<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: i-cactus efake i-stethoscope. Hlahloba. Lungisa. Qapha.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Isimo se-Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Ilayisense: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ kanye no-1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

I-Cacti Doctor iyi-plugin ye-Cacti ehlola ukufakwa ngokudlula okukodwa futhi isebenzise ukulungiswa okuncane kuphela uma umlawuli ecela lokho.

**Isimo: isathuthukiswa, ngaphambi kwe-1.0.** Ukukhishwa kwakamuva ngu-[0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Lesi sichibiyelo sengeza ama-catalog esi-Hindi nesi-Arabic kanye neziqondiso zabasebenzisi ezihunyushiwe ekufinyeleleni okulinganiselwe ngendima, ekuxilongeni okuqondisiwe, ekuhlolweni okusha kwe-RRD okulinganiselwe, ekuhloleni kuqala kokulungiswa nasemlandweni wokucwaninga, ekuhlukeni kwezixwayiso ezamukelwe, nasezihunyushweni ku-0.6.0. Bheka i-[CHANGELOG.md](../../../CHANGELOG.md) ukuze uthole imininingwane.

## Izithombe-skrini

Izilungiselelo zokuxilonga nezokuhlela ekufakweni kwesibonelo se-Cacti 1.2.31 okuhlukanisiwe
okusebenzisa i-PHP 8.3.36, okufaka phakathi ukuhlolwa kokuhambisana kwe-Cacti PHP, ukwesekwa
kokuphepha kwe-upstream, nempilo ye-database. Izixwayiso nokwehluleka okuboniswe lapha
kuchaza leyo ndawo yesibonelo.

![Ithebula lokuxilonga le-Doctor elinemiphumela yokuphasa, isixwayiso, kanye nokwehluleka](../../screenshots/diagnostics.png)

![Izilungiselelo ze-Doctor zokuhlela, izexwayiso, kanye nemikhawulo](../../screenshots/settings.png)

Izinkinga ze-Cacti zivame ukuvela njengezimpawu: amagrafu angenalutho, i-poller eyekile ukusebenza, i-plugin engeke ifakeke. Imbangela kuvame ukuba yimfuneko yokuqala ephambukile, njenge-extension ye-PHP engekho ekwakhiweni kwe-CLI, uhla lwamafayela lwe-log i-poller engakwazi ukubhala kulo, indlela ye-RRDtool ekhomba ku-binary engalungile, noma i-database engenawo amathebula e-timezone. I-Doctor ihlola lezo zimfuneko ngokuqondile bese ibika ngayinye njengokuphasa, isixwayiso, noma ukwehluleka ngomusho ochaza lokho ekutholile. Umbiko ofanayo uyatholakala ekhasini lewebhu, kulayini womyalo, nanjenge-JSON yokuqapha.

## Lokho ekuhlolayo

| Indawo | Okuhlolwayo |
|---|---|
| Doctor | Ukuthi ngabe i-Doctor ngokwayo isebenza njenge-root yini, okungenza izihlolo zezimvume zichaze i-akhawunti engalungile |
| I-Cacti ne-PHP | Inguqulo ye-Cacti, ukuthuthukiswa isifaki esingakaze sikuqede, ama-plugin anikwe amandla amafayela awo angekho, ukuhambisana kwe-PHP nephakheji ye-Cacti efakiwe, isimo sokwesekwa kokuphepha kwe-upstream ye-PHP |
| Ama-extension e-PHP | Ama-extension adingekayo ku-PHP yewebhu naku-PHP ye-CLI esetshenziswa yi-poller, kanye nezici ezinconyiwe |
| Ukumiswa kwe-PHP | `memory_limit`, `max_execution_time`, kanye ne-`date.timezone`, kusetshenziswa izincomo ze-Cacti ngokwayo |
| I-Database | Ukuxhumana, inguqulo yeseva uma iqhathaniswa nesincomo se-Cacti, isethi yezinhlamvu ze-UTF-8, amathebula e-timezone, amathebula ayisisekelo, ukuphambuka kwewashi kusuka ku-host ye-PHP, kanye nezilungiselelo ze-InnoDB i-Cacti ezibonisa njengamaphutha |
| Impilo ye-Database | Umthamo wokuxhuma, ukufundwa kwe-buffer-pool, amathebula esikhashana sediski, ukudalwa kwe-thread yokuxhuma, imisho ehamba kancane, kanye nokulinda kwe-InnoDB log-buffer, nezincomo zokulungisa ezincike emthwalweni womsebenzi |
| Uhlelo lwamafayela | Izinkomba ze-cache, ze-log, neze-RRA ezibhalekayo; isikhala samahhala samafayela e-RRD; imithombo yedatha esebenzayo engenalo ifayela le-RRD noma enezibuyekezo zamafayela ezidlulwe isikhathi; i-`include/config.php` engafundeki umhlaba wonke; i-log ye-Cacti ebhalisekayo futhi engakhulile ngokweqile |
| Ama-Binary | I-PHP CLI, i-RRDtool, i-`snmpget`, i-`snmpwalk`, kanye ne-Spine uma iyi-poller emisiwe, okuhlanganisa izinhlobo lapho i-Cacti ibeka eyodwa |
| I-Log | Amaphutha phakathi kwemigqa ye-log ye-Cacti yakamuva kakhulu, nomlayezo ovame kakhulu |
| Amadivayisi | Amadivayisi anikwe amandla aphansi noma alulamayo, amathathu aphansi isikhathi eside kunazo zonke nephutha lawo lokugcina, kanye nokwehluleka uma iningi lamadivayisi liphansi ngesikhathi esisodwa |
| I-Poller | Uhlobo lwe-poller nesikhawu, isikhathi kusukela i-poller enkulu igcina ukuqeda, isikhathi sokusebenza uma siqhathaniswa nesikhawu, umphumela we-poller ongakaze ufike efayeleni le-RRD, ama-poller akude ayeke ukubika, i-Boost emile, kanye nokumiswa kwe-Spine okukhomba ku-database ehlukile |

Sonke isihlolo sine-ID ezinzile, efana ne-`database.timezone` noma i-`binary.rrdtool`, ukuze ama-script akwazi ukubhekisela emiphumeleni ngamunye.

## Imephu yekhodi nokuhlolwa

| Ukuziphatha | Ukusetshenziswa | Ubufakazi bokuhlola kule repository |
|---|---|---|
| Izihlolo zokuxilonga nama-ID ombiko azinzile | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Ukufinyelela okulinganiselwe ngendima nemibiko yewebhu efihliwe | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Ukuphenywa kwezimpawu okuqondisiwe | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Ukuphathwa kobusha be-RRD nokubhalwa okuhlehlisiwe | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Ukubuka kuqala kokulungiswa, umlando wokucwaninga, nezixwayiso ezamukelwe | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Izihlolo ezihleliwe kanye nezinguquko zezexwayiso | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Lezi zinkomba zikhomba ukusetshenziswa kanye nokufinyelela kokuhlolwa; azisho
ukuthi yonke imisebenzi ye-CI iphasile kulokhu kubuyekezwa kwamanje. Hlola ukusebenza
kwe-workflow kokubuyekezwa ohlela ukukusebenzisa.

## Izeluleko zempilo ye-Database

Umhlaziyi we-PHP wendabuko we-Doctor ufunda isethi ehleliwe yezibali ze-MySQL noma ze-MariaDB zomhlaba wonke ngokuxhumana kwe-database ye-Cacti okukhona. Wenza imibuzo emibili yokufunda kuphela ngombiko ngamunye, awudingi imininingwane yokungena eyengeziwe noma okusebenzisekayo, futhi awusoze waguqula ukumiswa kwe-database. Lezi zihlolo zivela embikweni wewebhu, ku-CLI, ku-JSON, kumphumela wokuqapha, kuphakheji yokusekela, nasekulandeleni isimo esihleliwe.

| I-ID Yesihlolo | Imbangela yophenyo |
|---|---|
| `database.health_sample` | Ngaphansi kwamahora angu-24 kusukela ekuqaleni noma ku-`FLUSH STATUS`, noma i-uptime engatholakali/engaguquki |
| `database.connection_capacity` | Ukuxhumana kwamanje noma okuphakeme okuqoshiwe okungenani okungu-80% kwe-`max_connections` yamanje |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` okungenani okungu-1%, okunezicelo zokufunda okungenani eziyi-10,000 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` okungenani okungu-25%, okunamathebula esikhashana okungenani ayi-1,000 |
| `database.thread_cache` | `Threads_created / Connections` okungenani okungu-5%, okunemizamo yokuxhuma okungenani eyi-1,000 kanye ne-`thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` okungenani okungu-1%, okunemisho okungenani eyi-1,000 |
| `database.redo_log_waits` | I-`Innodb_log_waits` engesiyo i-zero |

Lena yimikhawulo yophenyo ye-Doctor, hhayi izinhloso zokumiswa komthengisi. Ngaphandle komthamo wokuxhuma, iseluleko esiqoqekayo sidinga iwindi lokubuka elingenhla. Izibali ezingekho, ezimise kabi, eziphindaphindiwe, noma ezinkulu ngokweqile, umsebenzi onganele, nezindlela ze-thread ezingasekelwe zikhiqiza izixwayiso esikhundleni sesinqumo esiphilile noma isincomo sokulungisa. Izixwayiso zingathinta isimo se-Nagios nezexwayiso ezihleliwe uma i-**Xwayisa ngezixwayiso** inikwe amandla.

Funda izibali ezilinganisiwe nesiphakamiso ndawonye. Amanani aqoqekayo awasunguli umthwalo wamanje; izibali zingaba nemilando yokusetha kabusha ehlukene futhi akusona isithombe esisheshayo se-atomic. Ukuxhumana okuphakeme kungase kubonise umkhawulo omdala. Izibalo zemibuzo ehamba kancane zincike ku-`long_query_time`, futhi isibali sethebula lesikhashana sediski se-MySQL singase siyeqe amafayela afakwe kumemori. Isilinganiso esiphansi asifakazeli ukungabikho kwenkinga yokuminyana. Qinisekisa izitayela ngaphansi komthwalo womsebenzi omele, buyekeza izinhlelo zemibuzo nokusetshenziswa kabusha kokuxhumana, futhi ulinganise imemori ku-**i-host ye-database** ngaphambi kokushintsha ama-buffer noma imikhawulo yokuxhumana.

Uma ama-metric engatholakali, hlola ukwesekwa kweseva nokufinyelela kwe-akhawunti ye-Cacti ku-`SHOW GLOBAL STATUS` naku-`SHOW GLOBAL VARIABLES`; i-Doctor ayiceli imininingwane yokungena ephakeme. Izincazelo zezibali zivela ku-[ireferensi ye-status-variable ye-MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) kanye naku-[ireferensi ye-status-variable ye-MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Akukho skripthi noma ikhodi ye-MySQLTuner esetshenziswayo.

Akukho ukufuduka kwe-schema noma kokumiswa okudingekayo. Sebenzisa amafayela e-plugin ngendlela evamile; ukubuyisela lawo mafayela emuva kususa ukuxilonga okungeziwe. Isimo esihleliwe esikhona sivuselelwa ekusebenzeni okulandelayo.

## Indlela ehlala iphephile ngayo

Ithuluzi lokuxilonga lisebenza ngamalungelo e-poller noma eseva yewebhu futhi lifunda izindlela zamafayela kusuka kuthebula lezilungiselelo, ngakho-ke kufanele liqaphele ukuthi lisebenzisani futhi lishintshani.

- Ukuxilonga kufundwa kuphela. Akukaze kushintshe amafayela, izilungiselelo, noma idatha.
- I-Doctor isebenzisa ibhanari elungisiwe kuphela uma igama lefayela layo lifana nohlelo olulindelekile (`php`, `rrdtool`, `snmpget`, noma `snmpwalk`). Noma ubani okwazi ukubhala kuthebula lezilungiselelo angakwazi ukukhetha ukuthi i-Doctor isebenzisani. Noma yiliphi elinye igama libikwa njengesixwayiso futhi alisebenzi.
- I-Doctor ayikaze isebenzise amabhanari alungisiwe njenge-root, futhi iyabika uma isebenza njenge-root.
- Ukulungiswa kuvela ohlwini oluvunyelwe olungaguquki. Ukulungisa ngakunye kudinga isenzo somlawuli oqinisekisiwe ku-UI yewebhu noma `--yes` ku-CLI, futhi ngakunye kubhalwa kulogi ye-Cacti.

## Ukukhishwa kwezinguqulo

Izinhlelo zilandela i-SemVer futhi zifana nefayela le-`INFO` lesandiso. Bheka
[inqubo yokukhishwa](../../releasing.md) ukuze uthole ukukhethwa kwenguqulo, amasango e-CI, okuqukethwe kwephakheji, ama-checksum, kanye nemiyalelo yokubuyisela emuva.

## Ukufakwa

Landa i-`doctor-VERSION.tar.gz` noma i-`doctor-VERSION.zip` kanye ne-`SHA256SUMS` kusuka ku-
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Qinisekisa i-checksum ye-SHA-256 yengobo yomlando, bese ukhiphela uhla lwayo lwe-`doctor/` kuhla lwe-`plugins/` lwe-Cacti. Lawa amaphakheji afakekayo; izingobo zomlando zomthombo ezizenzakalelayo ze-GitHub zinegama lohla elihlukile. Ukuze usebenzise umsebenzi ongakakhishwa kusuka ku-`develop`, faka kusuka ekuhlolweni komthombo.

Kokuhlolwa komthombo:

Kopa noma uvule inqolobane njenge-`plugins/doctor` ngaphakathi kokufakwa kwe-Cacti. Uhla kufanele lubizwe ngokuthi `doctor`, hhayi `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Faka futhi unike amandla i-**Cacti Doctor** kusuka ku-**Ukucushwa > Ukuphathwa Kwezandiso**, bese unikeza indawo yokufinyelela ye-**Doctor Viewer**, **Doctor Operator**, noma **Doctor Administrator** ngezimvume zomsebenzisi noma zeqembu ze-Cacti. Izinikezelo ezikhona ze-**Cacti Doctor** zigcina ukufinyelela koMlawuli ngemva kokuthuthukiswa. Umbiko uvela ngaphansi kwe-**Izinsiza > Cacti Doctor**.

## Izilimi

I-Doctor ithumela amakhathalogi okuhumusha angama-45 okungewona awesiNgisi ngaphansi kwe-`locales/po/` ne-`locales/LC_MESSAGES/` ahlanganisa izilimi zendawo ze-Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), zase-Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), nezase-Asia (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`). I-Cacti ibonisa ikhathalogi uma ukusekelwa kwezilimi kuvuliwe (**Ukucushwa > Izilungiselelo > Okujwayelekile > Ukusekelwa Kwezilimi**) futhi umsebenzisi ekhetha ulimi lwendawo i-Cacti eluvezayo esikhethini sayo sezilimi; amakhathalogi ezilimi zendawo ezingakabalwa esikhethini se-Cacti aqala ukusebenza uma i-Cacti isizengezile. Ikhasi lewebhu, izilungiselelo, kanye nemilayezo nombhalo wombiko ophrintiwe umugqa womyalo kulandela ulimi lwe-Cacti; umbiko womugqa womyalo ngokwawo usebenzisa ulimi oluzenzakalelayo lwe-Cacti, oluhlala luyisiNgisi ngaphandle uma ulushintsha.

Okuphumayo okufundwa ngomshini akukaze kuhunyushwe: ama-ID okuhlola, okhiye be-JSON namanani esimo, okuphumayo kwe-`--format=nagios` kanye ne-`--format=prometheus`, imigqa yelogi, kanye nezihloko zesigaba sephakethe lokusekela kuhlala kuyisiNgisi ukuze izikripthi nokuqapha kuqhubeke kusebenza ngazo zonke izilimi. Umbhalo we-`summary` kanye ne-`detail` wokuhlola ngakunye ukuphela kwengxenye ehunyushiwe yombiko we-JSON.

Ikhathalogi yeSpanishi yaseLatin America (`es-419`) nayo iyathunyelwa, kodwa i-Cacti 1.2 ne-Cacti 1.3 azinayo indawo yeSpanishi yaseLatin America engakhethwa, ngakho-ke isebenza kuphela uma i-Cacti yengeza eyodwa. Kuze kube yileso sikhathi, khetha isiSpanishi (`es-ES`).

I-Cacti ilayisha ikhathalogi yesandiso kusuka ku-`plugins/doctor/locales/LC_MESSAGES/<locale>.mo` nge-`doctor` njengesizinda sombhalo, ku-1.2.x kanye naku-1.3 ngokufanayo (i-1.3 ixazulula uhla lwezandiso ngendlela yayo yezandiso elungisekayo).

## Amazinga okufinyelela

| Indawo yokufinyelela | Amakhono |
|---|---|
| Doctor Viewer | Funda izimo zakamuva zokuhlola ezihleliwe, isikhathi sokubheka, ubusha kanye nomlando wakamuva ohlanganisiwe. Ayikho imiyalo yokuxilonga, imininingwane engahleliwe, ukucushwa noma ukulungiswa. |
| Doctor Operator | Sebenzisa umbiko wokuxilonga onomkhawulo wenqubo wemizuzwana engu-120, hlola imininingwane efihliwe, futhi uqinisekise okutholakele. Azikho izinketho zokushintsha izilungiselelo noma ukulungiswa. |
| Doctor Administrator | Amakhono e-Operator kanye nokulungiswa okuvunyelwe okukhona nezilungiselelo ze-Doctor. Ukulungiswa nezilungiselelo nakho kudinga indawo yokufinyelela ye-Settings/System Utilities ye-Cacti. |

Imenyu ye-Utilities ivula ikhasi lendawo yokufinyelela ephakeme kakhulu ye-Doctor enikezwe umsebenzisi, kuhlanganise nezinikezelo zeqembu. Izindawo ezintsha ze-Viewer ne-Operator azitholi izabelo ezizenzakalelayo. I-ID yendawo yokuqala ihlala inamathiselwe ku-`doctor.php` njengoMlawuli, igcina ukufinyelela okukhona komsebenzisi neqembu.

Idatha ye-Viewer ivela ekuhlolweni okuhleliwe. Nika amandla ukuhlela ngaphambi kokunikeza ukufinyelela kwe-Viewer; ukubuka okungekho noma okwedlulelwe isikhathi kubonisa **akwaziwa**, akukaze kubonise ukuthi kuphilile. Umlando ugcina izibalo zokugcina ezingu-20 ezihleliwe ezihlanganisiwe futhi ushiya ngaphandle isimo sedivayisi. Ama-Operator aqala ukuxilonga okusha ngokucacile; ukuvuselelwa kwamakhasi okuvamile kusebenzisa umbiko wokugcina weseshini yawo.

Imininingwane yedivayisi kanye nezamba zisebenzisa izimvume zedivayisi zomsebenzisi wamanje. Izingcaphuno zelogi zidinga futhi indawo yokufinyelela ye-Log Administration ye-Cacti. Izimfihlo ziyafihlwa ngaphambi kokuba imininingwane yokuxilonga igcinwe kusikhathi sewebhu noma iboniswe. Ukufinyelela kwe-CLI kuyaqhubeka nokulawulwa yi-akhawunti yesistimu yokusebenza.

Izaziso zokwamukela zingezomuntu siqu futhi zibhalwa kulogi ye-Cacti. Zisebenza kuphela ekutholakaleni okufanayo nasebufakazini obufanayo; ubufakazi obushintshile budinga ukwamukelwa okusha. Azikaze zishintshe isimo sokuphumelela/sexwayiso/sokuhluleka, zicindezele izexwayiso, noma zimake ukuhlola okuhlulekayo njengokuphilile. Lokhu kuhlukile kokuhlukile kwezixwayiso ezamukelwe, okuthinta inqubomgomo yezexwayiso ngaphandle kokushintsha isimo esibukiwe futhi okuchazwa ngezansi.

Isenzo ngasinye sidinga i-POST kanye nethokheni ye-CSRF esebenzayo. Ukulungiswa kwethula ikhasi lokuqinisekisa elihlukile elinesixhumanisi sokukhansela esingathumeli, futhi kubhala umsebenzisi osebenzayo nomphumela kulogi ye-Cacti.

## Umugqa womyalo

Sebenzisa lezi kusuka kumsuka we-Cacti njengomsebenzisi we-poller we-Cacti, hhayi i-root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Okuphumayo kombhalo kuphrinta umugqa owodwa ngokuhlola ngakunye nesimo sako, isigaba, isifinyezo, kanye nemininingwane. I-`--json` iphrinta into ye-`summary` enezibalo zesimo kanye nohlu lwe-`checks` olunezinto eziphethe i-`id`, `category`, `status`, `summary`, `detail`, kanye ne-`repair`/`repairable` uma kusebenza ukulungiswa okuvunyelwe.

| Isimo sokuphuma | Incazelo |
|---|---|
| `0` | Akukho ukuhlola okuhlulekile, noma ukulungiswa okuceliwe kuphumelele. Izixwayiso azishintshi isimo sokuphuma. |
| `1` | Okungenani ukuhlola okukodwa kuhlulekile, noma ukulungiswa okuceliwe akuphumelelanga. |
| `2` | Iphutha lokusebenzisa: ukulungiswa okusetshenziswe ngaphandle kwe-`--yes` (i-`--preview` ayikudingi), i-ID yokulungiswa engaziwa, ifomethi yokuphumayo engaziwa, inhlanganisela engasekelwe ye-`--symptom` noma ifomethi, noma ukufakwa kwe-Cacti okungatholakali. |

I-Cacti ikhulisa i-`memory_limit` kuzo zonke izikripthi ze-CLI, ngakho-ke ukuhlolwa kokucushwa kwesikhathi sokusebenza kwe-PHP kunengqondo kuphela ekhasini lewebhu.

## Ukuhlola okuhleliwe nezexwayiso

Ngaphansi kwe-**Ukucushwa > Izilungiselelo > Doctor**, vula i-**Sebenzisa Ukuhlola Ngesheduli** bese ukhetha isikhawu esisuka emizuzwini engu-15 kuya osukwini. Ngemva komjikelezo ngamunye we-poller ofika ngesikhathi, i-Doctor isebenzisa ukuhlola ngakunye kunqubo yangemuva, ngakho-ke isikhathi sokusebenza se-poller ngokwaso asithinteki.

Ukusebenza ngakunye kubhala isimo esibukiwe sokuhlola ngakunye. Izihluko zezixwayiso ezisebenzayo zithinta inqubomgomo yezexwayiso ngaphandle kokushintsha lokho kubuka. Uma ukuhlola kuqala noma kuyeka ukuhluleka, i-Doctor ibhala ushintsho kulogi ye-Cacti futhi, uma i-**Amakheli E-imeyili Ezexwayiso** isethiwe, ithumelela lawo makheli i-imeyili ngezilungiselelo zeposi ze-Cacti. I-**Xwayisa Ngezexwayiso** yengeza izinguquko ezingena neziphuma ezixwayisweni. Ukusebenza kokuqala kubhala isisekelo kuphela.

Imibiko ehleliwe isebenza ku-poller eyinhloko ngaphansi kokhiye wokweluleka wedathabheyisi futhi inomkhawulo womsebenzi wemizuzu emibili. I-Doctor ibika ukuqala kokugcina kanye nokuqedwa okuphumelelayo ukuze imiphumela engekho noma ephelelwe yisikhathi ibonakale. Imiphumela ibalwa njengamanje isikhathi sesikhawu kanye nomjikelezo owodwa wokuhlunga kanye nemizuzu emithathu. Ukusebenza okungaqedi kuzanywa futhi ngemva kwemizuzu engu-5, engu-10, engu-20 nangaphezulu, kuze kufike esikhawini esivamile. Ukulethwa kwezexwayiso okuhlulekile kugcinwa imizamo emithathu yokuphinda ngokubambezeleka okukhulayo; ngemva kwalokho, lungisa izilungiselelo zeposi ze-Cacti bese usebenzisa i-`php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` njengomsebenzisi we-poller. Ukwamukelwa yiseva yeposi akuqinisekisi ukulethwa ebhokisini lokungenayo.

Ithebhu efanayo isetha imikhawulo yesikhathi sokusebenza se-poller (80% wesikhawu), isikhala sediski esikhululekile se-RRA (xwayisa ngaphansi kwe-10%, hluleka ngaphansi kwe-2%), ukuphambuka kwewashi ledathabheyisi (xwayisa ngaphezu kwemizuzwana emi-5, hluleka ngaphezu kwengu-60), kanye nosayizi welogi ye-Cacti (100 MB). Amanani angenalutho noma angasebenzi abuyela kulezi zilungiselelo ezizenzakalelayo.

## Ukuhlanganiswa kokuqapha

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

I-`--format=nagios` iphrinta umugqa owodwa wesimo nedatha yokusebenza futhi iphume nge-`0` (OK), `1` (WARNING), noma `2` (CRITICAL), ukuze i-Nagios, i-Icinga, noma iyiphi isistimu ehambisanayo ikwazi ukuyisebenzisa ngokuqondile. I-`--format=prometheus` ibhala ifomethi yombhalo ye-Prometheus yomqoqi we-textfile ye-node_exporter: `cacti_doctor_check_status` ngokuhlola ngakunye (0 ukuphumelela noma isixwayiso esamukelwe, 1 isixwayiso esidinga isenzo, 2 ukuhluleka), `cacti_doctor_check_observed_status` ngaphambi kwezihluko, `cacti_doctor_check_accepted`, `cacti_doctor_checks` ngesimo ngasinye, kanye ne-`cacti_doctor_last_run_timestamp_seconds`. Imigqa yokuhlola ye-JSON ihlanganisa inkambu ye-`assessment`; i-`not_assessed` isho ukuthi ukuhlola akukwazanga ukufinyelela esiphethweni kusuka kudatha etholakalayo.

## Iphakethe lokusekela

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Iphakethe liyifayela elilodwa lombhalo elinezinguqulo ze-Doctor, i-Cacti, i-PHP, i-OS, nedathabheyisi, izibalo ze-poller ne-Boost, umbiko ogcwele, kanye nemigqa yokugcina engu-200 yelogi ye-Cacti. Amanani alandela amagama ephasiwedi, imfihlo, ithokheni, umphakathi, kanye nokhiye ayafihlwa. I-Doctor idala ifayela elingafundwa ngumnikazi walo kuphela futhi yenqaba ukubhala phezu kwefayela elikhona. Lihlole ngaphambi kokulithumela noma kuphi.

## Inqubomgomo yokulungisa

I-Doctor ihlanganisa ukulungisa okukodwa, `runtime_directories`. Idala izikhombi zezinhlelo ezisebenzayo ze-Cacti ezingekho futhi yengeze izimvume zomnikazi zokufunda, ukubhala, nokusebenzisa ngaphandle kokususa izimvume ezikhona.

Iqondise ku-`$cache_path`, `$log_path`, kanye no-`$rra_path` ku-Cacti 1.3, noma izikhombi ze-`cache`, `log`, kanye ne-`rra` zokufakwa uma kungenjalo. Yeqa izikhombi esevele zibhaleka, yenqabe izikhombi ezingaphandle kokufakwa kwe-Cacti (njengesikhombi selogi esingaphansi kwe-`/var/log`), yenqabe izixhumanisi zezimpawu, futhi yenqabe ukusebenza njenge-root. Ayilokothi ilandele `path_cactilog`, ngakho-ke ifayela lelogi elilungiselelwe ngaphakathi kwesikhombi sekhodi alikwazi ukuqondisa ukulungisa lapho. Ukuhlola kuyaqhubeka nokuhlola isikhombi sefayela lelogi elilungiselelwe kukho konke ukukhishwa.

Ayishintshi ubunikazi, ayisebenzisi imiyalo ye-shell, ayibhali kabusha ukulungiselelwa, futhi ayiguquli idatha yohlelo lwe-Cacti. Ukulungisa okusha ngakunye kufanele kufake ukuhlola, isibambi esisohlwini oluvunyelwe, ukuqinisekiswa, ukulotshwa kocwaningomabhuku, kanye nokuhlolwa.

## Ukuphenya izimpawu

Abasebenzi Nabaphathi bangakhetha **Investigate a symptom** ekhasini le-Doctor. Imithetho efanayo iyatholakala nge-`--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, noma `alerts_missing`, kanye nokukhishwa kombhalo noma kwe-JSON. Amaphekheji okusekela ahlanganisa ukuphenywa kwezimpawu okufanele.

Okungenzeka ngakunye kubala ukuhlolwa okubonakele kanye nesinyathelo esilandelayo sokuqinisekisa. Okungenzeka kuyizinkolelo-mbono, akuzona izimbangela eziyinhloko eziqinisekisiwe. Ukubhekwa okungekho, okungahlolwanga noma okudala akulokothi kuqinisekise imbangela. Ukuphenya kwewebhu kusebenzisa umbiko ohlungwe ngezimvume; imibiko ye-CLI isebenzisa ukufinyelela kwe-akhawunti yohlelo lokusebenza.

## Ubusha bokubuyekezwa kwe-RRD

I-`filesystem.rrd_stale` ihlola imithombo yedatha esebenzayo efika ku-500, ngaphandle kwamadivayisi akhutshaziwe nawe phansi. Ekufakweni okukhulu isampula ishintsha njalo ngehora, ngakho ukusebenza okuphindaphindiwe kuhlanganisa amafayela ahlukene. Iqhathanisa izikhathi zokuguqulwa kwefayela nenani elikhulu phakathi kwesikhawu se-poller, isinyathelo se-RRD somthombo kanye nesinyathelo sephrofayela, kuphindaphindwe nge-**RRD Stale Intervals** (okuzenzakalelayo ngu-3). Ibonisa amafayela amadala kakhulu amathathu kanye nenani lamadivayisi athintekile. Imiphumela yewebhu ihlanganisa kuphela amadivayisi avunyelwe.

I-`filesystem.rrd_files` iwukuhlola okuhlukile kokuba khona. Ibheka ifayela le-RRD lemithombo yedatha esebenzayo efika ku-5,000, kuhlanganise naleyo esemadivayisini akhutshaziwe noma awe phansi, futhi isebenzisa isampula efanayo yehora.

I-Boost yengeza kabili isikhawu sayo esilungiselelwe sokukhuculula njengesibonelelo sokubhala kudiski. Komunye umbhali ohlehlisiwe, lungiselela **Deferred RRD Write Allowance (seconds)**. I-`RRDCACHED_ADDRESS` ekhangisiwe ngaphandle kwesibonelelo, noma isikhawu se-Boost esingavumelekile, sikhiqiza umphumela ongahlolwanga. I-Doctor ayilokothi ikhuculule inqolobane ukuze yenze lokhu kuhlola. Isikhathi sokuguqulwa siwubufakazi bokusebenza kwediski, akubona ubufakazi bokuqoqwa kwedatha okuphumelele. Ukugcinwa kwenqolobane yangaphandle i-Doctor engeke ikwazi ukukubona kufanele kulungiselelwe ngokusobala.

Amafayela angekho, angafundeki kanye nanedethi yesikhathi esizayo abalwa emininingwaneni. Umphumela awuhlolwa kuphela uma kungekho fayela elisampuliwe elifundekayo. Umphumela wesampula usho ukuthi uhlanganisa ingxenye yokufakwa kuphela; ukuphumelela akuhlanganisi amafayela angasampuliwe.

## Ukubuka kuqala kokulungisa nomlando wocwaningomabhuku

Ikhasi lokulungisa loMphathi libonisa indlela ngayinye ethintekile, isenzo sayo esihlongozwayo, izimvume zamanje kanye nezimvume ezihlosiwe. Ukugunyazwa kuxhumene nalokho kubuka kuqala, umsebenzisi osebenzayo kanye nesikhathi sokuphila semizuzu emihlanu. Ukuqinisekiswa kudla ukubuka kuqala; uhlelo lwamafayela olushintshiwe ludinga okunye ukubuka kuqala. Ukusebenzisa njenge-root, izindlela ezingaphandle kokufakwa, izixhumanisi ezidinga ukulungiswa kanye nezimvume zohlelo lwamafayela ezingahlangatshezwanga kuvimbela ukugunyazwa.

I-`--repair=runtime_directories --preview` iphrinta uhlelo lwe-JSON olufundeka kuphela. I-`--repair=runtime_directories --yes` igunyaza uhlelo lwe-CLI olusanda kubalwa futhi iluhlole kabusha ngaphambi kokusebenza. I-akhawunti ye-CLI kufanele ngabe isivele igunyaziwe ukulungisa ukufakwa; ayizuzi izindima zewebhu.

Irekhodi ehlelekile ye-`repair.started` kufanele igcinwe ngaphambi kwanoma yiluphi ushintsho lohlelo lwamafayela. Irekhodi exhumene ye-`repair.completed` iqukethe isithombe sangemva kokulungisa kanye nomphumela wokuqinisekisa. Umsebenzi ophazanyisiwe ushiya irekhodi eqaliwe ukuze iphenywe. Ukwehluleka kocwaningomabhuku lokuqedela kubikwa njengokwehluleka ngisho noma izinguquko zohlelo lwamafayela zenzekile. I-Doctor yengeza izimvume zomnikazi futhi idale izikhombi; ayizami ukubuyisela emuva okuzenzakalelayo.

Abaphathi abanemvume ye-Settings/System Utilities ye-Cacti bangafunda okufakiwe kocwaningomabhuku kwakamuva okungama-20 ekhasini le-Doctor. I-plugin igcina amarekhodi akamuva angama-200 ku-`plugin_doctor_audit`; ilogi ye-Cacti iphinde iqophe ama-ID abo, izenzo kanye nababambiqhaza. Okuqukethwe kocwaningomabhuku kuyacishwa ingxenye eyimfihlo.

## Izexwayiso ezamukelwe

Abaphathi abanemvume ye-Settings/System Utilities ye-Cacti bangadala **Warning exception** kusukela esixwayisweni esisha, esihloliwe ekhasini le-Doctor. Okuhlukile kudinga umnikazi, isizathu kanye nosuku lokubuyekeza lwe-UTC phakathi nezinsuku ezingama-90. Kuphelelwa yisikhathi phakathi kwamabili nge-UTC ekuqaleni kwalolo suku. Kungahlelwa okuhlukile okufika ku-100. Uhlu lubonisa okufakiwe okuphelelwe yisikhathi nama-ID angekho embikweni wamanje, futhi luvumela ukususwa.

Isexwayiso esibonakele sihlala sibonakala, nomnikazi waso, isizathu kanye nokuphelelwa yisikhathi emininingwaneni yokuhlola. I-JSON igcina isimo esibonakele futhi yengeze imethadatha ye-`accepted` ne-`acceptance`. I-Nagios ikhipha izexwayiso ezamukelwe ezisebenzayo ebucayini bokuphuma kwayo kodwa izibize ngamagama emiphumeleni yayo. I-Prometheus ikhipha kokubili ubucayi obubonakele nobungenziwa okuthile ngabo. Isimo esijwayelekile sokuphuma se-CLI sihlala singashintshiwe: izexwayiso sevele ziphuma zingu-zero, ukwehluleka kuphuma kungu-one.

Izaziso zezexwayiso ezihleliwe ziyacindezelwa ngenkathi okuhlukile kusebenza; ukuphelelwa yisikhathi noma ukususwa kwenza isexwayiso esiqhubekayo siphinde sifanelekele izaziso zezexwayiso. Ukushintshela ekwehlulekeni nokululama ekwehlulekeni kuhlala kufanelekela izaziso. Umphumela ongahlolwanga noma ukwehluleka akukwazi ukwamukelwa. Ukuvuma komuntu siqu kuhlukile futhi akucindezeli lutho. Ukudalwa nokususwa kokuhlukile kuhambisana nerekhodi locwaningomabhuku ngendlela ye-transaction.

Ukuthuthukisa kudala i-`plugin_doctor_audit` ne-`plugin_doctor_acceptance` ngaphandle kokushintsha idatha yohlelo lwe-Cacti. Khipha noma yimuphi umlando owudingayo ngaphambi kokukhipha uhlelo: ukukhipha uhlelo kususa womabili amathebula e-plugin kanye nezilungiselelo zayo. Ukubuyisela amafayela e-plugin kushiya amathebula etholakala ukuze aphenywe, kodwa izinhlelo ezindala azizihloniphi izexwayiso ezamukelwe njengezihlukile.

## Izidingo

| Cacti | PHP | Amanothi |
|---|---|---|
| 1.2.20 | 5.4 noma entsha | Ikhodi ye-Doctor uqobo ihambisana ne-PHP 5.4 ukuze ikwazi ukuhlola amasistimu amadala ngaphambi kokuthuthukiswa |
| 1.2.31 | 8.0 noma entsha | I-`composer.json` ye-Cacti idinga `>=8.0` |
| I-1.2.x yamanje | 8.2 noma entsha | I-`composer.json` ye-Cacti idinga `>=8.2` |
| `develop` (1.3) | 8.3 noma entsha | I-`composer.json` ye-Cacti idinga `^8.3` |

Umugqa we-**PHP compatibility with installed Cacti** uqhathanisa inguqulo ye-PHP esebenzayo nesidingo se-PHP ku-`composer.json` eyisisekelo ye-Cacti uqobo, okuhlanganisa umkhawulo ophezulu wesivimbelo se-caret esinjenge-`^8.3`. Ifayela elisebenzisekayo le-PHP CLI elilungiselelwe lihlolwa ngokumelene nesidingo esifanayo. I-Doctor ibona amafomu esivimbelo se-`>=` ne-`^` asetshenziswa yilawa maphekheji e-Cacti. Isidingo esingafundeki, esakhiwe kabi, esingekho, noma esingaziwa sikhiqiza isexwayiso; ukufakwa kwe-Cacti 1.2.20–1.2.30 okungenayo i-manifest kugcina isisekelo sabo esibhaliwe sesifaki se-PHP 5.4. Ukuhambisana kwe-Doctor uqobo ne-PHP 5.4 akuqinisekisi ukuhambisana nokufakwa okusha kwe-Cacti.

Umugqa we-**PHP upstream security support** uphendula umbuzo ohlukile: ingabe lelo gatsha lokukhishwa kwe-PHP lisathola ukulungiswa kokuphepha okuvela kuphrojekthi ye-PHP? Ubika usuku lokuphela kokwesekwa kokuphepha olushicilelwe lwegatsha futhi uxwayise ngemva kwalolo suku. Isibonelo, i-PHP 8.1 ingahlangabezana nesidingo sesikhathi sokusebenza sokufakwa okudala kwe-Cacti ngenkathi ingasatholi ukulungiswa kokuphepha okuvela emthonjeni wokuqala. Umphumela ophumelelayo awusho ukuthi ukukhishwa kwepheshana elifakiwe kusesikhathini, futhi i-Doctor ayikwazi ukunquma ukuthi umthengisi we-OS uhlinzeka ngokulungiswa okubuyiselwe emuva yini.

Izinsuku zokwesekwa zifakwe kanye ne-Doctor zisuka ku-[sheduli yokwesekwa kwe-PHP](https://www.php.net/supported-versions.php) kanye no-[hlu lokuphela kokusebenza](https://www.php.net/eol.php), okugcine ukuhlolwa ngomhla ka-2026-11-08. Amagatsha angaziwa nokukhishwa kwangaphambi kwesikhathi kukhiqiza isexwayiso esikhundleni sokuthathwa njengokuphumelelayo. Asikho isicelo senethiwekhi esenziwayo ngesikhathi sokuhlola. Buyekeza idatha yokwesekwa ye-Doctor uma i-PHP ishicilela isheduli entsha. Ama-ID akhona e-JSON/okugada `php.version` kanye ne-`php.security_baseline` awashintshiwe.

## Ukuthuthukiswa

Iqoqo lokuhlola iyunithi lisebenzisa i-Pest futhi lisebenza ku-PHP 8.2 noma entsha:

```console
composer install
composer test
```

Ukuhlolwa kuthatha indawo yemisebenzi ye-Cacti ebizwa yi-Doctor ngezinto ezimelayo ezincane ku-`tests/CactiStubs.php`, ngakho-ke kusebenza ngaphandle kokufakwa kwe-Cacti.

I-GitHub Actions yenza izinhlobo ezine zokuhlola kukho konke ukuphusha nesicelo sokudonsa:

- I-`php -l` kulo lonke ifayela le-PHP ngaphansi kwe-PHP 5.4, 5.6, 7.0, 7.1, 7.4, kanye no-8.0 kuya ku-8.4.
- Iqoqo lokuhlola iyunithi ku-PHP 8.2, 8.3, kanye no-8.4.
- I-`locales/build_gettext.sh --check`, eyehluleka kusifanekiso sokuhumusha esidala, kukhathalogi engaphelele noma engaqinisekile, noma kukhathalogi ehlanganisiwe ehlukile emthonjeni wayo.
- Imisebenzi yokuhlanganisa eyisikhombisa efaka i-Cacti 1.2.20, igatsha lamanje le-1.2.x, kanye ne-`develop` ngokumelene ne-MySQL ne-MariaDB, nazo zombili i-cmd.php ne-Spine. Umsebenzi ngamunye ufaka futhi uvule i-plugin, usebenzise umbiko ogcwele we-CLI, futhi uhlole isikimu sombiko, inani lesifinyezo, izimo ezilindelekile, kanye nesethi eqondile yokwehluleka. Bese uphula indlela kanambambili kanye nesitembu sesikhathi se-poller, uqinisekise ukuthi zombili ziyabikwa, uzibuyisele, usebenzise ukulungisa nokuqinisekiswa kwakho, futhi usebenzise ukukhubaza, ukuvula, ukukhipha uhlelo, nokufaka kabusha. Umbiko we-JSON ugcinwa njengento ekhiqiziwe uma umsebenzi wehluleka.

## Ukufaka isandla

Ama-pull request aya ku-`develop`. Gcina amafayela okukhiqiza ehambisana ne-PHP 5.4 futhi usebenzise isitayela se-Cacti: ama-tab, ama-string anezingcaphuno ezisodwa, kanye nezinsiza ze-Cacti ezifana ne-`read_config_option()` ne-`db_fetch_cell()`. Engeza i-unit test ekushintsheni ngakunye kokuziphatha, sayina ama-commit akho (`git commit -s`), bese wengeza umugqa ku-`CHANGELOG.md`.

### Ukuhumusha

Songa wonke umlayezo obonwa ngumsebenzisi nge-`__('...', 'doctor')` (noma i-`__n()`, i-`__x()`, i-`__esc()`), bese unikeza umusho oqukethe inani i-format string eyodwa enezikhala zokubamba ezilandelanayo ze-`%s`/`%d` esikhundleni sokuhlanganisa izingxenye. I-`__()` ye-Cacti ifometha umlayezo kuphela uma iqukethe isicacisi sefomethi futhi ayisekeli izinhlobo ze-`%1$s` ezilandelana ngendawo. Iphinde iguqule u-`%%` ibe u-`%` ngaphambi kokufometha, ngakho ungalokothi ufake uphawu lwephesenti ngokoqobo emlayezweni: dlulisa inani elinophawu lwalo njenge-argument (`__('Usage: %s', '50%', 'doctor')`). Imigqa ye-log ihlala ingesiNgisi: sebenzisa i-`doctor_repair_message()` kumbhalo wokulungisa ne-`doctor_n_()` emilayezweni efakwa ku-log futhi ehumushwa lapho iboniswa khona kuphela. Gcina ama-ID wokuhlola, okhiye be-JSON, amagama abalulekile esimo, umphumela wokuqapha, nemigqa ye-log kungahunyushwanga.

I-`locales/build_gettext.sh` ikhiqiza kabusha ithemplethi i-`locales/po/cacti.pot`, iyihlanganise kukhathalogi ngayinye i-`locales/po/<locale>.po`, bese ihlanganisa i-`locales/LC_MESSAGES/<locale>.mo`; faka konke okuthathu ku-commit. I-CI isebenzisa i-`sh locales/build_gettext.sh --check`, ehluleka uma ithemplethi isiphelelwe yisikhathi noma ikhathalogi ishoda noma inokungenile okungacacile (fuzzy), uma indawo yokubamba ihluka, noma uma ifayela elihlanganisiwe liphelelwe yisikhathi. Ngakho-ke umlayezo oshintshiwe udinga ukuthi ukuhunyushwa kwawo kubuyekezwe ku-pull request efanayo. Kudinga i-GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Ulimi olusha yifayela elisha le-`<locale>.po` eliqanjwe ngendlela i-Cacti eqamba ngayo izilimi zayo zendawo (isibonelo `pt-BR`).

## Ezokuphepha

Bika ukuba sengozini ngasese njengoba kuchaziwe ku-[SECURITY.md](../../../SECURITY.md), hhayi ezinkingeni zomphakathi.

## Ilayisense

Ilungelo lobunikazi (C) 2026 Thomas Vincent. Ikhishwe ngaphansi kwe-GNU General Public License, inguqulo 2 noma kamuva. Bheka i-[LICENSE](../../../LICENSE).
