# Les variables

Dans cette section, nous allons apprendre comment pouvons-nous créer les différents types de variables en PHP.

## Constantes

Une constante est un identifiant (un nom) qui représente une valeur simple. Comme son nom le suggère, cette valeur ne peut jamais être modifiée durant l'exécution du script (sauf les constantes magiques). Par défaut, le nom d'une constante est sensible à la casse. Par convention, les constantes sont toujours en majuscules.

Exemples :

```php
// à l'intérieur d'une classe
class Constants
{
    const AGE_LEGAL_ACHAT_ALCOOL = 18;

    public static function obtenirAgeLegaleAchatAlcool()
    {
        return self::AGE_LEGAL_ACHAT_ALCOOL;
    }
}

// à l'extérieur d'une classe
define('AGE_LEGAL_ACHAT_ALCOOL', 18);
```

## Booléen

C'est le type le plus simple. Un booléen représente une valeur de vérité. Il peut valoir TRUE ou FALSE.

> **Astuces** : il est jugé une bonne pratique de préfixer une variable booléenne par "est"

Exemples :

```php
$estMajeur = false;
$estValide = true;
```

## Les entiers

Un entier est un nombre appartenant à la classe ℤ = {..., -2, -1, 0, 1, 2, ...}.

Exemple :

```php
$nombreEntier = 18;
```

## Nombres à virgules flottantes

Les nombres à virgule flottante (aussi connus comme "floats", "doubles", ou "real numbers") peuvent être spécifiés en utilisant les syntaxes.

Exemple :

```php
$moyenneAuCours = 89.50;
```

## Les chaînes de caractères

Une chaîne de caractères est une série de caractères, où un caractère est la même chose qu'un octet. De ce fait, PHP ne supporte que les jeux de caractères comportant 256 caractères différents, et, donc, n'a pas de support natif pour l'Unicode. Reportez-vous aux détails sur le type chaîne de caractères pour plus d'informations.

Exemples :

```php
echo('ceci est une chaîne simple');

echo('Vous pouvez également ajouter des nouvelles lignes
dans vos chaînes
de cette façon');

// Affiche : Arnold a dit : "I'll be back"
echo('Arnold a dit : "I\'ll be back"');

// Affiche : Voulez-vous supprimer C:\*.*?
echo('Voulez-vous supprimer C:\\*.*?');

// Affiche : Voulez-vous supprimer C:\*.*?
echo('Voulez-vous supprimer C:\*.*?');

// Affiche : Ceci n'affichera pas \n de nouvelle ligne
echo('Ceci n\'affichera pas \n de nouvelle ligne');

// Affiche : Les variables ne seront pas $traitees $ici
echo('Les variables ne seront pas $traitees $ici');
```

## Les tableaux

Un tableau en PHP est en fait une carte ordonnée. Une carte est un type qui associe des valeurs à des clés. Ce type est optimisé pour différentes utilisations ; il peut être considéré comme un tableau, une liste, une table de hashage, un dictionnaire, une collection, une pile, une file d'attente et probablement plus. On peut avoir, comme valeur d'un tableau, d'autres tableaux, multidimensionnels ou non. La structure de ces données dépasse l'objet de ce manuel, mais vous trouverez au moins un exemple pour chacun des cas évoqués. Pour plus d'informations, reportez-vous aux différentes explications sur le sujet que l'on trouve sur le web.

Exemples :

```php
// Comment créer un tableau vide
$tableauVide = [];

// Comment créer un tableau avec des valeurs simples
$tableauAvecValeurs = [1,2,3];

// On peut insérer des valeurs de types différents
$tableauAvecValeursTypesDifferents = [1, "deux", 4]
```

## NULL

La valeur spéciale NULL représente une variable sans valeur. NULL est la seule valeur possible du type null.

Exemple :

```php
$valeur = NULL;
```

[Revenir à la page principale de la section](README.md)
