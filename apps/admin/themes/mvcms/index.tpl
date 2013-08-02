<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>

<meta name="Generator" content="eCMS Copyright (C) 2011." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex, nofollow" />
<title>AliasIT - panel administracyjny mvCMS</title>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js'></script>
{$vars.assets}

                <!--
                [if IE]>
		<style type="text/css">
		ul#nav li ul  {
		filter: alpha(opacity=95);
		}
		/* Nav Tools  */
		div.MainMenu { 
		width:97%;
		}
		</style>
		<![endif]-->
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="themes/NCleanGrey/css/ie6.css" />
		<![endif]
                -->
		

</head>

<body >
<div id="ncleangrey-container"><div id="logocontainer">
	

	<div class="logotext">Panel administracyjny mvCMS <br />Witamy: {$vars.userinfo.username} <a href="{$vars.baseurl}admin/login/logout"> - wyloguj </a><br />
  
  </div>

</div>
<div class="topmenucontainer">
<ul id="nav">
   <li><a href="{$vars.baseurl}admin" class="selected">CMS</a>
    <ul>
    <li><a href="{$vars.baseurl}admin" class="selected">Home&nbsp;(start)</a></li>
    <li><a href="{$vars.baseurl}" target="_blank" rel="external">Podgląd&nbsp;strony</a></li>
    <li><a href="{$vars.baseurl}login/logout">Wyloguj</a></li>
    </ul>
    </li>
    <li><a href="#">Treść</a>
    <ul>
        <li><a href="{$vars.baseurl}admin/page">Strony</a></li>
        <li><a href="{$vars.baseurl}admin/news">Aktualności</a></li>
        <li><a href="{$vars.baseurl}admin/news/category">Kategorie dla aktualności</a></li>
    
    </ul>
    
    </li>
    <li><a href="#">Wygląd</a>
    <ul>
        <li><a href="{$vars.baseurl}admin/navigation">Menu</a></li> 
        <li><a href="{$vars.baseurl}admin/emailtemplates">Szablony wiadomosci email</a></li> 
    </ul>    
    </li>
    <li><a href="{$vars.baseurl}admin/gallery">Galeria</a>
    <ul>
      <li><a href="{$vars.baseurl}admin/gallery">Galerie</a></li>
    </ul>
    <li><a href="#">Narzędzia</a>
        <ul>    
            <li><a href="{$vars.baseurl}admin/newsletter">Newsletter</a></li>
        </ul>    
    </li>
    <li><a href="#">Użytkownicy & Grupy</a>
    <ul>
        <li><a href="{$vars.baseurl}admin/users">Użytkownicy</a></li>
        <li><a href="{$vars.baseurl}admin/groups">Grupy</a></li>
        <li><a href="{$vars.baseurl}admin/security">Uprawnienia</a></li>
    </ul>
    </li>
    <li><a href="#">Administracja</a>
    <ul>
        <li><a href="{$vars.baseurl}admin/settings">Ustawienia</a></li>
        <li><a href="index.php?module=ecms&amp;action=adminpasswordform">Zmiana hasła administratora</a></li>
        <li><a href="index.php?module=ecms&amp;action=hitcounter">Informacje o wizytach</a></li>
        <li><a href="index.php?module=translations">Wersje językowe</a></li>
    </ul>
    </li>
   
  </ul>
	<div class="clearb"></div>
</div>
	<div class="clearb"></div>
</div>
<div class="breadcrumbs">
	
<p class="pageheader"><center>Witamy w panelu administracyjnym. Życzymy przyjemnej pracy <br />AliastIT Team<center></p>
</div>
<div class="hstippled">&nbsp;</div>
<div class="sections_bar">
	<div class="wrapper">
           
        </div>
</div>
<div class="clear">&nbsp;</div>
<div id="MainContent">

<div class="clearb">&nbsp;</div>


<div style="clear: both;"></div>
 <div class="message">{$vars.statusmessage|default:$smarty.session.statusmessage|default:''} </div>
<div style="width:50px;display:box;"></div>
<div class="sections">

{$content}


</div><!-- END .sections-->
<div class="clearb"></div>
<br /><br /><br />
</div><!-- end MainContent -->

</div><!--end ncleangrey-container-->
<div id="footer">
		<a rel="external" href="http://www.4flavour.pl" title="web design, reklama interaktywna"><b>eCMS</b></a><b>&trade;</b> &nbsp;&nbsp;&nbsp; 3.0 &nbsp;"<a href="mailto:daniel@4flavour.pl" title="autor: Daniel Szantar">Daniel Szantar</a>" </div><!--end footer-->
</body>
</html>
