
const boutonRechercher = document.querySelector("#js-bouton-rechercher");

boutonRechercher.addEventListener("click", rechercherCartes);

const conteneurInformationCartes = document.querySelector("#js-info-carte");

function rechercherCartes() {
    
    fetch('http://localhost:3000/carte')
    .then((reponse) => {
        return reponse.json();
    })
    .then((cartes) =>{
        cartes.forEach(carte => ajouterInformationCarte(carte));
    })
    .catch((erreur) => {
        console.log("Une erreur est survenue", erreur);
    });
}

function ajouterInformationCarte(carte) {

    let conteneur = document.createElement("div");
    let titre = document.createElement("h2");
    let nom = document.createElement("span")
    let description = document.createElement("p");

    titre.innerHTML = `L'identifiant de la carte est ${carte.id}`;
    nom.innerHTML = carte.nom;
    description.innerHTML = carte.description;

    conteneur.appendChild(titre);
    conteneur.appendChild(nom);
    conteneur.appendChild(description);
    conteneurInformationCartes.appendChild(conteneur);
}
