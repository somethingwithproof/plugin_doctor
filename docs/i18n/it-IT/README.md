<!-- Source: README.md; SHA256: ee03c7ac68aca21c8155c29b5b43a1f206c2f0c379c8b07bb4113919c18aafde -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: un cactus con uno stetoscopio. Diagnostica. Ripara. Monitora.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Stato Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licenza: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ e 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor è un plugin per Cacti che esegue la diagnostica di un'installazione in un unico passaggio e applica piccole riparazioni solo quando un amministratore le richiede.

**Stato: in fase di sviluppo, precedente alla 1.0.** L'ultima versione rilasciata è la [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Questa patch aggiunge i cataloghi in hindi e arabo e le guide utente tradotte alle funzionalità della versione 0.6.0: accesso basato sui ruoli, diagnosi guidata, controlli mirati di aggiornamento RRD, anteprime di riparazione e cronologia di audit, eccezioni per avvisi accettati e traduzioni. Consultare [CHANGELOG.md](../../../CHANGELOG.md) per i dettagli.

## Schermate

Impostazioni di diagnostica e pianificazione in un'installazione dimostrativa
isolata di Cacti 1.2.31 con PHP 8.3.36, inclusi i controlli di compatibilità
PHP di Cacti, supporto di sicurezza upstream e stato di salute del database.
Gli avvisi e gli errori mostrati qui descrivono tale ambiente dimostrativo.

![Tabella diagnostica di Doctor con esiti positivi, avvisi ed errori](../../screenshots/diagnostics.png)

![Impostazioni di pianificazione, avvisi e soglie di Doctor](../../screenshots/settings.png)

I problemi di Cacti si manifestano solitamente come sintomi: grafici vuoti, un poller bloccato o un plugin che non si installa. La causa è spesso un prerequisito che ha subito una variazione, come un'estensione PHP mancante nella build CLI, una directory di log su cui il poller non può scrivere, un percorso RRDtool che punta al binario sbagliato o un database privo delle tabelle dei fusi orari. Doctor verifica direttamente tali prerequisiti e segnala ciascuno di essi come superato, avviso o errore con una frase che spiega quanto rilevato. Lo stesso report è disponibile su una pagina web, da riga di comando e in formato JSON per il monitoraggio.

## Cosa viene controllato

| Area | Controlli |
|---|---|
| Doctor | Se Doctor stesso viene eseguito come root, il che farebbe sì che i controlli dei permessi descrivano l'account sbagliato |
| Cacti e PHP | Versione di Cacti, un aggiornamento mai completato dall'installer, plugin abilitati i cui file risultano mancanti, compatibilità di PHP con il pacchetto Cacti installato, stato del supporto di sicurezza upstream di PHP |
| Estensioni PHP | Estensioni richieste nel PHP web e nel PHP CLI utilizzato dal poller, oltre alle funzionalità consigliate |
| Configurazione PHP | `memory_limit`, `max_execution_time` e `date.timezone`, utilizzando le raccomandazioni ufficiali di Cacti |
| Database | Connettività, versione del server rispetto alla raccomandazione di Cacti, set di caratteri UTF-8, tabelle dei fusi orari, tabelle principali, disallineamento dell'orologio rispetto all'host PHP e impostazioni InnoDB che Cacti segnala come errori |
| Stato di salute del database | Capacità di connessione, letture dal buffer pool, tabelle temporanee su disco, creazione dei thread di connessione, istruzioni lente e attese sul log buffer di InnoDB, con suggerimenti di ottimizzazione dipendenti dal carico di lavoro |
| Filesystem | Scrivibilità delle directory di cache, log e RRA; spazio libero per i file RRD; origini dati attive prive di file RRD o con aggiornamenti dei file scaduti; `include/config.php` non leggibile da tutti gli utenti; log di Cacti scrivibile e non eccessivamente grande |
| Binari | PHP CLI, RRDtool, `snmpget`, `snmpwalk` e Spine quando è il poller configurato, incluse le versioni laddove Cacti ne indichi una |
| Log | Errori tra le righe più recenti del log di Cacti, con il messaggio più frequente |
| Dispositivi | Dispositivi abilitati in stato down o in fase di ripristino, i tre in stato down da più tempo con il rispettivo ultimo errore e una segnalazione di errore quando la maggior parte dei dispositivi risulta down contemporaneamente |
| Poller | Tipo e intervallo del poller, tempo trascorso dall'ultimo completamento del poller principale, tempo di esecuzione rispetto all'intervallo, output del poller mai giunto a un file RRD, poller remoti che hanno smesso di inviare segnalazioni, un processo Boost bloccato e una configurazione di Spine che punta a un database diverso |

