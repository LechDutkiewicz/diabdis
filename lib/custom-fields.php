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

$categories = get_categories();

function mthemes_acf_settings( $settings ) {
	$settings['title'] = __( 'Theme Options', 'roots');
	$settings['pages'] = array( 'General', 'Featured Posts', 'Buttons' );
	return $settings;
}

add_filter( 'acf/options_page/settings', 'mthemes_acf_settings' );

if ( function_exists( "register_field_group" ) ) {

// Blog category parameters setup - add color and icon

	register_field_group( array(
		'id' => 'acf_category_parameters',
		'title' => __( 'Category parameters', 'roots' ),
		'fields' => array(
			array(
				'key' => 'field_5256bd0fc7592',
				'label' => __( 'Category color', 'roots' ),
				'name' => 'cat_color',
				'type' => 'color_picker',
			),
			array(
				'key' => 'field_5256bd0fc1sd5s',
				'label' => __( 'Category icon', 'roots' ),
				'name' => 'cat_icon',
				'type' => 'font-awesome',
			),
			array(
				'key' => 'field_4wt2rtfqwe3ot',
				'label' => __( 'Category image', 'roots' ),
				'name' => 'cat_img',
				'type' => 'image',
			),
			array(
				'key' => 'field_5256bd0fc2356234592',
				'label' => __( 'Category claim', 'roots' ),
				'name' => 'cat_claim',
				'type' => 'text',
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

// Blog post parameters setup - add table of contents option

	register_field_group( array(
		'id' => 'acf_post_parameters',
		'title' => __( 'Post content', 'roots'),
		'fields' => array(
			array(
				'key' => 'field_2463464363463sr5r',
				'label' => __( 'Custom image author?', 'roots'),
				'name' => 'post_switch_author',
				'type' => 'radio',
				'required' => 1,
				'choices' => array(
					0 => __( 'no', 'roots' ),
					1 => __( 'yes', 'roots'),
					),
				'default_value' => 0,
				),
			array(
				'key' => 'field_24643wetwery5r',
				'label' => __( 'About image author', 'roots'),
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
				'label' => __( 'Introduction', 'roots'),
				'name' => 'post_excerpt',
				'type' => 'wysiwyg',
				'required' => 0,
				),
			array(
				'key' => 'field_2464312325r',
				'label' => __( 'Display table of contents?', 'roots'),
				'name' => 'post_switch_type',
				'type' => 'radio',
				'required' => 1,
				'choices' => array(
					0 => __( 'no', 'roots' ),
					1 => __( 'yes', 'roots'),
					),
				'default_value' => 0,
				),
			array(
				'key' => 'field_24643ew56w5r',
				'label' => __( 'Post content', 'roots'),
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
				'label' => __( 'Post paragraphs', 'roots'),
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
						'label' => __( 'Paragraph title', 'roots'),
						'name' => 'paragraph_title',
						'type' => 'text',
						'column_width' => '20%',
						'default_value' => '',
					),
					array(
						'key' => 'field_51b1d2932323f',
						'label' => __( 'Paragraph content', 'roots'),
						'name' => 'paragraph_content',
						'type' => 'wysiwyg',
						'column_width' => '80%',
						'default_value' => '',
					),
				),
				//'row_min' => 0,
				//'row_limit' => 4,
				'layout' => 'table',
				'button_label' => __( 'Add paragraph', 'roots'),
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

// Theme options page setup

	register_field_group( array(
		'id' => 'theme_options',
		'title' => __( 'Theme Options', 'roots'),
		'fields' => array(
			/*array(
				'key' => 'field_24621412352325r',
				'label' => __( 'Category of blog posts', 'roots'),
				'name' => 'blog_root_cat',
				'type' => 'categories',
				'hide_empty' => 0,
				'required' => 1,
				),*/
			array(
				'key' => 'field_24622346dndgjdxxx52325r',
				'label' => __( 'Company name', 'roots'),
				'name' => 'blog_root_name',
				'type' => 'text',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_24622swr34252325r',
				'label' => __( 'Company address', 'roots'),
				'name' => 'blog_root_address',
				'type' => 'text',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_24622352352552325r',
				'label' => __( 'Company email', 'roots'),
				'name' => 'blog_root_email',
				'type' => 'email',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_24622346dfhdf552325r',
				'label' => __( 'Company phone', 'roots'),
				'name' => 'blog_root_phone',
				'type' => 'text',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_246222645westtgshdf552325r',
				'label' => __( 'Facebook'),
				'name' => 'blog_root_facebook',
				'type' => 'text',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_24622346fsdha32f552325r',
				'label' => __( 'Twitter'),
				'name' => 'blog_root_twitter',
				'type' => 'text',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_246ha32f552325r',
				'label' => __( 'Google plus'),
				'name' => 'blog_root_google_plus',
				'type' => 'text',
				'hide_empty' => 0,
				'required' => 1,
				),
			array(
				'key' => 'field_24622346fseraafgerws52325r',
				'label' => __( 'Typeform URL'),
				'name' => 'blog_root_typeform',
				'type' => 'text',
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

// featured posts for home page

	register_field_group( array(
		'id' => 'theme_blog_options',
		'title' => __( 'Featured posts on home page', 'roots' ),
		'fields' => array(
			array(
				'key' => 'field_1532512',
				'name' => 'featured_posts',
				'type' => 'repeater',
				'sub_fields' => array(
					array(						
						'key' => 'field_2323424tr547',
						'label' => __( 'Featured post', 'roots' ),
						'name' => 'featured_post',
						'type' => 'post_object',
						'post_type' => array(
							0 => 'post',
							),
						),
					),
				),
			),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-featured-posts',
					'order_no' => 1,
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
		));

// featured posts for category pages

	foreach ($categories as $category) {
		register_field_group( array(
			'id' => 'theme_category_' . $category->term_id . '_options',
			'title' => sprintf(__( 'Featured posts in %s', 'roots' ), $category->name),
			'fields' => array(
				array(
					'key' => 'field_235252dscat' . $category->term_id,
					'name' => 'featured_posts_cat_' . $category->term_id,
					'type' => 'repeater',
					'sub_fields' => array(
						array(
							'key' => 'field_2323424ty4cat',
							'label' => __( 'Featured post', 'roots' ),
							'name' => 'featured_post',
							'type' => 'post_object',
							'post_type' => array(
								0 => 'post',
								),
							'taxonomy' => array(
								'category:' . $category->term_id,
								),
							),
						),
					),
				),
			'location' => array(
				array(
					array(
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-featured-posts',
						'order_no' => 1,
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
			'menu_order' => 2,
			) );
	}


// content for subscription buttons

	register_field_group( array(
		'id' => 'theme_blog_buttons',
		'title' => __( 'Contents of subscription buttons in posts', 'roots' ),
		'fields' => array(
			array(
				'key' => 'field_15325325s12',
				'label' => __( 'Content before subscription button after post contents', 'roots'),
				'name' => 'subscribe_blog_content',
				'type' => 'wysiwyg'
				),
			array(
				'key' => 'field_115321525s12',
				'label' => __( 'Type of subscription button', 'roots'),
				'name' => 'subscribe_blog_button',
				'type' => 'select',
				'choices' => array(
					'sign-up' => __( 'Sign up typeform', 'roots'),
					'subscribe' => __( 'Mailchimp form', 'roots')
					),
				),
			),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-buttons',
					'order_no' => 1,
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
		));

	register_field_group( array(
		'id' => 'theme_subscribe_buttons',
		'title' => __( 'Contents of subscription buttons in sidebar', 'roots' ),
		'fields' => array(
			array(
				'key' => 'field_153345rdcxxc25s12',
				'label' => __( 'Content before subscription button in sidebar', 'roots'),
				'name' => 'subscribe_sidebar_content',
				'type' => 'wysiwyg'
				),
			array(
				'key' => 'field_1153drfhde3525s12',
				'label' => __( 'Type of subscription button', 'roots'),
				'name' => 'subscribe_sidebar_button',
				'type' => 'select',
				'choices' => array(
					'sign-up' => __( 'Sign up typeform', 'roots'),
					'subscribe' => __( 'Mailchimp form', 'roots')
					),
				),
			),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-buttons',
					'order_no' => 2,
					'group_no' => 2,
					),
				),
			),
		'options' => array(
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array(
				),
			),
		'menu_order' => 2,
		));

}