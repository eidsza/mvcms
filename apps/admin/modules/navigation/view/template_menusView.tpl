{extends file='apps/admin/modules/navigation/view/navigationView.tpl'} 
{block name='template_menus'} 
<form name="template_menu_form" id="template_menu_form" action="" method="POST">
     <div id="nav-menu-theme-locations" class="postbox ">
        <div class="handlediv" title="Kliknij, aby przełączyć"><br></div>
        <h3 class="handle"><span>Menu dostępne w szablonie</span></h3>
          <div class="inside">
            <p class="howto">Twój motyw obsługuje {$vars.template_navigation_blocks|count} menu. Wybierz menu, które chcesz umieścić na witrynie.</p>
            {foreach from=$vars.template_navigation_blocks item=menu}	
            <p>
             <label class="howto" for="locations-primary">
              <span>{$menu['module_name']}</span>
                  <select name="menu-locations[{$menu['module_id_attr']}]" id="locations">
                      <option value="0"></option>
                      {foreach from=$vars.navigation item=nav}
                          
            		<option value="{$nav['id']}" {if $nav['id']==$menu['fk_module_id']} selected="selected" {/if} > {$nav['name']}
                      </option>
                      {/foreach}
                  </select>
	     </label>
	    </p>
            {/foreach}
            <p class="button-controls">
	    <img class="waiting" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" alt="">
	    <input type="submit" name="nav-menu-locations" id="nav-menu-locations" class="button-primary" value="Zapisz">
            </p>
	</div>
</div>
</form>
{/block} 
