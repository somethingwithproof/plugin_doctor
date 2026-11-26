<!-- Source: README.md; SHA256: ee03c7ac68aca21c8155c29b5b43a1f206c2f0c379c8b07bb4113919c18aafde -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: stetoskop takan bir kaktüs. Tanı koy. Onar. İzle.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Kalite Kapısı Durumu"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Lisans: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ ve 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor, bir kurulumu tek seferde tanılayan ve yalnızca bir yönetici istediğinde küçük onarımlar uygulayan bir Cacti eklentisidir.

**Durum: geliştirme aşamasında, 1.0 öncesi.** En son sürüm [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1)'dir. Bu yama, 0.6.0 sürümündeki rol kapsamlı erişim, rehberli tanılama, kapsamlı RRD güncellik kontrolleri, onarım önizlemeleri ve denetim geçmişi, kabul edilen uyarı istisnaları ile çevirilere Hintçe ve Arapça kataloglar ile çevrilmiş kullanıcı kılavuzları ekler. Ayrıntılar için [CHANGELOG.md](../../../CHANGELOG.md) dosyasına bakın.

## Ekran Görüntüleri

PHP 8.3.36 çalıştıran yalıtılmış bir Cacti 1.2.31 tanıtım kurulumundaki tanılama ve zamanlama ayarları; Cacti PHP uyumluluğu, yukarı akış güvenlik desteği ve veritabanı sağlığı kontrollerini içerir. Burada gösterilen uyarılar ve hatalar bu tanıtım ortamını açıklar.

![Başarılı, uyarı ve hata sonuçlarını içeren Doctor tanılama tablosu](../../screenshots/diagnostics.png)

![Doctor zamanlama, uyarı ve eşik ayarları](../../screenshots/settings.png)

Cacti sorunları genellikle belirtiler olarak ortaya çıkar: boş grafikler, durmuş bir poller, kurulmayan bir eklenti. Bunun nedeni çoğu zaman CLI derlemesinde eksik bir PHP uzantısı, poller'ın yazamadığı bir günlük dizini, yanlış ikili dosyaya işaret eden bir RRDtool yolu veya saat dilimi tabloları olmayan bir veritabanı gibi bozulmuş bir ön koşuldur. Doctor bu ön koşulları doğrudan kontrol eder ve her birini ne bulduğunu açıklayan bir cümleyle birlikte başarılı, uyarı veya başarısız olarak raporlar. Aynı rapor bir web sayfasında, komut satırında ve izleme için JSON biçiminde kullanılabilir.

## Neleri kontrol eder

