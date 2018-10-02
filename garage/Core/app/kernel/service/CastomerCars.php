<?php
// name of project test.
// Author :  lakhdar.
// Create in  2018-09-11 at 16:46:38.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr


namespace app\kernel\service;
use app\kernel\service as service;
use app\kernel\db as db ;

class CastomerCars {

    private $_id;
    private $_cars;
    private $_have;
    private $_mark;
    private $_month;
    private $_year;
    private $_return;

    /**
     * function to get data of car
     *
     * @param [string] $id
     */
    public function __construct($id) {

        $this->_id = $id;
        // instantiate table CARS, HAVE, MARK, MONTH, YEAR
        $this->_cars =  new service\Seed('CARS');
        $this->_have =  new service\Seed('HAVE');
        $this->_mark =  new service\Seed('MARK');
        $this->_month =  new service\Seed('MONTH');
        $this->_year =  new service\Seed('YEAR');

        // get array data of car 
        $arr_car = $this->elem_car($this->_have, 'id_car','id_customer',$this->_id);

        // get in tables the id of MONTH, MARK, YEAR 
        $arr_month = $this->get_id($arr_car, 'id_month');
        $arr_mark = $this->get_id($arr_car, 'id_mark');
        $arr_year = $this->get_id($arr_car, 'id_year');

        // get values of MONTH, MARK, YEAR
        $mark = $this->get_value($arr_mark, $this->_mark, 'mark', 'id_mark');
        $month = $this->get_value($arr_month, $this->_month, 'month', 'id_month');
        $year = $this->get_value($arr_year, $this->_year, 'year', 'id_year');

        // declared variable $return as array
        $return = array();

        $add = '';
        // construct arry of car with values in arrays 
        for ($i = 0; $i < count($arr_car); $i++){

            $arr_model = $this->elem_car($this->_cars, 'model', 'id_car', $arr_car[$i]);
            $arr_registration_number = $this->elem_car($this->_cars, 'registration_number', 'id_car', $arr_car[$i]);
            $arr_kilometers = $this->elem_car($this->_cars, 'kilometers', 'id_car', $arr_car[$i]);
            
            // store the array in variable $add
            $add = [$add,  $arr_car[$i], $mark[$i][0], $arr_model[0], $arr_registration_number[0], $arr_kilometers[0], $month[$i][0], $year[$i][0]];

            // push it in the array $return 
            array_push($return, $add);
            
            // set $add equal null
            $add = null;
        }
        

        // and in the end of foreach store the $return variable in the private variable $this->_return
        $this->_return = $return;

    }
    
    /**
     * Undocumented function
     *
     * @param [array] $array
     * @param [string] $instance
     * @param [string] $elem
     * @param [string] $id
     * @return void
     */
    public function get_value(array $array, $instance, string $elem, string $id){

        // declared variable $arr as array
        $arr = array();

        // construct the array of variable $arr
        foreach($array as $vm ){

            // push the elemnts geted by the function elem_car() in the $arr variable
            array_push($arr, $this->elem_car($instance, $elem, $id, $vm[0]));
        }

        // in the end return the $arr variable
        return $arr;
    }

    /**
     * function to get id of car with id customer
     *
     * @param [tarray] $car
     * @param [string] $id
     * @return array
     */
    public function get_id(array $car, string $id){

        $arr = array();
        foreach($car as $val){
            array_push($arr, $this->elem_car($this->_cars, $id,'id_car', $val));
        }

        return $arr;
    }


    /**
     * Undocumented function
     *
     * @param [object] $instance
     * @param [string] $id
     * @param [string] $elem
     * @param [string] $v
     * @return void
     */
    public function elem_car($instance, string $id, string $elem, string $v){

        // declared variable $arr as array
        $arr = array();
        // store result of search in variable $query
        $query = $instance->search_in_table($id, array($elem=>$v));

        // construct the $arr 
        if($query){

            foreach($query as $vs){

                array_push($arr,$vs[$id]);
            }
        }
        
        // in the end return the variabel $arr
        return $arr;
    }

    /**
     * function to return the public variable $this->_return
     *
     * @return array
     */
    public function get(){

        return $this->_return;
    }


}