<?php

  
    spl_autoload_register(function ($className) { 
    $possibilities = array( 
        BASEPATH.'model/'.$className.'_m.class.php', 
        BASEPATH.'core/'.$className.'.class.php',
        BASEPATH.'helpers/'.$className.'.php'
    ); 
    foreach ($possibilities as $file) { 
        //var_dump($file);
        if (file_exists($file)) { 
            require_once($file); 
            return true; 
        } 
    } 
    return false; 
});

  /*** helper classes ***/
  
  //require_once(BASEPATH.'lib/formbuilder/class.form.php');
  require_once(BASEPATH.'lib/phpmailer/class.phpmailer.php'); 
  require_once(BASEPATH.'lib/smarty/SmartyBC.class.php');
  require_once(BASEPATH.'lib/zendacl/Acl.php');
  require_once(BASEPATH.'lib/form/Val.php');
  require_once(BASEPATH.'lib/form/my_Form.php');
  require_once(BASEPATH.'lib/formbuilder/class.form.php');
  require_once(BASEPATH.'lib/php-form-builder-class/class.form.php');
  //require_once(BASEPATH.'lib/common.php');
  
  
  $config = parse_ini_file(APPPATH.'config/config.conf',true); 
  var_dump($config);   
 /*** a new registry object ***/
 $registry = new rejestr;
 $registry->basepath = BASEPATH;
 $registry->apppath = APPPATH;
 $registry->cfg = $config;
 $registry->dbvars = $config['dbconstants'];
 //$registry->db = db::getInstance( $registry->dbvars);
 $registry->db = new Database( $registry->dbvars);
 $registry->session = Session::init();
 //var_dump($registry->cfg);
 $cfg['TEMPLATE']['NAME']= 'Nazwa templateki';
 $cfg['TEMPLATE']['MENU'][]= 'Menu 1';
 $cfg['TEMPLATE']['MENU'][]= 'Menu 2';
 
 
 $registry->cfg = 
 array_merge($registry->cfg, $cfg);

 $ln = Session::get('ln'); 
 
 $ln = (!empty($ln) ? Session::get('ln') : substr($registry->cfg['applocale']['APP_DEFAULT_LOCALE'],0,2));
 //var_dump($ln);
 
 Session::set('ln',"{$ln}");
 
 setlocale(LC_ALL, "{$ln}_".strtoupper($ln));
 
 
 //var_dump($registry->cfg['TEMPLATE']);
  /*** create the database registry object ***/
 // $registry->db = db::getInstance();
?>
