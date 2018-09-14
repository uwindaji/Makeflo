<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-14 at 13:45:36.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr


namespace models ;
use models as models;
use app\kernel\service as service;

$appoint =  new service\Seed('APPOINTMENT');
$take =  new service\Seed('TAKE');


$res_appoint = $appoint->search_in_table("*", null);
$array = array("date"=>$_GET['date']);
$res_take = $take->search_in_table("*", $array);




// $res_appoint =  array( array("id_appointement" => 1, "app" => 8), array ("id_appointement" => 2, "app" => 10 ), array ( "id_appointement" => 3,"app" => 14 ), array ( "id_appointement" => 4,"app" => 16));
// $res_take =     array();


$result = service\Tools::diff_array($res_appoint, $res_take);


$var = json_encode($result);

ob_clean();

    print_r($var);
    //echo $var; 
die();