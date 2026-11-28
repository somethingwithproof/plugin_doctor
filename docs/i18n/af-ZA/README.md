<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: 'n kaktus wat 'n stetoskoop dra. Diagnoseer. Herstel. Monitor.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Gehaltehekkestatus"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lisensie: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ en 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor is 'n Cacti-inpropmodule wat 'n installasie in een deurloop diagnoseer en klein herstelwerk slegs toepas wanneer 'n administrateur daarvoor vra.

**Status: in ontwikkeling, voor 1.0.** Die nuutste vrystelling is [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Hierdie regstelling voeg Hindi- en Arabiese katalogusse en vertaalde gebruikersgidse by die rolbeperkte toegang, begeleide diagnose, omvangbeperkte RRD-varsheidskontroles, herstelvoorskoue en ouditgeskiedenis, aanvaarde waarskuwingsuitsonderings en vertalings in 0.6.0. Sien [CHANGELOG.md](../../../CHANGELOG.md) vir besonderhede.

## Skermkiekies

Diagnostiek en skeduleringsinstellings in 'n geïsoleerde Cacti 1.2.31-demonstrasie-installasie
wat PHP 8.3.36 gebruik, insluitend die Cacti PHP-versoenbaarheid-, stroomop-sekuriteitsondersteuning-
en databasisgesondheidskontroles. Waarskuwings en mislukkings wat hier gewys word,
beskryf daardie demo-omgewing.

![Doctor-diagnostiektabel met geslaagde, waarskuwings- en mislukte resultate](../../screenshots/diagnostics.png)

![Doctor-skedulerings-, waarskuwings- en drumpelinstellings](../../screenshots/settings.png)

Cacti-probleme kom gewoonlik as simptome na vore: leë grafieke, 'n peiler wat gestop het, of 'n inpropmodule wat nie wil installeer nie. Die oorsaak is dikwels 'n voorvereiste wat afgedwaal het, soos 'n ontbrekende PHP-uitbreiding in die CLI-bouwerk, 'n loggids waarna die peiler nie kan skryf nie, 'n RRDtool-pad wat na die verkeerde binêre lêer wys, of 'n databasis sonder tydsonetabelle. Doctor kontroleer daardie voorvereistes direk en rapporteer elkeen as geslaag, waarskuwing of misluk met 'n sin wat verduidelik wat dit gevind het. Dieselfde verslag is beskikbaar op 'n webblad, op die opdragreël en as JSON vir monitering.

## Wat dit kontroleer

| Gebied | Kontroles |
|---|---|
| Doctor | Of Doctor self as root loop, wat sou veroorsaak dat toestemmingskontroles die verkeerde rekening beskryf |
| Cacti en PHP | Cacti-weergawe, 'n opgradering wat die installeerder nooit voltooi het nie, geaktiveerde inpropmodules waarvan die lêers ontbreek, PHP-versoenbaarheid met die geïnstalleerde Cacti-pakket, PHP stroomop-sekuriteitsondersteuningstatus |
| PHP-uitbreidings | Vereiste uitbreidings in die web-PHP en in die CLI-PHP wat die peiler gebruik, plus aanbevole funksies |
| PHP-konfigurasie | `memory_limit`, `max_execution_time` en `date.timezone`, deur Cacti se eie aanbevelings te gebruik |
| Databasis | Konnektiwiteit, bedienerweergawe teenoor Cacti se aanbeveling, UTF-8-karakterstel, tydsonetabelle, kerntabelle, tydsverskil vanaf die PHP-gasheer, en die InnoDB-instellings wat Cacti as foute merk |
| Databasisgesondheid | Verbindingskapasiteit, bufferpoel-lesings, skyftydelike tabelle, verbindingdraadskepping, stadige stellings en InnoDB-logbufferwagtye, met werkladingafhanklike instellingsvoorstelle |
| Lêerstelsel | Skryfbare kas-, log- en RRA-gidse; vrye spasie vir RRD-lêers; aktiewe databronne sonder 'n RRD-lêer of agterstallige lêerbywerkings; `include/config.php` nie wêreldleesbaar nie; Cacti-log skryfbaar en nie te groot nie |
| Binêre lêers | PHP CLI, RRDtool, `snmpget`, `snmpwalk` en Spine wanneer dit die gekonfigureerde peiler is, insluitend weergawes waar Cacti een spesifiseer |
| Log | Foute onder die mees onlangse Cacti-logreëls, met die mees gereelde boodskap |
| Toestelle | Geaktiveerde toestelle wat af is of herstel, die drie wat die langste af is met hul laaste fout, en 'n mislukking wanneer die meeste toestelle gelyktydig af is |
| Peiler | Peilertipe en -interval, tyd sedert die hoofpeiler laas voltooi het, looptyd teenoor die interval, peiler-uitvoer wat nooit 'n RRD-lêer bereik het nie, afgeleë peilers wat opgehou rapporteer het, 'n vasgevalde Boost en 'n Spine-konfigurasie wat na 'n ander databasis wys |

Elke kontrole het 'n stabiele ID, soos `database.timezone` of `binary.rrdtool`, sodat skripte op individuele resultate kan sleutel. Geaktiveerde inpropmodules kan bykomende kontroles en ondersteuningsbundel-aanhangsels bydra deur die `doctor_register_checks`-haak, en Doctor stel leesalleen diagnostiese vermoëns aan `plugin_mcp` bloot deur `abilities_register`.

## Kode- en toetskaart

| Gedrag | Implementering | Toetsbewyse in hierdie bewaarplek |
|---|---|---|
| Diagnostiese kontroles en stabiele verslag-ID's | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Inpropkontrole-haak (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| MCP-diagnostiese vermoëns (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Rolbeperkte toegang en geredigeerde webverslae | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Begeleide simptoomondersoeke | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD-varsheid en hantering van uitgestelde skryfbewerkings | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Herstelvoorskoue, ouditgeskiedenis en aanvaarde waarskuwings | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Geskeduleerde kontroles en waarskuwingsoorgange | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Hierdie verwysings identifiseer die implementering en toetsdekking; dit sê nie
dat elke CI-taak vir die huidige hersiening geslaag het nie. Gaan die werkvloeilopie
na vir die hersiening wat jy beplan om te ontplooi.

## Databasisgesondheidsadvies

Doctor se eie PHP-ontleder lees 'n vaste stel globale MySQL- of MariaDB-tellers deur Cacti se bestaande databasisverbinding. Dit voer twee leesalleen-navrae per verslag uit, vereis geen ekstra geloofsbriewe of uitvoerbare lêer nie, en verander nooit databasis-konfigurasie nie. Hierdie kontroles verskyn in die webverslag, CLI, JSON, moniteringsuitvoer, ondersteuningsbundel en geskeduleerde statusnasporing.

| Kontrole-ID | Ondersoeksneller |
|---|---|
| `database.health_sample` | Minder as 24 uur sedert opstart of `FLUSH STATUS`, of onbeskikbare/inkonsekwente looptyd |
| `database.connection_capacity` | Huidige of aangetekende piekverbindings ten minste 80% van die huidige `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` ten minste 1%, met ten minste 10,000 leesversoeke |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` ten minste 25%, met ten minste 1,000 tydelike tabelle |
| `database.thread_cache` | `Threads_created / Connections` ten minste 5%, met ten minste 1,000 verbindingspogings en `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` ten minste 1%, met ten minste 1,000 stellings |
| `database.redo_log_waits` | Nie-nul `Innodb_log_waits` |

Hierdie is Doctor se ondersoekdrumpels, nie verskafferkonfigurasieteikens nie. Behalwe vir verbindingskapasiteit, vereis kumulatiewe advies die waarnemingsvenster hierbo. Ontbrekende, wanvormde, duplikaat- of oorgroot tellers, onvoldoende aktiwiteit en onondersteunde draadmodusse lewer waarskuwings op in plaas van 'n gesonde uitspraak of 'n instellingsaanbeveling. Waarskuwings kan Nagios-status en geskeduleerde waarskuwings beïnvloed wanneer **Waarsku oor waarskuwings** geaktiveer is.

Lees die gemete tellers en voorstel saam. Kumulatiewe waardes bewys nie die huidige las nie; tellers kan verskillende terugstelgeskiedenisse hê en is nie 'n atomiese momentopname nie. Piekverbindings kan 'n ouer limiet weerspieël. Stadige-navraagtellings hang af van `long_query_time`, en MySQL se teller vir tydelike skyftabelle kan geheue-gekoppelde lêers uitlaat. 'n Lae verhouding bewys nie die afwesigheid van 'n knelpunt nie. Bevestig tendense onder 'n verteenwoordigende werklading, hersien navraagplanne en verbindingshergebruik, en meet geheue op die **databasisgasheer** voordat buffers of verbindingslimiete verander word.

As metrieke onbeskikbaar is, kontroleer bedienerondersteuning en die Cacti-rekening se toegang tot `SHOW GLOBAL STATUS` en `SHOW GLOBAL VARIABLES`; Doctor versoek nie verhoogde geloofsbriewe nie. Tellerdefinisies kom uit die [MySQL-statusveranderlike-verwysing](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) en [MariaDB-statusveranderlike-verwysing](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Geen MySQLTuner-skrip of -kode word gebruik nie.

Geen skema- of konfigurasiemigrasie is nodig nie. Ontplooi die inpropmodulelêers normaalweg; die terugrol van daardie lêers verwyder die bygevoegde diagnostiek. Bestaande geskeduleerde status word tydens die volgende lopie verfris.

## Hoe dit veilig bly

'n Diagnostiese hulpmiddel loop met die peiler of webbediener se voorregte en lees paaie uit die instellingstabel, dus moet dit versigtig wees oor wat dit uitvoer en wysig.

- Diagnostiek is leesalleen. Dit verander nooit lêers, instellings of data nie.
- Doctor voer slegs 'n gekonfigureerde binêre lêer uit wanneer sy lêernaam ooreenstem met die verwagte program (`php`, `rrdtool`, `snmpget`, of `snmpwalk`). Enigiemand wat na die instellingstabel kan skryf, sou andersins kon kies wat Doctor uitvoer. Enige ander naam word as 'n waarskuwing aangemeld en word nie uitgevoer nie.
- Doctor voer nooit gekonfigureerde binêre lêers as root uit nie, en dit meld aan wanneer dit as root loop.
- Herstelaksies kom uit 'n vaste toelaatlys. Elkeen vereis 'n geverifieerde administrateuraksie in die webkoppelvlak of `--yes` op die opdraglyn, en elkeen word in die Cacti-logboek aangeteken.

## Vrystellings

Weergawes volg SemVer en stem ooreen met die inprop se `INFO`-lêer. Sien die
[vrystellingsproses](../../releasing.md) vir weergawekeuse, CI-hekke, pakketinhoud,
kontrolesomme en terugrolinstruksies.

## Installasie

Laai `doctor-VERSION.tar.gz` of `doctor-VERSION.zip` en `SHA256SUMS` af vanaf
[GitHub-vrystellings](https://github.com/somethingwithproof/plugin_doctor/releases).
Verifieer die argief se SHA-256-kontrolesom en pak dan sy `doctor/`-gids uit in
Cacti se `plugins/`-gids. Dit is die installeerbare pakkette; GitHub se
outomatiese bronargiewe het 'n ander gidsnaam. Om onvrygestelde werk vanaf
`develop` te laat loop, installeer vanuit 'n bronkodekopie.

Vir bronkodekopieë:

Kloon of pak die bewaarplek uit as `plugins/doctor` binne 'n Cacti-installasie. Die gids moet `doctor` genoem word, nie `plugin_doctor` nie.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Installeer en aktiveer **Cacti Doctor** vanuit **Konfigurasie > Inpropbestuur**, en ken dan 'n **Doctor-kyker**-, **Doctor-operateur**- of **Doctor-administrateur**-toegangsgebied toe via Cacti-gebruiker- of groepermissies. Bestaande **Cacti Doctor**-toekennings behou Administrateurtoegang ná opgradering. Die verslag verskyn onder **Hulpmiddels > Cacti Doctor**.

## Tale

Doctor word verskeep met 48 nie-Engelse vertaalkatalogusse onder `locales/po/` en `locales/LC_MESSAGES/` wat lokale vir Breë Vlak 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Asië (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) en Suidoos-Europa (`bs-BA`, `hr-HR`, `sr-RS`) dek. Cacti wys 'n katalogus sodra taalondersteuning aangeskakel is (**Konfigurasie > Instellings > Algemeen > Taalondersteuning**) en 'n gebruiker 'n lokaal kies wat Cacti in sy taalkieser beskikbaar stel; katalogusse vir lokale wat nog nie in Cacti se kieser gelys word nie, tree in werking sodra Cacti dit byvoeg. Die webblad, die instellings, en die boodskappe en verslagteks wat die opdraglyn druk, volg Cacti se taal; die opdraglynverslag self gebruik Cacti se verstektaal, wat Engels bly tensy jy dit verander.

Masjienleesbare afvoer word nooit vertaal nie: toets-ID's, JSON-sleutels en statuswaardes, die `--format=nagios`- en `--format=prometheus`-afvoer, logboeklyne en die ondersteuningsbundel se afdelingsopskrifte bly in Engels sodat skrifte en monitering in elke taal bly werk. Die `summary`- en `detail`-teks van elke toets is die enigste vertaalde deel van die JSON-verslag.

'n Latyns-Amerikaanse Spaanse katalogus (`es-419`) word ook verskeep, maar nóg Cacti 1.2 nóg Cacti 1.3 het 'n Latyns-Amerikaanse Spaanse lokaliteit om te kies, so dit tree eers in werking wanneer Cacti een byvoeg. Tot dan, kies Spaans (`es-ES`).

Cacti laai 'n inprop se katalogus vanaf `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` met `doctor` as die teksdomein, op sowel 1.2.x as 1.3 (1.3 los die inpropgids op deur sy konfigureerbare inproppad).

## Toegangsvlakke

| Toegangsgebied | Vermoëns |
|---|---|
| Doctor-kyker | Lees die jongste geskeduleerde toetsstatusse, waarnemingstyd, varsheid en onlangse saamgevatte geskiedenis. Geen diagnostiese opdragte, rou besonderhede, konfigurasie of herstelaksies nie. |
| Doctor-operateur | Voer 'n diagnostiese verslag uit met 'n 120-sekonde-proseslimiet, inspekteer geredigeerde besonderhede en erken bevindinge. Geen instellingsveranderings of herstelaksies nie. |
| Doctor-administrateur | Operateurvermoëns plus die bestaande toelaatlys-herstelaksies en Doctor-instellings. Herstelaksies en instellings vereis ook Cacti se Instellings/Stelselhulpmiddels-toegangsgebied. |

Die Hulpmiddels-kieslys maak die blad oop vir die hoogste Doctor-toegangsgebied wat aan die gebruiker toegestaan is, insluitend groeptoenkennings. Nuwe Kyker- en Operateur-toegangsgebiede ontvang geen outomatiese toekennings nie. Die oorspronklike toegangsgebied-ID bly aan `doctor.php` gekoppel as Administrateur, wat bestaande gebruiker- en groeptoegang behou.

Kykerdata kom van geskeduleerde toetse. Aktiveer skedulering voordat Kyker-toegang toegestaan word; ontbrekende of agterstallige waarnemings wys **onbekend**, nooit gesond nie. Geskiedenis behou die laaste 20 geskeduleerde saamgevatte tellings en sluit toestelstatus uit. Operateurs begin vars diagnostiek eksplisiet; gewone bladsyverfrissings gebruik hul sessie se laaste verslag.

Toestelbesonderhede en totale gebruik die huidige gebruiker se toestelpermissies. Logboekuittreksels vereis bykomend Cacti se Logboekadministrasie-toegangsgebied. Geheime word gemaskeer voordat diagnostiese besonderhede in die websessie gestoor of vertoon word. Opdraglyntoegang word steeds deur die bedryfstelselrekening beheer.

Erkennings is persoonlik en word in die Cacti-logboek aangeteken. Dit geld slegs vir dieselfde bevinding en bewyse; veranderde bewyse vereis 'n nuwe erkenning. Dit verander nooit slaag-/waarskuwing-/mislukstatus nie, onderdruk nie waarskuwings nie en merk nie 'n mislukte toets as gesond nie. Dit staan apart van aanvaarde-waarskuwing-uitsonderings, wat waarskuwingsbeleid raak sonder om die waargenome status te verander en hieronder beskryf word.

Elke aksie vereis POST en 'n geldige CSRF-teken. Herstelaksies bied 'n afsonderlike bevestigingsbladsy met 'n nie-indienende Kanselleer-skakel, en teken die handelende gebruiker en resultaat in die Cacti-logboek aan.

## Opdraglyn

Voer dit vanaf die Cacti-wortelgids uit as die Cacti-peilergebruiker, nie root nie:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Teksafvoer druk een reël per toets met sy status, kategorie, opsomming en besonderhede. `--json` druk 'n `summary`-objek met statustellings en 'n `checks`-skikking waarvan die inskrywings `id`, `category`, `status`, `summary`, `detail` en `repair`/`repairable` bevat wanneer 'n toelaatlys-herstelaksie van toepassing is.

| Uitgangstatus | Betekenis |
|---|---|
| `0` | Geen toets het misluk nie, of die aangevraagde herstelaksie het geslaag. Waarskuwings verander nie die uitgangstatus nie. |
| `1` | Minstens een toets het misluk, of 'n aangevraagde herstelaksie het nie geslaag nie. |
| `2` | Gebruiksfout: 'n herstelaksie wat sonder `--yes` uitgevoer is (`--preview` benodig dit nie), 'n onbekende herstel-ID, 'n onbekende afvoerformaat, 'n nie-ondersteunde `--symptom`- of formaatkombinasie, of 'n Cacti-installasie wat nie opgespoor kan word nie. |

Cacti verhoog `memory_limit` vir elke opdraglynskrif, so die PHP-looptydkonfigurasietoets is slegs betekenisvol op die webblad.

## Geskeduleerde toetse en waarskuwings

Onder **Konfigurasie > Instellings > Doctor**, skakel **Voer toetse volgens 'n skedule uit** aan en kies 'n interval van 15 minute tot een dag. Ná elke peilersiklus wat verval het, voer Doctor elke toets in 'n agtergrondproses uit, sodat die peiler se eie looptyd onaangeraak bly.

Elke lopie teken elke toets se waargenome status aan. Aktiewe waarskuwingsuitsonderings raak waarskuwingsbeleid sonder om daardie waarneming te verander. Wanneer 'n toets begin of ophou misluk, skryf Doctor die verandering na die Cacti-logboek en, indien **Waarskuwings-e-posadresse** gestel is, e-pos daardie adresse deur Cacti se posinstellings. **Waarsku oor waarskuwings** voeg veranderinge in en uit waarskuwings by. Die eerste lopie teken slegs 'n basislyn aan.

Geskeduleerde verslae loop op die primêre peiler onder 'n databasis-adviesgrendel en het 'n werkerlimiet van twee minute. Doctor meld die laaste begin en suksesvolle voltooiing aan sodat ontbrekende of verouderde resultate sigbaar is. Resultate tel as aktueel vir die interval plus een peilsiklus en drie minute. 'n Lopie wat nie voltooi nie, word weer probeer ná 5, 10, 20 en meer minute, tot by die normale interval. Mislukte waarskuwingsaflewering word behou vir tot drie herpogings met toenemende vertragings; daarna moet Cacti se posinstellings reggestel word en `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` as die peilergebruiker uitgevoer word. Aanvaarding deur die posbediener bevestig nie inkassie-aflewering nie.

Dieselfde oortjie stel die drempelwaardes vir peilerlooptyd (80% van die interval), vrye RRA-skyfspasie (waarsku onder 10%, misluk onder 2%), databasis-klokafwyking (waarsku bo 5 sekondes, misluk bo 60), en Cacti-logboekgrootte (100 MB). Leë of ongeldige waardes val terug na hierdie verstekwaardes.

## Moniteringsintegrasie

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` druk een statusreël met werkverrigtingsdata en sluit af met `0` (OK), `1` (WARNING) of `2` (CRITICAL), sodat Nagios, Icinga of enige versoenbare stelsel dit direk kan uitvoer. `--format=prometheus` skryf die Prometheus-teksformaat vir node_exporter se tekslêer-versamelaar: `cacti_doctor_check_status` per toets (0 geslaag of aanvaarde waarskuwing, 1 hanteerbare waarskuwing, 2 mislukking), `cacti_doctor_check_observed_status` voor uitsonderings, `cacti_doctor_check_accepted`, `cacti_doctor_checks` per status en `cacti_doctor_last_run_timestamp_seconds`. JSON-toetsrye sluit 'n `assessment`-veld in; `not_assessed` beteken dat die toets nie 'n gevolgtrekking uit die beskikbare data kon maak nie.

## Ondersteuningsbundel

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Die bundel is 'n enkele tekslêer met die Doctor-, Cacti-, PHP-, bedryfstelsel- en databasisweergawes, peiler- en Boost-statistieke, die volledige verslag, enige inprop-ondersteuningsbundel-aanhangsels onder `== Plugin attachments`, en die laaste 200 reëls van die Cacti-logboek. Waardes wat op wagwoord-, geheim-, teken-, gemeenskap- en sleutelname volg, word gemaskeer. Doctor skep die lêer sodat dit slegs deur sy eienaar gelees kan word en weier om 'n bestaande lêer oor te skryf. Gaan dit na voordat jy dit êrens plaas.

## Herstelbeleid

Doctor sluit een herstelaksie in, `runtime_directories`. Dit skep ontbrekende Cacti-looptydgidse en voeg lees-, skryf- en uitvoerbisse vir die eienaar by sonder om bestaande toestemmings te verwyder.

Dit teiken `$cache_path`, `$log_path` en `$rra_path` op Cacti 1.3, of andersins die installasie se `cache`-, `log`- en `rra`-gidse. Dit slaan gidse oor wat reeds skryfbaar is, weier gidse buite die Cacti-installasie (soos 'n loggids onder `/var/log`), weier simboliese skakels en weier om as root te loop. Dit volg nooit `path_cactilog` nie, dus kan 'n loglêer wat binne 'n kodegids gekonfigureer is nie die herstelaksie daarheen herlei nie. Die diagnostiek kontroleer steeds die gekonfigureerde loglêer se gids op elke weergawe.

Dit verander nie eienaarskap, voer nie dopopdragte uit nie, herskryf nie konfigurasie nie en wysig nie Cacti-toepassingsdata nie. Nuwe herstelaksies moet elkeen 'n diagnostiek, 'n toegelatelys-hanteerder, bevestiging, ouditlogboeking en toetse insluit.

## Ondersoek van simptome

Operateurs en Administrateurs kan **Ondersoek 'n simptoom** op die Doctor-bladsy kies. Dieselfde reëls is beskikbaar deur `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` of `alerts_missing`, met teks- of JSON-afvoer. Ondersteuningsbundels sluit relevante simptoomondersoeke in.

Elke kandidaat lys die waargenome kontroles en 'n volgende verifikasiestap. Kandidate is hipoteses, nie bevestigde grondoorsake nie. Ontbrekende, onbeoordeelde of verouderde waarnemings bewys nooit 'n oorsaak nie. Webondersoeke gebruik die toestemming-gefilterde verslag; CLI-verslae gebruik die bedryfstelselrekening se toegang.

## Varsheid van RRD-bywerkings

`filesystem.rrd_stale` kontroleer tot 500 aktiewe databronne, uitgesluit gedeaktiveerde en af-toestelle. Op groter installasies verander die steekproef elke uur, sodat herhaalde lopies verskillende lêers dek. Dit vergelyk lêerwysigingstye met die grootste van die poller-interval, bron-RRD-stap en profielstap, vermenigvuldig met **Verouderde RRD-intervalle** (verstek 3). Dit wys die drie oudste verouderde lêers en die aantal geraakte toestelle. Webresultate sluit slegs toegelate toestelle in.

`filesystem.rrd_files` is 'n afsonderlike bestaanskontrole. Dit soek na die RRD-lêer van tot 5 000 aktiewe databronne, insluitend dié op gedeaktiveerde of af-toestelle, en gebruik dieselfde uurlikse steekproef.

Boost voeg twee keer sy gekonfigureerde spoelinterval as 'n skyfskryftoelaag by. Vir 'n ander uitgestelde skrywer, konfigureer **Uitgestelde RRD-skryftoelaag (sekondes)**. 'n Geadverteerde `RRDCACHED_ADDRESS` sonder 'n toelaag, of 'n ongeldige Boost-interval, lewer 'n onbeoordeelde resultaat op. Doctor spoel nooit 'n kas om hierdie kontrole uit te voer nie. Wysigingstyd is bewys van skyfaktiwiteit, nie bewys van suksesvolle data-insameling nie. Eksterne kasgeheue wat Doctor nie kan opspoor nie, moet eksplisiet gekonfigureer word.

Ontbrekende, onleesbare en toekomstig gedateerde lêers word in die detail getel. Die resultaat is slegs onbeoordeel wanneer geen lêer in die steekproef leesbaar is nie. 'n Steekproefresultaat dui aan dat dit slegs 'n deel van die installasie dek; 'n slaaguitslag dek nie lêers buite die steekproef nie.

## Herstelvoorskoue en ouditgeskiedenis

Die Administrateur-herstelbladsy wys elke geraakte pad, sy voorgestelde aksie, huidige toestemmings en teikentoestemmings. Goedkeuring is gekoppel aan daardie voorskou, die handelende gebruiker en 'n leeftyd van vyf minute. Bevestiging verbruik die voorskou; 'n veranderde lêerstelsel vereis nog 'n voorskou. Root-uitvoering, paaie buite die installasie, skakels wat herstel vereis en onbevredigde lêerstelseltoestemmings verhoed goedkeuring.

`--repair=runtime_directories --preview` druk 'n leesalleen JSON-plan. `--repair=runtime_directories --yes` keur 'n vars berekende CLI-plan goed en kontroleer dit weer voor uitvoering. Die CLI-rekening moet reeds gemagtig wees om die installasie te herstel; dit erf nie webrolle nie.

'n Gestruktureerde `repair.started`-rekord moet gestoor word voor enige lêerstelselverandering. 'n Gekoppelde `repair.completed`-rekord bevat die naherstel-momentopname en verifikasieresultaat. 'n Onderbroke bewerking laat 'n beginrekord agter vir ondersoek. 'n Mislukking van die voltooiingsoudit word as 'n mislukking gerapporteer selfs al het lêerstelselveranderings plaasgevind. Doctor voeg eienaartoestemmings by en skep gidse; dit poog nie outomatiese terugrol nie.

Administrateurs met Cacti se Settings/System Utilities-toestemming kan die jongste 20 ouditinskrywings op die Doctor-bladsy lees. Die inprop behou die jongste 200 rekords in `plugin_doctor_audit`; die Cacti-logboek teken ook hul ID's, aksies en akteurs aan. Ouditdata word geredigeer.

## Aanvaarde waarskuwings

Administrateurs met Cacti se Settings/System Utilities-toestemming kan 'n **Waarskuwingsuitsondering** skep vanaf 'n vars, beoordeelde waarskuwing op die Doctor-bladsy. 'n Uitsondering vereis 'n eienaar, 'n rede en 'n UTC-hersieningsdatum binne 90 dae. Dit verval om middernag UTC aan die begin van daardie datum. Tot 100 uitsonderings kan gekonfigureer word. Die lys vertoon vervalle inskrywings en ID's wat nie in die huidige verslag teenwoordig is nie, en laat verwydering toe.

Die waargenome waarskuwing bly sigbaar, met sy eienaar, rede en vervaldatum in die diagnostiese besonderhede. JSON behou die waargenome status en voeg `accepted`- en `acceptance`-metadata by. Nagios sluit aktiewe aanvaarde waarskuwings uit sy uitgangserns uit, maar noem hulle in sy afvoer. Prometheus voer beide waargenome en hanteerbare erns uit. Gewone CLI-uitgangstatus bly onveranderd: waarskuwings sluit reeds met nul af, mislukkings met een.

Geskeduleerde waarskuwingsalarms word onderdruk terwyl die uitsondering geld; verval of verwydering maak 'n voortdurende waarskuwing weer in aanmerking vir waarskuwingsalarms. Mislukkingsoorgange en herstel van mislukking bly in aanmerking vir alarms. 'n Onbeoordeelde resultaat of mislukking kan nie aanvaar word nie. Persoonlike erkenning is afsonderlik en onderdruk niks nie. Skepping en verwydering van uitsonderings is transaksioneel met die ouditrekord.

Opgradering skep `plugin_doctor_audit` en `plugin_doctor_acceptance` sonder om Cacti-toepassingsdata te verander. Voer enige geskiedenis uit wat u benodig voordat u deïnstalleer: deïnstallasie verwyder beide inproptabelle en sy instellings. Die terugrol van die inproplêers laat die tabelle beskikbaar vir ondersoek, maar ouer weergawes respekteer nie waarskuwingsuitsonderings nie.

## Inpropkontroles (`doctor_register_checks`)

Geaktiveerde Cacti-inpropmodules kan leesalleen diagnostiese kontroles en opsionele ondersteuningsbundel-aanhangsels bydra deur 'n `doctor_register_checks`-haak te registreer:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor roep geaktiveerde, nie-geïntegreerde inpropmodules op wat op `doctor_register_checks` geregistreer is (en slaan `doctor` en `cacti` oor), deur die haaklêer streng binne die inpropmodule se eie gids op te los. Die terugroepfunksie ontvang `['mode' => 'run' | 'list', 'plugin' => '<slug>']` en gee óf 'n lys kontrolebeskrywings óf 'n omhulsel met `checks` en opsionele `attachments` terug:

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

Elke inpropkontrolebeskrywing word gevalideer voordat dit ingesluit word:

- Vereiste sleutels: `id`, `plugin`, `category`, `title`, `status`, `message`, `details` en `remediation`.
- `plugin` moet ooreenstem met die geregistreerde inprop-slug (`[a-z0-9_]{1,64}`). `id` moet ooreenstem met `[a-z0-9_.]{1,128}`, begin met `<plugin>.`, en nie bots met 'n bestaande kern- of inpropkontrole-ID nie.
- `status` moet `ok`, `warn`, `fail` of `info` wees. `ok` word afgebeeld na `pass` in Doctor-verslae; `info` is inligtinggewend en veroorsaak nie mislukkings in CLI, Nagios, Prometheus of geskeduleerde waarskuwings nie.
- `category` (tot 64 grepe) en `title` (tot 256 grepe) moet nie-leë stringe sonder kontrolekarakters wees. `message` (nie-leeg, tot 2048 grepe) en `remediation` (tot 2048 grepe) moet stringe wees.
- `details` aanvaar 'n string (tot 8192 grepe) of 'n skalaar-/geneste skikking (maksimum diepte 4, JSON-gekodeer tot 16384 grepe; objekte en hulpbronne word verwerp).
- Opsionele ondersteuningsbundel-aanhangsels vereis 'n nie-leë `title` (tot 128 grepe, geen kontrolekarakters) en 'n `content`-string tot 65536 grepe (64 KiB).

Doctor dwing limiete van 32 kontroles en 8 aanhangsels per inpropmodule af (64 inpropkontroles en 32 aanhangsels in totaal). Elke haak voer binne sy eie `try`/`catch`-grens uit sodat uitsonderings of nie-skikking-ladings geredigeer en na die Cacti-logboek (`DOCTOR`-fasiliteit) gelog word sonder om kernkontroles of ander inpropmodules te raak. Wanvormde beskrywings word verwerp en gelog terwyl geldige beskrywings van dieselfde inpropmodule steeds loop. Inpropkontroles is altyd leesalleen (`repairable: false`), en stringwaardes plus sensitiewe assosiatiewe sleutels word geredigeer voordat dit vertoon, uitgevoer of gebundel word. Gevalideerde inpropkontroles verskyn in die webkoppelvlak, CLI-teks-/JSON-/Nagios-/Prometheus-afvoer, geskeduleerde statusnasporing en ondersteuningsbundels.

## MCP-integrasie (`abilities_register`)

Doctor registreer die `abilities_register`-haak (`doctor_abilities_register` in `doctor_abilities.php`) sodat `plugin_mcp` sy diagnostiese vermoëns ontdek wanneer albei inpropmodules geaktiveer is. Doctor registreer die `diagnostics`-kategorie (`Diagnostics`) en twee leesalleen, nie-vernietigende, idempotente vermoëns:

| Vermoë-ID | Opsionele argumente | Afvoer |
|---|---|---|
| `doctor-run-checks` | `category` (string, maks 64 karakters), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) en tot 256 geredigeerde `findings` (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (string, maks 64 karakters), `plugin` (string, maks 64 karakters) | Tot 256 `checks` (`id`, `plugin`, `category`, `title`) wat al 45 ingeboude kontroles plus geaktiveerde inpropkontroles dek |

Beide vermoëns is streng leesalleen en voer nooit herstelaksies uit nie. Benewens `plugin_mcp` se eie toegangsgebied- en vermoë-blootstellingskontroles (inpropvermoëns begin versteek in MCP totdat 'n administrateur hulle blootstel), vereis Doctor dat die tekeneienaar **Doctor-kyker** of 'n hoër Doctor-toegangsgebied hou. `doctor-run-checks` beperk `devices.health` tot die tekeneienaar se toegelate toestelle, sluit `logging.recent_errors` slegs in wanneer die gebruiker Cacti-toegangsgebied 18 of 19 hou, laat `filesystem.rrd_files` weg, en sluit toestel-beperkte `filesystem.rrd_stale` slegs vir **Doctor-operateur** of **Doctor-administrateur** in.

## Vereistes

| Cacti | PHP | Notas |
|---|---|---|
| 1.2.20 | 5.4 of nuwer | Doctor se eie kode is versoenbaar met PHP 5.4 sodat dit nalatenskapstelsels voor 'n opgradering kan diagnoseer |
| 1.2.31 | 8.0 of nuwer | Cacti se `composer.json` vereis `>=8.0` |
| Huidige 1.2.x | 8.2 of nuwer | Cacti se `composer.json` vereis `>=8.2` |
| `develop` (1.3) | 8.3 of nuwer | Cacti se `composer.json` vereis `^8.3` |

Die ry **PHP-versoenbaarheid met geïnstalleerde Cacti** vergelyk die lopende PHP-weergawe met die PHP-vereiste in Cacti se eie wortel-`composer.json`, insluitend die boonste grens van 'n kappiebeperking soos `^8.3`. Die gekonfigureerde uitvoerbare PHP CLI-lêer word teen dieselfde vereiste gekontroleer. Doctor herken die `>=`- en `^`-beperkingsvorms wat deur hierdie Cacti-pakkette gebruik word. 'n Onleesbare, misvormde, ontbrekende of onherkende vereiste lewer 'n waarskuwing op; Cacti 1.2.20–1.2.30-installasies sonder 'n manifes behou hul gedokumenteerde PHP 5.4-installeerderminimum. Doctor se eie PHP 5.4-versoenbaarheid bewys nie versoenbaarheid met 'n nuwer Cacti-installasie nie.

Die ry **PHP stroomop-sekuriteitsondersteuning** beantwoord 'n afsonderlike vraag: ontvang daardie PHP-vrystellingstak steeds sekuriteitsregstellings van die PHP-projek? Dit rapporteer die tak se gepubliseerde einddatum vir sekuriteitsondersteuning en waarsku ná daardie datum. PHP 8.1 kan byvoorbeeld aan 'n ouer Cacti-installasie se looptydvereiste voldoen terwyl dit nie meer stroomop-sekuriteitsregstellings ontvang nie. 'n Slaagresultaat beteken nie dat die geïnstalleerde lapvrystelling op datum is nie, en Doctor kan nie bepaal of 'n bedryfstelselverskaffer teruggeporteerde regstellings verskaf nie.

Ondersteuningsdatums word saam met Doctor gebundel vanaf die [PHP-ondersteuningskedule](https://www.php.net/supported-versions.php) en [einde-van-lewe-lys](https://www.php.net/eol.php), laas gekontroleer op 2026-11-08. Onbekende takke en voorvrystellings lewer 'n waarskuwing op eerder as 'n veronderstelde slaag. Geen netwerkversoek word tydens diagnostiek gemaak nie. Werk Doctor se ondersteuningsdata by wanneer PHP 'n nuwe skedule publiseer. Bestaande JSON-/moniterings-ID's `php.version` en `php.security_baseline` is onveranderd.

## Ontwikkeling

Die eenheidstoetsstel gebruik Pest en statiese analise gebruik PHPStan (vlak 6), albei op PHP 8.2 of nuwer:

```console
composer install
composer phpstan
composer test
```

Die toetse vervang die Cacti-funksies wat Doctor oproep met klein plaasvervangers in `tests/CactiStubs.php`, sodat hulle sonder 'n Cacti-installasie loop.

GitHub Actions voer vyf soorte kontroles uit op elke push en pull-versoek:

- Vrystelling-verpakkingskontraktoetse (`tests/test_release.py`) en 'n argiefbou (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, wat misluk op 'n verouderde vertaalsjabloon, 'n onvolledige of vae katalogus, of 'n gekompileerde katalogus wat van sy bron verskil.
- `php -l` op elke PHP-lêer onder PHP 5.4, 5.6, 7.0, 7.1, 7.4, en 8.0 tot 8.4.
- `composer phpstan` (PHPStan vlak 6) en `composer test` (Pest-eenheidstoetsstel) op PHP 8.2, 8.3 en 8.4.
- Sewe integrasietake wat Cacti 1.2.20, die huidige 1.2.x-tak en `develop` teen MySQL en MariaDB installeer, met beide cmd.php en Spine. Elke taak installeer en aktiveer die inprop, voer die volledige CLI-verslag uit en kontroleer die verslagskema, opsommingstotale, verwagte statusse en die presiese stel mislukkings. Dit breek daarna 'n binêre pad en die poller-tydstempel, bevestig dat beide gerapporteer word, herstel hulle, oefen die herstelaksie en sy bevestiging uit, en voer deaktivering, aktivering, deïnstallasie en herinstallasie uit. Die JSON-verslag word as 'n artefak behou wanneer 'n taak misluk.

## Bydraes

Trekversoeke gaan na `develop`. Hou produksielêers versoenbaar met PHP 5.4 en gebruik Cacti se styl: keepkarakters, stringe met enkel-aanhalingstekens en Cacti-hulpfunksies soos `read_config_option()` en `db_fetch_cell()`. Voeg 'n eenheidstoets vir elke gedragsverandering by, teken jou commits af (`git commit -s`) en voeg 'n reël by `CHANGELOG.md`.

### Vertalings

Omvou elke gebruikersigbare boodskap met `__('...', 'doctor')` (of `__n()`, `__x()`, `__esc()`), en gee 'n sin wat 'n waarde bevat 'n enkele formaatstring met opeenvolgende `%s`/`%d`-plekhouers eerder as om stukke aanmekaar te las. Cacti se `__()` formateer 'n boodskap slegs wanneer dit 'n formaatspesifiseerder bevat en ondersteun nie posisionele `%1$s`-vorme nie. Dit verander ook `%%` na `%` voor formatering, so moet nooit 'n letterlike persentteken in 'n boodskap sit nie: gee die waarde met sy teken as 'n argument deur (`__('Usage: %s', '50%', 'doctor')`). Logreëls bly in Engels: gebruik `doctor_repair_message()` vir herstelteks en `doctor_n_()` vir boodskappe wat gelog word en slegs vertaal word waar dit gewys word. Hou kontrole-ID's, JSON-sleutels, status-sleutelwoorde, moniteringsuitvoer en logreëls onvertaal.

`locales/build_gettext.sh` hergenereer die sjabloon `locales/po/cacti.pot`, voeg dit saam in elke katalogus `locales/po/<locale>.po`, en kompileer `locales/LC_MESSAGES/<locale>.mo`; commit al drie. CI voer `sh locales/build_gettext.sh --check` uit, wat misluk wanneer die sjabloon verouderd is of 'n katalogus 'n inskrywing mis of 'n vae (fuzzy) inskrywing het, 'n plekhouer verskil, of 'n gekompileerde lêer verouderd is. 'n Gewysigde boodskap vereis dus dat sy vertalings in dieselfde trekversoek bygewerk word. Dit benodig GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). 'n Nuwe taal is 'n nuwe `<locale>.po` wat benoem word soos Cacti sy lokale benoem (byvoorbeeld `pt-BR`).

## Sekuriteit

Meld kwesbaarhede privaat aan soos beskryf in [SECURITY.md](../../../SECURITY.md), nie in openbare kwessies nie.

## Lisensie

Kopiereg (C) 2026 Thomas Vincent. Vrygestel onder die GNU General Public License, weergawe 2 of later. Sien [LICENSE](../../../LICENSE).
