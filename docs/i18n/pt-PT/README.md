<!-- Source: README.md; SHA256: 490628bb7f70f4cf1a8c43b302246fd2e870725a6649c628762608b4a76db65b -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Bosanski](../bs-BA/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Hrvatski](../hr-HR/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Português (Portugal)](README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Српски](../sr-RS/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: um cato com um estetoscópio. Diagnosticar. Reparar. Monitorizar.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Estado do Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licença: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ e 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

O Cacti Doctor é um plugin do Cacti que diagnostica uma instalação numa única passagem e aplica pequenas reparações apenas quando um administrador o solicita.

**Estado: em desenvolvimento, antes da versão 1.0.** A versão mais recente é a [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Esta correção adiciona catálogos em hindi e árabe e guias de utilizador traduzidos ao acesso baseado em funções, diagnóstico guiado, verificações limitadas de atualidade RRD, pré-visualizações de reparação e histórico de auditoria, exceções de avisos aceites e traduções introduzidos na 0.6.0. Consulte [CHANGELOG.md](../../../CHANGELOG.md) para mais detalhes.

## Capturas de ecrã

Definições de diagnóstico e agendamento numa instalação isolada de demonstração do Cacti 1.2.31 com PHP 8.3.36, incluindo as verificações de compatibilidade PHP do Cacti, suporte de segurança oficial e estado da base de dados. Os avisos e falhas apresentados descrevem esse ambiente de demonstração.

![Tabela de diagnóstico do Doctor com resultados de aprovado, aviso e falha](../../screenshots/diagnostics.png)

![Definições de agendamento, alertas e limiares do Doctor](../../screenshots/settings.png)

Os problemas no Cacti surgem habitualmente sob a forma de sintomas: gráficos vazios, um poller parado ou um plugin que não instala. A causa é frequentemente um pré-requisito que se alterou, como uma extensão PHP em falta na compilação CLI, uma diretoria de registo onde o poller não consegue escrever, um caminho do RRDtool que aponta para o binário errado ou uma base de dados sem tabelas de fusos horários. O Doctor verifica esses pré-requisitos diretamente e comunica cada um como aprovado, aviso ou falha com uma frase explicativa do que encontrou. O mesmo relatório está disponível numa página web, na linha de comandos e em JSON para monitorização.

## O que verifica

| Área | Verificações |
|---|---|
| Doctor | Se o próprio Doctor corre como root, o que faria com que as verificações de permissões descrevessem a conta errada |
| Cacti e PHP | Versão do Cacti, uma atualização que o instalador nunca concluiu, plugins ativados cujos ficheiros estão em falta, compatibilidade do PHP com o pacote Cacti instalado, estado do suporte de segurança oficial do PHP |
| Extensões PHP | Extensões obrigatórias no PHP web e no PHP CLI utilizado pelo poller, bem como funcionalidades recomendadas |
| Configuração do PHP | `memory_limit`, `max_execution_time` e `date.timezone`, seguindo as recomendações do próprio Cacti |
| Base de dados | Conectividade, versão do servidor face à recomendação do Cacti, conjunto de carateres UTF-8, tabelas de fusos horários, tabelas principais, desvio do relógio em relação ao servidor PHP e as definições InnoDB que o Cacti sinaliza como erros |
| Estado da base de dados | Capacidade de ligações, leituras do buffer pool, tabelas temporárias em disco, criação de threads de ligação, instruções lentas e esperas no buffer de registo do InnoDB, com sugestões de afinação dependentes da carga de trabalho |
| Sistema de ficheiros | Diretorias de cache, registo e RRA com permissão de escrita; espaço livre para ficheiros RRD; fontes de dados ativas sem ficheiro RRD ou com atualizações em atraso; `include/config.php` sem leitura global; ficheiro de registo do Cacti com permissão de escrita e tamanho controlado |
| Binários | PHP CLI, RRDtool, `snmpget`, `snmpwalk` e Spine quando é o poller configurado, incluindo versões sempre que o Cacti indique uma |
| Registo | Erros entre as linhas mais recentes do registo do Cacti, destacando a mensagem mais frequente |
| Dispositivos | Dispositivos ativados em baixo ou a recuperar, os três que estão há mais tempo em baixo com o último erro, e uma falha quando a maioria dos dispositivos está em baixo em simultâneo |
| Poller | Tipo e intervalo do poller, tempo desde a última conclusão do poller principal, duração da execução face ao intervalo, saída do poller que nunca chegou a um ficheiro RRD, pollers remotos que deixaram de comunicar, um Boost bloqueado e uma configuração do Spine que aponta para outra base de dados |

Cada verificação possui um ID estável, como `database.timezone` ou `binary.rrdtool`, para que os scripts possam referenciar resultados individuais. Os plugins ativados podem contribuir com verificações adicionais e anexos para o pacote de suporte através do hook `doctor_register_checks`, e o Doctor expõe capacidades de diagnóstico só de leitura ao `plugin_mcp` através de `abilities_register`.

## Mapa de código e testes

| Comportamento | Implementação | Evidência de testes neste repositório |
|---|---|---|
| Verificações de diagnóstico e IDs estáveis de relatório | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [DatabaseHealthTest.php](../../../tests/DatabaseHealthTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Hook de verificações de plugins (`doctor_register_checks`) | [doctor_plugins.php](../../../doctor_plugins.php) | [PluginHooksTest.php](../../../tests/PluginHooksTest.php) |
| Capacidades de diagnóstico MCP (`abilities_register`) | [doctor_abilities.php](../../../doctor_abilities.php) | [AbilitiesTest.php](../../../tests/AbilitiesTest.php) |
| Acesso baseado em funções e relatórios web com dados ocultados | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Investigações guiadas de sintomas | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Atualidade RRD e tratamento de escritas diferidas | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Pré-visualizações de reparação, histórico de auditoria e avisos aceites | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Verificações agendadas e transições de alertas | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Estas referências identificam a implementação e a cobertura de testes; não garantem que todas as tarefas de CI tenham passado na revisão atual. Verifique a execução do workflow para a revisão que pretende implementar.

## Aconselhamento sobre o estado da base de dados

O analisador PHP nativo do Doctor lê um conjunto fixo de contadores globais do MySQL ou MariaDB através da ligação de base de dados existente do Cacti. Efetua duas consultas só de leitura por relatório, não requer credenciais nem executáveis adicionais e nunca altera a configuração da base de dados. Estas verificações surgem no relatório web, CLI, JSON, saída de monitorização, pacote de suporte e acompanhamento de estado agendado.

| ID de verificação | Critério de investigação |
|---|---|
| `database.health_sample` | Menos de 24 horas desde o arranque ou `FLUSH STATUS`, ou tempo de atividade indisponível/inconsistente |
| `database.connection_capacity` | Ligações atuais ou pico registado igual ou superior a 80% do `max_connections` atual |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` igual ou superior a 1%, com pelo menos 10 000 pedidos de leitura |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` igual ou superior a 25%, com pelo menos 1 000 tabelas temporárias |
| `database.thread_cache` | `Threads_created / Connections` igual ou superior a 5%, com pelo menos 1 000 tentativas de ligação e `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` igual ou superior a 1%, com pelo menos 1 000 instruções |
| `database.redo_log_waits` | `Innodb_log_waits` diferente de zero |

Estes são limiares de investigação do Doctor, não valores-alvo de configuração do fabricante. Com exceção da capacidade de ligações, o aconselhamento cumulativo requer a janela de observação indicada acima. Contadores em falta, malformados, duplicados ou excessivos, atividade insuficiente e modos de threads não suportados produzem avisos em vez de um veredito saudável ou de uma recomendação de afinação. Os avisos podem afetar o estado no Nagios e os alertas agendados quando **Alertar em avisos** está ativado.

Analise em conjunto os contadores medidos e a sugestão. Valores cumulativos não provam a carga atual; os contadores podem ter históricos de reposição diferentes e não constituem um instantâneo atómico. O pico de ligações pode refletir um limite anterior. As contagens de consultas lentas dependem de `long_query_time`, e o contador de tabelas temporárias em disco do MySQL pode omitir ficheiros mapeados em memória. Uma taxa baixa não prova a ausência de estrangulamento. Confirme tendências sob uma carga de trabalho representativa, reveja planos de consulta e reutilização de ligações, e meça a memória no **servidor de base de dados** antes de alterar buffers ou limites de ligações.

Se as métricas estiverem indisponíveis, verifique o suporte do servidor e o acesso da conta do Cacti a `SHOW GLOBAL STATUS` e `SHOW GLOBAL VARIABLES`; o Doctor não solicita credenciais elevadas. As definições dos contadores provêm da [referência de variáveis de estado do MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) e da [referência de variáveis de estado do MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Não é utilizado qualquer script ou código do MySQLTuner.

Não é necessária qualquer migração de esquema ou configuração. Instale os ficheiros do plugin normalmente; reverter esses ficheiros remove os diagnósticos adicionados. O estado agendado existente é atualizado na execução seguinte.

## Como se mantém seguro

Uma ferramenta de diagnóstico corre com os privilégios do poller ou do servidor web e lê caminhos da tabela de definições, pelo que tem de controlar rigorosamente o que executa e modifica.

- Os diagnósticos são só de leitura. Nunca alteram ficheiros, definições nem dados.
- O Doctor só executa um binário configurado quando o nome do ficheiro corresponde ao programa esperado (`php`, `rrdtool`, `snmpget` ou `snmpwalk`). Caso contrário, quem pudesse escrever na tabela de definições poderia escolher o que o Doctor executa. Qualquer outro nome é comunicado como aviso e não é executado.
- O Doctor nunca executa binários configurados como root e assinala quando está a correr como root.
- As reparações provêm de uma lista fixa de permissões. Cada uma exige uma ação autenticada de administrador na interface web ou `--yes` na CLI, e é registada no registo do Cacti.

## Lançamentos

As versões seguem SemVer e correspondem ao ficheiro `INFO` do plugin. Consulte o [processo de lançamento](../../releasing.md) para seleção de versões, controlos de CI, conteúdo dos pacotes, somas de verificação e instruções de reversão.

## Instalação

Transfira `doctor-VERSION.tar.gz` ou `doctor-VERSION.zip` e `SHA256SUMS` a partir de [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Verifique a soma de verificação SHA-256 do ficheiro comprimido e extraia depois a respetiva diretoria `doctor/` para a diretoria `plugins/` do Cacti. Estes são os pacotes instaláveis; os ficheiros automáticos de código-fonte do GitHub utilizam outro nome de diretoria. Para executar trabalho ainda não lançado do ramo `develop`, instale a partir de uma cópia do código-fonte.

Para instalações a partir do código-fonte:

Clone ou descompacte o repositório como `plugins/doctor` dentro de uma instalação do Cacti. A diretoria tem de chamar-se `doctor`, não `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Instale e ative o **Cacti Doctor** em **Configuração > Gestão de Plugins** e atribua depois o domínio **Visualizador do Doctor**, **Operador do Doctor** ou **Administrador do Doctor** através das permissões de utilizadores ou grupos do Cacti. As permissões existentes de **Cacti Doctor** mantêm o acesso de Administrador após a atualização. O relatório surge em **Utilitários > Cacti Doctor**.

## Idiomas

O Doctor inclui 48 catálogos de tradução noutras línguas em `locales/po/` e `locales/LC_MESSAGES/`, cobrindo as localidades Broad Tier 1 (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), africanas (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`), asiáticas (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`) e do Sudeste Europeu (`bs-BA`, `hr-HR`, `sr-RS`). O Cacti apresenta um catálogo assim que o suporte de idiomas está ativo (**Configuração > Definições > Geral > Suporte de Idiomas**) e o utilizador escolhe uma localidade exposta pelo Cacti no seletor de idioma; os catálogos para localidades ainda não listadas no seletor do Cacti entram em vigor mal o Cacti as adicione. A página web, as definições e as mensagens e textos de relatório apresentados na linha de comandos seguem o idioma do Cacti; o próprio relatório de linha de comandos usa o idioma predefinido do Cacti, que permanece em inglês salvo alteração.

A saída legível por máquina nunca é traduzida: IDs de verificação, chaves JSON e valores de estado, a saída de `--format=nagios` e `--format=prometheus`, linhas de registo e cabeçalhos de secção do pacote de suporte permanecem em inglês para que scripts e monitorização continuem a funcionar em qualquer idioma. Os campos `summary` e `detail` de cada verificação são a única parte traduzida do relatório JSON.

Inclui-se também um catálogo de espanhol da América Latina (`es-419`), mas nem o Cacti 1.2 nem o Cacti 1.3 dispõem de uma localidade para espanhol da América Latina, pelo que só terá efeito quando o Cacti a adicionar. Até lá, escolha espanhol (`es-ES`).

O Cacti carrega o catálogo de um plugin a partir de `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` com `doctor` como domínio de texto, tanto na 1.2.x como na 1.3 (a 1.3 resolve a diretoria de plugins através do respetivo caminho configurável).

## Níveis de acesso

| Domínio | Capacidades |
|---|---|
| Visualizador do Doctor | Consultar os estados mais recentes das verificações agendadas, hora de observação, atualidade e histórico agregado recente. Sem comandos de diagnóstico, detalhes em bruto, configuração ou reparações. |
| Operador do Doctor | Executar um relatório de diagnóstico com limite de processo de 120 segundos, inspecionar detalhes com dados ocultados e reconhecer ocorrências. Sem alterações de definições nem reparações. |
| Administrador do Doctor | Capacidades de Operador acrescidas da reparação da lista de permissões e das definições do Doctor. As reparações e definições exigem também o domínio Settings/System Utilities do Cacti. |

O menu Utilitários abre a página correspondente ao domínio Doctor mais elevado atribuído ao utilizador, incluindo atribuições via grupo. Os novos domínios Visualizador e Operador não recebem atribuições automáticas. O ID de domínio original permanece associado a `doctor.php` como Administrador, preservando o acesso existente de utilizadores e grupos.

Os dados do Visualizador provêm das verificações agendadas. Ative o agendamento antes de conceder acesso de Visualizador; observações em falta ou em atraso são apresentadas como **desconhecido**, nunca como saudáveis. O histórico retém as últimas 20 contagens agregadas agendadas e exclui o estado dos dispositivos. Os Operadores iniciam novos diagnósticos explicitamente; atualizações normais de página mostram o último relatório da respetiva sessão.

Os detalhes e totais de dispositivos respeitam as permissões de dispositivos do utilizador atual. Os excertos de registo exigem adicionalmente o domínio Log Administration do Cacti. Os segredos são mascarados antes de os detalhes de diagnóstico serem guardados na sessão web ou apresentados. O acesso CLI continua a ser regido pela conta do sistema operativo.

Os reconhecimentos são pessoais e ficam registados no registo do Cacti. Aplicam-se apenas à mesma ocorrência e evidência; evidências alteradas requerem novo reconhecimento. Nunca alteram o estado aprovado/aviso/falha, não suprimem alertas nem marcam uma verificação falhada como saudável. Isto é distinto das exceções de avisos aceites, que afetam a política de alertas sem alterar o estado observado e são descritas abaixo.

Todas as ações exigem POST e um token CSRF válido. As reparações apresentam uma página de confirmação separada com uma ligação Cancelar sem submissão, e registam no registo do Cacti o utilizador interveniente e o resultado.

## Linha de comandos

Execute estes comandos a partir da raiz do Cacti como o utilizador do poller do Cacti, e não como root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

A saída em texto imprime uma linha por verificação com o respetivo estado, categoria, resumo e detalhe. `--json` imprime um objeto `summary` com contagens por estado e um array `checks` cujas entradas incluem `id`, `category`, `status`, `summary`, `detail`, bem como `repair`/`repairable` quando se aplica uma reparação autorizada.

| Código de saída | Significado |
|---|---|
| `0` | Nenhuma verificação falhou, ou a reparação pedida foi bem-sucedida. Os avisos não alteram o código de saída. |
| `1` | Pelo menos uma verificação falhou, ou uma reparação pedida não teve sucesso. |
| `2` | Erro de utilização: uma reparação executada sem `--yes` (`--preview` não necessita dele), um ID de reparação desconhecido, um formato de saída desconhecido, uma combinação não suportada de `--symptom` ou formato, ou uma instalação do Cacti que não foi possível localizar. |

O Cacti aumenta `memory_limit` em todos os scripts CLI, pelo que a verificação da configuração de execução do PHP só faz sentido na página web.

## Verificações agendadas e alertas

Em **Configuração > Definições > Doctor**, ative **Executar verificações segundo agendamento** e escolha um intervalo entre 15 minutos e um dia. Após cada ciclo do poller previsto, o Doctor executa todas as verificações num processo em segundo plano, não afetando o tempo de execução do próprio poller.

Cada execução regista o estado observado de todas as verificações. As exceções de avisos ativas afetam a política de alertas sem alterar essa observação. Quando uma verificação começa ou deixa de falhar, o Doctor escreve a alteração no registo do Cacti e, se **Endereços de e-mail para alertas** estiver preenchido, envia um e-mail para esses endereços através das definições de correio do Cacti. **Alertar em avisos** acrescenta transições de entrada e saída de avisos. A primeira execução apenas regista a linha de base.

Os relatórios agendados correm no poller principal sob um bloqueio consultivo da base de dados e têm um limite de dois minutos por processo. O Doctor comunica o último início e a última conclusão bem-sucedida para tornar visíveis resultados em falta ou obsoletos. Os resultados contam como atuais durante o intervalo acrescido de um ciclo de polling e três minutos. Uma execução que não termine é repetida após 5, 10, 20 e mais minutos, até ao intervalo normal. As falhas de entrega de alertas são retidas até três novas tentativas com atrasos crescentes; após isso, corrija as definições de correio do Cacti e execute `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` como utilizador do poller. A aceitação pelo servidor de correio não confirma a entrega na caixa de entrada.

O mesmo separador define os limiares de duração do poller (80% do intervalo), espaço livre em disco RRA (aviso abaixo de 10%, falha abaixo de 2%), desvio do relógio da base de dados (aviso acima de 5 segundos, falha acima de 60) e tamanho do registo do Cacti (100 MB). Valores vazios ou inválidos assumem estas predefinições.

## Integração de monitorização

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` imprime uma linha de estado com dados de desempenho e termina com `0` (OK), `1` (WARNING) ou `2` (CRITICAL), permitindo execução direta pelo Nagios, Icinga ou qualquer sistema compatível. `--format=prometheus` escreve o formato de texto Prometheus para o coletor textfile do node_exporter: `cacti_doctor_check_status` por verificação (0 aprovado ou aviso aceite, 1 aviso acionável, 2 falha), `cacti_doctor_check_observed_status` antes de exceções, `cacti_doctor_check_accepted`, `cacti_doctor_checks` por estado e `cacti_doctor_last_run_timestamp_seconds`. As linhas JSON de verificação incluem o campo `assessment`; `not_assessed` indica que a verificação não conseguiu chegar a uma conclusão a partir dos dados disponíveis.

## Pacote de suporte

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

O pacote é um único ficheiro de texto com as versões do Doctor, Cacti, PHP, SO e base de dados, estatísticas do poller e do Boost, o relatório completo, eventuais anexos de suporte de plugins sob `== Plugin attachments` e as últimas 200 linhas do registo do Cacti. Os valores após nomes de palavra-passe, segredo, token, comunidade e chave são mascarados. O Doctor cria o ficheiro legível apenas pelo proprietário e recusa substituir um ficheiro já existente. Reveja-o antes de o publicar em qualquer local.

## Política de reparação

O Doctor inclui uma reparação, `runtime_directories`. Cria diretorias de execução do Cacti em falta e adiciona bits de leitura, escrita e execução ao proprietário sem remover permissões existentes.

No Cacti 1.3 atua sobre `$cache_path`, `$log_path` e `$rra_path`, ou sobre as diretorias `cache`, `log` e `rra` da instalação noutras versões. Ignora diretorias que já tenham permissão de escrita, recusa diretorias fora da instalação do Cacti (como uma diretoria de registos em `/var/log`), recusa ligações simbólicas e recusa executar como root. Nunca segue `path_cactilog`, pelo que um ficheiro de registo configurado dentro de uma diretoria de código não pode redirecionar a reparação para lá. O diagnóstico continua a verificar a diretoria do ficheiro de registo configurado em todas as versões.

Não altera a propriedade dos ficheiros, não executa comandos de shell, não reescreve configurações nem modifica dados da aplicação Cacti. Novas reparações têm de incluir um diagnóstico, um gestor na lista de permissões, confirmação, registo de auditoria e testes.

## Investigação de sintomas

Os Operadores e Administradores podem selecionar **Investigar um sintoma** na página do Doctor. As mesmas regras estão disponíveis através de `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` ou `alerts_missing`, com saída em texto ou JSON. Os pacotes de suporte incluem investigações de sintomas relevantes.

Cada candidato lista as verificações observadas e um próximo passo de verificação. Os candidatos são hipóteses, não causas raiz confirmadas. Observações em falta, não avaliadas ou obsoletas nunca estabelecem uma causa. As investigações na web usam o relatório filtrado por permissões; os relatórios CLI utilizam o acesso da conta do sistema operativo.

## Atualidade das atualizações RRD

`filesystem.rrd_stale` verifica até 500 fontes de dados ativas, excluindo dispositivos desativados e em baixo. Em instalações maiores, a amostra roda a cada hora para que execuções repetidas cubram ficheiros diferentes. Compara as horas de modificação dos ficheiros com o maior valor entre o intervalo do poller, o passo RRD da fonte e o passo do perfil, multiplicado por **Intervalos de obsolescência RRD** (predefinição 3). Mostra os três ficheiros obsoletos mais antigos e o número de dispositivos afetados. Os resultados web incluem apenas dispositivos permitidos.

`filesystem.rrd_files` é uma verificação de existência separada. Procura o ficheiro RRD de até 5 000 fontes de dados ativas, incluindo as de dispositivos desativados ou em baixo, utilizando a mesma amostra horária.

O Boost adiciona o dobro do respetivo intervalo de descarga configurado como tolerância de escrita em disco. Para outro escritor diferido, configure **Tolerância de escrita RRD diferida (segundos)**. Um `RRDCACHED_ADDRESS` anunciado sem tolerância, ou um intervalo do Boost inválido, produz um resultado não avaliado. O Doctor nunca descarrega uma cache para efetuar esta verificação. A hora de modificação é prova de atividade em disco, não garantia de recolha bem-sucedida. Cache externa que o Doctor não consiga detetar tem de ser configurada explicitamente.

Ficheiros em falta, ilegíveis e com data futura são contabilizados no detalhe. O resultado só fica não avaliado quando nenhum ficheiro da amostra é legível. Um resultado por amostragem indica que cobre apenas parte da instalação; uma aprovação não cobre ficheiros fora da amostra.

## Pré-visualizações de reparação e histórico de auditoria

A página de reparação do Administrador apresenta cada caminho afetado, a ação proposta, as permissões atuais e as permissões pretendidas. A aprovação está vinculada a essa pré-visualização, ao utilizador interveniente e a um prazo de cinco minutos. A confirmação consome a pré-visualização; qualquer alteração no sistema de ficheiros exige nova pré-visualização. A execução como root, caminhos fora da instalação, ligações simbólicas a reparar e permissões insuficientes do sistema de ficheiros impedem a aprovação.

`--repair=runtime_directories --preview` imprime um plano JSON só de leitura. `--repair=runtime_directories --yes` aprova um plano CLI acabado de calcular e volta a verificá-lo antes da execução. A conta CLI já tem de estar autorizada a reparar a instalação; não herda funções web.

Um registo estruturado `repair.started` tem de ser guardado antes de qualquer alteração no sistema de ficheiros. Um registo `repair.completed` associado contém o instantâneo pós-reparação e o resultado da verificação. Uma operação interrompida deixa um registo de início para investigação. Uma falha na auditoria de conclusão é comunicada como falha mesmo que tenham ocorrido alterações no sistema de ficheiros. O Doctor adiciona permissões de proprietário e cria diretorias; não tenta reversão automática.

Administradores com a permissão Settings/System Utilities do Cacti podem consultar as últimas 20 entradas de auditoria na página do Doctor. O plugin retém os últimos 200 registos em `plugin_doctor_audit`; o registo do Cacti grava igualmente os respetivos IDs, ações e intervenientes. Os dados de auditoria têm informação sensível ocultada.

## Avisos aceites

Administradores com a permissão Settings/System Utilities do Cacti podem criar uma **Exceção de aviso** a partir de um aviso recente e avaliado na página do Doctor. Uma exceção requer um responsável, um motivo e uma data de revisão UTC até 90 dias. Expira à meia-noite UTC no início dessa data. Podem ser configuradas até 100 exceções. A lista apresenta entradas expiradas e IDs ausentes no relatório atual, permitindo a sua remoção.

O aviso observado permanece visível, com o respetivo responsável, motivo e validade nos detalhes de diagnóstico. O JSON mantém o estado observado e acrescenta metadados `accepted` e `acceptance`. O Nagios exclui avisos aceites ativos da severidade de saída, mas identifica-os no texto de saída. O Prometheus exporta tanto a severidade observada como a acionável. O código de saída CLI normal mantém-se inalterado: os avisos já saem com zero e as falhas com um.

Os alertas agendados de aviso são suprimidos enquanto a exceção vigora; a expiração ou remoção volta a tornar um aviso persistente elegível para alertas de aviso. As transições para falha e a recuperação de falhas mantêm-se elegíveis para alertas. Um resultado não avaliado ou uma falha não podem ser aceites. O reconhecimento pessoal é separado e não suprime alertas. A criação e remoção de exceções são transacionais com o registo de auditoria.

A atualização cria `plugin_doctor_audit` e `plugin_doctor_acceptance` sem alterar dados da aplicação Cacti. Exporte o histórico necessário antes de desinstalar: a desinstalação remove ambas as tabelas do plugin e as respetivas definições. Reverter os ficheiros do plugin deixa as tabelas disponíveis para investigação, mas versões mais antigas não respeitam exceções de aviso.

## Verificações de plugins (`doctor_register_checks`)

Plugins do Cacti ativados podem contribuir com verificações de diagnóstico só de leitura e anexos opcionais para o pacote de suporte registando um hook `doctor_register_checks`:

```php
api_plugin_register_hook('sample', 'doctor_register_checks', 'sample_doctor_checks', 'setup.php');
```

O Doctor invoca plugins ativados e não integrados registados em `doctor_register_checks` (ignorando `doctor` e `cacti`), resolvendo o ficheiro do hook estritamente dentro da diretoria do próprio plugin. A função de retorno recebe `['mode' => 'run' | 'list', 'plugin' => '<slug>']` e devolve uma lista de descritores de verificação ou um envelope com `checks` e `attachments` opcionais:

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

Cada descritor de verificação de plugin é validado antes da inclusão:

- Chaves obrigatórias: `id`, `plugin`, `category`, `title`, `status`, `message`, `details` e `remediation`.
- `plugin` tem de coincidir com o slug registado do plugin (`[a-z0-9_]{1,64}`). `id` tem de respeitar `[a-z0-9_.]{1,128}`, começar por `<plugin>.` e não colidir com um ID de verificação principal ou de outro plugin.
- `status` tem de ser `ok`, `warn`, `fail` ou `info`. `ok` corresponde a `pass` nos relatórios do Doctor; `info` é informativo e não desencadeia falhas na CLI, Nagios, Prometheus ou alertas agendados.
- `category` (até 64 bytes) e `title` (até 256 bytes) têm de ser cadeias não vazias sem carateres de controlo. `message` (não vazia, até 2048 bytes) e `remediation` (até 2048 bytes) têm de ser cadeias de texto.
- `details` aceita uma cadeia de texto (até 8192 bytes) ou um array escalar/aninhado (profundidade máxima 4, codificado em JSON até 16384 bytes; objetos e recursos são rejeitados).
- Anexos opcionais do pacote de suporte requerem um `title` não vazio (até 128 bytes, sem carateres de controlo) e uma cadeia `content` até 65536 bytes (64 KiB).

O Doctor impõe limites de 32 verificações e 8 anexos por plugin (64 verificações de plugins e 32 anexos no total). Cada hook executa dentro do seu próprio bloco `try`/`catch` para que exceções ou cargas úteis que não sejam arrays sejam ocultadas e gravadas no registo do Cacti (categoria `DOCTOR`) sem afetar as verificações principais nem outros plugins. Descritores malformados são rejeitados e registados enquanto os válidos do mesmo plugin continuam a correr. As verificações de plugins são sempre só de leitura (`repairable: false`), e valores textuais bem como chaves associativas sensíveis são mascarados antes da apresentação, exportação ou empacotamento. As verificações de plugins validadas aparecem na interface web, nas saídas CLI texto/JSON/Nagios/Prometheus, no acompanhamento agendado de estados e nos pacotes de suporte.

## Integração MCP (`abilities_register`)

O Doctor regista o hook `abilities_register` (`doctor_abilities_register` em `doctor_abilities.php`) para que o `plugin_mcp` detete as suas capacidades de diagnóstico quando ambos os plugins estão ativados. O Doctor regista a categoria `diagnostics` (`Diagnostics`) e duas capacidades só de leitura, não destrutivas e idempotentes:

| ID da capacidade | Argumentos opcionais | Saída |
|---|---|---|
| `doctor-run-checks` | `category` (texto, máx. 64 carateres), `status` (`pass`, `ok`, `warn`, `fail`, `info`) | `summary` (`total`, `pass`, `warn`, `fail`, `info`) e até 256 `findings` com dados ocultados (`id`, `plugin`, `category`, `title`, `status`, `message`, `remediation`) |
| `doctor-list-checks` | `category` (texto, máx. 64 carateres), `plugin` (texto, máx. 64 carateres) | Até 256 `checks` (`id`, `plugin`, `category`, `title`) cobrindo todas as 45 verificações incorporadas e verificações de plugins ativados |

Ambas as capacidades são estritamente só de leitura e nunca executam reparações. Além dos controlos de domínio e exposição de capacidades do próprio `plugin_mcp` (as capacidades de plugins começam ocultas no MCP até um administrador as expor), o Doctor exige que o titular do token detenha **Visualizador do Doctor** ou um domínio Doctor superior. `doctor-run-checks` restringe `devices.health` aos dispositivos permitidos ao titular do token, inclui `logging.recent_errors` apenas quando o utilizador possui o domínio 18 ou 19 do Cacti, omite `filesystem.rrd_files` e inclui `filesystem.rrd_stale` filtrado por dispositivos apenas para **Operador do Doctor** ou **Administrador do Doctor**.

## Requisitos

| Cacti | PHP | Notas |
|---|---|---|
| 1.2.20 | 5.4 ou superior | O código do próprio Doctor é compatível com PHP 5.4 para poder diagnosticar sistemas legados antes de uma atualização |
| 1.2.31 | 8.0 ou superior | O `composer.json` do Cacti requer `>=8.0` |
| 1.2.x atual | 8.2 ou superior | O `composer.json` do Cacti requer `>=8.2` |
| `develop` (1.3) | 8.3 ou superior | O `composer.json` do Cacti requer `^8.3` |

A linha **Compatibilidade do PHP com o Cacti instalado** compara a versão do PHP em execução com o requisito PHP no `composer.json` raiz do Cacti, incluindo o limite superior de uma restrição caret como `^8.3`. O executável PHP CLI configurado é verificado segundo o mesmo requisito. O Doctor reconhece as formas de restrição `>=` e `^` usadas por estes pacotes do Cacti. Um requisito ilegível, malformado, em falta ou não reconhecido gera um aviso; instalações do Cacti 1.2.20–1.2.30 sem manifesto mantêm o mínimo documentado de PHP 5.4 do instalador. A compatibilidade do próprio Doctor com PHP 5.4 não garante compatibilidade com uma instalação mais recente do Cacti.

A linha **Suporte de segurança oficial do PHP** responde a outra questão: este ramo de lançamento do PHP ainda recebe correções de segurança do projeto PHP? Indica a data publicada de fim de suporte de segurança do ramo e emite aviso após essa data. Por exemplo, o PHP 8.1 pode satisfazer o requisito de execução de uma instalação mais antiga do Cacti mas já não receber correções de segurança oficiais. Uma aprovação não significa que a versão de correção instalada esteja atualizada, e o Doctor não consegue determinar se um fornecedor de sistema operativo aplica correções retroportadas.

As datas de suporte acompanham o Doctor a partir do [calendário de suporte do PHP](https://www.php.net/supported-versions.php) e da [lista de fim de vida](https://www.php.net/eol.php), verificados pela última vez em 2026-11-08. Ramos desconhecidos e pré-versões produzem aviso em vez de aprovação presumida. Nenhum pedido de rede é efetuado durante o diagnóstico. Atualize os dados de suporte do Doctor quando o PHP publicar um novo calendário. Os IDs JSON/monitorização existentes `php.version` e `php.security_baseline` permanecem inalterados.

## Desenvolvimento

A suite de testes unitários usa Pest e a análise estática usa PHPStan (nível 6), ambos em PHP 8.2 ou superior:

```console
composer install
composer phpstan
composer test
```

Os testes substituem as funções do Cacti invocadas pelo Doctor por pequenos simuladores em `tests/CactiStubs.php`, correndo assim sem uma instalação do Cacti.

O GitHub Actions executa cinco tipos de verificações em cada push e pull request:

- Testes de contrato de empacotamento de lançamentos (`tests/test_release.py`) e construção de ficheiro comprimido (`tools/build_release.py`).
- `locales/build_gettext.sh --check`, que falha perante um modelo de tradução obsoleto, um catálogo incompleto ou com entradas fuzzy, ou um catálogo compilado diferente do respetivo ficheiro de origem.
- `php -l` em todos os ficheiros PHP sob PHP 5.4, 5.6, 7.0, 7.1, 7.4 e de 8.0 a 8.4.
- `composer phpstan` (PHPStan nível 6) e `composer test` (suite unitária Pest) em PHP 8.2, 8.3 e 8.4.
- Sete tarefas de integração que instalam o Cacti 1.2.20, o ramo atual 1.2.x e `develop` com MySQL e MariaDB, utilizando tanto cmd.php como Spine. Cada tarefa instala e ativa o plugin, executa o relatório CLI completo e verifica o esquema do relatório, totais de resumo, estados esperados e o conjunto exato de falhas. Em seguida corrompe um caminho binário e o carimbo temporal do poller, confirma que ambos são comunicados, restaura-os, testa a reparação e respetiva confirmação, e executa desativação, ativação, desinstalação e reinstalação. O relatório JSON é guardado como artefacto quando uma tarefa falha.

## Contribuir

Os pull requests devem ser dirigidos a `develop`. Mantenha os ficheiros de produção compatíveis com PHP 5.4 e siga o estilo do Cacti: tabulações, cadeias com plicas simples e funções auxiliares do Cacti como `read_config_option()` e `db_fetch_cell()`. Adicione um teste unitário para cada alteração de comportamento, assine os seus commits (`git commit -s`) e acrescente uma linha em `CHANGELOG.md`.

### Traduções

Envolva todas as mensagens visíveis ao utilizador em `__('...', 'doctor')` (ou `__n()`, `__x()`, `__esc()`), e dê a qualquer frase que contenha um valor uma única cadeia de formato com marcadores sequenciais `%s`/`%d` em vez de concatenar fragmentos. A função `__()` do Cacti só formata uma mensagem quando contém um especificador de formato e não suporta formas posicionais `%1$s`. Também converte `%%` em `%` antes da formatação, pelo que nunca deve colocar um sinal de percentagem literal numa mensagem: passe o valor já com o sinal como argumento (`__('Usage: %s', '50%', 'doctor')`). As linhas de registo permanecem em inglês: utilize `doctor_repair_message()` para textos de reparação e `doctor_n_()` para mensagens que são registadas e traduzidas apenas ao serem exibidas. Mantenha sem tradução os IDs de verificação, chaves JSON, palavras-chave de estado, saída de monitorização e linhas de registo.

`locales/build_gettext.sh` regenera o modelo `locales/po/cacti.pot`, integra-o em cada catálogo `locales/po/<locale>.po` e compila `locales/LC_MESSAGES/<locale>.mo`; faça commit dos três ficheiros. A CI executa `sh locales/build_gettext.sh --check`, que falha se o modelo estiver obsoleto ou se algum catálogo tiver entradas em falta ou fuzzy, marcadores diferentes ou um ficheiro compilado desatualizado. Uma mensagem alterada exige portanto a atualização das traduções no mesmo pull request. Requer GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Um novo idioma corresponde a um novo ficheiro `<locale>.po` nomeado segundo a convenção de localidades do Cacti (por exemplo `pt-BR`).

## Segurança

Comunique vulnerabilidades de forma privada conforme descrito em [SECURITY.md](../../../SECURITY.md), e não em issues públicos.

## Licença

Copyright (C) 2026 Thomas Vincent. Distribuído sob a GNU General Public License, versão 2 ou posterior. Consulte [LICENSE](../../../LICENSE).
