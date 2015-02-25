<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly
?>

<a class="read-more" href="<?php the_permalink(); ?>" title="<?php echo __( 'Read more', 'roots') . " " . __( 'about', 'roots') . " '" . get_the_title() . "'"; ?>"><?php _e( 'Read more', 'roots'); ?><span class="sr-only"><?php echo __( 'about', 'roots') . " '" . get_the_title() . "'";?></span><i class="fa fa-chevron-right margin left-tiny"></i></a>