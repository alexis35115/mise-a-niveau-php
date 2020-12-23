<!DOCTYPE html>
<html lang="fr">
<head>
  <style>
  .error {color: #FF0000;}
  </style>
  <title>Exemple de la validation du nom, de l'adresse courriel et de l'URL du site Web</title>
</head>
<body>
<?php
// Créer les variables avec une valeur vide
$nom = "";
$courriel = "";
$siteWeb = "";
$commentaire = "";
$sexe = "";

// Créer les variables pour les messages d'erreur
$messageErreurNom = "";
$messageErreurCourriel = "";
$messageErreurSiteWeb = "";
$messageErreurSexe = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = validerEntree($_POST["nom"]);
  $courriel = validerEntree($_POST["courriel"]);
  $siteWeb = validerEntree($_POST["siteWeb"]);
  $commentaire = validerEntree($_POST["commentaire"]);
  $sexe = validerEntree($_POST["sexe"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nom"])) {
    $messageErreurNom = "Le nom est obligatoire.";
  } else {
    $nom = validerEntree($_POST["nom"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/", $nom)) {
      $messageErreurNom = "Seuls des lettres, des tirets, des apostrophes et des espaces blancs sont autorisés.";
    }
  }

  if (empty($_POST["courriel"])) {
    $messageErreurCourriel = "Le courriel est obligatoire.";
  } else {
    $courriel = validerEntree($_POST["courriel"]);

    if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
      $messageErreurCourriel = "Le format du courriel est invalide.";
    }
  }

  if (!empty($_POST["siteWeb"])) {
    $siteWeb = validerEntree($_POST["siteWeb"]);

    if (filter_var($siteWeb, FILTER_VALIDATE_URL)) {
      $messageErreurSiteWeb = "Le format de l'adresse URL n'est pas valide.";
    }
  }

  if (!empty($_POST["commentaire"])) {
    $commentaire = validerEntree($_POST["commentaire"]);
  }

  if (empty($_POST["sexe"])) {
    $messageErreurSexe = "Le sexe est obligatoire.";
  } else {
    $sexe = validerEntree($_POST["sexe"]);
  }
}

function validerEntree($donnee) {
  $donnee = trim($donnee);
  $donnee = stripslashes($donnee);
  $donnee = htmlspecialchars($donnee);
  return $donnee;
}
?>

<h2>Exemple de la validation du nom, de l'adresse courriel et de l'URL du site Web</h2>
<p><span class="error">* champs obligatoires</span></p>
<form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">  
  Nom: <input type="text" name="nom">
  <span class="error">* <?=$messageErreurNom?></span>
  <br><br>
  Courriel : <input type="text" name="courriel">
  <span class="error">* <?=$messageErreurCourriel?></span>
  <br><br>
  Site web : <input type="text" name="siteWeb">
  <span class="error"><?=$messageErreurSiteWeb?></span>
  <br><br>
  Commentaire : <textarea name="commentaire" rows="5" cols="40"></textarea>
  <br><br>
  Sexe :
  <input type="radio" name="sexe" value="femme">Femme
  <input type="radio" name="sexe" value="homme">Homme
  <input type="radio" name="sexe" value="autre">Autre
  <span class="error">* <?=$messageErreurSexe?></span>
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