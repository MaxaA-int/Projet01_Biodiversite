<?php

$niveau = '';

include($niveau . 'assets/inc/config.inc.php');

/* Fonctions */
function tronquerTexteActualite($p_article)
{
    $arrTexteArticle = explode(' ', $p_article);

    if (count($arrTexteArticle) > 45) {
        array_splice($arrTexteArticle, 45, count($arrTexteArticle));
    }

    return implode(' ', $arrTexteArticle);
}

/* Requête pour avoir 4 espèces aléatoires */
$strRequete = 'SELECT DISTINCT especes.*, groupes.nom_groupe, images.nom_image 
                FROM especes
                INNER JOIN groupes ON especes.groupe_id = groupes.id 
                INNER JOIN images ON especes.id = images.espece_id
                WHERE nom_image LIKE "IMG_%"
                ORDER BY RAND()
                LIMIT 4';

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();
$arrEspecesDecouvrir = $pdosResultat->fetchAll();

$pdosResultat->closeCursor();

/* Requête pour avoir les actualités */
$strRequete = "SELECT *
                FROM actualites";

$pdosResultat = $pdoConnexion->prepare($strRequete);
$pdosResultat->execute();
$arrActualites = $pdosResultat->fetchAll();

$pdosResultat->closeCursor();

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>Accueil - Biodiversité</title>

    <?php
    include($niveau . "assets/inc/fragments/head_links.php");
    include($niveau . "assets/inc/fragments/balises_script.php");
    ?>
</head>

<body>
<header class="entete">
    <?php include($niveau . "assets/inc/fragments/navigation.php") ?>

    <div class="banniere-hero__containeur flex">
        <picture class="banniere-hero__img">
            <source
                    srcset="
                    assets/img/IMG_Rorqual-commun_fredklus-melccfp.jpg 1x
                    assets/img/IMG_Rorqual-commun_fredklus-melccfp.jpg 2x
                  "
            />
            <img
                    src="assets/img/IMG_Rorqual-commun_fredklus-melccfp.jpg"
                    alt="Image de Rorqual Commun"
            />
        </picture>
        <div class="banniere-hero__info">
            <div class="banniere-hero__titre">
                <h2>Découvrir.</h2>
                <h2>Comprendre.</h2>
                <h2>Protéger.</h2>
            </div>
            <button class="qc-button qc-primary">Découvrir les espèces menacées</button>
        </div>
    </div>
</header>

<main>
    <h1 class="main__titre">Objectif Biodiversité</h1>

    <section class="table-des-matieres__containeur flex">

        <div class="table-des-matieres__titre flex">
            <p class="fs16px">Table des matières</p>
        </div>

        <a href="#mise-a-action">Mise à l'action</a>
        <a href="#statuts">Statuts</a>
        <a href="#especes-decouvrir">Espèces à découvrir</a>
        <a href="#actualites">Actualités</a>
    </section>

    <section class="mise-a-action flex" id="mise-a-action">
        <h2>Mise à l'action et sensibilisation</h2>

        <ul class="mise-a-action__liste flex">
            <li class="mise-a-action__item">
                <div class="mise-a-action__pourquoi fs16px">
                    <p>Pourquoi protéger ces espèces ?</p>
                    <ul>
                        <li>Des écosystèmes de santé</li>
                        <li>Une nature plus résiliente</li>
                        <li>Un patrimoine naturel unique</li>
                    </ul>

                </div>
            </li>
            <li class="mise-a-action__item">
                <p class="fs16px">Chaque espèce joue un rôle essentiel dans l’équilibre des écosystèmes. Leur
                    protection, c’est
                    préserver la
                    biodiversité, la qualité de nos milieux naturels et notre patrimoine pour les générations futures.
                </p>
            </li>
        </ul>


    </section>

    <section class="statuts" id="statuts">
        <h2>Statuts</h2>

        <ul class="statuts__liste flex">
            <li class="statuts__liste__item flex">
                <p>Menacé :</p>
                <p class="fs16px">espèce, sous-espèce ou population dont la disparition est redoutée.</p>
                <form action="pages/especes/index.php?" method="get">
                    <input type="hidden" name="filtre-Menacée" value="Menacée">
                    <button class="qc-button qc-secondary">Voir les espèces menacées</button>
                </form>
            </li>

            <li class="statuts__liste__item flex">
                <p>Vulnérable :</p>
                <p class="fs16px">espèce, sous-espèce ou population dont la survie est jugée précaire. Sa disparition
                    n’est pas
                    redoutée à court ou à moyen terme
                </p>

                <form action="pages/especes/index.php?" method="get">
                    <input type="hidden" name="filtre-Vulnérable" value="Vulnérable">
                    <button class="qc-button qc-secondary" type="submit">Voir les espèces vulnérables</button>
                </form>
            </li>
        </ul>
    </section>

    <section class="especes-decouvrir flex" id="especes-decouvrir">
        <h2>Espèces à découvrir</h2>

        <ul class="especes-decouvrir__liste flex">
            <?php
            foreach ($arrEspecesDecouvrir as $espece) {
                echo "<li class='especes-decouvrir__item flex'>";
                echo "<img src='assets/img/$espece[nom_image]' alt='$espece[nom_francais]' />";
                echo "<p>$espece[nom_francais]</p>";
                echo "<form action='pages/especes/fiche/index.php?' method='get'>";
                echo "<input type='hidden' name='id_espece' value='$espece[id]'>";
                echo "<button class='qc-button qc-secondary'>Voir la fiche</button>";
                echo "</form>";
                echo "</li>";
            }
            ?>
        </ul>
        <a class="flex" href="pages/especes/index.php">Découvrir davantage d'espèces</a>
    </section>

    <section class="actualites" id="actualites">
        <h2>Actualités</h2>
        <ul class="actualites__liste flex">
            <?php
            foreach ($arrActualites as $actualite) {
                echo "<li class='actualites__item flex'>";

//                echo "<figure>";
                echo "<img src='assets/img/photos-actualites/$actualite[id].jpeg' alt='Image de $actualite[titre]>";
//                echo "<figcaption>$actualite[credit_photo]</figcaption>";
//                echo "</figure>";

                echo "<p class='actualites__article-dates'>$actualite[date], $actualite[auteur]</p>";
                echo "<h3 class='actualites__article-titre'>$actualite[titre]</h3>";
                echo "<p class='actualites__article-desc fs16px'>" . tronquerTexteActualite($actualite['texte']);
                if (count(explode(" ", $actualite['texte'])) >= 45) {
                    echo " <a href='#'>...</a>";
                }
                echo "</p>";
                echo "<button class='qc-button qc-secondary'>Lire l'article</button>";
                echo "</li>";
            }
            ?>
        </ul>
        <a class="flex" href="#">Voir toutes les nouvelles</a>
    </section>

</main>

<footer class="footer">
    <?php include($niveau . "assets/inc/fragments/bas-de-page.php") ?>
</footer>
</body>

</html>