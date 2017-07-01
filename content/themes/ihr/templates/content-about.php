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



<h3 class="bar">archive of reports</h3>
<div class="feature-pages">

	
		<div class="feature">

				<a href="" target="_blank"><div class="year">2017</div>
				<img width="450" height="253" src="//localhost:3000/content/uploads/2017/06/report-1-450x253.jpg" class="attachment-medium size-medium" alt="" srcset="//localhost:3000/content/uploads/2017/06/report-1-450x253.jpg 450w, //localhost:3000/content/uploads/2017/06/report-1-290x163.jpg 290w, //localhost:3000/content/uploads/2017/06/report-1-900x506.jpg 900w, //localhost:3000/content/uploads/2017/06/report-1.jpg 1220w" sizes="(max-width: 450px) 100vw, 450px">				</a>
			
			<div class="copy">

				<h2><a href="" target="_blank">Read our entire Report v0.1</a></h2>
				<p>Welcome to our new open source initiative to document and explain what’s happening to the health of the Internet combining research from multiple sources.</p>
			</div>
			<a class="read-more button" href="" target="_blank">Read report</a>

		</div>

	
		<div class="feature right">

				<a href=""><div class="year">2016</div>
				<img width="450" height="253" src="//localhost:3000/content/uploads/2017/06/feedback-450x253.jpg" class="attachment-medium size-medium" alt="" srcset="//localhost:3000/content/uploads/2017/06/feedback-450x253.jpg 450w, //localhost:3000/content/uploads/2017/06/feedback-290x163.jpg 290w, //localhost:3000/content/uploads/2017/06/feedback.jpg 900w" sizes="(max-width: 450px) 100vw, 450px">				</a>
			
			<div class="copy">

				<h2><a href="">Help us pick indicators for the next Report</a></h2>
				<p>By documenting and explaining what is healthy, as well as unhealthy, we can take positive steps around the world to make it better. </p>
			</div>
			<a class="read-more button" href="">See indicators</a>

		</div>

	
</div>