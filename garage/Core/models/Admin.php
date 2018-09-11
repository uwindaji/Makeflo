<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 at 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// Admin modul to management application

namespace models ;
use models as models;
use app\kernel\service as service;
use app\kernel\db as db ;

class Admin {


    static function create_function() {

        $staff =  new service\Seed('STAFF');
        $staff->save_in_table( ["id", "DEFAULT"], "name_function"); 
    }
}
