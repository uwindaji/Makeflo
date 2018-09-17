<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-10 at 19:08:12.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;

// instance table CARS
$cars =  new service\Seed('CARS');
$mark =  new service\Seed('MARK');
$month =  new service\Seed('MONTH');
$year =  new service\Seed('YEAR');
$have =  new service\Seed('HAVE');
$appoint =  new service\Seed('APPOINTMENT');
$take =  new service\Seed('TAKE');
$recept =  new service\Seed('RECEPT');
$select_mark = $mark->search_in_table("*", null);
$select_month = $month->search_in_table("*", null);
$select_year = $year->search_in_table("*", null);

$cars_array = new service\CastomerCars($_GET['val']);
$_cars = $cars_array->get();