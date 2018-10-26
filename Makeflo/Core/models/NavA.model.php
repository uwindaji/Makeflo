<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;

// inbstancier la table User
$login = new services\Seed('User');

$su = null;

$array = array("id_user" => $_SESSION['login']['id']);

$res_admin = $login->search_in_table('*', $array);

if($res_admin[0]['type']  === "super admin"):

    $su = 'su';
endif;