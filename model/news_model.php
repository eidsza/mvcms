<?php
/**
 * Class to manage Mysql Nested Set Trees.
 *
 * @author Tobias Breunig <t.breunig@live.de>
 * @license http://www.opensource.org/licenses/bsd-license.html BSD License
 * @version 1.1
 * @copyright 2009 Tobias Breunig
 */
class news_model
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
	
  
  /*
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
*/
public function mvcms_adm_GetLocaleNews($ln='pl'){
    
  $news = $this->db->select("SELECT 
              N.id,
              N.name,
              NT.news_title,
              NT.is_visible,
              NT.date_publish
              FROM mvcms_news N
              left join mvcms_news_translations NT on N.id = NT.fk_news_id
              WHERE NT.news_ln = :ln", array('ln'=>"$ln"));
  
 return $news; 
}
  
public function mvcms_adm_GeNewsById($id=null){
  if(!empty($id)){
  $news = $this->db->select("select 
                            N.id as id,
                            N.name,
                            N.date_insert, 
                            N.username,
                            N.acl_role,
                            NT.id as NID,
                            NT.fk_news_id,
                            NT.fk_category_id,
                            NT.news_title,
                            NT.news_slug,
                            NT.news_ln,
                            NT.is_visible,
                            NT.date_publish,
                            NT.date_update,
                            NT.news_precontent,
                            NT.news_content,
                            NT.news_meta_keywords,
                            NT.news_comments
                            from 
                            mvcms_news N
                            left join mvcms_news_translations NT on N.id = NT.fk_news_id
                            WHERE NT.id = :id", 
                            array('id'=>$id));
  
  $news[0]["news_roles"] = explode('|',$news[0]['acl_role']);
  return $news[0];
  
  }
     return false;
} 
  
 public function mvcms_adm_GetAllMasterNews($orderby=null, $order='ASC', $category = 0){
 try {
    $where = ($category!=0 ? 'WHERE `NT`.`fk_category_id`='.$category : '');
     
    ($orderAppend = isset($orderby) ? 'ORDER BY '.$orderby.' '.$order  : 'ORDER BY name ASC');
    
    $news = $this->db->select("SELECT DISTINCT N.* from mvcms_news N left join mvcms_news_translations NT on N.id=NT.fk_news_id $where order by :orderby", array('orderby'=>$orderAppend));
    if ($news) return $news;
    else return false;
    
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  
  }
  
  public function mvcms_adm_GetAllNewsTranslations($pid){
  try {
    $news = $this->db->select("select NT.*, 
                      (select CONCAT(category_title, ' [ ' , fk_news_category_id , ' ]') from mvcms_news_category_translations NCT WHERE NCT.fk_news_category_id = NT.fk_category_id AND NT.news_ln=NCT.cat_ln) as category_title
                    from mvcms_news_translations NT WHERE NT.fk_news_id = :id", array('id'=>$pid));
    if ($news) return $news;
    else return false;
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  }
  
  public function mvcms_adm_setVisible($id, $status = 1){
  try {
            
   $ret = $this->db->update("mvcms_news_translations",array('is_visible'=>$status)," `id` = {$id}");
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
 public function mvcms_adm_Update_News($newsdata){
 
 $currDate = date('Y-m-d H:i:s');       
 $acl_role = (!empty($newsdata['news_role_group']) ? implode('|',$newsdata['news_role_group']) : '0');
 
 $n_data = array (
     //"name"=>           $pagedata['page_name'],
     //"date_insert"=>    $currDate,
     //"date_update"=>    $currDate,
     //"username"=>       $pagedata['page_username'],
     "acl_role"=>       $acl_role

 ); 
  $nt_data = array(
      //"page_id"=>                $pagedata['fk_page_id'],
     "fk_category_id"=>         (int)$newsdata['news_category_id'], 
     "news_title"=>             $newsdata['news_title'],
     "news_slug"=>              $newsdata['news_slug'],
     //"page_ln"=>                $pagedata['page_lang'],
     "is_visible"=>             $newsdata['news_status'],
     "date_publish"=>           $newsdata['news_date_publish'],
     "date_update"=>            $currDate,
     "news_precontent"=>        $newsdata['news_precontent'],
     "news_content"=>           $newsdata['news_content'],
     "news_meta_keywords"=>     $newsdata['news_meta_keywords'],
     "news_comments"=>          (!empty($newsdata['news_comments']) ? 1:0)
      );
//print_r($pagedata['page_id']);
 $this->db->beginTransaction();
 $ret = $this->db->update("mvcms_news",$n_data, " `id`= {$newsdata['fk_news_id']}");
 if (!$ret) return false;
 $ret = $this->db->update("mvcms_news_translations",$nt_data, " `id`= {$newsdata['news_id']}");
 if (!$ret) return false;
 $this->db->commit();
 return true;
  
  
 }
 /**
  *dodawanie nowej strony 
  */
 public function mvcms_adm_Add_News($newsdata){
 

 $currDate = date('Y-m-d H:i:s');   
 $acl_role = (!empty($newsdata['news_role_group']) ? implode('|',$newsdata['news_role_group']) : '0');
 $n_data = array (
     "name"=>           $newsdata['news_name'],
     "date_insert"=>    $currDate,
     "username"=>       $newsdata['news_username'],
     "acl_role"=>       $acl_role
    
 );
 

 $langs = $this->db->select("SELECT * FROM mvcms_langs");    
 
 $this->db->beginTransaction();
 $this->db->insert("mvcms_news",$n_data);
 $news_id = $this->db->lastInsertId();

 if($news_id){
 $nt_data = array(
     "fk_news_id"=>             (int)$news_id,
     "fk_category_id"=>         (int)$newsdata['news_category_id'],
     "news_title"=>             $newsdata['news_title'],
     "news_slug"=>              $newsdata['news_slug'],
     "news_ln"=>                $newsdata['news_lang'],
     "is_visible"=>             $newsdata['news_status'],
     "date_publish"=>           $newsdata['news_date_publish'],
     "date_update"=>            $currDate,
     "news_precontent"=>        $newsdata['news_precontent'],
     "news_content"=>           $newsdata['news_content'],
     "news_meta_keywords"=>     $newsdata['news_meta_keywords']
     
      );

 $ret = $this->db->insert("mvcms_news_translations",$nt_data);
 
  
 if (!$ret) return 0;
 $nt_id = $this->db->lastInsertId();
 
 
 if(!empty($newsdata['news_multi_content'])){
    foreach ($langs as $l){
       if ($l['symbol']!=$newsdata['news_lang']) {   
           $nt_data["news_ln"]=$l['symbol'];
           $ret = $this->db->insert("mvcms_news_translations",$nt_data);
           $nt_id = $this->db->lastInsertId();
           
           if(!$ret) return 0;
        }
    }
 } 
     
     
 } else return 0;    
 
 
 $ret = $this->db->select("SELECT `fk_news_id`, `id`, `news_ln` from `mvcms_news_translations` WHERE `fk_news_id`=:news_id AND `news_ln`=:news_ln", array("news_id"=>$news_id,"news_ln"=>$newsdata['news_lang']));
 if (is_array($ret)) 
     $this->db->commit();
 else return 0;
 return $ret[0];
 
 }
 /**
  * kasowanie stron wraz ze wszytkimi wersjami językowymi 
  */
 public function mvcms_adm_DeleteNews($id = array()){
    $ids = (is_array($id) ? implode(",", $id) : $id);
  
    try {
    $this->db->beginTransaction();
    $ret = $this->db->query("DELETE `n`.*, `nt`.* FROM `mvcms_news` `n`, `mvcms_news_translations` `nt` WHERE `n`.`id` = `nt`.`fk_news_id` AND `n`.`id` in ({$ids}) ", null);
          
    //$this->db->commit();
    if ($ret) return true;
    return false;
    
  }
  catch (PDOException $e) {
      
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
}
  /* kategorie 
   * pobranie danych o kategorii 
   */



public function mvcms_adm_GetCatById($id=null){
  if(!empty($id)){
  $cat = $this->db->select("select 
                            C.id as id,
                            C.name,
                            C.date_insert, 
                            C.username,
                            C.acl_role,
                            CT.id as CID,
                            CT.fk_news_category_id,
                            CT.category_title,
                            CT.cat_ln,
                            CT.is_visible,
                            CT.date_publish,
                            CT.date_update,
                            CT.category_description                           
                            from 
                            mvcms_news_category C
                            left join mvcms_news_category_translations CT on C.id = CT.fk_news_category_id
                            WHERE CT.id = :id", 
                            array('id'=>$id));
  
  $cat[0]["category_roles"] = explode('|',$cat[0]['acl_role']);
  return $cat[0];
  
  }
     return false;
} 

/* 
 * usuwanie kategorii 
 */
public function mvcms_adm_Deletecategory($id = array()){
    $ids = (is_array($id) ? implode(",", $id) : $id);
  
    try {
    //$this->db->beginTransaction();
    $ret = $this->db->query("DELETE `c`.*, `ct`.* FROM `mvcms_news_category` `c`, `mvcms_news_category_translations` `ct` WHERE `c`.`id` = `ct`.`fk_news_category_id` AND `c`.`id` in ({$ids}) ", null);
          
    //$this->db->commit();
    if ($ret) return true;
    return false;
    
  }
  catch (PDOException $e) {
      
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
}

/*
 * zmiana statusu widocznośći kategorii
 */
 public function mvcms_adm_cat_setVisible($id, $status = 1){
  try {
            
   $ret = $this->db->update("mvcms_news_category_translations",array('is_visible'=>$status)," `id` = {$id}");
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
  
public function mvcms_adm_GetAllMasterCategories($orderby=null, $order='ASC'){
 try {
    
    ($orderAppend = isset($orderby) ? 'ORDER BY '.$orderby.' '.$order  : 'ORDER BY name ASC');
    
    $cats = $this->db->select("SELECT * from mvcms_news_category order by :orderby", array('orderby'=>$orderAppend));
   //var_dump($cats);
    if ($cats) return $cats;
    else return false;
    
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  
  }
  
  public function mvcms_adm_GetAllCategoryTranslations($cid){
  try {
    $cat = $this->db->select("select * from mvcms_news_category_translations WHERE fk_news_category_id = :id", array('id'=>$cid));
    //var_dump($cat);
    if ($cat) return $cat;
    else return false;
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }
  }

 public function mvcms_adm_get_all_category_locale($ln='pl'){
   try {
    $news = $this->db->select("select `NC`.`id`, `NCT`.`category_title` 
                              from `mvcms_news_category` `NC` left join `mvcms_news_category_translations` `NCT` on `NC`.`id` = `NCT`.`fk_news_category_id`");
    
   if ($news) {
   foreach ($news as $n) {
       $arr[0] = '-- wybierz kategorię --';
       $arr["{$n['id']}"] = $n['category_title'];     
   }  
   return $arr;
   }
    else return false;
  }
  catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
  }   
      
  }
 /*
  * dodawanie kategori wraz z wersjami językowymi
  */
  
  public function mvcms_adm_Add_Category($data){
 

 $currDate = date('Y-m-d H:i:s');   
 $acl_role = (!empty($newsdata['role_group']) ? implode('|',$data['role_group']) : '0');
 $c_data = array (
     "name"=>           $data['name'],
     "date_insert"=>    $currDate,
     "username"=>       $data['username'],
     "acl_role"=>       $acl_role
    
 );
 

 $langs = $this->db->select("SELECT * FROM mvcms_langs");    
 
 $this->db->beginTransaction();
 $this->db->insert("mvcms_news_category",$c_data);
 $category_id = $this->db->lastInsertId();

 if($category_id){
 $ct_data = array(
     "fk_news_category_id"=>   (int)$category_id,
     "category_title"=>         $data['title'],
     //"news_slug"=>              $data['news_slug'],
     "cat_ln"=>                 $data['lang'],
     "is_visible"=>             $data['status'],
     "date_publish"=>           $data['date_publish'],
     "date_update"=>            $currDate,
     "category_description"=>   $data['description']
     
     
      );

 $ret = $this->db->insert("mvcms_news_category_translations",$ct_data);
 
  
 if (!$ret) return 0;
 $ct_id = $this->db->lastInsertId();
 
 
 if(!empty($data['multi_content'])){
    foreach ($langs as $l){
       if ($l['symbol']!=$data['lang']) {   
           $ct_data["cat_ln"]=$l['symbol'];
           $ret = $this->db->insert("mvcms_news_category_translations",$ct_data);
           $ct_id = $this->db->lastInsertId();
           
           if(!$ret) return 0;
        }
    }
 } 
     
     
 } else return 0;    
 
 
 $ret = $this->db->select("SELECT `fk_news_category_id`, `id`, `cat_ln` from `mvcms_news_category_translations` WHERE `fk_news_category_id`=:cat_id AND `cat_ln`=:cat_ln", array("cat_id"=> $category_id,"cat_ln"=>$data['lang']));
 
 if (is_array($ret)) 
     $this->db->commit();
 else return 0;
 return $ret[0];
 
 }
 
 /* 
  * aktualizacja kategorii
  */
 
 public function mvcms_adm_Update_Category($data){
 
 $currDate = date('Y-m-d H:i:s');       
 $acl_role = (!empty($data['role_group']) ? implode('|',$data['role_group']) : '0');
 
 $c_data = array (
     //"name"=>           $pagedata['page_name'],
     //"date_insert"=>    $currDate,
     //"date_update"=>    $currDate,
     //"username"=>       $pagedata['page_username'],
     "acl_role"=>       $acl_role

 ); 
  $ct_data = array(
         
     "category_title"=>         $data['title'],
     "is_visible"=>             $data['status'],
     "date_publish"=>           $data['date_publish'],
     "date_update"=>            $currDate,
     "category_description"=>        $data['description']
      );
//print_r($pagedata['page_id']);
 $this->db->beginTransaction();
 $ret = $this->db->update("mvcms_news_category",$c_data, " `id`= {$data['fk_news_category_id']}");
 if (!$ret) return false;
 $ret = $this->db->update("mvcms_news_category_translations",$ct_data, " `id`= {$data['id']}");
 if (!$ret) return false;
 $this->db->commit();
 return true;
  
  
 }
  
  /* helper functions
   * 
   */
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