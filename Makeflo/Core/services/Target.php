<?php

namespace services;
use services as services;

class Target {

    private $_url;
    private $_slash;

    public function __construct($url){

        $slash = substr_count($url, '/');

        $_SESSION['slash'] = $slash-1;

        if($slash === 2){

            $url = substr($url, 0, -1);

        }else if($slash ==  0){

            $url = '/';
        }

        $this->_url = $url;

        $_SESSION['stat'] = false;
        
    }

    public function getRoot($reqDir, $sendDir, string $admin = null){


        if( $reqDir == $this->_url and $admin == "Login"){
            $_SESSION['base'] = null;  
            $base = new services\Injector('BaseLogin');
            $base->twig_page($sendDir, $sendDir.'.view.twig', 'Login');
            $base->twig_code($sendDir, $sendDir.'.model.php');
            eval('?>'.$_SESSION['base']);
            die();
        }else if( $reqDir == $this->_url and $admin == "Error"){
            $_SESSION['base'] = null;  
            $base = new services\Injector('BaseLogin');
            $base->twig_page($sendDir, $sendDir.'.view.twig', 'Login');
            $base->twig_code($sendDir, $sendDir.'.model.php');
            eval('?>'.$_SESSION['base']);
            die();
        }else if( $reqDir == $this->_url and $admin == "Password"){
            $_SESSION['base'] = null;  
            $base = new services\Injector('BaseLogin');
            $base->twig_page($sendDir, $sendDir.'.view.twig', 'Login');
            $base->twig_code($sendDir, $sendDir.'.model.php');
            eval('?>'.$_SESSION['base']);
            die();
        }else if( $reqDir == $this->_url and $admin === "admin"){
            $_SESSION['base'] = null;  
            $base = new services\Injector('BaseA');
            $base->twig_page('NavA', 'NavA'.'.view.twig', 'NavA');
            $base->twig_code('NavA', 'NavA'.'.model.php');
            $base->twig('HeadNav');
            $base->twig_page($sendDir, $sendDir.'.view.twig', 'super');
            $base->twig_code($sendDir, $sendDir.'.model.php');
            $base->twig_page('WidgetA', 'WidgetA'.'.view.twig', 'WidgetA');
            $base->twig_code('WidgetA', 'WidgetA'.'.model.php');
            eval('?>'.$_SESSION['base']); 
            die();           
        }else if( $reqDir == $this->_url and $admin === "super admin"){
            
            $_SESSION['base'] = null;  
            $base = new services\Injector('BaseA');
            $base->twig_page('NavA', 'NavA'.'.view.twig', 'NavA');
            $base->twig_code('NavA', 'NavA'.'.model.php');
            $base->twig('HeadNavA');
            $base->twig_page($sendDir, $sendDir.'.view.twig', 'Super');
            $base->twig_code($sendDir, $sendDir.'.model.php');
            $base->twig_page('WidgetA', 'WidgetA'.'.view.twig', 'WidgetA');
            $base->twig_code('WidgetA', 'WidgetA'.'.model.php');
            eval('?>'.$_SESSION['base']);  
            die();          
        }
        
        else if( $reqDir == $this->_url and $admin === null){
            
            $_SESSION['base'] = null;  
            $base = new services\Injector('Base');
            $base->twig_page('Nav', 'Nav'.'.view.twig', 'Nav');
            $base->twig_code('Nav', 'Nav'.'.model.php');
            $base->twig('HeadNav');
            $base->twig_page($sendDir, $sendDir.'.view.twig','User');
            $base->twig_code($sendDir, $sendDir.'.model.php');
            $base->twig_page('Widget', 'Widget'.'.view.twig', 'Widget');
            $base->twig_code('Widget', 'Widget'.'.model.php');
            eval('?>'.$_SESSION['base']);
            die();

        }
    }




}