<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr



use services as services;

// inbstancier la table User, Project, File
$user = new services\Seed('User');
$project = new services\Seed('Project');
$file = new services\Seed('File');

// if post 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // check if $_POST is empty
    $table = array('mail','nom', 'description', 'deadline');
    $retour = services\Tools::is_empty($_POST, $table);

    if($retour === null):

        // search id_user with address mail
        $res_user = services\Tools::search_with("*", "User", " WHERE mail='".$_POST['mail']."'");

        // serch id file
        $res_file = $file->search_in_table('*', null);

        if( $res_file):

            $id_file = strval (intval ($res_file[count($res_file)-1]['id_file'] + 1));
        else:
            $id_file = strval (1);

        endif;

        // create folder user if folder not existe 
        // create name of folder
        $name_folder = "FP".strtotime(date('Y-m-d'))."U".$res_user[0]['id_user'];

        // create folder 
        mkdir("./Core/app/projects/".$name_folder, 0755);
        copy('.htaccess', "./Core/app/projects/".$name_folder."/.htaccess");

        $post = array("nom"=> $_POST['nom'], "description"=> $_POST['description'], "deadline"=> $_POST['deadline'],"folder"=>$name_folder, "id_user" => $res_user[0]['id_user'], "id_file" =>$id_file);

        // insert data in table
        $project-> insert_in_table ($post);

        // construct url
        $url = "FF".strtotime(date('Y-m-d'))."U".$res_user[0]['id_user'];
        // get id_project
        $res_project = $project->search_in_table('*', null);
        $id_project = $res_project[count($res_project)-1]['id_project'];
        // construct $data
        $data = array("url"=> $url, "id_project" => $id_project);
        // insert data in table File
        $file-> insert_in_table ($data);
        mkdir("./Core/app/projects/".$name_folder."/".$url, 0755);
        copy('.htaccess', "./Core/app/projects/".$name_folder."/".$url."/.htaccess");

        $_SESSION['flash'] = "Votre projet est créer avec success";
        // set icon danger
        $_SESSION['icon'] = "success";

        exit(header('location: ?page=AddProject'));
        

    else :

        $_SESSION['flash'] = $retour;
        // set icon danger
        $_SESSION['icon'] = "danger";

    endif;

    


    


    // insert in table project data






}