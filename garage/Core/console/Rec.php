<?php
use  Core\app\controlers;
$rec = $_GET["rec"];

switch ($rec){

    // case for login staff
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
    // case for Agenda
    case "Agenda";
        $desktop = new controlers\Rooter('Agenda');
    break;
    // case for register customer
    case "DeskTopCustomer";
        if($_SESSION['loginCustomer']){
            $desktop = new controlers\Rooter('DeskTopCustomer');
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for register Agenda
    case "Agenda";
        if($_SESSION['loginCustomer']){
            $desktop = new controlers\Rooter('Agenda');
        }else {

            exit(header('location: index.php'));
        }
    break;
    // case for register Appoint
    case "Appoint";
        if($_SESSION['loginCustomer']){
            require_once './Core/models/Appoint.php';
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