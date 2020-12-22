# Validation des données reçues en paramètres

__RÉDACTION EN COURS!__ 🏗 

Nettoyer les paramètres
    sanatize = Filtres de nettoyage
    sortir les types les plus courants
    les types possibles : https://www.php.net/manual/fr/filter.filters.sanitize.php


à voir :`

- Question qu'une variable en PHP (ça je le vois déjà?)
$_GET[]
$_POST[]
get versus post

https://www.php.net/manual/fr/filter.filters.sanitize.php

(filtre de validation)
https://www.php.net/manual/fr/filter.filters.validate.php

(sanitize = nettoyage)
FILTER_SANITIZE_ENCODED

https://www.w3schools.com/php/func_filter_var.asp
FILTER_SANITIZE_EMAIL
FILTER_VALIDATE_EMAIL


autre filter https://www.php.net/manual/fr/filter.filters.flags.php

addslashes

=== FALSE?

$FILTRES_FILM = array(
	'id' => FILTER_SANITIZE_NUMBER_INT,
	'titre' => FILTER_SANITIZE_STRING,
	'resume' => FILTER_SANITIZE_STRING,
	'description' => FILTER_SANITIZE_STRING,
	'realisateur' => FILTER_SANITIZE_STRING,
	'producteur' => FILTER_SANITIZE_STRING
);

filter_input_array(INPUT_POST, $FILTRES_FILM);

foreach ($emails as $email) {
    echo (filter_var($email, FILTER_VALIDATE_EMAIL)) ?
        "[+] Email '$email' is valid\n" :
        "[-] Email '$email' is NOT valid\n";
}
?>


<?php
$int = 100;

if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
?>

<?php
$int = 0;

if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
?>

https://www.w3schools.com/php/php_ref_filter.asp
PHP Filter Functions

PHP Predefined Filter Constants

FILTER_SANITIZE_ADD_SLASHES


https://www.php.net/manual/en/pdo.quote.php au lieu de addslashes? mysql_real_escape_string est dépréssié https://www.php.net/manual/en/function.mysql-real-escape-string.php


htmlspecialchars https://www.php.net/manual/fr/function.htmlspecialchars.php

## Références

- <https://www.w3schools.com/php/php_superglobals_get.asp>
- <https://www.w3schools.com/php/php_superglobals_post.asp>

[Revenir à la page principale de la section](README.md)
