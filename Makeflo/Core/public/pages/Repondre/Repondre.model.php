<?php
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table Message, User
$message = new services\Seed('Messages');
$user = new services\Seed('User');
$factures = new services\Seed('Factures');


$res_message = services\Tools::search_with ("*", "Messages", "WHERE id_user='".$_GET['user']."'  ORDER BY id_message DESC LIMIT 10");





if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // check if message is empty
    $array = array('message');
    $check_empty = services\Tools::is_empty($_POST, $array);

    // if message is empty
    if($check_empty){

        $_SESSION['flash'] = $check_empty;
        $_SESSION['icon'] = "danger";

    }else {

        $post = array("message"=> $_POST['message'], "date_message"=> date('Y-m-d H:i:s'), "nature"=>"response", "id_user"=>$_GET['user']);
        $message->insert_in_table($post);

        if(isset($_GET['facture'])){

            $res_factures = $factures->search_in_table('*', array('id_user'=>$_GET['user'], "id_facture"=>$_GET['facture']));

            $rel = intval($res_factures[0]['msg'] +1);
            $data = array('msg'=>$rel);
            $condition = array('id_facture'=>$_GET['facture']);
            $factures->update_table ($data, $condition);
            exit(header('location: /HistoryBill'));
        }
        

        exit(header('location: /Repondre/?user='.$_GET['user']));

        $_SESSION['flash'] = 'Votre message a été envoyé avec success';
        $_SESSION['icon'] = "success";

    }

}