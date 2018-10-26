<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;


if($_SERVER['REQUEST_METHOD'] == 'POST'){


    // check $_POST
    $array = array('mail', 'nom');
    $check_empty = services\Tools::is_empty($_POST, $array);

    $support =   array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'mov', 'MOV');
    $ext = services\Tools::get_extension($_FILES['file']['name']);

    $key = array_search($ext, $support);



    if($check_empty){

        $_SESSION['flash'] = $check_empty;
        $_SESSION['icon'] = "danger";

    }else if($_FILES['file']['name'] === ""){

        $_SESSION['flash'] = "Vous devez choisir un fichier";
        $_SESSION['icon'] = "danger";

    }else if($key === null){

        $_SESSION['flash'] = "Extension non supporter";
        $_SESSION['icon'] = "danger";

    }else {

        // get project folder in File
        $res_folder = services\Tools::search_with("*", "Project", " WHERE id_project='".$_POST['nom']."'");
        $res_file = services\Tools::search_with("*", "File", " WHERE id_project='".$_POST['nom']."'");

        $target = "./Core/app/projects/".$res_folder[0]['folder']."/".$res_file[0]['url']."/".$_FILES['file']['name'];

        // check if file existe in folder
        if (file_exists($target)) {

            $_SESSION['flash'] = "Ce fichier existe déja !";
            // set icon danger
            $_SESSION['icon'] = "danger";

        }else {

            // upload file
            $up = move_uploaded_file($_FILES['file']["tmp_name"], $target);

            if($up){

                $_SESSION['flash'] = "Votre fichier est charger avec success";
                // set icon danger
                $_SESSION['icon'] = "syccess";
            }else {

                $_SESSION['flash'] = "Erreur de chargement de fichier !";
                // set icon danger
                $_SESSION['icon'] = "danger";
            }

        }


    }


    





    
}