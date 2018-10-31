<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;

$login = new services\Seed('User');
$su = null;
$array = array("id_user" => $_SESSION['login']['id']);
$res_admin = $login->search_in_table('*', $array);
if($res_admin[0]['type']  === "super admin"):
    $su = 'su';
endif;




$res_admin = $login->search_in_table('*', null);

$nb_message = 0;

for($s = 0; $s<count($res_admin); $s++){

    $nb_message += nb_msg ($res_admin[$s]['id_user']);


}

function nb_msg ($id) {
    $res_msg = null;
    $res_msg = services\Tools::search_with ("*", "Messages", "WHERE id_user=".$id." ORDER BY id_user DESC");

    $n = 0;

    if($res_msg != null):
        for($n = 0; $n < count($res_msg); $n++){

            if($res_msg[$n]['nature'] === "response"){

                break;
            }
        
        
        }
    endif;


    if($n > 0){

        return 1;
    }else {

        return 0;
    }


}