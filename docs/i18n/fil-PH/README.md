<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: isang cactus na may suot na stethoscope. Mag-diagnose. Mag-ayos. Mag-monitor.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Katayuan ng Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lisensya: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ at 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Ang Cacti Doctor ay isang plugin ng Cacti na nagsusuri sa isang instalasyon sa iisang pass at naglalapat ng maliliit na pag-aayos lamang kapag hiniling ito ng isang administrator.

**Katayuan: nasa development, bago ang 1.0.** Ang pinakabagong release ay [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Nagdaragdag ang patch na ito ng mga katalogo sa Hindi at Arabic at mga isinaling gabay ng gumagamit sa role-scoped na access, ginabayang diagnosis, scoped na mga pagsusuri sa pagiging bago ng RRD, mga preview ng pag-aayos at kasaysayan ng audit, mga tinanggap na eksepsyon sa babala, at mga pagsasalin sa 0.6.0. Tingnan ang [CHANGELOG.md](../../../CHANGELOG.md) para sa mga detalye.

## Mga Screenshot

Mga diagnostic at setting ng pag-iskedyul sa isang nakahiwalay na demonstrasyong instalasyon ng Cacti 1.2.31 na nagpapatakbo ng PHP 8.3.36, kabilang ang pagiging tugma ng Cacti sa PHP, upstream na suporta sa seguridad, at mga pagsusuri sa kalusugan ng database. Ang mga babala at pagkabigong ipinapakita rito ay naglalarawan sa demo environment na iyon.

![Talahanayan ng diagnostic ng Doctor na may mga resultang pass, warning, at failure](../../screenshots/diagnostics.png)

![Mga setting ng pag-iskedyul, alerto, at threshold ng Doctor](../../screenshots/settings.png)

Ang mga problema sa Cacti ay karaniwang lumilitaw bilang mga sintomas: mga walang lamang graph, poller na huminto, o plugin na hindi ma-install. Ang sanhi ay kadalasang isang prerequisite na lumihis, tulad ng nawawalang PHP extension sa CLI build, isang direktoryo ng log na hindi masulatan ng poller, isang path ng RRDtool na nakaturo sa maling binary, o isang database na walang mga talahanayan ng timezone. Direktang sinusuri ng Doctor ang mga prerequisite na iyon at iniuulat ang bawat isa bilang pass, warn, o fail na may pangungusap na nagpapaliwanag kung ano ang natagpuan nito. Ang parehong ulat ay makukuha sa isang web page, sa command line, at bilang JSON para sa pagsubaybay.

## Ano ang sinusuri nito

| Bahagi | Mga Pagsusuri |
|---|---|
| Doctor | Kung ang Doctor mismo ay tumatakbo bilang root, na magdudulot upang ilarawan ng mga pagsusuri sa pahintulot ang maling account |
| Cacti at PHP | Bersyon ng Cacti, isang upgrade na hindi kailanman natapos ng installer, mga naka-enable na plugin na nawawala ang mga file, pagiging tugma ng PHP sa naka-install na package ng Cacti, katayuan ng upstream na suporta sa seguridad ng PHP |
| Mga PHP extension | Mga kinakailangang extension sa web PHP at sa CLI PHP na ginagamit ng poller, pati na rin ang mga inirerekomendang feature |
| Konpigurasyon ng PHP | `memory_limit`, `max_execution_time`, at `date.timezone`, gamit ang sariling mga rekomendasyon ng Cacti |
| Database | Pagkakakonekta, bersyon ng server laban sa rekomendasyon ng Cacti, UTF-8 character set, mga talahanayan ng timezone, mga pangunahing talahanayan, paglihis ng orasan mula sa PHP host, at mga setting ng InnoDB na minamarkahan ng Cacti bilang mga error |
| Kalusugan ng database | Kapasidad ng koneksyon, mga pagbasa sa buffer-pool, mga pansamantalang talahanayan sa disk, paggawa ng thread ng koneksyon, mabagal na mga pahayag, at mga paghihintay sa InnoDB log-buffer, na may mga mungkahing pag-tune depende sa workload |
| Filesystem | Mga direktoryo ng cache, log, at RRA na nasusulatan; bakanteng espasyo para sa mga RRD file; mga aktibong pinagmulan ng data na walang RRD file o lampas na sa oras ang mga pag-update ng file; `include/config.php` na hindi nababasa ng lahat (world-readable); log ng Cacti na nasusulatan at hindi labis ang laki |
| Mga Binary | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, at Spine kapag ito ang naka-configure na poller, kabilang ang mga bersyon kung saan may nakasaad ang Cacti |
| Log | Mga error sa mga pinakabagong linya ng log ng Cacti, kasama ang pinakamadalas na mensahe |
| Mga Device | Mga naka-enable na device na down o nagre-recover, ang tatlong pinakamatagal na down kasama ang kanilang huling error, at isang pagkabigo kapag karamihan sa mga device ay sabay-sabay na down |
| Poller | Uri at interval ng poller, oras mula nang huling makumpleto ang pangunahing poller, tagal ng pagtakbo laban sa interval, output ng poller na hindi kailanman nakarating sa isang RRD file, mga remote poller na huminto sa pag-uulat, isang naantalang Boost, at isang konpigurasyon ng Spine na nakaturo sa ibang database |

Ang bawat pagsusuri ay may matatag na ID, tulad ng `database.timezone` o `binary.rrdtool`, upang makapag-key ang mga script sa mga indibidwal na resulta.

## Mapa ng code at pagsubok

| Gawi | Implementasyon | Ebidensya ng pagsubok sa repository na ito |
|---|---|---|
| Mga diagnostic na pagsusuri at matatag na mga ID ng ulat | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Role-scoped na access at na-redact na mga ulat sa web | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Mga ginabayang imbestigasyon ng sintomas | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Pagiging bago ng RRD at pangangasiwa ng deferred-write | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Mga preview ng pag-aayos, kasaysayan ng audit, at mga tinanggap na babala | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Mga nakaiskedyul na pagsusuri at transisyon ng alerto | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Tinutukoy ng mga sangguniang ito ang implementasyon at saklaw ng pagsubok; hindi nila sinasabi na ang bawat CI job ay pumasa para sa kasalukuyang rebisyon. Suriin ang pagtakbo ng workflow para sa rebisyon na plano mong i-deploy.

## Payo sa kalusugan ng database

Binabasa ng native PHP analyzer ng Doctor ang isang nakapirming hanay ng mga pandaigdigang counter ng MySQL o MariaDB sa pamamagitan ng umiiral na koneksyon ng Cacti sa database. Gumagawa ito ng dalawang read-only na query bawat ulat, hindi nangangailangan ng karagdagang mga kredensyal o executable, at hindi kailanman binabago ang konpigurasyon ng database. Lumilitaw ang mga pagsusuring ito sa ulat sa web, CLI, JSON, output ng pagsubaybay, support bundle, at nakaiskedyul na pagsubaybay sa katayuan.

| ID ng Pagsusuri | Trigger ng imbestigasyon |
|---|---|
| `database.health_sample` | Mas mababa sa 24 na oras mula nang magsimula o mula nang `FLUSH STATUS`, o hindi magagamit/hindi pare-parehong uptime |
| `database.connection_capacity` | Kasalukuyan o naitalang pinakamataas na bilang ng koneksyon ay hindi bababa sa 80% ng kasalukuyang `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` ay hindi bababa sa 1%, na may hindi bababa sa 10,000 mga kahilingan sa pagbasa |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` ay hindi bababa sa 25%, na may hindi bababa sa 1,000 pansamantalang talahanayan |
| `database.thread_cache` | `Threads_created / Connections` ay hindi bababa sa 5%, na may hindi bababa sa 1,000 pagtatangka ng koneksyon at `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` ay hindi bababa sa 1%, na may hindi bababa sa 1,000 pahayag |
| `database.redo_log_waits` | Hindi zero na `Innodb_log_waits` |

Ang mga ito ay mga threshold ng imbestigasyon ng Doctor, hindi mga target sa konpigurasyon ng vendor. Maliban sa kapasidad ng koneksyon, ang pinagsama-samang payo ay nangangailangan ng palugit ng pagmamasid sa itaas. Ang nawawala, mali ang pagkakabuo, doble, o labis ang laking mga counter, hindi sapat na aktibidad, at hindi sinusuportahang mga mode ng thread ay nagdudulot ng mga babala sa halip na malusog na hatol o rekomendasyon sa pag-tune. Maaaring makaapekto ang mga babala sa katayuan ng Nagios at mga nakaiskedyul na alerto kapag naka-enable ang **Alert on Warnings**.

Basahin nang magkasama ang mga nasukat na counter at ang mungkahi. Hindi pinapatunayan ng mga pinagsama-samang halaga ang kasalukuyang load; maaaring may magkakaibang kasaysayan ng pag-reset ang mga counter at hindi sila isang atomic snapshot. Maaaring sumasalamin ang pinakamataas na bilang ng koneksyon sa isang mas lumang limitasyon. Ang bilang ng mabagal na query ay nakadepende sa `long_query_time`, at maaaring laktawan ng counter ng pansamantalang talahanayan sa disk ng MySQL ang mga file na naka-map sa memorya. Ang mababang ratio ay hindi nagpapatunay ng kawalan ng bottleneck. Kumpirmahin ang mga trend sa ilalim ng isang kinatawang workload, suriin ang mga plano ng query at muling paggamit ng koneksyon, at sukatin ang memorya sa **database host** bago baguhin ang mga buffer o limitasyon sa koneksyon.

Kung hindi magagamit ang mga sukatan, suriin ang suporta ng server at ang access ng Cacti account sa `SHOW GLOBAL STATUS` at `SHOW GLOBAL VARIABLES`; hindi humihingi ang Doctor ng mas mataas na mga kredensyal. Ang mga kahulugan ng counter ay nagmumula sa [sanggunian ng status-variable ng MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) at [sanggunian ng status-variable ng MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Walang ginagamit na script o code ng MySQLTuner.

Walang kinakailangang paglilipat ng schema o konpigurasyon. I-deploy ang mga file ng plugin nang normal; ang pagbabalik ng mga file na iyon ay mag-aalis sa mga idinagdag na diagnostic. Ang umiiral na nakaiskedyul na estado ay nire-refresh sa susunod na pagtakbo.

## Kung paano ito nananatiling ligtas

Ang isang tool sa pagsusuri ay tumatakbo nang may mga pribilehiyo ng poller o web server at nagbabasa ng mga path mula sa talahanayan ng mga setting, kaya kailangan nitong mag-ingat sa kung ano ang pinapagana at binabago nito.

- Ang mga pagsusuri ay read-only. Hindi kailanman ito nagbabago ng mga file, setting, o data.
- Pinapagana lamang ng Doctor ang isang na-configure na binary kapag tumutugma ang pangalan ng file nito sa inaasahang program (`php`, `rrdtool`, `snmpget`, o `snmpwalk`). Kung hindi, ang sinumang makakapagsulat sa talahanayan ng mga setting ay maaaring pumili kung ano ang papaganahin ng Doctor. Ang anumang ibang pangalan ay iniuulat bilang babala at hindi pinapagana.
- Hindi kailanman pinapagana ng Doctor ang mga na-configure na binary bilang root, at nag-uulat ito kapag tumatakbo ito bilang root.
- Ang mga pag-aayos ay nagmumula sa isang nakapirming allow-list. Bawat isa ay nangangailangan ng napatunayang aksyon ng administrator sa web UI o `--yes` sa CLI, at bawat isa ay isinusulat sa Cacti log.

## Mga Release

Ang mga bersyon ay sumusunod sa SemVer at tumutugma sa `INFO` file ng plugin. Tingnan ang
[proseso ng pag-release](../../releasing.md) para sa pagpili ng bersyon, mga gate ng CI, nilalaman ng
package, mga checksum, at mga tagubilin sa pag-rollback.

## Pag-install

I-download ang `doctor-VERSION.tar.gz` o `doctor-VERSION.zip` at `SHA256SUMS` mula sa
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
I-verify ang SHA-256 checksum ng archive, pagkatapos ay i-extract ang direktoryong `doctor/` nito sa
direktoryong `plugins/` ng Cacti. Ito ang mga package na maaaring i-install; ang mga awtomatikong
source archive ng GitHub ay may ibang pangalan ng direktoryo. Upang patakbuhin ang hindi pa nai-release na
gawa mula sa `develop`, mag-install mula sa isang source checkout.

Para sa mga source checkout:

I-clone o i-unpack ang repositoryo bilang `plugins/doctor` sa loob ng isang instalasyon ng Cacti. Ang direktoryo ay dapat pangalanang `doctor`, hindi `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

I-install at i-enable ang **Cacti Doctor** mula sa **Configuration > Plugin Management**, pagkatapos ay magbigay ng realm na **Doctor Viewer**, **Doctor Operator**, o **Doctor Administrator** sa pamamagitan ng mga pahintulot ng user o grupo sa Cacti. Pinapanatili ng mga kasalukuyang grant ng **Cacti Doctor** ang access ng Administrator pagkatapos ng pag-upgrade. Lalabas ang ulat sa ilalim ng **Utilities > Cacti Doctor**.

## Mga Wika

Nagpapadala ang Doctor ng 45 na catalog ng pagsasalin na hindi Ingles sa ilalim ng `locales/po/` at `locales/LC_MESSAGES/` na sumasaklaw sa mga locale na Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Aprikano (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), at Asyano (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`). Ipinapakita ng Cacti ang isang catalog kapag naka-on ang suporta sa wika (**Configuration > Settings > General > Language Support**) at pumili ang isang user ng locale na inilalantad ng Cacti sa tagapili ng wika nito; magkakabisa ang mga catalog para sa mga locale na hindi pa nakalista sa tagapili ng Cacti kapag idinagdag na ng Cacti ang mga ito. Ang web page, ang mga setting, at ang mga mensahe at teksto ng ulat na ipini-print ng command line ay sumusunod sa wika ng Cacti; ang mismong ulat sa command-line ay gumagamit ng default na wika ng Cacti, na nananatiling Ingles maliban kung babaguhin mo ito.

Ang output na nababasa ng makina ay hindi kailanman isinasalin: ang mga check ID, mga key ng JSON at mga value ng status, ang output ng `--format=nagios` at `--format=prometheus`, mga linya ng log, at ang mga heading ng seksyon ng support-bundle ay nananatiling nasa Ingles upang patuloy na gumana ang mga script at pagsubaybay sa bawat wika. Ang tekstong `summary` at `detail` ng bawat pagsusuri ang tanging isinasaling bahagi ng ulat na JSON.

May kasama ring catalog ng Espanyol sa Latin America (`es-419`), ngunit walang locale ng Espanyol sa Latin America na mapipili sa parehong Cacti 1.2 at Cacti 1.3, kaya magkakabisa lamang ito kapag nagdagdag ng isa ang Cacti. Hanggang sa panahong iyon, piliin ang Espanyol (`es-ES`).

Nilo-load ng Cacti ang catalog ng isang plugin mula sa `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` gamit ang `doctor` bilang text domain, sa parehong 1.2.x at 1.3 (nire-resolve ng 1.3 ang direktoryo ng plugin sa pamamagitan ng na-configure nitong plugins path).

## Mga antas ng access

| Realm | Mga Kakayahan |
|---|---|
| Doctor Viewer | Basahin ang pinakabagong mga naka-iskedyul na status ng pagsusuri, oras ng obserbasyon, pagiging bago, at kamakailang pinagsamang kasaysayan. Walang mga command sa pagsusuri, raw na detalye, configuration, o pag-aayos. |
| Doctor Operator | Magpatakbo ng ulat sa pagsusuri na may 120-segundong limitasyon sa proseso, suriin ang mga na-redact na detalye, at kilalanin ang mga natuklasan. Walang mga pagbabago sa setting o pag-aayos. |
| Doctor Administrator | Mga kakayahan ng Operator kasama ang kasalukuyang mga pag-aayos na nasa allow-list at mga setting ng Doctor. Nangangailangan din ang mga pag-aayos at setting ng Settings/System Utilities realm ng Cacti. |

Binubuksan ng menu ng Utilities ang pahina para sa pinakamataas na Doctor realm na ibinigay sa user, kabilang ang mga grant ng grupo. Walang natatanggap na awtomatikong grant ang mga bagong Viewer at Operator realm. Nananatiling nakakabit ang orihinal na realm ID sa `doctor.php` bilang Administrator, na nagpapanatili ng kasalukuyang access ng user at grupo.

Ang data ng Viewer ay nagmumula sa mga naka-iskedyul na pagsusuri. I-enable ang pag-iskedyul bago magbigay ng Viewer access; ang mga nawawala o lampas na sa oras na obserbasyon ay nagpapakita ng **unknown**, hindi kailanman malusog. Pinapanatili ng kasaysayan ang huling 20 naka-iskedyul na pinagsamang bilang at hindi isinasama ang status ng device. Tahasang sinisimulan ng mga Operator ang mga bagong pagsusuri; ginagamit ng mga karaniwang pag-refresh ng pahina ang huling ulat ng kanilang session.

Ginagamit ng mga detalye at kabuuan ng device ang mga pahintulot ng device ng kasalukuyang user. Bukod pa rito, nangangailangan ng Log Administration realm ng Cacti ang mga sipi ng log. Tinatakpan ang mga sikreto bago i-store sa web session o i-render ang mga detalye ng pagsusuri. Patuloy na pinamamahalaan ng account ng operating-system ang access sa CLI.

Ang mga pagkilala (acknowledgment) ay personal at itinatala sa Cacti log. Nalalapat lamang ang mga ito sa parehong natuklasan at ebidensya; ang nabagong ebidensya ay nangangailangan ng bagong pagkilala. Hindi kailanman nito binabago ang status na pass/warn/fail, pinipigilan ang mga alerto, o minamarkahang malusog ang isang bumagsak na pagsusuri. Hiwalay ito sa mga tinanggap na eksepsyon sa babala (accepted-warning exceptions), na nakakaapekto sa patakaran sa alerto nang hindi binabago ang naobserbahang status at inilalarawan sa ibaba.

Ang bawat aksyon ay nangangailangan ng POST at ng isang wastong CSRF token. Ang mga pag-aayos ay nagpapakita ng hiwalay na pahina ng kumpirmasyon na may non-submitting na link na Cancel, at itinatala ang kumikilos na user at resulta sa Cacti log.

## Command line

Patakbuhin ang mga ito mula sa root ng Cacti bilang Cacti poller user, hindi bilang root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Nagpi-print ang text output ng isang linya bawat pagsusuri kasama ang status, kategorya, buod, at detalye nito. Nagpi-print ang `--json` ng isang `summary` object na may mga bilang ng status at isang `checks` array na ang mga entry ay nagtataglay ng `id`, `category`, `status`, `summary`, `detail`, at `repair`/`repairable` kapag naaangkop ang isang pag-aayos na nasa allow-list.

| Exit status | Kahulugan |
|---|---|
| `0` | Walang bumagsak na pagsusuri, o nagtagumpay ang hiniling na pag-aayos. Hindi binabago ng mga babala ang exit status. |
| `1` | Kahit isang pagsusuri ang bumagsak, o hindi nagtagumpay ang isang hiniling na pag-aayos. |
| `2` | Error sa paggamit: isang pag-aayos na pinatakbo nang walang `--yes` (hindi ito kailangan ng `--preview`), isang hindi kilalang repair ID, isang hindi kilalang format ng output, isang hindi sinusuportahang kumbinasyon ng `--symptom` o format, o isang instalasyon ng Cacti na hindi mahanap. |

Pinapataas ng Cacti ang `memory_limit` para sa bawat CLI script, kaya ang pagsusuri sa configuration ng PHP runtime ay makabuluhan lamang sa web page.

## Mga naka-iskedyul na pagsusuri at alerto

Sa ilalim ng **Configuration > Settings > Doctor**, i-on ang **Run Checks on a Schedule** at pumili ng agwat mula 15 minuto hanggang isang araw. Pagkatapos ng bawat cycle ng poller na nakatakda na, pinapatakbo ng Doctor ang bawat pagsusuri sa isang background process, kaya hindi naaapektuhan ang sariling oras ng pagtakbo ng poller.

Itinatala ng bawat pagtakbo ang naobserbahang status ng bawat pagsusuri. Nakakaapekto ang mga aktibong eksepsyon sa babala sa patakaran sa alerto nang hindi binabago ang obserbasyong iyon. Kapag nagsimula o huminto sa pagbagsak ang isang pagsusuri, isinusulat ng Doctor ang pagbabago sa Cacti log at, kung nakatakda ang **Alert Email Addresses**, nagpapadala ng email sa mga address na iyon sa pamamagitan ng mga setting ng mail ng Cacti. Nagdaragdag ang **Alert on Warnings** ng mga pagbabago papasok at palabas sa mga babala. Ang unang pagtakbo ay nagtatala lamang ng baseline.

Tumatakbo ang mga naka-iskedyul na ulat sa pangunahing poller sa ilalim ng database advisory lock at may dalawang minutong limitasyon sa worker. Iniuulat ng Doctor ang huling pagsisimula at matagumpay na pagkumpleto upang makita ang mga nawawala o lipas na resulta. Itinuturing na kasalukuyan ang mga resulta para sa agwat kasama ang isang polling cycle at tatlong minuto. Ang pagtakbong hindi nakumpleto ay sinusubukan muli pagkatapos ng 5, 10, 20 at higit pang mga minuto, hanggang sa normal na agwat. Pinapanatili ang nabigong paghahatid ng alerto para sa hanggang tatlong muling pagsubok na may tumataas na pagkaantala; pagkatapos nito, itama ang mga setting ng mail ng Cacti at patakbuhin ang `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` bilang poller user. Ang pagtanggap ng mail-server ay hindi nagkukumpirma ng paghahatid sa inbox.

Itinatakda ng parehong tab ang mga threshold para sa oras ng pagtakbo ng poller (80% ng agwat), libreng espasyo sa disk ng RRA (babala sa ibaba ng 10%, bagsak sa ibaba ng 2%), database clock drift (babala nang higit sa 5 segundo, bagsak nang higit sa 60), at laki ng Cacti log (100 MB). Ang mga walang laman o hindi wastong value ay babalik sa mga default na ito.

## Pagsasama sa pagsubaybay

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

Nagpi-print ang `--format=nagios` ng isang linya ng status na may performance data at lumalabas nang `0` (OK), `1` (WARNING), o `2` (CRITICAL), kaya direktang mapapatakbo ito ng Nagios, Icinga, o anumang katugmang sistema. Nagsusulat ang `--format=prometheus` ng format ng teksto ng Prometheus para sa textfile collector ng node_exporter: `cacti_doctor_check_status` bawat pagsusuri (0 pass o tinanggap na babala, 1 naaaksyunang babala, 2 pagkabigo), `cacti_doctor_check_observed_status` bago ang mga eksepsyon, `cacti_doctor_check_accepted`, `cacti_doctor_checks` bawat status, at `cacti_doctor_last_run_timestamp_seconds`. Ang mga JSON check row ay may kasamang field na `assessment`; ang `not_assessed` ay nangangahulugang hindi nakagawa ng konklusyon ang pagsusuri mula sa magagamit na data.

## Support bundle

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Ang bundle ay isang solong text file na may mga bersyon ng Doctor, Cacti, PHP, OS, at database, mga istatistika ng poller at Boost, ang buong ulat, at ang huling 200 linya ng Cacti log. Ang mga value na sumusunod sa mga pangalan ng password, secret, token, community, at key ay tinatakpan. Ginagawa ng Doctor ang file na mababasa lamang ng may-ari nito at tumatangging i-overwrite ang isang kasalukuyang file. Suriin ito bago ito i-post kahit saan.

## Patakaran sa pagkukumpuni

Ang Doctor ay may kasamang isang pagkukumpuni, ang `runtime_directories`. Lumilikha ito ng mga nawawalang runtime directory ng Cacti at nagdaragdag ng mga bit para sa pagbasa, pagsulat, at pagpapatakbo ng may-ari nang hindi inaalis ang mga umiiral na pahintulot.

Tinututukan nito ang `$cache_path`, `$log_path`, at `$rra_path` sa Cacti 1.3, o ang mga directory na `cache`, `log`, at `rra` ng pag-install kung hindi naman. Nilalaktawan nito ang mga directory na maaari nang sulatan, tinatanggihan ang mga directory sa labas ng pag-install ng Cacti (tulad ng isang log directory sa ilalim ng `/var/log`), tinatanggihan ang mga symbolic link, at tumatangging tumakbo bilang root. Hindi nito kailanman sinusundan ang `path_cactilog`, kaya ang isang log file na naka-configure sa loob ng isang code directory ay hindi makakapag-redirect ng pagkukumpuni roon. Sinusuri pa rin ng diagnostic ang directory ng naka-configure na log file sa bawat release.

Hindi ito nagpapalit ng pagmamay-ari, nagpapatakbo ng mga shell command, nagsusulat muli ng configuration, o nagbabago ng data ng application ng Cacti. Ang bawat bagong pagkukumpuni ay dapat may kasamang diagnostic, isang allow-listed na handler, kumpirmasyon, pag-log ng audit, at mga pagsusuri.

## Pagsisiyasat sa mga sintomas

Maaaring piliin ng mga Operator at Administrator ang **Siyasatin ang isang sintomas** sa pahina ng Doctor. Ang parehong mga panuntunan ay magagamit sa pamamagitan ng `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, o `alerts_missing`, na may text o JSON na output. Kasama sa mga support bundle ang mga nauugnay na pagsisiyasat sa sintomas.

Inililista ng bawat kandidato ang mga naobserbahang pagsusuri at ang susunod na hakbang sa pagberipika. Ang mga kandidato ay mga hinuha lamang, hindi mga kumpirmadong pangunahing sanhi. Ang mga nawawala, hindi nasuri, o lumang obserbasyon ay hindi kailanman nagpapatunay ng isang sanhi. Gumagamit ang mga pagsisiyasat sa web ng ulat na na-filter ayon sa pahintulot; gumagamit naman ang mga ulat sa CLI ng access ng account ng operating system.

## Pagiging bago ng pag-update ng RRD

Sinusuri ng `filesystem.rrd_stale` ang hanggang 500 aktibong data source, maliban sa mga naka-disable at down na device. Sa mas malalaking pag-install, nagbabago ang sample bawat oras, kaya ang mga paulit-ulit na pagpapatakbo ay sumasaklaw sa iba't ibang file. Inihahambing nito ang mga oras ng pagbabago ng file sa pinakamalaki sa pagitan ng poller interval, source RRD step, at profile step, na minultiply sa **Mga Agwat ng Pagkaluma ng RRD** (default ay 3). Ipinapakita nito ang tatlong pinakalumang lipas na file at ang bilang ng mga apektadong device. Ang mga resulta sa web ay nagsasama lamang ng mga pinahihintulutang device.

Ang `filesystem.rrd_files` ay isang hiwalay na pagsusuri ng pagkakaroon ng file. Hinahanap nito ang RRD file ng hanggang 5,000 aktibong data source, kabilang ang mga nasa naka-disable o down na device, at gumagamit ng parehong oras-oras na sample.

Nagdaragdag ang Boost ng dalawang beses ng naka-configure nitong flush interval bilang palugit sa pagsulat sa disk. Para sa isa pang deferred writer, i-configure ang **Palugit sa Naantalang Pagsulat sa RRD (segundo)**. Ang isang naka-anunsyong `RRDCACHED_ADDRESS` na walang palugit, o isang hindi wastong Boost interval, ay nagdudulot ng hindi nasuring resulta. Hindi kailanman nagfa-flush ng cache ang Doctor upang isagawa ang pagsusuring ito. Ang oras ng pagbabago ay katibayan ng aktibidad sa disk, hindi patunay ng matagumpay na pagkolekta ng data. Ang panlabas na pag-cache na hindi matukoy ng Doctor ay dapat na hayagang i-configure.

Binibilang sa detalye ang mga nawawala, hindi mabasa, at may petsa sa hinaharap na mga file. Ang resulta ay hindi nasuri lamang kapag walang mabasa sa mga na-sample na file. Ang isang na-sample na resulta ay nagsasaad na bahagi lamang ng pag-install ang saklaw nito; ang pagpasa ay hindi sumasaklaw sa mga hindi na-sample na file.

## Mga preview ng pagkukumpuni at kasaysayan ng audit

Ipinapakita ng pahina ng pagkukumpuni para sa Administrator ang bawat apektadong path, ang iminungkahing aksyon nito, kasalukuyang mga pahintulot, at mga target na pahintulot. Ang pag-apruba ay nakatali sa preview na iyon, sa gumaganap na user, at sa limang minutong tagal. Inuubos ng kumpirmasyon ang preview; ang isang nabagong filesystem ay nangangailangan ng panibagong preview. Ang pagpapatakbo bilang root, mga path sa labas ng pag-install, mga link na nangangailangan ng pagkukumpuni, at hindi natugunang mga pahintulot sa filesystem ay pumipigil sa pag-apruba.

Nagpi-print ang `--repair=runtime_directories --preview` ng read-only na JSON plan. Inaaprubahan ng `--repair=runtime_directories --yes` ang isang bagong kinakalkulang CLI plan at muling sinusuri ito bago ipatupad. Ang CLI account ay dapat na awtorisado nang kumpunihin ang pag-install; hindi ito nagmamana ng mga web role.

Dapat munang mai-save ang isang nakabalangkas na `repair.started` record bago ang anumang pagbabago sa filesystem. Ang isang nakaugnay na `repair.completed` record ay naglalaman ng post-repair snapshot at resulta ng pagberipika. Ang isang naantalang operasyon ay nag-iiwan ng started record para sa pagsisiyasat. Ang pagkabigo sa completion-audit ay iniuulat bilang pagkabigo kahit na naganap ang mga pagbabago sa filesystem. Nagdaragdag ang Doctor ng mga pahintulot ng may-ari at lumilikha ng mga directory; hindi ito sumusubok ng awtomatikong rollback.

Maaaring basahin ng mga Administrator na may pahintulot na Settings/System Utilities ng Cacti ang pinakabagong 20 audit entry sa pahina ng Doctor. Pinapanatili ng plugin ang pinakabagong 200 record sa `plugin_doctor_audit`; itinatala rin ng Cacti log ang kanilang mga ID, aksyon, at gumaganap. Ang mga payload ng audit ay nire-redact.

## Mga tinanggap na babala

Maaaring gumawa ang mga Administrator na may pahintulot na Settings/System Utilities ng Cacti ng isang **Pagbubukod sa babala** mula sa isang bago at nasuring babala sa pahina ng Doctor. Ang pagbubukod ay nangangailangan ng may-ari, dahilan, at petsa ng pagsusuri sa UTC sa loob ng 90 araw. Mag-e-expire ito sa hatinggabi ng UTC sa simula ng petsang iyon. Hanggang 100 pagbubukod ang maaaring i-configure. Ipinapakita ng listahan ang mga nag-expire na entry at mga ID na wala sa kasalukuyang ulat, at pinapayagan ang pag-alis.

Nananatiling nakikita ang naobserbahang babala, kasama ang may-ari, dahilan, at pag-expire nito sa mga detalye ng diagnostic. Pinapanatili ng JSON ang naobserbahang status at nagdaragdag ng `accepted` at `acceptance` metadata. Ibinubukod ng Nagios ang mga aktibong tinanggap na babala mula sa exit severity nito ngunit pinapangalanan ang mga ito sa output nito. Ini-export ng Prometheus ang parehong naobserbahan at maaaring aksyunang severity. Nananatiling hindi nagbabago ang karaniwang CLI exit status: ang mga babala ay lumalabas na zero, at ang mga pagkabigo ay lumalabas na isa.

Pinipigilan ang mga nakaiskedyul na alerto ng babala habang umiiral ang pagbubukod; ang pag-expire o pag-alis ay muling nagpapahintulot sa patuloy na babala na makapagpadala ng mga alerto ng babala. Ang mga paglipat sa pagkabigo at pagbawi mula sa pagkabigo ay nananatiling kwalipikado para sa mga alerto. Ang isang hindi nasuring resulta o pagkabigo ay hindi maaaring tanggapin. Ang personal na pagkilala ay hiwalay at hindi pumipigil sa anumang bagay. Ang paggawa at pag-alis ng pagbubukod ay transactional kasama ang audit record.

Lumilikha ang pag-upgrade ng `plugin_doctor_audit` at `plugin_doctor_acceptance` nang hindi binabago ang data ng application ng Cacti. I-export ang anumang kasaysayan na kailangan mo bago mag-uninstall: inaalis ng pag-uninstall ang parehong talahanayan ng plugin at ang mga setting nito. Ang pagbabalik ng mga file ng plugin sa dating bersyon ay nag-iiwan sa mga talahanayan na magagamit para sa pagsisiyasat, ngunit ang mga mas lumang bersyon ay hindi gumagalang sa mga pagbubukod sa babala.

## Mga kinakailangan

| Cacti | PHP | Mga Tala |
|---|---|---|
| 1.2.20 | 5.4 o mas bago | Ang sariling code ng Doctor ay tugma sa PHP 5.4 upang makapagsuri ito ng mga lumang sistema bago ang pag-upgrade |
| 1.2.31 | 8.0 o mas bago | Kinakailangan ng `composer.json` ng Cacti ang `>=8.0` |
| Kasalukuyang 1.2.x | 8.2 o mas bago | Kinakailangan ng `composer.json` ng Cacti ang `>=8.2` |
| `develop` (1.3) | 8.3 o mas bago | Kinakailangan ng `composer.json` ng Cacti ang `^8.3` |

Inihahambing ng row na **Pagkatugma ng PHP sa naka-install na Cacti** ang tumatakbong bersyon ng PHP sa kinakailangan ng PHP sa sariling root `composer.json` ng Cacti, kabilang ang itaas na hangganan ng isang caret constraint tulad ng `^8.3`. Sinusuri ang naka-configure na PHP CLI executable laban sa parehong kinakailangan. Kinikilala ng Doctor ang mga anyo ng constraint na `>=` at `^` na ginagamit ng mga Cacti package na ito. Ang hindi mabasa, mali ang pagkakabuo, nawawala, o hindi makilalang kinakailangan ay nagdudulot ng babala; ang mga pag-install ng Cacti 1.2.20–1.2.30 na walang manifest ay nagpapanatili ng kanilang dokumentadong PHP 5.4 installer floor. Ang sariling pagkatugma ng Doctor sa PHP 5.4 ay hindi nagtatatag ng pagkatugma sa mas bagong pag-install ng Cacti.

Sinasagot ng row na **Suporta sa seguridad ng upstream ng PHP** ang isang hiwalay na tanong: nakakatanggap pa ba ng mga pag-aayos sa seguridad mula sa proyekto ng PHP ang release branch ng PHP na iyon? Iniuulat nito ang nakalathalang petsa ng pagtatapos ng suporta sa seguridad ng branch at nagbibigay ng babala pagkatapos ng petsang iyon. Halimbawa, maaaring matugunan ng PHP 8.1 ang kinakailangan sa runtime ng mas lumang pag-install ng Cacti habang hindi na nakakatanggap ng mga upstream na pag-aayos sa seguridad. Ang pasadong resulta ay hindi nangangahulugang napapanahon ang naka-install na patch release, at hindi matukoy ng Doctor kung nagbibigay ang isang OS vendor ng mga backported na pag-aayos.

Ang mga petsa ng suporta ay naka-bundle sa Doctor mula sa [iskedyul ng suporta ng PHP](https://www.php.net/supported-versions.php) at [listahan ng end-of-life](https://www.php.net/eol.php), na huling sinuri noong 2026-11-08. Ang mga hindi kilalang branch at prerelease ay nagdudulot ng babala sa halip na ipalagay na pasado. Walang network request na ginagawa habang nagsasagawa ng mga diagnostic. I-update ang data ng suporta ng Doctor kapag naglathala ang PHP ng bagong iskedyul. Hindi nagbabago ang mga umiiral na JSON/monitoring ID na `php.version` at `php.security_baseline`.

## Pag-develop

Gumagamit ang unit suite ng Pest at tumatakbo sa PHP 8.2 o mas bago:

```console
composer install
composer test
```

Pinapalitan ng mga pagsusuri ang mga Cacti function na tinatawag ng Doctor ng maliliit na pamalit sa `tests/CactiStubs.php`, kaya tumatakbo ang mga ito nang walang pag-install ng Cacti.

Nagpapatakbo ang GitHub Actions ng apat na uri ng pagsusuri sa bawat push at pull request:

- `php -l` sa bawat PHP file sa ilalim ng PHP 5.4, 5.6, 7.0, 7.1, 7.4, at 8.0 hanggang 8.4.
- Ang unit suite sa PHP 8.2, 8.3, at 8.4.
- `locales/build_gettext.sh --check`, na nabibigo sa isang lumang translation template, isang hindi kumpleto o fuzzy na catalog, o isang compiled catalog na naiiba sa source nito.
- Pitong integration job na nag-i-install ng Cacti 1.2.20, ang kasalukuyang 1.2.x branch, at `develop` laban sa MySQL at MariaDB, na may parehong cmd.php at Spine. Ang bawat job ay nag-i-install at nag-e-enable ng plugin, nagpapatakbo ng buong CLI report, at sumusuri sa schema ng ulat, kabuuan ng buod, mga inaasahang status, at ang eksaktong hanay ng mga pagkabigo. Pagkatapos ay sinisira nito ang isang binary path at ang poller timestamp, kinukumpirma na pareho ang naiulat, ibinabalik ang mga ito, isinasagawa ang pagkukumpuni at ang kumpirmasyon nito, at nagpapatakbo ng disable, enable, uninstall, at reinstall. Pinapanatili ang JSON report bilang artifact kapag nabigo ang isang job.

## Pag-aambag

Ang mga pull request ay pumupunta sa `develop`. Panatilihing tugma sa PHP 5.4 ang mga production file at gamitin ang estilo ng Cacti: mga tab, single-quoted na mga string, at mga Cacti helper tulad ng `read_config_option()` at `db_fetch_cell()`. Magdagdag ng unit test para sa bawat pagbabago sa gawi, i-sign off ang iyong mga commit (`git commit -s`), at magdagdag ng linya sa `CHANGELOG.md`.

### Mga Pagsasalin

Ibalot ang bawat mensaheng nakikita ng user sa `__('...', 'doctor')` (o `__n()`, `__x()`, `__esc()`), at bigyan ang isang pangungusap na naglalaman ng halaga ng iisang format string na may sunud-sunod na `%s`/`%d` na placeholder sa halip na pagdugtung-dugtungin ang mga bahagi. Fino-format lamang ng `__()` ng Cacti ang isang mensahe kapag naglalaman ito ng format specifier at hindi nito sinusuportahan ang mga positional na `%1$s` na anyo. Ginagawa rin nitong `%` ang `%%` bago i-format, kaya huwag kailanman maglagay ng literal na percent sign sa isang mensahe: ipasa ang halaga kasama ang sign nito bilang argumento (`__('Usage: %s', '50%', 'doctor')`). Ang mga linya ng log ay nananatiling nasa Ingles: gamitin ang `doctor_repair_message()` para sa teksto ng pag-aayos at `doctor_n_()` para sa mga mensaheng nilo-log at isinasalin lamang kung saan ipinapakita. Panatilihing hindi nakasalin ang mga check ID, JSON key, status keyword, monitoring output, at mga linya ng log.

Nire-regenerate ng `locales/build_gettext.sh` ang template na `locales/po/cacti.pot`, imine-merge ito sa bawat catalog na `locales/po/<locale>.po`, at kino-compile ang `locales/LC_MESSAGES/<locale>.mo`; i-commit ang lahat ng tatlo. Pinapatakbo ng CI ang `sh locales/build_gettext.sh --check`, na nabibigo kapag luma na ang template o may nawawala o fuzzy na entry sa isang catalog, magkaiba ang isang placeholder, o luma na ang isang compiled file. Dahil dito, kailangang i-update ang mga salin ng binagong mensahe sa parehong pull request. Nangangailangan ito ng GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Ang isang bagong wika ay isang bagong `<locale>.po` na pinangalanan ayon sa pagpapangalan ng Cacti sa mga locale nito (halimbawa `pt-BR`).

## Seguridad

Iulat nang pribado ang mga kahinaan tulad ng inilalarawan sa [SECURITY.md](../../../SECURITY.md), hindi sa mga publikong isyu.

## Lisensya

Copyright (C) 2026 Thomas Vincent. Inilabas sa ilalim ng GNU General Public License, bersyon 2 o mas bago. Tingnan ang [LICENSE](../../../LICENSE).
