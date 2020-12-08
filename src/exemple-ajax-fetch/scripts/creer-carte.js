// Récupération du formulaire
const formulaire = document.querySelector("#js-form-carte");
formulaire.addEventListener("submit", creerCarte);

// Récupération des entrées du formulaire
const conteneurIdentifiant = document.querySelector("#js-identifiant");
const conteneurNom = document.querySelector("#js-nom");
const conteneurDescription = document.querySelector("#js-description");

function creerCarte() {
    // Objet littéral `carte` qui contient les informations de la carte à créer
    const carte = {
        id: parseInt(conteneurIdentifiant.value),
        nom: conteneurNom.value, 
        description: conteneurDescription.value
    }
  
    fetch('http://localhost:3000/carte', {
        method: "POST",
        body: JSON.stringify(carte),
        headers: {"Content-type": "application/json; charset=UTF-8"}
    })
    .then(reponse => reponse.json()) 
    .then(json => console.log(json))
    .catch(erreur => console.log(erreur));
}