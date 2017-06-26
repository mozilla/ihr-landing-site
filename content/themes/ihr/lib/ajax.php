<?php

namespace Roots\Sage\Ajax;

use Roots\Sage\Extras;
//use Roots\Sage\Assets;


/**
 * Load Posts Ajax Functions
 */

function ajax_load_posts() {
  $topics_filter  = $_GET['topics_filter'];
  $offset  = $_GET['post_offset'];
  Extras\load_posts( $topics_filter, $offset);
  die();
}
add_action('wp_ajax_nopriv_ajax_load_posts', __NAMESPACE__ . '\\ajax_load_posts');
add_action('wp_ajax_ajax_load_posts', __NAMESPACE__ . '\\ajax_load_posts');

?>