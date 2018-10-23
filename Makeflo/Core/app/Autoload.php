<?php
// name of project Makeflo.
// Author :  lakhdar.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

class Autoload {

    public function __construct() {
        
        $this->loader();
    } 

    public function loader() {
        spl_autoload_register(function ($class) {
            $class= str_replace("\\", "/" , $class);
            $filename = "./Core/app/".$class.".php";
            require_once ($filename);
        });

    }
}

$autoload = new Autoload();