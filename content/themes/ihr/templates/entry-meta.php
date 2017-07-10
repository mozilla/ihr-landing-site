<?php			
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	

	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date()
	);


	$categories = get_the_category();
	$separator = ' ';
	$category_list = '';
	if ( ! empty( $categories ) ) {
	    foreach( $categories as $category ) {
	        $category_list .= '<span><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></span>' . $separator;
	        //$category_list .= '<span>' . esc_html( $category->name ) . '</span>' . $separator;
	    }
	}

?>

<div class="entry-meta">
	<span class="cat"><?php echo trim( $category_list, $separator ); ?></span> <span class="pipe">|</span> 
	<span class="byline"><span class="author vcard"><?php echo get_the_author(); ?></span></span> <span class="pipe">|</span> 
	<?php echo $time_string; 
	//<time class="entry-date published" datetime="2008-10-17T04:33:51+00:00">October 17, 2008</time>?>
	<?php
	global $hideCommentLink;//only set on related posts on single page
	if (is_single() && $hideCommentLink !== true){
		?>
		 <span class="pipe">|</span>
		<a class="annotations-link" href="#"><?php _e('annotations','ihr'); ?></a>
		 <span class="pipe">|</span>
		<a class="comments-link" href="#<?php //comments_link(); ?>">
		<?php
		comments_number( 'comments', 'one comment', '% comments' ); ?>
		</a>
		<?php
	}
	?>
</div>