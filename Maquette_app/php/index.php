<?php

require 'core/bind.php';
require 'controlers/Rooter.php';


if(isset($_POST['request'])){ // si poste request

    $request = $_POST['request'];

    

    switch ($request){


        case 'AddAdmin': 
            // on creer un nouveau objet $controler
            // on declare les variables de POST
            $controler = new Rooter('AddAdmin'); // le controler charge le model 'upload'
            $nom = htmlentities($_POST['nom'], ENT_QUOTES);
            $prenom = htmlentities($_POST['prenom'], ENT_QUOTES);
            $email = htmlentities($_POST['email'], ENT_QUOTES);
            $tel = htmlentities($_POST['tel'], ENT_QUOTES);
            $adresse = htmlentities($_POST['adresse'], ENT_QUOTES);
            $cp = htmlentities($_POST['cp'], ENT_QUOTES);
            $ville = htmlentities($_POST['ville'], ENT_QUOTES);
            $dEmbauche = htmlentities($_POST['dEmbauche'], ENT_QUOTES);
            $dSortie = htmlentities($_POST['dSortie'], ENT_QUOTES);
            $password = htmlentities($_POST['password'], ENT_QUOTES);

            // on appelle la class Upload apres avoir la requirer avec le controler
            $upload = new AddAdmin($pdo, $nom, $prenom, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $password);
        break;        
        case 'AddStaff': 
            // on creer un nouveau objet $controler
            // on declare les variables de POST
            $controler = new Rooter('AddStaff'); // le controler charge le model 'upload'
            $nom = htmlentities($_POST['nom'], ENT_QUOTES);
            $prenom = htmlentities($_POST['prenom'], ENT_QUOTES);
            $dateN= htmlentities($_POST['dateN'], ENT_QUOTES);
            $email = htmlentities($_POST['email'], ENT_QUOTES);
            $tel = htmlentities($_POST['tel'], ENT_QUOTES);
            $adresse = htmlentities($_POST['adresse'], ENT_QUOTES);
            $cp = htmlentities($_POST['cp'], ENT_QUOTES);
            $ville = htmlentities($_POST['ville'], ENT_QUOTES);
            $dEmbauche = htmlentities($_POST['dEmbauche'], ENT_QUOTES);
            $dSortie = htmlentities($_POST['dSortie'], ENT_QUOTES);
            $metier = htmlentities($_POST['metier'], ENT_QUOTES);
            $secteur = htmlentities($_POST['secteur'], ENT_QUOTES);
            $priv = htmlentities($_POST['priv'], ENT_QUOTES);
            $password = htmlentities($_POST['password'], ENT_QUOTES);

            // on appelle la class Upload apres avoir la requirer avec le controler
            $upload = new AddStaff($pdo, $nom, $prenom, $dateN, $email, $tel, $adresse, $cp, $ville, $dEmbauche, $dSortie, $metier, $secteur, $priv, $password);
        break;

        case 'AddItem': 
            // on creer un nouveau objet $controler
            // on declare les variables de POST
            $controler = new Rooter('AddItem'); // le controler charge le model 'upload'
            $cat = htmlentities($_POST['cat'], ENT_QUOTES);
            $item = htmlentities($_POST['item'], ENT_QUOTES);

            // on appelle la class Upload apres avoir la requirer avec le controler
            $upload = new AddItem($pdo, $cat, $item);
        break;

        case 'AdminLogin': 
            // on creer un nouveau objet $controler
            // on declare les variables de POST
            $controler = new Rooter('AdminLogin'); // le controler charge le model 'upload'
            $email = htmlentities($_POST['email'], ENT_QUOTES);
            $password = htmlentities($_POST['password'], ENT_QUOTES);

            // on appelle la class Upload apres avoir la requirer avec le controler
            $upload = new AdminLogin($pdo, $email, $password);
        break;

        case 'AddItemStaff': 
            // on creer un nouveau objet $controler
            // on declare les variables de POST
            $controler = new Rooter('AddItemStaff'); // le controler charge le model 'upload'
            $cat = htmlentities($_POST['cat'], ENT_QUOTES);
            $item = htmlentities($_POST['item'], ENT_QUOTES);

            // on appelle la class Upload apres avoir la requirer avec le controler
            $upload = new AddItemStaff($pdo, $cat, $item);
        break;

        case 'CheckStaff': 
            // on creer un nouveau objet $controler
            // on declare les variables de POST
            $controler = new Rooter('CheckStaff'); // le controler charge le model 'upload'
            $cat = htmlentities($_POST['cat'], ENT_QUOTES);
            // on appelle la class Upload apres avoir la requirer avec le controler
            $upload = new CheckStaff($pdo, $cat);
        break;

    }

}