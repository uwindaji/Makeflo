<?php


function init(){

        $_SESSION['init'] = true;
        $_SESSION['login'] = null;
        $_SESSION['loginCustomer'] = null;
        $_SESSION['register'] = null;
        $_SESSION['registration'] = null;
        $_SESSION['user'] = null;
}

if(!isset($_SESSION['init'])){

    init();
}