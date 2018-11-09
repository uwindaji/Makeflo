<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table Abonnement
$abonnement = new services\Seed('Abonnement');
$souscrire = new services\Seed('Souscrire');

$data = array("type"=>1);
$table = $abonnement->search_in_table("*", $data);

// if isset GET
if(isset($_GET['add'])){

    $post = array("id_abonnement"=>$_GET['add'],"id_user"=>$_SESSION['login']['id'], "date_achat"=>date('Y-m-d H:i:s'), "date_exp"=>date('Y-m-d', strtotime('+1 years')));

    $souscrire->insert_in_table($post);

}