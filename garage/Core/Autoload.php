<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 at 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

class Autoload {

    public function __construct() {
        
        $this->loader();
    } 

    public function loader() {
        spl_autoload_register(function ($class) {
            $class= str_replace("\\", "/" , $class);
            $filename = "./Core/".$class.".php";
            require_once ($filename);
        });

    }
}

$autoload = new Autoload();


