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