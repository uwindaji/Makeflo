

<div class="row row-desktop">
    <div class="col-lg-1 col-xm-0"></div>
    <div class="col-lg-10 col-xm-12">
        <div class="col-12 col-title d-flex justify-content-center p-3 mb-5">
            <h2>Cars in garage</h2>
        </div>
        <div class="card-deck">

        <?php 
            use app\kernel\service as service;
            foreach($vl as $v):

                $mark = service\Tools::search_with('mark', 'MARK', 'WHERE id_mark ='.$v['id_mark']);
                $month = service\Tools::search_with('month', 'MONTH', 'WHERE id_month ='.$v['id_month']);
                $year= service\Tools::search_with('year', 'YEAR', 'WHERE id_year ='.$v['id_year']);

        ?>
            <div class="col-lg-3 card p-0">
                <img class="card-img-top" src="./img/<?=  $mark[0]['mark'];  ?>.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Mark : <?=  $mark[0]['mark'];  ?></h5>
                    <h6 class="card-title">Model : <?=  $v['model'];  ?></h6>
                    <h6 class="card-title">Register number : <?=  $v['registration_number'];  ?></h6>
                    <h6 class="card-title">Year : <?=   $year[0]['year'];  ?></h6>
                    <h6 class="card-title">Month : <?=   $month[0]['month'];  ?></h6>
                    <h6 class="card-title">Kilometers : <?=  $v['kilometers'];  ?></h6>
                    <a href="?req=AddPieces&id=<?=  $v['id_car'];  ?>" class=""><button class="btn mt-1 pt-4 pb-4" >Add Pieces</button></a>
                    <a href="?req=Mend&id=<?=  $v['id_car'];  ?>" class=""><button class="btn mt-1 pt-4 pb-4" >Mend</button></a>
                    <a href="?req=Exit&id=<?=  $v['id_car'];  ?>" class=""><button class="btn mt-1 pt-4 pb-4" >Exit</button></a>
                </div>
            </div>
        <?php
            endforeach;
        ?>
        </div>
    </div>
    <div class="col-lg-1 col-xm-0"></div>
</div>
