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
    <h1>Accueil</h1>


</main>
</body>

</html>