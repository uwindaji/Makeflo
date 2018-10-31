<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
    <div class="card col-12 pl-lg-0 pb-5" >
    <!-- start -->

        <div class="card-header text-center">
            <b>Mes projets</b>
        </div>
        <div class="card-body p-3">
            <form method="post" action="">
                <?PHP

                    if ($_SESSION['flash']):
                    ?>

                    <div class="alert alert-<?= $_SESSION['icon'];?>" role="alert">
                    <?= $_SESSION['flash']; ?>
                    </div>

                    <?PHP

                    $_SESSION['flash'] = null;
                    endif;
                ?>
                <div class="row d-flex row-project mb-1 p-3 pr-0 rounded">
                    <div class="col-1 pt-0"><i class="fas fa-comment fa-2x"></i></div>
                    <div class="col-10">
                        <div class="form-group m-0">
                            <input type="text" class="form-control" id="message" name="message" aria-describedby="message" placeholder="Message">
                        </div>
                    </div>
                    <div class="col-1 d-flex justify-content-end"><button class="btn" type="submit" style="height: 38px;"><i class="fas fa-share-square "></i></button></a></div>
                </div>
            </form>
        </div>
        <div class="card-body p-3">
            <?php
            if($res_message):
                foreach($res_message as $val):
                    if($val['nature'] === 'send'){
            ?>
                        <div class="row d-flex justify-content-start row-message  ">
                            <div class="col-6 p-0 col-message mb-4 rounded ">
                                    <div class="row m-0">
                                        <div class="col-2 ml-0 pl-0 title pl-2 pt-2 pb-2 rounded">Vous :</div>
                                        <div class="col-10 ml-0 pl-0 title pl-2 pt-2 pb-2 rounded d-flex justify-content-end"><?= $val['date_message'] ?></div>
                                    </div>
                                <p class="ml-3 pt-3"><?= $val['message'] ?></p>
                            </div>
                        </div>
                    <?php
                    }else if($val['nature'] === 'response'){
                    ?>
                        <div class="row d-flex justify-content-end row-message">
                            <div class="col-6 p-0 col-reponse mb-4 rounded ">
                                <div class="row m-0">
                            
                                    <div class="col-3 ml-0 pl-0 title pl-2 pt-2 pb-2 rounded">Makeflo :</div>
                                    <div class="col-9 ml-0 pl-0 title pl-2 pt-2 pb-2 rounded d-flex justify-content-end"><?= $val['date_message'] ?></div>

                                </div>
                                <p class="ml-3 pt-3"><?= $val['message'] ?></p>
                            </div>
                        </div>
            <?php
                    }
                endforeach;
            endif;
            ?>
        </div>


    <!-- end -->
    </div>

</div>