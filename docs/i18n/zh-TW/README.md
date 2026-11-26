<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor：戴著聽診器的仙人掌。診斷。修復。監控。">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="品質閘道狀態"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="授權條款：GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ 與 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor 是一個 Cacti 外掛程式，能在單次執行中完成整個安裝環境的診斷，並僅在管理員要求時套用小型修復。

**狀態：開發中，尚未達到 1.0。** 最新版本為 [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1)。此修補版本在 0.6.0 版既有的角色範圍存取控制、引導式診斷、特定範圍 RRD 新鮮度檢查、修復預覽與稽核歷史記錄、已接受的警告例外，以及多國語言翻譯基礎上，新增了印地語與阿拉伯語語系檔及翻譯後的使用者指南。詳情請參閱 [CHANGELOG.md](../../../CHANGELOG.md)。

## 畫面截圖

在執行 PHP 8.3.36 的隔離式 Cacti 1.2.31 示範安裝環境中所呈現的診斷與排程設定，包含 Cacti PHP 相容性、上游安全性支援及資料庫健康狀態檢查。此處顯示的警告與失敗項目僅代表該示範環境的狀況。

![顯示通過、警告與失敗結果的 Doctor 診斷表格](../../screenshots/diagnostics.png)

![Doctor 排程、警示與閾值設定](../../screenshots/settings.png)

Cacti 的問題通常會以各種症狀呈現：圖表空白、輪詢器停止運作，或外掛程式無法安裝。根本原因往往是前置需求發生偏離，例如 CLI 建置版本缺少 PHP 擴充功能、輪詢器無法寫入的日誌目錄、RRDtool 路徑指向錯誤的二進位執行檔，或是資料庫缺少時區資料表。Doctor 會直接檢查這些前置需求，將每一項回報為通過、警告或失敗，並附上一句說明來解釋檢查結果。同一份報告可透過網頁、命令列取得，也可輸出為 JSON 供監控系統使用。

## 檢查項目

| 項目領域 | 檢查內容 |
|---|---|
| Doctor | Doctor 本身是否以 root 身分執行，若以 root 執行會導致權限檢查針對錯誤的帳號進行判讀 |
| Cacti 與 PHP | Cacti 版本、安裝程式未完成的升級作業、已啟用但檔案遺失的外掛程式、PHP 與已安裝 Cacti 套件的相容性、PHP 上游安全性支援狀態 |
| PHP 擴充功能 | 網頁端 PHP 與輪詢器所使用之 CLI PHP 中必要的擴充功能，以及建議的功能 |
| PHP 設定 | `memory_limit`、`max_execution_time` 與 `date.timezone`，採用 Cacti 自身的建議值 |
| 資料庫 | 連線能力、伺服器版本是否符合 Cacti 建議、UTF-8 字元集、時區資料表、核心資料表、與 PHP 主機之間的時間偏差，以及 Cacti 標記為錯誤的 InnoDB 設定 |
| 資料庫健康狀態 | 連線容量、緩衝池讀取、磁碟暫存資料表、連線執行緒建立、慢速陳述式，以及 InnoDB 日誌緩衝區等待，並提供視工作負載而定的調校建議 |
| 檔案系統 | 可寫入的快取、日誌與 RRA 目錄；供 RRD 檔案使用的可用空間；缺少 RRD 檔案或檔案逾期未更新的啟用中資料來源；`include/config.php` 不得為全域可讀；Cacti 日誌可寫入且未超過大小限制 |
| 二進位執行檔 | PHP CLI、RRDtool、`snmpget`、`snmpwalk`，以及在作為設定輪詢器時的 Spine（包含 Cacti 指定版本時的版本檢查） |
| 日誌 | 最新 Cacti 日誌行中的錯誤，並列出出現最頻繁的訊息 |
| 裝置 | 處於停機或恢復中的已啟用裝置、停機時間最長的三台裝置及其最後一筆錯誤訊息，以及多數裝置同時停機時的失敗警示 |
| 輪詢器 | 輪詢器類型與間隔、主輪詢器上次完成執行至今的時間、執行時間與間隔的比較、從未寫入 RRD 檔案的輪詢器輸出、停止回報的遠端輪詢器、停滯的 Boost，以及指向不同資料庫的 Spine 設定 |

