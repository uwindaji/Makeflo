<?php
//la class Logged qui controle l'ajout du user
class AddStaff {

    public function __construct($pdo, $nom, $prenom, $dateN, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $metier, $secteur, $priv, $password){

        //appelle de la methde injectInBdd
        $this->injectInBdd($pdo, $nom, $prenom, $dateN, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $metier, $secteur, $priv, $password);
    }


    private function injectInBdd($pdo, $nom, $prenom, $dateN, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $metier, $secteur, $priv, $password) {

        //la variable $resultats recupère toutes les données de la base de données
        $resultats = $pdo->query("SELECT * FROM STAFF  WHERE email_staff = '$email' ") or die('impossible de se connecter la table STAFF');
        $result    = $resultats->fetch();
        $pass = sha1($password);

        $compt = $pdo->query("SELECT COUNT(*) AS id FROM STAFF ") or die('impossible de se connecter la table CLIENT');
        $_result    = $compt->fetch();
        $id = $_result['id']+1;

        $res_id_metier = $pdo->query("SELECT * FROM METIER  WHERE metier = '$metier' ") or die('impossible de se connecter la table METIER');
        $res_metier    = $res_id_metier->fetch();
        $met = $res_metier['id'];


        $_cd = str_replace( '-', '', $dateN).$id;
        if ($result) {

            echo 'E-mail existe déja';
        } else {


            //$sql la requette pour inserer les données dans la base de donées
            $sql_staff = "INSERT INTO STAFF (`id_staff`, `code_staff`, `nom_staff`, `prenom_staff`, `date_naissance`, `email_staff`, `tel_staff`, `adresse`, `cp`, `ville`, `date_embauche`, `date_sortie`, `password_staff`, `id`)
            VALUES (DEFAULT, '$_cd', '$nom', '$prenom', '$dateN', '$email', '$tel', '$adresse', '$cp', '$ville', '$dEmbauche', '$dSortie', '$pass', '$met')";


            $res_id_secteur = $pdo->query("SELECT * FROM SECTEUR  WHERE secteur = '$secteur' ") or die('impossible de se connecter la table SECTEUR');
            $res_secteur    = $res_id_secteur->fetch();
            $sec = $res_secteur['id'];

            // echo $sec;
            // die();
            $sql_travail = "INSERT INTO `TRAVAIL`(`id`, `id_staff`) VALUES ('$sec','$id')";// id secteur id staff

            

            $req_staff = $pdo->exec($sql_staff)or die('impossible de saisir la table STAFF');
            $req_metier = $pdo->exec($sql_travail) or die('impossible de saisir la table TRAVAIL');


            //___________________________________________________ zone resercer au privilege ____________________________________________________

                $res_id_priv = $pdo->query("SELECT * FROM PRIVILEGE  WHERE privilege = '$priv' ") or die('impossible de se connecter la table PRIVILEGE');
                $res_priv    = $res_id_priv->fetch();
                $privilege = $res_priv['id'];
                $sql_privilege = "INSERT INTO `PRIVILIGIER`(`id`, `id_staff`) VALUES ('$privilege','$id')";// id metier id staff

                $req_priv = $pdo->exec($sql_privilege) or die('impossible de saisir la table PRIVILIGIER');
            //___________________________________________________________________________________________________________________________________

            echo ' compte STAFF creer avec success';
            $pdo= null;
        }
    }
}