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
    <title>Fiche d'une espèce - <?php echo $arrEspeces['nom_francais'] ?></title>

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
    </ul>
    <hr>
    <ul>
        <?php if ($arrImage['nom_image'] != '') { ?>
            <img src="<?php echo $niveau ?>assets/img/<?php echo $arrImage['nom_image']; ?>" alt="<?php echo $arrImage['bas-de-vignette']; ?>">
        <?php } ?>
        <?php if ($arrEspeces['repartition']) { ?>
            <h2>Répartition :</h2>
            <li><?php echo $arrEspeces['repartition']; ?></li>
            <hr>
        <?php } ?>
        <?php if ($arrEspeces['habitat']) { ?>
            <h2>Habitat :</h2>
            <li><?php echo $arrEspeces['habitat']; ?></li>
            <hr>
        <?php } ?>
        <?php if ($arrEspeces['etat_situation']) { ?>
            <h2>État de la situation :</h2>
            <li><?php echo $arrEspeces['etat_situation']; ?></li>
            <hr>
        <?php } ?>
        <?php if ($arrEspeces['alimentation']) { ?>
            <h2>Alimentation :</h2>
            <li><?php echo $arrEspeces['alimentation']; ?></li>
            <hr>
        <?php } ?>
        <?php if ($arrEspeces['reproduction']) { ?>
            <h2>Reproduction :</h2>
            <li><?php echo $arrEspeces['reproduction']; ?></li>
            <hr>
        <?php } ?>
        <?php if ($arrEspeces['comportement']) { ?>
            <h2>Comportement :</h2>
            <li><?php echo $arrEspeces['comportement']; ?></li>
            <hr>
        <?php } ?>
        <?php if ($arrEspeces['menaces']) { ?>
            <h2>Menaces :</h2>
            <li><?php echo $arrEspeces['menaces']; ?></li>
            <hr>
        <?php } ?>
            <h2>Espèce de même groupe</h2>
            <?php for ($cptEspeceSim = 0; $cptEspeceSim < count($arrEspeces); $cptEspeceSim++) { ?>
            <li>
                <?php echo $arrEspeces['groupe_nom']; ?>
            </li>
            <?php } ?>
    </ul>
</body>

</html>