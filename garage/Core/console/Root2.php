<?php 
use  Core\app\controlers;
$request = $_GET["req"];
    
switch ($request){

    // case for deskTop
    case "DeskTop";
        $desktop = new controlers\Controler('DeskTop');
    break;
    // case for deskTop
    case "Provider";
        $desktop = new controlers\Controler('Provider');
    break;
    // case for deskTop
    case "Pieces";
        $desktop = new controlers\Controler('Pieces');
    break;
    // case for deskTop
    case "SearchCustomer";
        $desktop = new controlers\Controler('SearchCustomer');
    break;
    // case for deskTop
    case "CarsCustomer";
        $desktop = new controlers\Controler('CarsCustomer');
    break;
    // case for deskTop
    case "Enter";
        $desktop = new controlers\Controler('Enter');
    break;
    // case for deskTop
    case "Exit";
        $desktop = new controlers\Controler('Exit');
    break;
    // case for deskTop
    case "Search";
        require_once "./Core/models/Search.php";
    break;

    // case for NewStaff
    case "Register";
        if($_SESSION['login'][1] == "admin"){
            $newstaff = new controlers\Controler('Register');
        }else {
            exit(header("location: ?req=Desktop"));
        }

    break;

    // case for change password
    case "ChangePass";
        $changePass = new controlers\Controler('ChangePass');
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