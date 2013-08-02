<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class localeController extends baseController {

/*
 * @registry object
 */
protected $registry;

//protected $template;

function __construct($registry) {
	parent::__construct($registry);
  //parent::_load_model('page');
  //$this->registry = $registry;
  //this->template->content = 'To jest strona';
}

/**
 * @all controllers must contain an index method
 */
function index(){

    
}

function set($args = null){
 
    $l = (!empty($args) && in_array($args[0], array('pl', 'de', 'en')) ? $args[0]: substr($this->registry->config['applocale']['APP_DEFAULT_LOCALE'],0,2));
    
   
    //najpierw sprawdz jakie sa zainstalowane jezyki potem ustaw sesje jesli jest taki jezyk jesli nie to ustaw na domyslny
    
    Session::set('ln',"{$l}");
  
  	header('location: '.CURRENT_URL);
  }  

}

?>
