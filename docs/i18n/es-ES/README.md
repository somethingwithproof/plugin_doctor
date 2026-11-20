<!-- Source: README.md; SHA256: 851aec2768af6b0c9a21a3b0e62f902110b83588ad544fe6b87897cb61f82ace -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية](../ar-SA/README.md)
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

Cacti Doctor es un complemento de Cacti que diagnostica una instalación en una sola pasada y aplica pequeñas reparaciones únicamente cuando un administrador las solicita.

**Estado: en desarrollo, antes de la versión 1.0.** La última versión publicada es [0.6.0](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.0). Esta versión añade acceso según el rol, diagnóstico guiado, comprobaciones de actualidad de RRD con alcance limitado, vistas previas de reparaciones e historial de auditoría, excepciones de advertencias aceptadas y traducciones. Consulte los detalles en [CHANGELOG.md](../../../CHANGELOG.md).

<a id="screenshots"></a>
## Capturas de pantalla

Diagnósticos y ajustes de planificación en una instalación de demostración aislada de Cacti 1.2.31 con PHP 8.3.36, incluidas las comprobaciones de compatibilidad de PHP con Cacti, soporte de seguridad del proyecto PHP y salud de la base de datos. Las advertencias y fallos que se muestran describen ese entorno de demostración.

![Tabla de diagnósticos de Doctor con resultados correctos, advertencias y fallos](../../screenshots/diagnostics.png)

![Ajustes de planificación, alertas y umbrales de Doctor](../../screenshots/settings.png)

Los problemas de Cacti suelen aparecer como síntomas: gráficos vacíos, un sondeador detenido o un complemento que no se instala. La causa suele ser un requisito previo que ha cambiado, como una extensión de PHP ausente en la versión CLI, un directorio de registros en el que el sondeador no puede escribir, una ruta de RRDtool que apunta al binario equivocado o una base de datos sin tablas de zonas horarias. Doctor comprueba directamente esos requisitos e informa de cada uno como correcto, advertencia o fallo, con una frase que explica lo encontrado. El mismo informe está disponible en una página web, en la línea de órdenes y como JSON para supervisión.

<a id="what-it-checks"></a>
## Qué comprueba

| Área | Comprobaciones |
|---|---|
| Doctor | Si Doctor se ejecuta como root, lo que haría que las comprobaciones de permisos describieran una cuenta equivocada |
| Cacti y PHP | Versión de Cacti, actualización que el instalador no terminó, complementos activados cuyos ficheros faltan, compatibilidad de PHP con el paquete de Cacti instalado y estado del soporte de seguridad del proyecto PHP |
| Extensiones de PHP | Extensiones necesarias en PHP web y en el PHP CLI que usa el sondeador, junto con funciones recomendadas |
| Configuración de PHP | `memory_limit`, `max_execution_time` y `date.timezone`, según las recomendaciones de Cacti |
| Base de datos | Conectividad, versión del servidor frente a la recomendación de Cacti, juego de caracteres UTF-8, tablas de zonas horarias, tablas principales, desfase horario respecto al equipo PHP y ajustes de InnoDB que Cacti considera errores |
| Salud de la base de datos | Capacidad de conexiones, lecturas del búfer, tablas temporales en disco, creación de hilos de conexión, sentencias lentas y esperas del búfer de registro de InnoDB, con sugerencias de ajuste dependientes de la carga |
| Sistema de ficheros | Directorios cache, log y RRA escribibles; espacio libre para RRD; fuentes de datos activas sin fichero RRD o con actualizaciones atrasadas; `include/config.php` no legible por todos; registro de Cacti escribible y de tamaño adecuado |
| Binarios | PHP CLI, RRDtool, `snmpget`, `snmpwalk` y Spine cuando es el sondeador configurado, incluidas las versiones cuando Cacti especifica una |
| Registro | Errores entre las líneas más recientes del registro de Cacti, con el mensaje más frecuente |
| Dispositivos | Dispositivos activados caídos o recuperándose, los tres que llevan más tiempo caídos con su último error, y un fallo cuando la mayoría cae a la vez |
| Sondeador | Tipo e intervalo, tiempo desde la última finalización del principal, duración frente al intervalo, salida que nunca llegó a RRD, sondeadores remotos que dejaron de informar, Boost detenido y configuración de Spine que apunta a otra base de datos |

