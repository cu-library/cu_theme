/**
 * @file
 * Drupal behaviour to controll column height of front page views.
 */

(function ($, Drupal, window, document, undefined) {
Drupal.behaviors.matchHeight = {
  attach: function(context, settings) {
    $(window).load(function() {
      $('.match-height').matchHeight();
      $('.footer-trip .region').matchHeight();
      $('.footer-trip .block-title').matchHeight();
    });
  }
};
})(jQuery, Drupal, this, this.document);