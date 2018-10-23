<div class="row row-body p-lg-5 p-3">
    <div class="col-12 col-lg-8 col-body pl-lg-0">
        <div class="card col-12 pl-lg-0 pb-5" >

            <div class="card-header text-center">
                <h3><b>Login</b></h3>
            </div>
            <div class="card-body">
                    <form method="post" action="?post=register">

                    <?PHP

                        if ($_SESSION['flash']):
                    ?>

                    <div class="alert alert-<?= $_SESSION['icon'];?>" role="alert">
                        <?= $_SESSION['registration']; ?>
                    </div>

                    <?PHP

                    $_SESSION['flash'] = null;
                        endif;
                    ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">nom :</label>
                            <input type="text" class="form-control" id="" name="nom" aria-describedby="emailHelp" placeholder="nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">prenom :</label>
                            <input type="text" class="form-control" id="" name="prenom" aria-describedby="emailHelp" placeholder="prenom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tél :</label>
                            <input type="text" class="form-control" id="" name="tel" aria-describedby="emailHelp" placeholder="Tél">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email :</label>
                            <input type="email" class="form-control" id="" name="mail" aria-describedby="emailHelp" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe :</label>
                            <input type="password" class="form-control" id="" name="password" placeholder="Mot de passe">
                        </div>
                        <div class="d-flex justify-content-lg-end">
                            <button type="submit" class="btn ">Register</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>