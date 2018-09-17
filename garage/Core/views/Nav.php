

<div class="row row-menu">
    <div class=" col-xs-0 col-lg-1"></div>
    <nav class="navbar navbar-expand-lg navbar-light col-xs-12 col-lg-10 ">
        <a class="navbar-brand" href="#"><img class="d-block" src="./img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse lg-d-flex justify-content-end xs-d-block" id="navbarNav">
            <ul class="navbar-nav">   
                <?php if(!$_SESSION['login']):?>
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>  <!-- to do -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Service</a>  <!-- to do -->
                </li>
                <?php endif; ?>

                <?php if($_SESSION['login'][1] == "admin"):?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?req=Register">New Staff</a>
                        <a class="dropdown-item" href="?req=DropStaff">Drop Staff</a> <!-- to do -->
                    </div>
                </li>
                <?php endif; ?>
                <?php if($_SESSION['login'][1] == "admin" || $_SESSION['login'][1] == "staff"):?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Planning
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Period</a>  <!-- to do -->
                        <a class="dropdown-item" href="#">Work place</a>  <!-- to do -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cars
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?req=SearchCustomer">Search customer</a>  <!-- to do -->
                        <a class="dropdown-item" href="#">Revision</a>  <!-- to do -->
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Customer</a>  <!-- to do -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Provider</a>  <!-- to do -->
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pieces
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Promotion</a>  <!-- to do -->
                        <a class="dropdown-item" href="#">Ray</a>  <!-- to do -->
                    </div>
                </li>
                <?php endif; ?>
                <?php if($_SESSION['user']) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        
                        <?=$_SESSION['user']?>
                        
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?req=LogOut">Log out</a>
                    </div>
                </li>
                <?php }else { ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <?php if($_SESSION['loginCustomer']){ ?>
                            <?= $_SESSION['loginCustomer'][1] ?>
                    </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?rec=DeskTopCustomer">My space</a>
                                <a class="dropdown-item" href="?rec=LogOut">log out</a>
                            </div>
                        </li>

                        <?php }else { ?>
                        Connection
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?rec=LoginCustomer">login</a> 
                            <a class="dropdown-item" href="?rec=RegisterCustomer">Register</a>
                        </div>
                    </li>
                        <?php }
                
                    } ?>
            </ul>
        </div>
    </nav>
    <div class=" col-xs-0 col-lg-1"></div>
</div>