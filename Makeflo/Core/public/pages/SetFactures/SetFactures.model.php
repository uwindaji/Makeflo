<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User
$user = new services\Seed('User');
$factures = new services\Seed('Factures');

// if post 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // check $_POST
    $array = array('mail', 'nom');
    $check_empty = services\Tools::is_empty($_POST, $array);

    $support =   array('sssssssss','pdf');
    $ext = services\Tools::get_extension($_FILES['file']['name']);

    $key = array_search($ext, $support);

    if($check_empty){

        $_SESSION['flash'] = $check_empty;
        $_SESSION['icon'] = "danger";

    }else if($_FILES['file']['name'] === ""){

        $_SESSION['flash'] = "Vous devez choisir un fichier";
        $_SESSION['icon'] = "danger";

    }else if($key == ""){

        $_SESSION['flash'] = "Extension fichier non supporter";
        $_SESSION['icon'] = "danger";

    }else {

        // get project folder in File
        $res_folder = services\Tools::search_with("*", "User", " WHERE mail='".$_POST['mail']."'");

        // check in table User if folder existe
        if(!$res_folder[0]['folder']){

            $name_folder = "FU".strtotime(date('Y-m-d'))."U".$res_folder[0]['id_user'];
            $data = array("folder" => $name_folder);
            $condition = array('id_user' => $res_folder[0]['id_user']);
            $user->update_table ($data, $condition);
            mkdir("./Core/app/factures/".$name_folder, 0755);
            copy('ht/.htaccess', "./Core/app/factures/".$name_folder."/.htaccess");
            $target = "./Core/app/factures/".$name_folder."/".$_FILES['file']['name'];

        }else if ($res_folder[0]['folder']){
            
            $dir = is_dir("./Core/app/factures/".$res_folder[0]['folder']);
            if($dir === false):
                mkdir("./Core/app/factures/".$res_folder[0]['folder'], 0755);
                copy('ht/.htaccess', "./Core/app/factures/".$res_folder[0]['folder']."/.htaccess");
                
            endif;
            
            $target = "./Core/app/factures/".$res_folder[0]['folder']."/".$_FILES['file']['name'];
        
        }
        
        // check if file existe in folder
        if (file_exists($target)) {

            $_SESSION['flash'] = "Ce fichier existe déja !";
            // set icon danger
            $_SESSION['icon'] = "danger";

        }else {

            // upload file
            $up = move_uploaded_file($_FILES['file']["tmp_name"], $target);
            

            if($up){

                $post = array("date_facture"=>date('Y-m-d'), "lien"=>$_FILES['file']['name'], "id_user"=>$res_folder[0]['id_user']);
                $return = $factures->insert_in_table($post);


                $_SESSION['flash'] = "Votre fichier est charger avec success";
                // set icon danger
                $_SESSION['icon'] = "success";
            }else {

                $_SESSION['flash'] = "Erreur de chargement de fichier !";
                // set icon danger
                $_SESSION['icon'] = "danger";
            }
        }

    }
}