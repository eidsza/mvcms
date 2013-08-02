<?php /* Smarty version Smarty-3.1.11, created on 2013-01-29 12:19:47
         compiled from "F:\xampp\htdocs\mvcms\apps\admin\modules\page\view\pagelistView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:237835107b05345a754-25662983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4e5c5473b1d14e5f8bbda3cf3c12a4d638d8ca2' => 
    array (
      0 => 'F:\\xampp\\htdocs\\mvcms\\apps\\admin\\modules\\page\\view\\pagelistView.tpl',
      1 => 1359115063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237835107b05345a754-25662983',
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
    'pageex' => 0,
    'details' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5107b053720a37_69929033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5107b053720a37_69929033')) {function content_5107b053720a37_69929033($_smarty_tpl) {?>
<div id="dialog-confirm" title=<?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['pages.dialog_confirm_title'];?>
">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie strony,ich wersje językowe oraz przypisania w menu zostaną usunięte. Usunąć?
    </p>
</div>

    
    <form id="pages_form" action="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/deletePage" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader"><?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['pages.page_list'];?>
</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/addPage" class="pageoptions">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_add32.png" class="systemicon" alt="Dodaj nową treść" title="Dodaj nową treść" /></a>
        <a class="pageoptions" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/addPage">Dodaj nową treść</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['pages_form'].submit();" class="pageoptions delete">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone strony" title="Usuń zaznaczone strony" /></a>
        <a class="pageoptions delete" href="">Usuń zaznaczone</a>
    </p>
    </div>
    </div>
    <table class="pagetable cms_pages pages" id="pagetable" cellspacing="0"  border="0" cellspacing="0" cellpadding="0">
     <thead>
     <tr>
        <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked unlocked"></div></th>
        <th style="width:40px;"><input type="checkbox"  value=""></th>
        <th style="width:40px;">ID<span class="iconsorting"></span></th>
        <th style="width:0px;"></th>
        <th style="width:70%;">Nazwa strony<span class="iconsorting"></span></th>
        <th>Data utworzenia<span class="iconsorting"></span></th>
        <th style="width:40px;">Szybkie usuwanie<span class="iconsorting"></span></th>
      </tr>
      </thead>
      <tbody>
      <?php if (!empty($_smarty_tpl->tpl_vars['vars']->value['pages'])){?>   
        
          <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vars']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
              
          <?php if (isset($_smarty_tpl->tpl_vars['row_id'])) {$_smarty_tpl->tpl_vars['row_id'] = clone $_smarty_tpl->tpl_vars['row_id'];
$_smarty_tpl->tpl_vars['row_id']->value = ('pagetable_').($_smarty_tpl->tpl_vars['p']->value['id']); $_smarty_tpl->tpl_vars['row_id']->nocache = null; $_smarty_tpl->tpl_vars['row_id']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_id'] = new Smarty_variable(('pagetable_').($_smarty_tpl->tpl_vars['p']->value['id']), null, 0);?>
          
          
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
             <td valign="top"><input type="checkbox" name="delpages[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
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
                        <th class="th_title">Tutuł</th>
                        <th class="th_date">Data publikacji</th>
                        <th class="th_date">Data aktualizacji</th>
                        <th class="th_icons">Widoczna</th>
                        <th class="th_icons">Główna</th>
                        <th class="th_icons">Edytuj</th>
                        </tr>
                </thead><tbody>
                    <?php if (isset($_smarty_tpl->tpl_vars['pageex'])) {$_smarty_tpl->tpl_vars['pageex'] = clone $_smarty_tpl->tpl_vars['pageex'];
$_smarty_tpl->tpl_vars['pageex']->value = $_smarty_tpl->tpl_vars['vars']->value['page_details'][$_smarty_tpl->tpl_vars['p']->value['id']]; $_smarty_tpl->tpl_vars['pageex']->nocache = null; $_smarty_tpl->tpl_vars['pageex']->scope = 0;
} else $_smarty_tpl->tpl_vars['pageex'] = new Smarty_variable($_smarty_tpl->tpl_vars['vars']->value['page_details'][$_smarty_tpl->tpl_vars['p']->value['id']], null, 0);?>
                                       
                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pageex']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value){
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                            <tr>
                            <td><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Flag16.png" /></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['page_ln'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['page_title'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['date_publish'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['date_update'];?>
</td>
                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/setVisible/<?php if ($_smarty_tpl->tpl_vars['details']->value['is_visible']){?>0<?php }else{ ?>1<?php }?>/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['details']->value['is_visible']){?><?php if ($_smarty_tpl->tpl_vars['details']->value['date_publish']>time()){?>star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"<?php }else{ ?>Star_full16.png " title="Ukryj"<?php }?><?php }else{ ?>Star_empty16.png" title="Pokaż"<?php }?> /></a></td>
                            <td><a title="Ustaw stronę jako domyślną dla tego języka" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/setMain/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['page_ln'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['details']->value['is_main']){?>Home16.png<?php }else{ ?>Info16.png<?php }?>"/></a></td>
                            <td><a title="Edytuj stronę" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/editPage/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['details']->value['page_ln'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_edit16.png" /></a></td>
                            </tr>
                     <?php } ?>
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top"><?php echo $_smarty_tpl->tpl_vars['p']->value['date_insert'];?>
<br/> <?php echo $_smarty_tpl->tpl_vars['p']->value['username'];?>
</td>
                <td valign="top"><a title="Usuń wszystkie strony oraz ich przypisania w menu!" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/deletePage/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
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
                    <th style="width:70%;">Nazwa strony</th>
                    <th>Data utworzenia</th>
                    <th style="width:40px;">Szybkie usuwanie</th>         
                </tr></tfoot></table>
             </form>
   <script>
    
    
   $(".cms_pages thead th:eq(0)").click(function(){
      var status =  $(this).children('div').hasClass('unlocked');
      $(this).children('div').toggleClass('unlocked');
      var table_id = $(".cms_pages").attr("id");
         if(status){
             $('.subtable_details').hide('fast');
             $(".cms_pages tbody tr td:nth-child(1) input:checkbox ").each(function(){
               var id = $(this).val();
               $.cookie('lockedtablerows['+table_id+'_'+id+']',false);
               
               });
               $(".cms_pages tbody tr td:nth-child(1)").each(function(){
               $(this).children('div').removeClass('unlocked');
               })
               
             
                
         } else {
                  $('.subtable_details').show('fast');
                  $(".cms_pages tbody tr td:nth-child(1) input:checkbox ").each(function(){
                  var id = $(this).val();
                  $.cookie('lockedtablerows['+table_id+'_'+id+']',true);
               });
               $(".cms_pages tbody tr td:nth-child(1)").each(function(){
               $(this).children('div').addClass('unlocked');
               })   
                }
   })
    /*
    $(".cms_pages thead tr th:eq(0), .cms_pages tfoot tr th:eq(0)").click(function(){
    var checkedStatus = this.checked;
    //$('.subtable_details').show();
    })  
    /*  
      var checkedStatus = this.checked;
      $(".cms_pages tfoot tr th:eq(1) input:checkbox, .cms_pages thead tr th:eq(1) input:checkbox").attr('checked',  checkedStatus);
      
      $(".cms_pages tbody tr td:nth-child(2) input:checkbox ").each(function(){
      this.checked = checkedStatus;
      })
      });
       
      /*  
      $(".cms_pages thead th:eq(0)").toggle(true,
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
      
      */
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