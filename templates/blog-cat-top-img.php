<?php

if ( !defined( "ABSPATH" ) )
	exit( "No direct script access allowed" ); // Exit if accessed directly

?>

<div class="bg-cover bg-top has-overlay" style="background-image:url('<?php echo the_category_image(); ?>')">
	<div class="overlay"></div>
	<div class="container bg-cat-top">
		<div class="row display-table table-full vertical-middle">
			<div class="col-md-8">
				<h2 class="title"><?php the_category_claim(); ?></h2>
			</div>
			<div class="col-md-4 text-right">
				<?php get_template_part('templates/blocks/subscribe'); ?>
				<?php get_template_part('templates/blocks/search'); ?>
			</div>
		</div>
	</div>
</div>


