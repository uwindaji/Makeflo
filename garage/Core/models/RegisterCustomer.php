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
$customer =  new service\Seed('CUSTOMER');

if($_POST){

    // search all in table CUSTOMER
    $mail = array("mail", $_POST['mail']);
    $src_ad = $customer->search_in_table("*", $mail);

    if(!$src_ad){

        $array = array('first_name', 'name', 'mail', 'tel', 'address', 'zip', 'city', 'password');
        $return = service\Tools::is_empty($_POST, $array);

        if(!$return){
            $_SESSION['registration'] = $customer->insert_in_table($_POST);
            $_SESSION['icon'] = "danger";
            if (!$_SESSION['registration']) {

                $_SESSION['registration'] = "Registration sccess";
                $_SESSION['icon'] = "success";

                $message = "Bonjour M.".$_POST['first_name']." ".$_POST['name']." GALE VEHICLE vous remercie pour votre confiance et confirme votre inscription";
                $tel = $_POST['tel'];
                $ltd = 'http://localhost/garage/';
                $req = "?rec=LoginCustomer";
                service\Tools::sms($message, $tel, $ltd, $req);
                // exit(header('location: ?rec=LoginCustomer'));
                
            }
        }else {

            $_SESSION['registration'] = $return;
            $_SESSION['icon'] = "danger";

        }
    }
}