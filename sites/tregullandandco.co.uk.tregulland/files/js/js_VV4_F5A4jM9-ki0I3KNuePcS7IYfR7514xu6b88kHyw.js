/**
 * @file
 * Attaches behaviors for Drupal's active link marking.
 */

(function (Drupal, drupalSettings) {

  'use strict';

  /**
   * Append is-active class.
   *
   * The link is only active if its path corresponds to the current path, the
   * language of the linked path is equal to the current language, and if the
   * query parameters of the link equal those of the current request, since the
   * same request with different query parameters may yield a different page
   * (e.g. pagers, exposed View filters).
   *
   * Does not discriminate based on element type, so allows you to set the
   * is-active class on any element: a, li…
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.activeLinks = {
    attach: function (context) {
      // Start by finding all potentially active links.
      var path = drupalSettings.path;
      var queryString = JSON.stringify(path.currentQuery);
      var querySelector = path.currentQuery ? "[data-drupal-link-query='" + queryString + "']" : ':not([data-drupal-link-query])';
      var originalSelectors = ['[data-drupal-link-system-path="' + path.currentPath + '"]'];
      var selectors;

      // If this is the front page, we have to check for the <front> path as
      // well.
      if (path.isFront) {
        originalSelectors.push('[data-drupal-link-system-path="<front>"]');
      }

      // Add language filtering.
      selectors = [].concat(
        // Links without any hreflang attributes (most of them).
        originalSelectors.map(function (selector) { return selector + ':not([hreflang])'; }),
        // Links with hreflang equals to the current language.
        originalSelectors.map(function (selector) { return selector + '[hreflang="' + path.currentLanguage + '"]'; })
      );

      // Add query string selector for pagers, exposed filters.
      selectors = selectors.map(function (current) { return current + querySelector; });

      // Query the DOM.
      var activeLinks = context.querySelectorAll(selectors.join(','));
      var il = activeLinks.length;
      for (var i = 0; i < il; i++) {
        activeLinks[i].classList.add('is-active');
      }
    },
    detach: function (context, settings, trigger) {
      if (trigger === 'unload') {
        var activeLinks = context.querySelectorAll('[data-drupal-link-system-path].is-active');
        var il = activeLinks.length;
        for (var i = 0; i < il; i++) {
          activeLinks[i].classList.remove('is-active');
        }
      }
    }
  };

})(Drupal, drupalSettings);
;
/**
 * @file
 * Bootstrap Popovers.
 */

var Drupal = Drupal || {};

(function ($, Drupal, Bootstrap) {
  "use strict";

  /**
   * Extend the Bootstrap Popover plugin constructor class.
   */
  Bootstrap.extendPlugin('popover', function (settings) {
    return {
      DEFAULTS: {
        animation: !!settings.popover_animation,
        html: !!settings.popover_html,
        placement: settings.popover_placement,
        selector: settings.popover_selector,
        trigger: settings.popover_trigger,
        triggerAutoclose: !!settings.popover_trigger_autoclose,
        title: settings.popover_title,
        content: settings.popover_content,
        delay: parseInt(settings.popover_delay, 10),
        container: settings.popover_container
      }
    };
  });

  /**
   * Bootstrap Popovers.
   *
   * @todo This should really be properly delegated if selector option is set.
   */
  Drupal.behaviors.bootstrapPopovers = {
    attach: function (context) {

      // Popover autoclose.
      if ($.fn.popover.Constructor.DEFAULTS.triggerAutoclose) {
        var $currentPopover = null;
        $(document)
          .on('show.bs.popover', '[data-toggle=popover]', function () {
            var $trigger = $(this);
            var popover = $trigger.data('bs.popover');

            // Only keep track of clicked triggers that we're manually handling.
            if (popover.options.originalTrigger === 'click') {
              if ($currentPopover && !$currentPopover.is($trigger)) {
                $currentPopover.popover('hide');
              }
              $currentPopover = $trigger;
            }
          })
          .on('click', function (e) {
            var $target = $(e.target);
            var popover = $target.is('[data-toggle=popover]') && $target.data('bs.popover');
            if ($currentPopover && !$target.is('[data-toggle=popover]') && !$target.closest('.popover.in')[0]) {
              $currentPopover.popover('hide');
              $currentPopover = null;
            }
          })
        ;
      }

      var elements = $(context).find('[data-toggle=popover]').toArray();
      for (var i = 0; i < elements.length; i++) {
        var $element = $(elements[i]);
        var options = $.extend({}, $.fn.popover.Constructor.DEFAULTS, $element.data());

        // Store the original trigger.
        options.originalTrigger = options.trigger;

        // If the trigger is "click", then we'll handle it manually here.
        if (options.trigger === 'click') {
          options.trigger = 'manual';
        }

        // Retrieve content from a target element.
        var $target = $(options.target || $element.is('a[href^="#"]') && $element.attr('href')).clone();
        if (!options.content && $target[0]) {
          $target.removeClass('visually-hidden hidden').removeAttr('aria-hidden');
          options.content = $target.wrap('<div/>').parent()[options.html ? 'html' : 'text']() || '';
        }

        // Initialize the popover.
        $element.popover(options);

        // Handle clicks manually.
        if (options.originalTrigger === 'click') {
          // To ensure the element is bound multiple times, remove any
          // previously set event handler before adding another one.
          $element
            .off('click.drupal.bootstrap.popover')
            .on('click.drupal.bootstrap.popover', function (e) {
              $(this).popover('toggle');
              e.preventDefault();
              e.stopPropagation();
            })
          ;
        }
      }
    },
    detach: function (context) {
      // Destroy all popovers.
      $(context).find('[data-toggle="popover"]')
        .off('click.drupal.bootstrap.popover')
        .popover('destroy')
      ;
    }
  };

})(window.jQuery, window.Drupal, window.Drupal.bootstrap);
;
/**
 * @file
 * Bootstrap Tooltips.
 */

var Drupal = Drupal || {};

(function ($, Drupal, Bootstrap) {
  "use strict";

  /**
   * Extend the Bootstrap Tooltip plugin constructor class.
   */
  Bootstrap.extendPlugin('tooltip', function (settings) {
    return {
      DEFAULTS: {
        animation: !!settings.tooltip_animation,
        html: !!settings.tooltip_html,
        placement: settings.tooltip_placement,
        selector: settings.tooltip_selector,
        trigger: settings.tooltip_trigger,
        delay: parseInt(settings.tooltip_delay, 10),
        container: settings.tooltip_container
      }
    };
  });

  /**
   * Bootstrap Tooltips.
   *
   * @todo This should really be properly delegated if selector option is set.
   */
  Drupal.behaviors.bootstrapTooltips = {
    attach: function (context) {
      var elements = $(context).find('[data-toggle="tooltip"]').toArray();
      for (var i = 0; i < elements.length; i++) {
        var $element = $(elements[i]);
        var options = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, $element.data());
        $element.tooltip(options);
      }
    },
    detach: function (context) {
      // Destroy all tooltips.
      $(context).find('[data-toggle="tooltip"]').tooltip('destroy');
    }
  };

})(window.jQuery, window.Drupal, window.Drupal.bootstrap);
;
/**
 * @file
 * Provides JavaScript additions to the managed file field type.
 *
 * This file provides progress bar support (if available), popup windows for
 * file previews, and disabling of other file fields during Ajax uploads (which
 * prevents separate file fields from accidentally uploading files).
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Attach behaviors to the file fields passed in the settings.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches validation for file extensions.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches validation for file extensions.
   */
  Drupal.behaviors.fileValidateAutoAttach = {
    attach: function (context, settings) {
      var $context = $(context);
      var elements;

      function initFileValidation(selector) {
        $context.find(selector)
          .once('fileValidate')
          .on('change.fileValidate', {extensions: elements[selector]}, Drupal.file.validateExtension);
      }

      if (settings.file && settings.file.elements) {
        elements = settings.file.elements;
        Object.keys(elements).forEach(initFileValidation);
      }
    },
    detach: function (context, settings, trigger) {
      var $context = $(context);
      var elements;

      function removeFileValidation(selector) {
        $context.find(selector)
          .removeOnce('fileValidate')
          .off('change.fileValidate', Drupal.file.validateExtension);
      }

      if (trigger === 'unload' && settings.file && settings.file.elements) {
        elements = settings.file.elements;
        Object.keys(elements).forEach(removeFileValidation);
      }
    }
  };

  /**
   * Attach behaviors to file element auto upload.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches triggers for the upload button.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches auto file upload trigger.
   */
  Drupal.behaviors.fileAutoUpload = {
    attach: function (context) {
      $(context).find('input[type="file"]').once('auto-file-upload').on('change.autoFileUpload', Drupal.file.triggerUploadButton);
    },
    detach: function (context, setting, trigger) {
      if (trigger === 'unload') {
        $(context).find('input[type="file"]').removeOnce('auto-file-upload').off('.autoFileUpload');
      }
    }
  };

  /**
   * Attach behaviors to the file upload and remove buttons.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches form submit events.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches form submit events.
   */
  Drupal.behaviors.fileButtons = {
    attach: function (context) {
      var $context = $(context);
      $context.find('.js-form-submit').on('mousedown', Drupal.file.disableFields);
      $context.find('.js-form-managed-file .js-form-submit').on('mousedown', Drupal.file.progressBar);
    },
    detach: function (context) {
      var $context = $(context);
      $context.find('.js-form-submit').off('mousedown', Drupal.file.disableFields);
      $context.find('.js-form-managed-file .js-form-submit').off('mousedown', Drupal.file.progressBar);
    }
  };

  /**
   * Attach behaviors to links within managed file elements for preview windows.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches triggers.
   * @prop {Drupal~behaviorDetach} detach
   *   Detaches triggers.
   */
  Drupal.behaviors.filePreviewLinks = {
    attach: function (context) {
      $(context).find('div.js-form-managed-file .file a').on('click', Drupal.file.openInNewWindow);
    },
    detach: function (context) {
      $(context).find('div.js-form-managed-file .file a').off('click', Drupal.file.openInNewWindow);
    }
  };

  /**
   * File upload utility functions.
   *
   * @namespace
   */
  Drupal.file = Drupal.file || {

    /**
     * Client-side file input validation of file extensions.
     *
     * @name Drupal.file.validateExtension
     *
     * @param {jQuery.Event} event
     *   The event triggered. For example `change.fileValidate`.
     */
    validateExtension: function (event) {
      event.preventDefault();
      // Remove any previous errors.
      $('.file-upload-js-error').remove();

      // Add client side validation for the input[type=file].
      var extensionPattern = event.data.extensions.replace(/,\s*/g, '|');
      if (extensionPattern.length > 1 && this.value.length > 0) {
        var acceptableMatch = new RegExp('\\.(' + extensionPattern + ')$', 'gi');
        if (!acceptableMatch.test(this.value)) {
          var error = Drupal.t('The selected file %filename cannot be uploaded. Only files with the following extensions are allowed: %extensions.', {
            // According to the specifications of HTML5, a file upload control
            // should not reveal the real local path to the file that a user
            // has selected. Some web browsers implement this restriction by
            // replacing the local path with "C:\fakepath\", which can cause
            // confusion by leaving the user thinking perhaps Drupal could not
            // find the file because it messed up the file path. To avoid this
            // confusion, therefore, we strip out the bogus fakepath string.
            '%filename': this.value.replace('C:\\fakepath\\', ''),
            '%extensions': extensionPattern.replace(/\|/g, ', ')
          });
          $(this).closest('div.js-form-managed-file').prepend('<div class="messages messages--error file-upload-js-error" aria-live="polite">' + error + '</div>');
          this.value = '';
          // Cancel all other change event handlers.
          event.stopImmediatePropagation();
        }
      }
    },

    /**
     * Trigger the upload_button mouse event to auto-upload as a managed file.
     *
     * @name Drupal.file.triggerUploadButton
     *
     * @param {jQuery.Event} event
     *   The event triggered. For example `change.autoFileUpload`.
     */
    triggerUploadButton: function (event) {
      $(event.target).closest('.js-form-managed-file').find('.js-form-submit').trigger('mousedown');
    },

    /**
     * Prevent file uploads when using buttons not intended to upload.
     *
     * @name Drupal.file.disableFields
     *
     * @param {jQuery.Event} event
     *   The event triggered, most likely a `mousedown` event.
     */
    disableFields: function (event) {
      var $clickedButton = $(this).findOnce('ajax');

      // Only disable upload fields for Ajax buttons.
      if (!$clickedButton.length) {
        return;
      }

      // Check if we're working with an "Upload" button.
      var $enabledFields = [];
      if ($clickedButton.closest('div.js-form-managed-file').length > 0) {
        $enabledFields = $clickedButton.closest('div.js-form-managed-file').find('input.js-form-file');
      }

      // Temporarily disable upload fields other than the one we're currently
      // working with. Filter out fields that are already disabled so that they
      // do not get enabled when we re-enable these fields at the end of
      // behavior processing. Re-enable in a setTimeout set to a relatively
      // short amount of time (1 second). All the other mousedown handlers
      // (like Drupal's Ajax behaviors) are executed before any timeout
      // functions are called, so we don't have to worry about the fields being
      // re-enabled too soon. @todo If the previous sentence is true, why not
      // set the timeout to 0?
      var $fieldsToTemporarilyDisable = $('div.js-form-managed-file input.js-form-file').not($enabledFields).not(':disabled');
      $fieldsToTemporarilyDisable.prop('disabled', true);
      setTimeout(function () {
        $fieldsToTemporarilyDisable.prop('disabled', false);
      }, 1000);
    },

    /**
     * Add progress bar support if possible.
     *
     * @name Drupal.file.progressBar
     *
     * @param {jQuery.Event} event
     *   The event triggered, most likely a `mousedown` event.
     */
    progressBar: function (event) {
      var $clickedButton = $(this);
      var $progressId = $clickedButton.closest('div.js-form-managed-file').find('input.file-progress');
      if ($progressId.length) {
        var originalName = $progressId.attr('name');

        // Replace the name with the required identifier.
        $progressId.attr('name', originalName.match(/APC_UPLOAD_PROGRESS|UPLOAD_IDENTIFIER/)[0]);

        // Restore the original name after the upload begins.
        setTimeout(function () {
          $progressId.attr('name', originalName);
        }, 1000);
      }
      // Show the progress bar if the upload takes longer than half a second.
      setTimeout(function () {
        $clickedButton.closest('div.js-form-managed-file').find('div.ajax-progress-bar').slideDown();
      }, 500);
    },

    /**
     * Open links to files within forms in a new window.
     *
     * @name Drupal.file.openInNewWindow
     *
     * @param {jQuery.Event} event
     *   The event triggered, most likely a `click` event.
     */
    openInNewWindow: function (event) {
      event.preventDefault();
      $(this).attr('target', '_blank');
      window.open(this.href, 'filePreview', 'toolbar=0,scrollbars=1,location=1,statusbar=1,menubar=0,resizable=1,width=500,height=550');
    }
  };

})(jQuery, Drupal);
;
/*!
 * jQuery Form Plugin
 * version: 3.51.0-2014.06.20
 * Requires jQuery v1.5 or later
 * Copyright (c) 2014 M. Alsup
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses.
 * https://github.com/malsup/form#copyright-and-license
 */
