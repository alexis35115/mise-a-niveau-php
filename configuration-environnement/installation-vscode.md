# Visual Studio Code

## Installation

### Installation des extensions

Pour installer une extension dans Visual Studio Code, voici la [procédure](https://code.visualstudio.com/docs/editor/extension-gallery) à suivre. Donc, il faut installer les extensions suivantes :

- [PHP extension pack](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-pack) : regroupement d'extensions pour le développement PHP
- [sftp-sync](https://marketplace.visualstudio.com/items?itemName=liximomo.sftp) :  permet de transférer des fichiers sur le réseau, cette extension sera importante plus tard dans la session
- [Open PHP/HTML/JS In Browser](https://marketplace.visualstudio.com/items?itemName=PrimaFuture.open-php-html-js-in-browser) : permet d'ouvrir notre code directement dans le fureteur. Le raccourci est "Shift+F6", ça va ouvrir le fichier courant dans votre fureteur par défaut.

## Configurations des extensions

Suite à l'installation des extensions, il faut savoir comment [paramétrer les extensions](https://code.visualstudio.com/docs/getstarted/settings). il faut procéder à quelques configurations :

- Définir l'exécutable de PHP : dans la section "Extensions" du menu "Settings", il faut ouvrir "php" et aller éditer le fichier "settings.jsons" pour définir l'endroit de l'exécutable de php. Dans le fichier settings, il faut insérer les valeurs :
  
```json
"php.executablePath": "C:\\Bitnami\\wampstack-[VERSION]\\php\\php.exe",
"php.validate.executablePath": "C:\\Bitnami\\wampstack-[VERSION]\\php\\php.exe"
```

- Configurer Open PHP/HTML/JS, il faut aller dans "Extensions" -> "Open PHP/HTML/JS", il faut mettre la valeur "<http://localhost:8888/${fileBasename}>" dans la configuration "Custom Url to Open" et insérer la valeur "C:\Bitnami\wampstack-[VERSION]\apache2\htdocs" dans la configuration "Document Root Folder".

[Revenir à la page principale de la section](README.md)
