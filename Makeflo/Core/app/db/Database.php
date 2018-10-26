<?php
// name of project Makeflo.
// Author :  lakhdar.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr
namespace db;
use PDO;


class Database {

private $_host = "localhost";
private $_user = "root";
private $_password = "root";
private $_bdd = "makeflo";
public $_pdo;

    public function connect (){
        try { 

            $this->_pdo = new \PDO("mysql:dbname=".$this->_bdd.";host=".$this->_host, $this->_user, $this->_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $this->_pdo;
        }
        catch (Exception $e) {die("impossible de se connecter a la base de données ");
        
        }



    }
}