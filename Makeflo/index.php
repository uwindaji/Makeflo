<?php
ob_start();
session_start();
// name of project Makeflo.
// Script create by Lakhdar.
// Contact: lakhdar-rouibah@live.fr.
// Web : rouibah.fr


require_once "./Core/default/Init.php";
require_once "./Core/app/Autoload.php";
require_once "./Core/app/controlers/Controler.php";
// require the head
require_once "./Core/default/Head.view.php";// require the head
    

    

    

    
 if($_SESSION['login']['type'] === 'admin' || $_SESSION['login']['type'] === 'super admin'){    
    
    require_once "./Core/models/NavA.model.php";
    require_once "./Core/views/NavA.view.php";
    require_once "./Core/default/HeadNavA.view.php";
    require_once './Core/app/console/RootAdmin.php';
    require_once "./Core/views/WidgetA.view.php";
    require_once "./Core/default/EndBody.view.php";

}else if($_SESSION['login']['type'] === 'user'){    
    
        require_once "./Core/models/Nav.model.php";
        require_once "./Core/views/Nav.view.php";
        require_once "./Core/default/HeadNav.view.php";
        require_once './Core/app/console/RootUser.php';
        require_once "./Core/views/Widget.view.php";
        require_once "./Core/default/EndBody.view.php";
    
}else  {

    require_once ('Core/app/console/Default.php');
}


require_once "./Core/default/Footer.view.php";