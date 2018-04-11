/**
 * @file
 * Drupal behaviour to controll exposure of advanced search.
 */

(function ($, Drupal, window, document, undefined) {
Drupal.behaviors.search_hide_show = {
  attach: function(context, settings) {
    $(window).load(function() {
      $('.adv_search').click(function(e){
        e.preventDefault();
        $('#block-islandora-solr-advanced').toggle();
      });
    });
  }
};
})(jQuery, Drupal, this, this.document);
