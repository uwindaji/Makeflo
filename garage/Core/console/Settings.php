<?php
use app\kernel\service as service;
use  Core\app\controlers;

$work =  new service\Seed('WORKPLACE');
$mark =  new service\Seed('MARK');
$month =  new service\Seed('MONTH');
$year =  new service\Seed('YEAR');
$admin =  new service\Seed('Admin');
$select = $work->search_in_table("*", null);
$ad = $admin->search_in_table("*", null);

if(!$select){
    $staff = array(    
                        array("id_workplace"=>1, "name"=>"admin"), 
                        array("id_workplace"=>2, "name"=>"mechanic"),   
                        array("id_workplace"=>2, "name"=>"metal worker"),   
                        array("id_workplace"=>2, "name"=>"trainee")
                    );

    $marks = array(    
                        array("id_mark"=>1, "mark"=>"Audi"), 
                        array("id_mark"=>2, "mark"=>"Bmw"),   
                        array("id_mark"=>2, "mark"=>"Cireon"),   
                        array("id_mark"=>2, "mark"=>"Fiat"),   
                        array("id_mark"=>2, "mark"=>"Ford"),   
                        array("id_mark"=>2, "mark"=>"Mercedes"),   
                        array("id_mark"=>2, "mark"=>"Opel"),   
                        array("id_mark"=>2, "mark"=>"Peugeot"),   
                        array("id_mark"=>2, "mark"=>"Renault"),   
                        array("id_mark"=>2, "mark"=>"Volkswagen"),   
                        array("id_mark"=>2, "mark"=>"Abarth"),   
                        array("id_mark"=>2, "mark"=>"Aleko"),   
                        array("id_mark"=>2, "mark"=>"Alfa Romeo"),   
                        array("id_mark"=>2, "mark"=>"Alpina"),   
                        array("id_mark"=>2, "mark"=>"Aro"),   
                        array("id_mark"=>2, "mark"=>"Artega"),   
                        array("id_mark"=>2, "mark"=>"Aston Martine"),   
                        array("id_mark"=>2, "mark"=>"Auto Bianchi"),   
                        array("id_mark"=>2, "mark"=>"Auverland"),   
                        array("id_mark"=>2, "mark"=>"Bentley"),   
                        array("id_mark"=>2, "mark"=>"Bertone"),   
                        array("id_mark"=>2, "mark"=>"Bluecar Groupe Bellore"),   
                        array("id_mark"=>2, "mark"=>"Buick"),   
                        array("id_mark"=>2, "mark"=>"Cadillac"),   
                        array("id_mark"=>2, "mark"=>"Chevrolet"),   
                        array("id_mark"=>2, "mark"=>"Chrisler"),   
                        array("id_mark"=>2, "mark"=>"Corvette"),   
                        array("id_mark"=>2, "mark"=>"Dacia"),   
                        array("id_mark"=>2, "mark"=>"Daewoo"), 
                        array("id_mark"=>2, "mark"=>"Daihatsu"), 
                        array("id_mark"=>2, "mark"=>"Dangel"), 
                        array("id_mark"=>2, "mark"=>"De La Chapelle"), 
                        array("id_mark"=>2, "mark"=>"Donkervoort"), 
                        array("id_mark"=>2, "mark"=>"DS"), 
                        array("id_mark"=>2, "mark"=>"Ferrari"), 
                        array("id_mark"=>2, "mark"=>"Fisker"), 
                        array("id_mark"=>2, "mark"=>"GME"), 
                        array("id_mark"=>2, "mark"=>"Honda"), 
                        array("id_mark"=>2, "mark"=>"Hummer"), 
                        array("id_mark"=>2, "mark"=>"Hyundai"), 
                        array("id_mark"=>2, "mark"=>"Infinity"), 
                        array("id_mark"=>2, "mark"=>"Isuzu"), 
                        array("id_mark"=>2, "mark"=>"Iveco"), 
                        array("id_mark"=>2, "mark"=>"Jaguar"), 
                        array("id_mark"=>2, "mark"=>"Jeep"), 
                        array("id_mark"=>2, "mark"=>"KIA"), 
                        array("id_mark"=>2, "mark"=>"Lada"), 
                        array("id_mark"=>2, "mark"=>"Lambourghini"), 
                        array("id_mark"=>2, "mark"=>"Lancia"), 
                        array("id_mark"=>2, "mark"=>"Land Rover"), 
                        array("id_mark"=>2, "mark"=>"Lexus"), 
                        array("id_mark"=>2, "mark"=>"Lotus"), 
                        array("id_mark"=>2, "mark"=>"Mahindra"), 
                        array("id_mark"=>2, "mark"=>"Mariti"), 
                        array("id_mark"=>2, "mark"=>"Maserati"), 
                        array("id_mark"=>2, "mark"=>"Mastretta"), 
                        array("id_mark"=>2, "mark"=>"Maybach"), 
                        array("id_mark"=>2, "mark"=>"Mazda"), 
                        array("id_mark"=>2, "mark"=>"Mclaren"), 
                        array("id_mark"=>2, "mark"=>"Mega"), 
                        array("id_mark"=>2, "mark"=>"MG"), 
                        array("id_mark"=>2, "mark"=>"Mia"), 
                        array("id_mark"=>2, "mark"=>"Mini"), 
                        array("id_mark"=>2, "mark"=>"Mutsubishi"), 
                        array("id_mark"=>2, "mark"=>"Morgane"), 
                        array("id_mark"=>2, "mark"=>"Nissan"), 
                        array("id_mark"=>2, "mark"=>"PGO"), 
                        array("id_mark"=>2, "mark"=>"Piaggot"), 
                        array("id_mark"=>2, "mark"=>"Polski/Fso"), 
                        array("id_mark"=>2, "mark"=>"Pontiac"), 
                        array("id_mark"=>2, "mark"=>"Porsche"), 
                        array("id_mark"=>2, "mark"=>"Prontone"), 
                        array("id_mark"=>2, "mark"=>"Rolls-Royce"), 
                        array("id_mark"=>2, "mark"=>"Rover"), 
                        array("id_mark"=>2, "mark"=>"Saab"), 
                        array("id_mark"=>2, "mark"=>"Santana"), 
                        array("id_mark"=>2, "mark"=>"Seat"), 
                        array("id_mark"=>2, "mark"=>"Shuanghuan"), 
                        array("id_mark"=>2, "mark"=>"Scoda"), 
                        array("id_mark"=>2, "mark"=>"Smart"), 
                        array("id_mark"=>2, "mark"=>"Ssangyong"), 
                        array("id_mark"=>2, "mark"=>"Subaru"), 
                        array("id_mark"=>2, "mark"=>"Suzuki"), 
                        array("id_mark"=>2, "mark"=>"Talbot"), 
                        array("id_mark"=>2, "mark"=>"Tavria"), 
                        array("id_mark"=>2, "mark"=>"Tesla"), 
                        array("id_mark"=>2, "mark"=>"Toyota"), 
                        array("id_mark"=>2, "mark"=>"TVR"), 
                        array("id_mark"=>2, "mark"=>"Venturi"), 
                        array("id_mark"=>2, "mark"=>"Volvo"),   
                        array("id_mark"=>2, "mark"=>"Other")
                    );

        $months = array(    
                        array("id_month"=>1, "month"=>"January"), 
                        array("id_month"=>2, "month"=>"February"),   
                        array("id_month"=>2, "month"=>"March"),   
                        array("id_month"=>2, "month"=>"April"),   
                        array("id_month"=>2, "month"=>"May"),   
                        array("id_month"=>2, "month"=>"June"),   
                        array("id_month"=>2, "month"=>"July"),   
                        array("id_month"=>2, "month"=>"August"),   
                        array("id_month"=>2, "month"=>"september"),   
                        array("id_month"=>2, "month"=>"October"),   
                        array("id_month"=>2, "month"=>"November"),   
                        array("id_month"=>2, "month"=>"December")   
                        
                    );

    foreach($staff as $val){

        $work->insert_in_table($val);
    }
    
    foreach($marks as $val){

        $mark->insert_in_table($val);
    }

    foreach($months as $val){

        $month->insert_in_table($val);
    }

    for ($i = 1945; $i <= date("Y"); $i++){

        $year->insert_in_table(array("id_month"=>1, "year"=>$i));
    }


}

if(!$ad){

    $rooter = new controlers\Rooter('Register');

}else {

    $rooter = new controlers\Rooter('Home');
}
