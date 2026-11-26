<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktus manao stéthoscope. Mamantatra olana. Manamboatra. Manara-maso.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Satan'ny vavahadin'ny kalitao"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lisansa: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ sy 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Ny Cacti Doctor dia plugin Cacti izay mamantatra ny olan'ny fametrahana iray ao anatin'ny dingana tokana ary tsy manao fanamboarana madinika raha tsy mangataka izany ny mpitantana.

**Sata: eo am-pamoronana, alohan'ny 1.0.** Ny dikan-teny nivoaka farany dia [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Ity fanitsiana ity dia manampy katalogy amin'ny teny Hindi sy Arabo ary torolalana ho an'ny mpampiasa voadika ho an'ny fidirana voafetra araka ny andraikitra, ny fitiliana misy tari-dalana, ny fanamarinana ny havaozin'ny RRD voafetra faritra, ny topimaso alohan'ny fanamboarana sy ny tantaran'ny fanaraha-maso, ny fanilihana fampitandremana ekena, ary ireo fandikan-teny tao amin'ny 0.6.0. Jereo ny [CHANGELOG.md](../../../CHANGELOG.md) raha mila fanazavana fanampiny.

## Pikantsary

Fikirana momba ny fitiliana sy ny fandaharam-potoana ao amin'ny fametrahana fampisehoana Cacti 1.2.31 mitokana mampiasa PHP 8.3.36, ao anatin'izany ny fanamarinana ny fifandraisan'ny Cacti sy PHP, ny fanohanana ara-piarovana avy amin'ny loharano fototra, ary ny fahasalaman'ny angon-drakitra. Ny fampitandremana sy ny tsy fahombiazana aseho eto dia mamaritra io tontolo fampisehoana io.

