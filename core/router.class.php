<?php

class router {

    private $registry;
    private $path;
    public  $args = array();
    public  $file;
    public  $controller;
    public  $module;
    public  $action;
    private $app;

    function __construct($registry) {
        $this->registry = $registry;
        
    
    }
    
    function setPath($path) {
        if (is_dir($path) == false) {
            throw new Exception('Nieprawidłowa ścieżka kontrolera: `' . $path . '`');
        }
        $this->path = $path;
    }
    
    public function loader() {
        $this->getController();
        
        
        
        if (is_readable($this->file) == false) {
            $this->file = $this->registry->basepath . 'core/error.class.php';
            $this->controller = $this->module = 'error';
        }
        include $this->file;
        $class = $this->module . 'Controller';
        $controller = new $class($this->registry);
        
           
        
        if (is_callable(array($controller, $this->action)) == false) {
            //domyślna akcja dla każdego kontrolera dziedziczona po klasie bazowej
            $action = 'index';
            
        } else {
            $action = $this->action;
        }
        // $controller->$module($this->action, $this->args);
        //pluginClass::initialize();
        //pluginClass::hook('onLoad', $this->registry);
        
        
        
        $controller->$action($this->args);
        
        
        
        
    }

    private function getController() {

        //Schemat działań jest nastęujący
        /*
         * 1. sprawdz czy w adresie url jest jawnie pokazany router, modul, i akcja
         *      np. tak: index.php?router=admin&module=Article&action=lista&elem=5
         * 2. sprawdz czy w adresie url podano admin/Article/lista/5 - ten sam adres co powyżej
         * 3. sprawdż jak się zachowuje router gdy w adresie pojawi sie jawna nazwa pliku np admin.php
         *      admin.php/Article/lista/5
         */
        //parametry podano jawnie
        $url = isset($_GET['url']) ? $_GET['url'] : null;
		    $url = rtrim($url, '/');
	     	$url = filter_var($url, FILTER_SANITIZE_URL);
		    $url = explode('/', $url);
        
        $this->app = $this->registry->config['appconstants']['APP_FRONTEND'];
	
        if ($url[0]=='admin'){ 
        $this->app = $this->registry->config['appconstants']['APP_BACKEND'];
        array_shift($url);
        }
               
        $this->get_router_by_slash($url);
        
        if (!$this->module && !$this->controller) {
            $this->controller = 'page';
            $this->module = $this->controller;
        }
        $this->file = $this->path . $this->app . '/modules/' . $this->module . '/controller/' . $this->module . 'Controller.php';
    
        $this->registry->_module = $this->controller;
        $this->registry->_controller = $this->controller;
        $this->registry->_application = $this->app;
     
    
    
     
     }
        /*      
        foreach ($_GET as $key => $value) {
            if ($key == 'rt') {
                $router = $value;
            } elseif ($key == 'module') {
                $this->module = $value;
            } elseif ($key == 'action') {
                $this->action = $value;
            } else {
                $this->args[$key] = $value;
            }
        }
        //ok w scezce nie ma podanych prawidlowych wartosci       
        //interwsuje mnie to co jest za koncowką jest to model i akcja
        //musiz wyodrebnic nazwe kontrolera przyczepiona do php
        //$this->controller = end(explode('/', $parts[0]));
        //np dla aplikacji admin bez podanego modułu i akcji będzie to ścieżka nastęująca: /apps/addmin/module/admin/actions/adminController.php
        //natomiast dla aplikacji admin/Article/view/5 będzie to plik: /apps/admin/module/Article/actions/ArticleController.php z przesaną akcją view oraz tablicą args
        // no i ostatnia mozliwość zroutowanie do kontrolera porzez link /welcome_to_carpet_cleaning.html
        if (!$this->module && $router) {

            if (!$this->get_router_by_php($router)) {
                if (!$this->get_router_by_html($router)) {
                    $this->get_router_by_slash($router);
                }
            }
        }

        if (!$this->module && !$this->controller) {
            $this->controller = 'index';
            $this->module = $this->controller;
        }
        $this->file = $this->path . '/' . $this->controller . '/modules/' . $this->module . '/controller/' . $this->module . 'Controller.php';
    }
    */
    private function get_router_by_slash($url) {
        $parts = $url; 
        
        if (count($parts) >= 1) {
            $this->controller = $parts[0]; //tylko kontroler
            $this->module = $parts[0]; 
            array_shift($parts);
                if (isset($parts[0])) {
                    $this->action = $parts[0]; //akcja
                    array_shift($parts);
                    if(isset($parts)) $this->args = $parts; //parametry
                   
                }
        
        } else {
            $this->controller = 'index';
            $this->module = $this->controller;
        }
        
        //var_dump( $this->controller);
        
    }
    /*
    private function get_router_by_php($router) {

        try {
            $parts = explode('.php', $router);
            //zajmij się częścią przed koncowką php
            //wiem ze kontrolerem jest ostatni wyraz po slashu /
            if (count($parts) > 1) {
                $tmp_php = explode('/', $parts[0]);
                if (count($tmp_php) > 1) {
                    $this->controller = end($tmp_php);
                } else {
                    $this->controller = $parts[0];
                }
                //$this->controller=end($parts[0]);
                //zajmij się czescia po koncowce php
                $parts_php = explode('/', $parts[1]);
                if (count($parts_php) > 1) {
                    //$this->controller = $parts_php[0]; //tylko kontroler

                    if (isset($parts_php[1])) {
                        $this->module = $parts_php[1]; //modul
                        if (isset($parts_php[2])) {
                            $this->action = $parts_php[2]; //akcja
                            if (isset($parts_php[3])) {
                                $this->args['id'] = $parts_php[3]; //parametry inne
                            }
                        }
                    }
                } else {
                    //$this->controller = $parts[0];
                    $this->module = $this->controller;
                }
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    private function get_router_by_html($router) {

        try {
            $parts = explode('.html', $router);
            if (count($parts) > 1) {
                $this->controller = 'index';
                $this->module = 'index';
                $this->action = 'viewArticle';
                $this->router=$router;
                return true;
            }
            else
                return false;
        } catch (Exception $e) {
            return false;
        }
    }
    */
}

?>
