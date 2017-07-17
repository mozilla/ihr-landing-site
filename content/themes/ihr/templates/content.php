<article class="entry-container">

	<?php if (has_post_thumbnail()): ?>
	    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
	<?php endif; ?>
	
    <div class="entry-copy">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php get_template_part('templates/entry-meta'); ?>
	</div>

</article>