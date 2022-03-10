<?php
?>

<div id="administration">
    <!-- main html -->
    <h2> Espace Administrateur </h2>

    <!-- Verification Administrateur -->
    <?php if (isset($_SESSION['login']) && $_SESSION['type'] == 1): ?>
        <section id="admin_reservations">
            <ul id="admin_reserv_list">
                <?php foreach($all_reservations as $une_reserv) : ?>
                    <li>
                        <p> Le <?= $une_reserv->date_reserv ?> à <?= $une_reserv->heure ?>, Monsieur/Madame <?= $une_reserv->nom_reserv ?> <?= $une_reserv->prenom_reserv ?>.</p>
                    </li>
                <?php endforeach;?>
            </ul>
        </section>
    <?php else: ?>
        <p>ESPACE RESERVE A L'ADMINISTRATION</p>
    <?php endif; ?>
</div>