<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr



use services as services;

// inbstancier la table Abonnement
$abonnement = new services\Seed('Abonnement');

if(isset($_GET['id'])){

    $data = array("id_abonnement"=>$_GET['id']);
    $table = $abonnement->search_in_table("*", $data);
}
