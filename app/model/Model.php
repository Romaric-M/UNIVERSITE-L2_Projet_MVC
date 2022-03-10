<?php


namespace app\model;
use \PDO;


use app\config\Database;

class Model {

    protected $connexion;
    protected $table;

    public function __construct( ){
        $db=new Database();
        $this->connexion=$db->getConnection();
    }

    public function getAll() {
        $sql="SELECT * FROM ".$this->table." WHERE 1";
        $envoie=$this->connexion->query($sql);
        $resultat=$envoie->fetch(PDO::FETCH_OBJ);

        return $resultat;
    }
}