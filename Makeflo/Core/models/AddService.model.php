<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr



use services as services;

// inbstancier la table Abonnement
$abonnement = new services\Seed('Abonnement');
$souscrire = new services\Seed('Souscrire');

$table = $abonnement->search_in_table("*", null);

// if isset GET
if(isset($_GET['add'])){

    $array= array("id_abonnement"=>$_GET['add'], "id_user"=>$_SESSION['login']['id']);
    $res_service = $souscrire->search_in_table("*", $array);
    if($res_service){


        $_SESSION['flash'] = "Service existe déja!";
        // set icon danger
        $_SESSION['icon'] = "danger";

    }else {


        $post = array("id_abonnement"=>$_GET['add'],"id_user"=>$_SESSION['login']['id'], "date_achat"=>date('Y-m-d H:i:s'), "date_exp"=>date('Y-m-d', strtotime('+1 years')));
        $souscrire->insert_in_table($post);
    }
    

}