<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kákítọ́sì kan tó wọ ohun èlò ìtẹ́tísí àyà. Ṣe àyẹ̀wò. Ṣe àtúnṣe. Ṣe àbójútó.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Ipò Ẹnu-ọ̀nà Dídára"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Ìwé-àṣẹ: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ àti 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor jẹ́ àfikún Cacti tí ó ń ṣe àyẹ̀wò fífi-sórí-ẹ̀rọ ní ìgbésẹ̀ kan ṣoṣo, tí ó sì ń ṣe àwọn àtúnṣe kéékèèké kìkì nígbà tí olùṣàkóso bá bèèrè fún wọn.

**Ipò: ó ṣì wà lábẹ́ ìdàgbàsókè, ṣáájú 1.0.** Ìtẹ̀jáde tuntun jù lọ ni [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Àtúnṣe yìí fi àwọn àkójọpọ̀ èdè Híndì àti Lárúbáwá àti àwọn ìtọ́nisọ́nà olùlò tí a túmọ̀ kún ìráyè ní ìbámu pẹ̀lú ipa-iṣẹ́, àyẹ̀wò pẹ̀lú ìtọ́sọ́nà, àwọn àyẹ̀wò ìjẹ́-tuntun RRD ní ìwọ̀n ààyè rẹ̀, àwọn àwòkọ àtúnṣe àti ìtàn àyẹ̀wò-iṣẹ́, àwọn ìyọ̀ǹda ìkìlọ̀ tí a gbà wọlé, àti àwọn ìtúmọ̀ èdè nínú 0.6.0. Wo [CHANGELOG.md](../../../CHANGELOG.md) fún àlàyé kíkún.

## Àwọn àwòrán ojú-òpó

Àwọn ìtòlẹ́sẹẹsẹ àyẹ̀wò àti ìṣètò àkókò nínú fífi-sórí-ẹ̀rọ àpẹẹrẹ Cacti 1.2.31 tí a yà sọ́tọ̀ tí ó ń ṣiṣẹ́ lórí PHP 8.3.36, pẹ̀lú àwọn àyẹ̀wò ìbáramu PHP ti Cacti, àtìlẹ́yìn ààbò láti orísun àgbà, àti ìlera ibi-ìpamọ́-dátà. Àwọn ìkìlọ̀ àti ìkùnà tí a fi hàn níbí ṣàpèjúwe àyíká àpẹẹrẹ náà.

![Tábìlì àyẹ̀wò Doctor pẹ̀lú àwọn èsì ìyẹ̀wò-kọjá, ìkìlọ̀, àti ìkùnà](../../screenshots/diagnostics.png)

![Àwọn ìtòlẹ́sẹẹsẹ ìṣètò àkókò, ìtanijí, àti ààlà Doctor](../../screenshots/settings.png)

Àwọn ìṣòro Cacti sábà máa ń fara hàn gẹ́gẹ́ bí ààmì àìsàn: àwọn àwòrán àtẹ tí ó ṣófo, poller tí ó dúró, àfikún tí kò fẹ́ fi sí orí ẹ̀rọ. Ohun tí ó sábà máa ń fà á ni ohun ìbẹ̀rẹ̀ dandan kan tí ó ti yí padà, bíi àfikún-iṣẹ́ PHP tí ó sọnù nínú ìkọ́lé CLI, àpò-ìwé àkọsílẹ̀ tí poller kò lè kọ nǹkan sí i, ipa-ọ̀nà RRDtool tí ó ń tọ́ka sí fáìlì aláṣẹ tí kò tọ́, tàbí ibi-ìpamọ́-dátà tí kò ní àwọn tábìlì agbègbè-àkókò. Doctor ń ṣe àyẹ̀wò àwọn ohun ìbẹ̀rẹ̀ dandan wọ̀nyẹn tààrà, ó sì ń ròyìn ọ̀kọ̀ọ̀kan gẹ́gẹ́ bí ìyẹ̀wò-kọjá, ìkìlọ̀, tàbí ìkùnà pẹ̀lú gbólóhùn kan tí ó ṣàlàyé ohun tí ó rí. Ìròyìn kan náà wà lórí ojú-ewé wẹ́ẹ̀bù, lórí ìlà àṣẹ, àti gẹ́gẹ́ bí JSON fún àbójútó.

## Ohun tí ó ń yẹ̀ wò

| Agbègbè | Àwọn àyẹ̀wò |
|---|---|
| Doctor | Bóyá Doctor fúnra rẹ̀ ń ṣiṣẹ́ gẹ́gẹ́ bí root, èyí tí yóò mú kí àwọn àyẹ̀wò àṣẹ ṣàpèjúwe àkọọ́lẹ̀ tí kò tọ́ |
| Cacti àti PHP | Ẹ̀yà Cacti, ìgbésókè tí olùfi-sórí-ẹ̀rọ kò parí rí, àwọn àfikún tí a ṣí sílẹ̀ ṣùgbọ́n tí àwọn fáìlì wọn sọnù, ìbáramu PHP pẹ̀lú àkójọ Cacti tí a fi sórí ẹ̀rọ, ipò àtìlẹ́yìn ààbò PHP láti orísun àgbà |
| Àwọn àfikún-iṣẹ́ PHP | Àwọn àfikún-iṣẹ́ tí a nílò nínú PHP wẹ́ẹ̀bù àti nínú CLI PHP tí poller ń lò, pẹ̀lú àwọn ẹ̀yà ara tí a dámọ̀ràn |
| Ìtòlẹ́sẹẹsẹ PHP | `memory_limit`, `max_execution_time`, àti `date.timezone`, nípa lílo àwọn àbá Cacti fúnra rẹ̀ |
| Ibi-ìpamọ́-dátà | Ìsopọ̀mọ́ra, ẹ̀yà olùpèsè-iṣẹ́ lòdì sí àbá Cacti, àkójọ àwọn lẹ́tà UTF-8, àwọn tábìlì agbègbè-àkókò, àwọn tábìlì pàtàkì, ìyàtọ̀ aago láti olùgbàlejò PHP, àti àwọn ìtòlẹ́sẹẹsẹ InnoDB tí Cacti máa ń sàmì sí gẹ́gẹ́ bí àṣìṣe |
| Ìlera ibi-ìpamọ́-dátà | Agbára ìsopọ̀, kíkà buffer-pool, àwọn tábìlì ìgbà-díẹ̀ lórí díìsìkì, ìṣẹ̀dá òwú ìsopọ̀, àwọn àṣẹ tí ó lọ́ra, àti ìdádúró buffer àkọsílẹ̀ InnoDB, pẹ̀lú àwọn àbá àtúnṣe tí ó dá lórí ìwọ̀n iṣẹ́ |
| Ètò fáìlì | Àwọn àpò-ìwé cache, àkọsílẹ̀, àti RRA tí a lè kọ sí i; ààyè òfò fún àwọn fáìlì RRD; àwọn orísun dátà tí ń ṣiṣẹ́ láìsí fáìlì RRD tàbí pẹ̀lú àtúnṣe fáìlì tí ó ti pẹ́ jù; `include/config.php` tí kì í ṣe èyí tí gbogbo ènìyàn lè kà; àkọsílẹ̀ Cacti tí a lè kọ sí i tí kò sì tóbi jù |
| Àwọn fáìlì aláṣẹ | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, àti Spine nígbà tí ó bá jẹ́ poller tí a ṣètò, pẹ̀lú àwọn ẹ̀yà níbi tí Cacti bá ti sọ ọ̀kan |
| Àkọsílẹ̀ | Àwọn àṣìṣe láàárín àwọn ìlà àkọsílẹ̀ Cacti tuntun jù lọ, pẹ̀lú ìfiránṣẹ́ tí ó wọ́pọ̀ jù lọ |
| Àwọn ẹ̀rọ | Àwọn ẹ̀rọ tí a ṣí sílẹ̀ tí ó wà ní ìsàlẹ̀ tàbí tí ó ń bọ̀ sípò, mẹ́ta tí ó ti wà ní ìsàlẹ̀ pẹ́ jù lọ pẹ̀lú àṣìṣe ìkẹyìn wọn, àti ìkùnà nígbà tí ọ̀pọ̀lọpọ̀ àwọn ẹ̀rọ bá wà ní ìsàlẹ̀ lẹ́ẹ̀kan náà |
| Poller | Irú poller àti àkókò láàárín rẹ̀, àkókò láti ìgbà tí poller àkọ́kọ́ ti parí kẹ́yìn, àkókò ìṣiṣẹ́ lòdì sí àkókò láàárín rẹ̀, èsì poller tí kò dé inú fáìlì RRD rí, àwọn poller òkèèrè tí ó dẹ́kun ríròyìn, Boost tí ó dúró díẹ̀, àti ìtòlẹ́sẹẹsẹ Spine tí ó ń tọ́ka sí ibi-ìpamọ́-dátà mìíràn |

Àyẹ̀wò kọ̀ọ̀kan ní ID tí kì í yí padà, bíi `database.timezone` tàbí `binary.rrdtool`, kí àwọn àkọsílẹ̀-àṣẹ lè dá lórí àwọn èsì kọ̀ọ̀kan.

## Àwòrán kóòdù àti àyẹ̀wò

| Ìhùwàsí | Ìmúlò | Ẹ̀rí àyẹ̀wò nínú ibi-ìpamọ́ kóòdù yìí |
|---|---|---|
| Àwọn àyẹ̀wò ìtúpalẹ̀ àti àwọn ID ìròyìn tí kì í yí padà | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Ìráyè ní ìbámu pẹ̀lú ipa-iṣẹ́ àti àwọn ìròyìn wẹ́ẹ̀bù tí a ti yọ àwọn kókó àṣírí kúrò | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Àwọn ìwádìí ààmì-àìsàn pẹ̀lú ìtọ́sọ́nà | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Ìjẹ́-tuntun RRD àti ìtọ́jú kíkọ tí a sún síwájú | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Àwọn àwòkọ àtúnṣe, ìtàn àyẹ̀wò-iṣẹ́, àti àwọn ìkìlọ̀ tí a gbà wọlé | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Àwọn àyẹ̀wò tí a ṣètò àkókò wọn àti àwọn ìyípadà ìtanijí | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Àwọn ìtọ́kasí wọ̀nyí ń fi ìmúlò àti ààbò àyẹ̀wò hàn; wọn kò sọ pé gbogbo iṣẹ́ CI ti kọjá fún àtúnyẹ̀wò lọ́wọ́lọ́wọ́. Ṣe àyẹ̀wò ìṣiṣẹ́ workflow fún àtúnyẹ̀wò tí o gbèrò láti gbé kalẹ̀.

## Ìmọ̀ràn ìlera ibi-ìpamọ́-dátà

Olùtúpalẹ̀ PHP abínibí ti Doctor ń ka àkójọpọ̀ àwọn òǹkà MySQL tàbí MariaDB àgbáyé tí a ti yàn nípasẹ̀ ìsopọ̀ ibi-ìpamọ́-dátà Cacti tí ó wà tẹ́lẹ̀. Ó ń ṣe ìbéèrè kíkà-nìkan méjì fún ìròyìn kọ̀ọ̀kan, kò nílò ìwé-ẹ̀rí àfikún tàbí fáìlì aláṣẹ kankan, kò sì yí ìtòlẹ́sẹẹsẹ ibi-ìpamọ́-dátà padà láé. Àwọn àyẹ̀wò wọ̀nyí ń fara hàn nínú ìròyìn wẹ́ẹ̀bù, CLI, JSON, èsì àbójútó, àkójọ ìrànlọ́wọ́, àti títọpa ipò tí a ṣètò àkókò rẹ̀.

| ID Àyẹ̀wò | Ohun tí ó ń ru ìwádìí sókè |
|---|---|
| `database.health_sample` | Ó dín sí wákàtí 24 láti ìgbà ìbẹ̀rẹ̀ tàbí `FLUSH STATUS`, tàbí àkókò ìṣiṣẹ́ tí kò sí/tí kò bára mu |
| `database.connection_capacity` | Àwọn ìsopọ̀ lọ́wọ́lọ́wọ́ tàbí èyí tí ó ga jù lọ tí a kọ sílẹ̀ jẹ́ ó kéré tán 80% ti `max_connections` lọ́wọ́lọ́wọ́ |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` jẹ́ ó kéré tán 1%, pẹ̀lú ó kéré tán 10,000 ìbéèrè kíkà |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` jẹ́ ó kéré tán 25%, pẹ̀lú ó kéré tán 1,000 tábìlì ìgbà-díẹ̀ |
| `database.thread_cache` | `Threads_created / Connections` jẹ́ ó kéré tán 5%, pẹ̀lú ó kéré tán 1,000 ìgbìyànjú ìsopọ̀ àti `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` jẹ́ ó kéré tán 1%, pẹ̀lú ó kéré tán 1,000 gbólóhùn-àṣẹ |
| `database.redo_log_waits` | `Innodb_log_waits` tí kì í ṣe òdo |

Àwọn wọ̀nyí jẹ́ ààlà ìwádìí ti Doctor, kì í ṣe ibi-àfojúsùn ìtòlẹ́sẹẹsẹ olùtajà. Àyàfi agbára ìsopọ̀, ìmọ̀ràn àkójọpọ̀ nílò ààyè àkókò àkíyèsí tí ó wà lókè. Àwọn òǹkà tí ó sọnù, tí kò ṣe dáadáa, tí ó ṣe méjì, tàbí tí ó tóbi jù, ìṣiṣẹ́ tí kò tó, àti àwọn ipò thread tí a kò ṣètìlẹ́yìn fún ń mú ìkìlọ̀ jáde dípò ìdájọ́ ìlera tàbí àbá àtúnṣe. Àwọn ìkìlọ̀ lè nípa lórí ipò Nagios àti àwọn ìtanijí tí a ṣètò àkókò wọn nígbà tí **Ìtanijí lórí Àwọn Ìkìlọ̀** bá wà ní ṣíṣí.

Ka àwọn òǹkà tí a wọ̀n àti àbá náà papọ̀. Àwọn iye àkójọpọ̀ kò fi hàn ìwọ̀n ẹrù lọ́wọ́lọ́wọ́; àwọn òǹkà lè ní ìtàn ìtúnṣe-bẹ̀rẹ̀ tí ó yàtọ̀, wọn kì í sì í ṣe àwòrán àkókò kan ṣoṣo tí kò ṣe é pín. Àwọn ìsopọ̀ tí ó ga jù lọ lè ṣàfihàn ààlà àtijọ́ kan. Ìka àwọn ìbéèrè tí ó lọ́ra da lórí `long_query_time`, òǹkà tábìlì ìgbà-díẹ̀ lórí díìsìkì ti MySQL sì lè fi àwọn fáìlì tí a ya àwòrán sí ìrántí sílẹ̀. Ìpíndọ́gba kékeré kò fi hàn pé kò sí ìdènà kankan. Fìdí àwọn ìtẹ̀síwájú múlẹ̀ lábẹ́ ìwọ̀n iṣẹ́ tí ó ṣojú fún gidi, ṣe àtúnyẹ̀wò àwọn ètò ìbéèrè àti àtúnlò ìsopọ̀, kí o sì wọ̀n ìrántí lórí **olùgbàlejò ibi-ìpamọ́-dátà** ṣáájú kí o tó yí àwọn buffer tàbí àwọn ààlà ìsopọ̀ padà.

Tí àwọn ìwọ̀n kò bá sí, ṣe àyẹ̀wò àtìlẹ́yìn olùpèsè-iṣẹ́ àti ìráyè àkọọ́lẹ̀ Cacti sí `SHOW GLOBAL STATUS` àti `SHOW GLOBAL VARIABLES`; Doctor kò béèrè fún ìwé-ẹ̀rí gíga. Àwọn ìtumọ̀ òǹkà wá láti inú [ìtọ́kasí oníyípadà-ipò MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) àti [ìtọ́kasí oníyípadà-ipò MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Kò sí àkọsílẹ̀-àṣẹ tàbí kóòdù MySQLTuner kankan tí a lò.

Kò sí ìyípadà ètò ibi-ìpamọ́-dátà tàbí ìtòlẹ́sẹẹsẹ kankan tí a nílò. Gbé àwọn fáìlì àfikún kalẹ̀ bíi ti ìṣe déédé; dídá àwọn fáìlì wọ̀nyẹn padà yóò mú àwọn àyẹ̀wò tí a fi kún un kúrò. Ipò tí a ṣètò àkókò rẹ̀ tẹ́lẹ̀ yóò di tuntun ní ìṣiṣẹ́ tí ó tẹ̀ lé e.

## Bí ó ṣe ń pa ààbò mọ́

Ohun èlò ìṣàyẹ̀wò máa ń ṣiṣẹ́ pẹ̀lú àṣẹ poller tàbí ti apèsè wẹ́ẹ̀bù, ó sì máa ń ka àwọn ipa-ọ̀nà láti inú tábìlì ètò, nítorí náà ó gbọ́dọ̀ ṣọ́ra nípa ohun tí ó bá ṣe àti ohun tí ó bá yí padà.

- Àwọn ìṣàyẹ̀wò wà fún kíkà nìkan. Wọn kì í yí àwọn fáìlì, ètò, tàbí dátà padà rárá.
- Doctor máa ń ṣiṣẹ́ fáìlì aláṣẹ tí a ṣètò kìkì nígbà tí orúkọ fáìlì rẹ̀ bá bá ètò tí a retí mu (`php`, `rrdtool`, `snmpget`, tàbí `snmpwalk`). Bí bẹ́ẹ̀ kọ́, ẹnikẹ́ni tí ó bá lè kọ nǹkan sínú tábìlì ètò lè yan ohun tí Doctor yóò ṣiṣẹ́. Orúkọ mìíràn yòówù ni a óò ròyìn gẹ́gẹ́ bí ìkìlọ̀, a kò sì ní ṣiṣẹ́ rẹ̀.
- Doctor kì í ṣiṣẹ́ àwọn fáìlì aláṣẹ tí a ṣètò gẹ́gẹ́ bí root rárá, ó sì máa ń ròyìn nígbà tí ó bá ń ṣiṣẹ́ gẹ́gẹ́ bí root.
- Àwọn àtúnṣe máa ń wá láti inú àtòjọ àṣẹ tí a ti yàn kalẹ̀. Ọ̀kọ̀ọ̀kan nílò ìgbésẹ̀ alámòójútó tí a ti fìdí rẹ̀ múlẹ̀ nínú ojú-ìwé wẹ́ẹ̀bù tàbí `--yes` lórí ìlà àṣẹ, a sì máa ń kọ ọ̀kọ̀ọ̀kan sínú àkọsílẹ̀ Cacti.

## Àwọn ìtẹ̀jáde

Àwọn ẹ̀yà náà tẹ̀lé ìlànà SemVer, wọ́n sì bá fáìlì `INFO` ti àfikún náà mu. Wo
[ìlànà ìtẹ̀jáde](../../releasing.md) fún yíyan ẹ̀yà, àwọn ìdènà àyẹ̀wò CI, ohun tí ó wà nínú àkójọpọ̀ fáìlì,
àwọn àmì ìdánilójú, àti ìtọ́nisọ́nà dídápadà sẹ́yìn.

## Ìfisílẹ̀

Ṣe ìgbàsílẹ̀ `doctor-VERSION.tar.gz` tàbí `doctor-VERSION.zip` àti `SHA256SUMS` láti
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Fìdí àmì ìdánilójú SHA-256 ti àpamọ́ náà múlẹ̀, lẹ́yìn náà tú àpò `doctor/` rẹ̀ sínú
àpò `plugins/` ti Cacti. Àwọn wọ̀nyí ni àwọn àkójọpọ̀ tí a lè fi sílẹ̀; àwọn àpamọ́ orísun aládàáṣe ti GitHub
ní orúkọ àpò tí ó yàtọ̀. Láti ṣiṣẹ́ iṣẹ́ tí kò tíì jáde
láti `develop`, ṣe ìfisílẹ̀ láti inú ẹ̀dà kòòdù orísun.

Fún àwọn ẹ̀dà kòòdù orísun:

Ṣe ẹ̀dà tàbí tú ibi ìpamọ́ kòòdù náà gẹ́gẹ́ bí `plugins/doctor` sínú ìfisílẹ̀ Cacti kan. Orúkọ àpò náà gbọ́dọ̀ jẹ́ `doctor`, kì í ṣe `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Fi **Cacti Doctor** sílẹ̀ kí o sì mú un ṣiṣẹ́ láti **Ìṣètò > Ìṣàkóso Àfikún** (**Configuration > Plugin Management**), lẹ́yìn náà fún un ní agbègbè àṣẹ **Olùwòran Doctor** (**Doctor Viewer**), **Olùṣiṣẹ́ Doctor** (**Doctor Operator**), tàbí **Alámòójútó Doctor** (**Doctor Administrator**) nípasẹ̀ àṣẹ olùlò tàbí ẹgbẹ́ Cacti. Àwọn àṣẹ **Cacti Doctor** tí ó wà tẹ́lẹ̀ yóò pa àṣẹ Alámòójútó mọ́ lẹ́yìn ìgbéga. Ìròyìn náà yóò hàn lábẹ́ **Àwọn Ohun Èlò > Cacti Doctor** (**Utilities > Cacti Doctor**).

## Àwọn èdè

Doctor ní àwọn ìtumọ̀ sí èdè Sípéènì (Sípéènì, `es-ES`), Faransé (`fr-FR`), Jámánì (`de-DE`), Ṣáínà Ìrọ̀rùn (`zh-CN`), Híndì (`hi-IN`), Lárúbáwá (`ar-SA`), àti Japan (`ja-JP`). Cacti yóò fi wọ́n hàn nígbà tí àtìlẹ́yìn èdè bá wà ní títàn (**Ìṣètò > Ètò > Gbogbogbòò > Àtìlẹ́yìn Èdè**) tí olùlò kan sì yan èdè náà. Ojú-ìwé wẹ́ẹ̀bù, àwọn ètò, àti àwọn ìránṣẹ́ àti ọ̀rọ̀ ìròyìn tí ìlà àṣẹ bá tẹ̀ jáde máa ń tẹ̀lé èdè Cacti; ìròyìn ìlà àṣẹ fúnra rẹ̀ máa ń lo èdè àkọ́kọ́ Cacti, èyí tí ó máa ń wà ní èdè Gẹ̀ẹ́sì àyàfi tí o bá yí i padà.

Àbájáde tí ẹ̀rọ lè kà kì í gba ìtumọ̀ rárá: àwọn ID àyẹ̀wò, àwọn kọ́kọ́rọ́ JSON àti iye ipò, àbájáde `--format=nagios` àti `--format=prometheus`, àwọn ìlà àkọsílẹ̀, àti àwọn àkọlé apá ìdìpọ̀ ìrànlọ́wọ́ máa ń wà ní èdè Gẹ̀ẹ́sì kí àwọn ìwé-àṣẹ àti ìṣọ́wòó lè máa ṣiṣẹ́ ní gbogbo èdè. Ọ̀rọ̀ `summary` àti `detail` ti àyẹ̀wò kọ̀ọ̀kan ni apá kan ṣoṣo tí a túmọ̀ nínú ìròyìn JSON.

Àtòjọ ìtumọ̀ Sípéènì ti Látìn Amẹ́ríkà (`es-419`) náà wà pẹ̀lú rẹ̀, ṣùgbọ́n bẹ́ẹ̀ ni Cacti 1.2 tàbí Cacti 1.3 kò ní èdè agbègbè Sípéènì ti Látìn Amẹ́ríkà láti yàn, nítorí náà yóò ṣiṣẹ́ kìkì nígbà tí Cacti bá fi ọ̀kan kún un. Títí di ìgbà náà, yan Sípéènì (`es-ES`).

Cacti máa ń gbé àtòjọ ìtumọ̀ àfikún láti `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` pẹ̀lú `doctor` gẹ́gẹ́ bí agbègbè ọ̀rọ̀, lórí 1.2.x àti 1.3 bákan náà (1.3 máa ń wá àpò àfikún nípasẹ̀ ipa-ọ̀nà àwọn àfikún rẹ̀ tí a lè ṣètò).

## Àwọn ìpele àṣẹ

| Agbègbè àṣẹ | Àwọn agbára |
|---|---|
| Olùwòran Doctor | Ka àwọn ipò àyẹ̀wò tí a ṣètò lásìkò tó ṣẹ̀ṣẹ̀ jùlọ, àkókò àkíyèsí, ìgbà tuntun àti ìtàn àkójọpọ̀ tó ṣẹ̀ṣẹ̀. Kò sí àṣẹ ìṣàyẹ̀wò, kúlẹ̀kúlẹ̀ gidi, ìṣètò tàbí àwọn àtúnṣe. |
| Olùṣiṣẹ́ Doctor | Ṣiṣẹ́ ìròyìn ìṣàyẹ̀wò pẹ̀lú ààlà ìṣẹ́jú-àáyá 120, ṣàyẹ̀wò àwọn kúlẹ̀kúlẹ̀ tí a ti bo àṣírí, kí o sì jẹ́rìí sí àwọn àwárí. Kò sí àyípadà ètò tàbí àwọn àtúnṣe. |
| Alámòójútó Doctor | Àwọn agbára Olùṣiṣẹ́ pẹ̀lú àtúnṣe láti inú àtòjọ àṣẹ tí ó wà tẹ́lẹ̀ àti àwọn ètò Doctor. Àwọn àtúnṣe àti ètò tún nílò agbègbè àṣẹ Settings/System Utilities ti Cacti. |

Àkójọ Àwọn Ohun Èlò (Utilities) máa ń ṣí ojú-ìwé fún agbègbè àṣẹ Doctor tó ga jùlọ tí a fún olùlò náà, títí kan àwọn àṣẹ ẹgbẹ́. Àwọn agbègbè àṣẹ Olùwòran àti Olùṣiṣẹ́ tuntun kì í gba àṣẹ aládàáṣe. ID agbègbè àṣẹ ìbílẹ̀ náà ṣì wà lórí `doctor.php` gẹ́gẹ́ bí Alámòójútó, èyí tí ó ń pa àṣẹ olùlò àti ẹgbẹ́ tó wà tẹ́lẹ̀ mọ́.

Dátà Olùwòran máa ń wá láti inú àwọn àyẹ̀wò tí a ṣètò lásìkò. Mú ìṣètò àsìkò ṣiṣẹ́ kí o tó fúnni ní àṣẹ Olùwòran; àwọn àkíyèsí tí ó bá sọnù tàbí tí ó kọjá àsìkò yóò fi **àìmọ̀** hàn, kì í ṣe pé ó dára rárá. Ìtàn máa ń pa iye àkójọpọ̀ 20 tó kẹ́yìn tí a ṣètò lásìkò mọ́, ó sì yọ ipò ẹ̀rọ kúrò. Àwọn Olùṣiṣẹ́ máa ń bẹ̀rẹ̀ àwọn ìṣàyẹ̀wò tuntun ní gbangba; sísọ ojú-ìwé di tuntun lásán máa ń lo ìròyìn ìkẹyìn ti ìgbà ìṣiṣẹ́ wọn.

Àwọn kúlẹ̀kúlẹ̀ ẹ̀rọ àti àpapọ̀ máa ń lo àṣẹ ẹ̀rọ ti olùlò lọ́wọ́lọ́wọ́. Àwọn àyọkà àkọsílẹ̀ tún nílò agbègbè àṣẹ Log Administration ti Cacti. A máa ń bo àwọn àṣírí kí a tó fi kúlẹ̀kúlẹ̀ ìṣàyẹ̀wò pamọ́ sínú ìgbà ìṣiṣẹ́ wẹ́ẹ̀bù tàbí kí a tó fi hàn. Àṣẹ CLI ń tẹ̀síwájú láti wà lábẹ́ ìdarí àkántì ètò ìṣiṣẹ́.

Àwọn ìjẹ́rìísí jẹ́ ti ara ẹni, a sì máa ń kọ wọ́n sínú àkọsílẹ̀ Cacti. Wọ́n kan àwárí àti ẹ̀rí kan náà nìkan; ẹ̀rí tí ó bá yí padà nílò ìjẹ́rìísí tuntun. Wọn kì í yí ipò yíyẹge/ìkìlọ̀/ìkùnà padà rárá, wọn kì í dá àwọn ìfitónilétí dúró, tàbí sàmì sí àyẹ̀wò tí ó kùnà pé ó dára. Èyí yàtọ̀ sí àwọn àyọkúrò ìkìlọ̀ tí a gbà wọlé, èyí tí ó ń nípa lórí ìlànà ìfitónilétí láìyí ipò tí a ṣàkíyèsí padà, tí a sì ṣàlàyé rẹ̀ ní ìsàlẹ̀.

Gbogbo ìgbésẹ̀ nílò POST àti àmì CSRF tí ó péye. Àwọn àtúnṣe máa ń gbé ojú-ìwé ìfìdí-múlẹ̀ ọ̀tọ̀ kalẹ̀ pẹ̀lú ìjápọ̀ Fagilé tí kì í fi fọ́ọ̀mù ránṣẹ́, wọ́n sì máa ń kọ olùlò tó ṣe é àti àbájáde rẹ̀ sínú àkọsílẹ̀ Cacti.

## Ìlà àṣẹ

Ṣiṣẹ́ àwọn wọ̀nyí láti inú gbòǹgbò Cacti gẹ́gẹ́ bí olùlò poller Cacti, kì í ṣe root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Àbájáde ọ̀rọ̀ máa ń tẹ ìlà kan fún àyẹ̀wò kọ̀ọ̀kan pẹ̀lú ipò rẹ̀, ẹ̀ka rẹ̀, àkópọ̀ rẹ̀, àti kúlẹ̀kúlẹ̀ rẹ̀. `--json` máa ń tẹ nǹkan `summary` tí ó ní iye ipò àti àtòjọ `checks` tí àwọn ohun inú rẹ̀ ní `id`, `category`, `status`, `summary`, `detail`, àti `repair`/`repairable` nígbà tí àtúnṣe láti inú àtòjọ àṣẹ bá kan án.

| Ipò ìjáde | Ìtumọ̀ |
|---|---|
| `0` | Kò sí àyẹ̀wò kankan tí ó kùnà, tàbí àtúnṣe tí a béèrè ṣàṣeyọrí. Àwọn ìkìlọ̀ kì í yí ipò ìjáde padà. |
| `1` | Ó kéré tán àyẹ̀wò kan kùnà, tàbí àtúnṣe tí a béèrè kò ṣàṣeyọrí. |
| `2` | Àṣìṣe ìlò: àtúnṣe tí a ṣiṣẹ́ láìsí `--yes` (`--preview` kò nílò rẹ̀), ID àtúnṣe àìmọ̀, ọ̀nà àbájáde àìmọ̀, àkójọpọ̀ `--symptom` tàbí ọ̀nà àbájáde tí kò gba àtìlẹ́yìn, tàbí ìfisílẹ̀ Cacti tí a kò lè rí. |

Cacti máa ń gbé `memory_limit` sókè fún gbogbo ìwé-àṣẹ CLI, nítorí náà àyẹ̀wò ìṣètò àkókò-ìṣiṣẹ́ PHP ní ìtumọ̀ lórí ojú-ìwé wẹ́ẹ̀bù nìkan.

## Àwọn àyẹ̀wò tí a ṣètò lásìkò àti àwọn ìfitónilétí

Lábẹ́ **Ìṣètò > Ètò > Doctor** (**Configuration > Settings > Doctor**), tan **Ṣiṣẹ́ Àwọn Àyẹ̀wò lórí Àsìkò** (**Run Checks on a Schedule**) kí o sì yan àlàfo àkókò láti ìṣẹ́jú 15 sí ọjọ́ kan. Lẹ́yìn ìyípo poller kọ̀ọ̀kan tí àsìkò rẹ̀ bá pé, Doctor máa ń ṣiṣẹ́ gbogbo àyẹ̀wò nínú ìlànà abẹ́lẹ̀, nítorí náà àkókò ìṣiṣẹ́ poller fúnra rẹ̀ kò ní ní ìdààmú.

Ìṣiṣẹ́ kọ̀ọ̀kan máa ń kọ ipò tí a ṣàkíyèsí fún gbogbo àyẹ̀wò sílẹ̀. Àwọn àyọkúrò ìkìlọ̀ tí ó ń ṣiṣẹ́ máa ń nípa lórí ìlànà ìfitónilétí láìyí àkíyèsí náà padà. Nígbà tí àyẹ̀wò kan bá bẹ̀rẹ̀ sí í kùnà tàbí tí ó bá dáwọ́ kíkùnà dúró, Doctor máa ń kọ àyípadà náà sínú àkọsílẹ̀ Cacti, tí a bá sì ṣètò **Àwọn Àdírẹ́sì Ímẹ́lì Ìfitónilétí** (**Alert Email Addresses**), yóò fi ímẹ́lì ránṣẹ́ sí àwọn àdírẹ́sì wọ̀nyẹn nípasẹ̀ ètò ímẹ́lì Cacti. **Ìfitónilétí lórí Àwọn Ìkìlọ̀** (**Alert on Warnings**) máa ń fi àwọn àyípadà wíwọlé àti jíjáde kúrò nínú ìkìlọ̀ kún un. Ìṣiṣẹ́ àkọ́kọ́ máa ń kọ ìpìlẹ̀ àfiwé sílẹ̀ nìkan.

Àwọn ìròyìn tí a ṣètò lásìkò máa ń ṣiṣẹ́ lórí poller àkọ́kọ́ lábẹ́ ìdènà ìmọ̀ràn ibùdó-dátà, wọ́n sì ní ààlà ìṣẹ́jú méjì fún òṣìṣẹ́. Doctor máa ń ròyìn ìbẹ̀rẹ̀ ìkẹyìn àti ìparí tí ó ṣàṣeyọrí kí àwọn èsì tí ó sọnù tàbí tí ó ti pẹ́ lè hàn gbangba. Àwọn èsì jẹ́ ti ìsinsìnyí fún àlàfo àkókò náà pẹ̀lú ìyípo poller kan àti ìṣẹ́jú mẹ́ta. Ìṣiṣẹ́ tí kò bá parí ni a máa ń gbìyànjú lẹ́ẹ̀kan sí i lẹ́yìn ìṣẹ́jú 5, 10, 20 àti jù bẹ́ẹ̀ lọ, títí dé àlàfo àkókò déédéé. A máa ń pa ìfijiṣẹ́ ìfitónilétí tí ó kùnà mọ́ fún títí dé ìgbìyànjú mẹ́ta pẹ̀lú ìdádúró tí ń pọ̀ sí i; lẹ́yìn èyí, tún ètò ímẹ́lì Cacti ṣe kí o sì ṣiṣẹ́ `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` gẹ́gẹ́ bí olùlò poller. Ìtẹ́wọ́gbà apèsè-ímẹ́lì kò fìdí rẹ̀ múlẹ̀ pé ó dé inú àpótí ìfìwéránṣẹ́.

Tábù kan náà máa ń ṣètò àwọn ààlà fún àkókò ìṣiṣẹ́ poller (80% ti àlàfo àkókò), ààyè díìsìkì òfìfo RRA (ìkìlọ̀ ní ìsàlẹ̀ 10%, ìkùnà ní ìsàlẹ̀ 2%), ìṣípò agogo ibùdó-dátà (ìkìlọ̀ ju ìṣẹ́jú-àáyá 5 lọ, ìkùnà ju 60 lọ), àti ìwọ̀n àkọsílẹ̀ Cacti (100 MB). Àwọn iye tí ó ṣófo tàbí tí kò tọ́ máa ń padà sí àwọn ìṣètò àkọ́kọ́ wọ̀nyí.

## Ìsopọ̀ ìṣọ́wòó

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` máa ń tẹ ìlà ipò kan jáde pẹ̀lú dátà ìṣiṣẹ́, ó sì máa ń jáde pẹ̀lú `0` (OK), `1` (WARNING), tàbí `2` (CRITICAL), kí Nagios, Icinga, tàbí ètò èyíkéyìí tí ó bá a mu lè ṣiṣẹ́ rẹ̀ tààrà. `--format=prometheus` máa ń kọ ọ̀nà ọ̀rọ̀ Prometheus fún olùkójọ textfile ti node_exporter: `cacti_doctor_check_status` fún àyẹ̀wò kọ̀ọ̀kan (0 yíyẹge tàbí ìkìlọ̀ tí a gbà wọlé, 1 ìkìlọ̀ tí ó nílò ìgbésẹ̀, 2 ìkùnà), `cacti_doctor_check_observed_status` ṣáájú àwọn àyọkúrò, `cacti_doctor_check_accepted`, `cacti_doctor_checks` fún ipò kọ̀ọ̀kan, àti `cacti_doctor_last_run_timestamp_seconds`. Àwọn ìlà àyẹ̀wò JSON ní ààyè `assessment`; `not_assessed` túmọ̀ sí pé àyẹ̀wò náà kò lè dé ìpinnu láti inú dátà tí ó wà lárọ̀ọ́wọ́tó.

## Ìdìpọ̀ ìrànlọ́wọ́

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Ìdìpọ̀ náà jẹ́ fáìlì ọ̀rọ̀ kan ṣoṣo tí ó ní àwọn ẹ̀yà Doctor, Cacti, PHP, OS, àti ibùdó-dátà, àwọn ìṣirò poller àti Boost, ìròyìn kíkún, àti àwọn ìlà 200 tó kẹ́yìn nínú àkọsílẹ̀ Cacti. A máa ń bo àwọn iye tí ó tẹ̀lé àwọn orúkọ password, secret, token, community, àti key. Doctor máa ń ṣẹ̀dá fáìlì náà tí olùní rẹ̀ nìkan ló lè kà á, ó sì máa ń kọ̀ láti kọ sórí fáìlì tí ó wà tẹ́lẹ̀. Ṣàyẹ̀wò rẹ̀ kí o tó fi í síta níbikíbi.

## Ìlànà àtúnṣe

Doctor ní àtúnṣe kan, `runtime_directories`. Ó máa ń ṣẹ̀dá àwọn àkójọpọ̀ fáìlì ìṣiṣẹ́ Cacti tí ó bá ṣọ̀wọ́n, ó sì máa ń fi àṣẹ kíkà, kíkọ, àti ṣíṣe fún olùní kún un láì yọ àwọn àṣẹ tí ó ti wà tẹ́lẹ̀ kúrò.

Ó fojú sí `$cache_path`, `$log_path`, àti `$rra_path` lórí Cacti 1.3, tàbí àwọn àkójọpọ̀ fáìlì `cache`, `log`, àti `rra` ti ìfisórí náà bí bẹ́ẹ̀ kọ́. Ó máa ń fò àwọn àkójọpọ̀ fáìlì tí ó ti ṣeé kọ̀wé sí tẹ́lẹ̀, ó kọ àwọn àkójọpọ̀ fáìlì tí ó wà ní ìta ìfisórí Cacti (bíi àkójọpọ̀ fáìlì àkọsílẹ̀ lábẹ́ `/var/log`), ó kọ àwọn ìjápọ̀ àmì (symbolic links), ó sì kọ̀ láti ṣiṣẹ́ bíi root. Kò tẹ̀lé `path_cactilog` rárá, nítorí náà fáìlì àkọsílẹ̀ tí a ṣètò sínú àkójọpọ̀ fáìlì kóòdù kò lè darí àtúnṣe náà síbẹ̀. Àyẹ̀wò náà sì tún máa ń ṣàyẹ̀wò àkójọpọ̀ fáìlì tí fáìlì àkọsílẹ̀ tí a ṣètò wà ní gbogbo ìtẹ̀jáde.

Kò yí olùní padà, kò ṣiṣẹ́ àwọn àṣẹ shell, kò tún ìṣètò kọ, kò sì ṣàtúnṣe dátà ohun èlò Cacti. Àtúnṣe tuntun kọ̀ọ̀kan gbọ́dọ̀ ní àyẹ̀wò, olùtọ́jú tí a fọwọ́ sí nínú àtòjọ àṣẹ, ìfẹsẹ̀múlẹ̀, àkọsílẹ̀ àyẹ̀wò, àti àwọn ìdánwò.

## Ṣíṣe ìwádìí àwọn àmì ìṣòro

Àwọn Olùṣiṣẹ́ àti Àwọn Alákòóso lè yan **Ṣèwádìí àmì ìṣòro** lórí ojú-ewé Doctor. Àwọn òfin kan náà wà nípasẹ̀ `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, tàbí `alerts_missing`, pẹ̀lú èsì ọ̀rọ̀ tàbí JSON. Àwọn àpò ìrànlọ́wọ́ máa ń ní àwọn ìwádìí àmì ìṣòro tí ó báramu.

Olùdíje kọ̀ọ̀kan máa ń ṣàtòjọ àwọn àyẹ̀wò tí a ṣàkíyèsí àti ìgbésẹ̀ ìjẹ́rìísí tí ó tẹ̀ lé e. Àwọn olùdíje jẹ́ ìrònú ìwádìí, kì í ṣe òkùnfà pàtó tí a ti fìdí rẹ̀ múlẹ̀. Àwọn àkíyèsí tí ó ṣọ̀wọ́n, tí a kò ṣàyẹ̀wò, tàbí tí ó ti gbó kò lè fi ìdí òkùnfà kan múlẹ̀ láé. Àwọn ìwádìí wẹ́ẹ̀bù máa ń lo ìjábọ̀ tí a fi àṣẹ ṣẹ́; àwọn ìjábọ̀ CLI máa ń lo ààyè àkọọ́lẹ̀ ẹ̀rọ ìṣiṣẹ́.

## Ìtuntun ìmúdójúìwọ̀n RRD

`filesystem.rrd_stale` máa ń ṣàyẹ̀wò títí dé orísun dátà tí ń ṣiṣẹ́ 500, láìka àwọn ẹ̀rọ tí a pa tàbí tí ó ti kú kún un. Lórí àwọn ìfisórí tí ó tóbi, àpẹẹrẹ máa ń yí padà ní wákàtí kọ̀ọ̀kan, nítorí náà ṣíṣe rẹ̀ lẹ́ẹ̀kọ̀ọ̀kan máa ń bo àwọn fáìlì ọ̀tọ̀ọ̀tọ̀. Ó máa ń fi àkókò àtúnṣe fáìlì wé èyí tí ó pọ̀ jù lọ láàárín àlàfo poller, ìgbésẹ̀ RRD orísun, àti ìgbésẹ̀ profaili, tí a sọ di púpọ̀ pẹ̀lú **Àlàfo RRD Tí Ó Ti Gbó** (ìbẹ̀rẹ̀ àìyípadà 3). Ó máa ń fi àwọn fáìlì mẹ́ta tí ó gbó jù lọ àti iye àwọn ẹ̀rọ tí ọ̀rọ̀ náà kàn hàn. Àwọn èsì wẹ́ẹ̀bù ní àwọn ẹ̀rọ tí a fún ní àṣẹ nìkan.

`filesystem.rrd_files` jẹ́ àyẹ̀wò wíwà lọ́tọ̀. Ó máa ń wá fáìlì RRD ti títí dé 5,000 orísun dátà tí ń ṣiṣẹ́, pẹ̀lú àwọn tí ó wà lórí àwọn ẹ̀rọ tí a pa tàbí tí ó ti kú, ó sì máa ń lo àpẹẹrẹ wákàtí kan náà.

Boost máa ń fi ìlọ́po méjì àlàfo ìtúsílẹ̀ tí a ṣètò kún un gẹ́gẹ́ bí ààyè àkókò kíkọ sí díískì. Fún olùkọ̀wé tí a sún síwájú mìíràn, ṣètò **Ààyè Àkókò Kíkọ RRD Tí A Sún Síwájú (ìṣẹ́jú-àáyá)**. `RRDCACHED_ADDRESS` tí a kéde láìsí ààyè àkókò, tàbí àlàfo Boost tí kò tọ́, máa ń mú èsì tí a kò ṣàyẹ̀wò jáde. Doctor kì í tú cache láé láti ṣe àyẹ̀wò yìí. Àkókò àtúnṣe jẹ́ ẹ̀rí ìṣiṣẹ́ díískì, kì í ṣe ẹ̀rí ìkójọpọ̀ dátà tí ó kẹ́sẹ járí. Ìpamọ́ àkókò díẹ̀ ti ìta tí Doctor kò lè ṣàwárí gbọ́dọ̀ jẹ́ ṣíṣètò ní gbangba.

A máa ń ka àwọn fáìlì tí ó ṣọ̀wọ́n, tí kò ṣeé kà, àti àwọn tí ó ní déètì ọjọ́ iwájú nínú àlàyé kíkún. Èsì náà jẹ́ àìṣàyẹ̀wò nìkan nígbà tí kò sí fáìlì àpẹẹrẹ kankan tí ó ṣeé kà. Èsì àpẹẹrẹ máa ń sọ pé ó bo apá kan ìfisórí nìkan; ìkọjá kò bo àwọn fáìlì tí a kò mú àpẹẹrẹ wọn.

## Àwòkọ́ àtúnṣe àti ìtàn àyẹ̀wò

Ojú-ewé àtúnṣe Alákòóso máa ń fi ipa kọ̀ọ̀kan tí ọ̀rọ̀ kàn, ìgbésẹ̀ tí a dábàá fún un, àwọn àṣẹ lọ́wọ́lọ́wọ́, àti àwọn àṣẹ àfojúsùn hàn. Ìfọwọ́sí so mọ́ àwòkọ́ náà, olùṣàmúlò tí ó ń ṣiṣẹ́, àti àkókò ìgbésí-ayé ìṣẹ́jú márùn-ún. Ìjẹ́rìísí máa ń lo àwòkọ́ náà tán; ètò fáìlì tí ó yí padà nílò àwòkọ́ mìíràn. Ṣíṣe bíi root, àwọn ipa tí ó wà ní ìta ìfisórí, àwọn ìjápọ̀ tí ó nílò àtúnṣe, àti àwọn àṣẹ ètò fáìlì tí a kò pèsè máa ń dènà ìfọwọ́sí.

`--repair=runtime_directories --preview` máa ń tẹ ètò JSON kíkà-nìkan jáde. `--repair=runtime_directories --yes` máa ń fọwọ́ sí ètò CLI tí a ṣẹ̀ṣẹ̀ ṣírò, ó sì máa ń tún un ṣàyẹ̀wò kí ó tó ṣiṣẹ́. Àkọọ́lẹ̀ CLI gbọ́dọ̀ ti ní àṣẹ tẹ́lẹ̀ láti tún ìfisórí náà ṣe; kì í jogún àwọn ipa wẹ́ẹ̀bù.

A gbọ́dọ̀ fi àkọsílẹ̀ `repair.started` tí a ṣètò pamọ́ kí ìyípadà ètò fáìlì èyíkéyìí tó wáyé. Àkọsílẹ̀ `repair.completed` tí ó so mọ́ ọn ní àwòrán ipò lẹ́yìn àtúnṣe àti èsì ìjẹ́rìísí. Iṣẹ́ tí a dá dúró máa ń fi àkọsílẹ̀ ìbẹ̀rẹ̀ sílẹ̀ fún ìwádìí. Ìkùnà àyẹ̀wò ìparí ni a máa ń jábọ̀ gẹ́gẹ́ bí ìkùnà kódà bí àwọn ìyípadà ètò fáìlì bá ṣẹlẹ̀. Doctor máa ń fi àwọn àṣẹ olùní kún un, ó sì máa ń ṣẹ̀dá àwọn àkójọpọ̀ fáìlì; kò gbìyànjú ìdápadà aládàáṣe.

Àwọn Alákòóso tí ó ní àṣẹ Settings/System Utilities ti Cacti lè ka àwọn àkọsílẹ̀ àyẹ̀wò 20 tí ó ṣẹ̀ṣẹ̀ jù lọ lórí ojú-ewé Doctor. Àfikún náà máa ń pa àwọn àkọsílẹ̀ 200 tí ó ṣẹ̀ṣẹ̀ jù lọ mọ́ sínú `plugin_doctor_audit`; àkọsílẹ̀ Cacti pẹ̀lú máa ń gba ID, ìgbésẹ̀, àti olùṣe wọn sílẹ̀. Àwọn ohun èlò inú àyẹ̀wò jẹ́ dídínkù láti bo àṣírí.

## Àwọn ìkìlọ̀ tí a gbà

Àwọn Alákòóso tí ó ní àṣẹ Settings/System Utilities ti Cacti lè ṣẹ̀dá **Àyọkúrò ìkìlọ̀** láti ara ìkìlọ̀ tuntun tí a ṣàyẹ̀wò lórí ojú-ewé Doctor. Àyọkúrò kan nílò olùní, ìdí, àti déètì àtúnyẹ̀wò UTC láàárín ọjọ́ 90. Ó máa ń parí ní ọ̀gànjọ́ òru UTC ní ìbẹ̀rẹ̀ déètì náà. A lè ṣètò títí dé àyọkúrò 100. Àtòjọ náà máa ń fi àwọn àkọsílẹ̀ tí ó ti parí àti àwọn ID tí kò sí nínú ìjábọ̀ lọ́wọ́lọ́wọ́ hàn, ó sì gba yíyọkúrò láàyè.

Ìkìlọ̀ tí a ṣàkíyèsí máa ń wà ní hàn gbangba, pẹ̀lú olùní, ìdí, àti ìgbà ìparí rẹ̀ nínú àwọn àlàyé àyẹ̀wò. JSON máa ń pa ipò tí a ṣàkíyèsí mọ́, ó sì máa ń fi metadata `accepted` àti `acceptance` kún un. Nagios máa ń yọ àwọn ìkìlọ̀ tí a gbà tí ó ń ṣiṣẹ́ kúrò nínú ipò ìṣòro ìjáde rẹ̀ ṣùgbọ́n ó máa ń dárúkọ wọn nínú èsì rẹ̀. Prometheus máa ń fi ipò ìṣòro tí a ṣàkíyèsí àti èyí tí ó nílò ìgbésẹ̀ méjèèjì jáde. Ipò ìjáde CLI lásán kò yí padà: àwọn ìkìlọ̀ ti ń jáde pẹ̀lú oódo tẹ́lẹ̀, àwọn ìkùnà máa ń jáde pẹ̀lú ọ̀kan.

Àwọn ìfitónilétí ìkìlọ̀ tí a ṣètò lákòókò ni a máa ń tẹ̀ rì nígbà tí àyọkúrò náà bá ń ṣiṣẹ́; ìparí tàbí yíyọkúrò máa ń mú kí ìkìlọ̀ tí ń tẹ̀síwájú tún yẹ fún àwọn ìfitónilétí ìkìlọ̀ lẹ́ẹ̀kan sí i. Ìyípadà sí ìkùnà àti ìmúpadàbọ̀sípò láti inú ìkùnà ṣì yẹ fún àwọn ìfitónilétí. A kò lè gba èsì tí a kò ṣàyẹ̀wò tàbí ìkùnà. Ìjẹ́wọ́ ti ara ẹni wà lọ́tọ̀, kò sì tẹ ohunkóhun rì. Ṣíṣẹ̀dá àti yíyọkúrò àyọkúrò jẹ́ iṣẹ́ ìṣọ̀kan pẹ̀lú àkọsílẹ̀ àyẹ̀wò.

Ìgbéga sókè máa ń ṣẹ̀dá `plugin_doctor_audit` àti `plugin_doctor_acceptance` láì yí dátà ohun èlò Cacti padà. Kó ìtàn èyíkéyìí tí o bá nílò jáde kí o tó yọ ọ́ kúrò: yíyọkúrò máa ń yọ tábìlì àfikún méjèèjì àti àwọn ètò rẹ̀ kúrò. Dídá àwọn fáìlì àfikún padà sí ti tẹ́lẹ̀ máa ń fi àwọn tábìlì náà sílẹ̀ fún ìwádìí, ṣùgbọ́n àwọn ẹ̀yà àtijọ́ kì í bọ̀wọ̀ fún àwọn àyọkúrò ìkìlọ̀.

## Àwọn ohun tí a nílò

| Cacti | PHP | Àwọn àkíyèsí |
|---|---|---|
| 1.2.20 | 5.4 tàbí tuntun jù bẹ́ẹ̀ lọ | Kóòdù Doctor fúnra rẹ̀ bá PHP 5.4 mu kí ó lè ṣàyẹ̀wò àwọn ètò àtijọ́ kí ìgbéga sókè tó wáyé |
| 1.2.31 | 8.0 tàbí tuntun jù bẹ́ẹ̀ lọ | `composer.json` ti Cacti nílò `>=8.0` |
| 1.2.x Lọ́wọ́lọ́wọ́ | 8.2 tàbí tuntun jù bẹ́ẹ̀ lọ | `composer.json` ti Cacti nílò `>=8.2` |
| `develop` (1.3) | 8.3 tàbí tuntun jù bẹ́ẹ̀ lọ | `composer.json` ti Cacti nílò `^8.3` |

Ìlà **Ìbámu PHP pẹ̀lú Cacti tí a fi sórí ẹ̀rọ** máa ń fi ẹ̀yà PHP tí ó ń ṣiṣẹ́ wé ohun tí a nílò fún PHP nínú `composer.json` gbòǹgbò ti Cacti fúnra rẹ̀, pẹ̀lú òpin òkè ti ìdènà caret bíi `^8.3`. Fáìlì ìṣiṣẹ́ PHP CLI tí a ṣètò ni a máa ń ṣàyẹ̀wò pẹ̀lú ohun tí a nílò kan náà. Doctor máa ń dá àwọn ìdènà `>=` àti `^` tí àwọn àkójọ Cacti wọ̀nyí ń lò mọ̀. Ohun tí a nílò tí kò ṣeé kà, tí ó bà jẹ́, tí ó ṣọ̀wọ́n, tàbí tí a kò dá mọ̀ máa ń mú ìkìlọ̀ jáde; àwọn ìfisórí Cacti 1.2.20–1.2.30 láìsí ìwé àfihàn máa ń pa ilẹ̀ olùfisórí PHP 5.4 tí a kọ sílẹ̀ mọ́. Ìbámu PHP 5.4 ti Doctor fúnra rẹ̀ kò fi ìbámu pẹ̀lú ìfisórí Cacti tuntun múlẹ̀.

Ìlà **Àtìlẹ́yìn ààbò láti òkè ti PHP** máa ń dáhùn ìbéèrè ọ̀tọ̀: ṣé ẹ̀ka ìtẹ̀jáde PHP náà ṣì ń gba àwọn àtúnṣe ààbò láti ọ̀dọ̀ iṣẹ́ àkànṣe PHP bí? Ó máa ń jábọ̀ déètì ìparí àtìlẹ́yìn ààbò tí a tẹ̀ jáde fún ẹ̀ka náà, ó sì máa ń kìlọ̀ lẹ́yìn déètì náà. Bí àpẹẹrẹ, PHP 8.1 lè bá ohun tí a nílò fún ìṣiṣẹ́ ìfisórí Cacti àtijọ́ mu nígbà tí kò tún gba àwọn àtúnṣe ààbò láti òkè mọ́. Èsì ìkọjá kò túmọ̀ sí pé ìtẹ̀jáde àtúnṣe kékeré tí a fi sórí ẹ̀rọ wà ní òde òní, Doctor kò sì lè mọ̀ bóyá olùtajà OS ń pèsè àwọn àtúnṣe tí a dá padà sẹ́yìn.

Àwọn déètì àtìlẹ́yìn ni a dì pọ̀ mọ́ Doctor láti inú [ètò àkókò àtìlẹ́yìn PHP](https://www.php.net/supported-versions.php) àti [àtòjọ òpin-ìgbésí-ayé](https://www.php.net/eol.php), tí a ṣàyẹ̀wò kẹ́yìn ní 2026-11-08. Àwọn ẹ̀ka àìmọ̀ àti àwọn ìtẹ̀jáde ìṣáájú máa ń mú ìkìlọ̀ jáde dípò ìkọjá tí a fìsọlẹ̀. Kò sí ìbéèrè nẹ́tíwọ́ọ̀kì tí a ṣe nígbà àyẹ̀wò. Ṣàtúnṣe dátà àtìlẹ́yìn Doctor nígbà tí PHP bá tẹ ètò àkókò tuntun jáde. Àwọn ID JSON/ìbojútó tí ó wà tẹ́lẹ̀ `php.version` àti `php.security_baseline` kò yí padà.

## Ìdàgbàsókè

Àkójọ ìdánwò ẹyọkan máa ń lo Pest, ó sì ń ṣiṣẹ́ lórí PHP 8.2 tàbí tuntun jù bẹ́ẹ̀ lọ:

```console
composer install
composer test
```

Àwọn ìdánwò náà máa ń fi àwọn aṣojú kékeré nínú `tests/CactiStubs.php` rọ́pò àwọn iṣẹ́ Cacti tí Doctor ń pè, nítorí náà wọ́n ń ṣiṣẹ́ láìsí ìfisórí Cacti.

GitHub Actions máa ń ṣe irú àyẹ̀wò mẹ́rin lórí gbogbo ìfiránṣẹ́ àti ìbéèrè ìfàkọ́:

- `php -l` lórí gbogbo fáìlì PHP lábẹ́ PHP 5.4, 5.6, 7.0, 7.1, 7.4, àti 8.0 títí dé 8.4.
- Àkójọ ìdánwò ẹyọkan lórí PHP 8.2, 8.3, àti 8.4.
- `locales/build_gettext.sh --check`, èyí tí ó máa ń kùnà lórí àwòkọ́ ìtúmọ̀ tí ó ti gbó, àkójọ èdè tí kò pé tàbí tí kò ṣe kedere, tàbí àkójọ èdè tí a ṣàkójọpọ̀ tí ó yàtọ̀ sí orísun rẹ̀.
- Iṣẹ́ ìṣọ̀kan méje tí ó máa ń fi Cacti 1.2.20, ẹ̀ka 1.2.x lọ́wọ́lọ́wọ́, àti `develop` sórí ẹ̀rọ lòdì sí MySQL àti MariaDB, pẹ̀lú cmd.php àti Spine méjèèjì. Iṣẹ́ kọ̀ọ̀kan máa ń fi àfikún náà sórí ẹ̀rọ, ó sì máa ń mú un ṣiṣẹ́, ó máa ń ṣe ìjábọ̀ CLI kíkún, ó sì máa ń ṣàyẹ̀wò àwòrán ìjábọ̀, àpapọ̀ àkótán, àwọn ipò tí a retí, àti àkójọ àwọn ìkùnà pàtó. Lẹ́yìn náà ó máa ń ba ipa binary àti àmì àkókò poller jẹ́, ó máa ń jẹ́rìí sí i pé a jábọ̀ méjèèjì, ó máa ń dá wọn padà, ó máa ń dán àtúnṣe àti ìjẹ́rìísí rẹ̀ wò, ó sì máa ń ṣiṣẹ́ dídádúró, mímú ṣiṣẹ́, yíyọkúrò, àti fífi sórí ẹ̀rọ lẹ́ẹ̀kan sí i. A máa ń pa ìjábọ̀ JSON mọ́ gẹ́gẹ́ bí ohun àbájáde nígbà tí iṣẹ́ kan bá kùnà.

## Ìkópa

Àwọn pull request ń lọ sí `develop`. Jẹ́ kí àwọn fáìlì ìṣẹ̀dá bá PHP 5.4 mu, kí o sì lo àṣà Cacti: àwọn tábù (tabs), okùn ọ̀rọ̀ oní-àmì-ìyàsọ́tọ̀ kan ṣoṣo (single-quoted strings), àti àwọn olùrànlọ́wọ́ Cacti bíi `read_config_option()` àti `db_fetch_cell()`. Ṣàfikún ìdánwò ẹyọ kan fún ìyípadà ìṣe kọ̀ọ̀kan, fọwọ́ sí àwọn commit rẹ (`git commit -s`), kí o sì fi ìlà kan kún `CHANGELOG.md`.

### Àwọn Ìtúmọ̀

Fi gbogbo ìfiranṣẹ́ tí olùlò lè rí sínú `__('...', 'doctor')` (tàbí `__n()`, `__x()`, `__esc()`), kí o sì fún gbólóhùn tí ó ní iye kan ní okùn ìṣètò kan ṣoṣo pẹ̀lú àwọn àmì ààyè `%s`/`%d` ní ìtẹ̀léra dípò sísopọ̀ àwọn àjákù. `__()` ti Cacti máa ń ṣètò ìfiranṣẹ́ kìkì nígbà tí ó bá ní olùtọ́ka ìṣètò nínú, kò sì ṣàtìlẹ́yìn fún àwọn ìrísí ipò `%1$s`. Ó tún máa ń yí `%%` padà sí `%` ṣáájú ìṣètò, nítorí náà má ṣe fi àmì ìdá-ọgọ́rùn-ún gangan sínú ìfiranṣẹ́ láé: fi iye náà pẹ̀lú àmì rẹ̀ ránṣẹ́ gẹ́gẹ́ bí àríyànjiyàn (`__('Usage: %s', '50%', 'doctor')`). Àwọn ìlà àkọsílẹ̀ (log) máa ń wà ní èdè Gẹ̀ẹ́sì: lo `doctor_repair_message()` fún ọ̀rọ̀ àtúnṣe àti `doctor_n_()` fún àwọn ìfiranṣẹ́ tí a kọ sílẹ̀ tí a sì túmọ̀ kìkì níbi tí a ti fi wọ́n hàn. Má ṣe túmọ̀ àwọn ID àyẹ̀wò, àwọn kọ́kọ́rọ́ JSON, àwọn ọ̀rọ̀ pàtàkì ipò, àbájáde ìṣọ́, àti àwọn ìlà àkọsílẹ̀ (log).

`locales/build_gettext.sh` máa ń tún àdàkọ `locales/po/cacti.pot` ṣẹ̀dá, ó máa ń dà á pọ̀ mọ́ àtòjọ kọ̀ọ̀kan `locales/po/<locale>.po`, ó sì máa ń ṣàkójọpọ̀ `locales/LC_MESSAGES/<locale>.mo`; commit àwọn mẹ́tẹ̀ẹ̀ta. CI máa ń ṣiṣẹ́ `sh locales/build_gettext.sh --check`, èyí tí ó máa ń kùnà nígbà tí àdàkọ bá ti gbó tàbí tí àtòjọ kan bá pàdánù tàbí tí ó ní àkọsílẹ̀ tí kò ṣe kedere (fuzzy), tí àmì ààyè kan bá yàtọ̀, tàbí tí fáìlì tí a ṣàkójọpọ̀ bá ti gbó jù lọ. Nítorí náà, ìfiranṣẹ́ tí a bá yí padà nílò kí a ṣe àtúnṣe àwọn ìtúmọ̀ rẹ̀ nínú pull request kan náà. Ó nílò GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Èdè tuntun jẹ́ `<locale>.po` tuntun tí a sọ ní orúkọ bí Cacti ṣe ń sọ àwọn agbègbè èdè rẹ̀ (fún àpẹẹrẹ `pt-BR`).

## Ààbò

Ròyìn àwọn àìlera ààbò ní ìkọ̀kọ̀ gẹ́gẹ́ bí a ṣe ṣàlàyé nínú [SECURITY.md](../../../SECURITY.md), kì í ṣe nínú àwọn ìṣòro gbangba.

## Ìwé-àṣẹ

Ẹ̀tọ́ Àdàkọ (C) 2026 Thomas Vincent. A tú u sílẹ̀ lábẹ́ GNU General Public License, ẹ̀dà 2 tàbí èyí tí ó tẹ̀ lé e. Wo [LICENSE](../../../LICENSE).
