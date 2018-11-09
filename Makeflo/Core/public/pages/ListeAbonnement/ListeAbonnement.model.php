<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table Abonnement
$abonnement = new services\Seed('Abonnement');

$table = $abonnement->search_in_table("*", null);


if(isset($_GET['delete'])):

    // search in table Abonnement id_abonnement
    $arr_id = services\Tools::search_with("*", "Abonnement", "WHERE id_abonnement='".$_GET['delete']."'");
    $id = $arr_id[0]['id_abonnement'];
    $img = $arr_id[0]['img'];

    // search if not used
    $arr_sous = services\Tools::search_with("*", "Souscrire", "WHERE id_abonnement='".$id."'");
    $date = strtotime($arr_sous[0]['date_exp']);
    $today = strtotime(date('Y-m-d'));


    if($arr_sous and $date > $today):

        $_SESSION['flash'] = 'Vous ne pouvez pas supprimer car un client est abonnerà ce produit !';
        $_SESSION['icon'] = "danger";

    else:

        $abonnement->delete_in_table (array("id_abonnement" => $_GET['delete']));

        unlink('./ressources/img/assets/'.$img.'.png');

        $_SESSION['flash'] = 'Votre produit est supprimé avec success';
        $_SESSION['icon'] = "success";

        exit(header('location: /ListeAbonnement'));

    endif;
endif;