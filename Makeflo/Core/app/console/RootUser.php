<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

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