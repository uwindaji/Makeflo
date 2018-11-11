<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// instancier la table Appointment
$rdv = new services\Seed('Appointment');

$res_rdv = $rdv->search_in_table('*', array('id_user'=>$_SESSION['login']['id']));

$nb_rdv = count($res_rdv);