Cada comprobación tiene un ID estable, como `database.timezone` o `binary.rrdtool`, para que los scripts identifiquen resultados individuales.

<a id="code-and-test-map"></a>
## Mapa del código y las pruebas

| Comportamiento | Implementación | Evidencias de pruebas en este repositorio |
|---|---|---|
| Comprobaciones de diagnóstico e ID estables de los informes | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Acceso según el rol e informes web con datos sensibles ocultos | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Investigaciones guiadas por síntomas | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Actualidad de RRD y gestión de escrituras diferidas | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Vistas previas de reparaciones, historial de auditoría y advertencias aceptadas | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Comprobaciones programadas y transiciones de alertas | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Estas referencias identifican la implementación y la cobertura de pruebas; no afirman que todos los trabajos de CI hayan pasado para la revisión actual. Consulte la ejecución del flujo de trabajo de la revisión que vaya a desplegar.

<a id="database-health-advice"></a>
## Consejos sobre la salud de la base de datos

El analizador PHP nativo de Doctor lee un conjunto fijo de contadores globales de MySQL o MariaDB mediante la conexión existente de Cacti. Realiza dos consultas de solo lectura por informe, no requiere credenciales ni ejecutables adicionales y nunca cambia la configuración de la base de datos. Estas comprobaciones aparecen en el informe web, CLI, JSON, salida de supervisión, paquete de soporte y seguimiento programado de estados.

| ID de comprobación | Motivo de investigación |
|---|---|
| `database.health_sample` | Menos de 24 horas desde el arranque o `FLUSH STATUS`, o tiempo de actividad no disponible o incoherente |
| `database.connection_capacity` | Conexiones actuales o máximo registrado de al menos el 80% del `max_connections` actual |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` de al menos el 1%, con al menos 10.000 solicitudes de lectura |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` de al menos el 25%, con al menos 1.000 tablas temporales |
| `database.thread_cache` | `Threads_created / Connections` de al menos el 5%, con al menos 1.000 intentos de conexión y `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` de al menos el 1%, con al menos 1.000 sentencias |
| `database.redo_log_waits` | `Innodb_log_waits` distinto de cero |

Estos son umbrales de investigación de Doctor, no objetivos de configuración del fabricante. Salvo la capacidad de conexiones, los consejos acumulativos requieren el periodo de observación anterior. Los contadores ausentes, mal formados, duplicados o excesivos, la actividad insuficiente y los modos de hilos no compatibles producen advertencias en vez de un dictamen saludable o una recomendación de ajuste. Las advertencias pueden afectar al estado de Nagios y a las alertas programadas si está activado **Alert on Warnings**.

Lea juntos los contadores medidos y la sugerencia. Los valores acumulados no demuestran la carga actual; los contadores pueden tener historiales de reinicio distintos y no constituyen una instantánea atómica. El máximo de conexiones puede corresponder a un límite anterior. Los recuentos de consultas lentas dependen de `long_query_time`, y el contador de tablas temporales en disco de MySQL puede omitir ficheros mapeados en memoria. Una proporción baja no demuestra la ausencia de un cuello de botella. Confirme las tendencias bajo una carga representativa, revise los planes de consulta y la reutilización de conexiones, y mida la memoria del **equipo de la base de datos** antes de cambiar búferes o límites de conexión.

Si las métricas no están disponibles, compruebe el soporte del servidor y el acceso de la cuenta de Cacti a `SHOW GLOBAL STATUS` y `SHOW GLOBAL VARIABLES`; Doctor no solicita credenciales elevadas. Las definiciones proceden de las referencias de variables de estado de [MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) y [MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). No se usa ningún script ni código de MySQLTuner.

