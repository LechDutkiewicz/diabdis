<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

if (wp_is_mobile()) { ?>
<p>
	<?php
	$str = strip_tags(get_field('post_excerpt'));
	$excerpt_length = 150;
	if (strlen($str) > $excerpt_length) {
		$str = substr($str, 0, $excerpt_length);
		if (substr($str,-1,1)!=' ') {
			$str = substr($str,0,strrpos($str,' '));
		}
	}
	echo $str . '...';
	?>
</p>
<?php } else {
	the_field('post_excerpt');
}