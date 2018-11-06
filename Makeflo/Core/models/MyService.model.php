<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr



use services as services;

// inbstancier la table Abonnement
$souscrire = new services\Seed('Souscrire');


$data = array("id_user"=>$_SESSION['login' ]['id']);
$table = $souscrire->search_in_table("*", $data);


function get_service_img($id){

    $abonnement = new services\Seed('Abonnement');
    $data = array("id_abonnement"=>$id);
    $res = $abonnement->search_in_table("*", $data);

    return $res[0]['img'];
}