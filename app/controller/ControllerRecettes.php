<?php

namespace app\controller;

use app\model\RecetteModel;

class ControllerRecettes {

    private $model;

    public function __construct() {
        $this->model=new RecetteModel();
    }

    public function getAccueil() {
        $random_recette = $this->model->findRandom();
        include('app/view/accueil.php');
    }

    public function getRecettes() {
        $type_recette = $this->model->getRecettesByType();
        include('app/view/recettes.php');
    }

    public function getRecettesById() {
        $recup_recette = $this->model->getById();
        include('app/view/voir_recette.php');
    }

    public function ajoutRecettes() {
        $resultReqType = $this->model->lesRecettes();
        $this->model->ajouterRecette();
        include('app/view/admin.php');
    }
}