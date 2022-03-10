<?php
?>

<div id="reservation">
    <section id="mes_reservations">
        <h2>Mes reservation</h2>
        <p>Voici vos réservations !</p>
    </section>


    <!-- Vérification connexion -->
    <?php if (isset($_SESSION['login']) && isset($_SESSION['id'])): ?>
    <!--************************-->

    <!-- Affichage de mes réservations -->
        <section class="les_reservations_client">
            <ul>
                <?php foreach($mes_reservations as $reservation) : ?>
                    <li>
                        <h3>Reservation du <?= $reservation->date_reserv ?></h3>
                        <p>Au nom de <?= $reservation->prenom_reserv ?> <?= $reservation->nom_reserv ?>, à <?= $reservation->heure ?></p>
                    </li>
                <?php endforeach;?>
            </ul>
        </section>
        <!-- Fin de vérification de connexion -->
    <?php endif; ?>
    <!-- ******************************** -->
</div>
