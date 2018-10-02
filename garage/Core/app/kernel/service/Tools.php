<?php
// name of project test.
// Author :  lakhdar.
// Create in  2018-09-11 at 16:46:38.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// 

namespace app\kernel\service;
use app\kernel\service as service;
use app\kernel\db as db ;

class Tools {

    /**
     * insert an array in position pricise
     *
     * @param [array] $array
     * @param [array] $ad
     * @param [int] $p
     * @return array
     */
    static function array_set(array $array, array $ad, int $p){

        // store keys and values of $ad  in $ks and $vs
        foreach($ad as $k => $v){

            $ks .= $k;
            $vs .= $v;
        }

        // store keys and values of $array in $keys and $values
        foreach ($array as $key => $val){

                $keys .= $key.",";
                $values .= $val.",";
        }
        // remove the last charecter of keys and values
        $keys = substr($keys, 0, -1);
        $values = substr($values, 0, -1);
        // converter keys and values to array
        $keys = explode(",",$keys);
        
        // insert keys of $ad with $keys of $array
        for($i = 0; $i <= count($keys); $i++){

            if ($i == $p){

                $_keys .= $ks.",".$keys[$i].",";
            }else {

                $_keys .= $keys[$i].",";
            }

        }
        // converter values of $array to array
        $values = explode(",",$values);
        // insert key of $ad with $values of $array
        for($i = 0; $i <= count($values); $i++){

            if ($i == $p){

                $_values .= $vs.",".$values[$i].",";
            }else {

                $_values .= $values[$i].",";
            }

        }

        // remove the last charecter of keys and values
        $_keys = substr($_keys, 0, -2);
        $_values = substr($_values, 0, -2);
        // converter keys and values to array
        $__keys = explode(",", $_keys);
        // converter values of $array to array
        $__values = explode(",", $_values);
        $return = array_combine($__keys, $__values);
        
        return $return;
    }

    /**
     * check if password is correct and hash it
     *
     * @param [type] $password
     * @return string
     */
    static function check_password(string $password){

        // check upercase
        $uppercase = preg_match('@[A-Z]@', $password);
        // check lowercase
        $lowercase = preg_match('@[a-z]@', $password);
        // check number
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            return false;
        }else {

            // trim the password
            $password = trim($password);
        
            return sha1($password);
        }
    }

    /**
     * check if mail is correct
     *
     * @param [type] $mail
     * @return string
     */
    static function check_mail (string $mail) {

        $mail = preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail);
        if ($mail){
            
            return true;
        }else {
            return false;
        }
    }

    /**
     * check if value in post is empty 
     *
     * @param array $post
     * @param [type] $array
     * @return boolean
     */
    static function is_empty(array $post,  array $array){

        // init $return in null
        $return = null;


        foreach($post as $key => $val){

            for($i = 0; $i< count($array); $i++){

                if ($key == $array[$i] and $val == null){

                    $return = $key." is empty!";
                    break;
                }
            }

        }

        return $return;

    }

    /**
     * diif_arrary function to get difference
     *
     * @param [type] $array1
     * @param [type] $array2
     * @return array
     */
    static function diff_array(array $array1, ?array $array2 = null) {
        $diff=array();
        $array = array();
        for($i = 0; $i< count($array1); $i++){

            foreach($array2 as $key => $val){

                if($array1[$i]['id_appointement'] == $val['id_appointement']){

                    array_push($diff, $i);
                }
            }
        }

        $d = array(0,1,2,3);

        $ds = array_diff($d, $diff);

        foreach($ds as $val){

            array_push($array, $array1[$val]);
        }

        return $array;
    }

    static function search_with (string $id, $table, ?string $prifix = null) {

        $dsn = new db\Database();
        $pdo = $dsn->dbn();

        
        $sql = "SELECT ".$id." FROM ".$table." ".$prifix;

        // send $sql to function sql to executate
        $res =  $pdo->query($sql);
        
        $result = $res->fetchAll();
        
        if($result){

            return $result;
        }

        //return $sql;
    }
}