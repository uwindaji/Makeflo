<?php
//la class Logged qui controle l'ajout du user
class AddItemStaff {

    public function __construct($pdo, $cat, $item){

        //appelle de la methde injectInBdd
        $this->injectInBdd($pdo, $cat, $item);
    }


    private function injectInBdd($pdo, $cat, $item) {

        $_cat = strtoupper($cat);
        //la variable $resultats recupère toutes les données de la base de données
        $resultats = $pdo->query("SELECT * FROM $_cat  WHERE $cat = '$item' ") or die('impossible de se connecter la table '.$_cat.' pour verification');
        $result    = $resultats->fetch();

        $compt = $pdo->query("SELECT * FROM $_cat ") or die('impossible de se connecter la table CLIENT');
        $_result    = $compt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {

            echo 'valeur existe déja';
        } else {

            //$sql la requette pour inserer les données dans la base de donées
            $sql = "INSERT INTO $_cat VALUES (DEFAULT, '$item')";
            //inserer les données dans la base de donées
            $req = $pdo->exec($sql) or die('impossible de saisir la table '.$_cat.'');

            if($req){

                $query = $pdo->query("SELECT * FROM $_cat ORDER BY id DESC LIMIT 1");// or die('impossible de se connecter la table '.$_cat.'');
                $req_res    = $query->fetch();
                
                echo $req_res[$cat];
            }
            

            //echo 
            
            //chercher le dernier article

            
            $pdo= null;
        }
    }
}