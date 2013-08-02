<?php /* Smarty version Smarty-3.1.11, created on 2013-06-28 09:40:40
         compiled from "D:\xamppnew\htdocs\mvcms\apps\admin\modules\gallery\view\galleryForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:732451c0103f0c0e33-63543848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08de031bebf01c5578769dc41b73cc1d82380ff5' => 
    array (
      0 => 'D:\\xamppnew\\htdocs\\mvcms\\apps\\admin\\modules\\gallery\\view\\galleryForm.tpl',
      1 => 1372405234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '732451c0103f0c0e33-63543848',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c0103f4eaef3_72634641',
  'variables' => 
  array (
    'vars' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c0103f4eaef3_72634641')) {function content_51c0103f4eaef3_72634641($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
css/page.css" type="text/css" media="all">
<section class="title">
    <h4>Edycja galerii <span class="page_subtitle"><?php echo $_smarty_tpl->tpl_vars['vars']->value['gallery']['gallery_title'];?>
 / <?php echo $_smarty_tpl->tpl_vars['vars']->value['gallery']['gallery_ln'];?>
</span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

$vars = $template->get_template_vars('vars');
//print_r($vars['page']);
$pageform = new Form('galleryform');
$pageform->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    "preventJQueryUILoad"=>0,
    "preventDefaultCSS"=>0,
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>array(2,2,1,1,1,1,1,1,1,1,1,1,1)
      
 ));
$pageform->addButton('Zapisz','submit',array("name"=>"gallery_save"));
$pageform->addButton('Zapisz i zamknij','submit',array("name"=>"gallery_save_close"));
$pageform->addButton('Anuluj','button',array("name"=>"gallery_cancel","onclick" =>"window.location.href = '".BASEURL."admin/gallery';"));

$pageform->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
    <li><a href="#gallery-content"><span>Zarządzanie galerią</span></a></li>
    <li><a href="#gallery-meta"><span>Meta dane</span></a></li>
    <li><a href="#gallery-images"><span>Zdjęcia</span></a></li>
    <li><a href="#gallery-options"><span>Opcje</span></a></li>'. 
    //(!empty($vars['gallery']['fk_gallery_id']) ? '<li><a class="addNew" title="Dodaj nową galerię" href="'.BASEURL.'admin/page/addPage"><span>+</span></a></li>' : '').'
 '</ul>');

$pageform->addHTMLExternal('<div class="form-inputs" id="gallery-content">');
$pageform->addHidden("gallery_username",$vars['userinfo']['username']);
$pageform->addHidden("gallery_lang",'pl');
$pageform->addHidden("fk_gallery_id",(!empty($vars['gallery']['fk_gallery_id']) ? $vars['gallery']['fk_gallery_id'] : ''));
$pageform->addHidden("gallery_id",(!empty($vars['gallery']['GID']) ? $vars['gallery']['GID'] : ''));
$disabledname = (empty($vars['gallery']['fk_gallery_id']) ? 0 : 1 );
$pageform->addTextBox('Nazwa galerii','gallery_name',(!empty($vars['gallery']['name']) ? $vars['gallery']['name'] : ''),array("required"=>1, "onkeyup"=>"setTitle(this.value);","tooltip"=>"Nazwa jest identyfikatorem galerii nie widocznym dla użytkownika."));
$pageform->addTextBox('Tytuł galerii','gallery_title',(!empty($vars['gallery']['gallery_title']) ? $vars['gallery']['gallery_title'] : ''),array("required"=>1,"onkeyup"=>"convertToSlug(this.value);","tooltip"=>"Tytuł galerii widoczny w nagłówku strony."));
//$pageform->addTextBox('Url strony','page_slug',(!empty($vars['page']['page_slug']) ? $vars['page']['page_slug'] : ''),array("required"=>1,"readonly"=>"readonly","class"=>"disabled"));
//$pageform->addRadio("Kopiuj tą samą treść na inne wersje językowe",'gallery_multi_content',1,array("1"=>"Tak", "0"=>"Nie"), array("noBreak"=>1,"tooltip"=>"Kopiuje treść tej wersji językowej na pozostałe wersje językiowe galerii."));
$pageform->addSelect("Status galerii (opublikowana?):", "gallery_status", (!empty($vars['gallery']['is_visible']) ? $vars['gallery']['is_visible'] : "0") , array("1"=>"Opublikowana", "0"=>"Robocza"), array("tooltip"=>"Określa czy stona jest widoczna czy jest to jedynie wersja robocza galerii."));
//$pageform->addDate("Data publikacji:","page_date_publish",date("Y-m-d"),array("jqueryOptions" => array("dateFormat"=>"yy-mm-dd")) );
$pageform->addDate("Date:", "MyDate");
//$pageform->addHTML('<div style="padding-left:10px;"><label class="pfbc-label">Link do strony:</label><a href="'.BASEURL.'page/'.$vars['page']['PID'].'">http://localhost/mvcms/page/'.$vars['page']['PID'].'</a></div>');
$pageform->addCKEditor("Opis galerii:", "gallery_description",(!empty($vars['gallery']['gallery_description']) ? $vars['gallery']['gallery_description'] : ''), array("tooltip"=>"Opis galerii."));
//$pageform->addCKEditor("Treść strony:", "page_content",  (!empty($vars['page']['page_content']) ? $vars['page']['page_content'] : ''), array("tooltip"=>"Właściwa treść strony.") );
$pageform->addHTMLExternal('</div>');
/*
$pageform->addHTMLExternal('<div class="form-inputs" id="">');
$pageform->addHTMLExternal('<div style="padding-top:15px;">W tej sekcji możesz wybrać układ menu dostępnych w szablonie specyficzny dla tej strony. Jeśli chcesz pozostawić domyślny układ menu, pomiń ustawienia tej sekcji.</div>');

$page_navig = unserialize($vars['page']['page_module_options']);

 foreach($vars["navigation_blocks"]  as $menu){
    $selected = (!empty($page_navig[$menu['id']]) ? $page_navig[$menu['id']] : $menu['fk_module_id']); 
    $pageform->addSelect($menu['module_name'], "menu_locations[".$menu['id']."]", $selected ,$vars['navigation'], array("tooltip"=>"Wybierz utworzone wcześniej menu dla sekcji \"". $menu['module_name']."\""));  
       }

$pageform->addHTMLExternal('</div>');
*/
$pageform->addHTMLExternal('<div class="form-inputs" id="gallery-meta">');
$pageform->addTextBox('Meta tytuł:','gallery_meta_title','');
$pageform->addTextarea("Meta słowa kluczowe:", "gallery_meta_keywords");
$pageform->addTextarea("Meta opis:", "gallery_meta_description", (!empty($vars['gallery']['gallery_meta']) ? $vars['gallery']['gallery_meta'] : ''));
$pageform->addHTMLExternal('</div>');

