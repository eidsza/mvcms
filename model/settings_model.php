<?php
/**
 * Class to manage Mysql Nested Set Trees.
 *
 * @author Tobias Breunig <t.breunig@live.de>
 * @license http://www.opensource.org/licenses/bsd-license.html BSD License
 * @version 1.1
 * @copyright 2009 Tobias Breunig
 */
class settings_model
{
	
        public $registry;
	
	/**
	 * Constructor set up Vars
	 * 
	 * @param 	object 		$db			Object of mysqli-Connection
	 * @param 	array 		$params		Array with Database-Table Vars
	 * @return 	void
	 */
	 
	public $db;
        protected $vars=array();
        protected $options=array();
  
	
  public function __construct ($registry) {
	  $this->registry = $registry;
          $this->db = $this->registry->db;
  }
	
  
  
  public function getSettings(){
   
  $settings =  $this->db->select("SELECT * FROM mvcms_default_settings");
  
  foreach($settings as $s){
      
      $this->vars[$s['slug']]['title'] = $s['title'];
      $this->vars[$s['slug']]['description'] = $s['description'];
      $this->vars[$s['slug']]['default'] = $s['default'];
      $this->vars[$s['slug']]['value'] = $s['value'];
      $this->vars[$s['slug']]['options'] = $this->_getOption($s['options']);
      $this->vars[$s['slug']]['required'] = $s['is_required'];
      
 }
 return ($this->_arrayToObject($this->vars));
 //return $this->vars;
 }
  
  private function _getOption($option){
  $_option = array();
  if (!empty($option)){
    $opt =  explode('|',$option);
    foreach($opt as $o){
    $opt2 = explode('=',$o);
        $_option[$opt2[0]] = $opt2[1];        
        
    }
    return $_option;
     
  }
  return 0;
      
  }
  
  private function _arrayToObject($array) {
    if(!is_array($array)) {
        return $array;
    }
    
    $object = new stdClass();
    if (is_array($array) && count($array) > 0) {
      foreach ($array as $name=>$value) {
         $name = strtolower(trim($name));
         if (!empty($name)) {
            if ($name=='options') $object->$name = $value;
                else $object->$name = self::_arrayToObject($value);
         }
      }
      return $object; 
    }
    else {
      return FALSE;
    }
}

public function updateSettings($settings){
 foreach($settings as $k=>$v)
 $ret =  $this->db->update('mvcms_default_settings',array("value"=>$v), "`slug`='{$k}'");    
    
 if (!$ret) return false;
 return true;
 
}
  
 
}
?>