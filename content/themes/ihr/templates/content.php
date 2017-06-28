<article class="entry-container">

    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>

    <div class="entry-copy">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php get_template_part('templates/entry-meta'); ?>
	</div>

</article>