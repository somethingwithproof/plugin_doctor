<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: a cactus wearing a stethoscope. Diagnose. Fix. Monitor.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Quality Gate Status"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="License: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ and 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor 是一个 Cacti 插件，一次运行即可诊断整个安装环境，并仅在管理员明确要求时执行小范围修复。

**状态：开发中，尚未到 1.0。** 最新发布版本为 [0.6.0](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.0)。此版本增加了按角色限定的访问权限、引导式诊断、限定范围的 RRD 新鲜度检查、修复预览和审计历史、已接受警告的例外规则以及翻译。详情见 [CHANGELOG.md](../../../CHANGELOG.md)。

<a id="screenshots"></a>
## 截图

以下为运行 PHP 8.3.36 的独立 Cacti 1.2.31 演示环境中的诊断和调度设置，包括 Cacti PHP 兼容性、上游安全支持及数据库健康检查。截图中的警告和失败反映的是该演示环境。

![Doctor 诊断表，包含通过、警告和失败结果](../../screenshots/diagnostics.png)

![Doctor 的调度、告警及阈值设置](../../screenshots/settings.png)

Cacti 问题通常表现为症状：空白图表、轮询器停止、插件无法安装。原因往往是某项前提发生了变化，例如 CLI 版本缺少 PHP 扩展、轮询器无法写入日志目录、RRDtool 路径指向错误的二进制程序，或数据库缺少时区表。Doctor 直接检查这些前提，将每项标为通过、警告或失败，并用一句话解释发现的问题。同一报告可以通过网页、命令行以及供监控使用的 JSON 获取。

<a id="what-it-checks"></a>
## 检查内容

| 范围 | 检查项 |
|---|---|
| Doctor | Doctor 是否以 root 运行，这会使权限检查描述错误的账户 |
| Cacti 和 PHP | Cacti 版本、安装程序未完成的升级、缺少文件的已启用插件、PHP 与已安装 Cacti 包的兼容性、PHP 上游安全支持状态 |
| PHP 扩展 | Web PHP 和轮询器使用的 CLI PHP 所需扩展，以及推荐功能 |
| PHP 配置 | 按 Cacti 自身建议检查 `memory_limit`、`max_execution_time` 和 `date.timezone` |
| 数据库 | 连通性、服务器版本是否符合 Cacti 建议、UTF-8 字符集、时区表、核心表、与 PHP 主机的时钟偏差，以及 Cacti 视为错误的 InnoDB 设置 |
| 数据库健康 | 连接容量、缓冲池读取、磁盘临时表、连接线程创建、慢语句和 InnoDB 日志缓冲等待，并提供依赖实际负载的调优建议 |
| 文件系统 | 可写的 cache、log、RRA 目录；RRD 空间；缺少 RRD 文件或更新过期的活动数据源；`include/config.php` 不可供所有用户读取；Cacti 日志可写且未过大 |
| 二进制程序 | PHP CLI、RRDtool、`snmpget`、`snmpwalk`，以及在配置为轮询器时的 Spine；Cacti 指定版本时也检查版本 |
| 日志 | Cacti 最近日志行中的错误及最常见消息 |
| 设备 | 宕机或恢复中的已启用设备、宕机最久的三台设备及最后错误，以及大部分设备同时宕机时的失败状态 |
| 轮询器 | 类型和间隔、主轮询器上次完成时间、运行时长与间隔的关系、未写入 RRD 的输出、停止报告的远程轮询器、停滞的 Boost，以及指向不同数据库的 Spine 配置 |

每项检查都有稳定 ID，例如 `database.timezone` 或 `binary.rrdtool`，脚本可据此识别单项结果。

<a id="code-and-test-map"></a>
## 代码与测试对照

| 行为 | 实现 | 本仓库中的测试依据 |
|---|---|---|
| 诊断检查及稳定的报告 ID | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| 按角色限定的访问及脱敏的 Web 报告 | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| 按症状引导的排查 | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD 新鲜度及延迟写入处理 | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| 修复预览、审计历史及已接受的警告 | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| 计划检查及告警状态转换 | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

