# Git

Git est de loin le système de contrôle de version le plus largement utilisé aujourd'hui. Git est un projet open source avancé, qui est activement maintenu. À l'origine, il a été développé en 2005 par Linus Torvalds, le créateur bien connu du noyau du système d'exploitation Linux. De plus en plus de projets de développement reposent sur Git pour le contrôle de version, y compris des projets commerciaux et en open source. Les développeurs qui utilisent Git sont bien représentés dans le pool de talents disponible, et la solution fonctionne bien sur une vaste gamme de systèmes d'exploitation et d'environnements de développement intégrés (IDE).

Par sa structure décentralisée, Git illustre parfaitement ce qu'est un système de contrôle de version décentralisé (DVCS). Plutôt que de consacrer un seul emplacement pour l'historique complet des versions du logiciel comme c'était souvent le cas dans les systèmes de contrôle de version ayant fait leur temps, comme CVS et Subversion (également connu sous le nom de SVN), dans Git, chaque copie de travail du code est également un dépôt qui contient l'historique complet de tous les changements.

En plus d'être décentralisé, Git a été conçu pour répondre à trois objectifs : performances, sécurité et flexibilité.

>**Astuce** - Une [vidéo](https://youtu.be/7vZ3URnjomM) expliquant l'installation et la configuration de Git est disponible.

## Installation

Si vous avez accès à [winget](https://docs.microsoft.com/fr-ca/windows/package-manager/winget/), faire la commande :

```cmd
winget install Git.Git
```

Sinon, il est possible de télécharger l'installateur via le site de [_GIT_](https://git-scm.com/downloads).

Effectuer les configurations initiales dans une invite de commandes :

```cmd
git config --global user.name "John Doe"
git config --global user.email johndoe@example.com
```

Si vous aviez déjà _Git_ sur votre machine et que vous n'avez pas la dernière version, il suffit d'exécuter cette commande pour faire la mise à jour  :

```cmd
git update-git-for-windows
```

[Revenir à la page principale de la section](README.md)
