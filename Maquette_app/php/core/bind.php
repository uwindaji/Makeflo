<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$bdd = 'maquette_app';
$date = date('d-m-Y');
$ip = $_SERVER["REMOTE_ADDR"];

try { $pdo = new PDO('mysql:host='.$host.';dbname='.$bdd, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));}
    catch (Exception $e) {die('impossible de se connecter a la base de données ');}