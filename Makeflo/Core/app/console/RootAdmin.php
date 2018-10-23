<?php 
use  controlers as controlers;

if(isset($_GET["page"])){

    echo 'gooo';

    $request = $_GET["page"];

    switch ($request){

        // case for deskTop
        case "Register";
        $desktop = new controlers\Controler('Register');
        break;
        case "Login";
            $desktop = new controlers\Controler('Login');
        break;



        // case for exit
        case "LogOut":
            session_destroy();
            exit(header('location: index.php'));
        break;
        default: 
        exit(header('location: index.php'));
        // @addDefaultCase
    }

}