# Notions SQL

SQL est un langage standard pour accéder et manipuler les bases de données.

## Qu’est-ce que le SQL

- SQL signifie langage de requête structurée.
- SQL vous permet d’accéder et de manipuler des bases de données.
- SQL est devenu une norme de l’American National Standards Institute (ANSI) en 1986, et de l’Organisation internationale pour la normalisation (ISO) en 1987.

## Que peut faire le SQL

- SQL peut exécuter des requêtes contre une base de données.
- SQL peut récupérer des données à partir d’une base de données.
- SQL peut insérer des enregistrements dans une base de données.
- SQL peut mettre à jour les enregistrements dans une base de données.
- SQL peut supprimer des enregistrements d’une base de données.
- SQL peut créer de nouvelles bases de données.
- SQL peut créer de nouvelles tables dans une base de données.
- SQL peut créer des procédures stockées dans une base de données.
- SQL peut créer des vues dans une base de données.
- SQL peut définir des autorisations sur les tables, procédures et vues.

## Instructions SQL

>**Astuce :** Le [script de création](../src/exemple-interaction-bd/demo_acces_donnees.sql) de la base de données cible pour la démonstration est disponible. Au besoin, consultez la section À METTRE ICI, pour l'importortation d'une base de données via un script.

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

Il est possible que plus d’un enregistrement possède la même valeur pour une colonne donnée.  Le résultat sera que notre requête affichera plusieurs fois la même donnée.  __Si nous souhaitons éliminer les duplications des données dans nos résultats__, il sera possible d’utiliser l’instruction DISTINCT à la gauche du nom de colonne concerné.

```sql
SELECT DISTINCT nom
  FROM utilisateur;
```

Voici le résultat :

| nom |
|---|
| Garon-Michaud |
| Michaud |

Dans cet exemple, la table _utilisateur_ contient tous les utilisateurs. Si nous souhaitons afficher les noms des clients, l’instruction DISTINCT va s’assurer de nous afficher qu’une seule fois chacun de ces noms d'utilisateur.

### *

Si vous souhaitez consulter tous les champs d’une table, l’instruction __*__ va nous permettre de le faire facilement. __Remarquez toutefois que le résultat de la requête va varier si l’ordre des champs d’une table est modifié__.  Si vous souhaitez obtenir toujours les champs dans un ordre bien précis, il est préférable de lister tous les champs.

```sql
SELECT *
  FROM utilisateur;
```

Voici le résultat :

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

L’instruction WHERE va servir à __filtrer les enregistrements provenant de la table de l’instruction FROM__. Nous allons utiliser des expressions logiques qui seront évaluées et __seuls les enregistrements dont l’expression donne un résultat égal à TRUE seront retournés dans le résultat de la requête__.

Par exemple, nous pourrions tenter d’obtenir un résultat en fonction d’un numéro d’utilisateur en particulier :

```sql
SELECT prenom,
       nom
  FROM utilisateur
 WHERE id_utilisateur = 1;
```

Voici le résultat :

| prenom | nom |
|---|---|
| Alexis | Garon-Michaud |

### GROUP BY

L’instruction GROUP BY va __regrouper les enregistrements retournés en fonction des colonnes spécifiés__ dans la clause GROUP BY. __Tous les enregistrements retournés par la requête seront regroupés en fonction des champs spécifiés dans la clause GROUP BY__.

```sql
SELECT id_utilisateur, YEAR(date_naissance)
  FROM utilisateur
 GROUP BY id_utilisateur, YEAR(date_naissance)
```

Voici le résultat :

| id_utilisateur | YEAR(date_naissance) |
|---|---|
| 1 | 1992 |
| 3 | 1997 |
| 4 | 1994 |
| 5 | 1990 |
| 6 | 1988 |

Comme la clause SELECT est interprétée après le GROUP BY, seuls les champs dans le GROUP BY peuvent être sélectionnés.  Toutefois, les fonctions d’agrégation COUNT(), SUM(), AVG(), MIN() et MAX() peuvent être utilisées pour faire des calculs sur les regroupements.  

```sql
SELECT nom, COUNT(*)
  FROM utilisateur
 GROUP BY nom
```

Voici le résultat :

| nom | COUNT(*) |
|---|---|
| Garon-Michaud | 4 |
| Michaud | 1 |

