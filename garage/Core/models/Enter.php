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

// instantiate table CUSTOMER
$recept =  new service\Seed('RECEPT');
$take =  new service\Seed('TAKE');

$array = array("id_car"=>$_GET['id'], "id"=>$_SESSION['login'][0], "date"=>date('Y-m-d H:m:s'), "ext"=>"FALSE");
$src_ad = $recept->insert_in_table($array);

$data = array("id_car"=>$_GET['id']);
$delete = $take->delete_in_table ($data);



