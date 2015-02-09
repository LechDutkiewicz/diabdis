<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<article <?php post_class('row featured-article'); ?>>
	<div class="feat-img col-md-12">
		<?php get_template_part('templates/blocks/post/post', 'feat-thumb'); ?>
	</div>
	<header class="col-md-12">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</a>
	</header>
</article>
