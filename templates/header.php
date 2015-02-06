<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation" aria-labelledby="primaryLabel">
      <?php
      if (has_nav_menu('primary_navigation')) : ?>
      <h2 id="primaryLabel" class="hidden">Main navigation</h2>
      <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>
    </nav>

    <nav class="" role="navigation" aria-labelledby="categoryLabel">
      <?php 
      if ( '' != locate_template( 'templates/blog-cat-navi.php' ) ) {
        get_template_part('templates/blog', 'cat-navi');
      }
      ?>
    </nav>

  </div>
</header>
