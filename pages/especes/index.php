<?php

$niveau = '../../';

include($niveau . 'assets/inc/config.inc.php');

/* Requete Liste des espèces et groupe */
$strRequete = 'SELECT DISTINCT especes.*, groupes.nom_groupe, images.nom_image 
                FROM especes
                INNER JOIN groupes ON especes.groupe_id = groupes.id 
                INNER JOIN images ON especes.id = images.espece_id
                WHERE nom_image LIKE "IMG_%"
                ORDER BY nom_francais
                LIMIT 5';

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();
$arrEspeces = $pdosResultat->fetchAll();

$pdosResultat->closeCursor();

/* Requete Liste des statuts des espèces */
$strRequete = 'SELECT DISTINCT statut_LEMV AS nom
                FROM especes
                ORDER BY statut_LEMV';

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();
$arrSatuts = $pdosResultat->fetchAll();

$pdosResultat->closeCursor();

/* Requete Liste des groupes des espèces */
$strRequete = 'SELECT DISTINCT *
                FROM groupes
                ORDER BY nom_groupe';

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();
$arrGroupes = $pdosResultat->fetchAll();

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

<main class="main">
    <div class="fil-arianne">
        <p>fil d'arianne</p>
    </div>

    <div class="main__contenus">

        <div class="main__especes-filtres">
            <div class="especes-filtres__titre flex">
                <p>Filtres</p>
                <p>-</p>
            </div>

            <div class="especes-filtres__statuts">
                <p class="fs16px">Status</p>
                <ul class="especes-filtres__liste flex">
                    <li class='especes-filtres__item flex'><input type="checkbox" value="Tous" name="filtres-statuts">Tous</li>
                    <?php
                    foreach ($arrSatuts as $statut) {
                        echo "<li class='especes-filtres__item flex'><input";
                        echo " type='checkbox' value='$statut[nom]' name='filtres-statuts'>$statut[nom]s";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>

            <div class="especes-filtres__groupes">
                <p class="fs16px">Groupes</p>
                <ul class="especes-filtres__liste flex">
                    <li class='especes-filtres__item flex'><input type="checkbox" value="Tous" name="filtres-groupes">Tous</li>
                    <?php
                    foreach ($arrGroupes as $groupe) {
                        echo "<li class='especes-filtres__item flex'><input";
                        echo " type='checkbox' value='$groupe[nom_groupe]' name='filtres-groupes'>$groupe[nom_groupe]";
                        echo "</li>";
                    }
                    ?>
                </ul>
            </div>

        </div>

        <div class="main__liste-especes">
            <h1>Liste des espèces</h1>

            <form action="index.php" method="post">
                <qc-search-bar name="tx_solr[q]"></qc-search-bar>
            </form>

            <ul class="liste-especes__containenur flex">
                <?php
                foreach ($arrEspeces as $espece) {
                    echo "<li class='liste-especes__item flex'>";

                    echo '<img src=' . $niveau . "assets/img/$espece[nom_image] alt=$espece[nom_francais]'>";

                    echo "<div class='liste-especes__noms flex'>";
                    echo "<h3>$espece[nom_francais]</h3>";
                    echo "<p>$espece[nom_scientifique]</p>";
                    echo "</div>";

                    echo "<div class='liste-especes__appartenances flex'>";
                    echo "<p>Groupe : $espece[nom_groupe]</p>";
                    echo "<p class=''>Statut : $espece[statut_LEMV] </p>";
                    echo "</div>";
                    echo "<button class='qc-button qc-primary'>Voir la fiche complète</button>";
                    echo "</li>";


                }
                ?>
                <button class='qc-button qc-primary'>Afficher plus d'espèces</button>
            </ul>

        </div>
    </div>

</main>

<footer class="footer">
    <?php include($niveau . "assets/inc/fragments/bas-de-page.php") ?>
</footer>

</body>

</html>