Ogni controllo dispone di un ID stabile, come `database.timezone` o `binary.rrdtool`, in modo che gli script possano fare riferimento ai singoli risultati.

## Mappa del codice e dei test

| Comportamento | Implementazione | Evidenza dei test in questo repository |
|---|---|---|
| Controlli diagnostici e ID di report stabili | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Accesso basato sui ruoli e report web oscurati | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Indagini guidate sui sintomi | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Aggiornamento RRD e gestione della scrittura differita | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Anteprime di riparazione, cronologia di audit e avvisi accettati | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Controlli pianificati e transizioni degli avvisi | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Questi riferimenti identificano l'implementazione e la copertura dei test; non
indicano che ogni job CI sia stato superato per la revisione corrente.
Verificare l'esecuzione del workflow per la revisione che si intende distribuire.

## Consigli sullo stato di salute del database

L'analizzatore PHP nativo di Doctor legge un insieme fisso di contatori globali MySQL o MariaDB tramite la connessione al database esistente di Cacti. Esegue due query di sola lettura per report, non richiede credenziali aggiuntive né eseguibili esterni e non modifica mai la configurazione del database. Questi controlli vengono visualizzati nel report web, nella CLI, in JSON, nell'output di monitoraggio, nel bundle di supporto e nel tracciamento dello stato pianificato.

| ID controllo | Condizione di attivazione dell'indagine |
|---|---|
| `database.health_sample` | Meno di 24 ore dall'avvio o da `FLUSH STATUS`, oppure uptime non disponibile o incoerente |
| `database.connection_capacity` | Connessioni correnti o picco registrato pari ad almeno l'80% del valore corrente di `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` pari ad almeno l'1%, con almeno 10.000 richieste di lettura |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` pari ad almeno il 25%, con almeno 1.000 tabelle temporanee |
| `database.thread_cache` | `Threads_created / Connections` pari ad almeno il 5%, con almeno 1.000 tentativi di connessione e `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` pari ad almeno l'1%, con almeno 1.000 istruzioni |
| `database.redo_log_waits` | `Innodb_log_waits` diverso da zero |

Queste sono le soglie di indagine di Doctor, non obiettivi di configurazione del fornitore. Fatta eccezione per la capacità di connessione, i consigli cumulativi richiedono la finestra di osservazione indicata sopra. Contatori mancanti, malformati, duplicati o fuori scala, attività insufficiente e modalità di thread non supportate generano avvisi anziché un esito positivo o un suggerimento di ottimizzazione. Gli avvisi possono influire sullo stato Nagios e sugli avvisi pianificati quando è abilitata l'opzione **Alert on Warnings**.

Leggere insieme i contatori misurati e il suggerimento. I valori cumulativi non stabiliscono il carico attuale; i contatori possono avere storie di azzeramento diverse e non costituiscono un'istantanea atomica. Il picco delle connessioni può riflettere un limite precedente. I conteggi delle query lente dipendono da `long_query_time` e il contatore delle tabelle temporanee su disco di MySQL può omettere i file mappati in memoria. Un rapporto basso non dimostra l'assenza di un collo di bottiglia. Verificare le tendenze sotto un carico di lavoro rappresentativo, esaminare i piani di esecuzione delle query e il riutilizzo delle connessioni e misurare la memoria sull'**host del database** prima di modificare i buffer o i limiti di connessione.

Se le metriche non sono disponibili, verificare il supporto del server e l'accesso dell'account di Cacti a `SHOW GLOBAL STATUS` e `SHOW GLOBAL VARIABLES`; Doctor non richiede credenziali elevate. Le definizioni dei contatori provengono dal [riferimento alle variabili di stato di MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) e dal [riferimento alle variabili di stato di MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Non viene utilizzato alcuno script o codice di MySQLTuner.

Non è necessaria alcuna migrazione dello schema o della configurazione. Distribuire normalmente i file del plugin; il ripristino di tali file rimuove i controlli diagnostici aggiunti. Lo stato pianificato esistente viene aggiornato all'esecuzione successiva.

## Come garantisce la sicurezza

Uno strumento diagnostico viene eseguito con i privilegi del poller o del server web e legge i percorsi dalla tabella delle impostazioni; deve quindi prestare molta attenzione a ciò che esegue e modifica.

- I controlli diagnostici sono di sola lettura: non modificano mai file, impostazioni o dati.
- Doctor esegue un binario configurato solo quando il relativo nome file corrisponde al programma previsto (`php`, `rrdtool`, `snmpget` o `snmpwalk`). In caso contrario, chiunque disponga dei permessi di scrittura sulla tabella delle impostazioni potrebbe scegliere quali comandi fare eseguire a Doctor. Qualsiasi altro nome viene segnalato come avviso e non viene eseguito.
- Doctor non esegue mai i binari configurati come utente root e segnala quando è in esecuzione come root.
- Le operazioni di ripristino provengono da un elenco fisso di operazioni consentite (allow-list). Ciascuna richiede un'azione autenticata da parte di un amministratore nell'interfaccia web oppure il flag `--yes` nella CLI, e viene registrata nel log di Cacti.

## Rilasci

Le versioni seguono la specifica SemVer e corrispondono al file `INFO` del plugin. Consultare la documentazione sul
[processo di rilascio](../../releasing.md) per informazioni sulla scelta della versione, sui controlli CI, sul contenuto
dei pacchetti, sui checksum e sulle istruzioni di rollback.

## Installazione

Scaricare `doctor-VERSION.tar.gz` o `doctor-VERSION.zip` insieme a `SHA256SUMS` da
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Verificare il checksum SHA-256 dell'archivio, quindi estrarre la directory `doctor/` nella
directory `plugins/` di Cacti. Questi sono i pacchetti installabili; gli archivi sorgente
generati automaticamente da GitHub hanno un nome di directory diverso. Per eseguire codice
non ancora rilasciato dal ramo `develop`, effettuare l'installazione da un checkout dei sorgenti.

Per i checkout dei sorgenti:

Clonare o decomprimere il repository come `plugins/doctor` all'interno di un'installazione di Cacti. La directory deve chiamarsi `doctor` e non `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Installare e abilitare **Cacti Doctor** da **Configurazione > Gestione plugin**, quindi assegnare un realm **Doctor Viewer**, **Doctor Operator** o **Doctor Administrator** tramite i permessi utente o di gruppo di Cacti. Le autorizzazioni **Cacti Doctor** già esistenti mantengono l'accesso Administrator dopo l'aggiornamento. Il report viene visualizzato in **Utilità > Cacti Doctor**.

