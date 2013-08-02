<?php
/**
 * Class to manage Mysql Nested Set Trees.
 *
 * @author Tobias Breunig <t.breunig@live.de>
 * @license http://www.opensource.org/licenses/bsd-license.html BSD License
 * @version 1.1
 * @copyright 2009 Tobias Breunig
 */
class page_model
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
	
  
  
  public function getFullPage($id=null, $ln='pl'){
  if(!empty($id)){
   
  return $this->db->select("SELECT * 
              FROM mvcms_page_translations PT
              WHERE PT.page_ln = :ln
              AND PT.is_visible =1
              AND PT.fk_page_id =:id
              AND date_publish <= 'NOW()'", array('id'=>$id, 'ln'=>"$ln"));
              
                    
      } else {
      return $this->db->select('SELECT PT.* FROM mvcms_page_translations PT WHERE PT.page_ln =:ln AND PT.is_visible=1  AND PT.is_main=1 AND date_publish <= NOW();', array('ln'=>$ln));
      
      }
  
  }

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
  
public function mvcms_adm_GePageById($id=null){
  if(!empty($id)){
  $page = $this->db->select("select 
                            P.id as id,
                            P.name,
                            P.date_insert, 
                            P.date_update,
                            P.username,
                            P.acl_role,
                            P.is_active,
                            P.page_module_options,
                            PT.id as PID,
                            PT.fk_page_id,
                            PT.page_title,
                            PT.page_slug,
                            PT.page_ln,
                            PT.is_visible,
                            PT.is_main,
                            PT.date_publish,
                            PT.date_update,
                            PT.page_precontent,
                            PT.page_content,
                            PT.page_meta_title,
                            PT.page_meta_keywords,
                            PT.page_meta_description,
                            PT.page_comments
                            from 
                            mvcms_pages P
                            left join mvcms_page_translations PT on P.id = PT.fk_page_id
                            WHERE PT.id = :id", 
                            array('id'=>$id));
  
  $page[0]["page_roles"] = explode('|',$page[0]['acl_role']);
  return $page[0];
  
  }
     return false;
} 
  
 public function mvcms_adm_GetAllMasterPages($orderby=null, $order='ASC'){
 try {
    
    ($orderAppend = isset($orderby) ? 'ORDER BY '.$orderby.' '.$order  : 'ORDER BY name ASC');
    
    $pages = $this->db->select("SELECT * from mvcms_pages order by :orderby", array('orderby'=>$orderAppend));
    if ($pages) return $pages;
    else return false;
    
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  
  }
  
  public function mvcms_adm_GetAllPageTranslations($pid){
  try {
    $pages = $this->db->select("select * from mvcms_page_translations WHERE fk_page_id = :id", array('id'=>$pid));
    if ($pages) return $pages;
    else return false;
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  }
  
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
  
  public function mvcms_adm_setMain($id, $ln){
  try {
    $ret = $this->db->query("update `mvcms_page_translations` set `is_main` = CASE WHEN `id` = :pid THEN 1 ELSE 0 END WHERE `page_ln` = :ln", array('pid'=>$id, 'ln'=>"{$ln}"));
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
 public function mvcms_adm_Update_Page($pagedata){
 
 $currDate = date('Y-m-d H:i:s');       
 $acl_role = (!empty($pagedata['page_role_group']) ? implode('|',$pagedata['page_role_group']) : '0');
 
 $p_data = array (
     //"name"=>           $pagedata['page_name'],
     //"date_insert"=>    $currDate,
     "date_update"=>    $currDate,
     //"username"=>       $pagedata['page_username'],
     "acl_role"=>       $acl_role,
     "is_active"=>      $pagedata['page_isactive'],
     "page_module_options" => serialize($pagedata['menu_locations'])
 ); 
  $pt_data = array(
      //"page_id"=>                $pagedata['fk_page_id'],
     "page_title"=>             $pagedata['page_title'],
     "page_slug"=>              $pagedata['page_slug'],
     //"page_ln"=>                $pagedata['page_lang'],
     "is_visible"=>             $pagedata['page_status'],
     "is_main"=>                $pagedata['page_isdefault'],
     "date_publish"=>           $pagedata['page_date_publish'],
     "date_update"=>            $currDate,
     "page_precontent"=>        $pagedata['page_precontent'],
     "page_content"=>           $pagedata['page_content'],
     "page_meta_title"=>        $pagedata['page_meta_title'],
     "page_meta_keywords"=>     $pagedata['page_meta_keywords'],
     "page_meta_description"=>  $pagedata['page_meta_description'],
     "page_comments"=>          $pagedata['page_comments']
      );
//print_r($pagedata['page_id']);
 $this->db->beginTransaction();
 $ret = $this->db->update("mvcms_pages",$p_data, " `id`= {$pagedata['fk_page_id']}");
 if (!$ret) return false;
 $ret = $this->db->update("mvcms_page_translations",$pt_data, " `id`= {$pagedata['page_id']}");
 if (!$ret) return false;
 $this->db->commit();
 return true;
  
  
 }
 /**
  *dodawanie nowej strony 
  */
 public function mvcms_adm_Add_Page($pagedata){
 
     
 $currDate = date('Y-m-d H:i:s');   
 $acl_role = (!empty($pagedata['page_role_group']) ? implode('|',$pagedata['page_role_group']) : '0');
 
 $p_data = array (
     "name"=>           $pagedata['page_name'],
     "date_insert"=>    $currDate,
     "date_update"=>    $currDate,
     "username"=>       $pagedata['page_username'],
     "acl_role"=>       $acl_role,
     "is_active"=>      $pagedata['page_isactive'],
     "page_module_options" => serialize($pagedata['menu_locations'])
 );
 

 $langs = $this->db->select("SELECT * FROM mvcms_langs");    
 
 $this->db->beginTransaction();
 $this->db->insert("mvcms_pages",$p_data);
 $page_id = $this->db->lastInsertId();
 if($page_id){
 $pt_data = array(
     "fk_page_id"=>             $page_id,
     "page_title"=>             $pagedata['page_title'],
     "page_slug"=>              $pagedata['page_slug'],
     "page_ln"=>                $pagedata['page_lang'],
     "is_visible"=>             $pagedata['page_status'],
     "is_main"=>                $pagedata['page_isdefault'],
     "date_publish"=>           $pagedata['page_date_publish'],
     "date_update"=>            $currDate,
     "page_precontent"=>        $pagedata['page_precontent'],
     "page_content"=>           $pagedata['page_content'],
     "page_meta_title"=>        $pagedata['page_meta_title'],
     "page_meta_keywords"=>     $pagedata['page_meta_keywords'],
     "page_meta_description"=>  $pagedata['page_meta_description']
      );
 
 $ret = $this->db->insert("mvcms_page_translations",$pt_data);
 
  
 if (!$ret) return 0;
 $pt_id = $this->db->lastInsertId();
 if ($pagedata['page_isdefault']) $this->mvcms_adm_setMain($pt_id,$pagedata['page_lang']);
 
 if(!empty($pagedata['page_multi_content'])){
    foreach ($langs as $l){
       if ($l['symbol']!=$pagedata['page_lang']) {   
           $pt_data["page_ln"]=$l['symbol'];
           $ret = $this->db->insert("mvcms_page_translations",$pt_data);
           $pt_id = $this->db->lastInsertId();
           if ($pagedata['page_isdefault']) $this->mvcms_adm_setMain($pt_id,$l['symbol']);
 
           if(!$ret) return 0;
        }
    }
 } 
     
     
 } else return 0;    
 
 
 $ret = $this->db->select("SELECT `fk_page_id`, `id`, `page_ln` from `mvcms_page_translations` WHERE `fk_page_id`=:page_id AND `page_ln`=:page_ln", array("page_id"=>$page_id,"page_ln"=>$pagedata['page_lang']));
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