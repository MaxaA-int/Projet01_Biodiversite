<?php

$niveau = '../../';

// include($niveau . 'assets/inc/config.inc.php');

// $intIdStyle = isset($_GET['idStyle']) ? intval($_GET['idStyle']) : 0;

// $strFiltre = "";
// if ($intIdStyle !== 0) {
//     $strFiltre = "WHERE styles.id = $intIdStyle";
// }

// Requete Participants
// $strRequete =
//     "SELECT DISTINCT artistes.nom, artistes.id
//     FROM artistes 
//     INNER JOIN styles_artistes ON artistes.id = styles_artistes.artiste_id 
//     INNER JOIN styles ON styles_artistes.style_id = styles.id
//     $strFiltre
//     ORDER BY artistes.nom";

// $pdosResultat = $pdoConnexion->query($strRequete);

// $arrArtistes = array();
// $ligne = $pdosResultat->fetch();
// for ($intCptEnr = 0; $intCptEnr < $pdosResultat->rowCount(); $intCptEnr++) {
//     $arrArtistes[$intCptEnr]['id'] = $ligne['id'];
//     $arrArtistes[$intCptEnr]['nom'] = $ligne['nom'];

//     //On établi une deuxième requête pour afficher les styles du artiste
//     $strRequete = 'SELECT nom FROM styles
// 		     INNER JOIN styles_artistes ON styles.id = styles_artistes.style_id
// 		     WHERE styles_artistes.artiste_id=' . $ligne['id'];

//     //Initialisation de l'objet PDOStatement et exécution de la requête
//     $pdosSousResultat = $pdoConnexion->prepare($strRequete);
//     $pdosSousResultat->execute();

//     $ligneStyle = $pdosSousResultat->fetch();
//     $strStyle = "";
//     //Extraction des noms de Styles de la sous requête
//     for ($intCptStyle = 0; $intCptStyle < $pdosSousResultat->rowCount(); $intCptStyle++) {
//         if ($strStyle != "") {
//             $strStyle = $strStyle . ", ";    //ajout d'une virgule lorsque nécessaire
//         }
//         $strStyle = $strStyle . $ligneStyle['nom'];
//         $ligneStyle = $pdosSousResultat->fetch();
//     }
//     //On libère la sous requête
//     $pdosSousResultat->closeCursor();

//     //ajout d'un propriété pour afficher les styles
//     $arrArtistes[$intCptEnr]['styles'] = $strStyle;

//     //On passe à l'autre artiste
//     $ligne = $pdosResultat->fetch();
// }

// $pdosResultat->closecursor();

// // Requete Styles
// $strRequete = "SELECT id, nom FROM styles";

// $pdosResultat = $pdoConnexion->query($strRequete);

// $arrStyles = array();
// for ($intCptEnr = 0; $ligne = $pdosResultat->fetch(); $intCptEnr++) {
//     $arrStyles[$intCptEnr]['id'] = $ligne['id'];
//     $arrStyles[$intCptEnr]['nom'] = $ligne['nom'];
// }

// $pdosResultat->closecursor();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>Liste des espèces - Biodiversité</title>

    <?php
    include($niveau . "assets/inc/fragments/head_links.php");
    include($niveau . "assets/inc/fragments/balises_script.php");
    ?>

</head>

<body>

    <?php include($niveau . "assets/inc/fragments/navigation.php") ?>

    <h1>Liste des espèces</h1>

    <ul>
        <?php

        // for ($intCptEnr = 0; $intCptEnr < count($arrArtistes); $intCptEnr++) {
        //     echo '<li><a href="fiche/index.php?idArtiste=' . $arrArtistes[$intCptEnr]["id"] . '">' . $arrArtistes[$intCptEnr]['nom'] . '</a></li>';
        //     echo '<p> Style(s) : ' . $arrArtistes[$intCptEnr]['styles'] . '</p>';
        //     echo '<br>';
        // }
        ?>
    </ul>

    <ul>
        <li>
            <!-- <a href="index.php">Tous les styles</a> -->
        </li>
        <br>
        <?php
        // for ($intCptEnr = 0; $intCptEnr < count($arrStyles); $intCptEnr++) {
        //     echo '<li><a href="index.php?idStyle=' . $arrStyles[$intCptEnr]["id"] . '">' . $arrStyles[$intCptEnr]['nom'] . '</a></li>';
        //     echo '<br>';
        // }
        ?>
    </ul>

</body>

</html>