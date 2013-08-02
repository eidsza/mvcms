<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Template {
    public $registry;
    public $vars = array();
    public $assets = array();
    public $headder_assets;
    private $_theme;
    private $_theme_locations = array();
    private $_theme_url;
    //private $_theme_model;
    private $_smarty;
    //private $_view;
    private $_body;
    public $menu = array();
    //private $items = array();
    //private $tplmnu;
    private $load;
    private $_userinfo;

    function __construct($registry) {
        $this->registry = $registry;
        $this->load = new Loader($this->registry);
        $this->_smarty = new SmartyBC();
        $this->setThemeTemplate();
        $this->_load_layout_assets($this->registry->_application . '/themes/' . $this->_theme, array('css', 'js'));
        self::initialize();
    }

    /**
     *
     * @set undefined vars
     *
     * @param string $index
     *
     * @param mixed $value
     *
     * @return void
     *
     */
    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }

    public function __get($index) {
        return $this->vars[$index];
    }

    public function addAssetsCSS($path, $name, $index = null) {
        $file = BASEPATH . 'apps/' . $this->registry->_application . $path . '/css/' . $name;
        if (file_exists($file)) {
            $array_val = ('<link rel="stylesheet" href="' . BASEURL . 'apps/' . $this->registry->_application . $path . '/css/' . $name . '" type="text/css" media="screen">' . "\n");
            if (!is_null($index))
                array_splice($this->assets, $index, 0, $array_val);
            else
                $this->assets[] = '<link rel="stylesheet" href="' . BASEURL . 'apps/' . $this->registry->_application . $path . '/css/' . $name . '" type="text/css" media="screen">' . "\n";
        } else
            echo 'brak pliku';
    }

    public function addAssetsJs($path, $name, $index = null) {
        $file = BASEPATH . 'apps/' . $this->registry->_application . $path . '/js/' . $name;
        if (file_exists($file)) {
            $array_val = ('<script src="' . BASEURL . 'apps/' . $this->registry->_application . $path . '/js/' . $name . '" type="text/javascript"></script>' . "\n");
            if (!is_null($index))
                array_splice($this->assets, $index, 0, $array_val);
            else
                $this->assets[] = '<script src="' . BASEURL . 'apps/' . $this->registry->_application . $path . '/js/' . $name . '" type="text/javascript"></script>' . "\n";
        } else
            echo 'brak pliku';
    }

    public function set($name, $value = NULL) {
        // Lots of things! Set them all
        if (is_array($name) OR is_object($name)) {
            foreach ($name as $item => $value) {
                $this->vars[$item] = $value;
            }
        }
        // Just one thing, set that
        else {
            $this->vars[$name] = $value;
        }
        return $this;
    }

    public function setThemeTemplate() {
        $config = array("theme" => array("frontend" => "agrofarm", "admin" => "mvcms"));
        if ($this->_theme_locations === array()) {
            // Let's use this obvious default
            $this->_theme_locations = array(APPPATH . $this->registry->_application . '/themes/' . $this->_theme);
        }
        foreach ($config as $key => $val) {
            if ($key == 'theme' AND $val != '') {
                $this->set_theme($val[$this->registry->_application]);
                continue;
            }
            $this->{'_' . $key} = $val;
        }
    }

    public function initialize() {
        $this->_module = $this->registry->_module;
        $this->_controller = $this->registry->_controller;
        $this->_userinfo = $this->registry->userinfo;
        $this->set('assets', implode('', $this->assets));
        $this->set('site_title', '');
        $this->set('baseurl', BASEURL);
        $this->set('basepath', BASEPATH);
        $this->set('application', $this->registry->_application);
        $this->set('theme_url', $this->_theme_url);
        $this->set('site_url', BASEURL);
        $this->set('userinfo', $this->_userinfo);
        $this->set('view_path', $this->registry->_application . $this->registry->module . 'view/');
        $this->set('view_url', BASEURL . $this->registry->module . 'view/');
        $this->load->model('theme');
        $this->theme = $this->registry->theme_model->get_current_theme();
        $this->menu = $this->registry->theme_model->get_theme_menu($this->theme);
    }

    /* ustaw temat dla aktywnej aplikacji */

    public function set_theme($theme = NULL) {
        $this->_theme = $theme;
        foreach ($this->_theme_locations as $location) {
            if ($this->_theme AND file_exists($location . $this->_theme)) {
                $this->_theme_path = rtrim($location . $this->_theme . '/');
                $this->_theme_url = rtrim(BASEURL . 'apps/' . $this->registry->_application . '/themes/' . $this->_theme . '/');
                break;
            }
        }
        return $this;
    }

    /* jeśli brak lokalizacji tematów w konfigu */

    public function build($view, $vars, $wrap_layout) {
        is_array($vars) OR $vars = (array) $vars;
        $this->vars = array_merge($this->vars, $vars);
        if (isset($vars['pid'])){ 
            $this->_smarty->assign('pid', $vars['pid']);
        }
        unset($vars);
        $this->set('view_path',BASEPATH . 'apps/' . $this->registry->_application . '/modules/' . $this->registry->_module . '/view/');
        $this->set('view_url',BASEURL . 'apps/' . $this->registry->_application . '/modules/' . $this->registry->_module . '/view/');
        $this->_smarty->assign('vars', $this->vars);
        $this->_smarty->assign('BASEURL', BASEURL);

        //Pobierz widok z pliku tpl. w module
        $path = BASEPATH . 'apps/' . $this->registry->_application . '/modules/' . $this->registry->_module . '/view/' . $view . '.tpl';
        if (file_exists($path) == false) {
            throw new Exception('View not found in ' . $path);
            return false;
        }
        $this->_body = $this->_smarty->fetch($path);
        if ($wrap_layout) {
            $this->_smarty->assign('content', $this->_body);
            $this->_body = $this->display('apps/' . $this->registry->_application . '/themes/' . $this->theme . '/index.tpl');
        }
        echo $this->_body;
    }

    private function display($template) {

        if (file_exists($template) == false) {
            throw new Exception('Template not found in ' . $template);
            return false;
        }
        $this->_smarty->assign('body', $this->_body);
        $this->_smarty->assign('site_title', $this->registry->config['siteconstants']['SITE_TITLE']);
        $this->_assign_template_menu($this->_get_template_menu());
        $this->_smarty->display($template);
    }

    private function _assign_template_menu($t) {
        if (empty($t))
            return;
        foreach ($t as $key => $value) {
            $this->_smarty->assign($key, $value);
        }
    }

    private function _get_template_menu() {
        foreach ($this->menu as $key => $value) {
            $this->_smarty->assign($key, $value);
            $mnu[$key] = $this->_smarty->fetch('apps/frontend/themes/' . $this->theme . '/' . $key . '.tpl');
        }
        if (empty($mnu)) {
            $mnu = null;
        }
        return $mnu;
    }

    private function _load_layout_assets($path, $group = array('css', 'js')) {
        $path = $path . '/';
        foreach ($group as $g) {
            foreach (new DirectoryIterator(BASEPATH . 'apps/' . $path . $g . '/') as $file) {
                if ($file->isFile()) {
                    switch ($g) {
                        case 'css':
                            $this->assets[] = '<link rel="stylesheet" href="' . BASEURL . 'apps/' . $path . 'css/' . $file->getFileName() . '" type="text/css" media="screen">' . "\n";
                            break;
                        case 'js' :
                            $this->assets[] = '<script src="' . BASEURL . 'apps/' . $path . 'js/' . $file->getFileName() . '" type="text/javascript"></script>' . "\n";
                            break;
                    }
                }
            }
        }
    }
}