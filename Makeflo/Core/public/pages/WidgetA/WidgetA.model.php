<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr


$resultatFacture = services\Tools::search_with('*', 'Factures', 'WHERE etat IS NULL');
$billNot = count($resultatFacture);

$res_appoint = services\Tools::search_with('*', 'Appointment', "WHERE date_appoint >= '".date('Y-m-d')."'");

$n_appoint = count($res_appoint);

$d = date('Y-m-d');
$date = strtotime("$d +8 day");
$date = date('Y-m-d', $date);

$res_project = services\Tools::search_with('*', 'Project', "WHERE deadline BETWEEN '$d' AND '$date'");

$dead = count($res_project);