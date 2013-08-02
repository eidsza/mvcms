jQuery(function($){
    
    $("a[rel='colorbox']").colorbox({
      slideshow:true,
      previous: "&#171;&nbsp;",
      next:"&nbsp;&#187;",
      current:"zdjęcie {current} z {total}",
      close: "Zamknij",
      slideshowStart: "Start slide",
      slideshowStop : "Stop slide"
      });
   
  $("a.switch_thumb").toggle(function(){
	    
      $(this).removeClass("swap");
	    $("ul.foliodisplay").fadeOut("fast", function() {
	  	$(this).removeClass("thumb_view").fadeIn("fast");
    
     });
	  }, function () {
      
		  
      $(this).addClass("swap"); 
	    $("ul.foliodisplay").fadeOut("fast", function() {
	  	$(this).addClass("thumb_view").fadeIn("fast"); 
		     
    });
	}); 
  

})
