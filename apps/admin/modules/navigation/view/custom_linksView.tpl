{extends file='apps/admin/modules/navigation/view/template_menusView.tpl'} 
{block name='custom_links'}
    <form name="custom_link_form" id="custom_link_form" action="" method="POST"> 
    <div id="add-custom-links" class="postbox ">
              <div class="handlediv" title="Kliknij, aby przełączyć"><br></div>
              <h3 class="hndle"><span>Własne odnośniki</span></h3>
               <div class="inside">
	             <div class="customlinkdiv" id="customlinkdiv">
  			<p id="menu-item-url-wrap">
			<label class="howto" for="custom-menu-item-url">
                		<span>Adres URL</span>
                        		<input id="custom-link-url" name="custom-link-data[url]" type="text" class="code menu-item-textbox" value="http://">
          		</label>
          		</p>
      			<p id="menu-item-name-wrap">
                		<label class="howto" for="custom-menu-item-name">
                        		<span>Etykieta</span>
                               		<input id="custom-link-title" name="custom-link-data[title]" type="text" class="code menu-item-textbox" value="">
          			</label>
          		</p>
            		<p class="button-controls">
                            <img class="waiting" src="images/wpspin_light.gif" alt="">
                            <input type="hidden" name="page-type" value="link">
                            <input type="hidden" name="page-lang" value="">
                            <input type="hidden" name="menu-id" value="">
                            <input type="submit" class="button-secondary submit-add-to-menu" value="Dodaj do menu" name="add-post-type-menu-item" id="submit-posttype-page">
			</p>
                    </div>
          	</div>
    </div>
    </form>
{/block}