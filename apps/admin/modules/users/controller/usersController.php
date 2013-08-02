<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class usersController extends adminController {

/*
 * @registry object
 */
public $registry;

protected $_users;

protected $_user;





//protected $template;

function __construct($registry) {
  parent::__construct($registry);
  $this->registry = $registry;
  $this->load->model('user');
  $this->_users = $this->registry->user_model->mvcms_adm_get_users();
  
  

}  

/**
 * @all controllers must contain an index method
 */
function index(){
 
  $this->template->initialize();
  $this->template->set('users',$this->_users);
  $this->template->build('userlistView',null, true);
  
clearTemplateMessage(); 
}


function create($userdata = null){
    
    $this->template->set('action',BASEURL.'admin/users/save');
    $this->template->set('settings',$this->config->load_settings());
    $this->template->set('contry_states',$this->registry->user_model->helper_admGetCountryStates());
    $this->template->set('contry_areas',$this->registry->user_model->helper_admGetCountryAreas());
    $this->template->initialize();
    $this->template->build('userCreateForm',null, true);    
   
clearTemplateMessage();    
}

function edit($args){
if (!empty($args)){    
  
$user = $this->registry->user_model->mvcms_adm_get_user_data($args[0]);

if ($user) {    
    $this->template->set('action',BASEURL.'admin/users/update');
    $this->template->set('settings',$this->config->load_settings());
    $this->template->set('contry_states',$this->registry->user_model->helper_admGetCountryStates());
    $this->template->set('contry_areas',$this->registry->user_model->helper_admGetCountryAreas());
    $this->template->set('user',$user);
    $this->template->initialize();
    $this->template->build('userEditForm',null, true);    
}
}    
   
clearTemplateMessage();    
}

public function save($args){

//var_dump($_POST['user']);
$user = $_POST['user'];
$user['law_status']= $_POST['user_status'];

if($this->registry->user_model->usernameTaken($user['username'])){ 
         setTemplateMessage('error','Użytkownik o nazwie '.$user['username'].' jest już zarejestrowany!');   
         header("Location: ". BASEURL."admin/users/create");
         exit();
         
}         
$this->registry->user_model->mvcms_adm_create_user($user);

    
}

public function update(){
//var_dump($_POST);    
if($this->registry->user_model->mvcms_adm_update_user($_POST['user'])){
setTemplateMessage('success','Użytkownik o nazwie "'.$_POST['user']['username'].'" został pomyślnie zaktualizowany');     
} else setTemplateMessage('error','Wystąpił błąd podczas aktualizacji. Skontatkuj się z Administratorem');         

if (!empty($_POST['user_save'])){ 
      header("location: ".BASEURL.'admin/users/edit/'.$_POST['user']['id']);
//exit();
      
}      
if (!empty($_POST['user_save_close'])) 
      header("location: ".BASEURL.'admin/users');
              
}
/*
function setVisible($args){

    if ($ret = $this->registry->page_model->mvcms_adm_setVisible($args[1],$args[0]));
           $this->template->set('statusmessage','Pomyślnie zmieniono status strony');            
   
    $this->_get_page_data();
    $this->template->initialize();
    $this->template->build('pagelistView',null, true);


}

 function setMain($args){
    if($ret = $this->registry->page_model->mvcms_adm_setMain($args[0],$args[1]))
         $this->template->set('statusmessage','Pomyślnie zmieniono status strony');            
    $this->_get_page_data();
    $this->template->initialize();
    $this->template->build('pagelistView',null, true);

clearTemplateMessage();
}

 function deletePage($args){

 if (!empty($_POST['delpages']))
 {
     if ($this->registry->page_model->mvcms_adm_DeletePage($_POST['delpages']))
            $this->template->set('statusmessage','Pomyślnie usunięto strony');     
 
     
 } else 
 if (!empty($args)) {
    if ($this->registry->page_model->mvcms_adm_DeletePage($args))    
         $this->template->set('statusmessage','Pomyślnie usunięto strony');        
 } 
 
 else $this->template->set('statusmessage','Nie wybrałeś żadnej strony do usunięcia!');         
    
    $this->_get_page_data();
    $this->template->initialize();
    $this->template->build('pagelistView',null, true);
clearTemplateMessage();  
}

function editPage($args){

    if (!empty($args[1])) 
    {
        if ($this->_page=$this->registry->page_model->mvcms_adm_GePageById($args[1]))
        {
            //print_r($this->_page);
            $this->template->set('page',$this->_page);
            $this->template->set('action',BASEURL.'admin/page/updatePage/'.$args[0].'/'.$args[1].'/'.$args[2]);
            $this->template->initialize();
            $this->template->build('pageForm',null, true);
        } else $this->template->set('statusmessage','Strona o podanym id nie istnieje!');             
    } $this->template->set('statusmessage','Strona o podanym id nie istnieje!');               


clearTemplateMessage();
}

function addPage($args){
            //$next_page_id = $this->registry->page_model->mvcms_adm_GetNextPageId();
 
            $this->template->set('page',$this->_page);
           
            $this->template->set('action',BASEURL.'admin/page/savePage');
            $this->template->initialize();
            $this->template->build('pageForm',null, true);
 
 


clearTemplateMessage();
}

function updatePage($args){
     
    if (!empty($_POST['page_cancel'])){ 
        header("location: ".BASEURL.'admin/page');
    }
    
    if (!empty($_POST['page_save'])) {
        if ($this->registry->page_model->mvcms_adm_Update_Page(array_slice($_POST,0,-4)))
            setTemplateMessage('success','Sukces! strona została zapisana!');
        else 
            setTemplateMessage('error','Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');
        
        header("location: ".BASEURL.'admin/page/editPage/'.$args[0].'/'.$args[1].'/'.$args[2]);
    }
    if (!empty($_POST['page_save_close'])) {
        if ($this->registry->page_model->mvcms_adm_Update_Page(array_slice($_POST,0,-4)))
            setTemplateMessage('success','Sukces! strona została zapisana!');
        else 
            setTemplateMessage('error','Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');
        header("location: ".BASEURL.'admin/page');
    }
}

function savePage($args){
     
    if (!empty($_POST['page_cancel'])) 
       header("location: ".BASEURL.'admin/page');
    
    if (!empty($_POST['page_save'])) {
       //print_r($_POST);
       $ret = $this->registry->page_model->mvcms_adm_Add_Page(array_slice($_POST,0,-4));
       if(is_array($ret))  setTemplateMessage('success','Sukces! strona została zapisana!');
       else setTemplateMessage('error','Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');
       
       header("location: ".BASEURL.'admin/page/editPage/'.$ret['fk_page_id'].'/'.$ret['id'].'/'.$ret['page_ln']);
    }
    if (!empty($_POST['page_save_close'])) {
       $ret = $this->registry->page_model->mvcms_adm_Add_Page(array_slice($_POST,0,-4));
       if(is_array($ret))  setTemplateMessage('success','Sukces! strona została zapisana!');
       else setTemplateMessage('error','Błąd! Strona nie została zapisana! Skontaktuj się z Administratorem strony.');
       
       header("location: ".BASEURL.'admin/page');
    }
}
*/
function ajax_adm_get_areas($args){
  
$id = (!empty($args[0]) ? $args[0] : 0);

if (!empty($id)){
   $areas =  $this->registry->user_model->helper_admGetCountryAreas($id);
   echo '<option value="-1">-- wybierz powiat --</option>';
   foreach($areas as $k=>$v) echo '<option value="'.$k.'">'.$v.'</option>'."\n";
  }    
    
}

function ajax_check_username($args){

    if($this->registry->user_model->usernameTaken($args[0])) echo "Użytkownik o nazwie $args[0] już istnieje!"; else echo 'success';
    
}
}
?>
