<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<?php the_field('subscribe_blog_content', 'options'); ?>

<?php switch ($field = get_field('subscribe_blog_button', 'options')) {
	case 'sign-up':
		$layout = 'btn-blue';
		break;
	case 'subscribe':
		$layout = 'btn-yellow';
		break;
} ?>

<?php the_cta($field, $layout, false); ?>