Notez que __les fonctions d’agrégation ignorent les données à valeur NULL sauf COUNT(*)__.

### ORDER BY

La clause ORDER BY va permettre de __trier les enregistrements retournés par notre requête à des fins de présentation__.  Le tri peut se faire sur plus d’une colonne et __l’ordre de tri sera de gauche à droite dans l’ordre d’écriture de la clause__.

```sql
SELECT prenom, nom
  FROM utilisateur
ORDER BY date_naissance
```

Voici le résultat :

| prenom | nom |
|---|---|
| Laurianne | Michaud |
| Élisabeth | Garon-Michaud |
| Alexis | Garon-Michaud |
| François | Garon-Michaud |
| Sacha | Garon-Michaud |

Comme les __données dans les tables ne sont pas nécessairement triées, la clause ORDER BY nous permet de forcer l’affichage des résultats en respectant un ordre de tri__ que nous allons y spécifier.

Notez que comme la clause ORDER BY est la seule qui vient après le SELECT dans l’interprétation des instructions, elle est aussi __la seule qui peut faire référence à un nom d’alias__.

__Par défaut, le tri se fait en ordre ascendant__.  Si on souhaite modifier l’ordre pour descendant, il suffit de __rajouter l’instruction DESC après le champ trié__.

```sql
SELECT prenom, nom
FROM utilisateur
ORDER BY date_naissance DESC
```

Voici le résultat :

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
| <> | Différent à |
| Exp1 IN (exp2, exp3, …) | Compare l’expression (Exp1) seule à toutes les expressions de la liste  (est incluse dans…) |
| IS NULL | Renvoie TRUE si l’expression est NULL, False le cas échéant. |
| Exp1 BETWEEN minimum AND maximum | Véfifie si la valeur de Exp1 est comprise entre la valeur « minimum » et « maximum ». Notez que les bornes minimum et maximum sont incluses. |
| EXISTS (Sous Requête) | Renvoie TRUE, si et seulement si la sous-requête renvoie au moins une ligne. |
| Exp1 LIKE | Permets de filtrer des données suivant un modèle. |

### L'opérateur de comparaison LIKE

Détermine si une chaîne de caractères spécifique correspond à un modèle spécifié. Un motif peut inclure des caractères réguliers et des caractères _wildcard_. Pendant l’appariement des motifs, les caractères réguliers doivent correspondre exactement aux caractères spécifiés dans la chaîne de caractères. Toutefois, les caractères _wildcard_ peuvent être appariés avec des fragments arbitraires de la chaîne de caractères. L’utilisation de caractères _wildcard_ rend l’opérateur LIKE plus flexible que l’utilisation des opérateurs de comparaison = et !=. Si l’un des arguments n’est pas de type chaîne de caractères, le moteur de base de données convertit en chaîne de caractères, si c’est possible.

| Opérateur | Description |
|---|---|
| WHERE prenom LIKE 'a%' | Trouver les valeurs qui commencent par "a". |
| WHERE prenom LIKE '%a' | Trouver les valeurs qui terminent par "a". |
| WHERE prenom LIKE '%ga%' | Trouver toutes les valeurs qui possèdent "ga" peu importe la position. |
| WHERE prenom LIKE '_a%' | Trouver toutes les valeurs qui possèdent un "a" à la seconde position |
| WHERE prenom LIKE 'g_%' | Trouver toutes les valeurs qui commencent par un "g" et ayant un minimum de 2 caractères de long. |
| WHERE prenom LIKE 'g__%' | Trouver toutes les valeurs qui commencent par un "g" et ayant un minimum de 3 caractères de long. |
| WHERE prenom LIKE 'g%n' | Trouver toutes les valeurs qui commencent par un "g" et se terminent par un "n". |

>**Note :** L'expression du LIKE est entre apostrophes.

### Les fonctions d’agrégation

| Fonction | Description |
|---|---|
| SUM() | Donne le total d'un champ de tous les enregistrements satisfaisant la condition de la requête. Le champ doit bien sûr être de type numérique. |
| AVG() | Donne la moyenne d'un champ de tous les enregistrements satisfaisant la condition de la requête. |
| MAX() | Donne la valeur la plus élevée d'un champ de tous les enregistrements satisfaisait la condition de la requête. |
| MIN() | Donne la valeur la plus petite d'un champ de tous les enregistrements satisfaisait la condition de la requête.|
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
