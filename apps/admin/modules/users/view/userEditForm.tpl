<link rel="stylesheet" href="{$vars.view_url}css/users.css" type="text/css" media="all">
<section class="title">
    <h4><img src="{$vars.view_url}images/icons/User16.png" /> Edycja użytkownika "{$vars['user']['username']}" <span class="page_subtitle"></span></h4>
</section>
<section class="item">
    <div class="section_info"></div>    
  


{php}

$vars = $template->get_template_vars('vars');
//print_r($vars);
//var_dump($vars['user']['lastname']);
$map = (($vars['user']['status']==1) ? array(1,2,1,3,1,2,2,2,2) : array(1,2,1,3,1,1,2,2,3,2,2));
$frm = new Form('usrForm');
$frm->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    //"preventJQueryLoad"=>1,
    //"preventJQueryUILoad"=>,
    "preventDefaultCSS"=>0,
    "errorMsgFormat" => "* [LABEL] jest polem wymaganym! ",
    //"map"=>array(1,2,2,2,1,1,2,2,2,2,1,2,3,2,2)
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>$map
      
 ));
$frm->addButton('Zapisz','submit',array("name"=>"user_save","onclick"=>"submitform();"));
$frm->addButton('Zapisz i zamknij','submit',array("name"=>"user_save_close","onclick"=>"submitform();"));
$frm->addButton('Anuluj','button',array("name"=>"user_cancel","onclick" =>"window.location.href = '".BASEURL."admin/users';"));

$frm->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
    <li><a href="#user-content"><span>Dane podstawowe</span></a></li>
    <li><a href="#user-options"><span>Dane rozszerzone</span></a></li>'. 
    (!empty($vars['page']['fk_page_id']) ? '<li><a class="addNew" title="Dodaj nowego użytkownika" href="'.BASEURL.'admin/user/create"><span>+</span></a></li>' : '').'
 </ul>');

$frm->addHTMLExternal('<div class="form-inputs" id="user-content">');
$frm->addHidden("user_username",$vars['userinfo']['username']);
$frm->addHidden("form_cmd",'userFrom');
$frm->addHidden("user[salt]",$vars['user']['usersalt']);
$frm->addHidden("user[username]",$vars['user']['username']);
$frm->addHidden("user[id]",$vars['user']['user_id']);
//$pageform->addHidden("page_lang",'pl');
//$pageform->addHidden("fk_page_id",(!empty($vars['page']['fk_page_id']) ? $vars['page']['fk_page_id'] : ''));
//$pageform->addHidden("page_id",(!empty($vars['page']['PID']) ? $vars['page']['PID'] : ''));
//$disabledname = (empty($vars['page']['fk_page_id']) ? 0 : 1 );
$frm->addTextBox('Nazwa użytkownika','user[username]',(!empty($vars['user']['username']) ? $vars['user']['username'] : ''),array("required"=>1, "disabled"=>1,"tooltip"=>"Nazwa użytkownika nie podlega edycji."));
$frm->addTextBox('Imię','user[firstname]',(!empty($vars['user']['firstname']) ? $vars['user']['firstname'] : ''),array("required"=>1,"tooltip"=>"Podaj imię."));
$frm->addTextBox('Nazwisko','user[lastname]',(!empty($vars['user']['lastname']) ? $vars['user']['lastname'] : ''),array("required"=>1));
$frm->addYesNo('Ustaw nowe hasło','user_change_pwd',0,array("id"=>"user_change_pwd","onclick"=>"togglepassword(this.value);"));

$frm2 = new form("pwdForm");
$frm2->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    //"preventJQueryLoad"=>1,
    //"preventJQueryUILoad"=>1,
    //"preventDefaultCSS"=>0,
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
    "map"=>array(2)
  ));


$frm2->addPassword('Hasło (min. '.$vars['settings']->settings_min_password_chars->value.' znaków)','user[password]','',array("required"=>1, "minlength"=>$vars['settings']->settings_min_password_chars->value));
$frm2->addPassword('Potwierdź hasło (min. '.$vars['settings']->settings_min_password_chars->value.' znaków)','user[password2]','',array("required"=>1, "equalTo" => 'user[password]', "minlength"=>$vars['settings']->settings_min_password_chars->value));


