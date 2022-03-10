<?php

?>

<header>
    <?php if (isset($_SESSION['login'])) : ?>
        <nav id="menu_user">
            <ul>
                <li id="nom_utilisateur">Bonjour &nbsp;<?= $_SESSION['login'] ?></li>
                <li><a href="?view=mes_reservations">Mes réservations</a></li>
                <li><a href="?view=deconnexion">Déconnexion</a></li>
            </ul>
        </nav>
    <?php else : ?>
        <nav id="menu_user">
            <ul>
                <li><a href="?view=se_connecter">Se connecter</a></li>
                <li><a href="?view=creer_compte">Créer un compte</a></li>
            </ul>
        </nav>
    <?php endif; ?>

    <h1 id="page_name">Les recettes de Jean-bob</h1>

    <nav id="menu_navigation">
        <ul>
            <li class="smenu"><a href="/">Accueil</a></li>
            <li class="smenu"><a href="?type=all&view=recettes">Recettes</a></li>
            <li class="smenu"><a href="?view=reservation">Reservation</a></li>
        </ul>
    </nav>
</header>
