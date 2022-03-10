<?php
?>

<div id="reservation">
<section id="presentation_reservation">
    <h2>Reservation</h2>
    <p>Sur cette page vous pouvez réserver un cours de cuisine avec Jean-bob en personne!</p>
    <p>Les cours se déroulent du Lundi au Vendredi en aprés-midi et durent 1:40h.</p>
    <p>Pendant cette scéance vous serez probablement avec d'autres personnes qui peuvent avoir
        un niveau qui varie du votre, nous vous demanderont donc de respecter les autres participants.</p>
</section>


<!-- Vérification connexion -->
<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])): ?>
    <!--************************-->

    <!-- Formulaire de reservation -->
    <section id="page_reservation">
        <div id="container">
            <h3>Réservation</h3>
            <form action="?view=reservation" method="POST">
                <div id="euhok"> <label for="nom">Votre nom de famille : </label>
                    <input type="text" id="nom" name="nom">
                </div>
                <div id="euhok"> <label for="prenom">Votre prénom : </label>
                    <input type="text" id="prenom" name="prenom">
                </div>
                <div id="euhok"> <label for="laDate">Date de la reservation : </label>
                    <input type="date" id="laDate" name="laDate">
                </div>
                <div id="euhok"><label for="heure">Heure de reservation : </label>
                    <select id="heure" name="heure">
                        <?php foreach($res_reqHeure as $horaires) : ?>
                            <option value=<?= $horaires->id_horaire ?>> <?= $horaires->heure ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="euhok"> <button type="submit" name="send">Réserver !</button>
                </div>
            </form>
        </div>
    </section>
<?php else: ?>
    <section id="page_reservation_offline">
        <h2>Attention</h2>
        <p>Vous devez etre connecté pour pouvoir afficher le formulaire de réservation.</p>
        <p>Si vous ne disposez pas d'un compte sur notre site nous vous invitons à en créer un
            <br>en cliquant sur le bouton "créer un compte" en haut de la page.</p>
    </section>
    <!-- Fin de vérification de connexion -->
<?php endif; ?>
<!-- ******************************** -->
</div>
