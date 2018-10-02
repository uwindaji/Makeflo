<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-18 at 21:11:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// Login to check if user is login or not

namespace models ;
use models as models;
use app\kernel\service as service;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // instantiate table Admin and store in variable $admin
    $provider =  new service\Seed('PROVIDER');
    $mail = $_POST['mail'];
    $array = array("mail"=>$mail);
    // search in table Admin mail and password and sotre in variable $res_admin
    $res_provider = $provider->search_in_table("*", $array);

    // if variable $res_admin existe
    if($res_provider){

        // session login equal false 
        $_SESSION['registration'] = 'Provider existe!';
        $_SESSION['icon'] = "danger";

    }else {

        $array = array('name', 'mail', 'tel', 'address', 'zip', 'city');
        $return = service\Tools::is_empty($_POST, $array);

        $_SESSION['registration'] = $return;
        $_SESSION['icon'] = "danger";

        if(!$return){

            $_SESSION['registration'] = $provider->insert_in_table($_POST);

            if (!$_SESSION['registration']) {

                $_SESSION['registration'] = "Registration success";
                $_SESSION['icon'] = "success";

                //$rooter = new controlers\Rooter('Login');
                exit(header('location: ?req=Provider'));
            }

        }

    }
}