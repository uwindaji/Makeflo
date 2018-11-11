<?php
// name of project test.
// Author :  lakhdar.
// Create in  2018-09-11 at 16:46:38.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

// 

namespace services;
use services as services;
use db as db ;

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

        $ks = '';
        $vs = '';
        $_keys = '';
        $_values ='';
        $__keys = '';
        $__values ='';
        // store keys and values of $ad  in $ks and $vs
        foreach($ad as $k => $v){

            $ks .= $k;
            $vs .= $v;
        }

        $keys = '';
        $values ='';
        // store keys and values of $array in $keys and $values
        foreach ($array as $key => $val){

                $keys .= $key.",";

                if(strpos($val, ',') !== false){

                    $vergule = str_replace(",", "ù", $val);
                    $values .= $vergule.",";
                }else{

                    $values .= $val.",";
                }
        }
        // remove the last charecter of keys and values
        $keys = substr($keys, 0, -1);
        $values = substr($values, 0, -1);
        // converter keys and values to array
        $keys = explode(",",$keys);
        
        // insert keys of $ad with $keys of $array
        for($i = 0; $i <= count($keys); $i++){

            if ($i === $p){

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

                    $return = $key." est vide!";
                    break;
                }
                
            }

        }

        return $return;

    }

    /**
     * diff_arrary function to get difference
     *
     * @param [array] $array1
     * @param [array] $array2
     * @return array
     */
    static function diff_array(array $array1, array $array2 = null) {
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

    
    /**
     * search_with is function tosearch in table with condition
     * @param [string] $id
     * @param [string] $table
     * @param [string] $prefix
     * @return array
     */
    static function search_with (string $id, $table, string $prifix = null) {

        $dsn = new db\Database();
        $pdo = $dsn->connect();

        
        $sql = "SELECT ".$id." FROM ".$table." ".$prifix;


        // send $sql to function sql to executate
        $res =  $pdo->query($sql)or var_dump($pdo->errorInfo());

        
        $result = $res->fetchAll();
        
        if($result){

            return $result;
        }
    }

    /**
     * send_mail is function to send data to another web site use php cURL
     * @param [string] $to
     * @param [string] $mail_sub
     * @param [string] $message
     */
    static function send_mail(string $to, string $mail_sub, string $message){

        $token = "*****************";
        $url = "xxxxxxxxxxxxxxxxxxx";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"token=".$token."&subject=".$mail_sub."&to=".$to."&message=".$message);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);

        $resopnse = intval($response);

        if($response === 200):
            return "ok";
        endif;
    }

    /**
     * code function to generate code type sha1
     * @return string
     */
    static function code(){

        $code = sha1(rand(pow(2,10), pow(2,60)));
        $arr_token = services\Tools::search_with("token", "Token", "WHERE token='".$code."'");

        if($arr_token[0]['token'] === $code){

            services\Tools::code();
        }else {

            return $code;
        }

    }

    /**
     * pass function to generate token to change the password
     * @param [string] $code
     * @param [string] $user
     * @return null
     */
    static function pass(string $code, string $user){

        $customer =  new services\Seed('CUSTOMER');
        $password =  new services\Seed('PASSWORD');
        $c_change =  new services\Seed('CUST_CHANGE');
        $a_change =  new services\Seed('ADMIN_CHANGE');

        // insert token and date to PASSWORD table
        $array_pass = array("token"=>$code, "date"=>date('d-m-Y H:i:s'), "state"=>null);
        $password->insert_in_table($array_pass);

        // get last id_password
        $arr_id_password = services\Tools::search_with("*", "PASSWORD", null);
        $id_password = $arr_id_password[count($arr_id_password)-1]['id_password'];

        switch ($user){

            // case for customer
            case "customer";
                // get last id_customer
                $arr_id_customer = services\Tools::search_with("id_customer", "CUSTOMER", null);
                $id_customer = $arr_id_customer[count($arr_id_customer)-1]['id_customer'];

                // insert id_customer and id_password to CUST_CHANGE table
                $array_c_change = array("id_customer"=>$id_customer, "id_password"=>$id_password);
                $c_change->insert_in_table($array_c_change);
            
            break;
            // case for admin
            case "admin";
                // get last id_customer
                $arr_id_admin = services\Tools::search_with("id", "Admin", null);
                $id_admin = $arr_id_admin[count($arr_id_admin)-1]['id'];

                // insert id_customer and id_password to CUST_CHANGE table
                $array_a_change = array("id"=>$id_admin, "id_password"=>$id_password);
                $a_change->insert_in_table($array_a_change);
            
            break;

        }

    }

    /**
     * @param [file] $img
     * @param [array] $dem
     * @return string
     */
    static function check_img($img, array $dem){

        // gte list information of image 
        list($width, $height, $type, $attr) = getimagesize($img['tmp_name']);


        // if demension or type not correct return error
        if($width !== $dem[0] || $height !== $dem[1] || $type !== 3){

            return "L'image doit avoir une largeur de ".$dem[0]."px et une hauteur de ".$dem[1]. "px en format PNG";
        
        // else return null
        }else {

            return null;
        }
    }

    static function upload_img($file, $dir, $name){

        $up = move_uploaded_file($file["tmp_name"], $dir.$name);

    }

    static function get_extension(string $name){

        // check if point
        $pos = strpos($name, '.');

        if($pos >0){

            $exp = explode('.', $name );
            $ext = $exp[count($exp)-1];

            return $ext;
        }else {

            return null;
        }


    }
}