<?php

include "registry.class.php";

$reg = new Registry;

class bazowy{

  protected $reg;
  protected $vars;
  public $baz; 

    public function __construct($reg){
    $this->reg = $reg;
    $this->load = new load($reg);  
    $this->load->laduj('tescik');
    
    
    var_dump($this->reg->tescik);
    
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
	return $this->vars[$index];
 }



}



class load {

    protected $controller;    

    public function __construct($controller){
    $this->controller =  $controller;  
   
    }
    
    public function laduj($model){
    $this->controller->$model = new $model( $this->controller);
    }    
}


class tescik{

    public function __construct(){
    echo 'jestem';
    
    }
}

$t = new bazowy($reg);


?>