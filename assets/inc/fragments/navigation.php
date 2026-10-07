<qc-piv-header title-text="Objectif Biodiversité Québec" title-url="https://www.quebec.ca/"
    alt-logo="Accédez à Québec.ca">
    <nav slot="links" aria-label="Navigation PIV">
        <ul>
            <li><a href="#fakeEnglish">English</a>
            </li>
            <li><a href="#">Nous joindre</a>
            </li>
        </ul>
    </nav>
</qc-piv-header>

<div class="menu-principal__containeur">
    <a href="#contenu" class="screen-reader-only focusable">Allez au contenu</a>
    <nav class="nav-principale" aria-label="Menu Principal">
        <ul class="nav__list flex" id="navList">

            <li class="nav__list-item">
                <a href="<?php echo $niveau ?>index.php" class="nav__link nav__link--active"
                    aria-current="page">Accueil</a>
            </li>

            <li class="nav__list-item">
                <a href="<?php echo $niveau ?>pages/especes/index.php" class="nav__link">Liste des espèces</a>
            </li>

            <li class="nav__list-item">
                <a href="<?php echo $niveau ?>pages/a-propos/index.php" class="nav__link">À propos</a>
            </li>

            <li class="nav__list-item">
                <a href="<?php echo $niveau ?>pages/nous-contacter/index.php" class="nav__link">Nous contacter</a>
            </li>

        </ul>

    </nav>
</div>