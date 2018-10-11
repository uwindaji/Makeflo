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

$recept =  new service\Seed('RECEPT');
$ext =  new service\Seed('EXT');



$array = array("id_car"=>$_GET['id_car'], "id"=>$_SESSION['login'][0], "date"=>date('Y-m-d H:m:s'));
$src_ad = $ext->insert_in_table($array);

$data = array("ext"=>1);
$condition = array("id_car"=>$_GET['id_car']);

$update = $recept->update_table($data, $condition);