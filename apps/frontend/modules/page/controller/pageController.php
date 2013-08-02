<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class pageController extends baseController {
    /*
     * @registry object
     */

    public $registry;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->load->model('page');
    }

    /**
     * @all controllers must contain an index method
     */
    function index() {
        $page = $this->registry->page_model->getFullPage($id = null, Session::get('ln'));
        $vars = array();
        $vars['page_title'] = $page[0]['page_title'];
        $vars['page_precontent'] = $page[0]['page_precontent'];
        $vars['page_content'] = $page[0]['page_content'];
        $vars['pid']=null;
        
        $this->template->build('pageView', $vars, true);
    }

    function show($args) {
        $page = $this->registry->page_model->getFullPage($args[0], Session::get('ln'));
        if (!empty($page) && is_array($page)) {
            $vars = array();
            $vars['page_title'] = $page[0]['page_title'];
            $vars['page_precontent'] = $page[0]['page_precontent'];
            $vars['page_content'] = $page[0]['page_content'];
            $vars['pid']=$args[0];
            //pobrać menu dla tej strony i przypisać w zmiennych w szablonie ( tabela mvcms_pages; pole page_module_options
            $this->template->build('pageView', $vars, true);
        } else {
            header('location: ' . BASEURL);
        }
    }

}
