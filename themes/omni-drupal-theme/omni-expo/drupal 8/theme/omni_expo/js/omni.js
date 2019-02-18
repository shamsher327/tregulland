/* COPYRIGHT
------------------------------------------------------------------  
  Omni for Drupal 8.x - Version 1.0                           
  Copyright (C) 2016 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------  
  Theme Name: Omni Expo                                          
  Author: ESORS                                           
  Date: 1st October 2016                                        
  Website: http://www.esors.com/                              
------------------------------------------------------------------  
  This file may not be redistributed in whole or   
  significant part.                                            
----------------------------------------------------------------*/

(function(jQuery) {
  
  jQuery().ready(function() {       
    
    jQuery('.showcase-basic').on('init', function(event, slick){
      var title = jQuery('.showcase-basic .slick-active .slide-title');
      var content = jQuery('.showcase-basic .slick-active .slide-content');
      var button = jQuery('.showcase-basic .slick-active .slide-button');
      var pattern = jQuery('.slick-active .inner');
      
      if (pattern.hasClass('a-0')) {
        pattern_hinge(title, content, button);
      } else if (pattern.hasClass('a-1')) {
        pattern_slide(title, content, button);
      } else {
        pattern_scale(title, content, button);
      }
    });

    jQuery('.showcase-1').slick({ 
      lazyLoad: 'ondemand',
      arrows: false,
      dots: false,
      asNavFor: '.pager-1'
    }); 

    jQuery('.pager-1').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.showcase-1',
      dots: false,
      arrows: true,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3
          }
        },
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

    jQuery('.showcase-basic').on('afterChange', function(event, slick, currentSlide){
      var title = jQuery('.showcase-basic .slick-active .slide-title');
      var content = jQuery('.showcase-basic .slick-active .slide-content'); 
      var button = jQuery('.showcase-basic .slick-active .slide-button');

      if (jQuery('.slick-active > div > div').hasClass('a-0')) {
        pattern_hinge(title, content, button);
      }      
      if (jQuery('.slick-active > div > div').hasClass('a-1')) {
        pattern_slide(title, content, button);
      }  
      if (jQuery('.slick-active > div > div').hasClass('a-2')) {
        pattern_scale(title, content, button);
      } 
    });

    jQuery('.showcase-basic').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      jQuery('.showcase-basic .slick-active .element').css("display", "none");
    }); 

    jQuery('.showcase-trending').slick({ 
      slidesToShow: 4,
      slidesToScroll: 1,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3
          }
        },
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

    jQuery('.showcase-category').slick({ 
      slidesToShow: 5,
      slidesToScroll: 1,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1440,
          settings: {
            slidesToShow: 4
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3
          }
        },
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

  function pattern_slide(title, content, button) {    
    Foundation.Motion.animateIn(title, 'slide-in-up ease-in-out slow');
    Foundation.Motion.animateIn(content, 'slide-in-up ease-in-out slow long-delay');
    Foundation.Motion.animateIn(button, 'slide-in-up ease-in-out slow long-delay');
  }

  function pattern_scale(title, content, button) {    
    Foundation.Motion.animateIn(title, 'scale-in-down bounce-in slow');
    Foundation.Motion.animateIn(content, 'scale-in-down bounce-in slow long-delay');
    Foundation.Motion.animateIn(button, 'scale-in-down bounce-in slow long-delay');
  }  
})(jQuery);