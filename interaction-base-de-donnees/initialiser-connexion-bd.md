# Initialiser une connexion à la base de données

Selon [www.php.net](https://www.php.net/manual/fr/intro.pdo.php), l'extension _PHP Data Objects_ (PDO) définit une excellente interface pour accéder à une base de données depuis PHP.

PDO fournit une interface d'abstraction à l'accès de données, ce qui signifie que vous utilisez les mêmes fonctions pour exécuter des requêtes ou récupérer les données, quelle que soit la base de données utilisée.

PDO est fourni avec PHP 5.1+ et ne fonctionne pas avec les versions antérieures de PHP.

## Connexions et gestionnaire de connexion

Les connexions sont établies en créant des instances de la classe de base de PDO. Le constructeur accepte des paramètres pour spécifier la source de la base de données (connue en tant que __DSN__) et optionnellement, le nom d'utilisateur et le mot de passe (s'il y en a un).

__Exemple de connexion à une base de données MySQL__ :

```php
<?php
  $dbh = new PDO('mysql:host=localhost;dbname=test', $utilisateur, $motPasse);
?>
```

S'il y a des erreurs de connexion, un objet __PDOException__ est lancé. Vous pouvez attraper cette exception si vous voulez gérer cette erreur, ou laisser le gestionnaire global d'exception défini via la fonction [set_exception_handler()](https://www.php.net/manual/fr/function.set-exception-handler.php) la traiter.

Lorsque la connexion à la base de données a réussi, une instance de la classe PDO est retournée. La connexion est active tant que l'objet PDO l'est. Pour clore la connexion, vous devez détruire l'objet en vous assurant que toutes ses références sont effacées. Vous pouvez faire cela en assignant __NULL__ à la variable gérant l'objet. Si vous ne le faites pas explicitement, PHP fermera automatiquement la connexion lorsque le script arrivera à sa fin.

Référez-vous à la [documentation](https://www.php.net/manual/fr/pdo.connections.php) au besoin.

## Les erreurs et leur gestion

PDO vous offre 3 façons différentes de gérer les erreurs afin de mieux s'adapter à votre application.

- __PDO::ERRMODE_SILENT__
  C'est le mode par défaut. PDO définit simplement le code d'erreur à inspecter grâce aux méthodes [PDO::errorCode()](https://www.php.net/manual/fr/pdo.errorcode.php) et [PDO::errorInfo()](https://www.php.net/manual/fr/pdo.errorinfo.php) sur les objets représentant les requêtes, mais aussi ceux représentant les bases de données; si l'erreur résulte d'un appel à l'objet représentant la requête, vous pouvez appeler la méthode [PDOStatement::errorCode()](https://www.php.net/manual/fr/pdostatement.errorcode.php) ou la méthode [PDOStatement::errorInfo()](https://www.php.net/manual/fr/pdostatement.errorinfo.php) sur l'objet. Si l'erreur résulte d'un appel sur l'objet représentant une base de données, vous pouvez également appeler ces deux mêmes méthodes sur l'objet.
- __PDO::ERRMODE_WARNING__
  En plus de définir le code d'erreur, PDO émettra un message E_WARNING traditionnel. Cette configuration est utile lors des tests et du débogage, si vous voulez voir le problème sans interrompre l'application.
- __PDO::ERRMODE_EXCEPTION__
  En plus de définir le code d'erreur, PDO lancera une exception [PDOException](https://www.php.net/manual/fr/class.pdoexception.php) et y définit les propriétés afin de représenter le code d'erreur et les informations complémentaires. Cette configuration est également utile lors du débogage, car elle va « contourner » le point critique de votre code, vous montrer rapidement le problème rencontré (sachez que les transactions sont automatiquement annulées si l'exception fait en sorte que votre script se termine).

  Le mode "exception" est également très utile, car ainsi, vous pouvez structurer votre gestionnaire d'erreur plus clairement qu'avec les alertes traditionnelles PHP et, ce, avec moins de code que lorsque vous exécutez votre code en mode silence, et que vous vérifiez systématiquement les valeurs retournées après chaque appel à la base de données.

PDO utilise les codes erreurs SQL-92 SQLSTATE; chaque pilote PDO est responsable de lier ses codes natifs aux codes SQLSTATE appropriés. La méthode [PDO::errorCode()](https://www.php.net/manual/fr/pdo.errorcode.php) retourne un code SQLSTATE unique. Si vous avez besoin d'informations spécifiques sur l'erreur, PDO vous propose également la méthode [PDO::errorInfo()](https://www.php.net/manual/fr/pdo.errorinfo.php) qui retourne un tableau contenant le code SQLSTATE, le code d'erreur spécifique du pilote et la chaîne décrivant l'erreur provenant du pilote.

Création d'une instance de PDO et définir un mode d'erreur :

```php
<?php
  $dsn = 'mysql:dbname=testdb;host=localhost';
  $utilisateur = 'root';
  $motPasse = 'admin123';

  try {
      // Instanciation de la connexion
      $dbh = new PDO($dsn, $utilisateur, $motPasse);

      // Définir le mode d'erreur
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Définir l'encodage
      $dbh->exec('SET CHARACTER SET UTF8');
  } catch (PDOException $e) {
      echo('Échec lors de la connexion : ' . $e->getMessage());
  }
?>
```

>**Note :** [PDO::__construct()](https://www.php.net/manual/fr/pdo.construct.php) va toujours lancer une exception [PDOException](https://www.php.net/manual/fr/class.pdoexception.php) si la connexion échoue suivant la configuration de __PDO::ATTR_ERRMODE__. Les exceptions non attrapées deviennent des erreurs fatales.

>**Remarque :** dbh = _Database Handle_ et $sth = "Statement Handle". Voir la [question](https://stackoverflow.com/questions/6379752/php-pdo-what-do-dbh-and-sth-stand-for) sur StackOver Flow.

Créer une instance PDO et définir le mode d'erreur à partir du constructeur :

```php
<?php
  ini_set('display_errors', 1);
  $dsn = 'mysql:dbname=test;host=localhost';
  $utilisateur = 'root';
  $motPasse = 'admin123';

  /*
      L'utilisation des blocs try/catch autour du constructeur est toujours valide
      même si nous définissons le ERRMODE à WARNING sachant que PDO::__construct
      va toujours lancer une exception PDOException si la connexion échoue.
  */
  try {
      // Instanciation de la connexion
      $dbh = new PDO($dsn, $utilisateur, $motPasse, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

      // Définir l'encodage
      $dbh->exec('SET CHARACTER SET UTF8');
  } catch (PDOException $e) {
      echo('Échec de la connexion : ' . $e->getMessage());
      exit;
  }

  // Ceci fera que PDO lancera une erreur de niveau E_WARNING au lieu d'une exception (lorsque la table n'existe pas)
  $dbh->query("SELECT colonne FROM table_inexistante");
?>
```

L'exemple ci-dessus va afficher :

```txt
Warning: PDO::query(): SQLSTATE[42S02]: Base table or view not found: 1146 Table 'demo_acces_donnees.table_inexistante' doesn't exist in C:\Bitnami\wampstack\apache2\htdocs\test\test.php on line 21
```

Référez-vous à la [documentation](https://www.php.net/manual/fr/pdo.error-handling.php) au besoin.

## Conservation des informations de connexion

L'enseignement de la conservation judicieuse des informations de connexion n'est pas dans la portée du cours, mais notez qu'il est important de s'en soucier.

Voici quelques lectures sur le sujet :

- <https://security.stackexchange.com/questions/13353/is-it-safe-to-store-the-database-password-in-a-php-file>
- <https://stackoverflow.com/questions/32513480/where-to-safely-store-database-credentials-within-a-php-website>
- <https://stackoverflow.com/questions/97984/how-to-secure-database-passwords-in-php>
- <https://www.codementor.io/@ccornutt/keeping-credentials-secure-in-php-kvcbrk55z>

## Références

- <https://www.php.net/manual/fr/intro.pdo.php>

[Revenir à la page principale de la section](README.md)
