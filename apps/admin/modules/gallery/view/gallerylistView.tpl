
<div id="dialog-confirm" title={$vars['lang']['gallery.dialog_confirm_title']}">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie galerie,ich wersje językowe oraz zdjęcia zostaną usunięte. Usunąć?
    </p>
</div>

    <div class="pageoverflow">
    <div class="pageheader">{$vars['lang']['gallery.gallery_list']}</div>
     <div class="newgalleryform">
     <form id="new_gallery" action="{$vars.baseurl}admin/gallery/addGallery" class="" method="post">
       <label>Dodaj nową galerię: </label>
            <input type="text"  name="gallery_name"/><input type="submit" value="Dodaj" />
            <input type="hidden" name="gallery_lang" value="pl" />
            <input type="hidden" name="gallery_username" value="{$vars['userinfo']['username']}">
      </form>
     </div> 
    <form id="gallery_form" name="gallery_form" action="{$vars.baseurl}admin/gallery/deleteGallery" class="allForms" method="POST">
  
       
      
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="{$vars.baseurl}admin/gallery/showDescription/1" class="pageoptions">
        <img src="{$vars.view_url}images/icons/File_info32.png" class="systemicon" alt="Pokaż opisy galerii" title="Pokaż opisy galerii" /></a>
        <a class="pageoptions" href="{$vars.baseurl}admin/gallery/showDescription/1">Pokaż opisy galerii</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="{$vars.baseurl}admin/gallery/showDescription/0" class="pageoptions">
        <img src="{$vars.view_url}images/icons/File32.png" class="systemicon" alt="Ukryj opisy galerii" title="Ukryj opisy galerii" /></a>
        <a class="pageoptions" href="{$vars.baseurl}admin/gallery/showDescription/0">Ukryj opisy galerii</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['gallery_form'].submit();" class="pageoptions delete">
        <img src="{$vars.view_url}images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone strony" title="Usuń zaznaczone strony" /></a>
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
      {if  !empty($vars.galleries) }   
        
          {foreach from=$vars.galleries item=g}
              
          {assign var='row_id' value=pagetable_|cat:$g['id']}
          
          
           {if isset($smarty.cookies.lockedtablerows.$row_id) && $smarty.cookies.lockedtablerows.$row_id == 'true'} 
                 {assign var='row_style' value='display:block;'}
                 {assign var='row_unlocked'  value='unlocked'}
            {else} 
                {assign var='row_style' value='display:none;'}
                {assign var='row_unlocked'  value=' '}
            {/if}    
           
             <tr class="master" id="{$g['id']}">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked {$row_unlocked}"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="{$p['id']}" />
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delpages[]" value="{$g['id']}" /></td>
             <td>{$g['id']}</td>
             <td style="width:0px;"></td>
             <td><h2>{$g['name']}</h2>
             
                 <div class="subtable_details" style="{$row_style}">
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
                    {assign var=galleryex value=$vars.gallery_details[$g['id']]}
                                       
                    {foreach from=$galleryex item=details}
                            <tr>
                            <td><img src="{$vars.view_url}images/icons/Flag16.png" /></td>
                            <td>{$details['lang']}</td>
                            <td>{$details['category_title']}</td>
                            <td>{$details['date_publish']}</td>
                            <td class="centered"><a href="{$vars.baseurl}admin/gallery/setVisible/{if $details['isVisible']}0{else}1{/if}/{$details['id']}"><img src="{$vars.view_url}images/icons/{if $details['isVisible']}{if $details['date_publish'] > $smarty.now}star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"{else}Star_full16.png " title="Ukryj"{/if}{else}Star_empty16.png" title="Pokaż"{/if} /></a></td>
                            <td class="centered"><a href="{$vars.baseurl}admin/gallery/setDescription/{if $details['isVisibleDescription']}0{else}1{/if}/{$details['id']}"><img src="{$vars.view_url}images/icons/{if $details['isVisibleDescription']}{if $details['date_publish'] > $smarty.now}star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"{else}Star_full16.png " title="Ukryj opisy"{/if}{else}Star_empty16.png" title="Pokaż opisy"{/if} /></a></td>
                            <td class="centered"><a title="Edytuj wpis" href="{$vars.baseurl}admin/gallery/editGallery/{$g['id']}/{$details['id']}/{$details['lang']}"><img src="{$vars.view_url}images/icons/File_edit16.png" /></a></td>
                            </tr>
                     {/foreach}
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top">{$g['date_insert']}<br/> {$g.username}</td>
                <td valign="top"><a title="Usuń wszystkie wszystkie zaznaczone galerie!" href="{$vars.baseurl}admin/page/deleteGallery/{$g['id']}"><img src="{$vars.view_url}images/icons/Folder_delete16.png" /></a></td>
                </tr>  

          {/foreach}
       {/if}   
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
    {literal}
    
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
     
    {/literal}
   </script>     