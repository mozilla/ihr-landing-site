<?php
/**
 * Template Name: No Title Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page-no-title'); ?>
<?php endwhile; ?>
