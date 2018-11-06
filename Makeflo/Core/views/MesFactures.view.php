<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
    <div class="card col-12 pl-lg-0 pb-5" >
    <!-- start -->
        <div class="card-header text-center">
            <b>Mes factures</b>
        </div>
        <div class="card-body p-3">
        <?php
            if($res_factures):
                foreach($res_factures as $key =>$val):
        ?>
                    <div class="row d-flex row-project mb-1 p-3 pr-0 rounded">
                        <div class="col-1 pt-2"><i class="fas fa-file-archive"></i> </div>
                        <div class="col-5 col-xl-7 pt-2"><?= $val['lien'] ?></div>
                        <div class="col-5 col-lg-4 col-xl-3 pt-2"><b><?= strtoupper($val['date_facture']) ?></b></div>
                        <div class="col-1 d-flex justify-content-end"><a href="?page=MesFactures&facture=<?= $val['lien'] ?>"><button class="btn"><i class="fas fa-download"></i></button></a></div>
                    </div>

        <?php
                endforeach;
            endif;
        ?>
        </div>
    <!-- end -->
    </div>

</div>