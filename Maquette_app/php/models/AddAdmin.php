<?php
//la class Logged qui controle l'ajout du user
class AddAdmin {

    public function __construct($pdo, $nom, $prenom, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $password){

        //appelle de la methde injectInBdd
        $this->injectInBdd($pdo, $nom, $prenom, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $password);
    }


    private function injectInBdd($pdo, $nom, $prenom, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $password) {

        //la variable $resultats recupère toutes les données de la base de données
        $resultats = $pdo->query("SELECT * FROM STAFF  WHERE email = '$email' ") or die('impossible de se connecter la table STAFF');
        $result    = $resultats->fetch();
        $pass = sha1($password);

        $compt = $pdo->query("SELECT COUNT(*) FROM STAFF ") or die('impossible de se connecter la table CLIENT');
        $id = count($compt);

        if ($result) {

            echo 'E-mail existe déja';
        } else {


            //$sql la requette pour inserer les données dans la base de donées
            $sql = "INSERT INTO CLIENT (`id_staff`, `code_staff`, `nom_staff`, `prenom_staff`, `email_staff`, `tel_staff`, `date_embauche`, `date_sortie`, `password_staff`, `STAFF_METIER0_FK`)
            VALUES ($id, '$cd', '$nom', '$prenom', '$email', '$tel', '$dEmbauche', '$dSortie', '$adresse', '$cp', '$ville', '$pass', '$id')";

            //inserer les données dans la base de donées
            $req = $pdo->exec($sql) or die('impossible de saisir la table CLIENT');
            
            $req_email = $pdo->exec("INSERT INTO `EMAIL` (`id_email`, `email`, `newsletter`, `EMAIL_CLIENT0_AK`) 
            VALUES (default, '$email', '$news', '$id_c')") or die('impossible de saisir la table EMAIL');
            echo ' compte creer avec success';
            $pdo= null;
        }
    }
}