这些引用指出实现及测试覆盖范围，并不表示当前修订的每项 CI 作业都已通过。请检查您计划部署的修订对应的工作流运行结果。

<a id="database-health-advice"></a>
## 数据库健康建议

Doctor 的原生 PHP 分析器通过 Cacti 现有数据库连接读取固定的一组 MySQL 或 MariaDB 全局计数器。每份报告执行两条只读查询，不需要额外凭据或可执行程序，也绝不会改变数据库配置。这些检查出现在 Web 报告、CLI、JSON、监控输出、支持包和定时状态跟踪中。

| 检查 ID | 调查触发条件 |
|---|---|
| `database.health_sample` | 启动或 `FLUSH STATUS` 后不足 24 小时，或运行时长不可用、不一致 |
| `database.connection_capacity` | 当前或记录的峰值连接数达到当前 `max_connections` 的 80% |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` 至少 1%，且至少 10,000 次读取请求 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` 至少 25%，且至少 1,000 个临时表 |
| `database.thread_cache` | `Threads_created / Connections` 至少 5%，至少 1,000 次连接尝试，且 `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` 至少 1%，且至少 1,000 条语句 |
| `database.redo_log_waits` | `Innodb_log_waits` 非零 |

这些是 Doctor 的调查阈值，不是厂商的配置目标。除连接容量外，累计建议均要求上述观察窗口。缺失、格式错误、重复或过大的计数器、活动不足，以及不支持的线程模式都会产生警告，不会给出健康结论或调优建议。启用 **Alert on Warnings** 时，警告会影响 Nagios 状态和定时告警。

请将实测计数器与建议结合阅读。累计值不能证明当前负载；计数器可能具有不同的重置历史，也不是原子快照。峰值连接可能反映旧限制。慢查询计数取决于 `long_query_time`，MySQL 的磁盘临时表计数可能漏掉内存映射文件。低比率不能证明不存在瓶颈。更改缓冲区或连接限制前，应在代表性负载下确认趋势，检查查询计划和连接复用，并测量**数据库主机**上的内存。

如果指标不可用，请检查服务器支持情况及 Cacti 账户对 `SHOW GLOBAL STATUS` 和 `SHOW GLOBAL VARIABLES` 的访问；Doctor 不会请求提升权限的凭据。计数器定义来自 [MySQL 状态变量参考](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) 和 [MariaDB 状态变量参考](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables)。没有使用 MySQLTuner 脚本或代码。

不需要迁移架构或配置。正常部署插件文件即可；回退这些文件会移除新增诊断。现有定时状态将在下次运行时刷新。

<a id="how-it-stays-safe"></a>
## 安全机制

诊断工具使用轮询器或 Web 服务器的权限运行，并从设置表读取路径，因此必须谨慎控制执行和修改内容。

- 诊断是只读的，绝不更改文件、设置或数据。
- Doctor 仅在配置的二进制文件名符合预期程序（`php`、`rrdtool`、`snmpget` 或 `snmpwalk`）时执行它。否则，任何能够写设置表的人都可选择 Doctor 执行的程序。其他名称会报告警告且不会执行。
- Doctor 绝不会以 root 执行配置的二进制程序，并会报告自身是否以 root 运行。
- 修复来自固定允许列表。每项都需要 Web UI 中已认证管理员的操作，或 CLI 上的 `--yes`，且会记录到 Cacti 日志。

<a id="releases"></a>
## 发布版本

版本遵循 SemVer，并与插件 `INFO` 文件一致。版本选择、CI 门槛、包内容、校验和及回退说明见[发布流程](../../releasing.md)。

<a id="installation"></a>
## 安装

