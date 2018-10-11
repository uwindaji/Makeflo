<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-12 at 14:26:38.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr



namespace models ;
use models as models;
use app\kernel\service as service;

// instantiate table CUSTOMER, HAVE
$recept =  new service\Seed('RECEPT');
$cars =  new service\Seed('CARS');


$res_recept = $recept->search_in_table('*', array('ext'=>false));

$values = '';
$vl = array();
if($res_recept != null):
    foreach($res_recept as $val){

        //echo $val['id_car'];
        $values = $cars->search_in_table('*', array('id_car'=>$val['id_car']));
        array_push($vl, $values[0]);
    }
endif;
