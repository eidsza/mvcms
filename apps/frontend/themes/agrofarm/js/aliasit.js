$(document).ready(function(){
			$(".box-4").hover(function(){
				$(this).addClass("alt");
			}, function(){
				$(this).removeClass("alt");
			});
//});

//$(document).ready(function() {
	   $('ul.sf-menu').superfish({
	      delay:       1000,
	      animation:   {opacity:'show',height:'show'},
	      speed:       'fast',
	      autoArrows:  false,
	      dropShadows: false
	   });

  $("#newsform .btn").live('click',function(){
       var this_form = $(".newsletter").html();
       var dataString = 'email='+ $("#email").val();  

      
      $.ajax({  
             type: "POST",  
             url: "lib/newsletter.php",  
             data: dataString,
             
             success: function(d) {  
             //alert (d);
             $('.newsletter').html(d).hide().fadeIn(2000, function() {  
              $('.newsletter').html(this_form).hide().fadeIn(2000);  
               });  
              //alert('ok');
              },
             error: function(){
                // alert ('error');
                $('.newsletter').html("Wystąpił błąd zapisu!").hide().fadeIn(2000, function() {  
                $('.newsletter').html(this_form).hide().fadeIn(2000);  
               });  
             }  
          });
    });



});