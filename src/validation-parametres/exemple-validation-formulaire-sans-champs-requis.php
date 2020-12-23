<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Exemple de la validation des données d'un formulaire sans les champs requis</title>
</head>
<body>
<?php
// Créer les variables avec une valeur vide
$nom = "";
$courriel = "";
$siteWeb = "";
$commentaire = "";
$sexe = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = validerEntree($_POST["nom"]);
  $courriel = validerEntree($_POST["courriel"]);
  $siteWeb = validerEntree($_POST["siteWeb"]);
  $commentaire = validerEntree($_POST["commentaire"]);
  $sexe = validerEntree($_POST["sexe"]);
}

function validerEntree($donnee) {
  $donnee = trim($donnee);
  $donnee = stripslashes($donnee);
  $donnee = htmlspecialchars($donnee);
  return $donnee;
}
?>

<h2>Exemple de la validation des données d'un formulaire sans les champs requis</h2>
<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">  
  Nom: <input type="text" name="nom">
  <br><br>
  Courriel : <input type="text" name="courriel">
  <br><br>
  Site Web : <input type="text" name="siteWeb">
  <br><br>
  Commentaire : <textarea name="commentaire" rows="5" cols="40"></textarea>
  <br><br>
  Sexe :
  <input type="radio" name="sexe" value="femme">Femme
  <input type="radio" name="sexe" value="homme">Homme
  <input type="radio" name="sexe" value="autre">Autre
  <br><br>
  <input type="submit" name="submit" value="Soumettre">  
</form>

<?php
echo("<h2>Vos données saisies :</h2>");
echo($nom);
echo("<br>");
echo($courriel);
echo("<br>");
echo($siteWeb);
echo("<br>");
echo($commentaire);
echo("<br>");
echo($sexe);
?>

</body>
</html>