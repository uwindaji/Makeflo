
<div class="row row-sepa"></div>

<div class="row row-login">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 item-login mt-5 mb-5" >
        <form method="post" action= "">
            <?php
                if($_SESSION['registration']):
            ?>
                <div class="alert alert-<?=$_SESSION['icon']?>" role="alert">
                <?= $_SESSION['registration'] ?>
                </div>
            <?php 
            $_SESSION['registration'] = null;
            endif;
            ?>

            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1" name="id_provider">
                    <option value="">Provider</option>
                    <?php
                    if($select):
                        foreach($select as $key=>$val):
                    ?>
                    <option value="<?=$val['id_provider']?>"><?= $val['name']?></option>

                    <?php 
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1" name="id_ray">
                    <option value="">Ray</option>
                    <?php
                    if($select_ray):
                        foreach($select_ray as $key=>$val):
                    ?>
                    <option value="<?=$val['id_ray']?>"><?= $val['ray']?></option>

                    <?php 
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="bar_code" name="bar_code" placeholder="Enter bar code">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="num" name="num" placeholder="Enter number of pieces">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="name_pieces" name="name_pieces" placeholder="Enter name of piece">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="for_model" name="for_model" placeholder="Enter models of piece">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="price_ht" name="price_ht" placeholder="Enter ht price ">
            </div>
            
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>