<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
    <div class="card col-12 pl-lg-0 pb-5" >
    <!-- start -->
    <div class="card-header text-center">
            <b>Mes projets</b>
        </div>
        <div class="card-body p-3">
            <?php
            if($array_message):
                for($l = 0; $l < count($array_message); $l++):
                    if($array_message[$l]['message'] !== null):
            ?>
                        <div class="row d-flex justify-content-end row-message  ">
                            <div class="col-12 p-0 col-message mb-4 rounded ">
                                <div class="row m-0">
                                    <div class="col-3 ml-0 pl-0 title pl-2 pt-2 pb-2 rounded"><?= $array_message[$l]['name']  ?></div>
                                    <div class="col-9 ml-0 pl-0 title pl-2 pt-2 pb-2 rounded d-flex justify-content-end"><?= $array_message[$l]['date_message'] ?></div>
                                </div>
                                <p class="ml-3 pt-3"><?= $array_message[$l]['message'] ?></p>
                                <div class="col-12 ml-0 pl-0  pl-2 pt-1 pb-2 rounded d-flex justify-content-end">

                                    <a href="?page=Repondre&user=<?= $array_message[$l]['id_user']  ?>"><button class="btn">Répondre</button></a>

                                </div>
                            </div>
                                
                            
                        </div>
            <?php
                    endif;
                endfor;
            endif;
            ?>
        </div>

    <!-- end -->
    </div>

</div>