$pageform->addHTMLExternal('<div class="form-inputs" id="gallery-images" style="">');
$pageform->addHtmlExternal('<input type="file" name="file_upload" id="file_upload" />');
$pageform->addHtmlExternal('');
$pageform->addHTMLExternal('</div>');

$pageform->addHTMLExternal('<div class="form-inputs" id="gallery-options">');
$pageform->addRadio("Galeria jest aktywna:","gallery_isactive",(!empty($vars['page']['is_active']) ? $vars['page']['is_active'] :"0") ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$pageform->addRadio("Galeria posiada widoczny opis:","gallery_visible_desc",(!empty($vars['gallery']['visible_desc']) ? $vars['gallery']['visible_desc'] : "0") ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$pageform->addRadio("Komentarze do galerii są dozwolone:","gallery_comments", (!empty($vars['gallery']['gallery_comments']) ? $vars['gallery']['gallery_comments'] : 0) ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$pageform->addCheckbox("Uprawnienia:", "gallery_role_group", $vars['gallery']['gallery_roles'], $vars['user_roles'], array("preHTML" => "Zaznacz jaka grpa użytkowników ma dostęp do tej galerii"));
$pageform->addHTMLExternal('</div>');
$pageform->addHTMLExternal('</div>');
$pageform->addButton('Zapisz','submit',array("name"=>"gallery_save"));
$pageform->addButton('Zapisz i zamknij','submit',array("name"=>"gallery_save_close"));
$pageform->addButton('Anuluj','button',array("name"=>"page_cancel","onclick" =>"window.location.href = '".BASEURL."admin/gallery';"));
$pageform->render();

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<script src="http://localhost/mvcms/apps/admin/modules/gallery/uploadify/js/jquery.uploadify.min.js" type="text/javascript"></script>    
 <script type="text/javascript">
  //<![CDATA[
 String.prototype.trim=function(){return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');};
 String.prototype.escapeDiacritics = function(){
    return this.replace(/ą/g, 'a')
    .replace(/Ą/g, 'A')
    .replace(/ć/g, 'c')
    .replace(/Ć/g, 'C')
    .replace(/ę/g, 'e')
    .replace(/Ę/g, 'E')
    .replace(/ł/g, 'l')
    .replace(/Ł/g, 'L')
    .replace(/ń/g, 'n')
    .replace(/Ń/g, 'N')
    .replace(/ó/g, 'o')
    .replace(/Ó/g, 'O')
    .replace(/ś/g, 's')
    .replace(/Ś/g, 'S')
    .replace(/ż/g, 'z')
    .replace(/Ż/g, 'Z')
    .replace(/ź/g, 'z')
    .replace(/Ź/g, 'Z');
} 
function setTitle(Text){
    document.getElementsByName('page_title')[0].value = Text;
    convertToSlug(Text);
}        
function convertToSlug(Text)
   {
      
    document.getElementsByName('page_slug')[0].value = 
    Text.toLowerCase().escapeDiacritics().replace(/[^\w ]+/g,'').replace(/ +/g,'-')   
/*
    Text.toLowerCase()
        .replace(/[^\w ]+/g,'')
         .replace(/[^\w ]+/g,'')
    */
    }

  $(function(){
    
  var tabContainers = $('div.tabs > div');
      tabContainers.hide().filter(':first').show();
			
			$('div.tabs ul.tab-menu a:not(.addNew)').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tabs ul.tab-menu a').removeClass('selected');
				$(this).addClass('selected');
				return false;
			}).filter(':first').click(); 
  
   $('#file_upload').uploadify({
            'swf'      : 'http://localhost/mvcms/apps/admin/modules/gallery/uploadify/uploadify.swf',
            'uploader' : 'http://localhost/mvcms/apps/admin/modules/gallery/uploadify/uploadify.php'
            // Your options here
   });
   
  
  }); 
   
   
 //]]>      
 </script> 

</section><?php }} ?>