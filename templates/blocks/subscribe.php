<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<?php the_field('subscribe_blog_content', 'options'); ?>

<?php the_cta(get_field('subscribe_blog_button', 'options'), 'btn-blue', false); ?>