## Lingue

Doctor include 48 cataloghi di traduzione non in inglese in `locales/po/` e `locales/LC_MESSAGES/` che coprono le localizzazioni Tier 1 estese (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), africane (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), asiatiche (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) e dell'Europa sud-orientale (`bs-BA`, `hr-HR`, `sr-RS`). Cacti mostra un catalogo quando il supporto linguistico è attivo (**Configurazione > Impostazioni > Generale > Supporto lingue**) e l'utente sceglie una localizzazione esposta da Cacti nel proprio selettore della lingua; i cataloghi per le localizzazioni non ancora elencate nel selettore di Cacti diventano effettivi non appena Cacti le aggiunge. La pagina web, le impostazioni e i messaggi nonché il testo del report stampato dalla riga di comando seguono la lingua di Cacti; il report da riga di comando utilizza la lingua predefinita di Cacti, che rimane l'inglese salvo diversa configurazione.

L'output leggibile dalle macchine non viene mai tradotto: gli ID dei controlli, le chiavi JSON e i valori di stato, l'output di `--format=nagios` e `--format=prometheus`, le righe di log e le intestazioni delle sezioni del pacchetto di supporto rimangono in inglese affinché gli script e i sistemi di monitoraggio continuino a funzionare in qualsiasi lingua. Il testo dei campi `summary` e `detail` di ciascun controllo è l'unica parte tradotta del report JSON.

È incluso anche un catalogo per lo spagnolo latinoamericano (`es-419`), ma né Cacti 1.2 né Cacti 1.3 dispongono di una locale selezionabile per lo spagnolo latinoamericano, pertanto entrerà in vigore solo quando Cacti ne aggiungerà una. Fino ad allora, selezionare lo spagnolo (`es-ES`).

