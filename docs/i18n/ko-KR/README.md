<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: 청진기를 두른 선인장. 진단. 복구. 모니터링.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="품질 게이트 상태"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="라이선스: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ 및 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor는 Cacti 설치 환경을 한 번에 진단하고 관리자가 요청한 경우에만 소규모 복구 작업을 적용하는 Cacti 플러그인입니다.

**상태: 개발 중(1.0 이전).** 최신 릴리스는 [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1)입니다. 이 패치는 0.6.0에 포함된 역할 범위별 접근 제어, 안내형 진단, 범위별 RRD 최신성 검사, 복구 미리보기 및 감사 이력, 허용된 경고 예외, 번역 기능에 힌디어 및 아랍어 카탈로그와 번역된 사용자 가이드를 추가합니다. 자세한 내용은 [CHANGELOG.md](../../../CHANGELOG.md)를 참조하세요.

## 스크린샷

PHP 8.3.36이 실행 중인 격리된 Cacti 1.2.31 데모 설치 환경의 진단 결과 및 예약 설정입니다. 여기에는 Cacti PHP 호환성, 업스트림 보안 지원 및 데이터베이스 상태 검사가 포함됩니다. 화면에 표시된 경고 및 실패 항목은 해당 데모 환경의 상태를 나타냅니다.

![통과, 경고 및 실패 결과가 표시된 Doctor 진단 테이블](../../screenshots/diagnostics.png)

![Doctor 예약, 알림 및 임계값 설정](../../screenshots/settings.png)

Cacti 문제는 보통 빈 그래프, 중지된 폴러(poller), 설치되지 않는 플러그인 같은 증상으로 나타납니다. 원인은 대개 CLI 빌드에 누락된 PHP 확장, 폴러가 쓸 수 없는 로그 디렉터리, 잘못된 바이너리를 가리키는 RRDtool 경로, 시간대 테이블이 없는 데이터베이스처럼 변경되거나 누락된 사전 요구 사항인 경우가 많습니다. Doctor는 이러한 사전 요구 사항을 직접 점검하여 각 항목을 통과(pass), 경고(warn) 또는 실패(fail)로 보고하고 확인된 내용을 한 문장으로 설명합니다. 동일한 보고서는 웹 페이지, 명령줄 및 모니터링용 JSON 형식으로 확인할 수 있습니다.

## 검사 항목

| 영역 | 검사 항목 |
|---|---|
| Doctor | Doctor 자체가 root 권한으로 실행 중인지 여부 (이 경우 권한 검사가 잘못된 계정을 기준으로 보고하게 됨) |
| Cacti 및 PHP | Cacti 버전, 설치 프로그램이 완료하지 못한 업그레이드, 파일이 누락된 활성 플러그인, 설치된 Cacti 패키지와의 PHP 호환성, PHP 업스트림 보안 지원 상태 |
| PHP 확장 | 웹 PHP 및 폴러가 사용하는 CLI PHP의 필수 확장, 권장 기능 |
| PHP 구성 | Cacti 자체 권장 사항을 기준으로 한 `memory_limit`, `max_execution_time`, `date.timezone` |
| 데이터베이스 | 연결성, Cacti 권장 사양 대비 서버 버전, UTF-8 문자 집합, 시간대 테이블, 핵심 테이블, PHP 호스트와의 시간 편차(clock drift), Cacti가 오류로 표시하는 InnoDB 설정 |
| 데이터베이스 상태 | 연결 용량, 버퍼 풀 읽기, 디스크 임시 테이블, 연결 스레드 생성, 느린 구문(slow statements), InnoDB 로그 버퍼 대기 및 워크로드에 따른 튜닝 제안 |
| 파일 시스템 | 쓰기 가능한 캐시, 로그 및 RRA 디렉터리; RRD 파일을 위한 여유 공간; RRD 파일이 없거나 업데이트 기한이 지난 활성 데이터 소스; `include/config.php`의 전체 읽기(world-readable) 차단 여부; Cacti 로그의 쓰기 가능 여부 및 크기 초과 여부 |
| 바이너리 | PHP CLI, RRDtool, `snmpget`, `snmpwalk`, 그리고 설정된 폴러가 Spine인 경우 Spine(Cacti가 버전을 명시하는 경우 버전 포함) |
| 로그 | 가장 최근 Cacti 로그 줄 중 발생한 오류 및 가장 빈번한 메시지 |
| 장치 | 다운(down) 또는 복구 중(recovering)인 활성 장치, 가장 오래 다운된 상위 3개 장치와 마지막 오류, 대부분의 장치가 동시에 다운된 경우 실패 보고 |
| 폴러 | 폴러 유형 및 간격, 메인 폴러가 마지막으로 완료된 후 경과 시간, 실행 간격 대비 소요 시간, RRD 파일에 도달하지 못한 폴러 출력, 보고가 중단된 원격 폴러, 정지된 Boost, 다른 데이터베이스를 가리키는 Spine 구성 |

모든 검사에는 `database.timezone` 또는 `binary.rrdtool`과 같은 고정 ID가 부여되므로 스크립트에서 개별 결과를 키로 활용할 수 있습니다. 활성화된 플러그인은 `doctor_register_checks` 훅을 통해 추가 검사와 지원 번들 첨부 파일을 제공할 수 있으며, Doctor는 `abilities_register`를 통해 `plugin_mcp`에 읽기 전용 진단 기능을 노출합니다.

## 코드 및 테스트 맵

