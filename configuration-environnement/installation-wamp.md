# Bitnami WAMP Stack

[Bitnami WAMP Stack](https://bitnami.com/stack/wamp) fournis un environnement de développement WAMP complet, entièrement intégré et prêt à fonctionner. Outre PHP, MySQL et Apache, il inclut également phpMyAdmin.

Une vidéo expliquant l'installation et la configuration de Bitnami WAMP Stack est disponible. VIDEO À METTRE ICI.

## Téléchargement et installation

Pour installer Bitnami, allez [ici](https://bitnami.com/stack/wamp/installer) et cliquez sur "_Download for Windows_".

![Téléchargement de Bitnami pour Windows](../images/download-for-windows-bitnami.PNG)

Une fênetre de connexion s'affichera, vous n'avez qu'à cliquer suite "_No thanks, just take me to the download_" pour lancer le téléchargement.

![Connexion à Bitnami](../images/connexion-bitnami.PNG)

## Installation

Lorsque le téléchargement est complété, lancez l'installateur.

Lors de l'installation, vous aurez à choisir les composants à installer, assurez-vous que "__PhpMyAdmin__" est sélectionné. Notez que si vous n'avez pas besoin des autres composants, vous n'avez qu'à désélectionner ces options.

![Options à sélectionner lors de l'installation de Bitnami](../images/options-installation-bitnami.PNG)

Vous devez préciser le dossier d'installation de Bitnami, utiliser la valeur __"C:\Bitnami\wampstack"__.

![Dossier d'installation de Bitnami lors de l'installation](../images/dossier-installation-bitnami.PNG)

Vous aurez à saisir un mot de passe pour l'utilisateur __root__ de la base de données. Assurez-vous de saisir un mot de passe et de __prendre celui-ci en note__!

![Création du mot de passe pour le compte root de la base de données.](../images/creation-pw-root.PNG)

Faire attention à __ne pas__ sélectionner _Launch wampstack in the cloud with Bitnami_.

![Refuser la configuration du cloud pour wampstack](../images/cloud-wampstack.PNG)

## Configuration de son environnement

Suite à l'installation, Bitnami devrait s'installer sous le répertoire __"C:\Bitnami"__.

Voici certaines manipulations à effectuer :

- Créer un raccourci du répertoire __htdocs__ qui se trouve sous __"C:\Bitnami\wampstack\apache2"__ et mettre ce raccourci à la racine de Bitnami __"C:\Bitnami\"__.
- Dans le répertoire __htdocs__, créez un répertoire __bitnami__ et y insérer le contenu de base du répertoire __htdocs__ à l'intérieur. Vous devriez être en mesure de consulter la page de Bitnami à l'adresse <http://127.0.0.1:81/bitnami/>.
- Dans le but de faciliter le développement en local, il vous faut désactiver le __cache__ par défaut. Lorsque le cache est activé, les modifications à vos applications ne seront pas immédiatement reflétées dans vos applications. Ouvrez le fichier __"C:\Bitnami\wampstack\php\php.ini"__ et changez la configuration __opcache.enable__ pour lui donner la valeur de __0__ (désactivé) au lieu de __1__ (activé), n'oubliez pas d'enregistrer le fichier avant sa fermeture.

## Première utilisation

Créons un répertoire __"exemple"__ dans le répertoire __"htdocs"__. Dans ce répertoire, créez un fichier __"index.php"__ et y insérer le code suivant :

``` php
<?php
    phpinfo();
?>
```

Vous devriez maintenant être en mesure de naviguer à l'adresse : <http://localhost:81/exemple/index.php> et voir devriez voir  les informations sur la configuration de PHP.

![Configuration de PHP](../images/configuration-php.PNG)

[Revenir à la page principale de la section](README.md)
