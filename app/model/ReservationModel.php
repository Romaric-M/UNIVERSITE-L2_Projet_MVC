<?php


namespace app\model;
use \PDO;

class ReservationModel extends Model {

    public function __construct()
    {
        $this->table="reservation";
        parent::__construct($this->table);
    }

    public function uneReservation() {
        if (isset($_SESSION['login']) && isset($_SESSION['id'])) {

            if (isset($_POST["send"])) {

                if (!empty($_POST["nom"]) && !empty($_POST["prenom"])
                    && !empty("laDate") && !empty("heure")) {
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $laDate = $_POST['laDate'];
                    $heure = $_POST['heure'];
                    $idClient = $_SESSION['id'];
                    //echo $laDate;
                    //echo $heure;

                    //Création de la requete
                    $reqReserv = "INSERT INTO reservation (nom_reserv, prenom_reserv, date_reserv, heure_reserv, id_client) 
                    VALUES (:nom, :prenom, :laDate, :heure, :idClient)";
                    $req_insertion = $this->connexion->prepare($reqReserv);
                    $req_insertion->bindParam(':nom', $nom);
                    $req_insertion->bindParam(':prenom', $prenom);
                    $req_insertion->bindParam(':laDate', $laDate);
                    $req_insertion->bindParam(':heure', $heure);
                    $req_insertion->bindParam(':idClient', $idClient);

                    //Envoi de la requete
                    $repInsertionForm = $req_insertion->execute();

                }
            }
        }
    }

    public function getHoraire() {
        if (isset($_SESSION['login']) && isset($_SESSION['id'])) {

            $reqHeure = "SELECT * FROM horaire WHERE 1";
            $send_reqHeure = $this->connexion->query($reqHeure);
            $res_reqHeure = $send_reqHeure->fetchAll(PDO::FETCH_OBJ);
            return $res_reqHeure;
        }
    }

    public function getAllReservations() {
        if (isset($_SESSION['login']) && isset($_SESSION['id'])) {
            $sql = "SELECT * FROM ".$this->table." JOIN horaire ON ".$this->table.".heure_reserv = horaire.id_horaire ORDER BY ".$this->table.".date_reserv";
            $envoi = $this->connexion->query($sql);
            $reservations = $envoi->fetchAll(PDO::FETCH_OBJ);
            return $reservations;
        }
    }

    public function mesReservations() {
        if (isset($_SESSION['login']) && isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM ".$this->table." JOIN horaire ON ".$this->table.".heure_reserv = horaire.id_horaire WHERE id_client=".$id;
            $envoi = $this->connexion->query($sql);
            $lesReservations = $envoi->fetchAll(PDO::FETCH_OBJ);
            return $lesReservations;
        }
    }
}