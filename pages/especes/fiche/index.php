<?php

$niveau = '../../../';

// include($niveau . 'assets/inc/config.inc.php');

// $intIdArtiste = intval($_GET['idArtiste']);

// $strRequete =
//     "SELECT artistes.*, styles.nom AS style_nom FROM artistes 
// INNER JOIN styles_artistes ON artistes.id = styles_artistes.artiste_id 
// INNER JOIN styles ON styles_artistes.style_id = styles.id 
// WHERE artistes.id = $intIdArtiste";

// $pdosResultat = $pdoConnexion->query($strRequete);
// $arrArtistes = $pdosResultat->fetch();
// $pdosResultat->closecursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>Fiche d'une espèce - Biodiversité</title>

    <?php
    include($niveau . "assets/inc/fragments/head_links.php");
    include($niveau . "assets/inc/fragments/balises_script.php");
    ?>

</head>

<body>

    <?php include($niveau . "assets/inc/fragments/navigation.php") ?>

    <h1>Fiche de l'espèce</h1>

    <?php
    // echo "Nom : $arrArtistes[nom] <br>";
    // echo "Style(s) : $arrArtistes[style_nom] <br>";
    // echo "Provenance : $arrArtistes[provenance] <br>";
    // echo "Description : $arrArtistes[description] <br>";
    // echo "Site Web : <a href='$arrArtistes[site_web]' target='_blank'>$arrArtistes[site_web]</a> <br>";
    ?>

</body>

</html>