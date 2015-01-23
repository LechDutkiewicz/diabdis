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
    <footer>
    </footer>
  </article>
<?php endwhile; ?>
