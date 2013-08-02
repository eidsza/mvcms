<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class navigationController extends adminController {
    /*
     * @registry object
     */

    public $registry;
    public $_navigatins;
    public $_template_navigation;
    public $_pages = array();
    public $_page_details = array();
    private $_current_menu;

//protected $template;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->load->model('navigation');
        $this->load->model('page');
        $this->load->helper('html');
        $this->load->helper('language');
    }

    /**
     * @all controllers must contain an index method
     */
    function index($args) {
        $sess_menu_tab = session::get('current_nav_tab');
        $sess_menu_ln = session::get('current_nav_ln');
        $menu_ln = (!empty($_GET['menu_ln']) ? $_GET['menu_ln'] : (!empty($sess_menu_ln) ? $sess_menu_ln : Session::get('backand_lang')));
        $menu_tab = (isset($_GET['tab']) ? $_GET['tab'] : (isset($sess_menu_tab) ? $sess_menu_tab : 1));

        session::set('current_nav_tab', $menu_tab);
        session::set('current_nav_ln', $menu_ln);


        $this->_current_menu = $this->registry->navigation_model->mvcms_adm_GetAllMenuPages(session::get('current_nav_tab'), session::get('current_nav_ln'));
        //print_r($this->_current_menu);

        $this->_page_links = $this->registry->page_model->mvcms_adm_GetLocalePages(session::get('current_nav_ln'));
        $this->_navigation = $this->registry->navigation_model->mvcms_adm_GetAllMenus();
        $this->_template_navigation_blocks = $this->registry->navigation_model->mvcms_adm_GetTemplateBlocks('menu', $this->registry->config['deftemplates']['FRONTEND']); //ten
        $this->template->set('menu_items', $this->_current_menu);
        $this->template->set('page_links', $this->_page_links);
        $this->template->set('navigation', $this->_navigation);
        $this->template->set('template_navigation_blocks', $this->_template_navigation_blocks);
        $this->template->set('action', BASEURL . 'admin/navigation');
        $this->template->initialize();
        $this->template->build('navigation_view', null, true);


        clearTemplateMessage();
    }

    function update($args) {

        if (!empty($_POST['save_menu'])) {
            if ($_POST['current_nav_id']) {
                //update
                //var_dump($_POST['current_nav_id']);
                //var_dump($_POST['menuitem_data']);
                if ($this->registry->navigation_model->mvcms_adm_UpdateMenu($_POST['menuitem_data']))
                    setTemplateMessage('success', 'Sukces! Menu zostało pomyślnie zaktualizowane');
                else
                    setTemplateMessage('error', 'Błąd! Skontaktuj się z Administratorem strony.');
            }else {
                //add new
                //$_POST['current_nav_id']
                if (!empty($_POST['menuitem_data']['name'])) {
                    if ($this->registry->navigation_model->mvcms_adm_AddMenu($_POST['menuitem_data']['name']))
                        setTemplateMessage('success', 'Sukces! Nowe menu zostało pomyślnie dodane');
                    else
                        setTemplateMessage('error', 'Błąd! Skontaktuj się z Administratorem strony.');
                }
            }

            //header("Location: ".BASEURL.'admin/navigation');
            /*
              $x = $_POST['menuitem_data'];
              var_dump($x);
              var_dump($_POST['current_nav_id']);
             * 
             */
        }

        if (!empty($_POST['add_page'])) {
            $selected = $_POST['page_item'];
            //var_dump($_POST['page_item']);


            foreach ($selected as $page) {
                $page_data = $_POST['page_data'][$page];
                $page_data = array_merge($page_data, array("menuId" => session::get('current_nav_tab'), "menuLn" => session::get('current_nav_ln')));
                $result = true;
                if (!$this->registry->navigation_model->mvcms_adm_insertChildPage($page_data)) {
                    $result = false;
                    break;
                }
            }
            if ($result)
                setTemplateMessage('success', 'Sukces! Strona została pomyślnie dodana do menu');
            else
                setTemplateMessage('error', 'error! Wystąpił błąd z dodaniem strony. Skontaktuj się z administratorem');

            //header("Location: ".BASEURL.'admin/navigation');  
        }

        if (!empty($_POST['save_menu_locations'])) {
            //$x = $_POST['menu_locations'];
            $ret = $this->registry->navigation_model->mvcms_adm_Update_Template_Menu($_POST['menu_locations']);
            if ($ret)
                setTemplateMessage('success', 'Sukces! Strona została pomyślnie dodana do menu');
            else
                setTemplateMessage('error', (!$ret ? "BŁAD! Operacja zakońćzona niepowodzeniem. Skontaktuj się z administratorem systemu." : $ret));
        }

        if (!empty($_POST['delete_menu'])) {
            $x = $_POST['current_nav_id'];
            $ret = $this->registry->navigation_model->mvcms_adm_DeleteMenu($_POST['current_nav_id']);
            if ($ret) {
                session::set('current_nav_tab', 1);
                setTemplateMessage('success', 'Sukces! Menu zostało pomyślnie usunięte');
            } else
                setTemplateMessage('error', 'error! Wystąpił błąd z usunięciem strony. Skontaktuj się z administratorem');
        }
        if (!empty($_POST['add_custom_link'])) {
            //'link_data' array

            $link_data = $_POST['link_data'];
            $link_data = array_merge($link_data, array("menuId" => session::get('current_nav_tab'), "menuLn" => session::get('current_nav_ln')));
            if ($this->registry->navigation_model->mvcms_adm_insertChildPageLink($link_data))
                setTemplateMessage('success', 'Sukces! Link został pomyślnie dodany do menu');
            else
                setTemplateMessage('error', 'error! Wystąpił błąd z dodaniem linku. Skontaktuj się z administratorem');
        }



        header("Location: " . BASEURL . 'admin/navigation');
    }

    public function deleteitem($args) {
//var_dump($args);
        if (!empty($args))
            $ret = $this->registry->navigation_model->mvcms_adm_DeleteBranch($args[0], $args[1]);
        if (true === $ret)
            setTemplateMessage('success', 'Sukces! Pozycja została pomyślnie usunięta z menu');
        else
            setTemplateMessage('error', (!$ret ? "BŁAD! Operacja zakońćzona niepowodzeniem. Skontaktuj się z administratorem systemu." : $ret));

        header("Location: " . BASEURL . 'admin/navigation');
    }

    public function showhide($args) {

        if ($this->registry->navigation_model->mvcms_adm_SwitchVisibility($args[0]))
            setTemplateMessage('success', 'Sukces! Status menu został zmieniony');
        else
            setTemplateMessage('error', 'error! Wystąpił błąd. Skontaktuj się z administratorem');

        header("Location: " . BASEURL . 'admin/navigation');
    }

}

?>
