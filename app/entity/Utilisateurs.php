<?php


namespace app\entity;


class Utilisateurs {

    /* --- ATTRIBUTES --- */
    private $id;
    private $nom;
    private $mdp;
    private $mail;
    private $type;

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

    public function getMdp() {
        return $this->mdp;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getType() {
        return $this->type;
    }
    /* ----- END GETTERS ----- */
    /***************************/

    /* ------- SETTERS ------- */
    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setType($type) {
        $this->type = $type;
    }
    /* ----- END SETTERS ----- */
    /***************************/
}