从 [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) 下载 `doctor-VERSION.tar.gz` 或 `doctor-VERSION.zip` 及 `SHA256SUMS`。验证归档的 SHA-256 校验和，然后将其中的 `doctor/` 目录解压到 Cacti 的 `plugins/` 目录。这些是可安装的软件包；GitHub 自动生成的源码归档使用不同目录名。若要运行 `develop` 中未发布的工作，请从源码检出安装。

对于源码检出：

将仓库克隆或解压为 Cacti 安装目录内的 `plugins/doctor`。目录名必须是 `doctor`，不能是 `plugin_doctor`。

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

在 **Configuration > Plugin Management** 中安装并启用 **Cacti Doctor**，然后通过 Cacti 用户或组权限授予 **Doctor Viewer**、**Doctor Operator** 或 **Doctor Administrator** 权限域。升级后，现有 **Cacti Doctor** 授权保留管理员访问。报告位于 **Utilities > Cacti Doctor**。

<a id="languages"></a>
## 语言

Doctor 在 `locales/po/` 和 `locales/LC_MESSAGES/` 下随附 45 个非英语翻译目录，涵盖通用第一梯队（`ar-SA`、`de-DE`、`es-ES`、`es-419`、`fr-FR`、`hi-IN`、`id-ID`、`it-IT`、`ja-JP`、`ko-KR`、`nl-NL`、`pl-PL`、`pt-BR`、`ru-RU`、`sv-SE`、`tr-TR`、`uk-UA`、`vi-VN`、`zh-CN`、`zh-TW`）、非洲（`af-ZA`、`am-ET`、`ar-EG`、`ar-MA`、`fr-MA`、`fr-SN`、`ha-NG`、`ig-NG`、`mg-MG`、`rw-RW`、`so-SO`、`sw-KE`、`xh-ZA`、`yo-NG`、`zu-ZA`）以及亚洲（`bn-BD`、`fa-IR`、`he-IL`、`mr-IN`、`ms-MY`、`ta-IN`、`te-IN`、`th-TH`、`ur-PK`、`fil-PH`）区域设置。开启语言支持（**Configuration > Settings > General > Language Support**）且用户从 Cacti 语言选择器公开的区域设置中选定一项后，Cacti 会显示对应目录；尚未列入 Cacti 选择器的区域设置所对应的目录，会在 Cacti 添加这些区域设置后生效。网页、设置以及命令行打印的消息和报告文本遵循 Cacti 的语言；命令行报告本身使用 Cacti 默认语言，未修改时仍为英语。

机器可读输出绝不翻译：检查 ID、JSON 键和状态值、`--format=nagios` 和 `--format=prometheus` 输出、日志行及支持包章节标题保持英语，使脚本和监控在所有语言下正常工作。每项检查的 `summary` 和 `detail` 文本是 JSON 报告中唯一翻译的部分。

还提供拉丁美洲西班牙语目录（`es-419`），但 Cacti 1.2 和 Cacti 1.3 都没有可选择的该区域语言，因此只有 Cacti 增加此项后才生效。此前请选择西班牙语（`es-ES`）。

Cacti 1.2.x 和 1.3 均从 `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` 加载插件目录，文本域为 `doctor`（1.3 通过可配置插件路径解析插件目录）。

<a id="access-levels"></a>
## 访问级别

| 权限域 | 能力 |
|---|---|
| Doctor Viewer | 读取最新定时检查状态、观测时间、新鲜度和近期聚合历史。不允许诊断命令、原始详情、配置或修复。 |
| Doctor Operator | 运行进程限制为 120 秒的诊断报告、查看已遮蔽敏感信息的详情，以及确认发现。不允许修改设置或修复。 |
| Doctor Administrator | 操作员能力，加上现有允许列表内的修复及 Doctor 设置。修复和设置还需要 Cacti 的 Settings/System Utilities 权限域。 |

Utilities 菜单打开用户获授的最高 Doctor 权限域页面，包括组授权。新 Viewer 和 Operator 权限域不会自动授权。原权限域 ID 继续绑定到 `doctor.php` 作为 Administrator，保留用户和组已有访问。

