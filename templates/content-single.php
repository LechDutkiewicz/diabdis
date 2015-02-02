<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
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
    <div class="sm-share">
      <?php get_template_part('templates/blocks/sm', 'share'); ?>
    </div>
    <div class="comments">
      <?php get_template_part('templates/blocks/comments', 'disqus'); ?>
    </div>
    <aside class="related-posts">
      <?php get_template_part('templates/blocks/post/post', 'related'); ?>
    </aside>
    <footer>
    </footer>
  </article>
<?php endwhile; ?>
