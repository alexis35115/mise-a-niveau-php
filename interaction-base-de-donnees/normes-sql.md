# Normes SQL

On ne devrait jamais mentionner le terme "c'est la norme à suivre". C'est utopique de croire que toutes les entreprises et tous les développeurs travaillent de la même façon.

On devrait plus tôt utiliser le terme de "pratiques émergentes".

Néanmoins, voici quelques recommandations à suivre lors de la rédaction de SQL.

## Général

### À préconiser

- Utilisez des identificateurs et des noms cohérents et descriptifs.
- Faites une utilisation judicieuse de l’espace blanc et de l’indentation pour faciliter la lecture du code.
- Stockez les dates sous le format YYYY-MM-DD HH:MM:SS.SSSSS pour être conforme à l’[ISO 8601](https://fr.wikipedia.org/wiki/ISO_8601).
- Essayez d’utiliser uniquement des fonctions SQL standard au lieu de fonctions spécifiques pour des raisons de portabilité.
- Gardez le code [succinct](https://www.larousse.fr/dictionnaires/francais/succinct/75168) et dépourvu de SQL redondant, comme des citations inutiles et des parenthèses.
- Inclure les commentaires dans le code SQL si nécessaire. Utilisez l’ouverture /* et la fermeture */ du style C# dans la mesure du possible, sinon précéder les commentaires avec -- et les terminer avec une nouvelle ligne.

### À éviter

- CamelCase - il est difficile de numériser rapidement.
- Préfixes descriptifs ou notation hongroise tels que "sp_" (_stored procedure_) ou "tbl".
- Pluriels - utilisez plutôt le terme collectif plus naturel.
- Les principes de conception orientés objet ne doivent pas être appliqués aux structures SQL ou à la base de données (la base de données doit être séparée du code).

## Conventions de nommage

### Généralités

- Assurez-vous que le nom est unique et n’existe pas en tant que [mot clé réservé](https://www.sqlstyle.guide/#reserved-keyword-reference).
- Maintenez la longueur à un maximum de 30 caractères.
- Les noms doivent commencer par une lettre et ne peuvent pas se terminer par un soulignement.
- N’utilisez que des lettres, des chiffres et des soulignements dans les noms.
- Évitez l’utilisation de plusieurs soulignements consécutifs, ceux-ci peuvent être difficiles à lire.
- Utilisez des soulignements où vous incluez naturellement un espace dans le nom.
- Évitez les abréviations et si vous devez les utiliser assurez-vous qu’elles sont communément comprises.

### Tables

- Utilisez un nom collectif ou, moins idéalement, une forme plurielle.
- Ne préfixez pas avec ou tout autre préfixe descriptif ou notation hongroise.
- Ne donnez jamais à une table le même nom qu’une de ses colonnes et vice versa.
- Évitez, dans la mesure du possible, de concaténer deux noms de table ensemble pour créer le nom d’une table de relation.

### Colonnes

- Utilisez toujours le nom singulier.
- Dans la mesure du possible, évitez simplement d’utiliser comme identificateur principal de la table "id".
- N’ajoutez pas une colonne du même nom que sa table et vice versa.
- Utilisez toujours des minuscules, sauf lorsqu’il peut être logique de ne pas être comme des noms appropriés.

### Les alias ou les corrélations

- Doit se rapporter d’une manière ou d’une autre à l’objet ou à l’expression qu’il est l'alias.
- En règle générale, le nom de corrélation doit être la première lettre de chaque mot au nom de l’objet.
- S’il existe déjà une corrélation avec le même nom, puis ajouter un nombre.
- Pour les données calculées ( ou ) utilisez le nom que vous lui donneriez s’il s’agissait d’une colonne définie dans le schéma (SUM() ou AVG()).

### Procédures stockées

- Le nom doit contenir un verbe.
- Ne préfixez pas avec ou tout autre préfixe descriptif ou notation hongroise.

### Préfixes uniformes

Les préfixes suivants ont un sens universel garantissant que les colonnes peuvent être lues et comprises facilement à partir du code SQL. Utilisez le préfixe correct, le cas échéant.

- id - un identificateur unique tel qu’une colonne qui est une clé primaire.
- date - désigne une colonne qui contient la date de quelque chose.

__Prendre note qu'en anglais, on parlerait de suffixes!__

## Syntaxe de requête

### Mots réservés

- Toujours utiliser les majuscules pour les mots clés réservés comme SELECT et WHERE.
- Il est préférable d’éviter les mots clés abrégés et d’utiliser les mots-clés pleine longueur lorsque disponible, ABSOLUTE au lieu de ABS.

### Espace blanc

#### Espace

Pour faciliter la lecture du code, il est important que le complément approprié d’espacement soit utilisé.

Les espaces doivent être utilisés pour aligner le code de sorte que les mots clés racines se terminent tous sur la même limite de caractère. Cela forme une rivière au milieu, ce qui rend facile pour l’œil des lecteurs de numériser sur le code et de séparer les mots clés du détail de l’implémentation. Les rivières sont mauvaises en typographie, mais utiles ici :

```sql
SELECT f.species_name,
       AVG(f.height) AS average_height, AVG(f.diameter) AS average_diameter
  FROM flora AS f
 WHERE f.species_name = 'Banksia'
    OR f.species_name = 'Sheoak'
    OR f.species_name = 'Wattle'
 GROUP BY f.species_name, f.observation_date)
 UNION ALL
SELECT b.species_name,
       AVG(b.height) AS average_height, AVG(b.diameter) AS average_diameter
  FROM botanic_garden_flora AS b
 WHERE b.species_name = 'Banksia'
    OR b.species_name = 'Sheoak'
    OR b.species_name = 'Wattle'
 GROUP BY b.species_name, b.observation_date;
```

Notez que les "," sont tous alignés à droite tandis que les noms de colonne réelle et les détails spécifiques à l’implémentation sont alignés (les SELECT et les FROM).

Bien que non exhaustive comprend toujours des espaces :

- avant et après les égaux (=)
- après les virgules (,)

```sql
SELECT a.title, a.release_date, a.recording_date
  FROM albums AS a
 WHERE a.title = 'Charcoal Lane'
    OR a.title = 'The New Danger';
```

#### Interligne

Incluez toujours de nouvelles lignes/espaces verticales :

- avant un AND et un OR
- après des points-virgules pour séparer les requêtes pour une lecture plus facile
- après chaque définition de mot clé
- après une virgule lors de la séparation de plusieurs colonnes en groupes logiques
- pour séparer le code en sections associées, ce qui permet de faciliter la lisibilité de gros morceaux de code.

Garder tous les mots clés alignés sur le côté droit et les valeurs à gauche alignées crée un écart uniforme au milieu de la requête. Il est également beaucoup plus facile de numériser rapidement sur la définition de requêtes.

```sql
INSERT INTO albums (title, release_date, recording_date)
VALUES ('Charcoal Lane', '1990-01-01 01:01:01.00000', '1990-01-01 01:01:01.00000'),
       ('The New Danger', '2008-01-01 01:01:01.00000', '1990-01-01 01:01:01.00000');
```

## Conclusion

Tout comme le code C# ou autres, le SQL doit :

- être agréable à lire
- propre et concentré
- simples et ordonnées

Ce sont toutes des qualités pour avoir du code propre qui est indépendant du langage.

[Revenir à la page principale de la section](README.md)
