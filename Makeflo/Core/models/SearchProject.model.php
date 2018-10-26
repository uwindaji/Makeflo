<?php
// name of project Makeflo.
// Author :  lakhdar.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use services as services;


if($_GET['val']):

    $res_user = services\Tools::search_with("*", "User", " WHERE mail='".$_GET['val']."'");
    $res = services\Tools::search_with("*", "Project", " WHERE id_user='".$res_user[0]['id_user']."'");
endif;


// encode $result in var
$var = json_encode($res);

// empty all
ob_clean();
    //echo $var;
    echo $var;
// stop here
die();