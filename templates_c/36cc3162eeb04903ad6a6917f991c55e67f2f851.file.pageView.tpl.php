<?php /* Smarty version Smarty-3.1.11, created on 2013-08-02 07:48:33
         compiled from "Q:\Programowanie\xampp\htdocs\mvcms\apps\frontend\modules\page\view\pageView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2387451fa27f340b660-78949150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36cc3162eeb04903ad6a6917f991c55e67f2f851' => 
    array (
      0 => 'Q:\\Programowanie\\xampp\\htdocs\\mvcms\\apps\\frontend\\modules\\page\\view\\pageView.tpl',
      1 => 1375422499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2387451fa27f340b660-78949150',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51fa27f355b902_58839686',
  'variables' => 
  array (
    'vars' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa27f355b902_58839686')) {function content_51fa27f355b902_58839686($_smarty_tpl) {?><div style="contentitle">
    <h1><?php echo $_smarty_tpl->tpl_vars['vars']->value['page_title'];?>
</h1>
</div>
<div class="pagecontent">
    <?php echo $_smarty_tpl->tpl_vars['vars']->value['page_precontent'];?>

    <?php echo $_smarty_tpl->tpl_vars['vars']->value['page_content'];?>


</div>
<div class="pagefooter"></div><?php }} ?>