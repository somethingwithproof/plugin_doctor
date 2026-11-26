<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: 聴診器をつけたサボテン。診断。修復。監視。">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Quality Gate のステータス"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="ライセンス: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ および 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor は、インストール環境を一度に診断し、管理者が要求した場合にのみ小規模な修復を適用する Cacti プラグインです。

**ステータス: 開発中（1.0 未満）。** 最新リリースは [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1) です。このパッチでは、0.6.0 のロールスコープのアクセス制御、ガイド付き診断、スコープ付き RRD 鮮度チェック、修復プレビューと監査履歴、承認済み警告の例外、および翻訳に加えて、ヒンディー語とアラビア語のカタログおよび翻訳済みユーザーガイドが追加されています。詳細は [CHANGELOG.md](../../../CHANGELOG.md) をご覧ください。

## スクリーンショット

PHP 8.3.36 上で動作する隔離された Cacti 1.2.31 デモンストレーション環境における診断およびスケジュール設定の画面です（Cacti PHP 互換性、アップストリームのセキュリティサポート、データベース健全性チェックを含みます）。ここに表示されている警告および失敗は、そのデモ環境の状態を示しています。

![合格、警告、失敗の結果を示す Doctor 診断テーブル](../../screenshots/diagnostics.png)

![Doctor のスケジュール、アラート、しきい値設定](../../screenshots/settings.png)

Cacti の問題は通常、空のグラフ、停止したポーラー、インストールできないプラグインといった症状として現れます。その原因は多くの場合、CLI ビルドでの PHP 拡張機能の欠落、ポーラーが書き込めないログディレクトリ、誤ったバイナリを指している RRDtool パス、タイムゾーンテーブルのないデータベースなど、前提条件のずれにあります。Doctor はこれらの前提条件を直接チェックし、検出した内容を説明する一文を添えて、各項目を合格（pass）、警告（warn）、または失敗（fail）として報告します。同じレポートは、Web ページ、コマンドライン、および監視用の JSON として利用できます。

## チェック項目

| 領域 | チェック内容 |
|---|---|
| Doctor | Doctor 自体が root として実行されているかどうか（root で実行すると、権限チェックが誤ったアカウントを対象にしてしまいます） |
| Cacti と PHP | Cacti のバージョン、インストーラーが完了しなかったアップグレード、ファイルが欠落している有効なプラグイン、インストール済み Cacti パッケージとの PHP 互換性、PHP アップストリームのセキュリティサポート状況 |
| PHP 拡張機能 | Web 版 PHP およびポーラーが使用する CLI 版 PHP における必須拡張機能と推奨機能 |
| PHP 設定 | Cacti 独自の推奨値に基づく `memory_limit`、`max_execution_time`、および `date.timezone` |
| データベース | 接続性、Cacti の推奨値に対するサーバーバージョン、UTF-8 文字セット、タイムゾーンテーブル、コアテーブル、PHP ホストとのクロックのずれ、および Cacti がエラーとしてフラグを立てる InnoDB 設定 |
| データベース健全性 | 接続容量、バッファー読み取り、ディスク一時テーブル、接続スレッドの作成、スローステートメント、および InnoDB ログバッファー待機（ワークロードに応じたチューニング提案付き） |
| ファイルシステム | 書き込み可能なキャッシュ、ログ、および RRA ディレクトリ、RRD ファイル用の空き容量、RRD ファイルがないかファイル更新が遅延している有効なデータソース、すべてのユーザーから読み取り可能（world-readable）になっていない `include/config.php`、書き込み可能で肥大化していない Cacti ログ |
| バイナリ | PHP CLI、RRDtool、`snmpget`、`snmpwalk`、および設定されたポーラーである場合の Spine（Cacti がバージョンを指定している場合はそのバージョンを含む） |
| ログ | 最新の Cacti ログ行に含まれるエラー（最も頻度の高いメッセージを含む） |
| デバイス | ダウン中または復旧中の有効なデバイス、最も長くダウンしている上位 3 台とその最後のエラー、およびほとんどのデバイスが同時にダウンしている場合の失敗判定 |
| ポーラー | ポーラーの種類と間隔、メインポーラーが最後に完了してからの経過時間、間隔に対する実行時間、RRD ファイルに到達しなかったポーラー出力、報告を停止したリモートポーラー、停止した Boost、および別のデータベースを指している Spine 設定 |

