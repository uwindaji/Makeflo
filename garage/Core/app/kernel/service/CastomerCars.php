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

class CastomerCars {

    private $_id;
    private $_cars;
    private $_have;
    private $_mark;
    private $_month;
    private $_year;
    private $_return;


    public function __construct($id) {

        $this->_id = $id;
        // instance table CARS, HAVE, MARK, MONTH, YEAR
        $this->_cars =  new service\Seed('CARS');
        $this->_have =  new service\Seed('HAVE');
        $this->_mark =  new service\Seed('MARK');
        $this->_month =  new service\Seed('MONTH');
        $this->_year =  new service\Seed('YEAR');

        $arr_car = $this->elem_car($this->_have, 'id_car','id_customer',$this->_id);


        $arr_month = $this->get_id($arr_car, 'id_month');
        $arr_mark = $this->get_id($arr_car, 'id_mark');
        $arr_year = $this->get_id($arr_car, 'id_year');


        $mark = $this->get_value($arr_mark, $this->_mark, 'mark', 'id_mark');
        $month = $this->get_value($arr_month, $this->_month, 'month', 'id_month');
        $year = $this->get_value($arr_year, $this->_year, 'year', 'id_year');

        $return = array();
        for ($i = 0; $i < count($arr_car); $i++){

            //echo $i;

            $arr_model = $this->elem_car($this->_cars, 'model', 'id_car', $arr_car[$i]);
            $arr_registration_number = $this->elem_car($this->_cars, 'registration_number', 'id_car', $arr_car[$i]);
            $arr_kilometers = $this->elem_car($this->_cars, 'kilometers', 'id_car', $arr_car[$i]);
            
            $add = [$add,  $arr_car[$i], $mark[$i][0], $arr_model[0], $arr_registration_number[0], $arr_kilometers[0], $month[$i][0], $year[$i][0]];

            array_push($return, $add);
            
            $add = null;
        }
        

        $this->_return = $return;

    }
    
    public function get_value($array, $instance, $elem, $id){

        $arr = array();

        foreach($array as $vm ){

            
            array_push($arr, $this->elem_car($instance, $elem, $id, $vm[0]));
        }

        return $arr;
    }

    public function get_id($car, $id){

        $arr = array();
        foreach($car as $val){
            array_push($arr, $this->elem_car($this->_cars, $id,'id_car', $val));
        }

        return $arr;
    }



    public function elem_car($instance, $id, $elem, $v){
        $arr = array();
        $query = $instance->search_in_table($id, array($elem=>$v));

        if($query){

            foreach($query as $vs){

                array_push($arr,$vs[$id]);
            }
        }
        

        return $arr;
    }


    public function get(){

        return $this->_return;
    }


}