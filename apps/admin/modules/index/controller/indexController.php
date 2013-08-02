<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class indexController extends adminController {
    /*
     * @registry object
     */

    public $registry;

//private $time;



    /*
      function __construct($registry) {
      $args = func_get_args();
      call_user_func_array(array($this, 'parent::__construct'), $args);

      //parent::__construct($registry);
      //var_dump($registry);
      //parent::init($registry);
      //parent::$registry = $registry;

      //var_dump($registry);




      }
     */

    /**
     * @all controllers must contain an index method
     */
    function index() {
        //$k = $this->registry;
//$this->template->content = 'blablabla';
        $this->template->initialize();
        $this->template->build('indexView', null, true);
    }

}

?>