| Alan | Kontroller |
|---|---|
| Doctor | Doctor'ın kendisinin `root` olarak çalışıp çalışmadığı (bu durum izin kontrollerinin yanlış hesabı tanımlamasına yol açar) |
| Cacti ve PHP | Cacti sürümü, yükleyicinin hiç tamamlamadığı bir yükseltme, dosyaları eksik etkin eklentiler, kurulu Cacti paketiyle PHP uyumluluğu, PHP yukarı akış güvenlik desteği durumu |
| PHP uzantıları | Web PHP'sinde ve poller'ın kullandığı CLI PHP'sinde gerekli uzantılar ile önerilen özellikler |
| PHP yapılandırması | Cacti'nin kendi önerileri kullanılarak `memory_limit`, `max_execution_time` ve `date.timezone` |
| Veritabanı | Bağlanabilirlik, Cacti önerisine göre sunucu sürümü, UTF-8 karakter kümesi, saat dilimi tabloları, çekirdek tablolar, PHP ana bilgisayarından saat sapması ve Cacti'nin hata olarak işaretlediği InnoDB ayarları |
| Veritabanı sağlığı | İş yüküne bağlı ayar önerileriyle birlikte bağlantı kapasitesi, arabellek havuzu (buffer-pool) okumaları, disk geçici tabloları, bağlantı iş parçacığı oluşturma, yavaş sorgular ve InnoDB günlük arabelleği beklemeleri |
| Dosya sistemi | Yazılabilir önbellek, günlük ve RRA dizinleri; RRD dosyaları için boş alan; RRD dosyası olmayan veya dosya güncellemeleri gecikmiş etkin veri kaynakları; `include/config.php` dosyasının herkes tarafından okunabilir olmaması; Cacti günlüğünün yazılabilir olması ve aşırı büyük olmaması |
| İkili dosyalar | PHP CLI, RRDtool, `snmpget`, `snmpwalk` ve yapılandırılmış poller olduğunda Spine (Cacti'nin belirttiği durumlarda sürümleri dahil) |
| Günlük | En son Cacti günlük satırları arasındaki hatalar ve en sık görülen ileti |
| Cihazlar | Çalışmayan veya kurtarma durumundaki etkin cihazlar, son hatalarıyla birlikte en uzun süredir çalışmayan üç cihaz ve çoğu cihaz aynı anda çalışmadığında verilen bir hata |
| Poller | Poller türü ve aralığı, ana poller'ın en son tamamlanmasından bu yana geçen süre, aralığa göre çalışma süresi, hiçbir RRD dosyasına ulaşmayan poller çıktısı, bildirim göndermeyi durduran uzak poller'lar, duraklamış bir Boost ve farklı bir veritabanına işaret eden Spine yapılandırması |

Her kontrolün `database.timezone` veya `binary.rrdtool` gibi kararlı bir kimliği vardır; böylece betikler tekil sonuçlara göre işlem yapabilir.

## Kod ve test haritası

| Davranış | Uygulama | Bu depodaki test kanıtı |
|---|---|---|
| Tanılama kontrolleri ve kararlı rapor kimlikleri | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Rol kapsamlı erişim ve sansürlenmiş web raporları | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Rehberli belirti incelemeleri | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD güncelliği ve ertelenmiş yazma işleme | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Onarım önizlemeleri, denetim geçmişi ve kabul edilen uyarılar | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Zamanlanmış kontroller ve alarm geçişleri | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Bu başvurular uygulamayı ve test kapsamını tanımlar; geçerli revizyon için her CI işinin geçtiğini göstermez. Dağıtmayı planladığınız revizyonun iş akışı çalıştırmasını kontrol edin.

## Veritabanı sağlığı önerileri

Doctor'ın yerel PHP çözümleyicisi, Cacti'nin mevcut veritabanı bağlantısı üzerinden sabit bir genel MySQL veya MariaDB sayaç kümesini okur. Rapor başına iki salt okunur sorgu yapar, ek kimlik bilgisi veya yürütülebilir dosya gerektirmez ve veritabanı yapılandırmasını hiçbir zaman değiştirmez. Bu kontroller web raporunda, CLI'da, JSON'da, izleme çıktısında, destek paketinde ve zamanlanmış durum izlemede görünür.

| Kontrol Kimliği | İnceleme tetikleyicisi |
|---|---|
| `database.health_sample` | Başlatmadan veya `FLUSH STATUS` komutundan bu yana 24 saatten az süre geçmesi ya da kullanılamayan/tutarsız çalışma süresi |
| `database.connection_capacity` | Geçerli veya kaydedilen en yüksek bağlantı sayısının mevcut `max_connections` değerinin en az %80'i olması |
| `database.buffer_pool_reads` | En az 10.000 okuma isteğiyle birlikte `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` oranının en az %1 olması |
| `database.temporary_tables` | En az 1.000 geçici tabloyla birlikte `Created_tmp_disk_tables / Created_tmp_tables` oranının en az %25 olması |
| `database.thread_cache` | En az 1.000 bağlantı denemesi ve `thread_handling=one-thread-per-connection` ile birlikte `Threads_created / Connections` oranının en az %5 olması |
| `database.slow_queries` | En az 1.000 deyimle birlikte `Slow_queries / Queries` oranının en az %1 olması |
| `database.redo_log_waits` | Sıfırdan farklı `Innodb_log_waits` |

Bunlar satıcı yapılandırma hedefleri değil, Doctor'ın inceleme eşikleridir. Bağlantı kapasitesi dışında, kümülatif öneriler yukarıdaki gözlem penceresini gerektirir. Eksik, hatalı biçimlendirilmiş, yinelenen veya aşırı büyük sayaçlar, yetersiz etkinlik ve desteklenmeyen iş parçacığı modları, sağlıklı bir karar veya ayar önerisi yerine uyarı üretir. **Uyarılarda Alarm Ver** etkinleştirildiğinde uyarılar Nagios durumunu ve zamanlanmış alarmları etkileyebilir.

Ölçülen sayaçları ve öneriyi birlikte okuyun. Kümülatif değerler geçerli yükü göstermez; sayaçların farklı sıfırlama geçmişleri olabilir ve bunlar atomik bir anlık görüntü değildir. En yüksek bağlantı sayısı daha eski bir sınırı yansıtıyor olabilir. Yavaş sorgu sayıları `long_query_time` ayarına bağlıdır ve MySQL'in disk geçici tablo sayacı belleğe eşlenen (memory-mapped) dosyaları hariç tutabilir. Düşük bir oran, darboğaz olmadığını kanıtlamaz. Arabellekleri veya bağlantı sınırlarını değiştirmeden önce temsili bir iş yükü altında eğilimleri doğrulayın, sorgu planlarını ve bağlantı yeniden kullanımını gözden geçirin ve **veritabanı ana bilgisayarındaki** belleği ölçün.

Ölçümler kullanılamıyorsa sunucu desteğini ve Cacti hesabının `SHOW GLOBAL STATUS` ile `SHOW GLOBAL VARIABLES` erişimini kontrol edin; Doctor yükseltilmiş kimlik bilgileri istemez. Sayaç tanımları [MySQL durum değişkeni başvurusundan](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) ve [MariaDB durum değişkeni başvurusundan](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables) gelir. Hiçbir MySQLTuner betiği veya kodu kullanılmaz.

Şema veya yapılandırma geçişi gerekmez. Eklenti dosyalarını normal şekilde dağıtın; bu dosyaların geri alınması eklenen tanılamaları kaldırır. Mevcut zamanlanmış durum bir sonraki çalıştırmada yenilenir.

## Güvenliği nasıl sağlar

Bir tanılama aracı, yoklayıcının (poller) veya web sunucusunun ayrıcalıklarıyla çalışır ve yolları ayarlar tablosundan okur; bu nedenle neleri çalıştırdığı ve değiştirdiği konusunda dikkatli olmalıdır.

- Tanılamalar salt okunurdur. Dosyaları, ayarları veya verileri asla değiştirmezler.
- Doctor, yapılandırılmış bir ikili dosyayı yalnızca dosya adı beklenen programla (`php`, `rrdtool`, `snmpget` veya `snmpwalk`) eşleştiğinde çalıştırır. Aksi takdirde ayarlar tablosuna yazabilen herkes Doctor'ın ne çalıştıracağını seçebilirdi. Başka herhangi bir ad uyarı olarak bildirilir ve çalıştırılmaz.
- Doctor yapılandırılmış ikili dosyaları asla root olarak çalıştırmaz ve root olarak çalıştırıldığında bunu bildirir.
- Onarımlar sabit bir izin listesinden (allow-list) gelir. Her biri web arayüzünde kimliği doğrulanmış bir yönetici işlemi veya CLI'da `--yes` parametresi gerektirir ve her biri Cacti günlüğüne yazılır.

## Sürümler

Sürümler SemVer kurallarına uyar ve eklentinin `INFO` dosyasıyla eşleşir. Sürüm seçimi, CI kapıları, paket içerikleri, sağlama toplamları ve geri alma yönergeleri için [sürüm sürecine](../../releasing.md) bakın.

## Kurulum

[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) sayfasından `doctor-VERSION.tar.gz` veya `doctor-VERSION.zip` ile `SHA256SUMS` dosyasını indirin. Arşivin SHA-256 sağlama toplamını doğrulayın, ardından içindeki `doctor/` dizinini Cacti'nin `plugins/` dizinine çıkarın. Bunlar kurulabilir paketlerdir; GitHub'ın otomatik kaynak arşivlerinin dizin adı farklıdır. `develop` dalındaki henüz yayımlanmamış çalışmaları çalıştırmak için kaynak kodundan kurulum yapın.

Kaynak kodundan kurulum için:

Depoyu bir Cacti kurulumunun içine `plugins/doctor` olarak klonlayın veya açın. Dizin adı `plugin_doctor` değil `doctor` olmalıdır.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

**Configuration > Plugin Management** bölümünden **Cacti Doctor** eklentisini kurun ve etkinleştirin; ardından Cacti kullanıcı veya grup izinleri aracılığıyla **Doctor Viewer**, **Doctor Operator** veya **Doctor Administrator** yetki alanı verin. Mevcut **Cacti Doctor** izinleri yükseltmeden sonra Administrator erişimini korur. Rapor, **Utilities > Cacti Doctor** altında görünür.

## Diller

Doctor; `locales/po/` ve `locales/LC_MESSAGES/` altında Geniş Kapsamlı 1. Kademe (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), Afrika (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), Asya (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) ve Güneydoğu Avrupa (`bs-BA`, `hr-HR`, `sr-RS`) yerel ayarlarını kapsayan İngilizce dışı 48 çeviri kataloğuyla birlikte gelir. Dil desteği açık olduğunda (**Configuration > Settings > General > Language Support**) ve bir kullanıcı Cacti'nin dil seçicisinde sunduğu bir yerel ayarı seçtiğinde Cacti ilgili kataloğu gösterir; Cacti'nin seçicisinde henüz listelenmeyen yerel ayarlara ait kataloglar ise Cacti bunları eklediğinde etkinleşir. Web sayfası, ayarlar ve komut satırının yazdırdığı ileti ve rapor metinleri Cacti'nin dilini izler; komut satırı raporunun kendisi ise değiştirmediğiniz sürece İngilizce kalan Cacti varsayılan dilini kullanır.

Makine tarafından okunabilen çıktılar hiçbir zaman çevrilmez: denetim kimlikleri, JSON anahtarları ve durum değerleri, `--format=nagios` ve `--format=prometheus` çıktıları, günlük satırları ve destek paketi bölüm başlıkları, betiklerin ve izleme sistemlerinin her dilde çalışmaya devam edebilmesi için İngilizce kalır. Her denetimin `summary` ve `detail` metni, JSON raporunun çevrilen tek kısmıdır.

Latin Amerika İspanyolcası kataloğu (`es-419`) da paketle birlikte gelir; ancak ne Cacti 1.2 ne de Cacti 1.3'te seçilebilecek bir Latin Amerika İspanyolcası yerel ayarı bulunduğundan, yalnızca Cacti böyle bir yerel ayar eklediğinde etkinleşir. O zamana kadar İspanyolcayı (`es-ES`) seçin.

Cacti, hem 1.2.x hem de 1.3 sürümlerinde bir eklentinin kataloğunu `doctor` metin alanı adıyla `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` konumundan yükler (1.3 sürümü eklenti dizinini yapılandırılabilir eklenti yolu üzerinden çözümler).

## Erişim düzeyleri

| Yetki Alanı | Yetenekler |
|---|---|
| Doctor Viewer | Zamanlanmış son denetim durumlarını, gözlem zamanını, güncelliği ve son toplu geçmişi okur. Tanılama komutları, ham ayrıntılar, yapılandırma veya onarımlar yoktur. |
| Doctor Operator | 120 saniyelik işlem sınırıyla bir tanılama raporu çalıştırır, gizlenmiş ayrıntıları inceler ve bulguları onaylar (acknowledge). Ayar değişikliği veya onarım yoktur. |
| Doctor Administrator | Operator yeteneklerine ek olarak mevcut izin listesindeki onarımları ve Doctor ayarlarını içerir. Onarımlar ve ayarlar ayrıca Cacti'nin Settings/System Utilities yetki alanını gerektirir. |

Utilities menüsü, grup izinleri de dahil olmak üzere kullanıcıya verilen en yüksek Doctor yetki alanına ait sayfayı açar. Yeni Viewer ve Operator yetki alanlarına otomatik izin verilmez. Özgün yetki alanı kimliği Administrator olarak `doctor.php` dosyasına bağlı kalır; böylece mevcut kullanıcı ve grup erişimleri korunur.

Viewer verileri zamanlanmış denetimlerden gelir. Viewer erişimi vermeden önce zamanlamayı etkinleştirin; eksik veya süresi geçmiş gözlemler hiçbir zaman sağlıklı değil, **unknown** olarak görüntülenir. Geçmiş, son 20 zamanlanmış toplu sayımı saklar ve aygıt durumunu hariç tutar. Operator kullanıcıları yeni tanılamaları açıkça başlatır; sıradan sayfa yenilemeleri oturumdaki son raporu kullanır.

Aygıt ayrıntıları ve toplamları, geçerli kullanıcının aygıt izinlerini kullanır. Günlük alıntıları ek olarak Cacti'nin Log Administration yetki alanını gerektirir. Gizli bilgiler, tanılama ayrıntıları web oturumunda saklanmadan veya işlenmeden önce maskelenir. CLI erişimi işletim sistemi hesabı tarafından yönetilmeye devam eder.

Onaylamalar (acknowledgments) kişiseldir ve Cacti günlüğüne kaydedilir. Yalnızca aynı bulgu ve kanıt için geçerlidir; kanıt değiştiğinde yeni bir onaylama gerekir. Geçti/uyarı/başarısız durumunu asla değiştirmezler, uyarıları bastırmazlar veya başarısız olan bir denetimi sağlıklı olarak işaretlemezler. Bu mekanizma, gözlemlenen durumu değiştirmeden uyarı ilkesini etkileyen ve aşağıda açıklanan kabul edilmiş uyarı istisnalarından ayrıdır.

Her işlem POST isteği ve geçerli bir CSRF belirteci gerektirir. Onarımlar, form göndermeyen bir Cancel bağlantısı içeren ayrı bir onay sayfası sunar ve işlemi yapan kullanıcı ile sonucu Cacti günlüğüne kaydeder.

## Komut satırı

Bunları root olarak değil, Cacti yoklayıcı (poller) kullanıcısı olarak Cacti kök dizininden çalıştırın:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Metin çıktısı, her denetim için durumu, kategorisi, özeti ve ayrıntısıyla birlikte bir satır yazdırır. `--json` seçeneği, durum sayılarını içeren bir `summary` nesnesi ile girişleri `id`, `category`, `status`, `summary`, `detail` ve izin listesindeki bir onarım geçerli olduğunda `repair`/`repairable` alanlarını taşıyan bir `checks` dizisi yazdırır.

| Çıkış durumu | Anlamı |
|---|---|
| `0` | Hiçbir denetim başarısız olmadı veya istenen onarım başarılı oldu. Uyarılar çıkış durumunu değiştirmez. |
| `1` | En az bir denetim başarısız oldu veya istenen bir onarım başarısız oldu. |
| `2` | Kullanım hatası: `--yes` olmadan çalıştırılan bir onarım (`--preview` bunu gerektirmez), bilinmeyen bir onarım kimliği, bilinmeyen bir çıktı biçimi, desteklenmeyen bir `--symptom` veya biçim birleşimi ya da bulunamayan bir Cacti kurulumu. |

Cacti her CLI betiği için `memory_limit` değerini yükseltir; bu nedenle PHP çalışma zamanı yapılandırma denetimi yalnızca web sayfasında anlamlıdır.

## Zamanlanmış denetimler ve uyarılar

**Configuration > Settings > Doctor** altında **Run Checks on a Schedule** seçeneğini açın ve 15 dakikadan bir güne kadar bir aralık seçin. Zamanı gelen her yoklayıcı döngüsünden sonra Doctor tüm denetimleri bir arka plan işleminde çalıştırır; böylece yoklayıcının kendi çalışma süresi etkilenmez.

Her çalıştırma, tüm denetimlerin gözlemlenen durumunu kaydeder. Etkin uyarı istisnaları bu gözlemi değiştirmeden uyarı ilkesini etkiler. Bir denetim başarısız olmaya başladığında veya başarısızlığı sona erdiğinde Doctor değişikliği Cacti günlüğüne yazar ve **Alert Email Addresses** ayarlanmışsa Cacti'nin posta ayarları üzerinden bu adreslere e-posta gönderir. **Alert on Warnings**, uyarılara giriş ve uyarılardan çıkış değişikliklerini de ekler. İlk çalıştırma yalnızca bir temel durum (baseline) kaydeder.

Zamanlanmış raporlar, birincil yoklayıcı üzerinde bir veritabanı danışma kilidi (advisory lock) altında çalışır ve iki dakikalık bir çalışan sınırına sahiptir. Doctor, eksik veya bayat sonuçların görülebilmesi için son başlangıç ve başarılı tamamlanma zamanını bildirir. Sonuçlar, belirlenen aralık artı bir yoklama döngüsü ve üç dakika boyunca güncel sayılır. Tamamlanmayan bir çalıştırma, normal aralığa kadar 5, 10, 20 ve daha fazla dakika sonra yeniden denenir. Başarısız olan uyarı teslimi, artan gecikmelerle en fazla üç yeniden deneme için saklanır; bundan sonra Cacti'nin posta ayarlarını düzeltin ve yoklayıcı kullanıcısı olarak `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` komutunu çalıştırın. Posta sunucusunun kabul etmesi gelen kutusuna teslimatı doğrulamaz.

Aynı sekme yoklayıcı çalışma süresi (aralığın %80'i), RRA boş disk alanı (%10'un altında uyarı, %2'nin altında başarısızlık), veritabanı saat kayması (5 saniyenin üzerinde uyarı, 60 saniyenin üzerinde başarısızlık) ve Cacti günlük boyutu (100 MB) eşiklerini belirler. Boş veya geçersiz değerler bu varsayılanlara geri döner.

## İzleme entegrasyonu

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` performans verileriyle birlikte tek bir durum satırı yazdırır ve `0` (OK), `1` (WARNING) veya `2` (CRITICAL) koduyla çıkar; böylece Nagios, Icinga veya uyumlu herhangi bir sistem bunu doğrudan çalıştırabilir. `--format=prometheus`, node_exporter'ın textfile toplayıcısı için Prometheus metin biçimini yazar: denetim başına `cacti_doctor_check_status` (0 geçti veya kabul edilmiş uyarı, 1 işlem gerektiren uyarı, 2 başarısızlık), istisnalardan önce `cacti_doctor_check_observed_status`, `cacti_doctor_check_accepted`, durum başına `cacti_doctor_checks` ve `cacti_doctor_last_run_timestamp_seconds`. JSON denetim satırları bir `assessment` alanı içerir; `not_assessed`, denetimin mevcut verilerden bir sonuca varamadığı anlamına gelir.

## Destek paketi

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Bu paket; Doctor, Cacti, PHP, işletim sistemi ve veritabanı sürümlerini, yoklayıcı ve Boost istatistiklerini, tam raporu ve Cacti günlüğünün son 200 satırını içeren tek bir metin dosyasıdır. Parola, gizli anahtar, belirteç (token), community ve anahtar adlarından sonra gelen değerler maskelenir. Doctor dosyayı yalnızca sahibi tarafından okunabilir şekilde oluşturur ve mevcut bir dosyanın üzerine yazmayı reddeder. Herhangi bir yerde paylaşmadan önce dosyayı gözden geçirin.

## Onarım ilkesi

Doctor tek bir onarım içerir: `runtime_directories`. Eksik Cacti çalışma zamanı dizinlerini oluşturur ve mevcut izinleri kaldırmadan sahip için okuma, yazma ve çalıştırma bitlerini ekler.

Cacti 1.3'te `$cache_path`, `$log_path` ve `$rra_path` dizinlerini; diğer sürümlerde ise kurulumun `cache`, `log` ve `rra` dizinlerini hedefler. Zaten yazılabilir olan dizinleri atlar; Cacti kurulumu dışındaki dizinleri (örneğin `/var/log` altındaki bir günlük dizinini), sembolik bağlantıları ve root olarak çalıştırmayı reddeder. `path_cactilog` ayarını asla izlemez; bu sayede bir kod dizini içinde yapılandırılmış bir günlük dosyası onarımı oraya yönlendiremez. Tanılama ise her sürümde yapılandırılmış günlük dosyasının dizinini denetlemeye devam eder.

Sahipliği değiştirmez, kabuk komutları çalıştırmaz, yapılandırmayı yeniden yazmaz veya Cacti uygulama verilerini değiştirmez. Yeni eklenecek her onarım; bir tanılama, izin listesine eklenmiş bir işleyici, onay mekanizması, denetim günlüğü ve testler içermelidir.

## Belirtileri inceleme

Operatörler ve Yöneticiler, Doctor sayfasında **Bir belirtiyi incele** seçeneğini seçebilir. Aynı kurallar metin veya JSON çıktısıyla `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` ya da `alerts_missing` üzerinden de kullanılabilir. Destek paketleri ilgili belirti incelemelerini içerir.

Her aday, gözlemlenen denetimleri ve bir sonraki doğrulama adımını listeler. Adaylar doğrulanmış kök nedenler değil, hipotezlerdir. Eksik, değerlendirilmemiş veya güncelliğini yitirmiş gözlemler asla bir neden kanıtlamaz. Web incelemeleri izinlere göre filtrelenmiş raporu kullanır; CLI raporları ise işletim sistemi hesabının erişimini kullanır.

## RRD güncelleme güncelliği

`filesystem.rrd_stale`, devre dışı bırakılmış ve çalışmayan cihazlar hariç tutularak en fazla 500 etkin veri kaynağını denetler. Daha büyük kurulumlarda örneklem her saat değişir; böylece yinelenen çalıştırmalar farklı dosyaları kapsar. Dosya değişiklik zamanlarını, yoklama aralığı, kaynak RRD adımı ve profil adımından en büyüğünün **RRD Eskime Aralıkları** (varsayılan 3) ile çarpımıyla karşılaştırır. En eski üç güncelliğini yitirmiş dosyayı ve etkilenen cihaz sayısını gösterir. Web sonuçları yalnızca izin verilen cihazları içerir.

`filesystem.rrd_files` ayrı bir varlık denetimidir. Devre dışı bırakılmış veya çalışmayan cihazlardakiler dahil en fazla 5.000 etkin veri kaynağının RRD dosyasını arar ve aynı saatlik örneklemi kullanır.

Boost, yapılandırılmış boşaltma aralığının iki katını disk yazma payı olarak ekler. Başka bir ertelenmiş yazıcı için **Ertelenmiş RRD Yazma Payı (saniye)** ayarını yapılandırın. Pay olmadan bildirilen bir `RRDCACHED_ADDRESS` veya geçersiz bir Boost aralığı değerlendirilmemiş sonuç üretir. Doctor bu denetimi gerçekleştirmek için asla önbelleği boşaltmaz. Değişiklik zamanı başarılı veri toplamanın kanıtı değil, disk etkinliğinin kanıtıdır. Doctor'ın algılayamadığı harici önbellekleme açıkça yapılandırılmalıdır.

Eksik, okunamayan ve gelecek tarihli dosyalar ayrıntıda sayılır. Yalnızca örneklenen hiçbir dosya okunamadığında sonuç değerlendirilmemiş olur. Örneklenmiş bir sonuç yalnızca kurulumun bir kısmını kapsadığını belirtir; başarılı bir sonuç örneklenmemiş dosyaları kapsamaz.

## Onarım önizlemeleri ve denetim geçmişi

Yönetici onarım sayfası etkilenen her yolu, önerilen eylemi, mevcut izinleri ve hedef izinleri gösterir. Onay; söz konusu önizlemeye, işlemi gerçekleştiren kullanıcıya ve beş dakikalık bir geçerlilik süresine bağlıdır. Doğrulama önizlemeyi tüketir; değişen bir dosya sistemi yeni bir önizleme gerektirir. Root olarak çalıştırma, kurulum dışındaki yollar, onarım gerektiren bağlantılar ve karşılanmayan dosya sistemi izinleri onayı engeller.

`--repair=runtime_directories --preview` salt okunur bir JSON planı yazdırır. `--repair=runtime_directories --yes` yeni hesaplanmış bir CLI planını onaylar ve yürütmeden önce yeniden denetler. CLI hesabının kurulumu onarmak için halihazırda yetkili olması gerekir; web rollerini devralmaz.

Herhangi bir dosya sistemi değişikliğinden önce yapılandırılmış bir `repair.started` kaydı kaydedilmelidir. Bağlantılı bir `repair.completed` kaydı onarım sonrası anlık görüntüyü ve doğrulama sonucunu içerir. Kesintiye uğramış bir işlem, inceleme için bir başlatılmış kaydı bırakır. Dosya sistemi değişiklikleri gerçekleşmiş olsa bile tamamlama denetimi hatası başarısızlık olarak raporlanır. Doctor sahip izinlerini ekler ve dizinleri oluşturur; otomatik geri alma girişiminde bulunmaz.

Cacti'nin Settings/System Utilities iznine sahip yöneticiler Doctor sayfasında son 20 denetim girdisini okuyabilir. Eklenti, `plugin_doctor_audit` tablosunda son 200 kaydı tutar; Cacti günlüğü de bunların kimliklerini, eylemlerini ve aktörlerini kaydeder. Denetim yükleri sansürlenir.

## Kabul edilen uyarılar

Cacti'nin Settings/System Utilities iznine sahip yöneticiler Doctor sayfasında güncel ve değerlendirilmiş bir uyarıdan **Uyarı istisnası** oluşturabilir. Bir istisna için sahip, neden ve 90 gün içinde bir UTC gözden geçirme tarihi gerekir. İlgili tarihin başlangıcında UTC gece yarısında sona erer. En fazla 100 istisna yapılandırılabilir. Liste, süresi dolmuş girdileri ve mevcut raporda bulunmayan kimlikleri görüntüler ve kaldırmaya olanak tanır.

Gözlemlenen uyarı, tanılama ayrıntılarında sahibi, nedeni ve bitiş tarihiyle görünür kalır. JSON gözlemlenen durumu korur ve `accepted` ile `acceptance` meta verilerini ekler. Nagios etkin kabul edilen uyarıları çıkış önem düzeyinden hariç tutar ancak çıktısında bunları adlandırır. Prometheus hem gözlemlenen hem de eyleme geçirilebilir önem düzeyini dışa aktarır. Standart CLI çıkış durumu değişmeden kalır: uyarılar zaten sıfır, hatalar bir çıkış kodu verir.

İstisna geçerli olduğu sürece zamanlanmış uyarı bildirimleri bastırılır; sürenin dolması veya kaldırılması, devam eden bir uyarıyı yeniden uyarı bildirimleri için uygun hale getirir. Hata geçişleri ve hatadan kurtarma bildirimler için uygun olmaya devam eder. Değerlendirilmemiş bir sonuç veya hata kabul edilemez. Kişisel onaylama ayrıdır ve hiçbir şeyi bastırmaz. İstisna oluşturma ve kaldırma işlemleri denetim kaydıyla işlemsel (transactional) olarak yürütülür.

Yükseltme, Cacti uygulama verilerini değiştirmeden `plugin_doctor_audit` ve `plugin_doctor_acceptance` tablolarını oluşturur. Kaldırmadan önce ihtiyacınız olan tüm geçmişi dışa aktarın: kaldırma işlemi her iki eklenti tablosunu ve ayarlarını siler. Eklenti dosyalarının eski sürüme döndürülmesi tabloları inceleme için erişilebilir bırakır, ancak eski sürümler uyarı istisnalarını dikkate almaz.

## Gereksinimler

| Cacti | PHP | Notlar |
|---|---|---|
| 1.2.20 | 5.4 veya üzeri | Doctor'ın kendi kodu PHP 5.4 ile uyumludur; böylece yükseltme öncesinde eski sistemleri tanılayabilir |
| 1.2.31 | 8.0 veya üzeri | Cacti'nin `composer.json` dosyası `>=8.0` gerektirir |
| Güncel 1.2.x | 8.2 veya üzeri | Cacti'nin `composer.json` dosyası `>=8.2` gerektirir |
| `develop` (1.3) | 8.3 veya üzeri | Cacti'nin `composer.json` dosyası `^8.3` gerektirir |

**Kurulu Cacti ile PHP uyumluluğu** satırı, çalışan PHP sürümünü Cacti'nin kendi kök `composer.json` dosyasındaki PHP gereksinimiyle (örneğin `^8.3` gibi bir şapka kısıtlamasının üst sınırı dahil) karşılaştırır. Yapılandırılmış PHP CLI yürütülebilir dosyası aynı gereksinime göre denetlenir. Doctor bu Cacti paketleri tarafından kullanılan `>=` ve `^` kısıtlama biçimlerini tanır. Okunamayan, hatalı biçimlendirilmiş, eksik veya tanınmayan bir gereksinim uyarı üretir; manifest dosyası olmayan Cacti 1.2.20–1.2.30 kurulumları belgelenmiş PHP 5.4 kurulum alt sınırını korur. Doctor'ın kendi PHP 5.4 uyumluluğu, daha yeni bir Cacti kurulumuyla uyumluluk sağlamaz.

**PHP yukarı akış güvenlik desteği** satırı ayrı bir soruyu yanıtlar: bu PHP sürüm dalı PHP projesinden hala güvenlik düzeltmeleri alıyor mu? Dalın yayımlanmış güvenlik desteği bitiş tarihini raporlar ve bu tarihten sonra uyarı verir. Örneğin PHP 8.1, daha eski bir Cacti kurulumunun çalışma zamanı gereksinimini karşılarken artık yukarı akış güvenlik düzeltmeleri almıyor olabilir. Başarılı bir sonuç, kurulu yama sürümünün güncel olduğu anlamına gelmez ve Doctor bir işletim sistemi satıcısının geriye dönük düzeltmeler sağlayıp sağlamadığını belirleyemez.

Destek tarihleri Doctor ile birlikte [PHP destek takvimi](https://www.php.net/supported-versions.php) ve [kullanım ömrü sonu listesi](https://www.php.net/eol.php) kaynaklarından paketlenmiştir; son denetim tarihi 2026-11-08'dir. Bilinmeyen dallar ve ön sürümler, varsayılan bir geçer sonuç yerine uyarı üretir. Tanılama sırasında hiçbir ağ isteği yapılmaz. PHP yeni bir takvim yayımladığında Doctor'ın destek verilerini güncelleyin. Mevcut JSON/izleme kimlikleri `php.version` ve `php.security_baseline` değişmemiştir.

## Geliştirme

Birim test paketi Pest kullanır ve PHP 8.2 veya üzeri sürümlerde çalışır:

```console
composer install
composer test
```

Testler, Doctor'ın çağırdığı Cacti işlevlerini `tests/CactiStubs.php` içindeki küçük yedeklerle değiştirir; böylece bir Cacti kurulumu olmadan çalışırlar.

GitHub Actions, her push ve pull request işleminde dört tür denetim çalıştırır:

- PHP 5.4, 5.6, 7.0, 7.1, 7.4 ve 8.0'dan 8.4'e kadar tüm sürümler altında her PHP dosyası üzerinde `php -l`.
- PHP 8.2, 8.3 ve 8.4 üzerinde birim test paketi.
- Eski bir çeviri şablonunda, eksik veya belirsiz (fuzzy) bir katalogda ya da kaynağından farklı derlenmiş bir katalogda başarısız olan `locales/build_gettext.sh --check`.
- Hem cmd.php hem de Spine ile MySQL ve MariaDB üzerinde Cacti 1.2.20, güncel 1.2.x dalı ve `develop` kuran yedi tümleştirme işi. Her iş eklentiyi kurup etkinleştirir, tam CLI raporunu çalıştırır ve rapor şemasını, özet toplamlarını, beklenen durumları ve tam hata kümesini denetler. Ardından bir ikili dosya yolunu ve yoklama zaman damgasını bozar, ikisinin de raporlandığını doğrular, bunları geri yükler, onarımı ve onayını dener ve devre dışı bırakma, etkinleştirme, kaldırma ve yeniden kurma işlemlerini çalıştırır. Bir iş başarısız olduğunda JSON raporu yapıt (artifact) olarak saklanır.

## Katkıda Bulunma

Çekme istekleri `develop` dalına gönderilir. Üretim dosyalarını PHP 5.4 ile uyumlu tutun ve Cacti'nin stilini kullanın: sekmeler, tek tırnaklı dizeler ve `read_config_option()` ile `db_fetch_cell()` gibi Cacti yardımcı işlevleri. Her davranış değişikliği için bir birim testi ekleyin, commit'lerinizi imzalayın (`git commit -s`) ve `CHANGELOG.md` dosyasına bir satır ekleyin.

### Çeviriler

Kullanıcıya görünen her iletiyi `__('...', 'doctor')` (veya `__n()`, `__x()`, `__esc()`) içine alın ve değer içeren bir cümlede parçaları birleştirmek yerine sıralı `%s`/`%d` yer tutucularına sahip tek bir biçim dizesi kullanın. Cacti'nin `__()` işlevi bir iletiyi yalnızca biçim belirteci içerdiğinde biçimlendirir ve konumsal `%1$s` biçimlerini desteklemez. Ayrıca biçimlendirmeden önce `%%` ifadesini `%` karakterine dönüştürür; bu nedenle bir iletiye asla düz yüzde işareti koymayın: değeri işaretiyle birlikte bir argüman olarak geçirin (`__('Usage: %s', '50%', 'doctor')`). Günlük satırları İngilizce kalır: onarım metni için `doctor_repair_message()`, günlüğe kaydedilip yalnızca gösterildiği yerde çevrilen iletiler için ise `doctor_n_()` kullanın. Denetim kimliklerini, JSON anahtarlarını, durum anahtar sözcüklerini, izleme çıktısını ve günlük satırlarını çevirmeden bırakın.

`locales/build_gettext.sh`, `locales/po/cacti.pot` şablonunu yeniden oluşturur, her `locales/po/<locale>.po` kataloğuyla birleştirir ve `locales/LC_MESSAGES/<locale>.mo` dosyasını derler; üçünü de commit'leyin. CI, `sh locales/build_gettext.sh --check` komutunu çalıştırır; şablon güncel değilse, bir katalogda eksik veya belirsiz (fuzzy) girdi varsa, bir yer tutucu farklıysa ya da derlenmiş dosya güncelliğini yitirmişse başarısız olur. Bu nedenle değiştirilen bir iletinin çevirilerinin aynı çekme isteğinde güncellenmesi gerekir. Bunun için GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`) gerekir. Yeni bir dil, Cacti'nin yerel ayarları adlandırdığı biçimde (örneğin `pt-BR`) adlandırılmış yeni bir `<locale>.po` dosyasıdır.

## Güvenlik

Güvenlik açıklarını herkese açık sorun kayıtlarında değil, [SECURITY.md](../../../SECURITY.md) dosyasında açıklandığı şekilde özel olarak bildirin.

## Lisans

Telif Hakkı (C) 2026 Thomas Vincent. GNU Genel Kamu Lisansı sürüm 2 veya üzeri kapsamında yayımlanmıştır. Bkz. [LICENSE](../../../LICENSE).
