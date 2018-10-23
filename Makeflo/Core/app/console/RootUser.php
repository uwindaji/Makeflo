<?php 
use  Core\app\controlers;
$request = $_GET["admin"];
    
switch ($request){

    // case for deskTop
    case "DeskTop";
        $desktop = new controlers\Controler('DeskTop');
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