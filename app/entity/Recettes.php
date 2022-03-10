<?php


namespace app\entity;


class Recettes {

    /* --- ATTRIBUTES --- */
    private $id;
    private $nom;
    private $type;
    private $nombre;
    private $ingredient;
    private $laRecette;
    private $image;

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

    /* -------- GETTERS -------- */
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getType() {
        return $this->type;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getIngredient() {
        return $this->ingredient;
    }

    public function getLaRecette() {
        return $this->laRecette;
    }

    public function getImage() {
        return $this->image;
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

    public function setType($type) {
        $this->type = $type;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setIngredient($ingredient) {
        $this->ingredient = $ingredient;
    }

    public function setLaRecette($laRecette) {
        $this->laRecette = $laRecette;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    /* ----- END SETTERS ----- */
    /***************************/

}