No se necesita migrar esquemas ni configuración. Despliegue los ficheros del complemento normalmente; revertirlos elimina los diagnósticos añadidos. El estado programado existente se actualiza en la siguiente ejecución.

<a id="how-it-stays-safe"></a>
## Cómo se mantiene la seguridad

Una herramienta de diagnóstico se ejecuta con los privilegios del sondeador o del servidor web y lee rutas de la tabla de ajustes, por lo que debe controlar qué ejecuta y modifica.

- Los diagnósticos son de solo lectura. Nunca cambian ficheros, ajustes ni datos.
- Doctor ejecuta un binario configurado solo si su nombre coincide con el programa esperado (`php`, `rrdtool`, `snmpget` o `snmpwalk`). De otro modo, cualquiera que pudiera escribir en la tabla de ajustes podría elegir qué ejecuta Doctor. Cualquier otro nombre genera una advertencia y no se ejecuta.
- Doctor nunca ejecuta binarios configurados como root e informa cuando se ejecuta como root.
- Las reparaciones proceden de una lista fija de permitidas. Cada una requiere una acción de administrador autenticado en la interfaz web o `--yes` en CLI, y queda anotada en el registro de Cacti.

<a id="releases"></a>
## Versiones publicadas

Las versiones siguen SemVer y coinciden con el fichero `INFO` del complemento. Consulte el [proceso de publicación](../../releasing.md) para elegir la versión, las comprobaciones de CI, el contenido del paquete, las sumas de comprobación y las instrucciones de reversión.

<a id="installation"></a>
## Instalación

Descargue `doctor-VERSION.tar.gz` o `doctor-VERSION.zip` y `SHA256SUMS` de [GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases). Verifique la suma SHA-256 del archivo y extraiga su directorio `doctor/` en el directorio `plugins/` de Cacti. Estos son los paquetes instalables; los archivos de código fuente automáticos de GitHub tienen otro nombre de directorio. Para ejecutar trabajo sin publicar de `develop`, instale una copia del código fuente.

Para copias del código fuente:

