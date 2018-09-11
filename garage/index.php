<?php
ob_start();
session_start();
// name of project Miramis.
//Script create by Lakhdar.
// Date 2018-09-02  at 21:22:48.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr
//**addExClass***
//use models as models;

require_once "./Core/Autoload.php";
require_once "./Core/controlers/Rooter.php";
// require the head
require_once "./Core/views/Head.php";
// require the head
require_once "./Core/views/Nav.php";

if(isset($_GET["req"]) and $_SESSION['login'] != null){

    require_once ('Core/console/Req.php');
    
}else if (isset($_GET["rec"])){

    require_once ('Core/console/Rec.php');

}else {

    require_once ('Core/console/Default.php');
}
require_once "./Core/views/Footer.php";