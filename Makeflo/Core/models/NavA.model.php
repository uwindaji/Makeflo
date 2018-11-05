<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;

// inbstancier la table Message, User
$message = new services\Seed('Messages');
$user = new services\Seed('User');
$su = null;
$array = array("id_user" => $_SESSION['login']['id']);
$res_admin = $user->search_in_table('*', $array);
if($res_admin[0]['type']  === "super admin"):
    $su = 'su';
endif;


$res_user = services\Tools::search_with ("*", "User", null);

$array_message = array();

function check_msg ($id){

    $res_response = services\Tools::search_with ("*", "Messages", "WHERE id_user='".$id."' ORDER BY id_message DESC" );

    if($res_response[0]['nature'] === 'send'){
        $cor_user = services\Tools::search_with ("*", "User", "WHERE id_user='".$id."'");
        $array = array('message'=> $res_response[0]['message'],'date_message'=> $res_response[0]['date_message'],'id_user'=>$id, 'name'=>$cor_user[0]['nom']." ".$cor_user[0]['prenom']);
        return $array;
    }

}

foreach($res_user as $val){

    $return = check_msg($val['id_user']);
    if(!empty($return)){

        array_push($array_message, check_msg($val['id_user']));

    }

}



$nb_message = count($array_message);