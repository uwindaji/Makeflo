<div class="col-xs-0 col-lg-3"></div>
<div class="col-xs-12 col-lg-6 col-addDemarque mt-5">
    <form class="form-addStaff">
        <div class="form-row">
            <div class="form-group col-12 title">
                <img src="./img/logo_e-cone.png" alt=""> <h2>Démarque</h2>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="inputEmail4">Code EAN</label>
                <input type="text" class="form-control" id="code" placeholder="Code EAN">
            </div>
            <div class="form-group col-md-3">
                <label for="inputAddress2">Quantité</label>
                <input type="number" class="form-control" id="qt" placeholder="Quantité">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="inputState">Raison</label><i class="fas fa-pencil-alt" onclick="additemdemarque.init('raison')"></i>
                <select id="raison" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
        </div>
        <div class="div-submit">
            <button id="submit-AddDemarque" class="btn btn-warning">Enregistrer</button>
        </div>
        </form>
</div>
<div class="col-xs-0 col-lg-3"></div>