<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User
$user = new services\Seed('User');

$resultat_user = services\Tools::search_with('*', 'User', 'WHERE etat IS NULL ORDER BY nom ASC');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    foreach($_POST['user'] as $val){

        $data = array('etat'=>1);
        $condition = array('id_user'=> $val);
        $user->update_table($data, $condition);

    }

        exit(header('location: /DeleteUser'));
}