<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly
?>
<aside class='list-of-contents'>
	<header>
		<h4 class='section-title'><?php _e('List of contents', 'roots'); ?></h4>
	</header>
	<ol>
		<?php
		$counter = 0;
		while (have_rows('post_paragraphs')) : the_row();
		$counter++;
		?>
		<li>
			<a href="#<?php echo sanitize_title(get_sub_field('paragraph_title')); ?>" data-target="<?php echo sanitize_title(get_sub_field('paragraph_title')); ?>" title="<?php echo __( 'Scroll to', 'roots') . " " . get_sub_field('paragraph_title'); ?>"><?php the_sub_field('paragraph_title')?></a>
		</li>
		<?php
		endwhile;
		?>
	</ol>
</aside>