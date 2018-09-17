<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-10 at 12:17:45.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// page to login

namespace models ;
use models as models;
use app\kernel\service as service;
use  Core\app\controlers as controlers;

// instance table CUSTOMER
$recept =  new service\Seed('RECEPT');

$array = array("id_car"=>$_GET['id'], "id"=>$_SESSION['login'][0], "date"=>date('Y-m-d H:m'));
$src_ad = $recept->insert_in_table($array);