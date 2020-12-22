# Principes de bases lors de la validation des données

__RÉDACTION EN COURS!__ 🏗 

La validation des valeurs d'entrées est un dispositif défensif de votre application Web. Ce périmètre protège la logique de base, le traitement et la génération de sortie. Au-delà du périmètre tout doit être considéré comme un ennemi potentiel.

Ne jamais faire confiance à __l’entrée de l’utilisateur__. En supposant que les utilisateurs ne sont pas fiables, nous insinuons que tout le reste est digne de confiance. C’est faux. Les utilisateurs ne sont que la source d’entrée la plus évidente et non fiable puisqu’ils sont des étrangers sur lesquels nous n’avons aucun contrôle.

## Considérations lors de la validation

La validation des entrées est à la fois la défense la plus fondamentale sur laquelle repose une application Web et la plus peu fiable. Une grande majorité des vulnérabilités d’applications Web découlent d’une défaillance de validation.

Il faut garder à l’esprit qu'à chaque fois qu'on implémente des validations personnalisées ou qu'on utilise une bibliothèque de validation tierce. Quand il s’agit de valideurs tiers, il faut  également considérer que ceux-ci ont tendance à être de __nature générale__ et très probablement omettre les routines de validation spécifique clé de votre application Web. Comme pour toute bibliothèque axée sur la sécurité, il ne faut pas oublier d’examiner personnellement notre bibliothèque pour ses défauts et ses limitations. Il convient également de garder à l’esprit que PHP n’est pas au-dessus de certains comportements bizarres sans doute dangereux.

Prenons l’exemple suivant à partir des fonctions de filtre de PHP :

```php
filter_var('php://', FILTER_VALIDATE_URL);
```

L’exemple ci-dessus passe le filtre sans problème. La faille dans ce qui précède est que les options de filtre n’ont pas de méthode pour limiter le système URI autorisé et les utilisateurs s’attendent à ce que ce soit : _http_, _https_ ou _mailto_ plutôt que certains URIs génériques. C’est le genre d’approche de validation générique que nous devrions chercher à éviter à tout prix.

## Méfiez-vous du contexte

La validation des entrées vise à empêcher l’entrée de données __dangereuses__ dans l’application Web. La validation est généralement effectuée pour vérifier si les données sont sûres pour son utilisation.

Par exemple, on reçoit un morceau de données contenant un nom, on peut le valider assez vaguement pour permettre des apostrophes, des virgules, des parenthèses, des espaces, et toute la gamme des caractères Unicode alphanumériques. En tant que nom, nous avons des données valides qui peuvent être utiles à des fins d’affichage. Toutefois, si on utilise ces données ailleurs comme pour une requête à la base de données, on les met dans un nouveau contexte. Dans ce nouveau contexte, certains de ces caractères que nous autorisons seraient toujours dangereux, notre nom pourrait en fait être __une chaîne soigneusement conçue destinée à effectuer une attaque d’injection SQL__.

Le résultat est que la validation des entrées est intrinsèquement peu fiable. La validation des entrées fonctionne mieux avec des valeurs extrêmement restreintes, par exemple lorsque quelque chose doit être un entier, une chaîne alphanumérique ou une URL. Ces formats et valeurs limités sont les moins susceptibles de constituer une menace s’ils sont correctement validés. D’autres valeurs telles que le texte libre, les tableaux associatifs GET/POST et HTML sont à la fois plus difficiles à valider et __beaucoup plus susceptibles de contenir des données malveillantes__.

Puisque notre application passera une grande partie de son temps à transporter des données entre les contextes, la validation des entrées est notre défense initiale, __mais jamais notre seule__.

L’une des défenses supplémentaires les plus courantes utilisées avec la validation des paramètres d'entrées est l'échappement. L’échappement est un processus par lequel les données sont rendues sûres pour chaque nouveau contexte.

Outre l'échappement, qui est orienté vers la sortie pour éviter une mauvaise interprétation par le récepteur, comme les données entrent dans un nouveau contexte, il devrait souvent être accueilli par un autre cycle de validation spécifique au contexte.

Bien qu’elles soient souvent perçues comme une duplication de la validation de première entrée, d’autres séries de validation des paramètres d'entrées plus conscientes du contexte actuel où les exigences de validation peuvent différer considérablement de la ronde initiale. Par exemple, lors de la soumission d'une donnée dans un formulaire peut inclure un nombre entier sous forme de pourcentage. À la première entrée, on vérifiera qu’il s’agit bien d’un nombre entier. Toutefois, une fois passé au modèle de l'application, une nouvelle exigence pourrait émerger - le pourcentage doit être dans une plage spécifique, quelque chose que seul le modèle est au courant puisque le format est un produit de la logique d’entreprise.

Ne pas se revalider dans le nouveau contexte pourrait avoir de très mauvais résultats!

## Ne jamais les listes noires (_blacklist_), seulement les listes blanches (_whitelist_)

Les deux principales approches pour valider une valeur à l'entrée sont la liste blanche et la liste noire. La liste noire consiste à vérifier si l’entrée contient des données inacceptables pendant que la liste blanche vérifie si l’entrée contient des données acceptables. La raison pour laquelle on doit préférer l'utilisation de la liste blanche est qu’elle produit une routine de validation qui ne transmet que les données que nous attendons. L'utilisation de la liste noire s’appuie sur l'anticipation des développeurs de toutes les données inattendues possibles, ce qui signifie qu’il est beaucoup plus facile d’aller à l’encontre des omissions et des erreurs.

