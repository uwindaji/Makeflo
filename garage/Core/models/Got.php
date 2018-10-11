<?php
// name of project Garage.
// Author :  lakhdar.
// Create in  2018-09-18 at 21:11:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// Login to check if user is login or not

namespace models ;
use models as models;
use app\kernel\service as service;

// instantiate table GOT, PIECES
$got =  new service\Seed('GOT');
$pieces =  new service\Seed('PIECES');

$src = $pieces->search_in_table("num", array("id_pieces"=>$_GET['id_pcs']));

$num = $src[0]['num'];

$g_array = array("id_car"=>$_GET['id_car'], "id_pieces"=>$_GET['id_pcs'] ,"date"=> date('d-m-Y'),"qt"=>$_GET['qt']);
$_got = $got->insert_in_table($g_array);

$num = intval($num) - intval($_GET['qt']);
$p_array = array("num"=>$num);
$_pieces = $pieces->update_table($p_array, array('id_pieces'=>$_GET['id_pcs'] ));