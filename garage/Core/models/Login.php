<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 at 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// Login to check if user is login or not

namespace models ;
use models as models;
use app\kernel\service as service;


if ($_SESSION['login'] != null){

    exit(header('location: ?req=DeskTop'));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // instantiate table Admin and store in variable $admin
    $admin =  new service\Seed('Admin');
    // hash post password 
    $password = sha1($_POST['password']);
    $mail = $_POST['mail'];
    $array = array("mail"=>$mail, "password"=>$password);
    // search in table Admin mail and password and sotre in variable $res_admin
    $res_admin = $admin->search_in_table("*", $array);

    // if variable $res_admin existe
    if($res_admin){

        // store the id_workplace in variable $id
        $id = $res_admin[0]['id_workplace'];

        $_SESSION['user'] = $res_admin[0]['name']." ".$res_admin[0]['first_name'];

        // instantiate table WORKPLACE and store in variable $work
        $work = new service\Seed('WORKPLACE');

        $src = array("id_workplace"=>$id);
        // searche in table WORKPLACE id_workplace and store in variable $res_work
        $res_work = $work->search_in_table("*", $src);

        // session login equal name of id_workplace
        $_SESSION['login'] = [$res_admin[0]['id'], $res_work[0]['name']];
        // location to DeskTop
        exit(header('location: ?req=DeskTop'));

    
    }else {

        // session login equal false 
        $_SESSION['registration'] = 'Password or mail is not correct!';
        $_SESSION['icon'] = "danger";

    }
}

