<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loader {

protected $registry;

private $libs = array();

private $models = array();

private $helpers = array();


  public function __construct($registry){
  $this->registry = $registry;
 
  }



  public function helpers($helpers, $module){
    	foreach ($helpers as $_helper) $this->helper($_helper, $module);	
  
  }
  
  public function models($models){
    	foreach ($models as $_model) $this->model($_model);	
  
  }
  
  public function libreries($libreries){
    	foreach ($libreries as $_library) $this->library($_library);	
  
  }
  
  public function helper($helper){

  	if (is_array($helper)) return $this->helpers($helper,$module);
		
		if (isset($this->helpers[$helper]))	return;

		list($path, $helper) = self::_find($helper.'_helper','', '/helpers/');

		if ($path === FALSE) return FALSE; 
                require_once($path);
		//$this->registry->helpers[$helper] = TRUE;
    

  }

 
   public function model($model){

  	if (is_array($model)) return $this->models($model);
		
		if (isset($this->models[$model]))	return;

		
    
                list($path, $model) = self::_find($model.'_model','', '/model/');


		if ($path === FALSE) return FALSE; 
                require_once($path);
		$this->models[$model] = TRUE;
    
    
    
    //$this->libs->$model = new $model($this->registry);
    $this->registry->$model = new $model($this->registry); 
    //var_dump($this->registry->$model);
  }
  
  public function library($lib){

   
  	if (is_array($lib)) return $this->libs($lib);
		
		if (isset($this->libs[$lib]))	return;
  
	
    
    list($path, $model) = self::_find($lib,'', '/libs/');
    
   
		if ($path === FALSE) return FALSE; 
    
		
    require_once($path);
		$this->libs[$lib] = TRUE;
    
    $lib = basename($lib);
    //$this->libs->$model = new $model($this->registry);
    $this->registry->$lib = new $lib($this->registry); 
    
    
  }

 
 
 private function _find($filename, $module, $what){
  
  $found = array();
 
  $locations = array( 
           BASEPATH.'apps/modules'.$module.$what.$filename.'.php',
           BASEPATH.'model/'.$filename.'.php',
           BASEPATH.'helpers/'.$filename.'.php',
           BASEPATH.'lib/'.$filename.'.class.php',
           BASEPATH.'lib/'.$filename.'.php'
         
            
  );
  
           
  foreach ($locations as $file) { 
        //var_dump($file);
        if (file_exists($file)) { 
           
            return array($file, $filename);
        } 
  }
  return array (FALSE, $filename); 
  
  }  

   
 
 
  

}

?>