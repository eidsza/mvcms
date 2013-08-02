<?php /* Smarty version Smarty-3.1.11, created on 2013-01-29 12:53:10
         compiled from "F:\xampp\htdocs\mvcms\apps\admin\modules\users\view\userlistView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301005107b826a775c4-63402323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b27a7833dc15adf42f939594cc1a43b6d296b8c' => 
    array (
      0 => 'F:\\xampp\\htdocs\\mvcms\\apps\\admin\\modules\\users\\view\\userlistView.tpl',
      1 => 1346937566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '301005107b826a775c4-63402323',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vars' => 0,
    'p' => 0,
    'row_id' => 0,
    'row_unlocked' => 0,
    'row_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5107b826cabb21_86122770',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5107b826cabb21_86122770')) {function content_5107b826cabb21_86122770($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
css/6-jquery-ui-1.8.13.custom.css" type="text/css" media="all">
<div id="dialog-confirm" title=<?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['users.dialog_confirm_title'];?>
">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszyscy wybrani użytkownicy zostaną usunięci. Usunąć?
    </p>
</div>

    
    <form id="pages_form" action="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/user/delete" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader"><?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['users.user_list'];?>
</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/users/create" class="pageoptions">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_add32.png" class="systemicon" alt="Dodaj nowego uzytkownika" title="Dodaj nowego użytkownika" /></a>
        <a class="pageoptions" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/users/create">Dodaj nowego użytkownika</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['pages_form'].submit();" class="pageoptions delete">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone" title="Usuń zaznaczone" /></a>
        <a class="pageoptions delete" href="">Usuń zaznaczone</a>
    </p>
    </div>
    </div>
    <table class="pagetable cms_pages pages" id="usertable" cellspacing="0"  border="0" cellspacing="0" cellpadding="0">
     <thead>
     <tr>
        <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked unlocked"></div></th>
        <th style="width:40px;"><input type="checkbox"  value=""></th>
        <th style="width:40px;">ID<span class="iconsorting"></span></th>
        <th style="width:0px;"></th>
        <th style="width:70%;">Nazwa użytkownika<span class="iconsorting"></span></th>
        <th>Data utworzenia<span class="iconsorting"></span></th>
        <th style="width:40px;">Szybkie usuwanie<span class="iconsorting"></span></th>
      </tr>
      </thead>
      <tbody>
      <?php if (!empty($_smarty_tpl->tpl_vars['vars']->value['users'])){?>   
        
          <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vars']->value['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
              
          <?php if (isset($_smarty_tpl->tpl_vars['row_id'])) {$_smarty_tpl->tpl_vars['row_id'] = clone $_smarty_tpl->tpl_vars['row_id'];
$_smarty_tpl->tpl_vars['row_id']->value = ('usertable_').($_smarty_tpl->tpl_vars['p']->value['id']); $_smarty_tpl->tpl_vars['row_id']->nocache = null; $_smarty_tpl->tpl_vars['row_id']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_id'] = new Smarty_variable(('usertable_').($_smarty_tpl->tpl_vars['p']->value['id']), null, 0);?>
          
          
           <?php if (isset($_COOKIE['lockedtablerows'][$_smarty_tpl->tpl_vars['row_id']->value])&&$_COOKIE['lockedtablerows'][$_smarty_tpl->tpl_vars['row_id']->value]=='true'){?> 
                 <?php if (isset($_smarty_tpl->tpl_vars['row_style'])) {$_smarty_tpl->tpl_vars['row_style'] = clone $_smarty_tpl->tpl_vars['row_style'];
$_smarty_tpl->tpl_vars['row_style']->value = 'display:block;'; $_smarty_tpl->tpl_vars['row_style']->nocache = null; $_smarty_tpl->tpl_vars['row_style']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_style'] = new Smarty_variable('display:block;', null, 0);?>
                 <?php if (isset($_smarty_tpl->tpl_vars['row_unlocked'])) {$_smarty_tpl->tpl_vars['row_unlocked'] = clone $_smarty_tpl->tpl_vars['row_unlocked'];
$_smarty_tpl->tpl_vars['row_unlocked']->value = 'unlocked'; $_smarty_tpl->tpl_vars['row_unlocked']->nocache = null; $_smarty_tpl->tpl_vars['row_unlocked']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_unlocked'] = new Smarty_variable('unlocked', null, 0);?>
            <?php }else{ ?> 
                <?php if (isset($_smarty_tpl->tpl_vars['row_style'])) {$_smarty_tpl->tpl_vars['row_style'] = clone $_smarty_tpl->tpl_vars['row_style'];
$_smarty_tpl->tpl_vars['row_style']->value = 'display:none;'; $_smarty_tpl->tpl_vars['row_style']->nocache = null; $_smarty_tpl->tpl_vars['row_style']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_style'] = new Smarty_variable('display:none;', null, 0);?>
                <?php if (isset($_smarty_tpl->tpl_vars['row_unlocked'])) {$_smarty_tpl->tpl_vars['row_unlocked'] = clone $_smarty_tpl->tpl_vars['row_unlocked'];
$_smarty_tpl->tpl_vars['row_unlocked']->value = ' '; $_smarty_tpl->tpl_vars['row_unlocked']->nocache = null; $_smarty_tpl->tpl_vars['row_unlocked']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_unlocked'] = new Smarty_variable(' ', null, 0);?>
            <?php }?>    
            
             <tr class="master" id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked <?php echo $_smarty_tpl->tpl_vars['row_unlocked']->value;?>
"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" />
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delusers[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" /></td>
             <td><?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
</td>
             <td style="width:0px;"></td>
             <td><h2><?php echo $_smarty_tpl->tpl_vars['p']->value['username'];?>
</h2>
             
                 <div class="subtable_details" style="<?php echo $_smarty_tpl->tpl_vars['row_style']->value;?>
">
                <table class="subtable" style="width:100%;">
                <thead><tr>
                        <th class="th_ln"><span class=""></span></th>
                        <th class="th_ln"></th>
                        <th class="th_title">Imię</th>
                        <th class="th_title">Nazwisko</th>
                        <th class="th_title">E-mail</th>
                        <th class="th_date">Ostatnie logowanie</th>
                        <th class="th_icons">Aktywny</th>
                        <th class="th_icons">Edytuj</th>
                        </tr>
                </thead><tbody>
                        <tr>
                            <td><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/User16.png" /></td>
                            <td></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['p']->value['firstname'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['p']->value['lastname'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['p']->value['email'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['p']->value['logintime'];?>
</td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/user/setLevel/<?php if ($_smarty_tpl->tpl_vars['p']->value['userlevel']==3){?>0<?php }else{ ?>1<?php }?>/<?php echo $_smarty_tpl->tpl_vars['p']->value['userlevel'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"/></a></td>
                            <td><a title="Edytuj profil" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/users/edit/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_edit16.png" /></a></td>
                            </tr>
                   
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top"><?php echo $_smarty_tpl->tpl_vars['p']->value['reg_date'];?>
</td>
                <td valign="top"><a title="Usuń tego użytkownika" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/user/delete/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/User_delete16.png" /></a></td>
                </tr>  

          <?php } ?>
       <?php }?>   
      </tbody>
            <tfoot>
                <tr>
                    <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked"></div></th>
                    <th style="width:40px;"><input type="checkbox"></th>
                    <th style="width:40px;"></th>
                    <th style="width:0px;"></th>
                    <th style="width:70%;">Nazwa użytkownika</th>
                    <th>Data utworzenia</th>
                    <th style="width:40px;">Szybkie usuwanie</th>         
                </tr></tfoot></table>
             </form>
   <script>
           
      $(".cms_pages thead th:eq(0)").toggle(
      function(){
         $('.subtable_details').show();
         $(".locked").addClass("unlocked"); 
         $(".cms_pages tbody tr td:nth-child(1) input:checkbox ").each(function(){
         this.checked = 1;
         var id = $(this).val();
         table_id = $(".cms_pages").attr("id");
         $.cookie('lockedtablerows['+table_id+'_'+id+']',true); 
           
       })
      },
      function(){
         $(".cms_pages tbody tr td:nth-child(1) input:checkbox ").each(function(){
         this.checked = 0;
         var id = $(this).val();
           table_id = $(".cms_pages").attr("id");
           $.cookie('lockedtablerows['+table_id+'_'+id+']',false);    
         })
         $('.subtable_details').hide();
         $(".locked").removeClass("unlocked");
          
      });
      $(".cms_pages tr.master td:nth-child(1)").click(function(){
      $(this).parent().find('.subtable_details').toggle();    
      $(this).find(".locked").toggleClass("unlocked");
      var status = $(this).find("input:checkbox").attr('checked');
      
      $(this).find("input:checkbox").attr('checked',!status);
      var id = $(this).find("input:checkbox").val();
      table_id = $(".cms_pages").attr("id");
      $.cookie('lockedtablerows['+table_id+'_'+id+']',!status);
        //alert(table_id);
      //if ($(".cms_pages").hasClass("pages")) $.cookie('lockedtablerows['+id+']', !status);
       //if ($(".cms_pages").hasClass("news")) $.cookie('lockedtablerows_news['+id+']', !status);
         //if ($(".cms_pages").hasClass("newscategory")) $.cookie('lockedtablerows_newscategory['+id+']', !status);
          //if ($(".cms_pages").hasClass("pictures")) $.cookie('lockedtablerows_pictures['+id+']', !status);
                  // if ($(".cms_pages").hasClass("gallery")) $.cookie('lockedtablerows_gallery['+id+']', !status);
      
      });     

    
   </script>     <?php }} ?>