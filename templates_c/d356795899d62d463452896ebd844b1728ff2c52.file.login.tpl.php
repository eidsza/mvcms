<?php /* Smarty version Smarty-3.1.11, created on 2013-08-01 11:24:46
         compiled from "Q:\Programowanie\xampp\htdocs\mvcms\apps\admin\modules\login\view\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33951fa295e7e5479-03603511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd356795899d62d463452896ebd844b1728ff2c52' => 
    array (
      0 => 'Q:\\Programowanie\\xampp\\htdocs\\mvcms\\apps\\admin\\modules\\login\\view\\login.tpl',
      1 => 1359462182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33951fa295e7e5479-03603511',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASEURL' => 0,
    'error' => 0,
    'vars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51fa295e9aee71_28222917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa295e9aee71_28222917')) {function content_51fa295e9aee71_28222917($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Zaloguj się</title>
  <meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASEURL']->value;?>
apps/admin/modules/login/view/css/style.css" >
 	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASEURL']->value;?>
apps/admin/modules/login/view/js/jquery.js" ></script>
   <!-- Place CSS bug fixes for IE 7 in this comment -->
	<!--[if IE 7]>
	<style type="text/css" media="screen">
		#login-logo { margin: 15px auto 15px auto; }
		.input-email { margin: -24px 0 0 10px;}
		.input-password { margin: -30px 0 0 14px; }
		body#login #login-box input { height: 20px; padding: 10px 4px 4px 35px; }
		body#login{ margin-top: 14%;}
	</style>
	<![endif]-->

</head>

<body id="login">

<div id="left"></div>
<div id="right"></div>
<div id="top"></div>
<div id="bottom"></div>
	<div id="login-box">
	<?php if (isset($_SESSION['error_array'])){?> 
   <div class="alert error">
	    <p>
	    <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_SESSION['error_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
      <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br />
      <?php } ?>
      </p>
  </div>
    
  <?php }?>  
		<header id="main">
			<div id="login-logo"></div>
		</header>
	
		
    <form action="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/login/check" method="post" accept-charset="utf-8">
    <div style="display:none">
    <input type="hidden" name="csrf_hash_name" value="78be2f96b7638f7eb36633833d1a074e" />
    </div>			
    <ul>
				<li>
					<input type="text" name="user" placeholder="Użytkownik" />
					
          <img class="input-email" alt="E-mail" src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/email-icon.png" />
        </li>
				<li>
					<input type="password" name="pass" placeholder="Hasło"  />
					<img class="input-password" alt="Hasło" src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/lock-icon.png" />				</li>
				<li>
					<input class="remember" class="remember" id="remember" type="checkbox" name="remember" value="1" />
					<label for="remember" class="remember">Pamiętaj mnie</label>
				</li>
				<li><center><input class="button" type="submit" name="submit" value="Zaloguj się" /></center></li>
			</ul>
		</form>
    
    </div>
	<center>
		<ul id="login-footer">
			<li><a href="http://pyrocms.com/">Powered by PyroCMS</a></li>
		</ul>
	</center>
</body>
</html><?php }} ?>