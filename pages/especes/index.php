<?php

$niveau = '../../';

include($niveau . 'assets/inc/config.inc.php');

/* Requete Liste des espèces et groupe */
$strRequete = 'SELECT DISTINCT especes.*, groupes.nom_groupe, images.nom_image 
                FROM especes
                INNER JOIN groupes ON especes.groupe_id = groupes.id 
                INNER JOIN images ON especes.id = images.espece_id
                WHERE nom_image LIKE "IMG_%"
                ORDER BY nom_francais';

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();
$arrEspeces = $pdosResultat->fetchAll();

$pdosResultat->closeCursor();

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

<main>
    <div class="fil-arianne">
        <p>fil d'arianne</p>
    </div>

    <h1>Liste des espèces</h1>

    <form action="index.php" method="post">
        <qc-search-bar name="tx_solr[q]"></qc-search-bar>
    </form>

    <ul class="liste-especes__containenur">
        <?php
        foreach ($arrEspeces as $espece) {
            echo "<li class='liste-especes__item'>";

            echo '<img src=' . $niveau . "assets/img/$espece[nom_image] alt=$espece[nom_francais]'>";

            echo "<div class='liste-especes__noms'>";
            echo "<h3>$espece[nom_francais]</h3>";
            echo "<p>$espece[nom_scientifique]</p>";
            echo "</div>";

            echo "<div class='liste-especes__appartenances'>";
            echo "<p>Groupe : $espece[nom_groupe]</p>";
            echo "<p>Statut : $espece[statut_LEMV]</p>";
            echo "</div>";
            echo "</li>";


        }
        ?>
    </ul>

</main>




</body>

</html>