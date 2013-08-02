<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class emailtemplatesController extends adminController {
    /*
     * @registry object
     */

    public $registry;
    protected $_etpl_details = array();
    protected $_emailtemplates = array();
    protected $_emailtemplate;

//protected $template;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->load->model('emailtemplates');
        $this->load->helper('language');
        $this->load->helper('html');
        //$this->_categories_combo = $this->registry->emailtemplates_model->mvcms_adm_get_all_category_locale(session::get('backand_lang'));
        //$this->template->set('cats', $this->_categories_combo);
        //$this->template->set('cat_filter', 0);
    }

    /**
     * @all controllers must contain an index method
     */
    function index($args) {
        $act = (!empty($args) ? $args[0] : 0);
        $this->_get_emailtemplates_data($act);
        $this->template->initialize();
        //$this->template->set('cat_filter', $act);
        $this->template->set('action', BASEURL . 'admin/emailtemplates/' . $act);
        $this->template->build('templateslistView', null, true);
        clearTemplateMessage();
    }

    private function _get_emailtemplates_data($act = '') {
        $this->_emailtemplates = $this->registry->emailtemplates_model->mvcms_adm_GetAllMasterEmailTemplates($orderby = null, $order = 'ASC', $act);
        if ($this->_emailtemplates) {
            foreach ($this->_emailtemplates as $etpl) {
                if ($this->registry->emailtemplates_model->mvcms_adm_GetAllEmailTemplatesTranslations($etpl['id']))
                    $this->_etpl_details[$etpl['id']] = $this->registry->emailtemplates_model->mvcms_adm_GetAllEmailTemplatesTranslations($etpl['id']);
            }
        }
        $this->template->emailtemplates = $this->_emailtemplates;
        $this->template->etpl_details = $this->_etpl_details;
    }

    public function deleteTemplate($args) {
        if (!empty($_POST['deltemplates'])) {
            if ($this->registry->emailtemplates_model->mvcms_adm_DeleteTemplate($_POST['deltemplates']))
                setTemplateMessage('success', 'Sukces! Pomyślnie usunięto szablony wiadomosci');
        } else
        if (!empty($args)) {
            if ($this->registry->emailtemplates_model->mvcms_adm_DeleteTemplates($args))
                setTemplateMessage('success', 'Sukces! Pomyślnie usunięto szablony wiadomosci');
        } else
            setTemplateMessage('error', 'Nie wybrałeś żadnegp artykułu do usunięcia!');

        $this->_get_emailtemplates_data();
        $this->template->initialize();
        $this->template->build('templateslistView', null, true);
        clearTemplateMessage();
    }

    function edit($args) {

        if (!empty($args[1])) {
            if ($this->_emailtemplate = $this->registry->emailtemplates_model->mvcms_adm_GetTemplateById($args[1])) {
                //print_r($this->_page);
                $this->template->set('templates', $this->_emailtemplate);
                //$this->template->set('cats', $this->registry->emailtemplates_model->mvcms_adm_get_all_category_locale($args[2]));
                $this->template->set('action', BASEURL . 'admin/emailtemplates/updateTemplate/' . $args[0] . '/' . $args[1] . '/' . $args[2]);
                $this->template->initialize();
                $this->template->build('templateForm', null, true);
            } else
                setTemplateMessage('error', 'Szablon o podanym id nie istnieje!');
        } setTemplateMessage('error', 'Szablon o podanym id nie istnieje!');


        clearTemplateMessage();
    }

    function create($args) {
        //$next_page_id = $this->registry->page_model->mvcms_adm_GetNextPageId();

        $this->template->set('templates', $this->_emailtemplate);
        $this->template->set('action', BASEURL . 'admin/emailtemplates/saveTemplate');
        $this->template->initialize();
        $this->template->build('templateForm', null, true);
        clearTemplateMessage();
    }

    function updateTemplate($args) {

        if (!empty($_POST['template_cancel'])) {
            header("location: " . BASEURL . 'admin/emailtemplates');
        }

        if (!empty($_POST['template_save'])) {
            //var_dump(array_slice($_POST,0,-4));
            if ($this->registry->emailtemplates_model->mvcms_adm_Update_Template(array_slice($_POST, 0, -4)))
                setTemplateMessage('success', 'Sukces! szablon został zapisany!');
            else
                setTemplateMessage('error', 'Błąd! Szablon nie został zapisany! Skontaktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/emailtemplates/edit/' . $args[0] . '/' . $args[1] . '/' . $args[2]);
        }
        if (!empty($_POST['template_save_close'])) {
            if ($this->registry->emailtemplates_model->mvcms_adm_Update_Template(array_slice($_POST, 0, -4)))
                setTemplateMessage('success', 'Sukces! Szablon został zapisany!');
            else
                setTemplateMessage('error', 'Błąd! Szablon nie został zapisany! Skontaktuj się z Administratorem strony.');
            header("location: " . BASEURL . 'admin/emailtemplates');
        }
    }

    function saveTemplate($args) {

        if (!empty($_POST['template_cancel']))
            header("location: " . BASEURL . 'admin/temailtemplates');

        if (!empty($_POST['template_save'])) {
            //print_r($_POST);

            $ret = $this->registry->emailtemplates_model->mvcms_adm_Add_Template(array_slice($_POST, 0, -4));
            if (is_array($ret))
                setTemplateMessage('success', 'Sukces! Szablon został zapisany!');
            else
                setTemplateMessage('error', 'Błąd! Artykuł nie został zapisany! Skontaktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/emailtemplates/editTemplate/' . $ret['fk_template_id'] . '/' . $ret['id'] . '/' . $ret['lang']);
        }
        if (!empty($_POST['template_save_close'])) {
            $ret = $this->registry->emailtemplates_model->mvcms_adm_Add_Template(array_slice($_POST, 0, -4));
            if (is_array($ret))
                setTemplateMessage('success', 'Sukces! Szablon został zapisany!');
            else
                setTemplateMessage('error', 'Błąd! Szablon nie został zapisany! Skontaktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/emailtemplates');
        }
    }

    /*
     * kategorie
     */

    function category($args) {

        /*
         * domyśłnie pokazujemy liste kategorii
         */
        if (empty($args)) {
            $this->_get_categories_data();
            $this->template->initialize();
            $this->template->build('categorylistView', null, true);
            clearTemplateMessage();
        }

        /*
         * jeśli argument setVisible wykoanj aktualizacje
         */
        if (in_array('setVisible', $args)) {
            list($action, $status, $id) = $args;
            if (!empty($id)) {
                if ($ret = $this->registry->emailtemplates_model->mvcms_adm_cat_setVisible($id, $status))
                    setTemplateMessage('success', 'Sukces! Status kategorii został zaktualizowany.');
                else
                    setTemplateMessage('error', 'Błąd! Skontaktuj się z Administratorem strony.');
            } else
                setTemplateMessage('error', 'Błąd! Nie właściwe argumenty. Skontatktuj się z Administratorem strony.');

            header("location: " . BASEURL . 'admin/news/category');
        }

        /*
         * jeśli argument create - pkaż formularz dodawania kategorii
         */

        if (in_array('create', $args)) {
            $this->template->set('category', null);
            $this->template->set('action', BASEURL . 'admin/news/category/save');
            $this->template->initialize();
            $this->template->build('categoryForm', null, true);
        }


        /*
         * jeśli argument update - zaktualizuj kategorię
         */
        if (in_array('update', $args))
            list($action, $id, $tcid, $cln) = $args; {
            if (!empty($_POST['category_cancel'])) {
                header("location: " . BASEURL . 'admin/news/category');
            }

            if (!empty($_POST['category_save'])) {
                //var_dump(array_slice($_POST,0,-4));
                if ($this->registry->emailtemplates_model->mvcms_adm_Update_Category($_POST['category']))
                    setTemplateMessage('success', 'Sukces! Kategoria została zapisana!');
                else
                    setTemplateMessage('error', 'Błąd! Kategoria nie została zapisana! Skontaktuj się z Administratorem strony.');

                header("location: " . BASEURL . 'admin/news/category/edit/' . $id . '/' . $tcid . '/' . $cln);
            }
            if (!empty($_POST['category_save_close'])) {
                if ($this->registry->emailtemplates_model->mvcms_adm_Update_Category($_POST['category']))
                    setTemplateMessage('success', 'Sukces! Kategoria została zapisana!');
                else
                    setTemplateMessage('error', 'Błąd! Katewgoria nie została zapisana! Skontaktuj się z Administratorem strony.');
                header("location: " . BASEURL . 'admin/news/category');
            }
        }

        /*
         * jeśłi argument edit - pokaz formularz edycji wybranej kategorii
         */
        if (in_array('edit', $args)) {
            list($action, $id, $tcid, $cln) = $args;
            if (!empty($id)) {
                if ($this->_category = $this->registry->emailtemplates_model->mvcms_adm_GetCatById($tcid)) {
                    //print_r($this->_page);
                    $this->template->set('category', $this->_category);
                    $this->template->set('action', BASEURL . 'admin/news/category/update/' . $id . '/' . $tcid . '/' . $cln);
                    $this->template->initialize();
                    $this->template->build('categoryForm', null, true);
                } else
                    setTemplateMessage('error', 'Kategoria o podanym id nie istnieje!');
            } setTemplateMessage('error', 'Kategoria o podanym id nie istnieje!');


            clearTemplateMessage();
        }

        /*
         * zapisz dane o kategoriach
         */

        if (in_array('save', $args)) {
            if (!empty($_POST['category_save'])) {
                //print_r($_POST);

                $ret = $this->registry->emailtemplates_model->mvcms_adm_Add_Category($_POST['category']);
                if (is_array($ret))
                    setTemplateMessage('success', 'Sukces! Kategoria została zapisana!');
                else
                    setTemplateMessage('error', 'Błąd! Skontaktuj się z Administratorem strony.');

                header("location: " . BASEURL . 'admin/news/category/edit/' . $ret['fk_news_category_id'] . '/' . $ret['id'] . '/' . $ret['cat_ln']);
            }

            if (!empty($_POST['category_save_close'])) {
                //print_r($_POST);

                $ret = $this->registry->emailtemplates_model->mvcms_adm_Add_Category($_POST['category']);
                if (is_array($ret))
                    setTemplateMessage('success', 'Sukces! Kategoria została zapisana!');
                else
                    setTemplateMessage('error', 'Błąd! Skontaktuj się z Administratorem strony.');

                header("location: " . BASEURL . 'admin/news/category');
            }

            if (!empty($_POST['category_cancel']))
                header("location: " . BASEURL . 'admin/news/cateogry');
        }

        if (in_array('delete', $args)) {

            //var_dump($_POST['delcats']);

            if (!empty($_POST['delcats'])) {

                if ($this->registry->emailtemplates_model->mvcms_adm_DeleteCategory($_POST['delcats']))
                    setTemplateMessage('success', 'Sukces! Pomyślnie usunięto wybrane kategorie');
            } else if (!empty($args[1])) {
                if ($this->registry->emailtemplates_model->mvcms_adm_DeleteCategory((int) $args[1]))
                    setTemplateMessage('success', 'Sukces! Pomyślnie usunięto wybraną kategorię');
            } else
                setTemplateMessage('error', 'Nie wybrałeś żadnej pozycji do usunięcia!');

            header("location: " . BASEURL . 'admin/news/category');
        }
    }

}

?>
