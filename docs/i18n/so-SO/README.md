<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: geed kaaktas ah oo xiran qalabka dhakhtarka ee dhagaysiga. Baar. Hagaaji. Kormeer.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Xaaladda Albaabka Tayada"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Shatiga: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ iyo 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor waa ku-dar (plugin) Cacti ah oo hal mar ku baara rakibidda Cacti, islamarkaana fuliya dayactirro yaryar kaliya marka uu maamuluhu codsado.

**Xaaladda: horumarin ayay ku jirtaa, ka hor 1.0.** Soo-saarkii ugu dambeeyay waa [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Balastarkani wuxuu ku darayaa buugaagta ereyada ee Af-Hindiga iyo Af-Carabiga iyo hagayaasha isticmaalaha ee la turjumay kuwaas oo lagu daray gelitaanka ku salaysan doorka, baaritaanka la hago, hubinta cusboonaanta RRD ee xaddidan, horudhacyada dayactirka iyo taariikhda baarista, ka-reebitaannada digniinaha la aqbalay, iyo turjumaadaha ku jira 0.6.0. Faahfaahinta ka eeg [CHANGELOG.md](../../../CHANGELOG.md).

## Sawirrada Shaashadda

Dejinta baaritaanka iyo jadwalka ee rakibidda tijaabada ah ee go'doonsan ee Cacti 1.2.31 ee ku shaqaynaysa PHP 8.3.36, oo ay ku jiraan hubinta waafaqsanaanta PHP ee Cacti, taageerada amniga ee isha sare (upstream), iyo caafimaadka kaydka xogta. Digniinaha iyo guuldarrada halkan ka muuqda waxay qeexayaan deegaankaas tijaabada ah.

![Shaxda baaritaanka ee Doctor oo leh natiijooyinka gudbay, digniinta, iyo guuldarrada](../../screenshots/diagnostics.png)

![Dejinta jadwalka, digniinta, iyo xadka ee Doctor](../../screenshots/settings.png)

Dhibaatooyinka Cacti badanaa waxay u muuqdaan calaamado: garaafyo madhan, poller istaagay, ama ku-dar (plugin) aan rakibmaynin. Sababtu inta badan waa shuruud hore oo isbeddeshay, sida kordhin PHP ah oo ka maqan dhismaha CLI, galka diiwaanka (log directory) oo aanu poller-ku wax ku qori karin, waddo RRDtool ah oo tilmaamaysa fayl fulin oo khaldan, ama kayd xog oo aan lahayn shaxannada aagga waqtiga (timezone tables). Doctor wuxuu si toos ah u hubiyaa shuruudahaas hore wuxuuna mid walba u soo sheegaa inuu gudbay (pass), digniin yahay (warn), ama guuldarraystay (fail) isagoo raacinaya jumlad sharxaysa waxa uu helay. Isla warbixintaas waxaa laga heli karaa bogga webka, khadka taliska (command line), iyo qaabka JSON ee kormeerka.

## Waxa uu hubiyo

| Aagga | Hubinta |
|---|---|
| Doctor | In Doctor laftiisu uu ku shaqeeyo root ahaan, taas oo keeni lahayd in hubinta oggolaanshuhu ay qeexdo koontada khaldan |
| Cacti iyo PHP | Nooca Cacti, casriyeyn aanu rakibuhu weligii dhammaystirin, ku-darro shidan oo faylashoodu maqan yihiin, waafaqsanaanta PHP iyo xirmada Cacti ee rakiban, iyo xaaladda taageerada amniga ee isha sare (upstream) ee PHP |
| Kordhinta PHP | Kordhinta loo baahan yahay ee ku jirta PHP-ga webka iyo PHP-ga CLI ee uu adeegsado poller-ku, iyo sidoo kale astaamaha lagu taliyay |
| Dejinta PHP | `memory_limit`, `max_execution_time`, iyo `date.timezone`, iyadoo la adeegsanayo talooyinka Cacti lafteeda |
| Kaydka xogta | Xiriirka, nooca server-ka marka loo eego talada Cacti, qaybta xarfaha UTF-8, shaxannada aagga waqtiga (timezone tables), shaxannada aasaasiga ah, kala duwanaanshaha saacadda ee host-ka PHP, iyo dejinta InnoDB ee Cacti u calaamadayso khaladaad |
| Caafimaadka kaydka xogta | Awoodda xiriirka, akhriska buffer-pool, shaxannada ku-meel-gaarka ah ee diskiga, abuurista thread-ka xiriirka, weedhaha gaabiska ah, iyo sugitaanka InnoDB log-buffer, oo leh talooyin hagaajin ah oo ku xiran culayska shaqada |
| Nidaamka faylasha | Gallada kaydka ku-meel-gaarka ah (cache), diiwaanka (log), iyo RRA oo wax lagu qori karo; meel bannaan oo u hadhay faylasha RRD; ilaha xogta firfircoon ee aan lahayn fayl RRD ama cusboonaysiintoodu dib u dhacday; `include/config.php` oo aan u furnayn akhriska dadweynaha; diiwaanka Cacti oo wax lagu qori karo oo aan xad-dhaaf u weynayn |
| Faylasha fulinta (Binaries) | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, iyo Spine marka uu yahay poller-ka la dejiyay, oo ay ku jiraan noocyada meelaha ay Cacti mid sheegto |
| Diiwaanka (Log) | Khaladaadka ku jira sadarradii ugu dambeeyay ee diiwaanka Cacti, iyadoo la raacinayo fariinta ugu soo noqnoqoshada badan |
| Aaladaha | Aaladaha shidan ee maqan (down) ama soo kabanaya, saddexda ugu muddada dheer ee maqan iyo khaladkoodii ugu dambeeyay, iyo guuldarro marka inta badan aaladuhu isku mar maqan yihiin |
| Poller | Nooca iyo xilliga soo noqnoqoshada poller-ka, waqtiga ka soo wareegay markii ugu dambaysay ee poller-ka weyni dhammaystay, waqtiga shaqada marka loo eego xilliga soo noqnoqoshada, wax-soo-saarka poller-ka ee aan weligii gaarin fayl RRD, poller-rada fogfog ee joojiyay warbixinta, Boost taagan, iyo dejin Spine ah oo tilmaamaysa kayd xog oo ka duwan |

Hubin kasta waxay leedahay aqoonsi (ID) joogto ah, sida `database.timezone` ama `binary.rrdtool`, si qoraallada otomaatiga ah (scripts) ay u adeegsan karaan natiijooyinka gaarka ah. Ku-darrada shidan waxay ku biirin karaan hubin dheeraad ah iyo lifaaqyada xirmada taageerada iyagoo adeegsanaya qabsatada `doctor_register_checks`, Doctor-na wuxuu u soo bandhigaa awoodaha ogaanshaha ee akhris-kaliya ah `plugin_mcp` iyadoo loo marayo `abilities_register`.

## Khariidadda koodhka iyo tijaabada

| Dabeecadda | Hirgelinta | Caddaynta tijaabada ee kaydkan (repository) |
|---|---|---|
| Hubinta baaritaanka iyo aqoonsiyada warbixinta ee joogtada ah | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Qabsatada hubinta ku-darka (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Awoodaha ogaanshaha ee MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Gelitaanka ku salaysan doorka iyo warbixinnada webka ee xogta laga qariyay | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Baaritaannada calaamadaha ee la hago | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Cusboonaanta RRD iyo maaraynta qorista dib loo dhigay | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Horudhacyada dayactirka, taariikhda baarista, iyo digniinaha la aqbalay | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Hubinta jadwalsan iyo isbeddelka digniinta | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Tixraacyadani waxay tilmaamayaan hirgelinta iyo baaxadda tijaabada; ma sheegayaan in shaqo kasta oo CI ah ay u gudubtay dib-u-eegista hadda jirta. Hubi orodka socodka shaqada (workflow run) ee dib-u-eegista aad qorshaynayso inaad hawlgeliso.

## Talada caafimaadka kaydka xogta

Falanqeeyaha PHP ee u gaarka ah Doctor wuxuu akhriyaa tiro go'an oo xisaabiyayaal guud oo MySQL ama MariaDB ah isagoo adeegsanaya xiriirka kaydka xogta ee Cacti ee horay u jiray. Wuxuu sameeyaa laba weydiin oo akhris-kaliya ah warbixin kasta, uma baahna aqoonsiyo dheeraad ah ama fayl fulin, waligiisna ma beddelo dejinta kaydka xogta. Hubintani waxay ka soo muuqataa warbixinta webka, CLI, JSON, wax-soo-saarka kormeerka, xirmada taageerada, iyo la socoshada xaaladda jadwalsan.

| Aqoonsiga Hubinta | Kiciyaha baaritaanka |
|---|---|
| `database.health_sample` | In ka yar 24 saacadood laga bilaabo bilowgii ama `FLUSH STATUS`, ama waqtiga shaqada (uptime) oo aan la heli karin ama aan is waafaqsanayn |
| `database.connection_capacity` | Xiriirrada hadda jira ama heerkii ugu sarreeyay ee la diiwaangeliyay oo ugu yaraan gaara 80% tirada hadda jirta ee `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` oo ugu yaraan ah 1%, iyadoo ay jiraan ugu yaraan 10,000 codsi akhris ah |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` oo ugu yaraan ah 25%, iyadoo ay jiraan ugu yaraan 1,000 shaxan oo ku-meel-gaar ah |
| `database.thread_cache` | `Threads_created / Connections` oo ugu yaraan ah 5%, iyadoo ay jiraan ugu yaraan 1,000 isku day xiriir iyo `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` oo ugu yaraan ah 1%, iyadoo ay jiraan ugu yaraan 1,000 weedho |
| `database.redo_log_waits` | `Innodb_log_waits` oo aan eber ahayn |

Kuwani waa xadadka baaritaanka ee Doctor, ma aha bartilmaameedyada dejinta ee soo-saaraha. Marka laga reebo awoodda xiriirka, talada isugeynta ahi waxay u baahan tahay daaqadda kormeerka ee kore. Xisaabiyayaasha maqan, qaab-xun, labanlaabmay, ama xad-dhaaf u weyn, dhaqdhaqaaq aan ku filnayn, iyo hababka thread-ka ee aan la taageerin waxay soo saaraan digniino halkii ay ka soo saari lahaayeen xukun caafimaad qaba ama talo hagaajin. Digniinuhu waxay saamayn ku yeelan karaan xaaladda Nagios iyo ogeysiisyada jadwalsan marka uu shidan yahay **Alert on Warnings**.

Wada akhri xisaabiyayaasha la cabbiray iyo talada. Qiimayaasha isugeynta ahi ma caddeeyaan culayska hadda jira; xisaabiyayaashu waxay yeelan karaan taariikho dib-u-dejin oo kala duwan mana aha sawir hal mar wada qaad ah (atomic snapshot). Xiriirrada ugu sarreeyay waxay muujin karaan xad hore. Tirada weydiimaha gaabiska ah waxay ku xiran tahay `long_query_time`, xisaabiyaha shaxannada ku-meel-gaarka ah ee diskiga ee MySQL-na wuxuu ka tagi karaa faylasha memory-mapped-ka ah. Saamiga hooseeya ma caddeeyo maqnaanshaha ciriiri (bottleneck). Xaqiiji isbeddellada adigoo eegaya culays shaqo oo matalaad leh, dib u eeg qorshooyinka weydiinta iyo dib-u-adeegsiga xiriirka, oo cabbir xusuusta (memory) ku jirta **host-ga kaydka xogta** ka hor intaadan beddelin buffers-ka ama xadadka xiriirka.

Haddii cabbiradu aanay diyaar ahayn, hubi taageerada server-ka iyo gelitaanka koontada Cacti ee `SHOW GLOBAL STATUS` iyo `SHOW GLOBAL VARIABLES`; Doctor ma codsado aqoonsiyo sare. Qeexitaannada xisaabiyayaashu waxay ka yimaadaan [tixraaca doorsoomayaasha xaaladda MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) iyo [tixraaca doorsoomayaasha xaaladda MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Lama isticmaalo qoraal ama koodh MySQLTuner ah.

Looma baahna wax guuris ah oo qaab-dhismeed (schema) ama dejin ah. U hawlgeli faylasha ku-darka (plugin) sidii caadiga ahayd; ka-noqoshada faylashaas waxay meesha ka saaraysaa baaritaannada lagu daray. Xaaladda jadwalsan ee horay u jirtay waxaa dib loo cusboonaysiiyaa orodka xiga.

## Sida uu u ilaaliyo badbaadada

Qalabka ogaanshaha ciladaha wuxuu ku shaqeeyaa xuquuqda poller-ka ama adeegaha shabakadda (web server) wuxuuna ka akhriyaa waddooyinka jadwalka dejimaha (settings table), sidaas darteed waa inuu ka taxaddaraa waxa uu fuliyo iyo waxa uu wax ka beddelo.

- Baaritaannada ogaanshaha waa kuwo akhris-kaliya ah (read-only). Weligood wax kama beddelaan faylasha, dejimaha, ama xogta.
- Doctor wuxuu socodsiiyaa barnaamij binary ah oo la habeeyay oo keliya marka magaca faylkiisu uu la mid yahay barnaamijka la filayo (`php`, `rrdtool`, `snmpget`, ama `snmpwalk`). Haddii kale, qof kasta oo wax ku qori kara jadwalka dejimaha wuxuu dooran lahaa waxa uu Doctor fulinayo. Magac kasta oo kale waxaa loo soo wargeliyaa digniin ahaan lamana fuliyo.
- Doctor weligiis kuma socodsiiyo barnaamijyada binary-ga ah ee la habeeyay isagoo ah root, wuuna soo wargeliyaa marka uu ku shaqeynayo root ahaan.
- Dayactirradu waxay ka yimaadaan liis oggolaansho oo go'an (allow-list). Mid kastaa wuxuu u baahan yahay fal maamule oo la xaqiijiyay oo ka dhaca isdhexgalka shabakadda ama `--yes` khadka taliska, mid kastana waxaa lagu qoraa diiwaanka Cacti.

## Noocyada la sii daayay

Noocyadu waxay raacaan SemVer waxayna la jaanqaadaan faylka `INFO` ee kordhinta. Eeg
[habraaca siideynta](../../releasing.md) si aad u hesho xulashada nooca, shuruudaha hubinta CI, waxyaabaha ku jira xirmada, hubinta checksum-ka, iyo tilmaamaha dib-u-celinta.

## Rakibaadda

Ka soo deji `doctor-VERSION.tar.gz` ama `doctor-VERSION.zip` iyo `SHA256SUMS` bogga
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Xaqiiji sumadda SHA-256 checksum-ka ee kaydka, ka dibna ku fur galka `doctor/` gudaha
galka `plugins/` ee Cacti. Kuwani waa xirmooyinka la rakibi karo; kaydyada isha ee
tooska ah ee GitHub waxay leeyihiin magac gal oo ka duwan. Si aad u socodsiiso shaqo aan
weli la sii deyn oo ka timid `develop`, ka rakib koobi toos ah oo laga soo raray kaydka isha.

Wixii ku saabsan soo raridda tooska ah ee isha:

Koobi ka samee ama ku fur kaydka magaca `plugins/doctor` gudaha rakibaadda Cacti. Galku waa inuu lahaadaa magaca `doctor`, ee maaha `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Ka rakib oo ka shid **Cacti Doctor** qaybta **Configuration > Plugin Management**, ka dibna sii oggolaanshaha **Doctor Viewer**, **Doctor Operator**, ama **Doctor Administrator** adigoo u maraya xuquuqda isticmaalaha ama kooxda ee Cacti. Oggolaanshooyinkii hore ee **Cacti Doctor** waxay ilaashadaan gelitaanka Administrator ka dib cusboonaysiinta. Warbixintu waxay ka soo muuqataa qaybta **Utilities > Cacti Doctor**.

## Luqadaha

Doctor wuxuu la yimaadaa 48 kaataloog oo tarjumaad ah oo aan Ingiriisi ahayn ee ku hoos jira `locales/po/` iyo `locales/LC_MESSAGES/`, oo daboolaya deegaan-luqadeedyada Heerka 1-aad ee Ballaaran (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Aasiya (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), iyo Koonfur-Bari Yurub (`bs-BA`, `hr-HR`, `sr-RS`). Cacti wuxuu soo bandhigaa kaataloog marka taageerada luqaddu shidan tahay (**Configuration > Settings > General > Language Support**) oo isticmaaluhu doorto deegaan-luqadeed uu Cacti ku soo bandhigo xuleeyaha luqadda; kaataloogyada loogu talagalay deegaan-luqadeedyada aan weli ku taxnayn xuleeyaha Cacti waxay dhaqangalayaan marka uu Cacti ku daro. Bogga shabakadda, dejimaha, iyo farriimaha iyo qoraalka warbixinta ee uu daabaco khadka talisku waxay raacaan luqadda Cacti; warbixinta khadka taliska lafteedu waxay adeegsataa luqadda caadiga ah ee Cacti, taas oo ahaata Ingiriisi ilaa aad adigu beddesho.

Natiijada ay mashiinnadu akhrisan karaan weligeed lama tarjumo: aqoonsiyada hubinta, furayaasha JSON iyo qiimayaasha xaaladda, natiijooyinka `--format=nagios` iyo `--format=prometheus`, sadarada diiwaanka, iyo cinwaannada qaybaha xirmada taageerada waxay ku hadhaan Ingiriisi si qoraallada otomaatiga ah iyo kormeerku ay ugu sii shaqeeyaan luqad kasta. Qoraalka `summary` iyo `detail` ee hubin kasta waa qaybta keliya ee la tarjumay ee ku jirta warbixinta JSON.

Faylka luqadda Isbaanishka Laatiin Ameerika (`es-419`) isaguna wuu la socdaa, laakiin midna Cacti 1.2 ama Cacti 1.3 ma laha deegaan luqadeed oo Isbaanish Laatiin Ameerika ah oo la dooran karo, sidaas darteed wuxuu shaqaynayaa oo keliya marka Cacti ku daro mid. Ilaa waqtigaas, dooro Isbaanish (`es-ES`).

Cacti wuxuu ka soo rarayaa faylka luqadda kordhinta `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` isagoo adeegsanaya `doctor` ahaan magaca text domain-ka, labadaba noocyada 1.2.x iyo 1.3 si isku mid ah (1.3 waxay ku heshaa galka kordhinta iyadoo u maraysa waddada kordhimaha ee la habayn karo).

## Heerarka gelitaanka

| Qaybta oggolaanshaha | Awoodaha |
|---|---|
| Doctor Viewer | Akhri xaaladaha hubinta jadwalsan ee ugu dambeeyay, waqtiga indho-indheynta, cusboonaanta, iyo taariikhda guud ee dhow. Ma jiro wax amarro ogaansho cilado ah, faahfaahin cayriin ah, dejin, ama dayactir. |
| Doctor Operator | Socodsii warbixinta ogaanshaha ciladaha oo leh xaddidaad hawleed oo 120 ilbiriqsi ah, baar faahfaahinnada la qariyay xogta xasaasiga ah, oo aqoonso natiijooyinka la helay. Ma jiro wax isbeddel dejin ah ama dayactir. |
| Doctor Administrator | Awoodaha Operator oo lagu daray dayactirka liiska oggolaanshaha ku jira iyo dejimaha Doctor. Dayactirka iyo dejimuhu waxay sidoo kale u baahan yihiin qaybta oggolaanshaha Settings/System Utilities ee Cacti. |

Liiska Utilities wuxuu furaa bogga u dhigma qaybta oggolaanshaha Doctor ee ugu sarraysa ee la siiyay isticmaalaha, oo ay ku jiraan oggolaanshooyinka kooxaha. Qaybaha cusub ee Viewer iyo Operator ma helaan wax oggolaansho toos ah. Aqoonsiga qaybta oggolaanshaha ee asalka ah wuxuu ku xiran yahay `doctor.php` ahaan Administrator, taasoo ilaalinaysa gelitaankii hore ee isticmaalayaasha iyo kooxaha.

Xogta Viewer waxay ka timaadaa hubinnada jadwalsan. Daar jadwalka ka hor intaadan siinin gelitaanka Viewer; indho-indheynta maqan ama waqtigeedii dhaafay waxay soo bandhigtaa **unknown**, weligeedna ma muujiso caafimaad qab. Taariikhdu waxay kaydisaa 20-kii tirakoob guud ee jadwalsan ee ugu dambeeyay waxayna ka reebtaa xaaladda qalabka. Operators-ku waxay si cad u bilaabaan baaritaanno cusub; dib-u-cusboonaysiinta caadiga ah ee boggu waxay adeegsataa warbixintii ugu dambeysay ee fadhigooda.

Faahfaahinta qalabka iyo wadarta guud waxay adeegsadaan xuquuqda qalabka ee isticmaalaha hadda jira. Qaybaha laga soo qaatay diiwaanka waxay dheeri ahaan u baahan yihiin qaybta oggolaanshaha Log Administration ee Cacti. Sirta waa la qariyaa ka hor intaan faahfaahinnada ogaanshaha lagu kaydin fadhiga shabakadda ama la soo bandhigin. Gelitaanka CLI wuxuu sii wadaa inuu xukumo akoonka nidaamka hawlgalka.

Aqoonsiyada waa kuwo shakhsi ah waxaana lagu qoraa diiwaanka Cacti. Waxay khuseeyaan oo keliya isla natiijada la helay iyo caddaynta; caddayn isbeddeshay waxay u baahan tahay aqoonsi cusub. Weligood wax kama beddelaan xaaladda gudbay/digniin/guuldarro, ma cabudhiyaan digniinaha, mana calaamadeeyaan hubin guuldarraysatay inay caafimaad qabto. Tani way ka duwan tahay ka-reebitaannada digniinta la aqbalay, kuwaas oo saameeya siyaasadda digniinaha iyagoon beddelin xaaladda la arkay, hoosna lagu sharraxay.

Fal kasta wuxuu u baahan yahay POST iyo calaamadda CSRF oo sax ah. Dayactirradu waxay soo bandhigaan bog xaqiijin ah oo gaar ah oo leh xiriiriye Joojin ah oo aan waxba gudbinayn, waxayna ku qoraan isticmaalaha fuliyay iyo natiijada diiwaanka Cacti.

## Khadka taliska

Ku socodsii kuwan galka xididka ee Cacti adigoo ah isticmaalaha poller-ka Cacti, ee ha noqon root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Natiijada qoraalka ahi waxay daabacdaa hal sadar hubin kasta iyadoo wadata xaaladdeeda, qaybteeda, soo koobidda, iyo faahfaahinta. `--json` wuxuu daabacaa walax `summary` ah oo leh tirada xaaladaha iyo taxane `checks` ah oo waxyaabaha ku jira ay sitaan `id`, `category`, `status`, `summary`, `detail`, iyo `repair`/`repairable` marka uu khuseeyo dayactir ku jira liiska oggolaanshaha.

| Xaaladda ka bixista | Macnaha |
|---|---|
| `0` | Hubinna ma guuldarraysan, ama dayactirkii la codsaday wuu guuleystay. Digniinuhu ma beddelaan xaaladda ka bixista. |
| `1` | Ugu yaraan hal hubin ayaa guuldarraysatay, ama dayactir la codsaday ayaan guuleysan. |
| `2` | Khalad adeegsi: dayactir la socodsiiyay iyadoon la wadan `--yes` (`--preview` uma baahna), aqoonsi dayactir oo aan la aqoon, qaab natiijo oo aan la aqoon, isku-darka `--symptom` ama qaab aan la taageerin, ama rakibaad Cacti ah oo aan la heli karin. |

Cacti wuxuu kor u qaadaa `memory_limit` qoraal kasta oo CLI ah, sidaas darteed hubinta habaynta waqtiga orodka ee PHP waxay macno ku leedahay oo keliya bogga shabakadda.

## Hubinta jadwalsan iyo digniinaha

Hoosta **Configuration > Settings > Doctor**, daar **Run Checks on a Schedule** oo dooro muddo u dhaxaysa 15 daqiiqo ilaa maalin. Wareeg kasta oo poller ah oo waqtigiisu soo galo ka dib, Doctor wuxuu hubin kasta ku socodsiiyaa hannaan gadaal ka socda, si aanay u saamayn waqtiga uu poller-ku laftiisu ku ordo.

Orod kastaa wuxuu diiwaangeliyaa xaaladda la arkay ee hubin kasta. Ka-reebitaannada digniinta ee firfircoon waxay saameeyaan siyaasadda digniinaha iyagoon beddelin indho-indheyntaas. Marka hubini bilowdo ama joojiso guuldarrada, Doctor wuxuu isbeddelka ku qoraa diiwaanka Cacti, haddii **Alert Email Addresses** la dejiyayna, wuxuu iimayl u diraa cinwaannadaas isagoo adeegsanaya dejimaha boostada ee Cacti. **Alert on Warnings** wuxuu ku daraa isbeddellada lagu galo lagana baxo digniinaha. Orodka ugu horreeya wuxuu diiwaangeliyaa oo keliya cabbirka aasaasiga ah.

Warbixinaha jadwalsan waxay ku ordaan poller-ka koowaad iyagoo hoos imanaya quful la-talin xog-kaydiye waxayna leeyihiin xaddidaad shaqaale oo laba daqiiqo ah. Doctor wuxuu soo wargeliyaa bilowgii ugu dambeeyay iyo dhammaystirkii guuleystay si natiijooyinka maqan ama duugoobay ay u muuqdaan. Natiijooyinku waxay u xisaabsamaan kuwo cusub inta lagu jiro muddada u dhaxaysa oo lagu daray hal wareeg oo polling ah iyo saddex daqiiqo. Orod aan dhammaystirmin waxaa dib loogu celiyaa 5, 10, 20 daqiiqo iyo wax ka badan ka dib, ilaa muddada caadiga ah. Dirista digniinta ee guuldarraysatay waa la hayaa ilaa saddex isku-day oo dib-u-celin ah oo leh dib-u-dhacyo sii kordhaya; wixii intaas ka dambeeya, sax dejimaha boostada ee Cacti ka dibna socodsii `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` adigoo ah isticmaalaha poller-ka. Aqbalidda adeegaha boostadu ma xaqiijinayso inuu gaaray sanduuqa fariimaha.

Isla qaybtaas ayaa dejisa xadka waqtiga orodka poller-ka (80% muddada u dhaxaysa), booska disk-ga banaan ee RRA (digniin haddii uu ka hooseeyo 10%, guuldarro haddii uu ka hooseeyo 2%), leexashada saacadda xog-kaydiyaha (digniin haddii ay ka badato 5 ilbiriqsi, guuldarro haddii ay ka badato 60), iyo cabbirka diiwaanka Cacti (100 MB). Qiimayaasha madhan ama aan saxda ahayn waxay dib ugu noqdaan qiyaasahan caadiga ah.

## Isdhexgalka kormeerka

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` waxay daabacdaa hal sadar oo xaalad ah oo ay la socoto xogta waxqabadka waxayna ku baxdaa `0` (OK), `1` (WARNING), ama `2` (CRITICAL), si Nagios, Icinga, ama nidaam kasta oo la jaanqaadi kara ay toos ugu socodsiin karaan. `--format=prometheus` waxay qortaa qaabka qoraalka Prometheus ee loogu talagalay ururiyaha textfile-ka ee node_exporter: `cacti_doctor_check_status` hubin kasta (0 gudbid ama digniin la aqbalay, 1 digniin waxqabad u baahan, 2 guuldarro), `cacti_doctor_check_observed_status` ka hor ka-reebitaannada, `cacti_doctor_check_accepted`, `cacti_doctor_checks` xaalad kasta, iyo `cacti_doctor_last_run_timestamp_seconds`. Safafka hubinta JSON waxaa ku jira goob `assessment` ah; `not_assessed` waxay ka dhigan tahay in hubintu aysan go'aan ka gaari karin xogta la heli karo.

## Xirmada taageerada

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Xirmadu waa hal fayl oo qoraal ah oo ay ku jiraan noocyada Doctor, Cacti, PHP, OS, iyo xog-kaydiyaha, tirakoobka poller-ka iyo Boost, warbixinta oo dhammaystiran, wixii lifaaqyo xirmada taageerada ee ku-darrada ah ee ku hoos jira `== Plugin attachments`, iyo 200-kii sadar ee ugu dambeeyay ee diiwaanka Cacti. Qiimayaasha raaca magacyada password, secret, token, community, iyo key waa la qariyaa. Doctor wuxuu faylka u abuuraa qaab uu akhrisan karo mulkiilihiisa oo keliya wuuna diidaa inuu dul-qoro fayl hore u jiray. Dib u eeg ka hor intaadan meelna ku daabicin.

## Siyaasadda dayactirka

Doctor wuxuu leeyahay hal dayactir, `runtime_directories`. Wuxuu abuuraa galka hawlgalka Cacti ee maqan, wuxuuna ku daraa rukhsadaha akhrinta, qorista, iyo fulinta ee milkiilaha isaga oo aan ka saarin rukhsadaha jira.

Wuxuu beegsadaa `$cache_path`, `$log_path`, iyo `$rra_path` ee Cacti 1.3, ama galka `cache`, `log`, iyo `rra` ee rakibaadda haddii kale. Wuxuu ka boodaa galka mar hore la qori karo, wuu diidaa galka ka baxsan rakibaadda Cacti (sida galka diiwaanka ee hoos yimaada `/var/log`), wuu diidaa xiriiriyeyaasha astaamaha (symbolic links), wuuna diidaa inuu ku shaqeeyo root ahaan. Weligii ma raaco `path_cactilog`, sidaa darteed faylka diiwaanka ee lagu habeeyay galka koodhka dhexdiisa uma weecin karo dayactirka halkaas. Baaritaanku weli wuxuu hubiyaa galka faylka diiwaanka ee la habeeyay nooc kasta oo la soo saaro.

Ma beddelo lahaanshaha, ma fuliyo amarro shell ah, dib uma qoro qaabeynta, mana beddelo xogta barnaamijka Cacti. Dayactirrada cusub mid walba waa inuu lahaadaa baaritaan, maamule liiska oggolaanshaha ku jira (allow-listed handler), xaqiijin, diiwaangelin hanti-dhawr, iyo tijaabooyin.

## Baaritaanka calaamadaha

Hawlwadeennada iyo Maamulayaasha waxay ka dooran karaan **Investigate a symptom** bogga Doctor. Xeerarka la midka ah waxaa lagu heli karaa iyada oo loo marayo `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, ama `alerts_missing`, iyada oo leh soo-saaris qoraal ama JSON ah. Xirmooyinka taageerada waxaa ku jira baaritaannada calaamadaha ee khuseeya.

Musharrax kasta wuxuu taxaa hubinta la arkay iyo tallaabo xigta oo xaqiijin ah. Musharraxiintu waa mala-awaal, ma aha sababo asaasi ah oo la xaqiijiyay. Indho-indheyn maqan, aan la qiimeyn, ama duugowday weligood ma xaqiijiyaan sabab. Baaritaannada webka waxay adeegsadaan warbixinta rukhsadda lagu sifeeyay; warbixinnada CLI waxay adeegsadaan gelitaanka koontada nidaamka hawlgalka.

## Daraynimada cusboonaysiinta RRD

`filesystem.rrd_stale` wuxuu hubiyaa ilaa 500 oo ilo xog ah oo firfircoon, marka laga reebo aaladaha naafada ah iyo kuwa damiirsan. Rakibaadaha waaweyn muunaddu waxay isbeddeshaa saacad kasta, sidaa darteed socodsiinta soo noqnoqda waxay dabooshaa faylal kala duwan. Wuxuu barbar dhigaa waqtiyada wax-ka-beddelka faylka kan ugu weyn ee u dhexeeya muddada poller-ka, tallaabada RRD ee isha, iyo tallaabada astaanta, iyada oo lagu dhufto **RRD Stale Intervals** (caadigu waa 3). Wuxuu muujiyaa saddexda fayl ee ugu duugsan iyo tirada aaladaha ay saameysay. Natiijooyinka webka waxaa ku jira oo keliya aaladaha la oggol yahay.

`filesystem.rrd_files` waa hubin jiritaan oo gaar ah. Waxay ka raadisaa faylka RRD ilaa 5,000 oo ilo xog ah oo firfircoon, oo ay ku jiraan kuwa ku jira aaladaha naafada ah ama damiirsan, waxayna adeegsataa isla muunadda saacadlaha ah.

Boost wuxuu ku daraa laba jibbaar muddadiisa daadinta ee la habeeyay iyada oo ah oggolaansho qorista diskiga. Qoraa kale oo dib loo dhigay, ku habee **Deferred RRD Write Allowance (seconds)**. `RRDCACHED_ADDRESS` la xayeysiiyay oo aan lahayn oggolaansho, ama muddo Boost oo aan sax ahayn, wuxuu soo saaraa natiijo aan la qiimeyn. Doctor weligiis ma nadiifiyo cache si uu u fuliyo hubintan. Waqtiga wax-ka-beddelku waa caddayn dhaqdhaqaaq diski, ma aha caddayn ururin xog oo guuleysatay. Kaydinta dibadda ee Doctor uusan ogaan karin waa in si cad loo habeeyaa.

Faylasha maqan, aan la akhrin karin, iyo kuwa taariikhda mustaqbalka leh waxaa lagu tiriyaa faahfaahinta. Natiijadu waxay noqotaa mid aan la qiimeyn oo keliya marka aysan jirin wax fayl muunad ah oo la akhrin karo. Natiijo muunad ah waxay sheegtaa inay daboosho qayb ka mid ah rakibaadda oo keliya; gudubku ma daboolo faylasha aan muunadda lagu darin.

## Horudhaca dayactirka iyo taariikhda hanti-dhawrka

Bogga dayactirka ee Maamulaha wuxuu muujiyaa waddo kasta oo ay saameysay, tallaabada la soo jeediyay, rukhsadaha hadda jira iyo rukhsadaha la beegsanayo. Oggolaanshaha wuxuu ku xiran yahay horudhacaas, isticmaalaha wax qabanaya iyo muddo shan daqiiqo ah. Xaqiijintu waxay isticmaashaa horudhaca; nidaam faylal oo isbeddelay wuxuu u baahan yahay horudhac kale. Fulinta root ahaan, waddooyinka ka baxsan rakibaadda, xiriiriyeyaasha u baahan dayactir iyo rukhsadaha nidaamka faylasha oo aan buuxsamin waxay ka hortagaan oggolaanshaha.

`--repair=runtime_directories --preview` wuxuu daabacaa qorshe JSON oo akhris-keliya ah. `--repair=runtime_directories --yes` wuxuu oggolaadaa qorshe CLI oo si cusub loo xisaabiyay wuuna dib u hubiyaa ka hor fulinta. Koontada CLI waa inay mar horeba rukhsad u haysataa inay dayactirto rakibaadda; ma dhaxasho doorarka webka.

Diiwaan habaysan oo `repair.started` ah waa in la keydiyaa ka hor isbeddel kasta oo nidaamka faylasha ah. Diiwaan ku xiran oo `repair.completed` ah wuxuu ka kooban yahay sawirka dayactirka ka dib iyo natiijada xaqiijinta. Hawlgal go'ay wuxuu ka tagaa diiwaan bilowday si loo baaro. Fashilka hanti-dhawrka dhammaystirka waxaa loo sheegaa inuu yahay fashil xitaa haddii isbeddello nidaamka faylasha ah ay dhaceen. Doctor wuxuu ku daraa rukhsadaha milkiilaha wuxuuna abuuraa galal; iskuma dayo dib-u-celin otomaatig ah.

Maamulayaasha haysta rukhsadda Settings/System Utilities ee Cacti waxay ka akhrin karaan 20-kii gelitaan ee hanti-dhawrka ugu dambeeyay bogga Doctor. Plugin-ku wuxuu ku hayaa 200-kii diiwaan ee ugu dambeeyay `plugin_doctor_audit`; diiwaanka Cacti wuxuu sidoo kale qoraa aqoonsiyadooda, tallaabooyinkooda iyo jilayaashooda. Xogta hanti-dhawrka waa la qariyaa.

## Digniinaha la aqbalay

Maamulayaasha haysta rukhsadda Settings/System Utilities ee Cacti waxay ka abuuri karaan **Warning exception** digniin cusub oo la qiimeeyay oo ku taal bogga Doctor. Ka-reebitaanku wuxuu u baahan yahay milkiile, sabab iyo taariikh dib-u-eegis UTC ah oo ku jirta 90 maalmood gudahood. Wuxuu dhacaa saqda dhexe ee UTC bilowga taariikhdaas. Ilaa 100 ka-reebitaan ayaa la habeyn karaa. Liisku wuxuu soo bandhigaa gelitaannada dhacay iyo aqoonsiyada aan ku jirin warbixinta hadda jirta, wuxuuna oggolaadaa ka saarista.

Digniinta la arkay way muuqataa, iyada oo ay la socdaan milkiilaheeda, sababteeda iyo dhicitaankeeda oo ku jira faahfaahinta baaritaanka. JSON wuxuu hayaa xaaladda la arkay wuxuuna ku daraa xogta `accepted` iyo `acceptance`. Nagios wuxuu ka reebaa digniinaha firfircoon ee la aqbalay darnaanta bixitaankiisa laakiin wuxuu ku magacaabaa wax-soo-saarkiisa. Prometheus wuxuu dhoofiyaa labada darnaan ee la arkay iyo kuwa la fulin karo. Xaaladda bixitaanka caadiga ah ee CLI weli ma isbeddelin: digniinuhu mar horeba waxay ku baxaan eber, fashiladuna waxay ku baxaan hal.

Ogeysiisyada digniinta ee jadwalsan waa la joojiyaa inta ka-reebitaanku shaqeynayo; dhicitaanka ama ka saaristu waxay ka dhigtaa digniinta sii socota mid u qalanta ogeysiisyada digniinta mar kale. U-gudubka fashilka iyo ka-soo-kabashada fashilka waxay sii ahaanayaan kuwo u qalma ogeysiisyada. Natiijo aan la qiimeyn ama fashil lama aqbali karo. Aqoonsiga shakhsi ahaaneed wuu ka duwan yahay mana joojiyo waxba. Abuurista iyo ka saarista ka-reebitaanku waxay la falgalaan diiwaanka hanti-dhawrka.

Cusboonaysiintu waxay abuurtaa `plugin_doctor_audit` iyo `plugin_doctor_acceptance` iyada oo aan la beddelin xogta barnaamijka Cacti. Dhoofi taariikh kasta oo aad u baahan tahay ka hor intaadan ka saarin rakibaadda: ka saaristu waxay tirtirtaa labada miis ee plugin-ka iyo goobaha dejintiisa. Ku noqoshada faylasha plugin-ka waxay ka tagtaa miisaska kuwo diyaar u ah baaritaanka, laakiin noocyadii hore ma ixtiraamaan ka-reebitaanka digniinta.

## Hubinta ku-darrada (`doctor_register_checks`)

Ku-darrada Cacti ee shidan waxay ku biirin karaan hubinta ogaanshaha ee akhris-kaliya ah iyo lifaaqyada xirmada taageerada ee ikhtiyaariga ah iyagoo diiwaangelinaya qabsatada `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor wuxuu wacaa ku-darrada shidan ee aan ku dhex jirin nidaamka ee ka diiwaangashan `doctor_register_checks` (isagoo ka boodaya `doctor` iyo `cacti`), wuxuuna si adag uga dhex raadiyaa faylka qabsatada galka ku-darka laftiisa. Wicitaanka dib-u-celinta wuxuu helaa `['mode' => 'run' | 'list', 'plugin' => '<slug>']` wuxuuna soo celiyaa liis qeexayaal hubin ah ama baqshad leh `checks` iyo `attachments` ikhtiyaari ah:

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

Qeexaha hubinta ku-darka kasta waa la xaqiijiyaa ka hor inta aan lagu darin:

- Furayaasha loo baahan yahay: `id`, `plugin`, `category`, `title`, `status`, `message`, `details`, iyo `remediation`.
- `plugin` waa inuu la mid noqdaa magaca kooban ee ku-darka diiwaangashan (`[a-z0-9_]{1,64}`). `id` waa inuu waafaqaa `[a-z0-9_.]{1,128}`, ku bilaabmaa `<plugin>.`, mana isku dhici karo aqoonsi hubin oo aasaasi ah ama ku-dar horay u jiray.
- `status` waa inuu noqdaa `ok`, `warn`, `fail`, ama `info`. `ok` wuxuu u beddelmaa `pass` warbixinnada Doctor; `info` waa warbixin xogeed oo keliya mana keeno guuldarrooyinka CLI, Nagios, Prometheus, ama ogeysiisyada jadwalsan.
- `category` (ilaa 64 bytes) iyo `title` (ilaa 256 bytes) waa inay noqdaan qoraallo aan madhnayn oo aan lahayn xarfaha koontaroolka. `message` (aan madhnayn, ilaa 2048 bytes) iyo `remediation` (ilaa 2048 bytes) waa inay noqdaan qoraallo.
- `details` waxay aqbashaa qoraal (ilaa 8192 bytes) ama taxane scalar/gudaha isku jira (qoto dheer ugu badnaan 4, JSON-loo-codeeyay ilaa 16384 bytes; walxaha iyo ilaha waa la diidaa).
- Lifaaqyada xirmada taageerada ee ikhtiyaariga ah waxay u baahan yihiin `title` aan madhnayn (ilaa 128 bytes, oo aan lahayn xarfo koontarool) iyo qoraal `content` ah oo gaaraya ilaa 65536 bytes (64 KiB).

Doctor wuxuu dhaqan geliyaa xaddidaad ah 32 hubin iyo 8 lifaaq ku-dar kasta (wadarta 64 hubin ku-dar iyo 32 lifaaq). Qabsato kasta waxay ku dhex shaqeysaa xuduudkeeda `try`/`catch` si marka khaladaad ama xog aan taxane ahayn dhacaan loo qariyo looguna qoro diiwaanka Cacti (qaybta `DOCTOR`) iyadoon la saamayn hubinta aasaasiga ah ama ku-darrada kale. Qeexayaasha qaab-xun waa la diidaa waana la diiwaangeliyaa halka kuwa saxda ah ee isla ku-darka ka yimid ay sii shaqeeyaan. Hubinta ku-darrada had iyo jeer waa akhris-kaliya (`repairable: false`), qiimayaasha qoraalka ah iyo furayaasha xasaasiga ahna waa la qariyaa ka hor intaan la soo bandhigin, la dhoofin, ama la xirmoobin. Hubinta ku-darrada la xaqiijiyay waxay ka soo muuqataa UI-ga webka, natiijada CLI ee text/JSON/Nagios/Prometheus, la socoshada xaaladda jadwalsan, iyo xirmooyinka taageerada.

## Isdhexgalka MCP (`abilities_register`)

Doctor wuxuu diiwaangeliyaa qabsatada `abilities_register` (`doctor_abilities_register` oo ku jirta `doctor_abilities.php`) si `plugin_mcp` u helo awoodihiisa ogaanshaha marka labada ku-darba shidan yihiin. Doctor wuxuu diiwaangeliyaa qaybta `diagnostics` (`Diagnostics`) iyo laba awoodood oo akhris-kaliya ah, aan waxba burburin, isla markaana natiijo isku mid ah soo saara:

| Aqoonsiga awoodda | Qiyaasaha ikhtiyaariga ah | Natiijada |
|---|---|---|
| `doctor-run-checks` | `category` (qoraal, ugu badnaan 64 xaraf), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) iyo ilaa 256 `findings` oo la qariyay (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (qoraal, ugu badnaan 64 xaraf), `plugin` (qoraal, ugu badnaan 64 xaraf) | Ilaa 256 `checks` (`id`, `plugin`, `category`, `title`) oo daboolaya dhammaan 45 hubin ee ku dhex dhisan oo lagu daray hubinta ku-darrada shidan |

Labada awoodoodba si adag waa akhris-kaliya weligoodna ma fuliyaan dayactir. Marka lagu daro koontaroolka qaybta oggolaanshaha iyo soo-bandhigista awoodda ee `plugin_mcp` lafteeda (awoodaha ku-darku waxay ku bilowdaan kuwo ku qarsoon MCP ilaa maamule uu soo bandhigo), Doctor wuxuu u baahan yahay in milkiilaha calaamadda (token) uu haysto **Doctor Viewer** ama qayb oggolaansho oo Doctor ah oo ka sarraysa. `doctor-run-checks` waxay ku koobtaa `devices.health` aaladaha loo oggol yahay milkiilaha calaamadda, waxay ku dartaa `logging.recent_errors` oo keliya marka isticmaaluhu haysto qaybta oggolaanshaha Cacti 18 ama 19, way ka tagtaa `filesystem.rrd_files`, waxayna ku dartaa `filesystem.rrd_stale` ee ku xaddidan aaladaha kaliya **Doctor Operator** ama **Doctor Administrator**.

## Shuruudaha

| Cacti | PHP | Qoraallo |
|---|---|---|
| 1.2.20 | 5.4 ama ka cusub | Koodhka Doctor laftiisu wuxuu la jaanqaadaa PHP 5.4 si uu u baari karo nidaamyada duugga ah ka hor cusboonaysiinta |
| 1.2.31 | 8.0 ama ka cusub | `composer.json` ee Cacti wuxuu u baahan yahay `>=8.0` |
| 1.2.x ee hadda | 8.2 ama ka cusub | `composer.json` ee Cacti wuxuu u baahan yahay `>=8.2` |
| `develop` (1.3) | 8.3 ama ka cusub | `composer.json` ee Cacti wuxuu u baahan yahay `^8.3` |

Safku **PHP compatibility with installed Cacti** wuxuu barbar dhigaa nooca PHP ee shaqeynaya iyo shuruudda PHP ee ku jirta faylka xididka `composer.json` ee Cacti laftiisa, oo ay ku jirto xadka sare ee xayiraadda caret sida `^8.3`. Faylka fulinta PHP CLI ee la habeeyay waxaa lagu hubiyaa isla shuruuddaas. Doctor wuxuu aqoonsadaa qaababka xayiraadda `>=` iyo `^` ee ay adeegsadaan xirmooyinkan Cacti. Shuruud aan la akhrin karin, qaab xun, maqan, ama aan la aqoonsan waxay soo saartaa digniin; rakibaadaha Cacti 1.2.20–1.2.30 ee aan lahayn manifest waxay haystaan dabaqa rakibaha PHP 5.4 ee diiwaangashan. Iswaafajinta PHP 5.4 ee Doctor laftiisa ma xaqiijinayso iswaafajinta rakibaadda Cacti ee cusub.

Safku **PHP upstream security support** wuxuu ka jawaabaa su'aal gaar ah: laantaas sii-deynta PHP weli ma ka heshaa hagaajinta amniga mashruuca PHP? Wuxuu soo sheegaa taariikhda dhammaadka taageerada amniga ee la daabacay ee laanta wuxuuna digaa taariikhdaas ka dib. Tusaale ahaan, PHP 8.1 wuxuu buuxin karaa shuruudda waqtiga-shaqada ee rakibaadda Cacti ee duugga ah iyada oo aan mar dambe helin hagaajinta amniga ee isha sare. Natiijo gudubtay macnaheedu ma aha in sii-deynta balastarka ee rakiban ay tahay mid hadda ah, Doctor-na ma go'aamin karo haddii iibiyaha OS uu bixiyo hagaajin dib loo celiyay.

Taariikhaha taageerada waxaa lagu soo daray Doctor iyada oo laga soo qaatay [jadwalka taageerada PHP](https://www.php.net/supported-versions.php) iyo [liiska dhammaadka cimriga](https://www.php.net/eol.php), oo markii ugu dambeysay la hubiyay 2026-11-08. Laamaha aan la aqoon iyo kuwa horudhaca ah waxay soo saaraan digniin halkii laga filan lahaa gudub. Wax codsi shabakad ah lama sameeyo inta lagu jiro baaritaanka. Cusboonaysii xogta taageerada Doctor marka PHP ay daabacdo jadwal cusub. Aqoonsiyada JSON/la-socodka ee jira `php.version` iyo `php.security_baseline` waa kuwo aan isbeddelin.

## Horumarinta

Xirmada cutubka waxay adeegsataa Pest falanqaynta taaganna waxay adeegsataa PHPStan (heerka 6), labadubana waxay ku shaqeeyaan PHP 8.2 ama ka cusub:

```console
composer install
composer phpstan
composer test
```

Tijaabooyinku waxay ku beddelaan hawlaha Cacti ee Doctor uu waco kuwo yaryar oo beddel ah oo ku jira `tests/CactiStubs.php`, sidaa darteed waxay shaqeeyaan iyada oo aan lahayn rakibaadda Cacti.

GitHub Actions wuxuu fuliyaa shan nooc oo hubin ah riix kasta iyo codsi soo-jiidasho kasta:

- Tijaabooyinka heshiiska baakaynta sii-deynta (`tests/test_release.py`) iyo dhisidda kaydka (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, kaas oo ku fashilma qaab-dhismeed turjumaad oo duugowday, buug-yaraha aan dhammaystirnayn ama aan caddeyn, ama buug-yaraha la soo ururiyay oo ka duwan ishiisa.
- `php -l` fayl kasta oo PHP ah oo hoos yimaada PHP 5.4, 5.6, 7.0, 7.1, 7.4, iyo 8.0 ilaa 8.4.
- `composer phpstan` (PHPStan heerka 6) iyo `composer test` (xirmada cutubka ee Pest) ee PHP 8.2, 8.3, iyo 8.4.
- Toddoba shaqo oo isku-dhafan oo ku rakiba Cacti 1.2.20, laanta 1.2.x ee hadda jirta, iyo `develop` iyaga oo ka soo horjeeda MySQL iyo MariaDB, iyada oo lala adeegsanayo labadaba cmd.php iyo Spine. Shaqo kasta waxay rakibtaa oo awood siisaa plugin-ka, waxay fulisaa warbixinta CLI oo dhammaystiran, waxayna hubisaa qaab-dhismeedka warbixinta, wadarta guud ee kooban, xaaladaha la filayo, iyo kooxda saxda ah ee fashilada. Ka dib waxay jebisaa waddo binary ah iyo waqtiga poller-ka, waxay xaqiijisaa in labadaba la soo sheegay, way soo celisaa, waxay tijaabisaa dayactirka iyo xaqiijintiisa, waxayna fulisaa joojin, awood-siin, ka-saaris rakibaad, iyo dib-u-rakibid. Warbixinta JSON waxaa loo hayaa sidii shay marka shaqadu fashilanto.

## Ka Qaybqaadashada

Codsiyada jiidista (pull requests) waxay aadaan `develop`. Ku hay faylasha wax-soo-saarka kuwo la jaanqaadi kara PHP 5.4 oo adeegso qaabka Cacti: tabs, xadhko hal-xigasho leh, iyo caawiyeyaasha Cacti sida `read_config_option()` iyo `db_fetch_cell()`. Ku dar imtixaan halbeeg (unit test) isbeddel kasta oo dhaqan ah, saxeex ballanqaadyadaada (`git commit -s`), oo ku dar sadar `CHANGELOG.md`.

### Turjumaadaha

Ku duub farriin kasta oo u muuqata isticmaalaha `__('...', 'doctor')` (ama `__n()`, `__x()`, `__esc()`), oo sii jumlad ay ku jirto qiime hal xadhig qaabeyn ah oo leh boos-hayeyaal isku xiga `%s`/`%d` halkii aad isku xiri lahayd qaybo. Shaqada `__()` ee Cacti waxay qaabeysaa farriinta oo keliya marka ay ku jirto qeexaha qaabka mana taageerto qaababka booska leh ee `%1$s`. Waxay sidoo kale u beddeshaa `%%` una rogtaa `%` ka hor qaabeynta, sidaas darteed weligaa ha gelin calaamad boqolley ah oo toos ah farriin dhexdeeda: gudbi qiimaha iyo calaamaddiisa dood ahaan (`__('Usage: %s', '50%', 'doctor')`). Sadarrada diiwaanku (log lines) waxay ku hadhaan Ingiriisi: adeegso `doctor_repair_message()` qoraalka dayactirka iyo `doctor_n_()` farriimaha la diiwaangeliyo oo la turjumo oo keliya meesha lagu muujiyo. Ha turjumin aqoonsiyada hubinta, furayaasha JSON, ereyada muhiimka ah ee xaaladda, wax-soo-saarka kormeerka, iyo sadarrada diiwaanka.

`locales/build_gettext.sh` waxay dib u abuurtaa qaab-dhismeedka `locales/po/cacti.pot`, waxay ku biirisaa buug-yare kasta oo `locales/po/<locale>.po` ah, waxayna isku dubariddaa `locales/LC_MESSAGES/<locale>.mo`; wada ballanqaad (commit) saddexdaba. CI waxay socodsiisaa `sh locales/build_gettext.sh --check`, taas oo guuldarraysata marka qaab-dhismeedku duugoobo ama buug-yare ka maqnaado ama yeesho gelitaan mugdi ah (fuzzy), boos-haye uu kala duwanaado, ama fayl la isku dubariday uu waqtigiisu dhaco. Farriin la beddelay sidaas darteed waxay u baahan tahay in turjumaadaheeda lagu cusboonaysiiyo isla codsiga jiidista (pull request). Waxay u baahan tahay GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Luqad cusubi waa `<locale>.po` cusub oo loo magacaabo sida Cacti u magacowdo goobaheeda (tusaale ahaan `pt-BR`).

## Amniga

U soo sheeg dayacanka si qarsoodi ah sida ku cad [SECURITY.md](../../../SECURITY.md), ee ha ku soo sheegin arrimaha dadweynaha u furan.

## Shatiga

Xuquuqda daabacaadda (C) 2026 Thomas Vincent. Waxaa lagu sii daayay Shatiga Guud ee Dadweynaha ee GNU (GNU General Public License), nooca 2 ama wixii ka dambeeya. Eeg [LICENSE](../../../LICENSE).
