<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktus sa stetoskopom. Dijagnosticiraj. Popravi. Nadziri.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status kapije kvaliteta"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licenca: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ i 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor je dodatak za Cacti koji u jednom prolazu dijagnosticira instalaciju i primjenjuje manje popravke samo kada to administrator zatraži.

**Status: u razvoju, prije verzije 1.0.** Najnovije izdanje je [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Ova zakrpa dodaje kataloge za hindi i arapski jezik te prevedene korisničke vodiče na već postojeći pristup ograničen ulogama, vođenu dijagnozu, provjere svježine RRD datoteka po opsegu, preglede popravki i historiju revizije, izuzetke za prihvaćena upozorenja te prevode iz verzije 0.6.0. Detalje potražite u [CHANGELOG.md](../../../CHANGELOG.md).

## Snimci ekrana

Postavke dijagnostike i zakazivanja u izolovanoj demonstracijskoj instalaciji Cacti 1.2.31 koja radi na PHP 8.3.36, uključujući provjere PHP kompatibilnosti sa Cactijem, uzvodne sigurnosne podrške i zdravlja baze podataka. Upozorenja i greške prikazani ovdje opisuju to demo okruženje.

![Dijagnostička tabela dodatka Doctor sa rezultatima prolaz, upozorenje i greška](../../screenshots/diagnostics.png)

![Postavke zakazivanja, obavijesti i pragova u dodatku Doctor](../../screenshots/settings.png)

Problemi u Cactiju obično se ispoljavaju kao simptomi: prazni grafikoni, poller koji je stao ili dodatak koji se ne može instalirati. Uzrok je često preduslov koji je odstupio, poput nedostajuće PHP ekstenzije u CLI izdanju, direktorija za zapisnik u koji poller ne može pisati, putanje za RRDtool koja pokazuje na pogrešnu izvršnu datoteku ili baze podataka bez tabela vremenskih zona. Doctor direktno provjerava te preduslove i za svaki prijavljuje prolaz, upozorenje ili grešku uz rečenicu koja objašnjava šta je pronađeno. Isti izvještaj dostupan je na web stranici, u komandnoj liniji i kao JSON za nadzor.

## Šta provjerava

| Oblast | Provjere |
|---|---|
| Doctor | Da li se sam Doctor pokreće kao root, zbog čega bi provjere dozvola opisivale pogrešan nalog |
| Cacti i PHP | Verzija Cactija, nadogradnja koju instalater nikada nije završio, omogućeni dodaci čije datoteke nedostaju, PHP kompatibilnost sa instaliranim Cacti paketom, status uzvodne sigurnosne podrške za PHP |
| PHP ekstenzije | Obavezne ekstenzije u web PHP-u i u CLI PHP-u koji koristi poller, uz preporučene mogućnosti |
| PHP konfiguracija | `memory_limit`, `max_execution_time` i `date.timezone`, prema vlastitim preporukama Cactija |
| Baza podataka | Povezivost, verzija servera u odnosu na preporuku Cactija, UTF-8 skup znakova, tabele vremenskih zona, osnovne tabele, odstupanje sata u odnosu na PHP računar i InnoDB postavke koje Cacti označava kao greške |
| Zdravlje baze podataka | Kapacitet konekcija, čitanja buffer poola, privremene tabele na disku, kreiranje niti konekcija, spori upiti i čekanja InnoDB log bafera, sa prijedlozima za podešavanje zavisnim od opterećenja |
| Datotečni sistem | Direktoriji cache, log i RRA sa dozvolom pisanja; slobodan prostor za RRD datoteke; aktivni izvori podataka bez RRD datoteke ili sa zakašnjelim ažuriranjima datoteka; `include/config.php` koji nije čitljiv svima; Cacti zapisnik sa dozvolom pisanja i bez prevelike veličine |
| Izvršne datoteke | PHP CLI, RRDtool, `snmpget`, `snmpwalk` i Spine kada je konfigurisan kao poller, uključujući verzije tamo gdje ih Cacti navodi |
| Zapisnik | Greške među najnovijim linijama Cacti zapisnika, sa najčešćom porukom |
| Uređaji | Omogućeni uređaji koji nisu dostupni ili se oporavljaju, tri uređaja koja su najduže nedostupna sa njihovom posljednjom greškom, te greška kada je većina uređaja istovremeno nedostupna |
| Poller | Tip i interval pollera, vrijeme od posljednjeg završenog ciklusa glavnog pollera, trajanje rada u odnosu na interval, izlaz pollera koji nikada nije stigao u RRD datoteku, udaljeni polleri koji su prestali slati izvještaje, zaustavljeni Boost i konfiguracija Spinea koja pokazuje na drugu bazu podataka |

Svaka provjera ima stabilan ID, poput `database.timezone` ili `binary.rrdtool`, tako da skripte mogu ciljati pojedinačne rezultate. Omogućeni dodaci mogu doprinijeti dodatnim provjerama i prilozima za paket podrške putem kuke `doctor_register_checks`, a Doctor izlaže dijagnostičke mogućnosti samo za čitanje dodatku `plugin_mcp` putem `abilities_register`.

## Pregled koda i testova

| Ponašanje | Implementacija | Testna pokrivenost u ovom repozitoriju |
|---|---|---|
| Dijagnostičke provjere i stabilni ID-ovi izvještaja | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Kuka za provjere dodataka (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| MCP dijagnostičke mogućnosti (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Pristup ograničen ulogama i redigovani web izvještaji | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Vođena ispitivanja simptoma | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Svježina RRD datoteka i rukovanje odgođenim zapisima | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Pregledi popravki, historija revizije i prihvaćena upozorenja | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Zakazane provjere i prijelazi obavijesti | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Ove reference navode implementaciju i pokrivenost testovima; ne znače da je svaki CI zadatak prošao za trenutnu reviziju. Provjerite pokretanje radnog toka za reviziju koju planirate postaviti.

## Savjeti za zdravlje baze podataka

Izvorni PHP analizator dodatka Doctor čita fiksni skup globalnih MySQL ili MariaDB brojača putem postojeće Cacti konekcije sa bazom podataka. Izvršava dva upita samo za čitanje po izvještaju, ne zahtijeva dodatne akreditive ni izvršne datoteke i nikada ne mijenja konfiguraciju baze podataka. Ove provjere se pojavljuju u web izvještaju, komandnoj liniji, JSON izlazu, izlazu za nadzor, paketu za podršku i praćenju zakazanog statusa.

| ID provjere | Okidač za ispitivanje |
|---|---|
| `database.health_sample` | Manje od 24 sata od pokretanja servera ili naredbe `FLUSH STATUS`, ili nedostupno/nedosljedno vrijeme rada |
| `database.connection_capacity` | Trenutne ili zabilježene vršne konekcije od najmanje 80% trenutnog limita `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` najmanje 1%, uz najmanje 10.000 zahtjeva za čitanje |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` najmanje 25%, uz najmanje 1.000 privremenih tabela |
| `database.thread_cache` | `Threads_created / Connections` najmanje 5%, uz najmanje 1.000 pokušaja konekcije i `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` najmanje 1%, uz najmanje 1.000 upita |
| `database.redo_log_waits` | `Innodb_log_waits` različito od nule |

Ovo su pragovi za ispitivanje u dodatku Doctor, a ne ciljne vrijednosti konfiguracije proizvođača. Osim za kapacitet konekcija, kumulativni savjeti zahtijevaju gore navedeni prozor posmatranja. Nedostajući, neispravni, dupli ili preveliki brojači, nedovoljna aktivnost i nepodržani režimi niti daju upozorenja umjesto ocjene zdravog stanja ili preporuke za podešavanje. Upozorenja mogu uticati na Nagios status i zakazane obavijesti kada je uključena opcija **Obavijesti o upozorenjima**.

Posmatrajte izmjerene brojače i preporuku zajedno. Kumulativne vrijednosti ne dokazuju trenutno opterećenje; brojači mogu imati različitu historiju resetovanja i ne predstavljaju atomski snimak. Vršne konekcije mogu odražavati stariji limit. Broj sporih upita zavisi od `long_query_time`, a MySQL brojač privremenih tabela na disku može izostaviti memorijski mapirane datoteke. Nizak omjer ne dokazuje odsustvo uskog grla. Potvrdite trendove pod reprezentativnim opterećenjem, pregledajte planove upita i ponovnu upotrebu konekcija te izmjerite raspoloživu memoriju na **računaru baze podataka** prije izmjene bafera ili limita konekcija.

Ako metrike nisu dostupne, provjerite podršku servera i pristup Cacti naloga naredbama `SHOW GLOBAL STATUS` i `SHOW GLOBAL VARIABLES`; Doctor ne traži povišene akreditive. Definicije brojača potiču iz [MySQL reference statusnih varijabli](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) i [MariaDB reference statusnih varijabli](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Ne koriste se skripte niti kod iz alata MySQLTuner.

Nije potrebna migracija šeme ni konfiguracije. Postavite datoteke dodatka na uobičajen način; vraćanjem tih datoteka uklanjaju se dodate dijagnostičke provjere. Postojeće zakazano stanje osvježava se pri sljedećem pokretanju.

## Kako ostaje siguran

Dijagnostički alat radi sa privilegijama pollera ili web servera i čita putanje iz tabele postavki, pa mora pažljivo kontrolisati šta izvršava i šta mijenja.

- Dijagnostika je isključivo za čitanje. Nikada ne mijenja datoteke, postavke niti podatke.
- Doctor pokreće konfigurisanu izvršnu datoteku samo kada njeno ime odgovara očekivanom programu (`php`, `rrdtool`, `snmpget` ili `snmpwalk`). Svako ko može pisati u tabelu postavki inače bi mogao odrediti šta Doctor pokreće. Bilo koje drugo ime prijavljuje se kao upozorenje i ne izvršava se.
- Doctor nikada ne pokreće konfigurisane izvršne datoteke kao root i prijavljuje kada sam radi kao root.
- Popravke dolaze sa fiksnog spiska dozvoljenih radnji. Svaka zahtijeva autentifikovanu akciju administratora u web interfejsu ili zastavicu `--yes` u komandnoj liniji, i svaka se bilježi u Cacti zapisnik.

## Izdanja

Verzije prate SemVer i odgovaraju datoteci `INFO` dodatka. Pogledajte [proces objavljivanja](../../releasing.md) za odabir verzije, CI uslove, sadržaj paketa, kontrolne zbirove i upute za vraćanje na prethodnu verziju.

## Instalacija

Preuzmite `doctor-VERSION.tar.gz` ili `doctor-VERSION.zip` i `SHA256SUMS` sa [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Provjerite SHA-256 kontrolni zbir arhive, zatim raspakujte njen direktorij `doctor/` u Cacti direktorij `plugins/`. To su paketi za instalaciju; automatske izvorne arhive na GitHubu imaju drugačije ime direktorija. Za pokretanje neobjavljenog rada sa grane `develop`, instalirajte iz izvornog repozitorija.

Za instalaciju iz izvornog koda:

Klonirajte ili raspakujte repozitorij kao `plugins/doctor` unutar Cacti instalacije. Direktorij se mora zvati `doctor`, a ne `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Instalirajte i omogućite **Cacti Doctor** u meniju **Konfiguracija > Upravljanje dodacima**, a zatim dodijelite oblast **Doctor Pregledač**, **Doctor Operater** ili **Doctor Administrator** putem Cacti dozvola za korisnike ili grupe. Postojeća ovlaštenja za **Cacti Doctor** zadržavaju administratorski pristup nakon nadogradnje. Izvještaj se pojavljuje pod **Alati > Cacti Doctor**.

## Jezici

Doctor isporučuje 48 neengleskih prevodilačkih kataloga u direktorijima `locales/po/` i `locales/LC_MESSAGES/` koji pokrivaju lokalitete širokog prvog nivoa (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), afričke (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), azijske (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) i jugoistočnoevropske (`bs-BA`, `hr-HR`, `sr-RS`) lokalitete. Cacti prikazuje katalog kada je jezička podrška uključena (**Konfiguracija > Postavke > Općenito > Jezička podrška**) i kada korisnik izabere lokalitet koji Cacti nudi u svom biraču jezika; katalozi za lokalitete koji još nisu na spisku u Cactijevom biraču stupaju na snagu čim ih Cacti doda. Web stranica, postavke te poruke i tekst izvještaja koje ispisuje komandna linija prate jezik Cactija; sam izvještaj iz komandne linije koristi podrazumijevani jezik Cactija, koji ostaje engleski osim ako ga ne promijenite.

Mašinski čitljiv izlaz se nikada ne prevodi: ID-ovi provjera, JSON ključevi i vrijednosti statusa, izlazi za `--format=nagios` i `--format=prometheus`, linije zapisnika i naslovi sekcija paketa za podršku ostaju na engleskom kako bi skripte i nadzor radili na svakom jeziku. Tekst polja `summary` i `detail` svake provjere jedini je prevedeni dio JSON izvještaja.

Isporučuje se i katalog za latinoamerički španski (`es-419`), ali ni Cacti 1.2 ni Cacti 1.3 nemaju latinoamerički španski lokalitet za odabir, pa stupa na snagu tek kada ga Cacti doda. Do tada odaberite španski (`es-ES`).

Cacti učitava katalog dodatka iz `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` sa tekstualnim domenom `doctor`, jednako u verzijama 1.2.x i 1.3 (verzija 1.3 razrješava direktorij dodataka putem svoje konfigurabilne putanje za dodatke).

## Nivoi pristupa

| Oblast | Mogućnosti |
|---|---|
| Doctor Pregledač | Čitanje najnovijih zakazanih statusa provjera, vremena posmatranja, svježine i nedavne zbirne historije. Bez dijagnostičkih komandi, sirovih detalja, konfiguracije ili popravki. |
| Doctor Operater | Pokretanje dijagnostičkog izvještaja sa ograničenjem procesa od 120 sekundi, pregled redigovanih detalja i potvrđivanje nalaza. Bez izmjene postavki ili popravki. |
| Doctor Administrator | Mogućnosti operatera uz postojeće popravke sa spiska dozvoljenih radnji i postavke dodatka Doctor. Popravke i postavke takođe zahtijevaju Cacti oblast Postavke/Sistemski alati. |

Meni Alati otvara stranicu za najvišu Doctor oblast dodijeljenu korisniku, uključujući grupna ovlaštenja. Nove oblasti Pregledač i Operater ne dobijaju automatska ovlaštenja. Izvorni ID oblasti ostaje vezan za `doctor.php` kao Administrator, čime se čuva postojeći korisnički i grupni pristup.

Podaci za Pregledača dolaze iz zakazanih provjera. Uključite zakazivanje prije dodjele pristupa za Pregledača; nedostajuća ili zastarjela posmatranja prikazuju **unknown**, nikada zdravo stanje. Historija čuva posljednjih 20 zakazanih zbirnih brojeva i isključuje status uređaja. Operateri izričito pokreću svježu dijagnostiku; obična osvježavanja stranice koriste posljednji izvještaj njihove sesije.

Detalji i zbirovi uređaja koriste dozvole za uređaje trenutnog korisnika. Izvodi iz zapisnika dodatno zahtijevaju Cacti oblast Administracija zapisnika. Tajne se maskiraju prije nego što se dijagnostički detalji sačuvaju u web sesiji ili prikažu. Pristup komandnoj liniji i dalje uređuje nalog operativnog sistema.

Potvrde nalaza su lične i bilježe se u Cacti zapisnik. Važe samo za isti nalaz i iste dokaze; promijenjeni dokazi zahtijevaju novu potvrdu. Nikada ne mijenjaju status prolaz/upozorenje/greška, ne potiskuju obavijesti i ne označavaju neuspjelu provjeru kao zdravu. To je odvojeno od izuzetaka za prihvaćena upozorenja, koji utiču na politiku obavještavanja bez promjene posmatranog statusa i opisani su u nastavku.

Svaka akcija zahtijeva POST i važeći CSRF token. Popravke prikazuju zasebnu stranicu za potvrdu sa linkom Odustani koji ne šalje obrazac, te bilježe korisnika koji vrši radnju i rezultat u Cacti zapisnik.

## Komandna linija

Pokrenite ove komande iz korijenskog direktorija Cactija kao korisnik Cacti pollera, ne kao root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Tekstualni izlaz ispisuje jednu liniju po provjeri sa statusom, kategorijom, sažetkom i detaljem. `--json` ispisuje objekat `summary` sa zbirovima statusa i niz `checks` čiji unosi sadrže `id`, `category`, `status`, `summary`, `detail` te `repair`/`repairable` kada je primjenjiva popravka sa spiska dozvoljenih radnji.

| Izlazni status | Značenje |
|---|---|
| `0` | Nijedna provjera nije pala, ili je zatražena popravka uspjela. Upozorenja ne mijenjaju izlazni status. |
| `1` | Najmanje jedna provjera je pala, ili zatražena popravka nije uspjela. |
| `2` | Greška u upotrebi: pokretanje popravke bez `--yes` (`--preview` to ne zahtijeva), nepoznat ID popravke, nepoznat format izlaza, nepodržana kombinacija `--symptom` i formata, ili Cacti instalacija koju nije moguće pronaći. |

Cacti povećava `memory_limit` za svaku CLI skriptu, pa je provjera PHP konfiguracije izvođenja smislena samo na web stranici.

## Zakazane provjere i obavijesti

Pod **Konfiguracija > Postavke > Doctor** uključite **Pokreći provjere po rasporedu** i izaberite interval od 15 minuta do jednog dana. Nakon svakog dospjelog ciklusa pollera, Doctor pokreće sve provjere u pozadinskom procesu, tako da vrijeme rada samog pollera ostaje nepromijenjeno.

Svako pokretanje bilježi posmatrani status svake provjere. Aktivni izuzeci upozorenja utiču na politiku obavještavanja bez promjene tog posmatranja. Kada provjera počne ili prestane padati, Doctor zapisuje promjenu u Cacti zapisnik i, ako je postavljeno polje **Email adrese za obavijesti**, šalje email na te adrese putem Cacti postavki pošte. **Obavijesti o upozorenjima** dodaje prijelaze u upozorenja i iz njih. Prvo pokretanje bilježi samo početno stanje.

Zakazani izvještaji rade na primarnom polleru pod savjetodavnim zaključavanjem baze podataka i imaju dvominutno ograničenje radnika. Doctor prijavljuje posljednje pokretanje i uspješan završetak kako bi nedostajući ili zastarjeli rezultati bili vidljivi. Rezultati se smatraju aktuelnim za trajanje intervala plus jedan ciklus pollera i tri minute. Pokretanje koje se ne završi ponavlja se nakon 5, 10, 20 i više minuta, do redovnog intervala. Neuspjele isporuke obavijesti zadržavaju se do tri ponovna pokušaja sa rastućim kašnjenjima; nakon toga ispravite Cacti postavke pošte i pokrenite `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` kao korisnik pollera. Prihvatanje od strane mail servera ne potvrđuje isporuku u prijemno sanduče.

Ista kartica definiše pragove za trajanje rada pollera (80% intervala), slobodan prostor na RRA disku (upozorenje ispod 10%, greška ispod 2%), odstupanje sata baze podataka (upozorenje preko 5 sekundi, greška preko 60) i veličinu Cacti zapisnika (100 MB). Prazne ili neispravne vrijednosti vraćaju se na ove podrazumijevane vrijednosti.

## Integracija sa nadzorom

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` ispisuje jednu liniju statusa sa podacima o performansama i izlazi sa `0` (OK), `1` (WARNING) ili `2` (CRITICAL), tako da ga Nagios, Icinga ili bilo koji kompatibilan sistem može direktno pokretati. `--format=prometheus` zapisuje Prometheus tekstualni format za textfile kolektor alata node_exporter: `cacti_doctor_check_status` po provjeri (0 za prolaz ili prihvaćeno upozorenje, 1 za aktivno upozorenje, 2 za grešku), `cacti_doctor_check_observed_status` prije izuzetaka, `cacti_doctor_check_accepted`, `cacti_doctor_checks` po statusu i `cacti_doctor_last_run_timestamp_seconds`. JSON redovi provjera uključuju polje `assessment`; `not_assessed` znači da provjera nije mogla donijeti zaključak iz dostupnih podataka.

## Paket za podršku

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Paket je jedna tekstualna datoteka sa verzijama dodatka Doctor, Cactija, PHP-a, operativnog sistema i baze podataka, statistikama pollera i Boosta, potpunim izvještajem, svim prilozima dodataka za paket podrške pod `== Plugin attachments`, i posljednjih 200 linija Cacti zapisnika. Vrijednosti iza naziva za lozinku, tajnu, token, community i ključ su maskirane. Doctor kreira datoteku čitljivu samo svom vlasniku i odbija prepisati postojeću datoteku. Pregledajte je prije nego što je bilo gdje objavite.

## Politika popravki

Doctor uključuje jednu popravku, `runtime_directories`. Ona kreira nedostajuće Cacti direktorije izvođenja i dodaje vlasniku dozvole čitanja, pisanja i izvršavanja bez uklanjanja postojećih dozvola.

Cilja `$cache_path`, `$log_path` i `$rra_path` na Cactiju 1.3, odnosno direktorije `cache`, `log` i `rra` instalacije na starijim verzijama. Preskače direktorije u koje se već može pisati, odbija direktorije izvan Cacti instalacije (kao što je direktorij zapisnika pod `/var/log`), odbija simboličke linkove i odbija pokretanje kao root. Nikada ne prati `path_cactilog`, tako da datoteka zapisnika konfigurisana unutar direktorija koda ne može preusmjeriti popravku tamo. Dijagnostika i dalje na svakom izdanju provjerava direktorij konfigurisane datoteke zapisnika.

Ne mijenja vlasništvo, ne pokreće shell komande, ne prepisuje konfiguraciju i ne mijenja aplikacijske podatke Cactija. Svaka nova popravka mora uključivati dijagnostiku, rukovalac sa spiska dozvoljenih radnji, potvrdu, revizijsko bilježenje i testove.

## Ispitivanje simptoma

Operateri i administratori mogu na Doctor stranici izabrati **Ispitaj simptom**. Ista pravila dostupna su preko `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` ili `alerts_missing`, sa tekstualnim ili JSON izlazom. Paketi za podršku uključuju relevantna ispitivanja simptoma.

Svaki kandidat navodi posmatrane provjere i naredni korak verifikacije. Kandidati su hipoteze, a ne potvrđeni osnovni uzroci. Nedostajuća, neocijenjena ili zastarjela posmatranja nikada ne utvrđuju uzrok. Web ispitivanja koriste izvještaj filtriran prema dozvolama; CLI izvještaji koriste pristup naloga operativnog sistema.

## Svježina RRD ažuriranja

`filesystem.rrd_stale` provjerava do 500 aktivnih izvora podataka, isključujući onemogućene i nedostupne uređaje. Na većim instalacijama uzorak se mijenja svakog sata, pa uzastopna pokretanja pokrivaju različite datoteke. Upoređuje vremena izmjene datoteka sa najvećom vrijednošću između intervala pollera, RRD koraka izvora i koraka profila, pomnoženom sa **Intervali zastarjelosti RRD datoteka** (podrazumijevano 3). Prikazuje tri najstarije zastarjele datoteke i broj zahvaćenih uređaja. Web rezultati uključuju samo dozvoljene uređaje.

`filesystem.rrd_files` je odvojena provjera postojanja. Traži RRD datoteku za do 5.000 aktivnih izvora podataka, uključujući one na onemogućenim ili nedostupnim uređajima, i koristi isti satni uzorak.

Boost dodaje dvostruku vrijednost svog konfigurisanog intervala pražnjenja kao dopušteno kašnjenje zapisa na disk. Za drugi sistem odgođenog zapisa konfigurišite **Dopušteno kašnjenje odgođenog RRD zapisa (sekunde)**. Objavljena varijabla `RRDCACHED_ADDRESS` bez dopuštenog kašnjenja, ili neispravan Boost interval, daje neocijenjen rezultat. Doctor nikada ne prazni keš radi ove provjere. Vrijeme izmjene je dokaz aktivnosti na disku, a ne dokaz uspješnog prikupljanja podataka. Vanjsko keširanje koje Doctor ne može otkriti mora biti izričito konfigurisano.

Nedostajuće, nečitljive i datoteke sa datumom u budućnosti broje se u detaljima. Rezultat je neocijenjen samo kada nijedna datoteka iz uzorka nije čitljiva. Rezultat na osnovu uzorka navodi da pokriva samo dio instalacije; prolaz ne obuhvata datoteke izvan uzorka.

## Pregledi popravki i historija revizije

Administratorska stranica za popravke prikazuje svaku zahvaćenu putanju, predloženu akciju, trenutne dozvole i ciljne dozvole. Odobrenje je vezano za taj pregled, korisnika koji djeluje i rok važenja od pet minuta. Potvrda troši pregled; promijenjeni datotečni sistem zahtijeva novi pregled. Pokretanje kao root, putanje izvan instalacije, linkovi kojima je potrebna popravka i neispunjene dozvole datotečnog sistema sprečavaju odobrenje.

`--repair=runtime_directories --preview` ispisuje JSON plan samo za čitanje. `--repair=runtime_directories --yes` odobrava svježe izračunat CLI plan i ponovo ga provjerava prije izvršavanja. CLI nalog već mora biti ovlašten za popravku instalacije; ne nasljeđuje web uloge.

Strukturisani zapis `repair.started` mora biti sačuvan prije bilo kakve promjene na datotečnom sistemu. Povezani zapis `repair.completed` sadrži snimak nakon popravke i rezultat verifikacije. Prekinuta operacija ostavlja zapis pokretanja za dalju istragu. Neuspjeh završnog revizijskog zapisa prijavljuje se kao greška čak i ako su izmjene na datotečnom sistemu obavljene. Doctor dodaje vlasničke dozvole i kreira direktorije; ne pokušava automatsko vraćanje promjena.

Administratori sa Cacti dozvolom Postavke/Sistemski alati mogu čitati posljednjih 20 revizijskih unosa na stranici Doctor. Dodatak čuva posljednjih 200 zapisa u tabeli `plugin_doctor_audit`; Cacti zapisnik takođe bilježi njihove ID-ove, akcije i izvršioce. Sadržaj revizijskih zapisa je redigovan.

## Prihvaćena upozorenja

Administratori sa Cacti dozvolom Postavke/Sistemski alati mogu kreirati **Izuzetak upozorenja** iz svježeg, ocijenjenog upozorenja na stranici Doctor. Izuzetak zahtijeva vlasnika, razlog i UTC datum pregleda u roku od 90 dana. Ističe u ponoć UTC na početku tog datuma. Može se konfigurisati do 100 izuzetaka. Spisak prikazuje istekle unose i ID-ove koji nisu prisutni u trenutnom izvještaju te omogućava uklanjanje.

Posmatrano upozorenje ostaje vidljivo, zajedno sa vlasnikom, razlogom i istekom u dijagnostičkim detaljima. JSON zadržava posmatrani status i dodaje metapodatke `accepted` i `acceptance`. Nagios isključuje aktivna prihvaćena upozorenja iz svoje izlazne ozbiljnosti, ali ih navodi u svom izlazu. Prometheus izvozi i posmatranu i aktivnu ozbiljnost. Uobičajeni CLI izlazni status ostaje nepromijenjen: upozorenja već vraćaju nulu, a greške jedan.

Zakazane obavijesti o upozorenjima potiskuju se dok izuzetak važi; istek ili uklanjanje ponovo čini trajno upozorenje podobnim za obavijesti. Prijelazi u grešku i oporavak od greške i dalje ostaju podobni za obavijesti. Neocijenjen rezultat ili greška ne mogu biti prihvaćeni. Lična potvrda je odvojena i ništa ne potiskuje. Kreiranje i uklanjanje izuzetaka izvršavaju se transakcijski zajedno sa revizijskim zapisom.

Nadogradnja kreira tabele `plugin_doctor_audit` i `plugin_doctor_acceptance` bez izmjene Cacti aplikacijskih podataka. Izvezite historiju koja vam je potrebna prije deinstalacije: deinstalacija uklanja obje tabele dodatka i njegove postavke. Vraćanje datoteka dodatka ostavlja tabele dostupnim za istragu, ali starije verzije ne uvažavaju izuzetke upozorenja.

## Provjere dodataka (`doctor_register_checks`)

Omogućeni Cacti dodaci mogu doprinijeti dijagnostičkim provjerama samo za čitanje i opcionim prilozima za paket podrške registracijom kuke `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor poziva omogućene, neintegrisane dodatke registrovane na `doctor_register_checks` (preskačući `doctor` i `cacti`), razrješavajući datoteku kuke strogo unutar vlastitog direktorija dodatka. Povratni poziv prima `['mode' => 'run' | 'list', 'plugin' => '<slug>']` i vraća ili spisak opisnika provjera ili omotač sa `checks` i opcionim `attachments`:

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

Svaki opisnik provjere dodatka validira se prije uključivanja:

- Obavezni ključevi: `id`, `plugin`, `category`, `title`, `status`, `message`, `details` i `remediation`.
- `plugin` se mora podudarati sa registrovanim slugom dodatka (`[a-z0-9_]{1,64}`). `id` se mora podudarati sa `[a-z0-9_.]{1,128}`, počinjati sa `<plugin>.` i ne smije se sudarati sa postojećim ID-om osnovne provjere ili provjere dodatka.
- `status` mora biti `ok`, `warn`, `fail` ili `info`. `ok` se mapira na `pass` u izvještajima dodatka Doctor; `info` je informativnog karaktera i ne izaziva padove u CLI, Nagiosu, Prometheusu ili zakazanim obavijestima.
- `category` (do 64 bajta) i `title` (do 256 bajtova) moraju biti neprazni stringovi bez kontrolnih znakova. `message` (neprazan, do 2048 bajtova) i `remediation` (do 2048 bajtova) moraju biti stringovi.
- `details` prihvata string (do 8192 bajta) ili skalarni/ugniježđeni niz (maksimalna dubina 4, JSON-kodiran do 16384 bajta; objekti i resursi se odbijaju).
- Opcioni prilozi za paket podrške zahtijevaju neprazan `title` (do 128 bajtova, bez kontrolnih znakova) i string `content` do 65536 bajtova (64 KiB).

Doctor primjenjuje ograničenja od 32 provjere i 8 priloga po dodatku (ukupno 64 provjere dodataka i 32 priloga). Svaka kuka izvršava se unutar vlastite `try`/`catch` granice tako da se izuzeci ili sadržaji koji nisu nizovi rediguju i bilježe u Cacti zapisnik (kategorija `DOCTOR`) bez uticaja na osnovne provjere ili druge dodatke. Neispravni opisnici se odbijaju i bilježe dok važeći iz istog dodatka i dalje rade. Provjere dodataka uvijek su samo za čitanje (`repairable: false`), a string vrijednosti i osjetljivi asocijativni ključevi rediguju se prije prikaza, izvoza ili pakovanja. Validirane provjere dodataka pojavljuju se u web sučelju, CLI tekstualnom/JSON/Nagios/Prometheus izlazu, zakazanom praćenju statusa i paketima podrške.

## MCP integracija (`abilities_register`)

Doctor registruje kuku `abilities_register` (`doctor_abilities_register` u `doctor_abilities.php`) kako bi `plugin_mcp` otkrio njegove dijagnostičke mogućnosti kada su oba dodatka omogućena. Doctor registruje kategoriju `diagnostics` (`Diagnostics`) i dvije mogućnosti samo za čitanje, nedestruktivne i idempotentne:

| ID mogućnosti | Opcioni argumenti | Izlaz |
|---|---|---|
| `doctor-run-checks` | `category` (string, maks 64 znaka), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) i do 256 redigovanih `findings` (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (string, maks 64 znaka), `plugin` (string, maks 64 znaka) | Do 256 `checks` (`id`, `plugin`, `category`, `title`) koji pokrivaju svih 45 ugrađenih provjera plus omogućene provjere dodataka |

Obje mogućnosti su strogo samo za čitanje i nikada ne pokreću popravke. Pored vlastitih kontrola oblasti i izlaganja mogućnosti dodatka `plugin_mcp` (mogućnosti dodataka počinju skrivene u MCP-u dok ih administrator ne izloži), Doctor zahtijeva da vlasnik tokena posjeduje oblast **Doctor Pregledač** ili višu Doctor oblast. `doctor-run-checks` ograničava `devices.health` na dozvoljene uređaje vlasnika tokena, uključuje `logging.recent_errors` samo kada korisnik posjeduje Cacti oblast 18 ili 19, izostavlja `filesystem.rrd_files`, i uključuje `filesystem.rrd_stale` ograničen na uređaje samo za **Doctor Operater** ili **Doctor Administrator**.

## Zahtjevi

| Cacti | PHP | Napomene |
|---|---|---|
| 1.2.20 | 5.4 ili noviji | Kod samog dodatka Doctor kompatibilan je sa PHP 5.4 kako bi mogao dijagnosticirati starije sisteme prije nadogradnje |
| 1.2.31 | 8.0 ili noviji | Cacti `composer.json` zahtijeva `>=8.0` |
| Aktuelni 1.2.x | 8.2 ili noviji | Cacti `composer.json` zahtijeva `>=8.2` |
| `develop` (1.3) | 8.3 ili noviji | Cacti `composer.json` zahtijeva `^8.3` |

Red **PHP kompatibilnost sa instaliranim Cactijem** upoređuje aktivnu verziju PHP-a sa PHP zahtjevom u korijenskoj datoteci `composer.json` samog Cactija, uključujući gornju granicu ograničenja sa znakom `^`, kao što je `^8.3`. Konfigurisana PHP CLI izvršna datoteka provjerava se prema istom zahtjevu. Doctor prepoznaje oblike ograničenja `>=` i `^` koje koriste ovi Cacti paketi. Nečitljiv, neispravan, nedostajući ili neprepoznat zahtjev daje upozorenje; instalacije Cacti 1.2.20–1.2.30 bez manifesta zadržavaju svoj dokumentovani minimum PHP 5.4 iz instalatera. Vlastita PHP 5.4 kompatibilnost dodatka Doctor ne dokazuje kompatibilnost sa novijom Cacti instalacijom.

Red **Uzvodna sigurnosna podrška za PHP** odgovara na odvojeno pitanje: da li ta grana izdanja PHP-a još uvijek prima sigurnosne zakrpe od PHP projekta? Prijavljuje objavljeni datum završetka sigurnosne podrške grane i upozorava nakon tog datuma. Naprimjer, PHP 8.1 može zadovoljiti zahtjev izvođenja starije Cacti instalacije dok više ne prima uzvodne sigurnosne zakrpe. Prolazni rezultat ne znači da je instalirana zakrpa najnovija, a Doctor ne može utvrditi da li isporučilac operativnog sistema obezbjeđuje prenesene sigurnosne ispravke.

Datumi podrške ugrađeni su u Doctor na osnovu [rasporeda podrške za PHP](https://www.php.net/supported-versions.php) i [spiska verzija kojima je istekla podrška](https://www.php.net/eol.php), posljednji put provjereno 2026-11-08. Nepoznate grane i predizdanja daju upozorenje umjesto pretpostavljenog prolaza. Tokom dijagnostike ne šalje se nijedan mrežni zahtjev. Ažurirajte podatke o podršci u dodatku Doctor kada PHP objavi novi raspored. Postojeći JSON/nadzorni ID-ovi `php.version` i `php.security_baseline` ostaju nepromijenjeni.

## Razvoj

Skup jediničnih testova koristi Pest, a statička analiza koristi PHPStan (nivo 6), oboje na PHP 8.2 ili novijem:

```console
composer install
composer phpstan
composer test
```

Testovi zamjenjuju Cacti funkcije koje Doctor poziva malim zamjenama u `tests/CactiStubs.php`, tako da rade bez Cacti instalacije.

GitHub Actions pokreće pet vrsta provjera pri svakom slanju izmjena i pull zahtjevu:

- Testove ugovora pakovanja izdanja (`tests/test_release.py`) i izgradnju arhive (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, koji pada ako je prevodilački šablon zastario, ako je katalog nepotpun ili sadrži nejasne (fuzzy) unose, ili ako se kompajlirani katalog razlikuje od svog izvora.
- `php -l` na svakoj PHP datoteci pod verzijama PHP 5.4, 5.6, 7.0, 7.1, 7.4 i od 8.0 do 8.4.
- `composer phpstan` (PHPStan nivo 6) i `composer test` (Pest skup jediničnih testova) na PHP 8.2, 8.3 i 8.4.
- Sedam integracijskih zadataka koji instaliraju Cacti 1.2.20, aktuelnu granu 1.2.x i `develop` sa MySQL i MariaDB bazama, i sa cmd.php i sa Spine pollerom. Svaki zadatak instalira i omogućava dodatak, pokreće puni CLI izvještaj i provjerava šemu izvještaja, zbirne vrijednosti, očekivane statuse i tačan skup grešaka. Zatim kvari putanju izvršne datoteke i vremensku oznaku pollera, potvrđuje da su oba problema prijavljena, vraća ih u ispravno stanje, provjerava popravku i njenu potvrdu te izvršava onemogućavanje, omogućavanje, deinstalaciju i ponovnu instalaciju. JSON izvještaj čuva se kao artefakt kada zadatak padne.

## Doprinos

Pull zahtjevi idu na granu `develop`. Produkcijske datoteke održavajte kompatibilnim sa PHP 5.4 i koristite stil Cactija: tabulatore, stringove u jednostrukim navodnicima i Cacti pomoćne funkcije poput `read_config_option()` i `db_fetch_cell()`. Dodajte jedinični test za svaku promjenu ponašanja, potpišite svoje commitove (`git commit -s`) i dodajte liniju u `CHANGELOG.md`.

### Prevodi

Omotajte svaku korisniku vidljivu poruku sa `__('...', 'doctor')` (ili `__n()`, `__x()`, `__esc()`), a rečenici koja sadrži vrijednost dajte jedan formatni string sa uzastopnim rezervisanim mjestima `%s`/`%d` umjesto spajanja dijelova. Cacti funkcija `__()` formatira poruku samo kada sadrži specifikator formata i ne podržava pozicijske oblike `%1$s`. Takođe pretvara `%%` u `%` prije formatiranja, pa nikada ne stavljajte doslovni znak procenta u poruku: proslijedite vrijednost sa njenim znakom kao argument (`__('Usage: %s', '50%', 'doctor')`). Linije zapisnika ostaju na engleskom: koristite `doctor_repair_message()` za tekst popravki i `doctor_n_()` za poruke koje se bilježe u zapisnik i prevode tek pri prikazu. ID-ove provjera, JSON ključeve, ključne riječi statusa, izlaz za nadzor i linije zapisnika ostavite neprevedenim.

`locales/build_gettext.sh` ponovo generiše šablon `locales/po/cacti.pot`, spaja ga u svaki katalog `locales/po/<locale>.po` i kompajlira `locales/LC_MESSAGES/<locale>.mo`; dodajte u commit sva tri. CI pokreće `sh locales/build_gettext.sh --check`, koji pada kada je šablon zastario ili kada katalogu nedostaje unos ili ima nejasan (fuzzy) unos, kada se rezervisano mjesto razlikuje ili kada je kompajlirana datoteka zastarjela. Izmijenjena poruka stoga zahtijeva ažuriranje svojih prevoda u istom pull zahtjevu. Potreban je GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Novi jezik je nova datoteka `<locale>.po` nazvana onako kako Cacti imenuje svoje lokalitete (naprimjer `pt-BR`).

## Sigurnost

Sigurnosne ranjivosti prijavljujte privatno kako je opisano u [SECURITY.md](../../../SECURITY.md), a ne putem javnih prijava problema.

## Licenca

Copyright (C) 2026 Thomas Vincent. Objavljeno pod licencom GNU General Public License, verzija 2 ili novija. Pogledajte [LICENSE](../../../LICENSE).
