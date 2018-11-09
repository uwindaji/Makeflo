<?php

namespace controlers;
use services as services;

class Controler {

    private $_stat = false;

    public function  __construct($req) {

        #==============================================================================
        $req->getRoot('/Login', 'Login', 'Login');

        #===============================================================================
        $req->getRoot('/', 'Home', $_SESSION['login']['type']);
        $req->getRoot('/Home', 'Home', $_SESSION['login']['type']);
        $req->getRoot('/SetContract', 'SetContract', $_SESSION['login']['type']);
        $req->getRoot('/Abonnement', 'Abonnement', $_SESSION['login']['type']);
        $req->getRoot('/Upload', 'Upload', $_SESSION['login']['type']);
        $req->getRoot('/SetFactures', 'SetFactures', $_SESSION['login']['type']);
        $req->getRoot('/SetContract', 'SetContract', $_SESSION['login']['type']);
        $req->getRoot('/MessageA', 'MessageA', $_SESSION['login']['type']);
        $req->getRoot('/ListeAbonnement', 'ListeAbonnement', $_SESSION['login']['type']);
        $req->getRoot('/AddProject', 'AddProject', $_SESSION['login']['type']);
        $req->getRoot('/Deconnexion', 'Deconnexion', $_SESSION['login']['type']);

        #=============================================================================
        $req->getRoot('/', 'Home', null);
        $req->getRoot('/Home', 'Home', null);
        $req->getRoot('/Agenda', 'Agenda', null);
        $req->getRoot('/MyService', 'MyService', null);
        $req->getRoot('/AddService', 'AddService', null);
        $req->getRoot('/MyProject', 'MyProject', null);
        $req->getRoot('/New', 'New', null);
        $req->getRoot('/Message', 'Message', null);
        $req->getRoot('/MyContract', 'MyContract', null);
        $req->getRoot('/MesFactures', 'MesFactures', null);
        $req->getRoot('/MyProject', 'MyProject', null);
        $req->getRoot('/Deconnexion', 'Deconnexion', null);
        $req->getRoot('/error', 'Error', 'Error');

        #===============================================================================

        
        exit(header('location: /error'));
    }

}