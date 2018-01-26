// Window load rather than document ready, document ready did not produce the
// correct height, due to fonts not being rendered, etc.
jQuery(window).load(
  function () {
    set_uniform_height();
  }
);

// Change the height on resize (debounced).
var resize_timer;
jQuery(window).resize(
  function () {
    clearTimeout(resize_timer);
    resize_timer = setTimeout(set_uniform_height, 250);
  }
);

function set_uniform_height() {
  var threshold = parseInt(jQuery("body").css("font-size")) * 56.7;

  // loop these blocks and determine/set uniform height.
  var blocks = ['block-views-repository-items-front-page-bra', 'block-views-repository-items-front-page-bmd'];
  for (var i = 0; i < blocks.length; i++) {

    // Restore the height before resizing.
    if (jQuery('#' + blocks[i]).hasClass('uniform_height_processed')) {
      
      // Restore the height on all boxes.
      jQuery('#' + blocks[i] + ' .views-row').each(
        function () {
          jQuery(this).css('height', 'auto');
        }
      );

      jQuery('#' + blocks[i]).removeClass('uniform_height_processed');
    }

    // Desktop
    if (jQuery(window).innerWidth() > threshold) {

      // Determine tallest box.
      var max_height = 0;
      jQuery('#' + blocks[i] + ' .views-row').each(
        function () {
          if (jQuery(this).outerHeight() > max_height) {
            max_height = jQuery(this).outerHeight();
          }
        }
      );

      // Set the height on all boxes.
      jQuery('#' + blocks[i] + ' .views-row').each(
        function () {
          jQuery(this).height(max_height);
        }
      );

      jQuery('#' + blocks[i]).addClass('uniform_height_processed');
    }
  }
}
