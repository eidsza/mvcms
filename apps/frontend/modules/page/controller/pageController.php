<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class pageController extends baseController {

/*
 * @registry object
 */
public $registry;





//protected $template;

  function __construct($registry) {
  parent::__construct($registry)	;
  $this->registry = $registry;  
  $this->load->model('page');
  

  
  //$this->load->helper(array('my','my_2'),'page');
  
  //$this->registry = $registry;
  //this->template->content = 'To jest strona';
  
}

/**
 * @all controllers must contain an index method
 */
function index(){
  //$this->load->model('page'); 

  $page = $this->registry->page_model->getFullPage($id = null, Session::get('ln'));
    
  $this->template->page_title = $page[0]['page_title'];
  $this->template->page_precontent = $page[0]['page_precontent'];
  $this->template->page_content = $page[0]['page_content'];
  $this->template->build('pageView',null, true);
  
 //echo 'sfdg';  
}

function show($args){
 
  $page = $this->registry->page_m->getFullPage($args[0], Session::get('ln'));
  
  if (!empty($page) && is_array($page)){
  $this->template->page_title = $page[0]['page_title'];
  $this->template->page_precontent = $page[0]['page_precontent'];
  $this->template->page_content = $page[0]['page_content'];
  $this->template->build('pageView',null, true);
  } else {
  	header('location: '.BASEURL);
  }  
}
}

?>