Clone o descomprima el repositorio como `plugins/doctor` dentro de una instalación de Cacti. El directorio debe llamarse `doctor`, no `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Instale y active **Cacti Doctor** desde **Configuration > Plugin Management** y conceda un ámbito **Doctor Viewer**, **Doctor Operator** o **Doctor Administrator** mediante los permisos de usuarios o grupos de Cacti. Las concesiones existentes de **Cacti Doctor** conservan acceso de administrador tras actualizar. El informe aparece en **Utilities > Cacti Doctor**.

<a id="languages"></a>
## Idiomas

Doctor incluye traducciones al español de España (`es-ES`), francés (`fr-FR`), alemán (`de-DE`), chino simplificado (`zh-CN`), japonés (`ja-JP`), hindi (`hi-IN`) y árabe (`ar-SA`), además del catálogo de español latinoamericano (`es-419`) descrito abajo. Cacti las muestra cuando está activado el soporte de idiomas (**Configuration > Settings > General > Language Support**) y el usuario elige el idioma. La página web, los ajustes y los mensajes y textos de los informes de la línea de órdenes siguen el idioma de Cacti; el informe CLI usa el idioma predeterminado de Cacti, que sigue siendo inglés salvo que se cambie.

La salida para máquinas nunca se traduce: los ID de comprobaciones, las claves JSON y los valores de estado, la salida de `--format=nagios` y `--format=prometheus`, las líneas de registro y los encabezados de secciones del paquete de soporte permanecen en inglés para que scripts y supervisión funcionen en todos los idiomas. Los textos `summary` y `detail` de cada comprobación son la única parte traducida del informe JSON.

También se incluye un catálogo de español latinoamericano (`es-419`), pero ni Cacti 1.2 ni Cacti 1.3 permiten seleccionar esa configuración regional; solo tendrá efecto cuando Cacti la añada. Hasta entonces, elija español (`es-ES`).

Cacti carga el catálogo desde `plugins/doctor/locales/LC_MESSAGES/<locale>.mo`, con `doctor` como dominio de texto, tanto en 1.2.x como en 1.3 (1.3 resuelve el directorio del complemento mediante su ruta de complementos configurable).

<a id="access-levels"></a>
## Niveles de acceso

| Ámbito | Capacidades |
|---|---|
| Doctor Viewer | Leer estados de las últimas comprobaciones programadas, hora de observación, vigencia e historial agregado reciente. Sin órdenes de diagnóstico, detalles sin procesar, configuración ni reparaciones. |
| Doctor Operator | Ejecutar un informe diagnóstico con límite de proceso de 120 segundos, consultar detalles con información sensible ocultada y acusar recibo de hallazgos. Sin cambios de ajustes ni reparaciones. |
| Doctor Administrator | Capacidades de operador más la reparación permitida existente y los ajustes de Doctor. Las reparaciones y ajustes también requieren el ámbito Settings/System Utilities de Cacti. |

El menú Utilities abre la página del ámbito Doctor más alto concedido al usuario, incluidas las concesiones de grupo. Los nuevos ámbitos Viewer y Operator no reciben concesiones automáticas. El ID original sigue asociado a `doctor.php` como Administrator, conservando el acceso existente de usuarios y grupos.

Los datos de Viewer proceden de comprobaciones programadas. Active la programación antes de conceder acceso Viewer; las observaciones ausentes o atrasadas muestran **desconocido**, nunca saludable. El historial conserva los últimos 20 recuentos agregados programados y excluye el estado de dispositivos. Los operadores inician diagnósticos nuevos de forma explícita; las actualizaciones normales de la página usan el último informe de su sesión.

Los detalles y totales de dispositivos usan los permisos del usuario actual. Los extractos de registro requieren además el ámbito Log Administration. Los secretos se ocultan antes de almacenar detalles en la sesión web o mostrarlos. El acceso CLI sigue regido por la cuenta del sistema operativo.

Los acuses son personales y se anotan en el registro de Cacti. Solo se aplican al mismo hallazgo y evidencia; si cambia la evidencia se necesita otro acuse. Nunca cambian el estado pass/warn/fail, suprimen alertas ni hacen saludable una comprobación fallida. Esto es independiente de las excepciones de advertencias aceptadas, que afectan a la política de alertas sin cambiar el estado observado y se describen más abajo.

Cada acción requiere POST y un token CSRF válido. Las reparaciones presentan una página de confirmación separada con un enlace Cancel que no envía formularios, y registran el usuario actuante y el resultado en el registro de Cacti.

<a id="command-line"></a>
## Línea de órdenes

Ejecute estas órdenes desde la raíz de Cacti como usuario del sondeador de Cacti, no como root:

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

La salida de texto imprime una línea por comprobación con estado, categoría, resumen y detalle. `--json` imprime un objeto `summary` con recuentos por estado y una matriz `checks` con entradas `id`, `category`, `status`, `summary`, `detail` y `repair`/`repairable` cuando se aplica una reparación permitida.

| Estado de salida | Significado |
|---|---|
| `0` | Ninguna comprobación ha fallado o la reparación solicitada ha tenido éxito. Las advertencias no cambian el estado de salida. |
| `1` | Al menos una comprobación ha fallado o una reparación solicitada no ha tenido éxito. |
| `2` | Error de uso: reparación ejecutada sin `--yes` (`--preview` no lo requiere), ID de reparación desconocido, formato de salida desconocido, combinación no admitida de `--symptom` o de formato, o instalación de Cacti no localizable. |

Cacti aumenta `memory_limit` para todos los scripts CLI, por lo que la comprobación de configuración de ejecución de PHP solo es significativa en la página web.

<a id="scheduled-checks-and-alerts"></a>
## Comprobaciones y alertas programadas

En **Configuration > Settings > Doctor**, active **Run Checks on a Schedule** y elija un intervalo entre 15 minutos y un día. Tras cada ciclo del sondeador en el que corresponda, Doctor ejecuta todas las comprobaciones en segundo plano, sin afectar a la duración del propio sondeador.

Cada ejecución registra el estado observado de cada comprobación. Las excepciones activas de advertencias afectan a la política de alertas sin cambiar esa observación. Cuando una comprobación empieza o deja de fallar, Doctor registra el cambio en Cacti y, si se han configurado **Alert Email Addresses**, envía correo a esas direcciones mediante los ajustes de correo de Cacti. **Alert on Warnings** añade las entradas y salidas del estado de advertencia. La primera ejecución solo registra una referencia inicial.

Los informes programados se ejecutan en el sondeador principal bajo un bloqueo asesor de base de datos y tienen un límite de proceso de dos minutos. Doctor informa del último inicio y finalización correcta para hacer visibles los resultados ausentes o atrasados. Los resultados se consideran actuales durante el intervalo más un ciclo de sondeo y tres minutos. Una ejecución que no termina se reintenta tras 5, 10, 20 o más minutos, hasta el intervalo normal. Los envíos de alertas fallidos se conservan para hasta tres reintentos con demoras crecientes; después, corrija los ajustes de correo de Cacti y ejecute `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` como usuario del sondeador. La aceptación por el servidor de correo no confirma la entrega en la bandeja de entrada.

La misma pestaña establece los umbrales de duración del sondeador (80% del intervalo), espacio libre de RRA (aviso por debajo del 10%, fallo por debajo del 2%), desfase de la base de datos (aviso por encima de 5 segundos, fallo por encima de 60) y tamaño del registro de Cacti (100 MB). Los valores vacíos o no válidos usan estos valores predeterminados.

<a id="monitoring-integration"></a>
## Integración con supervisión

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` imprime una línea de estado con datos de rendimiento y termina con `0` (OK), `1` (WARNING) o `2` (CRITICAL), de modo que Nagios, Icinga o cualquier sistema compatible pueden ejecutarlo directamente. `--format=prometheus` escribe el formato de texto de Prometheus para el recopilador textfile de node_exporter: `cacti_doctor_check_status` por comprobación (0 correcta o advertencia aceptada, 1 advertencia accionable, 2 fallo), `cacti_doctor_check_observed_status` antes de excepciones, `cacti_doctor_check_accepted`, `cacti_doctor_checks` por estado y `cacti_doctor_last_run_timestamp_seconds`. Las filas JSON incluyen `assessment`; `not_assessed` significa que no se pudo concluir a partir de los datos disponibles.

