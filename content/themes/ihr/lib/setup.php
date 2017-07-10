<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');


  add_image_size( 'large', 1220, 686, true );
  add_image_size( 'medium_large', 900, 506, true );
  add_image_size( 'medium', 450, 253, true );
  add_image_size( 'thumbnail', 290, 163, true );

/*
  supplied size:
  1220x686

  blog feature/single:
  610x343

  feature page size:
  450x253

  blog thumbs:
  290x163


  mobile: 300x169
  */

//need these because srcset uses them
  update_option( 'large_size_w', 1220 );
  update_option( 'large_size_h', 686 );

  update_option( 'medium_size_w', 450 );
  update_option( 'medium_size_h', 253 );

  update_option( 'thumbnail_size_w', 290 );
  update_option( 'thumbnail_size_h', 163 );



  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  //add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'topbar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');


/**
 * Theme assets
 */
// Async load
function mozilla_async_scripts($url) {
  if ( strpos( $url, '#asyncload') === false ) {
    return $url;
  } else if (is_admin()) {
    return str_replace( '#asyncload', '', $url );
  } else {
    return str_replace( '#asyncload', '', $url )."' async='async";
  }
}
add_filter( 'clean_url', __NAMESPACE__ . '\\mozilla_async_scripts', 11, 1 );


function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  // Disable wpDiscuz stylesheet
  wp_dequeue_style('wpdiscuz-frontend-css');
  wp_deregister_style('wpdiscuz-frontend-css');


  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);

  if (is_single()) {
    wp_enqueue_script( 'hypothesis', 'https://hypothes.is/embed.js#asyncload', '', '', true);
  }

   //creates ihr.ajaxurl variable that's used in main.js
  wp_localize_script('sage/js', 'ihr', apply_filters('sage_localize_script', array()));

}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);





function add_opengraph_doctype( $output ) {
  return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', __NAMESPACE__ . '\\add_opengraph_doctype');

function insert_og_tags_in_head() {
  global $post;
  if (!is_singular()) { return; }

  echo '<meta name="twitter:card" content="summary_large_image" />';
  echo '<meta name="twitter:site" content="@mozilla" />';
  echo '<meta property="twitter:title" content="' . get_the_title() . '"/>';
  echo '<meta property="twitter:description" content="' . get_bloginfo('description') . '"/>';

  echo '<meta property="og:title" content="' . get_the_title() . '"/>';
  echo '<meta property="og:type" content="website"/>';
  echo '<meta property="og:url" content="' . get_permalink() . '"/>';
  echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';

  if (!has_post_thumbnail( $post->ID )) {
    /*
    $front_page_ID = get_option( 'page_on_front' );
    if(function_exists('get_field')) {
      $shareImage = get_field('share_image', $front_page_ID);
    }

    if ($shareImage) {
      $default_image = $shareImage;
    } else {
    }
    */
    $default_image = get_template_directory_uri() . '/dist/images/internet-health-report.jpg';

    echo '<meta property="og:image" content="' . $default_image . '"/>';
    echo '<meta property="twitter:image" content="' . $default_image . '"/>';
  } else {
    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    echo '<meta property="twitter:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
  }

  echo "";
}
add_action( 'wp_head', __NAMESPACE__ . '\\insert_og_tags_in_head', 5 );