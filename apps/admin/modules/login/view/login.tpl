<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Zaloguj się</title>
  <meta name="robots" content="noindex, nofollow" />
	<link rel="stylesheet" href="{$BASEURL}apps/admin/modules/login/view/css/style.css" >
 	<script type="text/javascript" src="{$BASEURL}apps/admin/modules/login/view/js/jquery.js" ></script>
   <!-- Place CSS bug fixes for IE 7 in this comment -->
	<!--[if IE 7]>
	<style type="text/css" media="screen">
		#login-logo { margin: 15px auto 15px auto; }
		.input-email { margin: -24px 0 0 10px;}
		.input-password { margin: -30px 0 0 14px; }
		body#login #login-box input { height: 20px; padding: 10px 4px 4px 35px; }
		body#login{ margin-top: 14%;}
	</style>
	<![endif]-->

</head>

<body id="login">

<div id="left"></div>
<div id="right"></div>
<div id="top"></div>
<div id="bottom"></div>
	<div id="login-box">
	{if isset($smarty.session.error_array)} 
   <div class="alert error">
	    <p>
	    {foreach from = $smarty.session.error_array item=error}
      {$error}<br />
      {/foreach}
      </p>
  </div>
    
  {/if}  
		<header id="main">
			<div id="login-logo"></div>
		</header>
	
		
    <form action="{$vars.baseurl}admin/login/check" method="post" accept-charset="utf-8">
    <div style="display:none">
    <input type="hidden" name="csrf_hash_name" value="78be2f96b7638f7eb36633833d1a074e" />
    </div>			
    <ul>
				<li>
					<input type="text" name="user" placeholder="Użytkownik" />
					
          <img class="input-email" alt="E-mail" src="{$vars.view_url}images/email-icon.png" />
        </li>
				<li>
					<input type="password" name="pass" placeholder="Hasło"  />
					<img class="input-password" alt="Hasło" src="{$vars.view_url}images/lock-icon.png" />				</li>
				<li>
					<input class="remember" class="remember" id="remember" type="checkbox" name="remember" value="1" />
					<label for="remember" class="remember">Pamiętaj mnie</label>
				</li>
				<li><center><input class="button" type="submit" name="submit" value="Zaloguj się" /></center></li>
			</ul>
		</form>
    
    </div>
	<center>
		<ul id="login-footer">
			<li><a href="http://pyrocms.com/">Powered by PyroCMS</a></li>
		</ul>
	</center>
</body>
</html>