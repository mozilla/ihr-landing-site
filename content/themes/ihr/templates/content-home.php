<div class="home-about">


<div class="hero" style="background-image:url(<?php the_field('hero_background'); ?>)">
	<div class="cell">
		<div class="copy">
		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>
		

		<a class="read-more" href="/about/"><?php _e('Read More'); ?></a>
		</div>
	</div>

</div>




<?php
if( have_rows('feature_pages') ): ?>

<div class="feature-pages underline">

	<?php
	$i=1;

	while ( have_rows('feature_pages') ) : the_row();    
	?>

		<div class="feature<?php echo ($i%2 == 0 ? ' right' : '');?>">

			<?php
			$image = get_sub_field('image');
			$size = 'medium';

			if( !empty($image) ) { ?>
				<a href="<?php the_sub_field('link'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>>
				<?php echo wp_get_attachment_image( $image, $size ); ?>
				</a>
			<?php
			}
			?>

			<div class="copy">

				<h2><a href="<?php the_sub_field('link'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>><?php the_sub_field('title'); ?></a></h2>
				<p><?php the_sub_field('excerpt'); ?></p>
			</div>
			<a class="read-more button" href="<?php the_sub_field('link'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>><?php the_sub_field('cta_text'); ?></a>

		</div>

	<?php
	$i++;
	endwhile;
	?>

</div>

<?php
endif;
?>





<?php
$post_objects = get_field('feature_posts');

if( $post_objects ): ?>

	<div class="featured-blog-posts">

		<h3 class="bar"><?php _e('featured blog posts'); ?></h3>

		<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			
			<?php get_template_part('templates/content'); ?>

		<?php endforeach; ?>

		<a class="read-more" href="/blog/"><?php _e('View all blog posts'); ?></a>

	</div>


	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;
?>








</div>

