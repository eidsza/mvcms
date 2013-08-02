<?php /* Smarty version Smarty-3.1.11, created on 2013-03-13 15:11:24
         compiled from "F:\xampp\htdocs\mvcms\apps\admin\modules\emailtemplates\view\templateForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29827513f2b01535f90-66142743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '763ef81cc0aa3bd3ac289509716d7330de601f9a' => 
    array (
      0 => 'F:\\xampp\\htdocs\\mvcms\\apps\\admin\\modules\\emailtemplates\\view\\templateForm.tpl',
      1 => 1363183881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29827513f2b01535f90-66142743',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_513f2b015dc394_09707449',
  'variables' => 
  array (
    'vars' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f2b015dc394_09707449')) {function content_513f2b015dc394_09707449($_smarty_tpl) {?>
<section class="title">
    <h4>Edycja szablonu <span class="page_subtitle"><?php echo $_smarty_tpl->tpl_vars['vars']->value['templates']['name'];?>
 / <?php echo $_smarty_tpl->tpl_vars['vars']->value['templates']['lang'];?>
</span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

$vars = $template->get_template_vars('vars');
//print_r($vars['page']);
$form = new Form('templateform');
$form->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>array(2,1,1,1,1)
      
 ));
$form->addButton('Zapisz','submit',array("name"=>"template_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"template_save_close"));
$form->addButton('Anuluj','button',array("name"=>"template_cancel","onclick" =>"window.location.href = '".BASEURL."admin/emailtemplates';"));

$form->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
    <li><a href="#template-content"><span>Zawartość szablonu</span></a></li>
    <li><a href="#template-options"><span>Opcje</span></a></li>'. 
   (!empty($vars['templates']['fk_template_id']) ? '<li><a class="addnew" title="Dodaj nowy" href="'.BASEURL.'admin/emailtemplates/create"><span>+</span></a></li>' :'').'
 </ul>');

$form->addHTMLExternal('<div class="form-inputs" id="template-content">');
$form->addHidden("template[username]",$vars['userinfo']['username']);
$form->addHidden("template[lang]", Session::get('backand_lang'));
$form->addHidden("template[fk_template_id]",(!empty($vars['templates']['fk_template_id']) ? $vars['templates']['fk_template_id'] : ''));
$form->addHidden("template[id]",(!empty($vars['templates']['TID']) ? $vars['templates']['TID'] : ''));

$disabled = (!empty($vars['templates']['TID']) ? array("disabled"=>"disabled") : array());

$form->addTextBox('Nazwa szablonu','template[name]',(!empty($vars['templates']['name']) ? $vars['templates']['name'] : ''),array_merge(array("required"=>1,"onkeyup"=>"setTitle(this.value);","tooltip"=>"Nazwa jest identyfikatorem szablonu nie widocznym dla użytkownika."),$disabled));
$form->addTextBox('Tytuł szablonu','template[templatename]',(!empty($vars['templates']['templatename']) ? $vars['templates']['templatename'] : ''),array("required"=>1,"onkeyup"=>"convertToSlug(this.value);","tooltip"=>"Tytul szablonu widoczny jest w opcjach i innych elementach."));
$form->addTextBox('Tytuł wiadomoci','template[subject]',(!empty($vars['templates']['subject']) ? $vars['templates']['subject'] : ''),array("required"=>1,"onkeyup"=>"convertToSlug(this.value);","tooltip"=>"Temat wiadomosci widoczny dla użytkownika."));
$form->addRadio("Kopiuj tą samą treść na inne wersje językowe",'template[multi_content]',1,array("1"=>"Tak", "0"=>"Nie"), array_merge(array("noBreak"=>1,"tooltip"=>"Kopiuje treść tej wersji językowej na pozostałe wersje językiowe szablonu. <br />Ulatwia edycje innych wersji jezykowych."),$disabled));
$form->addCKEditor("Treć wiadomoci:", "template[body]",(!empty($vars['templates']['body']) ? $vars['templates']['body'] : ''), array("tooltip"=>"Treć szablonu.<br />Tresc szablonu wiadomosci jaka otrzyma uzytkownik."));
$form->addTextarea("Opis szablonu:", "template[description]",(!empty($vars['templates']['description']) ? $vars['templates']['description'] : ''), array("tooltip"=>"Opis szablonu.<br />Krótki opis czego dotyczy szablon wiadomosci. Informacja dla administratora."));
$form->addHTMLExternal('</div>');


$form->addHTMLExternal('<div class="form-inputs" id="template-options">');
$form->addHTMLExternal('<p>Opis dostępnych zmiennych szablnowych:</p>');
$form->addHTMLExternal('</div>');
$form->addHTMLExternal('</div>');
$form->addButton('Zapisz','submit',array("name"=>"template_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"template_save_close"));
$form->addButton('Anuluj','button',array("name"=>"template_cancel","onclick" =>"window.location.href = '".BASEURL."admin/emailtemplates';"));
$form->render();

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['vars']->value['view_url'];?>
css/news.css" type="text/css" media="all">

 
 <script type="text/javascript">
  //<![CDATA[

  $(function(){
  var tabContainers = $('div.tabs > div');
      tabContainers.hide().filter(':first').show();
			
			$('div.tabs ul.tab-menu a:not(.addnew)').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tabs ul.tab-menu a').removeClass('selected');
				$(this).addClass('selected');
				return false;
			}).filter(':first').click(); 
    
   }); 
 //]]>      
 </script> 

</section><?php }} ?>