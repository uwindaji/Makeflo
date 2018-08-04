<?php

class Rooter {
    /**
     * __construct function public qui charge les
     * models et views
     *
     * @param [String] $req
     */
    public function __construct($req){

        require './assets/models/'.$req.'.model.php';
        require './assets/views/'.$req.'.view.php';
    }
}