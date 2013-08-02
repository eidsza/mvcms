<?php

Class rejestr {

 /*
 * @the vars array
 * @access private
 */
 private $vars = array();

 private static $instance = false;
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
 public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new class_A();
    }

    return self::$instance;
 }
 
 public function __set($index, $value)
 {
	$this->vars[$index] = $value;
 }

 /**
 *
 * @get variables
 *
 * @param mixed $index
 *
 * @return mixed
 *
 */
 public function __get($index)
 {
	if (isset($this->vars[$index]))
                return $this->vars[$index];
        else return false;
 }

 public function get($index){
     
       return $this->vars[$index];
 }
}

?>
