<?php
// name of project garage.
// Author :  lakhdar.
// Create in  2018-09-16 at 01:52:16.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;


if($_GET['cat']):
    $res = service\Tools::search_with("*", "PIECES", " WHERE description = '".$_GET['cat']."'");
endif;


// encode $result in var
$var = json_encode($res);

// empty all
ob_clean();
    //echo $var;
    echo $var;
// stop here
die();