$frm->addHtmlExternal('<div id="user-password" style="display:none">');
$frm->addHTMLExternal($frm2->elementstostring());
$frm->addHtmlExternal('</div>');
$frm->addEmail('Adres email','user[email]',(!empty($vars['user']['email']) ? $vars['user']['email'] : ''),array("required"=>1,"tooltip"=>"UWAGA! Wszystkie informację od tej chwili będę wysyłane na podany poniżej adres e-mail."));
$frm->addSelect("Status użytkownika", "user[status]", (!empty($vars['user']['userlevel']) ? $vars['user']['userlevel'] : "2") , array("3"=>"Aktywny","2"=>"Wymaga aktywacji przez Administratora", "1"=>"Wymaga weryfikacji email"), array("tooltip"=>"Określa status zarejstrowanego użytkownika. Uzytkownik po rejestracji może wymagać aktywacji poprzez email lub Administratora."));
//$frm->openFieldset('&nbsp;<img src="'.$vars['view_url'].'images/icons/Users16.png" />&nbsp;Grupy uprawnień');
$frm->addSelect("Grupa:", "user[securityRole]", (!empty($vars['user']['user_role']) ? $vars['user']['user_role'] : "-1") , $vars['user_roles'], array("tooltip"=>"Zaznacz do jakiej grupy użytkowników należy nowy użytkownik"));
//$frm->closeFieldset();     

$frm->addHTMLExternal('</div>');

$frm->addHTMLExternal('<div class="form-inputs" id="user-options">');
if (!empty($vars['user']['status']) && $vars['user']['status']==1)
{
 $frm->addRadio('Status pawny','user_status',(!empty($vars['user']['status']) ? $vars['user']['status'] : 1 ),array("1"=>"klient indywidualny","2"=>"firma"),array("id"=>"userstatus","noBreak"=>1,"disabled"=>"disabled"));

 $frm->addSelect('Województwo','user[city_state]',(!empty($vars['user']['fk_state_id']) ? $vars['user']['fk_state_id'] : "-1" ),$vars['contry_states'],array("onchange"=>"ajax_state_change(this.value);"));
 $frm->addSelect('Powiat','user[city_state_area]',(!empty($vars['user']['fk_area_id']) ? $vars['user']['fk_area_id'] : "-1" ),$vars['contry_areas'], array("class"=>"user_state_area"));
 $frm->addTextbox('Miejscowość','user[city_name]', (!empty($vars['user']['city_name']) ? $vars['user']['city_name'] : '' ));
 $frm->addTextbox('Ulica','user[streetname]', (!empty($vars['user']['streetname']) ? $vars['user']['streetname'] : '' ));
 $frm->addTextbox('Nr dmu','user[house_number]', (!empty($vars['user']['house_number']) ? $vars['user']['house_number'] : '' ));
 $frm->addTextbox('Kod poczoowy','user[city_code]',(!empty($vars['user']['city_code']) ? $vars['user']['city_code'] : '' ),array("tooltip"=>""));
 $frm->addTextbox('Telefon','user[contact_phone]','+48 ',(!empty($vars['user']['contact_phone']) ? $vars['user']['contact_phone'] : '' ),array("tooltip"=>""));
 $frm->addTextbox('Pesel','user[PESEL]', (!empty($vars['user']['PESEL']) ? $vars['user']['PESEL'] : '' ));

} else {
//firma
    $frm->addRadio('Status pawny','user_status',(!empty($vars['user']['status']) ? $vars['user']['status'] : 1 ),array("1"=>"klient indywidualny","2"=>"firma"),array("id"=>"userstatus","noBreak"=>1,"disabled"=>"disabled")); 

//$frm2->addHTMLExternal('<div style="display:none;" id="user-co">');
    $frm->addTextbox('Nazwa firmy','user[department_name]', (!empty($vars['user']['department_name']) ? $vars['user']['department_name'] : '' ), array("required"=>1));
    $frm->addSelect('Województwo','user[co_city_state]',(!empty($vars['user']['fk_state_id']) ? $vars['user']['fk_state_id'] : "-1" ),$vars['contry_states'], array("onchange"=>"ajax_state_change(this.value);"));
    $frm->addSelect('Powiat','user[co_city_state_area]', (!empty($vars['user']['fk_area_id']) ? $vars['user']['fk_area_id'] : "-1" ) ,$vars['contry_areas'], array("class"=>"user_state_area"));
    $frm->addTextbox('Miejscowość','user[city_name]', (!empty($vars['user']['city_name']) ? $vars['user']['city_name'] : '' ));
    $frm->addTextbox('Ulica','user[streetname]', (!empty($vars['user']['streetname']) ? $vars['user']['streetname'] : '' ));
    $frm->addTextbox('Nr dmu','user[house_number]', (!empty($vars['user']['house_number']) ? $vars['user']['house_number'] : '' ));
    $frm->addTextbox('Kod poczoowy','user[city_code]',(!empty($vars['user']['city_code']) ? $vars['user']['city_code'] : '' ),array("tooltip"=>""));
    $frm->addTextbox('Telefon','user[contact_phone]','+48 ',(!empty($vars['user']['contact_phone']) ? $vars['user']['contact_phone'] : '' ) ,array("tooltip"=>""));
    $frm->addTextbox('Nip','user[NIP]',(!empty($vars['user']['NIP']) ? $vars['user']['NIP'] : '' ),array("required"=>1));
    $frm->addTextbox('Regon','user[REGON]', (!empty($vars['user']['REGON']) ? $vars['user']['REGON'] : '' ), array("required"=>1));
    $frm->addEmail('Email kontaktowy','user[contact_email]',(!empty($vars['user']['contact_emial']) ? $vars['user']['contact_email'] : '' ),array("required"=>1));
    $frm->addTextbox('Adres strony www','user[website]', (!empty($vars['user']['website']) ? $vars['user']['website'] : 'http://www' ));
    
}
$frm->addHTMLExternal('</div>');
$frm->addHTMLExternal('</div>');
$frm->addButton('Zapisz','submit',array("name"=>"user_save","onclick"=>"submitform();"));
$frm->addButton('Zapisz i zamknij','submit',array("name"=>"user_save_close" ,"onclick"=>"submitform();"));
$frm->addButton('Anuluj','button',array("name"=>"user_cancel","onclick" =>"window.location.href = '".BASEURL."admin/users';"));
$frm->bind($frm2, 'document.getElementById("usrForm").user_change_pwd0.checked', '$_POST["user_status"] == 1');
$frm->render();

