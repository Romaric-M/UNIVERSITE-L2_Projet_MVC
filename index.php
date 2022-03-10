<?php

session_start ();

use app\controller\ControllerRecettes;
use app\controller\ControllerUtilisateur;
use app\controller\ControllerReservation;

/* ------ AUTOLOAD ----- */

function chargerClasse($classe) {
    $classe = str_replace('\\', '/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

/*************************/

/* ----- Controllers ----- */
$recettes_control = new ControllerRecettes();
$utilisateur_control = new ControllerUtilisateur();
$reservation_control = new ControllerReservation();
/*************************/

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Recettes de Jean-bob</title>
    <link rel="stylesheet" href="app/public/css/style.css" type="text/css">
</head>

<body>
    <!----- header => header.php ---->
    <?php
    /* if on admin section load admin header menu */
    if (isset($_GET['view']) && $_GET['view']=='admin' || $_GET['view']=='admin_reservation') {
        include 'app/view/headerAdmin.php';
    }
    /* else load basic header menu */
    else {
        include 'app/view/header.php';
    }
    ?>


    <!---- main html ---->
    <?php
    /* view the recettes.php page */
    if (isset($_GET['view']) && $_GET['view']=='recettes') {
        $recettes_control->getRecettes();
    }
    /* view the voir_recette.php page */
    elseif (isset($_GET['view']) && $_GET['view']=='voir_recette') {
        $recettes_control->getRecettesById();
    }
    /* view the creer_compte.php page */
    elseif (isset($_GET['view']) && $_GET['view']=='creer_compte') {
        $utilisateur_control->creerCompte();
    }
    /* view the se_connecter.php page */
    elseif (isset($_GET['view']) && $_GET['view']=='se_connecter') {
        $utilisateur_control->viewSeConnecter();
    }
    /* used to login in the se_connecter.php page */
    elseif (isset($_POST['login']) && isset($_POST['mdp'])) {
        $utilisateur_control->login();
    }
    /* calls a function to log off and redirect to accueil.php */
    elseif (isset($_GET['view']) && $_GET['view']=='deconnexion') {
        $utilisateur_control->seDeconnecter();
    }
    /* view the reservation.php page */
    elseif (isset($_GET['view']) && $_GET['view']=='reservation') {
        $reservation_control->reservation();
    }
    elseif (isset($_GET['view']) && $_GET['view']=='mes_reservations') {
        $reservation_control->mesReservations();
    }
    /* !!!!!!!!!!!! A MODIFIER !!!!!!!!!! */
    elseif (isset($_GET['view']) && $_GET['view']=='admin') {
        $recettes_control->ajoutRecettes();
    }
    elseif (isset($_GET['view']) && $_GET['view']=='admin_reservation') {
        $reservation_control->allReservations();
    }
    /* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    /* else view the accueil.php page */
    else {
        $recettes_control->getAccueil();
    }
    ?>
    <!----- footer => footer.php ---->
    <?php include 'app/view/footer.php' ?>

</body>

</html>
