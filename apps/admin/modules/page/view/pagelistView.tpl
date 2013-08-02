
<div id="dialog-confirm" title={$vars['lang']['pages.dialog_confirm_title']}">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie strony,ich wersje językowe oraz przypisania w menu zostaną usunięte. Usunąć?
    </p>
</div>

    
    <form id="pages_form" action="{$vars.baseurl}admin/page/deletePage" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader">{$vars['lang']['pages.page_list']}</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="{$vars.baseurl}admin/page/addPage" class="pageoptions">
        <img src="{$vars.view_url}images/icons/File_add32.png" class="systemicon" alt="Dodaj nową treść" title="Dodaj nową treść" /></a>
        <a class="pageoptions" href="{$vars.baseurl}admin/page/addPage">Dodaj nową treść</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['pages_form'].submit();" class="pageoptions delete">
        <img src="{$vars.view_url}images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone strony" title="Usuń zaznaczone strony" /></a>
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
      {if  !empty($vars.pages) }   
        
          {foreach from=$vars.pages item=p}
              
          {assign var='row_id' value=pagetable_|cat:$p['id']}
          
          
           {if isset($smarty.cookies.lockedtablerows.$row_id) && $smarty.cookies.lockedtablerows.$row_id == 'true'} 
                 {assign var='row_style' value='display:block;'}
                 {assign var='row_unlocked'  value='unlocked'}
            {else} 
                {assign var='row_style' value='display:none;'}
                {assign var='row_unlocked'  value=' '}
            {/if}    
           
             <tr class="master" id="{$p['id']}">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked {$row_unlocked}"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="{$p['id']}" />
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delpages[]" value="{$p['id']}" /></td>
             <td>{$p['id']}</td>
             <td style="width:0px;"></td>
             <td><h2>{$p['name']}</h2>
             
                 <div class="subtable_details" style="{$row_style}">
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
                    {assign var=pageex value=$vars.page_details[$p['id']]}
                                       
                    {foreach from=$pageex item=details}
                            <tr>
                            <td><img src="{$vars.view_url}images/icons/Flag16.png" /></td>
                            <td>{$details['page_ln']}</td>
                            <td>{$details['page_title']}</td>
                            <td>{$details['date_publish']}</td>
                            <td>{$details['date_update']}</td>
                            <td><a href="{$vars.baseurl}admin/page/setVisible/{if $details['is_visible']}0{else}1{/if}/{$details['id']}"><img src="{$vars.view_url}images/icons/{if $details['is_visible']}{if $details['date_publish'] > $smarty.now}star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"{else}Star_full16.png " title="Ukryj"{/if}{else}Star_empty16.png" title="Pokaż"{/if} /></a></td>
                            <td><a title="Ustaw stronę jako domyślną dla tego języka" href="{$vars.baseurl}admin/page/setMain/{$details['id']}/{$details['page_ln']}"><img src="{$vars.view_url}images/icons/{if $details['is_main']}Home16.png{else}Info16.png{/if}"/></a></td>
                            <td><a title="Edytuj stronę" href="{$vars.baseurl}admin/page/editPage/{$p['id']}/{$details['id']}/{$details['page_ln']}"><img src="{$vars.view_url}images/icons/File_edit16.png" /></a></td>
                            </tr>
                     {/foreach}
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top">{$p['date_insert']}<br/> {$p.username}</td>
                <td valign="top"><a title="Usuń wszystkie strony oraz ich przypisania w menu!" href="{$vars.baseurl}admin/page/deletePage/{$p['id']}"><img src="{$vars.view_url}images/icons/Folder_delete16.png" /></a></td>
                </tr>  

          {/foreach}
       {/if}   
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