<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<article <?php post_class('row'); ?>>
	<header class="col-md-12">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</a>
		<?php render_category_link(); ?>
	</header>
	<div class="feat-img col-md-3">
		<?php get_template_part('templates/blocks/post/post', 'thumb'); ?>
	</div>
	<div class="post-excerpt col-md-9">
		<?php get_template_part('templates/blocks/post/post', 'excerpt'); ?>
		<?php get_template_part('templates/blocks/post/post', 'read-more'); ?>
	</div>
</article>
