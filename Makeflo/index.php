<?php
ob_start();
session_start();

// name of project New.
//Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr
use services as services;
use controlers as controlers;
require_once "./Core/functions/functions.php";
require_once "./Core/Autoload.php";


$root = $_SERVER['REQUEST_URI'];
$_SESSION['sll'] = count(explode('/',$root)) -2;

//echo asset('css/bootstrap.min.css'); die();
if(isset($root)){
    $root = explode("/", $root);

    
    $root = "/".$root[1]."/";
    
}else {
    $root ="/";
}

$root = substr($root, 0, -1);


if($_SESSION['login'] == null and $root != '/Password'){
    $root ="/Login";
}else if($_SESSION['login'] and $root =="/Login"){
    $root ="/Home";
}
$request = new services\Target($root);
$controle = new controlers\Controler($request);

//print_r($controle); die();
