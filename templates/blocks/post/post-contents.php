<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

// setup vars

$layout = get_field('post_switch_type');

/*if ($layout) : ?>
<?php var_dump(get_field('post_paragraphs')); ?>
<?php else : ?>
<?php the_field('post_contents'); ?>
<?php endif;*/

if (have_rows('post_paragraphs')) {
	get_template_part('templates/blocks/post/post', 'list-of-contents');
	$counter = 0;
	while (have_rows('post_paragraphs')) {
		the_row();
		$counter++;
		?>
		<h4 id="<?php echo sanitize_title(get_sub_field('paragraph_title'));?>" class="paragraph-title"><?php echo $counter; ?>. <?php the_sub_field('paragraph_title'); ?></h4>
		<?php
		the_sub_field('paragraph_content');
	}
} else {
	the_field('post_contents');
}