<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr


$resultatFacture = services\Tools::search_with('*', 'Factures', 'WHERE etat IS NULL');
if($resultatFacture):
    $billNot = count($resultatFacture);
else:
    $billNot = 0;
endif;

$res_appoint = services\Tools::search_with('*', 'Appointment', "WHERE date_appoint >= '".date('Y-m-d')."'");
if($res_appoint):
    $n_appoint = count($res_appoint);
else: 
    $n_appoint =0;
endif;
$d = date('Y-m-d');
$date = strtotime("$d +8 day");
$date = date('Y-m-d', $date);

$res_project = services\Tools::search_with('*', 'Project', "WHERE deadline BETWEEN '$d' AND '$date'");

if($res_project):
    $dead = count($res_project);
else: 
    $dead=0;
endif;