すべてのチェックには `database.timezone` や `binary.rrdtool` のような安定した ID が割り当てられているため、スクリプトで個別の結果をキーとして参照できます。

## コードとテストの対応表

| 動作 | 実装 | このリポジトリ内のテストエビデンス |
|---|---|---|
| 診断チェックと安定したレポート ID | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php)、[AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| ロールスコープのアクセス制御と墨消し済み Web レポート | [doctor_access.php](../../../doctor_access.php)、[doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php)、[WebAccessTest.php](../../../tests/WebAccessTest.php) |
| ガイド付き症状調査 | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| RRD 鮮度と遅延書き込みの処理 | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| 修復プレビュー、監査履歴、承認済み警告 | [doctor_workflows.php](../../../doctor_workflows.php)、[doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| スケジュール済みチェックとアラート遷移 | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php)、[WorkflowTest.php](../../../tests/WorkflowTest.php) |

これらの参照は実装とテストカバレッジを示すものであり、現在のリビジョンですべての CI ジョブが合格したことを示すものではありません。デプロイ予定のリビジョンについては、ワークフローの実行結果をご確認ください。

## データベース健全性のアドバイス

Doctor のネイティブ PHP アナライザーは、Cacti の既存のデータベース接続を通じて、固定セットのグローバル MySQL または MariaDB カウンターを読み取ります。レポートごとに 2 つの読み取り専用クエリを実行するだけで、追加の認証情報や実行ファイルを必要とせず、データベース設定を変更することもありません。これらのチェックは、Web レポート、CLI、JSON、監視出力、サポートバンドル、およびスケジュール済みステータス追跡に表示されます。

| チェック ID | 調査トリガー |
|---|---|
| `database.health_sample` | 起動または `FLUSH STATUS` から 24 時間未満、または稼働時間が取得できない／一貫性がない |
| `database.connection_capacity` | 現在または記録されたピーク接続数が現在の `max_connections` の 80% 以上 |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` が 1% 以上、かつ読み取りリクエストが 10,000 以上 |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` が 25% 以上、かつ一時テーブルが 1,000 以上 |
| `database.thread_cache` | `Threads_created / Connections` が 5% 以上、かつ接続試行が 1,000 以上で `thread_handling=one-thread-per-connection` の場合 |
| `database.slow_queries` | `Slow_queries / Queries` が 1% 以上、かつステートメントが 1,000 以上 |
| `database.redo_log_waits` | `Innodb_log_waits` がゼロ以外 |

これらは Doctor の調査用しきい値であり、ベンダーの設定目標値ではありません。接続容量を除き、累積値に基づくアドバイスには上記の観測ウィンドウが必要です。欠落、不正な形式、重複、または過大なカウンター、不十分なアクティビティ、および未対応のスレッドモードがある場合は、正常判定やチューニング推奨ではなく警告が生成されます。**Alert on Warnings** が有効になっている場合、警告は Nagios のステータスやスケジュール済みアラートに影響を与える可能性があります。

測定されたカウンターと提案はあわせて確認してください。累積値は現在の負荷を示すものではなく、カウンターごとにリセット履歴が異なる可能性があり、アトミックなスナップショットでもありません。ピーク接続数は古い上限値を反映している場合があります。スロークエリ数は `long_query_time` に依存し、MySQL のディスク一時テーブルカウンターにはメモリマップドファイルが含まれないことがあります。比率が低くてもボトルネックがないことの証明にはなりません。バッファーや接続上限を変更する前に、代表的なワークロード下で傾向を確認し、クエリプランと接続の再利用を見直し、**データベースホスト**上のメモリを測定してください。

メトリクスが利用できない場合は、サーバーのサポート状況と、Cacti アカウントに `SHOW GLOBAL STATUS` および `SHOW GLOBAL VARIABLES` へのアクセス権があるかを確認してください。Doctor は昇格された認証情報を要求しません。カウンターの定義は [MySQL ステータス変数リファレンス](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) および [MariaDB ステータス変数リファレンス](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables) に準拠しています。MySQLTuner のスクリプトやコードは使用していません。

スキーマや設定のマイグレーションは不要です。プラグインファイルを通常どおりデプロイしてください。ファイルを元に戻すと追加された診断機能も削除されます。既存のスケジュール済み状態は次回の実行時に更新されます。

## 安全性を保つ仕組み

診断ツールはポーラーまたは Web サーバーの権限で実行され、設定テーブルからパスを読み取るため、実行および変更する内容には慎重である必要があります。

- 診断は読み取り専用です。ファイル、設定、またはデータを変更することはありません。
- Doctor は、設定されたバイナリのファイル名が想定されるプログラム（`php`、`rrdtool`、`snmpget`、または `snmpwalk`）と一致する場合にのみ実行します。そうでなければ、設定テーブルに書き込めるユーザーなら誰でも Doctor が実行する内容を選べてしまうためです。それ以外の名前は警告として報告され、実行されません。
- Doctor は設定されたバイナリを root として実行することは決してなく、root として実行されている場合はその旨を報告します。
- 修復処理は固定の許可リストから実行されます。各修復には Web UI での認証済み管理者操作、または CLI での `--yes` が必要であり、各実行内容は Cacti ログに記録されます。

## リリース

バージョンは SemVer に従い、プラグインの `INFO` ファイルと一致します。バージョンの選択、CI ゲート、パッケージ内容、チェックサム、およびロールバック手順については、
[リリースプロセス](../../releasing.md)を参照してください。

## インストール

[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases) から `doctor-VERSION.tar.gz` または `doctor-VERSION.zip` と `SHA256SUMS` をダウンロードします。
アーカイブの SHA-256 チェックサムを検証してから、中の `doctor/` ディレクトリを
Cacti の `plugins/` ディレクトリに展開します。これらがインストール可能なパッケージであり、GitHub が自動生成する
ソースアーカイブはディレクトリ名が異なります。`develop` ブランチの未リリース版を実行するには、
ソースのチェックアウトからインストールしてください。

ソースチェックアウトの場合:

Cacti インストールディレクトリ内の `plugins/doctor` としてリポジトリをクローンまたは展開します。ディレクトリ名は `plugin_doctor` ではなく `doctor` にする必要があります。

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

**Configuration > Plugin Management** から **Cacti Doctor** をインストールして有効にし、Cacti のユーザー権限またはグループ権限から **Doctor Viewer**、**Doctor Operator**、または **Doctor Administrator** のレルムを付与します。アップグレード後も、既存の **Cacti Doctor** の権限付与は Administrator アクセスを維持します。レポートは **Utilities > Cacti Doctor** に表示されます。

## 言語

Doctor には、`locales/po/` および `locales/LC_MESSAGES/` 配下に、Broad Tier 1（`ar-SA`、`de-DE`、`es-ES`、`es-419`、`fr-FR`、`hi-IN`、`id-ID`、`it-IT`、`ja-JP`、`ko-KR`、`nl-NL`、`pl-PL`、`pt-BR`、`ru-RU`、`sv-SE`、`tr-TR`、`uk-UA`、`vi-VN`、`zh-CN`、`zh-TW`）、アフリカ（`af-ZA`、`am-ET`、`ar-EG`、`ar-MA`、`fr-MA`、`fr-SN`、`ha-NG`、`ig-NG`、`mg-MG`、`rw-RW`、`so-SO`、`sw-KE`、`xh-ZA`、`yo-NG`、`zu-ZA`）、およびアジア（`bn-BD`、`fa-IR`、`he-IL`、`mr-IN`、`ms-MY`、`ta-IN`、`te-IN`、`th-TH`、`ur-PK`、`fil-PH`）の各ロケールを対象とする 45 種類の英語以外の翻訳カタログが同梱されています。言語サポートが有効になっており（**Configuration > Settings > General > Language Support**）、Cacti が言語セレクターで公開しているロケールをユーザーが選択すると、カタログが Cacti に表示されます。Cacti のセレクターにまだ一覧表示されていないロケールのカタログは、Cacti 側で追加された時点で有効になります。Web ページ、設定、およびコマンドラインが出力するメッセージとレポートテキストは Cacti の言語設定に従います。コマンドラインのレポート自体は Cacti のデフォルト言語を使用するため、変更しない限り英語のままになります。

機械可読な出力は翻訳されません。スクリプトや監視がどの言語でも動作し続けるよう、チェック ID、JSON のキーとステータス値、`--format=nagios` および `--format=prometheus` の出力、ログ行、サポートバンドルのセクション見出しは英語のままとなります。JSON レポートで翻訳されるのは、各チェックの `summary` と `detail` テキストのみです。

ラテンアメリカスペイン語のカタログ（`es-419`）も同梱されていますが、Cacti 1.2 および Cacti 1.3 のいずれにも選択できるラテンアメリカスペイン語のロケールがないため、Cacti が対応を追加したときにのみ有効になります。それまではスペイン語（`es-ES`）を選択してください。

Cacti は 1.2.x と 1.3 の両方で、テキストドメインとして `doctor` を使用し、`plugins/doctor/locales/LC_MESSAGES/<locale>.mo` からプラグインのカタログを読み込みます（1.3 では設定可能なプラグインパスを通じてプラグインディレクトリを解決します）。

## アクセスレベル

| レルム | 機能 |
|---|---|
| Doctor Viewer | 最新のスケジュールチェックのステータス、観測時刻、鮮度、および直近の集計履歴を閲覧します。診断コマンド、生の詳細情報、設定、修復は行えません。 |
| Doctor Operator | 120 秒のプロセス制限付きで診断レポートを実行し、機密情報がマスクされた詳細を確認し、検出事項を確認済み（acknowledge）としてマークします。設定変更や修復は行えません。 |
| Doctor Administrator | Operator の機能に加え、既存の許可リストに基づく修復および Doctor の設定を行えます。修復と設定には Cacti の Settings/System Utilities レルムも必要です。 |

Utilities メニューからは、グループによる付与を含め、ユーザーに付与された最も高い Doctor レルムのページが開きます。新しい Viewer および Operator レルムには自動付与はありません。元のレルム ID は Administrator として `doctor.php` に引き続き紐付けられており、既存のユーザーおよびグループのアクセス権が維持されます。

Viewer 向けのデータはスケジュールチェックから取得されます。Viewer アクセス権を付与する前にスケジュール実行を有効にしてください。観測結果が欠落している場合や期限切れの場合は **unknown** と表示され、正常（healthy）と表示されることはありません。履歴には直近 20 件のスケジュール集計カウントが保持され、デバイスステータスは除外されます。Operator は新しい診断を明示的に開始し、通常のページ更新ではセッション内の最後のレポートが使用されます。

デバイスの詳細と合計数には、現在のユーザーのデバイス権限が適用されます。ログの抜粋には、さらに Cacti の Log Administration レルムが必要です。機密情報は、診断の詳細が Web セッションに保存される前、または描画される前にマスクされます。CLI アクセスは引き続き OS アカウントによって制御されます。

確認済みマーク（acknowledgment）はユーザー個人に紐付き、Cacti ログに記録されます。同じ検出事項と根拠に対してのみ適用され、根拠が変化した場合は再度確認済みマークを付ける必要があります。これにより pass/warn/fail のステータスが変更されたり、アラートが抑制されたり、失敗しているチェックが正常扱いになったりすることはありません。これは、観測されたステータスを変更せずにアラートポリシーに影響を与える「承認済み警告（accepted-warning）例外」とは別の機能です（後述）。

すべての操作には POST リクエストと有効な CSRF トークンが必要です。修復を実行する際は、送信を行わないキャンセルリンクを備えた別の確認ページが表示され、実行ユーザーと結果が Cacti ログに記録されます。

## コマンドライン

root ではなく Cacti ポーラーユーザーとして、Cacti のルートディレクトリから以下を実行します:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

テキスト出力では、ステータス、カテゴリ、概要、および詳細を含む行がチェックごとに 1 行ずつ出力されます。`--json` では、ステータスカウントを含む `summary` オブジェクトと、`id`、`category`、`status`、`summary`、`detail`、さらに許可リストの修復が適用可能な場合は `repair`/`repairable` を持つエントリを含む `checks` 配列が出力されます。

| 終了ステータス | 意味 |
|---|---|
| `0` | 失敗したチェックがない、または要求された修復が成功しました。警告（Warning）は終了ステータスを変更しません。 |
| `1` | 少なくとも 1 つのチェックが失敗した、または要求された修復が成功しませんでした。 |
| `2` | 使用法エラー: `--yes` なしでの修復実行（`--preview` には不要）、不明な修復 ID、不明な出力形式、サポートされていない `--symptom` と形式の組み合わせ、または Cacti インストール先を特定できない場合。 |

Cacti はすべての CLI スクリプトで `memory_limit` を引き上げるため、PHP ランタイム設定チェックは Web ページでのみ意味を持ちます。

## スケジュールチェックとアラート

**Configuration > Settings > Doctor** で **Run Checks on a Schedule** を有効にし、15 分から 1 日までの間隔を選択します。実行予定時刻に達したポーラーサイクルの後、Doctor はバックグラウンドプロセスですべてのチェックを実行するため、ポーラー自体の実行時間には影響しません。

各実行では、すべてのチェックの観測ステータスが記録されます。有効な警告例外は、その観測結果を変更せずにアラートポリシーに影響します。チェックが失敗状態になったとき、または失敗状態から復旧したとき、Doctor はその変化を Cacti ログに書き込み、**Alert Email Addresses** が設定されている場合は Cacti のメール設定を使用してそれらのアドレスにメールを送信します。**Alert on Warnings** を有効にすると、警告状態への移行および警告状態からの復旧も通知対象に加わります。初回実行時はベースラインの記録のみを行います。

スケジュールレポートはプライマリポーラー上でデータベースアドバイザリロックのもとで実行され、ワーカーの制限時間は 2 分間です。Doctor は最終開始時刻と正常完了時刻を報告するため、結果の欠落や古くなった状態を把握できます。結果は、設定間隔に 1 ポーリングサイクルと 3 分を加えた期間内であれば最新とみなされます。完了しなかった実行は、通常の間隔に達するまで 5 分、10 分、20 分と間隔を延ばしながら再試行されます。失敗したアラート送信は、遅延を増やしながら最大 3 回まで再試行するために保持されます。それ以降は、Cacti のメール設定を修正し、ポーラーユーザーとして `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` を実行してください。メールサーバーでの受理は受信トレイへの到達を保証するものではありません。

同じタブでは、ポーラー実行時間（間隔の 80%）、RRA 空きディスク容量（10% 未満で警告、2% 未満で失敗）、データベース時刻のずれ（5 秒超で警告、60 秒超で失敗）、および Cacti ログサイズ（100 MB）のしきい値も設定できます。空または無効な値を指定した場合は、これらのデフォルト値が使用されます。

## 監視連携

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` はパフォーマンスデータを含む 1 行のステータスを出力し、`0`（OK）、`1`（WARNING）、または `2`（CRITICAL）で終了するため、Nagios、Icinga、または互換性のあるシステムから直接実行できます。`--format=prometheus` は node_exporter の textfile collector 向けの Prometheus テキスト形式を出力します。チェックごとの `cacti_doctor_check_status`（0: 合格または承認済み警告、1: 対応が必要な警告、2: 失敗）、例外適用前の `cacti_doctor_check_observed_status`、`cacti_doctor_check_accepted`、ステータスごとの `cacti_doctor_checks`、および `cacti_doctor_last_run_timestamp_seconds` が含まれます。JSON のチェック行には `assessment` フィールドが含まれており、`not_assessed` は利用可能なデータからチェックが結論を出せなかったことを意味します。

## サポートバンドル

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

バンドルは 1 つのテキストファイルで、Doctor、Cacti、PHP、OS、およびデータベースのバージョン、ポーラーと Boost の統計情報、完全なレポート、Cacti ログの末尾 200 行が含まれます。password、secret、token、community、key の各名前に続く値はマスクされます。Doctor は所有者のみが読み取れる権限でファイルを作成し、既存のファイルへの上書きは拒否します。外部に投稿する前に内容を確認してください。

## 修復ポリシー

Doctor には 1 つの修復機能 `runtime_directories` が含まれています。不足している Cacti ランタイムディレクトリを作成し、既存の権限を削除せずに所有者の読み取り・書き込み・実行ビットを追加します。

Cacti 1.3 では `$cache_path`、`$log_path`、`$rra_path` を対象とし、それ以外の場合はインストールの `cache`、`log`、`rra` ディレクトリを対象とします。すでに書き込み可能なディレクトリはスキップし、Cacti インストール外のディレクトリ（`/var/log` 配下のログディレクトリなど）は拒否し、シンボリックリンクも拒否し、root としての実行も拒否します。`path_cactilog` には決して従わないため、コードディレクトリ内に設定されたログファイルによって修復処理がそこへ誘導されることはありません。なお、診断ではすべてのリリースで設定済みログファイルのディレクトリを引き続きチェックします。

所有権の変更、シェルコマンドの実行、設定の書き換え、Cacti アプリケーションデータの変更は行いません。新しい修復機能を追加する場合は、それぞれに診断、許可リストに登録されたハンドラー、確認手順、監査ログ、およびテストを含める必要があります。

## 症状の調査

オペレーターおよび管理者は、Doctor ページで **症状を調査** を選択できます。同じルールは `--symptom=graphs_stopped`、`slow_polling`、`devices_missing`、または `alerts_missing` を通じてテキストまたは JSON 出力でも利用できます。サポートバンドルには関連する症状調査が含まれます。

各候補には、観測されたチェック項目と次の検証ステップがリストされます。候補は仮説であり、確定した根本原因ではありません。欠落、未評価、または古い観測結果が原因を確定させることはありません。Web 調査では権限でフィルタリングされたレポートを使用し、CLI レポートではオペレーティングシステムアカウントのアクセス権を使用します。

## RRD 更新の鮮度

`filesystem.rrd_stale` は、無効化されたデバイスおよびダウンしているデバイスを除き、最大 500 個のアクティブなデータソースをチェックします。大規模なインストールではサンプルが 1 時間ごとに変わるため、繰り返し実行すると異なるファイルが対象になります。ファイルの更新時刻を、ポーラー間隔、ソース RRD ステップ、およびプロファイルステップのうち最大の値に **RRD 古い間隔**（デフォルトは 3）を掛けた値と比較します。最も古い 3 つのファイルと影響を受けるデバイス数を表示します。Web の結果には許可されたデバイスのみが含まれます。

`filesystem.rrd_files` は別の存在チェックです。無効化されたデバイスやダウンしているデバイス上のものも含め、最大 5,000 個のアクティブなデータソースの RRD ファイルを確認し、同じ 1 時間ごとのサンプルを使用します。

Boost は設定されたフラッシュ間隔の 2 倍をディスク書き込み許容時間として追加します。別の遅延ライターを使用する場合は、**遅延 RRD 書き込み許容時間 (秒)** を設定してください。許容時間の設定なしで `RRDCACHED_ADDRESS` が通知されている場合や、Boost 間隔が無効な場合は、未評価の結果になります。Doctor はこのチェックを実行するためにキャッシュをフラッシュすることは決してありません。更新時刻はディスクアクティビティの証拠であり、データ収集の成功を証明するものではありません。Doctor が検出できない外部キャッシュは明示的に設定する必要があります。

欠落ファイル、読み取り不可ファイル、および未来の日付のファイルは詳細にカウントされます。サンプリングされたファイルが 1 つも読み取れない場合のみ、結果は未評価になります。サンプリングされた結果では、インストールの一部のみを対象としていることが示され、合格してもサンプリングされていないファイルは対象外です。

## 修復プレビューと監査履歴

管理者用の修復ページには、影響を受ける各パス、提案されるアクション、現在の権限、および目標の権限が表示されます。承認はそのプレビュー、操作ユーザー、および 5 分間の有効期限に紐付けられます。確認を行うとプレビューは消費され、ファイルシステムが変更された場合は別のプレビューが必要になります。root での実行、インストール外のパス、修復が必要なリンク、および満たされていないファイルシステム権限がある場合は承認できません。

`--repair=runtime_directories --preview` は読み取り専用の JSON プランを出力します。`--repair=runtime_directories --yes` は新しく計算された CLI プランを承認し、実行前に再チェックします。CLI アカウントはすでにインストールを修復する権限を持っている必要があり、Web ロールは継承しません。

ファイルシステムを変更する前に、構造化された `repair.started` レコードが保存される必要があります。関連付けられた `repair.completed` レコードには、修復後のスナップショットと検証結果が含まれます。中断された操作では、調査用に開始レコードが残されます。ファイルシステムの変更が行われた場合でも、完了監査の失敗は失敗として報告されます。Doctor は所有者の権限を追加してディレクトリを作成しますが、自動ロールバックは試みません。

Cacti の Settings/System Utilities 権限を持つ管理者は、Doctor ページで最新の 20 件の監査エントリを閲覧できます。プラグインは `plugin_doctor_audit` に最新の 200 件のレコードを保持し、Cacti ログにもその ID、アクション、および実行者が記録されます。監査ペイロードは墨消し（リダクション）されます。

## 承認済み警告

Cacti の Settings/System Utilities 権限を持つ管理者は、Doctor ページで最新の評価済み警告から **警告の例外** を作成できます。例外には、所有者、理由、および 90 日以内の UTC レビュー日が必要です。その日付の開始時刻である UTC 午前 0 時に期限切れになります。最大 100 個の例外を設定できます。一覧には期限切れのエントリや現在のレポートに存在しない ID が表示され、削除も可能です。

観測された警告は引き続き表示され、診断詳細にその所有者、理由、および有効期限が含まれます。JSON は観測されたステータスを保持し、`accepted` および `acceptance` メタデータを追加します。Nagios はアクティブな承認済み警告を終了重大度から除外しますが、出力には名前を記載します。Prometheus は観測された重大度と対処可能な重大度の両方をエクスポートします。通常の CLI 終了ステータスは変更されません（警告はすでに 0 で終了し、失敗は 1 で終了します）。

例外が適用されている間、スケジュールされた警告アラートは抑制されます。有効期限切れまたは削除により、継続している警告は再び警告アラートの対象になります。失敗への遷移および失敗からの回復は引き続きアラートの対象となります。未評価の結果や失敗は承認できません。個人的な確認（acknowledgment）は別個のものであり、何も抑制しません。例外の作成と削除は監査レコードとトランザクションで処理されます。

アップグレードでは、Cacti アプリケーションデータを変更することなく `plugin_doctor_audit` および `plugin_doctor_acceptance` が作成されます。アンインストールすると両方のプラグインテーブルとその設定が削除されるため、必要な履歴はアンインストール前にエクスポートしてください。プラグインファイルを元に戻すとテーブルは調査用に残りますが、古いバージョンでは警告の例外は適用されません。

## 要件

| Cacti | PHP | 備考 |
|---|---|---|
| 1.2.20 | 5.4 以降 | アップグレード前のレガシーシステムを診断できるよう、Doctor 自体のコードは PHP 5.4 互換です |
| 1.2.31 | 8.0 以降 | Cacti の `composer.json` は `>=8.0` を要求します |
| 現在の 1.2.x | 8.2 以降 | Cacti の `composer.json` は `>=8.2` を要求します |
| `develop` (1.3) | 8.3 以降 | Cacti の `composer.json` は `^8.3` を要求します |

**インストール済み Cacti との PHP 互換性** の行では、実行中の PHP バージョンを Cacti 自身のルート `composer.json` にある PHP 要件（`^8.3` などのキャレット制約の上限を含む）と比較します。設定された PHP CLI 実行可能ファイルも同じ要件に対してチェックされます。Doctor は、これらの Cacti パッケージで使用される `>=` および `^` 制約形式を認識します。読み取り不可、不正な形式、欠落、または認識できない要件の場合は警告が生成されます。マニフェストのない Cacti 1.2.20–1.2.30 インストールでは、ドキュメント化された PHP 5.4 インストーラー下限が維持されます。Doctor 自体の PHP 5.4 互換性は、新しい Cacti インストールとの互換性を確立するものではありません。

**PHP アップストリームのセキュリティサポート** の行は別の質問に答えます。つまり、その PHP リリースブランチが PHP プロジェクトから引き続きセキュリティ修正を受け取っているかどうかです。ブランチの公開されているセキュリティサポート終了日を報告し、その日付を過ぎると警告を出します。たとえば、PHP 8.1 は古い Cacti インストールのランタイム要件を満たしていても、アップストリームのセキュリティ修正を受け取らなくなっている場合があります。合格結果であっても、インストールされているパッチリリースが最新であることを意味するわけではなく、Doctor は OS ベンダーがバックポート修正を提供しているかどうかを判断できません。

サポート日は [PHP サポートスケジュール](https://www.php.net/supported-versions.php) と [サポート終了一覧](https://www.php.net/eol.php)（最終確認日: 2026-11-08）から Doctor に同梱されています。未知のブランチおよびプレリリースでは、合格とみなすのではなく警告が生成されます。診断中にネットワークリクエストは行われません。PHP が新しいスケジュールを公開したら、Doctor のサポートデータを更新してください。既存の JSON/監視 ID である `php.version` および `php.security_baseline` は変更されていません。

## 開発

ユニットテストスイートは Pest を使用し、PHP 8.2 以降で実行されます：

```console
composer install
composer test
```

テストは、Doctor が呼び出す Cacti 関数を `tests/CactiStubs.php` 内の小さなスタブに置き換えるため、Cacti インストールなしで実行できます。

GitHub Actions は、すべてのプッシュおよびプルリクエストで 4 種類のチェックを実行します：

- PHP 5.4、5.6、7.0、7.1、7.4、および 8.0 から 8.4 までの環境で、すべての PHP ファイルに対して `php -l` を実行します。
- PHP 8.2、8.3、および 8.4 でユニットテストスイートを実行します。
- `locales/build_gettext.sh --check` を実行し、古い翻訳テンプレート、不完全または fuzzy なカタログ、あるいはソースと異なるコンパイル済みカタログがある場合に失敗させます。
- MySQL および MariaDB に対して、cmd.php と Spine の両方で Cacti 1.2.20、現在の 1.2.x ブランチ、および `develop` をインストールする 7 つの統合ジョブを実行します。各ジョブはプラグインをインストールして有効化し、完全な CLI レポートを実行して、レポートスキーマ、サマリー合計、期待されるステータス、および正確な失敗セットをチェックします。その後、バイナリパスとポーラーのタイムスタンプを破損させ、両方が報告されることを確認して復元し、修復とその確認を実行し、さらに無効化、有効化、アンインストール、および再インストールを実行します。ジョブが失敗した場合、JSON レポートがアーティファクトとして保持されます。

## 貢献

プルリクエストは `develop` ブランチ宛てに送信してください。本番用ファイルは PHP 5.4 との互換性を維持し、Cacti のコーディングスタイル（タブ文字、シングルクォートの文字列、および `read_config_option()` や `db_fetch_cell()` などの Cacti ヘルパー関数の使用）に従ってください。動作の変更ごとにユニットテストを追加し、コミットにサインオフ（`git commit -s`）を行い、`CHANGELOG.md` に 1 行追記してください。

### 翻訳

ユーザーに表示されるすべてのメッセージは `__('...', 'doctor')`（または `__n()`、`__x()`、`__esc()`）で囲んでください。値を含む文では、断片を連結するのではなく、順番通りの `%s`/`%d` プレースホルダーを使用した単一のフォーマット文字列を指定してください。Cacti の `__()` はフォーマット指定子を含む場合にのみメッセージをフォーマットし、`%1$s` のような位置指定形式はサポートしていません。また、フォーマット前に `%%` を `%` に変換するため、メッセージ内にリテラルのパーセント記号を含めないでください。記号を含む値は引数として渡してください（`__('Usage: %s', '50%', 'doctor')`）。ログ行は英語のままにします。修復テキストには `doctor_repair_message()` を使用し、ログに記録され表示箇所でのみ翻訳されるメッセージには `doctor_n_()` を使用してください。チェック ID、JSON キー、ステータスのキーワード、監視出力、およびログ行は翻訳しないでください。

`locales/build_gettext.sh` はテンプレート `locales/po/cacti.pot` を再生成し、各カタログ `locales/po/<locale>.po` にマージして、`locales/LC_MESSAGES/<locale>.mo` をコンパイルします。これら 3 つをすべてコミットしてください。CI は `sh locales/build_gettext.sh --check` を実行し、テンプレートが古い場合、カタログにエントリの欠落や fuzzy エントリがある場合、プレースホルダーが異なる場合、またはコンパイル済みファイルが最新でない場合に失敗します。そのため、メッセージを変更した場合は、同じプルリクエスト内で翻訳も更新する必要があります。これには GNU gettext（`xgettext`、`msgmerge`、`msgfmt`、`msgunfmt`）が必要です。新しい言語を追加する場合は、Cacti のロケール命名規則に従った名前の新しい `<locale>.po`（例: `pt-BR`）を作成します。

## セキュリティ

脆弱性は公開 Issue ではなく、[SECURITY.md](../../../SECURITY.md) に記載されている手順に従って非公開で報告してください。

## ライセンス

Copyright (C) 2026 Thomas Vincent. GNU General Public License バージョン 2 以降の下で公開されています。詳細は [LICENSE](../../../LICENSE) をご覧ください。
