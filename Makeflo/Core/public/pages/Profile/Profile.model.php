<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

$login = new services\Seed('User');
$res_admin = $login->search_in_table('*', array('id_user' => $_SESSION['login']['id']));


if($res_admin){
    $nom = $res_admin[0]['nom'];
    $prenom = $res_admin[0]['prenom'];
    $tel = $res_admin[0]['tel'];

}else {


    exit(header('location: /Login'));
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //check is not empty
    $table = array('nom', 'prenom', 'tel');
    $retour = services\Tools::is_empty($_POST, $table);

    if($retour === null):
        // insert data $post in table user and get result of insert in variable $ retuirn

        //update in table User
        $data = array('nom'=>$_POST['nom'], 'prenom'=>$_POST['prenom'], 'tel'=>$_POST['tel']);
        $condition = array('id_user'=>$_SESSION['login']['id']);
        $return = $login->update_table ($data, $condition);

        // set flash register success
        $_SESSION['flash'] = "Enregistrer avec success";
        // set icon danger
        $_SESSION['icon'] = "success";
        exit(header('location: /profile'));


    else :

        $_SESSION['flash'] = $retour;
        // set icon danger
        $_SESSION['icon'] = "danger";

    endif;

    

}