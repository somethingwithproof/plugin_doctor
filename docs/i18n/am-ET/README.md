<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor፡ ስቴቶስኮፕ የለበሰ ቁልቋል። መርምር። ጠግን። ተቆጣጠር።">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="የጥራት ደረጃ ሁኔታ"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="ፈቃድ፡ GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ እና 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor የCacti መጫንን በአንድ ዙር የሚመረምር እና የሥርዓት አስተዳዳሪ ሲጠይቅ ብቻ አነስተኛ ጥገናዎችን የሚተገብር የCacti ተሰኪ ነው።

**ሁኔታ፡ በልማት ላይ፣ ከ1.0 በፊት።** የቅርብ ጊዜው ልቀት [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1) ነው። ይህ ጥገና በ0.6.0 ውስጥ በነበሩት በሚና የተገደበ መዳረሻ፣ በመመሪያ የተደገፈ ምርመራ፣ በክልል የተገደቡ የRRD ወቅታዊነት ፍተሻዎች፣ የጥገና ቅድመ-እይታዎች እና የኦዲት ታሪክ፣ ተቀባይነት ያላቸው የማስጠንቀቂያ ልዩ ሁኔታዎች እና ትርጉሞች ላይ የሂንዲ እና የአረብኛ ካታሎጎችን እንዲሁም የተተረጎሙ የተጠቃሚ መመሪያዎችን ይጨምራል። ለዝርዝሮች [CHANGELOG.md](../../../CHANGELOG.md) ይመልከቱ።

## ቅጽበታዊ ገጽ እይታዎች

PHP 8.3.36 በሚያስኬድ ገለልተኛ የCacti 1.2.31 ማሳያ መጫኛ ውስጥ ያሉ የምርመራ እና
የመርሐግብር ቅንብሮች፤ ይህም የCacti PHP ተኳኋኝነትን፣ የዋናው ምንጭ (upstream)
የደህንነት-ድጋፍ እና የዳታቤዝ-ጤና ፍተሻዎችን ያካትታል። እዚህ የሚታዩት ማስጠንቀቂያዎች
እና ውድቀቶች ያንን የማሳያ አካባቢ ይገልጻሉ።

![የማለፊያ፣ የማስጠንቀቂያ እና የውድቀት ውጤቶች ያለው የDoctor የምርመራ ሰንጠረዥ](../../screenshots/diagnostics.png)

![የDoctor መርሐግብር፣ ማንቂያ እና የገደብ ቅንብሮች](../../screenshots/settings.png)

የCacti ችግሮች ብዙውን ጊዜ በምልክቶች ይገለጻሉ፡ ባዶ ግራፎች፣ የቆመ poller፣ የማይጫን ተሰኪ። መንስኤው ብዙውን ጊዜ የተዛባ ቅድመ-ሁኔታ ነው፤ ለምሳሌ በCLI ግንባታ ውስጥ የጎደለ የPHP ቅጥያ፣ poller ሊጽፍበት የማይችል የምዝግብ ማስታወሻ ማውጫ፣ ወደ ተሳሳተ ባይነሪ የሚጠቁም የRRDtool መንገድ፣ ወይም የሰዓት ሰቅ ሰንጠረዦች የሌሉት ዳታቤዝ። Doctor እነዚያን ቅድመ-ሁኔታዎች በቀጥታ ይፈትሻል እና እያንዳንዱን ያገኘውን ነገር በሚገልጽ ዓረፍተ ነገር እንደ አልፏል (pass)፣ ማስጠንቀቂያ (warn) ወይም ወድቋል (fail) ብሎ ሪፖርት ያደርጋል። ተመሳሳዩ ሪፖርት በድረ-ገጽ ላይ፣ በትእዛዝ መስመር ላይ እና ለክትትል እንደ JSON ይገኛል።

## የሚፈትሻቸው ነገሮች

| ዘርፍ | ፍተሻዎች |
|---|---|
| Doctor | Doctor ራሱ እንደ root የሚሰራ መሆኑን፤ ይህ ከሆነ የፈቃድ ፍተሻዎች የተሳሳተውን መለያ እንዲገልጹ ያደርጋል |
| Cacti እና PHP | የCacti ስሪት፣ ጫኚው ያልጨረሰው ማሻሻያ፣ ፋይሎቻቸው የጠፉ የነቁ ተሰኪዎች፣ ከተጫነው የCacti ጥቅል ጋር የPHP ተኳኋኝነት፣ የPHP የዋና ምንጭ የደህንነት-ድጋፍ ሁኔታ |
| የPHP ቅጥያዎች | በድር PHP ውስጥ እና poller በሚጠቀምበት CLI PHP ውስጥ አስፈላጊ ቅጥያዎች፣ እንዲሁም የሚመከሩ ባህሪያት |
| የPHP ውቅር | የCactiን የራሱን ምክሮች በመጠቀም `memory_limit`፣ `max_execution_time` እና `date.timezone` |
| ዳታቤዝ | ግንኙነት፣ ከCacti ምክር አንጻር የአገልጋይ ስሪት፣ የUTF-8 ቁምፊ ስብስብ፣ የሰዓት ሰቅ ሰንጠረዦች፣ ዋና ሰንጠረዦች፣ ከPHP አስተናጋጅ ጋር ያለ የሰዓት መዛባት እና Cacti እንደ ስህተት የሚጠቁማቸው የInnoDB ቅንብሮች |
| የዳታቤዝ ጤና | የግንኙነት አቅም፣ የbuffer-pool ንባቦች፣ የዲስክ ጊዜያዊ ሰንጠረዦች፣ የግንኙነት thread መፍጠር፣ ዘገምተኛ መግለጫዎች እና የInnoDB log-buffer መጠበቆች፣ እንደ የስራ ጫናው የሚለያዩ የማስተካከያ ጥቆማዎች ጋር |
| የፋይል ሥርዓት | መጻፍ የሚቻልባቸው የcache፣ የlog እና የRRA ማውጫዎች፤ ለRRD ፋይሎች ነጻ ቦታ፤ RRD ፋይል የሌላቸው ወይም ጊዜያቸው ያለፈባቸው የፋይል ዝማኔዎች ያሏቸው ንቁ የውሂብ ምንጮች፤ `include/config.php` ለሁሉም ሰው የሚነበብ (world-readable) አለመሆኑ፤ የCacti መዝገብ መጻፍ የሚቻል እና ከመጠን በላይ ትልቅ አለመሆኑ |
| ባይነሪዎች | PHP CLI፣ RRDtool፣ `snmpget`፣ `snmpwalk` እና የተዋቀረው poller ከሆነ Spine፤ Cacti አንዱን በሚገልጽበት ቦታ ስሪቶችን ጨምሮ |
| መዝገብ | በጣም በቅርብ ጊዜ በተመዘገቡ የCacti መዝገብ መስመሮች ውስጥ ያሉ ስህተቶች፣ በጣም ተደጋጋሚ ከሆነው መልእክት ጋር |
| መሳሪያዎች | የወረዱ ወይም እያገገሙ ያሉ የነቁ መሳሪያዎች፣ ለረጅም ጊዜ የወረዱት ሶስቱ መሳሪያዎች ከመጨረሻ ስህተታቸው ጋር፣ እና አብዛኞቹ መሳሪያዎች በአንድ ጊዜ ሲወርዱ የሚከሰት ውድቀት |
| Poller | የPoller ዓይነት እና ክፍተት፣ ዋናው poller ለመጨረሻ ጊዜ ካጠናቀቀ በኋላ ያለፈው ጊዜ፣ ከክፍተቱ አንጻር የሩጫ ጊዜ፣ ወደ RRD ፋይል ያልደረሰ የpoller ውጤት፣ ሪፖርት ማድረግ ያቆሙ የርቀት pollerዎች፣ የቆመ Boost እና ወደ ሌላ ዳታቤዝ የሚጠቁም የSpine ውቅር |

ስክሪፕቶች በነጠላ ውጤቶች ላይ እንዲመሰረቱ እያንዳንዱ ፍተሻ እንደ `database.timezone` ወይም `binary.rrdtool` ያለ ቋሚ መለያ (ID) አለው። የነቁ ተሰኪዎች በ`doctor_register_checks` መንጠቆ (hook) በኩል ተጨማሪ ፍተሻዎችን እና የድጋፍ ጥቅል አባሪዎችን ማበርከት ይችላሉ፣ እንዲሁም Doctor በ`abilities_register` በኩል ለንባብ-ብቻ የምርመራ ችሎታዎችን ለ`plugin_mcp` ያጋልጣል።

## የኮድ እና የሙከራ ካርታ