| 동작 | 구현 | 이 저장소의 테스트 근거 |
|---|---|---|
| 진단 검사 및 고정 보고서 ID | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| 플러그인 검사 훅 (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| MCP 진단 기능 (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| 역할 범위별 접근 제어 및 민감 정보가 제거된 웹 보고서 | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| 안내형 증상 조사 | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD 최신성 및 지연 쓰기 처리 | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| 복구 미리보기, 감사 이력 및 허용된 경고 | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| 예약 검사 및 알림 상태 전환 | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

이 참조는 구현 위치와 테스트 범위를 나타내며, 현재 리비전에 대해 모든 CI 작업이 통과했음을 의미하지는 않습니다. 배포하려는 리비전의 워크플로 실행 결과를 확인하세요.

## 데이터베이스 상태 권장 사항

Doctor의 네이티브 PHP 분석기는 Cacti의 기존 데이터베이스 연결을 통해 고정된 전역 MySQL 또는 MariaDB 카운터 집합을 읽습니다. 보고서당 두 개의 읽기 전용 쿼리만 실행하며, 추가 자격 증명이나 실행 파일이 필요하지 않고 데이터베이스 구성을 변경하지도 않습니다. 이러한 검사는 웹 보고서, CLI, JSON, 모니터링 출력, 지원 번들 및 예약된 상태 추적에 표시됩니다.

| 검사 ID | 조사 트리거 |
|---|---|
| `database.health_sample` | 시작 또는 `FLUSH STATUS` 이후 24시간 미만 경과, 또는 가동 시간을 사용할 수 없거나 일관되지 않음 |
| `database.connection_capacity` | 현재 또는 기록된 최대 연결 수가 현재 `max_connections`의 80% 이상 |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` 비율이 1% 이상이고 읽기 요청이 10,000회 이상 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` 비율이 25% 이상이고 임시 테이블이 1,000개 이상 |
| `database.thread_cache` | `Threads_created / Connections` 비율이 5% 이상이고 연결 시도가 1,000회 이상이며 `thread_handling=one-thread-per-connection`인 경우 |
| `database.slow_queries` | `Slow_queries / Queries` 비율이 1% 이상이고 구문이 1,000개 이상 |
| `database.redo_log_waits` | `Innodb_log_waits`가 0이 아님 |

이는 공급업체가 권장하는 구성 목표값이 아니라 Doctor의 조사 임계값입니다. 연결 용량을 제외한 누적 기반 권장 사항은 위의 관찰 기간을 충족해야 합니다. 카운터가 누락되었거나 형식이 잘못되었거나 중복되었거나 범위를 초과한 경우, 활동량이 부족한 경우, 또는 지원되지 않는 스레드 모드인 경우에는 정상 판정이나 튜닝 권장 사항 대신 경고가 발생합니다. **경고 시 알림(Alert on Warnings)**이 활성화되어 있으면 경고가 Nagios 상태 및 예약 알림에 영향을 줄 수 있습니다.

측정된 카운터와 제안을 함께 확인하세요. 누적값은 현재 부하를 의미하지 않으며, 카운터마다 초기화 이력이 다를 수 있고 원자적 스냅샷이 아닙니다. 최대 연결 수는 이전 제한값을 반영한 것일 수 있습니다. 느린 쿼리 수는 `long_query_time`에 따라 달라지며, MySQL의 디스크 임시 테이블 카운터에는 메모리 매핑 파일이 누락될 수 있습니다. 비율이 낮다고 해서 병목 현상이 없다는 증거는 아닙니다. 버퍼나 연결 제한을 변경하기 전에 대표적인 워크로드에서 추세를 확인하고, 쿼리 실행 계획과 연결 재사용을 검토하며, **데이터베이스 호스트**의 메모리를 측정하세요.

메트릭을 사용할 수 없는 경우 서버 지원 여부와 Cacti 계정의 `SHOW GLOBAL STATUS` 및 `SHOW GLOBAL VARIABLES` 접근 권한을 확인하세요. Doctor는 상위 권한 자격 증명을 요청하지 않습니다. 카운터 정의는 [MySQL 상태 변수 참조 문서](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) 및 [MariaDB 상태 변수 참조 문서](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables)를 따릅니다. MySQLTuner 스크립트나 코드는 사용되지 않습니다.

스키마나 구성 마이그레이션은 필요하지 않습니다. 플러그인 파일을 일반 방식대로 배포하면 되며, 해당 파일을 되돌리면 추가된 진단 기능이 제거됩니다. 기존 예약 상태는 다음 실행 시 새로 고침됩니다.

## 안전성 유지 방식

진단 도구는 폴러(poller) 또는 웹 서버의 권한으로 실행되며 settings 테이블에서 경로를 읽어 오므로, 무엇을 실행하고 수정하는지 주의해야 합니다.

- 진단은 읽기 전용으로 동작합니다. 파일, 설정 또는 데이터를 절대 변경하지 않습니다.
- Doctor는 설정된 바이너리의 파일 이름이 예상 프로그램(`php`, `rrdtool`, `snmpget` 또는 `snmpwalk`)과 일치할 때만 해당 바이너리를 실행합니다. 그렇지 않으면 settings 테이블에 쓸 수 있는 누구나 Doctor가 실행할 대상을 임의로 지정할 수 있기 때문입니다. 그 밖의 다른 이름은 경고로 보고되며 실행되지 않습니다.
- Doctor는 설정된 바이너리를 절대 root 권한으로 실행하지 않으며, root로 실행 중인 경우 이를 보고합니다.
- 복구 작업은 고정된 허용 목록(allow-list)에서만 제공됩니다. 각 복구 작업은 웹 UI에서 인증된 관리자의 작업이나 CLI에서의 `--yes` 옵션을 필요로 하며, 모든 실행 내역은 Cacti 로그에 기록됩니다.

## 릴리스

버전은 SemVer를 따르며 플러그인의 `INFO` 파일과 일치합니다. 버전 선택, CI 게이트, 패키지 구성 요소, 체크섬 및 롤백 지침은 [릴리스 프로세스](../../releasing.md)를 참조하세요.

## 설치

[GitHub 릴리스](https://github.com/somethingwithproof/plugin_doctor/releases)에서 `doctor-VERSION.tar.gz` 또는 `doctor-VERSION.zip`과 `SHA256SUMS`를 다운로드하세요. 아카이브의 SHA-256 체크섬을 검증한 다음, 아카이브 내 `doctor/` 디렉터리를 Cacti의 `plugins/` 디렉터리에 압축 해제하세요. 이 파일들이 설치 가능한 공식 패키지이며, GitHub에서 자동으로 생성하는 소스 아카이브는 디렉터리 이름이 다릅니다. `develop` 브랜치의 미출시 작업을 실행하려면 소스 체크아웃으로 설치하세요.

소스 체크아웃을 사용하는 경우:

Cacti 설치 경로 내부의 `plugins/doctor`로 저장소를 복제(clone)하거나 압축을 푸세요. 디렉터리 이름은 `plugin_doctor`가 아니라 반드시 `doctor`여야 합니다.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

**Configuration > Plugin Management**에서 **Cacti Doctor**를 설치하고 활성화한 다음, Cacti 사용자 또는 그룹 권한을 통해 **Doctor Viewer**, **Doctor Operator** 또는 **Doctor Administrator** 영역(realm) 권한을 부여하세요. 기존의 **Cacti Doctor** 권한 보유자는 업그레이드 후에도 Administrator 액세스 권한을 유지합니다. 보고서는 **Utilities > Cacti Doctor** 아래에 표시됩니다.

## 지원 언어

Doctor는 `locales/po/` 및 `locales/LC_MESSAGES/` 아래에 Broad Tier 1(`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), 아프리카(`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), 아시아(`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`), 남동유럽(`bs-BA`, `hr-HR`, `sr-RS`) 로캘을 포괄하는 48개의 비영어 번역 카탈로그를 기본 제공합니다. 언어 지원이 켜져 있고(**Configuration > Settings > General > Language Support**) 사용자가 Cacti의 언어 선택기에서 제공하는 로캘을 선택하면 Cacti에 해당 카탈로그가 표시되며, Cacti의 선택기에 아직 나열되지 않은 로캘의 카탈로그는 Cacti가 해당 로캘을 추가하면 적용됩니다. 웹 페이지, 설정 화면, 그리고 명령줄에서 출력하는 메시지와 보고서 텍스트는 Cacti의 언어 설정을 따릅니다. 명령줄 보고서 자체는 Cacti 기본 언어를 사용하며, 별도로 변경하지 않는 한 영어로 유지됩니다.

기계가 읽는 출력은 절대 번역되지 않습니다. 검사 ID, JSON 키 및 상태 값, `--format=nagios` 및 `--format=prometheus` 출력, 로그 행, 지원 번들 섹션 제목은 모든 언어 환경에서 스크립트와 모니터링이 계속 정상 동작하도록 영어로 유지됩니다. JSON 보고서에서 번역되는 부분은 각 검사의 `summary` 및 `detail` 텍스트뿐입니다.

라틴 아메리카 스페인어 카탈로그(`es-419`)도 함께 제공되지만, Cacti 1.2와 Cacti 1.3 모두 선택 가능한 라틴 아메리카 스페인어 로캘이 없으므로 Cacti가 해당 로캘을 추가한 이후에만 적용됩니다. 그전까지는 스페인어(`es-ES`)를 선택하세요.

Cacti는 1.2.x와 1.3 모두에서 `doctor`를 텍스트 도메인으로 사용하여 `plugins/doctor/locales/LC_MESSAGES/<locale>.mo`에서 플러그인의 카탈로그를 불러옵니다(1.3에서는 구성 가능한 plugins 경로를 통해 플러그인 디렉터리를 확인합니다).

## 액세스 수준

| 영역 | 기능 |
|---|---|
| Doctor Viewer | 최근 예약 검사 상태, 관측 시간, 최신성 및 최근 집계 기록을 조회합니다. 진단 명령 실행, 원시 세부 정보 조회, 설정 변경 또는 복구는 불가능합니다. |
| Doctor Operator | 120초 프로세스 제한 내에서 진단 보고서를 실행하고, 민감 정보가 가려진(redacted) 세부 정보를 확인하며, 발견 사항을 확인 처리(acknowledge)합니다. 설정 변경이나 복구는 불가능합니다. |
| Doctor Administrator | Operator 기능에 더해 기존의 허용 목록 기반 복구 및 Doctor 설정 기능을 제공합니다. 복구 및 설정 변경에는 Cacti의 Settings/System Utilities 영역 권한도 함께 필요합니다. |

Utilities 메뉴는 그룹을 통해 부여된 권한을 포함하여 사용자에게 부여된 가장 높은 Doctor 영역에 해당하는 페이지를 엽니다. 새로 추가된 Viewer 및 Operator 영역에는 자동 권한 부여가 적용되지 않습니다. 기존 영역 ID는 Administrator 권한으로 `doctor.php`에 그대로 연결되어 있어 기존 사용자 및 그룹의 액세스 권한이 유지됩니다.

Viewer 데이터는 예약 검사에서 가져옵니다. Viewer 권한을 부여하기 전에 예약 기능을 활성화하세요. 누락되거나 기한이 지난 관측 결과는 정상(healthy)이 아닌 **unknown**으로 표시됩니다. 기록에는 최근 20회의 예약 집계 건수가 보관되며 장치 상태는 제외됩니다. Operator는 새 진단을 명시적으로 시작하며, 일반 페이지 새로 고침 시에는 해당 세션의 마지막 보고서를 사용합니다.

장치 세부 정보 및 합계는 현재 사용자의 장치 권한을 따릅니다. 로그 발췌 내용을 보려면 추가로 Cacti의 Log Administration 영역 권한이 필요합니다. 비밀 정보(secrets)는 진단 세부 정보가 웹 세션에 저장되거나 렌더링되기 전에 마스킹됩니다. CLI 액세스는 계속해서 운영 체제 계정의 권한에 따라 제어됩니다.

확인 처리(acknowledgment)는 개인별로 적용되며 Cacti 로그에 기록됩니다. 동일한 발견 사항과 근거에 대해서만 유효하므로 근거가 변경되면 새로 확인 처리해야 합니다. 확인 처리는 통과/경고/실패(pass/warn/fail) 상태를 바꾸거나, 알림을 억제하거나, 실패한 검사를 정상으로 표시하지 않습니다. 이는 관측된 상태는 유지한 채 알림 정책에만 영향을 미치는 허용된 경고(accepted-warning) 예외와는 별개이며, 해당 내용은 아래에서 설명합니다.

모든 작업에는 POST 요청과 유효한 CSRF 토큰이 필요합니다. 복구 작업은 폼을 제출하지 않는 Cancel 링크가 포함된 별도의 확인 페이지를 표시하며, 작업을 수행한 사용자와 결과를 Cacti 로그에 기록합니다.

## 명령줄

root가 아닌 Cacti 폴러 사용자로 Cacti 루트 디렉터리에서 다음 명령을 실행하세요:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

텍스트 출력은 검사당 한 줄씩 상태, 범주, 요약 및 세부 정보를 출력합니다. `--json`은 상태별 건수를 담은 `summary` 객체와 각 항목이 `id`, `category`, `status`, `summary`, `detail`을 포함하고 허용 목록 기반 복구가 적용 가능한 경우 `repair`/`repairable`을 포함하는 `checks` 배열을 출력합니다.

| 종료 상태 | 의미 |
|---|---|
| `0` | 실패한 검사가 없거나 요청한 복구가 성공했습니다. 경고는 종료 상태를 변경하지 않습니다. |
| `1` | 하나 이상의 검사가 실패했거나 요청한 복구가 성공하지 못했습니다. |
| `2` | 사용법 오류: `--yes` 없이 복구를 실행했거나(`--preview`에는 필요하지 않음), 알 수 없는 복구 ID, 알 수 없는 출력 형식, 지원되지 않는 `--symptom` 또는 형식 조합, 혹은 Cacti 설치 경로를 찾을 수 없는 경우입니다. |

Cacti는 모든 CLI 스크립트에 대해 `memory_limit`를 높이므로, PHP 런타임 구성 검사는 웹 페이지에서만 의미가 있습니다.

## 예약 검사 및 알림

**Configuration > Settings > Doctor**에서 **Run Checks on a Schedule**을 켜고 15분에서 하루 사이의 주기를 선택하세요. 실행 시점이 도래한 각 폴러 주기 이후에 Doctor가 백그라운드 프로세스에서 모든 검사를 실행하므로 폴러 자체의 실행 시간에는 영향을 주지 않습니다.

각 실행은 모든 검사의 관측된 상태를 기록합니다. 활성 상태의 경고 예외는 해당 관측 결과는 바꾸지 않고 알림 정책에만 영향을 미칩니다. 검사가 실패를 시작하거나 실패 상태에서 벗어나면 Doctor는 해당 변경 사항을 Cacti 로그에 기록하고, **Alert Email Addresses**가 설정되어 있는 경우 Cacti의 메일 설정을 통해 해당 주소로 이메일을 보냅니다. **Alert on Warnings**를 활성화하면 경고 상태로 진입하거나 경고에서 벗어나는 변경 사항도 포함됩니다. 첫 번째 실행에서는 기준선(baseline)만 기록합니다.

예약 보고서는 데이터베이스 권고 잠금(advisory lock) 하에 기본 폴러에서 실행되며 2분의 워커 시간 제한을 가집니다. 누락되거나 오래된 결과를 확인할 수 있도록 Doctor는 마지막 시작 시간과 성공적인 완료 시간을 보고합니다. 결과는 설정된 주기에 폴링 주기 1회와 3분을 더한 시간 동안 최신 상태로 간주됩니다. 완료되지 않은 실행은 5분, 10분, 20분 등으로 간격을 늘려가며 일반 주기까지 재시도됩니다. 실패한 알림 전송은 지연 시간을 늘려가며 최대 3회까지 재시도를 위해 보관되며, 그 이후에는 Cacti의 메일 설정을 수정한 뒤 폴러 사용자로 `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts`를 실행해야 합니다. 메일 서버의 수신 수락이 받은 편지함 배달까지 보장하는 것은 아닙니다.

같은 탭에서 폴러 실행 시간(주기의 80%), RRA 여유 디스크 공간(10% 미만 시 경고, 2% 미만 시 실패), 데이터베이스 시계 오차(5초 초과 시 경고, 60초 초과 시 실패) 및 Cacti 로그 크기(100 MB)에 대한 임계값을 설정합니다. 값이 비어 있거나 잘못된 경우 이러한 기본값으로 대체됩니다.

## 모니터링 연동

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios`는 성능 데이터와 함께 한 줄의 상태를 출력하고 `0` (OK), `1` (WARNING) 또는 `2` (CRITICAL)로 종료하므로 Nagios, Icinga 또는 호환되는 모든 시스템에서 직접 실행할 수 있습니다. `--format=prometheus`는 node_exporter의 textfile collector용 Prometheus 텍스트 형식을 출력합니다. 검사별 `cacti_doctor_check_status`(0: 통과 또는 허용된 경고, 1: 조치가 필요한 경고, 2: 실패), 예외 적용 전의 `cacti_doctor_check_observed_status`, `cacti_doctor_check_accepted`, 상태별 `cacti_doctor_checks`, 그리고 `cacti_doctor_last_run_timestamp_seconds`를 포함합니다. JSON 검사 행에는 `assessment` 필드가 포함되며, `not_assessed`는 사용 가능한 데이터로부터 결론을 내릴 수 없었음을 의미합니다.

## 지원 번들

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

지원 번들은 Doctor, Cacti, PHP, OS 및 데이터베이스 버전, 폴러 및 Boost 통계, 전체 보고서, `== Plugin attachments` 아래에 포함되는 모든 플러그인 지원 번들 첨부 파일, 그리고 Cacti 로그의 마지막 200줄을 담은 단일 텍스트 파일입니다. password, secret, token, community 및 key 이름 뒤에 오는 값들은 마스킹됩니다. Doctor는 소유자만 읽을 수 있는 권한으로 파일을 생성하며 기존 파일 덮어쓰기를 거부합니다. 외부에 게시하기 전에 내용을 검토하세요.

## 복구 정책

Doctor에는 `runtime_directories`라는 하나의 복구 기능이 포함되어 있습니다. 이 기능은 누락된 Cacti 런타임 디렉터리를 생성하고 기존 권한을 제거하지 않으면서 소유자의 읽기, 쓰기 및 실행 비트를 추가합니다.

Cacti 1.3에서는 `$cache_path`, `$log_path`, `$rra_path`를 대상으로 하며, 그 외의 버전에서는 설치 경로의 `cache`, `log`, `rra` 디렉터리를 대상으로 합니다. 이미 쓰기 가능한 디렉터리는 건너뛰고, Cacti 설치 경로 외부의 디렉터리(예: `/var/log` 아래의 로그 디렉터리)를 거부하며, 심볼릭 링크와 root 권한 실행도 거부합니다. `path_cactilog`는 절대 따라가지 않으므로 코드 디렉터리 내부에 설정된 로그 파일로 인해 복구 대상이 해당 위치로 리디렉션되지 않습니다. 진단은 모든 릴리스에서 여전히 설정된 로그 파일의 디렉터리를 검사합니다.

이 기능은 소유권을 변경하거나, 셸 명령을 실행하거나, 구성을 다시 쓰거나, Cacti 애플리케이션 데이터를 수정하지 않습니다. 새로운 복구 기능은 각각 진단 항목, 허용 목록에 등록된 핸들러, 확인 절차, 감사 로깅 및 테스트를 반드시 포함해야 합니다.

## 증상 조사

운영자(Operators)와 관리자(Administrators)는 Doctor 페이지에서 **Investigate a symptom**을 선택할 수 있습니다. 동일한 규칙을 `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` 또는 `alerts_missing` 옵션을 통해 텍스트 또는 JSON 출력 형식으로 사용할 수 있습니다. 지원 번들에는 관련 증상 조사 결과가 포함됩니다.

각 후보 항목에는 관찰된 점검 결과와 다음 검증 단계가 나열됩니다. 후보는 가설일 뿐 확정된 근본 원인이 아닙니다. 누락되었거나, 평가되지 않았거나, 오래된 관찰 결과는 원인을 확정할 수 없습니다. 웹 조사는 권한으로 필터링된 보고서를 사용하며, CLI 보고서는 운영 체제 계정의 접근 권한을 사용합니다.

## RRD 업데이트 최신성

`filesystem.rrd_stale`은 비활성화되었거나 다운된 장치를 제외하고 최대 500개의 활성 데이터 소스를 검사합니다. 규모가 큰 설치 환경에서는 표본이 매시간 변경되므로 반복 실행 시 서로 다른 파일이 검사 대상이 됩니다. 파일 수정 시간을 폴러 간격, 소스 RRD 스텝 및 프로필 스텝 중 가장 큰 값에 **RRD Stale Intervals**(기본값 3)를 곱한 값과 비교합니다. 가장 오래된 지연 파일 3개와 영향을 받은 장치 수를 표시합니다. 웹 결과에는 허용된 장치만 포함됩니다.

`filesystem.rrd_files`는 별도의 존재 여부 검사입니다. 비활성화되었거나 다운된 장치의 데이터 소스를 포함하여 최대 5,000개 활성 데이터 소스의 RRD 파일을 찾으며, 동일한 시간당 표본을 사용합니다.

Boost는 구성된 플러시 간격의 두 배를 디스크 쓰기 허용 시간으로 추가합니다. 다른 지연 쓰기 도구를 사용하는 경우 **Deferred RRD Write Allowance (seconds)**를 구성하세요. 허용 시간 없이 `RRDCACHED_ADDRESS`가 지정되어 있거나 Boost 간격이 잘못된 경우 평가되지 않음(unassessed) 결과가 생성됩니다. Doctor는 이 검사를 수행하기 위해 캐시를 플러시하지 않습니다. 수정 시간은 디스크 활동의 증거일 뿐, 데이터 수집이 성공했음을 증명하는 것은 아닙니다. Doctor가 감지할 수 없는 외부 캐싱은 명시적으로 구성해야 합니다.

누락되었거나, 읽을 수 없거나, 미래 날짜로 되어 있는 파일은 세부 정보에 집계됩니다. 표본 파일 중 읽을 수 있는 파일이 하나도 없는 경우에만 결과가 평가되지 않음으로 표시됩니다. 표본 검사 결과는 설치 환경의 일부만 검사했음을 명시하며, 통과 결과는 표본에 포함되지 않은 파일까지 보장하지 않습니다.

## 복구 미리 보기 및 감사 기록

관리자 복구 페이지에는 영향을 받는 각 경로, 제안된 작업, 현재 권한 및 대상 권한이 표시됩니다. 승인은 해당 미리 보기, 작업을 수행하는 사용자 및 5분의 유효 기간에 연결됩니다. 확인을 진행하면 미리 보기가 소모되며, 파일시스템이 변경된 경우 새 미리 보기가 필요합니다. root 실행, 설치 경로 외부의 경로, 복구가 필요한 링크 및 충족되지 않은 파일시스템 권한이 있으면 승인이 차단됩니다.

`--repair=runtime_directories --preview`는 읽기 전용 JSON 계획을 출력합니다. `--repair=runtime_directories --yes`는 새로 계산된 CLI 계획을 승인하고 실행 전에 다시 검사합니다. CLI 계정은 이미 설치 환경을 복구할 권한이 있어야 하며, 웹 역할을 상속받지 않습니다.

모든 파일시스템 변경 전에 구조화된 `repair.started` 레코드를 저장해야 합니다. 연결된 `repair.completed` 레코드에는 복구 후 스냅샷과 검증 결과가 포함됩니다. 작업이 중단되면 조사를 위해 시작 레코드가 남습니다. 파일시스템 변경이 발생했더라도 완료 감사 기록에 실패하면 실패로 보고됩니다. Doctor는 소유자 권한을 추가하고 디렉터리를 생성할 뿐, 자동 롤백을 시도하지 않습니다.

Cacti의 Settings/System Utilities 권한이 있는 관리자는 Doctor 페이지에서 최신 감사 항목 20개를 읽을 수 있습니다. 플러그인은 `plugin_doctor_audit`에 최신 레코드 200개를 보관하며, Cacti 로그에도 해당 ID, 작업 및 수행자가 기록됩니다. 감사 페이로드는 마스킹(redacted)됩니다.

## 허용된 경고

Cacti의 Settings/System Utilities 권한이 있는 관리자는 Doctor 페이지에서 평가가 완료된 최신 경고로부터 **Warning exception**을 생성할 수 있습니다. 예외를 생성하려면 소유자, 사유 및 90일 이내의 UTC 검토 날짜가 필요합니다. 예외는 해당 날짜가 시작되는 UTC 자정에 만료됩니다. 최대 100개의 예외를 구성할 수 있습니다. 목록에는 만료된 항목과 현재 보고서에 없는 ID가 표시되며, 제거할 수 있습니다.

관찰된 경고는 진단 세부 정보에 소유자, 사유 및 만료일과 함께 계속 표시됩니다. JSON은 관찰된 상태를 유지하며 `accepted` 및 `acceptance` 메타데이터를 추가합니다. Nagios는 종료 심각도에서 활성화된 허용 경고를 제외하지만 출력에는 이름을 표시합니다. Prometheus는 관찰된 심각도와 조치 가능한 심각도를 모두 내보냅니다. 일반 CLI 종료 상태는 변경되지 않습니다. 경고는 이미 0으로 종료되고, 실패는 1로 종료됩니다.

예외가 적용되는 동안에는 예약된 경고 알림이 억제되며, 예외가 만료되거나 제거되면 계속되는 경고에 대해 경고 알림이 다시 발생할 수 있습니다. 실패로의 전환 및 실패로부터의 복구는 계속 알림 대상이 됩니다. 평가되지 않은 결과나 실패는 허용할 수 없습니다. 개인 확인(acknowledgment)은 별개이며 아무것도 억제하지 않습니다. 예외 생성 및 제거는 감사 레코드와 함께 트랜잭션으로 처리됩니다.

업그레이드 시 Cacti 애플리케이션 데이터를 변경하지 않고 `plugin_doctor_audit` 및 `plugin_doctor_acceptance` 테이블을 생성합니다. 제거(uninstall)하면 두 플러그인 테이블과 설정이 모두 삭제되므로 제거하기 전에 필요한 기록을 내보내세요. 플러그인 파일을 이전 버전으로 되돌리면 조사를 위해 테이블이 유지되지만, 이전 버전에서는 경고 예외가 적용되지 않습니다.

## 플러그인 검사 (`doctor_register_checks`)

활성화된 Cacti 플러그인은 `doctor_register_checks` 훅을 등록하여 읽기 전용 진단 검사와 선택적 지원 번들 첨부 파일을 제공할 수 있습니다:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

Doctor는 `doctor_register_checks`에 등록된 비통합 활성 플러그인을 호출하며(`doctor` 및 `cacti`는 건너뜀), 훅 파일은 해당 플러그인 자체 디렉터리 내부로 엄격히 제한하여 확인합니다. 콜백은 `['mode' => 'run' | 'list', 'plugin' => '<slug>']`를 전달받고 검사 설명자 목록 또는 `checks`와 선택적 `attachments`를 포함한 봉투 구조를 반환합니다:

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

모든 플러그인 검사 설명자는 포함되기 전에 검증됩니다:

- 필수 키: `id`, `plugin`, `category`, `title`, `status`, `message`, `details` 및 `remediation`.
- `plugin`은 등록된 플러그인 슬러그(`[a-z0-9_]{1,64}`)와 일치해야 합니다. `id`는 `[a-z0-9_.]{1,128}`과 일치하고 `<plugin>.`으로 시작해야 하며, 기존 코어 또는 플러그인 검사 ID와 충돌하지 않아야 합니다.
- `status`는 `ok`, `warn`, `fail` 또는 `info`여야 합니다. `ok`는 Doctor 보고서에서 `pass`로 매핑되며, `info`는 정보 제공용이므로 CLI, Nagios, Prometheus 또는 예약 알림에서 실패를 유발하지 않습니다.
- `category`(최대 64바이트)와 `title`(최대 256바이트)은 제어 문자가 없는 비어 있지 않은 문자열이어야 합니다. `message`(비어 있지 않음, 최대 2048바이트)와 `remediation`(최대 2048바이트)은 문자열이어야 합니다.
- `details`는 문자열(최대 8192바이트) 또는 스칼라/중첩 배열(최대 깊이 4, JSON 인코딩 최대 16384바이트; 객체 및 리소스는 거부됨)을 허용합니다.
- 선택적 지원 번들 첨부 파일은 비어 있지 않은 `title`(최대 128바이트, 제어 문자 없음)과 최대 65536바이트(64 KiB)의 `content` 문자열을 필요로 합니다.

Doctor는 플러그인당 검사 32개 및 첨부 파일 8개(전체 플러그인 검사 64개 및 첨부 파일 32개)의 제한을 적용합니다. 각 훅은 자체 `try`/`catch` 경계 내에서 실행되므로 예외나 배열이 아닌 페이로드는 코어 검사나 다른 플러그인에 영향을 주지 않고 마스킹되어 Cacti 로그(`DOCTOR` 기능)에 기록됩니다. 잘못 구성된 설명자는 거부되어 로그에 기록되는 반면, 동일 플러그인의 유효한 설명자는 계속 실행됩니다. 플러그인 검사는 항상 읽기 전용(`repairable: false`)이며, 문자열 값과 민감한 연관 키는 렌더링, 내보내기 또는 번들링 전에 마스킹됩니다. 검증된 플러그인 검사는 웹 UI, CLI 텍스트/JSON/Nagios/Prometheus 출력, 예약된 상태 추적 및 지원 번들에 표시됩니다.

## MCP 연동 (`abilities_register`)

Doctor는 두 플러그인이 모두 활성화되었을 때 `plugin_mcp`가 진단 기능을 검색할 수 있도록 `abilities_register` 훅(`doctor_abilities.php`의 `doctor_abilities_register`)을 등록합니다. Doctor는 `diagnostics` 범주(`Diagnostics`)와 두 가지 읽기 전용, 비파괴적, 멱등성 기능을 등록합니다:

| 기능 ID | 선택적 인수 | 출력 |
|---|---|---|
| `doctor-run-checks` | `category` (문자열, 최대 64자), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) 및 마스킹된 최대 256개의 `findings` (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (문자열, 최대 64자), `plugin` (문자열, 최대 64자) | 45개의 기본 내장 검사와 활성화된 플러그인 검사를 모두 포괄하는 최대 256개의 `checks` (`id`, `plugin`, `category`, `title`) |

두 기능 모두 엄격히 읽기 전용이며 복구 작업을 절대 실행하지 않습니다. `plugin_mcp` 자체의 영역(realm) 및 기능 노출 제어(플러그인 기능은 관리자가 노출하기 전까지 MCP에서 숨겨진 상태로 시작함) 외에도, Doctor는 토큰 소유자가 **Doctor Viewer** 이상에 해당하는 Doctor 영역 권한을 보유하도록 요구합니다. `doctor-run-checks`는 `devices.health`의 범위를 토큰 소유자에게 허용된 장치로 제한하고, 사용자가 Cacti 영역 18 또는 19를 보유한 경우에만 `logging.recent_errors`를 포함하며, `filesystem.rrd_files`는 제외하고, 장치 범위가 지정된 `filesystem.rrd_stale`은 **Doctor Operator** 또는 **Doctor Administrator**에게만 포함합니다.

## 요구 사항

| Cacti | PHP | 비고 |
|---|---|---|
| 1.2.20 | 5.4 이상 | Doctor 자체 코드는 업그레이드 전에 레거시 시스템을 진단할 수 있도록 PHP 5.4와 호환됩니다 |
| 1.2.31 | 8.0 이상 | Cacti의 `composer.json`은 `>=8.0`을 요구합니다 |
| 현재 1.2.x | 8.2 이상 | Cacti의 `composer.json`은 `>=8.2`를 요구합니다 |
| `develop` (1.3) | 8.3 이상 | Cacti의 `composer.json`은 `^8.3`을 요구합니다 |

**PHP compatibility with installed Cacti** 행은 실행 중인 PHP 버전을 Cacti 자체 루트 `composer.json`의 PHP 요구 사항(`^8.3`과 같은 캐럿 제약의 상한 포함)과 비교합니다. 구성된 PHP CLI 실행 파일도 동일한 요구 사항에 따라 검사됩니다. Doctor는 이러한 Cacti 패키지에서 사용하는 `>=` 및 `^` 제약 형식을 인식합니다. 요구 사항을 읽을 수 없거나, 형식이 잘못되었거나, 누락되었거나, 인식할 수 없는 경우 경고가 발생합니다. 매니페스트가 없는 Cacti 1.2.20–1.2.30 설치 환경은 문서화된 PHP 5.4 설치 프로그램 최소 기준을 유지합니다. Doctor 자체의 PHP 5.4 호환성이 최신 Cacti 설치 환경과의 호환성을 보장하지는 않습니다.

**PHP upstream security support** 행은 별개의 질문에 답합니다. 즉, 해당 PHP 릴리스 브랜치가 PHP 프로젝트로부터 여전히 보안 수정을 제공받고 있는지 확인합니다. 이 행은 해당 브랜치의 게시된 보안 지원 종료일을 보고하고, 그 날짜가 지나면 경고를 표시합니다. 예를 들어, PHP 8.1은 이전 Cacti 설치 환경의 런타임 요구 사항을 충족할 수 있지만 더 이상 업스트림 보안 수정을 받지 못합니다. 통과 결과는 설치된 패치 릴리스가 최신임을 의미하지 않으며, Doctor는 OS 공급업체가 백포트된 수정을 제공하는지 여부를 판단할 수 없습니다.

지원 날짜는 2026-11-08에 마지막으로 확인된 [PHP 지원 일정](https://www.php.net/supported-versions.php) 및 [지원 종료 목록](https://www.php.net/eol.php)을 기준으로 Doctor에 번들로 포함되어 있습니다. 알 수 없는 브랜치와 시험판(prereleases)은 통과로 간주하지 않고 경고를 생성합니다. 진단 중에는 네트워크 요청이 발생하지 않습니다. PHP가 새 일정을 게시하면 Doctor의 지원 데이터를 업데이트하세요. 기존 JSON/모니터링 ID인 `php.version`과 `php.security_baseline`은 변경되지 않습니다.

## 개발

단위 테스트 스위트는 Pest를 사용하고 정적 분석은 PHPStan(레벨 6)을 사용하며, 둘 다 PHP 8.2 이상에서 실행됩니다:

```console
composer install
composer phpstan
composer test
```

테스트는 Doctor가 호출하는 Cacti 함수를 `tests/CactiStubs.php`의 작은 대역(stand-ins)으로 대체하므로 Cacti 설치 없이도 실행됩니다.

GitHub Actions는 모든 푸시와 풀 리퀘스트에서 다섯 가지 종류의 검사를 실행합니다:

- 릴리스 패키징 계약 테스트(`tests/test_release.py`) 및 아카이브 빌드(`tools/build_release.py`).
- `locales/build_gettext.sh --check` 실행(오래된 번역 템플릿, 불완전하거나 fuzzy 상태인 카탈로그, 또는 소스와 다른 컴파일된 카탈로그가 있으면 실패함).
- PHP 5.4, 5.6, 7.0, 7.1, 7.4 및 8.0부터 8.4까지에서 모든 PHP 파일에 대해 `php -l` 실행.
- PHP 8.2, 8.3 및 8.4에서 `composer phpstan`(PHPStan 레벨 6) 및 `composer test`(Pest 단위 테스트 스위트) 실행.
- cmd.php와 Spine을 모두 사용하여 MySQL 및 MariaDB 환경에 Cacti 1.2.20, 현재 1.2.x 브랜치 및 `develop`을 설치하는 7개의 통합 작업 실행. 각 작업은 플러그인을 설치 및 활성화하고, 전체 CLI 보고서를 실행하며, 보고서 스키마, 요약 합계, 예상 상태 및 정확한 실패 집합을 확인합니다. 그런 다음 바이너리 경로와 폴러 타임스탬프를 손상시켜 둘 다 보고되는지 확인한 뒤 복원하고, 복구 및 확인 절차를 테스트하며, 비활성화, 활성화, 제거 및 재설치를 실행합니다. 작업이 실패하면 JSON 보고서가 아티팩트로 보관됩니다.

## 기여하기

Pull Request는 `develop` 브랜치로 보냅니다. 프로덕션 파일은 PHP 5.4와 호환되도록 유지하고, 탭, 작은따옴표 문자열, 그리고 `read_config_option()` 및 `db_fetch_cell()`과 같은 Cacti 헬퍼를 사용하는 Cacti 스타일을 따릅니다. 동작을 변경할 때마다 단위 테스트를 추가하고, 커밋에 서명(`git commit -s`)하며, `CHANGELOG.md`에 한 줄을 추가하세요.

### 번역

사용자에게 표시되는 모든 메시지는 `__('...', 'doctor')`(또는 `__n()`, `__x()`, `__esc()`)로 감싸고, 값을 포함하는 문장은 조각을 연결하는 대신 순차적인 `%s`/`%d` 자리 표시자가 있는 단일 형식 문자열로 작성하세요. Cacti의 `__()`는 형식 지정자가 포함된 경우에만 메시지를 서식 지정하며 위치 기반 `%1$s` 형태를 지원하지 않습니다. 또한 서식 지정 전에 `%%`를 `%`로 변환하므로 메시지에 리터럴 퍼센트 기호를 넣지 마세요. 기호가 포함된 값을 인수로 전달하세요(`__('Usage: %s', '50%', 'doctor')`). 로그 라인은 영어로 유지합니다. 복구 텍스트에는 `doctor_repair_message()`를 사용하고, 로그에 기록되며 표시되는 위치에서만 번역되는 메시지에는 `doctor_n_()`을 사용하세요. 검사 ID, JSON 키, 상태 키워드, 모니터링 출력 및 로그 라인은 번역하지 마세요.

`locales/build_gettext.sh`는 템플릿 `locales/po/cacti.pot`을 재생성하고, 이를 각 카탈로그 `locales/po/<locale>.po`에 병합한 뒤, `locales/LC_MESSAGES/<locale>.mo`를 컴파일합니다. 이 세 가지를 모두 커밋하세요. CI는 `sh locales/build_gettext.sh --check`를 실행하며, 템플릿이 오래되었거나 카탈로그에 누락된 항목 또는 fuzzy 항목이 있는 경우, 자리 표시자가 다른 경우, 또는 컴파일된 파일이 최신 상태가 아닌 경우 실패합니다. 따라서 메시지를 변경하면 동일한 Pull Request에서 해당 번역도 함께 업데이트해야 합니다. 이 작업에는 GNU gettext(`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`)가 필요합니다. 새 언어를 추가할 때는 Cacti의 로캘 명명 규칙에 따라 새 `<locale>.po` 파일을 생성하세요(예: `pt-BR`).

## 보안

취약점은 공개 이슈가 아닌 [SECURITY.md](../../../SECURITY.md)에 설명된 절차에 따라 비공개로 보고해 주세요.

## 라이선스

Copyright (C) 2026 Thomas Vincent. GNU General Public License 버전 2 이상에 따라 배포됩니다. 자세한 내용은 [LICENSE](../../../LICENSE)를 참조하세요.
