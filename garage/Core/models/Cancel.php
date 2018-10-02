<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-15 at 22:35:05.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

$take =  new service\Seed('TAKE');

if($_GET['id'] and $_GET['date']){

    $array = array("id_car"=>$_GET['id'], "date"=>$_GET['date']);

    $res_take = $take->delete_in_table( $array);
}