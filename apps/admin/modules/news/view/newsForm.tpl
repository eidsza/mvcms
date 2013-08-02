
<section class="title">
    <h4>Edycja artykułu <span class="page_subtitle">{$vars.news.news_title} / {$vars.news.news_ln}</span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


{php}
$vars = $template->get_template_vars('vars');
//print_r($vars['page']);
$form = new Form('newsForm');
$form->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    "preventJQueryUILoad"=>0,
    "preventDefaultCSS"=>0,
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>array(2,2,1, 3,1,1,1,1,1,1,2,1)
      
 ));

$form->addButton('Zapisz','submit',array("name"=>"news_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"news_save_close"));
$form->addButton('Anuluj','button',array("name"=>"news_cancel","onclick" =>"window.location.href = '".BASEURL."admin/news';"));
//$form->addButton('Zapisz kategorię','button',array("name"=>"save_category","style"=>"display:none","onClick"=>"ajax_save_category();"));

$form->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
    <li><a href="#news-content"><span>Zawartość artykułu</span></a></li>
    <li><a href="#news-meta"><span>Meta dane</span></a></li>
    <li><a href="#news-options"><span>Opcje</span></a></li>'.
    (!empty($vars['news']['fk_news_id']) ? '<li><a class="addnew" title="Dodaj nowy" href="'.BASEURL.'admin/news/addNews"><span>+</span></a></li>' :'').'
    <li style="display:none;" class="hiddentab"><a href="#category_news"><span>Kategoria</span></a></li>
 </ul>');

$form->addHTMLExternal('<div class="form-inputs" id="news-content">');
$form->addHidden("news_username",$vars['userinfo']['username']);
$form->addHidden("news_lang",Session::get('backand_lang'));
$form->addHidden("fk_news_id",(!empty($vars['news']['fk_news_id']) ? $vars['news']['fk_news_id'] : ''));
$form->addHidden("news_id",(!empty($vars['news']['NID']) ? $vars['news']['NID'] : ''));

$form->addSelect('Kategoria',"news_category_id",(!empty($vars['news']['fk_category_id']) ? $vars['news']['fk_category_id'] : 0), $vars['cats']);
$form->addHtml('<span class="category_buton_link">[ <a class="ajax_add_category_link" href="'.BASEURL.'admin/news/category/create">dodatj kategorię</a> ]</span>');
$form->addTextBox('Nazwa artykułu','news_name',(!empty($vars['news']['name']) ? $vars['news']['name'] : ''),array("required"=>1,"onkeyup"=>"setTitle(this.value);","tooltip"=>"Nazwa jest identyfikatorem artykułu nie widocznym dla użytkownika."));
$form->addTextBox('Tytuł artykułu','news_title',(!empty($vars['news']['news_title']) ? $vars['news']['news_title'] : ''),array("required"=>1,"onkeyup"=>"convertToSlug(this.value);","tooltip"=>"Tytuł artykułu widoczny w nagłówku strony."));
$form->addTextBox('Url artykułu','news_slug',(!empty($vars['news']['news_slug']) ? $vars['news']['news_slug'] : ''),array("required"=>1,"readonly"=>"readonly","class"=>"disabled"));
$form->addRadio("Kopiuj tą samą treść na inne wersje językowe",'news_multi_content',1,array("1"=>"Tak", "0"=>"Nie"), array("noBreak"=>1,"tooltip"=>"Kopiuje treść tej wersji językowej na pozostałe wersje językiowe artykułu."));
$form->addSelect("Status artykułu (opublikowany?):", "news_status", (!empty($vars['news']['is_visible']) ? $vars['news']['is_visible'] : 0) , array("1"=>"Opublikowany", "0"=>"Robocza"), array("tooltip"=>"Określa czy artykuł jest widoczny czy jest to jedynie wersja robocza artykułu."));
$form->addDate("Data publikacji:","news_date_publish",date("Y-m-d"),array("jqueryOptions" => array("dateFormat"=>"yy-mm-dd")));
$form->addHTML('<div style="padding-left:10px;"><label class="pfbc-label">Link do artykułu:</label><a href="'.BASEURL.'news/'.$vars['news']['NID'].'">'.BASEURL.'news/'.$vars['news']['NID'].'</a></div>');
$form->addCKEditor("Zajawka artykułu:", "news_precontent",(!empty($vars['news']['news_precontent']) ? $vars['news']['news_precontent'] : ''), array("tooltip"=>"Zajawka jest to wstępna treść artykułu.<br />Wprowadzenie."));
$form->addCKEditor("Treść artykułu:", "news_content",  (!empty($vars['news']['news_content']) ? $vars['news']['news_content'] : ''), array("tooltip"=>"Właściwa treść artykułu.") );
$form->addHTMLExternal('</div>');

$form->addHTMLExternal('<div class="form-inputs" id="news-meta">');
$form->addTextarea("Meta słowa kluczowe:", "news_meta_keywords");
$form->addHTMLExternal('</div>');
$form->addHTMLExternal('<div class="form-inputs" id="news-options">');
$form->addRadio("Komentarze do tego artykułu są dozwolone:","news_comments", (!empty($vars['news']['news_comments']) ? 1 : 0) ,array(1=>"Tak",0=>"Nie"),array("noBreak"=>1));
$form->addCheckbox("Uprawnienia:", "news_role_group", $vars['news']['news_roles'], $vars['user_roles'], array("preHTML" => "Zaznacz jaka grpa użytkowników ma dostęp do tego artykułu"));
$form->addHTMLExternal('</div>');
$form->addHTMLExternal('<div class="form-inputs" id="category_news">');
$form->addHidden('category[is_visible]',1);
$form->addHidden('category[lang]',Session::get('backand_lang'));
$form->addTextBox('Nazwa kategorii','category[name]');
$form->addTextBox('Tytuł kategorii','category[title]');
$form->addCKEditor("Opis kategorii",'category[desc]','',array("basic"=>1));
$form->addHTMLExternal('</div>');
$form->addHTMLExternal('</div>');
$form->addButton('Zapisz','submit',array("name"=>"news_save"));
$form->addButton('Zapisz i zamknij','submit',array("name"=>"news_save_close"));
$form->addButton('Anuluj','button',array("name"=>"news_cancel","onclick" =>"window.location.href = '".BASEURL."admin/news';"));
$form->addButton('Zapisz kategorię','button',array("name"=>"save_category","style"=>"display:none"));
$form->render();

/////// nwe category form

{/php}

<link rel="stylesheet" href="{$vars.view_url}css/news.css" type="text/css" media="all">


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
    document.getElementsByName('news_title')[0].value = Text;
    convertToSlug(Text);
}        
function convertToSlug(Text)
   {
      
    document.getElementsByName('news_slug')[0].value = 
    Text.toLowerCase().escapeDiacritics().replace(/[^\w ]+/g,'').replace(/ +/g,'-');   

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
    
    
   /*    
   $('a.ajax_add_category_link').click(function(){
   var tabContainers = $('div.tabs > div');    
   tabContainers.hide();
    tabContainers.filter(this.hash).show();
    $('input[type=submit]').hide();    
    $('input[name=save_category]').show();    
    $('div.tabs ul.tab-menu a').removeClass('selected');
    $('div.tabs ul.tab-menu li').css('display','none');    
    $('div.tabs ul.tab-menu li.hiddentab').show()
    $('div.tabs ul.tab-menu li.hiddentab a').addClass('selected');
    
   }); 
   */    
 });  
 //]]>      
 </script> 
{/literal}
</section>