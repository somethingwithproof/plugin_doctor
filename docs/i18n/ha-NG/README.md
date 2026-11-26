<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: ƙayayyen shuka sanye da na'urar gwajin lafiya. Gano matsala. Gyara. Sa ido.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Matsayin Ƙofar Inganci"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lasisi: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ da 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor ƙari ne (plugin) na Cacti wanda ke gano matsalolin shigarwa a lokaci guda kuma yana yin ƙananan gyare-gyare ne kawai lokacin da mai gudanarwa ya buƙace su.

**Matsayi: ana ci gaba da haɓakawa, kafin 1.0.** Sakin baya-bayan nan shi ne [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Wannan gyaran yana ƙara kundin harsunan Hindi da Larabci da fassararrun jagororin mai amfani zuwa ga damar shiga ta matsayi, gano matsala da jagora, binciken sabuntar RRD mai iyaka, samfotin gyara da tarihin bincike, keɓancewar gargaɗin da aka amince da su, da fassarori a cikin 0.6.0. Duba [CHANGELOG.md](../../../CHANGELOG.md) don ƙarin bayani.

## Hotunan allo

Gwaje-gwajen gano matsala da saitunan tsara lokaci a cikin keɓantaccen shigarwar gwaji na Cacti 1.2.31 wanda ke aiki da PHP 8.3.36, gami da gwaje-gwajen dacewar PHP na Cacti, tallafin tsaro na asali, da lafiyar rumbun adana bayanai. Gargaɗi da gazawar da aka nuna a nan suna bayyana wannan yanayin gwajin ne.

![Teburin gano matsala na Doctor tare da sakamakon nasara, gargaɗi, da gazawa](../../screenshots/diagnostics.png)

![Saitunan tsara lokaci, faɗakarwa, da iyakoki na Doctor](../../screenshots/settings.png)

Matsalolin Cacti galibi suna bayyana ne a matsayin alamomi: jadawalan hoto marasa komai, mai tattara bayanai (poller) da ya tsaya, ƙari (plugin) da ya ƙi shiga. Dalilin sau da yawa shi ne wani buƙataccen sharadi da ya sauya, kamar ƙarin PHP da ya ɓace a cikin tsarin CLI, jakar rajista (log directory) da poller ba zai iya rubutawa ba, hanyar RRDtool da ke nuna kuskuren fayil ɗin aiki, ko rumbun adana bayanai ba tare da teburin yankin lokaci ba. Doctor yana bincika waɗannan buƙatun kai tsaye kuma yana ba da rahoton kowannensu a matsayin nasara (pass), gargaɗi (warn), ko gazawa (fail) tare da jimla da ke bayyana abin da ya gano. Ana samun wannan rahoto a shafin yanar gizo, a layin umarni, da kuma a matsayin JSON don sa ido.

## Abubuwan da yake bincikawa

| Fanni | Gwaje-gwaje |
|---|---|
| Doctor | Ko Doctor da kansa yana aiki a matsayin root, wanda zai sa binciken izini ya bayyana asusun da ba daidai ba |
| Cacti da PHP | Sigar Cacti, haɓakawa da mai sakawa bai taɓa kammalawa ba, ƙarin da aka kunna waɗanda fayilolinsu suka ɓace, dacewar PHP da kunshin Cacti da aka shigar, matsayin tallafin tsaro na asali na PHP |
| Ƙarin PHP | Ƙarin da ake buƙata a cikin PHP na yanar gizo da kuma a cikin CLI PHP da poller ke amfani da shi, haɗe da fasalolin da aka ba da shawarar |
| Saitin PHP | `memory_limit`, `max_execution_time`, da `date.timezone`, ta amfani da shawarwarin Cacti da kansa |
| Rumbun adana bayanai | Haɗi, sigar sabar idan aka kwatanta da shawarar Cacti, tsarin haruffa na UTF-8, teburan yankin lokaci, ainihin tebura, karkatar agogo daga kwamfutar PHP, da saitunan InnoDB da Cacti ke alamtawa a matsayin kurakurai |
| Lafiyar rumbun adana bayanai | Ƙarfin haɗi, karatun buffer-pool, teburan wucin gadi na diski, ƙirƙirar zare na haɗi (connection thread), umarnin da ke jinkiri, da jiran InnoDB log-buffer, tare da shawarwarin daidaitawa dangane da nauyin aiki |
| Tsarin fayiloli | Jakunkunan cache, log, da RRA masu iya rubutu; sarari don fayilolin RRD; maɓuɓɓugar bayanai masu aiki ba tare da fayil ɗin RRD ba ko sabunta fayil da ya wuce lokaci; `include/config.php` ba mai karantuwa ga kowa ba; rajistar Cacti mai iya rubutu kuma ba ta wuce kima ba |
| Fayilolin aiki | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, da Spine lokacin da shi ne poller da aka saita, gami da sigogin da Cacti ya bayyana |
| Rajista | Kurakurai a cikin layukan rajistar Cacti na baya-bayan nan, tare da saƙon da ya fi yawan faruwa |
| Na'urori | Na'urorin da aka kunna waɗanda suka daina aiki ko suke farfaɗowa, ukun da suka fi daɗewa a kashe tare da kuskurensu na ƙarshe, da gazawa lokacin da yawancin na'urori suka daina aiki lokaci guda |
| Poller | Nau'in poller da tazarar lokaci, lokacin da ya shuɗe tun lokacin da babban poller ya kammala aiki na ƙarshe, lokacin aiki idan aka kwatanta da tazarar, sakamakon poller da bai taɓa kai ga fayil ɗin RRD ba, poller na nesa da suka daina ba da rahoto, Boost da ya tsaya cak, da saitin Spine da ke nuna wani rumbun adana bayanai daban |

Kowane bincike yana da tabbataccen ID, kamar `database.timezone` ko `binary.rrdtool`, domin rubutun umarni (scripts) su iya dogaro da sakamako ɗaiɗai.

## Taswirar lambar aiki da gwaji

| Aiki | Aiwatarwa | Shaidar gwaji a cikin wannan ma'ajiya |
|---|---|---|
| Gwaje-gwajen gano matsala da tabbatattun ID na rahoto | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Damar shiga ta matsayi da rahotannin yanar gizo da aka rufe bayanai | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Binciken alamomin matsala da jagora | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Sabuntar RRD da sarrafa jinkirin rubutu | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Samfotin gyara, tarihin bincike, da gargaɗin da aka amince da su | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Gwaje-gwajen da aka tsara lokaci da sauye-sauyen faɗakarwa | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Waɗannan nassoshi suna bayyana aiwatarwa da yawan gwaje-gwajen da aka yi; ba sa nuna cewa kowane aikin CI ya ci nasara don sabon gyaran da ke yanzu. Bincika gudanarwar tsarin aiki (workflow run) don gyaran da kuke shirin turawa.

## Shawarwari kan lafiyar rumbun adana bayanai

Mai nazarin PHP na asali na Doctor yana karanta takamaiman rukunin ma'aunan MySQL ko MariaDB na duniya baki ɗaya ta hanyar haɗin rumbun adana bayanai na Cacti da ke akwai. Yana yin tambayoyi biyu na karatu kawai a kowane rahoto, baya buƙatar ƙarin bayanan shiga ko fayil ɗin aiki, kuma baya taɓa canza saitin rumbun adana bayanai. Waɗannan gwaje-gwajen suna bayyana a rahoton yanar gizo, CLI, JSON, sakamakon sa ido, kunshin tallafi, da bin diddigin matsayi da aka tsara lokaci.

| ID na bincike | Abin da ke tada bincike |
|---|---|
| `database.health_sample` | Kasa da sa'o'i 24 tun lokacin farawa ko `FLUSH STATUS`, ko rashin samun ko rashin daidaiton lokacin aiki (uptime) |
| `database.connection_capacity` | Haɗin da ke aiki yanzu ko mafi girman da aka rubuta aƙalla kashi 80% na `max_connections` na yanzu |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` aƙalla kashi 1%, tare da aƙalla buƙatun karatu 10,000 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` aƙalla kashi 25%, tare da aƙalla teburan wucin gadi 1,000 |
| `database.thread_cache` | `Threads_created / Connections` aƙalla kashi 5%, tare da aƙalla yunƙurin haɗi 1,000 da `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` aƙalla kashi 1%, tare da aƙalla umarni 1,000 |
| `database.redo_log_waits` | `Innodb_log_waits` wanda ba sifili ba |

Waɗannan su ne iyakokin bincike na Doctor, ba manufofin saitin mai ƙera ba. Ban da ƙarfin haɗi, shawarwarin da aka tara suna buƙatar tagar lura da ke sama. Ma'aunan da suka ɓace, marasa kyau, masu maimaitawa, ko waɗanda suka wuce kima, rashin isasshen aiki, da yanayin zare (thread modes) da ba a tallafawa suna haifar da gargaɗi maimakon hukuncin lafiya ko shawarar daidaitawa. Gargaɗi na iya shafar matsayin Nagios da faɗakarwar da aka tsara lokaci idan an kunna **Faɗakarwa kan Gargaɗi**.

Karanta ma'aunan da aka auna tare da shawarar. Ƙididdigar da aka tara ba ta tabbatar da nauyin aiki na yanzu ba; ma'aunai na iya samun tarihin sake saitawa daban-daban kuma ba hoto ne na lokaci guda ba. Mafi girman haɗi na iya nuna tsohon iyaka. Ƙididdigar tambayoyi masu jinkiri ta dogara da `long_query_time`, kuma ma'aunin teburan wucin gadi na diski na MySQL na iya tsallake fayilolin da aka taswira a ƙwaƙwalwa (memory-mapped). Ƙaramin rabo baya tabbatar da rashin cunkoso. Tabbatar da yanayin a ƙarƙashin nauyin aiki mai wakilta, duba tsare-tsaren tambayoyi da sake amfani da haɗi, kuma auna ƙwaƙwalwa a kan **kwamfutar rumbun adana bayanai** kafin canza buffers ko iyakokin haɗi.

Idan ba a samu ma'aunai ba, bincika tallafin sabar da ikon shigar asusun Cacti zuwa `SHOW GLOBAL STATUS` da `SHOW GLOBAL VARIABLES`; Doctor baya neman ƙarin ikon shiga mai girma. Ma'anar ma'aunai sun fito ne daga [littafin bayanin masu canjin matsayin MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) da [littafin bayanin masu canjin matsayin MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Ba a yi amfani da wani rubutu ko lambar MySQLTuner ba.

Ba a buƙatar ƙaurawar tsari (schema) ko saiti ba. Tura fayilolin ƙarin (plugin) kamar yadda aka saba; mayar da waɗannan fayilolin baya yana cire ƙarin gwaje-gwajen da aka ƙara. Ana sabunta matsayin da aka tsara lokaci da ke akwai a gudanarwa ta gaba.

## Yadda yake tabbatar da tsaro

Kayan aikin bincike yana aiki ne da haƙƙoƙin poller ko sabar yanar gizo kuma yana karanta hanyoyin fayiloli daga teburin saituna, don haka dole ne ya yi taka-tsantsan game da abin da yake aiwatarwa da abin da yake gyarawa.

- Bincike na karatu ne kawai. Ba ya taɓa canza fayiloli, saituna, ko bayanai.
- Doctor yana gudanar da shirin binary da aka saita ne kawai idan sunan fayil ɗinsa ya dace da shirin da ake tsammani (`php`, `rrdtool`, `snmpget`, ko `snmpwalk`). In ba haka ba, duk wanda ke da ikon rubutawa a teburin saituna zai iya zaɓar abin da Doctor zai gudanar. Duk wani suna daban ana ba da rahotonsa a matsayin gargaɗi kuma ba a aiwatar da shi.
- Doctor ba ya taɓa gudanar da shirye-shiryen binary da aka saita a matsayin root, kuma yana ba da rahoto idan yana aiki a matsayin root.
- Gyare-gyare suna fitowa ne daga keɓaɓɓen jerin izini. Kowannensu yana buƙatar matakin gudanarwa mai tantancewa a mahallin yanar gizo ko `--yes` a layin umarni, kuma ana rubuta kowannensu a cikin rajistar Cacti.

## Fitar da sabbin sigogi

Sigogi suna bin tsarin SemVer kuma sun dace da fayil ɗin `INFO` na plugin ɗin. Duba
[tsarin fitarwa](../../releasing.md) don zaɓin siga, matakan CI, abubuwan da ke cikin
kunshin, checksums, da umarnin mayar da baya.

## Girkawa

Sauke `doctor-VERSION.tar.gz` ko `doctor-VERSION.zip` da `SHA256SUMS` daga
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Tabbatar da SHA-256 checksum na rumbun fayil ɗin, sannan ka fitar da babban fayil ɗinsa na `doctor/` zuwa cikin
babban fayil ɗin `plugins/` na Cacti. Waɗannan su ne fakitin da za a iya girkawa; rumbunan tushe na
atomatik na GitHub suna da sunan babban fayil daban. Don gudanar da aikin da ba a fitar ba
daga `develop`, girka daga kwafin tushe.

Don kwafin tushe:

Yi clone ko warware ma'ajiyar lambar a matsayin `plugins/doctor` a cikin shigarwar Cacti. Dole ne sunan babban fayil ɗin ya kasance `doctor`, ba `plugin_doctor` ba.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Girka kuma kunna **Cacti Doctor** daga **Configuration > Plugin Management**, sannan ka ba da ikon **Doctor Viewer**, **Doctor Operator**, ko **Doctor Administrator** ta hanyar izinin mai amfani ko rukuni na Cacti. Izinin **Cacti Doctor** da ke akwai yana riƙe da damar Administrator bayan haɓakawa. Rahoton yana bayyana a ƙarƙashin **Utilities > Cacti Doctor**.

## Harsuna

Doctor yana zuwa tare da fassarori zuwa Sifaniyanci (Spain, `es-ES`), Faransanci (`fr-FR`), Jamusanci (`de-DE`), Sinanci mai Sauƙi (`zh-CN`), Hindiyanci (`hi-IN`), Larabci (`ar-SA`), da Jafananci (`ja-JP`). Cacti yana nuna su da zarar an kunna tallafin harshe (**Configuration > Settings > General > Language Support**) kuma mai amfani ya zaɓi harshen. Shafin yanar gizon, saitunan, da saƙonni da rubutun rahoto da layin umarni ke bugawa suna bin harshen Cacti; rahoton layin umarni da kansa yana amfani da tsohon harshen Cacti, wanda ke zama Turanci sai dai idan ka canza shi.

Ba a taɓa fassara fitowar da na'ura ke karantawa: lambobin bincike, maɓallan JSON da ƙimomin matsayi, fitowar `--format=nagios` da `--format=prometheus`, layukan rajista, da kanun sassan kunshin tallafi suna kasancewa cikin Turanci domin rubutun umarni da sa ido su ci gaba da aiki a kowane harshe. Rubutun `summary` da `detail` na kowane bincike shi ne kaɗai ɓangaren da aka fassara na rahoton JSON.

Fayil ɗin fassarar Sifaniyanci na Latin Amurka (`es-419`) shima yana tare da shi, amma babu ko Cacti 1.2 ko Cacti 1.3 da ke da zaɓin harshen Sifaniyanci na Latin Amurka, don haka zai yi aiki ne kawai idan Cacti ya ƙara shi. Har zuwa lokacin, zaɓi Sifaniyanci (`es-ES`).

Cacti yana loda kundin fassarar plugin daga `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` tare da `doctor` a matsayin text domain, a kan 1.2.x da 1.3 baki ɗaya (1.3 yana gano babban fayil ɗin plugin ta hanyar hanyar plugins da za a iya saita ta).

## Matakan shiga

| Yanki | Ayyuka |
|---|---|
| Doctor Viewer | Karanta matsayin binciken da aka tsara na baya-bayan nan, lokacin lura, sabunta da tarihin jimillar kwanan nan. Babu umarnin bincike, cikakkun bayanai na asali, saiti ko gyare-gyare. |
| Doctor Operator | Gudanar da rahoton bincike tare da iyakar aiki na daƙiƙa 120, duba cikakkun bayanai da aka rufe sirrinsu, da amincewa da sakamakon bincike. Babu canza saituna ko gyare-gyare. |
| Doctor Administrator | Ayyukan Operator tare da gyare-gyaren da ke cikin jerin izini da saitunan Doctor. Gyare-gyare da saituna suna buƙatar yankin Settings/System Utilities na Cacti shima. |

Kundin Utilities yana buɗe shafin mafi girman yankin Doctor da aka ba mai amfani, haɗe da izinin rukuni. Sabbin yankunan Viewer da Operator ba sa samun izini ta atomatik. Asalin lambar yanki yana nan a haɗe da `doctor.php` a matsayin Administrator, yana kiyaye damar masu amfani da rukuni da ke akwai.

Bayanan Viewer suna fitowa ne daga binciken da aka tsara. Kunna tsara jadawalin bincike kafin bayar da damar Viewer; abubuwan lura da suka ɓace ko suka wuce lokaci suna nuna **unknown**, ba lafiya lau ba. Tarihi yana riƙe ƙididdigar jimillar da aka tsara guda 20 na ƙarshe kuma yana cire matsayin na'ura. Operators suna fara sabon bincike a sarari; sabunta shafi na yau da kullun yana amfani da rahoton ƙarshe na zamansu.

Cikakkun bayanai na na'ura da jimla suna amfani da izinin na'ura na mai amfani na yanzu. Ɓangarorin rajista kuma suna buƙatar yankin Log Administration na Cacti. Ana rufe sirrika kafin a adana cikakkun bayanai na bincike a cikin zaman yanar gizo ko a nuna su. Shigar CLI tana ci gaba da kasancewa ƙarƙashin asusun tsarin aiki.

Amincewa da sakamakon bincike na mutum ɗaya ne kuma ana rubuta shi a cikin rajistar Cacti. Yana aiki ne kawai ga sakamako da shaida iri ɗaya; shaidar da ta canza tana buƙatar sabon amincewa. Ba sa taɓa canza matsayin wucewa/gargaɗi/gazawa, danne faɗakarwa, ko nuna binciken da ya gaza a matsayin lafiya lau. Wannan ya bambanta da keɓancewar gargaɗin da aka karɓa, wanda ke shafar tsarin faɗakarwa ba tare da canza matsayin da aka lura ba kuma an bayyana shi a ƙasa.

Kowane mataki yana buƙatar POST da ingantaccen alamar CSRF. Gyare-gyare suna nuna shafin tabbatarwa daban tare da mahaɗin Cancel wanda ba ya aikawa da saƙo, kuma suna rubuta mai amfani da ya yi aikin da sakamakon a cikin rajistar Cacti.

## Layin umarni

Gudanar da waɗannan daga tushen Cacti a matsayin mai amfani na poller na Cacti, ba root ba:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Fitowar rubutu tana buga layi ɗaya ga kowane bincike tare da matsayinsa, rukuninsa, taƙaitawarsa, da cikakken bayaninsa. `--json` yana buga abin `summary` tare da ƙididdigar matsayi da jerin `checks` wanda bayanansa ke ɗauke da `id`, `category`, `status`, `summary`, `detail`, da `repair`/`repairable` lokacin da gyaran da ke cikin jerin izini ya shafi.

| Matsayin fita | Ma'ana |
|---|---|
| `0` | Babu wani bincike da ya gaza, ko kuma gyaran da aka nema ya yi nasara. Gargaɗi ba ya canza matsayin fita. |
| `1` | Aƙalla bincike ɗaya ya gaza, ko kuma gyaran da aka nema bai yi nasara ba. |
| `2` | Kuskuren amfani: gudanar da gyara ba tare da `--yes` ba (`--preview` ba ya buƙatarsa), lambar gyara da ba a sani ba, tsarin fita da ba a sani ba, haɗin `--symptom` ko tsarin da ba a tallafawa ba, ko shigarwar Cacti da ba za a iya gano inda take ba. |

Cacti yana ƙara `memory_limit` ga kowane rubutun CLI, don haka binciken saitin lokacin gudanarwa na PHP yana da ma'ana ne kawai a shafin yanar gizo.

## Binciken da aka tsara da faɗakarwa

A ƙarƙashin **Configuration > Settings > Doctor**, kunna **Run Checks on a Schedule** sannan ka zaɓi tazarar lokaci daga mintuna 15 zuwa kwana ɗaya. Bayan kowane zagayen poller da lokacinsa ya yi, Doctor yana gudanar da kowane bincike a cikin tsari na baya, don haka lokacin gudanarwar poller da kansa ba ya samun tasiri.

Kowane gudanarwa yana rubuta matsayin da aka lura na kowane bincike. Keɓancewar gargaɗi masu aiki suna shafar tsarin faɗakarwa ba tare da canza wannan lura ba. Lokacin da bincike ya fara ko ya daina gazawa, Doctor yana rubuta canjin a cikin rajistar Cacti kuma, idan an saita **Alert Email Addresses**, yana aika imel zuwa waɗannan adiresoshin ta hanyar saitunan imel na Cacti. **Alert on Warnings** yana ƙara canje-canje na shiga da fita daga gargaɗi. Gudanarwa na farko yana rubuta matakin farko ne kawai.

Rahotannin da aka tsara suna aiki ne a kan babban poller ƙarƙashin kullewar shawarar rumbun bayanai kuma suna da iyakar aiki na mintuna biyu. Doctor yana ba da rahoton farawa da kammala nasara na ƙarshe domin sakamakon da ya ɓace ko ya tsufa ya bayyana. Sakamako yana ƙidaya a matsayin na yanzu na tsawon tazarar lokacin tare da zagayen poller ɗaya da mintuna uku. Gudanarwar da ba ta kammala ba ana sake gwada ta bayan mintuna 5, 10, 20 da ƙari, har zuwa tazarar lokaci ta yau da kullun. Isar da faɗakarwar da ta gaza ana ajiye ta don sake gwadawa har sau uku tare da ƙaruwar jinkiri; bayan haka, gyara saitunan imel na Cacti sannan ka gudanar da `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` a matsayin mai amfani na poller. Karɓar saƙo daga sabar imel ba ya tabbatar da isarsa cikin akwatin saƙo.

Wannan shafin shima yana saita iyakoki don lokacin gudanarwar poller (80% na tazarar lokaci), sararin diski na RRA (gargaɗi ƙasa da 10%, gazawa ƙasa da 2%), karkatar agogon rumbun bayanai (gargaɗi sama da daƙiƙa 5, gazawa sama da 60), da girman rajistar Cacti (100 MB). Ƙimomi marasa komai ko marasa inganci suna komawa zuwa waɗannan tsoffin ƙimomin.

## Haɗawa da tsarin sa ido

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` yana buga layin matsayi guda ɗaya tare da bayanan aiki kuma yana fita da `0` (OK), `1` (WARNING), ko `2` (CRITICAL), domin Nagios, Icinga, ko duk wani tsari mai dacewa ya iya gudanar da shi kai tsaye. `--format=prometheus` yana rubuta tsarin rubutun Prometheus don mai tattara fayilolin rubutu na node_exporter: `cacti_doctor_check_status` ga kowane bincike (0 wucewa ko gargaɗin da aka karɓa, 1 gargaɗin da ke buƙatar mataki, 2 gazawa), `cacti_doctor_check_observed_status` kafin keɓancewa, `cacti_doctor_check_accepted`, `cacti_doctor_checks` ga kowane matsayi, da `cacti_doctor_last_run_timestamp_seconds`. Layukan bincike na JSON sun haɗa da filin `assessment`; `not_assessed` yana nufin binciken bai iya kaiwa ga yanke shawara ba daga bayanan da ke akwai.

## Kunshin tallafi

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Kunshin fayil ɗin rubutu ne guda ɗaya mai ɗauke da sigogin Doctor, Cacti, PHP, OS, da rumbun bayanai, ƙididdigar poller da Boost, cikakken rahoto, da layuka 200 na ƙarshe na rajistar Cacti. Ana rufe ƙimomin da ke biye da sunayen password, secret, token, community, da key. Doctor yana ƙirƙirar fayil ɗin ya zama mai shi ne kaɗai zai iya karantawa kuma yana ƙin rubutawa a kan fayil ɗin da ke akwai. Duba shi kafin ka wallafa shi a ko'ina.

## Manufar gyara

Doctor ya haɗa da gyara guda ɗaya, `runtime_directories`. Yana ƙirƙirar kundayen adana bayanai na lokacin gudu na Cacti da suka ɓace kuma yana ƙara izinin karatu, rubutu, da aiwatarwa ga mai mallaka ba tare da cire izinin da ke akwai ba.

Yana nufin `$cache_path`, `$log_path`, da `$rra_path` a kan Cacti 1.3, ko kuma kundayen adana bayanai na `cache`, `log`, da `rra` na shigarwar a sauran lokuta. Yana tsallake kundayen adana bayanai da za a iya rubutu a cikinsu tuni, yana ƙin kundayen adana bayanai da ke wajen shigarwar Cacti (kamar kundin rajista a ƙarƙashin `/var/log`), yana ƙin hanyoyin haɗi na alama (symbolic links), kuma yana ƙin gudu a matsayin root. Ba ya taɓa bin `path_cactilog`, don haka fayil ɗin rajista da aka saita a cikin kundin lamba ba zai iya karkatar da gyaran zuwa can ba. Binciken har yanzu yana duba kundin fayil ɗin rajista da aka saita a kowace fitowa.

Ba ya canza mallaka, ko gudanar da umarnin shell, ko sake rubuta saiti, ko gyara bayanan manhajar Cacti. Sabbin gyare-gyare dole ne kowannensu ya haɗa da bincike, mai sarrafawa da aka amince da shi a jerin izini, tabbatarwa, rajistar binciken ayyuka, da gwaje-gwaje.

## Binciken alamomi

Masu aiki (Operators) da Masu gudanarwa (Administrators) za su iya zaɓar **Investigate a symptom** a shafin Doctor. Waɗannan dokokin suna samuwa ta hanyar `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, ko `alerts_missing`, tare da fitowar rubutu ko JSON. Fakitin tallafi sun haɗa da binciken alamomi masu dacewa.

Kowane zaɓi yana jera binciken da aka lura da kuma matakin tabbatarwa na gaba. Zaɓuɓɓukan hasashe ne, ba tabbatattun tushen dalilai ba. Abubuwan lura da suka ɓace, waɗanda ba a tantance ba ko waɗanda suka tsufa ba sa tabbatar da dalili. Binciken yanar gizo yana amfani da rahoton da aka tace bisa izini; rahotannin CLI suna amfani da damar asusun tsarin aiki.

## Sabuntar bayanan RRD

`filesystem.rrd_stale` yana duba har zuwa tushen bayanai masu aiki 500, banda na'urorin da aka kashe ko waɗanda ba sa aiki. A kan manyan shigarwa samfurin yana canzawa kowace awa, don haka maimaita gudu yana ɗaukar fayiloli daban-daban. Yana kwatanta lokutan gyaran fayil da mafi girma tsakanin tazarar poller, matakin RRD na tushe da matakin bayanin martaba, wanda aka ninka da **RRD Stale Intervals** (na asali 3). Yana nuna fayiloli uku mafi tsufa waɗanda ba a sabunta su ba da kuma adadin na'urorin da abin ya shafa. Sakamakon yanar gizo ya haɗa da na'urorin da aka ba da izini kawai.

`filesystem.rrd_files` bincike ne daban na samuwar fayil. Yana neman fayil ɗin RRD na har zuwa tushen bayanai masu aiki 5,000, har da waɗanda ke kan na'urorin da aka kashe ko waɗanda ba sa aiki, kuma yana amfani da samfurin awa ɗaya iri ɗaya.

Boost yana ƙara ninki biyu na tazarar fitar da bayanai (flush interval) da aka saita a matsayin izinin jinkirin rubutu zuwa faifai. Don wani marubucin da aka jinkirta, saita **Deferred RRD Write Allowance (seconds)**. `RRDCACHED_ADDRESS` da aka tallata ba tare da izinin jinkiri ba, ko tazarar Boost mara inganci, yana haifar da sakamakon da ba a tantance ba. Doctor ba ya taɓa share cache don yin wannan binciken. Lokacin gyara shaida ce ta aikin faifai, ba hujjar nasarar tattara bayanai ba. Cache na waje wanda Doctor ba zai iya ganowa ba dole ne a saita shi a sarari.

Ana ƙirga fayilolin da suka ɓace, waɗanda ba za a iya karantawa ba da masu kwanan wata na gaba a cikin cikakken bayani. Sakamakon yana zama wanda ba a tantance ba kawai idan babu fayil ɗin da aka ɗauka a samfuri da za a iya karantawa. Sakamakon samfuri yana nuna cewa yana ɗaukar wani ɓangare na shigarwar ne kawai; cin nasara ba ya ƙunsar fayilolin da ba a ɗauka a samfuri ba.

## Samfuran gyara da tarihin binciken ayyuka

Shafin gyara na Mai gudanarwa yana nuna kowace hanya da abin ya shafa, matakin da aka ba da shawarar ɗauka, izinin yanzu da izinin da ake nufi. Amincewa tana da alaƙa da wannan samfurin, mai amfani da ke aiki da kuma tsawon lokacin minti biyar. Tabbatarwa tana amfani da samfurin; tsarin fayilolin da aka canza yana buƙatar wani samfurin. Gudanarwa a matsayin root, hanyoyin da ke wajen shigarwar, hanyoyin haɗi da ke buƙatar gyara da izinin tsarin fayilolin da ba a cika su ba suna hana amincewa.

`--repair=runtime_directories --preview` yana buga shirin JSON na karatu-kawai. `--repair=runtime_directories --yes` yana amincewa da shirin CLI da aka ƙididdige sabo kuma yana sake duba shi kafin aiwatarwa. Dole ne asusun CLI ya riga ya sami izinin gyara shigarwar; ba ya gadon matsayin yanar gizo.

Dole ne a adana tsararren bayanin `repair.started` kafin kowane canjin tsarin fayiloli. Bayanin `repair.completed` mai alaƙa ya ƙunshi hoton bayan-gyara da sakamakon tabbatarwa. Aikin da aka katse yana barin bayanin da aka fara don bincike. Ana ba da rahoton gazawar rajistar kammalawa a matsayin gazawa ko da canje-canjen tsarin fayiloli sun faru. Doctor yana ƙara izinin mai mallaka kuma yana ƙirƙirar kundayen adana bayanai; ba ya ƙoƙarin mayarwa zuwa baya ta atomatik.

Masu gudanarwa masu izinin Settings/System Utilities na Cacti za su iya karanta shigarwar binciken ayyuka 20 na baya-bayan nan a shafin Doctor. Plugin ɗin yana riƙe bayanai 200 na baya-bayan nan a cikin `plugin_doctor_audit`; rajistar Cacti ita ma tana adana ID ɗinsu, ayyukansu da waɗanda suka aiwatar. Ana ɓoye bayanan sirri a cikin bayanan binciken ayyuka.

## Gargaɗin da aka amince da su

Masu gudanarwa masu izinin Settings/System Utilities na Cacti za su iya ƙirƙirar **Warning exception** daga sabon gargaɗi da aka tantance a shafin Doctor. Keɓancewa tana buƙatar mai mallaka, dalili da ranar dubawa ta UTC cikin kwanaki 90. Yana ƙarewa da tsakar dare na UTC a farkon wannan ranar. Za a iya saita har zuwa keɓancewa 100. Jerin yana nuna shigarwar da suka ƙare da ID ɗin da ba sa cikin rahoton yanzu, kuma yana ba da damar cirewa.

Gargaɗin da aka lura yana ci gaba da kasancewa a bayyane, tare da mai mallakarsa, dalili da lokacin ƙarewa a cikin cikakkun bayanai na bincike. JSON yana riƙe matsayin da aka lura kuma yana ƙara bayanan metadata na `accepted` da `acceptance`. Nagios yana cire gargaɗin da aka amince da su masu aiki daga tsananin fitowarsa amma yana ambaton su a cikin fitowarsa. Prometheus yana fitar da duka tsananin da aka lura da wanda ke buƙatar mataki. Matsayin fita na CLI na yau da kullun ba ya canzawa: gargaɗi tuni yana fita da sifili, gazawa tana fita da ɗaya.

Ana dakatar da faɗakarwar gargaɗi da aka tsara yayin da keɓancewar ke aiki; ƙarewa ko cirewa yana sake sa gargaɗin da ke ci gaba ya cancanci faɗakarwar gargaɗi. Canjin gazawa da farfaɗowa daga gazawa suna ci gaba da cancantar faɗakarwa. Ba za a iya amincewa da sakamakon da ba a tantance ba ko gazawa ba. Amincewa ta sirri daban take kuma ba ta dakatar da komai. Ƙirƙirar keɓancewa da cirewa suna gudana a cikin ma'amala ɗaya tare da bayanin binciken ayyuka.

Haɓakawa yana ƙirƙirar `plugin_doctor_audit` da `plugin_doctor_acceptance` ba tare da canza bayanan manhajar Cacti ba. Fitar da duk wani tarihin da kuke buƙata kafin cirewa: cirewa yana share duka teburan plugin ɗin da saitunansa. Mayar da fayilolin plugin ɗin baya yana barin teburan don bincike, amma tsofaffin sigogi ba sa mutunta keɓancewar gargaɗi.

## Buƙatu

| Cacti | PHP | Bayanan kula |
|---|---|---|
| 1.2.20 | 5.4 ko sabo | Lambar Doctor kanta tana dacewa da PHP 5.4 don haka tana iya bincikar tsofaffin tsaruka kafin haɓakawa |
| 1.2.31 | 8.0 ko sabo | Fayil ɗin `composer.json` na Cacti yana buƙatar `>=8.0` |
| 1.2.x na yanzu | 8.2 ko sabo | Fayil ɗin `composer.json` na Cacti yana buƙatar `>=8.2` |
| `develop` (1.3) | 8.3 ko sabo | Fayil ɗin `composer.json` na Cacti yana buƙatar `^8.3` |

Layin **PHP compatibility with installed Cacti** yana kwatanta sigar PHP da ke gudana da buƙatar PHP a cikin ainihin `composer.json` na Cacti, gami da iyakar sama na takunkumin caret kamar `^8.3`. Ana duba fayil ɗin aiwatarwa na PHP CLI da aka saita a kan wannan buƙatar. Doctor yana gane nau'ikan takunkumin `>=` da `^` da waɗannan fakitin Cacti ke amfani da su. Buƙatar da ba za a iya karantawa ba, mara kyau, wadda ta ɓace, ko wadda ba a gane ta ba tana haifar da gargaɗi; shigarwar Cacti 1.2.20–1.2.30 ba tare da manifest ba suna riƙe mafi ƙarancin mai sakawa na PHP 5.4 da aka rubuta. Dacewar Doctor kanta da PHP 5.4 ba ta tabbatar da dacewa da sabuwar shigarwar Cacti ba.

Layin **PHP upstream security support** yana amsa wata tambaya daban: shin wannan reshen fitowar PHP har yanzu yana samun gyaran tsaro daga aikin PHP? Yana ba da rahoton ranar ƙarewar tallafin tsaro da aka wallafa na reshen kuma yana yin gargaɗi bayan wannan ranar. Misali, PHP 8.1 zai iya cika buƙatar lokacin gudu na tsohuwar shigarwar Cacti yayin da ba ya ƙara samun gyaran tsaro na tushe. Sakamakon cin nasara ba yana nufin sigar gyara da aka shigar sabuwa ba ce, kuma Doctor ba zai iya sanin ko mai siyar da tsarin aiki yana ba da gyare-gyaren da aka mayar baya ba.

An haɗa kwanakin tallafi tare da Doctor daga [jadawalin tallafin PHP](https://www.php.net/supported-versions.php) da [jerin ƙarewar rayuwa](https://www.php.net/eol.php), wanda aka duba a ƙarshe a ranar 2026-11-08. Rassan da ba a sani ba da sigogin kafin fitowa suna haifar da gargaɗi maimakon ɗaukar cewa sun ci nasara. Ba a yin kowace buƙatar hanyar sadarwa yayin bincike. Sabunta bayanan tallafi na Doctor lokacin da PHP ya wallafa sabon jadawali. ID ɗin JSON/sa ido na yanzu `php.version` da `php.security_baseline` ba su canza ba.

## Haɓakawa

Jerin gwajin raka'a yana amfani da Pest kuma yana gudana a kan PHP 8.2 ko sabo:

```console
composer install
composer test
```

Gwaje-gwajen suna maye gurbin ayyukan Cacti da Doctor ke kira da ƙananan madadai a cikin `tests/CactiStubs.php`, don haka suna gudana ba tare da shigarwar Cacti ba.

GitHub Actions yana gudanar da nau'ikan bincike huɗu a kan kowane push da pull request:

- `php -l` a kan kowane fayil ɗin PHP a ƙarƙashin PHP 5.4, 5.6, 7.0, 7.1, 7.4, da 8.0 zuwa 8.4.
- Jerin gwajin raka'a a kan PHP 8.2, 8.3, da 8.4.
- `locales/build_gettext.sh --check`, wanda ke gaza a kan tsohon samfurin fassara, kundin fassara mara cika ko mara tabbas (fuzzy), ko kundin fassara da aka haɗa wanda ya bambanta da tushensa.
- Ayyukan haɗin gwiwa bakwai waɗanda ke shigar da Cacti 1.2.20, reshen 1.2.x na yanzu, da `develop` akan MySQL da MariaDB, tare da duka cmd.php da Spine. Kowane aiki yana shigarwa da kunna plugin ɗin, yana gudanar da cikakken rahoton CLI, kuma yana duba tsarin rahoton, jimlar taƙaitawa, matsayin da ake tsammani, da ainihin jerin gazawa. Sannan yana karya hanyar binary da tambarin lokacin poller, yana tabbatar da cewa an ba da rahoton duka biyun, yana mayar da su, yana gwada gyaran da tabbatarwarsa, kuma yana gudanar da kashewa, kunnawa, cirewa, da sake shigarwa. Ana adana rahoton JSON a matsayin artifact lokacin da aiki ya gaza.

## Ba da Gudummawa

Ana tura pull requests zuwa `develop`. A tabbatar fayilolin samarwa sun dace da PHP 5.4 kuma a yi amfani da salon Cacti: tabs, igiyoyin rubutu masu alamar zance guda, da ayyukan taimako na Cacti kamar `read_config_option()` da `db_fetch_cell()`. A ƙara gwajin naúrar (unit test) ga kowane canjin aiki, a sanya hannu a kan commits (`git commit -s`), sannan a ƙara layi zuwa `CHANGELOG.md`.

### Fassarori

Rufe kowane saƙon da mai amfani zai gani cikin `__('...', 'doctor')` (ko `__n()`, `__x()`, `__esc()`), kuma a ba wa jimlar da ke ɗauke da ƙima tsarin rubutu guda ɗaya mai masu riƙe wuri masu bin juna `%s`/`%d` maimakon haɗa sassa. Aikin `__()` na Cacti yana tsara saƙo ne kawai idan yana ɗauke da mai tantance tsari kuma baya goyon bayan sifofin matsayi `%1$s`. Haka kuma yana mayar da `%%` zuwa `%` kafin tsarawa, don haka kada a taɓa sanya alamar kashi na zahiri a cikin saƙo: a aika ƙimar tare da alamarta a matsayin hujja (`__('Usage: %s', '50%', 'doctor')`). Layukan log suna zama cikin Turanci: a yi amfani da `doctor_repair_message()` don rubutun gyara da `doctor_n_()` don saƙonnin da aka rubuta a log kuma aka fassara su ne kawai inda aka nuna su. A bar IDs na dubawa, maɓallan JSON, kalmomin matsayi, fitowar sa ido, da layukan log ba tare da an fassara su ba.

`locales/build_gettext.sh` yana sake ƙirƙirar samfurin `locales/po/cacti.pot`, yana haɗa shi cikin kowane kundin `locales/po/<locale>.po`, kuma yana tattara `locales/LC_MESSAGES/<locale>.mo`; a yi commit na duk ukun. CI tana gudanar da `sh locales/build_gettext.sh --check`, wanda ke gaza lokacin da samfurin ya tsufa ko kundi ya rasa wani shigarwa ko yana da shigarwa mara tabbas (fuzzy entry), mai riƙe wuri ya bambanta, ko fayil ɗin da aka tattara ya tsufa. Saboda haka, saƙon da aka canza yana buƙatar a sabunta fassarorinsa a cikin pull request ɗin guda. Yana buƙatar GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Sabon yare sabon `<locale>.po` ne da aka sanya wa suna kamar yadda Cacti ke sanya sunan yarukansa (misali `pt-BR`).

## Tsaro

A ba da rahoton raunin tsaro a keɓe kamar yadda aka bayyana a cikin [SECURITY.md](../../../SECURITY.md), ba a cikin batutuwan jama'a ba.

## Lasisi

Haƙƙin mallaka (C) 2026 Thomas Vincent. An sake shi a ƙarƙashin GNU General Public License, sigar 2 ko na gaba. Duba [LICENSE](../../../LICENSE).
