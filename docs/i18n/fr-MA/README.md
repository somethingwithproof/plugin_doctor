<!-- Source: README.md; SHA256: cfba946307999cee0df15dad8ee1a90ff034fb4afe9420d83bf1da68eda0f9c8 -->

<!-- translations:start -->
[English](../../../README.md) | [简体中文](../zh-CN/README.md) | [हिन्दी](../hi-IN/README.md) | [Español (España)](../es-ES/README.md) | [Español (Latinoamérica)](../es-419/README.md) | [العربية (السعودية)](../ar-SA/README.md) | [Afrikaans](../af-ZA/README.md) | [አማርኛ](../am-ET/README.md) | [العربية (مصر)](../ar-EG/README.md) | [العربية (المغرب)](../ar-MA/README.md) | [বাংলা](../bn-BD/README.md) | [Deutsch](../de-DE/README.md) | [فارسی](../fa-IR/README.md) | [Filipino](../fil-PH/README.md) | [Français](../fr-FR/README.md) | [Français (Maroc)](README.md) | [Français (Sénégal)](../fr-SN/README.md) | [Hausa](../ha-NG/README.md) | [עברית](../he-IL/README.md) | [Bahasa Indonesia](../id-ID/README.md) | [Igbo](../ig-NG/README.md) | [Italiano](../it-IT/README.md) | [日本語](../ja-JP/README.md) | [한국어](../ko-KR/README.md) | [Malagasy](../mg-MG/README.md) | [मराठी](../mr-IN/README.md) | [Bahasa Melayu](../ms-MY/README.md) | [Nederlands](../nl-NL/README.md) | [Polski](../pl-PL/README.md) | [Português (Brasil)](../pt-BR/README.md) | [Русский](../ru-RU/README.md) | [Kinyarwanda](../rw-RW/README.md) | [Soomaali](../so-SO/README.md) | [Svenska](../sv-SE/README.md) | [Kiswahili](../sw-KE/README.md) | [தமிழ்](../ta-IN/README.md) | [తెలుగు](../te-IN/README.md) | [ไทย](../th-TH/README.md) | [Türkçe](../tr-TR/README.md) | [Українська](../uk-UA/README.md) | [اردو](../ur-PK/README.md) | [Tiếng Việt](../vi-VN/README.md) | [isiXhosa](../xh-ZA/README.md) | [Yorùbá](../yo-NG/README.md) | [繁體中文](../zh-TW/README.md) | [isiZulu](../zu-ZA/README.md)
<!-- translations:end -->

<h1 align="center">
	<picture>
		<source media="(prefers-color-scheme: dark)" srcset="../../../images/doctor_logo_dark.png">
		<img src="../../../images/doctor_logo.png" width="360" alt="Cacti Doctor : un cactus portant un stéthoscope. Diagnostiquer. Réparer. Superviser.">
	</picture>
</h1>

<p align="center">
	<a href="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml"><img src="https://github.com/somethingwithproof/plugin_doctor/actions/workflows/ci.yml/badge.svg?branch=develop" alt="CI"></a>
	<a href="https://sonarcloud.io/summary/new_code?id=somethingwithproof_plugin_doctor"><img src="https://sonarcloud.io/api/project_badges/measure?project=somethingwithproof_plugin_doctor&amp;metric=alert_status" alt="Statut du Quality Gate"></a>
	<a href="https://scorecard.dev/viewer/?uri=github.com/somethingwithproof/plugin_doctor"><img src="https://api.scorecard.dev/projects/github.com/somethingwithproof/plugin_doctor/badge" alt="OpenSSF Scorecard"></a>
	<a href="../../../LICENSE"><img src="https://img.shields.io/badge/license-GPL--2.0--or--later-blue" alt="Licence : GPL-2.0-or-later"></a>
	<img src="https://img.shields.io/badge/Cacti-1.2.20%2B%20%7C%201.3-2e7d32" alt="Cacti 1.2.20+ et 1.3">
	<img src="https://img.shields.io/badge/PHP-5.4%2B-777bb4?logo=php&logoColor=white" alt="PHP 5.4+">
</p>

Cacti Doctor est un plugin Cacti qui diagnostique une installation en une seule passe et n'applique de petites réparations que lorsqu'un administrateur le demande.

