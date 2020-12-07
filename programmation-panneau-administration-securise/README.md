# Programmation d'un panneau d'administration sécurisé

Ce n'est pas tous les sites Web qui ont besoin d'un panneau d'administration. Ce besoin dépend du genre de site web que vous programmez. Regardons les différents facteurs qui vient influeancer la nécessité d'avoir un panneau d'adminsitration.

Vous __n'avez pas besoin__ d'un panneau d'administration lorsque :

- Votre site web est _statique_ et ne nécessite pas beaucoup de changements.
- N'a pas de connexion d'utilisateurs.
- N'a pas un panier d'achat ou autres catégories du genre.

En outre, si vous n'avez rien à administrer sur une base régulière.

Vous __avez besoin__ d'un panneau d'administration :

- Lorsque votre site web est _dynamique_.
- Lorsque votre site web est de type blog, forum, achats en ligne, réservation, adhésion et etc...
- Lorsque votre site web doit nécessite des ajouts ou des mises à jour être fréquentes.
- Lorsque vous souhaitez que plusieurs personnes puissent contribuer à votre site web.

## Mise en situation

Comme démonstration d'un panneau d'administration, nous allons procéder à la création d'un espace sécurisé permettant à un administrateur de consulter, créer, modifier ou supprimer des séries de notre plateforme.

ce que nous allons faire et ce qu'on ma exclure de la présentation en faite

ce qu'on veut accomplir dans un panneau et dans notre contexte à nous.

dire que notre exemple est banalisé


inclure une vision non privée?


Je pourrais parler de série?


## Sécuriser un répertoire

Qu'est-ce qu'un fichier .htaccess

à quoi ça sert

la forme

où le mettre



parler que c'est une technique pour les serveurs apache

à quoi que ça ressemble lorque nous n'avons pas accès

## Endroit de conservation pour les utilisateurs


## Crypter un mot de passe

Une stratégie de stockage de mots de passe adéquate est essentielle pour atténuer les fuites des données. Le [hachage](https://fr.wikipedia.org/wiki/Fonction_de_hachage#:~:text=On%20nomme%20fonction%20de%20hachage,au%20m%C3%AAme%20titre%20qu%27une) est le fondement du stockage sécurisé des mots de passe.

### Le stockage des mots de passe est risqué et complexe

Une approche simple pour stocker les mots de passe est de créer une table dans notre base de données qui associt un nom d’utilisateur avec un mot de passe. Lorsqu’un utilisateur se connecte, le serveur reçoit une demande d’authentification avec les informations de connexion contenant un nom d’utilisateur et un mot de passe. On recherche l'utilisateur selon le nom d'utilisateur fourni pour ensuite comparer le mot de passe fourni avec le mot de passe stocké. Une correspondance signifie que l’utilisateur possède l’accès à l’application.

La force de sécurité et la résilience de ce modèle dépendent de la façon dont le mot de passe est stocké. Le format de stockage de mot de passe le plus basique, mais aussi le moins sûr, est en texte claire.

En texte claire référence à des données "lisible", par exemple, non chiffrées.

Une façon plus sûre de stocker un mot de passe est de le transformer en données qui ne peuvent pas être converties en mot de passe d’origine. Ce mécanisme est connu sous le nom de __hachage__.

### Qu'est-ce que le hachage

Selon wikipédia :

  On nomme fonction de hachage, de l'anglais _hash function_ (hash : pagaille, désordre, recouper et mélanger) par analogie avec la cuisine, une fonction particulière qui, à partir d'une donnée fournie en entrée, calcule une __empreinte numérique__ servant à identifier rapidement la donnée initiale, au même titre qu'une signature pour identifier une personne. Les fonctions de hachage sont utilisées en informatique et en cryptographie notamment pour reconnaître rapidement des fichiers ou des mots de passe.

Les fonctions de hachage ont les caractéristiques suivantes :

- Il est facile et pratique de calculer le hachage, mais __difficile ou impossible de générer à nouveau l’entrée d’origine si seulement la valeur de hachage est connue__.
- Il est difficile de créer une entrée initiale qui correspondrait à une sortie spécifique souhaitée.

Ainsi, contrairement au chiffrement, le hachage est un mécanisme __à sens unique__. Les données qui sont hachées ne peuvent pratiquement pas être _unhashed_.





Les algorithmes de hachage couramment utilisés incluent les algorithmes _Message Digest_ (MDx), tels que MD5, et _secure hash algorithms_ (SHA),tels que SHA-1 et la famille SHA-2 qui inclut l’algorithme SHA-256 largement utilisé.







pourquoi?

comment?

Qu'est-ce qu'un bon mot de passe?

### Qu'est-ce qu'un bon mot de passe

https://www.lastpass.com/fr/password-generator

https://haveibeenpwned.com/Passwords

https://www.php.net/manual/fr/function.password-hash.php

password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);

## Les composants de notre panneau d'administration


## S'authentifier à notre panneau d'administrationm


## Utilisation de notre panneau d'administration

### Obtenir les series

### Ajouter une série


### Mettre à jour une série


### Supprimer une série





## Références



[Revenir à la page principale](../README.md)
