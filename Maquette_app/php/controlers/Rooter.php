<?php

class Rooter {

    public function __construct($req){

        $this->injecteur($req);
    }

    private function injecteur($req) {

        require './models/'.$req.'.php';
    }
}