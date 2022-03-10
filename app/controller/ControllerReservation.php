<?php


namespace app\controller;

use app\model\ReservationModel;

class ControllerReservation {

    private $model;

    public function __construct() {
        $this->model = new ReservationModel();
    }

    public function reservation() {
        $res_reqHeure = $this->model->getHoraire();
        $this->model->uneReservation();
        include('app/view/reservation.php');
    }

    public function mesReservations() {
        $mes_reservations = $this->model->mesReservations();
        include('app/view/mes_reservations.php');
    }

    public function allReservations() {
        $all_reservations = $this->model->getAllReservations();
        include('app/view/admin_reservation.php');
    }

}