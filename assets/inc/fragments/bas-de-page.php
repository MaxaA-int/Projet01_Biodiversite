<div class="pied-de-page">
    <h4>Projet Biodiversité Québec</h4>

    <ul class="pied-de-page__liste">
        <li class="pied-de-page__item">
            <h6>Navigation Principale</h6>
            <nav aria-label="Navigation du pied de page" class="pied-de-page__navigation">
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
                        <a href="<?php echo $niveau ?>pages/nous-contacter/index.php" class="nav__link">Nous
                            contacter</a>
                    </li>
                </ul>
            </nav>
        </li>

        <li class="pied-de-page__item">
            <h6>Suivez-nous</h6>
            <nav aria-label="Navigation du pied de page" class="pied-de-page__navigation">
                <ul class="flex">
                    <li>
                        <qc-external-link class="flex">
                            <a href="#" class="not-visited">Facebook</a>
                        </qc-external-link>
                    </li>
                    <li>
                        <qc-external-link class="flex">
                            <a href="#" class="not-visited">X (Twitter)</a>
                        </qc-external-link>
                    </li>
                    <li>
                        <qc-external-link class="flex">
                            <a href="#" class="not-visited">Youtube</a>
                        </qc-external-link>
                    </li>
                    <li>
                        <qc-external-link class="flex">
                            <a href="#" class="not-visited">Instagram</a>
                        </qc-external-link>
                    </li>
                </ul>
            </nav>
        </li>
    </ul>

</div>
<qc-piv-footer>
    <nav aria-label="Navigation du pied de page">
        <ul>
            <li><a href="/">Accessibilité</a></li>
            <li><a href="/">Plan du site</a></li>
            <li><a href="/">Accès à l’information</a></li>
            <li><a href="/">Politique de confidentialité</a></li>
            <li><a href="/">Conditions d’utilisation</a></li>
            <li><a href="/">À propos de Québec.ca</a></li>
        </ul>
    </nav>
</qc-piv-footer>