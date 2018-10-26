<?php
// name of project Makeflo.
// Author :  lakhdar.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr
namespace controlers;


class Controler {
    /**
    * Rooter to recovred view and model
    *
    * @param [String] $req
    */
    public function __construct($req) {
        // recovred the view
        require_once "./Core/models/".$req.".model.php";
        // recovred the model
        require_once "./Core/views/".$req.".view.php";
    }
}