| ባህሪ | አተገባበር | በዚህ ማከማቻ ውስጥ ያለ የሙከራ ማስረጃ |
|---|---|---|
| የምርመራ ፍተሻዎች እና ቋሚ የሪፖርት መለያዎች | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| የተሰኪ ፍተሻ መንጠቆ (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| የMCP የምርመራ ችሎታዎች (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| በሚና የተገደበ መዳረሻ እና የተከለሉ የድር ሪፖርቶች | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| በመመሪያ የተደገፉ የምልክት ምርመራዎች | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| የRRD ወቅታዊነት እና የዘገየ-ጽሑፍ አያያዝ | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| የጥገና ቅድመ-እይታዎች፣ የኦዲት ታሪክ እና ተቀባይነት ያላቸው ማስጠንቀቂያዎች | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| በመርሐግብር የተያዙ ፍተሻዎች እና የማንቂያ ሽግግሮች | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

እነዚህ ማጣቀሻዎች አተገባበሩን እና የሙከራ ሽፋኑን ይለያሉ፤ አሁን ላለው ክለሳ እያንዳንዱ
የCI ስራ አልፏል ማለት አይደለም። ለማሰማራት ላቀዱት ክለሳ የስራ ፍሰቱን (workflow)
ሩጫ ይመልከቱ።

## የዳታቤዝ ጤና ምክር

የDoctor ተፈጥሯዊ የPHP ተንታኝ የCactiን ነባር የዳታቤዝ ግንኙነት በመጠቀም የተወሰኑ ዓለም አቀፋዊ የMySQL ወይም የMariaDB ቆጣሪዎችን ያነባል። በሪፖርት ሁለት የንባብ-ብቻ ጥያቄዎችን ያቀርባል፣ ተጨማሪ የምስክር ወረቀቶችን ወይም ፕሮግራሞችን አይፈልግም፣ እና የዳታቤዝ ውቅርን በጭራሽ አይቀይርም። እነዚህ ፍተሻዎች በድር ሪፖርት፣ በCLI፣ በJSON፣ በክትትል ውጤት፣ በድጋፍ ጥቅል እና በመርሐግብር በተያዘ የሁኔታ ክትትል ውስጥ ይታያሉ።

| የፍተሻ መለያ | የምርመራ ቀስቃሽ |
|---|---|
| `database.health_sample` | ከተነሳ ወይም ከ`FLUSH STATUS` በኋላ ከ24 ሰዓታት ያነሰ ጊዜ፣ ወይም የማይገኝ/ወጥነት የሌለው የሥራ ጊዜ (uptime) |
| `database.connection_capacity` | የአሁኑ ወይም የተመዘገበው ከፍተኛ ግንኙነት ቢያንስ ከአሁኑ `max_connections` 80% ሲሆን |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` ቢያንስ 1%፣ ቢያንስ 10,000 የንባብ ጥያቄዎች ሲኖሩ |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` ቢያንስ 25%፣ ቢያንስ 1,000 ጊዜያዊ ሰንጠረዦች ሲኖሩ |
| `database.thread_cache` | `Threads_created / Connections` ቢያንስ 5%፣ ቢያንስ 1,000 የግንኙነት ሙከራዎች እና `thread_handling=one-thread-per-connection` ሲኖሩ |
| `database.slow_queries` | `Slow_queries / Queries` ቢያንስ 1%፣ ቢያንስ 1,000 መግለጫዎች ሲኖሩ |
| `database.redo_log_waits` | ዜሮ ያልሆነ `Innodb_log_waits` |

እነዚህ የDoctor የምርመራ ገደቦች እንጂ የአቅራቢ ውቅር ዒላማዎች አይደሉም። ከግንኙነት አቅም በስተቀር፣ ድምር ምክር ከላይ ያለውን የምልከታ ጊዜ ይፈልጋል። የጎደሉ፣ የተበላሹ፣ የተባዙ ወይም ከመጠን በላይ የሆኑ ቆጣሪዎች፣ በቂ ያልሆነ እንቅስቃሴ እና የማይደገፉ የthread ሁነታዎች ከጤናማ ውሳኔ ወይም ከማስተካከያ ምክር ይልቅ ማስጠንቀቂያዎችን ያስገኛሉ። **Alert on Warnings** ሲነቃ ማስጠንቀቂያዎች የNagios ሁኔታን እና በመርሐግብር የተያዙ ማንቂያዎችን ሊነኩ ይችላሉ።

የተለኩትን ቆጣሪዎች እና ጥቆማውን በአንድ ላይ ያንብቡ። ድምር እሴቶች የአሁኑን ጫና አያረጋግጡም፤ ቆጣሪዎች የተለያዩ የዳግም ማስጀመሪያ ታሪኮች ሊኖራቸው ይችላል እና አንድ ወጥ የሆነ ቅጽበታዊ ገጽ እይታ (atomic snapshot) አይደሉም። ከፍተኛ ግንኙነቶች የቆየ ገደብን ሊያንጸባርቁ ይችላሉ። የዘገዩ ጥያቄዎች ቆጠራ በ`long_query_time` ላይ የተመሰረተ ነው፣ እና የMySQL የዲስክ ጊዜያዊ-ሰንጠረዥ ቆጣሪ memory-mapped ፋይሎችን ሊተው ይችላል። ዝቅተኛ ጥምርታ ማነቆ አለመኖሩን አያረጋግጥም። የbuffer ወይም የግንኙነት ገደቦችን ከመቀየርዎ በፊት በተወካይ የሥራ ጫና ስር አዝማሚያዎችን ያረጋግጡ፣ የጥያቄ ዕቅዶችን እና የግንኙነት ዳግም ጥቅም ላይ መዋልን ይገምግሙ፣ እንዲሁም በ**ዳታቤዝ አስተናጋጅ** ላይ ማህደረ ትውስታን ይለኩ።

መለኪያዎች የማይገኙ ከሆነ፣ የአገልጋዩን ድጋፍ እና የCacti መለያው `SHOW GLOBAL STATUS` እና `SHOW GLOBAL VARIABLES` የማግኘት መዳረሻ እንዳለው ያረጋግጡ፤ Doctor ከፍ ያሉ የምስክር ወረቀቶችን አይጠይቅም። የቆጣሪ ትርጓሜዎች ከ[የMySQL status-variable ማጣቀሻ](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) እና ከ[የMariaDB status-variable ማጣቀሻ](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables) የመጡ ናቸው። ምንም የMySQLTuner ስክሪፕት ወይም ኮድ ጥቅም ላይ አይውልም።

ምንም የስኪማ (schema) ወይም የውቅር ፍልሰት አያስፈልግም። የተሰኪ ፋይሎችን በመደበኛው መንገድ ያሰማሩ፤ እነዚያን ፋይሎች መመለስ የተጨመሩትን ምርመራዎች ያስወግዳል። ነባሩ በመርሐግብር የተያዘ ሁኔታ በሚቀጥለው ሩጫ ይታደሳል።

## ደህንነቱን እንዴት እንደሚጠብቅ

የምርመራ መሳሪያ በፖለሩ ወይም በድር አገልጋዩ መብቶች የሚሰራ እና ከቅንብሮች ሰንጠረዥ ውስጥ መንገዶችን የሚያነብ በመሆኑ፣ ምን እንደሚያስፈጽም እና ምን እንደሚያሻሽል መጠንቀቅ አለበት።

- ምርመራዎች ለማንበብ ብቻ ናቸው። ፋይሎችን፣ ቅንብሮችን ወይም ውሂብን በፍጹም አይቀይሩም።
- Doctor የተዋቀረ ሁለትዮሽ ፋይል የሚያስፈጽመው የፋይል ስሙ ከሚጠበቀው ፕሮግራም (`php`፣ `rrdtool`፣ `snmpget` ወይም `snmpwalk`) ጋር ሲዛመድ ብቻ ነው። የቅንብሮች ሰንጠረዥን መጻፍ የሚችል ማንኛውም ሰው አለበለዚያ Doctor የሚያስፈጽመውን መምረጥ ይችል ነበር። ሌላ ማንኛውም ስም እንደ ማስጠንቀቂያ ሪፖርት ይደረጋል እንጂ አይፈጸምም።
- Doctor የተዋቀሩ ሁለትዮሽ ፋይሎችን እንደ root በፍጹም አያስፈጽምም፣ እና እንደ root እየሰራ መሆኑን ሪፖርት ያደርጋል።
- ጥገናዎች ከተወሰነ የተፈቀደላቸው ዝርዝር የሚመጡ ናቸው። እያንዳንዳቸው በድር በይነገጽ ውስጥ የተረጋገጠ የአስተዳዳሪ እርምጃ ወይም በCLI ላይ `--yes` ያስፈልጋቸዋል፣ እና እያንዳንዳቸው በCacti መዝገብ ውስጥ ይጻፋሉ።

## የተለቀቁ ስሪቶች

ስሪቶች SemVerን ይከተላሉ እና ከፕለጊኑ `INFO` ፋይል ጋር ይዛመዳሉ። ለስሪት ምርጫ፣ ለCI መዝጊያዎች፣ ለጥቅል ይዘቶች፣ ለቼክሰሞች እና ወደ ቀድሞው የመመለሻ መመሪያዎች [የመልቀቅ ሂደትን](../../releasing.md) ይመልከቱ።

## መጫን

`doctor-VERSION.tar.gz` ወይም `doctor-VERSION.zip` እና `SHA256SUMS`ን ከ[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) ያውርዱ።
የማህደሩን SHA-256 ቼክሰም ያረጋግጡ፣ ከዚያም የእሱን `doctor/` ማውጫ ወደ Cacti `plugins/` ማውጫ ውስጥ ያውጡት። እነዚህ መጫን የሚችሉ ጥቅሎች ናቸው፤ የGitHub አውቶማቲክ የምንጭ ማህደሮች የተለየ የማውጫ ስም አላቸው። ከ`develop` ላይ ያልተለቀቀ ስራን ለማስኬድ፣ ከምንጭ ቼክአውት ይጫኑ።

ለምንጭ ቼክአውቶች፦

ማከማቻውን በCacti መጫኛ ውስጥ እንደ `plugins/doctor` ይቅዱት ወይም ይክፈቱት። ማውጫው `plugin_doctor` ሳይሆን `doctor` መባል አለበት።

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

**Cacti Doctor**ን ከ**ውቅር > የፕለጊን አስተዳደር** ይጫኑና ያንቁ፣ ከዚያም በCacti የተጠቃሚ ወይም የቡድን ፈቃዶች በኩል የ**Doctor ተመልካች**፣ የ**Doctor ኦፕሬተር** ወይም የ**Doctor አስተዳዳሪ** ክልል ይስጡ። ነባር የ**Cacti Doctor** ፈቃዶች ከማሻሻያ በኋላ የአስተዳዳሪ መዳረሻን ይይዛሉ። ሪፖርቱ በ**መገልገያዎች > Cacti Doctor** ስር ይታያል።

## ቋንቋዎች

Doctor በ`locales/po/` እና `locales/LC_MESSAGES/` ስር ሰፊ ደረጃ 1 (`ar-SA`፣ `de-DE`፣ `es-ES`፣ `es-419`፣ `fr-FR`፣ `hi-IN`፣ `id-ID`፣ `it-IT`፣ `ja-JP`፣ `ko-KR`፣ `nl-NL`፣ `pl-PL`፣ `pt-BR`፣ `ru-RU`፣ `sv-SE`፣ `tr-TR`፣ `uk-UA`፣ `vi-VN`፣ `zh-CN`፣ `zh-TW`)፣ የአፍሪካ (`af-ZA`፣ `am-ET`፣ `ar-EG`፣ `ar-MA`፣ `fr-MA`፣ `fr-SN`፣ `ha-NG`፣ `ig-NG`፣ `mg-MG`፣ `rw-RW`፣ `so-SO`፣ `sw-KE`፣ `xh-ZA`፣ `yo-NG`፣ `zu-ZA`)፣ የእስያ (`bn-BD`፣ `fa-IR`፣ `he-IL`፣ `mr-IN`፣ `ms-MY`፣ `ta-IN`፣ `te-IN`፣ `th-TH`፣ `ur-PK`፣ `fil-PH`) እና የደቡብ ምሥራቅ አውሮፓ (`bs-BA`፣ `hr-HR`፣ `sr-RS`) የአካባቢ ቋንቋዎችን የሚሸፍኑ 48 እንግሊዝኛ ያልሆኑ የትርጉም ካታሎጎችን አካቶ ይመጣል። የቋንቋ ድጋፍ አንዴ ከበራ (**ውቅር > ቅንብሮች > አጠቃላይ > የቋንቋ ድጋፍ**) እና ተጠቃሚ Cacti በቋንቋ መምረጫው ውስጥ የሚያቀርበውን የአካባቢ ቋንቋ ከመረጠ በኋላ Cacti ካታሎጉን ያሳያል፤ በCacti መምረጫ ውስጥ ገና ላልተዘረዘሩ የአካባቢ ቋንቋዎች የሚሆኑ ካታሎጎች ደግሞ Cacti አንዴ ካከላቸው በኋላ ተግባራዊ ይሆናሉ። ድረ-ገጹ፣ ቅንብሮቹ እና የትእዛዝ መስመሩ የሚያትማቸው መልዕክቶች እና የሪፖርት ጽሑፎች የCactiን ቋንቋ ይከተላሉ፤ የትእዛዝ መስመር ሪፖርቱ ራሱ የCactiን ነባሪ ቋንቋ ይጠቀማል፣ እሱም ካልቀየሩት በስተቀር እንግሊዝኛ ሆኖ ይቆያል።

በማሽን ሊነበብ የሚችል ውጤት በፍጹም አይተረጎምም፦ የፍተሻ መታወቂያዎች፣ የJSON ቁልፎች እና የሁኔታ እሴቶች፣ የ`--format=nagios` እና `--format=prometheus` ውጤት፣ የመዝገብ መስመሮች እና የድጋፍ ጥቅል ክፍል ርዕሶች ስክሪፕቶች እና ክትትል በሁሉም ቋንቋ መስራታቸውን እንዲቀጥሉ በእንግሊዝኛ ይቆያሉ። የእያንዳንዱ ፍተሻ `summary` እና `detail` ጽሑፍ በJSON ሪፖርቱ ውስጥ የሚተረጎመው አንዱ ክፍል ነው።

የላቲን አሜሪካ ስፓኒሽ ካታሎግ (`es-419`)ም አብሮ ይመጣል፣ ነገር ግን Cacti 1.2ም ሆነ Cacti 1.3 ለመምረጥ የላቲን አሜሪካ ስፓኒሽ አካባቢያዊ ቅንብር የላቸውም፣ ስለዚህ ተግባራዊ የሚሆነው Cacti አንዱን ሲያክል ብቻ ነው። እስከዚያው ድረስ ስፓኒሽ (`es-ES`)ን ይምረጡ።

Cacti የፕለጊን ካታሎግን ከ`plugins/doctor/locales/LC_MESSAGES/<locale>.mo` ውስጥ `doctor`ን እንደ የጽሑፍ ጎራ በመጠቀም በ1.2.x እና በ1.3 ላይ በተመሳሳይ መልኩ ይጭናል (1.3 የፕለጊን ማውጫውን በሚዋቀረው የፕለጊኖች መንገድ በኩል ይፈታዋል)።

## የመዳረሻ ደረጃዎች

| ክልል | ችሎታዎች |
|---|---|
| Doctor ተመልካች | የቅርብ ጊዜውን መርሐግብር የተያዘለት የፍተሻ ሁኔታዎችን፣ የምልከታ ጊዜን፣ ትኩስነትን እና የቅርብ ጊዜ ድምር ታሪክን ያንብቡ። የምርመራ ትእዛዞች፣ ጥሬ ዝርዝሮች፣ ውቅር ወይም ጥገናዎች የሉም። |
| Doctor ኦፕሬተር | በ120-ሰከንድ የሂደት ገደብ የምርመራ ሪፖርት ያስኪዱ፣ የተሸፈኑ ዝርዝሮችን ይመርምሩ እና ግኝቶችን ያረጋግጡ። የቅንብሮች ለውጦች ወይም ጥገናዎች የሉም። |
| Doctor አስተዳዳሪ | የኦፕሬተር ችሎታዎች እና በተጨማሪ ነባር በተፈቀደላቸው ዝርዝር ውስጥ ያሉ ጥገናዎች እና የDoctor ቅንብሮች። ጥገናዎች እና ቅንብሮች የCactiን የቅንብሮች/የስርዓት መገልገያዎች ክልልም ይፈልጋሉ። |

የመገልገያዎች ምናሌ የቡድን ፈቃዶችን ጨምሮ ለተጠቃሚው ለተሰጠው ከፍተኛው የDoctor ክልል ገጹን ይከፍታል። አዲስ የተመልካች እና የኦፕሬተር ክልሎች ምንም ራስ-ሰር ፈቃዶችን አያገኙም። የመጀመሪያው የክልል መታወቂያ ነባር የተጠቃሚ እና የቡድን መዳረሻን በመጠበቅ እንደ አስተዳዳሪ ከ`doctor.php` ጋር ተያይዞ ይቆያል።

የተመልካች ውሂብ የሚመጣው መርሐግብር ከተያዘላቸው ፍተሻዎች ነው። የተመልካች መዳረሻ ከመስጠትዎ በፊት መርሐግብር ማስያዝን ያንቁ፤ የጎደሉ ወይም ጊዜያቸው ያለፈባቸው ምልከታዎች ጤናማ ሳይሆን **ያልታወቀ** የሚል ያሳያሉ። ታሪክ የመጨረሻዎቹን 20 መርሐግብር የተያዘላቸው ድምር ቆጠራዎችን ይይዛል እና የመሣሪያ ሁኔታን አያካትትም። ኦፕሬተሮች አዲስ ምርመራዎችን በግልጽ ይጀምራሉ፤ መደበኛ የገጽ ማደሶች የክፍለ-ጊዜያቸውን የመጨረሻ ሪፖርት ይጠቀማሉ።

የመሣሪያ ዝርዝሮች እና ድምሮች የአሁኑን ተጠቃሚ የመሣሪያ ፈቃዶች ይጠቀማሉ። የመዝገብ ቅንጭብጫቢዎች በተጨማሪ የCactiን የመዝገብ አስተዳደር ክልል ይፈልጋሉ። የምርመራ ዝርዝሮች በድር ክፍለ-ጊዜ ውስጥ ከመቀመጣቸው ወይም ከመታየታቸው በፊት ሚስጥሮች ይሸፈናሉ። የCLI መዳረሻ በስርዓተ-ክወናው መለያ መመራቱን ይቀጥላል።

ማረጋገጫዎች የግል ናቸው እና በCacti መዝገብ ውስጥ ይመዘገባሉ። የሚሰሩት ለተመሳሳይ ግኝት እና ማስረጃ ብቻ ነው፤ የተለወጠ ማስረጃ አዲስ ማረጋገጫ ይፈልጋል። የማለፍ/ማስጠንቀቂያ/ውድቀት ሁኔታን በፍጹም አይለውጡም፣ ማንቂያዎችን አያፍኑም፣ ወይም የወደቀ ፍተሻን እንደ ጤናማ ምልክት አያደርጉም። ይህ ከተቀበሉ የማስጠንቀቂያ ልዩ ሁኔታዎች የተለየ ነው፣ እነሱም የተመለከተውን ሁኔታ ሳይቀይሩ የማንቂያ ፖሊሲን የሚነኩ እና ከዚህ በታች የተገለጹ ናቸው።

እያንዳንዱ እርምጃ POST እና ትክክለኛ የCSRF ማስመሰያ ይፈልጋል። ጥገናዎች የማያስገባ የመሰረዝ አገናኝ ያለው የተለየ የማረጋገጫ ገጽ ያቀርባሉ፣ እንዲሁም ተግባሩን የፈጸመውን ተጠቃሚ እና ውጤቱን በCacti መዝገብ ውስጥ ይመዘግባሉ።

## የትእዛዝ መስመር

እነዚህን እንደ root ሳይሆን እንደ Cacti ፖለር ተጠቃሚ ከCacti ስር ያስኪዱ፦

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

የጽሑፍ ውጤት ለእያንዳንዱ ፍተሻ ከሁኔታው፣ ከምድቡ፣ ከማጠቃለያው እና ከዝርዝሩ ጋር አንድ መስመር ያትማል። `--json` የሁኔታ ቆጠራዎች ያሉት `summary` ነገር እና የተፈቀደላቸው ጥገናዎች ሲተገበሩ ግቤቶቹ `id`፣ `category`፣ `status`፣ `summary`፣ `detail` እና `repair`/`repairable` የሚይዙበትን `checks` ድርድር ያትማል።

| የመውጫ ሁኔታ | ትርጉም |
|---|---|
| `0` | ምንም ፍተሻ አልወደቀም፣ ወይም የተጠየቀው ጥገና ተሳክቷል። ማስጠንቀቂያዎች የመውጫ ሁኔታውን አይለውጡም። |
| `1` | ቢያንስ አንድ ፍተሻ ወድቋል፣ ወይም የተጠየቀው ጥገና አልተሳካም። |
| `2` | የአጠቃቀም ስህተት፦ ያለ `--yes` የተካሄደ ጥገና (`--preview` አያስፈልገውም)፣ የማይታወቅ የጥገና መታወቂያ፣ የማይታወቅ የውጤት ቅርጸት፣ የማይደገፍ `--symptom` ወይም የቅርጸት ጥምረት፣ ወይም ሊገኝ የማይችል የCacti መጫኛ። |

Cacti ለእያንዳንዱ የCLI ስክሪፕት `memory_limit`ን ከፍ ያደርገዋል፣ ስለዚህ የPHP የአሂድ ጊዜ ውቅር ፍተሻ ትርጉም ያለው በድረ-ገጹ ላይ ብቻ ነው።

## መርሐግብር የተያዘላቸው ፍተሻዎች እና ማንቂያዎች

በ**ውቅር > ቅንብሮች > Doctor** ስር **ፍተሻዎችን በመርሐግብር አስኪድ** የሚለውን ያብሩ እና ከ15 ደቂቃ እስከ አንድ ቀን ያለ ክፍተት ይምረጡ። ጊዜው ከደረሰበት እያንዳንዱ የፖለር ዑደት በኋላ፣ Doctor እያንዳንዱን ፍተሻ ከበስተጀርባ ሂደት ውስጥ ያስኪዳል፣ ስለዚህ የፖለሩ የራሱ የአሂድ ጊዜ አይነካም።

እያንዳንዱ አሂድ የእያንዳንዱን ፍተሻ የተመለከተ ሁኔታ ይመዘግባል። ንቁ የማስጠንቀቂያ ልዩ ሁኔታዎች ያንን ምልከታ ሳይቀይሩ የማንቂያ ፖሊሲን ይነካሉ። አንድ ፍተሻ መውደቅ ሲጀምር ወይም ሲያቆም፣ Doctor ለውጡን በCacti መዝገብ ውስጥ ይጽፋል እና **የማንቂያ ኢሜይል አድራሻዎች** ከተዋቀረ፣ በCacti የፖስታ ቅንብሮች በኩል ወደ እነዚያ አድራሻዎች ኢሜይል ይልካል። **በማስጠንቀቂያዎች ላይ አስጠንቅቅ** ወደ ማስጠንቀቂያዎች መግባት እና መውጣትን ይጨምራል። የመጀመሪያው አሂድ የመነሻ መስመርን ብቻ ይመዘግባል።

መርሐግብር የተያዘላቸው ሪፖርቶች በዋናው ፖለር ላይ በውሂብ ጎታ አማካሪ መቆለፊያ ስር ይሰራሉ እና የሁለት ደቂቃ የሰራተኛ ገደብ አላቸው። የጎደሉ ወይም የቆዩ ውጤቶች እንዲታዩ Doctor የመጨረሻውን መጀመሪያ እና የተሳካ ማጠናቀቂያ ሪፖርት ያደርጋል። ውጤቶች ለክፍተቱ ሲደመር አንድ የፖሊንግ ዑደት እና ሶስት ደቂቃዎች እንደ ወቅታዊ ይቆጠራሉ። ያልተጠናቀቀ አሂድ ከ5፣ 10፣ 20 እና ከዚያ በላይ ደቂቃዎች በኋላ፣ እስከ መደበኛው ክፍተት ድረስ እንደገና ይሞከራል። ያልተሳካ የማንቂያ ማድረስ እየጨመረ በሚሄድ መዘግየት እስከ ሶስት ሙከራዎች ድረስ ይቆያል፤ ከዚያ በኋላ የCactiን የፖስታ ቅንብሮች ያስተካክሉ እና `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts`ን እንደ ፖለር ተጠቃሚ ያስኪዱ። በፖስታ አገልጋዩ መቀበሉ ወደ የገቢ መልእክት ሳጥን መድረሱን አያረጋግጥም።

ይኸው ትር ለፖለር የአሂድ ጊዜ (የክፍተቱ 80%)፣ ለRRA ነጻ የዲስክ ቦታ (ከ10% በታች ማስጠንቀቂያ፣ ከ2% በታች ውድቀት)፣ ለውሂብ ጎታ ሰዓት መንሸራተት (ከ5 ሰከንድ በላይ ማስጠንቀቂያ፣ ከ60 በላይ ውድቀት) እና ለCacti መዝገብ መጠን (100 MB) ገደቦችን ያዘጋጃል። ባዶ ወይም ልክ ያልሆኑ እሴቶች ወደ እነዚህ ነባሪዎች ይመለሳሉ።

## የክትትል ውህደት

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` ከአፈጻጸም ውሂብ ጋር አንድ የሁኔታ መስመር ያትማል እና `0` (OK)፣ `1` (WARNING) ወይም `2` (CRITICAL) ብሎ ይወጣል፣ ስለዚህ Nagios፣ Icinga ወይም ማንኛውም ተኳሃኝ ስርዓት በቀጥታ ሊያስኪደው ይችላል። `--format=prometheus` ለnode_exporter የtextfile ሰብሳቢ የPrometheus ጽሑፍ ቅርጸትን ይጽፋል፦ ለእያንዳንዱ ፍተሻ `cacti_doctor_check_status` (0 ማለፍ ወይም ተቀባይነት ያለው ማስጠንቀቂያ፣ 1 እርምጃ የሚያስፈልገው ማስጠንቀቂያ፣ 2 ውድቀት)፣ ከልዩ ሁኔታዎች በፊት `cacti_doctor_check_observed_status`፣ `cacti_doctor_check_accepted`፣ ለእያንዳንዱ ሁኔታ `cacti_doctor_checks` እና `cacti_doctor_last_run_timestamp_seconds`። የJSON ፍተሻ ረድፎች `assessment` መስክን ያካትታሉ፤ `not_assessed` ማለት ፍተሻው ካለው ውሂብ መደምደሚያ ላይ መድረስ አልቻለም ማለት ነው።

## የድጋፍ ጥቅል

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

ጥቅሉ የDoctor፣ Cacti፣ PHP፣ OS እና የውሂብ ጎታ ስሪቶችን፣ የፖለር እና የBoost ስታቲስቲክስን፣ ሙሉ ሪፖርቱን፣ በ`== Plugin attachments` ስር ያሉ ማናቸውንም የተሰኪ የድጋፍ ጥቅል አባሪዎችን እና የCacti መዝገብ የመጨረሻዎቹን 200 መስመሮች የያዘ አንድ የጽሑፍ ፋይል ነው። የይለፍ ቃል፣ ሚስጥር፣ ማስመሰያ፣ ማህበረሰብ እና የቁልፍ ስሞችን የሚከተሉ እሴቶች ይሸፈናሉ። Doctor ፋይሉን በባለቤቱ ብቻ እንዲነበብ አድርጎ ይፈጥረዋል እና ነባር ፋይል ላይ መደረብን አይፈቅድም። የትም ቦታ ከመለጠፍዎ በፊት ይገምግሙት።

## የጥገና ፖሊሲ

Doctor አንድ ጥገና ያካትታል፣ እሱም `runtime_directories` ነው። የጎደሉ የCacti የስራ ጊዜ ማውጫዎችን ይፈጥራል እንዲሁም ነባር ፈቃዶችን ሳያስወግድ የባለቤት የማንበብ፣ የመጻፍ እና የማስፈጸም ቢቶችን ይጨምራል።

በCacti 1.3 ላይ `$cache_path`፣ `$log_path` እና `$rra_path` ላይ ያነጣጥራል፣ ወይም ካልሆነ የመጫኛውን `cache`፣ `log` እና `rra` ማውጫዎች ያነጣጥራል። ቀድሞውኑ መጻፍ የሚቻልባቸውን ማውጫዎች ይዘላል፣ ከCacti መጫኛ ውጭ ያሉ ማውጫዎችን (ለምሳሌ በ`/var/log` ስር ያለ የሎግ ማውጫ) አይቀበልም፣ ሲምቦሊክ ሊንኮችን አይቀበልም፣ እና እንደ root መስራትን አይቀበልም። `path_cactilog`ን በፍጹም አይከተልም፣ ስለዚህ በኮድ ማውጫ ውስጥ የተዋቀረ የሎግ ፋይል ጥገናውን ወደዚያ ሊመራ አይችልም። ምርመራው ግን በሁሉም እትም ላይ የተዋቀረውን የሎግ ፋይል ማውጫ መፈተሹን ይቀጥላል።

ባለቤትነትን አይለውጥም፣ የሼል ትዕዛዞችን አያስፈጽምም፣ ውቅረትን እንደገና አይጽፍም፣ ወይም የCacti መተግበሪያ ውሂብን አይቀይርም። አዳዲስ ጥገናዎች እያንዳንዳቸው ምርመራ፣ በፍቃድ ዝርዝር ውስጥ የተካተተ አስተናጋጅ፣ ማረጋገጫ፣ የኦዲት መዝገብ እና ሙከራዎችን ማካተት አለባቸው።

## ምልክቶችን መመርመር

ኦፕሬተሮች እና አስተዳዳሪዎች በDoctor ገጽ ላይ **ምልክትን መርምር** የሚለውን መምረጥ ይችላሉ። ተመሳሳይ ህጎች በ`--symptom=graphs_stopped`፣ `slow_polling`፣ `devices_missing` ወይም `alerts_missing` በኩል በጽሑፍ ወይም በJSON ውጤት ይገኛሉ። የድጋፍ ጥቅሎች ተዛማጅ የምልክት ምርመራዎችን ያካትታሉ።

እያንዳንዱ እጩ የታዩ ፍተሻዎችን እና ቀጣይ የማረጋገጫ ደረጃን ይዘረዝራል። እጩዎች መላምቶች እንጂ የተረጋገጡ ዋና መንስኤዎች አይደሉም። የጎደሉ፣ ያልተገመገሙ ወይም ያረጁ ምልከታዎች መንስኤን በፍጹም አያረጋግጡም። የድር ምርመራዎች በፈቃድ የተጣራውን ሪፖርት ይጠቀማሉ፤ የCLI ሪፖርቶች የስርዓተ ክወናውን መለያ መዳረሻ ይጠቀማሉ።

## የRRD ዝማኔ ትኩስነት

`filesystem.rrd_stale` የቦዘኑ እና የወደቁ መሣሪያዎችን ሳያካትት እስከ 500 ንቁ የውሂብ ምንጮችን ይፈትሻል። በትላልቅ መጫኛዎች ላይ ናሙናው በየሰዓቱ ይለዋወጣል፣ ስለዚህ ተደጋጋሚ አሂዶች የተለያዩ ፋይሎችን ይሸፍናሉ። የፋይል መሻሻያ ጊዜያትን ከpoller ክፍተት፣ ከምንጭ RRD ደረጃ እና ከመገለጫ ደረጃ በትልቁ ላይ **የRRD ያረጁ ክፍተቶች** (ነባሪው 3) ተባዝቶ ያወዳድራል። ሦስቱን በጣም የቆዩ ያረጁ ፋይሎችን እና የተጎዱ መሣሪያዎችን ብዛት ያሳያል። የድር ውጤቶች የተፈቀዱ መሣሪያዎችን ብቻ ያካትታሉ።

`filesystem.rrd_files` የተለየ የመኖር ፍተሻ ነው። በቦዘኑ ወይም በወደቁ መሣሪያዎች ላይ ያሉትን ጨምሮ እስከ 5,000 ንቁ የውሂብ ምንጮችን የRRD ፋይል ይፈልጋል፣ እና ተመሳሳይ የሰዓት ናሙና ይጠቀማል።

Boost የተዋቀረውን የflush ክፍተት እጥፍ እንደ የዲስክ መጻፊያ ፈቃድ ይጨምራል። ለሌላ የዘገየ ጸሐፊ፣ **የዘገየ የRRD መጻፊያ ፈቃድ (ሰከንዶች)**ን ያዋቅሩ። ያለ ፈቃድ የተገለጸ `RRDCACHED_ADDRESS`፣ ወይም ልክ ያልሆነ የBoost ክፍተት፣ ያልተገመገመ ውጤት ይፈጥራል። Doctor ይህንን ፍተሻ ለማከናወን መሸጎጫን በፍጹም flush አያደርግም። የመሻሻያ ጊዜ የዲስክ እንቅስቃሴ ማስረጃ እንጂ የተሳካ የውሂብ ስብስብ ማረጋገጫ አይደለም። Doctor ሊያገኘው የማይችለው ውጫዊ መሸጎጫ በግልጽ መዋቀር አለበት።

የጎደሉ፣ የማይነበቡ እና የወደፊት ቀን ያላቸው ፋይሎች በዝርዝሩ ውስጥ ይቆጠራሉ። ውጤቱ ያልተገመገመ የሚሆነው ምንም የተወሰደ ናሙና ፋይል ሊነበብ የማይችል ሲሆን ብቻ ነው። የናሙና ውጤት የመጫኛውን ከፊል ብቻ እንደሚሸፍን ይገልጻል፤ ማለፍ ያልተናሙኑ ፋይሎችን አይሸፍንም።

## የጥገና ቅድመ-እይታዎች እና የኦዲት ታሪክ

የአስተዳዳሪ የጥገና ገጽ እያንዳንዱን የተጎዳ ዱካ፣ የታቀደውን እርምጃ፣ የአሁኑን ፈቃዶች እና የታለመውን ፈቃዶች ያሳያል። ማጽደቅ ከዚያ ቅድመ-እይታ፣ ከተግባሪው ተጠቃሚ እና ከአምስት ደቂቃ የህይወት ዘመን ጋር የተሳሰረ ነው። ማረጋገጫ ቅድመ-እይታውን ይጠቀማል፤ የተለወጠ የፋይል ስርዓት ሌላ ቅድመ-እይታ ይፈልጋል። በroot መፈጸም፣ ከመጫኛው ውጭ ያሉ ዱካዎች፣ ጥገና የሚያስፈልጋቸው አገናኞች እና ያልተሟሉ የፋይል ስርዓት ፈቃዶች ማጽደቅን ይከላከላሉ።

`--repair=runtime_directories --preview` ለንባብ-ብቻ የሆነ የJSON እቅድ ያትማል። `--repair=runtime_directories --yes` አዲስ የተሰላ የCLI እቅድን ያጸድቃል እና ከመፈጸሙ በፊት እንደገና ይፈትሻል። የCLI መለያው መጫኛውን ለመጠገን ቀድሞውኑ ፈቃድ ሊኖረው ይገባል፤ የድር ሚናዎችን አይወርስም።

ማንኛውም የፋይል ስርዓት ለውጥ ከመደረጉ በፊት የተዋቀረ `repair.started` መዝገብ መቀመጥ አለበት። የተገናኘ `repair.completed` መዝገብ ከጥገና በኋላ ያለውን ቅጽበታዊ ገጽ እይታ እና የማረጋገጫ ውጤት ይይዛል። የተቋረጠ ክዋኔ ለምርመራ የተጀመረ መዝገብን ይተዋል። የማጠናቀቂያ-ኦዲት ውድቀት የፋይል ስርዓት ለውጦች ቢከሰቱም እንኳ እንደ ውድቀት ሪፖርት ይደረጋል። Doctor የባለቤት ፈቃዶችን ይጨምራል እና ማውጫዎችን ይፈጥራል፤ አውቶማቲክ ወደ ኋላ መመለስ አይሞክርም።

የCacti የቅንብሮች/የስርዓት መገልገያዎች ፈቃድ ያላቸው አስተዳዳሪዎች በDoctor ገጽ ላይ የቅርብ ጊዜዎቹን 20 የኦዲት ግቤቶች ማንበብ ይችላሉ። ተሰኪው የቅርብ ጊዜዎቹን 200 መዝገቦች በ`plugin_doctor_audit` ውስጥ ያቆያል፤ የCacti ሎግም መታወቂያዎቻቸውን፣ እርምጃዎቻቸውን እና ፈጻሚዎቻቸውን ይመዘግባል። የኦዲት ይዘቶች ሚስጥራዊነታቸው ተጠብቆ ይሸፈናሉ።

## ተቀባይነት ያገኙ ማስጠንቀቂያዎች

የCacti የቅንብሮች/የስርዓት መገልገያዎች ፈቃድ ያላቸው አስተዳዳሪዎች በDoctor ገጽ ላይ ካለ ትኩስና ከተገመገመ ማስጠንቀቂያ **የማስጠንቀቂያ ልዩ ሁኔታ** መፍጠር ይችላሉ። ልዩ ሁኔታው ባለቤት፣ ምክንያት እና በ90 ቀናት ውስጥ ያለ የUTC የግምገማ ቀን ይፈልጋል። በዚያ ቀን መጀመሪያ ላይ በUTC እኩለ ሌሊት ጊዜው ያልፍበታል። እስከ 100 ልዩ ሁኔታዎች ሊዋቀሩ ይችላሉ። ዝርዝሩ ጊዜያቸው ያለፈባቸውን ግቤቶች እና በአሁኑ ሪፖርት ውስጥ የሌሉ መታወቂያዎችን ያሳያል፣ እና መወገድን ይፈቅዳል።

የታየው ማስጠንቀቂያ ከባለቤቱ፣ ከምክንያቱ እና ከሚያበቃበት ጊዜ ጋር በምርመራ ዝርዝሮች ውስጥ መታየቱን ይቀጥላል። JSON የታየውን ሁኔታ ይዞ `accepted` እና `acceptance` ሜታዳታ ይጨምራል። Nagios ንቁ ተቀባይነት ያገኙ ማስጠንቀቂያዎችን ከመውጫ ክብደቱ ያስቀራል ነገር ግን በውጤቱ ውስጥ ስማቸውን ይጠቅሳል። Prometheus የታየውንም ሆነ እርምጃ የሚያስፈልገውን ክብደት ይልካል። መደበኛው የCLI መውጫ ሁኔታ ሳይለወጥ ይቆያል፦ ማስጠንቀቂያዎች ቀድሞውኑ በዜሮ ይወጣሉ፣ ውድቀቶች በአንድ ይወጣሉ።

ልዩ ሁኔታው ተግባራዊ በሚሆንበት ጊዜ የታቀዱ የማስጠንቀቂያ ማንቂያዎች ይታገዳሉ፤ ጊዜው ማለፉ ወይም መወገዱ የሚቀጥል ማስጠንቀቂያን ለማስጠንቀቂያ ማንቂያዎች እንደገና ብቁ ያደርገዋል። የውድቀት ሽግግሮች እና ከውድቀት ማገገም ለማንቂያዎች ብቁ ሆነው ይቆያሉ። ያልተገመገመ ውጤት ወይም ውድቀት ተቀባይነት ሊያገኝ አይችልም። የግል እውቅና የተለየ ነው እና ምንም ነገር አያግድም። የልዩ ሁኔታ መፍጠር እና ማስወገድ ከኦዲት መዝገቡ ጋር በአንድ ግብይት ይፈጸማሉ።

ማሻሻል የCacti መተግበሪያ ውሂብን ሳይለውጥ `plugin_doctor_audit` እና `plugin_doctor_acceptance`ን ይፈጥራል። ከማራገፍዎ በፊት የሚፈልጉትን ማንኛውንም ታሪክ ወደ ውጭ ይላኩ፦ ማራገፍ ሁለቱንም የተሰኪ ሰንጠረዦች እና ቅንብሮቹን ያስወግዳል። የተሰኪ ፋይሎችን ወደ ቀድሞው መመለስ ሰንጠረዦቹን ለምርመራ እንዲገኙ ያደርጋል፣ ነገር ግን የቆዩ እትሞች የማስጠንቀቂያ ልዩ ሁኔታዎችን አያከብሩም።

## የተሰኪ ፍተሻዎች (`doctor_register_checks`)

የነቁ የCacti ተሰኪዎች `doctor_register_checks` መንጠቆን በመመዝገብ ለንባብ-ብቻ የሆኑ የምርመራ ፍተሻዎችን እና አማራጭ የድጋፍ ጥቅል አባሪዎችን ማበርከት ይችላሉ፦

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor በ`doctor_register_checks` ላይ የተመዘገቡ የነቁ፣ ያልተዋሃዱ ተሰኪዎችን (`doctor` እና `cacti`ን በመዝለል) ይጠራል፣ የመንጠቆ ፋይሉን በጥብቅ በተሰኪው የራሱ ማውጫ ውስጥ በመፍታት። መልሶ መጥሪያው (callback) `['mode' => 'run' | 'list', 'plugin' => '<slug>']`ን ይቀበላል እና የፍተሻ ገላጮች ዝርዝር ወይም `checks` እና አማራጭ `attachments` ያለው ፖስታ ይመልሳል፦

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

እያንዳንዱ የተሰኪ ፍተሻ ገላጭ ከመካተቱ በፊት ይረጋገጣል፦

- አስፈላጊ ቁልፎች፦ `id`፣ `plugin`፣ `category`፣ `title`፣ `status`፣ `message`፣ `details` እና `remediation`።
- `plugin` ከተመዘገበው የተሰኪ slug (`[a-z0-9_]{1,64}`) ጋር መዛመድ አለበት። `id` ከ`[a-z0-9_.]{1,128}` ጋር መዛመድ፣ በ`<plugin>.` መጀመር እና ከነባር ዋና ወይም የተሰኪ ፍተሻ መታወቂያ ጋር አለመጋጨት አለበት።
- `status` `ok`፣ `warn`፣ `fail` ወይም `info` መሆን አለበት። `ok` በDoctor ሪፖርቶች ውስጥ ወደ `pass` ይቀየራል፤ `info` መረጃ ሰጪ ነው እና በCLI፣ Nagios፣ Prometheus ወይም በመርሐግብር በተያዙ ማንቂያዎች ውስጥ ውድቀቶችን አያስነሳም።
- `category` (እስከ 64 ባይት) እና `title` (እስከ 256 ባይት) የመቆጣጠሪያ ቁምፊዎች የሌሏቸው ባዶ ያልሆኑ ሕብረቁምፊዎች መሆን አለባቸው። `message` (ባዶ ያልሆነ፣ እስከ 2048 ባይት) እና `remediation` (እስከ 2048 ባይት) ሕብረቁምፊዎች መሆን አለባቸው።
- `details` ሕብረቁምፊ (እስከ 8192 ባይት) ወይም ስካላር/የተከተተ ድርድር (ከፍተኛ ጥልቀት 4፣ በJSON የተቀመጠ እስከ 16384 ባይት፤ ነገሮች እና ሀብቶች ውድቅ ይደረጋሉ) ይቀበላል።
- አማራጭ የድጋፍ ጥቅል አባሪዎች ባዶ ያልሆነ `title` (እስከ 128 ባይት፣ የመቆጣጠሪያ ቁምፊዎች የሌሉት) እና እስከ 65536 ባይት (64 KiB) የሆነ የ`content` ሕብረቁምፊ ይፈልጋሉ።

Doctor በአንድ ተሰኪ 32 ፍተሻዎች እና 8 አባሪዎች ገደብ (በአጠቃላይ 64 የተሰኪ ፍተሻዎች እና 32 አባሪዎች) ያስፈጽማል። እያንዳንዱ መንጠቆ በራሱ `try`/`catch` ወሰን ውስጥ ይሰራል ስለዚህ ልዩ ሁኔታዎች ወይም ድርድር ያልሆኑ ጭነቶች ዋና ፍተሻዎችን ወይም ሌሎች ተሰኪዎችን ሳይነኩ ተሸፍነው በCacti መዝገብ (`DOCTOR` ተቋም) ውስጥ ይመዘገባሉ። የተበላሹ ገላጮች ውድቅ ተደርገው ይመዘገባሉ ከተመሳሳይ ተሰኪ ትክክለኛ የሆኑት ግን መስራታቸውን ይቀጥላሉ። የተሰኪ ፍተሻዎች ሁልጊዜ ለንባብ-ብቻ ናቸው (`repairable: false`)፣ እና ከመታየታቸው፣ ከመላካቸው ወይም ከመጠቅለላቸው በፊት የሕብረቁምፊ እሴቶች እና ሚስጥራዊ ተያያዥ ቁልፎች ይሸፈናሉ። የተረጋገጡ የተሰኪ ፍተሻዎች በድር UI፣ በCLI ጽሑፍ/JSON/Nagios/Prometheus ውጤት፣ በመርሐግብር በተያዘ የሁኔታ ክትትል እና በድጋፍ ጥቅሎች ውስጥ ይታያሉ።

## የMCP ውህደት (`abilities_register`)

ሁለቱም ተሰኪዎች ሲነቁ `plugin_mcp` የምርመራ ችሎታዎቹን እንዲያገኝ Doctor የ`abilities_register` መንጠቆን (`doctor_abilities_register` በ`doctor_abilities.php` ውስጥ) ይመዘግባል። Doctor የ`diagnostics` ምድብን (`Diagnostics`) እና ሁለት ለንባብ-ብቻ፣ አጥፊ ያልሆኑ፣ idempotent ችሎታዎችን ይመዘግባል፦

| የችሎታ መታወቂያ | አማራጭ ነጋሪ እሴቶች | ውጤት |
|---|---|---|
| `doctor-run-checks` | `category` (ሕብረቁምፊ፣ ከፍተኛ 64 ቁምፊዎች)፣ `status` (`pass`፣ `ok`፣ `warn`፣ `fail`፣ `info`) | `summary` (`total`፣ `pass`፣ `warn`፣ `fail`፣ `info`) እና እስከ 256 የተሸፈኑ `findings` (`id`፣ `plugin`፣ `category`፣ `title`፣ `status`፣ `message`፣ `remediation`) |
| `doctor-list-checks` | `category` (ሕብረቁምፊ፣ ከፍተኛ 64 ቁምፊዎች)፣ `plugin` (ሕብረቁምፊ፣ ከፍተኛ 64 ቁምፊዎች) | ሁሉንም 45 አብሮገነብ ፍተሻዎችን እና የነቁ የተሰኪ ፍተሻዎችን የሚሸፍኑ እስከ 256 `checks` (`id`፣ `plugin`፣ `category`፣ `title`) |

ሁለቱም ችሎታዎች በጥብቅ ለንባብ-ብቻ ናቸው እና ጥገናዎችን በፍጹም አያካሂዱም። ከ`plugin_mcp` የራሱ የክልል እና የችሎታ መጋለጥ መቆጣጠሪያዎች በተጨማሪ (አንድ አስተዳዳሪ እስኪያጋልጣቸው ድረስ የተሰኪ ችሎታዎች በMCP ውስጥ ተደብቀው ይጀምራሉ)፣ Doctor የማስመሰያው ባለቤት **Doctor ተመልካች** ወይም ከዚያ በላይ የሆነ የDoctor ክልል እንዲኖረው ይጠይቃል። `doctor-run-checks` `devices.health`ን ለማስመሰያው ባለቤት በተፈቀዱ መሳሪያዎች ይገድባል፣ `logging.recent_errors`ን የሚያካትተው ተጠቃሚው የCacti ክልል 18 ወይም 19 ሲኖረው ብቻ ነው፣ `filesystem.rrd_files`ን ይተዋል፣ እና በመሳሪያ የተገደበ `filesystem.rrd_stale`ን የሚያካትተው ለ**Doctor ኦፕሬተር** ወይም **Doctor አስተዳዳሪ** ብቻ ነው።

## መስፈርቶች

| Cacti | PHP | ማስታወሻዎች |
|---|---|---|
| 1.2.20 | 5.4 ወይም ከዚያ በላይ | የDoctor የራሱ ኮድ ከPHP 5.4 ጋር ተኳኋኝ ነው፤ ስለዚህ ከማሻሻል በፊት የቆዩ ስርዓቶችን መመርመር ይችላል |
| 1.2.31 | 8.0 ወይም ከዚያ በላይ | የCacti `composer.json` ፋይል `>=8.0` ይጠይቃል |
| አሁን ያለው 1.2.x | 8.2 ወይም ከዚያ በላይ | የCacti `composer.json` ፋይል `>=8.2` ይጠይቃል |
| `develop` (1.3) | 8.3 ወይም ከዚያ በላይ | የCacti `composer.json` ፋይል `^8.3` ይጠይቃል |

**የPHP ተኳኋኝነት ከተጫነው Cacti ጋር** የሚለው ረድፍ እየሰራ ያለውን የPHP እትም በCacti የራሱ root `composer.json` ውስጥ ካለው የPHP መስፈርት ጋር ያወዳድራል፣ ይህም እንደ `^8.3` ያለ የcaret ገደብ የላይኛው ወሰንን ያካትታል። የተዋቀረው የPHP CLI ተፈጻሚ ፋይል ከተመሳሳዩ መስፈርት ጋር ይፈተሻል። Doctor በእነዚህ የCacti ጥቅሎች ጥቅም ላይ የሚውሉትን የ`>=` እና `^` ገደብ ቅጾችን ይለያል። የማይነበብ፣ የተበላሸ፣ የጎደለ ወይም ያልታወቀ መስፈርት ማስጠንቀቂያ ይፈጥራል፤ ማኒፌስት የሌላቸው የCacti 1.2.20–1.2.30 መጫኛዎች የተመዘገበውን የPHP 5.4 መጫኛ ዝቅተኛ ወሰናቸውን ይይዛሉ። የDoctor የራሱ የPHP 5.4 ተኳኋኝነት ከአዲስ የCacti መጫኛ ጋር ተኳኋኝነትን አያረጋግጥም።

**የPHP ዋና ምንጭ የደህንነት ድጋፍ** የሚለው ረድፍ የተለየ ጥያቄን ይመልሳል፦ ያ የPHP ልቀት ቅርንጫፍ አሁንም ከPHP ፕሮጀክት የደህንነት ጥገናዎችን ይቀበላል? የቅርንጫፉን የታተመ የደህንነት-ድጋፍ ማብቂያ ቀን ሪፖርት ያደርጋል እና ከዚያ ቀን በኋላ ያስጠነቅቃል። ለምሳሌ፣ PHP 8.1 ከዋናው ምንጭ የደህንነት ጥገናዎችን ሳይቀበል የቆየ የCacti መጫኛ የስራ ጊዜ መስፈርትን ሊያሟላ ይችላል። የሚያልፍ ውጤት የተጫነው የጥገና ልቀት ወቅታዊ ነው ማለት አይደለም፣ እና Doctor የስርዓተ ክወና አቅራቢ ወደ ኋላ የተመለሱ ጥገናዎችን ማቅረቡን መወሰን አይችልም።

የድጋፍ ቀናት ከ[የPHP ድጋፍ መርሃ ግብር](https://www.php.net/supported-versions.php) እና ከ[የህይወት-ፍጻሜ ዝርዝር](https://www.php.net/eol.php) ከDoctor ጋር ተካተዋል፣ ለመጨረሻ ጊዜ የተፈተሸው በ2026-11-08 ነው። ያልታወቁ ቅርንጫፎች እና ቅድመ-ልቀቶች እንደ ማለፍ ከመገመት ይልቅ ማስጠንቀቂያ ይፈጥራሉ። በምርመራ ወቅት ምንም የአውታረ መረብ ጥያቄ አይደረግም። PHP አዲስ መርሃ ግብር ሲያትም የDoctorን የድጋፍ ውሂብ ያዘምኑ። ነባር የJSON/ክትትል መታወቂያዎች `php.version` እና `php.security_baseline` አልተለወጡም።

## ልማት

የዩኒት ሙከራ ስብስቡ Pestን ይጠቀማል እና ስታቲክ ትንተና PHPStan (ደረጃ 6)ን ይጠቀማል፣ ሁለቱም በPHP 8.2 ወይም ከዚያ በላይ ላይ፦

```console
composer install
composer phpstan
composer test
```

ሙከራዎቹ Doctor የሚጠራቸውን የCacti ተግባራት በ`tests/CactiStubs.php` ውስጥ ባሉ ትናንሽ ተተኪዎች ይተካሉ፣ ስለዚህ ያለ Cacti መጫኛ ይሰራሉ።

GitHub Actions በእያንዳንዱ push እና pull request ላይ አምስት ዓይነት ፍተሻዎችን ያካሂዳል፦

- የልቀት ማሸጊያ ውል ሙከራዎች (`tests/test_release.py`) እና የማህደር ግንባታ (`tools/build_release.py`)።
- `locales/build_gettext.sh --check`፣ ይህም ባረጀ የትርጉም ቅጽ፣ ባልተሟላ ወይም ግልጽ ባልሆነ ካታሎግ፣ ወይም ከምንጩ በሚለይ የተጠናቀረ ካታሎግ ላይ ይወድቃል።
- `php -l` በPHP 5.4፣ 5.6፣ 7.0፣ 7.1፣ 7.4 እና ከ8.0 እስከ 8.4 ስር ባለው እያንዳንዱ የPHP ፋይል ላይ።
- `composer phpstan` (PHPStan ደረጃ 6) እና `composer test` (የPest ዩኒት ሙከራ ስብስብ) በPHP 8.2፣ 8.3 እና 8.4 ላይ።
- Cacti 1.2.20ን፣ አሁን ያለውን 1.2.x ቅርንጫፍ እና `develop`ን ከMySQL እና MariaDB ጋር፣ በሁለቱም cmd.php እና Spine የሚጭኑ ሰባት የውህደት ስራዎች። እያንዳንዱ ስራ ተሰኪውን ይጭናል እና ያነቃል፣ ሙሉውን የCLI ሪፖርት ያስፈጽማል፣ እና የሪፖርቱን እቅድ፣ የማጠቃለያ ድምሮችን፣ የሚጠበቁ ሁኔታዎችን እና ትክክለኛውን የውድቀቶች ስብስብ ይፈትሻል። ከዚያም የባይናሪ ዱካን እና የpoller የጊዜ ማህተምን ያበላሻል፣ ሁለቱም ሪፖርት መደረጋቸውን ያረጋግጣል፣ መልሶ ያስተካክላቸዋል፣ ጥገናውን እና ማረጋገጫውን ይለማመዳል፣ እና ማሰናከልን፣ ማንቃትን፣ ማራገፍን እና እንደገና መጫንን ያከናውናል። አንድ ስራ ሲወድቅ የJSON ሪፖርቱ እንደ አርቲፋክት ይቀመጣል።

## አስተዋጽኦ ማድረግ

የፑል ሪኩዌስቶች ወደ `develop` ይሄዳሉ። የምርት ፋይሎችን ከ PHP 5.4 ጋር ተኳሃኝ አድርገው ያቆዩ እና የ Cacti አጻጻፍ ስልትን ይጠቀሙ፦ ታቦች፣ ነጠላ-ጥቅስ ሕብረቁምፊዎች እና እንደ `read_config_option()` እና `db_fetch_cell()` ያሉ የ Cacti አጋዥ ተግባራት። ለእያንዳንዱ የባህሪ ለውጥ ዩኒት ቴስት ያክሉ፣ ኮሚቶችዎን በፊርማ ያረጋግጡ (`git commit -s`)፣ እና በ `CHANGELOG.md` ላይ አንድ መስመር ያክሉ።

### ትርጉሞች

ለተጠቃሚ የሚታይ እያንዳንዱን መልዕክት በ `__('...', 'doctor')` (ወይም `__n()`፣ `__x()`፣ `__esc()`) ውስጥ ያስገቡ፣ እና እሴት የያዘ ዓረፍተ ነገርን ክፍሎችን ከማያያዝ ይልቅ ተከታታይ `%s`/`%d` ቦታ ያዦች ያሉት አንድ ነጠላ የቅርጸት ሕብረቁምፊ ይስጡት። የ Cacti `__()` መልዕክትን የሚቀርጸው የቅርጸት ገላጭ ሲይዝ ብቻ ነው፣ እንዲሁም የቦታ `%1$s` ቅጾችን አይደግፍም። በተጨማሪም ከመቅረጹ በፊት `%%` ወደ `%` ይለውጣል፣ ስለዚህ በመልዕክት ውስጥ ቀጥተኛ የመቶኛ ምልክት በፍጹም አያስቀምጡ፦ እሴቱን ከምልክቱ ጋር እንደ መከራከሪያ ያስተላልፉ (`__('Usage: %s', '50%', 'doctor')`)። የሎግ መስመሮች በእንግሊዝኛ ይቆያሉ፦ ለጥገና ጽሑፍ `doctor_repair_message()` እና ተመዝግበው በሚታዩበት ቦታ ብቻ ለሚተረጎሙ መልዕክቶች `doctor_n_()` ይጠቀሙ። የፍተሻ መለያዎችን፣ የ JSON ቁልፎችን፣ የሁኔታ ቁልፍ ቃላትን፣ የክትትል ውጤትን እና የሎግ መስመሮችን ሳይተረጉሙ ያቆዩ።

`locales/build_gettext.sh` አብነቱን `locales/po/cacti.pot` እንደገና ያመነጫል፣ ወደ እያንዳንዱ ካታሎግ `locales/po/<locale>.po` ያዋህደዋል፣ እና `locales/LC_MESSAGES/<locale>.mo` ያጠናቅራል፤ ሦስቱንም ኮሚት ያድርጉ። CI `sh locales/build_gettext.sh --check` ያስኬዳል፣ ይህም አብነቱ ሲያረጅ ወይም ካታሎግ አንድ ግቤት ሲያጣ ወይም ግልጽ ያልሆነ ግቤት ሲኖረው፣ ቦታ ያዥ ሲለያይ ወይም የተጠናቀረ ፋይል ጊዜው ሲያልፍበት ይወድቃል። ስለዚህ የተቀየረ መልዕክት በተመሳሳይ ፑል ሪኩዌስት ውስጥ ትርጉሞቹ መዘመን አለባቸው። GNU gettext (`xgettext`፣ `msgmerge`፣ `msgfmt`፣ `msgunfmt`) ያስፈልገዋል። አዲስ ቋንቋ Cacti የቋንቋ አካባቢዎቹን በሚሰይምበት መንገድ የተሰየመ አዲስ `<locale>.po` ነው (ለምሳሌ `pt-BR`)።

## ደህንነት

ተጋላጭነቶችን በይፋዊ ጉዳዮች ውስጥ ሳይሆን በ [SECURITY.md](../../../SECURITY.md) ውስጥ በተገለጸው መሠረት በግል ሪፖርት ያድርጉ።

## ፈቃድ

የቅጂ መብት (C) 2026 Thomas Vincent። በ GNU General Public License፣ ስሪት 2 ወይም ከዚያ በኋላ ሥር ተለቋል። [LICENSE](../../../LICENSE) ይመልከቱ።
