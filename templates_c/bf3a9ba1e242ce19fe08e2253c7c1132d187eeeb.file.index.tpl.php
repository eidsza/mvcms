<?php /* Smarty version Smarty-3.1.11, created on 2013-08-01 12:23:52
         compiled from "apps\frontend\themes\agrofarm\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:275775110b8adb9d9b8-26009024%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf3a9ba1e242ce19fe08e2253c7c1132d187eeeb' => 
    array (
      0 => 'apps\\frontend\\themes\\agrofarm\\index.tpl',
      1 => 1375352631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275775110b8adb9d9b8-26009024',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5110b8add28759_74316485',
  'variables' => 
  array (
    'vars' => 0,
    'custom_menu_1' => 0,
    'content' => 0,
    'custom_menu_2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5110b8add28759_74316485')) {function content_5110b8add28759_74316485($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'Q:\\Programowanie\\xampp\\htdocs\\mvcms\\lib\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['vars']->value['site_title'];?>
 - <?php echo $_smarty_tpl->tpl_vars['vars']->value['page_title'];?>
</title>
    <meta charset="utf-8">
    <?php echo $_smarty_tpl->tpl_vars['vars']->value['assets'];?>

	
</head>
<body id="page1">
<!--==============================header=================================-->
<header id="header">

	<div class="main">
    	<div class="row-1">
        	<h1><a class="logo" href="#">Qioness</a></h1>
            
            <div class="search searchform">
            
            <form id="searchform" method="GET" action="">
            <input id="search" class="input_text" type="text" value="Wyszukiwarka" onkeypress="" onblur="" onfocus="" name="search" />
            <input type="button" class="btn" onClick=""/>
            </form>
            </div>
            
            
                
        </div>
		<div class="row-2">
        	<nav>
              <?php echo $_smarty_tpl->tpl_vars['custom_menu_1']->value;?>

          </nav>
        </div>
        <div class="row-3">
         <div class="logosigns">
         <ul class="logos">
         
         </ul>
         </div>
         <div class="subheader">
         <span class="dateinfo"><?php echo smarty_modifier_date_format(time(),'%e %b, %Y');?>
</span>
         <span class="dateinfo">&nbsp;&nbsp;|&nbsp;&nbsp;</span> 
         <span class="subheader_1">imieniny:</span> 
         <span class="namedayinfo">
         
         </span>
         </div>
            
        </div>
    </div>	
</header>
<!--==============================content================================-->
<div class="bg" id="content-index">
  <div class="main">
  		<section id="content">

    	<div class="container_24">
    	   

            <div class="wrapper">
                 <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

            </div>
        </div>
    </section>

  </div>
</div>
<aside>
	<div class="main">
    	<div class="container_24">
        	<div class="wrapper spacer-1">
            	<div class="grid_7 suffix_1 alpha">
                	<div class="bg-spacer">
                    	<div class="padding-left">
                    	<h4 class="prev-indent-bot">NEWSLETTER</h4>
 
                        <ul class="list-2">
                        	<li class="last-item">
                            Zpisz się do naszego newslettera! <br />Bedziesz otrzymywać nowe informacje publikowane na naszej stronie.
                        	</li>
                        </ul>
                        <div class="newsletter">
                        <form method="POST" action="lib/newsletter.php" id="newsform">
                        <input type="text" name="email" value="" class="" id="email">
                        <input type="button" class="btn">
                        </form>
                        </div>

                    </div>
                    </div>
                </div>
               
                <div class="grid_8">
                	<div class="bg-spacer">

                    	<div class="padding-left">
                    	<h4>Dlaczego My?</h4>
                        <p class="color-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>			
                        
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</aside>
<!--==============================footer=================================-->
<footer>
	<div class="main">
            <?php echo $_smarty_tpl->tpl_vars['custom_menu_2']->value;?>

	<div class="clear">&nbsp;</div>
        <span>Ośrodek Uzależnień &copy; 2011  <br></span>
    </div>
</footer>


</body>
</html>
<?php }} ?>