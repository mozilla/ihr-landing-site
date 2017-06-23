<div class="home-about">


<div class="hero" style="background-image:url(<?php the_field('hero_background'); ?>)">
	<div class="cell">
		<div class="copy">
		<h1>Internet Health Report</h1>

		<?php //the_content(); ?>
		<p>An open source initiative to document and explain what’s happening to the health of the Internet combining research from multiple sources.</p>
		

		<a class="read-more" href="">Read More</a>
		</div>
	</div>

</div>




<?php
if( have_rows('feature_pages') ): ?>

<div class="feature-pages">

	<?php
    while ( have_rows('feature_pages') ) : the_row(); ?>

		<div class="feature">

			<?php
			$image = get_sub_field('image');
			$size = 'medium';

			if( !empty($image) ) {

				echo wp_get_attachment_image( $image, $size );
			}
			?>

			<div class="copy">

				<h2><?php the_sub_field('title'); ?></h2>
				<p><?php the_sub_field('excerpt'); ?></p>
				<a class="read-more button" href="<?php the_sub_field('url'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>><?php the_sub_field('cta_text'); ?></a>
			</div>

		</div>

	<?php
    endwhile;
	?>

</div>

<?php
endif;
?>



</div>

