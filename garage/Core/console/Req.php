<?php 
use  Core\app\controlers;
$request = $_GET["req"];
    
switch ($request){

    // case for deskTop
    case "DeskTop";
        $desktop = new controlers\Rooter('DeskTop');
    break;

    // case for NewStaff
    case "Register";
        if($_SESSION['login'] == "admin"){
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