<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kakti iliyovaa stethoskopu. Chunguza. Rekebisha. Fuatilia.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Hali ya Lango la Ubora"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Leseni: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ na 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor ni programu-jalizi ya Cacti inayochunguza usakinishaji kwa mkupuo mmoja na kutekeleza marekebisho madogo pale tu msimamizi anapoyaomba.

**Hali: bado inatengenezwa, kabla ya 1.0.** Toleo la hivi karibuni ni [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Kiraka hiki kinaongeza katalogi za Kihindi na Kiarabu pamoja na miongozo ya watumiaji iliyotafsiriwa juu ya ufikiaji kulingana na majukumu, uchunguzi elekezi, ukaguzi wa upya wa RRD wenye wigo maalum, hakiki za marekebisho na historia ya ukaguzi, vighairi vya maonyo vilivyokubaliwa, na tafsiri katika toleo la 0.6.0. Tazama [CHANGELOG.md](../../../CHANGELOG.md) kwa maelezo zaidi.

## Picha za skrini

Mipangilio ya uchunguzi na uratibu katika usakinishaji wa maonyesho uliotengwa wa
Cacti 1.2.31 unaoendesha PHP 8.3.36, ikijumuisha uoanifu wa PHP wa Cacti, usaidizi
wa kiusalama wa chanzo asili, na ukaguzi wa afya ya hifadhidata. Maonyo na hitilafu
zinazoonyeshwa hapa zinaelezea mazingira hayo ya maonyesho.

![Jedwali la uchunguzi la Doctor lenye matokeo ya kufaulu, onyo, na kushindwa](../../screenshots/diagnostics.png)

![Mipangilio ya uratibu, arifa, na vizingiti ya Doctor](../../screenshots/settings.png)

Matatizo ya Cacti kwa kawaida hujitokeza kama dalili: grafu tupu, poller iliyosimama, au programu-jalizi inayokataa kusakinishwa. Chanzo mara nyingi huwa sharti la awali lililobadilika, kama vile kiendelezi cha PHP kilichokosekana katika toleo la CLI, saraka ya kumbukumbu ambayo poller haiwezi kuandikia, njia ya RRDtool inayoelekeza kwenye faili ya programu isiyo sahihi, au hifadhidata isiyo na majedwali ya saa za eneo. Doctor hukagua masharti hayo moja kwa moja na kuripoti kila moja kama imefaulu, onyo, au imeshindwa pamoja na sentensi inayoeleza kile kilichopatikana. Ripoti hiyohiyo inapatikana kwenye ukurasa wa wavuti, kwenye mstari wa amri, na kama JSON kwa ajili ya ufuatiliaji.

## Inachokagua

| Eneo | Ukaguzi |
|---|---|
| Doctor | Iwapo Doctor yenyewe inaendeshwa kama root, jambo ambalo lingesababisha ukaguzi wa ruhusa kuelezea akaunti isiyo sahihi |
| Cacti na PHP | Toleo la Cacti, uboreshaji ambao kisakinishi hakikuwahi kukamilisha, programu-jalizi zilizowashwa ambazo faili zake zinakosekana, uoanifu wa PHP na kifurushi cha Cacti kilichosakinishwa, hali ya usaidizi wa kiusalama wa chanzo asili cha PHP |
| Viendelezi vya PHP | Viendelezi vinavyohitajika katika PHP ya wavuti na katika PHP ya CLI ambayo poller hutumia, pamoja na vipengele vinavyopendekezwa |
| Usanidi wa PHP | `memory_limit`, `max_execution_time`, na `date.timezone`, kwa kutumia mapendekezo ya Cacti yenyewe |
| Hifadhidata | Muunganisho, toleo la seva dhidi ya pendekezo la Cacti, seti ya herufi ya UTF-8, majedwali ya saa za eneo, majedwali makuu, mkengeuko wa saa kutoka kwa seva pangishi ya PHP, na mipangilio ya InnoDB ambayo Cacti huashiria kama hitilafu |
| Afya ya hifadhidata | Uwezo wa miunganisho, usomaji wa bwawa la bafa, majedwali ya muda ya diski, uundaji wa nyuzi za muunganisho, amri za polepole, na kusubiri kwa bafa ya kumbukumbu ya InnoDB, pamoja na mapendekezo ya uboreshaji kulingana na mzigo wa kazi |
| Mfumo wa faili | Saraka za akiba, kumbukumbu, na RRA zinazoweza kuandikwa; nafasi huru kwa faili za RRD; vyanzo amilifu vya data visivyo na faili ya RRD au vyenye masasisho ya faili yaliyochelewa; `include/config.php` isiyoweza kusomwa na kila mtu; kumbukumbu ya Cacti inayoweza kuandikwa na isiyo kubwa kupita kiasi |
| Faili za programu | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, na Spine inapokuwa ndiyo poller iliyosanidiwa, ikijumuisha matoleo pale ambapo Cacti inataja toleo |
| Kumbukumbu | Hitilafu miongoni mwa mistari ya hivi karibuni zaidi ya kumbukumbu ya Cacti, pamoja na ujumbe unaojitokeza mara nyingi zaidi |
| Vifaa | Vifaa vilivyowashwa ambavyo vimezimika au vinavyorejea, vitatu vilivyozimika kwa muda mrefu zaidi pamoja na hitilafu yake ya mwisho, na kushindwa wakati vifaa vingi vimezimika kwa wakati mmoja |
| Poller | Aina na muda wa marudio wa poller, muda tangu poller kuu ilipokamilika mara ya mwisho, muda wa utekelezaji ukilinganishwa na muda wa marudio, matokeo ya poller ambayo hayakuwahi kufikia faili ya RRD, poller za mbali zilizosimama kuripoti, Boost iliyokwama, na usanidi wa Spine unaoelekeza kwenye hifadhidata tofauti |

Kila ukaguzi una kitambulisho thabiti, kama vile `database.timezone` au `binary.rrdtool`, ili hati ziweze kulenga matokeo mahususi. Programu-jalizi zilizowashwa zinaweza kuchangia ukaguzi wa ziada na viambatisho vya kifurushi cha usaidizi kupitia ndoano ya `doctor_register_checks`, na Doctor hutoa uwezo wa uchunguzi wa kusoma tu kwa `plugin_mcp` kupitia `abilities_register`.

## Ramani ya msimbo na majaribio

| Tabia | Utekelezaji | Ushahidi wa majaribio katika hazina hii |
|---|---|---|
| Ukaguzi wa uchunguzi na vitambulisho thabiti vya ripoti | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Ndoano ya ukaguzi wa programu-jalizi (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Uwezo wa uchunguzi wa MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Ufikiaji kulingana na majukumu na ripoti za wavuti zilizofichwa taarifa nyeti | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Uchunguzi wa dalili uliopangwa | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Upya wa RRD na ushughulikiaji wa uandishi ulioahirishwa | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Hakiki za marekebisho, historia ya ukaguzi, na maonyo yaliyokubaliwa | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Ukaguzi ulioratibiwa na mabadiliko ya arifa | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Marejeleo haya yanabainisha utekelezaji na wigo wa majaribio; hayasemi kwamba
kila kazi ya CI imefaulu kwa marekebisho ya sasa. Kagua uendeshaji wa mtiririko
wa kazi kwa marekebisho unayopanga kusambaza.

## Ushauri wa afya ya hifadhidata

Kichanganuzi asili cha PHP cha Doctor husoma seti maalum ya vihesabio vya jumla vya MySQL au MariaDB kupitia muunganisho wa hifadhidata wa Cacti uliopo. Hufanya maulizo mawili ya kusoma tu kwa kila ripoti, hakihitaji vitambulisho vya ziada wala faili inayoweza kutekelezwa, na kamwe hakibadilishi usanidi wa hifadhidata. Ukaguzi huu huonekana kwenye ripoti ya wavuti, CLI, JSON, matokeo ya ufuatiliaji, kifurushi cha usaidizi, na ufuatiliaji wa hali ulioratibiwa.

| Kitambulisho cha ukaguzi | Kichocheo cha uchunguzi |
|---|---|
| `database.health_sample` | Chini ya saa 24 tangu kuanzishwa au `FLUSH STATUS`, au muda wa kufanya kazi haupatikani/haulingani |
| `database.connection_capacity` | Miunganisho ya sasa au kilele kilichorekodiwa ni angalau 80% ya `max_connections` ya sasa |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` ni angalau 1%, pamoja na angalau maombi 10,000 ya kusoma |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` ni angalau 25%, pamoja na angalau majedwali ya muda 1,000 |
| `database.thread_cache` | `Threads_created / Connections` ni angalau 5%, pamoja na angalau majaribio 1,000 ya muunganisho na `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` ni angalau 1%, pamoja na angalau amri 1,000 |
| `database.redo_log_waits` | `Innodb_log_waits` isiyo sifuri |

Hivi ni vizingiti vya uchunguzi vya Doctor, si malengo ya usanidi wa mchuuzi. Isipokuwa kwa uwezo wa miunganisho, ushauri wa jumla wa limbikizo unahitaji dirisha la uchunguzi lililo hapo juu. Vihesabio vinavyokosekana, vilivyoharibika, vilivyorudiwa, au vilivyozidi ukubwa, shughuli zisizotosha, na hali za nyuzi zisizoungwa mkono hutoa maonyo badala ya uamuzi wa afya njema au pendekezo la uboreshaji. Maonyo yanaweza kuathiri hali ya Nagios na arifa zilizoratibiwa wakati **Alert on Warnings** imewezeshwa.

Soma vihesabio vilivyopimwa na pendekezo kwa pamoja. Thamani za limbikizo hazithibitishi mzigo wa sasa; vihesabio vinaweza kuwa na historia tofauti za kuwekwa upya na si picha ya papo hapo ya wakati mmoja. Kilele cha miunganisho kinaweza kuakisi kikomo cha zamani. Idadi ya maulizo ya polepole hutegemea `long_query_time`, na kihesabio cha majedwali ya muda ya diski cha MySQL kinaweza kuacha faili zilizopangwa kwenye kumbukumbu. Uwiano mdogo hauthibitishi kukosekana kwa kizuizi cha utendaji. Thibitisha mienendo chini ya mzigo wakilishi wa kazi, kagua mipango ya maulizo na utumiaji tena wa miunganisho, na pima kumbukumbu kwenye **seva pangishi ya hifadhidata** kabla ya kubadilisha bafa au mipaka ya miunganisho.

Iwapo vipimo havipatikani, kagua usaidizi wa seva na ufikiaji wa akaunti ya Cacti kwa `SHOW GLOBAL STATUS` na `SHOW GLOBAL VARIABLES`; Doctor haiombi vitambulisho vya mamlaka ya juu. Ufafanuzi wa vihesabio unatoka kwenye [marejeleo ya vigezo vya hali ya MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) na [marejeleo ya vigezo vya hali ya MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Hakuna hati wala msimbo wa MySQLTuner unaotumika.

Hakuna uhamishaji wa skimu wala usanidi unaohitajika. Sambaza faili za programu-jalizi kama kawaida; kurejesha faili hizo huondoa uchunguzi ulioongezwa. Hali iliyopo iliyoratibiwa husasishwa katika uendeshaji unaofuata.

## Jinsi inavyobaki salama

Zana ya uchunguzi huendeshwa kwa mamlaka ya poller au seva ya wavuti na husoma njia kutoka kwa jedwali la mipangilio, kwa hivyo lazima iwe makini kuhusu kile inachotekeleza na kubadilisha.

- Uchunguzi ni wa kusoma pekee. Haubadilishi kamwe faili, mipangilio, au data.
- Doctor huendesha faili tumizi iliyosanidiwa tu wakati jina lake la faili linalingana na programu inayotarajiwa (`php`, `rrdtool`, `snmpget`, au `snmpwalk`). Vinginevyo, yeyote anayeweza kuandika kwenye jedwali la mipangilio angeweza kuchagua kile ambacho Doctor itaendesha. Jina lingine lolote huripotiwa kama onyo na halitekelezwi.
- Doctor haiendeshi kamwe faili tumizi zilizosanidiwa kama root, na huripoti inapoendeshwa kama root.
- Marekebisho yanatoka kwenye orodha maalum ya ruhusa. Kila moja linahitaji hatua ya msimamizi aliyethibitishwa kwenye kiolesura cha wavuti au `--yes` kwenye CLI, na kila moja huandikwa kwenye kumbukumbu ya Cacti.

## Matoleo

Matoleo yanafuata SemVer na yanalingana na faili ya `INFO` ya programu-jalizi. Tazama
[mchakato wa kutoa matoleo](../../releasing.md) kwa uteuzi wa toleo, vizingiti vya CI,
yaliyomo kwenye kifurushi, checksum, na maelekezo ya kurejesha nyuma.

## Usakinishaji

Pakua `doctor-VERSION.tar.gz` au `doctor-VERSION.zip` na `SHA256SUMS` kutoka
[Matoleo ya GitHub](https://github.com/somethingwithproof/plugin_doctor/releases).
Thibitisha checksum ya SHA-256 ya kumbukumbu, kisha toa saraka yake ya `doctor/`
kwenye saraka ya `plugins/` ya Cacti. Hivi ndivyo vifurushi vinavyoweza kusakinishwa;
kumbukumbu za msimbo chanzo za kiotomatiki za GitHub zina jina tofauti la saraka.
Ili kuendesha kazi ambayo haijatolewa kutoka `develop`, sakinisha kutoka kwa nakala ya msimbo chanzo.

Kwa nakala za msimbo chanzo:

Nakili (clone) au fungua hazina kama `plugins/doctor` ndani ya usakinishaji wa Cacti. Saraka lazima iitwe `doctor`, si `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Sakinisha na uwashe **Cacti Doctor** kutoka **Usanidi > Usimamizi wa Programu-jalizi**, kisha toa mamlaka ya **Doctor Viewer**, **Doctor Operator**, au **Doctor Administrator** kupitia ruhusa za mtumiaji au kikundi za Cacti. Ruhusa zilizopo za **Cacti Doctor** huhifadhi ufikiaji wa Administrator baada ya kuboresha toleo. Ripoti inaonekana chini ya **Zana > Cacti Doctor**.

## Lugha

Doctor inakuja na katalogi 48 za tafsiri zisizo za Kiingereza chini ya `locales/po/` na `locales/LC_MESSAGES/` zinazojumuisha maeneo ya lugha ya Ngazi ya 1 Pana (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), ya Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), ya Asia (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), na ya Ulaya ya Kusini-Mashariki (`bs-BA`, `hr-HR`, `sr-RS`). Cacti huonyesha katalogi pindi tu usaidizi wa lugha unapowashwa (**Usanidi > Mipangilio > Jumla > Usaidizi wa Lugha**) na mtumiaji anapochagua eneo la lugha ambalo Cacti hulionyesha katika kiteuzi chake cha lugha; katalogi za maeneo ya lugha ambayo bado hayajaorodheshwa katika kiteuzi cha Cacti huanza kutumika pindi tu Cacti itakapoyaongeza. Ukurasa wa wavuti, mipangilio, na ujumbe pamoja na maandishi ya ripoti yanayochapishwa na mstari wa amri hufuata lugha ya Cacti; ripoti ya mstari wa amri yenyewe hutumia lugha chaguo-msingi ya Cacti, ambayo hubaki Kiingereza isipokuwa uibadilishe.

Towe linaloweza kusomwa na mashine halitafsiriwi kamwe: vitambulisho vya ukaguzi, funguo za JSON na thamani za hali, towe la `--format=nagios` na `--format=prometheus`, mistari ya kumbukumbu, na vichwa vya sehemu za kifurushi cha usaidizi hubaki kwa Kiingereza ili hati-amri na ufuatiliaji viendelee kufanya kazi katika kila lugha. Maandishi ya `summary` na `detail` ya kila ukaguzi ndiyo sehemu pekee inayotafsiriwa ya ripoti ya JSON.

Katalogi ya Kihispania cha Amerika Kusini (`es-419`) pia inajumuishwa, lakini si Cacti 1.2 wala Cacti 1.3 iliyo na lugha ya Kihispania cha Amerika Kusini ya kuchagua, kwa hivyo itaanza kutumika tu Cacti itakapoongeza moja. Hadi wakati huo, chagua Kihispania (`es-ES`).

Cacti hupakia katalogi ya programu-jalizi kutoka `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` ikiwa na `doctor` kama kikoa cha maandishi, kwenye 1.2.x na 1.3 sawia (1.3 hutambua saraka ya programu-jalizi kupitia njia yake ya plugins inayoweza kusanidiwa).

## Viwango vya ufikiaji

| Mamlaka | Uwezo |
|---|---|
| Doctor Viewer | Kusoma hali za hivi punde za ukaguzi ulioratibiwa, muda wa uchunguzi, upya wa data na historia ya hivi karibuni ya jumla. Hakuna amri za uchunguzi, maelezo ghafi, usanidi au marekebisho. |
| Doctor Operator | Kuendesha ripoti ya uchunguzi kwa kikomo cha mchakato cha sekunde 120, kukagua maelezo yaliyofichwa sehemu nyeti, na kuthibitisha matokeo. Hakuna mabadiliko ya mipangilio au marekebisho. |
| Doctor Administrator | Uwezo wa Operator pamoja na marekebisho yaliyopo kwenye orodha ya ruhusa na mipangilio ya Doctor. Marekebisho na mipangilio pia yanahitaji mamlaka ya Mipangilio/Zana za Mfumo (Settings/System Utilities) ya Cacti. |

Menyu ya Zana (Utilities) hufungua ukurasa wa mamlaka ya juu zaidi ya Doctor aliyopewa mtumiaji, ikijumuisha ruhusa za vikundi. Mamlaka mpya za Viewer na Operator hazipati ruhusa zozote za kiotomatiki. Kitambulisho cha awali cha mamlaka hubaki kimeunganishwa na `doctor.php` kama Administrator, kikihifadhi ufikiaji uliopo wa watumiaji na vikundi.

Data ya Viewer hutoka kwenye ukaguzi ulioratibiwa. Washa uratibu kabla ya kutoa ufikiaji wa Viewer; uchunguzi uliokosekana au uliopitwa na muda huonyesha **unknown**, si hali ya afya kamwe. Historia huhifadhi hesabu 20 za mwisho za jumla zilizoratibiwa na haijumuishi hali ya kifaa. Waendeshaji (Operators) huanzisha uchunguzi mpya moja kwa moja; uonyeshaji upya wa kawaida wa ukurasa hutumia ripoti ya mwisho ya kipindi chao.

Maelezo ya kifaa na jumla hutumia ruhusa za kifaa za mtumiaji wa sasa. Dondoo za kumbukumbu zinahitaji pia mamlaka ya Usimamizi wa Kumbukumbu (Log Administration) ya Cacti. Siri hufichwa kabla maelezo ya uchunguzi hayajahifadhiwa kwenye kipindi cha wavuti au kuonyeshwa. Ufikiaji wa CLI unaendelea kusimamiwa na akaunti ya mfumo wa uendeshaji.

Uthibitishaji wa matokeo ni wa kibinafsi na hurekodiwa kwenye kumbukumbu ya Cacti. Unatumika tu kwa tokeo na ushahidi uleule; ushahidi uliobadilika unahitaji uthibitishaji mpya. Haubadilishi kamwe hali ya kufaulu/onyo/kushindwa, haunyimizi arifa, au kuweka alama ya afya kwenye ukaguzi ulioshindwa. Hii ni tofauti na vighairi vya maonyo yaliyokubaliwa, ambavyo huathiri sera ya arifa bila kubadilisha hali iliyoonekana na vimeelezwa hapa chini.

Kila hatua inahitaji POST na tokeni halali ya CSRF. Marekebisho huonyesha ukurasa tofauti wa uthibitisho wenye kiungo cha Ghairi (Cancel) kisichowasilisha fomu, na hurekodi mtumiaji aliyefanya hatua na matokeo kwenye kumbukumbu ya Cacti.

## Mstari wa amri

Endesha hizi kutoka kwenye mzizi wa Cacti kama mtumiaji wa poller wa Cacti, si root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Towe la maandishi huchapisha mstari mmoja kwa kila ukaguzi likiwa na hali yake, kategoria, muhtasari, na maelezo. `--json` huchapisha kipengee cha `summary` chenye hesabu za hali na safu ya `checks` ambayo vipengee vyake hubeba `id`, `category`, `status`, `summary`, `detail`, na `repair`/`repairable` pale ambapo marekebisho yaliyo kwenye orodha ya ruhusa yanatumika.

| Hali ya kuondoka | Maana |
|---|---|
| `0` | Hakuna ukaguzi ulioshindwa, au marekebisho yaliyoombwa yalifaulu. Maonyo hayabadilishi hali ya kuondoka. |
| `1` | Angalau ukaguzi mmoja ulishindwa, au marekebisho yaliyoombwa hayakufaulu. |
| `2` | Hitilafu ya matumizi: marekebisho kuendeshwa bila `--yes` (`--preview` haihitaji hii), kitambulisho cha marekebisho kisichojulikana, umbizo la towe lisilojulikana, mchanganyiko wa `--symptom` au umbizo usiotegemezwa, au usakinishaji wa Cacti usiopatikana. |

Cacti huongeza `memory_limit` kwa kila hati-amri ya CLI, kwa hivyo ukaguzi wa usanidi wa utekelezaji wa PHP una maana kwenye ukurasa wa wavuti pekee.

## Ukaguzi ulioratibiwa na arifa

Chini ya **Usanidi > Mipangilio > Doctor**, washa **Endesha Ukaguzi kwa Ratiba** na uchague muda kuanzia dakika 15 hadi siku moja. Baada ya kila mzunguko wa poller unaofikia muda wake, Doctor huendesha kila ukaguzi katika mchakato wa chinichini, ili muda wa utekelezaji wa poller yenyewe usiathirike.

Kila uendeshaji hurekodi hali iliyoonekana ya kila ukaguzi. Vighairi amilifu vya maonyo huathiri sera ya arifa bila kubadilisha uchunguzi huo. Ukaguzi unapoanza au kuacha kushindwa, Doctor huandika mabadiliko hayo kwenye kumbukumbu ya Cacti na, ikiwa **Anwani za Barua Pepe za Arifa** zimewekwa, hutuma barua pepe kwa anwani hizo kupitia mipangilio ya barua ya Cacti. **Arifu kuhusu Maonyo** huongeza mabadiliko ya kuingia na kutoka kwenye maonyo. Uendeshaji wa kwanza hurekodi msingi wa kulinganisha pekee.

Ripoti zilizoratibiwa huendeshwa kwenye poller ya msingi chini ya kufuli ya ushauri ya hifadhidata na zina kikomo cha mfanyakazi cha dakika mbili. Doctor huripoti kuanza kwa mwisho na kukamilika kwa mafanikio ili matokeo yaliyokosekana au ya zamani yaonekane. Matokeo huhesabiwa kuwa ya sasa kwa muda wa ratiba ukijumlisha mzunguko mmoja wa polling na dakika tatu. Uendeshaji ambao haukamiliki hujaribiwa tena baada ya dakika 5, 10, 20 na zaidi, hadi kufikia muda wa kawaida wa ratiba. Uwasilishaji wa arifa ulioshindwa huhifadhiwa kwa hadi majaribio matatu ya kurudia yenye ucheleweshaji unaoongezeka; baada ya hapo, rekebisha mipangilio ya barua ya Cacti na uendeshe `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` kama mtumiaji wa poller. Kukubaliwa na seva ya barua hakuthibitishi uwasilishaji kwenye kisanduku pokezi.

Kichupo hichohicho huweka viwango vya muda wa utekelezaji wa poller (80% ya muda wa ratiba), nafasi huru ya diski ya RRA (onyo chini ya 10%, kushindwa chini ya 2%), mkengeuko wa saa ya hifadhidata (onyo zaidi ya sekunde 5, kushindwa zaidi ya 60), na ukubwa wa kumbukumbu ya Cacti (MB 100). Thamani tupu au batili hurejea kwenye chaguo-msingi hizi.

## Muunganisho wa ufuatiliaji

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` huchapisha mstari mmoja wa hali pamoja na data ya utendakazi na kuondoka kwa `0` (OK), `1` (WARNING), au `2` (CRITICAL), ili Nagios, Icinga, au mfumo wowote unaoendana uweze kuiendesha moja kwa moja. `--format=prometheus` huandika umbizo la maandishi la Prometheus kwa mkusanyaji wa textfile wa node_exporter: `cacti_doctor_check_status` kwa kila ukaguzi (0 kufaulu au onyo lililokubaliwa, 1 onyo linalohitaji hatua, 2 kushindwa), `cacti_doctor_check_observed_status` kabla ya vighairi, `cacti_doctor_check_accepted`, `cacti_doctor_checks` kwa kila hali, na `cacti_doctor_last_run_timestamp_seconds`. Safu mlalo za ukaguzi za JSON zinajumuisha sehemu ya `assessment`; `not_assessed` inamaanisha ukaguzi haukuweza kufikia hitimisho kutokana na data iliyopo.

## Kifurushi cha usaidizi

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Kifurushi hicho ni faili moja ya maandishi iliyo na matoleo ya Doctor, Cacti, PHP, OS, na hifadhidata, takwimu za poller na Boost, ripoti kamili, viambatisho vyovyote vya kifurushi cha usaidizi kutoka kwa programu-jalizi chini ya `== Plugin attachments`, na mistari 200 ya mwisho ya kumbukumbu ya Cacti. Thamani zinazofuata majina ya password, secret, token, community, na key hufichwa. Doctor huunda faili hiyo ikisomeka na mmiliki wake pekee na hukataa kuandika juu ya faili iliyopo. Ikague kabla ya kuichapisha mahali popote.

## Sera ya urekebishaji

Doctor inajumuisha urekebishaji mmoja, `runtime_directories`. Huunda saraka za wakati wa utekelezaji za Cacti ambazo hazipo na kuongeza biti za kusoma, kuandika, na kutekeleza za mmiliki bila kuondoa ruhusa zilizopo.

Hulenga `$cache_path`, `$log_path`, na `$rra_path` kwenye Cacti 1.3, au saraka za `cache`, `log`, na `rra` za usakinishaji vinginevyo. Huruka saraka ambazo tayari zinaweza kuandikwa, hukataa saraka zilizo nje ya usakinishaji wa Cacti (kama vile saraka ya kumbukumbu chini ya `/var/log`), hukataa viungo vya ishara (symbolic links), na hukataa kuendeshwa kama root. Haifuati kamwe `path_cactilog`, hivyo faili ya kumbukumbu iliyosanidiwa ndani ya saraka ya msimbo haiwezi kuelekeza urekebishaji huko. Uchambuzi bado hukagua saraka ya faili ya kumbukumbu iliyosanidiwa kwenye kila toleo.

Haibadilishi umiliki, haiendeshi amri za shell, haiandiki upya usanidi, wala haibadilishi data ya programu ya Cacti. Marekebisho mapya lazima kila moja lijumuishe uchunguzi, kishughulikiaji kilicho kwenye orodha ya ruhusa, uthibitisho, uwekaji kumbukumbu za ukaguzi, na majaribio.

## Kuchunguza dalili

Waendeshaji na Wasimamizi wanaweza kuchagua **Investigate a symptom** kwenye ukurasa wa Doctor. Sheria hizo hizo zinapatikana kupitia `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, au `alerts_missing`, zenye matokeo ya maandishi au JSON. Vifurushi vya usaidizi vinajumuisha uchunguzi wa dalili husika.

Kila kisababishi tarajiwa huorodhesha ukaguzi ulioonekana na hatua inayofuata ya uthibitishaji. Visababishi tarajiwa ni dhana, si visababishi vikuu vilivyothibitishwa. Uchunguzi uliokosekana, usiotathminiwa, au wa zamani hauthibitishi kisababishi kamwe. Uchunguzi wa wavuti hutumia ripoti iliyochujwa kwa ruhusa; ripoti za CLI hutumia ufikiaji wa akaunti ya mfumo endeshi.

## Upya wa masasisho ya RRD

`filesystem.rrd_stale` hukagua hadi vyanzo vya data vinavyofanya kazi 500, bila kujumuisha vifaa vilivyozimwa na vilivyo chini. Kwenye usakinishaji mkubwa sampuli hubadilika kila saa, hivyo uendeshaji unaorudiwa hufunika faili tofauti. Hulinganisha nyakati za urekebishaji wa faili na thamani kubwa zaidi kati ya muda wa poller, hatua ya RRD ya chanzo, na hatua ya wasifu, ikizidishwa na **RRD Stale Intervals** (chaguomsingi 3). Huonyesha faili tatu za zamani zaidi ambazo hazijasasishwa na idadi ya vifaa vilivyoathiriwa. Matokeo ya wavuti yanajumuisha vifaa vilivyoruhusiwa pekee.

`filesystem.rrd_files` ni ukaguzi tofauti wa uwepo wa faili. Hutafuta faili ya RRD ya hadi vyanzo vya data vinavyofanya kazi 5,000, ikiwa ni pamoja na vile vilivyo kwenye vifaa vilivyozimwa au vilivyo chini, na hutumia sampuli ile ile ya kila saa.

Boost huongeza mara mbili ya muda wake uliosanidiwa wa kusafisha kache (flush interval) kama posho ya kuandika kwenye diski. Kwa kiandikaji kingine kilichoahirishwa, sanidi **Deferred RRD Write Allowance (seconds)**. `RRDCACHED_ADDRESS` iliyotangazwa bila posho, au muda batili wa Boost, hutoa matokeo yasiyotathminiwa. Doctor haisafishi kache kamwe ili kufanya ukaguzi huu. Muda wa urekebishaji ni ushahidi wa shughuli ya diski, si uthibitisho wa ukusanyaji wa data uliofanikiwa. Uhifadhi kache wa nje ambao Doctor haiwezi kugundua lazima usanidiwe waziwazi.

Faili zilizokosekana, zisizosomeka, na zenye tarehe ya baadaye huhesabiwa katika maelezo. Matokeo huwa hayajatathminiwa tu wakati hakuna faili yoyote ya sampuli inayosomeka. Matokeo ya sampuli hueleza kuwa yanashughulikia sehemu tu ya usakinishaji; ufaulu haushughulikii faili ambazo hazikuchukuliwa kwenye sampuli.

## Maonyesho ya awali ya urekebishaji na historia ya ukaguzi

Ukurasa wa urekebishaji wa Msimamizi huonyesha kila njia iliyoathiriwa, hatua yake inayopendekezwa, ruhusa za sasa, na ruhusa lengwa. Idhini inafungamanishwa na onyesho hilo la awali, mtumiaji anayetenda, na muda wa uhai wa dakika tano. Uthibitisho hutumia onyesho hilo la awali; mfumo wa faili uliobadilika huhitaji onyesho jingine la awali. Utekelezaji wa root, njia zilizo nje ya usakinishaji, viungo vinavyohitaji urekebishaji, na ruhusa za mfumo wa faili zisizotimizwa huzuia idhini.

`--repair=runtime_directories --preview` huchapisha mpango wa JSON wa kusoma tu. `--repair=runtime_directories --yes` huidhinisha mpango wa CLI uliokokotolewa upya na kuukagua tena kabla ya utekelezaji. Akaunti ya CLI lazima tayari iwe imeidhinishwa kurekebisha usakinishaji; hairithi majukumu ya wavuti.

Rekodi iliyopangwa ya `repair.started` lazima ihifadhiwe kabla ya mabadiliko yoyote ya mfumo wa faili. Rekodi iliyounganishwa ya `repair.completed` ina picha ya hali ya baada ya urekebishaji na matokeo ya uthibitishaji. Operesheni iliyokatizwa huacha rekodi ya kuanza kwa ajili ya uchunguzi. Kushindwa kwa ukaguzi wa kukamilisha huripotiwa kama hitilafu hata kama mabadiliko ya mfumo wa faili yalitokea. Doctor huongeza ruhusa za mmiliki na kuunda saraka; haijaribu kurudisha nyuma mabadiliko kiotomatiki.

Wasimamizi walio na ruhusa ya Settings/System Utilities ya Cacti wanaweza kusoma maingizo 20 ya hivi karibuni zaidi ya ukaguzi kwenye ukurasa wa Doctor. Programu-jalizi huhifadhi rekodi 200 za hivi karibuni zaidi katika `plugin_doctor_audit`; kumbukumbu ya Cacti pia hurekodi vitambulisho vyake, vitendo, na watendaji. Data nyeti katika ukaguzi hufichwa.

## Maonyo yaliyokubaliwa

Wasimamizi walio na ruhusa ya Settings/System Utilities ya Cacti wanaweza kuunda **Warning exception** kutoka kwa onyo jipya lililotathminiwa kwenye ukurasa wa Doctor. Kighairi huhitaji mmiliki, sababu, na tarehe ya ukaguzi ya UTC ndani ya siku 90. Muda wake huisha saa sita usiku UTC mwanzoni mwa tarehe hiyo. Hadi vighairi 100 vinaweza kusanidiwa. Orodha huonyesha maingizo yaliyoisha muda wake na vitambulisho visivyopo kwenye ripoti ya sasa, na huruhusu kuviondoa.

Onyo lililoonekana hubaki likionekana, pamoja na mmiliki wake, sababu, na muda wa kuisha katika maelezo ya uchunguzi. JSON huhifadhi hali iliyoonekana na huongeza metadata ya `accepted` na `acceptance`. Nagios huondoa maonyo yaliyokubaliwa yanayotumika kutoka kwa ukali wake wa kutoka lakini huyataja katika matokeo yake. Prometheus husafirisha ukali ulioonekana na ule unaohitaji hatua. Hali ya kawaida ya kutoka ya CLI hubaki bila kubadilika: maonyo tayari hutoka na sifuri, kushindwa hutoka na moja.

Arifa za maonyo zilizopangwa hukandamizwa wakati kighairi kinapotumika; kuisha kwa muda au kuondolewa hufanya onyo linaloendelea listahili tena arifa za maonyo. Mabadiliko kwenda kushindwa na kupona kutoka kushindwa hubaki yakistahili arifa. Matokeo yasiyotathminiwa au kushindwa hayawezi kukubaliwa. Uthibitishaji wa kibinafsi ni tofauti na haukandamizi chochote. Uundaji na uondoaji wa kighairi hufanyika pamoja kama muamala na rekodi ya ukaguzi.

Kusasisha huunda `plugin_doctor_audit` na `plugin_doctor_acceptance` bila kubadilisha data ya programu ya Cacti. Hamisha historia yoyote unayohitaji kabla ya kuondoa usakinishaji: kuondoa usakinishaji huondoa majedwali yote mawili ya programu-jalizi na mipangilio yake. Kurudisha nyuma faili za programu-jalizi huacha majedwali yakiwa yanapatikana kwa uchunguzi, lakini matoleo ya zamani hayaheshimu vighairi vya maonyo.

## Ukaguzi wa programu-jalizi (`doctor_register_checks`)

Programu-jalizi za Cacti zilizowashwa zinaweza kuchangia ukaguzi wa uchunguzi wa kusoma tu na viambatisho vya hiari vya kifurushi cha usaidizi kwa kusajili ndoano ya `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor huita programu-jalizi zilizowashwa na zisizojumuishwa ndani ya msingi zilizosajiliwa kwenye `doctor_register_checks` (ikiruka `doctor` na `cacti`), na hutafuta faili ya ndoano ndani ya saraka ya programu-jalizi yenyewe pekee. Kitendakazi kinachoitwa hupokea `['mode' => 'run' | 'list', 'plugin' => '<slug>']` na hurejesha ama orodha ya maelezo ya ukaguzi au bahasha yenye `checks` na `attachments` ya hiari:

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

Kila maelezo ya ukaguzi wa programu-jalizi huthibitishwa kabla ya kujumuishwa:

- Funguo zinazohitajika: `id`, `plugin`, `category`, `title`, `status`, `message`, `details`, na `remediation`.
- `plugin` lazima ilingane na jina fupi (slug) la programu-jalizi iliyosajiliwa (`[a-z0-9_]{1,64}`). `id` lazima ilingane na `[a-z0-9_.]{1,128}`, ianze na `<plugin>.`, na isigongane na kitambulisho kilichopo cha ukaguzi wa msingi au wa programu-jalizi.
- `status` lazima iwe `ok`, `warn`, `fail`, au `info`. `ok` hubadilishwa kuwa `pass` katika ripoti za Doctor; `info` ni ya taarifa pekee na haisababishi kushindwa katika CLI, Nagios, Prometheus, au arifa zilizoratibiwa.
- `category` (hadi baiti 64) na `title` (hadi baiti 256) lazima ziwe tungo zisizo tupu bila herufi za udhibiti. `message` (isiyo tupu, hadi baiti 2048) na `remediation` (hadi baiti 2048) lazima ziwe tungo.
- `details` hukubali tungo (hadi baiti 8192) au safu ya thamani rahisi/zilizopangwa ndani kwa ndani (kina cha juu 4, iliyosimbwa kwa JSON hadi baiti 16384; vipengee vya object na rasilimali hukataliwa).
- Viambatisho vya hiari vya kifurushi cha usaidizi vinahitaji `title` isiyo tupu (hadi baiti 128, bila herufi za udhibiti) na tungo ya `content` hadi baiti 65536 (64 KiB).

Doctor hutekeleza vikomo vya ukaguzi 32 na viambatisho 8 kwa kila programu-jalizi (jumla ya ukaguzi 64 wa programu-jalizi na viambatisho 32). Kila ndoano huendeshwa ndani ya mpaka wake wa `try`/`catch` ili hitilafu za kipekee au data zisizo safu zifichwe sehemu nyeti na kurekodiwa kwenye kumbukumbu ya Cacti (sehemu ya `DOCTOR`) bila kuathiri ukaguzi wa msingi au programu-jalizi nyingine. Maelezo yaliyoundwa vibaya hukataliwa na kurekodiwa ilhali yale halali kutoka kwa programu-jalizi hiyohiyo huendelea kufanya kazi. Ukaguzi wa programu-jalizi huwa wa kusoma tu kila wakati (`repairable: false`), na thamani za tungo pamoja na funguo nyeti zenye majina hufichwa kabla ya kuonyeshwa, kusafirishwa, au kufungwa kwenye kifurushi. Ukaguzi wa programu-jalizi uliothibitishwa huonekana kwenye kiolesura cha wavuti, matokeo ya CLI ya maandishi/JSON/Nagios/Prometheus, ufuatiliaji wa hali ulioratibiwa, na vifurushi vya usaidizi.

## Muunganisho wa MCP (`abilities_register`)

Doctor husajili ndoano ya `abilities_register` (`doctor_abilities_register` katika `doctor_abilities.php`) ili `plugin_mcp` igundue uwezo wake wa uchunguzi wakati programu-jalizi zote mbili zimewashwa. Doctor husajili kategoria ya `diagnostics` (`Diagnostics`) na uwezo mbili wa kusoma tu, usioharibu, na unaorudia matokeo yaleyale:

| Kitambulisho cha uwezo | Hoja za hiari | Towe |
|---|---|---|
| `doctor-run-checks` | `category` (tungo, herufi 64 zaidi), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) na hadi matokeo 256 yaliyofichwa taarifa nyeti `findings` (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (tungo, herufi 64 zaidi), `plugin` (tungo, herufi 64 zaidi) | Hadi vipengee 256 vya `checks` (`id`, `plugin`, `category`, `title`) vinavyoshughulikia ukaguzi wote 45 uliojengewa ndani pamoja na ukaguzi wa programu-jalizi zilizowashwa |

Uwezo wote wawili ni wa kusoma tu kwa ukali na hauendeshi marekebisho kamwe. Mbali na udhibiti wa mamlaka na ufichuaji wa uwezo wa `plugin_mcp` yenyewe (uwezo wa programu-jalizi huanza ukiwa umefichwa katika MCP hadi msimamizi auonyeshe), Doctor huhitaji mmiliki wa tokeni awe na **Doctor Viewer** au mamlaka ya juu zaidi ya Doctor. `doctor-run-checks` huzuia `devices.health` kwa vifaa vilivyoruhusiwa kwa mmiliki wa tokeni, hujumuisha `logging.recent_errors` pale tu mtumiaji anapokuwa na mamlaka ya Cacti 18 au 19, huacha `filesystem.rrd_files`, na hujumuisha `filesystem.rrd_stale` iliyowekewa mipaka ya vifaa kwa **Doctor Operator** au **Doctor Administrator** pekee.

## Mahitaji

| Cacti | PHP | Maelezo |
|---|---|---|
| 1.2.20 | 5.4 au mpya zaidi | Msimbo wa Doctor wenyewe unaendana na PHP 5.4 ili uweze kuchunguza mifumo ya zamani kabla ya kusasisha |
| 1.2.31 | 8.0 au mpya zaidi | Faili ya `composer.json` ya Cacti inahitaji `>=8.0` |
| 1.2.x ya sasa | 8.2 au mpya zaidi | Faili ya `composer.json` ya Cacti inahitaji `>=8.2` |
| `develop` (1.3) | 8.3 au mpya zaidi | Faili ya `composer.json` ya Cacti inahitaji `^8.3` |

Safumlalo ya **PHP compatibility with installed Cacti** hulinganisha toleo la PHP linaloendeshwa na hitaji la PHP katika `composer.json` ya mzizi ya Cacti yenyewe, ikijumuisha kikomo cha juu cha kizuizi cha caret kama vile `^8.3`. Faili inayotekelezeka ya PHP CLI iliyosanidiwa hukaguliwa dhidi ya hitaji lile lile. Doctor hutambua miundo ya vizuizi ya `>=` na `^` inayotumiwa na vifurushi hivi vya Cacti. Hitaji lisilosomeka, lililoharibika, lililokosekana, au lisilotambuliwa hutoa onyo; usakinishaji wa Cacti 1.2.20–1.2.30 usio na manifest hubakiza kiwango chake cha chini cha kisakinishi cha PHP 5.4 kilichoandikwa kwenye nyaraka. Uoanifu wa Doctor yenyewe na PHP 5.4 hauthibitishi uoanifu na usakinishaji mpya zaidi wa Cacti.

Safumlalo ya **PHP upstream security support** hujibu swali tofauti: je, tawi hilo la toleo la PHP bado linapokea marekebisho ya usalama kutoka kwa mradi wa PHP? Huripoti tarehe iliyochapishwa ya mwisho wa usaidizi wa usalama wa tawi hilo na huonya baada ya tarehe hiyo. Kwa mfano, PHP 8.1 inaweza kukidhi hitaji la wakati wa utekelezaji la usakinishaji wa zamani wa Cacti huku ikiwa haipokei tena marekebisho ya usalama ya chanzo kikuu. Matokeo ya ufaulu hayamaanishi kuwa toleo la kiraka lililosakinishwa ni la hivi karibuni, na Doctor haiwezi kubaini kama mchuuzi wa mfumo endeshi hutoa marekebisho yaliyorudishwa nyuma.

Tarehe za usaidizi zimejumuishwa ndani ya Doctor kutoka kwenye [ratiba ya usaidizi ya PHP](https://www.php.net/supported-versions.php) na [orodha ya mwisho wa maisha](https://www.php.net/eol.php), zilizokaguliwa mara ya mwisho tarehe 2026-11-08. Matawi yasiyojulikana na matoleo ya awali hutoa onyo badala ya kudhaniwa kuwa yamefaulu. Hakuna ombi la mtandao linalofanywa wakati wa uchunguzi. Sasisha data ya usaidizi ya Doctor wakati PHP inapochapisha ratiba mpya. Vitambulisho vilivyopo vya JSON/ufuatiliaji `php.version` na `php.security_baseline` havijabadilishwa.

## Uendelezaji

Mkusanyiko wa majaribio ya vitengo hutumia Pest na uchambuzi tuli hutumia PHPStan (kiwango cha 6), vyote viwili kwenye PHP 8.2 au mpya zaidi:

```console
composer install
composer phpstan
composer test
```

Majaribio hayo hubadilisha vitendakazi vya Cacti ambavyo Doctor huita na mbadala midogo katika `tests/CactiStubs.php`, hivyo huendeshwa bila usakinishaji wa Cacti.

GitHub Actions huendesha aina tano za ukaguzi kwenye kila push na pull request:

- Majaribio ya mkataba wa ufungashaji wa matoleo (`tests/test_release.py`) na ujenzi wa kumbukumbu (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, ambayo hushindwa ikiwa kiolezo cha tafsiri kimepitwa na wakati, katalogi haijakamilika au ina tafsiri zisizo na uhakika (fuzzy), au katalogi iliyokusanywa inatofautiana na chanzo chake.
- `php -l` kwenye kila faili ya PHP chini ya PHP 5.4, 5.6, 7.0, 7.1, 7.4, na 8.0 hadi 8.4.
- `composer phpstan` (PHPStan kiwango cha 6) na `composer test` (mkusanyiko wa majaribio ya vitengo wa Pest) kwenye PHP 8.2, 8.3, na 8.4.
- Kazi saba za ujumuishaji zinazosakinisha Cacti 1.2.20, tawi la sasa la 1.2.x, na `develop` dhidi ya MySQL na MariaDB, zikiwa na cmd.php na Spine zote mbili. Kila kazi husakinisha na kuwezesha programu-jalizi, huendesha ripoti kamili ya CLI, na hukagua muundo wa ripoti, jumla za muhtasari, hali zinazotarajiwa, na seti kamili ya hitilafu. Kisha huharibu njia ya faili inayotekelezeka na muhuri wa muda wa poller, huthibitisha zote mbili zimeripotiwa, huzirejesha, hujaribu urekebishaji na uthibitisho wake, na huendesha kuzima, kuwezesha, kuondoa usakinishaji, na kusakinisha tena. Ripoti ya JSON huhifadhiwa kama kituo cha matokeo (artifact) kazi inaposhindwa.

## Kuchangia

Maombi ya kuunganisha mabadiliko (pull requests) yanaelekezwa kwenye tawi la `develop`. Hakikisha faili za uzalishaji zinaendana na PHP 5.4 na utumie mtindo wa Cacti: vichupo (tabs), tungo zenye alama moja ya kunukuu, na visaidizi vya Cacti kama vile `read_config_option()` na `db_fetch_cell()`. Ongeza jaribio la kitengo kwa kila badiliko la tabia, tia saini mabadiliko yako (`git commit -s`), na uongeze mstari katika `CHANGELOG.md`.

### Tafsiri

Funga kila ujumbe unaoonekana kwa mtumiaji ndani ya `__('...', 'doctor')` (au `__n()`, `__x()`, `__esc()`), na upe sentensi iliyo na thamani tungo moja ya umbizo yenye vishikilia nafasi vya `%s`/`%d` vinavyofuatana badala ya kuunganisha vipande. Kitendakazi cha Cacti `__()` hupanga umbizo la ujumbe tu pale kinapokuwa na kibainishi cha umbizo na hakiauni miundo ya nafasi ya `%1$s`. Pia hubadilisha `%%` kuwa `%` kabla ya kupanga umbizo, kwa hivyo kamwe usiweke alama halisi ya asilimia katika ujumbe: pitisha thamani pamoja na alama yake kama hoja (`__('Usage: %s', '50%', 'doctor')`). Mistari ya kumbukumbu (log lines) hubaki kwa Kiingereza: tumia `doctor_repair_message()` kwa maandishi ya ukarabati na `doctor_n_()` kwa jumbe zinazorekodiwa kwenye kumbukumbu na kutafsiriwa tu pale zinapoonyeshwa. Weka vitambulisho vya ukaguzi, funguo za JSON, maneno muhimu ya hali, matokeo ya ufuatiliaji, na mistari ya kumbukumbu bila kutafsiriwa.

`locales/build_gettext.sh` huzalisha upya kiolezo cha `locales/po/cacti.pot`, hukichanganya kwenye kila katalogi ya `locales/po/<locale>.po`, na kukusanya `locales/LC_MESSAGES/<locale>.mo`; wasilisha faili zote tatu kwenye commit. CI huendesha `sh locales/build_gettext.sh --check`, ambayo hushindwa wakati kiolezo kimepitwa na wakati au katalogi imekosa ingizo au ina ingizo lisilo na uhakika (fuzzy), kishikilia nafasi kinatofautiana, au faili iliyokusanywa imepitwa na wakati. Kwa hivyo ujumbe uliobadilishwa unahitaji tafsiri zake zisasishwe katika ombi lilelile la kuunganisha mabadiliko (pull request). Inahitaji GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Lugha mpya ni faili mpya ya `<locale>.po` iliyopewa jina kama Cacti inavyozipa majina lugha zake za eneo (kwa mfano `pt-BR`).

## Usalama

Ripoti udhaifu wa kiusalama kwa faragha kama ilivyoelezwa katika [SECURITY.md](../../../SECURITY.md), siyo katika masuala ya umma.

## Leseni

Hakimiliki (C) 2026 Thomas Vincent. Imetolewa chini ya GNU General Public License, toleo la 2 au la baadaye. Tazama [LICENSE](../../../LICENSE).
