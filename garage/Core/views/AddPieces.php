<div class="row row-sepa"></div>
<div class="row row-login">
    <div class="col-lg-4 col-sm-2"></div>
    <div class="col-lg-4 col-sm-8 item-login mt-5 mb-5" >
        <div class="form-group ">
            <select class="form-control" id="select_category" name="" onChange="searchPieces();">
                <option value="">Select category</option>
                <option value="engine">Engine</option>
                <option value="suspension">Suspension</option>
                <option value="brake">Brake</option>
                <option value="bodywork">Bodywork</option>
            </select>
        </div>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>
<div class="row row-sepa"></div>

<div class="row row-login">
    <div class="col-lg-1 col-sm-0"></div>
    <div class="col-lg-10 col-sm-12 item-login mt-5 mb-5" >
        <div class="card-group" id="div-pieces">
        
        </div>
    </div>
    <div class="col-lg-4 col-sm-2"></div>
</div>
<div class="row row-sepa"></div>

<script>

var id_car="<?=  $_GET['id'] ?>";


</script>