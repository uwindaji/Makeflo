<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
    <div class="card col-12 pl-lg-0 pb-5" >
        <div class="card-header text-center">
            <b>Charger un fichier</b>
        </div>

        <form method="post" action="" class="mt-5">

            <div class="form-group" >
                <input type="text" class="form-control" id="searchUser" name="mail" aria-describedby="emailHelp" autocomplete="off" placeholder="Chercher  E-mail">
                <div id="dropSelect" class=" alert alert-info mt-3 " role="alert"></div>
            </div>

            <div class="custom-file mb-5">
                <input type="file" class="custom-file-input" id="zip" name = "zip" lang="fr">
                <label class="custom-file-label" for="customFileLang">Sélectionner un fichier zip</label>
            </div>
            <div class="d-flex justify-content-lg-end">
                <button type="submit" class="btn ">Charger</button>
            </div>
        </form>
    </div>

</div>