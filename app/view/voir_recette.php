<?php
?>

<?php foreach($recup_recette as $uneRecette) :?>
    <article id="detail_recette">
        <h2><?= $uneRecette->nom_rec ?></h2>
        <div class="bloc_detail_recette">
            <img src="<?= $uneRecette->img_rec ?>">
            <div class="sousbloc_detail_recette">
                <strong>Pour <?= $uneRecette->nb_pers ?> Personnes</strong>
                <p><?= $uneRecette->ingredient ?></p>
                <p><?= $uneRecette->la_recette ?></p>
            </div>
        </div>
    </article>
<?php endforeach; ?>
