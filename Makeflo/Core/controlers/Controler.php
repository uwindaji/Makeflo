<?php

namespace controlers;
use services as services;

class Controler {


    public function  __construct($req) {

        #==============================================================================
        $req->getRoot('/Login', 'Login', 'Login');
        $req->getRoot('/Password', 'Password', 'Password');
        
        #======================================== Admin =======================================
        $req->getRoot('/', 'Home', $_SESSION['login']['type']);
        $req->getRoot('/Abonnement', 'Abonnement', $_SESSION['login']['type']);
        $req->getRoot('/AddProject', 'AddProject', $_SESSION['login']['type']);
        $req->getRoot('/Deadline', 'Deadline', $_SESSION['login']['type']);
        $req->getRoot('/Deconnexion', 'Deconnexion', $_SESSION['login']['type']);
        $req->getRoot('/DeleteUser', 'DeleteUser', $_SESSION['login']['type']);
        $req->getRoot('/HistoryBill', 'HistoryBill', $_SESSION['login']['type']);
        $req->getRoot('/Home', 'Home', $_SESSION['login']['type']);
        $req->getRoot('/ListeAbonnement', 'ListeAbonnement', $_SESSION['login']['type']);
        $req->getRoot('/ListeProject', 'ListeProject', $_SESSION['login']['type']);
        $req->getRoot('/MessageA', 'MessageA', $_SESSION['login']['type']);
        $req->getRoot('/OutBills', 'OutBills', $_SESSION['login']['type']);
        $req->getRoot('/Register', 'Register', $_SESSION['login']['type']);
        $req->getRoot('/Repondre', 'Repondre', $_SESSION['login']['type']);
        $req->getRoot('/Profile', 'Profile', $_SESSION['login']['type']);
        $req->getRoot('/RdvA', 'RdvA', $_SESSION['login']['type']);
        $req->getRoot('/Search', 'Search', $_SESSION['login']['type']);
        $req->getRoot('/SearchProject', 'SearchProject', $_SESSION['login']['type']);
        $req->getRoot('/SetContract', 'SetContract', $_SESSION['login']['type']);
        $req->getRoot('/SetFactures', 'SetFactures', $_SESSION['login']['type']);
        $req->getRoot('/Upload', 'Upload', $_SESSION['login']['type']);

        #=================================== USER ==========================================
        $req->getRoot('/', 'Home', null);
        $req->getRoot('/AddService', 'AddService', null);
        $req->getRoot('/Agenda', 'Agenda', null);
        $req->getRoot('/Deconnexion', 'Deconnexion', null);
        $req->getRoot('/Home', 'Home', null);
        $req->getRoot('/MesFactures', 'MesFactures', null);
        $req->getRoot('/Message', 'Message', null);
        $req->getRoot('/MyContract', 'MyContract', null);
        $req->getRoot('/MyProject', 'MyProject', null);
        $req->getRoot('/MyService', 'MyService', null);
        $req->getRoot('/New', 'New', null);
        $req->getRoot('/Profile', 'Profile', null);
        $req->getRoot('/Rdv', 'Rdv', null);
        $req->getRoot('/ServiceView', 'ServiceView', null);

        #===============================================================================

        $req->getRoot('/error', 'Error', 'Error');
        
        exit(header('location: /error'));
    }

}