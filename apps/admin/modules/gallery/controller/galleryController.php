<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class galleryController extends adminController {
    /*
     * @registry object
     */

    public $registry;
    protected $_galleries;
    protected $_gallery;
    protected $_gallery_details = array();
    protected $upload_controller;

//protected $_modulepath;
//protected $template;

    function __construct($registry) {
        parent::__construct($registry);
        $this->registry = $registry;
        $this->load->model('gallery');
        $this->upload_controller = BASEPATH . 'apps/' . $this->registry->_application . $this->_modulepath . '/uploadify/uploadify.php';
        //echo $upload_file; 
        //$this->_modulepath =  '/modules/'.$this->registry->_module;
        //$this->load->model('navigation');
    }

    /**
     * @all controllers must contain an index method
     */
    function index() {

//var_dump($this->registry->mvcmsacl->get_permisions(1,8));
        clearTemplateMessage();
        $this->_get_gallery_data();
        $this->template->initialize();
        $this->template->build('gallerylistView', null, true);
    }

    function addGallery($args) {
        if (!empty($_POST['gallery_name'])) {

            $ret = $this->registry->gallery_model->mvcms_adm_Add_Gallery($_POST);
            if (is_array($ret))
                setTemplateMessage('success', 'Sukces! Galeria została zapisana!');
            else
                setTemplateMessage('error', 'Błąd! Galeria nie została zapisana! Skontaktuj się z Administratorem strony.');
        }

        $this->_get_gallery_data();
        $this->template->initialize();
        $this->template->build('gallerylistView', null, true);
        clearTemplateMessage();
    }

    private function _get_gallery_data() {
        $this->_galleries = $this->registry->gallery_model->mvcms_adm_GetAllMasterGalleries($orderby = null, $order = 'ASC');
        if ($this->_galleries) {
            foreach ($this->_galleries as $gallery) {
                if ($this->registry->gallery_model->mvcms_adm_GetAllGalleryTranslations($gallery['id']))
                    $this->_gallery_details[$gallery['id']] = $this->registry->gallery_model->mvcms_adm_GetAllGalleryTranslations($gallery['id']);
            }
        }
//var_dump($this->_galleries);  
//var_dump($this->_gallery_details);  
        $this->template->galleries = $this->_galleries;
        $this->template->gallery_details = $this->_gallery_details;
    }

    function setVisible($args) {

        if ($ret = $this->registry->gallery_model->mvcms_adm_setVisible($args[1], $args[0]))
            ;
        setTemplateMessage('success', 'Sukces! Status galerii został zmieniony!');

        $this->_get_gallery_data();
        $this->template->initialize();
        $this->template->build('gallerylistView', null, true);
    }

    function setDescription($args) {

        if ($ret = $this->registry->gallery_model->mvcms_adm_setDescription($args[1], $args[0]))
            ;
        setTemplateMessage('success', 'Sukces! Status galerii został zmieniony!');

        $this->_get_gallery_data();
        $this->template->initialize();
        $this->template->build('gallerylistView', null, true);
    }

    function showDescription($args) {

        if ($ret = $this->registry->gallery_model->mvcms_adm_ShowDescription($args[0]))
            ;
        setTemplateMessage('success', 'Sukces! Status galerii został zmieniony!');

        $this->_get_gallery_data();
        $this->template->initialize();
        $this->template->build('gallerylistView', null, true);
    }

    /*
      function setMain($args){
      if($ret = $this->registry->page_model->mvcms_adm_setMain($args[0],$args[1]))
      //$this->template->set('statusmessage','Pomyślnie zmieniono status strony');
      setTemplateMessage('success', 'Pomyślnie zmieniono status strony');
      $this->_get_page_data();
      $this->template->initialize();
      $this->template->build('pagelistView',null, true);

      clearTemplateMessage();
      }
     */

    function deleteGallery($args) {
        var_dump($_POST);
        if (!empty($_POST['delgalleries'])) {
            var_dump($_POST['delgalleries']);
            /*
              if ($this->registry->page_model->mvcms_adm_DeleteGallery($_POST['delgalleries']))
              //$this->template->set('statusmessage','Pomyślnie usunięto strony');
              setTemplateMessage('success','Pomyślnie usunięto galerie');
             */
        } else
        if (!empty($args)) {
            if ($this->registry->page_model->mvcms_adm_DeleteGallerye($args))
            //$this->template->set('statusmessage','Pomyślnie usunięto strony');   
                setTemplateMessage('success', 'Pomyślnie usunięto galerie');
        } else //$this->template->set('statusmessage','Nie wybrałeś żadnej strony do usunięcia!');         
            setTemplateMessage('error', 'Nie wybrałeś żadnej galerii do usunięcia!');

        $this->_get_gallery_data();
        $this->template->initialize();
        $this->template->build('gallerylistView', null, true);
        clearTemplateMessage();
    }

    function editGallery($args) {
        /*
          if (!empty($args[1]))
          {
          if ($this->_gallery=$this->registry->gallery_model->mvcms_adm_GetGalleryById($args[1]))
          {
          //print_r($this->_page);
          //$this->template->set('navigation',$this->registry->navigation_model->mvcms_adm_GetAllMenus());
          //$this->template->set('navigation_blocks',$this->registry->navigation_model->mvcms_adm_GetTemplateBlocks('menu','zwrotpodatku')); //ten

          $this->template->set('gallery',$this->_gallery);
          $this->template->set('action',BASEURL.'admin/gallery/updateGallery/'.$args[0].'/'.$args[1].'/'.$args[2]);
          $this->template->initialize();
          $this->template->build('galleryForm',null, true);
          } else $this->template->set('statusmessage','Galeria o podanym id nie istnieje!');
          } $this->template->set('statusmessage','Galeria o podanym id nie istnieje!');

         */
        $this->template->set('upload_controller', $this->upload_controller);
        $this->template->set('gallery', $this->_gallery);
        $this->template->set('action', BASEURL . 'admin/gallery/updateGallery/' . $args[0] . '/' . $args[1] . '/' . $args[2]);
        //var_dump($this->registry->_module);

        $this->template->addAssetsCSS($this->_modulepath . '/uploadify', 'uploadify.css', 5);
        //$this->template->addAssetsJs($this->_modulepath.'/uploadify','jquery.uploadify.min.js',null);
        //$this->template->addAssetsJs($this->_modulepath.'/uploadify','uploadify.js',null);

        $this->template->initialize();
        $this->template->build('galleryForm', null, true);
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
