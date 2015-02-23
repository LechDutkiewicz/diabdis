<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('margin bottom'); ?> itemscope itemtype="http://schema.org/Article">
    <header>
      <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
      <?php get_template_part('templates/blocks/post/post', 'feat-img'); ?>
    </header>
    <div class="post-excerpt">
      <?php get_template_part('templates/blocks/post/post', 'excerpt'); ?>
    </div>
    <div class="entry-content">
      <?php get_template_part('templates/blocks/post/post', 'contents'); ?>
    </div>
    <div class="entry-tags">
      <?php get_template_part('templates/blocks/post/post', 'tags'); ?>
    </div>
  </article>
  <aside class="margin bottom-huge">
    <div class="sm-share margin top bottom-huge">
      <?php get_template_part('templates/blocks/sm', 'share'); ?>
    </div>
    <div class="subscribe text-center margin bottom-huge">
      <?php get_template_part('templates/blocks/post/subscribe'); ?>
    </div>
    <div class="comments margin bottom-big">
      <?php get_template_part('templates/blocks/comments', 'disqus'); ?>
    </div>
    <div class="related-posts content-feed infi-scr-container">
      <?php get_template_part('templates/blocks/post/post', 'related'); ?>
    </div>
  </aside>
<?php endwhile; ?>
