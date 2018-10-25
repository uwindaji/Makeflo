<?php 
use  controlers as controlers;
$request = $_GET["page"];
    
switch ($request){

    // case for deskTop
    case "Desktop";
        $desktop = new controlers\Controler('Desktop');
    break;


    // case for exit
    case "LogOut":
        session_destroy();
        exit(header('location: index.php'));
    break;
    default: 
    exit(header('location: ?page=Desktop'));
}