<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use  controlers as controlers;

if(isset($_GET["page"])){


    $request = $_GET["page"];

    switch ($request){

        case "Abonnement";
            $desktop = new controlers\Controler('Abonnement');
        break;

        case "ListeAbonnement";
            $desktop = new controlers\Controler('ListeAbonnement');
        break;

        case "AddProject";
            $desktop = new controlers\Controler('AddProject');
        break;

        case "Upload";
            $desktop = new controlers\Controler('Upload');
        break;

        case "Deconnexion";
            $desktop = new controlers\Controler('Deconnexion');
        break;

        case "Register";
            if($_SESSION['login']['type'] === 'super admin'){    
                $desktop = new controlers\Controler('Register');
            }else {
                exit(header('location: index.php'));
            }
        break;

        
        case "Search";
            require_once './Core/models/Search.model.php';
        break;

        case "SearchProject";
            require_once './Core/models/SearchProject.model.php';
        break;
        
        default: 
        exit(header('location: index.php'));
    }

}else {


    $desktop = new controlers\Controler('Body');
}