Viewer 数据来自定时检查。授予 Viewer 访问前请启用调度；观测缺失或过期时显示**未知**，绝不显示健康。历史保留最近 20 次定时聚合计数，不包含设备状态。操作员必须明确启动新诊断；普通页面刷新使用其会话的上一份报告。

设备详情和总计按当前用户的设备权限过滤。日志摘录还要求 Cacti 的 Log Administration 权限域。诊断详情存入 Web 会话或渲染前会遮蔽秘密。CLI 访问仍由操作系统账户控制。

确认记录是个人专用的，并会记入 Cacti 日志。它们仅适用于相同发现和证据；证据变化需要重新确认。确认不会更改 pass/warn/fail 状态、抑制告警或将失败检查标为健康。这与下文所述的已接受警告例外规则不同；后者影响告警策略，但不改变观测状态。

每项操作都需要 POST 和有效 CSRF 令牌。修复会显示单独确认页，Cancel 链接不会提交表单，并在 Cacti 日志中记录操作者和结果。

<a id="command-line"></a>
## 命令行

请在 Cacti 根目录下以 Cacti 轮询器用户运行以下命令，不要使用 root：

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

文本输出为每项检查打印一行，包含状态、类别、摘要和详情。`--json` 打印带状态计数的 `summary` 对象和 `checks` 数组，数组项包含 `id`、`category`、`status`、`summary`、`detail`，以及适用允许列表修复时的 `repair`/`repairable`。

| 退出状态 | 含义 |
|---|---|
| `0` | 没有检查失败，或请求的修复成功。警告不改变退出状态。 |
| `1` | 至少一项检查失败，或请求的修复未成功。 |
| `2` | 用法错误：执行修复但未提供 `--yes`（`--preview` 无需该参数）、未知的修复 ID、未知的输出格式、不受支持的 `--symptom` 或格式组合，或找不到 Cacti 安装。 |

Cacti 为每个 CLI 脚本提高 `memory_limit`，因此 PHP 运行时配置检查仅在网页上有意义。

<a id="scheduled-checks-and-alerts"></a>
## 定时检查和告警

在 **Configuration > Settings > Doctor** 中启用 **Run Checks on a Schedule**，选择 15 分钟至一天的间隔。每次到期的轮询器周期结束后，Doctor 会在后台进程中运行所有检查，因此不会影响轮询器自身运行时间。

每次运行记录各检查的观测状态。有效的警告例外影响告警策略，但不改变观测。检查开始失败或停止失败时，Doctor 将变化写入 Cacti 日志；若设置了 **Alert Email Addresses**，则通过 Cacti 邮件配置向这些地址发信。**Alert on Warnings** 增加进入和离开警告状态的通知。首次运行仅记录基线。

定时报告在主轮询器上运行，受数据库咨询锁保护，工作进程上限为两分钟。Doctor 报告最后启动和成功完成时间，使结果缺失或过期可见。结果在间隔加一个轮询周期再加三分钟内视为最新。未完成的运行会在 5、10、20 分钟及更长时间后重试，最长不超过正常间隔。失败的告警投递保留最多三次重试，间隔逐渐增加；之后请修正 Cacti 邮件设置，并以轮询器用户运行 `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts`。邮件服务器接受不代表送达收件箱。

同一选项卡设置轮询器运行时长（间隔的 80%）、RRA 空闲空间（低于 10% 警告、低于 2% 失败）、数据库时钟偏差（超过 5 秒警告、超过 60 秒失败）及 Cacti 日志大小（100 MB）的阈值。空值或无效值会回退到这些默认值。

