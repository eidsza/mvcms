<!DOCTYPE html>
<html lang="en">
<head>
    <title>{$vars.site_title} - {$vars.page_title}</title>
    <meta charset="utf-8">
    {$vars.assets}
	
</head>
<body id="page1">
<!--==============================header=================================-->
<header id="header">

	<div class="main">
    	<div class="row-1">
        	<h1><a class="logo" href="#">Qioness</a></h1>
            
            <div class="search searchform">
            
            <form id="searchform" method="GET" action="">
            <input id="search" class="input_text" type="text" value="Wyszukiwarka" onkeypress="" onblur="" onfocus="" name="search" />
            <input type="button" class="btn" onClick=""/>
            </form>
            </div>
            
            
                
        </div>
		<div class="row-2">
        	<nav>
              {$custom_menu_1}
          </nav>
        </div>
        <div class="row-3">
         <div class="logosigns">
         <ul class="logos">
         
         </ul>
         </div>
         <div class="subheader">
         <span class="dateinfo">{$smarty.now|date_format:'%e %b, %Y'}</span>
         <span class="dateinfo">&nbsp;&nbsp;|&nbsp;&nbsp;</span> 
         <span class="subheader_1">imieniny:</span> 
         <span class="namedayinfo">
         
         </span>
         </div>
            
        </div>
    </div>	
</header>
<!--==============================content================================-->
<div class="bg" id="content-index">
  <div class="main">
  		<section id="content">

    	<div class="container_24">
    	   

            <div class="wrapper">
                 {$content}
            </div>
        </div>
    </section>

  </div>
</div>
<aside>
	<div class="main">
    	<div class="container_24">
        	<div class="wrapper spacer-1">
            	<div class="grid_7 suffix_1 alpha">
                	<div class="bg-spacer">
                    	<div class="padding-left">
                    	<h4 class="prev-indent-bot">NEWSLETTER</h4>
 
                        <ul class="list-2">
                        	<li class="last-item">
                            Zpisz się do naszego newslettera! <br />Bedziesz otrzymywać nowe informacje publikowane na naszej stronie.
                        	</li>
                        </ul>
                        <div class="newsletter">
                        <form method="POST" action="lib/newsletter.php" id="newsform">
                        <input type="text" name="email" value="" class="" id="email">
                        <input type="button" class="btn">
                        </form>
                        </div>

                    </div>
                    </div>
                </div>
               
                <div class="grid_8">
                	<div class="bg-spacer">

                    	<div class="padding-left">
                    	<h4>Dlaczego My?</h4>
                        <p class="color-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>			
                        
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</aside>
<!--==============================footer=================================-->
<footer>
	<div class="main">
            {$custom_menu_2}
	<div class="clear">&nbsp;</div>
        <span>Ośrodek Uzależnień &copy; 2011  <br></span>
    </div>
</footer>


</body>
</html>
