<?php while (have_posts()) : the_post(); ?>


	<article class="single-post-container">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>

		<?php the_post_thumbnail('medium_large'); ?>
		<?php if (get_field('feature_caption')): ?>
			<p class="wp-caption-text"><?php the_field('feature_caption'); ?></p>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>

			<div class="share mobile-share">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share__btn js-social-share"><span class="share__text">Share</span><span class="share__icon"><svg xmlns="http://www.w3.org/2000/svg" width="15.07" height="15.07" viewBox="0 0 15.07 15.07"><title>icon-facebook</title><path d="M14.24,0H.83A.83.83,0,0,0,0,.83V14.24a.83.83,0,0,0,.83.83H8V9.23h-2V7H8V5.28a2.74,2.74,0,0,1,2.93-3,16.05,16.05,0,0,1,1.75.09v2H11.52c-.94,0-1.13.45-1.13,1.11V7h2.25l-.29,2.28h-2v5.84h3.84a.83.83,0,0,0,.83-.83V.83A.83.83,0,0,0,14.24,0" fill="#8c8c8c"></path></svg></span></a>

				<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank" class="share__btn js-social-share"><span class="share__text">Tweet</span><span class="share__icon"><svg xmlns="http://www.w3.org/2000/svg" width="17.05" height="13.85" viewBox="0 0 17.05 13.85"><title>icon-twitter</title><path d="M17,1.64a7.05,7.05,0,0,1-2,.55A3.51,3.51,0,0,0,16.57.26a7,7,0,0,1-2.22.85,3.5,3.5,0,0,0-6,2.39,3.58,3.58,0,0,0,.09.8A9.94,9.94,0,0,1,1.19.64,3.45,3.45,0,0,0,.71,2.4,3.5,3.5,0,0,0,2.27,5.31,3.49,3.49,0,0,1,.68,4.87v0A3.5,3.5,0,0,0,3.49,8.35a3.54,3.54,0,0,1-1.58.06,3.5,3.5,0,0,0,3.27,2.43,7,7,0,0,1-4.34,1.5,7.19,7.19,0,0,1-.83,0,9.91,9.91,0,0,0,5.36,1.57,9.88,9.88,0,0,0,10-9.95c0-.15,0-.3,0-.45A7.11,7.11,0,0,0,17,1.64Z" fill="#8c8c8c"></path></svg></span></a>
			</div>

		</div>



		<?php //pulled from existing site ?>
		<div class="share js-share">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share__btn js-social-share"><span class="share__text">Share</span><span class="share__icon"><svg xmlns="http://www.w3.org/2000/svg" width="15.07" height="15.07" viewBox="0 0 15.07 15.07"><title>icon-facebook</title><path d="M14.24,0H.83A.83.83,0,0,0,0,.83V14.24a.83.83,0,0,0,.83.83H8V9.23h-2V7H8V5.28a2.74,2.74,0,0,1,2.93-3,16.05,16.05,0,0,1,1.75.09v2H11.52c-.94,0-1.13.45-1.13,1.11V7h2.25l-.29,2.28h-2v5.84h3.84a.83.83,0,0,0,.83-.83V.83A.83.83,0,0,0,14.24,0" fill="#8c8c8c"></path></svg></span></a>

			<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank" class="share__btn js-social-share"><span class="share__text">Tweet</span><span class="share__icon"><svg xmlns="http://www.w3.org/2000/svg" width="17.05" height="13.85" viewBox="0 0 17.05 13.85"><title>icon-twitter</title><path d="M17,1.64a7.05,7.05,0,0,1-2,.55A3.51,3.51,0,0,0,16.57.26a7,7,0,0,1-2.22.85,3.5,3.5,0,0,0-6,2.39,3.58,3.58,0,0,0,.09.8A9.94,9.94,0,0,1,1.19.64,3.45,3.45,0,0,0,.71,2.4,3.5,3.5,0,0,0,2.27,5.31,3.49,3.49,0,0,1,.68,4.87v0A3.5,3.5,0,0,0,3.49,8.35a3.54,3.54,0,0,1-1.58.06,3.5,3.5,0,0,0,3.27,2.43,7,7,0,0,1-4.34,1.5,7.19,7.19,0,0,1-.83,0,9.91,9.91,0,0,0,5.36,1.57,9.88,9.88,0,0,0,10-9.95c0-.15,0-.3,0-.45A7.11,7.11,0,0,0,17,1.64Z" fill="#8c8c8c"></path></svg></span></a>
		</div>



	</article>





<div class="single-post-extras">
	<?php

	$args = array(
				'posts_per_page'=>3,
				'category__in' => wp_get_post_categories($post->ID), 
				'post__not_in' => array($post->ID)
				);

	$post_objects = get_posts($args);
	global $hideCommentLink;
	$hideCommentLink = true;
	if( $post_objects ): ?>

		<div class="featured-blog-posts">

			<h3 class="bar">related posts</h3>

			<?php 
			//only add slick wrapper if there is more than one post
			echo (count($post_objects) > 1 ? '<div class="slick-posts">' : ''); ?>
			<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				
				<?php get_template_part('templates/content'); ?>


			<?php endforeach; ?>
			<?php echo (count($post_objects) > 1 ? '</div>' : ''); ?>
		
		</div>



		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	<?php endif;
	?>



	<?php comments_template('/templates/comments.php'); ?>

</div>

<?php endwhile; ?>