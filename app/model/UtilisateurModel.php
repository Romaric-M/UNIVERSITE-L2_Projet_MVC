<?php


namespace app\model;

use \PDO;


class UtilisateurModel extends Model {

    public function __construct()
    {
        $this->table="utilisateur";
        parent::__construct($this->table);
    }

    public function creerUnCompte() {
        if (isset($_POST["send"])) {

            if (!empty($_POST["nomCompte"]) && !empty($_POST["mdpCompte"])
                && !empty("emailCompte")) {

                $nomCompte = $_POST['nomCompte'];
                $emailCompte = $_POST['emailCompte'];

                $reqtestNom = "SELECT nom_uti FROM utilisateur WHERE nom_uti ='".$nomCompte."'";
                $send_reqtestNom = $this->connexion->query($reqtestNom);
                $resNom = $send_reqtestNom->fetch(PDO::FETCH_ASSOC);

                $reqtestMail = "SELECT mail_uti FROM utilisateur WHERE mail_uti ='".$emailCompte."'";
                $send_reqtestMail = $this->connexion->query($reqtestMail);
                $resMail = $send_reqtestMail->fetch(PDO::FETCH_ASSOC);

                if(count($resNom) >= 1 && $resNom != false && count($resMail) >= 1 && $resMail != false) {
                    //erreur + rechargement page
                    echo '<body onLoad="alert(\'Ce nom et cette adresse mail sont déjà pris\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=?view=creer_compte">';
                }
                elseif (count($resNom) >= 1 && $resNom != false) {
                    //erreur + rechargement page
                    echo '<body onLoad="alert(\'Ce nom est déjà pris\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=?view=creer_compte">';
                }
                elseif (count($resMail) >= 1 && $resMail != false) {
                    //erreur + rechargement page
                    echo '<body onLoad="alert(\'Cette adresse mail est déjà prise\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=?view=creer_compte">';
                }
                elseif ($resNom == false && $resMail == false) {
                    $mdpCompte = $_POST['mdpCompte'];
                    $t = 0;
                    //Création de la requete
                    $requete_admin = "INSERT INTO utilisateur (nom_uti, mdp_uti, mail_uti, type_uti) 
                    VALUES (:nomCompte, :mdpCompte, :emailCompte, :t)";
                    //echo $requete;
                    $req_insertion = $this->connexion->prepare($requete_admin);
                    $req_insertion->bindParam(':nomCompte', $nomCompte);
                    $req_insertion->bindParam(':mdpCompte', $mdpCompte);
                    $req_insertion->bindParam(':emailCompte', $emailCompte);
                    $req_insertion->bindParam(':t', $t);

                    //Envoi de la requete
                    $repInsertionForm = $req_insertion->execute();
                    echo '<body onLoad="alert(\'Compte créé\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=/">';
                }
                else {
                    echo "ça n'a pas marché, ça déconne quelque part mais je sais pas ou";
                }
            }
            else {
                echo '<body onLoad="alert(\'Merci de remplir tous les champs\')">';
            }
        }
    }

    public function seConnecter() {
        if (isset($_POST['login']) && isset($_POST['mdp'])) {

            // on crée une requete permettant de savoir si le login/psswd est valide
            $login  = htmlspecialchars($_POST['login']);
            $motdepasse = htmlspecialchars($_POST['mdp']);
            $sql = "select * from utilisateur where nom_uti='".$login."' and mdp_uti = '".$motdepasse."'";
            $send_sql = $this->connexion->query($sql);
            $resultat = $send_sql->fetch(PDO::FETCH_ASSOC);

            echo $resultat;
            // on vérifie les informations du formulaire ?????????????????????
            if (count($resultat) === 5) { // Etrange ce truc
                session_start ();
                $_SESSION['id'] = $resultat['id_uti'];
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['mail'] = $resultat['mail_uti'];
                $_SESSION['type'] = $resultat['type_uti'];
                // redirection accueil;
                header ('location: index.php');
            }
            else {
                //erreur + redirection
                echo '<body onLoad="alert(\'Mauvais identifiants\')">';
                echo '<meta http-equiv="refresh" content="0;URL=?view=se_connecter">';
            }
        }
    }
}