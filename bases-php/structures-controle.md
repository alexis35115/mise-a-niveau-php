# Les structures de contrôle

## Condition SI et SI-SINON

L'instruction [if](https://www.php.net/manual/fr/control-structures.if.php) est une des plus importantes instructions de tous les langages, PHP inclus. Elle permet l'exécution conditionnelle d'une partie de code. Les fonctionnalités de l'instruction if sont les mêmes en PHP qu'en C.

> **Astuce** : voici les opérateurs possibles : "==", ">", "<", "!==", ">=", "<=".

Exemple :

```php
<?php
$nombre1 = 19;
$nombre2 = 18;

if ($nombre1 > $nombre2) {
    echo("vrai - 19 est plus grand que 18");
}
else{
    echo("faux");
}

// Valider une égalité, il faut utiliser "==" au lieu de "="
$nombre3 = 18;
$nombre4 = 18;

if ($nombre3 == $nombre4) {
    echo("vrai - les deux nombres sont égaux.");
}
?>
```

## Condition elseif

[elseif](https://www.php.net/manual/fr/control-structures.elseif.php), comme son nom l'indique, est une ]combinaison de if et de else. Comme l'expression else, il permet d'exécuter une instruction après un if dans le cas où le "premier" if est évalué comme false. Mais, à la différence de l'expression else, il n'exécutera l'instruction que si l'expression conditionnelle elseif est évaluée comme true.

Exemple :

```php
<?php
if ($a > $b) {
    echo("a est plus grand que b");
} elseif ($a == $b) {
    echo("a est égal à b");
} else {
    echo("a est plus petit que b");
}
?>
```

## Instruction switch

L'instruction [switch](https://www.php.net/manual/fr/control-structures.switch.php) équivaut à une série d'instructions if. En de nombreuses occasions, vous aurez besoin de comparer la même variable (ou expression) avec un grand nombre de valeurs différentes, et d'exécuter différentes parties de code suivant la valeur à laquelle elle est égale. C'est exactement à cela que sert l'instruction switch.

Exemple :

```php
<?php
if ($i == 0) {
    echo "i égal 0";
} elseif ($i == 1) {
    echo "i égal 1";
} elseif ($i == 2) {
    echo "i égal 2";
}

switch ($i) {
    case 0:
        echo("i égal 0");
        break;
    case 1:
        echo("i égal 1");
        break;
    case 2:
        echo("i égal 2");
        break;
}
?>
```

## Opérateur for

Les boucles for sont les boucles les plus complexes en PHP. Elles fonctionnent comme les boucles for du langage C. La syntaxe des boucles for est la suivante :

```txt
for (expr1; expr2; expr3)
    commandes
```

La première expression (expr1) est évaluée (exécutée), quoi qu'il arrive au début de la boucle.

Au début de chaque itération, l'expression expr2 est évaluée. Si l'évaluation vaut __true__, la boucle continue et les commandes sont exécutées. Si l'évaluation vaut __false__, l'exécution de la boucle s'arrête.

À la fin de chaque itération, l'expression expr3 est évaluée (exécutée).

Les expressions peuvent éventuellement être laissées vides ou peuvent contenir plusieurs expressions séparées par des virgules. Dans expr2, toutes les expressions séparées par une virgule sont évaluées, mais le résultat est obtenu depuis la dernière partie. Si l'expression expr2 est laissée vide, cela signifie que c'est une boucle infinie (PHP considère implicitement qu'elle vaut __true__, comme en C). Cela n'est pas vraiment très utile, à moins que vous souhaitiez terminer votre boucle par l'instruction conditionnelle [break](https://www.php.net/manual/fr/control-structures.break.php).

Exemple :

```php
<?php
/* exemple 1 */
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

/* exemple 2 */
for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}

/* exemple 3 */
$i = 1;
for (; ; ) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}

/* exemple 4 */
for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);
?>
```

## Opérateur while

La boucle [while](https://www.php.net/manual/fr/control-structures.while.php) est le moyen le plus simple d'implémenter une boucle en PHP. Cette boucle se comporte de la même manière qu'en C. L'exemple le plus simple d'une boucle while est le suivant :

```txt
while (expression)
    commandes
```

La signification d'une boucle while est très simple. PHP exécute l'instruction tant que l'expression de la boucle while est évaluée comme __true__. La valeur de l'expression est vérifiée à chaque début de boucle, et, si la valeur change durant l'exécution de l'instruction, l'exécution ne s'arrêtera qu'à la fin de l'itération (chaque fois que PHP exécute l'instruction, on appelle cela une itération). Si l'expression du while est __false__ avant la première itération, l'instruction ne sera jamais exécutée.

Exemple :

```php
<?php
$i = 1;
while ($i <= 10) {
    echo $i++;  /* La valeur affichée est $i avant l'incrémentation
                   (post-incrémentation)  */
}
?>
```

## Opérateur foreach

La structure de langage [foreach](https://www.php.net/manual/fr/control-structures.foreach.php) fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée. Il existe deux syntaxes :

```txt
foreach (iterable_expression as $value){
    //commandes
}

foreach (iterable_expression as $key => $value){
    //commandes
}
```

La première forme passe en revue le tableau iterable_expression. À chaque itération, la valeur de l'élément courant est assignée à $value.

La seconde forme assignera en plus la clé de l'élément courant à la variable $key à chaque itération.

Il est possible de personnaliser l'itération sur des objets.

Vous pouvez modifier facilement les éléments d'un tableau en précédent $value d'un &. Ceci assignera une référence au lieu de copier la valeur.

Exemple :

```php
<?php
$tableau = array(1, 2, 3, 4);
foreach ($tableau as &$valeur) {
    $valeur = $valeur * 2;
}
?>
```

## Référence

- <https://www.php.net/manual/fr/language.control-structures.php>

[Revenir à la page principale de la section](README.md)