Cacti carica il catalogo di un plugin da `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` utilizzando `doctor` come dominio di testo, sia nella versione 1.2.x sia nella 1.3 (la versione 1.3 risolve la directory dei plugin tramite il percorso configurabile dei plugin).

## Livelli di accesso

| Realm | Funzionalità |
|---|---|
| Doctor Viewer | Lettura degli ultimi stati dei controlli pianificati, dell'ora di osservazione, dell'aggiornamento dei dati e della cronologia aggregata recente. Nessun comando diagnostico, dettaglio non filtrato, configurazione o ripristino. |
| Doctor Operator | Esecuzione di un report diagnostico con un limite di processo di 120 secondi, ispezione dei dettagli oscurati e presa in carico delle segnalazioni. Nessuna modifica alle impostazioni né operazioni di ripristino. |
| Doctor Administrator | Tutte le funzionalità dell'Operatore più gli interventi di ripristino dell'allow-list esistente e le impostazioni di Doctor. I ripristini e le impostazioni richiedono inoltre il realm Impostazioni/Utilità di sistema di Cacti. |

Il menu Utilità apre la pagina corrispondente al realm Doctor più elevato assegnato all'utente, incluse le autorizzazioni di gruppo. I nuovi realm Viewer e Operator non ricevono alcuna autorizzazione automatica. L'ID del realm originale rimane associato a `doctor.php` come Administrator, preservando gli accessi utente e di gruppo esistenti.

I dati per il livello Viewer provengono dai controlli pianificati. Abilitare la pianificazione prima di concedere l'accesso Viewer; le osservazioni mancanti o scadute mostrano **unknown**, mai uno stato integro. La cronologia conserva gli ultimi 20 conteggi aggregati pianificati ed esclude lo stato dei dispositivi. Gli operatori avviano esplicitamente nuove analisi diagnostiche; i normali aggiornamenti della pagina utilizzano l'ultimo report della sessione.

I dettagli e i totali dei dispositivi utilizzano i permessi sui dispositivi dell'utente corrente. Gli estratti dei log richiedono inoltre il realm Amministrazione log di Cacti. I segreti vengono mascherati prima che i dettagli diagnostici vengano memorizzati nella sessione web o visualizzati. L'accesso tramite CLI continua a essere regolato dall'account del sistema operativo.

Le conferme di presa in carico sono personali e vengono registrate nel log di Cacti. Si applicano esclusivamente alla medesima segnalazione e alle stesse evidenze; se le evidenze cambiano, è necessaria una nuova conferma. Non modificano mai lo stato pass/warn/fail, non sopprimono gli avvisi e non contrassegnano come integro un controllo fallito. Questo meccanismo è distinto dalle eccezioni per avvisi accettati, che influiscono sulla politica di notifica senza alterare lo stato osservato e sono descritte di seguito.

Ogni azione richiede una richiesta POST e un token CSRF valido. Le operazioni di ripristino presentano una pagina di conferma separata con un collegamento Annulla che non invia il modulo, e registrano nel log di Cacti l'utente che esegue l'azione e il relativo esito.

## Riga di comando

Eseguire questi comandi dalla directory radice di Cacti come utente del poller di Cacti, non come root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

L'output testuale stampa una riga per ciascun controllo con relativo stato, categoria, riepilogo e dettaglio. `--json` stampa un oggetto `summary` con i conteggi degli stati e un array `checks` le cui voci contengono `id`, `category`, `status`, `summary`, `detail` e `repair`/`repairable` quando è applicabile un ripristino presente nell'allow-list.

| Codice di uscita | Significato |
|---|---|
| `0` | Nessun controllo fallito oppure il ripristino richiesto è riuscito. Gli avvisi non modificano il codice di uscita. |
| `1` | Almeno un controllo è fallito oppure un ripristino richiesto non è riuscito. |
| `2` | Errore di utilizzo: esecuzione di un ripristino senza `--yes` (`--preview` non lo richiede), ID di ripristino sconosciuto, formato di output sconosciuto, combinazione non supportata tra `--symptom` e formato oppure installazione di Cacti non individuabile. |

Cacti aumenta `memory_limit` per ogni script CLI, pertanto il controllo della configurazione di runtime PHP è significativo solo nella pagina web.

## Controlli pianificati e avvisi

