<div class="row row-sepa"></div>
<div class="row row-login pt-5 pb-5">
    <div class=" col-xs-0 col-lg-1"></div>
    <div class="col-lg-10 col-xm-12">
        <p>
            <button class="btn " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Add your car
            </button>
        </p>
        <div class="collapse col-lg-4 col-xm-12 pl-0 item-login" id="collapseExample">
            
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
                            <?php
                                foreach($select_month as $key=>$val):
                            ?>
                            <option value="<?=$val['id_month']?>"><?= $val['month']?></option>

                            <?php endforeach;?>
                        </select>
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
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="./img/peugeot.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="./img/bmw.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="./img/mercedes.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-xs-0 col-lg-1"></div>
</div>