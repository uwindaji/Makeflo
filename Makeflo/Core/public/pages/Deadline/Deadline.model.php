<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr
$d = date('Y-m-d');
$date = strtotime("$d +8 day");
$date = date('Y-m-d', $date);

$res = services\Tools::search_with('*', 'Project', "WHERE deadline BETWEEN '$d' AND '$date'");


