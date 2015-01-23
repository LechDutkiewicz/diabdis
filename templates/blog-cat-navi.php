<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly
// setup variables
$blogCats = get_field('blog_root_cat', 'options');
$categoriess = get_children_categories($blogCats->term_id);

?>
<ul>

<?php foreach ($categoriess as $category) : ?>
	<li>
		<a href="<?php echo $category->term_id; ?>" title="<?php echo $category->name; ?>" style="color:<?php the_field('cat_color', "{$category->taxonomy}_{$category->term_id}"); ?>">
			<?php the_field('cat_icon', "{$category->taxonomy}_{$category->term_id}"); ?><span><?php echo $category->name; ?></span>
		</a>
	</li>
<?php endforeach; ?>

</ul>