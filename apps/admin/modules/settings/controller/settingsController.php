<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class settingsController extends adminController {

/*
 * @registry object
 */
public $registry;

protected $_settings=array();

//protected $template;

function __construct($registry) {
  parent::__construct($registry);
  $this->registry = $registry;
  $this->load->model('settings');
  
  
  
}  

/**
 * @all controllers must contain an index method
 */
function index(){


  
  //print_r($this->_settings);
  $this->template->set('settings',$this->config->load_settings());
  $this->template->set('action',BASEURL.'admin/settings/update');
  $this->template->initialize();
  $this->template->build('settingsForm',null, true);
  
  clearTemplateMessage();
}

public function update($args){
 
 if (!empty($_POST['settings_cancel'])) 
       header("location: ".BASEURL.'admin');
    
    
 if (!empty($_POST['settings_save']))
 {
    //print_r(array_slice($_POST,0, -4));    
    if ($ret = $this->registry->settings_model->updateSettings(array_slice($_POST,0, -4)))
    setTemplateMessage('success','Sukces! ustaawienia zostały zapisane!');    
//session::set('statusmessage','Sukces! ustaawienia zostały zapisane!');
    else  setTemplateMessage('error','Błąd! Wystąpił problem z zapisaniem ustawień!');
    header("location: ".BASEURL.'admin/settings');
 }
 
 if (!empty($_POST['settings_save_close']))
 {
    //print_r(array_slice($_POST,0, -4));    
    if($ret = $this->registry->settings_model->updateSettings(array_slice($_POST,0, -4)))
    setTemplateMessage('success','Sukces! ustaawienia zostały zapisane!');
    else  setTemplateMessage('error','Błąd! Wystąpił problem z zapisaniem ustawień!');
    header("location: ".BASEURL.'admin');
 }

    
}



}
?>
