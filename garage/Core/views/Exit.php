<div class="row">
    <div class="col-12 p-0">
        <iframe   src= <?= "./Core/app/docs/facture/".$code.".pdf" ?> width="100%" height="1100" >
        </iframe>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <a href="?req=Ext&id_car=<?= $_GET['id'] ?>" class="btn">Exit</a>
    </div>
</div>