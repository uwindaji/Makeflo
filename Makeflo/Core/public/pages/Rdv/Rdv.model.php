<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User
$appoint = new services\Seed('Appointment');

$res = $appoint->search_in_table('*', array('id_user'=>$_SESSION['login']['id']));

