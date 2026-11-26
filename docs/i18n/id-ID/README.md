<!-- Source: README.md; SHA256: ee03c7ac68aca21c8155c29b5b43a1f206c2f0c379c8b07bb4113919c18aafde -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: kaktus yang mengenakan stetoskop. Diagnosis. Perbaiki. Pantau.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lisensi: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ dan 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor adalah plugin Cacti yang mendiagnosis instalasi dalam satu kali pemeriksaan dan menerapkan perbaikan kecil hanya ketika diminta oleh administrator.

**Status: dalam pengembangan, sebelum 1.0.** Rilis terbaru adalah [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Patch ini menambahkan katalog bahasa Hindi dan bahasa Arab serta panduan pengguna terjemahan ke fitur akses berbasis peran, diagnosis terpandu, pemeriksaan kesegaran RRD berbasis cakupan, pratinjau perbaikan dan riwayat audit, pengecualian peringatan yang diterima, serta terjemahan pada versi 0.6.0. Lihat [CHANGELOG.md](../../../CHANGELOG.md) untuk detailnya.

## Tangkapan Layar

Pengaturan diagnostik dan penjadwalan pada instalasi demonstrasi Cacti 1.2.31
terisolasi yang menjalankan PHP 8.3.36, termasuk pemeriksaan kompatibilitas PHP Cacti,
dukungan keamanan upstream, dan kesehatan basis data. Peringatan dan kegagalan yang
ditampilkan di sini menggambarkan lingkungan demo tersebut.

![Tabel diagnostik Doctor dengan hasil lulus, peringatan, dan gagal](../../screenshots/diagnostics.png)

![Pengaturan penjadwalan, peringatan, dan ambang batas Doctor](../../screenshots/settings.png)

Masalah Cacti biasanya muncul sebagai gejala: grafik kosong, poller yang berhenti, atau plugin yang gagal diinstal. Penyebabnya sering kali adalah prasyarat yang berubah, seperti ekstensi PHP yang hilang pada build CLI, direktori log yang tidak dapat ditulis oleh poller, jalur RRDtool yang mengarah ke biner yang salah, atau basis data tanpa tabel zona waktu. Doctor memeriksa prasyarat tersebut secara langsung dan melaporkan setiap item sebagai lulus, peringatan, atau gagal beserta satu kalimat penjelasan mengenai hasil temuannya. Laporan yang sama tersedia di halaman web, melalui baris perintah, dan dalam format JSON untuk pemantauan.

## Hal yang diperiksa

| Area | Pemeriksaan |
|---|---|
| Doctor | Apakah Doctor sendiri berjalan sebagai root, yang dapat menyebabkan pemeriksaan izin mengacu pada akun yang salah |
| Cacti dan PHP | Versi Cacti, pemutakhiran yang tidak diselesaikan oleh pemasang, plugin aktif yang berkasnya hilang, kompatibilitas PHP dengan paket Cacti yang terpasang, serta status dukungan keamanan upstream PHP |
| Ekstensi PHP | Ekstensi yang diperlukan pada PHP web dan pada PHP CLI yang digunakan poller, serta fitur yang direkomendasikan |
| Konfigurasi PHP | `memory_limit`, `max_execution_time`, dan `date.timezone`, menggunakan rekomendasi Cacti sendiri |
| Basis data | Konektivitas, versi server terhadap rekomendasi Cacti, set karakter UTF-8, tabel zona waktu, tabel inti, penyimpangan waktu dari host PHP, serta pengaturan InnoDB yang ditandai Cacti sebagai kesalahan |
| Kesehatan basis data | Kapasitas koneksi, pembacaan buffer pool, tabel sementara disk, pembuatan thread koneksi, kueri lambat, dan penantian buffer log InnoDB, lengkap dengan saran penyetelan yang bergantung pada beban kerja |
| Sistem berkas | Direktori cache, log, dan RRA yang dapat ditulis; ruang kosong untuk berkas RRD; sumber data aktif tanpa berkas RRD atau dengan pembaruan berkas yang terlambat; `include/config.php` tidak dapat dibaca oleh semua pengguna; log Cacti dapat ditulis dan ukurannya tidak melebihi batas |
| Biner | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, dan Spine apabila dikonfigurasi sebagai poller, termasuk versinya jika Cacti mencantumkannya |
| Log | Kesalahan di antara baris log Cacti terbaru, beserta pesan yang paling sering muncul |
| Perangkat | Perangkat aktif yang sedang mati atau dalam pemulihan, tiga perangkat yang paling lama mati beserta kesalahan terakhirnya, serta kegagalan apabila sebagian besar perangkat mati secara bersamaan |
| Poller | Jenis dan interval poller, waktu sejak poller utama terakhir selesai, durasi eksekusi terhadap interval, keluaran poller yang tidak pernah mencapai berkas RRD, poller jarak jauh yang berhenti melapor, Boost yang macet, dan konfigurasi Spine yang mengarah ke basis data yang berbeda |

Setiap pemeriksaan memiliki ID yang stabil, seperti `database.timezone` atau `binary.rrdtool`, sehingga skrip dapat merujuk pada masing-masing hasil secara spesifik.

## Peta kode dan pengujian

| Perilaku | Implementasi | Bukti pengujian dalam repositori ini |
|---|---|---|
| Pemeriksaan diagnostik dan ID laporan yang stabil | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Akses berbasis peran dan laporan web yang disunting | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Investigasi gejala terpandu | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Kesegaran RRD dan penanganan penulisan tertunda | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Pratinjau perbaikan, riwayat audit, dan peringatan yang diterima | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Pemeriksaan terjadwal dan transisi peringatan | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Referensi ini mengidentifikasi implementasi dan cakupan pengujian; referensi ini tidak
menyatakan bahwa setiap tugas CI telah lulus untuk revisi saat ini. Periksa eksekusi
alur kerja untuk revisi yang berencana Anda terapkan.

## Saran kesehatan basis data

Penganalisis PHP bawaan Doctor membaca sekumpulan penghitung global MySQL atau MariaDB yang tetap melalui koneksi basis data Cacti yang sudah ada. Penganalisis ini menjalankan dua kueri hanya-baca per laporan, tidak memerlukan kredensial atau berkas eksekusi tambahan, dan tidak pernah mengubah konfigurasi basis data. Pemeriksaan ini muncul di laporan web, CLI, JSON, keluaran pemantauan, bundel dukungan, dan pelacakan status terjadwal.

| ID Pemeriksaan | Pemicu investigasi |
|---|---|
| `database.health_sample` | Kurang dari 24 jam sejak startup atau `FLUSH STATUS`, atau waktu aktif tidak tersedia/tidak konsisten |
| `database.connection_capacity` | Koneksi saat ini atau puncak tercatat minimal 80% dari nilai `max_connections` saat ini |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` minimal 1%, dengan minimal 10.000 permintaan baca |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` minimal 25%, dengan minimal 1.000 tabel sementara |
| `database.thread_cache` | `Threads_created / Connections` minimal 5%, dengan minimal 1.000 percobaan koneksi dan `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` minimal 1%, dengan minimal 1.000 pernyataan |
| `database.redo_log_waits` | Nilai `Innodb_log_waits` bukan nol |

Angka-angka ini adalah ambang batas investigasi Doctor, bukan target konfigurasi vendor. Kecuali untuk kapasitas koneksi, saran kumulatif memerlukan jendela pengamatan di atas. Penghitung yang hilang, cacat format, duplikat, atau terlalu besar, aktivitas yang tidak mencukupi, serta mode thread yang tidak didukung akan menghasilkan peringatan alih-alih status sehat atau rekomendasi penyetelan. Peringatan dapat memengaruhi status Nagios dan pemberitahuan terjadwal saat **Alert on Warnings** diaktifkan.

Baca nilai penghitung yang terukur bersama dengan sarannya. Nilai kumulatif tidak mencerminkan beban saat ini; setiap penghitung dapat memiliki riwayat pengaturan ulang yang berbeda dan bukan merupakan cuplikan atomik. Puncak koneksi mungkin mencerminkan batas lama. Jumlah kueri lambat bergantung pada `long_query_time`, dan penghitung tabel sementara disk MySQL dapat mengabaikan berkas yang dipetakan ke memori. Rasio yang rendah tidak membuktikan tidak adanya hambatan kinerja. Pastikan tren di bawah beban kerja yang representatif, tinjau rencana kueri dan penggunaan ulang koneksi, serta ukur memori pada **host basis data** sebelum mengubah ukuran buffer atau batas koneksi.

Jika metrik tidak tersedia, periksa dukungan server dan akses akun Cacti ke `SHOW GLOBAL STATUS` dan `SHOW GLOBAL VARIABLES`; Doctor tidak meminta kredensial dengan hak istimewa lebih tinggi. Definisi penghitung berasal dari [referensi variabel status MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) dan [referensi variabel status MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Tidak ada skrip atau kode MySQLTuner yang digunakan.

Migrasi skema atau konfigurasi tidak diperlukan. Terapkan berkas plugin seperti biasa; mengembalikan berkas tersebut akan menghapus diagnostik yang ditambahkan. Status terjadwal yang sudah ada akan diperbarui pada eksekusi berikutnya.

## Cara menjaga keamanan

Alat diagnostik berjalan dengan hak istimewa poller atau server web dan membaca jalur dari tabel pengaturan, sehingga harus berhati-hati terhadap apa yang dijalankan dan dimodifikasinya.

- Diagnostik bersifat baca-saja. Diagnostik tidak pernah mengubah berkas, pengaturan, atau data.
- Doctor hanya menjalankan biner yang dikonfigurasi apabila nama berkasnya cocok dengan program yang diharapkan (`php`, `rrdtool`, `snmpget`, atau `snmpwalk`). Jika tidak, siapa pun yang dapat menulis ke tabel pengaturan dapat menentukan apa yang dijalankan oleh Doctor. Nama lain akan dilaporkan sebagai peringatan dan tidak dijalankan.
- Doctor tidak pernah menjalankan biner yang dikonfigurasi sebagai root, dan melaporkan apabila sedang berjalan sebagai root.
- Perbaikan berasal dari daftar izin (*allow-list*) yang tetap. Setiap perbaikan memerlukan tindakan administrator yang terautentikasi di antarmuka web atau `--yes` pada CLI, dan setiap tindakan dicatat ke dalam log Cacti.

## Rilis

Versi mengikuti SemVer dan sesuai dengan berkas `INFO` plugin. Lihat
[proses rilis](../../releasing.md) untuk pemilihan versi, gerbang CI, isi
paket, checksum, dan instruksi pengembalian versi (*rollback*).

## Instalasi

Unduh `doctor-VERSION.tar.gz` atau `doctor-VERSION.zip` serta `SHA256SUMS` dari
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Verifikasi checksum SHA-256 arsip tersebut, lalu ekstrak direktori `doctor/` ke dalam
direktori `plugins/` Cacti. Arsip tersebut merupakan paket yang siap dipasang; arsip
kode sumber otomatis dari GitHub memiliki nama direktori yang berbeda. Untuk menjalankan
pengembangan yang belum dirilis dari `develop`, pasang dari salinan kode sumber.

Untuk salinan kode sumber:

Klon atau ekstrak repositori sebagai `plugins/doctor` di dalam instalasi Cacti. Direktori tersebut harus dinamai `doctor`, bukan `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Pasang dan aktifkan **Cacti Doctor** melalui **Configuration > Plugin Management**, lalu berikan ranah akses **Doctor Viewer**, **Doctor Operator**, atau **Doctor Administrator** melalui izin pengguna atau grup Cacti. Izin **Cacti Doctor** yang sudah ada tetap mempertahankan akses Administrator setelah pemutakhiran. Laporan akan muncul di bawah menu **Utilities > Cacti Doctor**.

## Bahasa

Doctor menyertakan 48 katalog terjemahan non-Inggris di bawah `locales/po/` dan `locales/LC_MESSAGES/` yang mencakup lokal Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Asia (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), dan Eropa Tenggara (`bs-BA`, `hr-HR`, `sr-RS`). Cacti menampilkan suatu katalog setelah dukungan bahasa diaktifkan (**Configuration > Settings > General > Language Support**) dan pengguna memilih lokal yang disediakan Cacti di pemilih bahasanya; katalog untuk lokal yang belum tercantum di pemilih Cacti akan berlaku setelah Cacti menambahkannya. Halaman web, pengaturan, serta pesan dan teks laporan yang dicetak oleh baris perintah mengikuti bahasa Cacti; laporan baris perintah itu sendiri menggunakan bahasa bawaan Cacti, yang tetap berbahasa Inggris kecuali Anda mengubahnya.

Keluaran yang dapat dibaca mesin tidak pernah diterjemahkan: ID pemeriksaan, kunci JSON dan nilai status, keluaran `--format=nagios` dan `--format=prometheus`, baris log, serta judul bagian bundel dukungan tetap berbahasa Inggris agar skrip dan pemantauan tetap berfungsi di semua bahasa. Teks `summary` dan `detail` dari setiap pemeriksaan merupakan satu-satunya bagian yang diterjemahkan dalam laporan JSON.

Katalog bahasa Spanyol Amerika Latin (`es-419`) juga disertakan, namun baik Cacti 1.2 maupun Cacti 1.3 belum memiliki lokal bahasa Spanyol Amerika Latin yang dapat dipilih, sehingga katalog ini hanya berlaku ketika Cacti menambahkannya. Hingga saat itu, pilih bahasa Spanyol (`es-ES`).

Cacti memuat katalog plugin dari `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` dengan `doctor` sebagai domain teks, baik pada versi 1.2.x maupun 1.3 (versi 1.3 menentukan direktori plugin melalui jalur plugin yang dapat dikonfigurasi).

## Tingkat akses

| Ranah | Kemampuan |
|---|---|
| Doctor Viewer | Membaca status pemeriksaan terjadwal terbaru, waktu pengamatan, kesegaran data, dan riwayat agregat terkini. Tidak ada akses perintah diagnostik, detail mentah, konfigurasi, atau perbaikan. |
| Doctor Operator | Menjalankan laporan diagnostik dengan batas proses 120 detik, memeriksa detail yang disunting (*redacted*), dan mengakui temuan (*acknowledge*). Tidak dapat mengubah pengaturan atau melakukan perbaikan. |
| Doctor Administrator | Kemampuan Operator ditambah perbaikan daftar izin yang tersedia dan pengaturan Doctor. Perbaikan dan pengaturan juga memerlukan ranah Settings/System Utilities milik Cacti. |

Menu Utilities membuka halaman untuk ranah Doctor tertinggi yang diberikan kepada pengguna, termasuk izin grup. Ranah Viewer dan Operator yang baru tidak menerima pemberian izin otomatis. ID ranah asli tetap terikat pada `doctor.php` sebagai Administrator, sehingga mempertahankan akses pengguna dan grup yang sudah ada.

Data Viewer berasal dari pemeriksaan terjadwal. Aktifkan penjadwalan sebelum memberikan akses Viewer; pengamatan yang hilang atau melewati batas waktu akan menampilkan **unknown**, tidak pernah sehat. Riwayat menyimpan 20 hitungan agregat terjadwal terakhir dan mengecualikan status perangkat. Operator memulai diagnostik baru secara eksplisit; penyegaran halaman biasa menggunakan laporan terakhir dari sesinya.

Detail dan total perangkat menggunakan izin perangkat pengguna saat ini. Cuplikan log selain itu memerlukan ranah Log Administration milik Cacti. Rahasia disamarkan sebelum detail diagnostik disimpan di sesi web atau ditampilkan. Akses CLI tetap diatur oleh akun sistem operasi.

Pengakuan (*acknowledgment*) bersifat pribadi dan dicatat dalam log Cacti. Pengakuan hanya berlaku untuk temuan dan bukti yang sama; bukti yang berubah memerlukan pengakuan baru. Pengakuan tidak pernah mengubah status pass/warn/fail, menekan peringatan, atau menandai pemeriksaan yang gagal sebagai sehat. Hal ini terpisah dari pengecualian peringatan yang diterima (*accepted-warning*), yang memengaruhi kebijakan peringatan tanpa mengubah status pengamatan dan dijelaskan di bawah ini.

Setiap tindakan memerlukan POST dan token CSRF yang valid. Perbaikan menampilkan halaman konfirmasi terpisah dengan tautan Batal (*Cancel*) yang tidak mengirimkan formulir, serta mencatat pengguna yang bertindak dan hasilnya dalam log Cacti.

## Baris perintah

Jalankan perintah berikut dari direktori akar Cacti sebagai pengguna poller Cacti, bukan root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Keluaran teks mencetak satu baris per pemeriksaan beserta status, kategori, ringkasan, dan detailnya. `--json` mencetak objek `summary` dengan jumlah status dan array `checks` yang entrinya memuat `id`, `category`, `status`, `summary`, `detail`, serta `repair`/`repairable` apabila perbaikan dari daftar izin berlaku.

| Status keluar | Arti |
|---|---|
| `0` | Tidak ada pemeriksaan yang gagal, atau perbaikan yang diminta berhasil. Peringatan tidak mengubah status keluar. |
| `1` | Setidaknya satu pemeriksaan gagal, atau perbaikan yang diminta tidak berhasil. |
| `2` | Kesalahan penggunaan: perbaikan dijalankan tanpa `--yes` (`--preview` tidak memerlukannya), ID perbaikan tidak dikenal, format keluaran tidak dikenal, kombinasi `--symptom` atau format tidak didukung, atau instalasi Cacti tidak dapat ditemukan. |

Cacti menaikkan `memory_limit` untuk setiap skrip CLI, sehingga pemeriksaan konfigurasi waktu jalan (*runtime*) PHP hanya bermakna di halaman web.

## Pemeriksaan terjadwal dan peringatan

Di bawah **Configuration > Settings > Doctor**, aktifkan **Run Checks on a Schedule** dan pilih interval mulai dari 15 menit hingga satu hari. Setelah setiap siklus poller yang jatuh tempo, Doctor menjalankan setiap pemeriksaan dalam proses latar belakang, sehingga waktu jalan poller itu sendiri tidak terpengaruh.

Setiap proses mencatat status pengamatan dari tiap pemeriksaan. Pengecualian peringatan yang aktif memengaruhi kebijakan peringatan tanpa mengubah pengamatan tersebut. Ketika suatu pemeriksaan mulai atau berhenti gagal, Doctor mencatat perubahan tersebut ke log Cacti dan, jika **Alert Email Addresses** telah diatur, mengirimkan surel ke alamat tersebut melalui pengaturan surel Cacti. **Alert on Warnings** menambahkan perubahan masuk dan keluar dari status peringatan. Proses pertama hanya mencatat garis dasar (*baseline*).

Laporan terjadwal berjalan pada poller utama di bawah kunci penasihat (*advisory lock*) basis data dan memiliki batas waktu pekerja dua menit. Doctor melaporkan waktu mulai terakhir dan penyelesaian yang berhasil sehingga hasil yang hilang atau kedaluwarsa terlihat. Hasil dianggap masih berlaku selama interval ditambah satu siklus polling dan tiga menit. Proses yang tidak selesai akan dicoba ulang setelah 5, 10, 20 menit dan seterusnya, hingga mencapai interval normal. Pengiriman peringatan yang gagal dipertahankan hingga tiga kali percobaan ulang dengan jeda yang semakin meningkat; setelah itu, perbaiki pengaturan surel Cacti dan jalankan `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` sebagai pengguna poller. Penerimaan oleh server surel tidak menjamin pengiriman ke kotak masuk.

Tab yang sama mengatur ambang batas untuk waktu jalan poller (80% dari interval), ruang disk kosong RRA (peringatan di bawah 10%, gagal di bawah 2%), pergeseran jam basis data (peringatan di atas 5 detik, gagal di atas 60 detik), dan ukuran log Cacti (100 MB). Nilai yang kosong atau tidak valid akan kembali menggunakan nilai bawaan ini.

## Integrasi pemantauan

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` mencetak satu baris status beserta data performa dan keluar dengan kode `0` (OK), `1` (WARNING), atau `2` (CRITICAL), sehingga Nagios, Icinga, atau sistem lain yang kompatibel dapat menjalankannya secara langsung. `--format=prometheus` menulis format teks Prometheus untuk kolektor textfile node_exporter: `cacti_doctor_check_status` per pemeriksaan (0 lolos atau peringatan yang diterima, 1 peringatan yang perlu ditindaklanjuti, 2 gagal), `cacti_doctor_check_observed_status` sebelum pengecualian, `cacti_doctor_check_accepted`, `cacti_doctor_checks` per status, dan `cacti_doctor_last_run_timestamp_seconds`. Baris pemeriksaan JSON menyertakan bidang `assessment`; `not_assessed` berarti pemeriksaan tidak dapat menarik kesimpulan dari data yang tersedia.

## Bundel dukungan

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Bundel ini berupa satu berkas teks yang berisi versi Doctor, Cacti, PHP, OS, dan basis data, statistik poller dan Boost, laporan lengkap, serta 200 baris terakhir log Cacti. Nilai yang mengikuti nama kata sandi, rahasia, token, komunitas, dan kunci disamarkan. Doctor membuat berkas yang hanya dapat dibaca oleh pemiliknya dan menolak menimpa berkas yang sudah ada. Tinjau kembali berkas ini sebelum memublikasikannya di mana pun.

## Kebijakan perbaikan

Doctor menyertakan satu perbaikan, `runtime_directories`. Perbaikan ini membuat direktori runtime Cacti yang tidak ada serta menambahkan bit baca, tulis, dan eksekusi milik pemilik tanpa menghapus izin yang sudah ada.

Perbaikan ini menargetkan `$cache_path`, `$log_path`, dan `$rra_path` pada Cacti 1.3, atau direktori `cache`, `log`, dan `rra` milik instalasi pada versi lainnya. Direktori yang sudah dapat ditulis akan dilewati; direktori di luar instalasi Cacti (seperti direktori log di bawah `/var/log`), tautan simbolik, dan eksekusi sebagai root akan ditolak. Perbaikan ini tidak pernah mengikuti `path_cactilog`, sehingga berkas log yang dikonfigurasi di dalam direktori kode tidak dapat mengarahkan perbaikan ke sana. Diagnostik tetap memeriksa direktori berkas log yang dikonfigurasi pada setiap rilis.

Perbaikan ini tidak mengubah kepemilikan, menjalankan perintah shell, menulis ulang konfigurasi, ataupun memodifikasi data aplikasi Cacti. Setiap perbaikan baru harus menyertakan diagnostik, handler yang masuk daftar izin, konfirmasi, pencatatan audit, dan pengujian.

## Penyelidikan gejala

Operator dan Administrator dapat memilih **Selidiki gejala** pada halaman Doctor. Aturan yang sama tersedia melalui `--symptom=graphs_stopped`, `slow_polling`, `devices_missing`, atau `alerts_missing`, dengan keluaran teks atau JSON. Bundel dukungan menyertakan penyelidikan gejala yang relevan.

Setiap kandidat mencantumkan pemeriksaan yang diamati beserta langkah verifikasi berikutnya. Kandidat merupakan hipotesis, bukan akar penyebab yang telah dipastikan. Pengamatan yang hilang, belum dinilai, atau kedaluwarsa tidak pernah menetapkan suatu penyebab. Penyelidikan web menggunakan laporan yang telah disaring berdasarkan izin; laporan CLI menggunakan akses akun sistem operasi.

## Kesegaran pembaruan RRD

`filesystem.rrd_stale` memeriksa hingga 500 sumber data aktif, tidak termasuk perangkat yang dinonaktifkan dan perangkat yang mati. Pada instalasi yang lebih besar, sampel berubah setiap jam sehingga eksekusi berulang mencakup berkas yang berbeda. Pemeriksaan ini membandingkan waktu modifikasi berkas dengan nilai terbesar antara interval poller, langkah RRD sumber, dan langkah profil, lalu mengalikannya dengan **Interval RRD Kedaluwarsa** (bawaan 3). Pemeriksaan ini menampilkan tiga berkas kedaluwarsa tertua serta jumlah perangkat yang terdampak. Hasil web hanya menyertakan perangkat yang diizinkan.

`filesystem.rrd_files` merupakan pemeriksaan keberadaan yang terpisah. Pemeriksaan ini mencari berkas RRD hingga 5.000 sumber data aktif, termasuk yang berada pada perangkat yang dinonaktifkan atau mati, serta menggunakan sampel per jam yang sama.

Boost menambahkan dua kali interval pengosongan (*flush*) yang dikonfigurasi sebagai toleransi penulisan disk. Untuk penulis tertunda lainnya, konfigurasikan **Toleransi Penulisan RRD Tertunda (detik)**. Variabel `RRDCACHED_ADDRESS` yang diumumkan tanpa toleransi, atau interval Boost yang tidak valid, menghasilkan status belum dinilai. Doctor tidak pernah mengosongkan tembolok untuk menjalankan pemeriksaan ini. Waktu modifikasi merupakan bukti aktivitas disk, bukan bukti keberhasilan pengumpulan data. Penembolokan eksternal yang tidak dapat dideteksi Doctor harus dikonfigurasi secara eksplisit.

Berkas yang hilang, tidak dapat dibaca, dan bertanggal masa depan dihitung dalam perincian. Hasil berstatus belum dinilai hanya ketika tidak ada berkas sampel yang dapat dibaca. Hasil berbasis sampel menyatakan bahwa pemeriksaan hanya mencakup sebagian instalasi; status lulus tidak mencakup berkas yang tidak masuk sampel.

## Pratinjau perbaikan dan riwayat audit

Halaman perbaikan Administrator menampilkan setiap jalur yang terdampak, tindakan yang diusulkan, izin saat ini, dan izin target. Persetujuan terikat pada pratinjau tersebut, pengguna yang bertindak, dan masa berlaku lima menit. Konfirmasi menghabiskan pratinjau tersebut; sistem berkas yang berubah memerlukan pratinjau baru. Eksekusi sebagai root, jalur di luar instalasi, tautan yang memerlukan perbaikan, dan izin sistem berkas yang tidak terpenuhi mencegah persetujuan.

`--repair=runtime_directories --preview` mencetak rencana JSON hanya-baca. `--repair=runtime_directories --yes` menyetujui rencana CLI yang baru dihitung dan memeriksanya kembali sebelum eksekusi. Akun CLI harus sudah berwenang untuk memperbaiki instalasi; akun tersebut tidak mewarisi peran web.

Catatan terstruktur `repair.started` harus disimpan sebelum perubahan sistem berkas apa pun dilakukan. Catatan `repair.completed` yang tertaut berisi cuplikan pascaperbaikan dan hasil verifikasi. Operasi yang terhenti meninggalkan catatan mulai untuk penyelidikan. Kegagalan audit penyelesaian dilaporkan sebagai kegagalan meskipun perubahan sistem berkas telah terjadi. Doctor menambahkan izin pemilik dan membuat direktori; Doctor tidak mencoba pemulihan otomatis (*rollback*).

Administrator dengan izin Settings/System Utilities milik Cacti dapat membaca 20 entri audit terbaru pada halaman Doctor. Pengaya ini menyimpan 200 catatan terbaru di `plugin_doctor_audit`; log Cacti juga mencatat ID, tindakan, dan pelakunya. Muatan audit disunting (*redacted*).

## Peringatan yang diterima

Administrator dengan izin Settings/System Utilities milik Cacti dapat membuat **Pengecualian peringatan** dari peringatan yang segar dan telah dinilai pada halaman Doctor. Pengecualian memerlukan pemilik, alasan, dan tanggal peninjauan UTC dalam rentang 90 hari. Pengecualian kedaluwarsa pada tengah malam UTC di awal tanggal tersebut. Hingga 100 pengecualian dapat dikonfigurasi. Daftar tersebut menampilkan entri yang kedaluwarsa serta ID yang tidak ada dalam laporan saat ini, dan memungkinkan penghapusan.

Peringatan yang diamati tetap terlihat, beserta pemilik, alasan, dan masa berlakunya dalam perincian diagnostik. JSON mempertahankan status yang diamati serta menambahkan metadata `accepted` dan `acceptance`. Nagios mengecualikan peringatan diterima yang aktif dari tingkat keparahan keluarnya, namun tetap menyebutkannya dalam keluaran. Prometheus mengekspor baik tingkat keparahan yang diamati maupun yang dapat ditindaklanjuti. Status keluar CLI biasa tetap tidak berubah: peringatan tetap keluar dengan nilai nol, sedangkan kegagalan keluar dengan nilai satu.

Peringatan terjadwal untuk status warning diredam selama pengecualian berlaku; kedaluwarsa atau penghapusan membuat peringatan yang berlanjut kembali memenuhi syarat untuk memicu peringatan. Transisi menuju kegagalan dan pemulihan dari kegagalan tetap memenuhi syarat untuk peringatan. Hasil yang belum dinilai atau kegagalan tidak dapat diterima. Pengakuan pribadi bersifat terpisah dan tidak meredam apa pun. Pembuatan dan penghapusan pengecualian bersifat transaksional dengan catatan audit.

Pembaruan versi membuat `plugin_doctor_audit` dan `plugin_doctor_acceptance` tanpa mengubah data aplikasi Cacti. Ekspor riwayat apa pun yang Anda perlukan sebelum mencopot pemasangan: pencopotan pemasangan menghapus kedua tabel pengaya beserta pengaturannya. Mengembalikan berkas pengaya ke versi lama tetap membiarkan tabel tersedia untuk penyelidikan, tetapi versi yang lebih lama tidak menghormati pengecualian peringatan.

## Persyaratan

| Cacti | PHP | Catatan |
|---|---|---|
| 1.2.20 | 5.4 atau lebih baru | Kode Doctor sendiri kompatibel dengan PHP 5.4 sehingga dapat mendiagnosis sistem lama sebelum pembaruan versi |
| 1.2.31 | 8.0 atau lebih baru | `composer.json` milik Cacti mensyaratkan `>=8.0` |
| 1.2.x saat ini | 8.2 atau lebih baru | `composer.json` milik Cacti mensyaratkan `>=8.2` |
| `develop` (1.3) | 8.3 atau lebih baru | `composer.json` milik Cacti mensyaratkan `^8.3` |

Baris **Kompatibilitas PHP dengan Cacti terpasang** membandingkan versi PHP yang sedang berjalan dengan persyaratan PHP di `composer.json` akar milik Cacti sendiri, termasuk batas atas dari batasan caret seperti `^8.3`. Berkas eksekusi PHP CLI yang dikonfigurasi juga diperiksa terhadap persyaratan yang sama. Doctor mengenali bentuk batasan `>=` dan `^` yang digunakan oleh paket Cacti tersebut. Persyaratan yang tidak dapat dibaca, cacat format, hilang, atau tidak dikenali menghasilkan peringatan; instalasi Cacti 1.2.20–1.2.30 tanpa manifes tetap menggunakan batas bawah pemasang PHP 5.4 yang terdokumentasi. Kompatibilitas PHP 5.4 milik Doctor sendiri tidak memastikan kompatibilitas dengan instalasi Cacti yang lebih baru.

Baris **Dukungan keamanan hulu PHP** menjawab pertanyaan terpisah: apakah cabang rilis PHP tersebut masih menerima perbaikan keamanan dari proyek PHP? Baris ini melaporkan tanggal berakhirnya dukungan keamanan yang dipublikasikan untuk cabang tersebut dan memberi peringatan setelah tanggal tersebut lewat. Sebagai contoh, PHP 8.1 dapat memenuhi persyaratan runtime instalasi Cacti yang lebih lama meskipun tidak lagi menerima perbaikan keamanan hulu. Hasil lulus tidak berarti rilis tambalan yang terpasang sudah mutakhir, dan Doctor tidak dapat menentukan apakah vendor sistem operasi menyediakan perbaikan *backport*.

Tanggal dukungan dibundel bersama Doctor dari [jadwal dukungan PHP](https://www.php.net/supported-versions.php) dan [daftar akhir masa pakai (EOL)](https://www.php.net/eol.php), terakhir diperiksa pada 2026-11-08. Cabang yang tidak dikenal dan prarilis menghasilkan peringatan alih-alih dianggap lulus. Tidak ada permintaan jaringan yang dilakukan selama diagnostik. Perbarui data dukungan Doctor ketika PHP menerbitkan jadwal baru. ID JSON/pemantauan yang sudah ada `php.version` dan `php.security_baseline` tidak berubah.

## Pengembangan

Rangkaian pengujian unit menggunakan Pest dan berjalan pada PHP 8.2 atau lebih baru:

```console
composer install
composer test
```

Pengujian mengganti fungsi Cacti yang dipanggil Doctor dengan tiruan kecil di `tests/CactiStubs.php`, sehingga dapat berjalan tanpa instalasi Cacti.

GitHub Actions menjalankan empat jenis pemeriksaan pada setiap push dan pull request:

- `php -l` pada setiap berkas PHP di bawah PHP 5.4, 5.6, 7.0, 7.1, 7.4, serta 8.0 hingga 8.4.
- Rangkaian pengujian unit pada PHP 8.2, 8.3, dan 8.4.
- `locales/build_gettext.sh --check`, yang akan gagal apabila templat terjemahan kedaluwarsa, katalog tidak lengkap atau *fuzzy*, atau katalog terkompilasi berbeda dari sumbernya.
- Tujuh pekerjaan integrasi yang memasang Cacti 1.2.20, cabang 1.2.x saat ini, dan `develop` terhadap MySQL dan MariaDB, baik dengan cmd.php maupun Spine. Setiap pekerjaan memasang dan mengaktifkan pengaya, menjalankan laporan CLI lengkap, serta memeriksa skema laporan, total ringkasan, status yang diharapkan, dan himpunan kegagalan yang tepat. Setelah itu, pekerjaan tersebut merusak jalur biner dan stempel waktu poller, memastikan keduanya dilaporkan, memulihkannya, menguji perbaikan beserta konfirmasinya, lalu menjalankan penonaktifan, pengaktifan kembali, pencopotan pemasangan, dan pemasangan ulang. Laporan JSON disimpan sebagai artefak ketika suatu pekerjaan gagal.

## Kontribusi

Pull request ditujukan ke `develop`. Pastikan berkas produksi tetap kompatibel dengan PHP 5.4 dan gunakan gaya penulisan Cacti: tab, string bertanda kutip tunggal, serta fungsi pembantu Cacti seperti `read_config_option()` dan `db_fetch_cell()`. Tambahkan pengujian unit untuk setiap perubahan perilaku, bubuhkan tanda tangan pada commit Anda (`git commit -s`), dan tambahkan satu baris ke `CHANGELOG.md`.

### Terjemahan

Bungkus setiap pesan yang terlihat oleh pengguna dengan `__('...', 'doctor')` (atau `__n()`, `__x()`, `__esc()`), dan berikan kalimat yang memuat suatu nilai dalam satu string format dengan placeholder berurutan `%s`/`%d` alih-alih menggabungkan potongan-potongan teks. Fungsi `__()` milik Cacti hanya memformat pesan ketika pesan tersebut memuat penentu format dan tidak mendukung bentuk posisional `%1$s`. Fungsi ini juga mengubah `%%` menjadi `%` sebelum pemformatan, sehingga jangan pernah mencantumkan tanda persen literal di dalam pesan: teruskan nilai beserta tandanya sebagai argumen (`__('Usage: %s', '50%', 'doctor')`). Baris log tetap menggunakan bahasa Inggris: gunakan `doctor_repair_message()` untuk teks perbaikan dan `doctor_n_()` untuk pesan yang dicatat ke log dan hanya diterjemahkan di tempat penampilannya. Biarkan ID pemeriksaan, kunci JSON, kata kunci status, keluaran pemantauan, dan baris log tidak diterjemahkan.

`locales/build_gettext.sh` menghasilkan ulang templat `locales/po/cacti.pot`, menggabungkannya ke dalam setiap katalog `locales/po/<locale>.po`, dan mengompilasi `locales/LC_MESSAGES/<locale>.mo`; lakukan commit untuk ketiganya. CI menjalankan `sh locales/build_gettext.sh --check`, yang akan gagal apabila templat sudah kedaluwarsa atau katalog kehilangan entri, memiliki entri fuzzy, placeholder berbeda, atau berkas hasil kompilasi tidak mutakhir. Oleh karena itu, pesan yang berubah memerlukan pembaruan terjemahan pada pull request yang sama. Proses ini membutuhkan GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Bahasa baru berupa berkas `<locale>.po` baru yang dinamai sesuai penamaan lokal pada Cacti (misalnya `pt-BR`).

## Keamanan

Laporkan kerentanan secara pribadi sebagaimana dijelaskan dalam [SECURITY.md](../../../SECURITY.md), bukan melalui isu publik.

## Lisensi

Hak cipta (C) 2026 Thomas Vincent. Dirilis di bawah GNU General Public License, versi 2 atau lebih baru. Lihat [LICENSE](../../../LICENSE).
