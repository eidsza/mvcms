<?php /* Smarty version Smarty-3.1.11, created on 2013-03-12 13:55:47
         compiled from "F:\xampp\htdocs\mvcms\apps\admin\modules\emailtemplates\view\templateslistView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5215513f15eea7d233-15819775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9540cff06c62422a36aa562cd86902b13055726' => 
    array (
      0 => 'F:\\xampp\\htdocs\\mvcms\\apps\\admin\\modules\\emailtemplates\\view\\templateslistView.tpl',
      1 => 1363092937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5215513f15eea7d233-15819775',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_513f15eed57860_70796140',
  'variables' => 
  array (
    'vars' => 0,
    'p' => 0,
    'row_id' => 0,
    'row_unlocked' => 0,
    'row_style' => 0,
    'pageex' => 0,
    'details' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f15eed57860_70796140')) {function content_513f15eed57860_70796140($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
css/6-jquery-ui-1.8.13.custom.css" type="text/css" media="all">
<div style="display:none;" id="dialog-confirm" title=<?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['category.dialog_confirm_title'];?>
">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie szablony,  oraz wersje językowe zostaną usunięte. Usunąć?
    </p>
</div>
    
    <form id="newsForm" action="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/news/category/delete" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader"><?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['emailtemplates.list'];?>
</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/emailtemplates/create" class="pageoptions">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Paste32.png" class="systemicon" alt="Dodaj nowy szablon" title="Dodaj nowy szablon" />
        </a>
        <a class="pageoptions" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/emailtemplates/create">Dodaj nowy szablon</a>
        <span class="separator">&nbsp;&nbsp;</span>
        
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['categoryForm'].submit();" class="pageoptions delete">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Paste_cut32.png" class="systemicon" alt="Usuń zaznaczone kategorie" title="Usuń zaznaczone kategorie" /></a>
        <a class="pageoptions delete" href="">Usuń zaznaczone</a>
    </p>
    </div>
    </div>
    <table class="pagetable cms_pages templates" id="templatetable" cellspacing="0" border="0" cellspacing="0" cellpadding="0">
     <thead>
     <tr>
        <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked unlocked"></div></th>
        <th style="width:40px;"><input type="checkbox"  value=""></th>
        <th style="width:40px;">ID<span class="iconsorting"></span></th>
        <th style="width:0px;"></th>
        <th style="width:70%;">Nazwa kategorii<span class="iconsorting"></span></th>
        <th>Data utworzenia<span class="iconsorting"></span></th>
        <th style="width:40px;">Usuwanie<span class="iconsorting"></span></th>
      </tr>
      </thead>
      <tbody>
      <?php if (!empty($_smarty_tpl->tpl_vars['vars']->value['emailtemplates'])){?>   
        
          <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vars']->value['emailtemplates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
              <?php if (isset($_smarty_tpl->tpl_vars['row_id'])) {$_smarty_tpl->tpl_vars['row_id'] = clone $_smarty_tpl->tpl_vars['row_id'];
$_smarty_tpl->tpl_vars['row_id']->value = ('templatetable_').($_smarty_tpl->tpl_vars['p']->value['id']); $_smarty_tpl->tpl_vars['row_id']->nocache = null; $_smarty_tpl->tpl_vars['row_id']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_id'] = new Smarty_variable(('templatetable_').($_smarty_tpl->tpl_vars['p']->value['id']), null, 0);?>
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
$_smarty_tpl->tpl_vars['row_unlocked']->value = ''; $_smarty_tpl->tpl_vars['row_unlocked']->nocache = null; $_smarty_tpl->tpl_vars['row_unlocked']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_unlocked'] = new Smarty_variable('', null, 0);?>
                <?php }?>    

             <tr class="master" id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked <?php echo $_smarty_tpl->tpl_vars['row_unlocked']->value;?>
"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['row_unlocked']->value==''){?> checked="checked" <?php }else{ ?>   <?php }?>/>
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delcats[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" /></td>
             <td><?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
</td>
             <td style="width:0px;"></td>
             <td><h2><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</h2>
                <div class="subtable_details" style="<?php echo $_smarty_tpl->tpl_vars['row_style']->value;?>
">
                <table class="subtable" style="width:100%;">
                <thead><tr>
                        <th class="th_ln"><span class=""></span></th>
                        <th class="th_ln"></th>
                        <th class="th_title">Nazwa</th>
                        <th class="" style="width:1px;"></th>
                        <th class="">Opis</th>
                        <th class="th_date" style="width:1px;"></th>
                        <th class="th_icons">Domyslny</th>
                        <th class="th_icons">Edytuj</th>
                        </tr>
                </thead><tbody>
                    <?php if (isset($_smarty_tpl->tpl_vars['pageex'])) {$_smarty_tpl->tpl_vars['pageex'] = clone $_smarty_tpl->tpl_vars['pageex'];
$_smarty_tpl->tpl_vars['pageex']->value = $_smarty_tpl->tpl_vars['vars']->value['etpl_details'][$_smarty_tpl->tpl_vars['p']->value['id']]; $_smarty_tpl->tpl_vars['pageex']->nocache = null; $_smarty_tpl->tpl_vars['pageex']->scope = 0;
} else $_smarty_tpl->tpl_vars['pageex'] = new Smarty_variable($_smarty_tpl->tpl_vars['vars']->value['etpl_details'][$_smarty_tpl->tpl_vars['p']->value['id']], null, 0);?>
                                       
                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pageex']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value){
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                            <tr>
                            <td><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Flag16.png" /></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['lang'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['name'];?>
</td>
                            <td></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['description'];?>
</td>
                            <td></td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/emailtemplates/setDefault/<?php if ($_smarty_tpl->tpl_vars['details']->value['is_default']){?>0<?php }else{ ?>1<?php }?>/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['details']->value['is_default']){?>star_full16.png" title="Ukryj "<?php }else{ ?>Star_empty16.png" title="Pokaż"<?php }?> /></a></td>
                            <td><a title="Edytuj artykuł" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/emailtemplates/edit/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['lang'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_edit16.png" /></a></td>
                            </tr>
                     <?php } ?>
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top"><?php echo $_smarty_tpl->tpl_vars['p']->value['date_insert'];?>
</td>
                <td valign="top"><a title="Usuń wszystkie kategorie!" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/emailtemplates/delete/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Folder_delete16.png" /></a></td>
                </tr>  

          <?php } ?>
       <?php }?>   
      </tbody>
            <tfoot>
                <tr>
                    <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked"></div></th>
                    <th style="width:40px;"><input type="checkbox"></th>
                    <th style="width:40px;">ID</th>
                    <th style="width:0px;"></th>
                    <th style="width:70%;">Nazwa szablonu</th>
                    <th>Data utworzenia</th>
                    <th style="width:40px;">Usuwanie</th>         
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
      //if (status == 'undefined') status = null;
      //alert(status);
      $(this).find("input:checkbox").attr('checked',!status);
      var id = $(this).find("input:checkbox").val();
      table_id = $(".cms_pages").attr("id");
      $.cookie('lockedtablerows['+table_id+'_'+id+']',!status);
       
     
      
      });     

    
   </script>               <?php }} ?>