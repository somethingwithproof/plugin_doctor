<!-- Source: README.md; SHA256: ee03c7ac68aca21c8155c29b5b43a1f206c2f0c379c8b07bb4113919c18aafde -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktus sa stetoskopom. Dijagnosticiraj. Popravi. Nadziri.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status provjere kvalitete"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licencija: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ i 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor je dodatak za Cacti koji u jednom prolazu dijagnosticira instalaciju i primjenjuje manje popravke samo kada to administrator zatraži.

**Status: u razvoju, prije inačice 1.0.** Najnovije izdanje jest [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Ova zakrpa na pristup ograničen ulogama, vođenu dijagnozu, ciljane provjere svježine RRD datoteka, pretpreglede popravaka i povijest revizije, iznimke za prihvaćena upozorenja te prijevode iz inačice 0.6.0 dodaje kataloge za hindski i arapski jezik te prevedene korisničke vodiče. Pojedinosti potražite u [CHANGELOG.md](../../../CHANGELOG.md).

## Snimke zaslona

Postavke dijagnostike i zakazivanja u izoliranoj demonstracijskoj instalaciji sustava Cacti 1.2.31 na inačici PHP 8.3.36, uključujući provjere PHP kompatibilnosti sa sustavom Cacti, uzvodne sigurnosne podrške i stanja baze podataka. Upozorenja i pogreške prikazani ovdje opisuju to demonstracijsko okruženje.

![Dijagnostička tablica dodatka Doctor s rezultatima prolaza, upozorenja i pogreške](../../screenshots/diagnostics.png)

![Postavke zakazivanja, upozorenja i pragova dodatka Doctor](../../screenshots/settings.png)

Problemi u sustavu Cacti obično se očituju kao simptomi: prazni grafikoni, poller koji se zaustavio ili dodatak koji se ne može instalirati. Uzrok je često preduvjet koji je odstupio, poput nedostajućeg PHP proširenja u CLI izdanju, direktorija dnevnika u koji poller ne može pisati, putanje do alata RRDtool koja upućuje na pogrešnu izvršnu datoteku ili baze podataka bez tablica vremenskih zona. Doctor izravno provjerava te preduvjete i za svaki izvješćuje o prolazu, upozorenju ili pogrešci uz rečenicu koja objašnjava nalaz. Isto izvješće dostupno je na mrežnoj stranici, u naredbenom retku i u obliku JSON-a za nadzor.

## Što provjerava

| Područje | Provjere |
|---|---|
| Doctor | Izvodi li se sam Doctor kao korisnik root, zbog čega bi provjere ovlasti opisivale pogrešan račun |
| Cacti i PHP | Inačica sustava Cacti, nadogradnja koju instalacijski program nikada nije dovršio, omogućeni dodaci kojima nedostaju datoteke, kompatibilnost PHP-a s instaliranim paketom Cacti, status uzvodne sigurnosne podrške za PHP |
| PHP proširenja | Obvezna proširenja u mrežnom PHP-u i u CLI PHP-u kojim se koristi poller, uz preporučene značajke |
| PHP konfiguracija | `memory_limit`, `max_execution_time` i `date.timezone`, prema vlastitim preporukama sustava Cacti |
| Baza podataka | Povezivost, inačica poslužitelja u odnosu na preporuku sustava Cacti, UTF-8 skup znakova, tablice vremenskih zona, temeljne tablice, odstupanje sata od PHP računala i InnoDB postavke koje Cacti označava kao pogreške |
| Stanje baze podataka | Kapacitet veza, čitanja iz međuspremnika (buffer pool), privremene tablice na disku, stvaranje niti veza, spori upiti i čekanja InnoDB dnevnika, uz prijedloge ugađanja ovisne o opterećenju |
| Datotečni sustav | Direktoriji cache, log i RRA s pravom pisanja; slobodan prostor pohrane za RRD datoteke; aktivni izvori podataka bez RRD datoteke ili sa zakašnjelim ažuriranjima datoteka; `include/config.php` koji nije čitljiv svim korisnicima; Cacti dnevnik u koji je moguće pisati i koji nije prevelik |
| Izvršne datoteke | PHP CLI, RRDtool, `snmpget`, `snmpwalk` i Spine kada je konfiguriran kao poller, uključujući inačice tamo gdje ih Cacti navodi |
| Dnevnik | Pogreške među najnovijim redcima Cacti dnevnika, uz najčešću poruku |
| Uređaji | Omogućeni uređaji koji ne rade ili se oporavljaju, tri uređaja koja najdulje ne rade s njihovom posljednjom pogreškom te pogreška kada većina uređaja istodobno ne radi |
| Poller | Vrsta i interval pollera, vrijeme od posljednjeg dovršenog ciklusa glavnog pollera, trajanje izvođenja u odnosu na interval, izlaz pollera koji nikada nije dospio u RRD datoteku, udaljeni polleri koji su prestali slati izvješća, zaustavljeni Boost i konfiguracija Spinea koja upućuje na drugu bazu podataka |

Svaka provjera ima stabilan ID, poput `database.timezone` ili `binary.rrdtool`, tako da skripte mogu pristupati pojedinačnim rezultatima.

## Pregled koda i testova

| Ponašanje | Implementacija | Testni dokazi u ovom repozitoriju |
|---|---|---|
| Dijagnostičke provjere i stabilni ID-ovi izvješća | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Pristup ograničen ulogama i redigirana mrežna izvješća | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Vođena istraživanja simptoma | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Svježina RRD datoteka i obrada odgođenih zapisa | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Pretpregledi popravaka, povijest revizije i prihvaćena upozorenja | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Zakazane provjere i prijelazi upozorenja | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Ove poveznice označuju implementaciju i pokrivenost testovima; ne znače da je svaki CI posao prošao za trenutačnu reviziju. Provjerite izvođenje tijeka rada za reviziju koju namjeravate uvesti.

## Savjeti za stanje baze podataka

Izvorni PHP analizator dodatka Doctor čita utvrđeni skup globalnih brojača za MySQL ili MariaDB putem postojeće veze sustava Cacti s bazom podataka. Izvršava dva upita samo za čitanje po izvješću, ne zahtijeva dodatne vjerodajnice ni izvršne datoteke i nikada ne mijenja konfiguraciju baze podataka. Ove se provjere prikazuju u mrežnom izvješću, u naredbenom retku, u JSON-u, u izlazu za nadzor, u paketu za podršku i u praćenju zakazanog statusa.

| ID provjere | Okidač za istraživanje |
|---|---|
| `database.health_sample` | Manje od 24 sata od pokretanja poslužitelja ili naredbe `FLUSH STATUS`, odnosno nedostupno ili nedosljedno vrijeme rada |
| `database.connection_capacity` | Trenutačne ili zabilježene vršne veze od najmanje 80% trenutačnog ograničenja `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` najmanje 1%, uz najmanje 10.000 zahtjeva za čitanje |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` najmanje 25%, uz najmanje 1.000 privremenih tablica |
| `database.thread_cache` | `Threads_created / Connections` najmanje 5%, uz najmanje 1.000 pokušaja povezivanja i `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` najmanje 1%, uz najmanje 1.000 naredbi |
| `database.redo_log_waits` | `Innodb_log_waits` različito od nule |

Ovo su pragovi za istraživanje dodatka Doctor, a ne ciljne vrijednosti konfiguracije proizvođača. Osim za kapacitet veza, kumulativni savjeti zahtijevaju prethodno navedeni vremenski okvir promatranja. Nedostajući, neispravni, udvostručeni ili preveliki brojači, nedovoljna aktivnost i nepodržani načini rada niti proizvode upozorenja umjesto ocjene ispravnog stanja ili preporuke za ugađanje. Upozorenja mogu utjecati na status sustava Nagios i zakazane obavijesti kada je omogućena postavka **Obavijesti o upozorenjima**.

Izmjerene brojače i prijedlog promatrajte zajedno. Kumulativne vrijednosti ne dokazuju trenutačno opterećenje; brojači mogu imati različitu povijest poništavanja i ne čine atomsku snimku stanja. Vršni broj veza može odražavati starije ograničenje. Broj sporih upita ovisi o postavci `long_query_time`, a MySQL brojač privremenih tablica na disku može izostaviti datoteke preslikane u memoriju. Nizak omjer ne dokazuje nepostojanje uskog grla. Potvrdite trendove pod reprezentativnim opterećenjem, pregledajte planove upita i ponovnu uporabu veza te izmjerite raspoloživu memoriju na **računalu baze podataka** prije promjene međuspremnika ili ograničenja veza.

Ako mjerni podatci nisu dostupni, provjerite podršku poslužitelja i pristup Cacti računa naredbama `SHOW GLOBAL STATUS` i `SHOW GLOBAL VARIABLES`; Doctor ne zahtijeva povišene vjerodajnice. Definicije brojača potječu iz [MySQL referencije statusnih varijabli](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) i [MariaDB referencije statusnih varijabli](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Ne koriste se skripte ni kod alata MySQLTuner.

Nije potrebna migracija sheme ni konfiguracije. Postavite datoteke dodatka na uobičajen način; vraćanjem tih datoteka uklanjaju se dodane dijagnostičke provjere. Postojeće zakazano stanje osvježava se pri sljedećem izvođenju.

## Kako ostaje siguran

Dijagnostički alat izvodi se s ovlastima pollera ili mrežnog poslužitelja i čita putanje iz tablice postavki, pa mora pažljivo nadzirati što izvršava i što mijenja.

- Dijagnostika je isključivo za čitanje. Nikada ne mijenja datoteke, postavke niti podatke.
- Doctor pokreće konfiguriranu izvršnu datoteku samo kada njezin naziv odgovara očekivanom programu (`php`, `rrdtool`, `snmpget` ili `snmpwalk`). Svatko tko može pisati u tablicu postavki inače bi mogao odrediti što Doctor izvršava. Svaki drugi naziv prijavljuje se kao upozorenje i ne izvršava se.
- Doctor nikada ne pokreće konfigurirane izvršne datoteke kao root te izvješćuje kada se sam izvodi kao root.
- Popravci potječu s utvrđenog popisa dopuštenih radnji. Svaki zahtijeva ovlaštenu radnju administratora u mrežnom sučelju ili opciju `--yes` u naredbenom retku, i svaki se bilježi u Cacti dnevnik.

## Izdanja

Inačice slijede SemVer i odgovaraju datoteci `INFO` dodatka. Pogledajte [postupak objave izdanja](../../releasing.md) za odabir inačice, CI uvjete, sadržaj paketa, kontrolne zbrojeve i upute za vraćanje na prethodnu inačicu.

## Instalacija

Preuzmite `doctor-VERSION.tar.gz` ili `doctor-VERSION.zip` i `SHA256SUMS` sa stranice [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Provjerite SHA-256 kontrolni zbroj arhive, zatim raspakirajte njezin direktorij `doctor/` u Cacti direktorij `plugins/`. To su paketi spremni za instalaciju; automatske izvorne arhive na servisu GitHub imaju drukčiji naziv direktorija. Za pokretanje neobjavljenog rada s grane `develop`, instalirajte iz izvornog repozitorija.

Za instalaciju iz izvornog koda:

Klonirajte ili raspakirajte repozitorij kao `plugins/doctor` unutar instalacije sustava Cacti. Direktorij se mora zvati `doctor`, a ne `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Instalirajte i omogućite **Cacti Doctor** u izborniku **Konfiguracija > Upravljanje dodacima**, a zatim dodijelite područje **Doctor Pregledatelj**, **Doctor Operater** ili **Doctor Administrator** putem korisničkih ili grupnih ovlasti u sustavu Cacti. Postojeće ovlasti za **Cacti Doctor** zadržavaju administratorski pristup nakon nadogradnje. Izvješće se prikazuje pod **Alati > Cacti Doctor**.

## Jezici

Doctor isporučuje 48 neengleskih prijevodnih kataloga pod `locales/po/` i `locales/LC_MESSAGES/` koji pokrivaju lokalitete široke prve razine (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), afričke (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), azijske (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) i jugoistočnoeuropske (`bs-BA`, `hr-HR`, `sr-RS`) lokalitete. Cacti prikazuje katalog kada je jezična podrška uključena (**Konfiguracija > Postavke > Općenito > Jezična podrška**) i kada korisnik odabere lokalitet koji Cacti nudi u svojem izborniku jezika; katalozi za lokalitete koji još nisu navedeni u izborniku sustava Cacti stupaju na snagu čim ih Cacti doda. Mrežna stranica, postavke te poruke i tekst izvješća koje ispisuje naredbeni redak slijede jezik sustava Cacti; samo izvješće iz naredbenog retka koristi zadani jezik sustava Cacti, koji ostaje engleski osim ako ga ne promijenite.

Strojno čitljiv izlaz nikada se ne prevodi: ID-ovi provjera, JSON ključevi i vrijednosti statusa, izlazi za `--format=nagios` i `--format=prometheus`, retci dnevnika i naslovi odjeljaka paketa za podršku ostaju na engleskom kako bi skripte i nadzor nastavili raditi na svakom jeziku. Tekst polja `summary` i `detail` svake provjere jedini je prevedeni dio JSON izvješća.

Isporučuje se i katalog za latinoamerički španjolski (`es-419`), ali ni Cacti 1.2 ni Cacti 1.3 nemaju lokalitet latinoameričkog španjolskog za odabir, pa stupa na snagu tek kada ga Cacti doda. Do tada odaberite španjolski (`es-ES`).

Cacti učitava katalog dodatka iz `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` s tekstualnom domenom `doctor`, jednako na inačicama 1.2.x i 1.3 (inačica 1.3 razrješava direktorij dodataka putem svoje konfigurabilne putanje za dodatke).

## Razine pristupa

| Područje | Mogućnosti |
|---|---|
| Doctor Pregledatelj | Čitanje najnovijih zakazanih statusa provjera, vremena promatranja, svježine i nedavne zbirne povijesti. Bez dijagnostičkih naredbi, sirovih pojedinosti, konfiguracije ili popravaka. |
| Doctor Operater | Pokretanje dijagnostičkog izvješća s vremenskim ograničenjem procesa od 120 sekundi, uvid u redigirane pojedinosti i potvrđivanje nalaza. Bez izmjene postavki ili popravaka. |
| Doctor Administrator | Mogućnosti operatera uz postojeće popravke s popisa dopuštenih radnji i postavke dodatka Doctor. Popravci i postavke dodatno zahtijevaju Cacti područje Postavke/Sistemski alati. |

Izbornik Alati otvara stranicu za najvišu Doctor razinu dodijeljenu korisniku, uključujući grupne ovlasti. Nova područja Pregledatelj i Operater ne dobivaju automatske ovlasti. Izvorni ID područja ostaje vezan uz `doctor.php` kao Administrator, čime se čuva postojeći korisnički i grupni pristup.

Podatci za Pregledatelja potječu iz zakazanih provjera. Omogućite zakazivanje prije dodjele pristupa Pregledatelju; nedostajuća ili zastarjela promatranja prikazuju **unknown**, nikada ispravno stanje. Povijest čuva posljednjih 20 zakazanih zbirnih brojeva i isključuje status uređaja. Operateri izričito pokreću svježu dijagnostiku; uobičajena osvježavanja stranice koriste posljednje izvješće njihove sesije.

Pojedinosti i zbrojevi uređaja koriste ovlasti za uređaje trenutačnog korisnika. Izvadci iz dnevnika dodatno zahtijevaju Cacti područje Administracija dnevnika. Tajne se maskiraju prije nego što se dijagnostičke pojedinosti spreme u mrežnu sesiju ili prikažu. Pristup naredbenom retku i dalje uređuje račun operacijskog sustava.

Potvrde nalaza osobne su i bilježe se u Cacti dnevnik. Primjenjuju se samo na isti nalaz i iste dokaze; izmijenjeni dokazi zahtijevaju novu potvrdu. Nikada ne mijenjaju status prolaza/upozorenja/pogreške, ne potiskuju obavijesti i ne označavaju neuspjelu provjeru ispravnom. To je odvojeno od iznimki za prihvaćena upozorenja, koje utječu na politiku obavješćivanja bez promjene promatranog statusa i opisane su u nastavku.

Svaka radnja zahtijeva POST i valjani CSRF token. Popravci prikazuju zasebnu stranicu za potvrdu s poveznicom Odustani koja ne šalje obrazac te bilježe korisnika koji provodi radnju i ishod u Cacti dnevnik.

## Naredbeni redak

Pokrenite ove naredbe iz korijenskog direktorija sustava Cacti kao korisnik Cacti pollera, ne kao root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Tekstualni izlaz ispisuje po jedan redak za svaku provjeru sa statusom, kategorijom, sažetkom i pojedinostima. `--json` ispisuje objekt `summary` sa zbrojevima statusa i polje `checks` čiji unosi sadrže `id`, `category`, `status`, `summary`, `detail` te `repair`/`repairable` kada se primjenjuje popravak s popisa dopuštenih radnji.

| Izlazni status | Značenje |
|---|---|
| `0` | Nijedna provjera nije pala, ili je zatraženi popravak uspio. Upozorenja ne mijenjaju izlazni status. |
| `1` | Najmanje jedna provjera nije prošla, ili zatraženi popravak nije uspio. |
| `2` | Pogreška uporabe: pokretanje popravka bez `--yes` (`--preview` to ne zahtijeva), nepoznati ID popravka, nepoznati oblik izlaza, nepodržana kombinacija `--symptom` i oblika izlaza, ili instalacija sustava Cacti koju nije moguće pronaći. |

Cacti povećava `memory_limit` za svaku CLI skriptu, pa je provjera PHP konfiguracije izvođenja smislena samo na mrežnoj stranici.

## Zakazane provjere i obavijesti

Pod **Konfiguracija > Postavke > Doctor** uključite **Izvodi provjere po rasporedu** i odaberite interval od 15 minuta do jednog dana. Nakon svakog dospjelog ciklusa pollera, Doctor izvodi svaku provjeru u pozadinskom procesu tako da trajanje rada samog pollera ostaje nepromijenjeno.

Svako izvođenje bilježi promatrani status svake provjere. Aktivne iznimke upozorenja utječu na politiku obavješćivanja bez promjene tog promatranja. Kada provjera počne ili prestane padati, Doctor zapisuje promjenu u Cacti dnevnik te, ako je postavljeno polje **Adrese e-pošte za obavijesti**, šalje poruku na te adrese putem Cacti postavki e-pošte. **Obavijesti o upozorenjima** dodaje prijelaze u upozorenja i iz njih. Prvo izvođenje bilježi samo polazno stanje.

Zakazana izvješća izvode se na primarnom polleru pod savjetodavnim zaključavanjem baze podataka i imaju dvominutno vremensko ograničenje radnog procesa. Doctor izvješćuje o posljednjem pokretanju i uspješnom dovršetku kako bi nedostajući ili zastarjeli rezultati bili vidljivi. Rezultati se smatraju važećima za trajanje intervala plus jedan ciklus pollera i tri minute. Nedovršeno izvođenje ponavlja se nakon 5, 10, 20 i više minuta, do redovitog intervala. Neuspjele dostave obavijesti zadržavaju se do tri ponovna pokušaja sa sve duljim odgodama; nakon toga ispravite postavke e-pošte u sustavu Cacti i pokrenite `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` kao korisnik pollera. Prihvaćanje od strane poslužitelja pošte ne potvrđuje dostavu u dolazni sandučić.

Ista kartica određuje pragove za trajanje rada pollera (80% intervala), slobodni prostor pohrane RRA (upozorenje ispod 10%, pogreška ispod 2%), odstupanje sata baze podataka (upozorenje iznad 5 sekundi, pogreška iznad 60) i veličinu Cacti dnevnika (100 MB). Prazne ili nevaljane vrijednosti vraćaju se na ove zadane postavke.

## Integracija s nadzorom

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` ispisuje jedan redak statusa s podatcima o performansama i izlazi sa `0` (OK), `1` (WARNING) ili `2` (CRITICAL), tako da ga Nagios, Icinga ili bilo koji kompatibilan sustav može izravno pokretati. `--format=prometheus` zapisuje tekstualni oblik Prometheus za textfile sakupljač alata node_exporter: `cacti_doctor_check_status` po provjeri (0 za prolaz ili prihvaćeno upozorenje, 1 za djelatno upozorenje, 2 za pogrešku), `cacti_doctor_check_observed_status` prije iznimki, `cacti_doctor_check_accepted`, `cacti_doctor_checks` po statusu i `cacti_doctor_last_run_timestamp_seconds`. JSON retci provjera sadrže polje `assessment`; `not_assessed` znači da provjera nije mogla donijeti zaključak iz dostupnih podataka.

## Paket za podršku

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Paket je jedna tekstualna datoteka s inačicama dodatka Doctor, sustava Cacti, PHP-a, operacijskog sustava i baze podataka, statistikama pollera i Boosta, potpunim izvješćem te posljednjih 200 redaka Cacti dnevnika. Vrijednosti iza naziva za zaporku, tajnu, token, community i ključ su maskirane. Doctor stvara datoteku čitljivu samo njezinu vlasniku i odbija prebrisati postojeću datoteku. Pregledajte je prije nego što je bilo gdje objavite.

## Politika popravaka

Doctor uključuje jedan popravak, `runtime_directories`. On stvara nedostajuće Cacti direktorije izvođenja i dodaje vlasniku ovlasti čitanja, pisanja i izvršavanja bez uklanjanja postojećih ovlasti.

Cilja `$cache_path`, `$log_path` i `$rra_path` u sustavu Cacti 1.3, odnosno instalacijske direktorije `cache`, `log` i `rra` na starijim inačicama. Preskače direktorije u koje se već može pisati, odbija direktorije izvan instalacije sustava Cacti (primjerice direktorij dnevnika pod `/var/log`), odbija simboličke poveznice i odbija izvođenje kao root. Nikada ne slijedi `path_cactilog`, tako da datoteka dnevnika konfigurirana unutar direktorija koda ne može preusmjeriti popravak onamo. Dijagnostika na svakom izdanju i dalje provjerava direktorij konfigurirane datoteke dnevnika.

Ne mijenja vlasništvo, ne izvršava naredbe ljuske, ne prepravlja konfiguraciju i ne mijenja aplikacijske podatke sustava Cacti. Svaki novi popravak mora sadržavati dijagnostiku, rukovatelj s popisa dopuštenih radnji, potvrdu, revizijsko bilježenje i testove.

## Istraživanje simptoma

Operateri i administratori na stranici Doctor mogu odabrati **Istraži simptom**. Ista su pravila dostupna putem opcije `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` ili `alerts_missing`, uz tekstualni ili JSON izlaz. Paketi za podršku sadrže relevantna istraživanja simptoma.

Svaki kandidat navodi promatrane provjere i sljedeći korak provjere. Kandidati su pretpostavke, a ne potvrđeni temeljni uzroci. Nedostajuća, neocijenjena ili zastarjela promatranja nikada ne utvrđuju uzrok. Mrežna istraživanja koriste izvješće filtrirano prema ovlastima; CLI izvješća koriste pristup računa operacijskog sustava.

## Svježina RRD ažuriranja

`filesystem.rrd_stale` provjerava do 500 aktivnih izvora podataka, isključujući onemogućene i nedostupne uređaje. Na većim instalacijama uzorak se mijenja svaki sat pa uzastopna izvođenja pokrivaju različite datoteke. Uspoređuje vremena izmjene datoteka s najvećom vrijednošću između intervala pollera, RRD koraka izvora i koraka profila, pomnoženom s **Intervali zastarjelosti RRD datoteka** (zadano 3). Prikazuje tri najstarije zastarjele datoteke i broj zahvaćenih uređaja. Mrežni rezultati uključuju samo dopuštene uređaje.

`filesystem.rrd_files` zasebna je provjera postojanja. Traži RRD datoteku za do 5.000 aktivnih izvora podataka, uključujući one na onemogućenim ili nedostupnim uređajima, i koristi isti satni uzorak.

Boost dodaje dvostruku vrijednost svojeg konfiguriranog intervala pražnjenja kao dopušteno kašnjenje zapisa na pohranu. Za drugi sustav odgođenog zapisa konfigurirajte **Dopušteno kašnjenje odgođenog RRD zapisa (sekunde)**. Objavljena varijabla `RRDCACHED_ADDRESS` bez dopuštenog kašnjenja, ili nevaljani Boost interval, daje neocijenjen rezultat. Doctor nikada ne prazni predmemoriju radi provođenja ove provjere. Vrijeme izmjene dokaz je aktivnosti pohrane, a ne dokaz uspješnog prikupljanja podataka. Vanjsko predmemoriranje koje Doctor ne može otkriti mora biti izričito konfigurirano.

Nedostajuće, nečitljive i datoteke s datumom u budućnosti ubrajaju se u pojedinosti. Rezultat je neocijenjen samo kada nijedna datoteka iz uzorka nije čitljiva. Rezultat temeljen na uzorku navodi da pokriva samo dio instalacije; prolaz ne obuhvaća datoteke izvan uzorka.

## Pretpregledi popravaka i povijest revizije

Administratorska stranica za popravke prikazuje svaku zahvaćenu putanju, predloženu radnju, trenutačne ovlasti i ciljne ovlasti. Odobrenje je vezano uz taj pretpregled, korisnika koji postupa i vijek trajanja od pet minuta. Potvrda troši pretpregled; promijenjeni datotečni sustav zahtijeva novi pretpregled. Izvođenje kao root, putanje izvan instalacije, poveznice kojima je potreban popravak i neispunjene ovlasti datotečnog sustava sprječavaju odobrenje.

`--repair=runtime_directories --preview` ispisuje JSON plan samo za čitanje. `--repair=runtime_directories --yes` odobrava svježe izračunani CLI plan i ponovno ga provjerava prije izvršavanja. CLI račun već mora biti ovlašten za popravak instalacije; ne nasljeđuje mrežne uloge.

Strukturirani zapis `repair.started` mora biti spremljen prije svake izmjene datotečnog sustava. Povezani zapis `repair.completed` sadrži snimku nakon popravka i ishod provjere. Prekinuta radnja ostavlja zapis početka za daljnje istraživanje. Pogreška završnog revizijskog zapisa prijavljuje se kao neuspjeh čak i ako su izmjene na datotečnom sustavu provedene. Doctor dodaje vlasničke ovlasti i stvara direktorije; ne pokušava automatsko poništavanje promjena.

Administratori s Cacti ovlasti Postavke/Sistemski alati mogu pregledati posljednjih 20 revizijskih unosa na stranici Doctor. Dodatak čuva posljednjih 200 zapisa u tablici `plugin_doctor_audit`; Cacti dnevnik također bilježi njihove ID-ove, radnje i izvršitelje. Sadržaj revizijskih zapisa je redigiran.

## Prihvaćena upozorenja

Administratori s Cacti ovlasti Postavke/Sistemski alati mogu stvoriti **Iznimku upozorenja** iz svježeg, ocijenjenog upozorenja na stranici Doctor. Iznimka zahtijeva vlasnika, razlog i UTC datum pregleda unutar 90 dana. Istječe u ponoć UTC na početku tog datuma. Moguće je konfigurirati do 100 iznimki. Popis prikazuje istekle unose i ID-ove koji nisu prisutni u trenutačnom izvješću te omogućuje uklanjanje.

Promatrano upozorenje ostaje vidljivo, zajedno s vlasnikom, razlogom i datumom isteka u dijagnostičkim pojedinostima. JSON zadržava promatrani status i dodaje metapodatke `accepted` i `acceptance`. Nagios isključuje aktivna prihvaćena upozorenja iz svoje izlazne razine ozbiljnosti, ali ih navodi u svojem izlazu. Prometheus izvozi i promatranu i djelatnu razinu ozbiljnosti. Uobičajeni CLI izlazni status ostaje nepromijenjen: upozorenja već vraćaju nulu, a pogreške jedan.

Zakazane obavijesti o upozorenjima potiskuju se dok iznimka vrijedi; istek ili uklanjanje ponovno čini trajno upozorenje prihvatljivim za obavijesti. Prijelazi u pogrešku i oporavak od pogreške ostaju prihvatljivi za obavijesti. Neocijenjen rezultat ili pogreška ne mogu se prihvatiti. Osobna potvrda zasebna je i ništa ne potiskuje. Stvaranje i uklanjanje iznimki izvode se transakcijski zajedno s revizijskim zapisom.

Nadogradnja stvara tablice `plugin_doctor_audit` i `plugin_doctor_acceptance` bez izmjene aplikacijskih podataka sustava Cacti. Izvezite povijest koja vam je potrebna prije deinstalacije: deinstalacija uklanja obje tablice dodatka i njegove postavke. Vraćanje datoteka dodatka ostavlja tablice dostupnima za istraživanje, no starije inačice ne uvažavaju iznimke upozorenja.

## Zahtjevi

| Cacti | PHP | Napomene |
|---|---|---|
| 1.2.20 | 5.4 ili noviji | Vlastiti kod dodatka Doctor kompatibilan je s inačicom PHP 5.4 kako bi mogao dijagnosticirati starije sustave prije nadogradnje |
| 1.2.31 | 8.0 ili noviji | Cacti `composer.json` zahtijeva `>=8.0` |
| Trenutačni 1.2.x | 8.2 ili noviji | Cacti `composer.json` zahtijeva `>=8.2` |
| `develop` (1.3) | 8.3 ili noviji | Cacti `composer.json` zahtijeva `^8.3` |

Redak **Kompatibilnost PHP-a s instaliranim sustavom Cacti** uspoređuje aktivnu inačicu PHP-a s PHP zahtjevom u korijenskoj datoteci `composer.json` sustava Cacti, uključujući gornju granicu ograničenja sa znakom `^` poput `^8.3`. Konfigurirana izvršna datoteka PHP CLI provjerava se prema istom zahtjevu. Doctor prepoznaje oblike ograničenja `>=` i `^` kojima se koriste ovi Cacti paketi. Nečitljiv, neispravan, nedostajući ili neprepoznat zahtjev daje upozorenje; instalacije sustava Cacti 1.2.20–1.2.30 bez manifesta zadržavaju svoj dokumentirani minimum PHP 5.4 instalacijskog programa. Vlastita PHP 5.4 kompatibilnost dodatka Doctor ne dokazuje kompatibilnost s novijom instalacijom sustava Cacti.

Redak **Uzvodna sigurnosna podrška za PHP** odgovara na zasebno pitanje: prima li ta grana izdanja PHP-a još uvijek sigurnosne popravke od projekta PHP? Izvješćuje o objavljenom datumu završetka sigurnosne podrške grane i upozorava nakon tog datuma. Primjerice, PHP 8.1 može zadovoljiti zahtjev izvođenja starije instalacije sustava Cacti dok više ne prima uzvodne sigurnosne popravke. Prolazni rezultat ne znači da je instalirana zakrpa najnovija, a Doctor ne može utvrditi isporučuje li dobavljač operacijskog sustava prenesene sigurnosne popravke.

Datumi podrške ugrađeni su u Doctor iz [rasporeda podrške za PHP](https://www.php.net/supported-versions.php) i [popisa inačica kojima je istekla podrška](https://www.php.net/eol.php), posljednji put provjereno 2026-11-08. Nepoznate grane i predizdanja daju upozorenje umjesto pretpostavljenog prolaza. Tijekom dijagnostike ne šalje se nijedan mrežni zahtjev. Ažurirajte podatke o podršci dodatka Doctor kada PHP objavi novi raspored. Postojeći JSON/nadzorni ID-ovi `php.version` i `php.security_baseline` ostaju nepromijenjeni.

## Razvoj

Skup jediničnih testova koristi Pest i izvodi se na inačici PHP 8.2 ili novijoj:

```console
composer install
composer test
```

Testovi zamjenjuju Cacti funkcije koje Doctor poziva malim zamjenama u `tests/CactiStubs.php`, pa se izvode bez instalacije sustava Cacti.

GitHub Actions pokreće četiri vrste provjera pri svakom slanju promjena i zahtjevu za povlačenje (pull request):

- `php -l` na svakoj PHP datoteci pod inačicama PHP 5.4, 5.6, 7.0, 7.1, 7.4 te od 8.0 do 8.4.
- Skup jediničnih testova na inačicama PHP 8.2, 8.3 i 8.4.
- `locales/build_gettext.sh --check`, koji ne prolazi ako je predložak prijevoda zastario, ako je katalog nepotpun ili sadrži nejasne (fuzzy) unose, ili ako se prevedeni binarni katalog razlikuje od svojeg izvora.
- Sedam integracijskih poslova koji instaliraju Cacti 1.2.20, trenutačnu granu 1.2.x i `develop` uz MySQL i MariaDB, kako s cmd.php tako i s pollerom Spine. Svaki posao instalira i omogućuje dodatak, pokreće potpuno CLI izvješće i provjerava shemu izvješća, zbrojeve sažetka, očekivane statuse i točan skup pogrešaka. Zatim kvari putanju izvršne datoteke i vremensku oznaku pollera, potvrđuje da su oba problema prijavljena, vraća ih u ispravno stanje, provjerava popravak i njegovu potvrdu te izvodi onemogućavanje, omogućavanje, deinstalaciju i ponovnu instalaciju. JSON izvješće čuva se kao artefakt kada posao ne uspije.

## Doprinos

Zahtjeve za povlačenje šaljite na granu `develop`. Produkcijske datoteke održavajte kompatibilnima s inačicom PHP 5.4 i pridržavajte se stila sustava Cacti: tabulatori, nizovi u jednostrukim navodnicima i pomoćne funkcije sustava Cacti poput `read_config_option()` i `db_fetch_cell()`. Dodajte jedinični test za svaku promjenu ponašanja, potpišite svoje potvrde promjena (`git commit -s`) i dodajte redak u `CHANGELOG.md`.

### Prijevodi

Omotajte svaku korisniku vidljivu poruku funkcijom `__('...', 'doctor')` (ili `__n()`, `__x()`, `__esc()`), a rečenici koja sadrži vrijednost dodijelite jedan niz za oblikovanje s uzastopnim rezerviranim mjestima `%s`/`%d` umjesto spajanja dijelova. Cacti funkcija `__()` oblikuje poruku samo kada sadrži specifikator oblika i ne podržava položajne oblike `%1$s`. Također pretvara `%%` u `%` prije oblikovanja, stoga nikada ne stavljajte doslovni znak postotka u poruku: proslijedite vrijednost s njezinim znakom kao argument (`__('Usage: %s', '50%', 'doctor')`). Retci dnevnika ostaju na engleskom: koristite `doctor_repair_message()` za tekst popravaka i `doctor_n_()` za poruke koje se bilježe u dnevnik i prevode tek pri prikazu. ID-ove provjera, JSON ključeve, ključne riječi statusa, izlaz za nadzor i retke dnevnika ostavite neprevedenima.

`locales/build_gettext.sh` ponovno stvara predložak `locales/po/cacti.pot`, spaja ga u svaki katalog `locales/po/<locale>.po` i prevodi u `locales/LC_MESSAGES/<locale>.mo`; u commit uvrstite sve tri datoteke. CI izvodi `sh locales/build_gettext.sh --check`, koji pada kada je predložak zastario ili kada katalogu nedostaje unos ili ima nejasan (fuzzy) unos, kada se rezervirano mjesto razlikuje ili kada je prevedena datoteka zastarjela. Izmijenjena poruka stoga zahtijeva ažuriranje svojih prijevoda u istom zahtjevu za povlačenje. Potreban je GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Novi jezik predstavlja nova datoteka `<locale>.po` imenovana u skladu s konvencijom lokaliteta sustava Cacti (primjerice `pt-BR`).

## Sigurnost

Sigurnosne ranjivosti prijavljujte privatno kako je opisano u [SECURITY.md](../../../SECURITY.md), a ne u javnim prijavama problema.

## Licencija

Copyright (C) 2026 Thomas Vincent. Objavljeno pod licencijom GNU General Public License, inačica 2 ili novija. Pogledajte [LICENSE](../../../LICENSE).
