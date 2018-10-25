<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
        <div class="card col-12 pl-lg-0 pb-5" >

            <div class="card-header text-center">
                <b>Ajouter un Produit</b>
            </div>
            <div class="card-body p-0 pt-3">
                    <form method="post" action="" enctype="multipart/form-data">

                    <?PHP

                        if ($_SESSION['flash']):
                    ?>

                    <div class="alert alert-<?= $_SESSION['icon'];?>" role="alert">
                        <?= $_SESSION['flash']; ?>
                    </div>

                    <?PHP

                    $_SESSION['flash'] = null;
                        endif;
                    ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom produit:</label>
                            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description :</label>
                            <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp" placeholder="Description">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prix :</label>
                            <input type="text" class="form-control" id="prix" name="prix" aria-describedby="emailHelp" placeholder="Prix">
                        </div>
                        <div class="custom-file mb-5">
                            <input type="file" class="custom-file-input" id="img" name = "img" lang="fr">
                            <label class="custom-file-label" for="customFileLang">Sélectionner une image</label>
                        </div>
                        <div class="d-flex justify-content-lg-end">
                            <button type="submit" class="btn ">Abonner</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>