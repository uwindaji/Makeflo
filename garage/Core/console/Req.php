<?php 
use  Core\app\controlers;
$request = $_GET["req"];
    
switch ($request){

    // case for deskTop
    case "DeskTop";
        $desktop = new controlers\Rooter('DeskTop');
    break;
    // case for deskTop
    case "Revision";
        $desktop = new controlers\Rooter('Revision');
    break;

    // case for deskTop
    case "SearchCustomer";
        $desktop = new controlers\Rooter('SearchCustomer');
    break;
    // case for deskTop
    case "CarsCustomer";
        $desktop = new controlers\Rooter('CarsCustomer');
    break;
    // case for deskTop
    case "Enter";
        $desktop = new controlers\Rooter('Enter');
    break;
    // case for deskTop
    case "Exit";
        $desktop = new controlers\Rooter('Exit');
    break;
    // case for deskTop
    case "Search";
        require_once "./Core/models/Search.php";
    break;

    // case for NewStaff
    case "Register";
        if($_SESSION['login'][1] == "admin"){
            $newstaff = new controlers\Rooter('Register');
        }else {
            exit(header("location: ?req=Desktop"));
        }

    break;

    // case for change password
    case "ChangePass";
        $changePass = new controlers\Rooter('ChangePass');
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