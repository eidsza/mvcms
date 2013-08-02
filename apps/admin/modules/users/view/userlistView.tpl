<link rel="stylesheet" href="{$vars.view_url}css/6-jquery-ui-1.8.13.custom.css" type="text/css" media="all">
<div id="dialog-confirm" title={$vars['lang']['users.dialog_confirm_title']}">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszyscy wybrani użytkownicy zostaną usunięci. Usunąć?
    </p>
</div>

    
    <form id="pages_form" action="{$vars.baseurl}admin/user/delete" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader">{$vars['lang']['users.user_list']}</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="{$vars.baseurl}admin/users/create" class="pageoptions">
        <img src="{$vars.view_url}images/icons/File_add32.png" class="systemicon" alt="Dodaj nowego uzytkownika" title="Dodaj nowego użytkownika" /></a>
        <a class="pageoptions" href="{$vars.baseurl}admin/users/create">Dodaj nowego użytkownika</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['pages_form'].submit();" class="pageoptions delete">
        <img src="{$vars.view_url}images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone" title="Usuń zaznaczone" /></a>
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
      {if  !empty($vars.users) }   
        
          {foreach from=$vars.users item=p}
              
          {assign var='row_id' value=usertable_|cat:$p['id']}
          
          
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
             <td valign="top"><input type="checkbox" name="delusers[]" value="{$p['id']}" /></td>
             <td>{$p['id']}</td>
             <td style="width:0px;"></td>
             <td><h2>{$p['username']}</h2>
             
                 <div class="subtable_details" style="{$row_style}">
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
                            <td><img src="{$vars.view_url}images/icons/User16.png" /></td>
                            <td></td>
                            <td>{$p['firstname']}</td>
                            <td>{$p['lastname']}</td>
                            <td>{$p['email']}</td>
                            <td>{$p['logintime']}</td>
                            <td><a href="{$vars.baseurl}admin/user/setLevel/{if $p['userlevel']==3}0{else}1{/if}/{$p['userlevel']}"><img src="{$vars.view_url}images/icons/star_half_full16.png" title="Ukryj (jeszcze nie opublikowana)"/></a></td>
                            <td><a title="Edytuj profil" href="{$vars.baseurl}admin/users/edit/{$p['id']}"><img src="{$vars.view_url}images/icons/File_edit16.png" /></a></td>
                            </tr>
                   
                 </tbody>
                    </table>
                  </div>
                 </td>
                <td valign="top">{$p['reg_date']}</td>
                <td valign="top"><a title="Usuń tego użytkownika" href="{$vars.baseurl}admin/user/delete/{$p['id']}"><img src="{$vars.view_url}images/icons/User_delete16.png" /></a></td>
                </tr>  

          {/foreach}
       {/if}   
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