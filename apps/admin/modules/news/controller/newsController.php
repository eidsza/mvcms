<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class newsController extends adminController {

/*
 * @registry object
 */
public $registry;

protected $_newses;

protected $_news;

protected $_news_details = array();

protected $_categories_combo;

protected $_categories;

protected $_category;

protected $_category_details;



//protected $template;

function __construct($registry) {
  parent::__construct($registry);
  $this->registry = $registry;
  $this->load->model('news');
  $this->load->helper('language');
  $this->load->helper('html');
  $this->_categories_combo = $this->registry->news_model->mvcms_adm_get_all_category_locale(session::get('backand_lang'));
  $this->template->set('cats', $this->_categories_combo);
  $this->template->set('cat_filter', 0);
 

}  

/**
 * @all controllers must contain an index method
 */
function index($args){
 
  $act = (!empty($args) ? $args[0] :0); 
 
  $this->_get_news_data($act);
  $this->template->initialize();
  $this->template->set('cat_filter', $act);
  $this->template->set('action', BASEURL.'admin/news/'.$act);
  $this->template->build('newslistView',null, true);
  
clearTemplateMessage(); 
}


private function _get_news_data($act=''){
 $this->_newses = $this->registry->news_model->mvcms_adm_GetAllMasterNews($orderby=null, $order='ASC',$act);
  if ($this->_newses) {
        foreach($this->_newses as $news){
             if ($this->registry->news_model->mvcms_adm_GetAllNewsTranslations($news['id']))
                 $this->_news_details[$news['id']] = $this->registry->news_model->mvcms_adm_GetAllNewsTranslations($news['id']);
            
        }
      
  }
//var_dump($this->_pages);  

$this->template->newses = $this->_newses;
$this->template->news_details = $this->_news_details;          
    
}

private function _get_categories_data(){
$this->_categories = $this->registry->news_model->mvcms_adm_GetAllMasterCategories($orderby=null, $order='ASC');
  if ($this->_categories) {
      
        foreach($this->_categories as $cat){
           
             if ($this->registry->news_model->mvcms_adm_GetAllCategoryTranslations($cat['id']))
                 $this->_category_details[$cat['id']] = $this->registry->news_model->mvcms_adm_GetAllCategoryTranslations($cat['id']);
              //var_dump($this->_category_details);
            
        }
      
  }
//var_dump($this->_pages);  

$this->template->categories = $this->_categories;
$this->template->category_details = $this->_category_details;          
    
}

function setVisible($args){

    if ($ret = $this->registry->news_model->mvcms_adm_setVisible($args[1],$args[0]));
            setTemplateMessage('success','Pomyślnie zmieniono status artykułu');            
   
    $this->_get_news_data();
    $this->template->initialize();
    $this->template->build('newslistView',null, true);

clearTemplateMessage(); 
}

 

 function deleteNews($args){
 
 if (!empty($_POST['delnews']))
 {
 
     if ($this->registry->news_model->mvcms_adm_DeleteNews($_POST['delnews']))
              setTemplateMessage('success','Sukces! Pomyślnie usunięto artykuły');     
 
     
 } else 
 if (!empty($args)) {
    if ($this->registry->news_model->mvcms_adm_DeleteNews($args))    
           setTemplateMessage('success','Sukces! Pomyślnie usunięto artykuł');        
 } 
 
 else   setTemplateMessage('error','Nie wybrałeś żadnegp artykułu do usunięcia!');         
    
    $this->_get_news_data();
    $this->template->initialize();
    $this->template->build('newslistView',null, true);
clearTemplateMessage();  
}

function editNews($args){

    if (!empty($args[1])) 
    {
        if ($this->_news = $this->registry->news_model->mvcms_adm_GeNewsById($args[1]))
        {
            //print_r($this->_page);
            $this->template->set('news',$this->_news);
          //$this->template->set('cats', $this->registry->news_model->mvcms_adm_get_all_category_locale($args[2]));
            $this->template->set('action',BASEURL.'admin/news/updateNews/'.$args[0].'/'.$args[1].'/'.$args[2]);
            $this->template->initialize();
            $this->template->build('newsForm',null, true);
        } else   setTemplateMessage('error','Strona o podanym id nie istnieje!');             
    }   setTemplateMessage('error','Strona o podanym id nie istnieje!');               


clearTemplateMessage();
}

function addNews($args){
            //$next_page_id = $this->registry->page_model->mvcms_adm_GetNextPageId();
            
            $this->template->set('news',$this->_news);
            $this->template->set('action',BASEURL.'admin/news/saveNews');
            $this->template->initialize();
            $this->template->build('newsForm',null, true);
 
 


clearTemplateMessage();
}

function updateNews($args){
     
    if (!empty($_POST['news_cancel'])){ 
        header("location: ".BASEURL.'admin/news');
    }
    
    if (!empty($_POST['news_save'])) {
   //var_dump(array_slice($_POST,0,-4));
        if ($this->registry->news_model->mvcms_adm_Update_News(array_slice($_POST,0,-4)))
            setTemplateMessage('success','Sukces! artykuł został zapisany!');
        else 
            setTemplateMessage('error','Błąd! Artykuł nie został zapisany! Skontaktuj się z Administratorem strony.');
        
        header("location: ".BASEURL.'admin/news/editNews/'.$args[0].'/'.$args[1].'/'.$args[2]);
    }
    if (!empty($_POST['news_save_close'])) {
        if ($this->registry->news_model->mvcms_adm_Update_News(array_slice($_POST,0,-4)))
            setTemplateMessage('success','Sukces! Artykuł został zapisany!');
        else 
            setTemplateMessage('error','Błąd! Artykuł nie został zapisany! Skontaktuj się z Administratorem strony.');
        header("location: ".BASEURL.'admin/news');
    }
    
   
}

function saveNews($args){
     
    if (!empty($_POST['news_cancel'])) 
       header("location: ".BASEURL.'admin/news');
    
    if (!empty($_POST['news_save'])) {
       //print_r($_POST);
  
       $ret = $this->registry->news_model->mvcms_adm_Add_News(array_slice($_POST,0,-4));
       if(is_array($ret))  setTemplateMessage('success','Sukces! Artykuł został zapisany!');
       else setTemplateMessage('error','Błąd! Artykuł nie został zapisany! Skontaktuj się z Administratorem strony.');
       
       header("location: ".BASEURL.'admin/news/editNews/'.$ret['fk_news_id'].'/'.$ret['id'].'/'.$ret['news_ln']);
    }
    if (!empty($_POST['news_save_close'])) {
       $ret = $this->registry->news_model->mvcms_adm_Add_News(array_slice($_POST,0,-4));
       if(is_array($ret))  setTemplateMessage('success','Sukces! Artykuł został zapisany!');
       else setTemplateMessage('error','Błąd! Artykuł nie został zapisany! Skontaktuj się z Administratorem strony.');
       
       header("location: ".BASEURL.'admin/news');
    }
    
   
}
/*
 * kategorie
 */
function category($args){

/* 
 * domyśłnie pokazujemy liste kategorii
 */    
if(empty($args)){
  $this->_get_categories_data();
  $this->template->initialize();
  $this->template->build('categorylistView',null, true);    
clearTemplateMessage();
  
}

/*
 * jeśli argument setVisible wykoanj aktualizacje
 */
if (in_array('setVisible',$args))
{
    list($action, $status, $id) = $args;
    if(!empty($id)){    
            if ($ret = $this->registry->news_model->mvcms_adm_cat_setVisible($id,$status))
                setTemplateMessage('success','Sukces! Status kategorii został zaktualizowany.');
            else setTemplateMessage('error','Błąd! Skontaktuj się z Administratorem strony.');       
    } else  setTemplateMessage('error','Błąd! Nie właściwe argumenty. Skontatktuj się z Administratorem strony.');              

header("location: ".BASEURL.'admin/news/category');    
}

/*
 * jeśli argument create - pkaż formularz dodawania kategorii
 */

if(in_array('create',$args))
{
            $this->template->set('category',null);
            $this->template->set('action',BASEURL.'admin/news/category/save');
            $this->template->initialize();
            $this->template->build('categoryForm',null, true);
}


/*
 * jeśli argument update - zaktualizuj kategorię
 */
if(in_array('update',$args))
list($action, $id, $tcid, $cln) = $args;         
{
     if (!empty($_POST['category_cancel'])){ 
        header("location: ".BASEURL.'admin/news/category');
    }
    
    if (!empty($_POST['category_save'])) {
   //var_dump(array_slice($_POST,0,-4));
        if ($this->registry->news_model->mvcms_adm_Update_Category($_POST['category']))
            setTemplateMessage('success','Sukces! Kategoria została zapisana!');
        else 
            setTemplateMessage('error','Błąd! Kategoria nie została zapisana! Skontaktuj się z Administratorem strony.');
        
        header("location: ".BASEURL.'admin/news/category/edit/'.$id.'/'.$tcid.'/'.$cln);
    }
    if (!empty($_POST['category_save_close'])) {
        if ($this->registry->news_model->mvcms_adm_Update_Category($_POST['category']))
            setTemplateMessage('success','Sukces! Kategoria została zapisana!');
        else 
            setTemplateMessage('error','Błąd! Katewgoria nie została zapisana! Skontaktuj się z Administratorem strony.');
        header("location: ".BASEURL.'admin/news/category');
    }
    
}        

/*
 * jeśłi argument edit - pokaz formularz edycji wybranej kategorii
 */
if(in_array('edit',$args))
{
 list($action, $id, $tcid, $cln) = $args;    
 if (!empty($id)) 
    {
        if ($this->_category = $this->registry->news_model->mvcms_adm_GetCatById($tcid))
        {
            //print_r($this->_page);
            $this->template->set('category',$this->_category);
            $this->template->set('action',BASEURL.'admin/news/category/update/'.$id.'/'.$tcid.'/'.$cln);
            $this->template->initialize();
            $this->template->build('categoryForm',null, true);
        } else   setTemplateMessage('error','Kategoria o podanym id nie istnieje!');             
    }   setTemplateMessage('error','Kategoria o podanym id nie istnieje!');               


clearTemplateMessage();
}        

/*
 * zapisz dane o kategoriach
 */

if(in_array('save',$args))
{
    if (!empty($_POST['category_save'])) {
       //print_r($_POST);
  
       $ret = $this->registry->news_model->mvcms_adm_Add_Category($_POST['category']);
       if(is_array($ret))  setTemplateMessage('success','Sukces! Kategoria została zapisana!');
       else setTemplateMessage('error','Błąd! Skontaktuj się z Administratorem strony.');
       
       header("location: ".BASEURL.'admin/news/category/edit/'.$ret['fk_news_category_id'].'/'.$ret['id'].'/'.$ret['cat_ln']);
    }
    
    if (!empty($_POST['category_save_close'])) {
       //print_r($_POST);
  
       $ret = $this->registry->news_model->mvcms_adm_Add_Category($_POST['category']);
       if(is_array($ret))  setTemplateMessage('success','Sukces! Kategoria została zapisana!');
       else setTemplateMessage('error','Błąd! Skontaktuj się z Administratorem strony.');
       
       header("location: ".BASEURL.'admin/news/category');
    }
    
   if (!empty($_POST['category_cancel'])) 
       header("location: ".BASEURL.'admin/news/cateogry');
    
    
}

if(in_array('delete',$args))
{

 //var_dump($_POST['delcats']);
 
 if (!empty($_POST['delcats']))
 {
 
     if ($this->registry->news_model->mvcms_adm_DeleteCategory($_POST['delcats']))
              setTemplateMessage('success','Sukces! Pomyślnie usunięto wybrane kategorie');     
 
     
 } else if (!empty($args[1])) {
    if ($this->registry->news_model->mvcms_adm_DeleteCategory((int)$args[1]))    
           setTemplateMessage('success','Sukces! Pomyślnie usunięto wybraną kategorię');        
 } else   setTemplateMessage('error','Nie wybrałeś żadnej pozycji do usunięcia!');         

 header("location: ".BASEURL.'admin/news/category'); 
  
}
}
}
?>
