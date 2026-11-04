<?php

$niveau = '../../../';

include($niveau . 'assets/inc/config.inc.php');

$intIdEspece = intval($_GET['id_espece']);

$strRequete =
    "SELECT especes.*, especes.id AS espece_id, groupes.nom_groupe AS groupe_nom, groupes.id FROM especes 
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

$strRequeteEspeceSim = "SELECT DISTINCT especes.id AS espece_id, especes.nom_francais AS nom, groupes.nom_groupe FROM groupes INNER JOIN especes ON groupes.id = especes.groupe_id WHERE especes.groupe_id = " . $arrEspeces['groupe_id'] . " AND especes.id != $intIdEspece ORDER BY rand() LIMIT 3";

$pdosResultatEspeceSim = $pdoConnexion->query($strRequeteEspeceSim);

$nbEspecesSim = $pdosResultatEspeceSim->rowCount();
$arrEspecesSim = array();
for ($cptSim = 0; $cptSim < $nbEspecesSim; $cptSim++) {
    $arrEspecesSim[$cptSim] = $pdosResultatEspeceSim->fetch();
}
$pdosResultatEspeceSim->closeCursor();

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
    <main>
        <div class="fil-arianne">
            <a href="<?php echo $niveau ?>index.php">Accueil</a>
            <
                <a href="<?php echo $niveau ?>pages/especes/index.php">Liste des espèces</a>
                <
                    <a href="index.php?id_espece=<?php echo $arrEspeces['espece_id'] ?>"><?php echo $arrEspeces['nom_francais'] ?></a>
        </div>

        <section class="table-des-matieres__containeur flex">

            <div class="table-des-matieres__titre flex">
                <p class="fs16px">Table des matières</p>
            </div>
            <?php if (isset($arrEspeces['repartition'])) { ?>
                <a href="#repartition">Répartition</a>
            <?php } ?>
            <?php if (isset($arrEspeces['habitat'])) { ?>
                <a href="#habitat">Habitat</a>
            <?php } ?>
            <?php if (isset($arrEspeces['etat_situation'])) { ?>
                <a href="#etat">État de la situation</a>
            <?php } ?>
            <?php if (isset($arrEspeces['alimentation'])) { ?>
                <a href="#alimentation">Alimentation</a>
            <?php } ?>
            <?php if (isset($arrEspeces['reproduction'])) { ?>
                <a href="#reproduction">Reproduction</a>
            <?php } ?>
            <?php if (isset($arrEspeces['comportement'])) { ?>
                <a href="#comportement">Comportement</a>
            <?php } ?>
            <?php if (isset($arrEspeces['menaces'])) { ?>
                <a href="#menaces">Menaces</a>
            <?php } ?>

            <a href="#memegroupe">Espèce du même groupe</a>
        </section>

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
            <section id="repartition">
                <?php if (isset($arrEspeces['repartition'])) { ?>
                    <h2>Répartition :</h2>
                    <li><?php echo $arrEspeces['repartition']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="habitat">
                <?php if (isset($arrEspeces['habitat'])) { ?>
                    <h2>Habitat :</h2>
                    <li><?php echo $arrEspeces['habitat']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="etat">
                <?php if (isset($arrEspeces['etat_situation'])) { ?>
                    <h2>État de la situation :</h2>
                    <li><?php echo $arrEspeces['etat_situation']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="alimentation">
                <?php if (isset($arrEspeces['alimentation'])) { ?>
                    <h2>Alimentation :</h2>
                    <li><?php echo $arrEspeces['alimentation']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="reproduction">
                <?php if (isset($arrEspeces['reproduction'])) { ?>
                    <h2>Reproduction :</h2>
                    <li><?php echo $arrEspeces['reproduction']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="comportement">
                <?php if (isset($arrEspeces['comportement'])) { ?>
                    <h2>Comportement :</h2>
                    <li><?php echo $arrEspeces['comportement']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="menaces">
                <?php if (isset($arrEspeces['menaces'])) { ?>
                    <h2>Menaces :</h2>
                    <li><?php echo $arrEspeces['menaces']; ?></li>
                    <hr>
                <?php } ?>
            </section>
            <section id="memegroupe">
                <h2>Espèce de même groupe</h2>
                <?php for ($cptEspeceSim = 0; $cptEspeceSim < count($arrEspecesSim); $cptEspeceSim++) { ?>
                    <li>
                        <a href="index.php?id_espece=<?php echo $arrEspecesSim[$cptEspeceSim]['espece_id']; ?>"><?php echo $arrEspecesSim[$cptEspeceSim]['nom']; ?></a>
                    </li>
                <?php } ?>
            </section>
        </ul>
    </main>
    <footer class="footer">
        <?php include($niveau . "assets/inc/fragments/bas-de-page.php") ?>
    </footer>
</body>

</html>