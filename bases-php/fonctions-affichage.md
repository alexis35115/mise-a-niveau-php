# Fonctions d’affichage

## echo

La fonction [echo](https://www.php.net/manual/fr/function.echo.php) affiche une chaîne de caractères.

echo n'est pas vraiment une fonction (c'est techniquement une structure du langage), cela fait que vous n'êtes pas obligé d'utiliser des parenthèses. echo (contrairement à d'autres structures de langage) ne se comporte pas comme une fonction, il ne peut donc pas être utilisé dans le contexte d'une fonction. De même, si vous voulez passer plusieurs paramètres à echo, les paramètres ne doivent pas être entourés de parenthèses.

echo dispose aussi d'une version courte, où vous pouvez faire suivre la balise PHP ouvrante d'un signe égal (=). Avant PHP 5.4.0, cette syntaxe n'était possible que si la directive de configuration short_open_tag était activée.

```php
J'ai <?=$foo?> foo.
```

La plus grosse différente avec print est que echo accepte une liste d'arguments et ne retourne aucune valeur.

Exemple :

```php
<?php
echo "Bonjour le monde";

// Si vous n'utilisez pas d'autres caractères,
// vous pouvez afficher plusieurs variables
// en les séparant par des virgules
echo $foo;          // foobar
echo $foo,$bar;     // foobarbarbaz

// Les chaînes peuvent être passées individuellement comme arguments multiples ou
// concaténées et passées comme un seul argument
echo 'Cette ', 'chaîne ', 'a été ', 'faite ', 'avec plusieurs paramètres.', chr(10);
echo 'Cette ' . 'chaîne ' . 'a été ' . 'faite ' . 'à l\'aide de la concaténation.' . "\n";

// Parce que echo() ne se comporte pas comme une fonction, le code suivant est invalide.
($some_var) ? echo 'true' : echo 'false';

// Cependant, les exemples suivants sont valides :
($some_var) ? print 'Oui' : print 'Non'; // print est aussi une structure de langage,
                                         // mais il se comporte comme une fonction, donc,
                                         // il peut être utilisé dans ce contexte.

echo $some_var ? 'Oui': 'Non'; // échanger la déclaration
?>
```

## printf

La fonction [printf](https://www.php.net/manual/fr/function.printf.php) affiche une chaîne de caractères formatée.

La chaîne de format est composée de zéro ou plusieurs directives : des caractères ordinaires (à l'exception de %) qui sont copiés directement dans le résultat et des spécifications de conversion, chacun ayant pour résultat de récupérer ses propres paramètres.

Exemple :

```php
<?php
$n =  43951789;
$u = -43951789;
$c = 65; // ASCII 65 is 'A'

// notez le double %%, cela affiche un caractère '%' littéral
printf("%%b = '%b'\n", $n); // représentation binaire
printf("%%c = '%c'\n", $c); // affiche le caractère ascii, comme la fonction chr()
printf("%%d = '%d'\n", $n); // représentation standard d'un entier
printf("%%e = '%e'\n", $n); // notation scientifique
printf("%%u = '%u'\n", $n); // représentation entière non signée d'un entier positif
printf("%%u = '%u'\n", $u); // représentation entière non signée d'un entier négatif
printf("%%f = '%f'\n", $n); // représentation en virgule flottante
printf("%%o = '%o'\n", $n); // représentation octale
printf("%%s = '%s'\n", $n); // représentation chaîne de caractères
printf("%%x = '%x'\n", $n); // représentation hexadécimal (minuscule)
printf("%%X = '%X'\n", $n); // représentation hexadécimal (majuscule)

printf("%%+d = '%+d'\n", $n); // indication du signe pour un entier positif
printf("%%+d = '%+d'\n", $u); // indication du signe pour un entier négatif
?>
```

Résultat :

```txt
%b = '10100111101010011010101101'
%c = 'A'
%d = '43951789'
%e = '4.39518e+7'
%u = '43951789'
%u = '4251015507'
%f = '43951789.000000'
%o = '247523255'
%s = '43951789'
%x = '29ea6ad'
%X = '29EA6AD'
%+d = '+43951789'
%+d = '-43951789'
```

## var_dump

La fonction [var_dump](https://www.php.net/manual/fr/function.var-dump.php) affiche les informations d'une variable.

__var_dump()__ affiche les informations structurées d'une variable, y compris son type et sa valeur. Les tableaux et les objets sont explorés récursivement, avec des indentations, pour mettre en valeur leur structure.

Exemple :

```php
<?php
$tableau = array(1, 2, array("a", "b", "c"));
var_dump($tableau);
?>
```

Résultat :

```txt
array(3) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  array(3) {
    [0]=>
    string(1) "a"
    [1]=>
    string(1) "b"
    [2]=>
    string(1) "c"
  }
}
```

## print_r

La fonction [print_r](https://www.php.net/manual/fr/function.print-r.php) affiche des informations lisibles pour une variable.

__print_r()__ affiche des informations à propos d'une variable, de manière à ce qu'elle soit lisible.

print_r(), var_dump() et var_export() affichent également les propriétés protégées et privées d'un objet. Les membres des classes statiques ne seront pas affichés.

Exemple :

```php
<pre>
<?php
$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
print_r ($a);
?>
</pre>
```

Résultat :

```txt
<pre>
Array
(
    [a] => apple
    [b] => banana
    [c] => Array
        (
            [0] => x
            [1] => y
            [2] => z
        )
)
</pre>
```

## Référence

- <https://www.php.net/manual/fr>

[Revenir à la page principale de la section](README.md)