Un bon exemple est la validation pour le rendu HTML. Si on prend l’approche de la liste noire, on doit vérifier que le HTML ne contient pas d’éléments dangereux : attributs, styles et __javascript exécutable__. Cela génère une grande quantité de travail et tous les _désinfectants_ HTML qui suivent l'approche de la liste noire ont presque toujours tendance à oublier ou omettre une combinaison dangereuse de balisage. Un désinfectant HTML basé sur l'utilisation d'une liste blanche dispense de cette incertitude en ne permettant que des éléments et attributs sûrs connus. Tous les autres éléments et attributs seront dépouillés, échappés ou supprimés indépendamment de ce qu’ils sont.

Étant donné que la liste blanche a tendance à être à la fois plus sûre et plus robuste, elle devrait être préférée pour toute routine de validation.

## Échapper à la conversion de type en PHP

Le PHP __n’est pas__ un [langage fortement typé](https://fr.wikipedia.org/wiki/Typage_fort) et la plupart de ses fonctions et opérations ne sont donc pas sûres. Cela peut poser de graves problèmes du point de vue de la sécurité. Les validateurs sont particulièrement vulnérables à ce problème lorsqu’ils comparent des valeurs.

Par exemple :

```php
<?php
var_dump(0 == '0ABC'); // Retourne TRUE
var_dump(0 == '0'); // Retourne TRUE
var_dump(0 === '0'); // Retourne FALSE
var_dump(0 === '0ABC'); // Retourne FALSE
?>
```

Lors de la conception des validations, on doit préférer des comparaisons __strictes__ et d’utiliser la conversion manuelle de type où les valeurs d’entrée ou de sortie peuvent être des chaînes.

## Les diverses techniques de validation des données

Ne pas valider les paramètres d'entrées peut conduire à la fois à des failles de sécurité et à la corruption des données.

Voici quelques techniques de validation.

### Vérification du type de données

Une vérification de type de données vérifie simplement si les données sont une chaîne, un nombre entier, un nombre à virgule, un tableau et autres. Étant donné que beaucoup de données sont reçues par le biais de formulaires, on ne peut pas aveuglément utiliser les fonctions de PHP telles que is_int() puisqu’une valeur provenant d'un formulaire va être une chaîne de caractère et elle peut potentiellement dépasser la valeur maximale d’entier permis en PHP. On ne devrait pas être trop créatif non plus et se tourner vers l'utilisation des expressions régulières, car cela peut violer le principe [KISS](https://fr.wikipedia.org/wiki/Principe_KISS#:~:text=Le%20principe%20KISS%2C%20Keep%20it,ligne%20directrice%20de%20conception%20qui).

### La validation des caractères autorisés

La validation des caractères autorisés garantit simplement qu’une chaîne ne contient que des caractères valides. Les approches les plus courantes utilisent les fonctions [ctype](https://www.php.net/manual/fr/book.ctype.php) de PHP et les expressions régulières pour des cas plus complexes. Les fonctions [ctype](https://www.php.net/manual/fr/book.ctype.php) sont les meilleurs choix où seuls les caractères [ASCII](https://fr.wikipedia.org/wiki/American_Standard_Code_for_Information_Interchange) sont autorisés.

### La validation du format

Les validations de format garantissent que les données correspondent à __un modèle spécifique de caractères autorisés__. Les adresses courriel, les URLs et les dates sont des exemples. Les meilleures approches devraient utiliser la fonction [filter_var()](https://www.php.net/manual/fr/function.filter-var.php) de PHP, la classe [DateTime](https://www.php.net/manual/en/class.datetime.php) et les [expressions régulières](https://www.php.net/manual/fr/function.preg-match.php) pour d’autres formats. Plus un format est complexe, plus vous devriez vous pencher vers des vérifications de format éprouvées ou des outils de vérification syntaxe.

### La validation des valeurs limites

La validation des valeurs limite est conçue pour tester si une valeur se situe dans la plage de données acceptées. Par exemple, on peut accepter un nombre entier qui est supérieur à 5 ou entre 0 et 3 ou qui ne peut être 15. Il s’agit de limites d’entier, mais une vérification des limites peut être appliquée à la longueur des chaînes, à la taille d'un fichier, aux dimensions d'une image, aux périodes de date, etc.

### La validation de la présence

La validation de la présence garantit qu'on ne procède pas à l’utilisation d’un ensemble de données si elle omet une valeur requise. Un formulaire d’inscription, par exemple, peut nécessiter un nom d’utilisateur, un mot de passe et une adresse courriel avec d’autres détails facultatifs. L’entrée sera invalide si les données requises sont manquantes.

### Une validation

Une validation est le moment où l’entrée est nécessaire pour inclure deux valeurs identiques aux fins de l’élimination des erreurs. De nombreux formulaires d’inscription, par exemple, peuvent obliger les utilisateurs à saisir deux fois le mot de passe pour éviter les erreurs de transcription. Si les deux valeurs sont identiques, __les données sont valides__.

### La validation logique

La validation logique est essentiellement un contrôle des erreurs où on assure que les données reçues ne provoqueront pas d’erreur ou d’exception dans l’application. Par exemple, il se peut qu'on substitue une chaîne de recherche reçue dans une expression régulière. Cela peut provoquer une erreur sur la compilation de l’expression. Les entiers au-dessus d’une certaine taille peuvent également causer des erreurs, tout comme zéro lorsque nous essayons la division en l’utilisant, ou autres.

### La validation de l’existence des ressources

Les validations de l’existence des ressources confirment simplement que lorsque les données indiquent une ressource à utiliser, la ressource existe réellement. Ceci est presque toujours accompagné de contrôles supplémentaires pour empêcher la création automatique de ressources non existantes, le détournement du travail vers des ressources non valides et les tentatives de formater les chemins de système de fichiers pour permettre les [attaques transversales de répertoires](https://ogelin.wordpress.com/hacking/attaques-par-injection-les-plus-communes/attaque-par-traversee-de-repertoires/).

[Revenir à la page principale de la section](README.md)