!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var r=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(r))}function r(t){var r=t.target,a=e(r);if(!a.is("[type=submit],[type=image]")){var n=a.closest("[type=submit]");if(0===n.length)return;r=n[0]}var i=this;if(i.clk=r,"image"==r.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=a.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-r.offsetLeft,i.clk_y=t.pageY-r.offsetTop;setTimeout(function(){i.clk=i.clk_x=i.clk_y=null},100)}function a(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var n={};n.fileapi=void 0!==e("<input type='file'/>").get(0).files,n.formdata=void 0!==window.FormData;var i=!!e.fn.prop;e.fn.attr2=function(){if(!i)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function r(r){var a,n,i=e.param(r,t.traditional).split("&"),o=i.length,s=[];for(a=0;o>a;a++)i[a]=i[a].replace(/\+/g," "),n=i[a].split("="),s.push([decodeURIComponent(n[0]),decodeURIComponent(n[1])]);return s}function o(a){for(var n=new FormData,i=0;i<a.length;i++)n.append(a[i].name,a[i].value);if(t.extraData){var o=r(t.extraData);for(i=0;i<o.length;i++)o[i]&&n.append(o[i][0],o[i][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:u||"POST"});t.uploadProgress&&(s.xhr=function(){var r=e.ajaxSettings.xhr();return r.upload&&r.upload.addEventListener("progress",function(e){var r=0,a=e.loaded||e.position,n=e.total;e.lengthComputable&&(r=Math.ceil(a/n*100)),t.uploadProgress(e,a,n,r)},!1),r}),s.data=null;var c=s.beforeSend;return s.beforeSend=function(e,r){r.data=t.formData?t.formData:n,c&&c.call(this,e,r)},e.ajax(s)}function s(r){function n(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(r){a("cannot get iframe.contentWindow document: "+r)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(r){a("cannot get iframe.contentDocument: "+r),t=e.document}return t}function o(){function t(){try{var e=n(g).readyState;a("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(r){a("Server abort: ",r," (",r.name,")"),s(k),j&&clearTimeout(j),j=void 0}}var r=f.attr2("target"),i=f.attr2("action"),o="multipart/form-data",c=f.attr("enctype")||f.attr("encoding")||o;w.setAttribute("target",p),(!u||/post/i.test(u))&&w.setAttribute("method","POST"),i!=m.url&&w.setAttribute("action",m.url),m.skipEncodingOverride||u&&!/post/i.test(u)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),m.timeout&&(j=setTimeout(function(){T=!0,s(D)},m.timeout));var l=[];try{if(m.extraData)for(var d in m.extraData)m.extraData.hasOwnProperty(d)&&l.push(e.isPlainObject(m.extraData[d])&&m.extraData[d].hasOwnProperty("name")&&m.extraData[d].hasOwnProperty("value")?e('<input type="hidden" name="'+m.extraData[d].name+'">').val(m.extraData[d].value).appendTo(w)[0]:e('<input type="hidden" name="'+d+'">').val(m.extraData[d]).appendTo(w)[0]);m.iframeTarget||v.appendTo("body"),g.attachEvent?g.attachEvent("onload",s):g.addEventListener("load",s,!1),setTimeout(t,15);try{w.submit()}catch(h){var x=document.createElement("form").submit;x.apply(w)}}finally{w.setAttribute("action",i),w.setAttribute("enctype",c),r?w.setAttribute("target",r):f.removeAttr("target"),e(l).remove()}}function s(t){if(!x.aborted&&!F){if(M=n(g),M||(a("cannot access response document"),t=k),t===D&&x)return x.abort("timeout"),void S.reject(x,"timeout");if(t==k&&x)return x.abort("server abort"),void S.reject(x,"error","server abort");if(M&&M.location.href!=m.iframeSrc||T){g.detachEvent?g.detachEvent("onload",s):g.removeEventListener("load",s,!1);var r,i="success";try{if(T)throw"timeout";var o="xml"==m.dataType||M.XMLDocument||e.isXMLDoc(M);if(a("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--O)return a("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var u=M.body?M.body:M.documentElement;x.responseText=u?u.innerHTML:null,x.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(m.dataType="xml"),x.getResponseHeader=function(e){var t={"content-type":m.dataType};return t[e.toLowerCase()]},u&&(x.status=Number(u.getAttribute("status"))||x.status,x.statusText=u.getAttribute("statusText")||x.statusText);var c=(m.dataType||"").toLowerCase(),l=/(json|script|text)/.test(c);if(l||m.textarea){var f=M.getElementsByTagName("textarea")[0];if(f)x.responseText=f.value,x.status=Number(f.getAttribute("status"))||x.status,x.statusText=f.getAttribute("statusText")||x.statusText;else if(l){var p=M.getElementsByTagName("pre")[0],h=M.getElementsByTagName("body")[0];p?x.responseText=p.textContent?p.textContent:p.innerText:h&&(x.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==c&&!x.responseXML&&x.responseText&&(x.responseXML=X(x.responseText));try{E=_(x,c,m)}catch(y){i="parsererror",x.error=r=y||i}}catch(y){a("error caught: ",y),i="error",x.error=r=y||i}x.aborted&&(a("upload aborted"),i=null),x.status&&(i=x.status>=200&&x.status<300||304===x.status?"success":"error"),"success"===i?(m.success&&m.success.call(m.context,E,"success",x),S.resolve(x.responseText,"success",x),d&&e.event.trigger("ajaxSuccess",[x,m])):i&&(void 0===r&&(r=x.statusText),m.error&&m.error.call(m.context,x,i,r),S.reject(x,"error",r),d&&e.event.trigger("ajaxError",[x,m,r])),d&&e.event.trigger("ajaxComplete",[x,m]),d&&!--e.active&&e.event.trigger("ajaxStop"),m.complete&&m.complete.call(m.context,x,i),F=!0,m.timeout&&clearTimeout(j),setTimeout(function(){m.iframeTarget?v.attr("src",m.iframeSrc):v.remove(),x.responseXML=null},100)}}}var c,l,m,d,p,v,g,x,y,b,T,j,w=f[0],S=e.Deferred();if(S.abort=function(e){x.abort(e)},r)for(l=0;l<h.length;l++)c=e(h[l]),i?c.prop("disabled",!1):c.removeAttr("disabled");if(m=e.extend(!0,{},e.ajaxSettings,t),m.context=m.context||m,p="jqFormIO"+(new Date).getTime(),m.iframeTarget?(v=e(m.iframeTarget),b=v.attr2("name"),b?p=b:v.attr2("name",p)):(v=e('<iframe name="'+p+'" src="'+m.iframeSrc+'" />'),v.css({position:"absolute",top:"-1000px",left:"-1000px"})),g=v[0],x={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var r="timeout"===t?"timeout":"aborted";a("aborting upload... "+r),this.aborted=1;try{g.contentWindow.document.execCommand&&g.contentWindow.document.execCommand("Stop")}catch(n){}v.attr("src",m.iframeSrc),x.error=r,m.error&&m.error.call(m.context,x,r,t),d&&e.event.trigger("ajaxError",[x,m,r]),m.complete&&m.complete.call(m.context,x,r)}},d=m.global,d&&0===e.active++&&e.event.trigger("ajaxStart"),d&&e.event.trigger("ajaxSend",[x,m]),m.beforeSend&&m.beforeSend.call(m.context,x,m)===!1)return m.global&&e.active--,S.reject(),S;if(x.aborted)return S.reject(),S;y=w.clk,y&&(b=y.name,b&&!y.disabled&&(m.extraData=m.extraData||{},m.extraData[b]=y.value,"image"==y.type&&(m.extraData[b+".x"]=w.clk_x,m.extraData[b+".y"]=w.clk_y)));var D=1,k=2,A=e("meta[name=csrf-token]").attr("content"),L=e("meta[name=csrf-param]").attr("content");L&&A&&(m.extraData=m.extraData||{},m.extraData[L]=A),m.forceSync?o():setTimeout(o,10);var E,M,F,O=50,X=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},C=e.parseJSON||function(e){return window.eval("("+e+")")},_=function(t,r,a){var n=t.getResponseHeader("content-type")||"",i="xml"===r||!r&&n.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),a&&a.dataFilter&&(o=a.dataFilter(o,r)),"string"==typeof o&&("json"===r||!r&&n.indexOf("json")>=0?o=C(o):("script"===r||!r&&n.indexOf("javascript")>=0)&&e.globalEval(o)),o};return S}if(!this.length)return a("ajaxSubmit: skipping submit process - no element selected"),this;var u,c,l,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),u=t.type||this.attr2("method"),c=t.url||this.attr2("action"),l="string"==typeof c?e.trim(c):"",l=l||window.location.href||"",l&&(l=(l.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:l,success:e.ajaxSettings.success,type:u||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var m={};if(this.trigger("form-pre-serialize",[this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var d=t.traditional;void 0===d&&(d=e.ajaxSettings.traditional);var p,h=[],v=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,p=e.param(t.data,d)),t.beforeSubmit&&t.beforeSubmit(v,this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[v,this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var g=e.param(v,d);p&&(g=g?g+"&"+p:p),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+g,t.data=null):t.data=g;var x=[];if(t.resetForm&&x.push(function(){f.resetForm()}),t.clearForm&&x.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};x.push(function(r){var a=t.replaceTarget?"replaceWith":"html";e(t.target)[a](r).each(y,arguments)})}else t.success&&x.push(t.success);if(t.success=function(e,r,a){for(var n=t.context||this,i=0,o=x.length;o>i;i++)x[i].apply(n,[e,r,a||f,f])},t.error){var b=t.error;t.error=function(e,r,a){var n=t.context||this;b.apply(n,[e,r,a,f])}}if(t.complete){var T=t.complete;t.complete=function(e,r){var a=t.context||this;T.apply(a,[e,r,f])}}var j=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),w=j.length>0,S="multipart/form-data",D=f.attr("enctype")==S||f.attr("encoding")==S,k=n.fileapi&&n.formdata;a("fileAPI :"+k);var A,L=(w||D)&&!k;t.iframe!==!1&&(t.iframe||L)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){A=s(v)}):A=s(v):A=(w||D)&&k?o(v):e.ajax(t),f.removeData("jqxhr").data("jqxhr",A);for(var E=0;E<h.length;E++)h[E]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(n){if(n=n||{},n.delegation=n.delegation&&e.isFunction(e.fn.on),!n.delegation&&0===this.length){var i={s:this.selector,c:this.context};return!e.isReady&&i.s?(a("DOM not ready, queuing ajaxForm"),e(function(){e(i.s,i.c).ajaxForm(n)}),this):(a("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return n.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,r).on("submit.form-plugin",this.selector,n,t).on("click.form-plugin",this.selector,n,r),this):this.ajaxFormUnbind().bind("submit.form-plugin",n,t).bind("click.form-plugin",n,r)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,r){var a=[];if(0===this.length)return a;var i,o=this[0],s=this.attr("id"),u=t?o.getElementsByTagName("*"):o.elements;if(u&&!/MSIE [678]/.test(navigator.userAgent)&&(u=e(u).get()),s&&(i=e(':input[form="'+s+'"]').get(),i.length&&(u=(u||[]).concat(i))),!u||!u.length)return a;var c,l,f,m,d,p,h;for(c=0,p=u.length;p>c;c++)if(d=u[c],f=d.name,f&&!d.disabled)if(t&&o.clk&&"image"==d.type)o.clk==d&&(a.push({name:f,value:e(d).val(),type:d.type}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}));else if(m=e.fieldValue(d,!0),m&&m.constructor==Array)for(r&&r.push(d),l=0,h=m.length;h>l;l++)a.push({name:f,value:m[l]});else if(n.fileapi&&"file"==d.type){r&&r.push(d);var v=d.files;if(v.length)for(l=0;l<v.length;l++)a.push({name:f,value:v[l],type:d.type});else a.push({name:f,value:"",type:d.type})}else null!==m&&"undefined"!=typeof m&&(r&&r.push(d),a.push({name:f,value:m,type:d.type,required:d.required}));if(!t&&o.clk){var g=e(o.clk),x=g[0];f=x.name,f&&!x.disabled&&"image"==x.type&&(a.push({name:f,value:g.val()}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}))}return a},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var r=[];return this.each(function(){var a=this.name;if(a){var n=e.fieldValue(this,t);if(n&&n.constructor==Array)for(var i=0,o=n.length;o>i;i++)r.push({name:a,value:n[i]});else null!==n&&"undefined"!=typeof n&&r.push({name:this.name,value:n})}}),e.param(r)},e.fn.fieldValue=function(t){for(var r=[],a=0,n=this.length;n>a;a++){var i=this[a],o=e.fieldValue(i,t);null===o||"undefined"==typeof o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(r,o):r.push(o))}return r},e.fieldValue=function(t,r){var a=t.name,n=t.type,i=t.tagName.toLowerCase();if(void 0===r&&(r=!0),r&&(!a||t.disabled||"reset"==n||"button"==n||("checkbox"==n||"radio"==n)&&!t.checked||("submit"==n||"image"==n)&&t.form&&t.form.clk!=t||"select"==i&&-1==t.selectedIndex))return null;if("select"==i){var o=t.selectedIndex;if(0>o)return null;for(var s=[],u=t.options,c="select-one"==n,l=c?o+1:u.length,f=c?o:0;l>f;f++){var m=u[f];if(m.selected){var d=m.value;if(d||(d=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),c)return d;s.push(d)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var r=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var a=this.type,n=this.tagName.toLowerCase();r.test(a)||"textarea"==n?this.value="":"checkbox"==a||"radio"==a?this.checked=!1:"select"==n?this.selectedIndex=-1:"file"==a?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(a)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var r=this.type;if("checkbox"==r||"radio"==r)this.checked=t;else if("option"==this.tagName.toLowerCase()){var a=e(this).parent("select");t&&a[0]&&"select-one"==a[0].type&&a.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1});
;
/**
 * @file
 * Progress bar.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Theme function for the progress bar.
   *
   * @param {string} id
   *
   * @return {string}
   *   The HTML for the progress bar.
   */
  Drupal.theme.progressBar = function (id) {
    return '<div id="' + id + '" class="progress" aria-live="polite">' +
      '<div class="progress__label">&nbsp;</div>' +
      '<div class="progress__track"><div class="progress__bar"></div></div>' +
      '<div class="progress__percentage"></div>' +
      '<div class="progress__description">&nbsp;</div>' +
      '</div>';
  };

  /**
   * A progressbar object. Initialized with the given id. Must be inserted into
   * the DOM afterwards through progressBar.element.
   *
   * Method is the function which will perform the HTTP request to get the
   * progress bar state. Either "GET" or "POST".
   *
   * @example
   * pb = new Drupal.ProgressBar('myProgressBar');
   * some_element.appendChild(pb.element);
   *
   * @constructor
   *
   * @param {string} id
   * @param {function} updateCallback
   * @param {string} method
   * @param {function} errorCallback
   */
  Drupal.ProgressBar = function (id, updateCallback, method, errorCallback) {
    this.id = id;
    this.method = method || 'GET';
    this.updateCallback = updateCallback;
    this.errorCallback = errorCallback;

    // The WAI-ARIA setting aria-live="polite" will announce changes after
    // users
    // have completed their current activity and not interrupt the screen
    // reader.
    this.element = $(Drupal.theme('progressBar', id));
  };

  $.extend(Drupal.ProgressBar.prototype, /** @lends Drupal.ProgressBar# */{

    /**
     * Set the percentage and status message for the progressbar.
     *
     * @param {number} percentage
     * @param {string} message
     * @param {string} label
     */
    setProgress: function (percentage, message, label) {
      if (percentage >= 0 && percentage <= 100) {
        $(this.element).find('div.progress__bar').css('width', percentage + '%');
        $(this.element).find('div.progress__percentage').html(percentage + '%');
      }
      $('div.progress__description', this.element).html(message);
      $('div.progress__label', this.element).html(label);
      if (this.updateCallback) {
        this.updateCallback(percentage, message, this);
      }
    },

    /**
     * Start monitoring progress via Ajax.
     *
     * @param {string} uri
     * @param {number} delay
     */
    startMonitoring: function (uri, delay) {
      this.delay = delay;
      this.uri = uri;
      this.sendPing();
    },

    /**
     * Stop monitoring progress via Ajax.
     */
    stopMonitoring: function () {
      clearTimeout(this.timer);
      // This allows monitoring to be stopped from within the callback.
      this.uri = null;
    },

    /**
     * Request progress data from server.
     */
    sendPing: function () {
      if (this.timer) {
        clearTimeout(this.timer);
      }
      if (this.uri) {
        var pb = this;
        // When doing a post request, you need non-null data. Otherwise a
        // HTTP 411 or HTTP 406 (with Apache mod_security) error may result.
        var uri = this.uri;
        if (uri.indexOf('?') === -1) {
          uri += '?';
        }
        else {
          uri += '&';
        }
        uri += '_format=json';
        $.ajax({
          type: this.method,
          url: uri,
          data: '',
          dataType: 'json',
          success: function (progress) {
            // Display errors.
            if (progress.status === 0) {
              pb.displayError(progress.data);
              return;
            }
            // Update display.
            pb.setProgress(progress.percentage, progress.message, progress.label);
            // Schedule next timer.
            pb.timer = setTimeout(function () { pb.sendPing(); }, pb.delay);
          },
          error: function (xmlhttp) {
            var e = new Drupal.AjaxError(xmlhttp, pb.uri);
            pb.displayError('<pre>' + e.message + '</pre>');
          }
        });
      }
    },

    /**
     * Display errors on the page.
     *
     * @param {string} string
     */
    displayError: function (string) {
      var error = $('<div class="messages messages--error"></div>').html(string);
      $(this.element).before(error).hide();

      if (this.errorCallback) {
        this.errorCallback(this);
      }
    }
  });

})(jQuery, Drupal);
;
/**
 * @file
 * Extends methods from core/misc/progress.js.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Theme function for the progress bar.
   *
   * @param {string} id
   *
   * @return {string}
   *   The HTML for the progress bar.
   */
  Drupal.theme.progressBar = function (id) {
    return '<div class="progress-wrapper" aria-live="polite">' +
             '<div class="message"></div>'+
             '<div id ="' + id + '" class="progress progress-striped active">' +
               '<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">' +
                 '<span class="percentage"></span>' +
               '</div>' +
             '</div>' +
             '<div class="progress-label"></div>' +
           '</div>';
  };

  $.extend(Drupal.ProgressBar.prototype, /** @lends Drupal.ProgressBar */{

    /**
     * Set the percentage and status message for the progressbar.
     *
     * @param {number} percentage
     * @param {string} message
     * @param {string} label
     */
    setProgress: function (percentage, message, label) {
      if (percentage >= 0 && percentage <= 100) {
        $(this.element).find('.progress-bar').css('width', percentage + '%').attr('aria-valuenow', percentage);
        $(this.element).find('.percentage').html(percentage + '%');
      }
      if (message) {
        // Remove the unnecessary whitespace at the end of the message.
        message = message.replace(/<br\/>&nbsp;|\s*$/, '');

        $('.message', this.element).html(message);
      }
      if (label) {
        $('.progress-label', this.element).html(label);
      }
      if (this.updateCallback) {
        this.updateCallback(percentage, message, this);
      }
    },

    /**
     * Display errors on the page.
     *
     * @param {string} string
     */
    displayError: function (string) {
      var error = $('<div class="alert alert-block alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a><h4>' + Drupal.t('Error message') + '</h4></div>').append(string);
      $(this.element).before(error).hide();

      if (this.errorCallback) {
        this.errorCallback(this);
      }
    }
  });

})(jQuery, Drupal);
;
(function (Drupal) {

  'use strict';

  /**
   * Call picturefill so newly added responsive images are processed.
   */
  Drupal.behaviors.responsiveImageAJAX = {
    attach: function () {
      if (window.picturefill) {
        window.picturefill();
      }
    }
  };

})(Drupal);
;
/**
 * @file
 * Provides Ajax page updating via jQuery $.ajax.
 *
 * Ajax is a method of making a request via JavaScript while viewing an HTML
 * page. The request returns an array of commands encoded in JSON, which is
 * then executed to make any changes that are necessary to the page.
 *
 * Drupal uses this file to enhance form elements with `#ajax['url']` and
 * `#ajax['wrapper']` properties. If set, this file will automatically be
 * included to provide Ajax capabilities.
 */

(function ($, window, Drupal, drupalSettings) {

  'use strict';

  /**
   * Attaches the Ajax behavior to each Ajax form element.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.AJAX = {
    attach: function (context, settings) {

      function loadAjaxBehavior(base) {
        var element_settings = settings.ajax[base];
        if (typeof element_settings.selector === 'undefined') {
          element_settings.selector = '#' + base;
        }
        $(element_settings.selector).once('drupal-ajax').each(function () {
          element_settings.element = this;
          element_settings.base = base;
          Drupal.ajax(element_settings);
        });
      }

      // Load all Ajax behaviors specified in the settings.
      for (var base in settings.ajax) {
        if (settings.ajax.hasOwnProperty(base)) {
          loadAjaxBehavior(base);
        }
      }

      // Bind Ajax behaviors to all items showing the class.
      $('.use-ajax').once('ajax').each(function () {
        var element_settings = {};
        // Clicked links look better with the throbber than the progress bar.
        element_settings.progress = {type: 'throbber'};

        // For anchor tags, these will go to the target of the anchor rather
        // than the usual location.
        if ($(this).attr('href')) {
          element_settings.url = $(this).attr('href');
          element_settings.event = 'click';
        }
        element_settings.dialogType = $(this).data('dialog-type');
        element_settings.dialog = $(this).data('dialog-options');
        element_settings.base = $(this).attr('id');
        element_settings.element = this;
        Drupal.ajax(element_settings);
      });

      // This class means to submit the form to the action using Ajax.
      $('.use-ajax-submit').once('ajax').each(function () {
        var element_settings = {};

        // Ajax submits specified in this manner automatically submit to the
        // normal form action.
        element_settings.url = $(this.form).attr('action');
        // Form submit button clicks need to tell the form what was clicked so
        // it gets passed in the POST request.
        element_settings.setClick = true;
        // Form buttons use the 'click' event rather than mousedown.
        element_settings.event = 'click';
        // Clicked form buttons look better with the throbber than the progress
        // bar.
        element_settings.progress = {type: 'throbber'};
        element_settings.base = $(this).attr('id');
        element_settings.element = this;

        Drupal.ajax(element_settings);
      });
    }
  };

  /**
   * Extends Error to provide handling for Errors in Ajax.
   *
   * @constructor
   *
   * @augments Error
   *
   * @param {XMLHttpRequest} xmlhttp
   *   XMLHttpRequest object used for the failed request.
   * @param {string} uri
   *   The URI where the error occurred.
   * @param {string} customMessage
   *   The custom message.
   */
  Drupal.AjaxError = function (xmlhttp, uri, customMessage) {

    var statusCode;
    var statusText;
    var pathText;
    var responseText;
    var readyStateText;
    if (xmlhttp.status) {
      statusCode = '\n' + Drupal.t('An AJAX HTTP error occurred.') + '\n' + Drupal.t('HTTP Result Code: !status', {'!status': xmlhttp.status});
    }
    else {
      statusCode = '\n' + Drupal.t('An AJAX HTTP request terminated abnormally.');
    }
    statusCode += '\n' + Drupal.t('Debugging information follows.');
    pathText = '\n' + Drupal.t('Path: !uri', {'!uri': uri});
    statusText = '';
    // In some cases, when statusCode === 0, xmlhttp.statusText may not be
    // defined. Unfortunately, testing for it with typeof, etc, doesn't seem to
    // catch that and the test causes an exception. So we need to catch the
    // exception here.
    try {
      statusText = '\n' + Drupal.t('StatusText: !statusText', {'!statusText': $.trim(xmlhttp.statusText)});
    }
    catch (e) {
      // Empty.
    }

    responseText = '';
    // Again, we don't have a way to know for sure whether accessing
    // xmlhttp.responseText is going to throw an exception. So we'll catch it.
    try {
      responseText = '\n' + Drupal.t('ResponseText: !responseText', {'!responseText': $.trim(xmlhttp.responseText)});
    }
    catch (e) {
      // Empty.
    }

    // Make the responseText more readable by stripping HTML tags and newlines.
    responseText = responseText.replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '');
    responseText = responseText.replace(/[\n]+\s+/g, '\n');

    // We don't need readyState except for status == 0.
    readyStateText = xmlhttp.status === 0 ? ('\n' + Drupal.t('ReadyState: !readyState', {'!readyState': xmlhttp.readyState})) : '';

    customMessage = customMessage ? ('\n' + Drupal.t('CustomMessage: !customMessage', {'!customMessage': customMessage})) : '';

    /**
     * Formatted and translated error message.
     *
     * @type {string}
     */
    this.message = statusCode + pathText + statusText + customMessage + responseText + readyStateText;

    /**
     * Used by some browsers to display a more accurate stack trace.
     *
     * @type {string}
     */
    this.name = 'AjaxError';
  };

  Drupal.AjaxError.prototype = new Error();
  Drupal.AjaxError.prototype.constructor = Drupal.AjaxError;

  /**
   * Provides Ajax page updating via jQuery $.ajax.
   *
   * This function is designed to improve developer experience by wrapping the
   * initialization of {@link Drupal.Ajax} objects and storing all created
   * objects in the {@link Drupal.ajax.instances} array.
   *
   * @example
   * Drupal.behaviors.myCustomAJAXStuff = {
   *   attach: function (context, settings) {
   *
   *     var ajaxSettings = {
   *       url: 'my/url/path',
   *       // If the old version of Drupal.ajax() needs to be used those
   *       // properties can be added
   *       base: 'myBase',
   *       element: $(context).find('.someElement')
   *     };
   *
   *     var myAjaxObject = Drupal.ajax(ajaxSettings);
   *
   *     // Declare a new Ajax command specifically for this Ajax object.
   *     myAjaxObject.commands.insert = function (ajax, response, status) {
   *       $('#my-wrapper').append(response.data);
   *       alert('New content was appended to #my-wrapper');
   *     };
   *
   *     // This command will remove this Ajax object from the page.
   *     myAjaxObject.commands.destroyObject = function (ajax, response, status) {
   *       Drupal.ajax.instances[this.instanceIndex] = null;
   *     };
   *
   *     // Programmatically trigger the Ajax request.
   *     myAjaxObject.execute();
   *   }
   * };
   *
   * @param {object} settings
   *   The settings object passed to {@link Drupal.Ajax} constructor.
   * @param {string} [settings.base]
   *   Base is passed to {@link Drupal.Ajax} constructor as the 'base'
   *   parameter.
   * @param {HTMLElement} [settings.element]
   *   Element parameter of {@link Drupal.Ajax} constructor, element on which
   *   event listeners will be bound.
   *
   * @return {Drupal.Ajax}
   *
   * @see Drupal.AjaxCommands
   */
  Drupal.ajax = function (settings) {
    if (arguments.length !== 1) {
      throw new Error('Drupal.ajax() function must be called with one configuration object only');
    }
    // Map those config keys to variables for the old Drupal.ajax function.
    var base = settings.base || false;
    var element = settings.element || false;
    delete settings.base;
    delete settings.element;

    // By default do not display progress for ajax calls without an element.
    if (!settings.progress && !element) {
      settings.progress = false;
    }

    var ajax = new Drupal.Ajax(base, element, settings);
    ajax.instanceIndex = Drupal.ajax.instances.length;
    Drupal.ajax.instances.push(ajax);

    return ajax;
  };

  /**
   * Contains all created Ajax objects.
   *
   * @type {Array.<Drupal.Ajax>}
   */
  Drupal.ajax.instances = [];

  /**
   * Ajax constructor.
   *
   * The Ajax request returns an array of commands encoded in JSON, which is
   * then executed to make any changes that are necessary to the page.
   *
   * Drupal uses this file to enhance form elements with `#ajax['url']` and
   * `#ajax['wrapper']` properties. If set, this file will automatically be
   * included to provide Ajax capabilities.
   *
   * @constructor
   *
   * @param {string} [base]
   *   Base parameter of {@link Drupal.Ajax} constructor
   * @param {HTMLElement} [element]
   *   Element parameter of {@link Drupal.Ajax} constructor, element on which
   *   event listeners will be bound.
   * @param {object} element_settings
   * @param {string} element_settings.url
   *   Target of the Ajax request.
   * @param {string} [element_settings.event]
   *   Event bound to settings.element which will trigger the Ajax request.
   * @param {string} [element_settings.method]
   *   Name of the jQuery method used to insert new content in the targeted
   *   element.
   */
  Drupal.Ajax = function (base, element, element_settings) {
    var defaults = {
      event: element ? 'mousedown' : null,
      keypress: true,
      selector: base ? '#' + base : null,
      effect: 'none',
      speed: 'none',
      method: 'replaceWith',
      progress: {
        type: 'throbber',
        message: Drupal.t('Please wait...')
      },
      submit: {
        js: true
      }
    };

    $.extend(this, defaults, element_settings);

    /**
     * @type {Drupal.AjaxCommands}
     */
    this.commands = new Drupal.AjaxCommands();
    this.instanceIndex = false;

    // @todo Remove this after refactoring the PHP code to:
    //   - Call this 'selector'.
    //   - Include the '#' for ID-based selectors.
    //   - Support non-ID-based selectors.
    if (this.wrapper) {

      /**
       * @type {string}
       */
      this.wrapper = '#' + this.wrapper;
    }

    /**
     * @type {HTMLElement}
     */
    this.element = element;

    /**
     * @type {object}
     */
    this.element_settings = element_settings;

    // If there isn't a form, jQuery.ajax() will be used instead, allowing us to
    // bind Ajax to links as well.
    if (this.element && this.element.form) {

      /**
       * @type {jQuery}
       */
      this.$form = $(this.element.form);
    }

    // If no Ajax callback URL was given, use the link href or form action.
    if (!this.url) {
      var $element = $(this.element);
      if ($element.is('a')) {
        this.url = $element.attr('href');
      }
      else if (this.element && element.form) {
        this.url = this.$form.attr('action');
      }
    }

    // Replacing 'nojs' with 'ajax' in the URL allows for an easy method to let
    // the server detect when it needs to degrade gracefully.
    // There are four scenarios to check for:
    // 1. /nojs/
    // 2. /nojs$ - The end of a URL string.
    // 3. /nojs? - Followed by a query (e.g. path/nojs?destination=foobar).
    // 4. /nojs# - Followed by a fragment (e.g.: path/nojs#myfragment).
    var originalUrl = this.url;
    this.url = this.url.replace(/\/nojs(\/|$|\?|#)/g, '/ajax$1');
    // If the 'nojs' version of the URL is trusted, also trust the 'ajax'
    // version.
    if (drupalSettings.ajaxTrustedUrl[originalUrl]) {
      drupalSettings.ajaxTrustedUrl[this.url] = true;
    }

    // Set the options for the ajaxSubmit function.
    // The 'this' variable will not persist inside of the options object.
    var ajax = this;

    /**
     * Options for the ajaxSubmit function.
     *
     * @name Drupal.Ajax#options
     *
     * @type {object}
     *
     * @prop {string} url
     * @prop {object} data
     * @prop {function} beforeSerialize
     * @prop {function} beforeSubmit
     * @prop {function} beforeSend
     * @prop {function} success
     * @prop {function} complete
     * @prop {string} dataType
     * @prop {object} accepts
     * @prop {string} accepts.json
     * @prop {string} type
     */
    ajax.options = {
      url: ajax.url,
      data: ajax.submit,
      beforeSerialize: function (element_settings, options) {
        return ajax.beforeSerialize(element_settings, options);
      },
      beforeSubmit: function (form_values, element_settings, options) {
        ajax.ajaxing = true;
        return ajax.beforeSubmit(form_values, element_settings, options);
      },
      beforeSend: function (xmlhttprequest, options) {
        ajax.ajaxing = true;
        return ajax.beforeSend(xmlhttprequest, options);
      },
      success: function (response, status, xmlhttprequest) {
        // Sanity check for browser support (object expected).
        // When using iFrame uploads, responses must be returned as a string.
        if (typeof response === 'string') {
          response = $.parseJSON(response);
        }

        // Prior to invoking the response's commands, verify that they can be
        // trusted by checking for a response header. See
        // \Drupal\Core\EventSubscriber\AjaxResponseSubscriber for details.
        // - Empty responses are harmless so can bypass verification. This
        //   avoids an alert message for server-generated no-op responses that
        //   skip Ajax rendering.
        // - Ajax objects with trusted URLs (e.g., ones defined server-side via
        //   #ajax) can bypass header verification. This is especially useful
        //   for Ajax with multipart forms. Because IFRAME transport is used,
        //   the response headers cannot be accessed for verification.
        if (response !== null && !drupalSettings.ajaxTrustedUrl[ajax.url]) {
          if (xmlhttprequest.getResponseHeader('X-Drupal-Ajax-Token') !== '1') {
            var customMessage = Drupal.t('The response failed verification so will not be processed.');
            return ajax.error(xmlhttprequest, ajax.url, customMessage);
          }
        }

        return ajax.success(response, status);
      },
      complete: function (xmlhttprequest, status) {
        ajax.ajaxing = false;
        if (status === 'error' || status === 'parsererror') {
          return ajax.error(xmlhttprequest, ajax.url);
        }
      },
      dataType: 'json',
      type: 'POST'
    };

    if (element_settings.dialog) {
      ajax.options.data.dialogOptions = element_settings.dialog;
    }

    // Ensure that we have a valid URL by adding ? when no query parameter is
    // yet available, otherwise append using &.
    if (ajax.options.url.indexOf('?') === -1) {
      ajax.options.url += '?';
    }
    else {
      ajax.options.url += '&';
    }
    ajax.options.url += Drupal.ajax.WRAPPER_FORMAT + '=drupal_' + (element_settings.dialogType || 'ajax');

    // Bind the ajaxSubmit function to the element event.
    $(ajax.element).on(element_settings.event, function (event) {
      if (!drupalSettings.ajaxTrustedUrl[ajax.url] && !Drupal.url.isLocal(ajax.url)) {
        throw new Error(Drupal.t('The callback URL is not local and not trusted: !url', {'!url': ajax.url}));
      }
      return ajax.eventResponse(this, event);
    });

    // If necessary, enable keyboard submission so that Ajax behaviors
    // can be triggered through keyboard input as well as e.g. a mousedown
    // action.
    if (element_settings.keypress) {
      $(ajax.element).on('keypress', function (event) {
        return ajax.keypressResponse(this, event);
      });
    }

    // If necessary, prevent the browser default action of an additional event.
    // For example, prevent the browser default action of a click, even if the
    // Ajax behavior binds to mousedown.
    if (element_settings.prevent) {
      $(ajax.element).on(element_settings.prevent, false);
    }
  };

  /**
   * URL query attribute to indicate the wrapper used to render a request.
   *
   * The wrapper format determines how the HTML is wrapped, for example in a
   * modal dialog.
   *
   * @const {string}
   */
  Drupal.ajax.WRAPPER_FORMAT = '_wrapper_format';

  /**
   * Request parameter to indicate that a request is a Drupal Ajax request.
   *
   * @const
   */
  Drupal.Ajax.AJAX_REQUEST_PARAMETER = '_drupal_ajax';

  /**
   * Execute the ajax request.
   *
   * Allows developers to execute an Ajax request manually without specifying
   * an event to respond to.
   */
  Drupal.Ajax.prototype.execute = function () {
    // Do not perform another ajax command if one is already in progress.
    if (this.ajaxing) {
      return;
    }

    try {
      this.beforeSerialize(this.element, this.options);
      $.ajax(this.options);
    }
    catch (e) {
      // Unset the ajax.ajaxing flag here because it won't be unset during
      // the complete response.
      this.ajaxing = false;
      window.alert('An error occurred while attempting to process ' + this.options.url + ': ' + e.message);
    }
  };

  /**
   * Handle a key press.
   *
   * The Ajax object will, if instructed, bind to a key press response. This
   * will test to see if the key press is valid to trigger this event and
   * if it is, trigger it for us and prevent other keypresses from triggering.
   * In this case we're handling RETURN and SPACEBAR keypresses (event codes 13
   * and 32. RETURN is often used to submit a form when in a textfield, and
   * SPACE is often used to activate an element without submitting.
   *
   * @param {HTMLElement} element
   * @param {jQuery.Event} event
   */
  Drupal.Ajax.prototype.keypressResponse = function (element, event) {
    // Create a synonym for this to reduce code confusion.
    var ajax = this;

    // Detect enter key and space bar and allow the standard response for them,
    // except for form elements of type 'text', 'tel', 'number' and 'textarea',
    // where the spacebar activation causes inappropriate activation if
    // #ajax['keypress'] is TRUE. On a text-type widget a space should always
    // be a space.
    if (event.which === 13 || (event.which === 32 && element.type !== 'text' &&
      element.type !== 'textarea' && element.type !== 'tel' && element.type !== 'number')) {
      event.preventDefault();
      event.stopPropagation();
      $(ajax.element_settings.element).trigger(ajax.element_settings.event);
    }
  };

  /**
   * Handle an event that triggers an Ajax response.
   *
   * When an event that triggers an Ajax response happens, this method will
   * perform the actual Ajax call. It is bound to the event using
   * bind() in the constructor, and it uses the options specified on the
   * Ajax object.
   *
   * @param {HTMLElement} element
   * @param {jQuery.Event} event
   */
  Drupal.Ajax.prototype.eventResponse = function (element, event) {
    event.preventDefault();
    event.stopPropagation();

    // Create a synonym for this to reduce code confusion.
    var ajax = this;

    // Do not perform another Ajax command if one is already in progress.
    if (ajax.ajaxing) {
      return;
    }

    try {
      if (ajax.$form) {
        // If setClick is set, we must set this to ensure that the button's
        // value is passed.
        if (ajax.setClick) {
          // Mark the clicked button. 'form.clk' is a special variable for
          // ajaxSubmit that tells the system which element got clicked to
          // trigger the submit. Without it there would be no 'op' or
          // equivalent.
          element.form.clk = element;
        }

        ajax.$form.ajaxSubmit(ajax.options);
      }
      else {
        ajax.beforeSerialize(ajax.element, ajax.options);
        $.ajax(ajax.options);
      }
    }
    catch (e) {
      // Unset the ajax.ajaxing flag here because it won't be unset during
      // the complete response.
      ajax.ajaxing = false;
      window.alert('An error occurred while attempting to process ' + ajax.options.url + ': ' + e.message);
    }
  };

  /**
   * Handler for the form serialization.
   *
   * Runs before the beforeSend() handler (see below), and unlike that one, runs
   * before field data is collected.
   *
   * @param {HTMLElement} element
   * @param {object} options
   * @param {object} options.data
   */
  Drupal.Ajax.prototype.beforeSerialize = function (element, options) {
    // Allow detaching behaviors to update field values before collecting them.
    // This is only needed when field values are added to the POST data, so only
    // when there is a form such that this.$form.ajaxSubmit() is used instead of
    // $.ajax(). When there is no form and $.ajax() is used, beforeSerialize()
    // isn't called, but don't rely on that: explicitly check this.$form.
    if (this.$form) {
      var settings = this.settings || drupalSettings;
      Drupal.detachBehaviors(this.$form.get(0), settings, 'serialize');
    }

    // Inform Drupal that this is an AJAX request.
    options.data[Drupal.Ajax.AJAX_REQUEST_PARAMETER] = 1;

    // Allow Drupal to return new JavaScript and CSS files to load without
    // returning the ones already loaded.
    // @see \Drupal\Core\Theme\AjaxBasePageNegotiator
    // @see \Drupal\Core\Asset\LibraryDependencyResolverInterface::getMinimalRepresentativeSubset()
    // @see system_js_settings_alter()
    var pageState = drupalSettings.ajaxPageState;
    options.data['ajax_page_state[theme]'] = pageState.theme;
    options.data['ajax_page_state[theme_token]'] = pageState.theme_token;
    options.data['ajax_page_state[libraries]'] = pageState.libraries;
  };

  /**
   * Modify form values prior to form submission.
   *
   * @param {object} form_values
   * @param {HTMLElement} element
   * @param {object} options
   */
  Drupal.Ajax.prototype.beforeSubmit = function (form_values, element, options) {
    // This function is left empty to make it simple to override for modules
    // that wish to add functionality here.
  };

  /**
   * Prepare the Ajax request before it is sent.
   *
   * @param {XMLHttpRequest} xmlhttprequest
   * @param {object} options
   * @param {object} options.extraData
   */
  Drupal.Ajax.prototype.beforeSend = function (xmlhttprequest, options) {
    // For forms without file inputs, the jQuery Form plugin serializes the
    // form values, and then calls jQuery's $.ajax() function, which invokes
    // this handler. In this circumstance, options.extraData is never used. For
    // forms with file inputs, the jQuery Form plugin uses the browser's normal
    // form submission mechanism, but captures the response in a hidden IFRAME.
    // In this circumstance, it calls this handler first, and then appends
    // hidden fields to the form to submit the values in options.extraData.
    // There is no simple way to know which submission mechanism will be used,
    // so we add to extraData regardless, and allow it to be ignored in the
    // former case.
    if (this.$form) {
      options.extraData = options.extraData || {};

      // Let the server know when the IFRAME submission mechanism is used. The
      // server can use this information to wrap the JSON response in a
      // TEXTAREA, as per http://jquery.malsup.com/form/#file-upload.
      options.extraData.ajax_iframe_upload = '1';

      // The triggering element is about to be disabled (see below), but if it
      // contains a value (e.g., a checkbox, textfield, select, etc.), ensure
      // that value is included in the submission. As per above, submissions
      // that use $.ajax() are already serialized prior to the element being
      // disabled, so this is only needed for IFRAME submissions.
      var v = $.fieldValue(this.element);
      if (v !== null) {
        options.extraData[this.element.name] = v;
      }
    }

    // Disable the element that received the change to prevent user interface
    // interaction while the Ajax request is in progress. ajax.ajaxing prevents
    // the element from triggering a new request, but does not prevent the user
    // from changing its value.
    $(this.element).prop('disabled', true);

    if (!this.progress || !this.progress.type) {
      return;
    }

    // Insert progress indicator.
    var progressIndicatorMethod = 'setProgressIndicator' + this.progress.type.slice(0, 1).toUpperCase() + this.progress.type.slice(1).toLowerCase();
    if (progressIndicatorMethod in this && typeof this[progressIndicatorMethod] === 'function') {
      this[progressIndicatorMethod].call(this);
    }
  };

  /**
   * Sets the progress bar progress indicator.
   */
  Drupal.Ajax.prototype.setProgressIndicatorBar = function () {
    var progressBar = new Drupal.ProgressBar('ajax-progress-' + this.element.id, $.noop, this.progress.method, $.noop);
    if (this.progress.message) {
      progressBar.setProgress(-1, this.progress.message);
    }
    if (this.progress.url) {
      progressBar.startMonitoring(this.progress.url, this.progress.interval || 1500);
    }
    this.progress.element = $(progressBar.element).addClass('ajax-progress ajax-progress-bar');
    this.progress.object = progressBar;
    $(this.element).after(this.progress.element);
  };

  /**
   * Sets the throbber progress indicator.
   */
  Drupal.Ajax.prototype.setProgressIndicatorThrobber = function () {
    this.progress.element = $('<div class="ajax-progress ajax-progress-throbber"><div class="throbber">&nbsp;</div></div>');
    if (this.progress.message) {
      this.progress.element.find('.throbber').after('<div class="message">' + this.progress.message + '</div>');
    }
    $(this.element).after(this.progress.element);
  };

  /**
   * Sets the fullscreen progress indicator.
   */
  Drupal.Ajax.prototype.setProgressIndicatorFullscreen = function () {
    this.progress.element = $('<div class="ajax-progress ajax-progress-fullscreen">&nbsp;</div>');
    $('body').after(this.progress.element);
  };

  /**
   * Handler for the form redirection completion.
   *
   * @param {Array.<Drupal.AjaxCommands~commandDefinition>} response
   * @param {number} status
   */
  Drupal.Ajax.prototype.success = function (response, status) {
    // Remove the progress element.
    if (this.progress.element) {
      $(this.progress.element).remove();
    }
    if (this.progress.object) {
      this.progress.object.stopMonitoring();
    }
    $(this.element).prop('disabled', false);

    // Save element's ancestors tree so if the element is removed from the dom
    // we can try to refocus one of its parents. Using addBack reverse the
    // result array, meaning that index 0 is the highest parent in the hierarchy
    // in this situation it is usually a <form> element.
    var elementParents = $(this.element).parents('[data-drupal-selector]').addBack().toArray();

    // Track if any command is altering the focus so we can avoid changing the
    // focus set by the Ajax command.
    var focusChanged = false;
    for (var i in response) {
      if (response.hasOwnProperty(i) && response[i].command && this.commands[response[i].command]) {
        this.commands[response[i].command](this, response[i], status);
        if (response[i].command === 'invoke' && response[i].method === 'focus') {
          focusChanged = true;
        }
      }
    }

    // If the focus hasn't be changed by the ajax commands, try to refocus the
    // triggering element or one of its parents if that element does not exist
    // anymore.
    if (!focusChanged && this.element && !$(this.element).data('disable-refocus')) {
      var target = false;

      for (var n = elementParents.length - 1; !target && n > 0; n--) {
        target = document.querySelector('[data-drupal-selector="' + elementParents[n].getAttribute('data-drupal-selector') + '"]');
      }

      if (target) {
        $(target).trigger('focus');
      }
    }

    // Reattach behaviors, if they were detached in beforeSerialize(). The
    // attachBehaviors() called on the new content from processing the response
    // commands is not sufficient, because behaviors from the entire form need
    // to be reattached.
    if (this.$form) {
      var settings = this.settings || drupalSettings;
      Drupal.attachBehaviors(this.$form.get(0), settings);
    }

    // Remove any response-specific settings so they don't get used on the next
    // call by mistake.
    this.settings = null;
  };

  /**
   * Build an effect object to apply an effect when adding new HTML.
   *
   * @param {object} response
   * @param {string} [response.effect]
   * @param {string|number} [response.speed]
   *
   * @return {object}
   */
  Drupal.Ajax.prototype.getEffect = function (response) {
    var type = response.effect || this.effect;
    var speed = response.speed || this.speed;

    var effect = {};
    if (type === 'none') {
      effect.showEffect = 'show';
      effect.hideEffect = 'hide';
      effect.showSpeed = '';
    }
    else if (type === 'fade') {
      effect.showEffect = 'fadeIn';
      effect.hideEffect = 'fadeOut';
      effect.showSpeed = speed;
    }
    else {
      effect.showEffect = type + 'Toggle';
      effect.hideEffect = type + 'Toggle';
      effect.showSpeed = speed;
    }

    return effect;
  };

  /**
   * Handler for the form redirection error.
   *
   * @param {object} xmlhttprequest
   * @param {string} uri
   * @param {string} customMessage
   */
  Drupal.Ajax.prototype.error = function (xmlhttprequest, uri, customMessage) {
    // Remove the progress element.
    if (this.progress.element) {
      $(this.progress.element).remove();
    }
    if (this.progress.object) {
      this.progress.object.stopMonitoring();
    }
    // Undo hide.
    $(this.wrapper).show();
    // Re-enable the element.
    $(this.element).prop('disabled', false);
    // Reattach behaviors, if they were detached in beforeSerialize().
    if (this.$form) {
      var settings = this.settings || drupalSettings;
      Drupal.attachBehaviors(this.$form.get(0), settings);
    }
    throw new Drupal.AjaxError(xmlhttprequest, uri, customMessage);
  };

  /**
   * @typedef {object} Drupal.AjaxCommands~commandDefinition
   *
   * @prop {string} command
   * @prop {string} [method]
   * @prop {string} [selector]
   * @prop {string} [data]
   * @prop {object} [settings]
   * @prop {bool} [asterisk]
   * @prop {string} [text]
   * @prop {string} [title]
   * @prop {string} [url]
   * @prop {object} [argument]
   * @prop {string} [name]
   * @prop {string} [value]
   * @prop {string} [old]
   * @prop {string} [new]
   * @prop {bool} [merge]
   * @prop {Array} [args]
   *
   * @see Drupal.AjaxCommands
   */

  /**
   * Provide a series of commands that the client will perform.
   *
   * @constructor
   */
  Drupal.AjaxCommands = function () {};
  Drupal.AjaxCommands.prototype = {

    /**
     * Command to insert new content into the DOM.
     *
     * @param {Drupal.Ajax} ajax
     * @param {object} response
     * @param {string} response.data
     * @param {string} [response.method]
     * @param {string} [response.selector]
     * @param {object} [response.settings]
     * @param {number} [status]
     */
    insert: function (ajax, response, status) {
      // Get information from the response. If it is not there, default to
      // our presets.
      var wrapper = response.selector ? $(response.selector) : $(ajax.wrapper);
      var method = response.method || ajax.method;
      var effect = ajax.getEffect(response);
      var settings;

      // We don't know what response.data contains: it might be a string of text
      // without HTML, so don't rely on jQuery correctly interpreting
      // $(response.data) as new HTML rather than a CSS selector. Also, if
      // response.data contains top-level text nodes, they get lost with either
      // $(response.data) or $('<div></div>').replaceWith(response.data).
      var new_content_wrapped = $('<div></div>').html(response.data);
      var new_content = new_content_wrapped.contents();

      // For legacy reasons, the effects processing code assumes that
      // new_content consists of a single top-level element. Also, it has not
      // been sufficiently tested whether attachBehaviors() can be successfully
      // called with a context object that includes top-level text nodes.
      // However, to give developers full control of the HTML appearing in the
      // page, and to enable Ajax content to be inserted in places where DIV
      // elements are not allowed (e.g., within TABLE, TR, and SPAN parents),
      // we check if the new content satisfies the requirement of a single
      // top-level element, and only use the container DIV created above when
      // it doesn't. For more information, please see
      // https://www.drupal.org/node/736066.
      if (new_content.length !== 1 || new_content.get(0).nodeType !== 1) {
        new_content = new_content_wrapped;
      }

      // If removing content from the wrapper, detach behaviors first.
      switch (method) {
        case 'html':
        case 'replaceWith':
        case 'replaceAll':
        case 'empty':
        case 'remove':
          settings = response.settings || ajax.settings || drupalSettings;
          Drupal.detachBehaviors(wrapper.get(0), settings);
      }

      // Add the new content to the page.
      wrapper[method](new_content);

      // Immediately hide the new content if we're using any effects.
      if (effect.showEffect !== 'show') {
        new_content.hide();
      }

      // Determine which effect to use and what content will receive the
      // effect, then show the new content.
      if (new_content.find('.ajax-new-content').length > 0) {
        new_content.find('.ajax-new-content').hide();
        new_content.show();
        new_content.find('.ajax-new-content')[effect.showEffect](effect.showSpeed);
      }
      else if (effect.showEffect !== 'show') {
        new_content[effect.showEffect](effect.showSpeed);
      }

      // Attach all JavaScript behaviors to the new content, if it was
      // successfully added to the page, this if statement allows
      // `#ajax['wrapper']` to be optional.
      if (new_content.parents('html').length > 0) {
        // Apply any settings from the returned JSON if available.
        settings = response.settings || ajax.settings || drupalSettings;
        Drupal.attachBehaviors(new_content.get(0), settings);
      }
    },

    /**
     * Command to remove a chunk from the page.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.selector
     * @param {object} [response.settings]
     * @param {number} [status]
     */
    remove: function (ajax, response, status) {
      var settings = response.settings || ajax.settings || drupalSettings;
      $(response.selector).each(function () {
        Drupal.detachBehaviors(this, settings);
      })
        .remove();
    },

    /**
     * Command to mark a chunk changed.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.selector
     * @param {bool} [response.asterisk]
     * @param {number} [status]
     */
    changed: function (ajax, response, status) {
      if (!$(response.selector).hasClass('ajax-changed')) {
        $(response.selector).addClass('ajax-changed');
        if (response.asterisk) {
          $(response.selector).find(response.asterisk).append(' <abbr class="ajax-changed" title="' + Drupal.t('Changed') + '">*</abbr> ');
        }
      }
    },

    /**
     * Command to provide an alert.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.text
     * @param {string} response.title
     * @param {number} [status]
     */
    alert: function (ajax, response, status) {
      window.alert(response.text, response.title);
    },

    /**
     * Command to set the window.location, redirecting the browser.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.url
     * @param {number} [status]
     */
    redirect: function (ajax, response, status) {
      window.location = response.url;
    },

    /**
     * Command to provide the jQuery css() function.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {object} response.argument
     * @param {number} [status]
     */
    css: function (ajax, response, status) {
      $(response.selector).css(response.argument);
    },

    /**
     * Command to set the settings used for other commands in this response.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {bool} response.merge
     * @param {object} response.settings
     * @param {number} [status]
     */
    settings: function (ajax, response, status) {
      if (response.merge) {
        $.extend(true, drupalSettings, response.settings);
      }
      else {
        ajax.settings = response.settings;
      }
    },

    /**
     * Command to attach data using jQuery's data API.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.name
     * @param {string} response.selector
     * @param {string|object} response.value
     * @param {number} [status]
     */
    data: function (ajax, response, status) {
      $(response.selector).data(response.name, response.value);
    },

    /**
     * Command to apply a jQuery method.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {Array} response.args
     * @param {string} response.method
     * @param {string} response.selector
     * @param {number} [status]
     */
    invoke: function (ajax, response, status) {
      var $element = $(response.selector);
      $element[response.method].apply($element, response.args);
    },

    /**
     * Command to restripe a table.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.selector
     * @param {number} [status]
     */
    restripe: function (ajax, response, status) {
      // :even and :odd are reversed because jQuery counts from 0 and
      // we count from 1, so we're out of sync.
      // Match immediate children of the parent element to allow nesting.
      $(response.selector).find('> tbody > tr:visible, > tr:visible')
        .removeClass('odd even')
        .filter(':even').addClass('odd').end()
        .filter(':odd').addClass('even');
    },

    /**
     * Command to update a form's build ID.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.old
     * @param {string} response.new
     * @param {number} [status]
     */
    update_build_id: function (ajax, response, status) {
      $('input[name="form_build_id"][value="' + response.old + '"]').val(response.new);
    },

    /**
     * Command to add css.
     *
     * Uses the proprietary addImport method if available as browsers which
     * support that method ignore @import statements in dynamically added
     * stylesheets.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.data
     * @param {number} [status]
     */
    add_css: function (ajax, response, status) {
      // Add the styles in the normal way.
      $('head').prepend(response.data);
      // Add imports in the styles using the addImport method if available.
      var match;
      var importMatch = /^@import url\("(.*)"\);$/igm;
      if (document.styleSheets[0].addImport && importMatch.test(response.data)) {
        importMatch.lastIndex = 0;
        do {
          match = importMatch.exec(response.data);
          document.styleSheets[0].addImport(match[1]);
        } while (match);
      }
    }
  };

})(jQuery, this, Drupal, drupalSettings);
;
/**
 * @file
 * Extends methods from core/misc/ajax.js.
 */

(function ($, window, Drupal, drupalSettings) {

  /**
   * Attempts to find the closest glyphicon progress indicator.
   *
   * @param {jQuery|Element} element
   *   A DOM element.
   *
   * @returns {jQuery}
   *   A jQuery object.
   */
  Drupal.Ajax.prototype.findGlyphicon = function (element) {
    return $(element).closest('.form-item').find('.ajax-progress.glyphicon')
  };

  /**
   * Starts the spinning of the glyphicon progress indicator.
   *
   * @param {jQuery|Element} element
   *   A DOM element.
   * @param {string} [message]
   *   An optional message to display (tooltip) for the progress.
   *
   * @returns {jQuery}
   *   A jQuery object.
   */
  Drupal.Ajax.prototype.glyphiconStart = function (element, message) {
    var $glyphicon = this.findGlyphicon(element);
    if ($glyphicon[0]) {
      $glyphicon.addClass('glyphicon-spin');

      // Add any message as a tooltip to the glyphicon.
      if (drupalSettings.bootstrap.tooltip_enabled) {
        $glyphicon
          .removeAttr('data-toggle')
          .removeAttr('data-original-title')
          .removeAttr('title')
          .tooltip('destroy')
        ;

        if (message) {
          $glyphicon.attr('data-toggle', 'tooltip').attr('title', message).tooltip();
        }
      }

      // Append a message for screen readers.
      if (message) {
        $glyphicon.parent().append('<div class="sr-only message">' + message + '</div>');
      }
    }
    return $glyphicon;
  };

  /**
   * Stop the spinning of a glyphicon progress indicator.
   *
   * @param {jQuery|Element} element
   *   A DOM element.
   */
  Drupal.Ajax.prototype.glyphiconStop = function (element) {
    var $glyphicon = this.findGlyphicon(element);
    if ($glyphicon[0]) {
      $glyphicon.removeClass('glyphicon-spin');
      if (drupalSettings.bootstrap.tooltip_enabled) {
        $glyphicon
          .removeAttr('data-toggle')
          .removeAttr('data-original-title')
          .removeAttr('title')
          .tooltip('destroy')
        ;
      }
    }
  };

  /**
   * Sets the throbber progress indicator.
   */
  Drupal.Ajax.prototype.setProgressIndicatorThrobber = function () {
    var $element = $(this.element);

    // Find an existing glyphicon progress indicator.
    var $glyphicon = this.glyphiconStart($element, this.progress.message);
    if ($glyphicon[0]) {
      this.progress.element = $glyphicon.parent();
      this.progress.glyphicon = true;
      return;
    }

    // Otherwise, add a glyphicon throbber after the element.
    if (!this.progress.element) {
      this.progress.element = $(Drupal.theme('ajaxThrobber'));
    }
    if (this.progress.message) {
      this.progress.element.after('<div class="message">' + this.progress.message + '</div>');
    }

    // If element is an input DOM element type (not :input), append after.
    if ($element.is('input')) {
      $element.after(this.progress.element);
    }
    // Otherwise append the throbber inside the element.
    else {
      $element.append(this.progress.element);
    }
  };


  /**
   * Handler for the form redirection completion.
   *
   * @param {Array.<Drupal.AjaxCommands~commandDefinition>} response
   * @param {number} status
   */
  Drupal.Ajax.prototype.success = function (response, status) {
    if (this.progress.element) {

      // Stop a glyphicon throbber.
      if (this.progress.glyphicon) {
        this.glyphiconStop(this.progress.element);
      }
      // Remove the progress element.
      else {
        this.progress.element.remove();
      }

      // Remove any message set.
      this.progress.element.parent().find('.message').remove();
    }

    // --------------------------------------------------------
    // Everything below is from core/misc/ajax.js.
    // --------------------------------------------------------

    if (this.progress.object) {
      this.progress.object.stopMonitoring();
    }
    $(this.element).prop('disabled', false);

    // Save element's ancestors tree so if the element is removed from the dom
    // we can try to refocus one of its parents. Using addBack reverse the
    // result array, meaning that index 0 is the highest parent in the hierarchy
    // in this situation it is usually a <form> element.
    var elementParents = $(this.element).parents('[data-drupal-selector]').addBack().toArray();

    // Track if any command is altering the focus so we can avoid changing the
    // focus set by the Ajax command.
    var focusChanged = false;
    for (var i in response) {
      if (response.hasOwnProperty(i) && response[i].command && this.commands[response[i].command]) {
        this.commands[response[i].command](this, response[i], status);
        if (response[i].command === 'invoke' && response[i].method === 'focus') {
          focusChanged = true;
        }
      }
    }

    // If the focus hasn't be changed by the ajax commands, try to refocus the
    // triggering element or one of its parents if that element does not exist
    // anymore.
    if (!focusChanged && this.element && !$(this.element).data('disable-refocus')) {
      var target = false;

      for (var n = elementParents.length - 1; !target && n > 0; n--) {
        target = document.querySelector('[data-drupal-selector="' + elementParents[n].getAttribute('data-drupal-selector') + '"]');
      }

      if (target) {
        $(target).trigger('focus');
      }
    }

    // Reattach behaviors, if they were detached in beforeSerialize(). The
    // attachBehaviors() called on the new content from processing the response
    // commands is not sufficient, because behaviors from the entire form need
    // to be reattached.
    if (this.$form) {
      var settings = this.settings || drupalSettings;
      Drupal.attachBehaviors(this.$form.get(0), settings);
    }

    // Remove any response-specific settings so they don't get used on the next
    // call by mistake.
    this.settings = null;
  };

})(jQuery, this, Drupal, drupalSettings);
;
/**
 * @file
 * User behaviors.
 */

(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Attach handlers to evaluate the strength of any password fields and to
   * check that its confirmation is correct.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches password strength indicator and other relevant validation to
   *   password fields.
   */
  Drupal.behaviors.password = {
    attach: function (context, settings) {
      var $passwordInput = $(context).find('input.js-password-field').once('password');

      if ($passwordInput.length) {
        var translate = settings.password;

        var $passwordInputParent = $passwordInput.parent();
        var $passwordInputParentWrapper = $passwordInputParent.parent();
        var $passwordSuggestions;

        // Add identifying class to password element parent.
        $passwordInputParent.addClass('password-parent');

        // Add the password confirmation layer.
        $passwordInputParentWrapper
          .find('input.js-password-confirm')
          .parent()
          .append('<div aria-live="polite" aria-atomic="true" class="password-confirm js-password-confirm">' + translate.confirmTitle + ' <span></span></div>')
          .addClass('confirm-parent');

        var $confirmInput = $passwordInputParentWrapper.find('input.js-password-confirm');
        var $confirmResult = $passwordInputParentWrapper.find('div.js-password-confirm');
        var $confirmChild = $confirmResult.find('span');

        // If the password strength indicator is enabled, add its markup.
        if (settings.password.showStrengthIndicator) {
          var passwordMeter = '<div class="password-strength"><div class="password-strength__meter"><div class="password-strength__indicator js-password-strength__indicator"></div></div><div aria-live="polite" aria-atomic="true" class="password-strength__title">' + translate.strengthTitle + ' <span class="password-strength__text js-password-strength__text"></span></div></div>';
          $confirmInput.parent().after('<div class="password-suggestions description"></div>');
          $passwordInputParent.append(passwordMeter);
          $passwordSuggestions = $passwordInputParentWrapper.find('div.password-suggestions').hide();
        }

        // Check that password and confirmation inputs match.
        var passwordCheckMatch = function (confirmInputVal) {
          var success = $passwordInput.val() === confirmInputVal;
          var confirmClass = success ? 'ok' : 'error';

          // Fill in the success message and set the class accordingly.
          $confirmChild.html(translate['confirm' + (success ? 'Success' : 'Failure')])
            .removeClass('ok error').addClass(confirmClass);
        };

        // Check the password strength.
        var passwordCheck = function () {
          if (settings.password.showStrengthIndicator) {
            // Evaluate the password strength.
            var result = Drupal.evaluatePasswordStrength($passwordInput.val(), settings.password);

            // Update the suggestions for how to improve the password.
            if ($passwordSuggestions.html() !== result.message) {
              $passwordSuggestions.html(result.message);
            }

            // Only show the description box if a weakness exists in the
            // password.
            $passwordSuggestions.toggle(result.strength !== 100);

            // Adjust the length of the strength indicator.
            $passwordInputParent.find('.js-password-strength__indicator')
              .css('width', result.strength + '%')
              .removeClass('is-weak is-fair is-good is-strong')
              .addClass(result.indicatorClass);

            // Update the strength indication text.
            $passwordInputParent.find('.js-password-strength__text').html(result.indicatorText);
          }

          // Check the value in the confirm input and show results.
          if ($confirmInput.val()) {
            passwordCheckMatch($confirmInput.val());
            $confirmResult.css({visibility: 'visible'});
          }
          else {
            $confirmResult.css({visibility: 'hidden'});
          }
        };

        // Monitor input events.
        $passwordInput.on('input', passwordCheck);
        $confirmInput.on('input', passwordCheck);
      }
    }
  };

  /**
   * Evaluate the strength of a user's password.
   *
   * Returns the estimated strength and the relevant output message.
   *
   * @param {string} password
   *   The password to evaluate.
   * @param {object} translate
   *   An object containing the text to display for each strength level.
   *
   * @return {object}
   *   An object containing strength, message, indicatorText and indicatorClass.
   */
  Drupal.evaluatePasswordStrength = function (password, translate) {
    password = password.trim();
    var indicatorText;
    var indicatorClass;
    var weaknesses = 0;
    var strength = 100;
    var msg = [];

    var hasLowercase = /[a-z]/.test(password);
    var hasUppercase = /[A-Z]/.test(password);
    var hasNumbers = /[0-9]/.test(password);
    var hasPunctuation = /[^a-zA-Z0-9]/.test(password);

    // If there is a username edit box on the page, compare password to that,
    // otherwise use value from the database.
    var $usernameBox = $('input.username');
    var username = ($usernameBox.length > 0) ? $usernameBox.val() : translate.username;

    // Lose 5 points for every character less than 12, plus a 30 point penalty.
    if (password.length < 12) {
      msg.push(translate.tooShort);
      strength -= ((12 - password.length) * 5) + 30;
    }

    // Count weaknesses.
    if (!hasLowercase) {
      msg.push(translate.addLowerCase);
      weaknesses++;
    }
    if (!hasUppercase) {
      msg.push(translate.addUpperCase);
      weaknesses++;
    }
    if (!hasNumbers) {
      msg.push(translate.addNumbers);
      weaknesses++;
    }
    if (!hasPunctuation) {
      msg.push(translate.addPunctuation);
      weaknesses++;
    }

    // Apply penalty for each weakness (balanced against length penalty).
    switch (weaknesses) {
      case 1:
        strength -= 12.5;
        break;

      case 2:
        strength -= 25;
        break;

      case 3:
        strength -= 40;
        break;

      case 4:
        strength -= 40;
        break;
    }

    // Check if password is the same as the username.
    if (password !== '' && password.toLowerCase() === username.toLowerCase()) {
      msg.push(translate.sameAsUsername);
      // Passwords the same as username are always very weak.
      strength = 5;
    }

    // Based on the strength, work out what text should be shown by the
    // password strength meter.
    if (strength < 60) {
      indicatorText = translate.weak;
      indicatorClass = 'is-weak';
    }
    else if (strength < 70) {
      indicatorText = translate.fair;
      indicatorClass = 'is-fair';
    }
    else if (strength < 80) {
      indicatorText = translate.good;
      indicatorClass = 'is-good';
    }
    else if (strength <= 100) {
      indicatorText = translate.strong;
      indicatorClass = 'is-strong';
    }

    // Assemble the final message.
    msg = translate.hasWeaknesses + '<ul><li>' + msg.join('</li><li>') + '</li></ul>';

    return {
      strength: strength,
      message: msg,
      indicatorText: indicatorText,
      indicatorClass: indicatorClass
    };

  };

})(jQuery, Drupal, drupalSettings);
;
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
;
/*
 * jQuery mmenu v5.7.8
 * @requires jQuery 1.7.0 or later
 *
 * mmenu.frebsite.nl
 *	
 * Copyright (c) Fred Heusschen
 * www.frebsite.nl
 *
 * License: CC-BY-NC-4.0
 * http://creativecommons.org/licenses/by-nc/4.0/
 */
!function(e){function n(){e[t].glbl||(r={$wndw:e(window),$docu:e(document),$html:e("html"),$body:e("body")},s={},a={},o={},e.each([s,a,o],function(e,n){n.add=function(e){e=e.split(" ");for(var t=0,i=e.length;t<i;t++)n[e[t]]=n.mm(e[t])}}),s.mm=function(e){return"mm-"+e},s.add("wrapper menu panels panel nopanel current highest opened subopened navbar hasnavbar title btn prev next listview nolistview inset vertical selected divider spacer hidden fullsubopen"),s.umm=function(e){return"mm-"==e.slice(0,3)&&(e=e.slice(3)),e},a.mm=function(e){return"mm-"+e},a.add("parent child"),o.mm=function(e){return e+".mm"},o.add("transitionend webkitTransitionEnd click scroll keydown mousedown mouseup touchstart touchmove touchend orientationchange"),e[t]._c=s,e[t]._d=a,e[t]._e=o,e[t].glbl=r)}var t="mmenu",i="5.7.8";if(!(e[t]&&e[t].version>i)){e[t]=function(e,n,t){this.$menu=e,this._api=["bind","getInstance","update","initPanels","openPanel","closePanel","closeAllPanels","setSelected"],this.opts=n,this.conf=t,this.vars={},this.cbck={},"function"==typeof this.___deprecated&&this.___deprecated(),this._initMenu(),this._initAnchors();var i=this.$pnls.children();return this._initAddons(),this.initPanels(i),"function"==typeof this.___debug&&this.___debug(),this},e[t].version=i,e[t].addons={},e[t].uniqueId=0,e[t].defaults={extensions:[],initMenu:function(){},initPanels:function(){},navbar:{add:!0,title:"Menu",titleLink:"panel"},onClick:{setSelected:!0},slidingSubmenus:!0},e[t].configuration={classNames:{divider:"Divider",inset:"Inset",panel:"Panel",selected:"Selected",spacer:"Spacer",vertical:"Vertical"},clone:!1,openingInterval:25,panelNodetype:"ul, ol, div",transitionDuration:400},e[t].prototype={init:function(e){this.initPanels(e)},getInstance:function(){return this},update:function(){this.trigger("update")},initPanels:function(e){e=e.not("."+s.nopanel),e=this._initPanels(e),this.opts.initPanels.call(this,e),this.trigger("initPanels",e),this.trigger("update")},openPanel:function(n){var i=n.parent(),a=this;if(i.hasClass(s.vertical)){var o=i.parents("."+s.subopened);if(o.length)return void this.openPanel(o.first());i.addClass(s.opened),this.trigger("openPanel",n),this.trigger("openingPanel",n),this.trigger("openedPanel",n)}else{if(n.hasClass(s.current))return;var r=this.$pnls.children("."+s.panel),l=r.filter("."+s.current);r.removeClass(s.highest).removeClass(s.current).not(n).not(l).not("."+s.vertical).addClass(s.hidden),e[t].support.csstransitions||l.addClass(s.hidden),n.hasClass(s.opened)?n.nextAll("."+s.opened).addClass(s.highest).removeClass(s.opened).removeClass(s.subopened):(n.addClass(s.highest),l.addClass(s.subopened)),n.removeClass(s.hidden).addClass(s.current),a.trigger("openPanel",n),setTimeout(function(){n.removeClass(s.subopened).addClass(s.opened),a.trigger("openingPanel",n),a.__transitionend(n,function(){a.trigger("openedPanel",n)},a.conf.transitionDuration)},this.conf.openingInterval)}},closePanel:function(e){var n=e.parent();n.hasClass(s.vertical)&&(n.removeClass(s.opened),this.trigger("closePanel",e),this.trigger("closingPanel",e),this.trigger("closedPanel",e))},closeAllPanels:function(){this.$menu.find("."+s.listview).children().removeClass(s.selected).filter("."+s.vertical).removeClass(s.opened);var e=this.$pnls.children("."+s.panel),n=e.first();this.$pnls.children("."+s.panel).not(n).removeClass(s.subopened).removeClass(s.opened).removeClass(s.current).removeClass(s.highest).addClass(s.hidden),this.openPanel(n)},togglePanel:function(e){var n=e.parent();n.hasClass(s.vertical)&&this[n.hasClass(s.opened)?"closePanel":"openPanel"](e)},setSelected:function(e){this.$menu.find("."+s.listview).children("."+s.selected).removeClass(s.selected),e.addClass(s.selected),this.trigger("setSelected",e)},bind:function(e,n){e="init"==e?"initPanels":e,this.cbck[e]=this.cbck[e]||[],this.cbck[e].push(n)},trigger:function(){var e=this,n=Array.prototype.slice.call(arguments),t=n.shift();if(t="init"==t?"initPanels":t,this.cbck[t])for(var i=0,s=this.cbck[t].length;i<s;i++)this.cbck[t][i].apply(e,n)},_initMenu:function(){this.conf.clone&&(this.$orig=this.$menu,this.$menu=this.$orig.clone(!0),this.$menu.add(this.$menu.find("[id]")).filter("[id]").each(function(){e(this).attr("id",s.mm(e(this).attr("id")))})),this.opts.initMenu.call(this,this.$menu,this.$orig),this.$menu.attr("id",this.$menu.attr("id")||this.__getUniqueId()),this.$pnls=e('<div class="'+s.panels+'" />').append(this.$menu.children(this.conf.panelNodetype)).prependTo(this.$menu),this.$menu.parent().addClass(s.wrapper);var n=[s.menu];this.opts.slidingSubmenus||n.push(s.vertical),this.opts.extensions=this.opts.extensions.length?"mm-"+this.opts.extensions.join(" mm-"):"",this.opts.extensions&&n.push(this.opts.extensions),this.$menu.addClass(n.join(" ")),this.trigger("_initMenu")},_initPanels:function(n){var i=this,o=this.__findAddBack(n,"ul, ol");this.__refactorClass(o,this.conf.classNames.inset,"inset").addClass(s.nolistview+" "+s.nopanel),o.not("."+s.nolistview).addClass(s.listview);var r=this.__findAddBack(n,"."+s.listview).children();this.__refactorClass(r,this.conf.classNames.selected,"selected"),this.__refactorClass(r,this.conf.classNames.divider,"divider"),this.__refactorClass(r,this.conf.classNames.spacer,"spacer"),this.__refactorClass(this.__findAddBack(n,"."+this.conf.classNames.panel),this.conf.classNames.panel,"panel");var l=e(),d=n.add(n.find("."+s.panel)).add(this.__findAddBack(n,"."+s.listview).children().children(this.conf.panelNodetype)).not("."+s.nopanel);this.__refactorClass(d,this.conf.classNames.vertical,"vertical"),this.opts.slidingSubmenus||d.addClass(s.vertical),d.each(function(){var n=e(this),t=n;n.is("ul, ol")?(n.wrap('<div class="'+s.panel+'" />'),t=n.parent()):t.addClass(s.panel);var a=n.attr("id");n.removeAttr("id"),t.attr("id",a||i.__getUniqueId()),n.hasClass(s.vertical)&&(n.removeClass(i.conf.classNames.vertical),t.add(t.parent()).addClass(s.vertical)),l=l.add(t)});var c=e("."+s.panel,this.$menu);l.each(function(n){var o,r,l=e(this),d=l.parent(),c=d.children("a, span").first();if(d.is("."+s.panels)||(d.data(a.child,l),l.data(a.parent,d)),d.children("."+s.next).length||d.parent().is("."+s.listview)&&(o=l.attr("id"),r=e('<a class="'+s.next+'" href="#'+o+'" data-target="#'+o+'" />').insertBefore(c),c.is("span")&&r.addClass(s.fullsubopen)),!l.children("."+s.navbar).length&&!d.hasClass(s.vertical)){d.parent().is("."+s.listview)?d=d.closest("."+s.panel):(c=d.closest("."+s.panel).find('a[href="#'+l.attr("id")+'"]').first(),d=c.closest("."+s.panel));var h=!1,u=e('<div class="'+s.navbar+'" />');if(i.opts.navbar.add&&l.addClass(s.hasnavbar),d.length){switch(o=d.attr("id"),i.opts.navbar.titleLink){case"anchor":h=c.attr("href");break;case"panel":case"parent":h="#"+o;break;default:h=!1}u.append('<a class="'+s.btn+" "+s.prev+'" href="#'+o+'" data-target="#'+o+'" />').append(e('<a class="'+s.title+'"'+(h?' href="'+h+'"':"")+" />").text(c.text())).prependTo(l)}else i.opts.navbar.title&&u.append('<a class="'+s.title+'">'+e[t].i18n(i.opts.navbar.title)+"</a>").prependTo(l)}});var h=this.__findAddBack(n,"."+s.listview).children("."+s.selected).removeClass(s.selected).last().addClass(s.selected);h.add(h.parentsUntil("."+s.menu,"li")).filter("."+s.vertical).addClass(s.opened).end().each(function(){e(this).parentsUntil("."+s.menu,"."+s.panel).not("."+s.vertical).first().addClass(s.opened).parentsUntil("."+s.menu,"."+s.panel).not("."+s.vertical).first().addClass(s.opened).addClass(s.subopened)}),h.children("."+s.panel).not("."+s.vertical).addClass(s.opened).parentsUntil("."+s.menu,"."+s.panel).not("."+s.vertical).first().addClass(s.opened).addClass(s.subopened);var u=c.filter("."+s.opened);return u.length||(u=l.first()),u.addClass(s.opened).last().addClass(s.current),l.not("."+s.vertical).not(u.last()).addClass(s.hidden).end().filter(function(){return!e(this).parent().hasClass(s.panels)}).appendTo(this.$pnls),this.trigger("_initPanels",l),l},_initAnchors:function(){var n=this;r.$body.on(o.click+"-oncanvas","a[href]",function(i){var a=e(this),o=!1,r=n.$menu.find(a).length;for(var l in e[t].addons)if(e[t].addons[l].clickAnchor.call(n,a,r)){o=!0;break}var d=a.attr("href");if(!o&&r&&d.length>1&&"#"==d.slice(0,1))try{var c=e(d,n.$menu);c.is("."+s.panel)&&(o=!0,n[a.parent().hasClass(s.vertical)?"togglePanel":"openPanel"](c))}catch(h){}if(o&&i.preventDefault(),!o&&r&&a.is("."+s.listview+" > li > a")&&!a.is('[rel="external"]')&&!a.is('[target="_blank"]')){n.__valueOrFn(n.opts.onClick.setSelected,a)&&n.setSelected(e(i.target).parent());var u=n.__valueOrFn(n.opts.onClick.preventDefault,a,"#"==d.slice(0,1));u&&i.preventDefault(),n.__valueOrFn(n.opts.onClick.close,a,u)&&n.close()}}),this.trigger("_initAnchors")},_initAddons:function(){var n;for(n in e[t].addons)e[t].addons[n].add.call(this),e[t].addons[n].add=function(){};for(n in e[t].addons)e[t].addons[n].setup.call(this);this.trigger("_initAddons")},_getOriginalMenuId:function(){var e=this.$menu.attr("id");return e&&e.length&&this.conf.clone&&(e=s.umm(e)),e},__api:function(){var n=this,t={};return e.each(this._api,function(e){var i=this;t[i]=function(){var e=n[i].apply(n,arguments);return"undefined"==typeof e?t:e}}),t},__valueOrFn:function(e,n,t){return"function"==typeof e?e.call(n[0]):"undefined"==typeof e&&"undefined"!=typeof t?t:e},__refactorClass:function(e,n,t){return e.filter("."+n).removeClass(n).addClass(s[t])},__findAddBack:function(e,n){return e.find(n).add(e.filter(n))},__filterListItems:function(e){return e.not("."+s.divider).not("."+s.hidden)},__transitionend:function(n,t,i){var s=!1,a=function(i){if("undefined"!=typeof i){if(!e(i.target).is(n))return!1;n.unbind(o.transitionend),n.unbind(o.webkitTransitionEnd)}s||t.call(n[0]),s=!0};n.on(o.transitionend,a),n.on(o.webkitTransitionEnd,a),setTimeout(a,1.1*i)},__getUniqueId:function(){return s.mm(e[t].uniqueId++)}},e.fn[t]=function(i,s){n(),i=e.extend(!0,{},e[t].defaults,i),s=e.extend(!0,{},e[t].configuration,s);var a=e();return this.each(function(){var n=e(this);if(!n.data(t)){var o=new e[t](n,i,s);o.$menu.data(t,o.__api()),a=a.add(o.$menu)}}),a},e[t].i18n=function(){var n={};return function(t){switch(typeof t){case"object":return e.extend(n,t),n;case"string":return n[t]||t;case"undefined":default:return n}}}(),e[t].support={touch:"ontouchstart"in window||navigator.msMaxTouchPoints||!1,csstransitions:function(){if("undefined"!=typeof Modernizr&&"undefined"!=typeof Modernizr.csstransitions)return Modernizr.csstransitions;var e=document.body||document.documentElement,n=e.style,t="transition";if("string"==typeof n[t])return!0;var i=["Moz","webkit","Webkit","Khtml","O","ms"];t=t.charAt(0).toUpperCase()+t.substr(1);for(var s=0;s<i.length;s++)if("string"==typeof n[i[s]+t])return!0;return!1}(),csstransforms:function(){return"undefined"==typeof Modernizr||"undefined"==typeof Modernizr.csstransforms||Modernizr.csstransforms}(),csstransforms3d:function(){return"undefined"==typeof Modernizr||"undefined"==typeof Modernizr.csstransforms3d||Modernizr.csstransforms3d}()};var s,a,o,r}}(jQuery),/*	
 * jQuery mmenu offCanvas add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="offCanvas";e[n].addons[t]={setup:function(){if(this.opts[t]){var s=this.opts[t],a=this.conf[t];o=e[n].glbl,this._api=e.merge(this._api,["open","close","setPage"]),"top"!=s.position&&"bottom"!=s.position||(s.zposition="front"),"string"!=typeof a.pageSelector&&(a.pageSelector="> "+a.pageNodetype),o.$allMenus=(o.$allMenus||e()).add(this.$menu),this.vars.opened=!1;var r=[i.offcanvas];"left"!=s.position&&r.push(i.mm(s.position)),"back"!=s.zposition&&r.push(i.mm(s.zposition)),this.$menu.addClass(r.join(" ")).parent().removeClass(i.wrapper),e[n].support.csstransforms||this.$menu.addClass(i["no-csstransforms"]),e[n].support.csstransforms3d||this.$menu.addClass(i["no-csstransforms3d"]),this.setPage(o.$page),this._initBlocker(),this["_initWindow_"+t](),this.$menu[a.menuInjectMethod+"To"](a.menuWrapperSelector);var l=window.location.hash;if(l){var d=this._getOriginalMenuId();d&&d==l.slice(1)&&this.open()}}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("offcanvas slideout blocking modal background opening blocker page no-csstransforms3d"),s.add("style"),a.add("resize")},clickAnchor:function(e,n){var s=this;if(this.opts[t]){var a=this._getOriginalMenuId();if(a&&e.is('[href="#'+a+'"]')){if(n)return!0;var r=e.closest("."+i.menu);if(r.length){var l=r.data("mmenu");if(l&&l.close)return l.close(),s.__transitionend(r,function(){s.open()},s.conf.transitionDuration),!0}return this.open(),!0}if(o.$page)return a=o.$page.first().attr("id"),a&&e.is('[href="#'+a+'"]')?(this.close(),!0):void 0}}},e[n].defaults[t]={position:"left",zposition:"back",blockUI:!0,moveBackground:!0},e[n].configuration[t]={pageNodetype:"div",pageSelector:null,noPageSelector:[],wrapPageIfNeeded:!0,menuWrapperSelector:"body",menuInjectMethod:"prepend"},e[n].prototype.open=function(){if(!this.vars.opened){var e=this;this._openSetup(),setTimeout(function(){e._openFinish()},this.conf.openingInterval),this.trigger("open")}},e[n].prototype._openSetup=function(){var n=this,r=this.opts[t];this.closeAllOthers(),o.$page.each(function(){e(this).data(s.style,e(this).attr("style")||"")}),o.$wndw.trigger(a.resize+"-"+t,[!0]);var l=[i.opened];r.blockUI&&l.push(i.blocking),"modal"==r.blockUI&&l.push(i.modal),r.moveBackground&&l.push(i.background),"left"!=r.position&&l.push(i.mm(this.opts[t].position)),"back"!=r.zposition&&l.push(i.mm(this.opts[t].zposition)),this.opts.extensions&&l.push(this.opts.extensions),o.$html.addClass(l.join(" ")),setTimeout(function(){n.vars.opened=!0},this.conf.openingInterval),this.$menu.addClass(i.current+" "+i.opened)},e[n].prototype._openFinish=function(){var e=this;this.__transitionend(o.$page.first(),function(){e.trigger("opened")},this.conf.transitionDuration),o.$html.addClass(i.opening),this.trigger("opening")},e[n].prototype.close=function(){if(this.vars.opened){var n=this;this.__transitionend(o.$page.first(),function(){n.$menu.removeClass(i.current+" "+i.opened);var a=[i.opened,i.blocking,i.modal,i.background,i.mm(n.opts[t].position),i.mm(n.opts[t].zposition)];n.opts.extensions&&a.push(n.opts.extensions),o.$html.removeClass(a.join(" ")),o.$page.each(function(){e(this).attr("style",e(this).data(s.style))}),n.vars.opened=!1,n.trigger("closed")},this.conf.transitionDuration),o.$html.removeClass(i.opening),this.trigger("close"),this.trigger("closing")}},e[n].prototype.closeAllOthers=function(){o.$allMenus.not(this.$menu).each(function(){var t=e(this).data(n);t&&t.close&&t.close()})},e[n].prototype.setPage=function(n){var s=this,a=this.conf[t];n&&n.length||(n=o.$body.find(a.pageSelector),a.noPageSelector.length&&(n=n.not(a.noPageSelector.join(", "))),n.length>1&&a.wrapPageIfNeeded&&(n=n.wrapAll("<"+this.conf[t].pageNodetype+" />").parent())),n.each(function(){e(this).attr("id",e(this).attr("id")||s.__getUniqueId())}),n.addClass(i.page+" "+i.slideout),o.$page=n,this.trigger("setPage",n)},e[n].prototype["_initWindow_"+t]=function(){o.$wndw.off(a.keydown+"-"+t).on(a.keydown+"-"+t,function(e){if(o.$html.hasClass(i.opened)&&9==e.keyCode)return e.preventDefault(),!1});var e=0;o.$wndw.off(a.resize+"-"+t).on(a.resize+"-"+t,function(n,t){if(1==o.$page.length&&(t||o.$html.hasClass(i.opened))){var s=o.$wndw.height();(t||s!=e)&&(e=s,o.$page.css("minHeight",s))}})},e[n].prototype._initBlocker=function(){var n=this;this.opts[t].blockUI&&(o.$blck||(o.$blck=e('<div id="'+i.blocker+'" class="'+i.slideout+'" />')),o.$blck.appendTo(o.$body).off(a.touchstart+"-"+t+" "+a.touchmove+"-"+t).on(a.touchstart+"-"+t+" "+a.touchmove+"-"+t,function(e){e.preventDefault(),e.stopPropagation(),o.$blck.trigger(a.mousedown+"-"+t)}).off(a.mousedown+"-"+t).on(a.mousedown+"-"+t,function(e){e.preventDefault(),o.$html.hasClass(i.modal)||(n.closeAllOthers(),n.close())}))};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu scrollBugFix add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="scrollBugFix";e[n].addons[t]={setup:function(){var s=this,r=this.opts[t];this.conf[t];if(o=e[n].glbl,e[n].support.touch&&this.opts.offCanvas&&this.opts.offCanvas.blockUI&&("boolean"==typeof r&&(r={fix:r}),"object"!=typeof r&&(r={}),r=this.opts[t]=e.extend(!0,{},e[n].defaults[t],r),r.fix)){var l=this.$menu.attr("id"),d=!1;this.bind("opening",function(){this.$pnls.children("."+i.current).scrollTop(0)}),o.$docu.on(a.touchmove,function(e){s.vars.opened&&e.preventDefault()}),o.$body.on(a.touchstart,"#"+l+"> ."+i.panels+"> ."+i.current,function(e){s.vars.opened&&(d||(d=!0,0===e.currentTarget.scrollTop?e.currentTarget.scrollTop=1:e.currentTarget.scrollHeight===e.currentTarget.scrollTop+e.currentTarget.offsetHeight&&(e.currentTarget.scrollTop-=1),d=!1))}).on(a.touchmove,"#"+l+"> ."+i.panels+"> ."+i.current,function(n){s.vars.opened&&e(this)[0].scrollHeight>e(this).innerHeight()&&n.stopPropagation()}),o.$wndw.on(a.orientationchange,function(){s.$pnls.children("."+i.current).scrollTop(0).css({"-webkit-overflow-scrolling":"auto"}).css({"-webkit-overflow-scrolling":"touch"})})}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e},clickAnchor:function(e,n){}},e[n].defaults[t]={fix:!0};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu autoHeight add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="autoHeight";e[n].addons[t]={setup:function(){if(this.opts.offCanvas){var s=this.opts[t];this.conf[t];if(o=e[n].glbl,"boolean"==typeof s&&s&&(s={height:"auto"}),"string"==typeof s&&(s={height:s}),"object"!=typeof s&&(s={}),s=this.opts[t]=e.extend(!0,{},e[n].defaults[t],s),"auto"==s.height||"highest"==s.height){this.$menu.addClass(i.autoheight);var a=function(n){if(this.vars.opened){var t=parseInt(this.$pnls.css("top"),10)||0,a=parseInt(this.$pnls.css("bottom"),10)||0,o=0;this.$menu.addClass(i.measureheight),"auto"==s.height?(n=n||this.$pnls.children("."+i.current),n.is("."+i.vertical)&&(n=n.parents("."+i.panel).not("."+i.vertical).first()),o=n.outerHeight()):"highest"==s.height&&this.$pnls.children().each(function(){var n=e(this);n.is("."+i.vertical)&&(n=n.parents("."+i.panel).not("."+i.vertical).first()),o=Math.max(o,n.outerHeight())}),this.$menu.height(o+t+a).removeClass(i.measureheight)}};this.bind("opening",a),"highest"==s.height&&this.bind("initPanels",a),"auto"==s.height&&(this.bind("update",a),this.bind("openPanel",a),this.bind("closePanel",a))}}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("autoheight measureheight"),a.add("resize")},clickAnchor:function(e,n){}},e[n].defaults[t]={height:"default"};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu backButton add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="backButton";e[n].addons[t]={setup:function(){if(this.opts.offCanvas){var s=this,a=this.opts[t];this.conf[t];if(o=e[n].glbl,"boolean"==typeof a&&(a={close:a}),"object"!=typeof a&&(a={}),a=e.extend(!0,{},e[n].defaults[t],a),a.close){var r="#"+s.$menu.attr("id");this.bind("opened",function(e){location.hash!=r&&history.pushState(null,document.title,r)}),e(window).on("popstate",function(e){o.$html.hasClass(i.opened)?(e.stopPropagation(),s.close()):location.hash==r&&(e.stopPropagation(),s.open())})}}},add:function(){return window.history&&window.history.pushState?(i=e[n]._c,s=e[n]._d,void(a=e[n]._e)):void(e[n].addons[t].setup=function(){})},clickAnchor:function(e,n){}},e[n].defaults[t]={close:!1};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu columns add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="columns";e[n].addons[t]={setup:function(){var s=this.opts[t];this.conf[t];if(o=e[n].glbl,"boolean"==typeof s&&(s={add:s}),"number"==typeof s&&(s={add:!0,visible:s}),"object"!=typeof s&&(s={}),"number"==typeof s.visible&&(s.visible={min:s.visible,max:s.visible}),s=this.opts[t]=e.extend(!0,{},e[n].defaults[t],s),s.add){s.visible.min=Math.max(1,Math.min(6,s.visible.min)),s.visible.max=Math.max(s.visible.min,Math.min(6,s.visible.max)),this.$menu.addClass(i.columns);for(var a=this.opts.offCanvas?this.$menu.add(o.$html):this.$menu,r=[],l=0;l<=s.visible.max;l++)r.push(i.columns+"-"+l);r=r.join(" ");var d=function(e){u.call(this,this.$pnls.children("."+i.current))},c=function(){var e=this.$pnls.children("."+i.panel).filter("."+i.opened).length;e=Math.min(s.visible.max,Math.max(s.visible.min,e)),a.removeClass(r).addClass(i.columns+"-"+e)},h=function(){this.opts.offCanvas&&o.$html.removeClass(r)},u=function(n){this.$pnls.children("."+i.panel).removeClass(r).filter("."+i.subopened).removeClass(i.hidden).add(n).slice(-s.visible.max).each(function(n){e(this).addClass(i.columns+"-"+n)})};this.bind("open",c),this.bind("close",h),this.bind("initPanels",d),this.bind("openPanel",u),this.bind("openingPanel",c),this.bind("openedPanel",c),this.opts.offCanvas||c.call(this)}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("columns")},clickAnchor:function(n,s){if(!this.opts[t].add)return!1;if(s){var a=n.attr("href");if(a.length>1&&"#"==a.slice(0,1))try{var o=e(a,this.$menu);if(o.is("."+i.panel))for(var r=parseInt(n.closest("."+i.panel).attr("class").split(i.columns+"-")[1].split(" ")[0],10)+1;r!==!1;){var l=this.$pnls.children("."+i.columns+"-"+r);if(!l.length){r=!1;break}r++,l.removeClass(i.subopened).removeClass(i.opened).removeClass(i.current).removeClass(i.highest).addClass(i.hidden)}}catch(d){}}}},e[n].defaults[t]={add:!1,visible:{min:1,max:3}};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu counters add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="counters";e[n].addons[t]={setup:function(){var a=this,r=this.opts[t];this.conf[t];o=e[n].glbl,"boolean"==typeof r&&(r={add:r,update:r}),"object"!=typeof r&&(r={}),r=this.opts[t]=e.extend(!0,{},e[n].defaults[t],r),this.bind("initPanels",function(n){this.__refactorClass(e("em",n),this.conf.classNames[t].counter,"counter")}),r.add&&this.bind("initPanels",function(n){var t;switch(r.addTo){case"panels":t=n;break;default:t=n.filter(r.addTo)}t.each(function(){var n=e(this).data(s.parent);n&&(n.children("em."+i.counter).length||n.prepend(e('<em class="'+i.counter+'" />')))})}),r.update&&this.bind("update",function(){this.$pnls.find("."+i.panel).each(function(){var n=e(this),t=n.data(s.parent);if(t){var o=t.children("em."+i.counter);o.length&&(n=n.children("."+i.listview),n.length&&o.html(a.__filterListItems(n.children()).length))}})})},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("counter search noresultsmsg")},clickAnchor:function(e,n){}},e[n].defaults[t]={add:!1,addTo:"panels",update:!1},e[n].configuration.classNames[t]={counter:"Counter"};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu dividers add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="dividers";e[n].addons[t]={setup:function(){var s=this,r=this.opts[t];this.conf[t];if(o=e[n].glbl,"boolean"==typeof r&&(r={add:r,fixed:r}),"object"!=typeof r&&(r={}),r=this.opts[t]=e.extend(!0,{},e[n].defaults[t],r),this.bind("initPanels",function(n){this.__refactorClass(e("li",this.$menu),this.conf.classNames[t].collapsed,"collapsed")}),r.add&&this.bind("initPanels",function(n){var t;switch(r.addTo){case"panels":t=n;break;default:t=n.filter(r.addTo)}e("."+i.divider,t).remove(),t.find("."+i.listview).not("."+i.vertical).each(function(){var n="";s.__filterListItems(e(this).children()).each(function(){var t=e.trim(e(this).children("a, span").text()).slice(0,1).toLowerCase();t!=n&&t.length&&(n=t,e('<li class="'+i.divider+'">'+t+"</li>").insertBefore(this))})})}),r.collapse&&this.bind("initPanels",function(n){e("."+i.divider,n).each(function(){var n=e(this),t=n.nextUntil("."+i.divider,"."+i.collapsed);t.length&&(n.children("."+i.subopen).length||(n.wrapInner("<span />"),n.prepend('<a href="#" class="'+i.subopen+" "+i.fullsubopen+'" />')))})}),r.fixed){var l=function(n){n=n||this.$pnls.children("."+i.current);var t=n.find("."+i.divider).not("."+i.hidden);if(t.length){this.$menu.addClass(i.hasdividers);var s=n.scrollTop()||0,a="";n.is(":visible")&&n.find("."+i.divider).not("."+i.hidden).each(function(){e(this).position().top+s<s+1&&(a=e(this).text())}),this.$fixeddivider.text(a)}else this.$menu.removeClass(i.hasdividers)};this.$fixeddivider=e('<ul class="'+i.listview+" "+i.fixeddivider+'"><li class="'+i.divider+'"></li></ul>').prependTo(this.$pnls).children(),this.bind("openPanel",l),this.bind("update",l),this.bind("initPanels",function(n){n.off(a.scroll+"-dividers "+a.touchmove+"-dividers").on(a.scroll+"-dividers "+a.touchmove+"-dividers",function(n){l.call(s,e(this))})})}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("collapsed uncollapsed fixeddivider hasdividers"),a.add("scroll")},clickAnchor:function(e,n){if(this.opts[t].collapse&&n){var s=e.parent();if(s.is("."+i.divider)){var a=s.nextUntil("."+i.divider,"."+i.collapsed);return s.toggleClass(i.opened),a[s.hasClass(i.opened)?"addClass":"removeClass"](i.uncollapsed),!0}}return!1}},e[n].defaults[t]={add:!1,addTo:"panels",fixed:!1,collapse:!1},e[n].configuration.classNames[t]={collapsed:"Collapsed"};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu drag add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){function n(e,n,t){return e<n&&(e=n),e>t&&(e=t),e}function t(t,i,s){var r,l,d,c,h,u=this,f={},p=0,v=!1,m=!1,g=0,b=0;switch(this.opts.offCanvas.position){case"left":case"right":f.events="panleft panright",f.typeLower="x",f.typeUpper="X",m="width";break;case"top":case"bottom":f.events="panup pandown",f.typeLower="y",f.typeUpper="Y",m="height"}switch(this.opts.offCanvas.position){case"right":case"bottom":f.negative=!0,c=function(e){e>=s.$wndw[m]()-t.maxStartPos&&(p=1)};break;default:f.negative=!1,c=function(e){e<=t.maxStartPos&&(p=1)}}switch(this.opts.offCanvas.position){case"left":f.open_dir="right",f.close_dir="left";break;case"right":f.open_dir="left",f.close_dir="right";break;case"top":f.open_dir="down",f.close_dir="up";break;case"bottom":f.open_dir="up",f.close_dir="down"}switch(this.opts.offCanvas.zposition){case"front":h=function(){return this.$menu};break;default:h=function(){return e("."+o.slideout)}}var _=this.__valueOrFn(t.node,this.$menu,s.$page);"string"==typeof _&&(_=e(_));var C=new Hammer(_[0],this.opts[a].vendors.hammer);C.on("panstart",function(e){c(e.center[f.typeLower]),s.$slideOutNodes=h(),v=f.open_dir}).on(f.events+" panend",function(e){p>0&&e.preventDefault()}).on(f.events,function(e){if(r=e["delta"+f.typeUpper],f.negative&&(r=-r),r!=g&&(v=r>=g?f.open_dir:f.close_dir),g=r,g>t.threshold&&1==p){if(s.$html.hasClass(o.opened))return;p=2,u._openSetup(),u.trigger("opening"),s.$html.addClass(o.dragging),b=n(s.$wndw[m]()*i[m].perc,i[m].min,i[m].max)}2==p&&(l=n(g,10,b)-("front"==u.opts.offCanvas.zposition?b:0),f.negative&&(l=-l),d="translate"+f.typeUpper+"("+l+"px )",s.$slideOutNodes.css({"-webkit-transform":"-webkit-"+d,transform:d}))}).on("panend",function(e){2==p&&(s.$html.removeClass(o.dragging),s.$slideOutNodes.css("transform",""),u[v==f.open_dir?"_openFinish":"close"]()),p=0})}function i(n,t,i,s){var l=this;n.each(function(){var n=e(this),t=n.data(r.parent);if(t&&(t=t.closest("."+o.panel),t.length)){var i=new Hammer(n[0],l.opts[a].vendors.hammer);i.on("panright",function(e){l.openPanel(t)})}})}var s="mmenu",a="drag";e[s].addons[a]={setup:function(){if(this.opts.offCanvas){var n=this.opts[a],o=this.conf[a];d=e[s].glbl,"boolean"==typeof n&&(n={menu:n,panels:n}),"object"!=typeof n&&(n={}),"boolean"==typeof n.menu&&(n.menu={open:n.menu}),"object"!=typeof n.menu&&(n.menu={}),"boolean"==typeof n.panels&&(n.panels={close:n.panels}),"object"!=typeof n.panels&&(n.panels={}),n=this.opts[a]=e.extend(!0,{},e[s].defaults[a],n),n.menu.open&&t.call(this,n.menu,o.menu,d),n.panels.close&&this.bind("initPanels",function(e){i.call(this,e,n.panels,o.panels,d)})}},add:function(){return"function"!=typeof Hammer||Hammer.VERSION<2?void(e[s].addons[a].setup=function(){}):(o=e[s]._c,r=e[s]._d,l=e[s]._e,void o.add("dragging"))},clickAnchor:function(e,n){}},e[s].defaults[a]={menu:{open:!1,maxStartPos:100,threshold:50},panels:{close:!1},vendors:{hammer:{}}},e[s].configuration[a]={menu:{width:{perc:.8,min:140,max:440},height:{perc:.8,min:140,max:880}},panels:{}};var o,r,l,d}(jQuery),/*	
 * jQuery mmenu fixedElements add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="fixedElements";e[n].addons[t]={setup:function(){if(this.opts.offCanvas){var i=this.opts[t];this.conf[t];o=e[n].glbl,i=this.opts[t]=e.extend(!0,{},e[n].defaults[t],i);var s=function(e){var n=this.conf.classNames[t].fixed;this.__refactorClass(e.find("."+n),n,"slideout").appendTo(o.$body)};s.call(this,o.$page),this.bind("setPage",s)}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("fixed")},clickAnchor:function(e,n){}},e[n].configuration.classNames[t]={fixed:"Fixed"};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu dropdown add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="dropdown";e[n].addons[t]={setup:function(){if(this.opts.offCanvas){var r=this,l=this.opts[t],d=this.conf[t];if(o=e[n].glbl,"boolean"==typeof l&&l&&(l={drop:l}),"object"!=typeof l&&(l={}),"string"==typeof l.position&&(l.position={of:l.position}),l=this.opts[t]=e.extend(!0,{},e[n].defaults[t],l),l.drop){if("string"!=typeof l.position.of){var c=this.$menu.attr("id");c&&c.length&&(this.conf.clone&&(c=i.umm(c)),l.position.of='[href="#'+c+'"]')}if("string"==typeof l.position.of){var h=e(l.position.of);if(h.length){this.$menu.addClass(i.dropdown),l.tip&&this.$menu.addClass(i.tip),l.event=l.event.split(" "),1==l.event.length&&(l.event[1]=l.event[0]),"hover"==l.event[0]&&h.on(a.mouseenter+"-dropdown",function(){r.open()}),"hover"==l.event[1]&&this.$menu.on(a.mouseleave+"-dropdown",function(){r.close()}),this.bind("opening",function(){this.$menu.data(s.style,this.$menu.attr("style")||""),o.$html.addClass(i.dropdown)}),this.bind("closed",function(){this.$menu.attr("style",this.$menu.data(s.style)),o.$html.removeClass(i.dropdown)});var u=function(s,a){var r=a[0],c=a[1],u="x"==s?"scrollLeft":"scrollTop",f="x"==s?"outerWidth":"outerHeight",p="x"==s?"left":"top",v="x"==s?"right":"bottom",m="x"==s?"width":"height",g="x"==s?"maxWidth":"maxHeight",b=null,_=o.$wndw[u](),C=h.offset()[p]-=_,y=C+h[f](),$=o.$wndw[m](),w=d.offset.button[s]+d.offset.viewport[s];if(l.position[s])switch(l.position[s]){case"left":case"bottom":b="after";break;case"right":case"top":b="before"}null===b&&(b=C+(y-C)/2<$/2?"after":"before");var x,k;return"after"==b?(x="x"==s?C:y,k=$-(x+w),r[p]=x+d.offset.button[s],r[v]="auto",c.push(i["x"==s?"tipleft":"tiptop"])):(x="x"==s?y:C,k=x-w,r[v]="calc( 100% - "+(x-d.offset.button[s])+"px )",r[p]="auto",c.push(i["x"==s?"tipright":"tipbottom"])),r[g]=Math.min(e[n].configuration[t][m].max,k),[r,c]},f=function(e){if(this.vars.opened){this.$menu.attr("style",this.$menu.data(s.style));var n=[{},[]];n=u.call(this,"y",n),n=u.call(this,"x",n),this.$menu.css(n[0]),l.tip&&this.$menu.removeClass(i.tipleft+" "+i.tipright+" "+i.tiptop+" "+i.tipbottom).addClass(n[1].join(" "))}};this.bind("opening",f),o.$wndw.on(a.resize+"-dropdown",function(e){f.call(r)}),this.opts.offCanvas.blockUI||o.$wndw.on(a.scroll+"-dropdown",function(e){f.call(r)})}}}}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("dropdown tip tipleft tipright tiptop tipbottom"),a.add("mouseenter mouseleave resize scroll")},clickAnchor:function(e,n){}},e[n].defaults[t]={drop:!1,event:"click",position:{},tip:!0},e[n].configuration[t]={offset:{button:{x:-10,y:10},viewport:{x:20,y:20}},height:{max:880},width:{max:440}};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu iconPanels add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="iconPanels";e[n].addons[t]={setup:function(){var s=this,a=this.opts[t];this.conf[t];if(o=e[n].glbl,"boolean"==typeof a&&(a={add:a}),"number"==typeof a&&(a={add:!0,visible:a}),"object"!=typeof a&&(a={}),a=this.opts[t]=e.extend(!0,{},e[n].defaults[t],a),a.visible++,a.add){this.$menu.addClass(i.iconpanel);for(var r=[],l=0;l<=a.visible;l++)r.push(i.iconpanel+"-"+l);r=r.join(" ");var d=function(n){n.hasClass(i.vertical)||s.$pnls.children("."+i.panel).removeClass(r).filter("."+i.subopened).removeClass(i.hidden).add(n).not("."+i.vertical).slice(-a.visible).each(function(n){e(this).addClass(i.iconpanel+"-"+n)})};this.bind("openPanel",d),this.bind("initPanels",function(n){d.call(s,s.$pnls.children("."+i.current)),n.not("."+i.vertical).each(function(){e(this).children("."+i.subblocker).length||e(this).prepend('<a href="#'+e(this).closest("."+i.panel).attr("id")+'" class="'+i.subblocker+'" />')})})}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("iconpanel subblocker")},clickAnchor:function(e,n){}},e[n].defaults[t]={add:!1,visible:3};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu keyboardNavigation add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){function n(n,t){n||(n=this.$pnls.children("."+a.current));var i=e();"default"==t&&(i=n.children("."+a.listview).find("a[href]").not(":hidden"),i.length||(i=n.find(d).not(":hidden")),i.length||(i=this.$menu.children("."+a.navbar).find(d).not(":hidden"))),i.length||(i=this.$menu.children("."+a.tabstart)),i.first().focus()}function t(e){e||(e=this.$pnls.children("."+a.current));var n=this.$pnls.children("."+a.panel),t=n.not(e);t.find(d).attr("tabindex",-1),e.find(d).attr("tabindex",0),e.find("input.mm-toggle, input.mm-check").attr("tabindex",-1)}var i="mmenu",s="keyboardNavigation";e[i].addons[s]={setup:function(){var o=this,r=this.opts[s];this.conf[s];if(l=e[i].glbl,"boolean"!=typeof r&&"string"!=typeof r||(r={enable:r}),"object"!=typeof r&&(r={}),r=this.opts[s]=e.extend(!0,{},e[i].defaults[s],r),r.enable){r.enhance&&this.$menu.addClass(a.keyboardfocus);var c=e('<input class="'+a.tabstart+'" tabindex="0" type="text" />'),h=e('<input class="'+a.tabend+'" tabindex="0" type="text" />');this.bind("initPanels",function(){this.$menu.prepend(c).append(h).children("."+a.navbar).find(d).attr("tabindex",0)}),this.bind("open",function(){t.call(this),this.__transitionend(this.$menu,function(){n.call(o,null,r.enable)},this.conf.transitionDuration)}),this.bind("openPanel",function(e){t.call(this,e),this.__transitionend(e,function(){n.call(o,e,r.enable)},this.conf.transitionDuration)}),this["_initWindow_"+s](r.enhance)}},add:function(){a=e[i]._c,o=e[i]._d,r=e[i]._e,a.add("tabstart tabend keyboardfocus"),r.add("focusin keydown")},clickAnchor:function(e,n){}},e[i].defaults[s]={enable:!1,enhance:!1},e[i].configuration[s]={},e[i].prototype["_initWindow_"+s]=function(n){l.$wndw.off(r.keydown+"-offCanvas"),l.$wndw.off(r.focusin+"-"+s).on(r.focusin+"-"+s,function(n){if(l.$html.hasClass(a.opened)){var t=e(n.target);t.is("."+a.tabend)&&t.parent().find("."+a.tabstart).focus()}}),l.$wndw.off(r.keydown+"-"+s).on(r.keydown+"-"+s,function(n){var t=e(n.target),i=t.closest("."+a.menu);if(i.length){i.data("mmenu");if(t.is("input, textarea"));else switch(n.keyCode){case 13:(t.is(".mm-toggle")||t.is(".mm-check"))&&t.trigger(r.click);break;case 32:case 37:case 38:case 39:case 40:n.preventDefault()}}}),n&&l.$wndw.on(r.keydown+"-"+s,function(n){var t=e(n.target),i=t.closest("."+a.menu);if(i.length){var s=i.data("mmenu");if(t.is("input, textarea"))switch(n.keyCode){case 27:t.val("")}else switch(n.keyCode){case 8:var r=t.closest("."+a.panel).data(o.parent);r&&r.length&&s.openPanel(r.closest("."+a.panel));break;case 27:i.hasClass(a.offcanvas)&&s.close()}}})};var a,o,r,l,d="input, select, textarea, button, label, a[href]"}(jQuery),/*	
 * jQuery mmenu lazySubmenus add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="lazySubmenus";e[n].addons[t]={setup:function(){var a=this.opts[t];this.conf[t];o=e[n].glbl,"boolean"==typeof a&&(a={load:a}),"object"!=typeof a&&(a={}),a=this.opts[t]=e.extend(!0,{},e[n].defaults[t],a),a.load&&(this.$menu.find("li").find("li").children(this.conf.panelNodetype).each(function(){e(this).parent().addClass(i.lazysubmenu).data(s.lazysubmenu,this).end().remove()}),this.bind("openingPanel",function(n){var t=n.find("."+i.lazysubmenu);t.length&&(t.each(function(){e(this).append(e(this).data(s.lazysubmenu)).removeData(s.lazysubmenu).removeClass(i.lazysubmenu)}),this.initPanels(n))}))},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("lazysubmenu"),s.add("lazysubmenu")},clickAnchor:function(e,n){}},e[n].defaults[t]={load:!1},e[n].configuration[t]={};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu navbar add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars";e[n].addons[t]={setup:function(){var s=this,a=this.opts[t],r=this.conf[t];if(o=e[n].glbl,"undefined"!=typeof a){a instanceof Array||(a=[a]);var l={};if(a.length){e.each(a,function(o){var d=a[o];"boolean"==typeof d&&d&&(d={}),"object"!=typeof d&&(d={}),"undefined"==typeof d.content&&(d.content=["prev","title"]),d.content instanceof Array||(d.content=[d.content]),d=e.extend(!0,{},s.opts.navbar,d);var c=d.position,h=d.height;"number"!=typeof h&&(h=1),h=Math.min(4,Math.max(1,h)),"bottom"!=c&&(c="top"),l[c]||(l[c]=0),l[c]++;var u=e("<div />").addClass(i.navbar+" "+i.navbar+"-"+c+" "+i.navbar+"-"+c+"-"+l[c]+" "+i.navbar+"-size-"+h);l[c]+=h-1;for(var f=0,p=0,v=d.content.length;p<v;p++){var m=e[n].addons[t][d.content[p]]||!1;m?f+=m.call(s,u,d,r):(m=d.content[p],m instanceof e||(m=e(d.content[p])),u.append(m))}f+=Math.ceil(u.children().not("."+i.btn).length/h),f>1&&u.addClass(i.navbar+"-content-"+f),u.children("."+i.btn).length&&u.addClass(i.hasbtns),u.prependTo(s.$menu)});for(var d in l)s.$menu.addClass(i.hasnavbar+"-"+d+"-"+l[d])}}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("close hasbtns")},clickAnchor:function(e,n){}},e[n].configuration[t]={breadcrumbSeparator:"/"},e[n].configuration.classNames[t]={};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu navbar add-on breadcrumbs content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars",i="breadcrumbs";e[n].addons[t][i]=function(t,i,s){var a=e[n]._c,o=e[n]._d;a.add("breadcrumbs separator");var r=e('<span class="'+a.breadcrumbs+'" />').appendTo(t);this.bind("initPanels",function(n){n.removeClass(a.hasnavbar).each(function(){for(var n=[],t=e(this),i=e('<span class="'+a.breadcrumbs+'"></span>'),r=e(this).children().first(),l=!0;r&&r.length;){r.is("."+a.panel)||(r=r.closest("."+a.panel));var d=r.children("."+a.navbar).children("."+a.title).text();n.unshift(l?"<span>"+d+"</span>":'<a href="#'+r.attr("id")+'">'+d+"</a>"),l=!1,r=r.data(o.parent)}i.append(n.join('<span class="'+a.separator+'">'+s.breadcrumbSeparator+"</span>")).appendTo(t.children("."+a.navbar))})});var l=function(){r.html(this.$pnls.children("."+a.current).children("."+a.navbar).children("."+a.breadcrumbs).html())};return this.bind("openPanel",l),this.bind("initPanels",l),0}}(jQuery),/*	
 * jQuery mmenu navbar add-on close content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars",i="close";e[n].addons[t][i]=function(t,i){var s=e[n]._c,a=e[n].glbl,o=e('<a class="'+s.close+" "+s.btn+'" href="#" />').appendTo(t),r=function(e){o.attr("href","#"+e.attr("id"))};return r.call(this,a.$page),this.bind("setPage",r),-1}}(jQuery),/*
 * jQuery mmenu navbar add-on next content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars",i="next";e[n].addons[t][i]=function(i,s){var a,o,r,l=e[n]._c,d=e('<a class="'+l.next+" "+l.btn+'" href="#" />').appendTo(i),c=function(e){e=e||this.$pnls.children("."+l.current);var n=e.find("."+this.conf.classNames[t].panelNext);a=n.attr("href"),r=n.attr("aria-owns"),o=n.html(),d[a?"attr":"removeAttr"]("href",a),d[r?"attr":"removeAttr"]("aria-owns",r),d[a||o?"removeClass":"addClass"](l.hidden),d.html(o)};return this.bind("openPanel",c),this.bind("initPanels",function(){c.call(this)}),-1},e[n].configuration.classNames[t].panelNext="Next"}(jQuery),/*
 * jQuery mmenu navbar add-on prev content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars",i="prev";e[n].addons[t][i]=function(i,s){var a=e[n]._c,o=e('<a class="'+a.prev+" "+a.btn+'" href="#" />').appendTo(i);this.bind("initPanels",function(e){e.removeClass(a.hasnavbar).children("."+a.navbar).addClass(a.hidden)});var r,l,d,c=function(e){if(e=e||this.$pnls.children("."+a.current),!e.hasClass(a.vertical)){var n=e.find("."+this.conf.classNames[t].panelPrev);n.length||(n=e.children("."+a.navbar).children("."+a.prev)),r=n.attr("href"),d=n.attr("aria-owns"),l=n.html(),o[r?"attr":"removeAttr"]("href",r),o[d?"attr":"removeAttr"]("aria-owns",d),o[r||l?"removeClass":"addClass"](a.hidden),o.html(l)}};return this.bind("openPanel",c),this.bind("initPanels",function(){c.call(this)}),-1},e[n].configuration.classNames[t].panelPrev="Prev"}(jQuery),/*	
 * jQuery mmenu navbar add-on searchfield content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars",i="searchfield";e[n].addons[t][i]=function(t,i){var s=e[n]._c,a=e('<div class="'+s.search+'" />').appendTo(t);return"object"!=typeof this.opts.searchfield&&(this.opts.searchfield={}),this.opts.searchfield.add=!0,this.opts.searchfield.addTo=a,0}}(jQuery),/*	
 * jQuery mmenu navbar add-on title content
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="navbars",i="title";e[n].addons[t][i]=function(i,s){var a,o,r=e[n]._c,l=e('<a class="'+r.title+'" />').appendTo(i),d=function(e){if(e=e||this.$pnls.children("."+r.current),!e.hasClass(r.vertical)){var n=e.find("."+this.conf.classNames[t].panelTitle);n.length||(n=e.children("."+r.navbar).children("."+r.title)),a=n.attr("href"),o=n.html()||s.title,l[a?"attr":"removeAttr"]("href",a),l[a||o?"removeClass":"addClass"](r.hidden),l.html(o)}};return this.bind("openPanel",d),this.bind("initPanels",function(e){d.call(this)}),0},e[n].configuration.classNames[t].panelTitle="Title"}(jQuery),/*	
 * jQuery mmenu RTL add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="rtl";e[n].addons[t]={setup:function(){var s=this.opts[t];this.conf[t];o=e[n].glbl,"object"!=typeof s&&(s={use:s}),s=this.opts[t]=e.extend(!0,{},e[n].defaults[t],s),"boolean"!=typeof s.use&&(s.use="rtl"==(o.$html.attr("dir")||"").toLowerCase()),s.use&&this.$menu.addClass(i.rtl)},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("rtl")},clickAnchor:function(e,n){}},e[n].defaults[t]={use:"detect"};var i,s,a,o}(jQuery),/*
 * jQuery mmenu screenReader add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){function n(e,n,t){e.prop("aria-"+n,t)[t?"attr":"removeAttr"]("aria-"+n,t)}function t(e){return'<span class="'+a.sronly+'">'+e+"</span>"}var i="mmenu",s="screenReader";e[i].addons[s]={setup:function(){var o=this.opts[s],r=this.conf[s];if(l=e[i].glbl,"boolean"==typeof o&&(o={aria:o,text:o}),"object"!=typeof o&&(o={}),o=this.opts[s]=e.extend(!0,{},e[i].defaults[s],o),o.aria){if(this.opts.offCanvas){var d=function(){n(this.$menu,"hidden",!1)},c=function(){n(this.$menu,"hidden",!0)};this.bind("open",d),this.bind("close",c),n(this.$menu,"hidden",!0)}var h=function(){},u=function(e){var t=this.$menu.children("."+a.navbar),i=t.children("."+a.prev),s=t.children("."+a.next),r=t.children("."+a.title);n(i,"hidden",i.is("."+a.hidden)),n(s,"hidden",s.is("."+a.hidden)),o.text&&n(r,"hidden",!i.is("."+a.hidden)),n(this.$pnls.children("."+a.panel).not(e),"hidden",!0),n(e,"hidden",!1)};this.bind("update",h),this.bind("openPanel",h),this.bind("openPanel",u);var f=function(t){var i;t=t||this.$menu;var s=t.children("."+a.navbar),r=s.children("."+a.prev),l=s.children("."+a.next);s.children("."+a.title);n(r,"haspopup",!0),n(l,"haspopup",!0),i=t.is("."+a.panel)?t.find("."+a.prev+", ."+a.next):r.add(l),i.each(function(){n(e(this),"owns",e(this).attr("href").replace("#",""))}),o.text&&t.is("."+a.panel)&&(i=t.find("."+a.listview).find("."+a.fullsubopen).parent().children("span"),n(i,"hidden",!0))};this.bind("initPanels",f),this.bind("_initAddons",f)}if(o.text){var p=function(n){var s;n=n||this.$menu;var o=n.children("."+a.navbar);o.each(function(){var n=e(this),o=e[i].i18n(r.text.closeSubmenu);s=n.children("."+a.title),s.length&&(o+=" ("+s.text()+")"),n.children("."+a.prev).html(t(o))}),o.children("."+a.close).html(t(e[i].i18n(r.text.closeMenu))),n.is("."+a.panel)&&n.find("."+a.listview).children("li").children("."+a.next).each(function(){var n=e(this),o=e[i].i18n(r.text[n.parent().is("."+a.vertical)?"toggleSubmenu":"openSubmenu"]);s=n.nextAll("span, a").first(),s.length&&(o+=" ("+s.text()+")"),n.html(t(o))})};this.bind("initPanels",p),this.bind("_initAddons",p)}},add:function(){a=e[i]._c,o=e[i]._d,r=e[i]._e,a.add("sronly")},clickAnchor:function(e,n){}},e[i].defaults[s]={aria:!1,text:!1},e[i].configuration[s]={text:{closeMenu:"Close menu",closeSubmenu:"Close submenu",openSubmenu:"Open submenu",toggleSubmenu:"Toggle submenu"}};var a,o,r,l}(jQuery),/*	
 * jQuery mmenu searchfield add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){function n(e){switch(e){case 9:case 16:case 17:case 18:case 37:case 38:case 39:case 40:return!0}return!1}var t="mmenu",i="searchfield";e[t].addons[i]={setup:function(){var l=this,d=this.opts[i],c=this.conf[i];r=e[t].glbl,"boolean"==typeof d&&(d={add:d}),"object"!=typeof d&&(d={}),"boolean"==typeof d.resultsPanel&&(d.resultsPanel={add:d.resultsPanel}),d=this.opts[i]=e.extend(!0,{},e[t].defaults[i],d),c=this.conf[i]=e.extend(!0,{},e[t].configuration[i],c),this.bind("close",function(){this.$menu.find("."+s.search).find("input").blur()}),this.bind("initPanels",function(r){if(d.add){var h;switch(d.addTo){case"panels":h=r;break;default:h=this.$menu.find(d.addTo)}if(h.each(function(){var n=e(this);if(!n.is("."+s.panel)||!n.is("."+s.vertical)){if(!n.children("."+s.search).length){var i=l.__valueOrFn(c.clear,n),a=l.__valueOrFn(c.form,n),r=l.__valueOrFn(c.input,n),h=l.__valueOrFn(c.submit,n),u=e("<"+(a?"form":"div")+' class="'+s.search+'" />'),f=e('<input placeholder="'+e[t].i18n(d.placeholder)+'" type="text" autocomplete="off" />');u.append(f);var p;if(r)for(p in r)f.attr(p,r[p]);if(i&&e('<a class="'+s.btn+" "+s.clear+'" href="#" />').appendTo(u).on(o.click+"-searchfield",function(e){e.preventDefault(),f.val("").trigger(o.keyup+"-searchfield")}),a){for(p in a)u.attr(p,a[p]);h&&!i&&e('<a class="'+s.btn+" "+s.next+'" href="#" />').appendTo(u).on(o.click+"-searchfield",function(e){e.preventDefault(),u.submit()})}n.hasClass(s.search)?n.replaceWith(u):n.prepend(u).addClass(s.hassearch)}if(d.noResults){var v=n.closest("."+s.panel).length;if(v||(n=l.$pnls.children("."+s.panel).first()),!n.children("."+s.noresultsmsg).length){var m=n.children("."+s.listview).first();e('<div class="'+s.noresultsmsg+" "+s.hidden+'" />').append(e[t].i18n(d.noResults))[m.length?"insertAfter":"prependTo"](m.length?m:n)}}}}),d.search){if(d.resultsPanel.add){d.showSubPanels=!1;var u=this.$pnls.children("."+s.resultspanel);u.length||(u=e('<div class="'+s.panel+" "+s.resultspanel+" "+s.hidden+'" />').appendTo(this.$pnls).append('<div class="'+s.navbar+" "+s.hidden+'"><a class="'+s.title+'">'+e[t].i18n(d.resultsPanel.title)+"</a></div>").append('<ul class="'+s.listview+'" />').append(this.$pnls.find("."+s.noresultsmsg).first().clone()),this.initPanels(u))}this.$menu.find("."+s.search).each(function(){var t,r,c=e(this),h=c.closest("."+s.panel).length;h?(t=c.closest("."+s.panel),r=t):(t=e("."+s.panel,l.$menu),r=l.$menu),d.resultsPanel.add&&(t=t.not(u));var f=c.children("input"),p=l.__findAddBack(t,"."+s.listview).children("li"),v=p.filter("."+s.divider),m=l.__filterListItems(p),g="a",b=g+", span",_="",C=function(){var n=f.val().toLowerCase();if(n!=_){if(_=n,d.resultsPanel.add&&u.children("."+s.listview).empty(),t.scrollTop(0),m.add(v).addClass(s.hidden).find("."+s.fullsubopensearch).removeClass(s.fullsubopen+" "+s.fullsubopensearch),m.each(function(){var n=e(this),t=g;(d.showTextItems||d.showSubPanels&&n.find("."+s.next))&&(t=b);var i=n.data(a.searchtext)||n.children(t).text();i.toLowerCase().indexOf(_)>-1&&n.add(n.prevAll("."+s.divider).first()).removeClass(s.hidden)}),d.showSubPanels&&t.each(function(n){var t=e(this);l.__filterListItems(t.find("."+s.listview).children()).each(function(){var n=e(this),t=n.data(a.child);n.removeClass(s.nosubresults),t&&t.find("."+s.listview).children().removeClass(s.hidden)})}),d.resultsPanel.add)if(""===_)this.closeAllPanels(),this.openPanel(this.$pnls.children("."+s.subopened).last());else{var i=e();t.each(function(){var n=l.__filterListItems(e(this).find("."+s.listview).children()).not("."+s.hidden).clone(!0);n.length&&(d.resultsPanel.dividers&&(i=i.add('<li class="'+s.divider+'">'+e(this).children("."+s.navbar).text()+"</li>")),i=i.add(n))}),i.find("."+s.next).remove(),u.children("."+s.listview).append(i),this.openPanel(u)}else e(t.get().reverse()).each(function(n){var t=e(this),i=t.data(a.parent);i&&(l.__filterListItems(t.find("."+s.listview).children()).length?(i.hasClass(s.hidden)&&i.children("."+s.next).not("."+s.fullsubopen).addClass(s.fullsubopen).addClass(s.fullsubopensearch),i.removeClass(s.hidden).removeClass(s.nosubresults).prevAll("."+s.divider).first().removeClass(s.hidden)):h||(t.hasClass(s.opened)&&setTimeout(function(){l.openPanel(i.closest("."+s.panel))},(n+1)*(1.5*l.conf.openingInterval)),i.addClass(s.nosubresults)))});r.find("."+s.noresultsmsg)[m.not("."+s.hidden).length?"addClass":"removeClass"](s.hidden),this.update()}};f.off(o.keyup+"-"+i+" "+o.change+"-"+i).on(o.keyup+"-"+i,function(e){n(e.keyCode)||C.call(l)}).on(o.change+"-"+i,function(e){C.call(l)});var y=c.children("."+s.btn);y.length&&f.on(o.keyup+"-"+i,function(e){y[f.val().length?"removeClass":"addClass"](s.hidden)}),f.trigger(o.keyup+"-"+i)})}}})},add:function(){s=e[t]._c,a=e[t]._d,o=e[t]._e,s.add("clear search hassearch resultspanel noresultsmsg noresults nosubresults fullsubopensearch"),a.add("searchtext"),o.add("change keyup")},clickAnchor:function(e,n){}},e[t].defaults[i]={add:!1,addTo:"panels",placeholder:"Search",noResults:"No results found.",resultsPanel:{add:!1,dividers:!0,title:"Search results"},search:!0,showTextItems:!1,showSubPanels:!0},e[t].configuration[i]={clear:!1,form:!1,input:!1,submit:!1};var s,a,o,r}(jQuery),/*	
 * jQuery mmenu sectionIndexer add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="sectionIndexer";e[n].addons[t]={setup:function(){var s=this,r=this.opts[t];this.conf[t];o=e[n].glbl,"boolean"==typeof r&&(r={add:r}),"object"!=typeof r&&(r={}),r=this.opts[t]=e.extend(!0,{},e[n].defaults[t],r),this.bind("initPanels",function(n){if(r.add){var t;switch(r.addTo){case"panels":t=n;break;default:t=e(r.addTo,this.$menu).filter("."+i.panel)}t.find("."+i.divider).closest("."+i.panel).addClass(i.hasindexer)}if(!this.$indexer&&this.$pnls.children("."+i.hasindexer).length){this.$indexer=e('<div class="'+i.indexer+'" />').prependTo(this.$pnls).append('<a href="#a">a</a><a href="#b">b</a><a href="#c">c</a><a href="#d">d</a><a href="#e">e</a><a href="#f">f</a><a href="#g">g</a><a href="#h">h</a><a href="#i">i</a><a href="#j">j</a><a href="#k">k</a><a href="#l">l</a><a href="#m">m</a><a href="#n">n</a><a href="#o">o</a><a href="#p">p</a><a href="#q">q</a><a href="#r">r</a><a href="#s">s</a><a href="#t">t</a><a href="#u">u</a><a href="#v">v</a><a href="#w">w</a><a href="#x">x</a><a href="#y">y</a><a href="#z">z</a>'),this.$indexer.children().on(a.mouseover+"-sectionindexer "+i.touchstart+"-sectionindexer",function(n){var t=e(this).attr("href").slice(1),a=s.$pnls.children("."+i.current),o=a.find("."+i.listview),r=!1,l=a.scrollTop();a.scrollTop(0),o.children("."+i.divider).not("."+i.hidden).each(function(){r===!1&&t==e(this).text().slice(0,1).toLowerCase()&&(r=e(this).position().top)}),a.scrollTop(r!==!1?r:l)});var o=function(e){s.$menu[(e.hasClass(i.hasindexer)?"add":"remove")+"Class"](i.hasindexer)};this.bind("openPanel",o),o.call(this,this.$pnls.children("."+i.current))}})},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("indexer hasindexer"),a.add("mouseover touchstart")},clickAnchor:function(e,n){if(e.parent().is("."+i.indexer))return!0}},e[n].defaults[t]={add:!1,addTo:"panels"};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu setSelected add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="setSelected";e[n].addons[t]={setup:function(){var a=this,r=this.opts[t];this.conf[t];if(o=e[n].glbl,"boolean"==typeof r&&(r={hover:r,parent:r}),"object"!=typeof r&&(r={}),r=this.opts[t]=e.extend(!0,{},e[n].defaults[t],r),"detect"==r.current){var l=function(e){e=e.split("?")[0].split("#")[0];var n=a.$menu.find('a[href="'+e+'"], a[href="'+e+'/"]');n.length?a.setSelected(n.parent(),!0):(e=e.split("/").slice(0,-1),e.length&&l(e.join("/")))};l(window.location.href)}else r.current||this.bind("initPanels",function(e){e.find("."+i.listview).children("."+i.selected).removeClass(i.selected)});if(r.hover&&this.$menu.addClass(i.hoverselected),r.parent){this.$menu.addClass(i.parentselected);var d=function(e){this.$pnls.find("."+i.listview).find("."+i.next).removeClass(i.selected);for(var n=e.data(s.parent);n&&n.length;)n=n.not("."+i.vertical).children("."+i.next).addClass(i.selected).end().closest("."+i.panel).data(s.parent)};this.bind("openedPanel",d),this.bind("initPanels",function(e){d.call(this,this.$pnls.children("."+i.current))})}},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("hoverselected parentselected")},clickAnchor:function(e,n){}},e[n].defaults[t]={current:!0,hover:!1,parent:!1};var i,s,a,o}(jQuery),/*	
 * jQuery mmenu toggles add-on
 * mmenu.frebsite.nl
 *
 * Copyright (c) Fred Heusschen
 */
function(e){var n="mmenu",t="toggles";e[n].addons[t]={setup:function(){var s=this;this.opts[t],this.conf[t];o=e[n].glbl,this.bind("initPanels",function(n){this.__refactorClass(e("input",n),this.conf.classNames[t].toggle,"toggle"),this.__refactorClass(e("input",n),this.conf.classNames[t].check,"check"),e("input."+i.toggle+", input."+i.check,n).each(function(){var n=e(this),t=n.closest("li"),a=n.hasClass(i.toggle)?"toggle":"check",o=n.attr("id")||s.__getUniqueId();t.children('label[for="'+o+'"]').length||(n.attr("id",o),t.prepend(n),e('<label for="'+o+'" class="'+i[a]+'"></label>').insertBefore(t.children("a, span").last()))})})},add:function(){i=e[n]._c,s=e[n]._d,a=e[n]._e,i.add("toggle check")},clickAnchor:function(e,n){}},e[n].configuration.classNames[t]={toggle:"Toggle",check:"Check"};var i,s,a,o}(jQuery);;
;
;
