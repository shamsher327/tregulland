(function ($) {

  'use strict';

  /**
   * Provides the off-canvas menu.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches the behavior for the off-canvas menu.
   */
  Drupal.behaviors.responsive_menu_mmenu = {
    attach: function (context) {
      $(context).find('body').once('responsive-menu-mmenu').each(function() {

        // Add the media query as new styles.
        var horizontal_media_query = drupalSettings.responsive_menu.mediaQuery;
        //$("<style> @media " + horizontal_media_query + " { .responsive-menu-block-wrapper { display: block; } .responsive-menu-toggle { display: none; } } </style>").appendTo("head");

        if (typeof($.mmenu) != 'undefined') {

          // Get the position and theme options from Drupal settings.
          var position = drupalSettings.responsive_menu.position;
          var theme = drupalSettings.responsive_menu.theme;

          // Set up the off canvas menu.
          $('#off-canvas').mmenu({
            extensions: [theme, 'effect-slide-menu'],
            offCanvas: {
              zposition: 'next',
              position: position
            }
          }, {
            clone: false
          });

          /*
          // Fix some quirks with Firefox rendering the toolbar in an odd position.
          if ($('#toolbar-administration').length > 0) {
            var api = $('#off-canvas').data('mmenu');
            api.bind("opened", function ($panel) {
              $('.toolbar-tray-vertical').css('overflow-x', 'auto');
            });
            api.bind("closed", function ($panel) {
              $('.toolbar-tray-vertical').css('overflow-x', 'hidden');
            });
          }*/
        }
      });
    }
  };
})(jQuery);
