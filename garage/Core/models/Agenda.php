<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-12 at 18:00:05.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

$month = new service\Month($_GET['month'] ?? null, $_GET['year'] ?? null );
$start_day = $month->getStartingDay();
$start_day = $start_day->format('N') === "1" ? $start_day : $month->getStartingDay()->modify('last monday');