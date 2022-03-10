<?php

?>

<section id="page_creerCompte">
    <div id="container">
        <h3> Creation de compte </h3>
        <form action="?view=creer_compte" method="POST">
            <div id="euhok"> <label for="nomCompte">Nom d'utilisateur : </label>
                <input type="text" id="nomCompte" name="nomCompte">
            </div>
            <div id="euhok"> <label for="mdpCompte">Mot de passe : </label>
                <input type="password" id="mdpCompte" name="mdpCompte">
            </div>
            <div id="euhok"><label for="emailCompte">E-Mail : </label>
                <input type="text" id="emailCompte" name="emailCompte">
            </div>
            <div id="euhok"> <button type="submit" name="send">Créer compte</button>
            </div>
        </form>
    </div>
</section>