**Statut : en cours de développement, avant la version 1.0.** La dernière version publiée est la [0.6.1](https://github.com/somethingwithproof/plugin_doctor/releases/tag/v0.6.1). Ce correctif ajoute des catalogues en hindi et en arabe ainsi que des guides d'utilisation traduits aux fonctionnalités de la version 0.6.0 : accès limité par rôle, diagnostic guidé, contrôles ciblés de fraîcheur RRD, aperçus de réparation et historique d'audit, exceptions d'avertissement acceptées et traductions. Consultez [CHANGELOG.md](../../../CHANGELOG.md) pour plus de détails.

## Captures d'écran

Paramètres de diagnostic et de planification dans une installation de démonstration Cacti 1.2.31 isolée exécutant PHP 8.3.36, incluant les contrôles de compatibilité PHP de Cacti, de support de sécurité en amont et de santé de la base de données. Les avertissements et échecs affichés ici décrivent cet environnement de démonstration.

![Tableau de diagnostic Doctor affichant les résultats réussis, les avertissements et les échecs](../../screenshots/diagnostics.png)

![Paramètres de planification, d'alerte et de seuils de Doctor](../../screenshots/settings.png)

Les problèmes de Cacti se manifestent généralement sous forme de symptômes : graphiques vides, collecteur arrêté, plugin impossible à installer. La cause provient souvent d'un prérequis qui a dérivé, comme une extension PHP manquante dans la compilation CLI, un répertoire de journaux dans lequel le collecteur ne peut pas écrire, un chemin RRDtool pointant vers le mauvais binaire ou une base de données dépourvue de tables de fuseaux horaires. Doctor vérifie directement ces prérequis et signale chacun d'eux comme réussi, avertissement ou échec, accompagné d'une phrase expliquant ce qui a été constaté. Le même rapport est disponible sur une page web, en ligne de commande et au format JSON pour la supervision.

## Ce qui est vérifié

| Domaine | Vérifications |
|---|---|
| Doctor | Si Doctor lui-même s'exécute en tant que root, ce qui ferait porter les vérifications de permissions sur le mauvais compte |
| Cacti et PHP | Version de Cacti, mise à niveau que l'installateur n'a jamais terminée, plugins activés dont les fichiers sont manquants, compatibilité PHP avec le paquet Cacti installé, état du support de sécurité PHP en amont |
| Extensions PHP | Extensions requises dans le PHP web et dans le PHP CLI utilisé par le collecteur, ainsi que les fonctionnalités recommandées |
| Configuration PHP | `memory_limit`, `max_execution_time` et `date.timezone`, selon les recommandations propres à Cacti |
| Base de données | Connectivité, version du serveur par rapport aux recommandations de Cacti, jeu de caractères UTF-8, tables de fuseaux horaires, tables principales, dérive d'horloge par rapport à l'hôte PHP et paramètres InnoDB signalés comme erreurs par Cacti |
| Santé de la base de données | Capacité de connexion, lectures du pool de tampons, tables temporaires sur disque, création de threads de connexion, requêtes lentes et attentes du tampon de journalisation InnoDB, avec suggestions d'optimisation dépendant de la charge de travail |
| Système de fichiers | Répertoires de cache, de journaux et RRA accessibles en écriture ; espace libre pour les fichiers RRD ; sources de données actives sans fichier RRD ou dont la mise à jour est en retard ; `include/config.php` non lisible par tous ; journal Cacti accessible en écriture et non surdimensionné |
| Binaires | PHP CLI, RRDtool, `snmpget`, `snmpwalk` et Spine lorsqu'il s'agit du collecteur configuré, y compris les versions lorsque Cacti en indique une |
| Journal | Erreurs parmi les lignes les plus récentes du journal Cacti, avec le message le plus fréquent |
| Équipements | Équipements activés qui sont hors service ou en cours de rétablissement, les trois hors service depuis le plus longtemps avec leur dernière erreur, et un échec lorsque la plupart des équipements sont hors service simultanément |
| Collecteur | Type et intervalle du collecteur, temps écoulé depuis la dernière exécution complète du collecteur principal, durée d'exécution par rapport à l'intervalle, sorties du collecteur n'ayant jamais atteint un fichier RRD, collecteurs distants ayant cessé de transmettre, Boost bloqué et configuration Spine pointant vers une autre base de données |

Chaque vérification possède un identifiant stable, tel que `database.timezone` ou `binary.rrdtool`, afin que les scripts puissent s'appuyer sur chaque résultat individuel.

## Cartographie du code et des tests

| Comportement | Implémentation | Preuves de test dans ce dépôt |
|---|---|---|
| Contrôles de diagnostic et identifiants de rapport stables | [doctor_functions.php](../../../doctor_functions.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [AssertDoctorReport.php](../../../tests/ci/AssertDoctorReport.php) |
| Accès limité par rôle et rapports web expurgés | [doctor_access.php](../../../doctor_access.php), [doctor_web.php](../../../doctor_web.php) | [AccessTest.php](../../../tests/AccessTest.php), [WebAccessTest.php](../../../tests/WebAccessTest.php) |
| Investigations guidées par symptôme | [doctor_diagnosis.php](../../../doctor_diagnosis.php) | [DiagnosisTest.php](../../../tests/DiagnosisTest.php) |
| Fraîcheur RRD et gestion des écritures différées | [doctor_rrd.php](../../../doctor_rrd.php) | [RrdFreshnessTest.php](../../../tests/RrdFreshnessTest.php) |
| Aperçus de réparation, historique d'audit et avertissements acceptés | [doctor_workflows.php](../../../doctor_workflows.php), [doctor_web.php](../../../doctor_web.php) | [WorkflowTest.php](../../../tests/WorkflowTest.php) |
| Contrôles planifiés et transitions d'alerte | [doctor_scheduling.php](../../../doctor_scheduling.php) | [DoctorFunctionsTest.php](../../../tests/DoctorFunctionsTest.php), [WorkflowTest.php](../../../tests/WorkflowTest.php) |

Ces références identifient l'implémentation et la couverture de tests ; elles n'indiquent pas que chaque tâche CI a réussi pour la révision actuelle. Vérifiez l'exécution du workflow pour la révision que vous prévoyez de déployer.

## Conseils sur la santé de la base de données

L'analyseur PHP natif de Doctor lit un ensemble fixe de compteurs globaux MySQL ou MariaDB via la connexion existante de Cacti à la base de données. Il effectue deux requêtes en lecture seule par rapport, ne nécessite aucun identifiant ni exécutable supplémentaire, et ne modifie jamais la configuration de la base de données. Ces contrôles figurent dans le rapport web, en CLI, en JSON, dans la sortie de supervision, dans le dossier de support et dans le suivi d'état planifié.

| ID de vérification | Déclencheur d'investigation |
|---|---|
| `database.health_sample` | Moins de 24 heures depuis le démarrage ou `FLUSH STATUS`, ou durée de fonctionnement indisponible ou incohérente |
| `database.connection_capacity` | Connexions actuelles ou pic enregistré d'au moins 80 % de la valeur actuelle de `max_connections` |
| `database.buffer_pool_reads` | `Innodb_buffer_pool_reads / Innodb_buffer_pool_read_requests` d'au moins 1 %, avec au moins 10 000 requêtes de lecture |
| `database.temporary_tables` | `Created_tmp_disk_tables / Created_tmp_tables` d'au moins 25 %, avec au moins 1 000 tables temporaires |
| `database.thread_cache` | `Threads_created / Connections` d'au moins 5 %, avec au moins 1 000 tentatives de connexion et `thread_handling=one-thread-per-connection` |
| `database.slow_queries` | `Slow_queries / Queries` d'au moins 1 %, avec au moins 1 000 instructions |
| `database.redo_log_waits` | `Innodb_log_waits` non nul |

Il s'agit des seuils d'investigation de Doctor, et non d'objectifs de configuration des éditeurs. À l'exception de la capacité de connexion, les conseils cumulatifs nécessitent la fenêtre d'observation ci-dessus. Des compteurs manquants, mal formés, en double ou hors limites, une activité insuffisante ainsi que des modes de gestion des threads non pris en charge génèrent des avertissements plutôt qu'un verdict sain ou une recommandation d'optimisation. Les avertissements peuvent affecter l'état Nagios et les alertes planifiées lorsque l'option **Alerter en cas d'avertissement** est activée.

Lisez ensemble les compteurs mesurés et la suggestion. Les valeurs cumulatives ne reflètent pas la charge actuelle ; les compteurs peuvent avoir des historiques de réinitialisation différents et ne constituent pas un instantané atomique. Le pic de connexions peut refléter une limite antérieure. Le décompte des requêtes lentes dépend de `long_query_time`, et le compteur de tables temporaires sur disque de MySQL peut omettre les fichiers mappés en mémoire. Un faible ratio ne prouve pas l'absence de goulot d'étranglement. Confirmez les tendances sous une charge de travail représentative, examinez les plans d'exécution des requêtes et la réutilisation des connexions, et mesurez la mémoire sur l'**hôte de base de données** avant de modifier les tampons ou les limites de connexion.

Si les métriques ne sont pas disponibles, vérifiez la prise en charge par le serveur ainsi que l'accès du compte Cacti à `SHOW GLOBAL STATUS` et `SHOW GLOBAL VARIABLES` ; Doctor ne demande pas d'identifiants à privilèges élevés. Les définitions des compteurs proviennent de la [référence des variables d'état MySQL](https://dev.mysql.com/doc/refman/8.0/en/server-status-variables.html) et de la [référence des variables d'état MariaDB](https://mariadb.com/docs/server/server-management/variables-and-modes/server-status-variables). Aucun script ni code MySQLTuner n'est utilisé.

Aucune migration de schéma ou de configuration n'est nécessaire. Déployez les fichiers du plugin normalement ; la restauration des fichiers précédents supprime les diagnostics ajoutés. L'état planifié existant est actualisé lors de la prochaine exécution.

## Comment l'outil reste sécurisé

Un outil de diagnostic s'exécute avec les privilèges du collecteur ou du serveur web et lit les chemins depuis la table des paramètres ; il doit donc faire preuve de prudence quant à ce qu'il exécute et modifie.

- Les diagnostics sont en lecture seule. Ils ne modifient jamais les fichiers, les paramètres ni les données.
- Doctor n'exécute un binaire configuré que lorsque son nom de fichier correspond au programme attendu (`php`, `rrdtool`, `snmpget` ou `snmpwalk`). Sans cela, toute personne pouvant écrire dans la table des paramètres pourrait choisir ce que Doctor exécute. Tout autre nom est signalé comme un avertissement et n'est pas exécuté.
- Doctor n'exécute jamais les binaires configurés en tant que root et signale lorsqu'il s'exécute en tant que root.
- Les réparations proviennent d'une liste d'autorisation fixe. Chacune nécessite une action d'un administrateur authentifié dans l'interface web ou l'option `--yes` en ligne de commande, et chacune est consignée dans le journal de Cacti.

## Versions

Les versions suivent le gestionnaire sémantique SemVer et correspondent au fichier `INFO` du plugin. Consultez le
[processus de publication](../../releasing.md) pour le choix des versions, les contrôles CI, le contenu
des paquets, les sommes de contrôle et les instructions de restauration.

## Installation

Téléchargez `doctor-VERSION.tar.gz` ou `doctor-VERSION.zip` ainsi que `SHA256SUMS` depuis
[GitHub Releases](https://github.com/somethingwithproof/plugin_doctor/releases).
Vérifiez la somme de contrôle SHA-256 de l'archive, puis extrayez son répertoire `doctor/` dans le
répertoire `plugins/` de Cacti. Il s'agit des paquets installables ; les archives sources automatiques
de GitHub portent un nom de répertoire différent. Pour exécuter des travaux non publiés
depuis `develop`, effectuez l'installation à partir d'une copie locale des sources.

Pour une installation depuis les sources :

Clonez ou décompressez le dépôt sous le nom `plugins/doctor` dans une installation Cacti. Le répertoire doit s'appeler `doctor`, et non `plugin_doctor`.

```console
cd /path/to/cacti/plugins
git clone https://github.com/somethingwithproof/plugin_doctor.git doctor
```

Installez et activez **Cacti Doctor** depuis **Configuration > Gestion des plugins**, puis accordez un domaine **Doctor Viewer**, **Doctor Operator** ou **Doctor Administrator** via les permissions d'utilisateur ou de groupe de Cacti. Les autorisations **Cacti Doctor** existantes conservent l'accès Administrateur après la mise à niveau. Le rapport apparaît sous **Utilitaires > Cacti Doctor**.

## Langues

Doctor est livré avec 45 catalogues de traduction non anglais sous `locales/po/` et `locales/LC_MESSAGES/`, couvrant les locales de niveau 1 élargi (`ar-SA`, `de-DE`, `es-ES`, `es-419`, `fr-FR`, `hi-IN`, `id-ID`, `it-IT`, `ja-JP`, `ko-KR`, `nl-NL`, `pl-PL`, `pt-BR`, `ru-RU`, `sv-SE`, `tr-TR`, `uk-UA`, `vi-VN`, `zh-CN`, `zh-TW`), africaines (`af-ZA`, `am-ET`, `ar-EG`, `ar-MA`, `fr-MA`, `fr-SN`, `ha-NG`, `ig-NG`, `mg-MG`, `rw-RW`, `so-SO`, `sw-KE`, `xh-ZA`, `yo-NG`, `zu-ZA`) et asiatiques (`bn-BD`, `fa-IR`, `he-IL`, `mr-IN`, `ms-MY`, `ta-IN`, `te-IN`, `th-TH`, `ur-PK`, `fil-PH`). Cacti affiche un catalogue une fois que la prise en charge linguistique est activée (**Configuration > Paramètres > Général > Prise en charge des langues**) et qu'un utilisateur sélectionne une locale que Cacti propose dans son sélecteur de langue ; les catalogues des locales qui ne figurent pas encore dans le sélecteur de Cacti prennent effet dès que Cacti les ajoute. La page web, les paramètres ainsi que les messages et le texte du rapport affichés en ligne de commande suivent la langue de Cacti ; le rapport en ligne de commande utilise quant à lui la langue par défaut de Cacti, qui reste l'anglais sauf si vous la modifiez.

Les sorties lisibles par machine ne sont jamais traduites : les identifiants de vérification, les clés JSON et les valeurs d'état, les sorties `--format=nagios` et `--format=prometheus`, les lignes de journal ainsi que les en-têtes de section du dossier de support restent en anglais afin que les scripts et la supervision continuent de fonctionner dans toutes les langues. Les textes `summary` et `detail` de chaque vérification constituent la seule partie traduite du rapport JSON.

Un catalogue en espagnol d'Amérique latine (`es-419`) est également fourni, mais ni Cacti 1.2 ni Cacti 1.3 ne propose de locale espagnole d'Amérique latine à sélectionner ; il ne prendra donc effet que lorsque Cacti en ajoutera une. D'ici là, choisissez l'espagnol (`es-ES`).

Cacti charge le catalogue d'un plugin depuis `plugins/doctor/locales/LC_MESSAGES/<locale>.mo` avec `doctor` comme domaine de texte, sur la version 1.2.x comme sur la 1.3 (la 1.3 résout le répertoire du plugin via son chemin de plugins configurable).

## Niveaux d'accès

| Domaine | Capacités |
|---|---|
| Doctor Viewer | Consulter les derniers états des vérifications planifiées, l'heure d'observation, la fraîcheur et l'historique agrégé récent. Aucune commande de diagnostic, aucun détail brut, aucune configuration ni réparation. |
| Doctor Operator | Exécuter un rapport de diagnostic avec une limite de processus de 120 secondes, inspecter les détails expurgés et acquitter les constats. Aucune modification des paramètres ni réparation. |
| Doctor Administrator | Capacités de l'opérateur, plus les réparations autorisées existantes et les paramètres de Doctor. Les réparations et les paramètres nécessitent également le domaine Paramètres/Utilitaires système de Cacti. |

Le menu Utilitaires ouvre la page correspondant au domaine Doctor le plus élevé accordé à l'utilisateur, y compris via les autorisations de groupe. Les nouveaux domaines Viewer et Operator ne reçoivent aucune attribution automatique. L'identifiant de domaine d'origine reste rattaché à `doctor.php` en tant qu'Administrateur, ce qui préserve les accès utilisateurs et groupes existants.

Les données du rôle Viewer proviennent des vérifications planifiées. Activez la planification avant d'accorder l'accès Viewer ; les observations manquantes ou dépassées affichent **inconnu**, jamais sain. L'historique conserve les 20 derniers décomptes agrégés planifiés et exclut l'état des équipements. Les opérateurs lancent explicitement de nouveaux diagnostics ; les actualisations ordinaires de la page utilisent le dernier rapport de leur session.

Les détails et totaux des équipements tiennent compte des permissions d'équipements de l'utilisateur courant. Les extraits de journaux nécessitent en plus le domaine Administration des journaux de Cacti. Les secrets sont masqués avant que les détails de diagnostic ne soient stockés dans la session web ou affichés. L'accès en ligne de commande reste régi par le compte du système d'exploitation.

Les acquittements sont personnels et consignés dans le journal de Cacti. Ils ne s'appliquent qu'au même constat et aux mêmes preuves ; toute modification des preuves exige un nouvel acquittement. Ils ne modifient jamais l'état réussite/avertissement/échec, ne suppriment pas les alertes et ne marquent jamais une vérification en échec comme saine. Cela est distinct des exceptions d'avertissements acceptés, qui affectent la politique d'alerte sans modifier l'état observé et sont décrites ci-dessous.

Chaque action nécessite une requête POST et un jeton CSRF valide. Les réparations présentent une page de confirmation distincte dotée d'un lien Annuler sans soumission de formulaire, et consignent l'utilisateur agissant ainsi que le résultat dans le journal de Cacti.

## Ligne de commande

Exécutez ces commandes depuis la racine de Cacti en tant qu'utilisateur du collecteur Cacti, et non en tant que root :

```console
php plugins/doctor/cli/doctor.php
php plugins/doctor/cli/doctor.php --json
php plugins/doctor/cli/doctor.php --repair=runtime_directories --yes
```

La sortie texte affiche une ligne par vérification avec son état, sa catégorie, son résumé et son détail. `--json` affiche un objet `summary` contenant le décompte des états ainsi qu'un tableau `checks` dont les entrées comportent `id`, `category`, `status`, `summary`, `detail`, et `repair`/`repairable` lorsqu'une réparation autorisée s'applique.

| Code de sortie | Signification |
|---|---|
| `0` | Aucune vérification n'a échoué, ou la réparation demandée a réussi. Les avertissements ne modifient pas le code de sortie. |
| `1` | Au moins une vérification a échoué, ou une réparation demandée n'a pas réussi. |
| `2` | Erreur d'utilisation : exécution d'une réparation sans `--yes` (`--preview` n'en a pas besoin), identifiant de réparation inconnu, format de sortie inconnu, combinaison `--symptom` ou format non prise en charge, ou installation Cacti introuvable. |

Cacti augmente `memory_limit` pour chaque script CLI ; la vérification de configuration d'exécution PHP n'est donc pertinente que sur la page web.

## Vérifications planifiées et alertes

Sous **Configuration > Paramètres > Doctor**, activez **Exécuter les vérifications selon une planification** et choisissez un intervalle allant de 15 minutes à une journée. Après chaque cycle du collecteur arrivé à échéance, Doctor exécute toutes les vérifications dans un processus en arrière-plan, de sorte que la durée d'exécution propre du collecteur n'est pas affectée.

Chaque exécution enregistre l'état observé de chaque vérification. Les exceptions d'avertissement actives affectent la politique d'alerte sans modifier cette observation. Lorsqu'une vérification commence ou cesse d'échouer, Doctor écrit le changement dans le journal de Cacti et, si **Adresses e-mail d'alerte** est renseigné, envoie un courriel à ces adresses via les paramètres de messagerie de Cacti. **Alerter sur les avertissements** ajoute les transitions vers et depuis les avertissements. La première exécution enregistre uniquement une référence de base.

Les rapports planifiés s'exécutent sur le collecteur principal sous un verrou consultatif de base de données et disposent d'une limite de travail de deux minutes. Doctor indique le dernier démarrage et la dernière réussite afin que les résultats manquants ou obsolètes soient visibles. Les résultats sont considérés comme à jour pendant la durée de l'intervalle plus un cycle de collecte et trois minutes. Une exécution qui ne se termine pas est relancée après 5, 10, 20 minutes et plus, jusqu'à l'intervalle normal. Les échecs d'envoi d'alerte sont conservés pour un maximum de trois nouvelles tentatives avec des délais croissants ; au-delà, corrigez les paramètres de messagerie de Cacti et exécutez `php plugins/doctor/cli/doctor.php --scheduled --retry-alerts` en tant qu'utilisateur du collecteur. L'acceptation par le serveur de messagerie ne garantit pas la livraison dans la boîte de réception.

Le même onglet définit les seuils pour la durée d'exécution du collecteur (80 % de l'intervalle), l'espace disque disponible pour les fichiers RRA (avertissement en dessous de 10 %, échec en dessous de 2 %), la dérive d'horloge de la base de données (avertissement au-delà de 5 secondes, échec au-delà de 60) et la taille du journal de Cacti (100 Mo). Les valeurs vides ou invalides reviennent à ces valeurs par défaut.

## Intégration à la supervision

```console
php plugins/doctor/cli/doctor.php --format=nagios
php plugins/doctor/cli/doctor.php --format=prometheus > /var/lib/node_exporter/textfile/cacti_doctor.prom
```

`--format=nagios` affiche une seule ligne d'état accompagnée de données de performance et se termine avec le code `0` (OK), `1` (WARNING) ou `2` (CRITICAL), ce qui permet à Nagios, Icinga ou tout système compatible de l'exécuter directement. `--format=prometheus` génère le format texte Prometheus pour le collecteur textfile de node_exporter : `cacti_doctor_check_status` par vérification (0 pour réussite ou avertissement accepté, 1 pour avertissement nécessitant une action, 2 pour échec), `cacti_doctor_check_observed_status` avant exceptions, `cacti_doctor_check_accepted`, `cacti_doctor_checks` par état et `cacti_doctor_last_run_timestamp_seconds`. Les lignes de vérification JSON incluent un champ `assessment` ; `not_assessed` signifie que la vérification n'a pas pu aboutir à une conclusion à partir des données disponibles.

## Dossier de support

```console
php plugins/doctor/cli/doctor.php --bundle=/tmp/cacti-doctor.txt
```

Le dossier est un fichier texte unique contenant les versions de Doctor, Cacti, PHP, du système d'exploitation et de la base de données, les statistiques du collecteur et de Boost, le rapport complet et les 200 dernières lignes du journal de Cacti. Les valeurs qui suivent les noms de mots de passe, secrets, jetons, communautés et clés sont masquées. Doctor crée le fichier en lecture seule pour son propriétaire uniquement et refuse d'écraser un fichier existant. Vérifiez-le avant de le publier quelque part.

## Politique de réparation

Doctor inclut une seule réparation, `runtime_directories`. Elle crée les répertoires d'exécution Cacti manquants et ajoute les droits de lecture, d'écriture et d'exécution pour le propriétaire sans supprimer les permissions existantes.

Elle cible `$cache_path`, `$log_path` et `$rra_path` sous Cacti 1.3, ou sinon les répertoires `cache`, `log` et `rra` de l'installation. Elle ignore les répertoires déjà accessibles en écriture, refuse les répertoires situés en dehors de l'installation Cacti (comme un répertoire de journaux sous `/var/log`), refuse les liens symboliques et refuse de s'exécuter en tant que root. Elle ne suit jamais `path_cactilog`, de sorte qu'un fichier journal configuré dans un répertoire de code ne peut pas y rediriger la réparation. Le diagnostic vérifie tout de même le répertoire du fichier journal configuré sur chaque version.

Elle ne modifie pas la propriété des fichiers, n'exécute pas de commandes shell, ne réécrit pas la configuration et ne modifie pas les données applicatives de Cacti. Chaque nouvelle réparation doit inclure un diagnostic, un gestionnaire autorisé par liste blanche, une confirmation, une journalisation d'audit et des tests.

## Analyse des symptômes

Les opérateurs et les administrateurs peuvent sélectionner **Analyser un symptôme** sur la page Doctor. Les mêmes règles sont disponibles via `--symptom=graphs_stopped`, `slow_polling`, `devices_missing` ou `alerts_missing`, avec une sortie texte ou JSON. Les dossiers de support incluent les analyses de symptômes pertinentes.

Chaque piste répertorie les vérifications observées ainsi qu'une prochaine étape de vérification. Les pistes constituent des hypothèses, et non des causes racines confirmées. Des observations manquantes, non évaluées ou obsolètes n'établissent jamais une cause. Les analyses via l'interface Web utilisent le rapport filtré selon les permissions ; les rapports CLI utilisent les accès du compte du système d'exploitation.

## Fraîcheur des mises à jour RRD

`filesystem.rrd_stale` vérifie jusqu'à 500 sources de données actives, en excluant les équipements désactivés et hors service. Sur les installations plus volumineuses, l'échantillon change toutes les heures, de sorte que des exécutions répétées couvrent différents fichiers. Il compare les dates de modification des fichiers à la plus grande valeur entre l'intervalle du poller, le pas RRD source et le pas du profil, multipliée par **RRD Stale Intervals** (3 par défaut). Il affiche les trois fichiers obsolètes les plus anciens ainsi que le nombre d'équipements affectés. Les résultats Web n'incluent que les équipements autorisés.

`filesystem.rrd_files` est une vérification d'existence distincte. Elle recherche le fichier RRD de jusqu'à 5 000 sources de données actives, y compris celles des équipements désactivés ou hors service, et utilise le même échantillon horaire.

Boost ajoute le double de son intervalle de vidage configuré comme marge d'écriture sur disque. Pour un autre mécanisme d'écriture différée, configurez **Deferred RRD Write Allowance (seconds)**. Une variable `RRDCACHED_ADDRESS` annoncée sans marge configurée, ou un intervalle Boost invalide, produit un résultat non évalué. Doctor ne vide jamais un cache pour effectuer cette vérification. L'heure de modification témoigne d'une activité disque, et non d'une collecte de données réussie. Toute mise en cache externe que Doctor ne peut pas détecter doit être configurée explicitement.

Les fichiers manquants, illisibles ou datés dans le futur sont comptabilisés dans les détails. Le résultat n'est non évalué que lorsqu'aucun fichier échantillonné n'est lisible. Un résultat échantillonné indique qu'il ne couvre qu'une partie de l'installation ; un succès ne couvre pas les fichiers non échantillonnés.

## Aperçus de réparation et historique d'audit

La page de réparation administrateur affiche chaque chemin concerné, l'action proposée, les permissions actuelles et les permissions cibles. L'approbation est liée à cet aperçu, à l'utilisateur qui agit et à une durée de validité de cinq minutes. La confirmation consomme l'aperçu ; toute modification du système de fichiers nécessite un nouvel aperçu. L'exécution en tant que root, les chemins situés hors de l'installation, les liens nécessitant une réparation et les permissions insuffisantes sur le système de fichiers empêchent l'approbation.

`--repair=runtime_directories --preview` affiche un plan JSON en lecture seule. `--repair=runtime_directories --yes` approuve un plan CLI fraîchement calculé et le revérifie avant son exécution. Le compte CLI doit déjà être autorisé à réparer l'installation ; il n'hérite pas des rôles Web.

Un enregistrement structuré `repair.started` doit être enregistré avant toute modification du système de fichiers. Un enregistrement lié `repair.completed` contient l'instantané post-réparation et le résultat de la vérification. Une opération interrompue laisse un enregistrement de démarrage à des fins d'investigation. Un échec de l'audit de fin est signalé comme un échec même si des modifications du système de fichiers ont eu lieu. Doctor ajoute des permissions au propriétaire et crée des répertoires ; il ne tente pas de restauration automatique.

Les administrateurs disposant de la permission Settings/System Utilities de Cacti peuvent consulter les 20 dernières entrées d'audit sur la page Doctor. Le plugin conserve les 200 derniers enregistrements dans `plugin_doctor_audit` ; le journal Cacti consigne également leurs identifiants, actions et acteurs. Les données utiles d'audit sont expurgées.

## Avertissements acceptés

Les administrateurs disposant de la permission Settings/System Utilities de Cacti peuvent créer une **exception d'avertissement** à partir d'un avertissement récent et évalué sur la page Doctor. Une exception exige un responsable, un motif et une date de révision UTC dans les 90 jours. Elle expire à minuit UTC au début de cette date. Jusqu'à 100 exceptions peuvent être configurées. La liste affiche les entrées expirées ainsi que les identifiants absents du rapport actuel, et permet leur suppression.

L'avertissement observé reste visible, avec son responsable, son motif et sa date d'expiration dans les détails du diagnostic. Le format JSON conserve le statut observé et ajoute les métadonnées `accepted` et `acceptance`. Nagios exclut les avertissements acceptés actifs de sa sévérité de sortie, mais les nomme dans sa sortie. Prometheus exporte à la fois la sévérité observée et la sévérité exploitable. Le code de sortie CLI standard reste inchangé : les avertissements retournent déjà zéro et les échecs retournent un.

Les alertes d'avertissement planifiées sont supprimées tant que l'exception s'applique ; l'expiration ou la suppression rend un avertissement persistant de nouveau éligible aux alertes d'avertissement. Les passages en échec et les retours à la normale après un échec restent éligibles aux alertes. Un résultat non évalué ou un échec ne peut pas être accepté. L'acquittement personnel est distinct et ne supprime rien. La création et la suppression d'une exception sont transactionnelles avec l'enregistrement d'audit.

La mise à niveau crée `plugin_doctor_audit` et `plugin_doctor_acceptance` sans modifier les données applicatives de Cacti. Exportez tout historique nécessaire avant de désinstaller : la désinstallation supprime les deux tables du plugin ainsi que ses paramètres. Le retour à une version antérieure des fichiers du plugin laisse les tables disponibles pour investigation, mais les anciennes versions ne tiennent pas compte des exceptions d'avertissement.

## Prérequis

| Cacti | PHP | Remarques |
|---|---|---|
| 1.2.20 | 5.4 ou ultérieur | Le propre code de Doctor est compatible avec PHP 5.4 afin de pouvoir diagnostiquer les systèmes anciens avant une mise à niveau |
| 1.2.31 | 8.0 ou ultérieur | Le fichier `composer.json` de Cacti requiert `>=8.0` |
| 1.2.x actuel | 8.2 ou ultérieur | Le fichier `composer.json` de Cacti requiert `>=8.2` |
| `develop` (1.3) | 8.3 ou ultérieur | Le fichier `composer.json` de Cacti requiert `^8.3` |

La ligne **Compatibilité PHP avec le Cacti installé** compare la version PHP en cours d'exécution avec le prérequis PHP du fichier `composer.json` racine de Cacti, y compris la borne supérieure d'une contrainte circonflexe telle que `^8.3`. L'exécutable PHP CLI configuré est vérifié par rapport au même prérequis. Doctor reconnaît les formes de contrainte `>=` et `^` utilisées par ces paquets Cacti. Un prérequis illisible, mal formé, manquant ou non reconnu produit un avertissement ; les installations Cacti 1.2.20–1.2.30 sans manifeste conservent leur seuil minimal documenté de PHP 5.4 à l'installation. La propre compatibilité PHP 5.4 de Doctor n'établit pas de compatibilité avec une installation Cacti plus récente.

La ligne **Support de sécurité PHP en amont** répond à une question distincte : cette branche de version PHP reçoit-elle encore des correctifs de sécurité de la part du projet PHP ? Elle indique la date de fin de support de sécurité publiée pour la branche et émet un avertissement après cette date. Par exemple, PHP 8.1 peut satisfaire au prérequis d'exécution d'une ancienne installation Cacti tout en ne recevant plus de correctifs de sécurité en amont. Un résultat positif ne signifie pas que la version corrective installée est à jour, et Doctor ne peut pas déterminer si un éditeur de système d'exploitation fournit des correctifs rétroportés.

Les dates de support sont intégrées à Doctor d'après le [calendrier de support PHP](https://www.php.net/supported-versions.php) et la [liste de fin de vie](https://www.php.net/eol.php), vérifiés pour la dernière fois le 2026-11-08. Les branches inconnues et les préversions produisent un avertissement plutôt qu'un succès présumé. Aucune requête réseau n'est effectuée lors des diagnostics. Mettez à jour les données de support de Doctor lorsque PHP publie un nouveau calendrier. Les identifiants JSON/de supervision existants `php.version` et `php.security_baseline` restent inchangés.

## Développement

La suite de tests unitaires utilise Pest et s'exécute sur PHP 8.2 ou ultérieur :

```console
composer install
composer test
```

Les tests remplacent les fonctions Cacti appelées par Doctor par de petits bouchons dans `tests/CactiStubs.php`, ce qui leur permet de s'exécuter sans installation Cacti.

GitHub Actions exécute quatre types de vérifications à chaque push et pull request :

- `php -l` sur chaque fichier PHP sous PHP 5.4, 5.6, 7.0, 7.1, 7.4 et 8.0 à 8.4.
- La suite de tests unitaires sous PHP 8.2, 8.3 et 8.4.
- `locales/build_gettext.sh --check`, qui échoue en cas de modèle de traduction obsolète, de catalogue incomplet ou flou, ou de catalogue compilé différant de sa source.
- Sept tâches d'intégration qui installent Cacti 1.2.20, la branche 1.2.x actuelle et `develop` avec MySQL et MariaDB, ainsi qu'avec cmd.php et Spine. Chaque tâche installe et active le plugin, exécute le rapport CLI complet et vérifie le schéma du rapport, les totaux récapitulatifs, les statuts attendus et l'ensemble exact des échecs. Elle casse ensuite un chemin de binaire et l'horodatage du poller, confirme que les deux sont signalés, les restaure, teste la réparation et sa confirmation, puis exécute la désactivation, l'activation, la désinstallation et la réinstallation. Le rapport JSON est conservé en tant qu'artefact lorsqu'une tâche échoue.

## Contribution

Les pull requests ciblent `develop`. Maintenez la compatibilité des fichiers de production avec PHP 5.4 et respectez le style de Cacti : tabulations, chaînes entre guillemets simples et fonctions utilitaires de Cacti telles que `read_config_option()` et `db_fetch_cell()`. Ajoutez un test unitaire pour chaque modification de comportement, signez vos commits (`git commit -s`) et ajoutez une ligne dans `CHANGELOG.md`.

### Traductions

Encapsulez chaque message visible par l'utilisateur dans `__('...', 'doctor')` (ou `__n()`, `__x()`, `__esc()`), et donnez à toute phrase contenant une valeur une seule chaîne de formatage avec des marqueurs séquentiels `%s`/`%d` plutôt que de concaténer des fragments. La fonction `__()` de Cacti ne formate un message que lorsqu'il contient un spécificateur de format et ne prend pas en charge les formes positionnelles `%1$s`. Elle convertit également `%%` en `%` avant le formatage ; n'incluez donc jamais de signe pourcentage littéral dans un message : passez la valeur avec son signe en argument (`__('Usage: %s', '50%', 'doctor')`). Les lignes de journal restent en anglais : utilisez `doctor_repair_message()` pour les textes de réparation et `doctor_n_()` pour les messages qui sont journalisés et traduits uniquement lors de leur affichage. Laissez les identifiants de vérification, les clés JSON, les mots-clés d'état, les sorties de supervision et les lignes de journal non traduits.

`locales/build_gettext.sh` régénère le modèle `locales/po/cacti.pot`, le fusionne dans chaque catalogue `locales/po/<locale>.po` et compile `locales/LC_MESSAGES/<locale>.mo` ; commitez les trois. La CI exécute `sh locales/build_gettext.sh --check`, qui échoue si le modèle est obsolète, si un catalogue comporte une entrée manquante ou approximative (fuzzy), si un marqueur diffère ou si un fichier compilé n'est pas à jour. Un message modifié nécessite donc la mise à jour de ses traductions dans la même pull request. Ce script requiert GNU gettext (`xgettext`, `msgmerge`, `msgfmt`, `msgunfmt`). Une nouvelle langue correspond à un nouveau fichier `<locale>.po` nommé selon la convention de Cacti pour les paramètres régionaux (par exemple `pt-BR`).

## Sécurité

Signalez les vulnérabilités en privé comme indiqué dans [SECURITY.md](../../../SECURITY.md), et non dans des tickets publics.

## Licence

Copyright (C) 2026 Thomas Vincent. Distribué sous la licence GNU General Public License, version 2 ou ultérieure. Voir [LICENSE](../../../LICENSE).
