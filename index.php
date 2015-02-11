<?php

if ( !defined( 'ABSPATH' ) )
exit( 'No direct script access allowed' ); // Exit if accessed directly

//get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div id="content" class="content-feed infi-scr-container">

  <?php if (have_posts()) : ?>
  <div class="header-lined">
    <h2><?php _e( 'Articles', 'roots'); ?></h2>
  </div>
<?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav id="pagination" class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>

</div>

<?php if ($wp_query->max_num_pages > 1) : ?>

  <div class="row">
    <div class="col-md-12 text-center">
      <div id='more' class='btn btn-cta no-bg btn-dark'><?php _e( 'Load more', 'roots'); ?></div>
    </div>
  </div>

<?php endif; ?>
