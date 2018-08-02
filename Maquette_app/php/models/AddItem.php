<?php
//la class Logged qui controle l'ajout du user
class AddItem {

    public function __construct($pdo, $cat, $item){

        //appelle de la methde injectInBdd
        $this->injectInBdd($pdo, $cat, $item);
    }


    private function injectInBdd($pdo, $cat, $item) {

        $_cat = strtoupper($cat);
        //la variable $resultats recupère toutes les données de la base de données
        $resultats = $pdo->query("SELECT * FROM $_cat  WHERE $cat = '$item' ") or die('impossible de se connecter la table '.$_cat.' pour verification');
        $result    = $resultats->fetch();


        if ($result) {

            echo 'E-mail existe déja';
        } else {

            //$sql la requette pour inserer les données dans la base de donées
            $sql = "INSERT INTO $_cat VALUES (DEFAULT, '$item')";
            //inserer les données dans la base de donées
            $req = $pdo->exec($sql)or die('impossible de saisir la table '.$_cat.'');

            $resultats = $pdo->query("SELECT * FROM $_cat ORDER BY ID DESC LIMIT 1") or die('impossible de se connecter la table '.$_cat.'');
            $result    = $resultats->fetch();

            //chercher le dernier article

            echo $result[$cat];
            $pdo= null;
        }
    }
}