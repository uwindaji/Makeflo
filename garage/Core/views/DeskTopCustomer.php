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
                        $val[2] == "Audi" || 
                        $val[2] == "Bmw" || 
                        $val[2] == "Citroen" || 
                        $val[2] == "Fiat" || 
                        $val[2] == "Ford" || 
                        $val[2] == "Mercedes" ||
                        $val[2] == "Opel" ||
                        $val[2] == "Peugeot" ||
                        $val[2] == "Renault" ||
                        $val[2] == "Volkswagen"  )
                    {
                            echo $val[2];
                    }else {

                        echo "Default";
                    }
                            
                            
                        ?>.jpg" alt="Card image cap">
                        
                <div class="card-body">
                    <h5 class="card-title">Mark : <?= $val[2] ?></h5>
                    <h6 class="card-title">Model : <?= $val[3] ?></h6>
                    <h6 class="card-title">Register number : <?= $val[4] ?></h6>
                    <h6 class="card-title">Kilometers : <?= $val[5] ?></h6>
                    <h6 class="card-title">Month : <?= $val[6] ?></h6>
                    <h6 class="card-title">Year : <?= $val[7] ?></h6>

                    <?php   
                    
                        $select_take = $take->search_in_table("*", array("id_car"=>$val[1])); 

                        if($select_take){

                            foreach($select_take as $v){

                                $select_appoint = $appoint->search_in_table("*", array("id_appointement"=>$v['id_appointement'])); 

                    ?>
                                <div class="alert alert-success text-center" role="alert">
                                    <h5>Appointement : <?= $v['date']; ?></h5> 
                                    AT <strong><?= $select_appoint[0]['app'] ?> o'clock</strong>
                                </div>
                                <a href="?rec=Cancel&id=<?= $val[1]?>&date=<?= $v['date']?>" class=""><button class="btn mt-3 pt-4 pb-4" type="submit" >cancel</button></a>
                    <?php
                            }
                        }else{
                    ?>
                                <a href="?rec=Agenda&id=<?= $val[1]?>&mark=<?= $val[2]?>&model=<?= $val[3]?>&iregister_number=<?= $val[4]?>&kilometers=<?= $val[5]?>&m=<?= $val[6]?>&y=<?= $val[7]?>" class=""><button class="btn mt-3 pt-4 pb-4" type="submit" >Take appointment</button></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <? endforeach; 
                endif;?>
        </div>
    </div>
    <div class=" col-xs-0 col-lg-1"></div>
</div>