<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<header class="banner navbar navbar-static-top" role="banner">
  <div id="main-nav-container" class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse navbar-right" role="navigation" aria-labelledby="primaryLabel">
      <?php
      if (has_nav_menu('primary_navigation')) : ?>
      <h2 id="primaryLabel" class="hidden">Main navigation</h2>
      <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>
      <div class="navbar-text navbar-right navbar-social text-right hidden-xs hidden-sm">
        <a href="<?php the_field('blog_root_facebook', 'options'); ?>" title="<?php _e('Follow us on', 'roots'); ?> Facebook" target="_blank"><i class="fa fa-facebook"></i><span class="hidden">Facebook</span></a>
        <a href="<?php the_field('blog_root_twitter', 'options'); ?>" title="<?php _e('Follow us on', 'roots'); ?> Twitter" target="_blank"><i class="fa fa-twitter"></i><span class="hidden">Twitter</span></a>
        <a href="<?php the_field('blog_root_google_plus', 'options'); ?>" title="<?php _e('Follow us on', 'roots'); ?> Google Plus" target="_blank" rel="publisher"><i class="fa fa-google-plus"></i><span class="hidden">Google Plus</span></a>
      </div>
    </nav>

  </div>

  <div id="cat-nav-container" class="container">
    <nav class="collapse navbar-collapse" role="navigation" aria-labelledby="categoryLabel">
      <?php 
      if ( '' != locate_template( 'templates/blog-cat-navi.php' ) ) {
        get_template_part('templates/blog', 'cat-navi');
      }
      ?>
    </nav>
  </div>

</header>
