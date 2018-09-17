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
$ext =  new service\Seed('EXT');
$recept =  new service\Seed('RECEPT');

$array = array("id_car"=>$_GET['id'], "id"=>$_SESSION['login'][0], "date"=>date('Y-m-d H:m'));
$src_ad = $ext->insert_in_table($array);

$data = array("ext"=>"TRUE");
$condition = array("id_car"=>$_GET['id']);

$update = $recept->update_table($data, $condition);