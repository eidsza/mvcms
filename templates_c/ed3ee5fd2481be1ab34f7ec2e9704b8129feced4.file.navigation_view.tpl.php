<?php /* Smarty version Smarty-3.1.11, created on 2013-07-22 14:20:02
         compiled from "D:\xamppnew\htdocs\mvcms\apps\admin\modules\navigation\view\navigation_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2168518a1118de0443-07821099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed3ee5fd2481be1ab34f7ec2e9704b8129feced4' => 
    array (
      0 => 'D:\\xamppnew\\htdocs\\mvcms\\apps\\admin\\modules\\navigation\\view\\navigation_view.tpl',
      1 => 1374495599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2168518a1118de0443-07821099',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_518a1118e95846_34292575',
  'variables' => 
  array (
    'vars' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a1118e95846_34292575')) {function content_518a1118e95846_34292575($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
css/navigation.css" type="text/css" media="all">
<div class="pageoverflow">
 <div class="pageheader">Budowanie menu </div>
</div>

    
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

   
    $vars = $template->get_template_vars('vars');    
    $view_url = $vars['view_url'];
    
    $menuitems = $vars['menu_items'];
    $navigatin_blocks = $vars["template_navigation_blocks"];
    $page_links_all = $vars['page_links']['all'];
    $page_links_today = $vars['page_links']['today'];
    $navigation = $vars["navigation"];
 
   //print_r($navigation); 

    $form = new Form('tempaltemenus');
    $form->setAttributes(
        array(
        "action"=>$vars['action'].'/update/',
        "labelPaddingTop"=>"1em",
        "preventJQueryUILoad"=>0,
        "preventDefaultCSS"=>0,
        "id"=>"template_menu_form",
        "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/'
    ));
    $form->addHidden('current_nav_id', session::get('current_nav_tab'));
    $form->addHidden('current_nav_ln', session::get('current_nav_ln'));
    $form->addHidden('menuitem_data[current_menu]', session::get('current_nav_tab'));
    $form->addHidden('menuitem_data[menu_items_array]','',array("id"=>"menu_items_array"));
    $form->addHtmlexternal('<div id="contentlist">
    <div id="nav-menus-frame">
     <div id="menu-settings-column" class="metabox-holder">
       <div id="side-sortables" class="meta-box-sortables ui-sortable">');
    if (count($navigatin_blocks) > 0){
    
        $form->addHTMLExternal('<div id="add-custom-form-locations" class="postbox">
          <div class="handlediv" title="Kliknij, aby przełączyć"><br></div>
          <h3 class="hndle"><span>Menu dostępne w szablonie</span></h3>
          <div class="inside" style="display:'.( isset($_COOKIE['add-custom-form-locations']) ? $_COOKIE['add-custom-form-locations'] : 'none' ).'">
          <p class="howto">Twój motyw obsługuje'.count( $navigatin_blocks).' typów menu. Wybierz menu, które chcesz umieścić na witrynie.</p>');
   
        foreach($navigatin_blocks  as $menu){
          
          $form->addSelect($menu['module_name'], "menu_locations[".$menu['module_id_attr']."]",  $menu['fk_module_id'] ,$vars['navigation']);  
        }
     
    $form->addHTMLExternal('<p class="button-controls"><img class="waiting" src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/wpspin_light.gif" alt="" /></p>');
    $form->addButton("Zapisz","submit",array("name"=>"save_menu_locations", "id"=>"nav-menu-locations"));
    $form->addHTMLExternal('</p></p></div></div>');
    }
   
   
      //  var_dump($_COOKIE['add-custom-form-locations']);
    //page block
        $form->addHTMLExternal('<div id="add-custom-form-pages" class="postbox">
        <div class="handlediv" title="Kliknij, aby przełączyć"><br></div>
        <h3 class="hndle"><span>Dostępne strony</span></h3>
        <div class="inside" style="display:'.(isset($_COOKIE['add-custom-form-pages']) ? $_COOKIE['add-custom-form-pages'] : 'none').'"><div class="customlinkdiv" id="customlinkdiv">
        ');
        $form->addHTMLExternal('<div class="tabs" id="tabs">
        <ul class="tab-menu">
        <li><a href="#pages-all"><span>Wszystkie</span></a></li>
        <li><a href="#pages-today"><span>Dziś dodane</a></li>
        </ul>');
        $form->addHTMLExternal('<div class="form-inputs" id="pages-all">');
      
        
        if (count($page_links_all) > 0)
        {    
             $form->addHtmlExternal('<ul id="pagechecklist" class="">');
             foreach($page_links_all as $p)
             {
                   
                 //$form->addCheckbox('','page-item[]','',$page_links);
                 $form->addHtmlExternal('<li title="'.$p['page_title'].'"><input type="checkbox" class="menu-item-checkbox" name="page_item[]" value="'.$p['id'].'" title="'.$p['page_title'].'"><a href="'.BASEURL.'admin/page/editPage/'.$p['id'].'/'.$p['PID'].'/'.session::get('current_nav_ln').'">'.$p['name'].'</a></li>');
                 $form->addHidden('page_data['.$p['id'].'][id]',$p['id']);
                 $form->addHidden('page_data['.$p['id'].'][name]',$p['name']);
                 $form->addHidden('page_data['.$p['id'].'][page_title]', $p['page_title']);
                 $form->addHidden('page_data['.$p['id'].'][oryginal_name]', $p['page_title']);
             }
            $form->addHtmlExternal('</ul>');     
                
        }

        $form->addHTMLExternal('</div>');
        $form->addHTMLExternal('<div class="form-inputs" id="pages-today">');
        if (count($page_links_today) > 0)
        {    
             $form->addHtmlExternal('<ul id="pagechecklist" class="">');
             foreach($page_links_today as $p)
             {
                   
                 //$form->addCheckbox('','page-item[]','',$page_links);
                 $form->addHtmlExternal('<li><input type="checkbox" class="menu-item-checkbox" name="page_item[]" value="'.$p['id'].'">'.$p['page_title'].'</li>');
                 $form->addHidden('page_data['.$p['id'].'][id]',$p['id']);
                 $form->addHidden('page_data['.$p['id'].'][name]',$p['name']);
                 $form->addHidden('page_data['.$p['id'].'][page_title]', $p['page_title']);
             }
            $form->addHtmlExternal('</ul>');     
                
        }

        $form->addHTMLExternal('</div></div></div>');
        
        $form->addHTMLExternal('<p class="button-controls"><img class="waiting" src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/wpspin_light.gif" alt="" />');    
        $form->addHTMLExternal('<a class="select-all" href="">zaznacz/odznacz</a>');        
        $form->addButton('Dodaj do menu', 'Submit', array("name"=>"add_page"));  
        $form->addHTMLExternal('</p></div></div>');
        
         //formularz do linków
       
        $form->addHTMLExternal('<div id="add-custom-form-links" class="postbox ">
        <div class="handlediv" title="Kliknij, aby przełączyć"><br></div>
        <h3 class="hndle"><span>Własne odnośniki</span></h3>
        <div class="inside"  style="display:'.(isset($_COOKIE['add-custom-form-links']) ? $_COOKIE['add-custom-form-links'] : 'none').'">
        <div class="customlinkdiv" id="customlinkdiv">');
        
        $form->addTextBox('Link zewnętrzy','link_data[link]','http://',array("tooltip"=>"Dodaje do menu zewnętrzny link, niezależnie od pozostałych stron.","style"=>"width:258px;"));
        $form->addTextBox('Etykieta linku','link_data[name]','',array("tooltip"=>"Nazwa linku widoczna w menu","style"=>"width:258px;"));
        $form->addTextBox('Atrybut title','link_data[title]','',array("tooltip"=>"Tytuł linku widoczny po najechaniu myszą na odnośnik. Jeśli pozostawisz pusty przyjmie wartość z pola 'Etykieta linku'.","style"=>"width:258px;"));
        $form->addSelect('Target','link_data[target]','',array("_blank"=>"Nowe okno","_self"=>"To samo okno","_top"=>"Pełne okno przeglądarki"), array("tooltip"=>"Określa sposób otwierania nowododanego linku.","style"=>"width:258px;"));
        $form->addHTMLExternal('<p class="button-controls"><img class="waiting" src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
images/wpspin_light.gif" alt="" /></p>');
        $form->addButton('Dodaj do menu', 'Submit', array("name"=>"add_custom_link"));
        $form->addHTMLExternal('<p></p></div></div></div></div>');
        $form->addhtmlexternal('</div>');
        

        // menu tabs form
        
        $form->addHtmlExternal('
        <div id="menu-management-liquid">
            <div id="menu-management">'); 
        $form->addHtmlExternal('
            <div id="tabs-nav">
            <ul class="tab-menu">');
            foreach($navigation as $k=>$v){
            $form->addHtmlExternal('<li><a class="'.(isset($_SESSION['current_nav_tab']) && $_SESSION['current_nav_tab']==$k ? 'selected' : '').'" href="'.$vars['action'].'/index/?tab='.$k.'">'.$v.'</a></li>');
            }
            $form->addHtmlExternal('<li><a  class="'.(isset($_SESSION['current_nav_tab']) && $_SESSION['current_nav_tab']==0 ? 'selected' : '').'" href="'.$vars['action'].'/index/?tab=0">+</a></li>');    
            $form->addHtmlExternal('
            </ul>
                </div><div class="menu-edit">
                <div id="nav-menu-header">
                <div id="submitpost" class="submitbox">');
            $form->addHtmlExternal('<div class="menu_form_container"><div class="nav-menu-header-form" style="">');
            $form->addTextbox('Nazwa menu',"menuitem_data[name]" , ((session::get('current_nav_tab')==0 || !array_key_exists(session::get('current_nav_tab'),$navigation))  ? 'Nowe menu': $navigation[session::get('current_nav_tab')]), array("title"=>"Tutaj wprowadź nazwę menu","style"=>"width:200px;","tooltip"=>"Wpisz nazwę nowego menu i kliknij guzik 'Zapisz' aby zapisać. Aby usunąć wybrane menu należy kliknąć przysick 'Usuń to menu'."));    
            $form->addHtmlExternal('</div>');    
            $form->addHtmlExternal('<div class="nav-menu-header-langs"><span>Dostępne wersje językowe: </span>'.menu_supported_langs($vars['supported_langs'],BASEURL.'admin/navigation/',session::get('current_nav_ln')).'</div><div class="clear"></div></div>');
                    
            $form->addHtmlExternal('<div class="major-publishing-actions">');
            if(session::get('current_nav_tab')!= 1 ) $form->addButton('Usuń to menu','submit',array("name"=>"delete_menu"));
            $form->addButton('Zapisz menu','submit',array("name"=>"save_menu"));
            $form->addHtmlExternal('</div>
            </div></div>'); 
            $form->addHtmlExternal('<div id="post-body">');
            
            /// menuitems widget
            //var_dump($menuitems);
            if (!empty($menuitems)){
            $form->addHtmlExternal('<ul class="menu ui-sortable" id="menu-to-edit">');
                $currentDepth=1;
                foreach($menuitems as $m){
                $ul = ulli($currentDepth,$m['depth']);
                    //$currentDepth = $m['depth'];
                $currentDepth = $m['depth'];   
                $form->addHtmlExternal($ul); 
                $form->addHtmlExternal('<li id="menu-item-'.$m['menu_page_id'].'" class="menu-item menu-item-page menu-item-edit-active menu-item-depth-'.$m['depth'].'">');
                $form->addHtmlExternal('<div><dl class="menu-item-bar"><dt class="menu-item-handle">');
                $form->addHtmlExternal('<span class="item-title '.($m['is_visible'] ? '' : 'is_hidden').'" title="'.$m['name'].'" >'.str_truncate($m['name'],40).'&nbsp;&nbsp;'.(($m['page_type'] == 'link') ? '<img title="Link zewnętrzny" src="'.$view_url.'images/icons/Link10.png" />': '<img title="Link do strony" src="'.$view_url.'images/icons/Doc_edit10.png" />').'</span><span class="item-controls">');
                $form->addHtmlExternal('<span class="item-type">'.(($m['page_type'] == 'page') ? 'Stronę' : (($m['page_type'] == 'link') ? 'Link': '') ).'</span>
                <a class="item-edit"  title="Edytuj ten element menu"></a>
                   <a class="item-delete" title="Usuń ten element menu i wszystkie podrzędne" href="'.BASEURL.'admin/navigation/deleteitem/'.session::get('current_nav_tab').'/'.$m['menu_page_id'].'"></a>
                   '.($m['is_visible'] ? '<a class="item-show" title="Ukryj ten element menu" href="'.BASEURL.'admin/navigation/showhide/'.$m['id'].'"></a>':'<a class="item-hide" title="Pokaż ten element menu" href="'.BASEURL.'admin/navigation/showhide/'.$m['id'].'"></a>').'
                </span></dt></dl>');
                $form->addHtmlExternal('<div class="menu-item-settings" >
                <p class="description description-thin">
		<label for="menuiten_data['.$m['menu_page_id'].'][name]">Etykieta nawigacji<br />
                <input type="text" id="menuitem_data[items]['.$m['menu_page_id'].'][name]" class="widefat edit-menu-item-title" name="menuitem_data[items]['.$m['id'].'][name]" value="'.$m['name'].'">');
                $form->addHtmlExternal('</label></p><p class="description description-thin">
                <label for="menuitem_data['.$m['menu_page_id'].'][title]">Atrybut "Tytuł"<br />
  		<input type="text" id="menuitem_data[items]['.$m['menu_page_id'].'][title]" class="widefat edit-menu-item-attr-title" name="menuitem_data[items]['.$m['id'].'][title]" value="'.$m['title'].'">
  		</label></p>');
                
                $form->addHtmlExternal('<div class="menu-item-actions description-wide submitbox">
                <p class="link-to-original">
		Oryginalny: <a href="'.$m['oryginal_name'].'">'.$m['oryginal_name'].'</a>
                </p>
                             
		Usuń:<a class="submitdelete deletion" id="delete_page['.$m['menu_page_id'].'][id]" href="'.BASEURL.'admin/navigation/deleteitem/'.session::get('current_nav_tab').'/'.$m['menu_page_id'].'">Ten element i podrzędne</a>
                &nbsp;&nbsp;'.($m['is_visible'] ? 'Ten element jest widoczny' : 'Ten element jest ukryty').'&nbsp;|&nbsp;<a href="'.BASEURL.'page/'.$m['menu_page_id'].'">zobacz</a>						
		</div><input type="hidden" name="menuitem-data['.$m['menu_page_id'].'][id]" value="'.$m['menu_page_id'].'"></div></div>');
                //$form->addHtmlExternal($ul); 
                   
                }
            $form->addHtmlExternal('</li></ul>');
            } else if (session::get('current_nav_tab')!=0)
                $form->addHtmlExternal('<p>Wybierz elementy menu (strony, odnośniki) z obszarów znajdujących się po lewej stronie i klinij guzik "Dodaj do menu" aby dodać wybraną stronę lub odnośnik do menu.</p>');
              else $form->addHtmlExternal('<p>Aby utworzyć własne menu, nadaj mu nazwę powyżej i kliknij "Utwórz menu", a następnie wybierz elementy takie, jak strony lub własne odnośniki z lewej kolumny, aby je w nim umieścić. Po dodaniu pożądanych elementów, uporządkuj je wedle woli poprzez klikanie i przeciąganie ich. Możesz także kliknąć każdy element, aby uzyskać dostęp do dodatkowych opcji konfiguracji. Kiedy ukończysz tworzenie swojego własnego menu, nie zapomnij kliknąć przycisku "Zapisz menu".</p>');
              
   
            
            $form->addHtmlExternal('</div>');
            $form->addHtmlExternal('<div id="nav-menu-footer"><div class="major-publishing-actions"><div class="publishing-action">');
            $form->addButton('Zapisz menu','submit',array("name"=>"save_menu"));
            $form->addHtmlExternal('</div></div></div>');
            $form->addHtmlExternal('</div>');
            
        $form->render();
       <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

   
    </div>
</div>
</div>
</div>
       

<script src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
js/jquery.ui.nestedSortable.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
js/99-jquery.cookie.js"></script>
  
 <script type="text/javascript">
 //<![CDATA[
    
$(function(){
    var tabContainers = $('div#tabs > div');
      tabContainers.hide().filter(':first').show();
			
			$('div#tabs ul.tab-menu a').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div#tabs ul.tab-menu a').removeClass('selected');
				$(this).addClass('selected');
				return false;
			}).filter(':first').click(); 
    
   $("a.select-all").toggle(
      function() {
            $("ul#pagechecklist li input:checkbox").each(function(){
      this.checked = 1;
      })},
      //return false;
      function() {
            $("ul#pagechecklist li input:checkbox").each(function(){
      this.checked = 0;
      })} 
    ); 
    
     $("a.item-edit").click(function(){
        $(this).parent().parent().parent().parent().find("div.menu-item-settings").slideToggle('fast');
     });
     
     $("div.handlediv").click(function(){
      div = $(this).parent().find("div.inside");
      id = $(this).parent().attr("id");  
      
             if ( $(div).is(':visible')) {
                        $(div).hide(300);
                        $.cookie(id, 'none' ); 
                        
                        //alert(id);
         
         }else {
                        $(div).show(300);
                        $.cookie(id, 'block' ); 
             }                  
      
      
     
     });
     /*
     $("div.handlediv").toggle(
      function() {
      div = $(this).parent().find("div.inside");
      id = $(this).parent().attr("id");  
             if ( $(div).is(':visible')) {
                        $(div).hide(300);
                        $.cookie('hidden_panel[' + id +']', 'none' ); 
         
         }else {
                        $(div).show(300);
                        $.cookie('hidden_panel[' + id +']', 'block' ); 
             }                  
      
      },
      
      function() {
      div = $(this).parent().find("div.inside");
      id = $(this).parent().attr("id"); 
          if ( $(div).is(':hidden'))  {
                        $(div).show(300);
                        $.cookie('hidden_panel['+id+']', 'block');
          }else {
                        $(div).hide(300);
                        $.cookie('hidden_panel[' + id +']', 'none' ); 
             }                                   
      
      } 
    );
    
   
  /** nested sortable **/ 
      var nestedArray;
          
      $('ul.ui-sortable').nestedSortable({
      stop: function() {
      nestedArray = $('ul.ui-sortable').nestedSortable('toArray',{startDepthCount: 0});
      var serstring;
      for( index in nestedArray )
      {
      serstring += '|'+nestedArray[index]['item_id']+':'+nestedArray[index]['parent_id']+':'+nestedArray[index]['depth']+':'+nestedArray[index]['left']+':'+nestedArray[index]['right'];
      }
      $('#menu_items_array').val(serstring);
      },
      forcePlaceholderSize: true,
      items: 'li',
      helper: 'clone',
      maxLevels: 3,
      listType:'ul',
      opacity: .6,
      placeholder: 'placeholder',
      revert: 250,
      tabSize: 25,
      tolerance: 'pointer',
      toleranceElement: '> div'
     });    

 }); 
 //]]>      
  </script> 

              <?php }} ?>