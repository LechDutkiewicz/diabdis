<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<article <?php post_class('feed-article article-bordered'); ?>>
	<div class="row">
		<header class="col-md-12">
			<a href="<?php the_permalink(); ?>" title="<?php echo __( 'Read more', 'roots') . " " . __( 'about', 'roots') . " '" . get_the_title() . "'"; ?>">
				<h3 class="entry-title"><?php the_title(); ?></h3>
			</a>
			<ol class="category-links">
				<?php render_category_link( null, null, 'feed' ); ?>
			</ol>
		</header>
		<div class="feat-img col-lg-3 col-md-3 col-sm-4 col-xs-4">
			<?php get_template_part('templates/blocks/post/post', 'thumb'); ?>
		</div>
		<div class="post-excerpt col-lg-9 col-md-9 col-sm-8 col-xs-8">
			<?php get_template_part('templates/blocks/post/post', 'excerpt'); ?>
			<?php get_template_part('templates/blocks/post/post', 'read-more'); ?>
		</div>
	</div>
</article>
