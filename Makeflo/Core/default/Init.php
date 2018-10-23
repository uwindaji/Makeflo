<?php


function init(){

        $_SESSION['init'] = true;
        $_SESSION['login'] = null;
        $_SESSION['admin'] = null;
        $_SESSION['register'] = null;
        $_SESSION['flash'] = null;
}

if(!isset($_SESSION['init'])){

    init();
}