<div class="row row-home ">
        <div class="col-lg-4 col-sm-2"></div>
        <div class=" col-lg-4 col-sm-8 mt-5 mb-5">
            <img class="d-block w-100" src="./img/logo.png">
        </div>
        <div class="col-lg-4 col-sm-2"></div>

</div>

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
                <input type="text" class="form-control" id="mend" name="mend" placeholder="Enter mend">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
            </div>
            <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>