<a id="support-bundle"></a>
## Paquete de soporte

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

El paquete es un único fichero de texto con versiones de Doctor, Cacti, PHP, sistema operativo y base de datos, estadísticas del sondeador y Boost, informe completo y últimas 200 líneas del registro de Cacti. Los valores que siguen a nombres password, secret, token, community y key se ocultan. Doctor crea el fichero legible solo por su propietario y se niega a sobrescribir uno existente. Revíselo antes de publicarlo en cualquier lugar.

<a id="repair-policy"></a>
## Política de reparación

Doctor incluye una reparación, `runtime_directories`. Crea los directorios de ejecución de Cacti que falten y añade bits de lectura, escritura y ejecución del propietario sin eliminar permisos existentes.

Actúa sobre `$cache_path`, `$log_path` y `$rra_path` en Cacti 1.3, o sobre los directorios `cache`, `log` y `rra` de la instalación en los demás casos. Omite directorios ya escribibles, rechaza los que estén fuera de Cacti (como un directorio de registro en `/var/log`), rechaza enlaces simbólicos y se niega a ejecutarse como root. Nunca sigue `path_cactilog`, por lo que un registro configurado dentro de un directorio de código no puede redirigir allí la reparación. El diagnóstico sigue comprobando el directorio del registro configurado en todas las versiones.

