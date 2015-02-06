<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly

function category_navi_styles() {

	$categories = get_the_category();

	foreach ($categories as $category) {

		$title = $category->name;
		$color = get_field('cat_color', "{$category->taxonomy}_{$category->term_id}");
		$icon = get_field('cat_icon', "{$category->taxonomy}_{$category->term_id}");

	}

}

function my_styles_method() {
	wp_enqueue_style(
		'cat-navi',
		get_template_directory_uri() . '/assets/css/cat-navi.css'
	);
        $color = '#FF0000'
        $custom_css = "
                .mycolor{
                        background: {$color};
                }";
        wp_add_inline_style( 'cat-navi', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'my_styles_method' );