![Tabilao fitilian'ny Doctor misy valiny nandeha tsara, fampitandremana, ary tsy fahombiazana](../../screenshots/diagnostics.png)

![Fikiran'ny fandaharam-potoana, fanairana, ary fetran'ny Doctor](../../screenshots/settings.png)

Ny olan'ny Cacti dia matetika miseho amin'ny endrika soritr'aretina: tabilao foana, poller nijanona, plugin tsy mety tafapetraka. Ny antony matetika dia fepetra takina efa niova na tsy ampy, toy ny fanitarana PHP tsy hita ao amin'ny dikan-teny CLI, tahiry fitahirizana diarin'asa tsy azon'ny poller soratana, lalan'ny RRDtool manondro rakitra azo alefa diso, na angon-drakitra tsy misy tabilaon'ny faritry ny ora. Ny Doctor dia manamarina mivantana ireo fepetra takina ireo ary mitatitra ny tsirairay ho nandeha tsara, fampitandremana, na tsy fahombiazana miaraka amin'ny fehezanteny manazava ny zavatra hitany. Io tatitra io ihany dia azo jerena amin'ny pejy web, amin'ny baikon'ny terminal, ary amin'ny endrika JSON ho an'ny fanaraha-maso.

## Ny zavatra hamarininy

| Faritra | Fanamarinana |
|---|---|
| Doctor | Raha mandeha amin'ny kaonty root ny Doctor tenany, izay mety hahatonga ny fanamarinana ny fahazoan-dalana hilaza kaonty diso |
| Cacti sy PHP | Dikan-tenin'ny Cacti, fanavaozana tsy vitan'ny mpanapetraka hatramin'ny farany, plugin alefa nefa tsy hita ny rakitr'izy ireo, fifandraisan'ny PHP amin'ny fonosana Cacti tafapetraka, satan'ny fanohanana ara-piarovana avy amin'ny loharano fototry ny PHP |
| Fanitarana PHP | Ireo fanitarana ilaina ao amin'ny PHP web sy ao amin'ny PHP CLI ampiasain'ny poller, miampy ireo fiasa atoro hampiasaina |
| Fikirana PHP | `memory_limit`, `max_execution_time`, ary `date.timezone`, mampiasa ny torohevitry ny Cacti ihany |
| Angon-drakitra | Fifandraisana, dikan-tenin'ny mpizara raha oharina amin'ny atolotry ny Cacti, tarehin-tsoratra UTF-8, tabilaon'ny faritry ny ora, tabilao fototra, elanelan'ny ora raha oharina amin'ny mpampiantrano PHP, ary ireo fikirana InnoDB izay tondroin'ny Cacti ho fahadisoana |
| Fahasalaman'ny angon-drakitra | Fahaiza-mandray fifandraisana, famakiana buffer-pool, tabilao vonjimaika amin'ny kapila, famoronana kofehin-draharaha fifandraisana, baikon-javatra miadana, ary fiandrasana log-buffer InnoDB, miaraka amin'ny soso-kevitra fanitsiana araka ny enta-mavesatra |
| Rafitra rakitra | Tahiry cache, log, ary RRA azo soratana; toerana malalaka ho an'ny rakitra RRD; loharanon-drakitra mavitrika tsy manana rakitra RRD na tara ny fanavaozana ny rakitra; `include/config.php` tsy azon'ny rehetra vakina; diarin'ny Cacti azo soratana ary tsy lehibe loatra |
| Rakitra azo alefa | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, ary Spine rehefa izy no poller voatondro, ao anatin'izany ny dikan-teny rehefa manondro iray ny Cacti |
| Diarin'asa | Fahadisoana amin'ireo andalana farany indrindra ao amin'ny diarin'ny Cacti, miaraka amin'ny hafatra miseho matetika indrindra |
| Fitaovana | Fitaovana mavitrika izay maty na eo an-dalam-piverenana, ireo telo maty ela indrindra miaraka amin'ny fahadisoana farany, ary tsy fahombiazana rehefa maty miaraka ny ankamaroan'ny fitaovana |
| Poller | Karazana sy elanelam-potoan'ny poller, fotoana hatramin'ny nahavitan'ny poller fototra farany, faharetan'ny fampandehanana raha oharina amin'ny elanelam-potoana, vokatry ny poller tsy tonga tany amin'ny rakitra RRD, poller lavitra nijanona tsy nitatitra, Boost nijanona, ary fikirana Spine manondro angon-drakitra hafa |

Ny fanamarinana tsirairay dia manana famantarana maharitra, toy ny `database.timezone` na `binary.rrdtool`, mba hahafahan'ny script mitady sy mampiasa ny vokatra tsirairay.

## Sarintanin'ny kaody sy ny fitsapana

| Fomba fiasa | Fanatanterahana | Porofon'ny fitsapana ato amin'ity tahiry ity |
|---|---|---|
| Fanamarinana fitiliana sy famantarana tatitra maharitra | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Fidirana voafetra araka ny andraikitra sy tatitra web voafantina | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Fikarohana soritr'aretina misy tari-dalana | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Havaozin'ny RRD sy fitantanana ny fanoratana nahemotra | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Topimaso alohan'ny fanamboarana, tantaran'ny fanaraha-maso, ary fampitandremana ekena | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Fanamarinana araka ny fandaharam-potoana sy fiovan'ny satan'ny fanairana | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Ireo fanondroana ireo dia manondro ny fanatanterahana sy ny fandrakofan'ny fitsapana; tsy milaza izy ireo fa nandeha tsara avokoa ny asa CI rehetra ho an'ny dikan-teny ankehitriny. Hamarino ny fampandehanana ny workflow ho an'ny dikan-teny kasainao hapetraka.

## Torohevitra momba ny fahasalaman'ny angon-drakitra

Ny mpandinika PHP teratany an'ny Doctor dia mamaky andiana mpanisa ankapoben'ny MySQL na MariaDB raikitra amin'ny alalan'ny fifandraisana amin'ny angon-drakitra efa misy ao amin'ny Cacti. Manao fangatahana famakiana ihany izy isaky ny tatitra (fangatahana roa), tsy mitaky fahazoan-dalana fanampiny na rakitra azo alefa hafa, ary tsy manova mihitsy ny fikirana angon-drakitra. Ireo fanamarinana ireo dia miseho ao amin'ny tatitra web, CLI, JSON, vokatry ny fanaraha-maso, fonosana fanampiana, ary fanaraha-maso ny sata araka ny fandaharam-potoana.

| ID-n'ny fanamarinana | Antony manomboka ny fanadihadiana |
|---|---|
| `database.health_sample` | Latsaky ny 24 ora hatramin'ny nanombohana na ny `FLUSH STATUS`, na tsy misy/tsy mifanaraka ny fotoana fampandehanana |
| `database.connection_capacity` | Fifandraisana ankehitriny na tampon'ny fifandraisana voarakitra farafahakeliny 80% amin'ny `max_connections` ankehitriny |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` farafahakeliny 1%, miaraka amin'ny fangatahana famakiana farafahakeliny 10,000 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` farafahakeliny 25%, miaraka amin'ny tabilao vonjimaika farafahakeliny 1,000 |
| `database.thread_cache` | `Threads_created / Connections` farafahakeliny 5%, miaraka amin'ny fanandramana fifandraisana farafahakeliny 1,000 ary `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` farafahakeliny 1%, miaraka amin'ny baikon-javatra farafahakeliny 1,000 |
| `database.redo_log_waits` | `Innodb_log_waits` tsy aotra |

Ireo dia fetra fanadihadian'ny Doctor, fa tsy tanjona fikirana avy amin'ny mpamatsy. Afa-tsy ny fahaiza-mandray fifandraisana, ny torohevitra mitambatra dia mitaky ny vanim-potoana fanaraha-maso etsy ambony. Ny mpanisa tsy hita, simba endrika, miverina indroa, na lehibe loatra, ny asa tsy ampy, ary ny fomba fiasa thread tsy tohanana dia miteraka fampitandremana fa tsy fitsarana hoe salama na soso-kevitra fanitsiana. Ny fampitandremana dia mety hisy fiantraikany amin'ny satan'ny Nagios sy ny fanairana araka ny fandaharam-potoana rehefa alefa ny **Fanairana amin'ny fampitandremana**.

Vakio miaraka ny mpanisa voarefy sy ny soso-kevitra. Ny sanda mitambatra dia tsy manaporofo ny enta-mavesatra ankehitriny; ny mpanisa dia mety manana tantara famerenana amin'ny laoniny samihafa ary tsy sary iray tsy mivaky. Ny tampon'ny fifandraisana dia mety maneho fetra taloha. Ny fanisana ny baikon-javatra miadana dia miankina amin'ny `long_query_time`, ary ny mpanisa tabilao vonjimaika amin'ny kapila an'ny MySQL dia mety tsy ahitana ireo rakitra mipetraka amin'ny fitadidiana (memory-mapped). Ny taham-pifandraisana ambany dia tsy manaporofo ny tsy fisian'ny fahasemporana. Hamarino ny fironana eo ambanin'ny enta-mavesatra mahazatra, jereo ny drafitry ny fangatahana sy ny fampiasana indray ny fifandraisana, ary refeso ny fitadidiana ao amin'ny **mpampiantrano angon-drakitra** alohan'ny hanovana ny buffer na ny fetran'ny fifandraisana.

Raha tsy hita ireo metrika, hamarino ny fanohanan'ny mpizara sy ny fahafahan'ny kaonty Cacti miditra amin'ny `SHOW GLOBAL STATUS` sy `SHOW GLOBAL VARIABLES`; tsy mangataka fahazoan-dalana ambony kokoa ny Doctor. Ny famaritana ny mpanisa dia avy amin'ny [boky fanondroana ny variable satan'ny MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) sy ny [boky fanondroana ny variable satan'ny MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Tsy misy script na kaody MySQLTuner ampiasaina.

Tsy ilaina ny fifindrana rafitra na fikirana. Apetraho ara-dalàna ny rakitry ny plugin; ny famerenana ireo rakitra ireo amin'ny teo aloha dia manala ireo fitiliana nampiana. Ny sata efa voalahatra teo aloha dia havaozina amin'ny fampandehanana manaraka.

## Ny fomba fitandroana ny fiarovana

Mandeha miaraka amin'ny alalan'ny mpandrindra fanangonana (poller) na ny mpizara tranonkala ny fitaovana fitiliana ary mamaky lalana avy ao amin'ny tabilaon'ny fandrindrana, koa mila mitandrina amin'izay tanterahiny sy ovainy izy.

- Mamaky ihany ny fitiliana. Tsy manova rakitra, fandrindrana, na angona mihitsy izy ireo.
- Tsy mampandeha rakitra azo tanterahina (binaire) voarindra ny Doctor raha tsy mifanaraka amin'ny programa andrasana ny anaran'ilay rakitra (`php`, `rrdtool`, `snmpget`, na `snmpwalk`). Raha tsy izany dia izay afaka manoratra ao amin'ny tabilaon'ny fandrindrana dia afaka misafidy izay ampandehanin'ny Doctor. Ny anarana hafa rehetra dia taterina ho fampitandremana ary tsy tanterahina.
- Tsy mampandeha rakitra azo tanterahina voarindra amin'ny alalan'ny root mihitsy ny Doctor, ary mampandre izy rehefa mandeha amin'ny alalan'ny root.
- Avy amin'ny lisitra voafaritra ihany ny fanamboarana. Ny tsirairay dia mitaky hetsika ataon'ny mpitantana voamarina ao amin'ny sehatra tranonkala na `--yes` eo amin'ny tsipika fibaikoana, ary soratana ao amin'ny rakitry ny zava-mitranga (log) an'ny Cacti avokoa ny tsirairay.

## Ireo famoahana

Manaraka ny SemVer ireo kinova ary mifanaraka amin'ny rakitra `INFO` an'ny fanampin-drindrankajy (plugin). Jereo ny
[dingan'ny famoahana](../../releasing.md) mba hahitana ny fisafidianana kinova, ny sakana CI, ny votoatin'ny fonosana, ny
fitombokase fanamarinana (checksums), ary ny torolalana fiverenana amin'ny teo aloha.

## Fametrahana

Alaivo avy ao amin'ny
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) ny `doctor-VERSION.tar.gz` na `doctor-VERSION.zip` sy ny `SHA256SUMS`.
Hamarino ny fitombokase SHA-256 an'ilay tahiry, avy eo esory ao anatin'ny lahatahiry `plugins/` an'ny Cacti ny lahatahiriny `doctor/`. Ireo no fonosana azo apetraka; manana anaran-dahatahiry hafa ireo tahirim-piforona mandeha ho azy avy amin'ny GitHub. Raha hampiasa asa mbola tsy navoaka avy amin'ny `develop`, dia apetraho avy amin'ny kopian'ny fitoerana loharano.

Ho an'ny kopian'ny fitoerana loharano:

Ataovy clone na esory ao anatin'ny fametrahana Cacti ho `plugins/doctor` ny tahiry. Tsy maintsy atao hoe `doctor` ny anaran'ny lahatahiry, fa tsy `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Apetraho ary velomy ny **Cacti Doctor** ao amin'ny **Fikirakirana > Fitantanana ny fanampin-drindrankajy**, avy eo omeo ny sahan'andraikitra **Mpanjery Doctor**, **Mpandraharaha Doctor**, na **Mpitantana Doctor** amin'ny alalan'ny alalan'ny mpampiasa na vondrona ao amin'ny Cacti. Mitazona ny fahazoan-dalana Mpitantana aorian'ny fanavaozana ireo fanomezan-dalana **Cacti Doctor** efa misy. Miseho eo ambanin'ny **Fitaovana > Cacti Doctor** ny tatitra.

## Ireo fiteny

Mandefa fandikan-teny amin'ny teny espaniola (Espaina, `es-ES`), frantsay (`fr-FR`), alemà (`de-DE`), sinoa tsotra (`zh-CN`), hindi (`hi-IN`), arabo (`ar-SA`), ary japoney (`ja-JP`) ny Doctor. Asehon'ny Cacti izy ireo rehefa velona ny fanohanana fiteny (**Fikirakirana > Fandrindrana > Ankapobeny > Fanohanana fiteny**) ary misafidy ilay fiteny ny mpampiasa iray. Manaraka ny fitenin'ny Cacti ny pejy tranonkala, ny fandrindrana, ary ny hafatra sy lahatsoratry ny tatitra avoakan'ny tsipika fibaikoana; ny tatitry ny tsipika fibaikoana mihitsy dia mampiasa ny fiteny fototry ny Cacti, izay mijanona ho anglisy raha tsy ovanao.

Tsy adika mihitsy ny vokatra azo vakian'ny milina: mijanona amin'ny teny anglisy ny famantarana fanamarinana (check IDs), ny fanalahidy sy ny sandan'ny sata JSON, ny vokatra avy amin'ny `--format=nagios` sy `--format=prometheus`, ny andalana ao amin'ny rakitry ny zava-mitranga, ary ny lohatenin'ny fizarana ao amin'ny fonosan-drakitra ho an'ny fanohanana mba hiasan'ireo script sy ny fanaraha-maso foana amin'ny fiteny rehetra. Ny lahatsoratra `summary` sy `detail` an'ny fanamarinana tsirairay ihany no ampahany voadika amin'ny tatitra JSON.

Misy katalogy espaniola any Amerika Latina (`es-419`) ihany koa alefa miaraka aminy, saingy na ny Cacti 1.2 na ny Cacti 1.3 dia samy tsy manana fiteny espaniola any Amerika Latina azo safidina, koa tsy mandeha izany raha tsy manampy iray ny Cacti. Mandra-pahatongan'izany, safidio ny espaniola (`es-ES`).

Mamaky ny katalogin'ny fanampin-drindrankajy iray avy ao amin'ny `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` ny Cacti miaraka amin'ny `doctor` ho sehatra lahatsoratra (text domain), na amin'ny 1.2.x na amin'ny 1.3 (ny 1.3 dia mamaha ny lahatahirin'ny fanampin-drindrankajy amin'ny alalan'ny lalan'ny fanampin-drindrankajy azo arindra).

## Ireo ambaratongan'ny fidirana

| Sahan'andraikitra | Fahafahana miasa |
|---|---|
| Mpanjery Doctor | Mamaky ny satan'ny fanamarinana voalahatra farany, ny fotoana fijerena, ny fahavaozana ary ny tantara mitambatra vao haingana. Tsy misy baiko fitiliana, tsipiriany manta, fikirakirana na fanamboarana. |
| Mpandraharaha Doctor | Mandefa tatitra fitiliana miaraka amin'ny fetran'ny dingana 120 segondra, mijery ireo tsipiriany voasarona tsiambaratelo, ary manaiky ireo zavatra hita. Tsy misy fanovana fandrindrana na fanamboarana. |
| Mpitantana Doctor | Fahafahan'ny Mpandraharaha miampy ny fanamboarana ao amin'ny lisitra ekena sy ny fandrindrana ny Doctor. Mitaky ny sahan'andraikitra Fandrindrana/Fitaovana rafitra an'ny Cacti ihany koa ny fanamboarana sy ny fandrindrana. |

Ny lisitry ny Fitaovana (Utilities) dia manokatra ny pejy ho an'ny sahan'andraikitra Doctor ambony indrindra nomena ny mpampiasa, anisan'izany ny fanomezan-dalana avy amin'ny vondrona. Tsy mahazo fanomezan-dalana mandeha ho azy ireo sahan'andraikitra Mpanjery sy Mpandraharaha vaovao. Mijanona mifatotra amin'ny `doctor.php` ho toy ny Mpitantana ny famantarana sahan'andraikitra voalohany, izay mitahiry ny fidiran'ny mpampiasa sy ny vondrona efa misy.

Avy amin'ny fanamarinana voalahatra ny angon'ny Mpanjery. Velomy ny fandaharam-potoana alohan'ny hanomezana ny fahafahan'ny Mpanjery; mampiseho **tsy fantatra**, fa tsy salama mihitsy, ireo fijerena tsy hita na tara loatra. Mitahiry ireo fanisana mitambatra voalahatra 20 farany ny tantara ary manilika ny satan'ny fitaovana. Manomboka fitiliana vaovao am-pahazavana ny Mpandraharaha; ny fanavaozana pejy mahazatra dia mampiasa ny tatitra farany tao amin'ny fivoriana (session) nisy azy.

Mampiasa ny alalan'ny fitaovana ananan'ny mpampiasa ankehitriny ny tsipiriany sy ny fitambaran'ny fitaovana. Mitaky ny sahan'andraikitra Fitantanana ny rakitry ny zava-mitranga an'ny Cacti fanampiny ireo sombin'ny rakitry ny zava-mitranga. Saronana ireo tsiambaratelo alohan'ny hitahirizana na hanehoana ny tsipiriany fitiliana ao amin'ny fivoriana tranonkala. Mijanona fehezin'ny kaontin'ny rafitra fandidiana ny fidirana amin'ny tsipika fibaikoana.

Ho an'ny tena manokana ihany ny fankatoavana (acknowledgments) ary voarakitra ao amin'ny rakitry ny zava-mitranga an'ny Cacti. Tsy mihatra afa-tsy amin'ny zavatra hita sy porofo mitovy izy ireo; mitaky fankatoavana vaovao ny porofo niova. Tsy manova ny sata nandalo/fampitandremana/tsy nahomby mihitsy izy ireo, tsy manafoana fanairana, ary tsy manamarika fanamarinana tsy nahomby ho salama. Tsy mitovy amin'ny fanavahana fampitandremana nekena izany, izay misy fiantraikany amin'ny politikan'ny fanairana nefa tsy manova ny sata voamarika ary voalaza etsy ambany.

Mitaky POST sy marika famantarana CSRF manan-kery ny hetsika rehetra. Manolotra pejy fanamafisana misaraka miaraka amin'ny rohy Fanafoanana tsy mandefa fangatahana ny fanamboarana, ary mandrakitra ny mpampiasa nanao azy sy ny vokatra ao amin'ny rakitry ny zava-mitranga an'ny Cacti.

## Tsipika fibaikoana

Alefaso avy ao amin'ny fakan'ny Cacti amin'ny alalan'ny mpampiasa mpandrindra fanangonana (poller) an'ny Cacti ireto, fa tsy root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Manonta andalana iray isaky ny fanamarinana miaraka amin'ny satany, ny sokajiny, ny famintinany, ary ny tsipiriany ny vokatra lahatsoratra. Ny `--json` dia manonta zavatra `summary` misy ny fanisana ny sata sy tabilao `checks` izay mitondra ny `id`, `category`, `status`, `summary`, `detail`, ary `repair`/`repairable` rehefa misy fanamboarana ao amin'ny lisitra ekena mihatra.

| Sata fivoahana | Dikany |
|---|---|
| `0` | Tsy nisy fanamarinana tsy nahomby, na nahomby ny fanamboarana nangatahina. Tsy manova ny sata fivoahana ny fampitandremana. |
| `1` | Nisy fanamarinana iray farafahakeliny tsy nahomby, na tsy nahomby ny fanamboarana nangatahina. |
| `2` | Hadisoana fampiasana: fanamboarana nandeha tsy misy `--yes` (tsy mila izany ny `--preview`), ID fanamboarana tsy fantatra, endrika famoahana tsy fantatra, fitambarana `--symptom` na endrika tsy tohanana, na fametrahana Cacti tsy hita. |

Mampiakatra ny `memory_limit` ho an'ny script CLI rehetra ny Cacti, koa eo amin'ny pejy tranonkala ihany no manan-danja ny fanamarinana ny fikirakirana PHP mandritra ny fandehanana.

## Fanamarinana voalahatra sy fanairana

Eo ambanin'ny **Fikirakirana > Fandrindrana > Doctor**, velomy ny **Alefaso araka ny fandaharam-potoana ny fanamarinana** ary misafidiana elanelam-potoana manomboka amin'ny 15 minitra ka hatramin'ny iray andro. Aorian'ny tsingerin'ny mpandrindra fanangonana tsirairay tonga amin'ny fotoanany, dia mandefa ny fanamarinana rehetra ao anaty dingana ambadika ny Doctor, mba tsy hisy fiantraikany amin'ny fotoana fiasan'ny mpandrindra fanangonana mihitsy.

Mandrakitra ny sata voamarika ho an'ny fanamarinana tsirairay ny fihazakazahana tsirairay. Misy fiantraikany amin'ny politikan'ny fanairana ny fanavahana fampitandremana mavitrika nefa tsy manova izany fanamarihana izany. Rehefa manomboka na mijanona tsy mahomby ny fanamarinana iray, dia manoratra ny fiovana ao amin'ny rakitry ny zava-mitranga an'ny Cacti ny Doctor ary, raha voapetraka ny **Adiresy mailaka fanairana**, dia mandefa mailaka any amin'ireo adiresy ireo amin'ny alalan'ny fandrindrana mailaka an'ny Cacti. Manampy ny fiovana miditra sy mivoaka amin'ny fampitandremana ny **Manaitra amin'ny fampitandremana**. Ny fihazakazahana voalohany dia tsy mandrakitra afa-tsy mari-drefy fototra.

Mandeha ao amin'ny mpandrindra fanangonana voalohany eo ambanin'ny hidy fanoroana ao amin'ny angon-drakitra ny tatitra voalahatra ary manana fetran'ny mpiasa roa minitra. Taterin'ny Doctor ny fanombohana farany sy ny fahavitana nahomby mba ho hita ireo vokatra tsy hita na lany andro. Raisina ho ara-potoana ny vokatra mandritra ny elanelam-potoana miampy tsingerina fanangonana iray sy telo minitra. Averina andramana aorian'ny 5, 10, 20 minitra sy mihoatra, hatramin'ny elanelam-potoana mahazatra, ny fihazakazahana tsy vita. Tazonina hatramin'ny fanandramana intelo miaraka amin'ny elanelam-potoana mitombo ny fandefasana fanairana tsy nahomby; aorian'izay, ahitsio ny fandrindrana mailaka an'ny Cacti ary alefaso ny `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` amin'ny alalan'ny mpampiasa mpandrindra fanangonana. Ny faneken'ny mpizara mailaka dia tsy manamafy ny fahatongavana ao amin'ny boaty fandraisana.

Io tabilao io ihany no mametraka ny fetra ho an'ny fotoana fiasan'ny mpandrindra fanangonana (80%-n'ny elanelam-potoana), ny toerana malalaka amin'ny kapila RRA (fampitandremana ambanin'ny 10%, tsy fahombiazana ambanin'ny 2%), ny fivilian'ny famantaranandron'ny angon-drakitra (fampitandremana mihoatra ny 5 segondra, tsy fahombiazana mihoatra ny 60), ary ny haben'ny rakitry ny zava-mitranga an'ny Cacti (100 MB). Miverina amin'ireo sanda fototra ireo ny sanda banga na tsy manan-kery.

## Fampidirana amin'ny fanaraha-maso

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

Manonta andalana sata iray miaraka amin'ny angon-tsangan'ny fahombiazana ny `--format=nagios` ary mivoaka miaraka amin'ny `0` (OK), `1` (WARNING), na `2` (CRITICAL), mba hahafahan'ny Nagios, Icinga, na izay rafitra mifanaraka mampandeha azy mivantana. Manoratra ny endrika lahatsoratra Prometheus ho an'ny mpanangona textfile an'ny node_exporter ny `--format=prometheus`: `cacti_doctor_check_status` isaky ny fanamarinana (0 nandalo na fampitandremana nekena, 1 fampitandremana tokony handraisana fepetra, 2 tsy fahombiazana), `cacti_doctor_check_observed_status` alohan'ny fanavahana, `cacti_doctor_check_accepted`, `cacti_doctor_checks` isaky ny sata, ary `cacti_doctor_last_run_timestamp_seconds`. Ahitana saha `assessment` ireo andalana fanamarinana JSON; midika ny `not_assessed` fa tsy afaka nanatsoaka hevitra avy amin'ny angona misy ilay fanamarinana.

## Fonosan-drakitra ho an'ny fanohanana

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Rakitra lahatsoratra tokana ilay fonosana izay ahitana ny kinovan'ny Doctor, Cacti, PHP, OS, ary ny angon-drakitra, ny antontan'isan'ny mpandrindra fanangonana sy ny Boost, ny tatitra feno, ary ireo andalana 200 farany ao amin'ny rakitry ny zava-mitranga an'ny Cacti. Saronana ireo sanda manaraka ny anaran'ny tenimiafina, tsiambaratelo, token, community, ary fanalahidy. Mamorona ilay rakitra ho tsy azon'ny hafa vakina afa-tsy ny tompony ny Doctor ary mandà ny hanoratra eo ambonin'ny rakitra efa misy. Hamarino izany alohan'ny hamoahana azy na aiza na aiza.

## Politikan'ny fanamboarana

Doctor dia ahitana fanamboarana iray, `runtime_directories`. Mamorona ny lahatahiry fampandehanana Cacti tsy ampy izy io ary manampy ny zo famakiana, fanoratana, ary fampandehanana ho an'ny tompony nefa tsy manala ny alalana efa misy.

Mikendry ny `$cache_path`, `$log_path`, ary `$rra_path` izy io amin'ny Cacti 1.3, na ny lahatahiry `cache`, `log`, ary `rra` ao amin'ny fametrahana amin'ny toe-javatra hafa. Mandingana ny lahatahiry efa azo anoratana izy, mandà ny lahatahiry ivelan'ny fametrahana Cacti (toy ny lahatahiry tatitra eo ambanin'ny `/var/log`), mandà ny rohy an'ohatra (symbolic links), ary mandà ny handeha amin'ny maha-root. Tsy manaraka ny `path_cactilog` mihitsy izy, ka ny rakitra tatitra namboarina ao anatin'ny lahatahiry kaody dia tsy afaka mamily ny fanamboarana ho any. Mbola manamarina ny lahatahirin'ny rakitra tatitra namboarina ihany ny fitiliana amin'ny famoahana rehetra.

Tsy manova ny tompony izy, tsy mandefa baiko shell, tsy manoratra indray ny fikirakirana, ary tsy manova ny angon-drakitry ny rindranasa Cacti. Ny fanamboarana vaovao tsirairay dia tsy maintsy ahitana fitiliana, mpitantana ao amin'ny lisitra nahazoana alalana, fanamafisana, firaketana fanaraha-maso, ary fitsapana.

## Fanadihadiana ny soritr'aretina

Ny Mpandraharaha sy ny Mpitantandra dia afaka misafidy ny **Hanadihady soritr'aretina** eo amin'ny pejin'ny Doctor. Ireo fitsipika ireo ihany koa dia azo ampiasaina amin'ny alalan'ny `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, na `alerts_missing`, miaraka amin'ny vokatra lahatsoratra na JSON. Ny fonosana fanohanana dia ahitana ny fanadihadiana soritr'aretina mifandraika amin'izany.

Ny safidy tsirairay dia mitanisa ny fanamarinana voamarika sy ny dingana fanamarinana manaraka. Vinavina fotsiny ireo safidy ireo, fa tsy anton-javatra fototra voamarina. Ny fandinihana tsy ampy, tsy voavaly, na lany daty dia tsy mametraka antony mihitsy. Ny fanadihadiana amin'ny tranonkala dia mampiasa ny tatitra voasivana araka ny alalana; ny tatitra CLI kosa dia mampiasa ny fahafahana miditra ananan'ny kaontin'ny rafitra fandidiana.

## Fahavaozan'ny fanavaozana RRD

Ny `filesystem.rrd_stale` dia manamarina loharanom-baovao mavitrika hatramin'ny 500, tsy tafiditra ao ireo fitaovana najanona sy tsy mandeha. Amin'ny fametrahana lehibe kokoa dia miova isan'ora ny santionany, ka ny fandefasana miverimberina dia mahasahana rakitra samihafa. Mampitaha ny fotoana nanovana ny rakitra amin'ny lehibe indrindra amin'ny elanelam-potoanan'ny poller, ny dingana RRD loharano ary ny dingan'ny mombamomba, ampitomboina amin'ny **Elanelam-potoana RRD lany daty** (3 no mahazatra). Mampiseho ny rakitra telo tranainy indrindra lany daty sy ny isan'ny fitaovana voakasika izy io. Ny valiny amin'ny tranonkala dia tsy ahitana afa-tsy ireo fitaovana nahazoana alalana.

Ny `filesystem.rrd_files` dia fanamarinana ny fisiana misaraka. Mitady ny rakitra RRD ho an'ny loharanom-baovao mavitrika hatramin'ny 5 000 izy io, tafiditra ao ireo eo amin'ny fitaovana najanona na tsy mandeha, ary mampiasa ny santionany isan'ora mitovy amin'izany.

Ny Boost dia manampy indroa ny elanelam-potoana fanadiovana (flush interval) namboarina ho tahiry famelana fanoratana amin'ny kapila. Ho an'ny mpanoratra nahemotra hafa, amboary ny **Famelana fanoratana RRD nahemotra (segondra)**. Ny `RRDCACHED_ADDRESS` nambara nefa tsy misy famelana, na elanelam-potoana Boost tsy manan-kery, dia miteraka valiny tsy voavaly. Tsy manadio cache mihitsy ny Doctor mba hanaovana io fanamarinana io. Ny fotoana fanovana dia porofon'ny hetsika eo amin'ny kapila, fa tsy porofon'ny fanangonana angona nahomby. Ny fitahirizana ivelany izay tsy hitan'ny Doctor dia tsy maintsy amboarina mazava tsara.

Ny rakitra tsy hita, tsy azo vakiana ary manana daty amin'ny hoavy dia isaina ao amin'ny antsipiriany. Ny valiny dia tsy voavaly raha toa ka tsy misy rakitra santionany azo vakiana mihitsy. Ny valiny avy amin'ny santionany dia milaza fa ampahany ihany amin'ny fametrahana no voasahany; ny fahombiazana dia tsy mahasahana ny rakitra tsy natao santionany.

## Topimaso fanamboarana sy tantaran'ny fanaraha-maso

Ny pejy fanamboaran'ny Mpitantandra dia mampiseho ny lalana voakasika tsirairay, ny hetsika soso-kevitra, ny alalana ankehitriny ary ny alalana kendrena. Ny fankatoavana dia mifamatotra amin'io topimaso io, amin'ny mpampiasa manao ny hetsika ary amin'ny faharetana dimy minitra. Ny fanamafisana dia mandany ny topimaso; ny rafitra rakitra niova dia mitaky topimaso hafa. Ny fampandehanana amin'ny maha-root, ny lalana ivelan'ny fametrahana, ny rohy mitaky fanamboarana ary ny alalan'ny rafitra rakitra tsy feno dia manakana ny fankatoavana.

Ny `--repair=runtime_directories --preview` dia manonta drafitra JSON azo vakiana ihany. Ny `--repair=runtime_directories --yes` dia mankatoa drafitra CLI vao nokajiana ary manamarina azy indray alohan'ny fampandehanana. Ny kaonty CLI dia tsy maintsy efa nahazo alalana hanamboatra ny fametrahana; tsy mandova ny andraikitry ny tranonkala izy io.

Tsy maintsy tehirizina alohan'ny fanovana ny rafitra rakitra ny firaketana `repair.started` voarafitra. Ny firaketana `repair.completed` mifandray dia ahitana ny sarin-toetra taorian'ny fanamboarana sy ny valin'ny fanamarinana. Ny asa tapaka dia mamela firaketana nanombohana ho an'ny fanadihadiana. Ny tsy fahombiazan'ny fanaraha-maso fahavitana dia tatitra ho tsy fahombiazana na dia nisy aza ny fanovana ny rafitra rakitra. Ny Doctor dia manampy ny alalan'ny tompony ary mamorona lahatahiry; tsy manandrana famerenana ho azy amin'ny teo aloha izy.

Ny Mpitantandra manana ny alalana Settings/System Utilities ao amin'ny Cacti dia afaka mamaky ny firaketana fanaraha-maso 20 farany eo amin'ny pejin'ny Doctor. Mitahiry ny firaketana 200 farany ao amin'ny `plugin_doctor_audit` ny plugin; mirakitra ny ID, ny hetsika ary ny mpanao azy ihany koa ny tatitra Cacti. Voasivana sy voaaro ny votoatin'ny fanaraha-maso.

## Fampitandremana ekena

Ny Mpitantandra manana ny alalana Settings/System Utilities ao amin'ny Cacti dia afaka mamorona **Fanavahana fampitandremana** avy amin'ny fampitandremana vaovao sy voavaly eo amin'ny pejin'ny Doctor. Ny fanavahana dia mitaky tompony, antony ary daty famerenana UTC ao anatin'ny 90 andro. Tapitra amin'ny misasakalina UTC amin'ny fiandohan'io daty io ny fe-potoana. Fanavahana hatramin'ny 100 no azo amboarina. Mampiseho ireo fidirana lany daty sy ireo ID tsy hita ao amin'ny tatitra ankehitriny ny lisitra, ary mamela ny fanesorana azy ireo.

Ny fampitandremana voamarika dia mijanona ho hita, miaraka amin'ny tompony, ny antony ary ny fahataperan'ny fe-potoana ao amin'ny antsipirian'ny fitiliana. Ny JSON dia mitazona ny sata voamarika ary manampy ny metadata `accepted` sy `acceptance`. Ny Nagios dia manilika ny fampitandremana ekena mavitrika amin'ny hamafin'ny fivoahany fa manonona azy ireo ao amin'ny vokatra avoakany. Ny Prometheus dia manondrana na ny hamafin'ny voamarika na ny tokony handraisana fepetra. Tsy miova ny sata fivoahana CLI mahazatra: ny fampitandremana dia efa mivoaka amin'ny aotra, ny tsy fahombiazana mivoaka amin'ny iray.

Ny fampitandremana voalahatra dia ajanona mandritra ny fotoana iainan'ny fanavahana; ny fahataperan'ny fe-potoana na ny fanesorana dia mahatonga ny fampitandremana mitohy ho mendrika fampitandremana indray. Ny fiovana ho tsy fahombiazana sy ny fiverenana amin'ny laoniny avy amin'ny tsy fahombiazana dia mbola mendrika fanairana ihany. Ny valiny tsy voavaly na ny tsy fahombiazana dia tsy azo ekena. Misaraka ny fankatoavana manokana ary tsy manafoana na inona naona. Ny famoronana sy ny fanesorana fanavahana dia atao miaraka amin'ny firaketana fanaraha-maso ao anaty fifampiraharahana iray (transactional).

Ny fanavaozana dia mamorona ny `plugin_doctor_audit` sy `plugin_doctor_acceptance` nefa tsy manova ny angon-drakitry ny rindranasa Cacti. Aondrano ny tantara rehetra ilainao alohan'ny hanesorana ny fametrahana: ny fanesorana dia mamafa ireo tabilao roa an'ny plugin sy ny fikirakirany. Ny famerenana ny rakitry ny plugin amin'ny teo aloha dia mamela ireo tabilao ho azo ampiasaina amin'ny fanadihadiana, saingy ireo kinova taloha dia tsy manaja ny fanavahana fampitandremana.

## Fepetra takiana

| Cacti | PHP | Fanamarihana |
|---|---|---|
| 1.2.20 | 5.4 na vaovao kokoa | Ny kaodin'ny Doctor mihitsy dia mifanaraka amin'ny PHP 5.4 mba hahafahany mitily ireo rafitra taloha alohan'ny fanavaozana |
| 1.2.31 | 8.0 na vaovao kokoa | Ny `composer.json` an'ny Cacti dia mitaky `>=8.0` |
| 1.2.x ankehitriny | 8.2 na vaovao kokoa | Ny `composer.json` an'ny Cacti dia mitaky `>=8.2` |
| `develop` (1.3) | 8.3 na vaovao kokoa | Ny `composer.json` an'ny Cacti dia mitaky `^8.3` |

Ny andalana **Fifanarahana PHP amin'ny Cacti napetraka** dia mampitaha ny kinova PHP mandeha amin'izao fotoana izao amin'ny fepetra takian'ny PHP ao amin'ny `composer.json` fototry ny Cacti mihitsy, tafiditra ao ny fetra ambony amin'ny famerana caret toy ny `^8.3`. Ny rakitra fampandehanana PHP CLI namboarina dia hamarinina amin'io fepetra io ihany. Ny Doctor dia mahafantatra ny endrika famerana `>=` sy `^` ampiasain'ireo fonosana Cacti ireo. Ny fepetra tsy azo vakiana, ratsy firafitra, tsy hita, na tsy fantatra dia miteraka fampitandremana; ny fametrahana Cacti 1.2.20–1.2.30 tsy misy manifest dia mitazona ny fetra ambany PHP 5.4 voarakitra an-tsoratra ho an'ny mpanapetraka. Ny fifanarahan'ny Doctor amin'ny PHP 5.4 dia tsy midika fa mifanaraka amin'ny fametrahana Cacti vaovao kokoa izy.

Ny andalana **Fanohanana fiarovana PHP avy amin'ny loharano** dia mamaly fanontaniana samihafa: mbola mahazo fanamboarana fiarovana avy amin'ny tetikasa PHP ve io sampana famoahana PHP io? Mitatitra ny daty fiafaran'ny fanohanana fiarovana navoaka ho an'ny sampana izy io ary mampitandrina aorian'io daty io. Ohatra, ny PHP 8.1 dia mety mahafeno ny fepetra fampandehanana amin'ny fametrahana Cacti taloha nefa tsy mahazo fanamboarana fiarovana avy amin'ny loharano intsony. Ny valiny mandeha tsara dia tsy midika hoe vaovao ny kinova patch napetraka, ary ny Doctor dia tsy afaka mamaritra raha manome fanamboarana nampidirina taty aoriana (backported fixes) ny mpamatsy rafitra fandidiana.

Ny daty fanohanana dia tafiditra ao amin'ny Doctor avy amin'ny [fandaharam-potoanan'ny fanohanana PHP](https://www.php.net/supported-versions.php) sy ny [lisitry ny fiafaran'ny fiainana](https://www.php.net/eol.php), nohamarinina farany tamin'ny 2026-11-08. Ny sampana tsy fantatra sy ny famoahana mialoha (prereleases) dia miteraka fampitandremana fa tsy heverina ho mandeha ho azy. Tsy misy fangatahana tambajotra atao mandritra ny fitiliana. Havaozy ny angon-drakitry ny fanohanan'ny Doctor rehefa mamoaka fandaharam-potoana vaovao ny PHP. Tsy miova ny ID JSON/fanaraha-maso efa misy `php.version` sy `php.security_baseline`.

## Fampandrosoana

Ny andiana fitsapana tsirairay dia mampiasa Pest ary mandeha amin'ny PHP 8.2 na vaovao kokoa:

```console
composer install
composer test
```

Ireo fitsapana ireo dia manolo ny fiasa Cacti antsoin'ny Doctor amin'ny solontena kely ao amin'ny `tests/CactiStubs.php`, ka afaka mandeha tsy misy fametrahana Cacti izy ireo.

Ny GitHub Actions dia mandefa karazana fanamarinana efatra isaky ny push sy pull request:

- `php -l` amin'ny rakitra PHP rehetra eo ambanin'ny PHP 5.4, 5.6, 7.0, 7.1, 7.4, ary 8.0 hatramin'ny 8.4.
- Ny andiana fitsapana tsirairay amin'ny PHP 8.2, 8.3, ary 8.4.
- `locales/build_gettext.sh --check`, izay tsy mahomby raha lany daty ny môdely fandikana, tsy feno na manjavozavo ny katalogy, na tsy mitovy amin'ny loharanony ny katalogy voaangona.
- Asa fampidirana (integration jobs) fito izay mametraka ny Cacti 1.2.20, ny sampana 1.2.x ankehitriny, ary ny `develop` amin'ny MySQL sy MariaDB, miaraka amin'ny cmd.php sy Spine. Ny asa tsirairay dia mametraka sy mampavitrika ny plugin, mandefa ny tatitra CLI feno, ary manamarina ny drafitry ny tatitra, ny fitambaran'ny famintinana, ny sata andrasana, ary ny andiana tsy fahombiazana marina. Avy eo izy dia manimba lalana binary iray sy ny marik'oran'ny poller, manamarina fa samy voalaza izy roa, mamerina azy ireo amin'ny laoniny, manandrana ny fanamboarana sy ny fanamafisany, ary manatanteraka ny fanajanona, fampavitrihana, fanesorana fametrahana, ary fametrahana indray. Tehirizina ho artifact ny tatitra JSON rehefa tsy mahomby ny asa iray.

## Fandraisana anjara

Alefa ao amin'ny `develop` ny pull requests. Tazomy hifanaraka amin'ny PHP 5.4 ireo rakitra ho an'ny famokarana, ary ampiasao ny fomba fanoratry ny Cacti: tabulations, lahatsoratra voafaritry ny farango tokana, ary ireo mpanampy an'ny Cacti toy ny `read_config_option()` sy `db_fetch_cell()`. Manampia fitsapana isan-tsokajiny (unit test) isaky ny fanovana fiasa, soniavo ireo commit-nao (`git commit -s`), ary manampia andalana ao amin'ny `CHANGELOG.md`.

### Fandikan-teny

Fonosy ao anatin'ny `__('...', 'doctor')` (na `__n()`, `__x()`, `__esc()`) ny hafatra rehetra hitan'ny mpampiasa, ary omeo endrika lahatsoratra tokana miaraka amin'ny solon-toerana `%s`/`%d` mifanarakaraka ny fehezanteny misy sanda fa aza manambatra singa maromaro. Ny `__()` an'ny Cacti dia manamboatra ny endriky ny hafatra rehefa misy mpanondro endrika ihany ary tsy manohana ny endrika manondro toerana toy ny `%1$s`. Mamadika ny `%%` ho `%` ihany koa izy alohan'ny fanamboarana endrika, koa aza mametraka marika isan-jato mivantana ao anaty hafatra mihitsy: ampitoy ho toy ny argument ny sanda miaraka amin'ny marikany (`__('Usage: %s', '50%', 'doctor')`). Mijanona amin'ny teny anglisy ireo andalan'ny tatitra (log): ampiasao ny `doctor_repair_message()` ho an'ny lahatsoratra fanamboarana ary ny `doctor_n_()` ho an'ireo hafatra voarakitra anaty tatitra ka adika amin'ny toerana isehoany ihany. Aza adika ireo famantarana fanamarinana (check IDs), fanalahidy JSON, teny fototra milaza sata, vokatra fanaraha-maso, ary ireo andalan'ny tatitra.

Ny `locales/build_gettext.sh` dia mamorona indray ny môdely `locales/po/cacti.pot`, manambatra azy ao amin'ny katalaogy tsirairay `locales/po/<locale>.po`, ary manangona ny `locales/LC_MESSAGES/<locale>.mo`; ataovy anaty commit izy telo ireo. Mandefa `sh locales/build_gettext.sh --check` ny CI, izay tsy mahomby raha efa lany andro ny môdely, na tsy ampy na misy fidirana manjavozavo (fuzzy) ny katalaogy iray, na tsy mitovy ny solon-toerana, na efa lany andro ny rakitra voangona. Noho izany, ny hafatra novaina dia mila fanavaozana ny fandikan-teniny ao anatin'ilay pull request ihany. Mila GNU gettext izany (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Ny fiteny vaovao dia rakitra `<locale>.po` vaovao omena anarana araka ny fomba fanomezan'ny Cacti anarana ireo fiteny (ohatra `pt-BR`).

## Fiarovana

Tatitrao manokana ireo lesoka ara-piarovana araka ny voalaza ao amin'ny [SECURITY.md](../../../SECURITY.md), fa tsy ao amin'ny olana (issues) ho an'ny daholobe.

## Fahazoan-dalana

Copyright (C) 2026 Thomas Vincent. Navoaka eo ambanin'ny GNU General Public License, dikan-teny faha-2 na vaovao kokoa. Jereo ny [LICENSE](../../../LICENSE).
