{extends file='apps/admin/modules/navigation/view/custom_linksView.tpl'} 
{block name='custom_pages'}

<form name="pages_form" id="pages_form" action="'.$_SERVER['PHP_SELF'].'?module=menus&action=addMenuPages" method="POST">
     <div id="add-page" class="postbox ">
        <div class="handlediv" title="Kliknij, aby przełączyć"><br></div>
          <h3 class="hndle"><span>Strony</span></h3>
          <div class="inside">
            <div id="posttype-page" class="posttypediv">
            <ul id="posttype-page-tabs" class="">
               <li class="tabs"><a class="nav-tab-link" href="#tabs-panel-posttype-page-most-recent">Wszystkie</a></li>
       	    </ul>
           <div id="tabs-panel-posttype-page-most-recent" class="tabs-panel">
	   <ul id="pagechecklist" class="">
           {if  !empty($vars.page_links) }       
           {foreach from=$vars.page_links item=p}
               
                <li>
                 <label class="menu-item-title">
                 <input type="checkbox" class="menu-item-checkbox" name="page-item[]" value="{$p['id']}">{$p['page_title']}
                 <input type="hidden" name="page-data[{$p['id']}][id]" value="{$p['id']}">
                 <input type="hidden" name="page-data[{$p['id']}][name]" value="{$p['name']}">
                 <input type="hidden" name="page-data[{$p['id']}][page_title]" value="{$p['page_title']}">
                 </label>
                 {if $p['date_publish']>= $smarty.now } <img src="{$vars.view_url}images/icons/clock10.png" style="float:right;" title="Publikacja z opóźnieniem {$p['date_publish']} "/>{/if}
                 {if $p['is_visible']} <img src="{$vars.view_url}images/icons/Star_empty10.png" style="float:right;" title="Ta strona jest ukryta"/>{/if}
                
                </li>
            {/foreach}
           {/if}
           </ul>
           </div>
           <p class="button-controls">
           <span class="list-controls">
            <a href="" class="select-all">Zaznacz wszystko</a>
           </span>
           <span class="add-to-menu">
           <img class="waiting" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" alt="">
           <input type="hidden" name="page-type" value="page">
           <input type="hidden" name="page-lang" value="{$p['page_ln']|default: ''}">
           <input type="hidden" name="menu-id" value="">
           <input type="submit" class="button-secondary submit-add-to-menu" value="Dodaj do menu" name="add-post-type-menu-item" id="submit-posttype-page">
           </span>
           </p>
          </div>
	 </div>
       </div>
</form>

{/block}