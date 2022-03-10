<?php
?>

<header class="head-admin">
    <div class="retour_acceuil"> <a href="/">Accueil</a> </div>

    <h1>Administration</h1>

    <?php if (isset($_SESSION['login'])) : ?>
        <nav id="menu_navigation">
            <ul>
                <li><a href="?view=admin">Ajouter une recette</a></li>
                <li><a href="?view=admin_reservation">Voir les reservations</a></li>
            </ul>
        </nav>
    <?php endif; ?>
</header>
