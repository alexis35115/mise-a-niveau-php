# Notions SQL

SQL est un langage standard pour accéder et manipuler les bases de données.

## Qu’est-ce que le SQL

- SQL signifie _Structured Query Language_.
- SQL vous permet d’accéder et de manipuler des bases de données.
- SQL est devenu une norme de l’_American National Standards Institute_ (ANSI) en 1986 et de l’Organisation internationale pour la normalisation (ISO) en 1987.

## Que permet de faire le SQL

- D'exécuter des requêtes contre une base de données.
- De récupérer des données à partir d’une base de données.
- D'insérer des enregistrements dans une base de données.
- De mettre à jour les enregistrements dans une base de données.
- De supprimer des enregistrements d’une base de données.
- De créer de nouvelles bases de données.
- De créer de nouvelles tables dans une base de données.
- De créer des procédures stockées dans une base de données.
- De créer des vues dans une base de données.
- De définir des autorisations sur les tables, procédures et vues.

## Instructions SQL

>**Astuce :** Le [script de création](../src/exemple-interaction-bd/demo_acces_donnees.sql) de la base de données cible pour la démonstration est disponible.

### SELECT

La commande SELECT sera __suivit par les colonnes que nous souhaitons consulter__.  Si notre requête vise plusieurs colonnes, ces dernières seront séparées par des virgules :

```sql
SELECT nom, prenom
```

Dans cet exemple, nous souhaitons consulter les données dans les colonnes _nom_ et _prenom_.  Vous pouvez modifier, __uniquement pour le résultat de la requête__, le nom d’une colonne avec l’instruction __AS__.

```sql
SELECT nom, prenom AS prénom
```

L’instruction AS va donc nous permettre de __déterminer des alias pour nos noms de colonnes__.  

### DISTINCT

Il est possible que plus d’un enregistrement possède la même valeur pour une colonne donnée.  Le résultat sera que notre requête affichera plusieurs fois la même donnée.  __Si nous souhaitons éliminer les duplications des données dans nos résultats__, il sera possible d’utiliser l’instruction DISTINCT à la gauche du nom de la colonne concerné.

```sql
SELECT DISTINCT nom
  FROM utilisateur;
```

Résultats :

| nom |
|---|
| Garon-Michaud |
| Michaud |

Dans cet exemple, la table _utilisateur_ contient tous les utilisateurs. Si nous souhaitons afficher les noms des clients, l’instruction DISTINCT va s’assurer de nous afficher qu’une seule fois chacun de ces noms d'utilisateur.

### Instruction *

Si vous souhaitez consulter tous les champs d’une table, l’instruction __*__ va nous permettre de le faire facilement. __Remarquez toutefois que le résultat de la requête va varier si l’ordre des champs d’une table est modifié__.  Si vous souhaitez obtenir toujours les champs dans un ordre bien précis, il est préférable de lister tous les champs.

```sql
SELECT *
  FROM utilisateur;
```

Résultats :

| id_utilisateur | nom | prenom | date_naissance | date_suppression |
|---|---|---|---|---|
| 1 | Garon-Michaud | Alexis | 1992-04-08 | _NULL_ |
| 3 | Garon-Michaud | Sacha | 1997-04-12 | _NULL_ |
| 4 | Garon-Michaud | François | 1994-11-17 | _NULL_ |
| 5 | Garon-Michaud | Élisabeth | 1990-03-10 | _NULL_ |
| 6 | Michaud | Laurianne | 1988-10-16 | _NULL_ |

### FROM

Évidemment, nous devons indiquer dans quelle table ces colonnes existent, d’où l’instruction FROM.

```sql
SELECT *
  FROM utilisateur;
```

L’instruction FROM vient dans ce cas-ci préciser que la sélection doit se faire dans la table _utilisateur_.

### WHERE

L’instruction WHERE sert à __filtrer les enregistrements provenant de la table de l’instruction FROM__. Nous allons utiliser des expressions logiques qui seront évaluées et __seuls les enregistrements dont l’expression donne un résultat égal à TRUE seront retournés dans le résultat de la requête__.

Par exemple, nous pourrions tenter d’obtenir un résultat en fonction d’un numéro d’utilisateur en particulier :

