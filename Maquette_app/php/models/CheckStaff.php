<?php
//la class Logged qui controle l'ajout du user
class CheckStaff {

    public function __construct($pdo, $cat){

        //appelle de la methde injectInBdd
        $this->injectInBdd($pdo, $cat);
    }


    private function injectInBdd($pdo, $cat) {

        $_cat = strtoupper($cat);

        //la variable $resultats recupère toutes les données de la base de données
        $res_metier = $pdo->query("SELECT * FROM $_cat ") or die('impossible de se connecter la table '.$_cat.' pour verification');

        if ($res_metier) {

            // On affiche chaque entrée une à une
            $donnees = $res_metier->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($donnees);
        } 


    }
}