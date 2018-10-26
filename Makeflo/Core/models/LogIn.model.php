<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

use services as services;

// inbstancier la table User
$login = new services\Seed('User');

$res_admin = $login->search_in_table('*', null);

if($res_admin): 

    $_SESSION['register'] = null;
else :

    $_SESSION['register'] = "register";
endif;



if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // if is the first connexion do this 
    if($_SESSION['register'] === 'register'):

        // Create variable $array containe array type super admin
        $array = array("type" => "super admin");
        // merge the array $array in last of £_POST
        $post = array_merge($_POST, $array);

        // check is empty
        $table = array('nom', 'prenom', 'tel', 'mail', 'password');
        $retour = services\Tools::is_empty($post, $table);

        if($retour === null):
            // insert data $post in table user and get result of insert in variable $ retuirn
            $return = $login->insert_in_table($post);
            // if $return 
            if($return):

                // set flash message "type of error"
                $_SESSION['flash'] = $return;
                // set icon danger
                $_SESSION['icon'] = "danger";


            // else 
            else:

                // set flash register success
                $_SESSION['flash'] = "Vous etes enregistrer avec success";
                // set icon danger
                $_SESSION['icon'] = "success";


                // set $_SESSION['register'] equal null
                $_SESSION['register'] = null;
                // end 

            endif;
            // end 
        else :

            $_SESSION['flash'] = $retour;
            // set icon danger
            $_SESSION['icon'] = "danger";

        endif;

    // else search in table user for user 
    else :

        $admin = array('mail' => $_POST['mail'], 'password' => sha1($_POST['password']));
        // search in table User if login existe 
        $res_admin = $login->search_in_table('*', $admin);

        // if find result do this  
        if($res_admin):

            
            if($res_admin[0]['hide'] === null):
                // get type of user 
                $type = $res_admin[0]['type'];
                // get type of user 
                $id = $res_admin[0]['id_user'];

                // set $_SESSION['login'] to array id and type 
                $_SESSION['login'] = array('id' => $id, 'type' => $type);

                exit(header('location: index.php'));
            else:

                // set flash message "password or mail error" 
                $_SESSION['flash'] = "Compte supprimé !";
                // set icon danger
                $_SESSION['icon'] = "danger";

            endif;

            // end 

        // else error in password or mail
        else :

            // set flash message "password or mail error" 
            $_SESSION['flash'] = "Mot de passe ou E-mail incorrect !";
            // set icon danger
            $_SESSION['icon'] = "danger";

        endif;

    endif;

    



}