<div class="row row-sepa"></div>
<div class="row row-login pt-5 pb-5">
    <div class=" col-xs-0 col-lg-1"></div>
    <div class="col-lg-10 col-xm-12">
        <div class="col-lg-6 col-xm-12 d-flex justify-content-start pl-0">
            <button class="alert col-lg-6 col-xm-12 ml-0 mr-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Add your car
            </button>

                <?PHP
                    if ($_SESSION['registration']):
                ?>
                    <div class="alert  col-lg-6 col-xm-12 alert-<?= $_SESSION['icon'];?> " role="alert">
                        <?= $_SESSION['registration']; ?>
                    </div>
                <?PHP
                    $_SESSION['registration'] = null;
                    endif;
                ?>

        </div>
        <div class="collapse col-lg-6 col-xm-12 p-0 item-login" id="collapseExample">
            
                <form action="" method="post">
                    <?PHP
                        if ($_SESSION['registration']):
                    ?>
                        <div class="alert alert-<?= $_SESSION['icon'];?>" role="alert">
                            <?= $_SESSION['registration']; ?>
                        </div>
                    <?PHP
                        $_SESSION['registration'] = null;
                        endif;
                    ?>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">mark</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_mark">
                            <option value="">Select mark</option>
                            <?php
                                foreach($select_mark as $key=>$val):
                            ?>
                            <option value="<?=$val['id_mark']?>"><?= $val['mark']?></option>

                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter model">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="Enter registration number">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Year</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_year">

                            <option value="">Select year</option>
                            <?php
                                foreach($select_year as $key=>$val):
                            ?>
                            <option value="<?=$val['id_year']?>"><?= $val['year']?></option>

                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Month</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="id_month">
                            <option value="">Select month</option>
                            <?php
                                foreach($select_month as $key=>$val):
                            ?>
                            <option value="<?=$val['id_month']?>"><?= $val['month']?></option>

                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="kilometers" name="kilometers" placeholder="Enter kilometers">
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
            
        </div>
    </div>
    <div class=" col-xs-0 col-lg-1"></div>
</div>
<div class="row row-sepa"></div>

<div class="row row-desktop">
    <div class=" col-xs-0 col-lg-1"></div>
    <div class="col-lg-10 col-xm-12">
        <div class="d-flex flex-wrap justify-content-center">

            <? if($_cars):
            
            foreach($_cars as $val): ?>
            <div class="card col-lg-3 col-sm-5 col-xm-12 p-0 m-3">
                <img class="card-img-top" src="./img/<?php
                if (    
                        $val[1] == "Audi" || 
                        $val[1] == "Bmw" || 
                        $val[1] == "Citroen" || 
                        $val[1] == "Fiat" || 
                        $val[1] == "Ford" || 
                        $val[1] == "Mercedes" ||
                        $val[1] == "Opel" ||
                        $val[1] == "Peugeot" ||
                        $val[1] == "Renault" ||
                        $val[1] == "Volkswagen"  )
                        
                    {

                            echo $val[1];
                    }else {

                        echo "Default";
                    }
                            
                            
                        ?>.jpg" alt="Card image cap">
                        
                <div class="card-body">
                    <h5 class="card-title">Mark : <?= $val[1] ?></h5>
                    <h6 class="card-title">Model : <?= $val[2] ?></h6>
                    <h6 class="card-title">Register number : <?= $val[3] ?></h6>
                    <h6 class="card-title">Kilometers : <?= $val[4] ?></h6>
                    <h6 class="card-title">Month : <?= $val[5] ?></h6>
                    <h6 class="card-title">Year : <?= $val[6] ?></h6>
                    
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <? endforeach; 
                endif;?>
        </div>
    </div>
    <div class=" col-xs-0 col-lg-1"></div>
</div>