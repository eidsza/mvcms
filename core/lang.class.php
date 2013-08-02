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

class lang {
    //put your code here
    
protected $registry;
//protected $load;
//private static $instance;

public $_lang;

protected $_supported_langs;

public $supported_langs;

//public $is_loded = array();

//public $_lang_paths  =array(APPPATH);


public function __construct($registry) {
  $this->registry = $registry;
  $this->load = new loader($this->registry);
  $this->load->helper('error');
  $this->load->helper('language');
  
  
 
}


public function load($lng){
$this->supported_langs = get_avaliable_langs($this->registry);
$this->_supported_langs = $this->registry->config['supported_languages'];    

if (array_key_exists($lng, $this->_supported_langs)){
if (self::_find($lng, $this->registry->_module)){
    foreach (self::_find($lng, $this->registry->_module) as $ln){
    if (file_exists($ln)) require_once($ln);
    $this->_lang = array_merge((array)$this->_lang, $lang);
    $this->registry->lang = array_merge((array)$this->registry->lang, $lang);
    
    unset($lang);
    }
    
}
}
/*
if (file_exists($file))
                {
                $this->registy = parse_ini_file($file,$process_sections);
                }
*/    
}

private function _find($lang, $module){
$lang_folder = $this->registry->config['supported_languages'][$lang]['folder'];  
$found = array();
 
  $locations = array( 
           APPPATH.$this->registry->_application.'/modules/'.$module.'/language/'.$lang_folder.'/',
           APPPATH.$this->registry->_application.'/language/'.$lang_folder.'/'
  );
  
  
           
  foreach ($locations as $dir) { 
     //try{ 
      foreach (new DirectoryIterator($dir) as $file) {
        if ($file->isFile()) { 
          //echo $dir.$file->getFileName();
          $found[] = $dir.$file->getFileName();
          
        }
      } 
          
      //} catch (Exception $e) 
        //{  setTemplateMessage('error', 'KOMUNIKAT! Nie znalazłem tłumaczenia dla tego języka'); return false;}    
  }
  return $found;
  }


public function translate($line){
	$translation = ($line == '' OR !isset($this->_lang[$line])) ? FALSE : $this->_lang[$line];
	if ($translation === FALSE)
            setTemplateMessage('error', 'Nie znalazłem tłumaczenia dla tej linii: "'.$line.'"');
        return $translation;    
    
}
}
?>
