(function ($) {

	/**
   * Set active class on Views AJAX filter 
   * on selected category
   */
  Drupal.behaviors.exposedfilter_buttons = {
    attach: function(context, settings) {
      $('.filter-tab a').on('click', function(e) { 

        e.preventDefault();
        
        // Get ID of clicked item
        var id = $(e.target).attr('id');
        
        // Set the new value in the SELECT element
        var filter = $('#views-exposed-form-omni-library-page-page-portfolio select[name="field_category_target_id"]');
        filter.val(id);

        // Unset and then set the active class
        $('.filter-tab a').removeClass('active');
        $(e.target).addClass('active');

        // Do it! Trigger the select box
        //filter.trigger('change');
        $('#views-exposed-form-omni-library-page-page-portfolio select[name="field_category_target_id"]').trigger('change');
        $('#views-exposed-form-omni-library-page-page-portfolio input.form-submit').trigger('click');

      });
    }
  };	

	jQuery(document).ajaxComplete(function(event, xhr, settings) {

    if(typeof settings.extraData != 'undefined' && typeof settings.extraData.view_display_id != 'undefined') {
  		switch(settings.extraData.view_display_id){
        
        case "page_portfolio":
          var filter_id = $('#views-exposed-form-omni-library-page-page-portfolio select[name="field_category_target_id"]').find(":selected").val();

          $('.filter-tab a').removeClass('active');
          $('.filter-tab').find('#' + filter_id).addClass('active');

          var grid = jQuery('.portfolio-grid').masonry({
            itemSelector: '.portfolio-item',
            columnWidth: '.portfolio-sizer',
            percentPosition: true
          });

          break;

        default:
          break;
      }
    }
	});

})(jQuery);