<div id="dialog-confirm" title={$vars['lang']['pages.dialog_confirm_title']}">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;display:none;"></span>
     UWAGA! Wszystkie strony,ich wersje językowe oraz przypisania w menu zostaną usunięte. Usunąć?
    </p>
</div>
    
    <form id="pages_form" action="{$vars.baseurl}admin/news/category/delete" class="allForms" method="POST">
    <div class="pageoverflow">
       
        <div class="pageheader">{$vars['lang']['category.category_list']}</div>
    </div>
    <div id="contentlist">
    <div class="pageoverflow">
    <p class="pageoptions">
        <a href="{$vars.baseurl}admin/category/create" class="pageoptions">
        <img src="{$vars.view_url}images/icons/File_add32.png" class="systemicon" alt="Dodaj nową kategorię" title="Dodaj nową kategorię" /></a>
        <a class="pageoptions" href="{$vars.baseurl}admin/category/create">Dodaj nową kategorę</a>
        <span class="separator">&nbsp;&nbsp;</span>
        <a href="javascript:document.forms['category_form'].submit();" class="pageoptions delete">
        <img src="{$vars.view_url}images/icons/File_delete32.png" class="systemicon" alt="Usuń zaznaczone kategorie" title="Usuń zaznaczone kategoire" /></a>
        <a class="pageoptions delete" href="">Usuń zaznaczone</a>
    </p>
    </div>
    </div>
    <table class="pagetable cms_pages pages" id="categorytable" cellspacing="0"  border="0" cellspacing="0" cellpadding="0">
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
      {if  !empty($vars.categories) }   
        
          {foreach from=$vars.categories item=p}
            
             <tr class="master" id="{$p['id']}">
             <td valign="top">
                 <div title="przełącz widok" class="rowlocker locked unlocked"></div><div style=""><input style="display:none;" type="checkbox" name="lockedtablerows[]" value="{$p['id']}" />
                 </div>
             </td>
             <td valign="top"><input type="checkbox" name="delpages[]" value="{$p['id']}" /></td>
             <td>{$p['id']}</td>
             <td style="width:0px;"></td>
             <td><h2>{$p['name']}</h2>
                <div class="subtable_details" style="display:block;">
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
                <td valign="top">{$p['date_insert']}</td>
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
          