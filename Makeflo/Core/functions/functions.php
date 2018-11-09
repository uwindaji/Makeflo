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
// use services as services;

function asset($url){

    $slash = '../';
    $run = '';
    for($i = 0; $i <= $_SESSION['slash']; $i++){

        $run .= $slash;
    }



    $newUrl = $run.'Core/public/ressources/'.$url;
    return $newUrl;

}

