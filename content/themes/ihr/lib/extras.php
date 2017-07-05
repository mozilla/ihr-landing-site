<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



/**
 * Add localized scripts
 */
function localize_scripts($localize) {
  global $post;
  $localize['ajaxurl'] = admin_url( 'admin-ajax.php');
  $localize['post_id'] = (isset($post->ID) ? $post->ID : null);

  return $localize;
}
add_filter('sage_localize_script',  __NAMESPACE__ . '\\localize_scripts');





/**
 * Load Posts - returns string of html markup
 **/
function load_posts( $topics_filter='', $offset=0 ) {


  $postsPerPage = 10;


  $topics_filter = ($topics_filter ? basename($topics_filter) : '');
  if ($topics_filter == 'blog'){
    $topics_filter = '';
  }


  $post_args = array(
    'post_type' => array('post'),
    'posts_per_page' => $postsPerPage,
    'offset' => $offset,
    'post_status' => 'publish',
    //'post__not_in' => $priorityArticles,
    //'tax_query' => $tax_query,
    'category_name' => $topics_filter
  );
  $the_query = new \WP_Query($post_args);

  if($the_query->have_posts()):


    while($the_query->have_posts()) : $the_query->the_post();
      
      get_template_part('templates/content'); 

    ?>


    <?php
    endwhile;
    wp_reset_postdata();

  endif;

}
