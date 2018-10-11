<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-03 at 15:17:13.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace models ;
use models as models;
use app\kernel\service as service;
use  Core\app\controlers as controlers;

// instantiate table Admin, WORKPLACE, PERIOD
$mend =  new service\Seed('MEND');
$mendes =  new service\Seed('MENDES');
$mended =  new service\Seed('MENDED');


if($_POST){

    $array = array('mend', 'price');
    $return = service\Tools::is_empty($_POST, $array);

    if(!$return){

        $mend->insert_in_table($_POST);

        $id_mend = service\Tools::search_with("id_mend AS LastID", "MEND", "WHERE id_mend = LAST_INSERT_ID()");
        $mendes->insert_in_table(array("id_mend"=>$id_mend[0]['LastID'], "id"=> $_SESSION['login'][0], "date"=>date('d-m-Y')));
        $mended->insert_in_table(array("id_mend"=>$id_mend[0]['LastID'], "id_car"=> $_GET['id'], "date"=>date('d-m-Y')));

    }else {
        $_SESSION['registration'] = $return;
        $_SESSION['icon'] = "danger";

    }

}
