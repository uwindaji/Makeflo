<?php
// name of project Miramis.
// Author :  lakhdar.
// Create in  2018-09-02 at 21:22:48.
// Contact : lakhdar-rouibah@live.fr.
// Web : rouibah.fr

namespace services;
class Injector {


    public function __construct($base){

        $_SESSION['base'] = file_get_contents('./Core/public/base/'.$base.'.twig');
    }

    public function twig($twig){

        ob_clean();
        $inject = file_get_contents('./Core/public/base/'.$twig.'.twig');
        $_SESSION['base'] = str_replace("{{% $twig %}}", $inject, $_SESSION['base']);
        
    }

    public function twig_page($folder, $twig, $page){

        ob_clean();
        $inject = file_get_contents('./Core/public/pages/'.$folder.'/'.$twig);
        $_SESSION['base'] = str_replace("{{% $page %}}", $inject, "{{% Code %}}".$_SESSION['base']);
        
        
    }

    public function twig_code($folder, $twig){

        ob_clean();
        $inject = file_get_contents('./Core/public/pages/'.$folder.'/'.$twig);
        $_SESSION['base'] = str_replace("{{% Code %}}", $inject.'?>', $_SESSION['base']);
        
        
    }





}