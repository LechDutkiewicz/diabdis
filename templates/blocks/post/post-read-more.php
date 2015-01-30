<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Read more', 'roots'); ?></a>