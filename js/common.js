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
      });
    }
  }
  
jQuery(function() {
  spinner.initial();
  spinner.dotnav();
  interval = window.setInterval(spinner.auto, 3000);	
});
