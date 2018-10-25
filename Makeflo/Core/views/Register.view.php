<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
        <div class="card col-12 pl-lg-0 pb-5" >

            <div class="card-header text-center">
                <b>Ajouter</b>
            </div>
            <div class="card-body p-0 pt-3">
                    <form method="post" action="">

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
                            <label for="exampleFormControlSelect1">Privilège</label>
                            <select class="form-control" id="type" name="type">
                                <option value="">Choisir un privilège</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">prenom :</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp" placeholder="prenom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tél :</label>
                            <input type="text" class="form-control" id="tel" name="tel" aria-describedby="emailHelp" placeholder="Tél">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email :</label>
                            <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                        </div>
                        <div class="d-flex justify-content-lg-end">
                            <button type="submit" class="btn ">Register</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>