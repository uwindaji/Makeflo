<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User
$appoint = new services\Seed('Appointment');
// instantiate class Month
$month = new services\Month($_GET['month'] ?? null, $_GET['year'] ?? null );

$all_appoint = $appoint->search_in_table('*', null);

// get the first day in month
$start_day = $month->getStartingDay();
$start_day = $start_day->format('N') === "1" ? $start_day : $month->getStartingDay()->modify('last monday');

if(isset($_GET['appoint'])){


    $res_appoint = $appoint->search_in_table('*', array('date_appoint' => $_GET['appoint']));

    if($res_appoint){

        // set flash message "type of error"
        $_SESSION['flash'] = "rendez-vous pris!";
        // set icon danger
        $_SESSION['icon'] = "danger";

    }else{

        $post = array("id_user"=>$_SESSION['login']['id'], "date_appoint"=> $_GET['appoint']);
        $appoint->insert_in_table($post);

        // set flash message "type of error"
        $_SESSION['flash'] = "Votre rendez-vous confirmer le ".$_GET['appoint'];
        // set icon danger
        $_SESSION['icon'] = "success";


    }
}

function appoint($dt, $all) {
    
    

    $run = null;

    if($all):
        foreach ($all as $val):
            if($dt == $val['date_appoint']){

                $run = "ok";
            }
        endforeach;
    endif;
    return $run;


}

