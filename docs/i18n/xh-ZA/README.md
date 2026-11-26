<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: ikhaktasi enxibe istethoskophu. Xilonga. Lungisa. Beka iliso.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Imeko yeSango loMgangatho"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Ilayisensi: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ kunye ne-1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

ICacti Doctor yiplagini yeCacti exilonga ufakelo kanye ngexesha elinye kwaye isebenzise ulungiso oluncinci kuphela xa umlawuli elucelile.

**Imeko: isaphuhliswa, phambi kuka-1.0.** Ukhupho lwamva nje ngu-[0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Olu lungiso longeza iikhathalogu zesiHindi nesiArabhu kunye nezikhokelo zomsebenzisi eziguqulelweyo kufikelelo olusekelwe kwindima, uxilongo olukhokelwayo, ukuhlolwa kobuchwephesha be-RRD obunomda, ukujongwa kwangaphambili kolungiso kunye nembali yophicotho, izithintelo zezilumkiso ezamkelweyo, kunye neenguqulelo eziku-0.6.0. Jonga ku-[CHANGELOG.md](../../../CHANGELOG.md) ukufumana iinkcukacha.

## Imifanekiso yesikrini

Izicwangciso zoxilongo nezocwangciso kufakelo lomboniso olwahlukileyo lweCacti 1.2.31
olusebenzisa i-PHP 8.3.36, kuquka ukuhambelana kweCacti nePHP, inkxaso yokhuseleko
engundoqo, kunye nokuhlolwa kwempilo yesiseko sedatha. Izilumkiso kunye nokusilela okuboniswe apha
kuchaza loo ndawo yomboniso.

![Itheyibhile yoxilongo lweDoctor eneziphumo zokuphumelela, isilumkiso, kunye nokusilela](../../screenshots/diagnostics.png)

![Izicwangciso zocwangciso, isilumkiso, kunye nemida yeDoctor](../../screenshots/settings.png)

Iingxaki zeCacti zihlala zivela njengeempawu: iigrafu ezingenanto, i-poller emisiweyo, iplagini engafakekiyo. Unobangela uhlala uyimfuneko yangaphambili etshintshileyo, njengesandiso sePHP esilahlekileyo kwisakhiwo se-CLI, ulawulo lwelogi i-poller engenakukwazi ukubhala kulo, indlela ye-RRDtool ekhomba kwibhayinari engalunganga, okanye isiseko sedatha esingenazitheyibhile zommandla wexesha. IDoctor ihlola ezo mfuneko ngqo kwaye ibike nganye njengephumeleleyo, isilumkiso, okanye esileleyo nesivakalisi esichaza oko ikufumeneyo. Kwale ngxelo inye iyafumaneka kwiphepha lewebhu, kumgca womyalelo, nanjenge-JSON yokubeka iliso.

## Oko ikuhlolayo

| Ummandla | Okuhlolwayo |
|---|---|
| Doctor | Ukuba ngaba iDoctor ngokwayo isebenza njenge-root, nto leyo enokwenza ukuba ukuhlolwa kweemvume kuchaze iakhawunti engalunganga |
| ICacti nePHP | Uguqulelo lweCacti, uhlaziyo olungazange lugqitywe ngumfakeli, iiplagini ezivuliweyo ezineefayile ezilahlekileyo, ukuhambelana kwePHP nephakheji yeCacti efakiweyo, imeko yenkxaso yokhuseleko engundoqo yePHP |
| Izandiso zePHP | Izandiso ezifunekayo kwiPHP yewebhu nakwi-CLI PHP esetyenziswa yi-poller, kunye neempawu ezicetyiswayo |
| Uqwalaselo lwePHP | `memory_limit`, `max_execution_time`, kunye ne-`date.timezone`, kusetyenziswa iingcebiso zeCacti ngokwayo |
| Isiseko sedatha | Uqhagamshelwano, uguqulelo lweseva ngokuchasene nengcebiso yeCacti, iseti yeempawu ze-UTF-8, iitheyibhile zommandla wexesha, iitheyibhile ezingundoqo, ukuphambuka kwewotshi kwinginginya yePHP, kunye nezicwangciso ze-InnoDB ezimakwa yiCacti njengeempazamo |
| Impilo yesiseko sedatha | Umthamo woqhagamshelwano, ukufundwa kwe-buffer-pool, iitheyibhile zethutyana zediski, ukudalwa komsonto woqhagamshelwano, iingxelo ezicothayo, kunye nokulinda kwe-InnoDB log-buffer, kunye neengcebiso zohlengahlengiso ezixhomekeke kumthwalo womsebenzi |
| Inkqubo yeefayile | I-cache ebhalekayo, ilogi, nolawulo lwe-RRA; indawo ekhululekileyo yeefayile ze-RRD; imithombo yedatha esebenzayo engenafayile ye-RRD okanye ehlaziywa emva kwexesha; `include/config.php` engafundeki kumntu wonke; ilogi yeCacti ebhalekayo nengakhulanga ngokugqithisileyo |
| Iibhayinari | I-PHP CLI, i-RRDtool, `snmpget`, `snmpwalk`, kunye ne-Spine xa iyi-poller eqwalaselweyo, kuquka iinguqulelo apho iCacti ichaza enye |
| Ilogi | Iimpazamo phakathi kwemigca yelogi yeCacti yamva nje, kunye nomyalezo oqhelekileyo kakhulu |
| Izixhobo | Izixhobo ezivuliweyo ezingasebenziyo okanye ezibuyayo, ezithathu ezingasebenziyo ixesha elide kunye nempazamo yazo yokugqibela, kunye nokusilela xa izixhobo ezininzi zingasebenzi ngexesha elinye |
| I-Poller | Uhlobo lwe-poller kunye nexesha lokuqhawuka, ixesha ukusukela ekugqibeleni kwe-poller engundoqo, ixesha lokusebenza ngokuchasene nexesha lokuqhawuka, imveliso ye-poller engazange ifike kwifayile ye-RRD, ii-poller ezikude eziyekileyo ukunika ingxelo, i-Boost emileyo, kunye noqwalaselo lwe-Spine olukhomba kwisiseko sedatha esahlukileyo |

Uhlolo ngalunye lune-ID ezinzileyo, njenge-`database.timezone` okanye i-`binary.rrdtool`, ukuze izikripthi zikwazi ukusebenzisa iziphumo ezizimeleyo.

## Imephu yekhowudi novavanyo

| Indlela yokusebenza | Ukuphunyezwa | Ubungqina bovavanyo kule ndawo yokugcina |
|---|---|---|
| Ukuhlolwa koxilongo kunye nee-ID zengxelo ezinzileyo | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Ufikelelo olusekelwe kwindima kunye neengxelo zewebhu ezisuswe iinkcukacha | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Uphando lweempawu ezikhokelwayo | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Ubuhle be-RRD kunye nokuphathwa kokubhala okulibazisekileyo | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Ukujongwa kwangaphambili kolungiso, imbali yophicotho, kunye nezilumkiso ezamkelweyo | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Ukuhlolwa okucwangcisiweyo kunye notshintsho lwezilumkiso | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Ezi nkomba zichaza ukuphunyezwa nokhuseleko lovavanyo; azitsho
ukuba wonke umsebenzi we-CI uphumelele kuhlaziyo lwangoku. Jonga ukuqhutywa komsebenzi
kuhlaziyo oplanileyo ukulusebenzisa.

## Iingcebiso ngempilo yesiseko sedatha

Umseshi wePHP wemveli weDoctor ufunda iseti esisigxina yezibali ze-MySQL okanye ze-MariaDB zehlabathi ngoqhagamshelwano lwesiseko sedatha olukhoyo lweCacti. Wenza imibuzo emibini yokufunda kuphela ngengxelo nganye, awufuni ziqinisekiso zongezelelweyo okanye ifayile esebenzayo, kwaye awuze utshintshe uqwalaselo lwesiseko sedatha. Olu hlolo luvela kwingxelo yewebhu, kwi-CLI, kwi-JSON, kwimveliso yokubeka iliso, kwiphakheji yenkxaso, nakukulandelelwa kwemeko okucwangcisiweyo.

| I-ID yohlolo | Isivuseleli sophando |
|---|---|
| `database.health_sample` | Ngaphantsi kweeyure ezingama-24 ukusukela ekusungulweni okanye kwi-`FLUSH STATUS`, okanye ixesha lokusebenza elingafumanekiyo/elingahambelaniyo |
| `database.connection_capacity` | Uqhagamshelwano lwangoku okanye olubhalwe kwincopho ubuncinci ngama-80% e-`max_connections` yangoku |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` ubuncinci nge-1%, kunye nezicelo zokufunda ezibuncinci ngama-10,000 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` ubuncinci ngama-25%, kunye neeteyibhile zethutyana ezibuncinci ngama-1,000 |
| `database.thread_cache` | `Threads_created / Connections` ubuncinci nge-5%, kunye nemizamo yoqhagamshelwano ebuncinci ngama-1,000 kunye ne-`thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` ubuncinci nge-1%, kunye neengxelo ezibuncinci ngama-1,000 |
| `database.redo_log_waits` | I-`Innodb_log_waits` engeyiyo iqanda |

Le yimida yophando yeDoctor, ayizojongo zoqwalaselo lomenzi. Ngaphandle komthamo woqhagamshelwano, iingcebiso ezihlangeneyo zifuna ifestile yokujonga engentla. Izibali ezilahlekileyo, ezenziwe kakubi, eziphindaphindiweyo, okanye ezikhulu ngokugqithisileyo, umsebenzi onganelanga, kunye neendlela zomsonto ezingaxhaswanga zivelisa izilumkiso endaweni yesigqibo esisempilweni okanye ingcebiso yohlengahlengiso. Izilumkiso zinokuchaphazela imeko ye-Nagios kunye nezilumkiso ezicwangcisiweyo xa **Lumkisa ngeZilumkiso** ivuliwe.

Funda izibali ezilinganisiweyo kunye nengcebiso kunye. Amaxabiso ahlangeneyo awamiseli umthwalo wangoku; izibali zinokuba neembali ezahlukeneyo zokuseta kwakhona kwaye aziyombono yexesha elinye. Uqhagamshelwano lwencopho lunokubonisa umda omdala. Izibalo zemibuzo ecothayo zixhomekeke kwi-`long_query_time`, kwaye isibali seeteyibhile zethutyana zediski yeMySQL sinokushiya iifayile ezenziwe imephu kwimemori. Umlinganiselo ophantsi awungqini ukungabikho kwesithintelo. Qinisekisa iintsingiselo phantsi komthwalo womsebenzi omelayo, jonga kwakhona izicwangciso zemibuzo nokusetyenziswa kwakhona koqhagamshelwano, kwaye ulinganise imemori kwi-**inginginya yesiseko sedatha** phambi kokutshintsha ii-buffer okanye imida yoqhagamshelwano.

Ukuba iimetriki azifumaneki, hlola inkxaso yeseva kunye nofikelelo lweakhawunti yeCacti kwi-`SHOW GLOBAL STATUS` nakwi-`SHOW GLOBAL VARIABLES`; iDoctor ayiceli ziqinisekiso ziphakamileyo. Iinkcazelo zezibali zivela kwi-[sikhokelo somguquguquki wemeko yeMySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) nakwi-[sikhokelo somguquguquki wemeko yeMariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Akukho sikripthi okanye ikhowudi yeMySQLTuner esetyenziswayo.

Akukho kufuduka kweskimu okanye koqwalaselo okufunekayo. Faka iifayile zeplagini ngokuqhelekileyo; ukubuyisela ezo fayile kususa uxilongo olongeziweyo. Imeko ecwangcisiweyo ekhoyo iyahlaziywa kwisigaba esilandelayo.

## Indlela ehlala ikhuselekile ngayo

Isixhobo soxilongo sisebenza ngamalungelo e-poller okanye eseva yewebhu kwaye sifunda iindlela kwitheyibhile yezicwangciso, ngoko ke kufuneka silumke malunga noko sikuphumezayo nokukuguqulayo.

- Uxilongo lufunda kuphela. Aluze lutshintshe iifayile, izicwangciso, okanye idatha.
- U-Doctor uphumeza ibhayinari ecwangcisiweyo kuphela xa igama lefayile yayo lihambelana nenkqubo elindelekileyo (`php`, `rrdtool`, `snmpget`, okanye `snmpwalk`). Nabani na onokubhala kwitheyibhile yezicwangciso ebenokukhetha into eyenziwa ngu-Doctor ngaphandle koko. Naliphi na elinye igama lixelwa njengesilumkiso kwaye aliphumezwa.
- U-Doctor akaze aphumeze iibhayinari ezicwangcisiweyo njengo-root, kwaye uyaxela xa esebenza njengo-root.
- Ukulungisa kuvela kuluhlu oluvunyelweyo olumiselweyo. Nganye ifuna inyathelo lomlawuli oqinisekisiweyo kwi-UI yewebhu okanye `--yes` kwi-CLI, kwaye nganye ibhalwa kwilog ye-Cacti.

## Iinguqulelo ezikhutshiweyo

Iinguqulelo zilandela i-SemVer kwaye zihambelana nefayile ye-`INFO` yeplagini. Jonga [inkqubo yokukhupha iinguqulelo](../../releasing.md) ukuze ufumane ukhetho lwenguqulelo, amasango e-CI, imixholo yephakheji, ii-checksum, kunye nemiyalelo yokubuyisela umva.

## Ufakelo

Khuphela i-`doctor-VERSION.tar.gz` okanye i-`doctor-VERSION.zip` kunye ne-`SHA256SUMS` kwi-[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Qinisekisa i-checksum ye-SHA-256 yogcino-fayile, uze ukhuphele isilawuli sayo se-`doctor/` kwisilawuli se-`plugins/` se-Cacti. Ezi ziipakheji ezifakelekayo; oogcino-fayile bomthombo abazenzekelayo be-GitHub banegama lesilawuli elahlukileyo. Ukuze usebenzise umsebenzi ongekhutshwa kwi-`develop`, fakela ukusuka kwi-checkout yomthombo.

Kwii-checkout zomthombo:

Kopa okanye ukhuphe irepository njenge-`plugins/doctor` ngaphakathi kufakelo lwe-Cacti. Isilawuli kufuneka sithiywe ngokuba yi-`doctor`, hayi i-`plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Fakela kwaye uvule i-**Cacti Doctor** kwi-**Configuration > Plugin Management**, uze unikezele ngerelimu ye-**Doctor Viewer**, **Doctor Operator**, okanye i-**Doctor Administrator** ngeemvume zomsebenzisi okanye zeqela ze-Cacti. Izibonelelo ezikhoyo ze-**Cacti Doctor** zigcina ufikelelo loMlawuli emva kokuphuculwa. Ingxelo ivela phantsi kwe-**Utilities > Cacti Doctor**.

## Iilwimi

U-Doctor uza neenguqulelo zesiSpanishi (eSpain, `es-ES`), isiFrentshi (`fr-FR`), isiJamani (`de-DE`), isiTshayina esiLula (`zh-CN`), isiHindi (`hi-IN`), isi-Arabhu (`ar-SA`), kunye nesiJapani (`ja-JP`). I-Cacti iyazibonisa xa inkxaso yolwimi ivuliwe (**Configuration > Settings > General > Language Support**) kwaye umsebenzisi ekhetha ulwimi. Iphepha lewebhu, izicwangciso, kunye nemiyalezo kunye nombhalo wengxelo oprintwa ngumgca womyalelo zilandela ulwimi lwe-Cacti; ingxelo yomgca womyalelo ngokwayo isebenzisa ulwimi olusisiseko lwe-Cacti, oluhlala luyisiNgesi ngaphandle kokuba ulutshintshile.

Imveliso efundwa ngumatshini ayize iguqulelwe: ii-ID zohlolo, izitshixo ze-JSON kunye namaxabiso obume, imveliso ye-`--format=nagios` ne-`--format=prometheus`, imigca yelog, kunye nezihloko zamacandelo ephakheji yenkxaso zihlala zikwisiNgesi ukuze izikripthi nokujonga imeko kuqhubeke kusebenza kuzo zonke iilwimi. Umbhalo we-`summary` nowe-`detail` wohlolo ngalunye kuphela kwenxalenye eguqulelweyo yengxelo ye-JSON.

Ikhathalogu yesiSpanishi saseLatin America (`es-419`) nayo iyafumaneka, kodwa akukho Cacti 1.2 okanye Cacti 1.3 enendawo yesiSpanishi saseLatin America enokukhethwa, ngoko ke isebenza kuphela xa i-Cacti yongeza enye. Kude kube ngoko, khetha isiSpanishi (`es-ES`).

I-Cacti ilayisha ikhathalogu yeplagini ukusuka kwi-`plugins/doctor/locales/LC_MESSAGES/<locale>.mo` nge-`doctor` njengommandla wombhalo, kwi-1.2.x nakwi-1.3 ngokufanayo (i-1.3 isombulula isilawuli seeplagini ngendlela yayo yeeplagini ecwangcisekayo).

## Amanqanaba okufikelela

| Ummandla | Izinto ezinokwenziwa |
|---|---|
| Doctor Viewer | Ukufunda ubume obuhleliweyo bokuhlola bamva nje, ixesha lokuqaphela, ubutsha kunye nembali yamva nje edityanisiweyo. Akukho miyalelo yoxilongo, iinkcukacha ezikrwada, ucwangciso okanye ukulungisa. |
| Doctor Operator | Ukuqhuba ingxelo yoxilongo enomda wenkqubo weesekondi ezili-120, ukuhlola iinkcukacha ezifihliweyo, nokuvuma iziphumo. Akukho tshintsho lwezicwangciso okanye ukulungisa. |
| Doctor Administrator | Izinto ezinokwenziwa nguMsebenzisi (Operator) kunye nokulungiswa okukuluhlu oluvunyelweyo olukhoyo nezicwangciso zika-Doctor. Ukulungisa nezicwangciso zifuna kwakhona ummandla we-Settings/System Utilities we-Cacti. |

Imenyu ye-Utilities ivula iphepha elona nqanaba liphezulu lommandla we-Doctor elinikwe umsebenzisi, kuquka nezibonelelo zeqela. Imimandla emitsha ye-Viewer neye-Operator ayifumani zibonelelo zizenzekelayo. I-ID yommandla wokuqala ihlala incamathele kwi-`doctor.php` njengoMlawuli, igcina ufikelelo olukhoyo lomsebenzisi nolweqela.

Idatha ye-Viewer ivela kuhlolisiso olucwangcisiweyo. Vula ucwangciso phambi kokunika ufikelelo lwe-Viewer; uqaphelo olungekhoyo okanye oludlulelwe lixesha lubonisa u-**unknown**, aluze lubonise ukuba lusempilweni. Imbali igcina amanani adityanisiweyo okugqibela angama-20 acwangcisiweyo kwaye ikhuphela ngaphandle ubume besixhobo. Abasebenzisi be-Operator baqalisa uxilongo olutsha ngokucacileyo; ukuhlaziywa kwephepha okuqhelekileyo kusebenzisa ingxelo yokugqibela yeseshoni yabo.

Iinkcukacha zesixhobo namanani ewonke zisebenzisa iimvume zesixhobo zomsebenzisi wangoku. Izicatshulwa zelog zifuna ukongeza ummandla we-Log Administration we-Cacti. Iimfihlo ziyafihlwa phambi kokuba iinkcukacha zoxilongo zigcinwe kwiseshoni yewebhu okanye ziboniswe. Ufikelelo lwe-CLI luqhubeka lulawulwa yi-akhawunti yenkqubo yokusebenza.

Ukuvuma kuzizinto zomntu ngamnye kwaye kubhalwa kwilog ye-Cacti. Kusebenza kuphela kwiziphumo ezifanayo nakubungqina obufanayo; ubungqina obutshintshileyo bufuna ukuvuma okutsha. Akaze kutshintshe ubume be-pass/warn/fail, kucinezele izilumkiso, okanye kuphawule ukuhlola okungaphumeleliyo njengokusempilweni. Oku kwahlukile kwimikhethe yezilumkiso ezamkelweyo, ezichaphazela umgaqo-nkqubo wezilumkiso ngaphandle kokutshintsha ubume obuphawulweyo kwaye zichazwe ngezantsi.

Inyathelo ngalinye lifuna i-POST kunye nethokheni ye-CSRF esebenzayo. Ukulungisa kubonisa iphepha lokuqinisekisa elahlukileyo elinelinki ethi Cancel engathumeliyo, kwaye libhala umsebenzisi owenzayo kunye nesiphumo kwilog ye-Cacti.

## Umgca womyalelo

Qhuba ezi ukusuka kwingcambu ye-Cacti njengomsebenzisi we-poller ye-Cacti, hayi i-root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Imveliso yombhalo iprinta umgca omnye ngohlolo ngalunye nobume balo, udidi, isishwankathelo, kunye neenkcukacha. `--json` iprinta into ye-`summary` enamanani obume kunye noluhlu lwe-`checks` olunamangeno aphatha i-`id`, `category`, `status`, `summary`, `detail`, kunye ne-`repair`/`repairable` xa ukulungiswa okukuluhlu oluvunyelweyo kusebenza.

| Ubume bokuphuma | Intsingiselo |
|---|---|
| `0` | Akukho hlolo lungaphumelelanga, okanye ukulungiswa okuceliweyo kuphumelele. Izilumkiso azibutshintshi ubume bokuphuma. |
| `1` | Ubuncinci uhlolo olunye aluphumelelanga, okanye ukulungiswa okuceliweyo akuphumelelanga. |
| `2` | Impazamo yokusebenzisa: ukuqhutywa kokulungisa ngaphandle kwe-`--yes` (`--preview` ayiyidingi), i-ID yokulungisa engaziwayo, ifomati yemveliso engaziwayo, indibaniselwano ye-`--symptom` okanye yefomati engaxhaswanga, okanye ufakelo lwe-Cacti olungafumanekiyo. |

I-Cacti inyusa i-`memory_limit` kwisikripthi ngasinye se-CLI, ngoko ke uhlolo loqwalaselo lwexesha lokusebenza le-PHP lunentsingiselo kuphela kwiphepha lewebhu.

## Uhlolo olucwangcisiweyo kunye nezilumkiso

Phantsi kwe-**Configuration > Settings > Doctor**, vula i-**Run Checks on a Schedule** uze ukhethe ixesha eliphakathi kwemizuzu eli-15 ukuya kusuku olunye. Emva komjikelo ngamnye we-poller ofikelela exesheni, u-Doctor uqhuba lonke uhlolo kwinkqubo engasemva, ngoko ke ixesha lokusebenza le-poller ngokwayo alichaphazeleki.

Ukuqhutywa ngakunye kubhala ubume obuphawulweyo bohlolo ngalunye. Imikhethe yezilumkiso esebenzayo ichaphazela umgaqo-nkqubo wezilumkiso ngaphandle kokutshintsha olo phawulo. Xa uhlolo luqala okanye luyeka ukusilela, u-Doctor ubhala utshintsho kwilog ye-Cacti kwaye, ukuba i-**Alert Email Addresses** isetiwe, uthumela i-imeyile kwezo dilesi ngezicwangciso zeposi ze-Cacti. I-**Alert on Warnings** yongeza utshintsho lokungena nokuphuma kwizilumkiso. Ukuqhutywa kokuqala kubhala isiseko kuphela.

Iingxelo ezicwangcisiweyo zisebenza kwi-poller ephambili phantsi kwesitshixo sokucetyiswa sedathabheyisi kwaye zinomda wabasebenzi wemizuzu emibini. U-Doctor uxela ukuqala kokugqibela nokugqitywa ngempumelelo ukuze iziphumo ezingekhoyo okanye ezidala zibonakale. Iziphumo zibalwa njengezangoku kwithuba elidityaniswe nomjikelo omnye we-polling kunye nemizuzu emithathu. Ukuqhutywa okungagqitywayo kuyaphindwa emva kwemizuzu emi-5, eli-10, engama-20 nangaphezulu, ukuya kwithuba eliqhelekileyo. Ukuhanjiswa kwezilumkiso okungaphumelelanga kuyagcinwa ukuze kuphindwe ukuya kutsho izihlandlo ezithathu ngokulibazisa okwandayo; emva koko, lungisa izicwangciso zeposi ze-Cacti uze uqhube `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` njengomsebenzisi we-poller. Ukwamkelwa yiseva yeposi akuqinisekisi ukuhanjiswa kwibhokisi engenayo.

Itebhu efanayo iseta imida yexesha lokusebenza le-poller (ama-80% exesha eliphakathi), isithuba sediski esikhululekileyo se-RRA (isilumkiso ngaphantsi kwe-10%, ukusilela ngaphantsi kwe-2%), ukuhamba kwewotshi yedathabheyisi (isilumkiso ngaphezu kwemizuzwana emi-5, ukusilela ngaphezu kwama-60), kunye nobukhulu belog ye-Cacti (100 MB). Amaxabiso angenanto okanye angasebenziyo abuyela kwezi zisiseko.

## Udibaniso lokubeka iliso

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` iprinta umgca omnye wobume kunye nedatha yokusebenza kwaye iphuma nge-`0` (OK), `1` (WARNING), okanye `2` (CRITICAL), ukuze i-Nagios, i-Icinga, okanye nayiphi na inkqubo ehambelanayo ikwazi ukuyiqhuba ngokuthe ngqo. `--format=prometheus` ibhala ifomati yombhalo ye-Prometheus yomqokeleli we-textfile ka-node_exporter: `cacti_doctor_check_status` ngohlolo ngalunye (0 iphumelele okanye isilumkiso esamkelweyo, 1 isilumkiso ekufuneka sithathelwe inyathelo, 2 ukusilela), `cacti_doctor_check_observed_status` phambi kwemikhethe, `cacti_doctor_check_accepted`, `cacti_doctor_checks` ngobume ngabunye, kunye ne-`cacti_doctor_last_run_timestamp_seconds`. Imigca yohlolo lwe-JSON ibandakanya ibala le-`assessment`; u-`not_assessed` uthetha ukuba uhlolo alukwazanga ukufikelela kwisigqibo kwidatha ekhoyo.

## Iphakheji yenkxaso

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Iphakheji yifayile enye yombhalo eneenguqulelo ze-Doctor, i-Cacti, i-PHP, i-OS, nedathabheyisi, amanani e-poller nawe-Boost, ingxelo epheleleyo, kunye nemigca yokugqibela engama-200 yelog ye-Cacti. Amaxabiso alandela amagama egama lokugqitha, imfihlo, ithokheni, uluntu, kunye nesitshixo ayafihlwa. U-Doctor udala ifayile ifundeka kuphela ngumnini wayo kwaye uyala ukubhala ngaphezulu kwefayile ekhoyo. Yijonge phambi kokuba uyithumele naphi na.

## Umgaqo-nkqubo wokulungisa

I-Doctor iquka ukulungiswa okunye, `runtime_directories`. Idala abalawuli be-Cacti bexesha lokusebenza abangekhoyo kwaye yongeza iibhithi zokufunda, ukubhala, nokusebenzisa zomnini ngaphandle kokususa iimvume ezikhoyo.

Ijolise ku-`$cache_path`, `$log_path`, kunye no-`$rra_path` kwi-Cacti 1.3, okanye kubalawuli bofakelo be-`cache`, `log`, kunye no-`rra` ngenye indlela. Iyabatsiba abalawuli esele bebhalwa, iyabala abalawuli abangaphandle kofakelo lwe-Cacti (njengomlawuli weelog phantsi kwe-`/var/log`), iyazala izihlanganisi zesimboli, kwaye iyala ukusebenza njengo-root. Ayize ilandele i-`path_cactilog`, ngoko ke ifayile yeelog eqwalaselwe ngaphakathi komlawuli wekhowudi ayikwazi ukuthumela ukulungiswa apho. Uxilongo lusaqhubeka nokuhlola umlawuli wefayile yeelog eqwalaselweyo kulo lonke ukhupho.

Ayibutshintshi ubunini, ayiqhubi imiyalelo ye-shell, ayibhali kwakhona uqwalaselo, okanye ayitshintshi idatha yesicelo se-Cacti. Ukulungiswa okutsha ngakunye kufuneka kuquke uxilongo, umphathi osoluhlwini oluvumelekileyo, isiqinisekiso, ukurekhodwa kophicotho, kunye novavanyo.

## Ukuphanda iimpawu

Abasebenzisi bokusebenza kunye nabalawuli banokukhetha **Phanda uphawu** kwiphepha le-Doctor. Imigaqo efanayo iyafumaneka nge-`--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, okanye `alerts_missing`, ngesiphumo sombhalo okanye se-JSON. Iimpahla zenkxaso ziquka uphando lweempawu olufanelekileyo.

Umgqatswa ngamnye udwelisa uhlolo olubonakeleyo kunye nenyathelo elilandelayo lokuqinisekisa. Abagqatswa ziingcamango nje, hayi oonobangela abaqinisekisiweyo. Ukuqwalaselwa okulahlekileyo, okungavavanywanga okanye okudala akuzange kumisele unobangela. Uphando lwewebhu lusebenzisa ingxelo ehluzwe ngemvume; iingxelo ze-CLI zisebenzisa ufikelelo lweakhawunti yenkqubo yokusebenza.

## Ubutsha bohlaziyo lwe-RRD

I-`filesystem.rrd_stale` ihlola ukuya kuthi ga kwi-500 yemithombo yedatha esebenzayo, ngaphandle kwezixhobo ezikhubazekileyo nezingasebenziyo. Kufakelo olukhulu isampulu iyatshintsha rhoqo ngeyure, ngoko ke ukuqhutywa okuphindaphindiweyo kuquka iifayile ezahlukeneyo. Ithelekisa amaxesha okuguqulwa kwefayile kunye nelona xesha likhulu phakathi kwexesha le-poller, inyathelo lomthombo we-RRD kunye nenyathelo leprofayile, eliphindaphindwe nge-**Izithuba zokungahlaziywa kwe-RRD** (okungagqibekanga ngu-3). Ibonisa iifayile ezintathu ezindala kakhulu ezingasahlaziywanga kunye nenani lezixhobo ezichaphazelekayo. Iziphumo zewebhu ziquka izixhobo ezivunyelweyo kuphela.

I-`filesystem.rrd_files` luhlolo olwahlukileyo lobukho. Ikhangela ifayile ye-RRD ukuya kuthi ga kwi-5,000 yemithombo yedatha esebenzayo, kubandakanya leyo ikwizixhobo ezikhubazekileyo okanye ezingasebenziyo, kwaye isebenzisa isampulu efanayo yeyure.

I-Boost yongeza kabini ixesha layo lokukhupha eliqwalaselweyo njengemvume yokubhala kwidiski. Komnye umbhali olibazisiweyo, qwalasela i-**Imvume yokubhala kwe-RRD okulibazisiweyo (imizuzwana)**. I-`RRDCACHED_ADDRESS` ebhengeziweyo ngaphandle kwemvume, okanye ixesha le-Boost elingasebenziyo, livelisa isiphumo esingavavanywanga. I-Doctor ayize ikhuphe i-cache ukwenza olu hlolo. Ixesha lokuguqulwa bubungqina bomsebenzi wediski, hayi ubungqina bokuqokelelwa kwedatha ngempumelelo. I-caching yangaphandle engakwaziyo ukubhaqwa yi-Doctor kufuneka iqwalaselwe ngokucacileyo.

Iifayile ezilahlekileyo, ezingafundekiyo kunye nezinomhla wekamva zibalwa kwiinkcukacha. Isiphumo asivavanywa kuphela xa kungekho fayile yesampulu efundekayo. Isiphumo sesampulu sithi siquka inxalenye kuphela yofakelo; ukupasa akuzibandakanyi iifayile ezingenziwanga sampulu.

## Imiboniso yangaphambili yokulungisa kunye nembali yophicotho

Iphepha lokulungisa loMlawuli libonisa indlela nganye echaphazelekayo, isenzo sayo esicetywayo, iimvume zangoku kunye neemvume ekujoliswe kuzo. Ukuvunywa kubotshelelwe kuloo mboniso wangaphambili, umsebenzisi osebenzayo kunye nexesha lokuphila lemizuzu emihlanu. Isiqinisekiso sisebenzisa umboniso wangaphambili; inkqubo yefayile etshintshileyo ifuna omnye umboniso wangaphambili. Ukuqhutywa njengo-root, iindlela ezingaphandle kofakelo, izihlanganisi ezifuna ukulungiswa kunye neemvume zenkqubo yefayile ezingafezekiswanga zithintela ukuvunywa.

I-`--repair=runtime_directories --preview` ishicilela isicwangciso se-JSON sokufunda kuphela. I-`--repair=runtime_directories --yes` ivuma isicwangciso se-CLI esisandula ukubalwa kwaye isihlole kwakhona phambi kokuqhutywa. Iakhawunti ye-CLI kufuneka sele igunyazisiwe ukulungisa ufakelo; ayizifumani iindima zewebhu ngelifa.

Irekhodi ecwangcisiweyo ye-`repair.started` kufuneka igcinwe phambi kwalo naluphi na utshintsho lwenkqubo yefayile. Irekhodi edityanisiweyo ye-`repair.completed` iqulethe umfanekiso osemva kokulungisa kunye nesiphumo sokuqinisekisa. Umsebenzi ophazanyisiweyo ushiya irekhodi eqalisiweyo ukuze iphandwe. Ukusilela kophicotho lokugqibezela kuxelwa njengokusilela nokuba utshintsho lwenkqubo yefayile lwenzekile. I-Doctor yongeza iimvume zomnini kwaye idale abalawuli; ayizami ukubuyisela umva ngokuzenzekelayo.

Abalawuli abanemvume ye-Settings/System Utilities ye-Cacti banokufunda amangeno ophicotho angama-20 amva nje kwiphepha le-Doctor. I-plugin igcina iirekhodi ezili-200 zamva nje kwi-`plugin_doctor_audit`; i-log ye-Cacti ikwarekhoda ii-ID zazo, izenzo kunye nabenzi. Imithwalo yophicotho ihleliwe ukuze kususwe iinkcukacha ezibuthathaka.

## Izilumkiso ezamkelweyo

Abalawuli abanemvume ye-Settings/System Utilities ye-Cacti banokudala **Ukukhululwa kwesilumkiso** kwisilumkiso esitsha, esivavanyiweyo kwiphepha le-Doctor. Ukukhululwa kufuna umnini, isizathu kunye nomhla wokuphonononga we-UTC phakathi kweentsuku ezingama-90. Kuphelelwa ezinzulwini zobusuku nge-UTC ekuqaleni kwaloo mhla. Kunokuqwalaselwa ukukhululwa okufikelela kwi-100. Uluhlu lubonisa amangeno aphelelwe lixesha kunye nee-ID ezingekho kwingxelo yangoku, kwaye luvumela ukususwa.

Isilumkiso esibonakeleyo sihlala sibonakala, sinomnini waso, isizathu kunye nokuphelelwa lixesha kwiinkcukacha zoxilongo. I-JSON igcina imeko ebonakeleyo kwaye yongeza imethadatha ye-`accepted` kunye ne-`acceptance`. I-Nagios ayizibandakanyi izilumkiso ezamkelweyo ezisebenzayo kubunzima bayo bokuphuma kodwa iyazibiza kwisiphumo sayo. I-Prometheus ithumela ngaphandle ubunzima obubonakeleyo kunye nobufuna inyathelo. Imeko yokuphuma eqhelekileyo ye-CLI ayitshintshi: izilumkiso zisele ziphuma ngo-zero, ukusilela kuphuma nganye.

Izaziso zezilumkiso ezicwangcisiweyo ziyathintelwa ngelixa ukukhululwa kusebenza; ukuphelelwa lixesha okanye ukususwa kwenza isilumkiso esiqhubekayo sifaneleke kwakhona kwizaziso zezilumkiso. Utshintsho lokusilela kunye nokubuya ekusileleni kuhlala kufaneleka kwizaziso. Isiphumo esingavavanywanga okanye ukusilela akunakwamkelwa. Ukuvuma komntu buqu kwahlukile kwaye akuthinteli nto. Ukudalwa nokususwa kokukhululwa kwenzeka kunye kwintengiselwano nerekhodi yophicotho.

Uphuculo ludala i-`plugin_doctor_audit` kunye ne-`plugin_doctor_acceptance` ngaphandle kokutshintsha idatha yesicelo se-Cacti. Thumela ngaphandle nayiphi na imbali oyifunayo phambi kokukhupha ufakelo: ukukhupha ufakelo kususa zombini iitafile ze-plugin kunye nezicwangciso zayo. Ukubuyisela umva iifayile ze-plugin kushiya iitafile zifumaneka ukuze ziphandwe, kodwa iinguqulelo ezindala azikuhloniphi ukukhululwa kwezilumkiso.

## Iimfuno

| Cacti | PHP | Amanqaku |
|---|---|---|
| 1.2.20 | 5.4 okanye entsha | Ikhowudi ye-Doctor ngokwayo iyahambelana ne-PHP 5.4 ukuze ikwazi ukuxilonga iinkqubo ezindala phambi kophuculo |
| 1.2.31 | 8.0 okanye entsha | I-`composer.json` ye-Cacti ifuna i-`>=8.0` |
| I-1.2.x yangoku | 8.2 okanye entsha | I-`composer.json` ye-Cacti ifuna i-`>=8.2` |
| `develop` (1.3) | 8.3 okanye entsha | I-`composer.json` ye-Cacti ifuna i-`^8.3` |

Umqolo we-**Ukuhambelana kwe-PHP ne-Cacti efakiweyo** uthelekisa inguqulelo ye-PHP esebenzayo kunye nemfuno ye-PHP kwi-`composer.json` engundoqo ye-Cacti ngokwayo, kubandakanya umda ophezulu wesithintelo se-caret esinjengo-`^8.3`. Ifayile ephunyezwayo ye-PHP CLI eqwalaselweyo ihlolwa ngokuchasene nemfuno efanayo. I-Doctor iyaziqonda iifom zezithintelo ze-`>=` kunye ne-`^` ezisetyenziswa zezi pakethe ze-Cacti. Imfuno engafundekiyo, enesiphene, elahlekileyo, okanye engaqondwayo ivelisa isilumkiso; ufakelo lwe-Cacti 1.2.20–1.2.30 olungenayo i-manifest lugcina umgangatho walo wobuncinci bofakelo lwe-PHP 5.4 obhaliweyo. Ukuhambelana kwe-Doctor ngokwayo ne-PHP 5.4 akumiseli ukuhambelana nofakelo olutsha lwe-Cacti.

Umqolo we-**Inkxaso yokhuseleko engundoqo ye-PHP** uphendula umbuzo owahlukileyo: ngaba elo sebe lokukhutshwa kwe-PHP lisafumana izilungiso zokhuseleko kwiprojekthi ye-PHP? Ixela umhla wokuphela kwenkxaso yokhuseleko opapashiweyo wesebe kwaye ilumkise emva kwaloo mhla. Umzekelo, i-PHP 8.1 inokuhlangabezana nemfuno yexesha lokusebenza yofakelo lwe-Cacti oludala ngelixa ingasafumani zilungiso zokhuseleko zangaphambili. Isiphumo esipasayo asithethi ukuba ukukhutshwa kwepetshi efakiweyo kukho ngoku, kwaye i-Doctor ayikwazi ukufumanisa ukuba umthengisi we-OS ubonelela ngezilungiso ezibuyiselwe umva.

Imihla yenkxaso ihlanganiswe kunye ne-Doctor ukusuka kwi-[shedyuli yenkxaso ye-PHP](https://www.php.net/supported-versions.php) kunye ne-[uluhlu lokuphela kobomi](https://www.php.net/eol.php), ekugqibeleni kwahlolwa ngo-2026-11-08. Amasebe angaziwayo kunye nokukhutshwa kwangaphambi kwexesha kuvelisa isilumkiso endaweni yokupasa okucingelwayo. Akukho sicelo senethiwekhi senziwayo ngexesha loxilongo. Hlaziya idatha yenkxaso ye-Doctor xa i-PHP ipapasha ishedyuli entsha. Ii-ID ezikhoyo ze-JSON/zokubeka esweni `php.version` kunye ne-`php.security_baseline` azitshintshanga.

## Uphuhliso

Uthotho lweemvavanyo zeyunithi lusebenzisa i-Pest kwaye lusebenza kwi-PHP 8.2 okanye entsha:

```console
composer install
composer test
```

Iimvavanyo zibuyisela imisebenzi ye-Cacti ebizwa yi-Doctor ngezinto ezincinci ezimela yona kwi-`tests/CactiStubs.php`, ngoko ke zisebenza ngaphandle kofakelo lwe-Cacti.

I-GitHub Actions iqhuba iindidi ezine zohlolo kulo lonke u-push kunye ne-pull request:

- `php -l` kuyo yonke ifayile ye-PHP phantsi kwe-PHP 5.4, 5.6, 7.0, 7.1, 7.4, kunye ne-8.0 ukuya kuthi ga kwi-8.4.
- Uthotho lweemvavanyo zeyunithi kwi-PHP 8.2, 8.3, kunye ne-8.4.
- `locales/build_gettext.sh --check`, esilela kwitempleyiti yoguqulelo endala, ikhathalogu engaphelelanga okanye engacacanga, okanye ikhathalogu eqokelelweyo eyahlukileyo kumthombo wayo.
- Imisebenzi esixhenxe yokudibanisa efaka i-Cacti 1.2.20, isebe langoku le-1.2.x, kunye ne-`develop` ngokuchasene ne-MySQL kunye ne-MariaDB, zombini nge-cmd.php kunye ne-Spine. Umsebenzi ngamnye ufaka kwaye uvule i-plugin, uqhube ingxelo epheleleyo ye-CLI, kwaye uhlole iskimu sengxelo, amanani ewonke esishwankathelo, iimeko ezilindelekileyo, kunye neseti echanekileyo yokusilela. Emva koko waphula indlela ye-binary kunye nesitampu sexesha se-poller, uqinisekise ukuba zombini zixeliwe, uzibuyisele, usebenzise ukulungiswa kunye nesiqinisekiso sako, kwaye uqhube ukukhubaza, ukuvula, ukukhupha ufakelo, kunye nokufaka kwakhona. Ingxelo ye-JSON igcinwa njenge-artifact xa umsebenzi usilela.

## Ukufaka igalelo

Izicelo zokutsala (pull requests) ziya ku-`develop`. Gcina iifayile zemveliso zihambelana ne-PHP 5.4 kwaye usebenzise isimbo se-Cacti: iithebhu, imitya enecaphuno elinye, kunye nabancedisi be-Cacti abanjengo-`read_config_option()` no-`db_fetch_cell()`. Yongeza uvavanyo lweyunithi kutshintsho ngalunye lwendlela yokusebenza, usayine ii-commit zakho (`git commit -s`), kwaye wongeze umgca kwi-`CHANGELOG.md`.

### Iinguqulelo

Songa umyalezo ngamnye obonwa ngumsebenzisi nge-`__('...', 'doctor')` (okanye i-`__n()`, i-`__x()`, i-`__esc()`), kwaye unike isivakalisi esiqulathe ixabiso umtya wefomathi omnye onezibambi-ndawo ezilandelelanayo eziyi-`%s`/`%d` endaweni yokudibanisa iziqwenga. I-`__()` ye-Cacti ifomatha umyalezo kuphela xa uqulathe isichazi-fomathi kwaye ayixhasi iifom ezibeka indawo ezinjenge-`%1$s`. Kwakhona iguqula u-`%%` ibe ngu-`%` phambi kokufomatha, ngoko ke ungaze ufake uphawu lwepesenti ngokuthe ngqo kumyalezo: dlulisa ixabiso kunye nophawu lwalo njenge-argument (`__('Usage: %s', '50%', 'doctor')`). Imigca yeelogi ihlala ingesiNgesi: sebenzisa u-`doctor_repair_message()` kumbhalo wokulungisa kunye no-`doctor_n_()` kwimiyalezo elogiweyo kwaye iguqulelwe kuphela apho iboniswa khona. Gcina ii-ID zokuhlola, izitshixo ze-JSON, amagama aphambili emeko, iziphumo zokubeka iliso, kunye nemigca yeelogi zingaguqulelwanga.

I-`locales/build_gettext.sh` iphinda yenze itemplate ethi `locales/po/cacti.pot`, iyidibanise kwikhathalogu nganye ethi `locales/po/<locale>.po`, kwaye iqulunqe i-`locales/LC_MESSAGES/<locale>.mo`; yenza i-commit kuzo zontathu. I-CI iqhuba u-`sh locales/build_gettext.sh --check`, ethi isilele xa itemplate iphelelwe lixesha okanye ikhathalogu iphoswe okanye inongeniso olungacacanga (fuzzy), isibambi-ndawo sihlukile, okanye ifayile equlunqiweyo iphelelwe lixesha. Ke ngoko, umyalezo otshintshiweyo ufuna ukuba iinguqulelo zawo zihlaziywe kweso sicelo sinye sokutsala (pull request). Ifuna i-GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Ulwimi olutsha luyi-`<locale>.po` entsha ethiywe ngendlela i-Cacti ezithiya ngayo iindawo zayo zolwimi (umzekelo `pt-BR`).

## Ukhuseleko

Xela ubuthathaka bokhuseleko ngasese njengoko kuchaziwe kwi-[SECURITY.md](../../../SECURITY.md), hayi kwimiba yoluntu.

## Ilayisenisi

Ilungelo lokushicilela (C) 2026 Thomas Vincent. Ikhutshwe phantsi kwe-GNU General Public License, uguqulelo lwesi-2 okanye olungemva koko. Jonga i-[LICENSE](../../../LICENSE).
