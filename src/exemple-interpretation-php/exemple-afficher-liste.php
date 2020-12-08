<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démonstration de la création d'une liste</title>
</head>
<body>
<?php
    $prenoms = ["Alexis", "Ken", "Nadine", "Sébastien"];
?>

<ul>
    <?php
        foreach ($prenoms as $prenom) {
            echo('<li>'.$prenom.'</li>');
        }
    ?>
</ul>
</body>
</html>

