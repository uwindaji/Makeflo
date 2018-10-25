<?php

use services as services;

// inbstancier la table User
$login = new services\Seed('User');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $res_admin = $login->search_in_table('*', array('mail' => $_POST['mail']));
    // if is the first connexion do this 
    if($res_admin):

        $_SESSION['flash'] = "Compte existe déja!";
        // set icon danger
        $_SESSION['icon'] = "danger";

    else :

        
        // check is empty
        $table = array('type','nom', 'prenom', 'tel', 'mail', 'password');
        $retour = services\Tools::is_empty($_POST, $table);

        if($retour === null):
            // insert data $post in table user and get result of insert in variable $ retuirn
            $return = $login->insert_in_table($_POST);
            // if $return 
            if($return):

                // set flash message "type of error"
                $_SESSION['flash'] = $return;
                // set icon danger
                $_SESSION['icon'] = "danger";


            // else 
            else:

                // set flash register success
                $_SESSION['flash'] = "Enregistrer avec success";
                // set icon danger
                $_SESSION['icon'] = "success";
                exit(header('location: ?page=Register'));
            endif;
            // end 
        else :

            $_SESSION['flash'] = $retour;
            // set icon danger
            $_SESSION['icon'] = "danger";

        endif;



    endif;

    



}