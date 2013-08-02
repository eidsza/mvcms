
<section class="title">
    <h4>Edycja kategorii <span class="page_subtitle">{$vars.category.category_title} / {$vars.category.cat_ln}</span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


{php}
$vars = $template->get_template_vars('vars');
//print_r($vars['page']);
$form = new Form('categoryform');
$form->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>array(2,3,1,1)
      
 ));
$form->addButton('Zapisz','submit',array("name"=>"category_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"category_save_close"));
$form->addButton('Anuluj','button',array("name"=>"category_cancel","onclick" =>"window.location.href = '".BASEURL."admin/news/category';"));

$form->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
    <li><a href="#category-content"><span>Zawartość kategorii</span></a></li>
    <li><a href="#category-options"><span>Opcje</span></a></li>'. 
   (!empty($vars['category']['fk_news_category_id']) ? '<li><a class="addnew" title="Dodaj nową" href="'.BASEURL.'admin/news/category/create"><span>+</span></a></li>' :'').'
 </ul>');

$form->addHTMLExternal('<div class="form-inputs" id="category-content">');
$form->addHidden("category[username]",$vars['userinfo']['username']);
$form->addHidden("category[lang]", Session::get('backand_lang'));
$form->addHidden("category[fk_news_category_id]",(!empty($vars['category']['fk_news_category_id']) ? $vars['category']['fk_news_category_id'] : ''));
$form->addHidden("category[id]",(!empty($vars['category']['CID']) ? $vars['category']['CID'] : ''));

$disabled = (!empty($vars['category']['CID']) ? array("disabled"=>"disabled") : array());

$form->addTextBox('Nazwa kategorii','category[name]',(!empty($vars['category']['name']) ? $vars['category']['name'] : ''),array_merge(array("required"=>1,"onkeyup"=>"setTitle(this.value);","tooltip"=>"Nazwa jest identyfikatorem strony nie widocznym dla użytkownika. <br />Nie dotyczy edycji kategorii."),$disabled));
$form->addTextBox('Tytuł kategorii','category[title]',(!empty($vars['category']['category_title']) ? $vars['category']['category_title'] : ''),array("required"=>1,"onkeyup"=>"convertToSlug(this.value);","tooltip"=>"Tytuł kategorii widoczny w opcjach i innych elementach strony."));
//$form->addTextBox('Url strony','page_slug',(!empty($vars['page']['page_slug']) ? $vars['page']['page_slug'] : ''),array("required"=>1,"readonly"=>"readonly","class"=>"disabled"));
$form->addRadio("Kopiuj tą samą treść na inne wersje językowe",'category[multi_content]',1,array("1"=>"Tak", "0"=>"Nie"), array_merge(array("noBreak"=>1,"tooltip"=>"Kopiuje treść tej wersji językowej na pozostałe wersje językiowe kategorii. <br />Nie dotyczy edycji kategorii."),$disabled));
$form->addSelect("Status kategorii (opublikowana?):", "category[status]", (!empty($vars['category']['is_visible']) ? $vars['category']['is_visible'] : "0") , array("1"=>"Opublikowana", "0"=>"Robocza"), array("tooltip"=>"Określa czy kategoria jest widoczna czy jest to jedynie wersja robocza kategorii."));
$form->addDate("Data publikacji:","category[date_publish]",date("Y-m-d"),array("jqueryOptions" => array("dateFormat"=>"yy-mm-dd"),"tooltip"=>"Określa od kiedy kategoria ma być widoczna na stronie"));
//$form->addHTML('<div style="padding-left:10px;"><label class="pfbc-label">Link do strony:</label><a href="'.BASEURL.'page/'.$vars['page']['PID'].'">http://localhost/mvcms/page/'.$vars['page']['PID'].'</a></div>');
$form->addCKEditor("Opis kategorii:", "category[description]",(!empty($vars['category']['category_description']) ? $vars['category']['category_description'] : ''), array("tooltip"=>"Opis kategorii.<br />Krótki opis co zmoże zawierać dana kategoria artykułów. Zachęta dla czytelnika."));
//$form->addCKEditor("Treść strony:", "page_content",  (!empty($vars['page']['page_content']) ? $vars['page']['page_content'] : ''), array("tooltip"=>"Właściwa treść strony.") );
$form->addHTMLExternal('</div>');


$form->addHTMLExternal('<div class="form-inputs" id="category-options">');
//$form->addRadio("Strona jest aktywna:","page_isactive",(!empty($vars['page']['is_active']) ? $vars['page']['is_active'] :"0") ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
//$form->addRadio("Strona jest stroną domyślną:","page_isdefault",(!empty($vars['page']['is_main']) ? $vars['page']['is_main'] : "0") ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
//$form->addRadio("Komentarze na stronie są dozwolone:","page_comments", (!empty($vars['page']['page_comments']) ? $vars['page']['page_comments'] : 1) ,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1));
$form->addCheckbox("Uprawnienia:", "category[role_group]", $vars['category']['category_roles'], $vars['user_roles'], array("preHTML" => "Zaznacz jaka grpa użytkowników ma dostęp do tej kategorii"));
$form->addHTMLExternal('</div>');
$form->addHTMLExternal('</div>');
$form->addButton('Zapisz','submit',array("name"=>"category_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"category_save_close"));
$form->addButton('Anuluj','button',array("name"=>"page_cancel","onclick" =>"window.location.href = '".BASEURL."admin/news/category';"));
$form->render();

{/php}
<link rel="stylesheet" href="{$vars.view_url}css/news.css" type="text/css" media="all">
<script type="text/javascript" src="{$vars.view_url}js/jquery.ui.datepicker-pl.min.js"></script>
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
    document.getElementsByName('category[title]')[0].value = Text;
    convertToSlug(Text);
}
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