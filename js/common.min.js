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
	jQuery(window).scroll(function() {

    // если ширина экрана >110
		if (window.matchMedia('(min-width: 1134px)').matches) {
      if (jQuery(window).scrollTop() >= 110){

        // if (window.matchMedia('(max-width: 1134px)').matches) {

        // }
  			jQuery('.fixed').addClass('slideDown');

        jQuery('#change-bg').css({
          top       : "110px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "220px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '50px',
          transition : 'all 0.7s ease-in-out'
        });      

  			
  		}
  		else{
  			jQuery('.fixed').removeClass('slideDown');

  			jQuery('#change-bg').css({
          top       : "0px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "110px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '0px',
          transition : 'all 0.7s ease-in-out'
        });             			
  		}
    }

    // если ширина экрана > 1024
    if (window.matchMedia('(min-width: 1024px)').matches) {
      if (jQuery(window).scrollTop() >= 65){

        jQuery('.fixed').addClass('slideDown');

        jQuery('#change-bg').css({
          top       : "65px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "172px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '50px',
          transition : 'all 0.7s ease-in-out'
        });      

        
      }
      else{
        jQuery('.fixed').removeClass('slideDown');

        jQuery('#change-bg').css({
          top       : "0px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "65px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '0px',
          transition : 'all 0.7s ease-in-out'
        });                   
      }
    }

    // если ширина экрана >715
    if (window.matchMedia('(min-width: 715px)').matches) {
      if (jQuery(window).scrollTop() >= 65){

        jQuery('.fixed').addClass('slideDown');

        jQuery('#change-bg').css({
          top       : "65px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "172px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '50px',
          transition : 'all 0.7s ease-in-out'
        });      

        
      }
      else{
        jQuery('.fixed').removeClass('slideDown');

        jQuery('#change-bg').css({
          top       : "0px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "65px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '0px',
          transition : 'all 0.7s ease-in-out'
        });                   
      }
    }

    // если ширина экрана >715
    if (window.matchMedia('(min-width: 290px)').matches) {
      if (jQuery(window).scrollTop() >= 65){

        jQuery('.fixed').addClass('slideDown');

        jQuery('#change-bg').css({
          top       : "65px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "172px",
          transition : 'all 0.7s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '50px',
          transition : 'all 0.7s ease-in-out'
        });      

        
      }
      else{
        jQuery('.fixed').removeClass('slideDown');

        jQuery('#change-bg').css({
          top       : "0px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#change-bg").prev("div").css({
          top       : "65px",
          transition : 'all 0.3s ease-in-out'
        });

        jQuery("#about").css({
          'margin-top'       : '0px',
          transition : 'all 0.7s ease-in-out'
        });                   
      }
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

    // Read more
    jQuery('#readmore').showMore({
      minheight: 435,
      buttontxtmore: glob_read_more,
      buttontxtless: glob_show_less,
      buttoncss: 'readmore-css',
      animationspeed: 500            
    });
    if (window.matchMedia('(min-width: 1134px)').matches) {
      
      jQuery('#readmore-proc').showMore({
        minheight: 1727,
        buttontxtmore: glob_read_more_procc,
        buttontxtless: glob_show_less,
        buttoncss: 'btn btn-light btn-readmore-procc',
        animationspeed: 500            
      });
    }

    jQuery('#readmore-proc-sm').showMore({
      minheight: 1000,
      buttontxtmore: glob_read_more_procc,
      buttontxtless: glob_show_less,
      buttoncss: 'btn btn-light btn-readmore-procc',
      animationspeed: 500            
    });    


    // end read more        

    // effects for readmore buttons
  jQuery("#showmore-button-readmore").click(function() {
    if(jQuery("#readmore").css('opacity') == 1) {
      jQuery("#readmore").animate({opacity:0.8}, 600);
      jQuery(this).removeClass("readmore-css-hover");

    } else{
      jQuery("#readmore").animate({opacity:1}, 600);
      jQuery(this).addClass("readmore-css-hover");
    }
  });
    // end effects

    // styling input type file
  jQuery('#input-file').jfilestyle({
    text : 'add file',
    placeholder: glob_file_select,
    inputSize: '100%'
  });
  // end styling

  // Tabs to Accordion
  jQuery("#tabsToAccordion").easyResponsiveTabs({
      type: 'vertical', //Типы: default, vertical, accordion
      width: 'auto', //auto или любое значение ширины
      fit: true,   // 100% пространства занимает в контейнере
      activate: function() {} // Функция обратного вызова, используется, когда происходит переключение вкладок
  });

  // End Tabs to Accordion 

  // функция удаления классов заканчивающихся любым символом
  jQuery.fn.removeClassWild = function(mask) {
          return this.removeClass(function(index, cls) {
              var re = mask.replace(/\*/g, '\\S+');
              return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
          });
  };

  // нажатие на иконку
  jQuery("#hvastalka .icon").click(function() {
    // удаление классов iconHoveClass_*
    jQuery("#hvastalka .icon").removeClassWild("iconHoveClass_*");
    // удаление линий треугольника
    jQuery("#hvastalka .container").removeClassWild("borderSolidContainer_*");
    jQuery("#hvastalka .triangle").removeClassWild("borderSolidTriangle_*");
    // id нажатого итема
    var item = jQuery(this).attr("data-item");
    // добавление класса иконке
    jQuery(this).addClass("iconHoveClass_" + item);
    // добавление классов треугольнику...
    jQuery(this).siblings('.container').addClass('borderSolidContainer_' + item).children(".triangle").addClass('borderSolidTriangle_' + item);

  });


  // нажатие на заголовок
  jQuery("#hvastalka .title").click(function() {
    // удаление классов iconHoveClass_*
    jQuery("#hvastalka .icon").removeClassWild("iconHoveClass_*");
    // удаление классов треугольника...
    jQuery("#hvastalka .container").removeClassWild("borderSolidContainer_*");
    jQuery("#hvastalka .triangle").removeClassWild("borderSolidTriangle_*");
    // текущий итем
    var item = jQuery(this).attr("data-item");
    // добавление класса текущей иконке(определяем по data-item)
    jQuery('#hvastalka .icon[data-item=' + item +']').addClass("iconHoveClass_" + item);
    // аналогично добавляем классы треугольнику
    jQuery('#hvastalka .container[data-item=' + item +']').addClass('borderSolidContainer_' + item);
    jQuery('#hvastalka .container[data-item=' + item +']').children(".triangle").addClass('borderSolidTriangle_' + item);
   
  });


  // По клику на иконку или заголовок заменяем в блоку .center содержимое
  jQuery("#hvastalka .title").add("#hvastalka .icon").click(function() {
    // обнуляем фон кругляшки
    jQuery('#hvastalka .point').css('background-color', "#08005A");

    var click_item = jQuery(this).attr("data-item");
    // задаем нужный фон кругляшке
    jQuery('#hvastalka .point[data-item=' + click_item +']').css('background-color', "#1100C2");

    var text = jQuery('[data-item-text="' + click_item + '"]').text();
    var title = jQuery('[data-item-title="' + click_item + '"]').text();

    jQuery("#default-text").html('');
    jQuery("#default-title").html('');

    jQuery('[data-item-title="' + click_item + '"]').clone().appendTo("#default-title").show('slow');    
    jQuery('[data-item-text="' + click_item + '"]').clone().appendTo("#default-text").show('slow');

    jQuery("#default-title").removeClass('title-default');
    jQuery("#default-text").removeClass('text-default');
    
  });

  // add Button the top
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > jQuery(this).height() ) {
      jQuery('.top').addClass('active');
    } else {
      jQuery('.top').removeClass('active');
    }
  });

  jQuery('.top').click(function() {
    jQuery('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
  });
  // end Button the top

  // Mmenu
  if (jQuery("#my-menu").length){
    // jQuery("#my-menu").css("display", "block");
    jQuery('#my-menu').mmenu({
      extensions: ['theme-dark', 'fx-menu-zoom', 'pagedim-black'],
      navbar: {
        title: 'Site Menu:'
      },
      offCanvas: {
        position: 'left'
      }
    });

    var api = jQuery('#my-menu').data('mmenu');
    api.bind('open:finish', function() {
      jQuery('.hamburger').addClass('is-active');
    });

    api.bind('close:finish', function() {
      jQuery('.hamburger').removeClass('is-active');
    });         
  } 
  // end mmenu                

});