In **Configurazione > Impostazioni > Doctor**, attivare **Esegui controlli in base a una pianificazione** e scegliere un intervallo da 15 minuti a un giorno. Al termine di ogni ciclo del poller giunto a scadenza, Doctor esegue tutti i controlli in un processo in background, in modo che il tempo di esecuzione del poller non ne risenta.

Ogni esecuzione registra lo stato osservato di ciascun controllo. Le eccezioni attive sugli avvisi influiscono sulla politica di notifica senza modificare tale osservazione. Quando un controllo inizia o smette di fallire, Doctor registra la variazione nel log di Cacti e, se è configurato **Indirizzi e-mail per gli avvisi**, invia un'e-mail a tali indirizzi tramite le impostazioni di posta di Cacti. **Avvisa in caso di avvisi** include le transizioni in ingresso e in uscita dallo stato di avviso. La prima esecuzione registra esclusivamente una baseline.

I report pianificati vengono eseguiti sul poller primario sotto un lock consultivo del database e hanno un limite di due minuti per il worker. Doctor segnala l'ultimo avvio e l'ultimo completamento riuscito in modo che eventuali risultati mancanti o obsoleti siano visibili. I risultati sono considerati aggiornati per la durata dell'intervallo più un ciclo di polling e tre minuti. Un'esecuzione non completata viene ritentata dopo 5, 10, 20 minuti e oltre, fino al raggiungimento dell'intervallo normale. Gli invii di avvisi non riusciti vengono conservati per un massimo di tre tentativi con ritardi crescenti; dopodiché, correggere le impostazioni di posta di Cacti ed eseguire `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` come utente del poller. L'accettazione da parte del server di posta non garantisce il recapito nella casella di posta.

