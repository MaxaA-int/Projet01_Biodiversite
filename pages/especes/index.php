<?php

$niveau = '../../';

include($niveau . 'assets/inc/config.inc.php');

/* Fonctions */
function ecrireChecked($p_valeurFiltre)
{
    return isset($_GET["filtre-$p_valeurFiltre"]) ? 'checked' : '';
}

function verifierFiltres($p_valeurFiltre) {

}

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

$arrFiltres = array_merge($arrSatuts, $arrGroupes);

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

            <form action="index.php" method="GET">
                <div class="especes-filtres__statuts">
                    <p class="fs16px">Statut</p>
                    <ul class="especes-filtres__liste flex">
                        <?php
                        foreach ($arrSatuts as $statut) {
                            echo "<li class='especes-filtres__item flex'><input";
                            echo " type='checkbox' id='filtre-$statut[nom]' value='$statut[nom]' name='filtre-$statut[nom]'";
                            echo ecrireChecked($statut['nom']) . ">";
                            echo "<label for='filtre-$statut[nom]'>$statut[nom]s";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>

                <div class="especes-filtres__groupes">
                    <p class="fs16px">Groupe</p>
                    <ul class="especes-filtres__liste flex">
                        <?php
                        foreach ($arrGroupes as $groupe) {
                            echo "<li class='especes-filtres__item flex'><input";
                            echo " type='checkbox' id='filtre-$groupe[nom_groupe]' value='$groupe[nom_groupe]' name='filtre-$groupe[nom_groupe]'";
                            echo ecrireChecked($groupe['nom_groupe']) . ">";
                            echo "<label for='filtre-$groupe[nom_groupe]'>$groupe[nom_groupe]";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>

                <div class="especes-filtres__submit flex">
                    <input class='' type="submit" value="Appliquer les filtres" name="btn__appliquer-filtres">
                    <a href="index.php">Réinitialiser les filtres</a>
                </div>
            </form>
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