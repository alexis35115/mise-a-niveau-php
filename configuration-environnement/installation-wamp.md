# Bitnami WAMP Stack

[Bitnami WAMP Stack](https://bitnami.com/stack/wamp) fournis un environnement de développement WAMP complet, entièrement intégré et prêt à fonctionner. Outre PHP, MySQL et Apache, il inclut également phpMyAdmin.

## Téléchargement

Pour installer Bitnami, il faut aller [ici](https://bitnami.com/stack/wamp/installer), cliquez sur le bouton "_Download for Windows_", suite au téléchargement, procédez à l'installation via l'installateur.

## Configurer son environnement

À titre indicatif, l'application devrait s'installer sous le répertoire "C:\Bitnami". Voici les manipulations à effectuer :

- Créer un raccourci du répertoire "htdocs" qui se trouve sous "C:\Bitnami\wampstack-[VERSION]\apache2" et mettre ce raccourci à la racine de Bitnami ("C:\Bitnami\").
- Dans le répertoire "htdocs", créer un répertoire "bitnami" et y insérer le contenu de base du répertoire "htdocs" à l'intérieur.
- Dans le but de faciliter le développement, il faut désactiver la "cache" par défaut qui est configuré dans Bitnami. Si la cache est activée, lors d'une modification à vos applications, celle-ci ne sera pas immédiatement reflétée dans vos applications. Il faut ouvrir le fichier "C:\Bitnami\wampstack-[VERSION]\php\php.ini" avec un éditeur de texte et rechercher la configuration "opcache.enable" et lui donner la valeur de "0" (désactivée) au lieu de "1" (activée), n'oubliez pas d'enregistrer le fichier avant sa fermeture.

## Exemple d'utilisation

Pour valider votre configuration, ouvrez un navigateur et naviguez à l'adresse : <http://localhost/bitnami/index.html>, vous devriez apercevoir la page par défaut de Bitnami. Prendre note que dans l'adresse du site, il y a "bitnami", celui-ci représente le répertoire créé dans la configuration un peu plus tôt. Donc, nous allons faire un test, créer un répertoire avec le nom de "php" dans le dossier "htdocs". Dans le répertoire "php", il faut créer le fichier "index.php" et y insérer le code suivant :

``` php
<?php
    echo("test de ma configuration");
?>
```

Vous devriez maintenant être en mesure de naviguer à l'adresse : <http://localhost/php/index.php> et voir le texte "test de ma configuration" à l'écran de votre navigateur.

[Revenir à la page principale de la section](README.md)
