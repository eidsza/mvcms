
<section class="title">
    <h4>Edycja szablonu <span class="page_subtitle">{$vars.templates.name} / {$vars.templates.lang}</span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


{php}
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

{/php}
<link rel="stylesheet" href="{$vars.view_url}css/news.css" type="text/css" media="all">
{literal}
 
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
{/literal}
</section>