No cambia propietarios, ejecuta órdenes del sistema, reescribe configuración ni modifica datos de Cacti. Cada nueva reparación debe incluir diagnóstico, controlador permitido, confirmación, registro de auditoría y pruebas.

<a id="investigating-symptoms"></a>
## Investigación de síntomas

Operadores y administradores pueden seleccionar **Investigate a symptom** en la página de Doctor. Las mismas reglas están disponibles con `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` o `alerts_missing`, con salida de texto o JSON. Los paquetes de soporte incluyen las investigaciones de síntomas pertinentes.

Cada candidato enumera las comprobaciones observadas y el siguiente paso de verificación. Los candidatos son hipótesis, no causas raíz confirmadas. Las observaciones ausentes, no evaluadas o antiguas nunca establecen una causa. Las investigaciones web usan el informe filtrado por permisos; las CLI usan el acceso de la cuenta del sistema operativo.

<a id="rrd-update-freshness"></a>
## Vigencia de actualizaciones RRD

`filesystem.rrd_stale` comprueba hasta 500 fuentes de datos activas, excluyendo dispositivos desactivados y caídos. En instalaciones grandes la muestra cambia cada hora, de modo que las ejecuciones sucesivas cubren ficheros distintos. Compara la hora de modificación del fichero con el mayor valor entre el intervalo del sondeador, el paso RRD de la fuente y el paso del perfil, multiplicado por **RRD Stale Intervals** (3 de forma predeterminada). Muestra los tres ficheros atrasados más antiguos y el número de dispositivos afectados. Los resultados web incluyen solo dispositivos permitidos.

`filesystem.rrd_files` es una comprobación de existencia independiente. Busca el fichero RRD de hasta 5.000 fuentes de datos activas, incluidas las de dispositivos desactivados o caídos, y usa la misma muestra que rota cada hora.

Boost añade dos veces su intervalo de vaciado como margen de escritura en disco. Para otro sistema de escritura diferida, configure **Deferred RRD Write Allowance (seconds)**. Un `RRDCACHED_ADDRESS` anunciado sin margen, o un intervalo Boost no válido, produce un resultado no evaluado. Doctor nunca vacía una caché para esta comprobación. La hora de modificación demuestra actividad de disco, no una recopilación correcta. La caché externa que Doctor no pueda detectar debe configurarse explícitamente.

Los ficheros ausentes, ilegibles o con fecha futura se cuentan en el detalle. El resultado solo queda sin evaluar cuando no se puede leer ningún fichero de la muestra. Un resultado por muestreo indica que solo cubre parte de la instalación; un resultado correcto no cubre los ficheros fuera de la muestra.

<a id="repair-previews-and-audit-history"></a>
## Vista previa de reparaciones e historial de auditoría

La página de reparación del administrador muestra cada ruta afectada, la acción propuesta, los permisos actuales y los deseados. La aprobación queda vinculada a esa vista previa, al usuario actuante y a una vigencia de cinco minutos. La confirmación consume la vista previa; un sistema de ficheros modificado requiere otra. La ejecución como root, las rutas externas, los enlaces que necesitan reparación y los permisos insuficientes impiden la aprobación.

`--repair=runtime_directories --preview` imprime un plan JSON de solo lectura. `--repair=runtime_directories --yes` aprueba un plan CLI recién calculado y lo comprueba de nuevo antes de ejecutarlo. La cuenta CLI debe estar ya autorizada para reparar la instalación; no hereda roles web.

Se debe guardar un registro estructurado `repair.started` antes de cualquier cambio en el sistema de ficheros. Un registro vinculado `repair.completed` contiene el estado posterior y el resultado de verificación. Una operación interrumpida deja un registro de inicio para investigar. Un fallo de auditoría al finalizar se informa como fallo incluso si hubo cambios. Doctor añade permisos del propietario y crea directorios; no intenta revertirlos automáticamente.

