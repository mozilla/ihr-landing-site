<article class="single-post-container">

	<h1 class="entry-title"><?php the_title(); ?></h1>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<?php if (get_field('sign_up')): ?>

	<a class="read-more" href="<?php the_field('sign_up_url'); ?>"><?php the_field('sign_up'); ?></a>

	<?php endif; ?>



<?php
if( have_rows('road_map_items') ): ?>

	<div class="roadmap-container">

		<h2><?php the_field('road_map_title'); ?></h2>

		<div class="roadmap">
 	
		<?php
		$i = 0;
		$my_fields = get_field_object('road_map_items');
		$count = (count($my_fields['value']));

		while ( have_rows('road_map_items') ) : the_row(); 

			$currentClass = '';
			if ($i==0){
				$currentClass = ' first';
				
			}else if($i==$count-1){
				$currentClass = ' last';
				
			}

			?>


			<div class="roadmap-item<?php echo $currentClass; ?><?php echo (get_sub_field('is_selected') ? ' selected' : ''); ?>">
				<div class="date"><?php the_sub_field('date'); ?></div>
				<div class="copy"><div><?php the_sub_field('copy'); ?></div></div>
			</div>

		<?php 
		$i++;
		endwhile; ?>
		</div>

	</div>

<?php 
endif; ?>

	<?php if (get_field('extra_content')): ?>
		<div class="entry-content">
			<?php the_field('extra_content'); ?>
		</div>
	<?php endif; ?>

</article>



<?php
if( have_rows('feature_reports') ): ?>

<h3 class="bar">archive of reports</h3>



	<?php
	$i=1;
	$my_fields = get_field_object('feature_reports');
	$count = (count($my_fields['value']));

	while ( have_rows('feature_reports') ) : the_row();
	
	if ($i%2 == 1){ ?>

	<div class="feature-pages">

	<?php
	}
	?>

		<div class="feature<?php echo ($i%2 == 0 ? ' right' : '');?>">

			<?php
			$image = get_sub_field('image');
			$size = 'medium';

			if( !empty($image) ) { ?>
				<a href="<?php the_sub_field('url'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>>
				<?php if (get_sub_field('year')): ?>
					<div class="year"><?php the_sub_field('year'); ?></div>
				<?php endif; ?>
				<?php echo wp_get_attachment_image( $image, $size ); ?>
				</a>
			<?php
			}
			?>

			<div class="copy">

				<h2><a href="<?php the_sub_field('url'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>><?php the_sub_field('title'); ?></a></h2>
				<p><?php the_sub_field('excerpt'); ?></p>
			</div>
			<a class="read-more button" href="<?php the_sub_field('url'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>><?php the_sub_field('cta_text'); ?></a>

		</div>

	<?php

	if ($i%2 == 0 || $count == $i){ ?>

	</div>

	<?php
	}

	$i++;
	endwhile;
	?>

</div>

<?php
endif;
?>