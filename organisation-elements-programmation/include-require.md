# Inclusion de fichiers

En pratique, lorsque l'on créer un site web, les contenus communs à toutes les pages sont enregistrés dans différents fichiers (entête de page, pied de page, menu principal...). Lorsque de la création d'une nouvelle page, on peut appeler ces fichiers et les placer au bon endroit grâce à la fonction __include()__ ou __require()__.

Par exemple :

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple d'inclure</title>
</head>
<body>

<?php include("entete.php"); ?>
<?php include("menu.php"); ?>
<p>Contenu dans la page</p>
<?php include("pied.php"); ?>

</body>
</html>
```

Aux endroits où les fichiers sont inclus, PHP va prendre le contenu de ces fichiers pour les annexer à la page. Cela permet non seulement de gagner du temps, mais surtout de pouvoir rapidement modifier toutes les pages lors d'une modification à ces parties communes.

## Différence entre l'instruction __include()__ et l'instruction __require()__

La grande différence est l'instruction __require()__ et de l'instruction __include()__ est au niveau de la gestion d'erreur. L'instruction __include()__ renvoi qu’un avertissement (_warning_) en cas d’erreur, alors que l'instruction __require()__ provoquera une erreur __fatale__ qui empêchera l’exécution des scripts subséquent.

## Inclusion avec l'instruction __include_once()__ et avec l'instruction __require_once()__

D'autres fonctions existent pour inclure des fichiers, __include_once()__ et __require_once()__. Le comportement est sensiblement similaire à __include()__ et __require()__, mais la différence est que si le code a déjà été inclus, il ne le __sera pas une seconde fois__.

[Revenir à la page principale de la section](README.md)
