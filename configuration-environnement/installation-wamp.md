# Bitnami WAMP Stack

[Bitnami WAMP Stack](https://bitnami.com/stack/wamp) fournis un environnement de développement WAMP complet, entièrement intégré et prêt à fonctionner. Outre PHP, MySQL et Apache, il inclut également phpMyAdmin.

## Vidéo synthèse de la section

Vous pouvez regarder la vidéo suivante VIDEO À METTRE ICI.

## Téléchargement et installation

Pour installer Bitnami, allez [ici](https://bitnami.com/stack/wamp/installer) et cliquez sur "_Download for Windows_".

![Téléchargement de Bitnami pour Windows](../images/download-for-windows-bitnami.PNG)

Une fênetre de connexion s'affichera, vous n'avez qu'à cliquer suite "_No thanks, just take me to the download_" pour lancer le téléchargement de l'installateur.

![Connexion à Bitnami](../images/connexion-bitnami.PNG)

## Installation

Lorsque le téléchargement est complété, procédez à l'installation en lançant l'installateur.

Lors de l'installation, vous aurez à choisir les composants à installer, assurez-vous que "__PhpMyAdmin__" est sélectionné. Notez que si vous n'avez pas besoin des autres composants, vous n'avez qu'à désélectionner ces options.

![Options à sélectionner lors de l'installation de Bitnami](../images/options-installation-bitnami.PNG)

Vous devez préciser le dossier d'installation de Bitnami, utiliser la valeur __"C:\Bitnami\wampstack"__.

![Dossier d'installation de Bitnami lors de l'installation](../images/dossier-installation-bitnami.PNG)

Vous aurez à saisir un mot de passe pour l'utilisateur __root__ de la base de données. Assurez-vous de mettre un mot de passe et de __prendre celui-ci en note__!

![Création du mot de passe pour le compte root de la base de données.](../images/creation-pw-root.PNG)

Faire attention à __ne pas__ sélectionner _Launch wampstack in the cloud with Bitnami_.

![Refuser la configuration du cloud pour wampstack](../images/cloud-wampstack.PNG)

## Configuration de son environnement

Suite à l'installation, l'application devrait s'installer sous le répertoire "C:\Bitnami".

Voici certaines manipulations à effectuer :

- Créer un raccourci du répertoire __htdocs__ qui se trouve sous __"C:\Bitnami\wampstack-[VERSION]\apache2"__ et mettre ce raccourci à la racine de Bitnami __"C:\Bitnami\"__.
- Dans le répertoire __htdocs__, créez un répertoire __bitnami__ et y insérer le contenu de base du répertoire __htdocs__ à l'intérieur.
- Dans le but de faciliter le développement, il vous faut désactiver le __cache__ par défaut. Si le cache est activé, lors d'une modification à vos applications, celle-ci ne sera pas immédiatement reflétée dans vos applications. Ouvrez le fichier __"C:\Bitnami\wampstack-[VERSION]\php\php.ini"__ avec un éditeur de texte et rechercher la configuration __opcache.enable__ et lui donner la valeur de __0__ (désactivé) au lieu de "1" (activé), n'oubliez pas d'enregistrer le fichier avant sa fermeture.

## Première utilisation

Pour valider votre configuration, ouvrez un navigateur et naviguez à l'adresse : <http://localhost/bitnami/index.html>, vous devriez apercevoir la page par défaut de Bitnami. Prendre note que dans l'adresse du site, il y a "bitnami", celui-ci représente le répertoire créé dans la configuration un peu plus tôt. Donc, nous allons faire un test, créer un répertoire avec le nom de "php" dans le dossier "htdocs". Dans un répertoire "exemple", crée un fichier "index.php" et y insérer le code suivant :

``` php
<?php
    echo("test de ma configuration");
?>
```

Vous devriez maintenant être en mesure de naviguer à l'adresse : <http://localhost/exemple/index.php> et voir "__test de ma configuration__" à l'écran de votre navigateur.

[Revenir à la page principale de la section](README.md)
