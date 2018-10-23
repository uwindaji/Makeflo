

<div class="d-none d-lg-block col-lg-4 col-xl-3 ">

</div>

<div class="d-none d-lg-block col-lg-4 col-xl-3 col-menu " >
    <div class="row row-head">
        <div class="col-12 head pt-3 pb-3">
            <span class="">Espace client</span>
        </div>
    </div>
    <div class="row row-title">
        <a href="#" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-tachometer-alt mr-3"></i> mes données
            </div>
        </a>
    </div>
    <div class="row row-title">
        <a href="#" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-file-invoice mr-3"></i> mes factures
            </div>
        </a>
    </div>

    <div class="row row-title">
        <a href="#" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-file-signature mr-3"></i> mon contrat
            </div>
        </div>
    <div class="row row-title">
        <a href="#" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-envelope mr-3"></i> mes messages
            </div>
        </a>
    </div>
    <div class="row row-title">
        <a href="#" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-headset mr-3"></i> assistance technique
            </div>
        </a>
    </div>
    <div class="col-12  d-flex justify-content-center logo">
        <img class="" style="max-width: 300px;" src="./ressources/img/logo_makeflo.png"/>
    </div>
</div>

<div class="col-12  col-lg-8 col-xl-9 col-body">
    <div class="row row-nav">
        <nav class="col-xs-12 col-lg-11 navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-start justify-content-lg-end" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope pl-3"></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell pl-3"></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user pl-3"></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><?= $res_admin[0]['nom']." ".$res_admin[0]['prenom'] ?></a>
                        <a class="dropdown-item" href="#">Mon profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Déconnexion</a>
                    </div>
                </li>

                <?php
                    if($su === 'su'):
                ?>
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-plus pl-3"></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=Register">Ajouter</a>
                        <a class="dropdown-item" href="?page=Drop">Suprimmer</a>
                    </div>
                </li>

                <?php
                    endif;
                ?>
                </ul>
            </div>
        </nav>
    </div>
