<?php

if ( !defined( "ABSPATH" ) )
	exit( "No direct script access allowed" ); // Exit if accessed directly

?>

<div class="row featured-content">

	<?php

	if (is_category()) {

		$currentCat = get_current_category();
		$featured = get_field("featured_posts_cat_" . $currentCat->term_id, "options");

		if (is_array($featured)) {
			$featuredPosts = array_filter($featured);
		}

		if (!empty($featuredPosts)) {

			$featPosts = array();

			foreach ( $featured as $post ) {
				$featPosts[] = $post["featured_post"]->ID; 
			}

			$featQuery = new WP_Query (
				array(
					"post__in" => $featPosts,
					"posts_per_page" => -1,
					)
				);

			if ( $featQuery->have_posts() ) {

				while ( $featQuery->have_posts() ) {

					$featQuery->the_post(); ?>

					<div class="col-md-6">
						<?php get_template_part("templates/content", "featured"); ?>
					</div>

					<?php }

					wp_reset_postdata();

				}

			}

		} elseif (is_home()) {

			$featured = get_field("featured_posts", "options");

			$featPosts = array();

			foreach ( $featured as $post ) {
				$featPosts[] = $post["featured_post"]->ID; 
			}

			$featQuery = new WP_Query (
				array(
					"post__in" => $featPosts,
					"posts_per_page" => -1,
					)
				);

			if ( $featQuery->have_posts() ) {

				while ( $featQuery->have_posts() ) {

					$featQuery->the_post(); ?>

					<div class="col-md-6">
						<?php get_template_part("templates/content", "featured"); ?>
					</div>

					<?php }

					wp_reset_postdata();

				}
			} ?>

		</div>