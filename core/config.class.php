<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author eidsza
 */
class config {

    //put your code here

    public $registry;
//protected $load;
//private static $instance;

    public $_config;
    public $is_loded = array();
    public $_config_paths = array(APPPATH);
    public static $_instance;

    public function __construct($registry) {
//print_r($registry);  
        $this->registry = $registry;
        //$this->registry->config = array();
        $this->load = new loader($this->registry);
        $this->load->model('settings');
    }

    public static function getInstance($registry) {
        if (!isset(self::$_instance)) {
            self::$_instance = new self($registry);
        }
        return self::$_instance;
    }

    public function load_ini($src, $process_sections = true) {
        $file = $src;

        if (file_exists($file)) {
            $this->_config = parse_ini_file($file, $process_sections);
        }

        $this->registry->config = array_merge((array) $this->registry->config, $this->_config);
    }

    public function load_array($src) {
        $file = $src;
        if (file_exists($file)) {
            require_once($file);
            $this->registry->config = array_merge($this->registry->config, $config);
        }
    }

    public function load_settings() {

        //print_r($this->registry->settings_model->getSettings());

        return $this->registry->settings_model->getSettings();
    }

    function set_item($item, $value, $index = '') {
        if ($index == '') {
            $this->config[$item] = $value;
        } else {
            $this->config[$index][$item] = $value;
        }
    }

    public function item($item, $index = '') {
        if ($index == '') {
            return isset($this->config[$item]) ? $this->config[$item] : FALSE;
        }

        return isset($this->config[$index], $this->config[$index][$item]) ? $this->config[$index][$item] : FALSE;
    }

    public function _assign_to_config($items = array()) {
        if (is_array($items)) {
            foreach ($items as $key => $val) {
                $this->set_item($key, $val);
            }
        }
    }

}

?>
