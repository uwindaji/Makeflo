<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 ******* AT 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr
namespace Core\app\controlers;
class Rooter {
    /**
    * Rooter to recovred view and model
    *
    * @param [String] $req
    */
    public function __construct($req) {
        // recovred the view
        require_once "./Core/models/".$req.".php";
        // recovred the model
        require_once "./Core/views/".$req.".php";
    }
}
