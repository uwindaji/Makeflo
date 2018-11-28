<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr


// inbstancier la table User
$login = new services\Seed('User');
$token = new services\Seed('Token');
$pass = new services\Seed('Pass');

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

                // construct token
                $code = services\Tools::code();
                // insert token in table Token
                $arr_token = array('token'=>$code, 'date_token'=>date('Y-m-d'));
                $token->insert_in_table($arr_token);

                //serch last id 
                $res_token = $token->search_in_table('*', null);
                $id_token = $res_token[count($res_token)-1]['id_token'];

                // search last id
                $res_admin = $login->search_in_table('*', null);
                $id_user = $res_admin[count($res_admin)-1]['id_user'];

                // insert in table pass id_token and id_user
                $arr_pass= array('id_token'=>$id_token, 'id_user'=>$id_user);
                $pass->insert_in_table($arr_pass);
                // send mail
                // generate the url
                $url = "https://dashboard.makeflo.tv/Password/?code=".$code."%user=".$id_user;
                $name = $_POST['nom']. " ".$_POST[0]['prenom'];
                $to = $_POST['mail'];
                $mail_sub = "MAKEFLO E-mail pour changer le mot de passe";
                $msg = "Bonjour M.".$name."\n message de  Makeflo\n veilliez cliquer sur ce lien  ".$url." pour modifiez votre mot de pass";

                // send mail to 
                $mail = services\Tools::send_mail($to, $mail_sub, $msg);


                // set flash register success
                $_SESSION['flash'] = "Enregistrer avec success";
                // set icon danger
                $_SESSION['icon'] = "success";
                exit(header('location: /Register'));
            endif;
            // end 
        else :

            $_SESSION['flash'] = $retour;
            // set icon danger
            $_SESSION['icon'] = "danger";

        endif;



    endif;

    



}