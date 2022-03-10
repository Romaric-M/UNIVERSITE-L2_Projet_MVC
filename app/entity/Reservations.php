<?php


namespace app\entity;


class Reservations {

    /* --- ATTRIBUTES --- */
    private $id;
    private $nom;
    private $prenom;
    private $date;
    private $heure;
    private $idClient;

    /* --- CONSTRUCTOR --- */
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /* ------- GETTERS ------- */
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDate() {
        return $this->date;
    }

    public function getHeure() {
        return $this->heure;
    }

    public function getIdClient() {
        return $this->idClient;
    }
    /* ----- END GETTERS ----- */
    /***************************/

    /* ------- SETTERS ------- */
    public function setId($id) {
        $this->id = $id;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setHeure($heure) {
        $this->heure = $heure;
    }

    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }
    /* ----- END SETTERS ----- */
    /***************************/
}