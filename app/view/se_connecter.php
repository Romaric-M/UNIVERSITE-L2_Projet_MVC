<?php

?>

<section id="page_login">
    <h2> Espace de connexion </h2>

    <div id="container">
        <h3> Entrez vos identifiants </h3>
        <form action="?view=test" method="POST">
            <div id="euhok"> <label for="login">Nom d'utilisateur : </label>
                <br>
                <input type="text" id="login" name="login">
            </div>
            <div id="euhok"> <label for="mdp">Mot de passe : </label>
                <br>
                <input type="password" id="mdp" name="mdp">
            </div>
            <div id="euhok"> <button type="submit" name="send">Envoyer</button> </div>
        </form>
    </div>
</section>

