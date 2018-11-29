<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

$factures = new services\Seed('Factures');
$user = new services\Seed('User');

$res_table = $factures->search_in_table('*', null);

if($res_table):

    $nombre_factures = count($res_table);
    $rest = $nombre_factures % 10;
    $re = 10;

    $page =0;

    if(isset($_GET['limit'])){

        $page += intval($_GET['limit']);

        if($page <= 1){

            $page = 0;
        }else if($page >= ($nombre_factures - $rest)){

            $page = ($nombre_factures - $rest)+1;
            $re = $rest;
        }
    }

    $re = $re + $page;
else:

    $re = 0;
    $page = 0;
endif;

$res_bill = services\Tools::search_with('*', 'Factures', " WHERE id_facture BETWEEN $page AND $re ");
