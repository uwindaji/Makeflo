<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
    <div class="card col-12 pl-lg-0 pb-5" >
    <!-- start -->
        <div class="card-header text-center">
            <b>Mes services</b>
        </div>
        <div class="card-deck pt-3">
                <?php
                if($table):
                    for($i = 0; $i <count($table); $i++){
                ?>
                        <div class="card col-12 col-lg-4">
                            <img class="card-img-top" src="./ressources/img/assets/<?=   get_service_img($table[$i]['id_abonnement']).'.png' ?>" alt="Card image cap">
                            <div class="card-body p-0 pt-1">
                                <a href="?page=ServiceView&id=<?=  $table[$i]['id_abonnement'] ?>"><button class="btn col-12"> Découvrir </button></a>
                            </div>
                        </div>

                        <?php

                            if($i > (count($table)-2) and (($i +1) % 3) === 1){

                        ?>
                                    <div class="card col-12 col-lg-4"></div>
                                    <div class="card col-12 col-lg-4"></div>

                        <?php
                            }else if($i > (count($table)-2) and (($i +1) % 3) === 2){

                                ?>

                                    <div class="card col-12 col-lg-4"></div>
        
                                <?php
                                
                            }
                            if($i > 0 and (($i +1) % 3) === 0){
                        ?>
                                </div>
                                <div class="card-deck pt-3">

                        <?php
                                
                            }
                        ?>
                
                <?php

                    }
                endif;
            ?>

        </div>
    <!-- end -->
    </div>

</div>