<?php


namespace app\model;
use \PDO;


class RecetteModel extends Model {

    public function __construct()
    {
        $this->table="recette";
        parent::__construct($this->table);
    }

    public function findRandom() {
        if (isset($_COOKIE['typerecette']) && $_COOKIE['typerecette'] != 'all') {
            $requete = "select * from recette where type_rec =". $_COOKIE['typerecette']." ORDER BY RAND() LIMIT 2";
        }
        else {
            $requete = "SELECT * FROM recette ORDER BY RAND() LIMIT 2";
        }

        //Envoi de la requete
        $send_requete=$this->connexion->query($requete);

        //recup des donnees
        $random_recette=$send_requete->fetchAll(PDO::FETCH_OBJ);
        return $random_recette;
    }

    public function getRecettesByType() {
        if ( !empty($_GET['type']) ) {
            $typeRecette = $_GET['type'];
            if ($typeRecette=="all") {
                $recup_type_recette = "SELECT * FROM recette";
            }
            else {
                $recup_type_recette = "SELECT * FROM recette where type_rec = $typeRecette";
            }

            setcookie('typerecette', $typeRecette);
            $send_requete=$this->connexion->query($recup_type_recette);
            //recup des donnees
            $type_recette=$send_requete->fetchAll(PDO::FETCH_OBJ);
            return $type_recette;
        }
    }

    public function getById() {
        if ( !empty($_GET['recette']) ) {
            $idRecette = $_GET['recette'];
            $req_recette = "SELECT * FROM recette where id_rec = $idRecette";
            $send_requete=$this->connexion->query($req_recette);

            //recup des donnees
            $recup_recette=$send_requete->fetchAll(PDO::FETCH_OBJ);
            return $recup_recette;
        }

    }

    public function lesRecettes() {
        if (isset($_SESSION['login']) && $_SESSION['type'] == 1) {

            $reqType = "SELECT * FROM typeRecette WHERE 1";
            $sendReqType = $this->connexion->query($reqType);
            $resultReqType = $sendReqType->fetchAll(PDO::FETCH_OBJ);
            return $resultReqType;
        }
    }

    public function ajouterRecette() {
        if (isset($_SESSION['login']) && $_SESSION['type'] == 1) {

            if (isset($_POST["send"])) {

                if (!empty($_POST["nomRec"]) && !empty($_POST["ingredient"])
                    && !empty("recette") && !empty("nbPers")) {
                    $nomRec = $_POST['nomRec'];
                    $typeRec = $_POST['typeRec'];
                    $nbPers = $_POST['nbPers'];
                    $ingredient = $_POST['ingredient'];
                    $recette = $_POST['recette'];
                    $image = "images/" . $_FILES['image']['name'];
                    //echo $_POST['image'];
                    //J'EN PEUX PLUS
                    //AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAHHHHHHHHHHHH
                    $path = "images/". $_FILES['image']['name'];
                    //echo $_FILES['image']['tmp_name'];
                    $uploadfile = $path . basename($_FILES['userfile']['name']); // POURQUOI
                    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile); // POURQUOI TMP_NAME

                    //Création de la requete
                    $requete_admin = "INSERT INTO recette (nom_rec, type_rec, nb_pers, ingredient, la_recette, img_rec) 
                    VALUES (:nomRec, :typeRec, :nbPers, :ingredient, :recette, :image)";
                    //echo $requete;
                    $req_insertion = $this->connexion->prepare($requete_admin);
                    $req_insertion->bindParam(':nomRec', $nomRec);
                    $req_insertion->bindParam(':typeRec', $typeRec);
                    $req_insertion->bindParam(':nbPers', $nbPers);
                    $req_insertion->bindParam(':ingredient', $ingredient);
                    $req_insertion->bindParam(':recette', $recette);
                    $req_insertion->bindParam(':image', $image);

                    //Envoi de la requete
                    $repInsertionForm = $req_insertion->execute();
                    //echo $requete_admin;
                    //echo $repInsertionForm;
                }
            }
        }
    }

}