La stessa scheda imposta le soglie per il tempo di esecuzione del poller (80% dell'intervallo), lo spazio libero su disco per i file RRA (avviso sotto il 10%, errore critico sotto il 2%), la deriva dell'orologio del database (avviso oltre i 5 secondi, errore critico oltre i 60) e la dimensione del log di Cacti (100 MB). I valori vuoti o non validi ripristinano questi valori predefiniti.

## Integrazione con il monitoraggio

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` stampa una singola riga di stato con i dati sulle prestazioni ed esce con codice `0` (OK), `1` (WARNING) o `2` (CRITICAL), consentendo l'esecuzione diretta da parte di Nagios, Icinga o qualsiasi sistema compatibile. `--format=prometheus` genera il formato testuale Prometheus per il textfile collector di node_exporter: `cacti_doctor_check_status` per singolo controllo (0 superato o avviso accettato, 1 avviso che richiede intervento, 2 fallimento), `cacti_doctor_check_observed_status` prima delle eccezioni, `cacti_doctor_check_accepted`, `cacti_doctor_checks` per stato e `cacti_doctor_last_run_timestamp_seconds`. Le righe dei controlli JSON includono un campo `assessment`; `not_assessed` indica che il controllo non ha potuto raggiungere una conclusione dai dati disponibili.

## Pacchetto di supporto

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Il pacchetto è un singolo file di testo contenente le versioni di Doctor, Cacti, PHP, sistema operativo e database, le statistiche del poller e di Boost, il report completo e le ultime 200 righe del log di Cacti. I valori che seguono nomi di password, secret, token, community e chiavi vengono mascherati. Doctor crea il file leggibile esclusivamente dal proprietario e rifiuta di sovrascrivere un file esistente. Esaminarlo attentamente prima di pubblicarlo altrove.

## Politica di riparazione

Doctor include una sola riparazione, `runtime_directories`. Crea le directory di runtime di Cacti mancanti e aggiunge i bit di lettura, scrittura ed esecuzione per il proprietario senza rimuovere i permessi esistenti.

Interviene su `$cache_path`, `$log_path` e `$rra_path` in Cacti 1.3, oppure sulle directory `cache`, `log` e `rra` dell'installazione nelle altre versioni. Ignora le directory già scrivibili, rifiuta le directory esterne all'installazione di Cacti (come una directory di log sotto `/var/log`), rifiuta i collegamenti simbolici e rifiuta l'esecuzione come root. Non segue mai `path_cactilog`, pertanto un file di log configurato all'interno di una directory di codice non può reindirizzare la riparazione in quella posizione. La diagnostica controlla comunque la directory del file di log configurato su ogni versione.

Non modifica la proprietà, non esegue comandi shell, non riscrive la configurazione e non altera i dati applicativi di Cacti. Ogni nuova riparazione deve includere una diagnostica, un gestore inserito in allow-list, una conferma, la registrazione di audit e dei test.

## Analisi dei sintomi

Gli operatori e gli amministratori possono selezionare **Analizza un sintomo** nella pagina di Doctor. Le stesse regole sono disponibili tramite `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` o `alerts_missing`, con output in formato testo o JSON. I pacchetti di supporto includono le analisi dei sintomi pertinenti.

Ogni candidato elenca i controlli osservati e il successivo passaggio di verifica. I candidati sono ipotesi, non cause principali confermate. Osservazioni mancanti, non valutate o obsolete non stabiliscono mai una causa. Le analisi via web utilizzano il report filtrato in base ai permessi; i report da CLI utilizzano l'accesso dell'account del sistema operativo.

## Aggiornamento dei file RRD

`filesystem.rrd_stale` controlla fino a 500 origini dati attive, escludendo i dispositivi disabilitati e inattivi. Sulle installazioni più grandi il campione cambia ogni ora, quindi esecuzioni ripetute coprono file diversi. Confronta i tempi di modifica dei file con il valore maggiore tra l'intervallo del poller, il passo dell'RRD di origine e il passo del profilo, moltiplicato per **Intervalli RRD obsoleti** (predefinito 3). Mostra i tre file obsoleti più vecchi e il numero di dispositivi interessati. I risultati web includono solo i dispositivi autorizzati.

`filesystem.rrd_files` è un controllo di esistenza separato. Verifica la presenza del file RRD per un massimo di 5.000 origini dati attive, incluse quelle su dispositivi disabilitati o inattivi, e utilizza lo stesso campione orario.

Boost aggiunge il doppio del proprio intervallo di flush configurato come margine di scrittura su disco. Per un altro sistema di scrittura differita, configurare **Margine di scrittura RRD differita (secondi)**. Un valore `RRDCACHED_ADDRESS` pubblicizzato senza un margine, oppure un intervallo Boost non valido, produce un risultato non valutato. Doctor non esegue mai il flush di una cache per effettuare questo controllo. L'ora di modifica attesta un'attività su disco, non il successo della raccolta dati. La memorizzazione nella cache esterna che Doctor non può rilevare deve essere configurata esplicitamente.

I file mancanti, illeggibili e con data futura sono conteggiati nei dettagli. Il risultato è non valutato solo quando nessun file campionato è leggibile. Un risultato campionato indica che copre solo una parte dell'installazione; un esito positivo non copre i file non campionati.

## Anteprime di riparazione e cronologia di audit

La pagina di riparazione dell'amministratore mostra ogni percorso interessato, l'azione proposta, i permessi attuali e i permessi di destinazione. L'approvazione è vincolata a tale anteprima, all'utente agente e a una validità di cinque minuti. La conferma consuma l'anteprima; una modifica del filesystem richiede una nuova anteprima. L'esecuzione come root, i percorsi esterni all'installazione, i collegamenti che richiedono riparazione e permessi di filesystem insufficienti impediscono l'approvazione.

`--repair=runtime_directories --preview` stampa un piano JSON di sola lettura. `--repair=runtime_directories --yes` approva un piano CLI appena calcolato e lo ricontrolla prima dell'esecuzione. L'account CLI deve essere già autorizzato a riparare l'installazione; non eredita i ruoli web.

Un record strutturato `repair.started` deve essere salvato prima di qualsiasi modifica al filesystem. Un record collegato `repair.completed` contiene l'istantanea successiva alla riparazione e il risultato della verifica. Un'operazione interrotta lascia un record di avvio per l'indagine. Un errore nella registrazione di completamento dell'audit viene segnalato come errore anche se le modifiche al filesystem sono avvenute. Doctor aggiunge i permessi del proprietario e crea directory; non tenta alcun rollback automatico.

Gli amministratori con il permesso Impostazioni/Utilità di sistema di Cacti possono leggere le ultime 20 voci di audit nella pagina di Doctor. Il plugin conserva gli ultimi 200 record in `plugin_doctor_audit`; anche il log di Cacti registra i relativi ID, le azioni e gli autori. I payload di audit vengono oscurati.

## Avvisi accettati

Gli amministratori con il permesso Impostazioni/Utilità di sistema di Cacti possono creare una **Eccezione avviso** a partire da un avviso recente e valutato nella pagina di Doctor. Un'eccezione richiede un proprietario, una motivazione e una data di revisione UTC entro 90 giorni. Scade alla mezzanotte UTC all'inizio di tale data. È possibile configurare fino a 100 eccezioni. L'elenco mostra le voci scadute e gli ID non presenti nel report corrente e ne consente la rimozione.

L'avviso osservato rimane visibile, con il proprietario, la motivazione e la scadenza nei dettagli diagnostici. Il JSON conserva lo stato osservato e aggiunge i metadati `accepted` e `acceptance`. Nagios esclude gli avvisi accettati attivi dalla gravità di uscita, ma li indica nel proprio output. Prometheus esporta sia la gravità osservata sia quella azionabile. Lo stato di uscita CLI ordinario rimane invariato: gli avvisi escono già con zero, gli errori escono con uno.

Gli avvisi pianificati per i warning vengono soppressi finché l'eccezione è valida; la scadenza o la rimozione rende nuovamente idoneo alle notifiche un avviso persistente. Le transizioni di errore e il ripristino da un errore restano idonei alle notifiche. Un risultato non valutato o un errore non può essere accettato. La conferma personale è separata e non sopprime nulla. La creazione e la rimozione delle eccezioni avvengono in transazione con il record di audit.

L'aggiornamento crea `plugin_doctor_audit` e `plugin_doctor_acceptance` senza modificare i dati applicativi di Cacti. Esportare la cronologia necessaria prima di disinstallare: la disinstallazione rimuove entrambe le tabelle del plugin e le sue impostazioni. Il ripristino dei file del plugin a una versione precedente lascia le tabelle disponibili per eventuali verifiche, ma le versioni precedenti non rispettano le eccezioni agli avvisi.

## Requisiti

| Cacti | PHP | Note |
|---|---|---|
| 1.2.20 | 5.4 o superiore | Il codice di Doctor è compatibile con PHP 5.4 in modo da poter diagnosticare i sistemi legacy prima di un aggiornamento |
| 1.2.31 | 8.0 o superiore | Il file `composer.json` di Cacti richiede `>=8.0` |
| 1.2.x attuale | 8.2 o superiore | Il file `composer.json` di Cacti richiede `>=8.2` |
| `develop` (1.3) | 8.3 o superiore | Il file `composer.json` di Cacti richiede `^8.3` |

La riga **Compatibilità PHP con Cacti installato** confronta la versione PHP in esecuzione con il requisito PHP nel file `composer.json` principale di Cacti, incluso il limite superiore di un vincolo caret come `^8.3`. L'eseguibile PHP CLI configurato viene verificato rispetto allo stesso requisito. Doctor riconosce le forme di vincolo `>=` e `^` utilizzate da questi pacchetti Cacti. Un requisito illeggibile, malformato, mancante o non riconosciuto produce un avviso; le installazioni di Cacti 1.2.20–1.2.30 prive di manifest mantengono la soglia minima documentata dell'installer di PHP 5.4. La compatibilità dello stesso Doctor con PHP 5.4 non implica la compatibilità con un'installazione di Cacti più recente.

La riga **Supporto di sicurezza upstream di PHP** risponde a una domanda diversa: quel ramo di rilascio di PHP riceve ancora correzioni di sicurezza dal progetto PHP? Riporta la data di fine del supporto di sicurezza pubblicata per il ramo e genera un avviso dopo tale data. Ad esempio, PHP 8.1 può soddisfare il requisito di runtime di un'installazione di Cacti precedente pur non ricevendo più correzioni di sicurezza upstream. Un risultato positivo non significa che la release patch installata sia aggiornata e Doctor non può determinare se un fornitore del sistema operativo distribuisca correzioni backportate.

Le date di supporto sono integrate in Doctor a partire dal [calendario di supporto di PHP](https://www.php.net/supported-versions.php) e dall'[elenco di fine supporto](https://www.php.net/eol.php), controllati l'ultima volta il 2026-11-08. I rami sconosciuti e le pre-release producono un avviso anziché un esito positivo presunto. Durante la diagnostica non viene effettuata alcuna richiesta di rete. Aggiornare i dati di supporto di Doctor quando PHP pubblica un nuovo calendario. Gli ID JSON/di monitoraggio esistenti `php.version` e `php.security_baseline` restano invariati.

## Sviluppo

La suite di test unitari utilizza Pest e viene eseguita su PHP 8.2 o superiore:

```console
composer install
composer test
```

I test sostituiscono le funzioni di Cacti chiamate da Doctor con piccoli stub in `tests/CactiStubs.php`, in modo da poter essere eseguiti senza un'installazione di Cacti.

GitHub Actions esegue quattro tipi di controlli a ogni push e pull request:

- `php -l` su ogni file PHP con PHP 5.4, 5.6, 7.0, 7.1, 7.4 e da 8.0 a 8.4.
- La suite di test unitari su PHP 8.2, 8.3 e 8.4.
- `locales/build_gettext.sh --check`, che fallisce in presenza di un template di traduzione obsoleto, di un catalogo incompleto o fuzzy, oppure di un catalogo compilato diverso dal relativo sorgente.
- Sette job di integrazione che installano Cacti 1.2.20, il ramo 1.2.x attuale e `develop` su MySQL e MariaDB, sia con cmd.php sia con Spine. Ogni job installa e abilita il plugin, esegue il report CLI completo e verifica lo schema del report, i totali riepilogativi, gli stati attesi e l'insieme esatto degli errori. Poi compromette il percorso di un binario e il timestamp del poller, conferma che entrambi vengano segnalati, li ripristina, verifica la riparazione e la relativa conferma ed esegue disabilitazione, abilitazione, disinstallazione e reinstallazione. Il report JSON viene conservato come artefatto quando un job fallisce.

## Contributi

Le pull request devono essere indirizzate a `develop`. Mantenere i file di produzione compatibili con PHP 5.4 e adottare lo stile di Cacti: tabulazioni, stringhe delimitate da apici singoli e funzioni helper di Cacti quali `read_config_option()` e `db_fetch_cell()`. Aggiungere un test unitario per ogni modifica comportamentale, firmare i commit (`git commit -s`) e aggiungere una riga a `CHANGELOG.md`.

### Traduzioni

Racchiudere ogni messaggio visibile all'utente in `__('...', 'doctor')` (oppure `__n()`, `__x()`, `__esc()`), e per le frasi che contengono un valore utilizzare un'unica stringa di formato con segnaposto sequenziali `%s`/`%d` anziché concatenare frammenti. La funzione `__()` di Cacti formatta un messaggio solo quando contiene uno specificatore di formato e non supporta le forme posizionali `%1$s`. Inoltre, converte `%%` in `%` prima della formattazione, quindi non inserire mai un simbolo di percentuale letterale in un messaggio: passare il valore comprensivo di simbolo come argomento (`__('Usage: %s', '50%', 'doctor')`). Le righe di log restano in inglese: utilizzare `doctor_repair_message()` per il testo di riparazione e `doctor_n_()` per i messaggi che vengono registrati nei log e tradotti solo dove vengono mostrati. Mantenere non tradotti gli ID dei controlli, le chiavi JSON, le parole chiave di stato, l'output di monitoraggio e le righe di log.

`locales/build_gettext.sh` rigenera il modello `locales/po/cacti.pot`, lo unisce in ciascun catalogo `locales/po/<locale>.po` e compila `locales/LC_MESSAGES/<locale>.mo`; eseguire il commit di tutti e tre i file. La CI esegue `sh locales/build_gettext.sh --check`, che fallisce quando il modello non è aggiornato, quando un catalogo presenta una voce mancante o contrassegnata come fuzzy, quando un segnaposto differisce o quando un file compilato è obsoleto. Un messaggio modificato richiede pertanto l'aggiornamento delle relative traduzioni nella stessa pull request. È necessario GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Una nuova lingua corrisponde a un nuovo file `<locale>.po` denominato secondo le convenzioni di Cacti per le impostazioni locali (ad esempio `pt-BR`).

## Sicurezza

Segnalare le vulnerabilità in privato come descritto in [SECURITY.md](../../../SECURITY.md), non nelle issue pubbliche.

## Licenza

Copyright (C) 2026 Thomas Vincent. Rilasciato sotto GNU General Public License, versione 2 o successiva. Consultare [LICENSE](../../../LICENSE).
