# AJAX

l'acronyme __AJAX__ signifie _asynchronous JavaScript and XML_. L'__AJAX__ combine l'utilisation du JavaScript et du [DOM](https://fr.wikipedia.org/wiki/Document_Object_Model) pour modifier l'information présentée dans le navigateur.

>**Note:** L'acronyme d'__AJAX__ est trompeur. __AJAX__ permet d'utiliser du __XML__ pour transporter les données, mais il est tout aussi courant de transporter des données que du texte clair ou du texte en format __JSON__.

## Quand utiliser de l'AJAX

L'AJAX permet de :

- Lire les données d'un serveur web, et ce après qu'une page soit chargée.
- Mettre à jour une page web sans procéder à un rechargement de la page.
- Envoyer des données à un serveur web, et ce en arrière-plan.

L'__AJAX__ permet de mettre à jour une page web de manière asynchrone en échangeant des données avec un serveur web. Cela signifie qu’il est possible de mettre à jour des parties d’une page Web, sans recharger toute la page.

## Type de données pour le transfert des données

Les [API REST](https://fr.wikipedia.org/wiki/Representational_state_transfer) devraient accepter le format __[JSON](https://fr.wikipedia.org/wiki/JavaScript_Object_Notation#:~:text=JavaScript%20Object%20Notation%20(JSON)%20est,le%20permet%20XML%20par%20exemple.)__ pour la demande et lors de la réception de la réponse. __JSON est la norme pour le transfert de données__. Presque toutes les technologies peuvent l’utiliser, JavaScript dispose de méthodes intégrées pour coder et décoder le __JSON__ soit via l’[API Fetch](https://developer.mozilla.org/fr/docs/Web/API/Fetch_API) ou soit par l’intermédiaire d’un autre [client HTTP](https://fr.wikipedia.org/wiki/Client_HTTP#:~:text=Un%20client%20HTTP%20est%20un,HTTP%20(Hypertext%20Transfer%20Protocol).). Les technologies côté serveur ont des bibliothèques qui peuvent décoder le __JSON__ sans générer beaucoup de travail.

Il existe d’autres façons de transférer des données. [XML](https://fr.wikipedia.org/wiki/Extensible_Markup_Language) n’est pas largement pris en charge les frameworks sans transformer les données nous-mêmes en quelque chose qui peut être utilisé et c’est généralement du __JSON__. Nous ne pouvons pas manipuler ces données aussi facilement du côté du client, en particulier dans les navigateurs. Il finit par être beaucoup de travail supplémentaire juste pour faire le transfert de données.

Pour terminer, l'__XML__ cité dans l'acronyme __AJAX__ était historiquement le moyen privilégié pour structurer les informations transmises entre serveur web et navigateur, de nos jours le __JSON__ tend à être le nouveau standard.

## Types de requête envers le serveur

L’action de la demande doit être indiquée par un verbe HTTP. Les verbes __les plus courants__ incluent GET, POST, PUT et DELETE.

- __GET__ récupère des ressources
- __POST__ soumet de nouvelles données au serveur
- __PUT__ met à jour les données existantes
- __DELETE__ supprime les données.

## Exemple




[Revenir à la page principale](../README.md)
