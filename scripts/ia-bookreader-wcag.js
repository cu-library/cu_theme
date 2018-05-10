/**
 * @file
 * Drupal behaviour to add WCAG Requirements to slider handles.
 */

(function ($, Drupal, window, document, undefined) {
Drupal.behaviors.iabook_wcag = {
  attach: function(context, settings) {
    $(window).load(function() {
//      $('.ui-slider-handle').each(function(e){
//        $(this).attr('aria-label', "Book Slider Handle");
//      });
    });
  }
};
})(jQuery, Drupal, this, this.document);
