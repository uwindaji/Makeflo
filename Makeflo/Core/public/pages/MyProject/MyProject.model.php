<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User
$user = new services\Seed('User');
$project = new services\Seed('Project');
// search user information
$res_user = $user->search_in_table ("*", array("id_user"=>$_SESSION['login']['id']));



// get name of user folder 
$folder = $res_user[0]['folder'];
$res_project = $project->search_in_table ("*", array("id_user"=>$_SESSION['login']['id']));   



if(isset($_GET['folder'])):


    $read = scandir ('./Core/app/projects/'.$_GET['folder']);

    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    for($i = 3; $i<count($read); $i++) {
        $zip->addFile('./Core/app/projects/'.$_GET['folder'].'/'.$read[$i], 'Makeflo/'.$read[$i]);
    
    }
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



    
endif;


    // search user information
    $res_user = $user->search_in_table ("*", array("id_user"=>$_SESSION['login']['id']));
    // get name of user folder 
    $folder = $res_user[0]['folder'];
    $res_project = $project->search_in_table ("*", array("id_user"=>$_SESSION['login']['id']));




