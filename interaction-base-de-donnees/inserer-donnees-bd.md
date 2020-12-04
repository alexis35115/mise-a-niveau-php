# Insérer des données dans la base de données

__INSERT INTO__ est utilisée pour stocker des données dans les tables de la base de données. La commande INSERT crée une nouvelle ligne dans la table pour en conserver les données. Les données sont généralement fournies par des programmes n qui s’exécutent en haut de la base de données.

## Syntaxe de base

Examinons la syntaxe de base de la commande INSERT INTO MySQL :

```sql
INSERT INTO nom_table (colonne_1, colonne_2,...)
               VALUES (valeur_1, valeur_2,...);
```

- INSERT INTO 'nom_table' est la commande qui indique au serveur MySQL d’ajouter une nouvelle ligne dans une table nommée « nom_table ».
- (colonne_1 colonne_2,...) spécifie les colonnes à mettre à jour dans la nouvelle ligne MySQL.
- VALUES (valeur_1 valeur_2,...) précise les valeurs à ajouter dans la nouvelle ligne.

Lorsqu'on fournit les valeurs à insérer dans un nouvel enregistrement, les éléments suivants doivent être pris en considération :

- Les données de type texte - les données textes doivent être incluses dans des guillemets simples.
- Les données de type numérique - les valeurs numériques doivent être fournies directement et sans les entourer de guillemets simples ou doubles.
- Les données de type date - les valeurs de type date doivent être entre des guillemets simples dans le format 'YYYY-MM-DD'.

>**Note :** Référez-vous à la [documentation officielle](https://dev.mysql.com/doc/refman/8.0/en/date-and-time-functions.html) pour les différents formats de date.

## Insérer mes premières données

À l'aide de phpMyAdmin, nous allons insérer notre premier enregistrement. Avant de procéder à l'insertion dans la base de données, regardons la structure de la table _serie_.

![Structure de la table série.](../images/structure-table-serie.PNG)

>**Remarque :** Le champ _id\_serie_ attribut __[AUTO_INCREMENT](https://dev.mysql.com/doc/refman/8.0/en/example-auto-increment.html)__ pour générer automatiquement un identifiant unique pour un nouvel enregistrement. C'est pour cette raison, qu'il est recommandé de laisser la base de données générer l'identifiant au lieu de déléguer la responsabilité à l'application cliente.

>**Astuce :** Le [script pour la création](../src/exemple-interaction-bd/creation-table-serie.sql) de la table _serie_ est disponible.

Regardons de plus près les valeurs de la nouvelle série à créer :

| Champ | Valeur | Remarque |
|---|---|---|
| nom | 'Nom de la série' | Le nom de la série doit être entouré de guillemets |
| synopsis | 'Synopsis de la série' | Le Synopsis de la série doit être entouré de guillemets |
| description | 'Description de la série' | La description de la série doit être entourée de guillemets |
| date_creation | '2009-09-23 06:23:19' | Le format de la date de création est 'YYYY-MM-DD HH:MMLSS' |
| date\_modification | NULL | Lors de l'utilisation de _NULL_, il ne faut pas entourer la valeur de guillemets |
| date\_suppression | NULL | Lors de l'utilisation de _NULL_, il ne faut pas entourer la valeur de guillemets |

```sql
INSERT INTO serie (nom,
                   synopsis,
                   description,
                   date_creation,
                   date_modification,
                   date_suppression)
           VALUES ('Nom de la série',
                   'Synopsis de la série',
                   'Description de la série',
                   '2009-09-23 06:23:19',
                    NULL,
                    NULL);
```

Voici le message de confirmation, notez que l'identifiant de la série préalablement créé est affiché à l'écran.

![Message de confirmation suite à l'insertion de la série](../images/confirmation-phpmyadmin-insert.PNG)

## Insérer des données avec PHP à l'aide de PDO

Cette fois, nous allons procéder à la création d'une série, mais à partir de PHP avec PDO.

```php
<?php
$dsn = 'mysql:dbname=demo_acces_donnees;host=localhost';
$utilisateur = 'root';
$motPasse = 'admin123';

try {
    // Créer la connexion
    $dbh = new PDO($dsn, $utilisateur, $motPasse);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->exec('SET CHARACTER SET UTF8');

    // Valeur de la série à créer
    $nom = "Nom de la série";
    $synopsis = "Synopsis de la série";
    $description = "Description de la série";
    $dateCreation = "2009-09-23 06:23:19";
    $dateModification = NULL;
    $dateSuppression = NULL;

    // Requête INSERT pour la création de la nouvelle série
    $requeteAjoutSerie = "INSERT INTO serie (nom, synopsis, description, date_creation, date_modification, date_suppression)
                                     VALUES (:nom, :synopsis, :description, :date_creation, :date_modification, :date_suppression)";

    $sth = $dbh->prepare($requeteAjoutSerie);

    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':synopsis', $synopsis, PDO::PARAM_STR);
    $sth->bindParam(':description', $description, PDO::PARAM_STR);
    $sth->bindParam(':date_creation', $dateCreation, PDO::PARAM_STR);
    $sth->bindParam(':date_modification', $dateModification, PDO::PARAM_STR);
    $sth->bindParam(':date_suppression', $dateSuppression, PDO::PARAM_STR);
    $sth->execute();

    /*
    À l'aide de la méthode "lastInsertId()" de PDO, il est possible de récupérer l'identifiant unique de la série créée (id_serie).

    Au besoin, référez-vous à cette question sur StackOver Flow https://www.facebook.com/PawnStars/videos/483626918952135.
    */
    echo($dbh->lastInsertId());

} catch (PDOException $e) {
    echo('Échec lors de la connexion : ' . $e->getMessage());
}
?>
```

>**Important** Notez l'utilisation de "PDO::PARAM_STR" lors de l'association d'une date. PDO ne possède pas un paramètre de type "date".

Avec de l'identifiant unique (id_serie) affiché à l'écran, provenant de lastInsertId(), il est possible de récupérer la nouvelle série créée :
![Affichage de la nouvelle série créée à partir du PHP](../images/serie-cree-via-php.PNG)


Au besoin, référez-vous à la [documentation officielle](https://dev.mysql.com/doc/refman/8.0/en/insert.html).

[Revenir à la page principale de la section](README.md)
