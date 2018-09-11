<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-10 at 19:08:12.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

// instance table CARS
$cars =  new service\Seed('CARS');
$mark =  new service\Seed('MARK');
$month =  new service\Seed('MONTH');
$year =  new service\Seed('YEAR');

$select_mark = $mark->search_in_table("*", null);
$select_month = $month->search_in_table("*", null);
$select_year = $year->search_in_table("*", null);

if($_POST){

    // search all in table CUSTOMER
    $array = array("mark"=>$_POST['mark'], "model"=>$_POST['model'], "registration_number"=>$_POST['registration_number']);
    $src_ad = $customer->search_in_table("*", $array);

    if(!$src_ad){

        $array = array('first_name', 'name', 'mail', 'tel', 'address', 'zip', 'city', 'password');
        $return = service\Tools::is_empty($_POST, $array);

        $_SESSION['registration'] = $return;
        $_SESSION['icon'] = "danger";

        if(!$return){
            $_SESSION['registration'] = $customer->insert_in_table($_POST);
            $_SESSION['icon'] = "danger";
            if (!$_SESSION['registration']) {

                $_SESSION['registration'] = "Registration sccess";
                $_SESSION['icon'] = "success";

                
            }
        }
    }
}