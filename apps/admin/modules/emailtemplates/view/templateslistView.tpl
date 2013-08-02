<link rel="stylesheet" href="{$vars.view_url}css/6-jquery-ui-1.8.13.custom.css" type="text/css" media="all">
<div style="display:none;" id="dialog-confirm" title={$vars['lang']['category.dialog_confirm_title']}">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie szablony,  oraz wersje językowe zostaną usunięte. Usunąć?
    </p>
</div>
    
    <form id="newsForm" action="{$vars.baseurl}admin/news/category/delete" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader">{$vars['lang']['emailtemplates.list']}</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="{$vars.baseurl}admin/emailtemplates/create" class="pageoptions">
        <img src="{$vars.view_url}images/icons/Paste32.png" class="systemicon" alt="Dodaj nowy szablon" title="Dodaj nowy szablon" />
        </a>
        <a class="pageoptions" href="{$vars.baseurl}admin/emailtemplates/create">Dodaj nowy szablon</a>
        <span class="separator">&nbsp;&nbsp;</span>
        
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['categoryForm'].submit();" class="pageoptions delete">
        <img src="{$vars.view_url}images/icons/Paste_cut32.png" class="systemicon" alt="Usuń zaznaczone kategorie" title="Usuń zaznaczone kategorie" /></a>
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
      {if  !empty($vars.emailtemplates) }   
        
          {foreach from=$vars.emailtemplates item=p}
              {assign var='row_id' value=templatetable_|cat:$p['id']}
                 {if isset($smarty.cookies.lockedtablerows.$row_id) && $smarty.cookies.lockedtablerows.$row_id == 'true'} 
                    {assign var='row_style' value='display:block;'}
                    {assign var='row_unlocked'  value='unlocked'}
                {else} 
                    {assign var='row_style' value='display:none;'}
                    {assign var='row_unlocked'  value=''}
                {/if}    

             <tr class="master" id="{$p['id']}">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked {$row_unlocked}"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="{$p['id']}" {if $row_unlocked==''} checked="checked" {else}   {/if}/>
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delcats[]" value="{$p['id']}" /></td>
             <td>{$p['id']}</td>
             <td style="width:0px;"></td>
             <td><h2>{$p['name']}</h2>
                <div class="subtable_details" style="{$row_style}">
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
                    {assign var=pageex value=$vars.etpl_details[$p['id']]}
                                       
                    {foreach from=$pageex item=details}
                            <tr>
                            <td><img src="{$vars.view_url}images/icons/Flag16.png" /></td>
                            <td>{$details['lang']}</td>
                            <td>{$details['name']}</td>
                            <td></td>
                            <td>{$details['description']}</td>
                            <td></td>
                            <td><a href="{$vars.baseurl}admin/emailtemplates/setDefault/{if $details['is_default']}0{else}1{/if}/{$details['id']}"><img src="{$vars.view_url}images/icons/{if $details['is_default']}star_full16.png" title="Ukryj "{else}Star_empty16.png" title="Pokaż"{/if} /></a></td>
                            <td><a title="Edytuj artykuł" href="{$vars.baseurl}admin/emailtemplates/edit/{$p['id']}/{$details['id']}/{$details['lang']}"><img src="{$vars.view_url}images/icons/File_edit16.png" /></a></td>
                            </tr>
                     {/foreach}
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top">{$p['date_insert']}</td>
                <td valign="top"><a title="Usuń wszystkie kategorie!" href="{$vars.baseurl}admin/emailtemplates/delete/{$p['id']}"><img src="{$vars.view_url}images/icons/Folder_delete16.png" /></a></td>
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
                    <th style="width:70%;">Nazwa szablonu</th>
                    <th>Data utworzenia</th>
                    <th style="width:40px;">Usuwanie</th>         
                </tr></tfoot></table>
             </form>

      
    <script>
    {literal}       
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

    {/literal}
   </script>               