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

// $page = "page";
// $str = "azerty {{% page %}} vgfrt";
// echo strpos($str, "{{% $page %}}"); die();

function url(){
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}


$host = $_SERVER['HTTP_HOST'];
// get folder
$url = url();
$realpath = realpath(dirname(__FILE__)); 
$_folder = explode("/", $realpath);
$folder = $_folder[count($_folder)-1];

$root = explode($host, $url);

if(isset($root[1])){
    $root = explode("/", $root[1]);
    $root = "/".$root[1]."/";
    
}else {
    $root ="/";
}

$root = substr($root, 0, -1);

if($_SESSION['login'] == null){
    $root ="/Login";
}else if($_SESSION['login'] and $root =="/Login"){
    $root ="/Home";
}




//print_r($root); die();
$request = new services\Target($root);
$controle = new controlers\Controler($request);
