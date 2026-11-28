<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktus yang memakai stetoskop. Diagnosis. Baiki. Pantau.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status Gerbang Kualiti"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lesen: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ dan 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor ialah pemalam Cacti yang mendiagnosis pemasangan dalam satu laluan dan hanya melaksanakan pembaikan kecil apabila diminta oleh pentadbir.

**Status: dalam pembangunan, sebelum 1.0.** Keluaran terkini ialah [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Tampalan ini menambah katalog bahasa Hindi dan Arab serta panduan pengguna terjemahan kepada akses skop peranan, diagnosis berpandu, semakan kesegaran RRD berskop, pratonton pembaikan dan sejarah audit, pengecualian amaran yang diterima, serta terjemahan dalam 0.6.0. Lihat [CHANGELOG.md](../../../CHANGELOG.md) untuk butiran lanjut.

## Tangkapan skrin

Tetapan diagnostik dan penjadualan dalam pemasangan demonstrasi Cacti 1.2.31
terasing yang menjalankan PHP 8.3.36, termasuk semakan keserasian PHP Cacti,
sokongan keselamatan huluan dan kesihatan pangkalan data. Amaran dan kegagalan
yang dipaparkan di sini menerangkan persekitaran demo tersebut.

![Jadual diagnostik Doctor dengan keputusan lulus, amaran dan kegagalan](../../screenshots/diagnostics.png)

![Tetapan penjadualan, makluman dan ambang Doctor](../../screenshots/settings.png)

Masalah Cacti biasanya muncul sebagai simptom: graf kosong, peninjau (*poller*) yang terhenti, atau pemalam yang tidak dapat dipasang. Puncanya selalunya adalah prasyarat yang telah berubah, seperti sambungan PHP yang tiada dalam binaan CLI, direktori log yang tidak boleh ditulis oleh peninjau, laluan RRDtool yang menunjuk ke binari yang salah, atau pangkalan data tanpa jadual zon waktu. Doctor menyemak prasyarat tersebut secara langsung dan melaporkan setiap satunya sebagai lulus, amaran atau gagal dengan satu ayat yang menerangkan perkara yang ditemui. Laporan yang sama tersedia pada halaman web, baris perintah dan sebagai JSON untuk pemantauan.

## Perkara yang disemak

| Bidang | Semakan |
|---|---|
| Doctor | Sama ada Doctor sendiri dijalankan sebagai root, yang akan menyebabkan semakan kebenaran menerangkan akaun yang salah |
| Cacti dan PHP | Versi Cacti, naik taraf yang tidak pernah diselesaikan oleh pemasang, pemalam yang didayakan tetapi failnya tiada, keserasian PHP dengan pakej Cacti yang dipasang, status sokongan keselamatan huluan PHP |
| Sambungan PHP | Sambungan yang diperlukan dalam PHP web dan dalam PHP CLI yang digunakan oleh peninjau, serta ciri yang disyorkan |
| Konfigurasi PHP | `memory_limit`, `max_execution_time` dan `date.timezone`, menggunakan syor Cacti sendiri |
| Pangkalan data | Ketersambungan, versi pelayan berbanding syor Cacti, set aksara UTF-8, jadual zon waktu, jadual teras, hanyutan jam daripada hos PHP dan tetapan InnoDB yang ditandakan Cacti sebagai ralat |
| Kesihatan pangkalan data | Kapasiti sambungan, bacaan kumpulan penimbal, jadual sementara cakera, penciptaan benang sambungan, pernyataan perlahan dan tunggu penimbal log InnoDB, dengan cadangan penalaan yang bergantung pada beban kerja |
| Sistem fail | Direktori cache, log dan RRA yang boleh ditulis; ruang kosong untuk fail RRD; sumber data aktif tanpa fail RRD atau kemas kini fail yang tertunggak; `include/config.php` tidak boleh dibaca oleh semua pengguna; log Cacti boleh ditulis dan tidak bersaiz melampau |
| Binari | PHP CLI, RRDtool, `snmpget`, `snmpwalk` dan Spine apabila ia merupakan peninjau yang dikonfigurasikan, termasuk versi apabila Cacti menyatakannya |
| Log | Ralat dalam kalangan baris log Cacti terkini, dengan mesej yang paling kerap berlaku |
| Peranti | Peranti yang didayakan yang sedang tergendala atau dalam pemulihan, tiga peranti yang paling lama tergendala berserta ralat terakhirnya, dan kegagalan apabila kebanyakan peranti tergendala serentak |
| Peninjau (*Poller*) | Jenis dan selang peninjau, masa sejak peninjau utama selesai kali terakhir, masa jalanan berbanding selang, output peninjau yang tidak pernah sampai ke fail RRD, peninjau jauh yang berhenti melapor, Boost yang terhenti dan konfigurasi Spine yang menunjuk ke pangkalan data yang berbeza |

Setiap semakan mempunyai ID yang stabil, seperti `database.timezone` atau `binary.rrdtool`, supaya skrip boleh merujuk keputusan individu. Pemalam yang didayakan boleh menyumbangkan semakan tambahan dan lampiran himpunan sokongan melalui cangkuk `doctor_register_checks`, dan Doctor mendedahkan keupayaan diagnostik baca sahaja kepada `plugin_mcp` melalui `abilities_register`.

## Peta kod dan ujian

| Tingkah laku | Pelaksanaan | Bukti ujian dalam repositori ini |
|---|---|---|
| Semakan diagnostik dan ID laporan yang stabil | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Cangkuk semakan pemalam (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Keupayaan diagnostik MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Akses skop peranan dan laporan web yang disunting | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Penyiasatan simptom berpandu | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Kesegaran RRD dan pengendalian tulis tertunda | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Pratonton pembaikan, sejarah audit dan amaran yang diterima | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Semakan berjadual dan peralihan makluman | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Rujukan ini mengenal pasti pelaksanaan dan liputan ujian; ia tidak menyatakan
bahawa setiap tugas CI telah lulus bagi semakan semasa. Semak jalanan aliran kerja
untuk semakan yang anda rancang untuk laksanakan.

## Nasihat kesihatan pangkalan data

Penganalisis PHP asli Doctor membaca set tetap pembilang global MySQL atau MariaDB melalui sambungan pangkalan data Cacti yang sedia ada. Ia membuat dua pertanyaan baca sahaja bagi setiap laporan, tidak memerlukan kelayakan tambahan atau fail boleh laku, dan tidak pernah mengubah konfigurasi pangkalan data. Semakan ini muncul dalam laporan web, CLI, JSON, output pemantauan, himpunan sokongan dan penjejakan status berjadual.

| ID Semakan | Pencetus penyiasatan |
|---|---|
| `database.health_sample` | Kurang daripada 24 jam sejak permulaan atau `FLUSH STATUS`, atau masa hidup tidak tersedia/tidak konsisten |
| `database.connection_capacity` | Sambungan semasa atau puncak yang direkodkan sekurang-kurangnya 80% daripada `max_connections` semasa |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` sekurang-kurangnya 1%, dengan sekurang-kurangnya 10,000 permintaan baca |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` sekurang-kurangnya 25%, dengan sekurang-kurangnya 1,000 jadual sementara |
| `database.thread_cache` | `Threads_created / Connections` sekurang-kurangnya 5%, dengan sekurang-kurangnya 1,000 percubaan sambungan dan `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` sekurang-kurangnya 1%, dengan sekurang-kurangnya 1,000 pernyataan |
| `database.redo_log_waits` | `Innodb_log_waits` bukan sifar |

Ini adalah ambang penyiasatan Doctor, bukan sasaran konfigurasi vendor. Kecuali kapasiti sambungan, nasihat terkumpul memerlukan tetingkap pemerhatian di atas. Pembilang yang tiada, cacat bentuk, pendua atau bersaiz melampau, aktiviti yang tidak mencukupi dan mod benang yang tidak disokong menghasilkan amaran dan bukannya keputusan sihat atau syor penalaan. Amaran boleh mempengaruhi status Nagios dan makluman berjadual apabila **Maklumkan pada Amaran** didayakan.

Baca pembilang yang diukur dan cadangan bersama-sama. Nilai terkumpul tidak membuktikan beban semasa; pembilang mungkin mempunyai sejarah penetapan semula yang berbeza dan bukan syot kilat atomik. Sambungan puncak mungkin mencerminkan had yang lebih lama. Kiraan pertanyaan perlahan bergantung pada `long_query_time`, dan pembilang jadual sementara cakera MySQL boleh mengabaikan fail yang dipetakan memori. Nisbah yang rendah tidak membuktikan ketiadaan kesesakan. Sahkan trend di bawah beban kerja yang mewakili, semak pelan pertanyaan dan penggunaan semula sambungan, serta ukur memori pada **hos pangkalan data** sebelum menukar penimbal atau had sambungan.

Jika metrik tidak tersedia, semak sokongan pelayan dan akses akaun Cacti kepada `SHOW GLOBAL STATUS` dan `SHOW GLOBAL VARIABLES`; Doctor tidak meminta kelayakan bertingkat. Takrifan pembilang berasal daripada [rujukan pemboleh ubah status MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) dan [rujukan pemboleh ubah status MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Tiada skrip atau kod MySQLTuner digunakan.

Tiada penghijrahan skema atau konfigurasi diperlukan. Edarkan fail pemalam seperti biasa; mengembalikan fail tersebut akan mengalih keluar diagnostik yang ditambah. Keadaan berjadual sedia ada disegarkan semula pada jalanan seterusnya.

## Bagaimana ia kekal selamat

Alat diagnostik dijalankan dengan keistimewaan poller atau pelayan web dan membaca laluan daripada jadual tetapan, jadi ia perlu berhati-hati tentang perkara yang dilaksanakan dan diubah suainya.

- Diagnostik adalah baca sahaja. Ia tidak pernah mengubah fail, tetapan atau data.
- Doctor hanya menjalankan perduaan yang dikonfigurasikan apabila nama failnya sepadan dengan program yang dijangkakan (`php`, `rrdtool`, `snmpget`, atau `snmpwalk`). Sesiapa yang boleh menulis pada jadual tetapan boleh memilih apa yang dijalankan oleh Doctor jika tidak disekat. Sebarang nama lain dilaporkan sebagai amaran dan tidak dilaksanakan.
- Doctor tidak pernah menjalankan perduaan yang dikonfigurasikan sebagai root, dan ia melaporkan apabila ia sedang berjalan sebagai root.
- Pembaikan datang daripada senarai dibenarkan yang tetap. Setiap satunya memerlukan tindakan pentadbir yang disahkan dalam UI web atau `--yes` pada CLI, dan setiap satunya ditulis ke dalam log Cacti.

## Keluaran

Versi mengikut SemVer dan sepadan dengan fail `INFO` pemalam. Lihat
[proses keluaran](../../releasing.md) untuk pemilihan versi, get CI, kandungan
pakej, hasil tambah semak dan arahan gulung balik.

## Pemasangan

Muat turun `doctor-VERSION.tar.gz` atau `doctor-VERSION.zip` dan `SHA256SUMS` daripada
[Keluaran GitHub](https://github.com/somethingwithproof/plugin_doctor/releases).
Sahkan hasil tambah semak SHA-256 arkib tersebut, kemudian ekstrak direktori `doctor/` ke dalam
direktori `plugins/` Cacti. Ini ialah pakej yang boleh dipasang; arkib sumber
automatik GitHub mempunyai nama direktori yang berbeza. Untuk menjalankan kerja yang belum dikeluarkan
daripada `develop`, pasang daripada salinan checkout sumber.

Untuk salinan checkout sumber:

Klon atau nyahpek repositori sebagai `plugins/doctor` di dalam pemasangan Cacti. Direktori tersebut mesti dinamakan `doctor`, bukan `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Pasang dan dayakan **Cacti Doctor** daripada **Configuration > Plugin Management**, kemudian berikan realm **Doctor Viewer**, **Doctor Operator**, atau **Doctor Administrator** melalui kebenaran pengguna atau kumpulan Cacti. Pemberian **Cacti Doctor** yang sedia ada mengekalkan akses Pentadbir selepas naik taraf. Laporan dipaparkan di bawah **Utilities > Cacti Doctor**.

## Bahasa

Doctor disertakan dengan 48 katalog terjemahan bukan bahasa Inggeris di bawah `locales/po/` dan `locales/LC_MESSAGES/` yang merangkumi lokal Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Asia (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), dan Eropah Tenggara (`bs-BA`, `hr-HR`, `sr-RS`). Cacti memaparkan sesuatu katalog setelah sokongan bahasa dihidupkan (**Configuration > Settings > General > Language Support**) dan pengguna memilih lokal yang didedahkan oleh Cacti dalam pemilih bahasanya; katalog bagi lokal yang belum disenaraikan dalam pemilih Cacti akan berkuat kuasa setelah Cacti menambahnya. Halaman web, tetapan, serta mesej dan teks laporan yang dicetak oleh baris perintah mengikut bahasa Cacti; laporan baris perintah itu sendiri menggunakan bahasa lalai Cacti, yang kekal dalam bahasa Inggeris melainkan anda menukarnya.

Output boleh dibaca mesin tidak pernah diterjemahkan: ID semakan, kunci JSON dan nilai status, output `--format=nagios` dan `--format=prometheus`, baris log, dan tajuk bahagian himpunan sokongan kekal dalam bahasa Inggeris supaya skrip dan pemantauan terus berfungsi dalam setiap bahasa. Teks `summary` dan `detail` bagi setiap semakan ialah satu-satunya bahagian laporan JSON yang diterjemahkan.

Katalog bahasa Sepanyol Amerika Latin (`es-419`) turut disertakan, tetapi Cacti 1.2 mahupun Cacti 1.3 tidak mempunyai lokal bahasa Sepanyol Amerika Latin untuk dipilih, jadi ia hanya berkuat kuasa apabila Cacti menambahkannya. Sehingga itu, pilih bahasa Sepanyol (`es-ES`).

Cacti memuatkan katalog pemalam daripada `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` dengan `doctor` sebagai domain teks, pada 1.2.x dan 1.3 secara sama (1.3 menyelesaikan direktori pemalam melalui laluan pemalamnya yang boleh dikonfigurasikan).

## Tahap akses

| Realm | Keupayaan |
|---|---|
| Doctor Viewer | Membaca status semakan berjadual terkini, masa pemerhatian, kesegaran dan sejarah agregat terkini. Tiada perintah diagnostik, butiran mentah, konfigurasi atau pembaikan. |
| Doctor Operator | Menjalankan laporan diagnostik dengan had proses 120 saat, memeriksa butiran yang disunting, dan mengakui penemuan. Tiada perubahan tetapan atau pembaikan. |
| Doctor Administrator | Keupayaan Operator serta pembaikan senarai dibenarkan yang sedia ada dan tetapan Doctor. Pembaikan dan tetapan juga memerlukan realm Settings/System Utilities Cacti. |

Menu Utilities membuka halaman untuk realm Doctor tertinggi yang diberikan kepada pengguna, termasuk pemberian kumpulan. Realm Viewer dan Operator yang baharu tidak menerima pemberian automatik. ID realm asal kekal dilampirkan pada `doctor.php` sebagai Pentadbir, mengekalkan akses pengguna dan kumpulan yang sedia ada.

Data Viewer datang daripada semakan berjadual. Dayakan penjadualan sebelum memberikan akses Viewer; pemerhatian yang tiada atau lewat tempoh memaparkan **unknown**, tidak pernah sihat. Sejarah mengekalkan 20 kiraan agregat berjadual terakhir dan mengecualikan status peranti. Operator memulakan diagnostik baharu secara eksplisit; muat semula halaman biasa menggunakan laporan terakhir sesi mereka.

Butiran dan jumlah peranti menggunakan kebenaran peranti pengguna semasa. Petikan log tambahan memerlukan realm Log Administration Cacti. Rahsia ditutup sebelum butiran diagnostik disimpan dalam sesi web atau dipaparkan. Akses CLI terus dikawal oleh akaun sistem pengendalian.

Pengakuan adalah bersifat peribadi dan direkodkan dalam log Cacti. Ia hanya terpakai pada penemuan dan bukti yang sama; bukti yang berubah memerlukan pengakuan baharu. Ia tidak pernah mengubah status lulus/amaran/gagal, menyekat makluman, atau menandakan semakan yang gagal sebagai sihat. Ini berasingan daripada pengecualian amaran yang diterima, yang mempengaruhi dasar makluman tanpa mengubah status yang diperhatikan dan diterangkan di bawah.

Setiap tindakan memerlukan POST dan token CSRF yang sah. Pembaikan memaparkan halaman pengesahan berasingan dengan pautan Cancel yang tidak menyerahkan borang, dan merekodkan pengguna yang bertindak serta hasilnya dalam log Cacti.

## Baris perintah

Jalankan perintah ini dari akar Cacti sebagai pengguna poller Cacti, bukan root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Output teks mencetak satu baris bagi setiap semakan dengan status, kategori, ringkasan dan butirannya. `--json` mencetak objek `summary` dengan kiraan status dan tatasusunan `checks` yang entrinya membawa `id`, `category`, `status`, `summary`, `detail`, serta `repair`/`repairable` apabila pembaikan senarai dibenarkan terpakai.

| Status keluar | Maksud |
|---|---|
| `0` | Tiada semakan yang gagal, atau pembaikan yang diminta berjaya. Amaran tidak mengubah status keluar. |
| `1` | Sekurang-kurangnya satu semakan gagal, atau pembaikan yang diminta tidak berjaya. |
| `2` | Ralat penggunaan: pembaikan dijalankan tanpa `--yes` (`--preview` tidak memerlukannya), ID pembaikan tidak diketahui, format output tidak diketahui, gabungan `--symptom` atau format yang tidak disokong, atau pemasangan Cacti yang tidak dapat ditemui. |

Cacti menaikkan `memory_limit` untuk setiap skrip CLI, jadi semakan konfigurasi masa jalan PHP hanya bermakna pada halaman web.

## Semakan berjadual dan makluman

Di bawah **Configuration > Settings > Doctor**, hidupkan **Run Checks on a Schedule** dan pilih selang masa dari 15 minit hingga sehari. Selepas setiap kitaran poller yang tiba masanya, Doctor menjalankan setiap semakan dalam proses latar belakang, supaya masa jalan poller itu sendiri tidak terjejas.

Setiap larian merekodkan status yang diperhatikan bagi setiap semakan. Pengecualian amaran aktif mempengaruhi dasar makluman tanpa mengubah pemerhatian tersebut. Apabila semakan mula atau berhenti gagal, Doctor menulis perubahan itu ke dalam log Cacti dan, jika **Alert Email Addresses** ditetapkan, menghantar e-mel ke alamat tersebut melalui tetapan mel Cacti. **Alert on Warnings** menambah perubahan masuk dan keluar daripada amaran. Larian pertama hanya merekodkan garis dasar.

Laporan berjadual dijalankan pada poller utama di bawah kunci nasihat pangkalan data dan mempunyai had pekerja dua minit. Doctor melaporkan permulaan terakhir dan penyiapan yang berjaya supaya keputusan yang tiada atau lapuk dapat dilihat. Keputusan dikira sebagai semasa untuk selang masa tersebut ditambah satu kitaran pengundian dan tiga minit. Larian yang tidak selesai dicuba semula selepas 5, 10, 20 minit dan seterusnya, sehingga selang masa biasa. Penghantaran makluman yang gagal dikekalkan sehingga tiga percubaan semula dengan kelewatan yang semakin meningkat; selepas itu, betulkan tetapan mel Cacti dan jalankan `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` sebagai pengguna poller. Penerimaan pelayan mel tidak mengesahkan penghantaran peti masuk.

Tab yang sama menetapkan ambang untuk masa jalan poller (80% daripada selang masa), ruang cakera bebas RRA (amaran di bawah 10%, gagal di bawah 2%), hanyutan jam pangkalan data (amaran melebihi 5 saat, gagal melebihi 60), dan saiz log Cacti (100 MB). Nilai kosong atau tidak sah akan kembali kepada lalai ini.

## Integrasi pemantauan

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` mencetak satu baris status dengan data prestasi dan keluar dengan `0` (OK), `1` (WARNING), atau `2` (CRITICAL), supaya Nagios, Icinga, atau mana-mana sistem yang serasi boleh menjalankannya secara terus. `--format=prometheus` menulis format teks Prometheus untuk pengumpul textfile node_exporter: `cacti_doctor_check_status` bagi setiap semakan (0 lulus atau amaran diterima, 1 amaran boleh diambil tindakan, 2 kegagalan), `cacti_doctor_check_observed_status` sebelum pengecualian, `cacti_doctor_check_accepted`, `cacti_doctor_checks` bagi setiap status, dan `cacti_doctor_last_run_timestamp_seconds`. Baris semakan JSON menyertakan medan `assessment`; `not_assessed` bermakna semakan tidak dapat mencapai kesimpulan daripada data yang tersedia.

## Himpunan sokongan

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Himpunan tersebut ialah satu fail teks dengan versi Doctor, Cacti, PHP, OS dan pangkalan data, statistik poller dan Boost, laporan penuh, sebarang lampiran himpunan sokongan pemalam di bawah `== Plugin attachments`, serta 200 baris terakhir log Cacti. Nilai yang mengikuti nama kata laluan, rahsia, token, komuniti dan kunci ditutup. Doctor mencipta fail tersebut supaya hanya boleh dibaca oleh pemiliknya dan enggan menulis ganti fail yang sedia ada. Semaknya sebelum menyiarkannya di mana-mana.

## Dasar pembaikan

Doctor menyertakan satu pembaikan, `runtime_directories`. Pembaikan ini mencipta direktori masa jalan Cacti yang tiada dan menambah bit baca, tulis, dan laksana pemilik tanpa membuang keizinan sedia ada.

Pembaikan ini menyasarkan `$cache_path`, `$log_path`, dan `$rra_path` pada Cacti 1.3, atau direktori `cache`, `log`, dan `rra` pemasangan tersebut jika sebaliknya. Pembaikan ini melangkau direktori yang sudah boleh ditulis, menolak direktori di luar pemasangan Cacti (seperti direktori log di bawah `/var/log`), menolak pautan simbolik, dan enggan dijalankan sebagai root. Pembaikan ini tidak pernah mengikut `path_cactilog`, jadi fail log yang dikonfigurasikan di dalam direktori kod tidak dapat mengalihkan pembaikan ke sana. Diagnostik masih menyemak direktori fail log yang dikonfigurasikan pada setiap keluaran.

Pembaikan ini tidak menukar pemilikan, menjalankan arahan shell, menulis semula konfigurasi, atau mengubah suai data aplikasi Cacti. Setiap pembaikan baharu mesti menyertakan diagnostik, pengendali dalam senarai dibenarkan, pengesahan, pengelogan audit, dan ujian.

## Menyiasat simptom

Pengendali dan Pentadbir boleh memilih **Investigate a symptom** pada halaman Doctor. Peraturan yang sama tersedia melalui `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, atau `alerts_missing`, dengan output teks atau JSON. Himpunan sokongan menyertakan penyiasatan simptom yang berkaitan.

Setiap calon menyenaraikan semakan yang diperhatikan dan langkah pengesahan seterusnya. Calon ialah hipotesis, bukan punca utama yang disahkan. Pemerhatian yang tiada, tidak dinilai atau lapuk tidak pernah membuktikan sesuatu punca. Penyiasatan web menggunakan laporan yang ditapis mengikut keizinan; laporan CLI menggunakan akses akaun sistem pengendalian.

## Kesegaran kemas kini RRD

`filesystem.rrd_stale` menyemak sehingga 500 sumber data aktif, tidak termasuk peranti yang dilumpuhkan dan terhenti. Pada pemasangan yang lebih besar, sampel berubah setiap jam, supaya larian berulang meliputi fail yang berbeza. Semakan ini membandingkan masa pengubahsuaian fail dengan nilai terbesar antara selang poller, langkah RRD sumber dan langkah profil, didarabkan dengan **RRD Stale Intervals** (lalai 3). Semakan ini memaparkan tiga fail lapuk yang paling lama dan bilangan peranti yang terjejas. Keputusan web hanya menyertakan peranti yang dibenarkan.

`filesystem.rrd_files` ialah semakan kewujudan yang berasingan. Semakan ini mencari fail RRD bagi sehingga 5,000 sumber data aktif, termasuk sumber pada peranti yang dilumpuhkan atau terhenti, dan menggunakan sampel setiap jam yang sama.

Boost menambah dua kali ganda selang pembersihan yang dikonfigurasikan sebagai elaun tulis cakera. Bagi penulis tertunda yang lain, konfigurasikan **Deferred RRD Write Allowance (seconds)**. `RRDCACHED_ADDRESS` yang diiklankan tanpa elaun, atau selang Boost yang tidak sah, menghasilkan keputusan tidak dinilai. Doctor tidak pernah membersihkan cache untuk melaksanakan semakan ini. Masa pengubahsuaian ialah bukti aktiviti cakera, bukan bukti pengumpulan data yang berjaya. Cache luaran yang tidak dapat dikesan oleh Doctor mesti dikonfigurasikan secara eksplisit.

Fail yang tiada, tidak boleh dibaca dan bertarikh masa hadapan dikira dalam butiran. Keputusan tidak dinilai hanya apabila tiada fail yang disampel boleh dibaca. Keputusan bersampel menyatakan bahawa ia hanya meliputi sebahagian daripada pemasangan; keputusan lulus tidak meliputi fail yang tidak disampel.

## Pratonton pembaikan dan sejarah audit

Halaman pembaikan Pentadbir memaparkan setiap laluan yang terjejas, tindakan yang dicadangkan, keizinan semasa dan keizinan sasaran. Kelulusan terikat pada pratonton tersebut, pengguna yang bertindak dan tempoh hayat lima minit. Pengesahan menggunakan pratonton tersebut; sistem fail yang berubah memerlukan pratonton lain. Pelaksanaan root, laluan di luar pemasangan, pautan yang memerlukan pembaikan dan keizinan sistem fail yang tidak dipenuhi menghalang kelulusan.

`--repair=runtime_directories --preview` mencetak pelan JSON baca sahaja. `--repair=runtime_directories --yes` meluluskan pelan CLI yang baru dikira dan menyemaknya semula sebelum pelaksanaan. Akaun CLI mesti sudah diberi kuasa untuk membaiki pemasangan; ia tidak mewarisi peranan web.

Rekod `repair.started` berstruktur mesti disimpan sebelum sebarang perubahan sistem fail. Rekod `repair.completed` yang dipautkan mengandungi syot kilat selepas pembaikan dan keputusan pengesahan. Operasi yang terganggu meninggalkan rekod bermula untuk penyiasatan. Kegagalan audit penyiapan dilaporkan sebagai kegagalan walaupun perubahan sistem fail berlaku. Doctor menambah keizinan pemilik dan mencipta direktori; ia tidak mencuba pemulihan automatik.

Pentadbir dengan keizinan Settings/System Utilities Cacti boleh membaca 20 entri audit terkini pada halaman Doctor. Pemalam menyimpan 200 rekod terkini dalam `plugin_doctor_audit`; log Cacti juga merekodkan ID, tindakan dan pelakunya. Muatan audit disamarkan.

## Amaran diterima

Pentadbir dengan keizinan Settings/System Utilities Cacti boleh mencipta **Warning exception** daripada amaran yang segar dan dinilai pada halaman Doctor. Pengecualian memerlukan pemilik, sebab dan tarikh semakan UTC dalam tempoh 90 hari. Pengecualian tamat tempoh pada tengah malam UTC pada permulaan tarikh tersebut. Sehingga 100 pengecualian boleh dikonfigurasikan. Senarai memaparkan entri tamat tempoh dan ID yang tiada dalam laporan semasa, serta membenarkan pembuangan.

Amaran yang diperhatikan kekal kelihatan, bersama pemilik, sebab dan tarikh luputnya dalam butiran diagnostik. JSON mengekalkan status yang diperhatikan dan menambah metadata `accepted` dan `acceptance`. Nagios mengecualikan amaran diterima yang aktif daripada keterukan keluarannya tetapi menamakannya dalam outputnya. Prometheus mengeksport kedua-dua keterukan yang diperhatikan dan keterukan yang boleh diambil tindakan. Status keluar CLI biasa kekal tidak berubah: amaran tetap keluar sifar, kegagalan keluar satu.

Makluman amaran berjadual disekat semasa pengecualian berkuat kuasa; tamat tempoh atau pembuangan menjadikan amaran yang berterusan layak untuk makluman amaran semula. Peralihan kegagalan dan pemulihan daripada kegagalan kekal layak untuk makluman. Keputusan yang tidak dinilai atau kegagalan tidak boleh diterima. Pengakuan peribadi adalah berasingan dan tidak menyekat apa-apa. Penciptaan dan pembuangan pengecualian bersifat transaksi dengan rekod audit.

Naik taraf mencipta `plugin_doctor_audit` dan `plugin_doctor_acceptance` tanpa mengubah data aplikasi Cacti. Eksport sebarang sejarah yang anda perlukan sebelum menyahpasang: penyahpasangan membuang kedua-dua jadual pemalam dan tetapannya. Mengembalikan fail pemalam membiarkan jadual tersedia untuk penyiasatan, tetapi versi terdahulu tidak mematuhi pengecualian amaran.

## Semakan pemalam (`doctor_register_checks`)

Pemalam Cacti yang didayakan boleh menyumbangkan semakan diagnostik baca sahaja dan lampiran himpunan sokongan pilihan dengan mendaftarkan cangkuk `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor memanggil pemalam yang didayakan dan tidak bersepadu yang berdaftar pada `doctor_register_checks` (melangkau `doctor` dan `cacti`), menyelesaikan fail cangkuk secara ketat di dalam direktori pemalam itu sendiri. Panggilan balik menerima `['mode' => 'run' | 'list', 'plugin' => '<slug>']` dan mengembalikan sama ada senarai deskriptor semakan atau sampul dengan `checks` dan `attachments` pilihan:

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

Setiap deskriptor semakan pemalam disahkan sebelum dimasukkan:

- Kekunci diperlukan: `id`, `plugin`, `category`, `title`, `status`, `message`, `details`, dan `remediation`.
- `plugin` mesti sepadan dengan slug pemalam berdaftar (`[a-z0-9_]{1,64}`). `id` mesti sepadan dengan `[a-z0-9_.]{1,128}`, bermula dengan `<plugin>.`, dan tidak bertembung dengan ID semakan teras atau pemalam yang sedia ada.
- `status` mesti `ok`, `warn`, `fail`, atau `info`. `ok` dipetakan kepada `pass` dalam laporan Doctor; `info` bersifat maklumat dan tidak mencetuskan kegagalan dalam CLI, Nagios, Prometheus, atau makluman berjadual.
- `category` (sehingga 64 bait) dan `title` (sehingga 256 bait) mestilah rentetan tidak kosong tanpa aksara kawalan. `message` (tidak kosong, sehingga 2048 bait) dan `remediation` (sehingga 2048 bait) mestilah rentetan.
- `details` menerima rentetan (sehingga 8192 bait) atau tatasusunan skalar/bersarang (kedalaman maksimum 4, berkod JSON sehingga 16384 bait; objek dan sumber ditolak).
- Lampiran himpunan sokongan pilihan memerlukan `title` tidak kosong (sehingga 128 bait, tiada aksara kawalan) dan rentetan `content` sehingga 65536 bait (64 KiB).

Doctor menguatkuasakan had 32 semakan dan 8 lampiran bagi setiap pemalam (jumlah 64 semakan pemalam dan 32 lampiran). Setiap cangkuk dijalankan di dalam sempadan `try`/`catch` tersendiri supaya pengecualian atau muatan bukan tatasusunan disamarkan dan direkodkan ke log Cacti (kemudahan `DOCTOR`) tanpa menjejaskan semakan teras atau pemalam lain. Deskriptor yang rosak bentuk ditolak dan dilogkan sementara yang sah daripada pemalam yang sama masih dijalankan. Semakan pemalam sentiasa baca sahaja (`repairable: false`), dan nilai rentetan serta kekunci bersekutu sensitif disamarkan sebelum pemaparan, eksport, atau penghimpunan. Semakan pemalam yang disahkan muncul dalam UI web, output teks/JSON/Nagios/Prometheus CLI, penjejakan status berjadual, dan himpunan sokongan.

## Integrasi MCP (`abilities_register`)

Doctor mendaftarkan cangkuk `abilities_register` (`doctor_abilities_register` dalam `doctor_abilities.php`) supaya `plugin_mcp` menemui keupayaan diagnostiknya apabila kedua-dua pemalam didayakan. Doctor mendaftarkan kategori `diagnostics` (`Diagnostics`) dan dua keupayaan baca sahaja, tidak memusnahkan, dan idempoten:

| ID Keupayaan | Argumen pilihan | Output |
|---|---|---|
| `doctor-run-checks` | `category` (rentetan, maks 64 aksara), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) dan sehingga 256 `findings` yang disamarkan (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (rentetan, maks 64 aksara), `plugin` (rentetan, maks 64 aksara) | Sehingga 256 `checks` (`id`, `plugin`, `category`, `title`) merangkumi semua 45 semakan terbina dalam serta semakan pemalam yang didayakan |

Kedua-dua keupayaan adalah baca sahaja secara ketat dan tidak pernah menjalankan pembaikan. Selain kawalan realm dan pendedahan keupayaan milik `plugin_mcp` sendiri (keupayaan pemalam bermula sebagai tersembunyi dalam MCP sehingga pentadbir mendedahkannya), Doctor menghendaki pemilik token memegang **Doctor Viewer** atau realm Doctor yang lebih tinggi. `doctor-run-checks` mengehadkan `devices.health` kepada peranti yang dibenarkan untuk pemilik token, menyertakan `logging.recent_errors` hanya apabila pengguna memegang realm Cacti 18 atau 19, mengabaikan `filesystem.rrd_files`, dan menyertakan `filesystem.rrd_stale` berskop peranti hanya untuk **Doctor Operator** atau **Doctor Administrator**.

## Keperluan

| Cacti | PHP | Nota |
|---|---|---|
| 1.2.20 | 5.4 atau lebih baharu | Kod Doctor sendiri serasi dengan PHP 5.4 supaya ia dapat mendiagnosis sistem legasi sebelum naik taraf |
| 1.2.31 | 8.0 atau lebih baharu | `composer.json` Cacti memerlukan `>=8.0` |
| 1.2.x semasa | 8.2 atau lebih baharu | `composer.json` Cacti memerlukan `>=8.2` |
| `develop` (1.3) | 8.3 atau lebih baharu | `composer.json` Cacti memerlukan `^8.3` |

Baris **PHP compatibility with installed Cacti** membandingkan versi PHP yang sedang berjalan dengan keperluan PHP dalam `composer.json` akar Cacti sendiri, termasuk batas atas kekangan karet seperti `^8.3`. Fail boleh laku PHP CLI yang dikonfigurasikan disemak terhadap keperluan yang sama. Doctor mengecam bentuk kekangan `>=` dan `^` yang digunakan oleh pakej Cacti ini. Keperluan yang tidak boleh dibaca, rosak bentuk, tiada, atau tidak dikenali menghasilkan amaran; pemasangan Cacti 1.2.20–1.2.30 tanpa manifes mengekalkan had minimum pemasang PHP 5.4 yang didokumenkan. Keserasian PHP 5.4 Doctor sendiri tidak membuktikan keserasian dengan pemasangan Cacti yang lebih baharu.

Baris **PHP upstream security support** menjawab soalan yang berasingan: adakah cabang keluaran PHP tersebut masih menerima pembaikan keselamatan daripada projek PHP? Baris ini melaporkan tarikh tamat sokongan keselamatan cabang yang diterbitkan dan memberi amaran selepas tarikh tersebut. Sebagai contoh, PHP 8.1 boleh memenuhi keperluan masa jalan pemasangan Cacti yang lebih lama walaupun tidak lagi menerima pembaikan keselamatan huluan. Keputusan lulus tidak bermakna keluaran tampung yang dipasang adalah terkini, dan Doctor tidak dapat menentukan sama ada vendor OS membekalkan pembaikan yang diport ke belakang.

Tarikh sokongan digabungkan dengan Doctor daripada [jadual sokongan PHP](https://www.php.net/supported-versions.php) dan [senarai tamat hayat](https://www.php.net/eol.php), terakhir disemak pada 2026-11-08. Cabang yang tidak diketahui dan prakeluaran menghasilkan amaran dan bukannya dianggap lulus. Tiada permintaan rangkaian dibuat semasa diagnostik. Kemas kini data sokongan Doctor apabila PHP menerbitkan jadual baharu. ID JSON/pemantauan sedia ada `php.version` dan `php.security_baseline` tidak berubah.

## Pembangunan

Suit unit menggunakan Pest dan analisis statik menggunakan PHPStan (tahap 6), kedua-duanya dijalankan pada PHP 8.2 atau lebih baharu:

```console
composer install
composer phpstan
composer test
```

Ujian tersebut menggantikan fungsi Cacti yang dipanggil oleh Doctor dengan pengganti kecil dalam `tests/CactiStubs.php`, supaya ujian dapat dijalankan tanpa pemasangan Cacti.

GitHub Actions menjalankan lima jenis semakan pada setiap tolakan dan permintaan tarik:

- Ujian kontrak pembungkusan keluaran (`tests/test_release.py`) dan binaan arkib (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, yang gagal apabila templat terjemahan lapuk, katalog tidak lengkap atau kabur, atau katalog terkompil berbeza daripada sumbernya.
- `php -l` pada setiap fail PHP di bawah PHP 5.4, 5.6, 7.0, 7.1, 7.4, dan 8.0 hingga 8.4.
- `composer phpstan` (PHPStan tahap 6) dan `composer test` (suit unit Pest) pada PHP 8.2, 8.3, dan 8.4.
- Tujuh tugas integrasi yang memasang Cacti 1.2.20, cabang 1.2.x semasa, dan `develop` terhadap MySQL dan MariaDB, dengan kedua-dua cmd.php dan Spine. Setiap tugas memasang dan mendayakan pemalam, menjalankan laporan CLI penuh, dan menyemak skema laporan, jumlah ringkasan, status yang dijangkakan, serta set kegagalan yang tepat. Tugas itu kemudiannya merosakkan laluan perduaan dan cap masa poller, mengesahkan kedua-duanya dilaporkan, memulihkannya semula, menguji pembaikan serta pengesahannya, dan menjalankan nyahdaya, daya semula, nyahpasang, dan pasang semula. Laporan JSON disimpan sebagai artifak apabila sesuatu tugas gagal.

## Sumbangan

Permintaan tarik dihantar ke `develop`. Pastikan fail pengeluaran serasi dengan PHP 5.4 dan gunakan gaya Cacti: tab, rentetan petikan tunggal, serta pembantu Cacti seperti `read_config_option()` dan `db_fetch_cell()`. Tambahkan ujian unit bagi setiap perubahan tingkah laku, tandatangani komit anda (`git commit -s`), dan tambahkan satu baris pada `CHANGELOG.md`.

### Terjemahan

Balut setiap mesej yang kelihatan kepada pengguna dalam `__('...', 'doctor')` (atau `__n()`, `__x()`, `__esc()`), dan berikan ayat yang mengandungi nilai satu rentetan format tunggal dengan pemegang tempat `%s`/`%d` secara berurutan berbanding menggabungkan bahagian-bahagian. Fungsi `__()` Cacti hanya memformat mesej apabila ia mengandungi penentu format dan tidak menyokong bentuk kedudukan `%1$s`. Ia juga menukar `%%` kepada `%` sebelum pemformatan, jadi jangan sesekali meletakkan tanda peratus literal dalam mesej: hantar nilai bersama tandanya sebagai argumen (`__('Usage: %s', '50%', 'doctor')`). Baris log kekal dalam bahasa Inggeris: gunakan `doctor_repair_message()` untuk teks pembaikan dan `doctor_n_()` untuk mesej yang dilog dan diterjemahkan hanya di tempat ia dipaparkan. Biarkan ID semakan, kekunci JSON, kata kunci status, output pemantauan, dan baris log tidak diterjemahkan.

`locales/build_gettext.sh` menjana semula templat `locales/po/cacti.pot`, menggabungkannya ke dalam setiap katalog `locales/po/<locale>.po`, dan mengkompil `locales/LC_MESSAGES/<locale>.mo`; komit ketiga-tiganya. CI menjalankan `sh locales/build_gettext.sh --check`, yang akan gagal apabila templat sudah lapuk atau sesuatu katalog tertinggal atau mempunyai entri kabur (fuzzy), pemegang tempat berbeza, atau fail yang dikompil sudah ketinggalan zaman. Oleh itu, mesej yang diubah memerlukan terjemahannya dikemas kini dalam permintaan tarik yang sama. Ia memerlukan GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Bahasa baharu ialah fail `<locale>.po` baharu yang dinamakan mengikut cara Cacti menamakan lokalnya (contohnya `pt-BR`).

## Keselamatan

Laporkan kelemahan keselamatan secara peribadi seperti yang diterangkan dalam [SECURITY.md](../../../SECURITY.md), bukan dalam isu awam.

## Lesen

Hak Cipta (C) 2026 Thomas Vincent. Dikeluarkan di bawah GNU General Public License, versi 2 atau lebih baharu. Lihat [LICENSE](../../../LICENSE).