$scrvars = <<<EOD
<script type="text/javascript">
//<![CDATA[
    var pwd_length = {$vars['settings']->settings_min_password_chars->value};
    var module_url = "{$vars['baseurl']}admin/users/";

//]]>      
 </script>    
 
EOD;

echo $scrvars;
{/php}


{literal}

    
 <script type="text/javascript">
  //<![CDATA[
 
function togglepassword(val) {
 if(val == "1")
    jQuery("#user-password").show();
    else
    jQuery("#user-password").hide();
}    
 
function ajax_state_change(val){
$('.user_state_area').html('<option value="-1" disabled="disabled">...pobieranie danych</option>'); 
    $.get(module_url+'ajax_adm_get_areas/'+val,function(h){$('.user_state_area').html(h);});    
}
    
function ajax_username_blur(val){
  
  var action = module_url+'ajax_check_username/' + val; 
  
    if (val.length > 0) {
    
        $.get(action,function(h){
            if(h!='success'){
                 if ($('.pfbc-error').length==0 ){
                     $('.pfbc-main').prepend('<div class="pfbc-error ui-state-error ui-corner-all"><ul><li class="username-error">Błąd: ' + h + '</li></ul></div>');
                 }else { 
                 //$(".pfbc-error ul").html('');
                 $(".pfbc-error ul").append('<li class="username-error">Błąd: ' + h + '</li>');
                }    
              } else {
                            if ($('.pfbc-error').length > 0) $('.pfbc-error ul li.username-error').remove();
                           
                            if ($('.pfbc-error ul').html() == '' )  $('.pfbc-error').remove();   
                     }               
      });    
   }
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
    
 
  $('input[name="user_save"]').click(function(event){
 
  
        pwd1 = $('input[name="user[password]"]').val();
        pwd2 = $('input[name="user[password2]"]').val();    
    
        if (((pwd1!='') && (pwd2!='') && (pwd1!=pwd2))  || ( (pwd1!='') && (pwd2!='') && ((pwd1.length < pwd_length) || (pwd2.length < pwd_length))) ) {
        
        $(".pfbc-error ul").html('');
        $(".pfbc-error ul").append("<li>Błąd: Pola hasło oraz Potwierdź hasło muszą być identyczne i posiadać conajmniej 6 znaków.</li>");
        event.preventDefault();
        }
            
            
  
  });  
      
  
      
      
  }); 
 //]]>      
 </script> 
{/literal}
</section>