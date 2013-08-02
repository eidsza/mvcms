<link rel="stylesheet" href="{$vars.view_url}css/page.css" type="text/css" media="all">
<section class="title">
    <h4>Ustawienia witryny  </h4>
</section>
<section class="item">

{php}
$vars = $template->get_template_vars('vars');

$settingsform= new Form('settingsform');
$settingsform->setAttributes(
    array(
    "width"=>'950px',
    "action" => $vars['action'],
    "labelWidth" => 500,
    "labelPaddingTop" => "0.5em",
    //"preventJQueryUILoad"=>0,
    //"preventDefaultCSS"=>0,
    "jsIncludesPath"=> '/'.basename(BASEPATH).'/lib/php-form-builder-class/includes/',
));
$settingsform->addButton($vars['lang']['settings.save_button'],'submit',array("name"=>"settings_save"));
$settingsform->addButton($vars['lang']['settings.save_close_button'],'submit',array("name"=>"settings_save_close"));
$settingsform->addButton($vars['lang']['settings.cancel_button'],'button',array("name"=>"page_cancel","onclick" =>"window.location.href = '".BASEURL."admin/';"));

$settingsform->addHTMLExternal('<div class="tabs" id="tabs">
  <ul class="tab-menu">
   <li><a href="#settings-main"><span>'.$vars['lang']['settings.tab.general'].'</span></a></li>
   <li><a href="#settings-email"><span>Email</span></a></li>
   <li><a href="#settings-comments"><span>Komentarze</span></a></li> 
   <li><a href="#settings-users"><span>Użytkownicy</span></a></li> 
 </ul>');
$settingsform->addHTMLExternal('<div class="form-inputs" id="settings-main">');
$settingsform->addTextBox($vars['settings']->settings_site_name->title,'settings_site_name',$vars['settings']->settings_site_name->value,array("postHTML"=>"<span>".$vars['settings']->settings_site_name->description."</span>","required"=>$vars['settings']->settings_site_name->required));
$settingsform->addTextBox($vars['settings']->settings_site_slogan->title,'settings_site_slogan',$vars['settings']->settings_site_slogan->value,array("postHTML"=>"<span>".$vars['settings']->settings_site_slogan->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_meta_subject->title,'settings_meta_subject',$vars['settings']->settings_meta_subject->value,array("postHTML"=>"<span>".$vars['settings']->settings_meta_subject->description."</span>"));
$settingsform->addSelect($vars['settings']->settings_records_per_page->title,'settings_records_per_page',$vars['settings']->settings_records_per_page->value,$vars['settings']->settings_records_per_page->options,array("postHTML"=>"<span>".$vars['settings']->settings_records_per_page->description."</span>"));
$settingsform->addTextarea($vars['settings']->settings_page_service_message->title,'settings_page_service_message',$vars['settings']->settings_page_service_message->value, array("postHTML"=>"<span>".$vars['settings']->settings_page_service_message->description."</span>"));
$settingsform->addRadio($vars['settings']->settings_page_status->title,'settings_page_status',$vars['settings']->settings_page_status->value, $vars['settings']->settings_page_status->options, array("noBreak"=>1, "postHTML"=>"<br/><br/><span>".$vars['settings']->settings_page_status->description."</span>"));
//$settingsform->openFieldset('Zmienne lokalne') ;
$settingsform->addTextBox($vars['settings']->settings_cookie_expire->title,'settings_cookie_expire', $vars['settings']->settings_cookie_expire->value ,array("postHTML"=>"<span>".$vars['settings']->settings_cookie_expire->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_cookie_path->title,'settings_cookie_path', $vars['settings']->settings_cookie_path->value ,array("postHTML"=>"<span>".$vars['settings']->settings_cookie_path->description."</span>"));
//$settingsform->closeFieldset() ;
$settingsform->addHTMLExternal('</div>');

$settingsform->addHTMLExternal('<div class="form-inputs" id="settings-email">');
$settingsform->addTextBox($vars['settings']->settings_email_contact->title,'settings_email_contact',$vars['settings']->settings_email_contact->value, array("postHTML"=>"<span>".$vars['settings']->settings_email_contact->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_email_from_name->title ,'settings_email_from_name',$vars['settings']->settings_email_from_name->value, array("postHTML"=>"<span>".$vars['settings']->settings_email_from_name->description."</span>"));
$settingsform->addTextBox('Email serwera','settings_email_server','bok@admin.pl',array("postHTML"=>"<span>Wszystkie e-maile do użytkowników będą pochodziły z tego adresu.</span>"));
$settingsform->addSelect($vars['settings']->settings_email_protocol->title,'settings_email_protocol',$vars['settings']->settings_email_protocol->value, $vars['settings']->settings_email_protocol->options, array("postHTML"=>"<span>".$vars['settings']->settings_email_protocol->description."</span>","onChange"=>"toggleSMTP(this.value);"));
$settingsform->addHTMLExternal('<div style="display:none" id="smpt_option">');
$settingsform->addTextBox($vars['settings']->settings_email_smtp->title,'settings_email_smtp',$vars['settings']->settings_email_smtp->value, array("postHTML"=>"<span>".$vars['settings']->settings_email_smtp->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_email_smtp_port->title,'settings_email_smtp_port',$vars['settings']->settings_email_smtp_port->value, array("postHTML"=>"<span>".$vars['settings']->settings_email_smtp_port->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_email_smtp_username->title,'settings_email_smtp_username', $vars['settings']->settings_email_smtp_username->value, array("postHTML"=>"<span>".$vars['settings']->settings_email_smtp_username->description."</span>"));
$settingsform->addPassword($vars['settings']->settings_smtp_password->title,'settings_smtp_password', $vars['settings']->settings_smtp_password->value, array("postHTML"=>"<span>".$vars['settings']->settings_smtp_password->description."</span>"));
$settingsform->addHTMLExternal('</div>');
$settingsform->addHTMLExternal('</div>');

$settingsform->addHTMLExternal('<div class="form-inputs" id="settings-comments">');
$settingsform->addRadio('Włącz komentarze','settings_comments_alowed',1,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1, "postHTML"=>"<br /><br /><span>Czy chcesz pozwolić użytkownikom pisać komentarze?</span>"));
$settingsform->addRadio('Moderacja komentarzy','settings_comments_moderation',1,array("1"=>"Tak","0"=>"Nie"),array("noBreak"=>1, "postHTML"=>"<br /><br /><span>Ustaw czy przed pojawieniem się na stronie komentarze<br /> muszą zostać zatwierdzone przez administratora.</span>"));
$settingsform->addHTMLExternal('</div>');

$settingsform->addHTMLExternal('<div class="form-inputs" id="settings-users">');
$settingsform->addRadio($vars['settings']->settings_user_registration->title,'settings_user_registration', $vars['settings']->settings_user_registration->value, $vars['settings']->settings_user_registration->options,array("noBreak"=>1, "postHTML"=>"<br /><br /><span>".$vars['settings']->settings_user_registration->description."</span>"));
$settingsform->addRadio($vars['settings']->settings_user_activation->title,'settings_user_activation', $vars['settings']->settings_user_activation->value, $vars['settings']->settings_user_activation->options,array("noBreak"=>1, "postHTML"=>"<br /><br /><span>".$vars['settings']->settings_user_activation->description."</span>"));
$settingsform->addRadio($vars['settings']->settings_track_visitors->title,'settings_track_visitors', $vars['settings']->settings_track_visitors->value, $vars['settings']->settings_track_visitors->options,array("noBreak"=>1, "postHTML"=>"<br /><br /><span>".$vars['settings']->settings_track_visitors->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_user_timeout->title,'settings_user_timeout',$vars['settings']->settings_user_timeout->value, array("postHTML"=>"<span>".$vars['settings']->settings_user_timeout->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_guest_timeout->title,'settings_guest_timeout',$vars['settings']->settings_guest_timeout->value, array("postHTML"=>"<span>".$vars['settings']->settings_guest_timeout->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_min_username_chars->title, 'settings_min_username_chars',$vars['settings']->settings_min_username_chars->value,array("postHTML"=>"<span>".$vars['settings']->settings_min_username_chars->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_max_username_chars->title,'settings_max_username_chars',$vars['settings']->settings_max_username_chars->value,array("postHTML"=>"<span>".$vars['settings']->settings_max_username_chars->description."</span>"));
$settingsform->addTextBox($vars['settings']->settings_min_password_chars->title,'settings_min_password_chars',$vars['settings']->settings_min_password_chars->value, array("postHTML"=>"<span>".$vars['settings']->settings_min_password_chars->description."</span>"));
$settingsform->addRadio($vars['settings']->settings_enable_captcha->title,'settings_enable_captcha', $vars['settings']->settings_enable_captcha->value, $vars['settings']->settings_enable_captcha->options,array("noBreak"=>1, "postHTML"=>"<br /><br /><span>".$vars['settings']->settings_enable_captcha->description."</span>"));


$settingsform->addHTMLExternal('</div>');

$settingsform->addHTMLExternal('</div>');
$settingsform->addButton('Zapisz','submit',array("name"=>"settings_save"));
$settingsform->addButton('Zapisz i zamknij','submit',array("name"=>"settings_save_close"));
$settingsform->addButton('Anuluj','button',array("name"=>"settings_cancel","onclick" =>"window.location.href = '".BASEURL."admin/';"));
$settingsform->render();

{/php}
<link rel="stylesheet" href="{$vars.view_url}css/page.css" type="text/css" media="all">

{literal}
    
 <script type="text/javascript">
 //<![CDATA[
 function toggleSMTP(val)
    {
        if(val == "MAIL")
            document.getElementById("smpt_option").style.display = "none";
        else
            document.getElementById("smpt_option").style.display = "block";
    }    

          
$(function(){
    var tabContainers = $('div.tabs > div');
      tabContainers.hide().filter(':first').show();
			
			$('div.tabs ul.tab-menu a').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tabs ul.tab-menu a').removeClass('selected');
				$(this).addClass('selected');
				return false;
			}).filter(':first').click(); 
    
    
    var o = $("select[name=settings_email_protocol] option:selected").val();
    if( o == 'SMTP') toggleSMTP('SMTP');

}); 
 //]]>      
 </script> 
{/literal}
</section>