<a id="monitoring-integration"></a>
## 监控集成

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` 打印一行状态及性能数据，以 `0`（OK）、`1`（WARNING）或 `2`（CRITICAL）退出，因此 Nagios、Icinga 或其他兼容系统可直接运行它。`--format=prometheus` 为 node_exporter 的 textfile 采集器写入 Prometheus 文本格式：每检查的 `cacti_doctor_check_status`（0 为通过或已接受警告，1 为需处理警告，2 为失败）、应用例外前的 `cacti_doctor_check_observed_status`、`cacti_doctor_check_accepted`、每状态的 `cacti_doctor_checks` 及 `cacti_doctor_last_run_timestamp_seconds`。JSON 检查行包含 `assessment` 字段；`not_assessed` 表示无法从现有数据得出结论。

<a id="support-bundle"></a>
## 支持包

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

支持包是单个文本文件，包含 Doctor、Cacti、PHP、操作系统和数据库版本、轮询器和 Boost 统计、完整报告及 Cacti 日志最后 200 行。跟在 password、secret、token、community 和 key 名称后的值会被遮蔽。Doctor 创建的文件仅所有者可读，并拒绝覆盖现有文件。发布到任何地方前请先审阅。

<a id="repair-policy"></a>
## 修复策略

Doctor 包含一项修复 `runtime_directories`。它创建缺失的 Cacti 运行时目录，并添加所有者读、写、执行权限位，不移除现有权限。

在 Cacti 1.3 上，它操作 `$cache_path`、`$log_path` 和 `$rra_path`；其他版本则操作安装目录中的 `cache`、`log` 和 `rra`。它跳过已可写目录，拒绝安装目录外的目录（例如 `/var/log` 下的日志目录）、拒绝符号链接，也拒绝以 root 运行。它绝不跟随 `path_cactilog`，因此将日志配置到代码目录中不会把修复重定向到那里。各版本的诊断仍会检查配置的日志文件所在目录。

它不会改变所有者、运行 shell 命令、重写配置或修改 Cacti 应用数据。新增修复必须分别包含诊断、允许列表处理器、确认、审计日志及测试。

<a id="investigating-symptoms"></a>
## 调查症状

操作员和管理员可在 Doctor 页面选择 **Investigate a symptom**。相同规则可通过 `--symptom=graphs_stopped`、`slow_polling`、`devices_missing` 或 `alerts_missing` 使用，输出文本或 JSON。支持包包括相关症状调查。

每个候选原因列出观测到的检查及下一步验证动作。候选项是假设，不是已确认根因。缺失、未评估或过期的观测绝不能证明原因。Web 调查使用按权限过滤的报告；CLI 报告使用操作系统账户的访问权限。

<a id="rrd-update-freshness"></a>
## RRD 更新新鲜度

`filesystem.rrd_stale` 最多检查 500 个活动数据源，排除已禁用或宕机设备。在较大的安装中，样本每小时轮换，因此多次运行会覆盖不同文件。它将文件修改时间与轮询器间隔、数据源 RRD 步长和配置文件步长中的最大值乘以 **RRD Stale Intervals**（默认 3）比较。它显示最旧的三个过期文件及受影响设备数。Web 结果仅包含有权限的设备。

`filesystem.rrd_files` 是单独的存在性检查。它为最多 5,000 个活动数据源查找 RRD 文件，包括已禁用或宕机设备上的数据源，并使用相同的每小时轮换样本。

Boost 添加其配置刷新间隔的两倍作为磁盘写入宽限。其他延迟写入器请配置 **Deferred RRD Write Allowance (seconds)**。若存在 `RRDCACHED_ADDRESS` 却没有宽限，或 Boost 间隔无效，则结果为未评估。Doctor 绝不会为此检查刷新缓存。修改时间仅是磁盘活动证据，不证明数据采集成功。Doctor 无法检测的外部缓存必须明确配置。

缺失、不可读和未来时间的文件会计入详情。仅当没有任何样本文件可读时，结果才为未评估。抽样结果会说明它只覆盖安装的一部分；通过并不涵盖未采样的文件。

<a id="repair-previews-and-audit-history"></a>
## 修复预览和审计历史

管理员修复页显示每条受影响路径、拟执行操作、当前权限及目标权限。批准绑定到该预览、操作者及五分钟有效期。确认会消耗预览；文件系统变化后需要新预览。root 执行、安装外路径、需要修复的链接及不满足的文件系统权限都会阻止批准。

`--repair=runtime_directories --preview` 打印只读 JSON 计划。`--repair=runtime_directories --yes` 批准刚计算的 CLI 计划，并在执行前再次检查。CLI 账户必须本身已有修复安装环境的权限，不会继承 Web 角色。

任何文件系统更改前必须保存结构化 `repair.started` 记录。关联的 `repair.completed` 记录包含修复后快照和验证结果。中断操作会留下启动记录供调查。即使文件系统已更改，完成审计失败也会报告为失败。Doctor 添加所有者权限并创建目录，不会尝试自动回退。

拥有 Cacti Settings/System Utilities 权限的管理员可在 Doctor 页面读取最新 20 条审计记录。插件在 `plugin_doctor_audit` 中保留最新 200 条；Cacti 日志也记录其 ID、操作和操作者。审计内容会遮蔽敏感数据。

<a id="accepted-warnings"></a>
## 接受的警告

拥有 Cacti Settings/System Utilities 权限的管理员可在 Doctor 页面从新鲜、已评估的警告创建 **Warning exception**。例外需要负责人、原因以及 90 天内的 UTC 复查日期，在该日期开始时的 UTC 午夜过期。最多可配置 100 项。列表显示过期项和当前报告中不存在的 ID，并允许移除。

观测警告仍可见，诊断详情显示负责人、原因及到期时间。JSON 保留观测状态并增加 `accepted` 和 `acceptance` 元数据。Nagios 的退出严重性不计入有效的已接受警告，但会在输出中列出。Prometheus 同时导出观测严重性和需处理严重性。普通 CLI 退出状态不变：警告原本即退出零，失败退出一。

例外生效期间抑制定时警告告警；过期或移除后，持续警告再次具备告警资格。进入失败和从失败恢复的变化仍可告警。未评估结果或失败不能被接受。个人确认是独立功能，不抑制任何内容。例外创建和移除与审计记录处于同一事务中。

升级创建 `plugin_doctor_audit` 和 `plugin_doctor_acceptance`，不改变 Cacti 应用数据。卸载前请导出需要的历史：卸载会移除这两个插件表及其设置。回退插件文件会留下表供调查，但旧版本不遵守警告例外。

<a id="requirements"></a>
## 要求

| Cacti | PHP | 说明 |
|---|---|---|
| 1.2.20 | 5.4 或更新 | Doctor 自身代码兼容 PHP 5.4，以便在升级前诊断旧系统 |
| 1.2.31 | 8.0 或更新 | Cacti 的 `composer.json` 要求 `>=8.0` |
| 当前 1.2.x | 8.2 或更新 | Cacti 的 `composer.json` 要求 `>=8.2` |
| `develop`（1.3） | 8.3 或更新 | Cacti 的 `composer.json` 要求 `^8.3` |

**PHP compatibility with installed Cacti** 行将当前 PHP 版本与 Cacti 根目录 `composer.json` 中的 PHP 要求比较，包括 `^8.3` 等插入符约束的上界。配置的 PHP CLI 程序也按相同要求检查。Doctor 识别这些 Cacti 包使用的 `>=` 和 `^` 约束形式。无法读取、格式错误、缺失或未知要求会产生警告；没有清单的 Cacti 1.2.20–1.2.30 保留文档规定的 PHP 5.4 安装下限。Doctor 自身兼容 PHP 5.4，并不代表与较新 Cacti 安装兼容。

**PHP upstream security support** 行回答另一个问题：该 PHP 发布分支是否仍从 PHP 项目获得安全修复？它报告公开的安全支持截止日，并在截止后警告。例如 PHP 8.1 可能满足旧版 Cacti 运行要求，但已不再获得上游安全修复。通过不代表已安装的补丁版本最新，Doctor 也无法确定操作系统厂商是否提供回移修复。

支持日期随 Doctor 分发，来自 [PHP 支持计划](https://www.php.net/supported-versions.php) 和[生命周期结束列表](https://www.php.net/eol.php)，最后核查日期为 2026-11-08。未知分支和预发布版本产生警告，不假定通过。诊断时不发网络请求。PHP 发布新计划后应更新 Doctor 的支持数据。现有 JSON/监控 ID `php.version` 和 `php.security_baseline` 不变。

<a id="development"></a>
## 开发

单元测试使用 Pest，在 PHP 8.2 或更高版本上运行：

```console
composer install
composer test
```

测试通过 `tests/CactiStubs.php` 中的小型替代函数替换 Doctor 调用的 Cacti 函数，因此无需安装 Cacti。

GitHub Actions 在每次推送和拉取请求时运行四类检查：

- 在 PHP 5.4、5.6、7.0、7.1、7.4 和 8.0 至 8.4 下对每个 PHP 文件执行 `php -l`。
- 在 PHP 8.2、8.3 和 8.4 下运行单元测试。
- `locales/build_gettext.sh --check`：翻译模板过期、目录不完整或含模糊条目、编译目录与源文件不一致时失败。
- 七项集成任务，针对 MySQL 和 MariaDB 安装 Cacti 1.2.20、当前 1.2.x 和 `develop`，同时覆盖 cmd.php 和 Spine。每项安装并启用插件，运行完整 CLI 报告，检查报告结构、摘要总计、预期状态及精确失败集合。然后破坏一个二进制路径和轮询器时间戳，确认均被报告，再恢复，测试修复及确认，并执行禁用、启用、卸载和重装。任务失败时保留 JSON 报告作为产物。

<a id="contributing"></a>
## 贡献

拉取请求以 `develop` 为目标。生产文件须兼容 PHP 5.4，并遵循 Cacti 风格：制表符、单引号字符串，以及 `read_config_option()`、`db_fetch_cell()` 等辅助函数。每次行为变化添加单元测试，签署提交（`git commit -s`），并向 `CHANGELOG.md` 添加一行。

<a id="translations"></a>
### 翻译

将每条用户可见消息包装在 `__('...', 'doctor')`（或 `__n()`、`__x()`、`__esc()`）中。带值的句子应使用带顺序 `%s`/`%d` 占位符的单个格式字符串，不要拼接片段。Cacti 的 `__()` 仅在消息含格式说明符时格式化，不支持 `%1$s` 等位置形式。它还会在格式化前将 `%%` 变为 `%`，所以消息中不要直接放百分号；将带符号的值作为参数传入（`__('Usage: %s', '50%', 'doctor')`）。日志行保持英语：修复文本使用 `doctor_repair_message()`，记录日志且仅在展示时翻译的消息使用 `doctor_n_()`。检查 ID、JSON 键、状态关键词、监控输出和日志行不要翻译。

`locales/build_gettext.sh` 重新生成 `locales/po/cacti.pot`，合并到各 `locales/po/<locale>.po`，并编译 `locales/LC_MESSAGES/<locale>.mo`；三者均须提交。CI 执行 `sh locales/build_gettext.sh --check`，若模板过期、目录缺项或有模糊条目、占位符不同或编译文件过期则失败。因此修改消息时必须在同一拉取请求更新翻译。需要 GNU gettext（`xgettext`、`msgmerge`、`msgfmt`、`msgunfmt`）。新增语言即新增按 Cacti 区域名称命名的 `<locale>.po`（例如 `pt-BR`）。

<a id="security"></a>
## 安全

请按 [SECURITY.md](../../../SECURITY.md) 私下报告漏洞，不要发布到公开议题。

<a id="license"></a>
## 许可证

版权所有 (C) 2026 Thomas Vincent。按 GNU 通用公共许可证第 2 版或更高版本发布。参见 [LICENSE](../../../LICENSE)。
