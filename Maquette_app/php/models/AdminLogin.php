<?php

class AdminLogin {


    public function __construct($pdo, $email, $password){

        $this->checkLogin($pdo, $email, $password);
        
    }

    private function checkLogin($pdo, $email, $password) {

        $pass = sha1(trim($password));
        $res = $pdo->query("SELECT * FROM STAFF  WHERE email_staff = '$email' AND password_staff = '$pass' ") or die('impossible de se connecter la table SECTEUR');
        $_res    = $res->fetch();
        if($_res){

            $login = [];

            session_start();
            $_SESSION['login'] = true;

            echo 'true';

        }else {

            echo 'error connexion';
        }
    }
}