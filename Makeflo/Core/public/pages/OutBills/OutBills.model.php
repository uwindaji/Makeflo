<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

$factures = new services\Seed('Factures');


$nombre_factures = count($factures->search_in_table('*', array('etat'=>null)));



$rest = $nombre_factures % 10;
$re = 10;

$page =0;
$_SESSION['rest'] = count(services\Tools::search_with('*', 'Factures', " WHERE etat IS NOT NULL AND id_facture BETWEEN $page AND $re "));;

if(isset($_GET['limit'])){

    $page += intval($_GET['limit']);

    if(($page - $_SESSION['rest']) <= 1){

        $page = 0;
    }else if($page >= ($nombre_factures - $rest)){

        $page = ($nombre_factures - $rest)+1 + $_SESSION['rest'];
        $_SESSION['rest'] = count(services\Tools::search_with('*', 'Factures', " WHERE etat IS NOT NULL AND id_facture BETWEEN $page AND $re "));
        $page = $page + $_SESSION['rest'];
        $re = $rest;
    }
}

$re = $re + $page;
$re = ($re + $_SESSION['rest']);

$resultatFacture = services\Tools::search_with('*', 'Factures', " WHERE etat IS NULL AND id_facture BETWEEN $page AND $re ");

//print_r($resultatFacture); die();