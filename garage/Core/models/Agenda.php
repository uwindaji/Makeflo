<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-12 at 18:00:05.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

// initiation class Month
$month = new service\Month($_GET['month'] ?? null, $_GET['year'] ?? null );

// get the first day in month
$start_day = $month->getStartingDay();
$start_day = $start_day->format('N') === "1" ? $start_day : $month->getStartingDay()->modify('last monday');

// initiation table APPOINTMENT
$appoint = new service\Seed('APPOINTMENT');
$take = new service\Seed('TAKE');

// search all in yable APPOINTMENT
 $res_appoint = $appoint->search_in_table("*", null);

if($_GET['id']):
    $_SESSION['car'] = array($_GET['id'], $_GET['mark'],$_GET['model'],$_GET['register_number'],$_GET['kilometers'],$_GET['m'],$_GET['y'] );
    $_SESSION['securite'] = rand(1000, 1000);
endif;    

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $array = array('id_appointement');

    $ad = array("id_car"=>$_GET['id']);
    $post = service\Tools::array_set($_POST, $ad, 0);
    //print_r($post); die();
    $return = service\Tools::is_empty($post, $array);
    if(!$return){

        $take->insert_in_table($post);
        exit(header('location: ?rec=DeskTopCustomer'));
    }else {

        $_SESSION['registration'] = "Select hour is empty";
                $_SESSION['icon'] = "danger";
    }


}