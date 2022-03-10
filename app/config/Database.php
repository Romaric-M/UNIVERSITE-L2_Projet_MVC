<?php

namespace app\config;

/* database class */
class Database{

    /* database credentials */
    private $SERVER = "localhost";
    private $DB = "projet";
    private $USER = "phpmyadmin";
    private $PASSWORD = "phpmypasswd";
    private $connexion;


    /* function -> connect to the database */
    public function getConnection(){

        $this->connexion = null;

        try{
            $this->connexion = new \PDO("mysql:host=" . $this->SERVER . ";dbname=" . $this->DB, $this->USER, $this->PASSWORD);
            $this->connexion->exec("set names utf8");
        }catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
        }

        return $this->connexion;
    }
}