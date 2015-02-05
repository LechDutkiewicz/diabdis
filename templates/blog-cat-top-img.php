<?php

if ( !defined( "ABSPATH" ) )
	exit( "No direct script access allowed" ); // Exit if accessed directly

?>

<div class="bg-cover" style="background-image:url('<?php echo the_category_image(); ?>')">
	<div class="container">
		<div class="col-md-8">
			<p class="lead"><?php the_category_claim(); ?></p>
		</div>
		<div class="col-md-4 text-right">
      <?php get_template_part('templates/blocks/subscribe'); ?>
      <?php get_template_part('templates/blocks/search'); ?>
		</div>
	</div>
</div>


