<?php

$niveau = '';

include($niveau . 'assets/inc/config.inc.php');

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

    <div class="banniere-hero__containeur">
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

        <div class="mise-a-action__pourquoi fs16px">
            <p>Pourquoi protéger ces espèces ?</p>
            <ul>
                <li>Des écosystèmes de santé</li>
                <li>Une nature plus résiliente</li>
                <li>Un patrimoine naturel unique</li>
            </ul>

        </div>

        <p class="fs16px">Chaque espèce joue un rôle essentiel dans l’équilibre des écosystèmes. Leur protection, c’est
            préserver la
            biodiversité, la qualité de nos milieux naturels et notre patrimoine pour les générations futures.
        </p>
    </section>

    <section class="statuts" id="statuts">
        <h2>Statuts</h2>

        <ul class="statuts__liste flex">
            <li class="statuts__liste__item flex">
                <p>Menacé :</p>
                <p class="fs16px">espèce, sous-espèce ou population dont la disparition est redoutée.</p>
                <button class="qc-button qc-secondary">Voir les espèces menacées</button>
            </li>

            <li class="statuts__liste__item flex">
                <p>Vulnérable :</p>
                <p class="fs16px">espèce, sous-espèce ou population dont la survie est jugée précaire. Sa disparition
                    n’est pas
                    redoutée à court ou à moyen terme
                </p>
                <button class="qc-button qc-secondary">Voir les espèces vulnérables</button>
            </li>
        </ul>
    </section>

    <section class="especes-decouvrir flex" id="especes-decouvrir">
        <h2>Espèces à découvrir</h2>

        <ul class="espece-decouvrir__liste flex">
            <li class="espece-decouvrir__item">
                <img src="assets/img/IMG_Rorqual-commun_fredklus-melccfp.jpg" alt="Rorqual Commun" />
                <p>Rorqual Commun</p>
                <button class="qc-button qc-secondary">Voir la fiche</button>
            </li>
        </ul>
    </section>


</main>
</body>

</html>