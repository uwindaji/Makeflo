<div class="col-0 col-lg-4"></div>
<div class="col-12 col-lg-4 mt-5 col-login">
    <div class="card ">
        <div class="card-header text-center">
            <h3><b>Login</b></h3>
        </div>
        <div class="card-body">

        <?PHP
            if($_SESSION['register'] === 'register'){

        ?>

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


        <?php
            }else if($_SESSION['register'] === null){

        ?>
            <form  method="post" action="">
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
                    <label for="exampleInputEmail1">Email :</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="d-flex justify-content-lg-end">
                    <button type="submit" class="btn ">Login</button>
                </div>
            </form>
        <?php
            }

            ?>
        </div>
    </div>
</div>
<div class="col-0 col-lg-4"></div>


