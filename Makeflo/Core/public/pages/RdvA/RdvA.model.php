<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User
$appoint = new services\Seed('Appointment');

$res_rdv = $appoint->search_in_table('*', null);

function get_user($id){

    $user = new services\Seed('User');
    $table = $user->search_in_table('*', array('id_user'=>$id));
    return $table;
}