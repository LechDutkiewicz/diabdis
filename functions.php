<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/classSocialCounter.php',
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
  'assets/extensions/advanced-custom-fields/acf.php', // Advanced Custom Fields Extension
  'assets/extensions/acf-font-awesome/acf-font-awesome.php', // Advanced Custom Fields Font Awesome Extension
  'assets/extensions/acf-repeater/acf-repeater.php', // Advanced Custom Fields Repeater Extension
  'assets/extensions/acf-options-page/acf-options-page.php', // Advanced Custom Fields Repeater Extension
  'assets/extensions/acf-categories/acf-categories.php', // Advanced Custom Fields Categories Extension
  'assets/extensions/get-the-image/get-the-image.php', // Get the image for custom get_the_image function to retrieve images
  'lib/custom-fields.php'
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
