<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;

// inbstancier la table Message, User
$message = new services\Seed('Messages');
$user = new services\Seed('User');

// get all message
$res_msg = services\Tools::search_with ("*", "Messages", " ORDER BY id_message DESC");

// create $table_id_user as array
$table_id_user = array();
// get id user from tabme message

//create boucle for to get all id_user in arrayb $table_id_user
for($i = 0; $i < count($res_msg); $i++):
    array_push($table_id_user, $res_msg[$i]['id_user']);
endfor;

// create $array_user as array
$array_user = array();

for($x = 0; $x < count($table_id_user); $x++):

    $res_user = $user->search_in_table('*', array("id_user"=>$table_id_user[$x]));
    array_push($array_user, $res_user);

endfor;



