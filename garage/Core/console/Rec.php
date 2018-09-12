<?php
use  Core\app\controlers;
$rec = $_GET["rec"];

switch ($rec){

    // case for login customer
    case "Login";
        $desktop = new controlers\Rooter('Login');
    break;
    // case for login customer
    case "LoginCustomer";
        $desktop = new controlers\Rooter('LoginCustomer');
    break;
    // case for register customer
    case "RegisterCustomer";
        $desktop = new controlers\Rooter('RegisterCustomer');
    break;
    // case for register customer
    case "DeskTopCustomer";
        if($_SESSION['loginCustomer']){
            $desktop = new controlers\Rooter('DeskTopCustomer');
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for log out
    case "LogOut";
        session_destroy();
        exit(header('location: index.php'));
    break;
    // case default
    default: 
    exit(header('location: index.php'));
    
}