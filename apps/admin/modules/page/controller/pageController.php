<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class pageController extends adminController {
    /*
     * @registry object
     */

    public $registry;
    protected $_pages;
    protected $_page;
    protected $_page_details = array();

//protected $template;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->load->model('page');
        $this->load->model('navigation');
    }

    /**
     * @all controllers must contain an index method
     */
    function index() {

//var_dump($this->registry->mvcmsacl->get_permisions(1,8));

        $this->_get_page_data();
        $this->template->initialize();
        $this->template->build('pagelistView', null, true);

        clearTemplateMessage();
    }

    private function _get_page_data() {
        $this->_pages = $this->registry->page_model->mvcms_adm_GetAllMasterPages($orderby = null, $order = 'ASC');
        if ($this->_pages) {
            foreach ($this->_pages as $page) {
                if ($this->registry->page_model->mvcms_adm_GetAllPageTranslations($page['id']))
                    $this->_page_details[$page['id']] = $this->registry->page_model->mvcms_adm_GetAllPageTranslations($page['id']);
            }
        }
//var_dump($this->_pages);  
        $this->template->pages = $this->_pages;
        $this->template->page_details = $this->_page_details;
    }

    function setVisible($args) {

        if ($ret = $this->registry->page_model->mvcms_adm_setVisible($args[1], $args[0]))
            ;
        $this->template->set('statusmessage', 'Pomyślnie zmieniono status strony');

        $this->_get_page_data();
        $this->template->initialize();
        $this->template->build('pagelistView', null, true);
    }

    function setMain($args) {
        if ($ret = $this->registry->page_model->mvcms_adm_setMain($args[0], $args[1]))
        //$this->template->set('statusmessage','Pomyślnie zmieniono status strony');            
            setTemplateMessage('success', 'Pomyślnie zmieniono status strony');
        $this->_get_page_data();
        $this->template->initialize();
        $this->template->build('pagelistView', null, true);

        clearTemplateMessage();
    }

    function deletePage($args) {

        if (!empty($_POST['delpages'])) {
            if ($this->registry->page_model->mvcms_adm_DeletePage($_POST['delpages']))
            //$this->template->set('statusmessage','Pomyślnie usunięto strony');     
                setTemplateMessage('success', 'Pomyślnie usunięto strony');
        } else
        if (!empty($args)) {
            if ($this->registry->page_model->mvcms_adm_DeletePage($args))
            //$this->template->set('statusmessage','Pomyślnie usunięto strony');   
                setTemplateMessage('success', 'Pomyślnie usunięto strony');
        } else //$this->template->set('statusmessage','Nie wybrałeś żadnej strony do usunięcia!');         
            setTemplateMessage('error', 'Nie wybrałeś żadnej strony do usunięcia!');

        $this->_get_page_data();
        $this->template->initialize();
        $this->template->build('pagelistView', null, true);
        clearTemplateMessage();
    }

    function editPage($args) {

        if (!empty($args[1])) {
            if ($this->_page = $this->registry->page_model->mvcms_adm_GePageById($args[1])) {
                //print_r($this->_page);
                $this->template->set('navigation', $this->registry->navigation_model->mvcms_adm_GetAllMenus());
                $this->template->set('navigation_blocks', $this->registry->navigation_model->mvcms_adm_GetTemplateBlocks('menu', $this->registry->config['deftemplates']['FRONTEND'])); //ten

                $this->template->set('page', $this->_page);
                $this->template->set('action', BASEURL . 'admin/page/updatePage/' . $args[0] . '/' . $args[1] . '/' . $args[2]);
                $this->template->initialize();
                $this->template->build('pageForm', null, true);
            } else
                $this->template->set('statusmessage', 'Strona o podanym id nie istnieje!');
        } $this->template->set('statusmessage', 'Strona o podanym id nie istnieje!');


        clearTemplateMessage();
    }

    function addPage($args) {
        //$next_page_id = $this->registry->page_model->mvcms_adm_GetNextPageId();

        $this->template->set('page', $this->_page);
        $this->template->set('navigation', $this->registry->navigation_model->mvcms_adm_GetAllMenus());
        $this->template->set('navigation_blocks', $this->registry->navigation_model->mvcms_adm_GetTemplateBlocks('menu', $this->registry->config['deftemplates']['FRONTEND'])); //ten
        $this->template->set('action', BASEURL . 'admin/page/savePage');
        $this->template->initialize();
        $this->template->build('pageForm', null, true);




        clearTemplateMessage();
    }

    function updatePage($args) {

        if (!empty($_POST['page_cancel'])) {
            header("location: " . BASEURL . 'admin/page');
        }

        if (!empty($_POST['page_save'])) {
            if ($this->registry->page_model->mvcms_adm_Update_Page(array_slice($_POST, 0, -4)))
                setTemplateMessage('success', 'Sukces! strona została zapisana!');
            else
                setTemplateMessage('error', 'Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/page/editPage/' . $args[0] . '/' . $args[1] . '/' . $args[2]);
        }
        if (!empty($_POST['page_save_close'])) {
            if ($this->registry->page_model->mvcms_adm_Update_Page(array_slice($_POST, 0, -4)))
                setTemplateMessage('success', 'Sukces! strona została zapisana!');
            else
                setTemplateMessage('error', 'Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');
            header("location: " . BASEURL . 'admin/page');
        }
    }

    function savePage($args) {
//var_dump(serialize($_POST['menu_locations']));   

        if (!empty($_POST['page_cancel']))
            header("location: " . BASEURL . 'admin/page');

        if (!empty($_POST['page_save'])) {
            //print_r($_POST);
            $ret = $this->registry->page_model->mvcms_adm_Add_Page(array_slice($_POST, 0, -4));
            if (is_array($ret))
                setTemplateMessage('success', 'Sukces! strona została zapisana!');
            else
                setTemplateMessage('error', 'Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/page/editPage/' . $ret['fk_page_id'] . '/' . $ret['id'] . '/' . $ret['page_ln']);
        }
        if (!empty($_POST['page_save_close'])) {
            $ret = $this->registry->page_model->mvcms_adm_Add_Page(array_slice($_POST, 0, -4));
            if (is_array($ret))
                setTemplateMessage('success', 'Sukces! strona została zapisana!');
            else
                setTemplateMessage('error', 'Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/page');
        }
    }

}

?>