每項檢查都有一個穩定的 ID（例如 `database.timezone` 或 `binary.rrdtool`），讓指令碼能針對個別結果進行索引。

## 程式碼與測試對應表

| 行為 | 實作 | 本儲存庫中的測試佐證 |
|---|---|---|
| 診斷檢查與穩定的報告 ID | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php)、[AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| 角色範圍存取控制與經遮罩處理的網頁報告 | [doctor_access.php](../../../doctor_access.php)、[doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php)、[WebAccessTest.php](../../../tests/WebAccessTest.php) |
| 引導式症狀調查 | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD 新鮮度與延遲寫入處理 | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| 修復預覽、稽核歷史記錄與已接受的警告 | [doctor_workflows.php](../../../doctor_workflows.php)、[doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| 排程檢查與警示狀態轉換 | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php)、[WorkflowTest.php](../../../tests/WorkflowTest.php) |

這些參照說明了實作位置與測試涵蓋範圍，並不代表目前修訂版本的每個 CI 作業都已通過。請檢查您計畫部署之修訂版本的工作流程執行結果。

## 資料庫健康狀態建議

Doctor 的原生 PHP 分析器會透過 Cacti 現有的資料庫連線，讀取一組固定的全域 MySQL 或 MariaDB 計數器。每份報告僅會執行兩次唯讀查詢，不需要額外的憑證或執行檔，也絕對不會變更資料庫設定。這些檢查結果會顯示於網頁報告、CLI、JSON、監控輸出、支援套件及排程狀態追蹤中。

| 檢查 ID | 調查觸發條件 |
|---|---|
| `database.health_sample` | 自啟動或執行 `FLUSH STATUS` 以來未滿 24 小時，或運行時間無法取得／不一致 |
| `database.connection_capacity` | 目前或記錄到的最高連線數達到目前 `max_connections` 的 80% 以上 |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` 至少為 1%，且讀取請求至少達 10,000 次 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` 至少為 25%，且暫存資料表至少達 1,000 個 |
| `database.thread_cache` | `Threads_created / Connections` 至少為 5%，且連線嘗試次數至少達 1,000 次並啟用 `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` 至少為 1%，且陳述式至少達 1,000 筆 |
| `database.redo_log_waits` | `Innodb_log_waits` 為非零值 |

這些數值是 Doctor 的調查閾值，而非廠商的組態目標。除了連線容量之外，累積型建議都需要滿足上述觀察時間視窗。缺少、格式錯誤、重複或過大的計數器、活動量不足，以及不支援的執行緒模式，都會產生警告而非健康判定或調校建議。當啟用 **Alert on Warnings**（警告時發出警示）時，警告可能會影響 Nagios 狀態與排程警示。

請將測得的計數器數值與建議一併解讀。累積值無法代表目前的負載；各計數器可能有不同的重設歷史記錄，且並非原子性快照。最高連線數可能反映的是先前的限制值。慢速查詢計數取決於 `long_query_time`，而 MySQL 的磁碟暫存資料表計數器可能會漏計記憶體對應檔案。低比例並不代表沒有瓶頸。在變更緩衝區或連線數限制之前，請先在具代表性的工作負載下確認趨勢、檢視查詢計畫與連線重複使用情況，並測量**資料庫主機**上的記憶體使用量。

如果無法取得指標，請檢查伺服器支援情況以及 Cacti 帳號對 `SHOW GLOBAL STATUS` 與 `SHOW GLOBAL VARIABLES` 的存取權限；Doctor 不會要求提高權限。計數器定義來自 [MySQL 狀態變數參考文件](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) 與 [MariaDB 狀態變數參考文件](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables)。本功能未使用任何 MySQLTuner 指令碼或程式碼。

不需要進行結構描述或設定遷移。只要正常部署外掛程式檔案即可；還原這些檔案便會移除新增的診斷功能。既有的排程狀態會在下次執行時重新整理。

## 如何確保安全

診斷工具會以輪詢器（poller）或網頁伺服器的權限執行，並從設定資料表讀取路徑，因此在執行與修改任何項目時必須格外謹慎。

- 診斷過程為唯讀模式，絕不會變更任何檔案、設定或資料。
- 僅當已設定二進位執行檔的檔案名稱符合預期的程式（`php`、`rrdtool`、`snmpget` 或 `snmpwalk`）時，Doctor 才會執行該程式。否則，任何有權寫入設定資料表的人都可能控制 Doctor 所執行的程式。任何其他名稱都會回報為警告，且不會予以執行。
- Doctor 絕不會以 root 身分執行已設定的二進位執行檔，並在以 root 身分執行時回報此狀態。
- 修復操作僅來自固定的允許清單。每項修復都需要透過網頁介面經由已驗證的管理員操作，或在 CLI 中指定 `--yes`，且每次操作都會寫入 Cacti 日誌。

## 版本發佈

版本號遵循語意化版本（SemVer），並與外掛的 `INFO` 檔案一致。有關版本選擇、CI 關卡、套件內容、校驗和及復原說明，請參閱[發佈流程](../../releasing.md)。

## 安裝

從 [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) 下載 `doctor-VERSION.tar.gz` 或 `doctor-VERSION.zip` 以及 `SHA256SUMS`。驗證壓縮檔的 SHA-256 校驗和後，將其中的 `doctor/` 目錄解壓縮至 Cacti 的 `plugins/` 目錄中。這些才是可直接安裝的套件；GitHub 自動產生的原始碼壓縮檔具有不同的目錄名稱。若要執行來自 `develop` 分支的未發佈版本，請從原始碼簽出（source checkout）進行安裝。

若採用原始碼簽出安裝：

將儲存庫複製（clone）或解開至 Cacti 安裝路徑下的 `plugins/doctor`。目錄名稱必須為 `doctor`，不可為 `plugin_doctor`。

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

前往 **Configuration > Plugin Management** 安裝並啟用 **Cacti Doctor**，接著透過 Cacti 使用者或群組權限授予 **Doctor Viewer**、**Doctor Operator** 或 **Doctor Administrator** 領域（realm）權限。升級後，原有的 **Cacti Doctor** 授權會保留管理員（Administrator）存取權。報告會顯示於 **Utilities > Cacti Doctor**。

## 語言支援

Doctor 內建 45 個非英文翻譯目錄（位於 `locales/po/` 與 `locales/LC_MESSAGES/` 下），涵蓋 Broad Tier 1（`ar-SA`、`de-DE`、`es-ES`、`es-419`、`fr-FR`、`hi-IN`、`id-ID`、`it-IT`、`ja-JP`、`ko-KR`、`nl-NL`、`pl-PL`、`pt-BR`、`ru-RU`、`sv-SE`、`tr-TR`、`uk-UA`、`vi-VN`、`zh-CN`、`zh-TW`）、非洲（`af-ZA`、`am-ET`、`ar-EG`、`ar-MA`、`fr-MA`、`fr-SN`、`ha-NG`、`ig-NG`、`mg-MG`、`rw-RW`、`so-SO`、`sw-KE`、`xh-ZA`、`yo-NG`、`zu-ZA`）以及亞洲（`bn-BD`、`fa-IR`、`he-IL`、`mr-IN`、`ms-MY`、`ta-IN`、`te-IN`、`th-TH`、`ur-PK`、`fil-PH`）語系。開啟語言支援（**Configuration > Settings > General > Language Support**）且使用者選取 Cacti 在語言選擇器中開放的語系後，Cacti 即會顯示該翻譯目錄；至於尚未列於 Cacti 選擇器中的語系，其翻譯目錄會在 Cacti 加入這些語系後生效。網頁介面、設定頁面以及命令列輸出的訊息與報告文字都會跟隨 Cacti 的語言設定；命令列報告本身則使用 Cacti 預設語言，除非您另行變更，否則預設維持英文。

機器可讀的輸出絕不會翻譯：檢查 ID、JSON 鍵名與狀態值、`--format=nagios` 與 `--format=prometheus` 的輸出、日誌行以及支援診斷包的章節標題都會維持英文，以確保腳本與監控系統在任何語言下都能正常運作。每項檢查的 `summary` 與 `detail` 文字是 JSON 報告中唯一會被翻譯的部分。

套件中亦隨附拉丁美洲西班牙文語系檔（`es-419`），但 Cacti 1.2 與 Cacti 1.3 目前皆未提供可選取的拉丁美洲西班牙語區域設定，因此需待 Cacti 新增該語系後才會生效。在此之前，請選擇西班牙文（`es-ES`）。

無論在 1.2.x 或 1.3 版本中，Cacti 皆會以 `doctor` 作為文字網域（text domain），從 `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` 載入外掛的語系檔（1.3 會透過其可設定的外掛路徑解析外掛目錄）。

## 存取層級

| 領域 | 權限範圍 |
|---|---|
| Doctor Viewer | 檢視最新的排程檢查狀態、觀測時間、資料時效性及近期彙總歷史紀錄。不可執行診斷命令、檢視原始詳細資訊、變更設定或執行修復。 |
| Doctor Operator | 以 120 秒的處理程序上限執行診斷報告、檢視經遮罩處理的詳細資訊，並確認檢查結果。不可變更設定或執行修復。 |
| Doctor Administrator | 具備 Operator 的所有權限，並包含現有的允許清單修復功能與 Doctor 設定。執行修復與變更設定亦需具備 Cacti 的 Settings/System Utilities 領域權限。 |

Utilities 選單會為使用者開啟其所獲授權（包含群組授權）的最高 Doctor 領域頁面。新增的 Viewer 與 Operator 領域不會自動獲得任何授權。原有的領域 ID 仍作為 Administrator 關聯至 `doctor.php`，以保留現有的使用者與群組存取權限。

Viewer 檢視的資料來自排程檢查。在授予 Viewer 存取權前請先啟用排程；遺失或逾期的觀測結果會顯示為 **unknown**，絕不會顯示為正常。歷史紀錄會保留最近 20 次排程的彙總計數，且不包含裝置狀態。Operator 需明確啟動新的診斷；一般重新整理頁面時則會顯示該工作階段的上一份報告。

裝置詳細資訊與總計數字會套用目前使用者的裝置權限。檢視日誌摘錄則額外需要 Cacti 的 Log Administration 領域權限。機密資訊在存入網頁工作階段或呈現於畫面之前皆會進行遮罩處理。CLI 存取權限仍受作業系統帳號管控。

確認標記（acknowledgment）屬於個人操作且會記錄於 Cacti 日誌中，僅適用於相同的檢查發現與佐證資料；若佐證資料有所變更，則須重新確認。確認標記絕不會改變通過／警告／失敗的狀態、抑制警報，或將失敗的檢查標記為正常。此機制與「已接受的警告例外」不同，後者會影響警報原則而不改變實際觀測狀態，詳見下文說明。

每項操作皆須使用 POST 請求並附帶有效的 CSRF 權杖。執行修復前會顯示獨立的確認頁面，其中包含不會送出表單的「取消」連結，並將操作使用者與結果記錄至 Cacti 日誌。

## 命令列

請以 Cacti 輪詢器使用者（而非 root）身分，從 Cacti 根目錄執行以下命令：

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

文字輸出會為每項檢查列印一行，包含其狀態、類別、摘要與詳細資訊。`--json` 則會輸出一個包含各狀態計數的 `summary` 物件以及 `checks` 陣列，陣列項目帶有 `id`、`category`、`status`、`summary`、`detail`，以及在適用允許清單修復時附加的 `repair`/`repairable` 欄位。

| 結束狀態碼 | 說明 |
|---|---|
| `0` | 沒有任何檢查失敗，或指定的修復已成功。警告不會改變結束狀態碼。 |
| `1` | 至少有一項檢查失敗，或指定的修復未成功。 |
| `2` | 用法錯誤：執行修復時未指定 `--yes`（`--preview` 不需要此參數）、未知的修復 ID、未知的輸出格式、不支援的 `--symptom` 或格式組合，或無法定位 Cacti 安裝路徑。 |

Cacti 會為每個 CLI 腳本提高 `memory_limit`，因此 PHP 執行時期組態檢查僅在網頁介面上才有意義。

## 排程檢查與警報

在 **Configuration > Settings > Doctor** 中開啟 **Run Checks on a Schedule**，並選擇 15 分鐘至 1 天之間的間隔。在每個到期的輪詢器週期結束後，Doctor 會在背景處理程序中執行所有檢查，因此不會影響輪詢器本身的執行時間。

每次執行都會記錄每項檢查的觀測狀態。生效中的警告例外會影響警報原則，但不會改變該觀測狀態。當檢查開始失敗或恢復正常時，Doctor 會將變更寫入 Cacti 日誌；若已設定 **Alert Email Addresses**，則會透過 Cacti 的郵件設定寄送電子郵件至這些位址。啟用 **Alert on Warnings** 後，進入或脫離警告狀態的變更也會觸發警報。首次執行僅用於記錄基準線。

排程報告會在主輪詢器上透過資料庫諮詢鎖（advisory lock）執行，並設有兩分鐘的背景工作程序時間限制。Doctor 會回報最近一次開始與成功完成的時間，以利察覺遺失或過時的結果。結果的有效期為設定間隔加上一個輪詢週期與三分鐘。未完成的執行會在 5、10、20 分鐘及更長間隔後重試，最長不超過正常排程間隔。寄送失敗的警報會保留並以遞增延遲最多重試三次；若仍失敗，請修正 Cacti 的郵件設定，並以輪詢器使用者身分執行 `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts`。郵件伺服器接受信件並不代表已成功送達收件匣。

同一分頁也用於設定各項閾值：輪詢器執行時間（間隔的 80%）、RRA 可用磁碟空間（低於 10% 警告、低於 2% 失敗）、資料庫時鐘偏移（超過 5 秒警告、超過 60 秒失敗）以及 Cacti 日誌大小（100 MB）。若數值留空或無效，將退回使用這些預設值。

## 監控整合

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` 會輸出一行包含效能資料的狀態行，並回傳結束狀態碼 `0`（OK）、`1`（WARNING）或 `2`（CRITICAL），因此 Nagios、Icinga 或任何相容系統皆可直接執行。`--format=prometheus` 會輸出適用於 node_exporter textfile collector 的 Prometheus 文字格式：各項檢查的 `cacti_doctor_check_status`（0 代表通過或已接受的警告、1 代表須處理的警告、2 代表失敗）、套用例外前的 `cacti_doctor_check_observed_status`、`cacti_doctor_check_accepted`、各狀態的 `cacti_doctor_checks`，以及 `cacti_doctor_last_run_timestamp_seconds`。JSON 的檢查資料列包含 `assessment` 欄位；`not_assessed` 表示該檢查無法依據現有資料得出結論。

## 支援診斷包

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

支援診斷包是一個單一文字檔，包含 Doctor、Cacti、PHP、作業系統與資料庫版本、輪詢器與 Boost 統計資料、完整報告，以及 Cacti 日誌的最後 200 行。跟隨於 password、secret、token、community 與 key 名稱後方的數值皆會進行遮罩處理。Doctor 建立的檔案僅限擁有者讀取，且拒絕覆寫現有檔案。在將其發佈到任何地方之前，請先自行檢視內容。

## 修復原則

Doctor 包含一項修復動作：`runtime_directories`。它會建立遺失的 Cacti 執行階段目錄，並在不移除現有權限的情況下新增擁有者的讀取、寫入與執行位元。

在 Cacti 1.3 上，它的目標是 `$cache_path`、`$log_path` 和 `$rra_path`；其他版本則是安裝路徑下的 `cache`、`log` 與 `rra` 目錄。它會略過已可寫入的目錄，拒絕位於 Cacti 安裝路徑之外的目錄（例如 `/var/log` 底下的日誌目錄）、拒絕符號連結，並拒絕以 root 身分執行。它絕不會跟隨 `path_cactilog`，因此設定在程式碼目錄內的日誌檔案無法將修復導向該處。診斷功能仍會在每個發行版本上檢查已設定的日誌檔案所在目錄。

它不會變更擁有權、執行 Shell 命令、重寫設定或修改 Cacti 應用程式資料。每項新增的修復動作都必須包含診斷項目、列入允許清單的處理常式、確認機制、稽核日誌記錄與測試。

## 調查症狀

操作員與管理員可以在 Doctor 頁面上選取 **Investigate a symptom**（調查症狀）。相同的規則亦可透過 `--symptom=graphs_stopped`、`slow_polling`、`devices_missing` 或 `alerts_missing` 使用，並支援純文字或 JSON 輸出。支援套件包含相關的症狀調查結果。

每個候選項目都會列出觀察到的檢查結果與下一步驗證步驟。候選項目屬於假設，而非已確認的根本原因。遺失、未評估或過時的觀察結果絕不會被判定為成因。Web 介面調查會使用依權限篩選的報告；CLI 報告則使用作業系統帳號的存取權限。

## RRD 更新即時性

`filesystem.rrd_stale` 最多會檢查 500 個作用中的資料來源，並排除已停用與離線的裝置。在較大型的安裝環境中，取樣每小時會變更一次，因此重複執行會涵蓋不同的檔案。它會將檔案修改時間與輪詢器間隔、來源 RRD 步階及設定檔步階三者中的最大值乘以 **RRD Stale Intervals**（預設為 3）進行比較。它會顯示最舊的三個過期檔案及受影響的裝置數量。Web 結果僅包含具權限存取的裝置。

`filesystem.rrd_files` 是一項獨立的存在性檢查。它會尋找最多 5,000 個作用中資料來源的 RRD 檔案（包含位於已停用或離線裝置上的資料來源），並使用相同的每小時取樣。

Boost 會將其設定的排清間隔之兩倍作為磁碟寫入容許時間。若使用其他延遲寫入機制，請設定 **Deferred RRD Write Allowance (seconds)**。若系統宣告了 `RRDCACHED_ADDRESS` 但未設定容許時間，或 Boost 間隔無效，則會產生未評估結果。Doctor 絕不會為了執行此檢查而排清快取。檔案修改時間僅代表磁碟活動的證據，並不代表資料收集成功。Doctor 無法偵測到的外部快取必須明確設定。

遺失、無法讀取以及時間戳記位於未來的檔案都會計入詳細資訊中。僅在所有取樣檔案皆無法讀取時，結果才會標記為未評估。取樣結果會註明其僅涵蓋安裝環境的一部分；通過檢查並不代表未取樣的檔案也正常。

## 修復預覽與稽核歷史記錄

管理員修復頁面會顯示每個受影響的路徑、建議動作、目前權限與目標權限。核准會綁定該次預覽、執行操作的使用者以及五分鐘的有效期限。確認執行會消耗該次預覽；若檔案系統有所變更，則必須重新預覽。以 root 執行、位於安裝路徑之外的路徑、需要修復的連結，以及未滿足的檔案系統權限皆會阻擋核准。

`--repair=runtime_directories --preview` 會輸出唯讀的 JSON 計畫。`--repair=runtime_directories --yes` 會核准即時計算的 CLI 計畫，並在執行前重新檢查。CLI 帳號必須已具備修復該安裝環境的權限；它不會繼承 Web 角色。

在進行任何檔案系統變更前，必須先儲存結構化的 `repair.started` 記錄。相關聯的 `repair.completed` 記錄則包含修復後的快照與驗證結果。中斷的操作會留下已開始的記錄以供調查。即使檔案系統已發生變更，若完成稽核記錄失敗，仍會回報為失敗。Doctor 會新增擁有者權限並建立目錄；它不會嘗試自動回復。

具備 Cacti「Settings/System Utilities」權限的管理員可在 Doctor 頁面上檢視最新 20 筆稽核項目。此外掛程式會在 `plugin_doctor_audit` 中保留最新 200 筆記錄；Cacti 日誌也會記錄其 ID、動作與執行者。稽核酬載均經過遮罩處理。

## 已接受的警告

具備 Cacti「Settings/System Utilities」權限的管理員可以在 Doctor 頁面上，針對最新且已評估的警告建立 **Warning exception**（警告例外）。建立例外需要填寫負責人、原因以及 90 天內的 UTC 檢閱日期，並將於該日期開始的 UTC 午夜到期。最多可設定 100 筆例外。清單會顯示已過期的項目以及未出現在目前報告中的 ID，並允許移除。

觀察到的警告仍會保持可見，並在診斷詳細資訊中顯示其負責人、原因與到期日。JSON 會保留觀察到的狀態，並新增 `accepted` 與 `acceptance` 中繼資料。Nagios 會將有效期間內的已接受警告排除於結束嚴重性之外，但會在輸出中列出其名稱。Prometheus 會同時匯出觀察到的嚴重性與可採取行動的嚴重性。一般 CLI 結束狀態保持不變：警告原本即回傳 0，失敗則回傳 1。

在例外生效期間，排程警告警示會受到抑制；到期或移除後，持續存在的警告將再次符合發送警告警示的條件。狀態轉換為失敗以及從失敗恢復的警示仍會照常觸發。未評估的結果或失敗無法被接受。個人確認為獨立機制，不會抑制任何項目。建立與移除例外會與稽核記錄以交易方式同步處理。

升級時會建立 `plugin_doctor_audit` 與 `plugin_doctor_acceptance` 資料表，而不會變更 Cacti 應用程式資料。解除安裝前請先匯出所需的歷史記錄：解除安裝會移除這兩個外掛程式資料表及其設定。還原外掛程式檔案會保留資料表以供調查，但舊版本不會套用警告例外。

## 系統需求

| Cacti | PHP | 備註 |
|---|---|---|
| 1.2.20 | 5.4 或更新版本 | Doctor 本身的程式碼相容於 PHP 5.4，因此能在升級前診斷舊版系統 |
| 1.2.31 | 8.0 或更新版本 | Cacti 的 `composer.json` 要求 `>=8.0` |
| 目前的 1.2.x | 8.2 或更新版本 | Cacti 的 `composer.json` 要求 `>=8.2` |
| `develop` (1.3) | 8.3 或更新版本 | Cacti 的 `composer.json` 要求 `^8.3` |

**PHP compatibility with installed Cacti** 列會將執行中的 PHP 版本與 Cacti 根目錄 `composer.json` 中的 PHP 版本需求進行比較，包含如 `^8.3` 等插入符號限制式的上限。設定的 PHP CLI 執行檔也會依據相同的需求進行檢查。Doctor 可辨識這些 Cacti 套件使用的 `>=` 與 `^` 限制式格式。無法讀取、格式錯誤、遺失或無法辨識的需求會產生警告；沒有資訊清單的 Cacti 1.2.20–1.2.30 安裝環境則保留其文件記載的 PHP 5.4 安裝程式最低要求。Doctor 本身的 PHP 5.4 相容性並不代表與較新 Cacti 安裝環境相容。

**PHP upstream security support** 列回答另一個問題：該 PHP 發行分支是否仍能收到來自 PHP 專案的安全性修正？它會回報該分支已公布的安全性支援結束日期，並在該日期過後發出警告。例如，PHP 8.1 可能符合較舊 Cacti 安裝環境的執行階段需求，但已不再接收上游安全性修正。通過檢查並不表示已安裝的修補發行版為最新版本，且 Doctor 無法判斷作業系統廠商是否提供向後移植的修正。

支援日期已隨附於 Doctor 中，資料來源為 [PHP 支援時程表](https://www.php.net/supported-versions.php) 與 [終止支援清單](https://www.php.net/eol.php)，最後檢查日期為 2026-11-08。未知分支與預先發行版會產生警告，而非預設通過。診斷期間不會發出任何網路請求。當 PHP 公布新的時程表時，請更新 Doctor 的支援資料。現有的 JSON／監控 ID `php.version` 與 `php.security_baseline` 維持不變。

## 開發

單元測試套件使用 Pest，並於 PHP 8.2 或更新版本上執行：

```console
composer install
composer test
```

這些測試會在 `tests/CactiStubs.php` 中以小型替代函式取代 Doctor 所呼叫的 Cacti 函式，因此無需安裝 Cacti 即可執行。

GitHub Actions 會在每次推送與拉取請求時執行四種檢查：

- 在 PHP 5.4、5.6、7.0、7.1、7.4 以及 8.0 至 8.4 下對每個 PHP 檔案執行 `php -l`。
- 在 PHP 8.2、8.3 與 8.4 上執行單元測試套件。
- 執行 `locales/build_gettext.sh --check`，若翻譯範本過時、語系目錄不完整或標記為 fuzzy，或編譯後的語系目錄與來源檔案不一致，則會失敗。
- 七項整合測試作業，分別針對 MySQL 與 MariaDB 安裝 Cacti 1.2.20、目前的 1.2.x 分支與 `develop`，並同時搭配 cmd.php 與 Spine。每項作業都會安裝並啟用外掛程式、執行完整的 CLI 報告，並檢查報告結構描述、摘要總計、預期狀態以及確切的失敗項目集合。接著會故意破壞一個二進位檔路徑與輪詢器時間戳記、確認兩者皆有回報、將其還原、測試修復功能與確認機制，並執行停用、啟用、解除安裝與重新安裝。當作業失敗時，JSON 報告會保留作為成品。

## 參與貢獻

Pull request 請發送至 `develop` 分支。請保持正式環境檔案相容於 PHP 5.4，並遵循 Cacti 的程式碼風格：使用 Tab 縮排、單引號字串，以及 `read_config_option()` 和 `db_fetch_cell()` 等 Cacti 輔助函式。每項行為變更都請新增單元測試、為提交加上簽署（`git commit -s`），並在 `CHANGELOG.md` 中新增一行說明。

### 翻譯

請使用 `__('...', 'doctor')`（或 `__n()`、`__x()`、`__esc()`）包覆所有使用者可見的訊息；若句子中包含數值，請使用單一格式字串並搭配循序的 `%s`/`%d` 預留位置，而不要將片段字串串接起來。Cacti 的 `__()` 僅在訊息包含格式指定符時才會進行格式化，且不支援位置參數 `%1$s` 的形式。此外，它在格式化之前會將 `%%` 轉換為 `%`，因此請勿在訊息中直接放入字面上的百分比符號：請將數值連同其符號作為引數傳入（`__('Usage: %s', '50%', 'doctor')`）。日誌行請保持英文：修復文字請使用 `doctor_repair_message()`，而同時會寫入日誌且僅在顯示時才翻譯的訊息請使用 `doctor_n_()`。請勿翻譯檢查 ID、JSON 鍵值、狀態關鍵字、監控輸出與日誌行。

`locales/build_gettext.sh` 會重新產生範本 `locales/po/cacti.pot`、將其合併至各個語系目錄檔案 `locales/po/<locale>.po`，並編譯 `locales/LC_MESSAGES/<locale>.mo`；這三類檔案皆須一併提交。CI 會執行 `sh locales/build_gettext.sh --check`，當範本過時、語系目錄缺少項目或存在模糊（fuzzy）項目、預留位置不一致，或編譯後的檔案過時時，檢查就會失敗。因此，若修改了訊息內容，必須在同一個 pull request 中同步更新翻譯。此流程需要 GNU gettext（`xgettext`、`msgmerge`、`msgfmt`、`msgunfmt`）。新增語言時，請依照 Cacti 的語系命名規則建立新的 `<locale>.po` 檔案（例如 `pt-BR`）。

## 安全性

請依照 [SECURITY.md](../../../SECURITY.md) 中的說明私下回報漏洞，切勿在公開 issue 中揭露。

## 授權條款

Copyright (C) 2026 Thomas Vincent. 依據 GNU General Public License 第 2 版或更新版本釋出。詳情請參閱 [LICENSE](../../../LICENSE)。
