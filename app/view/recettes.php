<?php

?>

<main id="recette">
    <div class="menu_recette">
        <h2>Nos recettes</h2>
        <nav>
            <ul id="menu_type">
                <li class="smenu"><a href="?type=all&view=recettes">Toutes les Recettes</a></li>
                <li class="smenu"><a href="?type=1&view=recettes">Les Entrées</a></li>
                <li class="smenu"><a href="?type=2&view=recettes">Les Plats</a></li>
                <li class="smenu"><a href="?type=3&view=recettes">Les Desserts</a></li>
            </ul>
        </nav>
    </div>
    <section id="les_recettes">
        <ul id="suggestion_list">
            <?php foreach($type_recette as $recette) : ?>
                <li class="liste_type_recette">
                    <h3><?= $recette->nom_rec ?></h3>
                    <img src="<?= $recette->img_rec ?>">
                    <a href="?recette=<?= $recette->id_rec ?>&view=voir_recette">Voir la recette</a>
                </li>
            <?php endforeach;?>
        </ul>
    </section>
</main>
