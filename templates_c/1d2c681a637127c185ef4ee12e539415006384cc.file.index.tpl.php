<?php /* Smarty version Smarty-3.1.11, created on 2013-05-09 07:20:19
         compiled from "apps\admin\themes\mvcms\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:40525107aff9b68df1-34743064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d2c681a637127c185ef4ee12e539415006384cc' => 
    array (
      0 => 'apps\\admin\\themes\\mvcms\\index.tpl',
      1 => 1368076816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40525107aff9b68df1-34743064',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5107aff9c323d7_60608859',
  'variables' => 
  array (
    'vars' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5107aff9c323d7_60608859')) {function content_5107aff9c323d7_60608859($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>

<meta name="Generator" content="eCMS Copyright (C) 2011." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title>AliasIT - panel administracyjny mvCMS</title>

<?php echo $_smarty_tpl->tpl_vars['vars']->value['assets'];?>


                <!--
                [if IE]>
		<style type="text/css">
		ul#nav li ul  {
		filter: alpha(opacity=95);
		}
		/* Nav Tools  */
		div.MainMenu { 
		width:97%;
		}
		</style>
		<![endif]-->
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="themes/NCleanGrey/css/ie6.css" />
		<![endif]
                -->
		

</head>

<body >
<div id="ncleangrey-container"><div id="logocontainer">
	

	<div class="logotext">Panel administracyjny mvCMS <br />Witamy: <?php echo $_smarty_tpl->tpl_vars['vars']->value['userinfo']['username'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/login/logout"> - wyloguj </a><br />
  
  </div>

</div>
<div class="topmenucontainer">
<ul id="nav">
   <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin" class="selected">CMS</a>
    <ul>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin" class="selected">Home&nbsp;(start)</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
" target="_blank" rel="external">Podgląd&nbsp;strony</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
login/logout">Wyloguj</a></li>
    </ul>
    </li>
    <li><a href="#">Treść</a>
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page">Strony</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/news">Aktualności</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/news/category">Kategorie dla aktualności</a></li>
    
    </ul>
    
    </li>
    <li><a href="#">Wygląd</a>
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/navigation">Menu</a></li> 
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/emailtemplates">Szablony wiadomosci email</a></li> 
    </ul>    
    </li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery">Galeria</a>
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery">Galerie</a></li>
    </ul>
    <li><a href="#">Narzędzia</a>
        <ul>    
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/newsletter">Newsletter</a></li>
        </ul>    
    </li>
    <li><a href="#">Użytkownicy & Grupy</a>
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/users">Użytkownicy</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/groups">Grupy</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/security">Uprawnienia</a></li>
    </ul>
    </li>
    <li><a href="#">Administracja</a>
    <ul>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/settings">Ustawienia</a></li>
        <li><a href="index.php?module=ecms&amp;action=adminpasswordform">Zmiana hasła administratora</a></li>
        <li><a href="index.php?module=ecms&amp;action=hitcounter">Informacje o wizytach</a></li>
        <li><a href="index.php?module=translations">Wersje językowe</a></li>
    </ul>
    </li>
   
  </ul>
	<div class="clearb"></div>
</div>
	<div class="clearb"></div>
</div>
<div class="breadcrumbs">
	
<p class="pageheader"><center>Witamy w panelu administracyjnym. Życzymy przyjemnej pracy <br />AliastIT Team<center></p>
</div>
<div class="hstippled">&nbsp;</div>
<div class="sections_bar">
	<div class="wrapper">
           
        </div>
</div>
<div class="clear">&nbsp;</div>
<div id="MainContent">

<div class="clearb">&nbsp;</div>


<div style="clear: both;"></div>
 <div class="message"><?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['vars']->value['statusmessage'])===null||$tmp==='' ? $_SESSION['statusmessage'] : $tmp))===null||$tmp==='' ? '' : $tmp);?>
 </div>
<div style="width:50px;display:box;"></div>
<div class="sections">

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>



</div><!-- END .sections-->
<div class="clearb"></div>
<br /><br /><br />
</div><!-- end MainContent -->

</div><!--end ncleangrey-container-->
<div id="footer">
		<a rel="external" href="http://www.4flavour.pl" title="web design, reklama interaktywna"><b>eCMS</b></a><b>&trade;</b> &nbsp;&nbsp;&nbsp; 3.0 &nbsp;"<a href="mailto:daniel@4flavour.pl" title="autor: Daniel Szantar">Daniel Szantar</a>" </div><!--end footer-->
</body>
</html>
<?php }} ?>