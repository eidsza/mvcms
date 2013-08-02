<link rel="stylesheet" href="{$vars.view_url}css/page.css" type="text/css" media="all">
<section class="title">
    <h4>Edycja strony <span class="page_subtitle">{$vars.page.page_title} / {$vars.page.page_ln}</span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


{php}
$vars = $template->get_template_vars('vars');
//print_r($vars['page']);
$pageform = new Form('pageform');
$pageform->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    "preventJQueryUILoad"=>0,
    "preventDefaultCSS"=>0,
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>array(2,1, 3,1,1,1,1,1,1,1,1,1,1,1)
      
 ));
$pageform->addButton('Zapisz','submit',array("name"=>"page_save"));
$pageform->addButton('Zapisz i zamknij','submit',array("name"=>"page_save_close"));
$pageform->addButton('Anuluj','button',array("name"=>"page_cancel","onclick" =>"window.location.href = '".BASEURL."admin/page';"));

$pageform->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
    <li><a href="#page-content"><span>Zawartość strony</span></a></li>
    <li><a href="#page-meta"><span>Meta dane</span></a></li>
    <li><a href="#page-menu"><span>Menu strony</span></a></li>
    <li><a href="#page-options"><span>Opcje</span></a></li>'. 
    (!empty($vars['page']['fk_page_id']) ? '<li><a class="addNew" title="Dodaj nową stronę" href="'.BASEURL.'admin/page/addPage"><span>+</span></a></li>' : '').'
 </ul>');

$pageform->addHTMLExternal('<div class="form-inputs" id="page-content">');
$pageform->addHidden("page_username",$vars['userinfo']['username']);
$pageform->addHidden("page_lang",'pl');
$pageform->addHidden("fk_page_id",(!empty($vars['page']['fk_page_id']) ? $vars['page']['fk_page_id'] : ''));
$pageform->addHidden("page_id",(!empty($vars['page']['PID']) ? $vars['page']['PID'] : ''));
$disabledname = (empty($vars['page']['fk_page_id']) ? 0 : 1 );
$pageform->addTextBox('Nazwa strony','page_name',(!empty($vars['page']['name']) ? $vars['page']['name'] : ''),array("required"=>1, "onkeyup"=>"setTitle(this.value);","tooltip"=>"Nazwa jest identyfikatorem strony nie widocznym dla użytkownika."));
$pageform->addTextBox('Tytuł strony','page_title',(!empty($vars['page']['page_title']) ? $vars['page']['page_title'] : ''),array("required"=>1,"onkeyup"=>"convertToSlug(this.value);","tooltip"=>"Tytuł strony widoczny w nagłówku strony."));
$pageform->addTextBox('Url strony','page_slug',(!empty($vars['page']['page_slug']) ? $vars['page']['page_slug'] : ''),array("required"=>1,"readonly"=>"readonly","class"=>"disabled"));
$pageform->addRadio("Kopiuj tą samą treść na inne wersje językowe",'page_multi_content',1,array("1"=>"Tak", "0"=>"Nie"), array("noBreak"=>1,"tooltip"=>"Kopiuje treść tej wersji językowej na pozostałe wersje językiowe strony."));
$pageform->addSelect("Status strony (opublikowana?):", "page_status", (!empty($vars['page']['is_visible']) ? $vars['page']['is_visible'] : "0") , array("1"=>"Opublikowana", "0"=>"Robocza"), array("tooltip"=>"Określa czy stona jest widoczna czy jest to jedynie wersja robocza strony."));
//$pageform->addDate("Data publikacji:","page_date_publish",date("Y-m-d"),array("jqueryOptions" => array("dateFormat"=>"yy-mm-dd")) );
$pageform->addDate("Date:", "MyDate");
$pageform->addHTML('<div style="padding-left:10px;"><label class="pfbc-label">Link do strony:</label><a href="'.BASEURL.'page/'.$vars['page']['PID'].'">http://localhost/mvcms/page/'.$vars['page']['PID'].'</a></div>');
$pageform->addCKEditor("Zajawka strony:", "page_precontent",(!empty($vars['page']['page_precontent']) ? $vars['page']['page_precontent'] : ''), array("tooltip"=>"Zajawka jest to wstępna treść strony.<br />Zachęta dla czytelnika."));
$pageform->addCKEditor("Treść strony:", "page_content",  (!empty($vars['page']['page_content']) ? $vars['page']['page_content'] : ''), array("tooltip"=>"Właściwa treść strony.") );
$pageform->addHTMLExternal('</div>');

$pageform->addHTMLExternal('<div class="form-inputs" id="page-menu">');
$pageform->addHTMLExternal('<div style="padding-top:15px;">W tej sekcji możesz wybrać układ menu dostępnych w szablonie specyficzny dla tej strony. Jeśli chcesz pozostawić domyślny układ menu, pomiń ustawienia tej sekcji.</div>');

$page_navig = unserialize($vars['page']['page_module_options']);

 foreach($vars["navigation_blocks"]  as $menu){
    $selected = (!empty($page_navig[$menu['id']]) ? $page_navig[$menu['id']] : $menu['fk_module_id']); 
    $pageform->addSelect($menu['module_name'], "menu_locations[".$menu['id']."]", $selected ,$vars['navigation'], array("tooltip"=>"Wybierz utworzone wcześniej menu dla sekcji \"". $menu['module_name']."\""));  
       }

$pageform->addHTMLExternal('</div>');

$pageform->addHTMLExternal('<div class="form-inputs" id="page-meta">');
$pageform->addTextBox('Meta tytuł:','page_meta_title','');
$pageform->addTextarea("Meta słowa kluczowe:", "page_meta_keywords");
$pageform->addTextarea("Meta opis:", "page_meta_description", (!empty($vars['page']['page_meta']) ? $vars['page']['page_meta'] : ''));
$pageform->addHTMLExternal('</div>');

$pageform->addHTMLExternal('<div class="form-inputs" id="page-options">');
$pageform->addRadio("Strona jest aktywna:","page_isactive",(!empty($vars['page']['is_active']) ? $vars['page']['is_active'] :"0") ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$pageform->addRadio("Strona jest stroną domyślną:","page_isdefault",(!empty($vars['page']['is_main']) ? $vars['page']['is_main'] : "0") ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$pageform->addRadio("Komentarze na stronie są dozwolone:","page_comments", (!empty($vars['page']['page_comments']) ? $vars['page']['page_comments'] : 0) ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$pageform->addCheckbox("Uprawnienia:", "page_role_group", $vars['page']['page_roles'], $vars['user_roles'], array("preHTML" => "Zaznacz jaka grpa użytkowników ma dostęp do tej strony"));
$pageform->addHTMLExternal('</div>');
$pageform->addHTMLExternal('</div>');
$pageform->addButton('Zapisz','submit',array("name"=>"page_save"));
$pageform->addButton('Zapisz i zamknij','submit',array("name"=>"page_save_close"));
$pageform->addButton('Anuluj','button',array("name"=>"page_cancel","onclick" =>"window.location.href = '".BASEURL."admin/page';"));
$pageform->render();

{/php}
{literal}
    
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
    
   }); 
 //]]>      
 </script> 
{/literal}
</section>