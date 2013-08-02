<?php

/**
 * Class to manage Mysql Nested Set Trees.
 *
 * @author Tobias Breunig <t.breunig@live.de>
 * @license http://www.opensource.org/licenses/bsd-license.html BSD License
 * @version 1.1
 * @copyright 2009 Tobias Breunig
 */
class navigation_model {

    /**
     * Database Table Vars
     *
     * @var 	array
     */
    private $params = array();

    /**
     * Error Messages
     *
     * @var array
     */
    private $errors = array();

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

    public function __construct($registry) {
        $this->registry = $registry;
        $this->db = $this->registry->db;
    }

    public function mvcms_adm_GetAllMenuPages($menu_id = 0, $ln = 'pl') {

        if ($menu_id == 0)
            return null;

        try {

            $this->db->beginTransaction();
            $parentid = $this->db->select("SELECT `id` FROM `mvcms_menu_pages` WHERE `fk_menu_id` = :menu_id AND `page_type`='rootpage'", array("menu_id" => $menu_id));
            if ($parentid)
                $parentid = $parentid[0]['id'];
            else
                return false;

            $menu = $this->db->select("select 
    node.id as menu_page_id,
    node.fk_menu_id,
    node.fk_page_id,
    node.lft,
    node.rgt, 
    node.depth,
    node.parent,
    node.info,
    node.page_type,
    node.page_link,
    MPT.oryginal_name,
    MPT.name as org_page_title,
    # PT.page_title as org_page_title,
    MPT.*    
    FROM mvcms_menu_pages as node
    left join mvcms_menu_pages_translations MPT on MPT.fk_menu_pages_id = node.id,
    # left join mvcms_page_translations PT on PT.fk_page_id = node.fk_page_id, 
    mvcms_menu_pages as parent
    WHERE node.lft BETWEEN parent.lft AND parent.rgt
    AND parent.id = :parentid
    AND node.fk_menu_id = :menuid AND MPT.menu_ln = :menuln  
    ORDER BY node.lft", array("parentid" => $parentid, "menuid" => $menu_id, "menuln" => "{$ln}"));
            $this->db->commit();

            return $menu;
        } catch (PDOException $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function mvcms_adm_GetAllMenus() {
        try {
            $orderby = 'id';
            $order = 'ASC';
            ($orderAppend = isset($orderby) ? 'ORDER BY ' . $orderby . ' ' . $order : 'ORDER BY name ASC');

            $nav = $this->db->select("select * from mvcms_menu {$orderAppend}");

            foreach ($nav as $n) {

                $navigation["{$n['id']}"] = $n['name'];
            }

            return $navigation;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function mvcms_adm_GetTemplateBlocks($block, $template_name) {
        try {


            return $this->db->select("select * from mvcms_template_modules WHERE module_type='{$block}' AND template_name='{$template_name}'");
        } catch (PDOException $e) {

            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return false;
    }

    /* add link to menu
     * array(menuId,menuLn, pagelink, title, target))
     * 
     */

    public function mvcms_adm_insertChildPageLink($pagedata = array()) {


        $page_data = array(
            "lft" => 0,
            "rgt" => 1,
            "depth" => 1,
            "page_type" => "link",
            "page_link" => $pagedata['link'],
            "info" => "customlink",
            "fk_menu_id" => $pagedata['menuId'],
            "parent" => 0,
            "target" => $pagedata['target']
        );

        //var_dump($page_data);
        try {

            if (!$parentData = $this->_mvcms_adm_getNode($pagedata['menuId']))
                return false;

            $pd = $parentData["rgt"];
            $pid = $parentData["id"];

            $page_data['lft'] = $pd;
            $page_data['rgt'] = $pd + 1;
            $page_data['parent'] = $pid;

            $this->db->beginTransaction();

            $this->db->query("UPDATE `mvcms_menu_pages` SET `rgt` = `rgt` + 2  WHERE `rgt` >= :pd AND `fk_menu_id` = :menuId", array("pd" => $pd, "menuId" => $pagedata['menuId']));
            $this->db->query("UPDATE `mvcms_menu_pages` SET `lft` = `lft` + 2  WHERE `lft` >= :pd AND `fk_menu_id` = :menuId", array("pd" => $pd, "menuId" => $pagedata['menuId']));
            $this->db->insert("mvcms_menu_pages", $page_data);
            $mp_id = $this->db->lastInsertId();
            $lns = $this->db->select("select * from mvcms_langs");

            $page_translations = array(
                "fk_menu_pages_id" => $mp_id,
                "name" => $pagedata['name'],
                "title" => (!empty($pagedata['title']) ? $pagedata['title'] : $pagedata['name']),
                "oryginal_name" => $pagedata['name'],
                "menu_ln" => 'pl',
                "is_visible" => 1
            );

            foreach ($lns as $ln) {
                $page_translations['menu_ln'] = $ln['symbol'];
                $this->db->insert("mvcms_menu_pages_translations", $page_translations);
            }
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /* insert page
     * 
     */

    public function mvcms_adm_insertChildPage($pagedata = array()) {


        $page_data = array(
            "lft" => 0,
            "rgt" => 1,
            "depth" => 1,
            "page_type" => "page",
            "page_link" => BASEURL . 'page/' . $pagedata['id'],
            "info" => "page",
            "fk_menu_id" => $pagedata['menuId'],
            "parent" => 0,
            "target" => '_self',
            "fk_page_id" => $pagedata['id']
        );

        //var_dump($page_data);
        try {

            if (!$parentData = $this->_mvcms_adm_getNode($pagedata['menuId']))
                return false;

            $pd = $parentData["rgt"];
            $pid = $parentData["id"];

            $page_data['lft'] = $pd;
            $page_data['rgt'] = $pd + 1;
            $page_data['parent'] = $pid;

            $this->db->beginTransaction();

            $this->db->query("UPDATE `mvcms_menu_pages` SET `rgt` = `rgt` + 2  WHERE `rgt` >= :pd AND `fk_menu_id` = :menuId", array("pd" => $pd, "menuId" => $pagedata['menuId']));
            $this->db->query("UPDATE `mvcms_menu_pages` SET `lft` = `lft` + 2  WHERE `lft` >= :pd AND `fk_menu_id` = :menuId", array("pd" => $pd, "menuId" => $pagedata['menuId']));
            $this->db->insert("mvcms_menu_pages", $page_data);
            $mp_id = $this->db->lastInsertId();
            $lns = $this->db->select("select * from mvcms_langs");

            $page_translations = array(
                "fk_menu_pages_id" => $mp_id,
                "name" => $pagedata['name'],
                "title" => (!empty($pagedata['title']) ? $pagedata['title'] : $pagedata['name']),
                "oryginal_name" => $pagedata['name'],
                "menu_ln" => 'pl',
                "is_visible" => 1
            );

            foreach ($lns as $ln) {
                $page_translations['menu_ln'] = $ln['symbol'];
                $this->db->insert("mvcms_menu_pages_translations", $page_translations);
            }
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /* pokazywanie ukrywanie pozycji menu
     * 
     */

    public function mvcms_adm_SwitchVisibility($mpt_id) {
        try {
            return $this->db->query("UPDATE mvcms_menu_pages_translations SET is_visible = CASE is_visible WHEN 0 THEN 1 WHEN 1 THEN 0 END WHERE id=:id", array("id" => $mpt_id));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /* dodawanie nowego menu
     * 
     */

    public function mvcms_adm_AddMenu($menu_name) {
        try {

            $this->db->beginTransaction();
            $ret = $this->db->insert("mvcms_menu", array("name" => "{$menu_name}", "tech_name" => "custom-menu"));
            $last_id = $this->db->lastInsertId();
            $ret = $this->db->insert("mvcms_menu_pages", array("fk_menu_id" => $last_id, "fk_page_id" => 0, "page_link" => "/", "lft" => 1, "rgt" => 2, "depth" => 0, "parent" => null, "page_type" => "rootpage", "target" => "", "info" => "root"));
            //array("fk_menu_id"=>$last_id,"fk_page_id"=>0, "page_link"=>"/","lft"=>1,"rgt"=>2,"depth"=>0,"parent"=>"","page_type"=>"rootpage","target"=>"","info"=>"root")
            if ($ret) {
                $this->db->commit();
                return true;
            } else
                return false;
        } catch (PDOException $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return false;
    }

    /* update menu items
     * 
     */

    public function mvcms_adm_UpdateMenu($items_data) {
        if (is_array($items_data) && !empty($items_data)) {
            if (array_key_exists('items', $items_data))
                $menu_items = $items_data['items'];

            $menu_id = $items_data['current_menu'];
            $menu_name = $items_data['name'];
            $menuPages = explode('|', $items_data['menu_items_array']);
        } else
            return false;


        try {
            //var_dump(count($menuPages));
            //var_dump($menuPages);
            //var_dump($menu_items);

            $this->db->beginTransaction();
            $this->db->update('mvcms_menu', array("name" => "{$menu_name}"), " `id`=$menu_id");

            if (!empty($menu_items)) {
                if (count($menuPages) > 1) {
                    for ($i = 2; $i < (count($menuPages) - 1); $i++) {
                        $pd = explode(':', $menuPages[$i]);
                        $pd[1] = ($pd[1] == 'root' ? 0 : $pd[1]);
                        // var_dump($pd);
                        $ret = $this->db->update('mvcms_menu_pages', array("lft" => (int) $pd[3], "rgt" => (int) $pd[4], "depth" => (int) $pd[2], "parent" => (int) $pd[1]), " `id`=" . (int) $pd[0]);
                        //$ret = $this->db->update('mvcms_menu_pages_translations',array("name"=>$menu_items[$pd[0]]['name'],"title"=>$menu_items[$pd[0]]['title']), " `id`=$pd[0]");
                    }
                    //if ($ret) $this->db->commit(); else return false;
                }
                foreach ($menu_items as $key => $val) {
                    $ret = $this->db->update('mvcms_menu_pages_translations', array("name" => "{$val['name']}", "title" => "{$val['title']}"), " `id`=$key");
                }
                if ($ret)
                    $this->db->commit();
                else
                    return false;
            }


            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function mvcms_adm_DeleteBranch($menu_id, $id) {
        try {

            $this->db->beginTransaction();
            //$this->db->query("LOCK TABLES mvcms_menu_pages AS MP WRITE, mvcms_menu_pages_translations AS MPT WRITE",null);
            $ret = $this->db->select("SELECT @myLeft := lft, @myRight := rgt, @myWidth := rgt - lft + 1 FROM `mvcms_menu_pages` MP WHERE `id`=:id AND `fk_menu_id`=:menu_id", array("id" => $id, "menu_id" => $menu_id));
            if (!$ret) {
                $this->db->rollback();
                return 'UWAGA. Brak pozyscji w menu o ID:' . $id;
            }
            $ret = $this->db->query(" DELETE MP.*, MPT.* FROM mvcms_menu_pages MP, mvcms_menu_pages_translations MPT 
                       WHERE MP.lft BETWEEN @myLeft AND @myRight AND MP.fk_menu_id=:menu_id
                       AND MP.id = MPT.fk_menu_pages_id;", array("menu_id" => $menu_id));

            $this->db->query("UPDATE `mvcms_menu_pages` SET `rgt` = rgt - @myWidth WHERE `rgt` > @myRight AND  `fk_menu_id`=:menu_id", array("menu_id" => $menu_id));
            $this->db->query("UPDATE  `mvcms_menu_pages` SET `lft` = lft - @myWidth WHERE `lft` > @myRight AND  `fk_menu_id`=:menu_id", array("menu_id" => $menu_id));


            if (!$ret)
                return false;
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return false;
    }

    /* usuwanie całego menu
     * 
     */

    public function mvcms_adm_DeleteMenu($menu_id) {
        try {
            $root_id = $this->_mvcms_adm_getMenuRootId($menu_id);
            //var_dump($root_id);
            if ($root_id !== false) {
                $ret = $this->mvcms_adm_DeleteBranch($menu_id, $root_id);
                if ($ret)
                    $ret = $this->db->delete("`mvcms_menu`", " `id` = $menu_id");
                if ($ret)
                    return true;
                else
                    return false;
            } else
                return false;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /* update lokalizacji menu w szablonie
     * 
     * 
     */

    public function mvcms_adm_Update_Template_Menu($menu) {
        try {
            if (is_array($menu)) {
                $this->db->beginTransaction();
                foreach ($menu as $key => $value) {
                    //var_dump($key);    
                    $ret = $this->db->update("`mvcms_template_modules`", array("fk_module_id" => $value), " `module_id_attr`='{$key}'");
                    if (!$ret)
                        return false;
                }
                $this->db->commit();
                return true;
            } return false;
        } catch (PDOException $e) {
            $this->db->rollback();
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /*
      public function getFullPage($id=null, $ln='pl'){
      if(!empty($id)){

      return $this->db->select("SELECT *
      FROM mvcms_page_translations PT
      WHERE PT.page_ln = :ln
      AND PT.is_visible =1
      AND PT.fk_page_id =:id
      AND date_publish <= 'NOW()'", array(':id'=>$id, ':ln'=>"$ln"));


      } else {
      return $this->db->select('SELECT PT.* FROM mvcms_page_translations PT WHERE PT.page_ln =:ln AND PT.is_visible=1  AND PT.is_main=1 AND date_publish <= NOW();', array(':ln'=>$ln));

      }

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
      PT.page_meta_description
      from
      mvcms_pages P
      left join mvcms_page_translations PT on P.id = PT.fk_page_id
      WHERE PT.id = :id",
      array(':id'=>$id));

      $page[0]["page_roles"] = explode('|',$page[0]['acl_role']);
      return $page[0];

      }
      return false;
      }

      public function mvcms_adm_GetAllMasterPages($orderby=null, $order='ASC'){
      try {

      ($orderAppend = isset($orderby) ? 'ORDER BY '.$orderby.' '.$order  : 'ORDER BY name ASC');

      $pages = $this->db->select("SELECT * from mvcms_pages order by :orderby", array(':orderby'=>$orderAppend));
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
      $pages = $this->db->select("select * from mvcms_page_translations WHERE fk_page_id = :id", array(':id'=>$pid));
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
    /* get node
     * 
     */

    private function _mvcms_adm_getNode($menuId) {

        try {
            $row = $this->db->select("SELECT `id`,`lft`,`rgt` FROM `mvcms_menu_pages` WHERE `page_type` = 'rootpage' AND `fk_menu_id` = :menuid", array("menuid" => $menuId));

            return $row[0];
        } catch (PDOException $e) {

            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function _mvcms_adm_getMenuRootId($menu_id) {
        try {
            //print_r($menu_id)  ;
            $ret = $this->db->select("select `id` from `mvcms_menu_pages` WHERE `fk_menu_id` = :id AND `page_type`='rootpage'", array("id" => $menu_id));
            //var_dump($ret);
            if ($ret && array_key_exists('id', $ret[0])) {
                return $ret[0]['id'];
            } else
                return false;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

}

?>