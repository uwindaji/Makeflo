<?php
// name of project Garage.
// Author :  lakhdar.
// Create in  2018-08-21 at 16:11:34.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// 

namespace services;
use PDO;
use services as services;
use db as db ;

class Seed {

    private $_table;
    private $_pdo;

    /**
     * function to recovr name of table
     *
     * @param [string] $table
     */
    public function __construct (string $table) {

        $dsn = new db\Database();
        $this->_pdo = $dsn->connect();
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
        $k_res ='';
        $values = '';
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
            }else if(isset($post[$result[$i]]) and $post[$result[$i]] == null){

                $values .= "NULL,";
            }else if(!isset($post[$result[$i]])){

                $values .= "NULL,";
            }else if($post[$result[$i]] == 'now'){

                $values .= "NOW(),";
            }else if($post[$result[$i]] == "FALSE"){

                $values .= "FALSE,";
            }else if($post[$result[$i]] == "LAST_INSERT_ID"){

                $values .= "LAST_INSERT_ID(),";
            }else if($post[$result[$i]] == "TRUE"){

                $values .= "TRUE,";
            }else if($result[$i] == 'date'){
                

                    $values .= "'".strtotime($post[$result[$i]])."',";
                

            }else if($result[$i] == 'password'){
                // check password with Tools
                $password = services\Tools::check_password($post[$result[$i]]);
                if ($password != false){
                    $values .= "'".$password."',";
                }else {

                    $return = "Invalid Password";
                }

            }else if($result[$i] == 'mail'){

                // check mail with Tools
                $mail = services\Tools::check_mail($post[$result[$i]]);

                if ($mail != false){
                    $values .= "'".$post[$result[$i]]."',";
                }else {

                    $return = "Invalid mail";
                }

            }else if(strpos($post[$result[$i]], ",") !== false){

                    $vergule = str_replace(",", "ù", $post[$result[$i]]);
                    $values .= "'".$vergule."',";
            }else {

                $values .= "'".addslashes(htmlentities(trim($post[$result[$i]])))."',";
            }
        }


        $values = substr($values, 0, -1);

        if(strpos($values, "ù") !== false){

            $values= str_replace("ù", ",", $values);
        }

        if($return == null){

            $sql = "INSERT INTO ".$this->_table."(".$k_res.") VALUES(".$values.")";

            //echo $sql; die();
            
            $res =  $this->_pdo->exec($sql)or var_dump($this->_pdo->errorInfo());

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
    public function search_in_table (string $id, array $data = null) {

        $value = '';
        if ($data){
            // shell array $data
            foreach($data as $key => $val){

                if (count($data)> 1){

                    if($val == null){

                        $value .= "$key  IS NULL AND ";
                    }else{

                        $value .= "$key = '$val' AND ";
                    }

                    
                }else {

                    if($val == null){

                        $value .= "$key  IS NULL";
                    }else{

                        $value .= "$key = '$val'";
                    }

                    //$value .= "$key = '$val'";
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
                //echo $sql; die();
                
            }
            // send $sql to function sql to executate
            $res =  $this->_pdo->query($sql);
            
            $result = $res->fetchAll();
            
            if($result){

                return $result;
            }
    }
    /**
     * function to delete data in table
     *
     * @param array $data
     * @return void
     */
    public function delete_in_table (array $data) {

        $value = '';
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
     * function to update data
     *
     * @param array $data
     * @param array $condition
     * @return void
     */
    public function update_table (array $data, array $condition){

        $value = "";
        $cvalue = "";
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

        if ($condition){
            // shell array $data
            foreach($condition as $ckey => $cval){

                if (count($condition)> 1){

                    $cvalue .= "$ckey = '$cval' AND ";
                }else {

                    $cvalue .= "$ckey = '$cval'";
                }
            }
        
            // // remove the last AND
            $cwords = explode( " ", $cvalue );
            $ccnt = count($cwords);
            if($cwords[$ccnt-2] == "AND") {

                array_splice( $cwords, -2 );
            }
            
            $cvalue =  implode( " ", $cwords );
        }
            
            $sql ="UPDATE ".$this->_table." SET ".$value." WHERE ".$cvalue;
            //echo $sql; die();
            // send $sql to function sql to executate
            $res =  $this->_pdo->exec($sql); //or var_dump($this->_pdo->errorInfo());;
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

        //print_r($res); die();
        //return schema of table
        return $res;

    }

}

