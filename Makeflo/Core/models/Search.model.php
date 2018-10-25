<?php
// name of project Makeflo.
// Author :  lakhdar.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use services as services;


if($_GET['val']):
    $res = services\Tools::search_with("*", "User", " WHERE mail LIKE '%".$_GET['val']."%'  LIMIT 10");
endif;


// encode $result in var
$var = json_encode($res);

// empty all
ob_clean();
    //echo $var;
    echo $var;
// stop here
die();