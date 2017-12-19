var spinner = {
    index: 0,
    auto: function(currentIndex) {
      if (currentIndex != undefined) {
        spinner.index = currentIndex % spinner.quotes.length;
      } else {
        spinner.index = (spinner.index + 1) % spinner.quotes.length;
      }
      spinner.quotes.removeClass("show");
      jQuery(spinner.quotes[spinner.index]).addClass("show");
      spinner.dots.removeClass('dot-fill');
      jQuery(spinner.dots[spinner.index]).addClass('dot-fill');
    },

    initial: function(){
      this.quotes = jQuery(".quote-rotate");
      this.images = jQuery(".quote-image");
      spinner.quotes.first().addClass("show");
      //dots
      for (i = 0; i < spinner.quotes.length; i++) {
        jQuery('.quote-dots').append('<div class="nav-dot"></div>');
      }
      this.dots = jQuery(".nav-dot");
      jQuery(spinner.dots).first().addClass('dot-fill');
    },

    dotnav: function(){
      jQuery(spinner.dots).on("click", function(){
        var currentIndex = jQuery(spinner.dots).index(this);
        spinner.auto(currentIndex);
        window.clearInterval(interval);
        interval = window.setInterval(spinner.auto, 6500);
        // jQuery('#change-bg').css('background-image', 'url(//localhost:3000/wp-content/uploads/2017/12/bg_foto_splash2.png)');
      });
    }
  }

	// var stickyHeader = function(){
	 
	//   //THE POSITION OF TOP OF PAGE IN BROWSER WINDOW
	//   var windowTopPosition = jQuery(window).scrollTop();
	  
	//   //THE POSITION OF ARTICLE TOP
	//   var triggerContainer = jQuery('.slider-full').offset().top;

	//   //THE THING THATS STICKS
	//   var stickyContainer = jQuery('#menu-full');
	  
	//   if (windowTopPosition > triggerContainer) {    
	//     stickyContainer.addClass('sticky');
	//     stickyContainer.slideDown('fast');
	    
	//   }else{
	//     stickyContainer.removeClass('sticky');
	//     stickyContainer.css("display","");
	//   }
	// };  

jQuery(function() {
 	spinner.initial();
 	spinner.dotnav();
 	interval = window.setInterval(spinner.auto, 5000);

	jQuery("#menu-full").before(jQuery("#menu-full").clone().addClass("fixed"));
	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop() >= 110){
			jQuery('#change-bg').css("top", "110px");
			jQuery('.fixed').addClass('slideDown');
		}
		else{
			jQuery('.fixed').removeClass('slideDown');
			jQuery('#change-bg').css("top", "0px");			
		}
	
	});

	// jQuery(window).scroll(stickyHeader);		
});
