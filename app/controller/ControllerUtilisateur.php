<?php


namespace app\controller;


use app\model\UtilisateurModel;

class ControllerUtilisateur{
    private $model;

    public function __construct() {
        $this->model=new UtilisateurModel();
    }

    public function creerCompte() {
        $this->model->creerUnCompte();
        include('app/view/creer_compte.php');
    }

    public function viewSeConnecter() {
        $this->model->seConnecter();
        include('app/view/se_connecter.php');
    }

    public function login() {
        $this->model->seConnecter();
    }

    public function seDeconnecter() {
        session_start ();
        session_unset ();
        session_destroy ();
        header ('location: /');
    }
}