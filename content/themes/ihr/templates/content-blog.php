<div class="blog">

<?php
$post_objects = get_field('feature_posts');

if( $post_objects ): ?>

	<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>

	<div class="featured-post">
		<div class="cell">
			<?php the_post_thumbnail('medium_large'); ?>

			<div class="copy">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php get_template_part('templates/entry-meta'); ?>
			

			<p><?php the_excerpt(); ?></p>
			


			</div>
		</div>

	</div>

	<?php endforeach; ?>

	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;
?>



<div class="blog-filter-container">

	<ul class="blog-filters" id="blog-filters">
	<?php
		$args = array(
			'current_category'    => 0,
			'echo'                => 1,
			'hide_empty'          => 0,
			'show_option_all'     => __( 'Most recent'),
			'title_li'            => '',
			'use_desc_for_title'  => 1,
		);
		wp_list_categories($args);

	?>
	</ul>


	<form role="search" method="get" class="search-form" action="/">
		<input type="hidden" value="post" name="post_type" id="post_type" />
		<input type="search" class="search-field" value="" name="s">
		<button type="submit" class="search-submit" value="Search"><span class="icon-search"></span></button>
	</form>

</div>

<?php

//$args = array('post__not_in' => array( 25 ));

$args = array('posts_per_page'=>10);

$post_objects = get_posts($args);


if( $post_objects ): ?>

	<div class="featured-blog-posts" id="posts-wrap">

		<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			
			<?php get_template_part('templates/content'); ?>


		<?php endforeach; ?>

	
	</div>

	<div class="loader">
		<div class="read-more load-more">Load more blog posts</div>
		<div class="spinner"></div>
	</div>
	


	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;
?>








</div>

