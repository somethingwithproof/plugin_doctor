<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](../fr-MA/README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor: um cacto usando um estetoscópio. Diagnosticar. Corrigir. Monitorar.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Status do Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licença: GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ e 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

O Cacti Doctor é um plugin do Cacti que diagnostica uma instalação em uma única execução e aplica pequenos reparos somente quando um administrador solicita.

**Status: em desenvolvimento, anterior à versão 1.0.** A versão mais recente é a [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Este patch adiciona catálogos em hindi e árabe e guias do usuário traduzidos ao controle de acesso por função, diagnóstico guiado, verificações de atualização de RRD com escopo definido, pré-visualizações de reparo e histórico de auditoria, exceções de avisos aceitos e traduções introduzidas na 0.6.0. Consulte [CHANGELOG.md](../../../CHANGELOG.md) para obter detalhes.

## Capturas de tela

Diagnósticos e configurações de agendamento em uma instalação isolada de
demonstração do Cacti 1.2.31 executando PHP 8.3.36, incluindo as verificações
de compatibilidade do Cacti com o PHP, suporte de segurança upstream e saúde
do banco de dados. Os avisos e falhas exibidos aqui descrevem esse ambiente
de demonstração.

![Tabela de diagnóstico do Doctor com resultados de aprovado, aviso e falha](../../screenshots/diagnostics.png)

![Configurações de agendamento, alerta e limites do Doctor](../../screenshots/settings.png)

Problemas no Cacti geralmente se manifestam como sintomas: gráficos vazios, um poller que parou ou um plugin que não instala. A causa costuma ser um pré-requisito que deixou de ser atendido, como uma extensão PHP ausente na compilação CLI, um diretório de logs no qual o poller não consegue gravar, um caminho do RRDtool apontando para o binário errado ou um banco de dados sem tabelas de fuso horário. O Doctor verifica esses pré-requisitos diretamente e relata cada um como aprovado, aviso ou falha com uma frase explicando o que foi encontrado. O mesmo relatório está disponível em uma página web, na linha de comando e em JSON para monitoramento.

## O que ele verifica

| Área | Verificações |
|---|---|
| Doctor | Se o próprio Doctor é executado como root, o que faria as verificações de permissão descreverem a conta errada |
| Cacti e PHP | Versão do Cacti, uma atualização que o instalador nunca concluiu, plugins habilitados cujos arquivos estão ausentes, compatibilidade do PHP com o pacote do Cacti instalado e status do suporte de segurança upstream do PHP |
| Extensões PHP | Extensões obrigatórias no PHP da web e no PHP CLI usado pelo poller, além de recursos recomendados |
| Configuração do PHP | `memory_limit`, `max_execution_time` e `date.timezone`, usando as recomendações do próprio Cacti |
| Banco de dados | Conectividade, versão do servidor em relação à recomendação do Cacti, conjunto de caracteres UTF-8, tabelas de fuso horário, tabelas principais, desvio de relógio em relação ao host PHP e as configurações do InnoDB que o Cacti sinaliza como erros |
| Saúde do banco de dados | Capacidade de conexões, leituras do buffer pool, tabelas temporárias em disco, criação de threads de conexão, instruções lentas e esperas no buffer de log do InnoDB, com sugestões de ajuste dependentes da carga de trabalho |
| Sistema de arquivos | Diretórios de cache, log e RRA graváveis; espaço livre para arquivos RRD; fontes de dados ativas sem arquivo RRD ou com atualizações de arquivo atrasadas; `include/config.php` sem permissão de leitura global; log do Cacti gravável e sem tamanho excessivo |
| Binários | PHP CLI, RRDtool, `snmpget`, `snmpwalk` e Spine quando ele é o poller configurado, incluindo versões quando o Cacti informa uma |
| Log | Erros entre as linhas mais recentes do log do Cacti, com a mensagem mais frequente |
| Dispositivos | Dispositivos habilitados que estão inativos ou em recuperação, os três inativos há mais tempo com seu último erro e uma falha quando a maioria dos dispositivos está inativa ao mesmo tempo |
| Poller | Tipo e intervalo do poller, tempo desde a última conclusão do poller principal, tempo de execução em relação ao intervalo, saída do poller que nunca chegou a um arquivo RRD, pollers remotos que pararam de reportar, Boost estagnado e uma configuração do Spine que aponta para um banco de dados diferente |

Cada verificação possui um ID estável, como `database.timezone` ou `binary.rrdtool`, para que scripts possam consultar resultados individuais por chave.

## Mapa de código e testes

| Comportamento | Implementação | Evidência de teste neste repositório |
|---|---|---|
| Verificações de diagnóstico e IDs estáveis de relatório | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Acesso por função e relatórios web com ocultação de dados sensíveis | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Investigações guiadas por sintomas | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Atualização de RRD e tratamento de gravação adiada | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Pré-visualizações de reparo, histórico de auditoria e avisos aceitos | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Verificações agendadas e transições de alerta | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Essas referências identificam a implementação e a cobertura de testes; elas não
garantem que todos os jobs de CI tenham passado na revisão atual. Verifique a
execução do workflow para a revisão que você planeja implantar.

## Recomendações de saúde do banco de dados

O analisador nativo em PHP do Doctor lê um conjunto fixo de contadores globais do MySQL ou MariaDB por meio da conexão de banco de dados existente do Cacti. Ele executa duas consultas somente leitura por relatório, não exige credenciais extras nem executáveis adicionais e nunca altera a configuração do banco de dados. Essas verificações aparecem no relatório web, na CLI, no JSON, na saída de monitoramento, no pacote de suporte e no acompanhamento de status agendado.

| ID da verificação | Gatilho de investigação |
|---|---|
| `database.health_sample` | Menos de 24 horas desde a inicialização ou `FLUSH STATUS`, ou tempo de atividade indisponível/inconsistente |
| `database.connection_capacity` | Conexões atuais ou pico registrado de pelo menos 80% do `max_connections` atual |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` de pelo menos 1%, com pelo menos 10.000 solicitações de leitura |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` de pelo menos 25%, com pelo menos 1.000 tabelas temporárias |
| `database.thread_cache` | `Threads_created / Connections` de pelo menos 5%, com pelo menos 1.000 tentativas de conexão e `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` de pelo menos 1%, com pelo menos 1.000 instruções |
| `database.redo_log_waits` | `Innodb_log_waits` diferente de zero |

Esses são os limites de investigação do Doctor, e não metas de configuração do fornecedor. Exceto para a capacidade de conexões, as recomendações cumulativas exigem a janela de observação acima. Contadores ausentes, malformados, duplicados ou excessivamente grandes, atividade insuficiente e modos de thread sem suporte geram avisos em vez de um veredito saudável ou de uma recomendação de ajuste. Os avisos podem afetar o status do Nagios e os alertas agendados quando **Alertar sobre avisos** estiver habilitado.

Leia os contadores medidos e a sugestão em conjunto. Valores cumulativos não determinam a carga atual; os contadores podem ter históricos de reinicialização diferentes e não formam um instantâneo atômico. O pico de conexões pode refletir um limite mais antigo. As contagens de consultas lentas dependem de `long_query_time`, e o contador de tabelas temporárias em disco do MySQL pode omitir arquivos mapeados em memória. Uma taxa baixa não comprova a ausência de um gargalo. Confirme as tendências sob uma carga de trabalho representativa, revise os planos de consulta e a reutilização de conexões e meça a memória no **host do banco de dados** antes de alterar buffers ou limites de conexão.

Se as métricas estiverem indisponíveis, verifique o suporte do servidor e o acesso da conta do Cacti a `SHOW GLOBAL STATUS` e `SHOW GLOBAL VARIABLES`; o Doctor não solicita credenciais elevadas. As definições dos contadores vêm da [referência de variáveis de status do MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) e da [referência de variáveis de status do MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Nenhum script ou código do MySQLTuner é utilizado.

Nenhuma migração de esquema ou configuração é necessária. Implante os arquivos do plugin normalmente; reverter esses arquivos remove os diagnósticos adicionados. O estado agendado existente é atualizado na próxima execução.

## Como ele se mantém seguro

Uma ferramenta de diagnóstico é executada com os privilégios do poller ou do servidor web e lê caminhos da tabela de configurações, portanto precisa ter cuidado com o que executa e modifica.

- Os diagnósticos são somente leitura. Eles nunca alteram arquivos, configurações ou dados.
- O Doctor executa um binário configurado somente quando o nome do arquivo corresponde ao programa esperado (`php`, `rrdtool`, `snmpget` ou `snmpwalk`). Caso contrário, qualquer pessoa que possa gravar na tabela de configurações poderia escolher o que o Doctor executa. Qualquer outro nome é relatado como um aviso e não é executado.
- O Doctor nunca executa binários configurados como root e informa quando está sendo executado como root.
- Os reparos vêm de uma lista de permissões fixa. Cada um exige uma ação de administrador autenticada na interface web ou `--yes` na CLI, e cada um é gravado no log do Cacti.

## Lançamentos

As versões seguem o SemVer e correspondem ao arquivo `INFO` do plugin. Consulte o [processo de lançamento](../../releasing.md) para seleção de versão, verificações de CI, conteúdo do pacote, somas de verificação e instruções de reversão.

## Instalação

Baixe `doctor-VERSION.tar.gz` ou `doctor-VERSION.zip` e `SHA256SUMS` de [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Verifique a soma de verificação SHA-256 do arquivo e, em seguida, extraia o diretório `doctor/` dele para o diretório `plugins/` do Cacti. Esses são os pacotes instaláveis; os arquivos-fonte automáticos do GitHub têm um nome de diretório diferente. Para executar trabalho ainda não lançado do branch `develop`, instale a partir de um checkout do código-fonte.

Para checkouts do código-fonte:

Clone ou descompacte o repositório como `plugins/doctor` dentro de uma instalação do Cacti. O diretório deve se chamar `doctor`, e não `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Instale e habilite **Cacti Doctor** em **Configuration > Plugin Management** e, em seguida, conceda uma permissão (realm) **Doctor Viewer**, **Doctor Operator** ou **Doctor Administrator** por meio das permissões de usuário ou grupo do Cacti. Concessões existentes de **Cacti Doctor** mantêm o acesso de Administrator após a atualização. O relatório aparece em **Utilities > Cacti Doctor**.

## Idiomas

O Doctor distribui traduções para espanhol (Espanha, `es-ES`), francês (`fr-FR`), alemão (`de-DE`), chinês simplificado (`zh-CN`), hindi (`hi-IN`), árabe (`ar-SA`) e japonês (`ja-JP`). O Cacti as exibe quando o suporte a idiomas está ativado (**Configuration > Settings > General > Language Support**) e um usuário escolhe o idioma. A página web, as configurações e as mensagens e o texto do relatório exibidos pela linha de comando seguem o idioma do Cacti; o próprio relatório da linha de comando usa o idioma padrão do Cacti, que permanece em inglês, a menos que você o altere.

A saída legível por máquina nunca é traduzida: IDs de verificação, chaves e valores de status JSON, a saída de `--format=nagios` e `--format=prometheus`, linhas de log e os títulos das seções do pacote de suporte permanecem em inglês para que scripts e monitoramento continuem funcionando em todos os idiomas. O texto de `summary` e `detail` de cada verificação é a única parte traduzida do relatório JSON.

Um catálogo em espanhol latino-americano (`es-419`) também é incluído, mas nem o Cacti 1.2 nem o Cacti 1.3 possuem uma localidade de espanhol latino-americano para selecionar, portanto ele só entra em vigor quando o Cacti adicionar uma. Até lá, escolha espanhol (`es-ES`).

O Cacti carrega o catálogo de um plugin a partir de `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` com `doctor` como domínio de texto, tanto na versão 1.2.x quanto na 1.3 (a 1.3 resolve o diretório do plugin por meio de seu caminho de plugins configurável).

## Níveis de acesso

| Permissão (Realm) | Capacidades |
|---|---|
| Doctor Viewer | Ler os status mais recentes das verificações agendadas, o horário da observação, a atualidade dos dados e o histórico agregado recente. Sem comandos de diagnóstico, detalhes brutos, configurações ou reparos. |
| Doctor Operator | Executar um relatório de diagnóstico com limite de processo de 120 segundos, inspecionar detalhes ocultados e reconhecer descobertas. Sem alterações de configuração ou reparos. |
| Doctor Administrator | Capacidades de Operator mais o reparo da lista de permissões existente e as configurações do Doctor. Reparos e configurações também exigem a permissão Settings/System Utilities do Cacti. |

O menu Utilities abre a página correspondente ao maior realm do Doctor concedido ao usuário, incluindo concessões de grupo. Os novos realms Viewer e Operator não recebem concessões automáticas. O ID de realm original permanece associado a `doctor.php` como Administrator, preservando o acesso existente de usuários e grupos.

Os dados do Viewer vêm das verificações agendadas. Habilite o agendamento antes de conceder acesso de Viewer; observações ausentes ou atrasadas exibem **unknown**, nunca saudável. O histórico retém as últimas 20 contagens agregadas agendadas e exclui o status dos dispositivos. Os Operators iniciam novos diagnósticos explicitamente; atualizações comuns da página usam o último relatório de sua sessão.

Os detalhes e totais de dispositivos usam as permissões de dispositivo do usuário atual. Trechos de log exigem adicionalmente a permissão Log Administration do Cacti. Segredos são mascarados antes que os detalhes de diagnóstico sejam armazenados na sessão web ou renderizados. O acesso via CLI continua sendo controlado pela conta do sistema operacional.

Os reconhecimentos são pessoais e registrados no log do Cacti. Eles se aplicam apenas à mesma descoberta e evidência; evidências alteradas exigem um novo reconhecimento. Eles nunca alteram o status pass/warn/fail, não suprimem alertas nem marcam uma verificação com falha como saudável. Isso é separado das exceções de avisos aceitos, que afetam a política de alertas sem alterar o status observado e são descritas abaixo.

Toda ação exige POST e um token CSRF válido. Os reparos apresentam uma página de confirmação separada com um link Cancelar que não envia o formulário e registram o usuário atuante e o resultado no log do Cacti.

## Linha de comando

Execute estes comandos a partir da raiz do Cacti como o usuário do poller do Cacti, não como root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

A saída em texto imprime uma linha por verificação com seu status, categoria, resumo e detalhe. `--json` imprime um objeto `summary` com contagens de status e um array `checks` cujas entradas contêm `id`, `category`, `status`, `summary`, `detail` e `repair`/`repairable` quando um reparo da lista de permissões se aplica.

| Status de saída | Significado |
|---|---|
| `0` | Nenhuma verificação falhou ou o reparo solicitado foi bem-sucedido. Avisos não alteram o status de saída. |
| `1` | Pelo menos uma verificação falhou ou um reparo solicitado não foi bem-sucedido. |
| `2` | Erro de uso: uma execução de reparo sem `--yes` (`--preview` não precisa dele), um ID de reparo desconhecido, um formato de saída desconhecido, uma combinação incompatível de `--symptom` ou formato, ou uma instalação do Cacti que não pôde ser localizada. |

O Cacti aumenta o `memory_limit` para todo script CLI, portanto a verificação de configuração do runtime do PHP só faz sentido na página web.

## Verificações agendadas e alertas

Em **Configuration > Settings > Doctor**, ative **Run Checks on a Schedule** e escolha um intervalo de 15 minutos a um dia. Após cada ciclo do poller devido, o Doctor executa todas as verificações em um processo em segundo plano, de modo que o tempo de execução do próprio poller não seja afetado.

Cada execução registra o status observado de todas as verificações. Exceções de aviso ativas afetam a política de alertas sem alterar essa observação. Quando uma verificação começa ou deixa de falhar, o Doctor grava a mudança no log do Cacti e, se **Alert Email Addresses** estiver definido, envia um e-mail para esses endereços por meio das configurações de e-mail do Cacti. **Alert on Warnings** adiciona transições de entrada e saída de avisos. A primeira execução apenas registra uma linha de base.

Os relatórios agendados são executados no poller principal sob um bloqueio consultivo de banco de dados e têm um limite de worker de dois minutos. O Doctor informa o último início e a última conclusão bem-sucedida para que resultados ausentes ou obsoletos fiquem visíveis. Os resultados contam como atuais pelo intervalo mais um ciclo de polling e três minutos. Uma execução que não for concluída é tentada novamente após 5, 10, 20 e mais minutos, até o intervalo normal. Falhas no envio de alertas são mantidas para até três novas tentativas com intervalos crescentes; depois disso, corrija as configurações de e-mail do Cacti e execute `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` como o usuário do poller. A aceitação pelo servidor de e-mail não confirma a entrega na caixa de entrada.

A mesma aba define os limites para o tempo de execução do poller (80% do intervalo), espaço livre em disco de RRA (aviso abaixo de 10%, falha abaixo de 2%), desvio de relógio do banco de dados (aviso acima de 5 segundos, falha acima de 60) e tamanho do log do Cacti (100 MB). Valores vazios ou inválidos voltam para esses padrões.

## Integração com monitoramento

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` imprime uma linha de status com dados de desempenho e sai com `0` (OK), `1` (WARNING) ou `2` (CRITICAL), para que o Nagios, o Icinga ou qualquer sistema compatível possa executá-lo diretamente. `--format=prometheus` grava o formato de texto do Prometheus para o coletor textfile do node_exporter: `cacti_doctor_check_status` por verificação (0 aprovado ou aviso aceito, 1 aviso acionável, 2 falha), `cacti_doctor_check_observed_status` antes das exceções, `cacti_doctor_check_accepted`, `cacti_doctor_checks` por status e `cacti_doctor_last_run_timestamp_seconds`. As linhas de verificação JSON incluem um campo `assessment`; `not_assessed` significa que a verificação não pôde chegar a uma conclusão a partir dos dados disponíveis.

## Pacote de suporte

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

O pacote é um único arquivo de texto com as versões do Doctor, Cacti, PHP, SO e banco de dados, estatísticas do poller e do Boost, o relatório completo e as últimas 200 linhas do log do Cacti. Valores que vêm após nomes de senha, segredo, token, comunidade e chave são mascarados. O Doctor cria o arquivo legível apenas pelo seu proprietário e se recusa a sobrescrever um arquivo existente. Revise-o antes de publicá-lo em qualquer lugar.

## Política de reparo

O Doctor inclui um reparo, `runtime_directories`. Ele cria diretórios de tempo de execução do Cacti ausentes e adiciona os bits de leitura, gravação e execução do proprietário sem remover as permissões existentes.

Ele atua em `$cache_path`, `$log_path` e `$rra_path` no Cacti 1.3, ou nos diretórios `cache`, `log` e `rra` da instalação caso contrário. Ele ignora diretórios que já têm permissão de gravação, recusa diretórios fora da instalação do Cacti (como um diretório de log em `/var/log`), recusa links simbólicos e se recusa a ser executado como root. Ele nunca segue `path_cactilog`, portanto um arquivo de log configurado dentro de um diretório de código não pode redirecionar o reparo para lá. O diagnóstico ainda verifica o diretório do arquivo de log configurado em todas as versões.

Ele não altera a propriedade, não executa comandos de shell, não reescreve configurações nem modifica dados da aplicação Cacti. Cada novo reparo deve incluir um diagnóstico, um manipulador em lista de permissão (allowlist), confirmação, registro de auditoria e testes.

## Investigação de sintomas

Operadores e Administradores podem selecionar **Investigar um sintoma** na página do Doctor. As mesmas regras estão disponíveis via `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` ou `alerts_missing`, com saída em texto ou JSON. Os pacotes de suporte incluem as investigações de sintomas relevantes.

Cada candidato lista as verificações observadas e uma próxima etapa de verificação. Os candidatos são hipóteses, não causas raiz confirmadas. Observações ausentes, não avaliadas ou desatualizadas nunca estabelecem uma causa. As investigações via web usam o relatório filtrado por permissões; os relatórios via CLI usam o acesso da conta do sistema operacional.

## Atualidade das atualizações de RRD

`filesystem.rrd_stale` verifica até 500 fontes de dados ativas, excluindo dispositivos desativados e inativos. Em instalações maiores, a amostra muda a cada hora, de modo que execuções repetidas cobrem arquivos diferentes. A verificação compara os horários de modificação dos arquivos com o maior valor entre o intervalo do poller, o passo do RRD de origem e o passo do perfil, multiplicado por **Intervalos de RRD desatualizado** (padrão 3). Ela mostra os três arquivos desatualizados mais antigos e o número de dispositivos afetados. Os resultados na web incluem apenas dispositivos permitidos.

`filesystem.rrd_files` é uma verificação de existência separada. Ela procura o arquivo RRD de até 5.000 fontes de dados ativas, incluindo aquelas em dispositivos desativados ou inativos, e usa a mesma amostra horária.

O Boost adiciona o dobro do seu intervalo de descarga configurado como uma tolerância de gravação em disco. Para outro gravador adiado, configure **Tolerância de gravação adiada de RRD (segundos)**. Uma variável `RRDCACHED_ADDRESS` anunciada sem uma tolerância, ou um intervalo inválido do Boost, produz um resultado não avaliado. O Doctor nunca esvazia um cache para executar esta verificação. O horário de modificação é evidência de atividade em disco, não prova de coleta de dados bem-sucedida. O cache externo que o Doctor não consegue detectar deve ser configurado explicitamente.

Arquivos ausentes, ilegíveis e com data futura são contados nos detalhes. O resultado só é considerado não avaliado quando nenhum arquivo amostrado é legível. Um resultado amostrado indica que cobre apenas parte da instalação; uma aprovação não abrange arquivos não amostrados.

## Pré-visualizações de reparo e histórico de auditoria

A página de reparo do Administrador mostra cada caminho afetado, a ação proposta, as permissões atuais e as permissões de destino. A aprovação está vinculada a essa pré-visualização, ao usuário atuante e a um tempo de vida de cinco minutos. A confirmação consome a pré-visualização; um sistema de arquivos alterado exige outra pré-visualização. A execução como root, caminhos fora da instalação, links que exigem reparo e permissões de sistema de arquivos não atendidas impedem a aprovação.

`--repair=runtime_directories --preview` imprime um plano JSON somente leitura. `--repair=runtime_directories --yes` aprova um plano de CLI recém-calculado e o verifica novamente antes da execução. A conta de CLI já deve estar autorizada a reparar a instalação; ela não herda funções da web.

Um registro estruturado `repair.started` deve ser salvo antes de qualquer alteração no sistema de arquivos. Um registro vinculado `repair.completed` contém o snapshot pós-reparo e o resultado da verificação. Uma operação interrompida deixa um registro de início para investigação. Uma falha na auditoria de conclusão é relatada como uma falha, mesmo que alterações no sistema de arquivos tenham ocorrido. O Doctor adiciona permissões de proprietário e cria diretórios; ele não tenta reversão automática.

Administradores com a permissão Settings/System Utilities do Cacti podem ler as 20 entradas de auditoria mais recentes na página do Doctor. O plugin retém os 200 registros mais recentes em `plugin_doctor_audit`; o log do Cacti também registra seus IDs, ações e atores. Os payloads de auditoria são ocultados.

## Avisos aceitos

Administradores com a permissão Settings/System Utilities do Cacti podem criar uma **Exceção de aviso** a partir de um aviso recente e avaliado na página do Doctor. Uma exceção exige um responsável, um motivo e uma data de revisão em UTC dentro de 90 dias. Ela expira à meia-noite UTC no início dessa data. Até 100 exceções podem ser configuradas. A lista exibe entradas expiradas e IDs não presentes no relatório atual, além de permitir a remoção.

O aviso observado permanece visível, com seu responsável, motivo e expiração nos detalhes do diagnóstico. O JSON mantém o status observado e adiciona os metadados `accepted` e `acceptance`. O Nagios exclui avisos aceitos ativos de sua severidade de saída, mas os cita em sua saída. O Prometheus exporta tanto a severidade observada quanto a acionável. O código de saída comum da CLI permanece inalterado: avisos já retornam zero e falhas retornam um.

Alertas de aviso agendados são suprimidos enquanto a exceção se aplica; a expiração ou remoção torna um aviso contínuo elegível para alertas de aviso novamente. Transições de falha e recuperação de falha permanecem elegíveis para alertas. Um resultado não avaliado ou uma falha não pode ser aceito. O reconhecimento pessoal é separado e não suprime nada. A criação e a remoção de exceções são transacionais com o registro de auditoria.

A atualização cria `plugin_doctor_audit` e `plugin_doctor_acceptance` sem alterar os dados da aplicação Cacti. Exporte qualquer histórico necessário antes de desinstalar: a desinstalação remove ambas as tabelas do plugin e suas configurações. Reverter os arquivos do plugin deixa as tabelas disponíveis para investigação, mas versões mais antigas não respeitam exceções de aviso.

## Requisitos

| Cacti | PHP | Notas |
|---|---|---|
| 1.2.20 | 5.4 ou mais recente | O próprio código do Doctor é compatível com PHP 5.4 para poder diagnosticar sistemas legados antes de uma atualização |
| 1.2.31 | 8.0 ou mais recente | O `composer.json` do Cacti exige `>=8.0` |
| 1.2.x atual | 8.2 ou mais recente | O `composer.json` do Cacti exige `>=8.2` |
| `develop` (1.3) | 8.3 ou mais recente | O `composer.json` do Cacti exige `^8.3` |

A linha **Compatibilidade do PHP com o Cacti instalado** compara a versão do PHP em execução com o requisito de PHP no `composer.json` raiz do próprio Cacti, incluindo o limite superior de uma restrição caret como `^8.3`. O executável PHP CLI configurado é verificado em relação ao mesmo requisito. O Doctor reconhece as formas de restrição `>=` e `^` usadas por esses pacotes do Cacti. Um requisito ilegível, malformado, ausente ou não reconhecido produz um aviso; instalações do Cacti 1.2.20–1.2.30 sem um manifesto mantêm o piso documentado do instalador de PHP 5.4. A própria compatibilidade do Doctor com PHP 5.4 não estabelece compatibilidade com uma instalação mais recente do Cacti.

A linha **Suporte de segurança upstream do PHP** responde a uma pergunta distinta: esse ramo de lançamento do PHP ainda recebe correções de segurança do projeto PHP? Ela informa a data de término do suporte de segurança publicada do ramo e emite um aviso após essa data. Por exemplo, o PHP 8.1 pode atender ao requisito de tempo de execução de uma instalação mais antiga do Cacti enquanto não recebe mais correções de segurança upstream. Um resultado aprovado não significa que a versão de patch instalada esteja atualizada, e o Doctor não pode determinar se um fornecedor de sistema operacional fornece correções portadas retroativamente (backports).

As datas de suporte são empacotadas com o Doctor a partir do [cronograma de suporte do PHP](https://www.php.net/supported-versions.php) e da [lista de fim de vida útil](https://www.php.net/eol.php), verificados pela última vez em 2026-11-08. Ramos desconhecidos e pré-lançamentos produzem um aviso em vez de uma aprovação presumida. Nenhuma solicitação de rede é feita durante os diagnósticos. Atualize os dados de suporte do Doctor quando o PHP publicar um novo cronograma. Os IDs existentes de JSON/monitoramento `php.version` e `php.security_baseline` permanecem inalterados.

## Desenvolvimento

A suíte de testes unitários usa o Pest e é executada no PHP 8.2 ou mais recente:

```console
composer install
composer test
```

Os testes substituem as funções do Cacti que o Doctor chama por pequenos substitutos em `tests/CactiStubs.php`, para que sejam executados sem uma instalação do Cacti.

O GitHub Actions executa quatro tipos de verificações em cada push e pull request:

- `php -l` em cada arquivo PHP nas versões 5.4, 5.6, 7.0, 7.1, 7.4 e 8.0 até 8.4 do PHP.
- A suíte de testes unitários no PHP 8.2, 8.3 e 8.4.
- `locales/build_gettext.sh --check`, que falha quando há um modelo de tradução desatualizado, um catálogo incompleto ou impreciso (fuzzy), ou um catálogo compilado que difere de sua fonte.
- Sete jobs de integração que instalam o Cacti 1.2.20, o ramo 1.2.x atual e `develop` com MySQL e MariaDB, usando tanto cmd.php quanto Spine. Cada job instala e habilita o plugin, executa o relatório completo via CLI e verifica o esquema do relatório, os totais de resumo, os status esperados e o conjunto exato de falhas. Em seguida, ele quebra um caminho de binário e o timestamp do poller, confirma que ambos são relatados, restaura-os, exercita o reparo e sua confirmação, e executa desabilitação, habilitação, desinstalação e reinstalação. O relatório JSON é mantido como um artefato quando um job falha.

## Contribuição

Os pull requests devem ser enviados para `develop`. Mantenha os arquivos de produção compatíveis com o PHP 5.4 e siga o estilo do Cacti: tabulações, strings entre aspas simples e auxiliares do Cacti, como `read_config_option()` e `db_fetch_cell()`. Adicione um teste de unidade para cada alteração de comportamento, assine seus commits (`git commit -s`) e adicione uma linha em `CHANGELOG.md`.

### Traduções

Envolva todas as mensagens visíveis ao usuário em `__('...', 'doctor')` (ou `__n()`, `__x()`, `__esc()`), e use uma única string de formatação com marcadores sequenciais `%s`/`%d` para frases que contêm um valor, em vez de concatenar trechos. A função `__()` do Cacti formata uma mensagem apenas quando ela contém um especificador de formato e não oferece suporte a formas posicionais `%1$s`. Ela também converte `%%` em `%` antes da formatação; portanto, nunca coloque um sinal de porcentagem literal em uma mensagem: passe o valor com o sinal como um argumento (`__('Usage: %s', '50%', 'doctor')`). As linhas de log permanecem em inglês: use `doctor_repair_message()` para textos de reparo e `doctor_n_()` para mensagens que são registradas em log e traduzidas apenas onde são exibidas. Mantenha sem tradução os IDs de verificação, chaves JSON, palavras-chave de status, saídas de monitoramento e linhas de log.

`locales/build_gettext.sh` regenera o modelo `locales/po/cacti.pot`, mescla-o em cada catálogo `locales/po/<locale>.po` e compila `locales/LC_MESSAGES/<locale>.mo`; faça o commit dos três arquivos. A CI executa `sh locales/build_gettext.sh --check`, que falha quando o modelo está desatualizado ou quando um catálogo tem uma entrada ausente ou marcada como fuzzy, um marcador difere ou um arquivo compilado está desatualizado. Portanto, uma mensagem alterada precisa ter suas traduções atualizadas no mesmo pull request. Isso requer o GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Um novo idioma corresponde a um novo arquivo `<locale>.po` nomeado conforme o padrão de localidades do Cacti (por exemplo, `pt-BR`).

## Segurança

Relate vulnerabilidades em caráter privado conforme descrito em [SECURITY.md](../../../SECURITY.md), e não em issues públicas.

## Licença

Copyright (C) 2026 Thomas Vincent. Distribuído sob a GNU General Public License, versão 2 ou posterior. Consulte [LICENSE](../../../LICENSE).
