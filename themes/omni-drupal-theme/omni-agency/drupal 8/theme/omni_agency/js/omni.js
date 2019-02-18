/* COPYRIGHT
------------------------------------------------------------------  
  Omni for Drupal 8.x - Version 1.0                           
  Copyright (C) 2016 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------  
  Theme Name: Omni Agency                                           
  Author: ESORS                                           
  Date: 19th May 2016                                        
  Website: http://www.esors.com/                              
------------------------------------------------------------------  
  This file may not be redistributed in whole or   
  significant part.                                            
----------------------------------------------------------------*/

(function(jQuery) {
    
  jQuery().ready(function() {       
    
    jQuery('.showcase-basic').on('init', function(event, slick){
      var title = jQuery('.slick-active .slide-title');
      var content = jQuery('.slick-active .slide-content');
      var button = jQuery('.slick-active .slide-button');
      var pattern = jQuery('.slick-active .inner');
      
      if (pattern.hasClass('a-0')) {
        pattern_hinge(title, content, button);
      } else if (pattern.hasClass('a-1')) {
        pattern_hinge_alter(title, content, button);
      } else if (pattern.hasClass('a-2')) {
        pattern_slide(title, content, button);
      } else if (pattern.hasClass('a-3')) {
        pattern_slide_alter(title, content, button);
      } else if (pattern.hasClass('a-4')) {
        pattern_scale(title, content, button);
      } else {
        pattern_scale_alter(title, content, button);
      }
    });

    jQuery('.showcase-basic').slick({ 
      dots: true,
      responsive: [
        {
          breakpoint: 640,
          settings: {            
            draggable: false
          }
        }
      ]
    }); 

    jQuery('.showcase-basic').on('afterChange', function(event, slick, currentSlide){
      var title = jQuery('.slick-active .slide-title');
      var content = jQuery('.slick-active .slide-content');
      var button = jQuery('.slick-active .slide-button');      

      if (jQuery('.slick-active > div > div').hasClass('a-0')) {
        pattern_hinge(title, content, button);
      }      
      if (jQuery('.slick-active > div > div').hasClass('a-1')) {
        pattern_hinge_alter(title, content, button);
      }  
      if (jQuery('.slick-active > div > div').hasClass('a-2')) {
        pattern_slide(title, content, button);
      } 
      if (jQuery('.slick-active > div > div').hasClass('a-3')) {
        pattern_slide_alter(title, content, button);
      } 
      if (jQuery('.slick-active > div > div').hasClass('a-4')) {
        pattern_scale(title, content, button);
      } 
      if (jQuery('.slick-active > div > div').hasClass('a-5')) {
        pattern_scale_alter(title, content, button);
      }
    });

    jQuery('.showcase-basic').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      jQuery('.slick-active .element').css("display", "none");
    });  

    jQuery('.showcase-merging').slick({ 
      dots: true,
      adaptiveHeight: true,
    }); 

    jQuery('.showcase-gallery-reveal').slick({ 
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: true,
      asNavFor: '.showcase-gallery',
    });

    jQuery('.showcase-gallery').slick({ 
      slidesToShow: 4,
      slidesToScroll: 1,
      adaptiveHeight: true,
      asNavFor: '.showcase-gallery-reveal',
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });    
  }); 

  function pattern_hinge(title, content, button) {    
    Foundation.Motion.animateIn(title, 'hinge-in-from-top');
    Foundation.Motion.animateIn(content, 'hinge-in-from-top long-delay');
    Foundation.Motion.animateIn(button, 'hinge-in-from-top long-delay');
  }

  function pattern_hinge_alter(title, content, button) {    
    Foundation.Motion.animateIn(title, 'hinge-in-from-middle-y');
    Foundation.Motion.animateIn(content, 'hinge-in-from-middle-x long-delay');
    Foundation.Motion.animateIn(button, 'hinge-in-from-middle-x long-delay');
  }

  function pattern_slide(title, content, button) {    
    Foundation.Motion.animateIn(title, 'slide-in-left bounce-in slow');
    Foundation.Motion.animateIn(content, 'slide-in-right bounce-in slow');
    Foundation.Motion.animateIn(button, 'scale-in-down bounce-in slow long-delay');
  }

  function pattern_slide_alter(title, content, button) {    
    Foundation.Motion.animateIn(title, 'slide-in-down bounce-in slow');
    Foundation.Motion.animateIn(content, 'slide-in-up bounce-in slow');
    Foundation.Motion.animateIn(button, 'scale-in-up bounce-in slow long-delay');
  }

  function pattern_scale(title, content, button) {    
    Foundation.Motion.animateIn(title, 'scale-in-up bounce-in slow');
    Foundation.Motion.animateIn(content, 'scale-in-up bounce-in slow long-delay');
    Foundation.Motion.animateIn(button, 'scale-in-up bounce-in slow long-delay');
  }

  function pattern_scale_alter(title, content, button) {    
    Foundation.Motion.animateIn(title, 'scale-in-down bounce-in slow');
    Foundation.Motion.animateIn(content, 'scale-in-down bounce-in slow long-delay');
    Foundation.Motion.animateIn(button, 'scale-in-down bounce-in slow long-delay');
  }
    
})(jQuery);

(function() {  
  sr.reveal('.block-reveal', { duration: 1500, mobile: false });
  sr.reveal('.block-reveal.origin-top', { origin: 'top'});
  sr.reveal('.block-reveal.origin-left', { origin: 'left'});
  sr.reveal('.block-reveal.origin-right', { origin: 'right'});
  sr.reveal('.block-reveal.speed-faster', { duration: 500});
  sr.reveal('.block-reveal.speed-slower', { duration: 2500});
  sr.reveal('.block-reveal.delay-500', { delay: 500});
  sr.reveal('.block-reveal.delay-1000', { delay: 1000});
  sr.reveal('.block-reveal.delay-1500', { delay: 1500});
  sr.reveal('.block-reveal.delay-2000', { delay: 2000});
  sr.reveal('.block-reveal.delay-2500', { delay: 2500});
  sr.reveal('.block-reveal.delay-3000', { delay: 3000});
  sr.reveal('.block-reveal.delay-4000', { delay: 4000});
  sr.reveal('.block-reveal.distance-further', { distance: '40px'});
  sr.reveal('.block-reveal.distance-closer', { distance: '10px'});
  sr.reveal('.block-reveal.reveal-reset', { reset: true});
})();