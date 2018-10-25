<?php 
use  controlers as controlers;
$request = $_GET["page"];
    
switch ($request){

    // case for deskTop
    case "Desktop";
        $desktop = new controlers\Controler('Desktop');
    break;


    case "Deconnexion";
        $desktop = new controlers\Controler('Deconnexion');
    break;
    default: 
    exit(header('location: ?page=Desktop'));
}