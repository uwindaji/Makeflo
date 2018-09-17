<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-10 at 19:08:12.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

// instance table CARS, MARK, MONTH, YEAR, HAVE, APPOINTMENT, TAKE, RECEPT, EXT.
$cars =  new service\Seed('CARS');
$mark =  new service\Seed('MARK');
$month =  new service\Seed('MONTH');
$year =  new service\Seed('YEAR');
$have =  new service\Seed('HAVE');
$appoint =  new service\Seed('APPOINTMENT');
$take =  new service\Seed('TAKE');
$recept =  new service\Seed('RECEPT');
$ext =  new service\Seed('EXT');

// search all in MARK, MONTH, YEAR.
$select_mark = $mark->search_in_table("*", null);
$select_month = $month->search_in_table("*", null);
$select_year = $year->search_in_table("*", null);

// serach cars of customer with id 
$cars_array = new service\CastomerCars($_SESSION['loginCustomer'][0]);
// get all cars
$_cars = $cars_array->get();

if($_POST){

    $array = array('id_mark','model', 'registration_number', 'id_year', 'id_month', 'kilometers');
    $return = service\Tools::is_empty($_POST, $array);

    $_SESSION['registration'] = $return;
    $_SESSION['icon'] = "danger";

    if(!$return){

        // insert in table CARS $_POST
        $_SESSION['registration'] = $cars->insert_in_table($_POST);
        //select all in cars
        $select_car = $cars->search_in_table("*", null);
        // get the last id_car
        $id_car = $select_car[count($select_car)-1]['id_car'];
        // construct array to save in table HAVE
        $array_have = array("id_car"=>$id_car, "id_customer"=>$_SESSION['loginCustomer'][0]);
        // save in table HAVE
        $have->insert_in_table($array_have);
        $_SESSION['icon'] = "danger";
        if (!$_SESSION['registration']) {

            $_SESSION['registration'] = "Registration sccess";
            $_SESSION['icon'] = "success";
            exit(header('location: ?rec=DeskTopCustomer'));
            
        }
    }

}