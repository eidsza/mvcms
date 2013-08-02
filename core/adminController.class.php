<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class adminController {

/*
 * @registry object
 */
public $registry;
public $load;
public $config;
public $lang;
public $_modulepath;
public $theme;

private $supported_langs;
private $acl;






public function __construct($registry) {
  $this->registry = $registry;
  $this->load = new Loader($registry);
  $this->config = new config($registry);
  $this->lang = new lang($registry);  
  $this->lang->load(Session::get('backand_lang'));
  $this->_modulepath =  '/modules/'.$this->registry->_module;
  $this->load->model('user');
  $this->load->helper('error');
  $this->load->library('mvcmsacl');
  $this->supported_langs = $this->lang->supported_langs;
  $this->_user_roles = $this->registry->user_model->getUserRoles();
  $this->template =  new Template($this->registry);
  $this->registry->theme = 'mvcms';//$this->registry->theme_model->get_current_theme();
  
  if (!self::_check_access()) 
  {
     
     header("location:".BASEURL."admin/login");
     exit;
  }
  
  
  //var_dump($this->registry->mvcmsacl->can_access('Administrator',1));
  $this->template->set('supported_langs',$this->supported_langs);
  $this->template->set('lang',$this->lang->_lang);
  $this->template->set('user_roles',$this->_user_roles);
  $this->template->set("userinfo",$this->registry->userinfo);
  
  //var_dump($this->registry->mvcmsacl->has_access(1,8));
  
  $this->template->initialize();
}
private function _check_access()
	{
		
    //$this->registry->logged_in = true; 
    
    //print_r($this->registry->logged_in);
    return $this->checkLogin();
    
    /* 
    
    // These pages get past permission checks
		$ignored_pages = array('admin/login', 'admin/logout', 'admin/help');

		// Check if the current page is to be ignored
		$current_page = $this->registry->_controller;
		//print_r($current_page);

		// Dont need to log in, this is an open page
		if (in_array($current_page, $ignored_pages))
		{
			return TRUE;
		}
		else if ( ! $this->current_user)
		{
			//redirect('admin/login');
			return false;
		}

		// Admins can go straight in
		/*
    else if ($this->current_user->group === 'admin')
		{
			return TRUE;
		}
    */
		// Well they at least better have permissions!
		

		// god knows what this is... erm...
		return FALSE;
	}
	
	function checkLogin(){
        if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])){
         $this->registry->username = $_SESSION['username'] = $_COOKIE['cookname'];
         $this->registry->userid   = $_SESSION['userid']   = $_COOKIE['cookid'];
      
      
      }
      
      
      
      
       if(isset($_SESSION['username']) && isset($_SESSION['userid']) &&
         $_SESSION['username'] != 'GUEST_NAME'){
         /* Confirm that username and userid are valid */
         if($this->registry->user_model->confirmUserID($_SESSION['username'], $_SESSION['userid']) != 0){
            /* Variables are incorrect, user not logged in */
            unset($_SESSION['username']);
            unset($_SESSION['userid']);
            return false;
         }
         
         /* User is logged in, set class variables */
         
         
         
         $this->registry->userinfo  = $this->registry->user_model->getUserInfo($_SESSION['username']);
         $this->registry->username  = $this->registry->userinfo['username'];
         $this->registry->userid    = $this->registry->userinfo['userid'];
         $this->registry->userlevel = $this->registry->userinfo['userlevel'];
         
        // $this->template->registry = &$this->registry;
         return true;
      }
      /* User not logged in */
      else{
         return false;
      }
  
  
  }
}
?>
