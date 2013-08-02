<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class indexController extends baseController {
    /*
     * @registry object
     */

    protected $registry;

//protected $template;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        parent::_load_model('page');
    }

    /**
     * @all controllers must contain an index method
     */
    function index() {

        $page = $this->model->getFullPage($id = null, Session::get('ln'));


        $this->template->page_title = $page[0]['page_title'];
        $this->template->page_precontent = $page[0]['page_precontent'];
        $this->template->page_content = $page[0]['page_content'];
        $this->template->fetch('frontend/', 'modules/index/view/indexView.tpl');
    }

    function show($args) {

        $page = $this->model->getFullPage($args[0], Session::get('ln'));

        if (!empty($page) && is_array($page)) {
            $this->template->page_title = $page[0]['page_title'];
            $this->template->page_precontent = $page[0]['page_precontent'];
            $this->template->page_content = $page[0]['page_content'];
            $this->template->fetch('frontend/', 'modules/index/view/indexView.tpl');
        } else {
            header('location: ' . BASEURL);
        }
    }

}

?>
