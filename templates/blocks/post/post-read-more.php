<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Read more', 'roots'); ?> <i class="fa fa-chevron-right"></i></a>