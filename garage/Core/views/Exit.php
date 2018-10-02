<div class="row row-sepa"></div>

<div class="row row-cancel">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 cancel mt-5 mb-5" >
        <div class="alert alert-success text-center" role="alert">
            <h3>Car is exit</h3> 
            Mark : <?=  $_GET['mark']; ?></p>
            Register number : <?=  $_GET['register_number']; ?></p>
            date : <?=  date('Y-m-d H:m'); ?></p>
            <a href="?req=CarsCustomer&val=<?=  $_GET['val']  ?>"><button class="btn">Return</button></a>

        </div>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>

<div class="row row-sepa"></div>