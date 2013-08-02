<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class theme_model {

    protected $registry;
    protected $db;
    protected $theme;

    public function __construct($registry) {
        $this->registry = $registry;
        $this->db = $this->registry->db;
    }

    public function get_current_theme() {
        $appName=$this->registry->_application;
        $this->theme = $this->registry->config['deftemplates'][strtoupper($this->registry->_application)];
        return $this->theme;
    }

    /*
      public function get_theme_menu($theme = 'default'){




      $thmenu = array(
      "default"=>array( "custom_menu_1"=> array("Home1"=>"http://www.google.pl", "Index1"=>"Index1"),
      "custom_menu_2"=> array("Home2"=>"Home2", "Index2"=>"Index2")
      ),
      "innytheme"=>array( "menu_1"=> array("Home"=>"Home4", "Index"=>"Index"),
      "menu_2"=> array("Home"=>"Home5", "Index"=>"Index2")
      )
      );

      return $thmenu[$theme];

      }
     */

    public function get_theme_menu($theme = 'default') {

        if (!empty($theme)) {

            $theme_menu_id = $this->db->select("select * from `mvcms_template_modules` WHERE `module_type`='menu' AND `template_name` = :_theme", array('_theme' => $theme));
            //     $theme_menu_id = $this->db->select("select * from `mvcms_template_modules` WHERE module_type='menu' AND template_name= 'agrofarm'");
            $theme_menu_arr = array();
            foreach ($theme_menu_id as $template_menu) {
                $tmp_menu = null;
                $tmp_menu = $this->get_all_active_menu_pages($template_menu['fk_module_id'], Session::get('ln'));
                $theme_menu_arr[$template_menu['module_id_attr']] = $tmp_menu;
            }
            return $theme_menu_arr;
        }
    }

    private function get_all_active_menu_pages($menu_id, $ln = 'pl') {

        $parent_id = $this->db->select("SELECT id FROM mvcms_menu_pages WHERE fk_menu_id = :menu_id AND page_type='rootpage'", array('menu_id' => $menu_id));

        $m = $this->db->select("select 
    node.fk_page_id,
    node.depth,
    node.page_link,
    MPT.name,
    MPT.title
    FROM mvcms_menu_pages as node
    left join mvcms_menu_pages_translations MPT on MPT.fk_menu_pages_id = node.id,
    mvcms_menu_pages as parent
    WHERE node.lft BETWEEN parent.lft AND parent.rgt
    AND parent.id = :parent_id 
    AND node.fk_menu_id = :menu_id AND MPT.menu_ln = :ln
    AND MPT.is_visible = 1  
    ORDER BY node.lft", array('parent_id' => $parent_id[0]['id'], 'menu_id' => $menu_id, 'ln' => $ln));

        return $m;
    }

}