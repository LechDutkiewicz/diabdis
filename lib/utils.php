<?php
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
  /*$output = array();
  foreach ($catsList as $cat) {
    $output[] = $cat;
  }*/
  return $catsList;
}

function get_children_categories($parent) {
  return get_all_categories($parent);
}

function render_category_link($categories = null, $menuLayout = null) {

  if(!$categories) {
    $categories = get_the_category();
  }

  foreach ($categories as $category) :

    $link = get_category_link($category->term_id);
  $title = $category->name;
  $color = get_field('cat_color', "{$category->taxonomy}_{$category->term_id}");
  $icon = get_field('cat_icon', "{$category->taxonomy}_{$category->term_id}");

  $output = '';

  if($menuLayout)
    $output .= "<li class='cat-menu-item'>";

  $output .= "<a class='category-link' href='" . $link . "' title='" . $title . "' style='color:" . $color . "'>";
  $output .= $icon . "<span>" . $title . "</span>";
  $output .= "</a>";

  if($menuLayout)
    $output .= "</li>";

  echo $output;

  endforeach;
}

function render_social_counter($output) {
  if(!is_admin()) {
    $defaults = array(
      'social_buttons' => array(
        'facebook',
        'twitter',
        'google-plus'
        ),
      );

    $social_counter = new Social_Counter($defaults);

    echo $social_counter->render_alone();

    //add_filter('the_content', array($social_counter, 'render_alone'), 999, 1);

  }
}

add_action('init', 'render_social_counter', 100);

function the_category_image() {

// setup vars
  $currentCat = get_category(get_query_var('cat'), false);
  $img = get_field('cat_img', "{$currentCat->taxonomy}_{$currentCat->term_id}");

  $size='medium';

  $thumb = wp_get_attachment_image_src( $img['id'], $size );
  $url = $thumb['0'];
  return($url);

  /*get_the_image(array(
    'post_id' => $img['id'],
    'link_to_post' => false,
    'image_class' => array('img-responsive', 'img-full'),
    'meta_key' => false,
    'size' => 'full'
    ));*/

}