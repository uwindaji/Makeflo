<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

$factures = new services\Seed('Factures');
$user = new services\Seed('User');

$nombre_factures = count($resultatFacture = services\Tools::search_with('*', 'Factures', " WHERE id_user ='".$_SESSION['login']['id']."'"));
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

$resultatFacture = services\Tools::search_with('*', 'Factures', " WHERE id_user ='".$_SESSION['login']['id']."' AND  id_facture BETWEEN $page AND $re ");





//==================================================================================================
$data = array("id_user"=>$_SESSION['login']['id']);
$res_factures = $factures->search_in_table ("*", $data );


$res_user = $user->search_in_table ("*", $data );

if(isset($_GET['facture'])){

    $zipname = 'Makeflo.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    
    $zip->addFile('./Core/public/folders/factures/'.$res_user[0]['folder'].'/'.$_GET['facture'], 'Makeflo/'.$_GET['facture']);
    

    if ($zip->close() === false) {
        echo "Error creating ZIP file"; die();
    };

    if (file_exists($zipname)) {

        ob_clean();
        ob_end_flush();

        header('Content-Type: application/zip');
        header("Content-disposition: attachment; filename=\"".basename($zipname)."\"");
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);
    } else {
        exit("Could not find Zip file to download");
    }




}

