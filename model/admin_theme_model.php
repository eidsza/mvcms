<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_theme_model{

protected $registry;

protected $db;


protected $theme;
  
  public function __construct($registry){
  $this->registry = $registry;
  $this->db = $this->registry->db;
  }
  
  
  public function get_current_theme(){
  $this->theme = $this->registry->config['deftemplates']['AD_DEFAULT_TEMPLATE'];
  return $this->theme; 
  }

  
  public function get_theme_menu($theme = 'mvcms'){
  
  
  
  
  $thmenu = array(
        "mvcms"=>array( "custom_menu_1"=> array("Home1"=>"http://www.google.pl", "Index1"=>"Index1"))
                        
  );
  
  return $thmenu[$theme];
  
  }  
  
   /*
   public function get_theme_menu($theme = 'default'){
   
    if(!empty($theme)){
  
   $theme_menu_id = $this->db->select("select * from ecms3_template_modules WHERE module_type='menu' AND template_name= :theme", array(':theme'=>$theme));
   $theme_menu_arr = array();
   foreach($theme_menu_id as $template_menu){
    
   $tmp_menu = null;
   $tmp_menu =  $this->get_all_active_menu_pages($template_menu['fk_module_id'], Session::get('ln'));
   $theme_menu_arr[$template_menu['module_id_attr']] =  $tmp_menu;
   }
   return $theme_menu_arr;
   }
  
  }
  */
  

}