Los administradores con el permiso Settings/System Utilities de Cacti pueden leer las últimas 20 entradas de auditoría en Doctor. El complemento conserva los últimos 200 registros en `plugin_doctor_audit`; el registro de Cacti también anota sus ID, acciones y actores. Los datos de auditoría ocultan información sensible.

<a id="accepted-warnings"></a>
## Advertencias aceptadas

Los administradores con el permiso Settings/System Utilities de Cacti pueden crear una **Warning exception** a partir de una advertencia reciente y evaluada en Doctor. Requiere un responsable, un motivo y una fecha de revisión UTC dentro de 90 días. Caduca a medianoche UTC al comienzo de esa fecha. Se pueden configurar hasta 100 excepciones. La lista muestra entradas caducadas e ID ausentes del informe actual y permite eliminarlos.

La advertencia observada sigue visible, con responsable, motivo y caducidad en los detalles. JSON conserva el estado observado y añade metadatos `accepted` y `acceptance`. Nagios excluye las advertencias aceptadas activas de su gravedad de salida, pero las nombra. Prometheus exporta tanto la gravedad observada como la accionable. El estado de salida CLI ordinario no cambia: las advertencias ya salen con cero y los fallos con uno.

Las alertas programadas de advertencias se suprimen mientras se aplica la excepción; al caducar o eliminarse, una advertencia persistente vuelve a ser elegible. Las transiciones a fallo y la recuperación de fallos siguen siendo elegibles. No se puede aceptar un resultado no evaluado ni un fallo. El acuse personal es independiente y no suprime nada. Crear y eliminar excepciones es transaccional con el registro de auditoría.

La actualización crea `plugin_doctor_audit` y `plugin_doctor_acceptance` sin cambiar datos de Cacti. Exporte el historial necesario antes de desinstalar: la desinstalación elimina ambas tablas y sus ajustes. Revertir los ficheros deja las tablas disponibles para investigar, pero las versiones antiguas no respetan excepciones de advertencias.

<a id="requirements"></a>
## Requisitos

| Cacti | PHP | Notas |
|---|---|---|
| 1.2.20 | 5.4 o posterior | El código de Doctor es compatible con PHP 5.4 para diagnosticar sistemas antiguos antes de actualizar |
| 1.2.31 | 8.0 o posterior | El `composer.json` de Cacti exige `>=8.0` |
| 1.2.x actual | 8.2 o posterior | El `composer.json` de Cacti exige `>=8.2` |
| `develop` (1.3) | 8.3 o posterior | El `composer.json` de Cacti exige `^8.3` |

La fila **PHP compatibility with installed Cacti** compara el PHP en ejecución con el requisito del `composer.json` de la raíz de Cacti, incluido el límite superior de una restricción con acento circunflejo como `^8.3`. El ejecutable PHP CLI configurado se comprueba con el mismo requisito. Doctor reconoce las formas `>=` y `^` usadas por estos paquetes. Un requisito ilegible, incorrecto, ausente o desconocido produce una advertencia; las instalaciones Cacti 1.2.20–1.2.30 sin manifiesto conservan su mínimo documentado de PHP 5.4. La compatibilidad de Doctor con PHP 5.4 no demuestra compatibilidad con una instalación de Cacti más reciente.

La fila **PHP upstream security support** responde a otra cuestión: si esa rama de PHP sigue recibiendo correcciones de seguridad del proyecto PHP. Informa de la fecha de fin publicada y advierte después. Por ejemplo, PHP 8.1 puede cumplir el requisito de una instalación antigua de Cacti y ya no recibir correcciones del proyecto. Un resultado correcto no significa que el parche instalado esté actualizado, y Doctor no puede determinar si un proveedor del sistema operativo suministra correcciones adaptadas.