```sql
SELECT prenom,
       nom
  FROM utilisateur
 WHERE id_utilisateur = 1;
```

Résultats :

| prenom | nom |
|---|---|
| Alexis | Garon-Michaud |

### GROUP BY

L’instruction GROUP BY va __regrouper les enregistrements retournés en fonction des colonnes spécifiés__ dans la clause GROUP BY. __Tous les enregistrements retournés par la requête seront regroupés en fonction des champs spécifiés dans la clause GROUP BY__.

```sql
SELECT id_utilisateur,
       YEAR(date_naissance) AS annee_naissance
  FROM utilisateur
 GROUP BY id_utilisateur,
          YEAR(date_naissance)
```

Résultats :

| id_utilisateur | annee_naissance |
|---|---|
| 1 | 1992 |
| 3 | 1997 |
| 4 | 1994 |
| 5 | 1990 |
| 6 | 1988 |

Comme la clause SELECT est interprétée après le GROUP BY, seuls les champs dans le GROUP BY peuvent être sélectionnés.  Toutefois, les fonctions d’agrégation COUNT(), SUM(), AVG(), MIN() et MAX() peuvent être utilisées pour faire des calculs sur les regroupements.  

```sql
SELECT nom, COUNT(*) AS nombre_occurences
  FROM utilisateur
 GROUP BY nom
```

Résultats :

| nom | nombre_occurences |
|---|---|
| Garon-Michaud | 4 |
| Michaud | 1 |

>**Note :** Les fonctions d’agrégation ignorent les données à valeur _NULL_ sauf COUNT(*).

### ORDER BY

La clause ORDER BY permet de __trier les enregistrements retournés par notre requête à des fins de présentation__.  Le tri peut se faire sur plus d’une colonne et __l’ordre de tri sera de gauche à droite dans l’ordre d’écriture de la clause__.

```sql
SELECT prenom, nom
  FROM utilisateur
ORDER BY date_naissance
```

Résultats :

| prenom | nom |
|---|---|
| Laurianne | Michaud |
| Élisabeth | Garon-Michaud |
| Alexis | Garon-Michaud |
| François | Garon-Michaud |
| Sacha | Garon-Michaud |

Comme les __données dans les tables ne sont pas nécessairement triées, la clause ORDER BY nous permet de forcer l’affichage des résultats en respectant un ordre de tri__ que nous allons y spécifier.

Notez que la clause ORDER BY est la seule qui vient après le SELECT dans l’interprétation des instructions, elle est aussi __la seule qui peut faire référence à un nom d’alias__.

__Par défaut, le tri se fait en ordre ascendant__.  Si on souhaite modifier l’ordre pour descendant, il suffit de __rajouter l’instruction DESC après le champ trié__.

```sql
SELECT prenom, nom
FROM utilisateur
ORDER BY date_naissance DESC
```

Résultats :

| prenom | nom |
|---|---|
| Sacha | Garon-Michaud |
| François | Garon-Michaud |
| Alexis | Garon-Michaud |
| Élisabeth | Garon-Michaud |
| Laurianne | Michaud |

## Les opérateurs

### Les opérateurs arithmétiques

Les opérateurs arithmétiques exécutent des opérations mathématiques sur deux expressions d’un ou plusieurs types de données. Ils sont exécutés à partir de la catégorie de type donnée numérique.

Le tableau suivant répertorie les opérateurs arithmétiques :

| Opérateur | Description |
|---|---|
| + | Addition |
| - | Soustraction |
| * | Multiplication |
| / | Division |
| % | Modulo (restant de la division) |

### Les opérateurs logiques

Les opérateurs logiques testent la vérité d’une condition. Les opérateurs logiques, comme les opérateurs de comparaison, retournent un type de données Boolean avec une valeur de TRUE ou FALSE.

Le tableau suivant répertorie les opérateurs logiques :

| Opérateur | Description |
|---|---|
| OR | Retourne TRUE si une expression des deux expressions (opérandes) est vraie. |
| AND | Retourne TRUE si les deux expressions (opérandes) sont vraies. |
| NOT | TRUE si l'expression est fausse. |

### Les opérateurs de comparaison

Les opérateurs de comparaison testent si deux expressions sont les mêmes.

Le tableau suivant répertorie les opérateurs comparatifs :

