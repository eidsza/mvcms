<?php /* Smarty version Smarty-3.1.11, created on 2013-08-01 12:25:48
         compiled from "apps\frontend\themes\agrofarm\custom_menu_2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3211051fa3650818688-24885171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e844bfb0fec7127afa30b6c3d97f9fdf769118e7' => 
    array (
      0 => 'apps\\frontend\\themes\\agrofarm\\custom_menu_2.tpl',
      1 => 1375352745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3211051fa3650818688-24885171',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51fa36508ce667_43240005',
  'variables' => 
  array (
    'custom_menu_2' => 0,
    'mdepth' => 0,
    'dph' => 0,
    'BASEURL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa36508ce667_43240005')) {function content_51fa36508ce667_43240005($_smarty_tpl) {?><ul class="sf-menu template-menu" id="custom_menu_2" name="Główne menu">
        <?php if (isset($_smarty_tpl->tpl_vars['mdepth'])) {$_smarty_tpl->tpl_vars['mdepth'] = clone $_smarty_tpl->tpl_vars['mdepth'];
$_smarty_tpl->tpl_vars['mdepth']->value = 1; $_smarty_tpl->tpl_vars['mdepth']->nocache = null; $_smarty_tpl->tpl_vars['mdepth']->scope = 0;
} else $_smarty_tpl->tpl_vars['mdepth'] = new Smarty_variable(1, null, 0);?>
        <?php if (isset($_smarty_tpl->tpl_vars['dph'])) {$_smarty_tpl->tpl_vars['dph'] = clone $_smarty_tpl->tpl_vars['dph'];
$_smarty_tpl->tpl_vars['dph']->value = 0; $_smarty_tpl->tpl_vars['dph']->nocache = null; $_smarty_tpl->tpl_vars['dph']->scope = 0;
} else $_smarty_tpl->tpl_vars['dph'] = new Smarty_variable(0, null, 0);?>
              <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['row'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['row']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['name'] = 'row';
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['custom_menu_2']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['row']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['row']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['row']['total']);
?>
                   <?php if (($_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']<$_smarty_tpl->tpl_vars['mdepth']->value)){?> </li> <?php }?>
                   <?php if (($_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']>$_smarty_tpl->tpl_vars['mdepth']->value)){?> 
                      <?php if (isset($_smarty_tpl->tpl_vars['dph'])) {$_smarty_tpl->tpl_vars['dph'] = clone $_smarty_tpl->tpl_vars['dph'];
$_smarty_tpl->tpl_vars['dph']->value = $_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']-$_smarty_tpl->tpl_vars['mdepth']->value; $_smarty_tpl->tpl_vars['dph']->nocache = null; $_smarty_tpl->tpl_vars['dph']->scope = 0;
} else $_smarty_tpl->tpl_vars['dph'] = new Smarty_variable($_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']-$_smarty_tpl->tpl_vars['mdepth']->value, null, 0);?> <?php echo str_repeat('<ul>',$_smarty_tpl->tpl_vars['dph']->value);?>

                   <?php }?>
                   <?php if (($_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']<$_smarty_tpl->tpl_vars['mdepth']->value)){?>  <?php if (isset($_smarty_tpl->tpl_vars['dph'])) {$_smarty_tpl->tpl_vars['dph'] = clone $_smarty_tpl->tpl_vars['dph'];
$_smarty_tpl->tpl_vars['dph']->value = $_smarty_tpl->tpl_vars['mdepth']->value-$_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']; $_smarty_tpl->tpl_vars['dph']->nocache = null; $_smarty_tpl->tpl_vars['dph']->scope = 0;
} else $_smarty_tpl->tpl_vars['dph'] = new Smarty_variable($_smarty_tpl->tpl_vars['mdepth']->value-$_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth'], null, 0);?> <?php echo str_repeat('</ul>',$_smarty_tpl->tpl_vars['dph']->value);?>
 <?php }?>
                   <li class="item">                   
                   <a <?php if ((isset($_GET['pid'])&&$_GET['pid']==$_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['fk_page_id'])){?> class='active' <?php }elseif((!isset($_GET['pid'])&&$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']==0)){?>  class='active' <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['BASEURL']->value;?>
page/show/<?php echo $_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['fk_page_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['title'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['title'];?>
">
                   <?php echo $_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['title'];?>

                   </a>
                  <?php if (isset($_smarty_tpl->tpl_vars['mdepth'])) {$_smarty_tpl->tpl_vars['mdepth'] = clone $_smarty_tpl->tpl_vars['mdepth'];
$_smarty_tpl->tpl_vars['mdepth']->value = $_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth']; $_smarty_tpl->tpl_vars['mdepth']->nocache = null; $_smarty_tpl->tpl_vars['mdepth']->scope = 0;
} else $_smarty_tpl->tpl_vars['mdepth'] = new Smarty_variable($_smarty_tpl->tpl_vars['custom_menu_2']->value[$_smarty_tpl->getVariable('smarty')->value['section']['row']['index']]['depth'], null, 0);?>
                                  
              <?php endfor; endif; ?>
        </ul>
<?php }} ?>