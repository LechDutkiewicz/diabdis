<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>
<div class="header-lined">
	<h3><?php _e( 'Related posts', 'roots'); ?></h3>
</div>

<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);

if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
                //'posts_per_page'=>2, // Number of related posts to display.
		'caller_get_posts'=>1
		);

	$my_query = new wp_query( $args );

	while( $my_query->have_posts() ) {
		$my_query->the_post();
		?>
		<?php get_template_part('templates/content', get_post_format()); ?>

		<?php }

	}
	$post = $orig_post;
	wp_reset_query();
	?>
