<?php /* Smarty version Smarty-3.1.11, created on 2013-08-01 11:24:51
         compiled from "Q:\Programowanie\xampp\htdocs\mvcms\apps\admin\modules\index\view\indexView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:270451fa2963c84750-03486119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c2ccde0ccc83ce26de513743569c2e6a7a18b01' => 
    array (
      0 => 'Q:\\Programowanie\\xampp\\htdocs\\mvcms\\apps\\admin\\modules\\index\\view\\indexView.tpl',
      1 => 1368076546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '270451fa2963c84750-03486119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51fa2963ebf432_36202588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa2963ebf432_36202588')) {function content_51fa2963ebf432_36202588($_smarty_tpl) {?><div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="">CMS</a>
  <p class="itemicon">
    <a href="">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_desktop.png" class="itemicon" alt="Strona startowa" title="Strona startowa" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin">Home&nbsp;(start)</a>, 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
" target="_blank">Podgląd&nbsp;strony</a>, 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/login/logout">Wyloguj</a>
  </p>
  </div>
</div>

<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/page">Strony</a>
  <p class="itemicon">
    <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/page">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_bookmarks.png" class="itemicon" alt="Zarządzanie treśćią stron" title="Zarządzanie treśćią stron" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page">Strony</a> 
    
  </p>
  </div>
</div>

<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/navigation">Nawigacja</a>
  <p class="itemicon">
    <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/navigation">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_ubuntu.png" class="itemicon" alt="Budowanie menu w szablonie" title="Budowanie menu w szablonie" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/navigation">Nawigacja</a> 
    
  </p>
  </div>
</div>


<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/news">Artykuły</a>
  <p class="itemicon">
    <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/news">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_wallpapers.png" class="itemicon" alt="Edycja artykułów" title="Edycja artykułów" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/news">Artykuły</a>, 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/news/category">Kategorie</a>,
  </p>
  </div>
</div>

<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/gallery">Galeria</a>
  <p class="itemicon">
    <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/galery">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_photos.png" class="itemicon" alt="Zarządzanie galeriami zdjęć" title="Zarządzanie galeriami zdjęć" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['site_url'];?>
admin/gallery">Galerie</a> 
    
  </p>
  </div>
</div>


<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="index.php?module=newsletter">Newsletter</a>
  <p class="itemicon">
    <a href="index.php?module=newsletter">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_applications.png" class="itemicon" alt="Wiadomości masowe" title="Wiadomości masowe" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="index.php?module=newsletter">Newsletter (wiadomośći masowe)</a> 
    
  </p>
  </div>
</div>

<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="index.php?module=ecms&action=hitcounter">Odwiedziny</a>
  <p class="itemicon">
    <a href="index.php?module=ecms&action=hitcounter">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_web.png" class="itemicon" alt="Statystyki odwiedzin" title="Statystyki odwiedziń" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="index.php?module=ecms&action=hitcounter">Lista odwiedzin</a> 
   
  </p>
  </div>
</div>

<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="index.php?module=translations">Wersje językowe</a>
  <p class="itemicon">
    <a href="index.php?module=translations">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_sites.png" class="itemicon" alt="Wersje językowe strony" title="Wersje językowe strony" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="index.php?module=translations">Wersje językowe</a> 
    
  </p>
  </div>
</div>

<div class="itemmenucontainer">
  <div class="itemoverflow"><a class="title-itemlink" href="index.php?module=ecms&action=adminpasswordform">Zmiana hasła</a>
  <p class="itemicon">
    <a href="index.php?module=ecms&action=adminpasswordform">
      <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['theme_url'];?>
images/icons/start/folder_black_lock.png" class="itemicon" alt="Zmiana hasła administratora" title="Zmiana hasła administratora" />
    </a>
  </p>
  <span class="clear"></span>
  <p class="itemtext">
    
    Elementy podrzędne:<br /> 
    <a class="itemsublink" href="index.php?module=ecms&action=adminpasswordform">Zmiana hasła</a> 
    
  </p>
  </div>
</div><?php }} ?>