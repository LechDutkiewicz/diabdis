<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly
/**
 * Theme advanced custom fields registration
 *
 *
 *
 * @author		Lech Dutkiewicz
 * @copyright	Copyright (c) Lech Dutkiewicz
 * @link		http://www.techsavvymarketers.pl
 * @since		Version 1.0
 * @category 	Fuctions
 *
 *
 */

// Setup theme options page

function mthemes_acf_settings( $settings ) {
	$settings['title'] = __( 'Theme Options', 'root');
	$settings['pages'] = array( 'General' );
	return $settings;
}

add_filter( 'acf/options_page/settings', 'mthemes_acf_settings' );

if ( function_exists( "register_field_group" ) ) {

	/*
	 * Blog category parameters setup - add color and icon
	 */

	register_field_group( array(
		'id' => 'acf_category_parameters',
		'title' => __( 'Category parameters', 'root' ),
		'fields' => array(
			array(
				'key' => 'field_5256bd0fc7592',
				'label' => __( 'Category color', 'root' ),
				'name' => 'cat_color',
				'type' => 'color_picker',
			),
			array(
				'key' => 'field_5256bd0fc1sd5s',
				'label' => __( 'Category icon', 'root' ),
				'name' => 'cat_icon',
				'type' => 'font-awesome',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'category',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 0,
	) );

	/*
	 * Blog post parameters setup - add table of contents option
	 */

	register_field_group( array(
		'id' => 'acf_post_parameters',
		'title' => __( 'Post content', 'root'),
		'fields' => array(
			array(
				'key' => 'field_2463464363463sr5r',
				'label' => __( 'Custom image author?', 'root'),
				'name' => 'post_switch_author',
				'type' => 'radio',
				'required' => 1,
				'choices' => array(
					0 => __( 'no', 'root' ),
					1 => __( 'yes', 'root'),
					),
				'default_value' => 0,
				),
			array(
				'key' => 'field_24643wetwery5r',
				'label' => __( 'About image author', 'root'),
				'name' => 'post_thumb_author',
				'type' => 'wysiwyg',
				'conditional_logic' => array(
					'status' => 1,
					'rules' => array(
							array(
								'field' => 'field_2463464363463sr5r',
								'operator' => '==',
								'value' => 1,
							),
						),
					'allorany' => 'all',
					),
				),
			array(
				'key' => 'field_246433125123525r',
				'label' => __( 'Introduction', 'root'),
				'name' => 'post_excerpt',
				'type' => 'wysiwyg',
				'required' => 0,
				),
			array(
				'key' => 'field_2464312325r',
				'label' => __( 'Display table of contents?', 'root'),
				'name' => 'post_switch_type',
				'type' => 'radio',
				'required' => 1,
				'choices' => array(
					0 => __( 'no', 'root' ),
					1 => __( 'yes', 'root'),
					),
				'default_value' => 0,
				),
			array(
				'key' => 'field_24643ew56w5r',
				'label' => __( 'Post content', 'root'),
				'name' => 'post_contents',
				'type' => 'wysiwyg',
				'conditional_logic' => array(
					'status' => 1,
					'rules' => array(
							array(
								'field' => 'field_2464312325r',
								'operator' => '==',
								'value' => 0,
							),
						),
					'allorany' => 'all',
					),
				),
			array(
				'key' => 'field_156346ssdgfs',
				'label' => __( 'Post paragraphs', 'root'),
				'name' => 'post_paragraphs',
				'type' => 'repeater',
				'conditional_logic' => array(
					'status' => 1,
					'rules' => array(
							array(
								'field' => 'field_2464312325r',
								'operator' => '==',
								'value' => 1,
							),
						),
					'allorany' => 'all',
					),				
				'sub_fields' => array(
					array(
						'key' => 'field_51b1d2332323e',
						'label' => __( 'Paragraph title', 'root'),
						'name' => 'paragraph_title',
						'type' => 'text',
						'column_width' => '20%',
						'default_value' => '',
					),
					array(
						'key' => 'field_51b1d2932323f',
						'label' => __( 'Paragraph content', 'root'),
						'name' => 'paragraph_content',
						'type' => 'wysiwyg',
						'column_width' => '80%',
						'default_value' => '',
					),
				),
				//'row_min' => 0,
				//'row_limit' => 4,
				'layout' => 'table',
				'button_label' => __( 'Add paragraph', 'root'),
				),
			),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array(
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array(
			),
		),
		'menu_order' => 1,
		) );

	/*
	 * Theme options page setup
	 */

	register_field_group( array(
		'id' => theme_options,
		'title' => __( 'Theme Options', 'root'),
		'fields' => array(
			array(
				'key' => 'field_24621412352325r',
				'label' => __( 'Category of blog posts', 'root'),
				'name' => 'blog_root_cat',
				'type' => 'categories',
				'hide_empty' => 0,
				'required' => 1,
				),
			),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
					),
				),
			),
		'options' => array(
			),
		'menu_order' => 1,
		) );
}