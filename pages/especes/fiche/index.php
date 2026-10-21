<?php

$niveau = '../../../';

include($niveau . 'assets/inc/config.inc.php');

$intIdEspece = intval($_GET['id_espece']);

$strRequete =
"SELECT especes.*, groupes.nom_groupe AS groupe_nom FROM especes 
INNER JOIN groupes ON especes.groupe_id = groupes.id
WHERE especes.id = $intIdEspece";

$pdosResultat = $pdoConnexion->query($strRequete);

$arrEspeces = $pdosResultat->fetch();
$pdosResultat->closecursor();

$strRequeteImage =
"SELECT images.* 
FROM images
INNER JOIN especes ON images.espece_id = especes.id
WHERE images.espece_id = $intIdEspece";

$pdosResultatImage = $pdoConnexion->query($strRequeteImage);

$arrImage = $pdosResultatImage->fetch();
$pdosResultatImage->closecursor();

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

    <h1><?php echo $arrEspeces['nom_francais']; ?></h1>
    <ul>
        <?php if ($arrEspeces['nom_scientifique'] != '') { ?>
            <li>Nom scientifique : <?php echo $arrEspeces['nom_scientifique']; ?></li>
        <?php } ?>
        <?php if ($arrEspeces['autres_noms_francais'] != '') { ?>
            <li>Autres noms francais : <?php echo $arrEspeces['autres_noms_francais']; ?></li>
        <?php } ?>
    </ul>
    <hr>
    <ul>
        <?php if ($arrEspeces['statut_LEMV'] != '') { ?>
            <li>Statu : <?php echo $arrEspeces['statut_LEMV']; ?></li>
        <?php } ?>
        <?php if ($arrEspeces['groupe_nom'] != '') { ?>
            <li>Groupe : <?php echo $arrEspeces['groupe_nom']; ?></li>
        <?php } ?>
        <?php if ($arrImage['nom_image'] != '') { ?>
            <img src="<?php echo $niveau ?>assets/img/<?php echo $arrImage['nom_image']; ?>" alt="<?php echo $arrImage['bas-de-vignette']; ?>">
        <?php } ?>
    </ul>
</body>

</html>