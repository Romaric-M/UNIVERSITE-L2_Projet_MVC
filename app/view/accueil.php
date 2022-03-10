<?php
?>

<!---- main html ---->
<main id="index">
    <section id="presentation">
        <h2>Les recettes de Jean-bob</h2>
        <p>Bienvenue sur le site des recettes de Jean-bob !</p>
        <p>Jean-bob c'est un bon gars qui fait de la bonne cuisine !</p>
        <p>Sur ce site nous vous donnons les recettes de Jean-bob pour que vous puissiez les reproduires à la maison.</p>
        <p>Si vous le souhaitez et avez du temps libre vous pouvez aussi réserver une place dans un cours de cuisine.</p>
    </section>
    <section id="suggestion">
        <h2>Recettes qui peuvent vous plaire...</h2>
        <ul id="suggestion_list">
            <?php foreach ($random_recette as $une_recette) : ?>
                <li class="liste_recette">
                    <h3><?= $une_recette->nom_rec ?></h3>
                    <img src="<?= $une_recette->img_rec ?>">
                    <a href="?recette=<?= $une_recette->id_rec ?>&view=voir_recette">Voir la Recette</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
