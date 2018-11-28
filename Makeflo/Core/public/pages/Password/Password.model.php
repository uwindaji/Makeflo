<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// instancier la table User
$login = new services\Seed('User');
$token = new services\Seed('Token');
$pass = new services\Seed('Pass');


if(isset($_GET['code']) and isset($_GET['user'])){

    // check token
    $res_token = $token->search_in_table('*', array('token'=>$_GET['code']));
    if($res_token){

        // search id_user in table pass
        $res_pass = $pass->search_in_table('*', array('id_token'=>$res_token[0]['id_token']));

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // check password
            $check_password = services\Tools::check_password($_POST['password']);
            if($check_password != false):
                // update password
                $data = array('password'=>$check_password);
                $condition = array('id_user'=>$res_pass[0]['id_user']);
                $login->update_table($data, $condition);
                exit(header('location: /Login'));
            else :

                $_SESSION['flash'] = "Mot de passe incorrect !";
                // set icon danger
                $_SESSION['icon'] = "danger";

            endif;
        }

    }else {

        exit(header('location: /Login'));
    }

}else{


    exit(header('location: /Login'));
}


