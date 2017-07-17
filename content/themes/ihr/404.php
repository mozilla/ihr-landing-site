<?php
use Roots\Sage\Assets;
?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="hero error-404" style="background-image:url(<?php echo Assets\asset_path('images/404.jpg'); ?>)">
	<div class="cell">
		<div class="copy">
		<h1><?php _e('Uh Oh!','ihr'); ?></h1>

		<p><?php _e('Sorry, the page does not exist.','ihr'); ?></p>
		

		<a class="read-more" href="/"><?php _e('Go to home page','ihr'); ?></a>
		</div>
	</div>

</div>