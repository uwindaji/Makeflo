<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table Message
$message = new services\Seed('Messages');
$res_message = services\Tools::search_with ("*", "Messages", "WHERE id_user='".$_SESSION['login']['id']."'  ORDER BY id_message DESC");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // check if message is empty
    $array = array('message');
    $check_empty = services\Tools::is_empty($_POST, $array);

    // if message is empty
    if($check_empty){

        $_SESSION['flash'] = $check_empty;
        $_SESSION['icon'] = "danger";

    }else {

        $post = array("message"=> $_POST['message'], "date_message"=> date('Y-m-d H:i:s'), "nature"=>"send", "id_user"=>$_SESSION['login']['id']);
        $message->insert_in_table($post);

        exit(header('location: ?page=Message'));

        $_SESSION['flash'] = 'Votre message a été envoyé avec success';
        $_SESSION['icon'] = "success";

    }

}