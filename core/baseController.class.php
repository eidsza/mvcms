<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class baseController {

/*
 * @registry object
 */
public $registry;

public $load;

public $template;


//protected $load;



public function __construct($registry) {
	$this->registry = $registry;
        $this->load = new Loader($this->registry);
        $this->template = new Template($this->registry);
}

public function index(){}
}
?>
