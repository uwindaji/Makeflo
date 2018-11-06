<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;

$contracts = new services\Seed('Contrat');
$user = new services\Seed('User');

$data = array("id_user"=>$_SESSION['login']['id']);
$res_contracts = $contracts->search_in_table ("*", $data );

$res_user = $user->search_in_table ("*", $data );

if(isset($_GET['contrat'])){

    $zipname = 'Makeflo.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    
    $zip->addFile('./Core/app/contracts/'.$res_user[0]['folder'].'/'.$_GET['contrat'], 'Makeflo/'.$_GET['contrat']);
    

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