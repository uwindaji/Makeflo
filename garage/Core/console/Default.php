<?php
use app\kernel\service as service;
use  Core\app\controlers;

$admin =  new service\Seed('Admin');
$res = $admin->search_in_table("*", null);

if (!$res){
    
    require_once ('Core/console/Settings.php');
}else {

    $rooter = new controlers\Rooter('Home');
}

