<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktus ze stetoskopem. Diagnozuj. Naprawiaj. Monitoruj.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status bramki jakości"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licencja: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ i 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor to wtyczka dla Cacti, która diagnozuje instalację w jednym przebiegu i wprowadza drobne naprawy wyłącznie na żądanie administratora.

**Status: w fazie rozwoju, przed wersją 1.0.** Najnowsze wydanie to [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Niniejsza poprawka dodaje katalogi w języku hindi i arabskim oraz przetłumaczone podręczniki użytkownika do dostępnych w wersji 0.6.0 funkcji: dostępu ograniczonego rolami, diagnozy z przewodnikiem, zawężonych kontroli aktualności plików RRD, podglądu napraw i historii audytu, wyjątków dla zaakceptowanych ostrzeżeń oraz tłumaczeń. Szczegóły znajdują się w pliku [CHANGELOG.md](../../../CHANGELOG.md).

## Zrzuty ekranu

Ustawienia diagnostyki i harmonogramowania w odizolowanej instalacji demonstracyjnej
Cacti 1.2.31 działającej na PHP 8.3.36, w tym kontrole zgodności Cacti z PHP, wsparcia
bezpieczeństwa projektu nadrzędnego oraz kondycji bazy danych. Przedstawione tu
ostrzeżenia i błędy dotyczą tego środowiska demonstracyjnego.

![Tabela diagnostyczna wtyczki Doctor z wynikami zaliczenia, ostrzeżeń i błędów](../../screenshots/diagnostics.png)

![Ustawienia harmonogramu, alertów i progów wtyczki Doctor](../../screenshots/settings.png)

Problemy w Cacti zazwyczaj objawiają się symptomami: pustymi wykresami, zatrzymanym pollerem lub wtyczką, której nie można zainstalować. Przyczyną jest często niespełnione wymaganie wstępne, które uległo zmianie — na przykład brakujące rozszerzenie PHP w kompilacji CLI, katalog dzienników bez uprawnień do zapisu dla pollera, ścieżka RRDtool wskazująca niewłaściwy plik binarny lub baza danych pozbawiona tabel stref czasowych. Doctor bezpośrednio weryfikuje te wymagania wstępne i zgłasza każde z nich jako zaliczenie, ostrzeżenie lub błąd wraz z jednozdaniowym wyjaśnieniem wykrytego stanu. Ten sam raport jest dostępny na stronie WWW, w wierszu poleceń oraz w formacie JSON na potrzeby monitorowania.

## Zakres kontroli

| Obszar | Kontrole |
|---|---|
| Doctor | Czy sam Doctor jest uruchamiany z uprawnieniami roota, co powodowałoby, że kontrole uprawnień dotyczyłyby niewłaściwego konta |
| Cacti i PHP | Wersja Cacti, niedokończona przez instalator aktualizacja, włączone wtyczki z brakującymi plikami, zgodność wersji PHP z zainstalowanym pakietem Cacti, status wsparcia bezpieczeństwa PHP przez projekt nadrzędny |
| Rozszerzenia PHP | Wymagane rozszerzenia w PHP dla serwera WWW oraz w PHP CLI używanym przez poller, a także funkcje zalecane |
| Konfiguracja PHP | `memory_limit`, `max_execution_time` i `date.timezone` z wykorzystaniem własnych zaleceń Cacti |
| Baza danych | Łączność, wersja serwera względem zaleceń Cacti, zestaw znaków UTF-8, tabele stref czasowych, tabele podstawowe, rozbieżność zegara względem hosta PHP oraz ustawienia InnoDB oznaczane przez Cacti jako błędy |
| Kondycja bazy danych | Limit połączeń, odczyty z puli buforów, tabele tymczasowe na dysku, tworzenie wątków połączeń, wolne zapytania oraz oczekiwania na bufor dziennika InnoDB wraz z sugestiami strojenia zależnymi od obciążenia |
| System plików | Możliwość zapisu w katalogach pamięci podręcznej, dzienników i RRA; wolne miejsce na pliki RRD; aktywne źródła danych bez pliku RRD lub z opóźnionymi aktualizacjami plików; brak uprawnień do odczytu dla wszystkich w pliku `include/config.php`; możliwość zapisu do dziennika Cacti i kontrola jego nadmiernego rozmiaru |
| Pliki binarne | PHP CLI, RRDtool, `snmpget`, `snmpwalk` oraz Spine, jeśli jest skonfigurowanym pollerem, w tym weryfikacja wersji tam, gdzie Cacti ją określa |
| Dziennik | Błędy wśród najnowszych wpisów w dzienniku Cacti wraz z najczęściej powtarzającym się komunikatem |
| Urządzenia | Włączone urządzenia w stanie awarii lub odzyskiwania, trzy najdłużej niedostępne urządzenia wraz z ich ostatnim błędem oraz błąd krytyczny, gdy większość urządzeń jest jednocześnie niedostępna |
| Poller | Typ i interwał pollera, czas od ostatniego zakończenia głównego pollera, czas wykonania względem interwału, dane wyjściowe pollera, które nigdy nie trafiły do pliku RRD, zdalne pollery, które przestały raportować, zatrzymany mechanizm Boost oraz konfiguracja Spine wskazująca inną bazę danych |

Każda kontrola ma stabilny identyfikator, taki jak `database.timezone` czy `binary.rrdtool`, dzięki czemu skrypty mogą odwoływać się do poszczególnych wyników. Włączone wtyczki mogą dostarczać dodatkowe kontrole oraz załączniki do pakietu wsparcia za pomocą punktu zaczepienia `doctor_register_checks`, a Doctor udostępnia wtyczce `plugin_mcp` możliwości diagnostyczne tylko do odczytu za pośrednictwem `abilities_register`.

## Mapa kodu i testów

| Zachowanie | Implementacja | Pokrycie testami w tym repozytorium |
|---|---|---|
| Kontrole diagnostyczne i stabilne identyfikatory raportów | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Punkt zaczepienia kontroli wtyczek (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Możliwości diagnostyczne MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Dostęp ograniczony rolami i zredagowane raporty WWW | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Diagnozy objawów z przewodnikiem | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Aktualność plików RRD i obsługa zapisów odroczonych | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Podglądy napraw, historia audytu i zaakceptowane ostrzeżenia | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Kontrole harmonogramowane i zmiany statusu alertów | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Powyższe odniesienia wskazują implementację oraz pokrycie testami; nie oznaczają one,
że każde zadanie CI zakończyło się powodzeniem dla bieżącej rewizji. Przed wdrożeniem
należy sprawdzić przebieg przepływu pracy dla planowanej rewizji.

## Zalecenia dotyczące kondycji bazy danych

Natywny analizator PHP wtyczki Doctor odczytuje ustalony zestaw globalnych liczników MySQL lub MariaDB za pośrednictwem istniejącego połączenia Cacti z bazą danych. Wykonuje on dwa zapytania tylko do odczytu na raport, nie wymaga dodatkowych poświadczeń ani plików wykonywalnych i nigdy nie zmienia konfiguracji bazy danych. Kontrole te pojawiają się w raporcie WWW, CLI, JSON, danych wyjściowych dla monitorowania, pakiecie wsparcia oraz w harmonogramowanym śledzeniu statusu.

| ID kontroli | Warunek wyzwalający analizę |
|---|---|
| `database.health_sample` | Mniej niż 24 godziny od uruchomienia serwera lub polecenia `FLUSH STATUS`, albo niedostępny bądź niespójny czas pracy |
| `database.connection_capacity` | Bieżąca lub zarejestrowana szczytowa liczba połączeń wynosząca co najmniej 80% aktualnej wartości `max_connections` |
| `database.buffer_pool_reads` | Stosunek `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` wynoszący co najmniej 1%, przy co najmniej 10 000 żądań odczytu |
| `database.temporary_tables` | Stosunek `Created_tmp_disk_tables / Created_tmp_tables` wynoszący co najmniej 25%, przy co najmniej 1 000 tabel tymczasowych |
| `database.thread_cache` | Stosunek `Threads_created / Connections` wynoszący co najmniej 5%, przy co najmniej 1 000 prób połączeń i `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | Stosunek `Slow_queries / Queries` wynoszący co najmniej 1%, przy co najmniej 1 000 zapytań |
| `database.redo_log_waits` | Niezerowa wartość `Innodb_log_waits` |

Są to progi analityczne wtyczki Doctor, a nie docelowe wartości konfiguracyjne producenta. Z wyjątkiem limitu połączeń, zalecenia oparte na licznikach kumulatywnych wymagają powyższego okna obserwacji. Brakujące, niepoprawnie sformatowane, zduplikowane lub przekraczające zakres liczniki, niewystarczająca aktywność oraz nieobsługiwane tryby wątków generują ostrzeżenia zamiast oceny prawidłowej kondycji lub zalecenia strojenia. Ostrzeżenia mogą wpływać na status w Nagiosie oraz harmonogramowane alerty, gdy włączona jest opcja **Alert przy ostrzeżeniach**.

Zmierzone liczniki i sugestie należy analizować łącznie. Wartości kumulatywne nie określają bieżącego obciążenia; liczniki mogą mieć różną historię zerowania i nie stanowią atomowej migawki. Szczytowa liczba połączeń może odzwierciedlać starszy limit. Liczba wolnych zapytań zależy od parametru `long_query_time`, a licznik dyskowych tabel tymczasowych w MySQL może pomijać pliki mapowane w pamięci. Niski współczynnik nie dowodzi braku wąskiego gardła. Przed zmianą rozmiarów buforów lub limitów połączeń należy potwierdzić trendy przy reprezentatywnym obciążeniu, przejrzeć plany zapytań i ponowne wykorzystanie połączeń oraz zmierzyć zużycie pamięci na **hoście bazy danych**.

Jeśli metryki są niedostępne, należy sprawdzić obsługę po stronie serwera oraz dostęp konta Cacti do poleceń `SHOW GLOBAL STATUS` i `SHOW GLOBAL VARIABLES`; Doctor nie wymaga podwyższonych uprawnień. Definicje liczników pochodzą z [dokumentacji zmiennych statusu MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) oraz [dokumentacji zmiennych statusu MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Nie są używane żadne skrypty ani kod MySQLTuner.

Migracja schematu ani konfiguracji nie jest wymagana. Pliki wtyczki należy wdrożyć w standardowy sposób; przywrócenie poprzednich plików usuwa dodaną diagnostykę. Istniejący stan harmonogramu jest odświeżany przy kolejnym uruchomieniu.

## Jak zapewniane jest bezpieczeństwo

Narzędzie diagnostyczne działa z uprawnieniami pollera lub serwera WWW i odczytuje ścieżki z tabeli ustawień, dlatego musi zachowywać ostrożność w kwestii tego, co uruchamia i modyfikuje.

- Diagnostyka działa w trybie tylko do odczytu. Nigdy nie zmienia plików, ustawień ani danych.
- Doctor uruchamia skonfigurowany plik binarny wyłącznie wtedy, gdy jego nazwa pliku odpowiada oczekiwanemu programowi (`php`, `rrdtool`, `snmpget` lub `snmpwalk`). W przeciwnym razie każda osoba posiadająca uprawnienia do zapisu w tabeli ustawień mogłaby zdecydować, co uruchamia Doctor. Każda inna nazwa jest zgłaszana jako ostrzeżenie i nie jest wykonywana.
- Doctor nigdy nie uruchamia skonfigurowanych plików binarnych z uprawnieniami użytkownika root i informuje, gdy sam działa jako root.
- Naprawy pochodzą ze stałej listy dozwolonych operacji. Każda z nich wymaga uwierzytelnionego działania administratora w interfejsie WWW lub użycia flagi `--yes` w interfejsie CLI, a każda wykonana naprawa jest zapisywana w dzienniku Cacti.

## Wydania

Wersje są zgodne ze standardem SemVer i odpowiadają plikowi `INFO` wtyczki. Szczegółowe informacje na temat wyboru wersji, bramek CI, zawartości pakietu, sum kontrolnych oraz instrukcji wycofywania zmian zawiera opis [procesu wydawniczego](../../releasing.md).

## Instalacja

Pobierz plik `doctor-VERSION.tar.gz` lub `doctor-VERSION.zip` oraz `SHA256SUMS` ze strony
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Zweryfikuj sumę kontrolną SHA-256 archiwum, a następnie rozpakuj jego katalog `doctor/` do
katalogu `plugins/` w Cacti. Są to pakiety przeznaczone do instalacji; automatyczne archiwa
źródłowe serwisu GitHub mają inną nazwę katalogu. Aby uruchomić niewydany kod z gałęzi
`develop`, należy przeprowadzić instalację z kopii roboczej repozytorium.

W przypadku instalacji ze źródeł:

Sklonuj lub rozpakuj repozytorium jako `plugins/doctor` wewnątrz instalacji Cacti. Katalog musi mieć nazwę `doctor`, a nie `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Zainstaluj i włącz wtyczkę **Cacti Doctor** w sekcji **Configuration > Plugin Management**, a następnie nadaj uprawnienia do obszaru (realm) **Doctor Viewer**, **Doctor Operator** lub **Doctor Administrator** poprzez uprawnienia użytkowników lub grup w Cacti. Dotychczasowe uprawnienia **Cacti Doctor** zachowują po aktualizacji dostęp Administratora. Raport jest dostępny w sekcji **Utilities > Cacti Doctor**.

## Języki

Doctor dostarcza 48 nieangielskich katalogów tłumaczeń w `locales/po/` i `locales/LC_MESSAGES/`, obejmujących lokalizacje z grupy Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), afrykańskie (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), azjatyckie (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) oraz południowo-wschodnioeuropejskie (`bs-BA`, `hr-HR`, `sr-RS`). Cacti wyświetla dany katalog po włączeniu obsługi języków (**Configuration > Settings > General > Language Support**) i wybraniu przez użytkownika lokalizacji udostępnianej przez Cacti na liście wyboru języka; katalogi dla lokalizacji niewymienionych jeszcze na liście wyboru w Cacti zaczną działać po ich dodaniu przez Cacti. Strona WWW, ustawienia oraz komunikaty i treść raportu wypisywane przez interfejs wiersza poleceń używają języka Cacti; sam raport z wiersza poleceń korzysta z domyślnego języka Cacti, którym pozostaje angielski, o ile nie zostanie zmieniony.

Dane wyjściowe przeznaczone do odczytu maszynowego nigdy nie są tłumaczone: identyfikatory testów, klucze JSON i wartości statusów, dane wyjściowe dla `--format=nagios` i `--format=prometheus`, wpisy w dzienniku oraz nagłówki sekcji pakietu wsparcia pozostają w języku angielskim, aby skrypty i systemy monitorowania działały poprawnie niezależnie od wybranego języka. Pola tekstowe `summary` oraz `detail` każdego testu są jedyną tłumaczoną częścią raportu JSON.

W pakiecie znajduje się również katalog dla odmiany hiszpańskiego z Ameryki Łacińskiej (`es-419`), jednak ani Cacti 1.2, ani Cacti 1.3 nie posiada tej lokalizacji do wyboru, dlatego zacznie ona działać dopiero po jej dodaniu w Cacti. Do tego czasu należy wybrać język hiszpański (`es-ES`).

Cacti ładuje katalog tłumaczeń wtyczki ze ścieżki `plugins/doctor/locales/LC_MESSAGES/<locale>.mo`, używając `doctor` jako domeny tekstowej (text domain), zarówno w wersji 1.2.x, jak i 1.3 (wersja 1.3 ustala katalog wtyczek na podstawie konfigurowalnej ścieżki wtyczek).

## Poziomy dostępu

| Obszar (Realm) | Możliwości |
|---|---|
| Doctor Viewer | Odczyt najnowszych statusów zaplanowanych testów, czasu obserwacji, aktualności danych oraz niedawnej zagregowanej historii. Brak dostępu do poleceń diagnostycznych, szczegółowych danych, konfiguracji i napraw. |
| Doctor Operator | Uruchamianie raportu diagnostycznego z limitem czasu procesu wynoszącym 120 sekund, przeglądanie zredagowanych szczegółów oraz potwierdzanie wykrytych problemów. Brak możliwości zmiany ustawień i wykonywania napraw. |
| Doctor Administrator | Możliwości poziomu Operator oraz dostęp do istniejących napraw z listy dozwolonych operacji i ustawień wtyczki Doctor. Naprawy i ustawienia wymagają ponadto uprawnień Cacti do obszaru Settings/System Utilities. |

Menu Utilities otwiera stronę odpowiadającą najwyższemu obszarowi Doctor przypisanemu użytkownikowi, z uwzględnieniem uprawnień grupowych. Nowe obszary Viewer oraz Operator nie otrzymują żadnych automatycznych przypisań. Pierwotny identyfikator obszaru pozostaje powiązany z plikiem `doctor.php` jako Administrator, co zachowuje dotychczasowy dostęp użytkowników i grup.

Dane dla poziomu Viewer pochodzą z zaplanowanych testów. Przed nadaniem dostępu Viewer należy włączyć harmonogram; brakujące lub przeterminowane obserwacje wyświetlają status **unknown**, nigdy status prawidłowy. Historia przechowuje ostatnie 20 zagregowanych zestawień z harmonogramu i nie obejmuje statusu urządzeń. Operatorzy uruchamiają nową diagnostykę jawnie; zwykłe odświeżenie strony korzysta z ostatniego raportu zapisanego w ich sesji.

Szczegóły urządzeń oraz sumy uwzględniają uprawnienia bieżącego użytkownika do urządzeń. Wyświetlanie fragmentów dziennika wymaga dodatkowo uprawnień Cacti do obszaru Log Administration. Poufne dane są maskowane przed zapisaniem szczegółów diagnostycznych w sesji WWW lub ich wyrenderowaniem. Dostęp przez CLI nadal podlega uprawnieniom konta w systemie operacyjnym.

Potwierdzenia mają charakter osobisty i są zapisywane w dzienniku Cacti. Dotyczą one wyłącznie tego samego problemu i tych samych dowodów; zmiana dowodów wymaga ponownego potwierdzenia. Nigdy nie zmieniają statusu pass/warn/fail, nie wyciszają alertów ani nie oznaczają testu zakończonego niepowodzeniem jako prawidłowy. Jest to mechanizm odrębny od wyjątków akceptowanych ostrzeżeń, które wpływają na politykę alertów bez zmiany zaobserwowanego statusu i zostały opisane poniżej.

Każda operacja wymaga żądania POST oraz prawidłowego tokenu CSRF. Naprawy wyświetlają osobną stronę potwierdzenia z odnośnikiem Anuluj niewysyłającym formularza, a także zapisują w dzienniku Cacti użytkownika wykonującego operację oraz jej wynik.

## Wiersz poleceń

Uruchamiaj poniższe polecenia z katalogu głównego Cacti jako użytkownik pollera Cacti, a nie jako root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Wyjście tekstowe wypisuje jeden wiersz na test, zawierający jego status, kategorię, podsumowanie i szczegóły. Opcja `--json` wypisuje obiekt `summary` z liczbą poszczególnych statusów oraz tablicę `checks`, której elementy zawierają pola `id`, `category`, `status`, `summary`, `detail`, a także `repair`/`repairable`, jeśli ma zastosowanie naprawa z listy dozwolonych operacji.

| Kod wyjścia | Znaczenie |
|---|---|
| `0` | Żaden test nie zakończył się niepowodzeniem lub żądana naprawa powiodła się. Ostrzeżenia nie zmieniają kodu wyjścia. |
| `1` | Co najmniej jeden test zakończył się niepowodzeniem lub żądana naprawa nie powiodła się. |
| `2` | Błąd użycia: uruchomienie naprawy bez flagi `--yes` (`--preview` jej nie wymaga), nieznany identyfikator naprawy, nieznany format wyjściowy, nieobsługiwana kombinacja opcji `--symptom` lub formatu albo brak możliwości zlokalizowania instalacji Cacti. |

Cacti zwiększa limit `memory_limit` dla każdego skryptu CLI, dlatego sprawdzenie konfiguracji środowiska uruchomieniowego PHP ma znaczenie wyłącznie na stronie WWW.

## Zaplanowane testy i alerty

W sekcji **Configuration > Settings > Doctor** włącz opcję **Run Checks on a Schedule** i wybierz interwał od 15 minut do jednego dnia. Po każdym cyklu pollera, w którym przypada termin wykonania, Doctor uruchamia wszystkie testy w procesie w tle, dzięki czemu czas działania samego pollera pozostaje nienaruszony.

Każde uruchomienie zapisuje zaobserwowany status każdego testu. Aktywne wyjątki dla ostrzeżeń wpływają na politykę alertów bez zmiany samej obserwacji. Gdy test zaczyna lub przestaje kończyć się niepowodzeniem, Doctor zapisuje tę zmianę w dzienniku Cacti, a jeśli skonfigurowano **Alert Email Addresses**, wysyła wiadomość e-mail na podane adresy za pośrednictwem ustawień poczty Cacti. Opcja **Alert on Warnings** dodaje powiadomienia o przejściach w stan ostrzeżenia oraz wyjściu z niego. Pierwsze uruchomienie zapisuje wyłącznie punkt odniesienia.

Zaplanowane raporty są wykonywane na głównym pollerze z użyciem blokady doradczej bazy danych (advisory lock) i mają dwuminutowy limit czasu pracy procesu roboczego. Doctor raportuje czas ostatniego uruchomienia oraz pomyślnego zakończenia, dzięki czemu brakujące lub nieaktualne wyniki są widoczne. Wyniki są uznawane za aktualne przez czas równy interwałowi powiększonemu o jeden cykl odpytywania i trzy minuty. Uruchomienie, które nie zostanie ukończone, jest ponawiane po 5, 10, 20 i kolejnych minutach, aż do osiągnięcia standardowego interwału. Nieudane dostarczenie alertu jest przechowywane do maksymalnie trzech ponownych prób z rosnącymi opóźnieniami; po ich wyczerpaniu należy poprawić ustawienia poczty w Cacti i uruchomić polecenie `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` jako użytkownik pollera. Przyjęcie wiadomości przez serwer pocztowy nie potwierdza jej dostarczenia do skrzynki odbiorczej.

Ta sama karta określa progi dla czasu wykonania pollera (80% interwału), wolnego miejsca na dysku dla RRA (ostrzeżenie poniżej 10%, błąd poniżej 2%), rozbieżności zegara bazy danych (ostrzeżenie powyżej 5 sekund, błąd powyżej 60) oraz rozmiaru dziennika Cacti (100 MB). Puste lub nieprawidłowe wartości powodują powrót do tych ustawień domyślnych.

## Integracja z systemami monitorowania

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

Opcja `--format=nagios` wypisuje jeden wiersz statusu wraz z danymi wydajnościowymi i kończy działanie z kodem `0` (OK), `1` (WARNING) lub `2` (CRITICAL), dzięki czemu Nagios, Icinga lub dowolny zgodny system może uruchamiać ją bezpośrednio. Opcja `--format=prometheus` zapisuje dane w formacie tekstowym Prometheusa dla kolektora textfile programu node_exporter: `cacti_doctor_check_status` dla każdego testu (0 – zaliczony lub zaakceptowane ostrzeżenie, 1 – ostrzeżenie wymagające działania, 2 – niepowodzenie), `cacti_doctor_check_observed_status` przed zastosowaniem wyjątków, `cacti_doctor_check_accepted`, `cacti_doctor_checks` według statusu oraz `cacti_doctor_last_run_timestamp_seconds`. Wiersze testów w formacie JSON zawierają pole `assessment`; wartość `not_assessed` oznacza, że test nie mógł wyciągnąć wniosku na podstawie dostępnych danych.

## Pakiet wsparcia

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Pakiet stanowi pojedynczy plik tekstowy zawierający wersje wtyczki Doctor, Cacti, PHP, systemu operacyjnego i bazy danych, statystyki pollera oraz Boost, pełny raport, ewentualne załączniki pakietu wsparcia z wtyczek w sekcji `== Plugin attachments`, a także ostatnie 200 wierszy dziennika Cacti. Wartości występujące po nazwach pól password, secret, token, community i key są maskowane. Doctor tworzy plik z prawami odczytu wyłącznie dla jego właściciela i odmawia nadpisania istniejącego pliku. Przed opublikowaniem pliku w jakimkolwiek miejscu należy go przejrzeć.

## Polityka napraw

Doctor zawiera jedną operację naprawy: `runtime_directories`. Tworzy ona brakujące katalogi środowiska uruchomieniowego Cacti oraz dodaje bity odczytu, zapisu i wykonywania dla właściciela bez usuwania istniejących uprawnień.

Obejmuje ona ścieżki `$cache_path`, `$log_path` i `$rra_path` w Cacti 1.3 albo katalogi `cache`, `log` i `rra` danej instalacji w starszych wersjach. Pomija katalogi, do których możliwy jest już zapis, odrzuca katalogi spoza instalacji Cacti (takie jak katalog dzienników w `/var/log`), odrzuca dowiązania symboliczne oraz odmawia uruchomienia z uprawnieniami użytkownika root. Nigdy nie podąża za `path_cactilog`, dzięki czemu plik dziennika skonfigurowany wewnątrz katalogu z kodem nie może przekierować tam operacji naprawy. Diagnostyka nadal sprawdza katalog skonfigurowanego pliku dziennika w każdym wydaniu.

Nie zmienia własności plików, nie uruchamia poleceń powłoki, nie przepisuje konfiguracji ani nie modyfikuje danych aplikacji Cacti. Każda nowa operacja naprawy musi zawierać diagnostykę, procedurę obsługi umieszczoną na liście dozwolonych, potwierdzenie, rejestrowanie w dzienniku audytu oraz testy.

## Badanie objawów

Operatorzy i administratorzy mogą wybrać opcję **Investigate a symptom** na stronie Doctor. Te same reguły są dostępne za pomocą flagi `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` lub `alerts_missing`, z wyjściem w formacie tekstowym lub JSON. Pakiety pomocy technicznej zawierają odpowiednie analizy objawów.

Każdy kandydat zawiera listę zaobserwowanych testów oraz kolejny krok weryfikacji. Kandydaci są hipotezami, a nie potwierdzonymi przyczynami źródłowymi. Brakujące, nieocenione lub nieaktualne obserwacje nigdy nie dowodzą przyczyny. Analizy w interfejsie WWW korzystają z raportu filtrowanego według uprawnień; raporty CLI korzystają z dostępu konta systemu operacyjnego.

## Aktualność aktualizacji RRD

`filesystem.rrd_stale` sprawdza maksymalnie 500 aktywnych źródeł danych, z wyłączeniem urządzeń wyłączonych i niedostępnych. W większych instalacjach próbka zmienia się co godzinę, dzięki czemu kolejne uruchomienia obejmują inne pliki. Porównuje czasy modyfikacji plików z większą z wartości: interwału pollera, kroku źródłowego RRD i kroku profilu, pomnożoną przez **RRD Stale Intervals** (domyślnie 3). Wyświetla trzy najstarsze nieaktualne pliki oraz liczbę urządzeń objętych problemem. Wyniki w interfejsie WWW obejmują wyłącznie dozwolone urządzenia.

`filesystem.rrd_files` jest oddzielnym testem istnienia plików. Sprawdza obecność pliku RRD dla maksymalnie 5 000 aktywnych źródeł danych, w tym dla urządzeń wyłączonych lub niedostępnych, i korzysta z tej samej godzinowej próbki.

Boost dodaje dwukrotność skonfigurowanego interwału opróżniania jako margines zapisu na dysk. Dla innego mechanizmu opóźnionego zapisu należy skonfigurować opcję **Deferred RRD Write Allowance (seconds)**. Rozgłoszona zmienna `RRDCACHED_ADDRESS` bez marginesu lub nieprawidłowy interwał Boost daje wynik nieoceniony. Doctor nigdy nie opróżnia pamięci podręcznej w celu wykonania tego testu. Czas modyfikacji świadczy o aktywności dysku, a nie o powodzeniu zbierania danych. Zewnętrzne buforowanie, którego Doctor nie jest w stanie wykryć, musi zostać skonfigurowane jawnie.

Brakujące, nieczytelne oraz opatrzone przyszłą datą pliki są zliczane w szczegółach. Wynik jest nieoceniony tylko wtedy, gdy żaden plik z próbki nie jest czytelny. Wynik oparty na próbkowaniu informuje, że obejmuje jedynie część instalacji; wynik pozytywny nie obejmuje plików nieobjętych próbką.

## Podglądy napraw i historia audytu

Strona napraw administratora wyświetla każdą objętą ścieżkę, proponowaną akcję, bieżące uprawnienia oraz docelowe uprawnienia. Zatwierdzenie jest powiązane z tym podglądem, wykonującym je użytkownikiem oraz pięciominutowym okresem ważności. Potwierdzenie wykorzystuje podgląd; zmiana w systemie plików wymaga wygenerowania nowego podglądu. Uruchomienie jako root, ścieżki spoza instalacji, dowiązania wymagające naprawy oraz niespełnione uprawnienia systemu plików uniemożliwiają zatwierdzenie.

`--repair=runtime_directories --preview` wypisuje plan tylko do odczytu w formacie JSON. `--repair=runtime_directories --yes` zatwierdza świeżo obliczony plan CLI i ponownie go weryfikuje przed wykonaniem. Konto CLI musi mieć już uprawnienia do naprawy instalacji; nie dziedziczy ról z interfejsu WWW.

Ustrukturyzowany rekord `repair.started` musi zostać zapisany przed jakąkolwiek zmianą w systemie plików. Powiązany rekord `repair.completed` zawiera migawkę po naprawie oraz wynik weryfikacji. Przerwana operacja pozostawia rekord rozpoczęcia do celów analizy. Błąd zapisu audytu zakończenia jest zgłaszany jako niepowodzenie, nawet jeśli doszło do zmian w systemie plików. Doctor dodaje uprawnienia właściciela i tworzy katalogi; nie podejmuje próby automatycznego wycofania zmian.

Administratorzy posiadający uprawnienie Cacti Settings/System Utilities mogą przeglądać 20 najnowszych wpisów audytu na stronie Doctor. Wtyczka przechowuje 200 najnowszych rekordów w tabeli `plugin_doctor_audit`; dziennik Cacti rejestruje także ich identyfikatory, akcje i podmioty wykonujące. Zawartość wpisów audytu jest maskowana.

## Zaakceptowane ostrzeżenia

Administratorzy posiadający uprawnienie Cacti Settings/System Utilities mogą utworzyć wyjątek **Warning exception** na podstawie aktualnego, ocenionego ostrzeżenia na stronie Doctor. Wyjątek wymaga wskazania właściciela, uzasadnienia oraz daty przeglądu w czasie UTC w ciągu 90 dni. Wygasa on o północy czasu UTC na początku tej daty. Można skonfigurować maksymalnie 100 wyjątków. Lista wyświetla wygasłe wpisy oraz identyfikatory nieobecne w bieżącym raporcie i umożliwia ich usunięcie.

Zaobserwowane ostrzeżenie pozostaje widoczne wraz z jego właścicielem, uzasadnieniem i datą wygaśnięcia w szczegółach diagnostycznych. Format JSON zachowuje zaobserwowany status i dodaje metadane `accepted` oraz `acceptance`. Nagios wyklucza aktywne zaakceptowane ostrzeżenia z poziomu ważności kodu wyjścia, lecz wymienia je w swoich danych wyjściowych. Prometheus eksportuje zarówno poziom zaobserwowany, jak i wymagający działania. Standardowy kod wyjścia CLI pozostaje bez zmian: ostrzeżenia już kończą działanie z kodem zero, a błędy z kodem jeden.

Zaplanowane alerty ostrzegawcze są wstrzymywane na czas obowiązywania wyjątku; wygaśnięcie lub usunięcie sprawia, że utrzymujące się ostrzeżenie ponownie kwalifikuje się do alertów ostrzegawczych. Przejścia w stan błędu oraz powroty ze stanu błędu nadal kwalifikują się do alertów. Nie można zaakceptować wyniku nieocenionego ani błędu. Osobiste potwierdzenie jest odrębnym mechanizmem i niczego nie wstrzymuje. Tworzenie oraz usuwanie wyjątków jest wykonywane transakcyjnie wraz z zapisem rekordu audytu.

Aktualizacja tworzy tabele `plugin_doctor_audit` i `plugin_doctor_acceptance` bez zmiany danych aplikacji Cacti. Przed odinstalowaniem należy wyeksportować potrzebną historię: dezinstalacja usuwa obie tabele wtyczki oraz jej ustawienia. Przywrócenie starszych plików wtyczki pozostawia tabele dostępne do analizy, jednak starsze wersje nie honorują wyjątków ostrzeżeń.

## Kontrole wtyczek (`doctor_register_checks`)

Włączone wtyczki Cacti mogą dostarczać kontrole diagnostyczne tylko do odczytu oraz opcjonalne załączniki do pakietu wsparcia, rejestrując punkt zaczepienia `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor wywołuje włączone, niezintegrowane wtyczki zarejestrowane w `doctor_register_checks` (z pominięciem `doctor` i `cacti`), rozwiązując ścieżkę pliku punktu zaczepienia wyłącznie wewnątrz własnego katalogu danej wtyczki. Funkcja zwrotna otrzymuje `['mode' => 'run' | 'list', 'plugin' => '<slug>']` i zwraca listę deskryptorów kontroli albo strukturę z kluczem `checks` oraz opcjonalnym `attachments`:

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

Każdy deskryptor kontroli wtyczki jest weryfikowany przed dołączeniem:

- Wymagane klucze: `id`, `plugin`, `category`, `title`, `status`, `message`, `details` i `remediation`.
- `plugin` musi odpowiadać zarejestrowanej nazwie skróconej (slug) wtyczki (`[a-z0-9_]{1,64}`). `id` musi pasować do `[a-z0-9_.]{1,128}`, zaczynać się od `<plugin>.` i nie może kolidować z istniejącym identyfikatorem kontroli podstawowej lub wtyczki.
- `status` musi mieć wartość `ok`, `warn`, `fail` lub `info`. `ok` mapuje się na `pass` w raportach wtyczki Doctor; `info` ma charakter informacyjny i nie wywołuje błędów w CLI, Nagiosie, Prometheusie ani w zaplanowanych alertach.
- `category` (do 64 bajtów) i `title` (do 256 bajtów) muszą być niepustymi łańcuchami znaków bez znaków sterujących. `message` (niepusty, do 2048 bajtów) oraz `remediation` (do 2048 bajtów) muszą być łańcuchami znaków.
- `details` akceptuje łańcuch znaków (do 8192 bajtów) lub tablicę skalarną bądź zagnieżdżoną (maksymalna głębokość 4, rozmiar po zakodowaniu JSON do 16384 bajtów; obiekty i zasoby są odrzucane).
- Opcjonalne załączniki pakietu wsparcia wymagają niepustego pola `title` (do 128 bajtów, bez znaków sterujących) oraz łańcucha `content` o długości do 65536 bajtów (64 KiB).

Doctor narzuca limity 32 kontroli oraz 8 załączników na wtyczkę (łącznie 64 kontrole wtyczek i 32 załączniki). Każdy punkt zaczepienia wykonuje się w obrębie własnego bloku `try`/`catch`, dzięki czemu wyjątki lub dane niebędące tablicą są redagowane i zapisywane w dzienniku Cacti (kategoria `DOCTOR`) bez wpływu na kontrole podstawowe ani inne wtyczki. Niepoprawnie sformułowane deskryptory są odrzucane i rejestrowane w dzienniku, podczas gdy poprawne deskryptory z tej samej wtyczki nadal działają. Kontrole wtyczek są zawsze tylko do odczytu (`repairable: false`), a wartości tekstowe oraz wrażliwe klucze asocjacyjne są maskowane przed wyświetleniem, eksportem lub spakowaniem. Zweryfikowane kontrole wtyczek pojawiają się w interfejsie WWW, wyjściu tekstowym/JSON/Nagios/Prometheus w CLI, w śledzeniu zaplanowanego statusu oraz w pakietach wsparcia.

## Integracja z MCP (`abilities_register`)

Doctor rejestruje punkt zaczepienia `abilities_register` (`doctor_abilities_register` w `doctor_abilities.php`), dzięki czemu `plugin_mcp` wykrywa jego możliwości diagnostyczne, gdy obie wtyczki są włączone. Doctor rejestruje kategorię `diagnostics` (`Diagnostics`) oraz dwie możliwości tylko do odczytu, niedestrukcyjne i idempotentne:

| ID możliwości | Opcjonalne argumenty | Wyjście |
|---|---|---|
| `doctor-run-checks` | `category` (tekst, maks. 64 znaki), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) oraz do 256 zredagowanych wyników `findings` (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (tekst, maks. 64 znaki), `plugin` (tekst, maks. 64 znaki) | Do 256 pozycji `checks` (`id`, `plugin`, `category`, `title`) obejmujących wszystkie 45 wbudowanych kontroli oraz włączone kontrole wtyczek |

Obie możliwości działają wyłącznie w trybie tylko do odczytu i nigdy nie wykonują napraw. Oprócz własnych mechanizmów kontroli obszarów (realm) i udostępniania możliwości w `plugin_mcp` (możliwości wtyczek są domyślnie ukryte w MCP, dopóki administrator ich nie udostępni), Doctor wymaga, aby właściciel tokenu posiadał obszar **Doctor Viewer** lub wyższy obszar Doctor. `doctor-run-checks` ogranicza `devices.health` do urządzeń dozwolonych dla właściciela tokenu, dołącza `logging.recent_errors` tylko wtedy, gdy użytkownik posiada obszar Cacti 18 lub 19, pomija `filesystem.rrd_files` oraz dołącza ograniczone do urządzeń sprawdzenie `filesystem.rrd_stale` wyłącznie dla poziomu **Doctor Operator** lub **Doctor Administrator**.

## Wymagania

| Cacti | PHP | Uwagi |
|---|---|---|
| 1.2.20 | 5.4 lub nowsza | Własny kod wtyczki Doctor zachowuje zgodność z PHP 5.4, dzięki czemu może diagnozować starsze systemy przed aktualizacją |
| 1.2.31 | 8.0 lub nowsza | Plik `composer.json` Cacti wymaga `>=8.0` |
| Bieżąca 1.2.x | 8.2 lub nowsza | Plik `composer.json` Cacti wymaga `>=8.2` |
| `develop` (1.3) | 8.3 lub nowsza | Plik `composer.json` Cacti wymaga `^8.3` |

Wiersz **PHP compatibility with installed Cacti** porównuje uruchomioną wersję PHP z wymaganiem dotyczącym PHP w głównym pliku `composer.json` samego Cacti, uwzględniając górną granicę ograniczenia daszkowego, takiego jak `^8.3`. Skonfigurowany plik wykonywalny PHP CLI jest sprawdzany pod kątem tego samego wymagania. Doctor rozpoznaje formy ograniczeń `>=` i `^` używane przez te pakiety Cacti. Nieczytelne, zniekształcone, brakujące lub nierozpoznane wymaganie powoduje ostrzeżenie; instalacje Cacti 1.2.20–1.2.30 bez manifestu zachowują udokumentowany minimalny próg instalatora na poziomie PHP 5.4. Własna zgodność wtyczki Doctor z PHP 5.4 nie oznacza zgodności z nowszą instalacją Cacti.

Wiersz **PHP upstream security support** odpowiada na odrębne pytanie: czy dana gałąź wydania PHP nadal otrzymuje poprawki bezpieczeństwa od projektu PHP? Zgłasza opublikowaną datę zakończenia wsparcia bezpieczeństwa dla tej gałęzi i ostrzega po jej upływie. Przykładowo PHP 8.1 może spełniać wymagania uruchomieniowe starszej instalacji Cacti, mimo że nie otrzymuje już poprawek bezpieczeństwa ze źródła nadrzędnego. Wynik pozytywny nie oznacza, że zainstalowane wydanie poprawkowe jest aktualne, a Doctor nie potrafi ustalić, czy dostawca systemu operacyjnego dostarcza poprawki przeniesione wstecz.

Daty wsparcia są dołączone do wtyczki Doctor na podstawie [harmonogramu wsparcia PHP](https://www.php.net/supported-versions.php) oraz [listy zakończenia cyklu życia](https://www.php.net/eol.php), ostatnio sprawdzonych 2026-11-08. Nieznane gałęzie oraz wydania wstępne generują ostrzeżenie zamiast domniemanego wyniku pozytywnego. Podczas diagnostyki nie są wykonywane żadne żądania sieciowe. Po opublikowaniu nowego harmonogramu przez projekt PHP należy zaktualizować dane wsparcia we wtyczce Doctor. Istniejące identyfikatory JSON i monitorowania `php.version` oraz `php.security_baseline` pozostają bez zmian.

## Rozwój

Zestaw testów jednostkowych korzysta z narzędzia Pest, a analiza statyczna z PHPStan (poziom 6), oba działające w PHP 8.2 lub nowszym:

```console
composer install
composer phpstan
composer test
```

Testy zastępują funkcje Cacti wywoływane przez wtyczkę Doctor niewielkimi zaślepkami w pliku `tests/CactiStubs.php`, dzięki czemu działają bez instalacji Cacti.

GitHub Actions uruchamia pięć rodzajów kontroli przy każdym wypchnięciu zmian i pull requeście:

- Testy kontraktu pakowania wydań (`tests/test_release.py`) oraz budowanie archiwum (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, który kończy się niepowodzeniem w przypadku nieaktualnego szablonu tłumaczeń, niekompletnego lub niepewnego (fuzzy) katalogu albo skompilowanego katalogu różniącego się od swojego źródła.
- `php -l` na każdym pliku PHP w wersjach PHP 5.4, 5.6, 7.0, 7.1, 7.4 oraz od 8.0 do 8.4.
- `composer phpstan` (PHPStan poziom 6) oraz `composer test` (zestaw testów jednostkowych Pest) w wersjach PHP 8.2, 8.3 i 8.4.
- Siedem zadań integracyjnych instalujących Cacti 1.2.20, bieżącą gałąź 1.2.x oraz `develop` w połączeniu z bazami MySQL i MariaDB, zarówno dla cmd.php, jak i Spine. Każde zadanie instaluje i włącza wtyczkę, uruchamia pełny raport CLI oraz sprawdza schemat raportu, sumy podsumowania, oczekiwane statusy i dokładny zbiór błędów. Następnie uszkadza ścieżkę do pliku binarnego oraz znacznik czasu pollera, potwierdza zgłoszenie obu problemów, przywraca je, testuje operację naprawy wraz z jej potwierdzeniem oraz wykonuje wyłączenie, włączenie, odinstalowanie i ponowną instalację. W przypadku niepowodzenia zadania raport JSON jest zachowywany jako artefakt.

## Wkład w projekt

Pull requesty należy kierować do gałęzi `develop`. Pliki produkcyjne powinny zachowywać zgodność z PHP 5.4 oraz stosować konwencję stylu Cacti: tabulatory, łańcuchy znaków w apostrofach oraz funkcje pomocnicze Cacti, takie jak `read_config_option()` i `db_fetch_cell()`. Dla każdej zmiany zachowania należy dodać test jednostkowy, podpisać commity (`git commit -s`) oraz dodać wpis w pliku `CHANGELOG.md`.

### Tłumaczenia

Każdy komunikat widoczny dla użytkownika należy ująć w `__('...', 'doctor')` (lub `__n()`, `__x()`, `__esc()`), a zdanie zawierające wartość zapisać jako pojedynczy ciąg formatujący z kolejnymi symbolami zastępczymi `%s`/`%d`, zamiast łączyć fragmenty tekstu. Funkcja `__()` w Cacti formatuje komunikat tylko wtedy, gdy zawiera on specyfikator formatu, i nie obsługuje form pozycyjnych `%1$s`. Ponadto przed formatowaniem zamienia `%%` na `%`, dlatego w komunikacie nie należy nigdy umieszczać dosłownego znaku procentu — wartość wraz ze znakiem należy przekazać jako argument (`__('Usage: %s', '50%', 'doctor')`). Wpisy w logach pozostają w języku angielskim: dla komunikatów naprawczych należy używać `doctor_repair_message()`, a dla komunikatów, które są logowane i tłumaczone dopiero w miejscu wyświetlania — `doctor_n_()`. Identyfikatory sprawdzeń, klucze JSON, słowa kluczowe statusów, dane wyjściowe monitorowania oraz wpisy w logach powinny pozostać nieprzetłumaczone.

Skrypt `locales/build_gettext.sh` ponownie generuje szablon `locales/po/cacti.pot`, scala go z każdym katalogiem `locales/po/<locale>.po` i kompiluje `locales/LC_MESSAGES/<locale>.mo`; wszystkie trzy pliki należy zatwierdzić w repozytorium. System CI uruchamia polecenie `sh locales/build_gettext.sh --check`, które kończy się błędem, gdy szablon jest nieaktualny, w katalogu brakuje wpisu lub zawiera on wpis niepewny (fuzzy), różni się symbol zastępczy albo skompilowany plik jest nieaktualny. Zmiana komunikatu wymaga zatem zaktualizowania jego tłumaczeń w tym samym pull requeście. Wymagany jest pakiet GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Dodanie nowego języka polega na utworzeniu nowego pliku `<locale>.po` o nazwie zgodnej z konwencją ustawień regionalnych Cacti (na przykład `pt-BR`).

## Bezpieczeństwo

Podatności należy zgłaszać prywatnie zgodnie z opisem w pliku [SECURITY.md](../../../SECURITY.md), a nie w publicznych zgłoszeniach.

## Licencja

Copyright (C) 2026 Thomas Vincent. Udostępniono na licencji GNU General Public License w wersji 2 lub nowszej. Zobacz plik [LICENSE](../../../LICENSE).
