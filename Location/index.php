<?php

// require $pdo base de données
require_once './assets/kernel/db_connect.php';
// require controlers le Rooter
require_once './assets/controlers/Rooter.php';

// $query_string varible recupère le QUERY STRING
$query_string = $_SERVER['QUERY_STRING'];


// chargement header et menu
$header = new Rooter('Header');
$menu = new Rooter('Menu');


// switch de $query_string pour appeler Rooter qui charge 
// les views et models

switch($query_string){

    case '':
        $index = new Rooter('Carousel');
    break;
    default:
        $index = new Rooter('Carousel');
}









// chargement footer
$footer = new Rooter('Footer');