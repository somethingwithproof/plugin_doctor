<!-- Source: README.md; SHA256: ee03c7ac68aca21c8155c29b5b43a1f206c2f0c379c8b07bb4113919c18aafde -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: cây xương rồng đeo ống nghe. Chẩn đoán. Sửa chữa. Giám sát.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Trạng thái Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Giấy phép: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ và 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor là một plugin Cacti giúp chẩn đoán toàn bộ bản cài đặt chỉ trong một lượt và chỉ thực hiện các sửa chữa nhỏ khi quản trị viên yêu cầu.

**Trạng thái: đang phát triển, trước phiên bản 1.0.** Bản phát hành mới nhất là [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Bản vá này bổ sung danh mục tiếng Hindi và tiếng Ả Rập cùng tài liệu hướng dẫn sử dụng đã được dịch vào các tính năng truy cập theo phạm vi vai trò, chẩn đoán có hướng dẫn, kiểm tra độ mới của RRD theo phạm vi, xem trước sửa chữa và lịch sử kiểm toán, ngoại lệ cảnh báo đã chấp nhận và các bản dịch có từ phiên bản 0.6.0. Xem [CHANGELOG.md](../../../CHANGELOG.md) để biết chi tiết.

## Ảnh chụp màn hình

Các thiết lập chẩn đoán và lập lịch trong một môi trường trình diễn Cacti 1.2.31 cô lập chạy PHP 8.3.36, bao gồm các kiểm tra về tính tương thích PHP của Cacti, trạng thái hỗ trợ bảo mật từ nhà phát triển gốc (upstream) và tình trạng cơ sở dữ liệu. Các cảnh báo và lỗi hiển thị ở đây phản ánh môi trường trình diễn đó.

![Bảng chẩn đoán của Doctor với các kết quả đạt, cảnh báo và lỗi](../../screenshots/diagnostics.png)

![Cài đặt lập lịch, cảnh báo và ngưỡng của Doctor](../../screenshots/settings.png)

Các sự cố Cacti thường biểu hiện qua các triệu chứng như: đồ thị trống, poller ngừng chạy, hoặc không thể cài đặt plugin. Nguyên nhân thường bắt nguồn từ một điều kiện tiên quyết bị sai lệch, chẳng hạn như thiếu phần mở rộng PHP trong bản dựng CLI, thư mục nhật ký mà poller không thể ghi, đường dẫn RRDtool trỏ sai tệp nhị phân, hoặc cơ sở dữ liệu thiếu các bảng múi giờ. Doctor kiểm tra trực tiếp các điều kiện tiên quyết đó và báo cáo từng mục ở trạng thái đạt (pass), cảnh báo (warn) hoặc lỗi (fail) kèm một câu giải thích kết quả tìm được. Báo cáo tương tự có sẵn trên giao diện web, dòng lệnh và ở định dạng JSON phục vụ giám sát.

## Các hạng mục kiểm tra

| Khu vực | Hạng mục kiểm tra |
|---|---|
| Doctor | Kiểm tra xem bản thân Doctor có đang chạy với quyền root hay không, vì điều này sẽ khiến các kiểm tra quyền truy cập phản ánh sai tài khoản |
| Cacti và PHP | Phiên bản Cacti, bản nâng cấp chưa hoàn tất bởi trình cài đặt, các plugin đã bật nhưng bị thiếu tệp, tính tương thích của PHP với gói Cacti đã cài đặt, trạng thái hỗ trợ bảo mật upstream của PHP |
| Phần mở rộng PHP | Các phần mở rộng bắt buộc trong PHP web và PHP CLI mà poller sử dụng, cùng các tính năng được khuyến nghị |
| Cấu hình PHP | `memory_limit`, `max_execution_time`, và `date.timezone`, sử dụng các khuyến nghị riêng của Cacti |
| Cơ sở dữ liệu | Khả năng kết nối, phiên bản máy chủ so với khuyến nghị của Cacti, bộ ký tự UTF-8, các bảng múi giờ, các bảng cốt lõi, độ lệch đồng hồ so với máy chủ PHP, và các thiết lập InnoDB mà Cacti đánh dấu là lỗi |
| Tình trạng cơ sở dữ liệu | Sức chứa kết nối, lượt đọc buffer-pool, bảng tạm trên đĩa, việc tạo luồng kết nối, các câu lệnh chậm, và lượt chờ bộ đệm nhật ký InnoDB, kèm các đề xuất tinh chỉnh phụ thuộc vào tải công việc |
| Hệ thống tệp | Các thư mục cache, log và RRA có thể ghi; dung lượng trống cho các tệp RRD; các nguồn dữ liệu đang hoạt động nhưng không có tệp RRD hoặc quá hạn cập nhật tệp; tệp `include/config.php` không cho phép mọi người dùng đọc; tệp nhật ký Cacti có thể ghi và không quá kích thước |
| Tệp nhị phân | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, và Spine khi được cấu hình làm poller, bao gồm các phiên bản khi Cacti có quy định |
| Nhật ký | Các lỗi trong những dòng nhật ký Cacti gần nhất, kèm thông báo xuất hiện thường xuyên nhất |
| Thiết bị | Các thiết bị đang bật nhưng bị sập hoặc đang khôi phục, ba thiết bị sập lâu nhất kèm lỗi gần nhất của chúng, và cảnh báo lỗi khi phần lớn thiết bị sập cùng lúc |
| Poller | Loại poller và chu kỳ, thời gian kể từ lần poller chính hoàn tất gần nhất, thời gian chạy so với chu kỳ, đầu ra của poller chưa từng ghi vào tệp RRD, các poller từ xa ngừng báo cáo, Boost bị đình trệ, và cấu hình Spine trỏ tới một cơ sở dữ liệu khác |

Mỗi kiểm tra đều có một ID ổn định, chẳng hạn như `database.timezone` hoặc `binary.rrdtool`, giúp các kịch bản có thể tra cứu theo từng kết quả riêng lẻ.

## Sơ đồ mã nguồn và kiểm thử

| Hành vi | Triển khai | Bằng chứng kiểm thử trong kho lưu trữ này |
|---|---|---|
| Các kiểm tra chẩn đoán và ID báo cáo ổn định | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Quyền truy cập theo phạm vi vai trò và báo cáo web đã ẩn thông tin nhạy cảm | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Điều tra triệu chứng có hướng dẫn | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Kiểm tra độ mới của RRD và xử lý ghi trì hoãn | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Xem trước sửa chữa, lịch sử kiểm toán và cảnh báo đã chấp nhận | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Kiểm tra theo lịch trình và chuyển đổi trạng thái cảnh báo | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Các tham chiếu này xác định phần triển khai và phạm vi bao phủ kiểm thử; chúng không khẳng định rằng mọi tác vụ CI đều đã vượt qua cho phiên bản hiện tại. Hãy kiểm tra lượt chạy workflow cho phiên bản bạn dự định triển khai.

## Tư vấn tình trạng cơ sở dữ liệu

Trình phân tích PHP thuần của Doctor đọc một tập hợp cố định các bộ đếm toàn cục của MySQL hoặc MariaDB thông qua kết nối cơ sở dữ liệu hiện có của Cacti. Nó thực hiện hai truy vấn chỉ đọc cho mỗi báo cáo, không yêu cầu thêm thông tin xác thực hay tệp thực thi nào, và không bao giờ thay đổi cấu hình cơ sở dữ liệu. Các kiểm tra này xuất hiện trong báo cáo web, CLI, JSON, đầu ra giám sát, gói hỗ trợ và tính năng theo dõi trạng thái theo lịch trình.

| ID kiểm tra | Điều kiện kích hoạt điều tra |
|---|---|
| `database.health_sample` | Dưới 24 giờ kể từ khi khởi động hoặc chạy `FLUSH STATUS`, hoặc thời gian hoạt động (uptime) không khả dụng/không nhất quán |
| `database.connection_capacity` | Số kết nối hiện tại hoặc mức đỉnh ghi nhận đạt ít nhất 80% giá trị `max_connections` hiện tại |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` đạt ít nhất 1%, với tối thiểu 10.000 yêu cầu đọc |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` đạt ít nhất 25%, với tối thiểu 1.000 bảng tạm |
| `database.thread_cache` | `Threads_created / Connections` đạt ít nhất 5%, với tối thiểu 1.000 lượt thử kết nối và `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` đạt ít nhất 1%, với tối thiểu 1.000 câu lệnh |
| `database.redo_log_waits` | `Innodb_log_waits` khác 0 |

Đây là các ngưỡng điều tra của Doctor, không phải mục tiêu cấu hình từ nhà cung cấp. Ngoại trừ sức chứa kết nối, các tư vấn mang tính tích lũy đều yêu cầu khoảng thời gian quan sát nêu trên. Các bộ đếm bị thiếu, sai định dạng, trùng lặp hoặc quá lớn, mức độ hoạt động chưa đủ, và các chế độ luồng không được hỗ trợ sẽ tạo ra cảnh báo thay vì kết luận bình thường hoặc đề xuất tinh chỉnh. Các cảnh báo có thể ảnh hưởng đến trạng thái Nagios và cảnh báo theo lịch trình khi tùy chọn **Cảnh báo khi có cảnh báo (Alert on Warnings)** được bật.

Hãy đọc kết hợp các bộ đếm đo được cùng với đề xuất. Các giá trị tích lũy không phản ánh tải hiện tại; các bộ đếm có thể có lịch sử đặt lại khác nhau và không phải là một ảnh chụp tức thời (atomic snapshot). Mức kết nối đỉnh có thể phản ánh một giới hạn cũ trước đó. Số lượng truy vấn chậm phụ thuộc vào `long_query_time`, và bộ đếm bảng tạm trên đĩa của MySQL có thể bỏ sót các tệp ánh xạ bộ nhớ (memory-mapped files). Tỷ lệ thấp không chứng minh rằng không có nút thắt cổ chai. Hãy xác nhận xu hướng dưới tải công việc đại diện, xem xét kế hoạch thực thi truy vấn (query plan) và việc tái sử dụng kết nối, đồng thời đo lường bộ nhớ trên **máy chủ cơ sở dữ liệu** trước khi thay đổi các bộ đệm hoặc giới hạn kết nối.

Nếu các chỉ số không khả dụng, hãy kiểm tra mức độ hỗ trợ của máy chủ và quyền truy cập của tài khoản Cacti đối với `SHOW GLOBAL STATUS` và `SHOW GLOBAL VARIABLES`; Doctor không yêu cầu nâng cấp thông tin xác thực. Định nghĩa các bộ đếm được lấy từ [tài liệu tham khảo biến trạng thái MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) và [tài liệu tham khảo biến trạng thái MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Không có kịch bản hay mã nguồn nào của MySQLTuner được sử dụng.

Không cần thực hiện di chuyển lược đồ (schema) hay cấu hình. Hãy triển khai các tệp plugin như bình thường; việc hoàn nguyên các tệp đó sẽ gỡ bỏ các chẩn đoán đã thêm. Trạng thái lập lịch hiện có sẽ được làm mới ở lần chạy tiếp theo.

## Cách plugin đảm bảo an toàn

Một công cụ chẩn đoán chạy với quyền của poller hoặc máy chủ web và đọc các đường dẫn từ bảng cài đặt, vì vậy nó phải cẩn trọng với những gì mình thực thi và sửa đổi.

- Các tác vụ chẩn đoán chỉ đọc. Chúng không bao giờ thay đổi tệp, cài đặt hoặc dữ liệu.
- Doctor chỉ chạy tệp nhị phân đã cấu hình khi tên tệp khớp với chương trình dự kiến (`php`, `rrdtool`, `snmpget` hoặc `snmpwalk`). Nếu không, bất kỳ ai có quyền ghi vào bảng cài đặt đều có thể chọn chương trình mà Doctor sẽ chạy. Mọi tên khác đều được báo cáo dưới dạng cảnh báo và không được thực thi.
- Doctor không bao giờ chạy các tệp nhị phân đã cấu hình với quyền root và sẽ báo cáo khi đang chạy với quyền root.
- Các thao tác sửa chữa đến từ một danh sách cho phép cố định. Mỗi thao tác đều yêu cầu hành động của quản trị viên đã xác thực trên giao diện web hoặc tùy chọn `--yes` trên CLI, và đều được ghi vào nhật ký Cacti.

## Các bản phát hành

Các phiên bản tuân theo SemVer và khớp với tệp `INFO` của plugin. Xem
[quy trình phát hành](../../releasing.md) để biết cách chọn phiên bản, các cổng kiểm tra CI, thành phần gói,
mã kiểm tra (checksum) và hướng dẫn khôi phục phiên bản trước.

## Cài đặt

Tải xuống `doctor-VERSION.tar.gz` hoặc `doctor-VERSION.zip` cùng với `SHA256SUMS` từ
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Xác minh mã kiểm tra SHA-256 của tệp lưu trữ, sau đó giải nén thư mục `doctor/` bên trong vào
thư mục `plugins/` của Cacti. Đây là các gói có thể cài đặt trực tiếp; các tệp lưu trữ mã nguồn tự động
của GitHub có tên thư mục khác. Để chạy mã chưa phát hành
từ nhánh `develop`, hãy cài đặt từ bản sao mã nguồn.

Đối với bản sao mã nguồn:

Sao chép hoặc giải nén kho lưu trữ thành `plugins/doctor` bên trong thư mục cài đặt Cacti. Thư mục phải có tên là `doctor`, không phải `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Cài đặt và bật **Cacti Doctor** tại **Configuration > Plugin Management**, sau đó cấp quyền **Doctor Viewer**, **Doctor Operator** hoặc **Doctor Administrator** thông qua quyền người dùng hoặc nhóm trong Cacti. Các quyền **Cacti Doctor** hiện có vẫn giữ nguyên quyền truy cập Administrator sau khi nâng cấp. Báo cáo sẽ xuất hiện tại **Utilities > Cacti Doctor**.

## Ngôn ngữ

Doctor đi kèm 48 danh mục bản dịch không phải tiếng Anh trong `locales/po/` và `locales/LC_MESSAGES/`, bao gồm các ngôn ngữ vùng nhóm Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), châu Phi (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), châu Á (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) và Đông Nam Âu (`bs-BA`, `hr-HR`, `sr-RS`). Cacti sẽ hiển thị một danh mục bản dịch khi tính năng hỗ trợ ngôn ngữ được bật (**Configuration > Settings > General > Language Support**) và người dùng chọn một ngôn ngữ vùng mà Cacti cung cấp trong bộ chọn ngôn ngữ; các danh mục dành cho những ngôn ngữ vùng chưa được liệt kê trong bộ chọn của Cacti sẽ có hiệu lực khi Cacti bổ sung chúng. Trang web, phần cài đặt, cùng các thông báo và nội dung báo cáo in ra trên dòng lệnh đều tuân theo ngôn ngữ của Cacti; riêng báo cáo dòng lệnh sử dụng ngôn ngữ mặc định của Cacti, vốn vẫn là tiếng Anh trừ khi bạn thay đổi.

Đầu ra dành cho máy đọc không bao giờ được dịch: ID kiểm tra, các khóa JSON và giá trị trạng thái, đầu ra của `--format=nagios` và `--format=prometheus`, các dòng nhật ký, và tiêu đề các phần trong gói hỗ trợ đều giữ nguyên tiếng Anh để các kịch bản tự động và hệ thống giám sát tiếp tục hoạt động ở mọi ngôn ngữ. Nội dung `summary` và `detail` của mỗi mục kiểm tra là phần duy nhất được dịch trong báo cáo JSON.

Gói ngôn ngữ tiếng Tây Ban Nha Mỹ Latinh (`es-419`) cũng được cung cấp kèm theo, nhưng cả Cacti 1.2 và Cacti 1.3 đều chưa có tùy chọn ngôn ngữ tiếng Tây Ban Nha Mỹ Latinh để chọn, vì vậy bản dịch này chỉ có hiệu lực khi Cacti bổ sung ngôn ngữ đó. Trước khi có hỗ trợ, hãy chọn tiếng Tây Ban Nha (`es-ES`).

Cacti tải gói ngôn ngữ của plugin từ `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` với miền văn bản (text domain) là `doctor`, giống nhau trên cả bản 1.2.x và 1.3 (bản 1.3 xác định thư mục plugin thông qua đường dẫn plugins có thể cấu hình).

## Mức độ truy cập

| Quyền hạn | Khả năng |
|---|---|
| Doctor Viewer | Xem trạng thái kiểm tra theo lịch mới nhất, thời gian quan sát, độ mới của dữ liệu và lịch sử tổng hợp gần đây. Không có quyền chạy lệnh chẩn đoán, xem chi tiết thô, cấu hình hay sửa chữa. |
| Doctor Operator | Chạy báo cáo chẩn đoán với giới hạn tiến trình 120 giây, kiểm tra các chi tiết đã được ẩn thông tin nhạy cảm và xác nhận đã tiếp nhận các phát hiện. Không có quyền thay đổi cài đặt hoặc sửa chữa. |
| Doctor Administrator | Bao gồm các quyền của Operator cộng thêm các thao tác sửa chữa trong danh sách cho phép và cài đặt Doctor. Các thao tác sửa chữa và cài đặt cũng yêu cầu quyền Settings/System Utilities của Cacti. |

Menu Utilities sẽ mở trang tương ứng với quyền Doctor cao nhất được cấp cho người dùng, bao gồm cả quyền kế thừa từ nhóm. Các quyền Viewer và Operator mới không được tự động cấp cho ai. ID quyền ban đầu vẫn gắn với `doctor.php` ở mức Administrator, giúp bảo toàn quyền truy cập hiện có của người dùng và nhóm.

Dữ liệu của Viewer lấy từ các lần kiểm tra theo lịch. Hãy bật lịch kiểm tra trước khi cấp quyền Viewer; các kết quả quan sát bị thiếu hoặc quá hạn sẽ hiển thị là **unknown**, không bao giờ hiển thị là bình thường. Lịch sử lưu giữ 20 số liệu tổng hợp theo lịch gần nhất và không bao gồm trạng thái thiết bị. Operator chủ động khởi chạy các lần chẩn đoán mới một cách rõ ràng; việc tải lại trang thông thường sẽ sử dụng báo cáo gần nhất trong phiên làm việc của họ.

Chi tiết và tổng số liệu thiết bị sử dụng quyền thiết bị của người dùng hiện tại. Các đoạn trích nhật ký yêu cầu thêm quyền Log Administration của Cacti. Các thông tin bí mật được che (mask) trước khi chi tiết chẩn đoán được lưu vào phiên web hoặc hiển thị. Quyền truy cập CLI tiếp tục được quản lý bởi tài khoản hệ điều hành.

Các xác nhận tiếp nhận mang tính cá nhân và được ghi vào nhật ký Cacti. Chúng chỉ áp dụng cho cùng một phát hiện và bằng chứng; khi bằng chứng thay đổi thì cần một xác nhận mới. Chúng không bao giờ làm thay đổi trạng thái đạt/cảnh báo/lỗi, không chặn cảnh báo, cũng không đánh dấu một mục kiểm tra đang lỗi thành bình thường. Cơ chế này tách biệt với ngoại lệ cảnh báo được chấp nhận, vốn ảnh hưởng đến chính sách cảnh báo mà không làm thay đổi trạng thái quan sát được và sẽ được mô tả bên dưới.

Mọi hành động đều yêu cầu phương thức POST và mã CSRF token hợp lệ. Các thao tác sửa chữa hiển thị một trang xác nhận riêng có liên kết Hủy (Cancel) không gửi biểu mẫu, đồng thời ghi lại người dùng thực hiện và kết quả vào nhật ký Cacti.

## Dòng lệnh

Chạy các lệnh sau từ thư mục gốc của Cacti với tư cách người dùng poller của Cacti, không phải root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

Đầu ra dạng văn bản in một dòng cho mỗi mục kiểm tra kèm theo trạng thái, danh mục, tóm tắt và chi tiết. Tùy chọn `--json` in ra một đối tượng `summary` chứa số lượng theo từng trạng thái và một mảng `checks` có các phần tử mang trường `id`, `category`, `status`, `summary`, `detail`, cùng với `repair`/`repairable` khi có thao tác sửa chữa trong danh sách cho phép được áp dụng.

| Mã thoát | Ý nghĩa |
|---|---|
| `0` | Không có mục kiểm tra nào thất bại, hoặc thao tác sửa chữa được yêu cầu đã thành công. Các cảnh báo không làm thay đổi mã thoát. |
| `1` | Có ít nhất một mục kiểm tra thất bại, hoặc thao tác sửa chữa được yêu cầu không thành công. |
| `2` | Lỗi sử dụng lệnh: chạy sửa chữa mà không có `--yes` (`--preview` không cần tùy chọn này), ID sửa chữa không xác định, định dạng đầu ra không xác định, tổ hợp `--symptom` hoặc định dạng không được hỗ trợ, hoặc không thể xác định vị trí cài đặt Cacti. |

Cacti tăng giá trị `memory_limit` cho mọi kịch bản CLI, vì vậy mục kiểm tra cấu hình thời gian chạy PHP chỉ có ý nghĩa trên trang web.

## Kiểm tra theo lịch và cảnh báo

Tại **Configuration > Settings > Doctor**, hãy bật **Run Checks on a Schedule** và chọn khoảng thời gian từ 15 phút đến 1 ngày. Sau mỗi chu kỳ poller đến hạn, Doctor sẽ chạy mọi mục kiểm tra trong một tiến trình nền, nhờ đó thời gian chạy của chính poller không bị ảnh hưởng.

Mỗi lần chạy đều ghi nhận trạng thái quan sát được của từng mục kiểm tra. Các ngoại lệ cảnh báo đang hoạt động ảnh hưởng đến chính sách cảnh báo mà không làm thay đổi kết quả quan sát đó. Khi một mục kiểm tra bắt đầu hoặc ngừng gặp lỗi, Doctor sẽ ghi sự thay đổi vào nhật ký Cacti và, nếu **Alert Email Addresses** đã được thiết lập, gửi email tới các địa chỉ đó thông qua cài đặt thư của Cacti. Tùy chọn **Alert on Warnings** bổ sung thông báo khi chuyển vào hoặc thoát khỏi trạng thái cảnh báo. Lần chạy đầu tiên chỉ ghi nhận mức cơ sở.

Các báo cáo theo lịch chạy trên poller chính dưới một khóa tư vấn cơ sở dữ liệu và có giới hạn tiến trình xử lý là hai phút. Doctor báo cáo thời điểm bắt đầu và hoàn tất thành công gần nhất để dễ nhận biết các kết quả bị thiếu hoặc đã cũ. Kết quả được coi là còn mới trong khoảng thời gian bằng chu kỳ định kỳ cộng thêm một chu kỳ poller và ba phút. Một lần chạy không hoàn tất sẽ được thử lại sau 5, 10, 20 phút trở lên, tối đa bằng chu kỳ thông thường. Các lần gửi cảnh báo thất bại được giữ lại để thử lại tối đa ba lần với thời gian trễ tăng dần; sau đó, hãy sửa cài đặt thư của Cacti và chạy `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` với tư cách người dùng poller. Việc máy chủ thư chấp nhận thư không đồng nghĩa với việc thư đã đến hộp thư đến.

Cùng thẻ cài đặt này thiết lập các ngưỡng cho thời gian chạy poller (80% của chu kỳ), dung lượng đĩa trống RRA (cảnh báo dưới 10%, lỗi dưới 2%), độ lệch đồng hồ cơ sở dữ liệu (cảnh báo trên 5 giây, lỗi trên 60 giây) và kích thước nhật ký Cacti (100 MB). Các giá trị trống hoặc không hợp lệ sẽ quay về các giá trị mặc định này.

## Tích hợp giám sát

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` in một dòng trạng thái kèm dữ liệu hiệu năng và thoát với mã `0` (OK), `1` (WARNING) hoặc `2` (CRITICAL), nhờ đó Nagios, Icinga hoặc bất kỳ hệ thống tương thích nào cũng có thể chạy trực tiếp. `--format=prometheus` xuất ra định dạng văn bản Prometheus cho trình thu thập textfile của node_exporter: `cacti_doctor_check_status` cho từng mục kiểm tra (0 là đạt hoặc cảnh báo đã chấp nhận, 1 là cảnh báo cần xử lý, 2 là lỗi), `cacti_doctor_check_observed_status` trước khi áp dụng ngoại lệ, `cacti_doctor_check_accepted`, `cacti_doctor_checks` theo từng trạng thái, và `cacti_doctor_last_run_timestamp_seconds`. Các dòng kiểm tra JSON bao gồm trường `assessment`; giá trị `not_assessed` có nghĩa là mục kiểm tra không thể đưa ra kết luận từ dữ liệu hiện có.

## Gói hỗ trợ

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Gói hỗ trợ là một tệp văn bản duy nhất chứa phiên bản Doctor, Cacti, PHP, hệ điều hành và cơ sở dữ liệu, số liệu thống kê poller và Boost, báo cáo đầy đủ và 200 dòng cuối cùng của nhật ký Cacti. Các giá trị đứng sau tên password, secret, token, community và key đều được che lại. Doctor tạo tệp với quyền chỉ cho phép chủ sở hữu đọc và từ chối ghi đè tệp đã tồn tại. Hãy kiểm tra lại nội dung tệp trước khi đăng lên bất kỳ đâu.

## Chính sách sửa chữa

Doctor bao gồm một tác vụ sửa chữa là `runtime_directories`. Tác vụ này tạo các thư mục thời gian chạy (runtime) bị thiếu của Cacti và thêm các bit quyền đọc, ghi và thực thi cho chủ sở hữu mà không xóa các quyền hiện có.

Tác vụ này nhắm mục tiêu vào `$cache_path`, `$log_path` và `$rra_path` trên Cacti 1.3, hoặc các thư mục `cache`, `log` và `rra` của bản cài đặt trong các trường hợp khác. Nó bỏ qua các thư mục đã có quyền ghi, từ chối các thư mục nằm ngoài bản cài đặt Cacti (chẳng hạn như thư mục nhật ký trong `/var/log`), từ chối các liên kết tượng trưng và từ chối chạy với quyền root. Nó không bao giờ đi theo `path_cactilog`, nên một tệp nhật ký được cấu hình bên trong thư mục mã nguồn không thể chuyển hướng tác vụ sửa chữa vào đó. Phần chẩn đoán vẫn kiểm tra thư mục của tệp nhật ký được cấu hình trên mọi bản phát hành.

Tác vụ này không thay đổi quyền sở hữu, không chạy lệnh shell, không viết lại cấu hình hoặc sửa đổi dữ liệu ứng dụng Cacti. Mỗi tác vụ sửa chữa mới đều phải bao gồm một mục chẩn đoán, một trình xử lý nằm trong danh sách cho phép, bước xác nhận, ghi nhật ký kiểm toán và các bài kiểm thử.

## Điều tra triệu chứng

Người vận hành và Quản trị viên có thể chọn **Investigate a symptom** trên trang Doctor. Các quy tắc tương tự cũng khả dụng thông qua `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` hoặc `alerts_missing`, với đầu ra dạng văn bản hoặc JSON. Các gói hỗ trợ bao gồm các kết quả điều tra triệu chứng liên quan.

Mỗi ứng viên liệt kê các kiểm tra đã quan sát được và bước xác minh tiếp theo. Các ứng viên là giả thuyết, không phải nguyên nhân gốc rễ đã được xác nhận. Các quan sát bị thiếu, chưa được đánh giá hoặc đã cũ không bao giờ xác lập được nguyên nhân. Quá trình điều tra trên web sử dụng báo cáo đã lọc theo quyền; các báo cáo CLI sử dụng quyền truy cập của tài khoản hệ điều hành.

## Độ mới của bản cập nhật RRD

`filesystem.rrd_stale` kiểm tra tối đa 500 nguồn dữ liệu đang hoạt động, loại trừ các thiết bị bị vô hiệu hóa và đang ngừng hoạt động. Trên các hệ thống lớn hơn, mẫu kiểm tra thay đổi mỗi giờ, vì vậy các lần chạy lặp lại sẽ bao phủ các tệp khác nhau. Mục này so sánh thời gian sửa đổi tệp với giá trị lớn nhất trong khoảng thời gian poller, bước RRD nguồn và bước hồ sơ, nhân với **RRD Stale Intervals** (mặc định là 3). Nó hiển thị ba tệp cũ nhất bị quá hạn và số lượng thiết bị bị ảnh hưởng. Kết quả trên web chỉ bao gồm các thiết bị được cấp quyền.

`filesystem.rrd_files` là một kiểm tra tồn tại riêng biệt. Nó tìm tệp RRD cho tối đa 5.000 nguồn dữ liệu đang hoạt động, bao gồm cả các nguồn trên thiết bị bị vô hiệu hóa hoặc đang ngừng hoạt động, và sử dụng cùng mẫu theo giờ đó.

Boost cộng thêm gấp đôi khoảng thời gian xả đã cấu hình làm khoảng thời gian cho phép ghi đĩa. Đối với trình ghi trì hoãn khác, hãy cấu hình **Deferred RRD Write Allowance (seconds)**. Một `RRDCACHED_ADDRESS` được khai báo mà không có khoảng cho phép, hoặc khoảng thời gian Boost không hợp lệ, sẽ tạo ra kết quả chưa được đánh giá. Doctor không bao giờ xả bộ nhớ đệm để thực hiện kiểm tra này. Thời gian sửa đổi là bằng chứng của hoạt động đĩa, không phải bằng chứng thu thập dữ liệu thành công. Bộ nhớ đệm bên ngoài mà Doctor không thể phát hiện phải được cấu hình tường minh.

Các tệp bị thiếu, không đọc được và có dấu thời gian ở tương lai được thống kê trong phần chi tiết. Kết quả chỉ ở trạng thái chưa được đánh giá khi không có tệp nào trong mẫu đọc được. Một kết quả lấy mẫu sẽ nêu rõ rằng nó chỉ bao phủ một phần của bản cài đặt; kết quả đạt không bao phủ các tệp không nằm trong mẫu.

## Bản xem trước sửa chữa và lịch sử kiểm toán

Trang sửa chữa dành cho Quản trị viên hiển thị từng đường dẫn bị ảnh hưởng, hành động đề xuất, quyền hiện tại và quyền mục tiêu. Phê duyệt được gắn với bản xem trước đó, người dùng thực hiện và thời hạn năm phút. Việc xác nhận sẽ tiêu thụ bản xem trước; hệ thống tệp thay đổi sẽ yêu cầu một bản xem trước khác. Việc thực thi dưới quyền root, các đường dẫn ngoài bản cài đặt, các liên kết cần sửa chữa và các quyền hệ thống tệp chưa đáp ứng đều ngăn không cho phê duyệt.

`--repair=runtime_directories --preview` in ra một kế hoạch JSON chỉ đọc. `--repair=runtime_directories --yes` phê duyệt một kế hoạch CLI vừa được tính toán mới và kiểm tra lại trước khi thực thi. Tài khoản CLI phải đã được ủy quyền để sửa chữa bản cài đặt; nó không kế thừa các vai trò trên web.

Một bản ghi `repair.started` có cấu trúc phải được lưu trước mọi thay đổi trên hệ thống tệp. Một bản ghi `repair.completed` được liên kết sẽ chứa ảnh chụp nhanh sau sửa chữa và kết quả xác minh. Một thao tác bị gián đoạn sẽ để lại bản ghi đã bắt đầu để phục vụ điều tra. Lỗi ghi nhật ký kiểm toán hoàn tất được báo cáo là một lỗi ngay cả khi các thay đổi trên hệ thống tệp đã xảy ra. Doctor chỉ thêm quyền cho chủ sở hữu và tạo thư mục; nó không tự động hoàn tác.

Quản trị viên có quyền Settings/System Utilities của Cacti có thể đọc 20 mục kiểm toán mới nhất trên trang Doctor. Plugin lưu giữ 200 bản ghi mới nhất trong `plugin_doctor_audit`; nhật ký Cacti cũng ghi lại ID, hành động và tác nhân của chúng. Dữ liệu tải trọng kiểm toán đã được ẩn thông tin nhạy cảm.

## Cảnh báo đã chấp nhận

Quản trị viên có quyền Settings/System Utilities của Cacti có thể tạo một **Warning exception** từ một cảnh báo mới và đã được đánh giá trên trang Doctor. Một ngoại lệ yêu cầu người chịu trách nhiệm, lý do và ngày xem xét theo giờ UTC trong vòng 90 ngày. Ngoại lệ hết hạn vào lúc nửa đêm UTC khi bắt đầu ngày đó. Có thể cấu hình tối đa 100 ngoại lệ. Danh sách hiển thị các mục đã hết hạn và các ID không có trong báo cáo hiện tại, đồng thời cho phép xóa.

Cảnh báo quan sát được vẫn hiển thị, cùng với người chịu trách nhiệm, lý do và thời hạn hết hạn trong chi tiết chẩn đoán. JSON giữ nguyên trạng thái quan sát được và bổ sung siêu dữ liệu `accepted` và `acceptance`. Nagios loại trừ các cảnh báo đã chấp nhận đang còn hiệu lực khỏi mức độ nghiêm trọng đầu ra nhưng vẫn nêu tên chúng trong phần xuất. Prometheus xuất cả mức độ nghiêm trọng quan sát được và mức độ nghiêm trọng cần hành động. Trạng thái thoát CLI thông thường không đổi: cảnh báo vốn đã thoát với mã 0, lỗi thoát với mã 1.

Các thông báo cảnh báo theo lịch bị tạm ẩn trong thời gian ngoại lệ còn hiệu lực; khi hết hạn hoặc bị xóa, một cảnh báo vẫn tiếp diễn sẽ đủ điều kiện gửi thông báo cảnh báo trở lại. Quá trình chuyển sang lỗi và phục hồi từ lỗi vẫn đủ điều kiện gửi thông báo. Không thể chấp nhận một kết quả chưa được đánh giá hoặc một lỗi. Xác nhận cá nhân là cơ chế riêng biệt và không tạm ẩn bất kỳ thông báo nào. Việc tạo và xóa ngoại lệ được thực hiện theo giao dịch cùng với bản ghi kiểm toán.

Quá trình nâng cấp tạo `plugin_doctor_audit` và `plugin_doctor_acceptance` mà không làm thay đổi dữ liệu ứng dụng Cacti. Hãy xuất mọi lịch sử bạn cần trước khi gỡ cài đặt: quá trình gỡ cài đặt sẽ xóa cả hai bảng của plugin và các thiết lập của nó. Việc hoàn nguyên các tệp plugin sẽ giữ lại các bảng để phục vụ điều tra, nhưng các phiên bản cũ hơn sẽ không áp dụng các ngoại lệ cảnh báo.

## Yêu cầu

| Cacti | PHP | Ghi chú |
|---|---|---|
| 1.2.20 | 5.4 trở lên | Mã nguồn của chính Doctor tương thích với PHP 5.4 để có thể chẩn đoán các hệ thống cũ trước khi nâng cấp |
| 1.2.31 | 8.0 trở lên | `composer.json` của Cacti yêu cầu `>=8.0` |
| 1.2.x hiện tại | 8.2 trở lên | `composer.json` của Cacti yêu cầu `>=8.2` |
| `develop` (1.3) | 8.3 trở lên | `composer.json` của Cacti yêu cầu `^8.3` |

Hàng **PHP compatibility with installed Cacti** so sánh phiên bản PHP đang chạy với yêu cầu PHP trong tệp `composer.json` gốc của chính Cacti, bao gồm cả giới hạn trên của ràng buộc dấu mũ như `^8.3`. Tệp thực thi PHP CLI đã cấu hình cũng được kiểm tra theo cùng yêu cầu đó. Doctor nhận diện các dạng ràng buộc `>=` và `^` được sử dụng bởi các gói Cacti này. Một yêu cầu không đọc được, sai định dạng, bị thiếu hoặc không được nhận diện sẽ tạo ra cảnh báo; các bản cài đặt Cacti 1.2.20–1.2.30 không có tệp kê khai vẫn giữ mức sàn trình cài đặt PHP 5.4 đã được ghi nhận trong tài liệu. Việc bản thân Doctor tương thích với PHP 5.4 không đồng nghĩa với việc tương thích với một bản cài đặt Cacti mới hơn.

Hàng **PHP upstream security support** trả lời một câu hỏi riêng biệt: nhánh phát hành PHP đó có còn nhận các bản vá bảo mật từ dự án PHP hay không? Mục này báo cáo ngày kết thúc hỗ trợ bảo mật đã công bố của nhánh và đưa ra cảnh báo sau ngày đó. Ví dụ, PHP 8.1 có thể đáp ứng yêu cầu thời gian chạy của một bản cài đặt Cacti cũ hơn trong khi không còn nhận các bản vá bảo mật từ thượng nguồn. Kết quả đạt không có nghĩa là bản phát hành vá lỗi đang cài đặt là mới nhất, và Doctor không thể xác định liệu nhà cung cấp hệ điều hành có cung cấp các bản vá được chuyển ngược hay không.

Các ngày hỗ trợ được đóng gói sẵn cùng Doctor từ [lịch hỗ trợ PHP](https://www.php.net/supported-versions.php) và [danh sách kết thúc vòng đời](https://www.php.net/eol.php), được kiểm tra lần cuối vào ngày 2026-11-08. Các nhánh không xác định và các bản tiền phát hành sẽ tạo ra cảnh báo thay vì mặc định coi là đạt. Không có yêu cầu mạng nào được thực hiện trong quá trình chẩn đoán. Hãy cập nhật dữ liệu hỗ trợ của Doctor khi PHP công bố lịch trình mới. Các ID JSON/giám sát hiện có là `php.version` và `php.security_baseline` không thay đổi.

## Phát triển

Bộ kiểm thử đơn vị sử dụng Pest và chạy trên PHP 8.2 trở lên:

```console
composer install
composer test
```

Các bài kiểm thử thay thế các hàm Cacti mà Doctor gọi bằng các hàm giả lập nhỏ trong `tests/CactiStubs.php`, vì vậy chúng chạy mà không cần một bản cài đặt Cacti.

GitHub Actions chạy bốn loại kiểm tra trên mỗi lần đẩy mã và yêu cầu kéo:

- `php -l` trên mọi tệp PHP với PHP 5.4, 5.6, 7.0, 7.1, 7.4 và từ 8.0 đến 8.4.
- Bộ kiểm thử đơn vị trên PHP 8.2, 8.3 và 8.4.
- `locales/build_gettext.sh --check`, lệnh này sẽ thất bại nếu mẫu dịch bị cũ, danh mục chưa đầy đủ hoặc còn đánh dấu fuzzy, hoặc danh mục đã biên dịch khác với mã nguồn của nó.
- Bảy tác vụ tích hợp cài đặt Cacti 1.2.20, nhánh 1.2.x hiện tại và `develop` trên MySQL và MariaDB, với cả cmd.php và Spine. Mỗi tác vụ cài đặt và bật plugin, chạy báo cáo CLI đầy đủ, và kiểm tra lược đồ báo cáo, tổng kết tóm tắt, các trạng thái kỳ vọng và tập hợp lỗi chính xác. Sau đó tác vụ làm hỏng một đường dẫn tệp nhị phân và dấu thời gian poller, xác nhận cả hai đều được báo cáo, khôi phục chúng, kiểm thử quy trình sửa chữa và bước xác nhận của nó, đồng thời chạy vô hiệu hóa, bật lại, gỡ cài đặt và cài đặt lại. Báo cáo JSON được lưu giữ dưới dạng artifact khi một tác vụ thất bại.

## Đóng góp

Các pull request được gửi vào nhánh `develop`. Hãy giữ cho các tệp thực thi tương thích với PHP 5.4 và tuân thủ phong cách mã nguồn của Cacti: dùng phím tab để thụt lề, chuỗi đặt trong dấu nháy đơn, cùng các hàm hỗ trợ của Cacti như `read_config_option()` và `db_fetch_cell()`. Hãy bổ sung một bài kiểm thử đơn vị cho mỗi thay đổi về hành vi, ký xác nhận các commit của bạn (`git commit -s`), và thêm một dòng vào `CHANGELOG.md`.

### Bản dịch

Hãy bọc mọi thông báo hiển thị cho người dùng trong `__('...', 'doctor')` (hoặc `__n()`, `__x()`, `__esc()`), và đối với câu có chứa giá trị, hãy dùng một chuỗi định dạng duy nhất với các trình giữ chỗ tuần tự `%s`/`%d` thay vì nối các mảnh chuỗi lại với nhau. Hàm `__()` của Cacti chỉ định dạng thông báo khi chuỗi có chứa ký tự đặc tả định dạng và không hỗ trợ dạng theo vị trí `%1$s`. Hàm này cũng chuyển đổi `%%` thành `%` trước khi định dạng, do đó không bao giờ đặt ký tự phần trăm nguyên văn trong thông báo: hãy truyền giá trị kèm dấu phần trăm như một đối số (`__('Usage: %s', '50%', 'doctor')`). Các dòng nhật ký giữ nguyên tiếng Anh: hãy dùng `doctor_repair_message()` cho nội dung sửa chữa và `doctor_n_()` cho các thông báo được ghi vào nhật ký và chỉ được dịch ở nơi hiển thị. Giữ nguyên không dịch các ID kiểm tra, khóa JSON, từ khóa trạng thái, đầu ra giám sát và các dòng nhật ký.

`locales/build_gettext.sh` tạo lại mẫu `locales/po/cacti.pot`, gộp nó vào từng danh mục `locales/po/<locale>.po`, và biên dịch thành `locales/LC_MESSAGES/<locale>.mo`; hãy commit cả ba loại tệp này. CI sẽ chạy `sh locales/build_gettext.sh --check` và sẽ thất bại khi mẫu đã cũ hoặc một danh mục bị thiếu hay có mục mờ (fuzzy), trình giữ chỗ bị sai khác, hoặc tệp đã biên dịch bị lỗi thời. Do đó, một thông báo bị thay đổi cần được cập nhật bản dịch tương ứng trong cùng pull request đó. Quá trình này yêu cầu GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Một ngôn ngữ mới là một tệp `<locale>.po` mới được đặt tên theo quy ước đặt tên bản địa hóa của Cacti (ví dụ: `pt-BR`).

## Bảo mật

Hãy báo cáo các lỗ hổng bảo mật một cách riêng tư như được mô tả trong [SECURITY.md](../../../SECURITY.md), không đăng trong các issue công khai.

## Giấy phép

Bản quyền (C) 2026 Thomas Vincent. Phát hành theo Giấy phép Công cộng GNU (GNU General Public License), phiên bản 2 trở lên. Xem [LICENSE](../../../LICENSE).
