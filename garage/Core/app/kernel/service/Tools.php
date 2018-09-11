<?php
// name of project test.
// Author :  lakhdar.
// Create in  2018-08-21 at 16:11:34.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// 

namespace app\kernel\service;
use app\kernel\service as service;
use app\kernel\db as db ;

class Tools {


    static function array_set($array, $ad, $p){

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

    static function check_password($password){

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

    static function check_mail ($mail) {

        $mail = preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail);
        if ($mail){
            
            return true;
        }else {
            return false;
        }
    }

    static function is_empty(array $post,  $array){

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

}