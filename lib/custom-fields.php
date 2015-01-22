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
if ( function_exists( "register_field_group" ) ) {

	/*
	 * Event parameters setup
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
}