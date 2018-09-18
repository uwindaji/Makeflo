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

// instance table PROVIDER
$provider =  new service\Seed('PROVIDER');

$select = $provider->search_in_table("*", null);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // instance table Admin and store in variable $admin
    $piece =  new service\Seed('PIECES');
    $bar_code = $_POST['bar_code'];
    $array = array("bar_code"=>$bar_code);
    // search in table Admin mail and password and sotre in variable $res_admin
    $res_piece = $piece->search_in_table("*", $array);

    // if variable $res_admin existe
    if($res_piece){

        // session login equal false 
        $_SESSION['registration'] = 'Piece existe!';
        $_SESSION['icon'] = "danger";

    }else {

        $array = array('bar_code', 'num', 'name_pieces', 'for_model', 'description', 'price_ht');
        $return = service\Tools::is_empty($_POST, $array);

        $_SESSION['registration'] = $return;
        $_SESSION['icon'] = "danger";

        if(!$return){

            $ad = array("date"=>date('Y-m-d'));
            $post = service\Tools::array_set($_POST, $ad, 7);

            $_SESSION['registration'] = $piece->insert_in_table($post);

            if (!$_SESSION['registration']) {

                $_SESSION['registration'] = "Registration success";
                $_SESSION['icon'] = "success";

                //$rooter = new controlers\Rooter('Login');
                exit(header('location: ?req=Pieces'));
            }

        }

    }
}