<?php
// name of project test.
// Author :  lakhdar.
// Create in  2018-08-21 at 16:11:34.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// 

namespace app\kernel\service;
use PDO;
use app\kernel\service as service;
use app\kernel\db as db ;

class Seed {

    private $_table;
    private $_pdo;

    /**
     * function to recovred name of table
     *
     * @param [string] $table
     */
    public function __construct (string $table) {

        $dsn = new db\Database();
        $this->_pdo = $dsn->dbn();
        $this->_table = $table;

    }

    /**
     * insert_in_table function to insert data to table
     *
     * @param [array] $post
     * @return string
     */
    public function insert_in_table(array $post) {

        $return = null;
        // store schema in variable $res
        $res = $this->get_schema();
        // shell $res and store in variable $values
        foreach ($res as $key => $val){
                $k_res .= $val[0].",";
        }

        // remove the last charcter in $keys
        $k_res = substr($k_res, 0, -1);
        // convert $k_res to array
        $exp_res = explode(",", $k_res);
        // chekc the diffirent
        $result = array_diff($exp_res, $post);

        for ($i= 0; $i < count($result); $i ++){

            if($res[$i][5] == 'auto_increment'){

                $values .= "DEFAULT, ";
            }else if($post[$result[$i]] == null){

                $values .= "NULL,";
            }else if($result[$i] == 'password'){
                // check password with Tools
                $password = service\Tools::check_password($post[$result[$i]]);
                if ($password != false){
                    $values .= "'".$password."',";
                }else {

                    $return = "Invalid Password";
                }

            }else if($result[$i] == 'mail'){

                // check mail with Tools
                $mail = service\Tools::check_mail($post[$result[$i]]);

                if ($mail != false){
                    $values .= "'".$post[$result[$i]]."',";
                }else {

                    $return = "Invalid mail";
                }

            }else {

                $values .= "'".$post[$result[$i]]."',";
            }
        }

        $values = substr($values, 0, -1);

        if($return == null){

            $sql = "INSERT INTO ".$this->_table."(".$k_res.") VALUES(".$values.")";
            
            $res =  $this->_pdo->exec($sql);//or var_dump($this->_pdo->errorInfo());
            return $return;
        }else {

            return $return;
        }
    }

    /**
     * function to search in table
     *
     * @param string $id
     * @param array $data
     * @return array
     */
    public function search_in_table (string $id, ?array $data= null) {

        if ($data){
            // shell array $data
            foreach($data as $key => $val){

                if (count($data)> 1){

                    $value .= "$key = '$val' AND ";
                }else {

                    $value .= "$key = '$val'";
                }
            }
        
            // // remove the last AND
            $words = explode( " ", $value );
            $cnt = count($words);
            if($words[$cnt-2] == "AND") {

                array_splice( $words, -2 );
            }
            
            $value =  implode( " ", $words );
        }
            // construct the syntax sql and store it in variable $sql
            if($data == null){
                $sql = "SELECT ".$id." FROM ".$this->_table;
            }else {
                $sql = "SELECT ".$id." FROM ".$this->_table." WHERE ".$value;

            }
            // send $sql to function sql to executate
            $res =  $this->_pdo->query($sql);
            
            $result = $res->fetchAll();
            
            if($result){

                return $result;
            }
    }




    public function delete_in_table (array $data) {

        if ($data){
            // shell array $data
            foreach($data as $key => $val){

                if (count($data)> 1){

                    $value .= "$key = '$val' AND ";
                }else {

                    $value .= "$key = '$val'";
                }
            }
        
            // // remove the last AND
            $words = explode( " ", $value );
            $cnt = count($words);
            if($words[$cnt-2] == "AND") {

                array_splice( $words, -2 );
            }
            
            $value =  implode( " ", $words );
        }
            

            $sql = "DELETE FROM ".$this->_table." WHERE ".$value;
            // send $sql to function sql to executate
            $res =  $this->_pdo->exec($sql);

    }

    /**
     * function get_schema to get schema of table
     *
     * @return array
     */
    private function get_schema() {

        // sql to show schema of table
        $sql = "SHOW COLUMNS FROM ".$this->_table;
        $q = $this->_pdo->prepare($sql);
        $q->execute();
        $res = $q->fetchAll();

        //return schema of table
        return $res;

    }
}

