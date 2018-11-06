<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use  controlers as controlers;
$request = $_GET["page"];
    
switch ($request){

    // case for MyProject
    case "MyProject";
    $desktop = new controlers\Controler('MyProject');
    break;
    // case for Message
    case "Message";
    $desktop = new controlers\Controler('Message');
    break;
    // case for deskTop
    case "Desktop";
    $desktop = new controlers\Controler('Desktop');
    break;
    // case for deskTop
    case "MesFactures";
    $desktop = new controlers\Controler('MesFactures');
    break;
    // case for deskTop
    case "MyContract";
    $desktop = new controlers\Controler('MyContract');
    break;
    // case for deskTop
    case "New";
    $desktop = new controlers\Controler('New');
    break;
    // case for deskTop
    case "AddService";
    $desktop = new controlers\Controler('AddService');
    break;
    // case for deskTop
    case "MyService";
    $desktop = new controlers\Controler('MyService');
    break;
    // case for deskTop
    case "ServiceView";
    $desktop = new controlers\Controler('ServiceView');
    break;


    case "Deconnexion";
        $desktop = new controlers\Controler('Deconnexion');
    break;
    default: 
    exit(header('location: ?page=Desktop'));
}