Las fechas de soporte se distribuyen con Doctor a partir del [calendario de soporte de PHP](https://www.php.net/supported-versions.php) y la [lista de fin de vida](https://www.php.net/eol.php), comprobados por última vez el 2026-11-08. Las ramas desconocidas y versiones preliminares generan una advertencia en vez de asumir éxito. No se hace ninguna petición de red durante el diagnóstico. Actualice los datos de soporte de Doctor cuando PHP publique otro calendario. Los ID JSON y de supervisión `php.version` y `php.security_baseline` no cambian.

<a id="development"></a>
## Desarrollo

La batería unitaria usa Pest y se ejecuta con PHP 8.2 o posterior:

```console
composer install
composer test
```

Las pruebas sustituyen las funciones de Cacti llamadas por Doctor por pequeños sustitutos en `tests/CactiStubs.php`, de modo que funcionan sin instalar Cacti.

GitHub Actions ejecuta cuatro tipos de comprobaciones en cada envío y solicitud de incorporación:

- `php -l` en cada fichero PHP con PHP 5.4, 5.6, 7.0, 7.1, 7.4 y de 8.0 a 8.4.
- La batería unitaria con PHP 8.2, 8.3 y 8.4.
- `locales/build_gettext.sh --check`, que falla si la plantilla está desactualizada, un catálogo está incompleto o tiene entradas dudosas, o un catálogo compilado difiere de su fuente.
- Siete tareas de integración que instalan Cacti 1.2.20, la rama 1.2.x actual y `develop` con MySQL y MariaDB, tanto con cmd.php como con Spine. Cada tarea instala y activa el complemento, ejecuta el informe CLI completo y comprueba esquema, totales, estados esperados y conjunto exacto de fallos. Después rompe una ruta binaria y la marca temporal del sondeador, confirma que se notifican ambas, las restaura, prueba reparación y confirmación, y ejecuta desactivación, activación, desinstalación y reinstalación. El informe JSON se conserva como artefacto cuando una tarea falla.

<a id="contributing"></a>
## Contribuciones

Las solicitudes de incorporación van a `develop`. Mantenga los ficheros de producción compatibles con PHP 5.4 y use el estilo de Cacti: tabulaciones, cadenas entre comillas simples y funciones auxiliares como `read_config_option()` y `db_fetch_cell()`. Añada una prueba unitaria por cambio de comportamiento, firme los commits (`git commit -s`) y añada una línea a `CHANGELOG.md`.

<a id="translations"></a>
### Traducciones

Envuelva cada mensaje visible en `__('...', 'doctor')` (o `__n()`, `__x()`, `__esc()`) y use una única cadena de formato con marcadores secuenciales `%s`/`%d` para las frases con valores, en vez de concatenar partes. `__()` de Cacti solo aplica formato cuando hay un especificador y no admite formas posicionales `%1$s`. También convierte `%%` en `%` antes del formato, así que nunca incluya un porcentaje literal: pase el valor con su signo como argumento (`__('Usage: %s', '50%', 'doctor')`). Los registros permanecen en inglés: use `doctor_repair_message()` para textos de reparación y `doctor_n_()` para mensajes registrados que se traducen solo al mostrarlos. Mantenga sin traducir los ID, las claves JSON, los estados, la salida de supervisión y los registros.

`locales/build_gettext.sh` regenera `locales/po/cacti.pot`, lo fusiona con cada catálogo `locales/po/<locale>.po` y compila `locales/LC_MESSAGES/<locale>.mo`; incluya los tres en el commit. CI ejecuta `sh locales/build_gettext.sh --check`, que falla si la plantilla está atrasada, falta una entrada o es dudosa, un marcador difiere o un fichero compilado está desactualizado. Un mensaje modificado exige actualizar sus traducciones en la misma solicitud. Requiere GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Un idioma nuevo es un nuevo `<locale>.po` cuyo nombre coincida con Cacti (por ejemplo, `pt-BR`).

<a id="security"></a>
## Seguridad

Comunique las vulnerabilidades en privado como indica [SECURITY.md](../../../SECURITY.md), no en incidencias públicas.

<a id="license"></a>
## Licencia

Copyright (C) 2026 Thomas Vincent. Publicado bajo la Licencia Pública General de GNU, versión 2 o posterior. Consulte [LICENSE](../../../LICENSE).
