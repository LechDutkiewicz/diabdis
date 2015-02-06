<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly
// setup variables
/*$blogCats = get_field('blog_root_cat', 'options');
$categories = get_children_categories($blogCats->term_id);*/
$categories = get_categories();

?>

<ul class="cat-navi clearfix">
	<?php render_category_link($categories, true); ?>
</ul>