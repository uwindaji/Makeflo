

<div class="d-none d-lg-block col-lg-4 col-xl-3 ">

</div>

<div class="d-none d-lg-block col-lg-4 col-xl-3 col-menu " >
    <div class="row row-head">
        <div class="col-12 head pt-3 pb-3">
            <span class="">Espace Admin</span>
        </div>
    </div>
    <div class="row row-title">
        <a href="?page=Abonnement" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-tachometer-alt mr-3"></i> abonnement
            </div>
        </a>
    </div>
    <div class="row row-title">
        <a href="?page=SetFactures" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-file-invoice mr-3"></i> ajouter une factures
            </div>
        </a>
    </div>

    <div class="row row-title">
        <a href="?page=SetContract" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-file-signature mr-3"></i> ajouter un contrat
            </div>
        </div>
    <div class="row row-title">
        <a href="?page=MessageA" class="col-12 p-0">
            <div class="col-12 head pt-3 pb-3">
                <i class="fas fa-envelope mr-3"></i> mes messages <span class="badge badge-danger ml-3"><?= $nb_message ?></span>
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
        <nav class="col-12 col-lg-11 navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-sm-start justify-content-lg-end" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-box-open pl-3"></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=ListeAbonnement"><i class="fab fa-blackberry pr-3"></i>Les produits </a>
                        <a class="dropdown-item" href="?page=Abonnement"><i class="fas fa-plus pr-3"></i> Ajouter un produit</a>
                    </div>
                </li>
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-atom pl-3"></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-code-branch pr-3"></i> Les projets </a>
                        <a class="dropdown-item" href="?page=AddProject"><i class="fas fa-plus pr-3"></i> Ajouter un projet</a>
                    </div>
                </li>
                <li class="nav-item  dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope pl-3"><span class="badge badge-danger" style="position:relative; bottom: 10px;"><?= $nb_message ?></span></i>
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=MessageA">Mes messages</a>
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
                        <a class="dropdown-item" ><i class="fas fa-user-circle pr-3"></i> <?= $res_admin[0]['nom']." ".$res_admin[0]['prenom'] ?></a>
                        <a class="dropdown-item" href="#"><i class="fas fa-user-alt pr-3"></i> Mon profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?page=Deconnexion"><i class="fas fa-sign-out-alt pr-3"></i> Déconnexion</a>
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
                        <a class="dropdown-item" href="?page=Register"><i class="fas fa-plus pr-3"></i> Ajouter user</a>
                        <a class="dropdown-item" href="?page=Drop"><i class="fas fa-user-times pr-3"></i> Suprimmer user</a>
                    </div>
                </li>

                <?php
                    endif;
                ?>
                </ul>
            </div>
        </nav>
    </div>