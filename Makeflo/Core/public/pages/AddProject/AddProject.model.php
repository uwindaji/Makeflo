<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table User, Project, File
$user = new services\Seed('User');
$project = new services\Seed('Project');

// if post 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // check if $_POST is empty
    $table = array('mail','nom', 'description', 'deadline');
    $retour = services\Tools::is_empty($_POST, $table);

    if($retour === null):

        // search id_user with address mail
        $res_user = services\Tools::search_with("*", "User", " WHERE mail='".$_POST['mail']."'");

        // create folder user if folder not existe 
        // create name of folder
        if($res_user[0]['file'] === ""):
            $name_folder = "FU".strtotime(date('Y-m-d'))."U".$res_user[0]['id_user'];

            // create folder 
            mkdir("./Core/app/projects/".$name_folder, 0755);
            copy('ht/.htaccess', "./Core/app/projects/".$name_folder."/.htaccess");
            $data = array('folder'=>$name_folder);
            $condition = array('id_user'=>$res_user[0]['id_user']);
            $user->update_table ($data, $condition);
        endif;

        $name_project = "FP".strtotime(date('Y-m-d h:i:s'))."U".$res_user[0]['id_user'];
        $post = array("nom"=> $_POST['nom'], "description"=> $_POST['description'], "deadline"=> $_POST['deadline'],"folder"=>$name_project, "id_user" => $res_user[0]['id_user'], "id_file" =>$id_file);

        // insert data in table
        $project-> insert_in_table ($post);

        mkdir("./Core/app/projects/".$name_folder."/".$name_project, 0755);
        copy('ht/.htaccess', "./Core/app/projects/".$name_folder."/".$name_project."/.htaccess");

        $_SESSION['flash'] = "Votre projet est créer avec success";
        // set icon danger
        $_SESSION['icon'] = "success";

        exit(header('location: ?page=AddProject'));
        

    else :

        $_SESSION['flash'] = $retour;
        // set icon danger
        $_SESSION['icon'] = "danger";

    endif;

}