<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-12 at 14:26:38.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr



namespace models ;
use models as models;
use app\kernel\service as service;

// instance table CUSTOMER, HAVE
$customer =  new service\Seed('CUSTOMER');
$have =  new service\Seed('HAVE');

// search id_customer in table CUSTOMER
$res_customer = $customer->search_in_table("*", null);

if($res_customer):

    foreach($res_customer as $val){

        $id = $val['id_customer'];

        $res_count = $have->search_in_table("COUNT(id_car)", array("id_customer"=>$id));

        if($res_count):
            echo $val['id_customer']." : ".$val['first_name']." ".$val['name']." have ".$res_count[0]['COUNT(id_car)']." cars"; echo"</br>";
        endif;
    }
endif;