| Opérateur | Description |
|---|---|
| = | Égale à |
| > | Supérieur à |
| >= | Supérieur ou égale à |
| < | Inférieur à |
| <= | Inférieur ou égale à |
| != | Différent à |
| Exp1 IN (exp2, exp3, …) | Compare l’expression (Exp1) seule à toutes les expressions de la liste  (est incluse dans…) |
| IS NULL | Renvoie TRUE si l’expression est NULL, False le cas échéant. |
| Exp1 BETWEEN minimum AND maximum | Véfifie si la valeur de Exp1 est comprise entre la valeur « minimum » et « maximum ». Notez que les bornes minimum et maximum sont incluses. |
| EXISTS (Sous Requête) | Renvoie TRUE, si et seulement si la sous-requête renvoie au moins une ligne. |
| Exp1 LIKE | Permets de filtrer des données suivant un modèle. |

### L'opérateur de comparaison LIKE

Détermine si une chaîne de caractères spécifique correspond à un modèle spécifié. Un motif peut inclure des caractères réguliers et des caractères _wildcard_. Pendant l’appariement des motifs, les caractères réguliers doivent correspondre exactement aux caractères spécifiés dans la chaîne de caractères. Toutefois, les caractères _wildcard_ peuvent être appariés avec des fragments arbitraires de la chaîne de caractères. L’utilisation de caractères _wildcard_ rend l’opérateur LIKE plus flexible que l’utilisation des opérateurs de comparaison = et !=. Si l’un des arguments n’est pas de type chaîne de caractères, le moteur de la base de données convertit en chaîne de caractères, si c’est possible.

| Opérateur | Description |
|---|---|
| WHERE prenom LIKE 'a%' | Trouver les prénoms qui commencent par "a". |
| WHERE prenom LIKE '%a' | Trouver les prénoms qui terminent par "a". |
| WHERE prenom LIKE '%ga%' | Trouver tous les prénoms qui possèdent "ga" peu importe la position. |
| WHERE prenom LIKE '_a%' | Trouver tous les prénoms qui possèdent un "a" à la seconde position |
| WHERE prenom LIKE 'g_%' | Trouver tous les prénoms qui commencent par un "g" et ayant un minimum de 2 caractères de long. |
| WHERE prenom LIKE 'g__%' | Trouver tous les prénoms qui commencent par un "g" et ayant un minimum de 3 caractères de long. |
| WHERE prenom LIKE 'g%n' | Trouver tous les prénoms qui commencent par un "g" et se terminent par un "n". |

>**Note :** L'expression du LIKE est entre apostrophes.

### Les fonctions d’agrégation

Les fonctions d’agrégation dans le langage SQL permettent d’effectuer des opérations de statistiques sur un ensemble d’enregistrement.

| Fonction | Description |
|---|---|
| SUM() | Donne le total d'un champ de tous les enregistrements satisfaisant la condition de la requête. Le champ doit bien sûr être de type numérique. |
| AVG() | Donne la moyenne d'un champ de tous les enregistrements satisfaisant la condition de la requête. |
| MAX() | Donne la valeur la plus élevée d'un champ de tous les enregistrements satisfaisant la condition de la requête. |
| MIN() | Donne la valeur la plus petite d'un champ de tous les enregistrements satisfaisant la condition de la requête.|
| COUNT(*) | Envoie le nombre d'enregistrements satisfaisant la requête. |

## Références

- Notes de cours de Nicolas Gagnon
- Notes de cours de Ken Bourgoin
- <https://www.w3schools.com/sql/sql_like.asp>
- <https://docs.microsoft.com/en-us/sql/t-sql/language-elements/comparison-operators-transact-sql?view=sql-server-ver15>
- <https://docs.microsoft.com/en-us/sql/t-sql/language-elements/logical-operators-transact-sql?view=sql-server-ver15>
- <https://docs.microsoft.com/en-us/sql/t-sql/language-elements/arithmetic-operators-transact-sql?view=sql-server-ver15>
- <https://docs.microsoft.com/en-us/sql/t-sql/language-elements/like-transact-sql?view=sql-server-ver15>
- <https://www.w3schools.com/sql/sql_intro.asp>

[Revenir à la page principale de la section](README.md)
