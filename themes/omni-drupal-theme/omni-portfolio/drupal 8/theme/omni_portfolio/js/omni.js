/* COPYRIGHT
------------------------------------------------------------------  
  Omni for Drupal 8.x - Version 1.0                           
  Copyright (C) 2016 esors.com All Rights Reserved.           
  @license - Copyrighted Commercial Software                   
------------------------------------------------------------------  
  Theme Name: Omni Portfolio                                           
  Author: ESORS                                           
  Date: 19th August 2016                                        
  Website: http://www.esors.com/                              
------------------------------------------------------------------  
  This file may not be redistributed in whole or   
  significant part.                                            
----------------------------------------------------------------*/

(function(jQuery) {
  
  jQuery(window).load(function() { 
    jQuery('#status').fadeOut(); 
    jQuery('#preloader').delay(350).fadeOut('slow'); 
    jQuery('body').delay(350).css({
      'overflow': 'visible'
    });
  });

  jQuery().ready(function() {       
    
    jQuery('.showcase-basic').on('init', function(event, slick){
      var title = jQuery('.showcase-basic .slick-active .slide-title');
      var content = jQuery('.showcase-basic .slick-active .slide-content');
      var pattern = jQuery('.slick-active .inner');
      
      if (pattern.hasClass('a-0')) {
        pattern_hinge(title, content);
      } else if (pattern.hasClass('a-1')) {
        pattern_hinge_alter(title, content);
      } else if (pattern.hasClass('a-2')) {
        pattern_slide(title, content);
      } else if (pattern.hasClass('a-3')) {
        pattern_slide_alter(title, content);
      } else if (pattern.hasClass('a-4')) {
        pattern_scale(title, content);
      } else {
        pattern_scale_alter(title, content);
      }
    });

    jQuery('.showcase-basic').slick({ 
      arrows: true,
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
      var title = jQuery('.showcase-basic .slick-active .slide-title');
      var content = jQuery('.showcase-basic .slick-active .slide-content'); 

      if (jQuery('.slick-active > div > div').hasClass('a-0')) {
        pattern_hinge(title, content);
      }      
      if (jQuery('.slick-active > div > div').hasClass('a-1')) {
        pattern_hinge_alter(title, content);
      }  
      if (jQuery('.slick-active > div > div').hasClass('a-2')) {
        pattern_slide(title, content);
      } 
      if (jQuery('.slick-active > div > div').hasClass('a-3')) {
        pattern_slide_alter(title, content);
      } 
      if (jQuery('.slick-active > div > div').hasClass('a-4')) {
        pattern_scale(title, content);
      } 
      if (jQuery('.slick-active > div > div').hasClass('a-5')) {
        pattern_scale_alter(title, content);
      }
    });

    jQuery('.showcase-basic').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      jQuery('.showcase-basic .slick-active .element').css("display", "none");
    }); 

    jQuery('.showcase-blog').on('init', function(event, slick){
      var title = jQuery('.showcase-blog .slick-active .slide-title');
      var content = jQuery('.showcase-blog .slick-active .slide-content');
      var button = jQuery('.showcase-blog .slick-active .slide-button');      
      pattern_hinge_alter(title, content, button);
    });

    jQuery('.showcase-blog').slick({ 
      arrows: true,
      dots: false,
      responsive: [
        {
          breakpoint: 640,
          settings: {            
            draggable: false
          }
        }
      ]
    }); 

    jQuery('.showcase-blog').on('afterChange', function(event, slick, currentSlide){
      var title = jQuery('.showcase-blog .slick-active .slide-title');
      var content = jQuery('.showcase-blog .slick-active .slide-content'); 
      var button = jQuery('.showcase-blog .slick-active .slide-button');
      pattern_hinge_alter(title, content, button);
    });

    jQuery('.showcase-blog').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      jQuery('.showcase-blog .slick-active .element').css("display", "none");
    });

    jQuery('.showcase-merging').slick({ 
      arrows: false,
      dots: true,
    }); 

    jQuery('.showcase-portfolio').slick({ 
      slidesToShow: 5,
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

    var portfolio_grid = jQuery('.portfolio-grid').masonry({
      itemSelector: '.portfolio-item',
      columnWidth: '.portfolio-sizer',
      percentPosition: true
    });

    var blog_grid = jQuery('.blog-grid').masonry({
      itemSelector: '.blog-item',
      columnWidth: '.blog-sizer',
      percentPosition: true
    });

    portfolio_grid.imagesLoaded().progress( function() {
      portfolio_grid.masonry('layout');
    });

    blog_grid.imagesLoaded().progress( function() {
      blog_grid.masonry('layout');
    });

    if (window.location.href.indexOf("field_category_target_id") >= 0) {
      var category = getQueryParam('field_category_target_id');

      jQuery('.category-list a').each(function(){        
        if(jQuery(this).attr('id') == category){
          jQuery('.category-list a').removeClass('active');
          jQuery(this).addClass('active');
        }
      });
    }
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

  function getQueryParam(param) {
    location.search.substr(1)
      .split("&")
      .some(function(item) { // returns first occurence and stops
          return item.split("=")[0] == param && (param = item.split("=")[1])
      })
    return param
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

