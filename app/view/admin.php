<?php
?>
<div id="administration">
    <!-- main html -->
    <h2> Espace Administrateur </h2>

    <!-- Verification Administrateur -->
<?php if (isset($_SESSION['login']) && $_SESSION['type'] == 1): ?>
    <div class="container">
        <h3> Ajouter une recette </h3>
        <form action="?view=admin" method="POST" enctype="multipart/form-data">

            <div id="euhok"> <label for="nomRec">Nom de la recette : </label>
                <input type="text" id="nomRec" name="nomRec">
            </div>
            <div id="euhok"> <label for="nbPers">Nombre de personnes : </label>
                <input type="text" id="nbPers" name="nbPers">
            </div>
            <div id="euhok"><label for="ingredient">Ingredients : </label>
                <textarea id="ingredient" name="ingredient"></textarea>
            </div>
            <div id="euhok"> <label for="recette">La Recette : </label>
                <textarea id="recette" name="recette"></textarea>
            </div>
            <div id="euhok"><label for="typeRec">Type de recette : </label>
                <select id="typeRec" name="typeRec">
                    <?php foreach($resultReqType as $typeRec) : ?>
                        <option value=<?= $typeRec->typeId ?>> <?= $typeRec->typeNom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="euhok"> <label for="image">Image : </label>
                <input type="file" id="image" name="image">
            </div>

            <div id="euhok"> <button type="submit" name="send">Envoyer</button> </div>
            <?php if (isset($repInsertionForm)) : ?>
                <p>Requete reussie</p>
            <?php endif; ?>

        </form>
    </div>
<?php else: ?>
    <p>ESPACE RESERVE A L'ADMINISTRATION</p>
<?php endif; ?>
</div>
