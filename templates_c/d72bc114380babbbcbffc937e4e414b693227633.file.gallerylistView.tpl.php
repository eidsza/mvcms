<?php /* Smarty version Smarty-3.1.11, created on 2013-05-09 09:11:24
         compiled from "D:\xamppnew\htdocs\mvcms\apps\admin\modules\gallery\view\gallerylistView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32355518b2f5bf293e1-27211683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd72bc114380babbbcbffc937e4e414b693227633' => 
    array (
      0 => 'D:\\xamppnew\\htdocs\\mvcms\\apps\\admin\\modules\\gallery\\view\\gallerylistView.tpl',
      1 => 1368083478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32355518b2f5bf293e1-27211683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_518b2f5c4bf002_92806253',
  'variables' => 
  array (
    'vars' => 0,
    'g' => 0,
    'row_id' => 0,
    'row_unlocked' => 0,
    'p' => 0,
    'row_style' => 0,
    'galleryex' => 0,
    'details' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518b2f5c4bf002_92806253')) {function content_518b2f5c4bf002_92806253($_smarty_tpl) {?>
<div id="dialog-confirm" title=<?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['gallery.dialog_confirm_title'];?>
">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie galerie,ich wersje językowe oraz zdjęcia zostaną usunięte. Usunąć?
    </p>
</div>

    <div class="pageoverflow">
    <div class="pageheader"><?php echo $_smarty_tpl->tpl_vars['vars']->value['lang']['gallery.gallery_list'];?>
</div>
     <div class="newgalleryform">
     <form id="new_gallery" action="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/addGallery" class="" method="post">
       <label>Dodaj nową galerię: </label>
            <input type="text"  name="gallery_name"/><input type="submit" value="Dodaj" />
            <input type="hidden" name="gallery_lang" value="pl" />
            <input type="hidden" name="gallery_username" value="<?php echo $_smarty_tpl->tpl_vars['vars']->value['userinfo']['username'];?>
">
      </form>
     </div> 
    <form id="gallery_form" name="gallery_form" action="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/deleteGallery" class="allForms" method="POST">
  
       
      
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/showDescription/1" class="pageoptions">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_info32.png" class="systemicon" alt="Pokaż opisy galerii" title="Pokaż opisy galerii" /></a>
        <a class="pageoptions" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/showDescription/1">Pokaż opisy galerii</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/showDescription/0" class="pageoptions">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File32.png" class="systemicon" alt="Ukryj opisy galerii" title="Ukryj opisy galerii" /></a>
        <a class="pageoptions" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/showDescription/0">Ukryj opisy galerii</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['gallery_form'].submit();" class="pageoptions delete">
        <img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone strony" title="Usuń zaznaczone strony" /></a>
        <a class="pageoptions delete" href="">Usuń zaznaczone</a>
    </p>
    </div>
    </div>
    <table class="pagetable cms_pages gallery" id="pagetable" cellspacing="0"  border="0" cellspacing="0" cellpadding="0">
     <thead>
     <tr>
        <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked unlocked"></div></th>
        <th style="width:40px;"><input type="checkbox"  value=""></th>
        <th style="width:20px;">ID<span class="iconsorting"></span></th>
        <th style="width:0px;"></th>
        <th style="width:70%;">Nazwa galerii<span class="iconsorting"></span></th>
        <th>Data utworzenia<span class="iconsorting"></span></th>
        <th style="width:40px;">Szybkie usuwanie<span class="iconsorting"></span></th>
      </tr>
      </thead>
      <tbody>
      <?php if (!empty($_smarty_tpl->tpl_vars['vars']->value['galleries'])){?>   
        
          <?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['vars']->value['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
              
          <?php if (isset($_smarty_tpl->tpl_vars['row_id'])) {$_smarty_tpl->tpl_vars['row_id'] = clone $_smarty_tpl->tpl_vars['row_id'];
$_smarty_tpl->tpl_vars['row_id']->value = ('pagetable_').($_smarty_tpl->tpl_vars['g']->value['id']); $_smarty_tpl->tpl_vars['row_id']->nocache = null; $_smarty_tpl->tpl_vars['row_id']->scope = 0;
} else $_smarty_tpl->tpl_vars['row_id'] = new Smarty_variable(('pagetable_').($_smarty_tpl->tpl_vars['g']->value['id']), null, 0);?>
          
          
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
           
             <tr class="master" id="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked <?php echo $_smarty_tpl->tpl_vars['row_unlocked']->value;?>
"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" />
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delpages[]" value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" /></td>
             <td><?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
</td>
             <td style="width:0px;"></td>
             <td><h2><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</h2>
             
                 <div class="subtable_details" style="<?php echo $_smarty_tpl->tpl_vars['row_style']->value;?>
">
                <table class="subtable" style="width:100%;">
                <thead><tr>
                        <th class="th_ln"><span class=""></span></th>
                        <th class="th_ln"></th>
                        <th class="th_title">Tutuł</th>
                        <th class="th_date">Data publikacji</th>
                        <th class="th_icons">Widoczna</th>
                        <th class="th_icons">Z opisem</th>
                        <th class="th_icons">Zarządzaj</th>
                        
                        </tr>
                </thead><tbody>
                    <?php if (isset($_smarty_tpl->tpl_vars['galleryex'])) {$_smarty_tpl->tpl_vars['galleryex'] = clone $_smarty_tpl->tpl_vars['galleryex'];
$_smarty_tpl->tpl_vars['galleryex']->value = $_smarty_tpl->tpl_vars['vars']->value['gallery_details'][$_smarty_tpl->tpl_vars['g']->value['id']]; $_smarty_tpl->tpl_vars['galleryex']->nocache = null; $_smarty_tpl->tpl_vars['galleryex']->scope = 0;
} else $_smarty_tpl->tpl_vars['galleryex'] = new Smarty_variable($_smarty_tpl->tpl_vars['vars']->value['gallery_details'][$_smarty_tpl->tpl_vars['g']->value['id']], null, 0);?>
                                       
                    <?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['galleryex']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value){
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>
                            <tr>
                            <td><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Flag16.png" /></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['lang'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['category_title'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['details']->value['date_publish'];?>
</td>
                            <td class="centered"><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/setVisible/<?php if ($_smarty_tpl->tpl_vars['details']->value['isVisible']){?>0<?php }else{ ?>1<?php }?>/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['details']->value['isVisible']){?><?php if ($_smarty_tpl->tpl_vars['details']->value['date_publish']>time()){?>star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"<?php }else{ ?>Star_full16.png " title="Ukryj"<?php }?><?php }else{ ?>Star_empty16.png" title="Pokaż"<?php }?> /></a></td>
                            <td class="centered"><a href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/setDescription/<?php if ($_smarty_tpl->tpl_vars['details']->value['isVisibleDescription']){?>0<?php }else{ ?>1<?php }?>/<?php echo $_smarty_tpl->tpl_vars['details']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['details']->value['isVisibleDescription']){?><?php if ($_smarty_tpl->tpl_vars['details']->value['date_publish']>time()){?>star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"<?php }else{ ?>Star_full16.png " title="Ukryj opisy"<?php }?><?php }else{ ?>Star_empty16.png" title="Pokaż opisy"<?php }?> /></a></td>
                            <td class="centered"><a title="Edytuj wpis" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/gallery/editGallery/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
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
                <td valign="top"><?php echo $_smarty_tpl->tpl_vars['g']->value['date_insert'];?>
<br/> <?php echo $_smarty_tpl->tpl_vars['g']->value['username'];?>
</td>
                <td valign="top"><a title="Usuń wszystkie wszystkie zaznaczone galerie!" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['baseurl'];?>
admin/page/deleteGallery/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/icons/Folder_delete16.png" /></a></td>
                </tr>  

          <?php } ?>
       <?php }?>   
      </tbody>
            <tfoot>
                <tr>
                    <th style="width:40px;"><div title="zablokuj widok wierszy" class="locked unlocked"></div></th>
                    <th style="width:40px;"><input type="checkbox"  value=""></th>
                    <th style="width:0px;"></th>
                    <th style="width:40px;">ID<span class="iconsorting"></span></th>
                    <th style="width:70%;">Nazwa galerii<span class="iconsorting"></span></th>
                    <th>Data utworzenia<span class="iconsorting"></span></th>
                    <th style="width:40px;">Szybkie usuwanie<span class="iconsorting"></span></th>   
                </tr></tfoot></table>
             </form>
   </div>          
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