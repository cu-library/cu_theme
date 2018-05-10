<?php

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 *
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "adaptivetheme_subtheme" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "adaptivetheme_subtheme".
 * 2. Uncomment the required function to use.
 */

function cu_theme_islandora_solr_display_manager_alter(&$variables) {
  // Move the sort block to the end of the array.
  $sort = $variables['islandora_toolbar']['sort'];
  unset($variables['islandora_toolbar']['sort']);
  $variables['islandora_toolbar']['sort'] = $sort;

  // Instead of plain text, add a fontello icon to represent enhanced grid.
  $variables['islandora_toolbar']['display_lists']['#markup']
    = str_replace(
      "Enhanced Grid",
      "<i class='icon-th-large'></i>",
      $variables['islandora_toolbar']['display_lists']['#markup']
  );
}

/**
 * Implements theme_islandora_solr_facet_wrapper().
 */
function cu_theme_islandora_solr_facet_wrapper($variables) {
  $new_id = drupal_html_id('checkbox_toggle');
  $output = '<div class="islandora-solr-facet-wrapper">';
  $output .= '<input id="' . $new_id . '" type="checkbox" />
  <h3><label class="accordion" for="' . $new_id . '">' . $variables['title'] . '</label></h3>';
  $output .= $variables['content'];
  $output .= '</div>';
  return $output;
}

/**
 * Implements preprocess_islandora_solr_facet().
 */
function cu_theme_preprocess_islandora_solr_facet(&$variables) {
  foreach ($variables['buckets'] as $key => &$bucket) {
    $bucket['link_plus'] = str_replace('class="plus">+', 'class="plus" aria-label="Add"><i title="plus-circled" class="icon icon-plus-circled plus-circled" aria-hidden="true"></i>', $bucket['link_plus']);
    $bucket['link_minus'] = str_replace('class="minus">-', 'class="plus" aria-label="Remove"><i title="minus-circled" class="icon icon-minus-circled minus-circled" aria-hidden="true"></i>', $bucket['link_minus']);
  }
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function cu_theme_form_islandora_solr_simple_search_form_alter(&$form, &$form_state) {
  $form['simple']['islandora_simple_search_query']['#title_display'] = 'invisible';
  $form['simple']['islandora_simple_search_query']['#attributes']['placeholder'] = t('Search');

  $link = array(
    '#markup' => l(
      t("Advanced Search"),
      "#",
      array(
        'attributes' => array('class' => array('adv_search')),
      )
    ),
  );
  $form['simple']['advanced_link'] = $link;
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function cu_theme_form_islandora_bookmark_fedora_repository_object_form_alter(&$form, &$form_state) {
  if ($form['islandora_bookmark']['title']) {
    unset($form['islandora_bookmark']['title']);
  }

  if ($form['islandora_bookmark']['add_bookmarks']) {
    $form['islandora_bookmark']['add_bookmarks']['#title']
      = t('Add Bookmark');
    $form['islandora_bookmark']['add_bookmarks']['#title_display']
      = 'invisible';
  }
}

/**
 * Implements hook_js_alter().
 */
function cu_theme_js_alter(&$javascript) {
  $path = drupal_get_path('theme',$GLOBALS['theme']);

  if (isset($javascript['sites/all/modules/islandora_solr_search/js/islandora_solr_facets.js'])){
    $javascript['sites/all/modules/islandora_solr_search/js/islandora_solr_facets.js']['data'] =
    "$path/scripts/islandora_solr_facets.js";
  }
}
