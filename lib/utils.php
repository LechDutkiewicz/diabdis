<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly

/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

// Tell WordPress to use searchform.php from the templates/ directory
function roots_get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'roots_get_search_form');

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function roots_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'roots_body_class');

/**
 * Return array with all post categories and custom fields
 */

function get_all_categories($parent = '') {
  // Fetch for all categories
  $args = array(
    'hide_empty' => 0,
    );
  if ('' != $parent) {
    $args['parent'] = $parent;
  }
  $catsList = get_terms('category', $args);
  return $catsList;
}

/**
 * Return array with all post categories and custom fields with specified parent
 */

function get_children_categories($parent) {
  return get_all_categories($parent);
}

/**
 * Renders category links for blog posts
 */

function render_category_link($categories = null, $menuLayout = null, $layout = null) {

  if(!$categories) {
    $categories = get_the_category();
  }

  foreach ($categories as $category) :

  $link = get_category_link($category->term_id);
  $title = $category->name;
  $slug = $category->slug;
  $color = get_field('cat_color', "{$category->taxonomy}_{$category->term_id}");
  $icon = get_field('cat_icon', "{$category->taxonomy}_{$category->term_id}");

  $output = '';

  if($menuLayout) {
    $currentCat = get_current_category();
    $active = ($currentCat->name == $category->name) ? ' active' : '';
    $output .= "<li class='text-center" . $active ." " . $slug . "'>";
  }

  $output .= "<a class='cat-link " . $slug . " " . $layout . "' href='" . $link . "' title='" . $title . "'>";
  $output .= $icon . "<span class='cap'>" . $title . "</span>";
  $output .= "</a>";

  if($menuLayout)
    $output .= "</li>";

  echo $output;

  endforeach;
}

/**
 * Render social counters
 */

function render_social_counter() {
  if(!is_admin()) {
    $defaults = array(
      'social_buttons' => array(
        'facebook',
        'twitter',
        'google-plus'
        ),
      'before' => null,
      'after' => null
      );

    $social_counter = new Social_Counter($defaults);

    echo $social_counter->render_alone();

  }
}

add_action('init', 'render_social_counter', 100);

function get_current_category() {
  return get_category(get_query_var('cat'), false);
}

function get_category_image() {

// setup vars
  $currentCat = get_current_category();
  $img = get_field('cat_img', "{$currentCat->taxonomy}_{$currentCat->term_id}");

  $size='category';

  $thumb = wp_get_attachment_image_src( $img['id'], $size );
  $url = $thumb['0'];
  return $url;

}

function the_category_image() {

  echo get_category_image();

}

function get_category_claim() {

// setup vars
  $currentCat = get_current_category();
  $claim = get_field('cat_claim', "{$currentCat->taxonomy}_{$currentCat->term_id}");

  return $claim;

}

function the_category_claim() {

  echo get_category_claim();

}

add_action( 'wp_ajax_modal_load', 'ajax_modal_load');
add_action( 'wp_ajax_nopriv_modal_load', 'ajax_modal_load');

function ajax_modal_load() {
  $output = get_template_part('/templates/blocks/modals/modal', $_POST['template']);
  die($output);
}

/*
 * Setup data for dynamic footer
 */

if ( !function_exists( 'dynamic_year' ) ) {

  function dynamic_year() {

    $startYear = 2014;
    $currYear = date( 'Y' );
    if ( $currYear > $startYear ) {
      $yearCopy = "$startYear - $currYear";
    } else {
      $yearCopy = $startYear;
    }
    
    return $yearCopy;
  }

}

// Get call to action buttons layout

function get_the_cta( $content, $layout, $block = true ) {

  $args = array(
    'search' => array(
      'label' => __( 'Search', 'roots' ),
      'template' => 'search',
      'fa-icon' => 'search',
      ),
    'sign-up' => array(
      'label' => __( 'Sign up to Diabdis', 'roots' ),
      'template' => 'typeform',
      'fa-icon' => 'sign-in',
      ),
    'subscribe' => array(
      'label' => __( 'Subscribe', 'roots' ),
      'template' => 'mailchimp',
      'fa-icon' => 'envelope-o',
      ),
    );

  if ( $block === true ) $display = 'btn-block';
  $layout = $layout . ' ' . $display;

  $output = "<a data-template='" . $args[$content]['template'] . "' role='button' data-target='#modal' data-toggle='modal' data-title='" . $args[$content]['label'] . "' class='btn btn-cta " . $layout . "'><i class='fa fa-" . $args[$content]['fa-icon'] . " fa-fw'></i>" . $args[$content]['label'] . "</a>";

  return $output;

}

function the_cta( $content, $layout, $block = true ) {
  echo get_the_cta( $content, $layout, $block);
}

// Display properly formatted phone number

function phone_number( $format = true, $phone = null ) {

  $phone = $phone ? $phone : get_field('blog_root_phone', 'options');

  $phone = preg_replace('/\D/', '', $phone);

  if ( $format === true ) {

  $output = preg_replace('/^(.*?)(.{3})(.{2})(.{2})$/', '$1 $2 $3 $4', $phone);

  } else {

  $output = preg_replace('/^(.*?)(.{3})(.{3})$/', '$1-$2-$3', $phone);

  }

  echo $output;

}

// Rotate 13 encrypting emails

function coded_email( $email = null ) {
  echo get_coded_email ($email);

}

function get_coded_email( $email = null ) {

  $email = $email ? $email : get_field('blog_root_email', 'options');

  $output = str_rot13("<a href='mailto: " . $email . "'>" . $email . "</a><br />");

  return $output;
}

function get_thumbnail_src() {

  $img = get_the_image(array(
    'link_to_post' => false,
    'meta_key' => false,
    'size' => 'post-featured',
    'format' => 'array'
    )
  );

  return $img['src'];
}