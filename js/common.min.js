// Text slider
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
      if (spinner.quotes.length != 1) {
          for (i = 0; i < spinner.quotes.length; i++) {
            jQuery('.quote-dots').append("<div data-img=" + i + " class='nav-dot'></div>");
          }
          this.dots = jQuery(".nav-dot");
          jQuery(spinner.dots).first().addClass('dot-fill');
      }
    },

    dotnav: function(){
      jQuery(spinner.dots).on("click", function(){
        var currentIndex = jQuery(spinner.dots).index(this);
        spinner.auto(currentIndex);
        window.clearInterval(interval);
        interval = window.setInterval(spinner.auto, 6500);

      });
    }
}
// end text slider



jQuery(function() {

    // Text slider
 	spinner.initial();
 	spinner.dotnav();
 	interval = window.setInterval(spinner.auto, 5000);
    // end text slider

  // Fixed menu
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
    // end fixed menu

    // Switch bg

    // jQuery.BgSwitcher.defineEffect("extraSlide", function($el) {
    //   $el.animate({left: $el.width()}, this.config.duration, this.config.easing);
    // });

    // var myArray = ['fade', 'blind', 'clip', 'slide', 'drop', 'hide'];
    // myArray[Math.floor(Math.random() * myArray.length)]
      

    var $el = jQuery("#change-bg").bgswitcher({ 
      images: glob_slides_img,   
      effect: glob_effect
    });    

    jQuery(".nav-dot").on("click", function() {
      $el.bgswitcher("select", jQuery(this).attr("data-img")); 
    });

    // end switch bg    

});

// console.log(glob_slides_img);
// console.log(glob_effect);