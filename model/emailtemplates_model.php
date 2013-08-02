<?php
/**
 * Class to manage Mysql Nested Set Trees.
 *
 * @author Tobias Breunig <t.breunig@live.de>
 * @license http://www.opensource.org/licenses/bsd-license.html BSD License
 * @version 1.1
 * @copyright 2009 Tobias Breunig
 */
class emailtemplates_model
{
	/**
	 * Database Table Vars
	 *
	 * @var 	array
	 */
	private $params = array ();
	
	/**
	 * Error Messages
	 *
	 * @var array
	 */
	private $errors = array ();
	
	/**
	 * Array with Erros Messages, there are stored in an external File
	 *
	 * @var array
	 */
	public $msg = null;
  
        public $registry;
	
	/**
	 * Constructor set up Vars
	 * 
	 * @param 	object 		$db			Object of mysqli-Connection
	 * @param 	array 		$params		Array with Database-Table Vars
	 * @return 	void
	 */
	 
	public $db;
  
	
  public function __construct ($registry) {
	  $this->registry = $registry;
          $this->db = $this->registry->db;

	}
	
  
  
  public function getAllTemplates($id=null, $ln='pl'){
  if(!empty($id)){
   
  return $this->db->select("SELECT * 
              FROM mvcms_email_templates_translations TT
              WHERE TT.lang = :ln
              AND TT.fk_template_id =:id", array('id'=>$id, 'ln'=>"$ln"));
              
                    
      } else {
      return $this->db->select('SELECT TT.* FROM mvcms_email_templates_translations TT WHERE TT.lang =:ln AND TT.is_default=1', array('ln'=>$ln));
      
      }
  
  }
/*
public function mvcms_adm_GetLocalePages($ln='pl'){
    
  $page['all'] = $this->db->select("SELECT 
              P.id,
              P.name,
              PT.id as PID,
              PT.page_title,
              PT.is_visible,
              PT.date_publish
              FROM mvcms_pages P
              left join mvcms_page_translations PT on P.id = PT.fk_page_id
              WHERE PT.page_ln = :ln", array("ln"=>"{$ln}"));
  //var_dump($page);              
              
  $page['today'] = $this->db->select("SELECT 
              P.id,
              P.name,
              PT.page_title,
              PT.is_visible,
              PT.date_publish
              FROM mvcms_pages P
              left join mvcms_page_translations PT on P.id = PT.fk_page_id
              WHERE PT.page_ln = :ln AND DATE(P.date_insert) = DATE(NOW())", array('ln'=>"$ln"));
 

  return $page; 
}
*/  
public function mvcms_adm_GetTemplateById($id=null){
  if(!empty($id)){
  $template = $this->db->select("select 
                            T.id as id,
                            T.name,
                            T.date_insert, 
                            T.username,
                            T.acl_role,
                            TT.id as TID,
                            TT.fk_template_id,
                            TT.slug,
                            TT.name as templatename,
                            TT.description,
                            TT.subject,
                            TT.body,
                            TT.lang,
                            TT.is_default,
                            TT.module
                            from 
                            mvcms_email_templates T
                            left join mvcms_email_templates_translations TT on T.id = TT.fk_template_id
                            WHERE TT.id = :id", 
                            array('id'=>$id));
  
  
  return $template[0];
  
  }
     return false;
} 
  
 public function mvcms_adm_GetAllMasterEmailTemplates($orderby=null, $order='ASC'){
 try {
    
    ($orderAppend = isset($orderby) ? 'ORDER BY '.$orderby.' '.$order  : 'ORDER BY name ASC');
    
    $pages = $this->db->select("SELECT * from mvcms_email_templates order by :orderby", array('orderby'=>$orderAppend));
    if ($pages) return $pages;
    else return false;
    
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  
  }
  
  public function mvcms_adm_GetAllEmailTemplatesTranslations($pid){
  try {
    $pages = $this->db->select("select * from mvcms_email_templates_translations WHERE fk_template_id = :id", array('id'=>$pid));
    if ($pages) return $pages;
    else return false;
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  }
  /*
  public function mvcms_adm_setVisible($id, $status = 1){
  try {
            
   $ret = $this->db->update("mvcms_page_translations",array('is_visible'=>$status)," `id` = {$id}");
   if ($ret){
       return true;
   } else return false;
  }
  catch (PDOException $e) {
      
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  //return false; 
  
  }
  */
  public function mvcms_adm_setMain($id, $ln){
  try {
    $ret = $this->db->query("update `mvcms_email_templates_translations` set `is_default` = CASE WHEN `id` = :pid THEN 1 ELSE 0 END WHERE `lang` = :ln", array('pid'=>$id, 'ln'=>"{$ln}"));
     if ($ret){
                return true;
            } else return false;
    
  }
  catch (PDOException $e) {
      
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  //return false; 
 }
 /** aktualizacja strony
  * 
  */
 public function mvcms_adm_Update_Template($data){
 
 $data = $data['template'];
 var_dump( $data);
 //$currDate = date('Y-m-d H:i:s');       
 //$acl_role = (!empty($pagedata['page_role_group']) ? implode('|',$pagedata['page_role_group']) : '0');
 
 $_data = array (
     //"name"=>           $data['name'],
     //"date_insert"=>    $currDate,
     //"date_update"=>    $currDate,
     //"username"=>       $pagedata['page_username'],
     //"acl_role"=>       $acl_role,
     //"is_active"=>      $pagedata['page_isactive'],
     //"page_module_options" => serialize($pagedata['menu_locations'])
 ); 
  $t_data = array(
      
     "name"=>             $data['templatename'],
     "description"=>      $data['description'],
     "subject"=>          $data['subject'],
     "body"=>             $data['body']
     );
//print_r($pagedata['page_id']);
 $this->db->beginTransaction();
 /*
 $ret = $this->db->update("mvcms_email_templates",$_data, " `id`= {$data['fk_template_id']}");
 if (!$ret) return false;
 */
 $ret = $this->db->update("mvcms_email_templates_translations",$t_data, " `id`= {$data['id']}");
 if (!$ret) return false;
 $this->db->commit();
 return true;
  
  
 }
 /**
  *dodawanie nowej strony 
  */
 public function mvcms_adm_Add_Template($data){
 
     
 $currDate = date('Y-m-d H:i:s');   
 $acl_role = (!empty($pagedata['page_role_group']) ? implode('|',$pagedata['page_role_group']) : '0');
 $data = $data['template'];
 $_data = array (
     "name"=>           $data['name'],
     "date_insert"=>    $currDate,
     "username"=>       $data['username'],
     "acl_role"=>       $acl_role
     
     
 );
 

 $langs = $this->db->select("SELECT * FROM mvcms_langs");    
 
 $this->db->beginTransaction();
 $this->db->insert("mvcms_email_templates",$_data);
 $_id = $this->db->lastInsertId();
 if($_id){
 $t_data = array(
     "fk_template_id"=>         $_id,
     "slug"=>                   $data['name'],
     "name"=>                   $data['templatename'],
     "description"=>            $data['description'],
     "subject"=>                $data['subject'],
     "is_default"=>             0,
     "body"=>                   $data['body'],
     "lang"=>                   $data['lang'],
     "module"=>                 ''
      );
 
 $ret = $this->db->insert("mvcms_email_templates_translations",$t_data);
 
  
 if (!$ret) return 0;
 $t_id = $this->db->lastInsertId();
 //if ($data['page_isdefault']) $this->mvcms_adm_setMain($pt_id,$pagedata['page_lang']);
 
 if(!empty($data['multi_content'])){
    foreach ($langs as $l){
       if ($l['symbol']!=$data['lang']) {   
           $t_data["lang"]=$l['symbol'];
           $ret = $this->db->insert("mvcms_email_templates_translations",$t_data);
           $t_id = $this->db->lastInsertId();
           //if ($data['page_isdefault']) $this->mvcms_adm_setMain($pt_id,$l['symbol']);
 
           if(!$ret) return 0;
        }
    }
 } 
     
     
 } else return 0;    
 
 
 $ret = $this->db->select("SELECT `fk_template_id`, `id`, `lang` from `mvcms_email_templates_translations` WHERE `fk_template_id`=:_id AND `lang`=:_lang", array("_id"=>$_id,"_lang"=>$data['lang']));
 if (is_array($ret)) 
     $this->db->commit();
 else return 0;
 return $ret[0];
 
 }
 /**
  * kasowanie stron wraz ze wszytkimi wersjami językowymi 
  */
 public function mvcms_adm_DeletePage($id = array()){
    $ids = (is_array($id) ? implode(",", $id) : $id);
    try {
       
    
    $this->db->beginTransaction();
    $ret = $this->db->query("DELETE p.*, pt.* FROM mvcms_pages p, mvcms_page_translations pt WHERE p.id = pt.fk_page_id AND p.id in (:pids) ", array('pids'=>$ids));
     
   
    
    foreach($id as $pid){
    //$sql = "select distinct fk_menu_id, id from mvcms_menu_pages where fk_page_id = $pid;";
    //$stmt = $dbh->query($sql);
    //$menu_ids = $stmt->fetchAll();
    $menu_ids = $this->db->SELECT("select distinct fk_menu_id, id from mvcms_menu_pages where fk_page_id = :pid;", array('pid'=>$pid));
    
    
//if(!is_array($menu_ids))  $menu_ids = array($menu_ids);   
//echo $pid.'<br />';
   
    if ($menu_ids){
        foreach($menu_ids as $mi){
          
          //$this->cms3_admDeleteBranch($mi['fk_menu_id'], $id);
           
           $menu_id = $mi['fk_menu_id'];
           $mpid = $mi['id'];
          
           $this->db->query("LOCK TABLES mvcms_menu_pages AS MP WRITE, mvcms_menu_pages_translations AS MPT WRITE;",null);
           //$dbh->exec($sql);
           
           $this->db->query("SELECT @myLeft := lft, @myRight := rgt, @myWidth := rgt - lft + 1
                  FROM mvcms_menu_pages MP
                  WHERE id= :mpid AND fk_menu_id=:menuid",array('mpid'=>$mpid,'menuid'=>$menu_id));
           //$stmt = $dbh->query($sql);
           //$stmt->execute();
           
           $this->db->query("DELETE MP.*, MPT.* FROM mvcms_menu_pages MP, mvcms_menu_pages_translations MPT 
                  WHERE MP.lft BETWEEN @myLeft AND @myRight AND MP.fk_menu_id=:menuid
                  AND MP.id = MPT.fk_menu_pages_id;", array('menuid'=>$menu_id));
           //$dbh->exec($sql);       
           
           $this->db->query("DELETE MP.* FROM mvcms_menu_pages MP where id = :mpid;",array('mpid'=>$mpid));
           //$dbh->exec($sql);
           $this->db->query("UPDATE  mvcms_menu_pages MP SET rgt = rgt - @myWidth WHERE rgt > @myRight AND  fk_menu_id=:menuid;", array('menuid'=>$menu_id));
           //$dbh->exec($sql);
           $this->db->query("UPDATE  mvcms_menu_pages MP SET lft = lft - @myWidth WHERE lft > @myRight AND  fk_menu_id=:menuid;",array('menuid'=>$menu_id));
           //$dbh->exec($sql);
           $this->db->query("UNLOCK TABLES;",null);
           //$dbh->exec($sql);
          }
      }
    
    }
         
    $this->db->commit();
    if ($ret) return true;
    return false;
    
  }
  catch (PDOException $e) {
       $this->db->rollback();
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  return false;
  }
  
  private function _getOption($option){
  print_r($option);
      $_option = array();
  if (!empty($option)){
    $opt =  explode('|',$option);
    foreach($opt as $o){
    $opt2 = explode('=',$o);
        $_option[$opt2[0]] = $opt2[1];        
        
    }
    return $_option;
     
  }
  return 0;
      
  }
}
?>