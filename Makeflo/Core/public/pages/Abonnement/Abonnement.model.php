<?php 
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// inbstancier la table Abonnement
$abonnement = new services\Seed('Abonnement');

// if post 
if($_SERVER['REQUEST_METHOD'] == 'POST'){


    // check the $_POST if is not empty
    $array = array('nom', 'description', 'prix', 'img');
    $check_empty = services\Tools::is_empty($_POST, $array);



    if($check_empty){

        $_SESSION['flash'] = $check_empty;
        $_SESSION['icon'] = "danger";

    }else if($_FILES['img']['name'] === ""){

        $_SESSION['flash'] = "Vous devez choisir une image";
        $_SESSION['icon'] = "danger";

    }else {

        // check the image size
        $size = array(346, 467);
        $check_size = services\Tools::check_img($_FILES['img'], $size);

        if($check_size){

            $_SESSION['flash'] = $check_size;
            $_SESSION['icon'] = "danger";

        }else {

            
            // search all in table Abonnement
            $arr_img = $abonnement->search_in_table("*", null);

            // if result
            if($arr_img){

                // get the name of img in the las insert id 
                $name = $arr_img[count($arr_img)-1]['img'];
                $name_n = $name + 1;
            }else {

                $name_n = 1;
            }

            // set directory
            $dir = "ressources/img/assets/";
            // set name of image
            $name = $name_n.".png";
            
            // upload image
            $upload = services\Tools::upload_img($_FILES['img'], $dir, $name);

            // add array image => name image
            $new_array = array("img" => $name_n);
            $post = array_merge($_POST, $new_array);

            // insert in the data base $_POST
            $abonnement->insert_in_table($post);

            // return success
            $_SESSION['flash'] = 'Votre produit est a jouter avec success';
            $_SESSION['icon'] = "success";
            
            // exit to return on the same page
            exit(header('location: ?page=Abonnement'));

        }
    }
}
