<?php

$niveau = '';

// include($niveau . 'assets/inc/config.inc.php');

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
            <p>Table des matières</p>
        </div>

        <a href="#mise-a-action">Mise à l'action</a>
        <a href="#statuts">Statuts</a>
        <a href="#especes-decouvrir">Espèces à découvrir</a>
        <a href="#actualites">Actualités</a>
    </section>

    <section class="mise-a-action" id="mise-a-action">
        <h2>Mise à l'action et sensibilisation</h2>

        <div class="mise-a-action__pourquoi">
            <p>Pourquoi protéger ces espèces ?</p>
            <ul>
                <li>Des écosystèmes de santé</li>
                <li>Une nature plus résiliente</li>
                <li>Un patrimoine naturel unique</li>
            </ul>

        </div>

        <p>Chaque espèce joue un rôle essentiel dans l’équilibre des écosystèmes. Leur protection, c’est préserver la
            biodiversité, la qualité de nos milieux naturels et notre patrimoine pour les générations futures
        </p>
    </section>


</main>
</body>

</html>