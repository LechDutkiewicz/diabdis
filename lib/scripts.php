<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr.min.js
 * 3. /theme/assets/js/scripts.js
 *
 * Google Analytics is loaded after enqueued scripts if:
 * - An ID has been defined in config.php
 * - You're not logged in as an administrator
 */
function roots_scripts() {
  /**
   * The build task in Grunt renames production assets with a hash
   * Read the asset names from assets-manifest.json
   */
  if (WP_ENV === 'development') {
    $assets = array(
      'css'       => '/assets/css/main.css',
      'js'        => '/assets/js/scripts.js',
      'modernizr' => '/assets/vendor/modernizr/modernizr.js',
      //'classie'   => '/assets/vendor/classie/classie.js',
      'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js',
      /*'transition' => '/assets/vendor/bootstrap/js/transition.js',
      'alert' => '/assets/vendor/bootstrap/js/alert.js',
      'button' => '/assets/vendor/bootstrap/js/button.js',
      'carousel' => '/assets/vendor/bootstrap/js/carousel.js',
      'collapse' => '/assets/vendor/bootstrap/js/collapse.js',
      'dropdown' => '/assets/vendor/bootstrap/js/dropdown.js',
      'modal' => '/assets/vendor/bootstrap/js/modal.js',
      'tooltip' => '/assets/vendor/bootstrap/js/tooltip.js',
      'popover' => '/assets/vendor/bootstrap/js/popover.js',
      'scrollspy' => '/assets/vendor/bootstrap/js/scrollspy.js',
      'tab' => '/assets/vendor/bootstrap/js/tab.js',
      'affix' => '/assets/vendor/bootstrap/js/affix.js',*/
      'infiScr'   => '/assets/vendor/infinite-scroll/jquery.infinitescroll.min.js',
      //'uiMorphingButton' => '/assets/js/uiMorphingButton.js',
      'custom'    => '/assets/js/custom.js',
      );
} else {
  $get_assets = file_get_contents(get_template_directory() . '/assets/manifest.json');
  $assets     = json_decode($get_assets, true);
  $assets     = array(
    'css'       => '/assets/css/main.min.css?' . $assets['assets/css/main.min.css']['hash'],
    'js'        => '/assets/js/scripts.min.js?' . $assets['assets/js/scripts.min.js']['hash'],
    'modernizr' => '/assets/js/vendor/modernizr.min.js',
    'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js',
    'infiScr'   => '/assets/js/vendor/jquery.infinitescroll.min.js'
    );
}

wp_enqueue_style('roots_css', get_template_directory_uri() . $assets['css'], false, null);

  /**
   * jQuery is loaded using the same method from HTML5 Boilerplate:
   * Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
   * It's kept in the header instead of footer to avoid conflicts with plugins.
   */
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $assets['jquery'], array(), null, true);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    //wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', get_template_directory_uri() . $assets['modernizr'], array(), null, true);
  //wp_enqueue_script('classie', get_template_directory_uri() . $assets['classie'], array(), null, true);
  wp_enqueue_script('jquery');
  /*wp_enqueue_script('transition', get_template_directory_uri() . $assets['transition'], array(), null, true);
  wp_enqueue_script('alert', get_template_directory_uri() . $assets['alert'], array(), null, true);
  wp_enqueue_script('button', get_template_directory_uri() . $assets['button'], array(), null, true);
  wp_enqueue_script('carousel', get_template_directory_uri() . $assets['carousel'], array(), null, true);
  wp_enqueue_script('collapse', get_template_directory_uri() . $assets['collapse'], array(), null, true);
  wp_enqueue_script('dropdown', get_template_directory_uri() . $assets['dropdown'], array(), null, true);
  wp_enqueue_script('modal', get_template_directory_uri() . $assets['modal'], array(), null, true);
  wp_enqueue_script('tooltip', get_template_directory_uri() . $assets['tooltip'], array(), null, true);
  wp_enqueue_script('popover', get_template_directory_uri() . $assets['popover'], array(), null, true);
  wp_enqueue_script('scrollspy', get_template_directory_uri() . $assets['scrollspy'], array(), null, true);
  wp_enqueue_script('tab', get_template_directory_uri() . $assets['tab'], array(), null, true);
  wp_enqueue_script('affix', get_template_directory_uri() . $assets['affix'], array(), null, true);*/
  wp_enqueue_script('infiScr', get_template_directory_uri() . $assets['infiScr'], array(), null, true);
  wp_enqueue_script('roots_js', get_template_directory_uri() . $assets['js'], array(), null, true);
  //wp_enqueue_script('uiMorphingButton', get_template_directory_uri() . $assets['uiMorphingButton'], array(), null, true);
  wp_enqueue_script('custom', get_template_directory_uri() . $assets['custom'], array(), null, true);
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery/dist/jquery.min.js?1.11.1"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

/**
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 */
function roots_google_analytics() { ?>
<script>
<?php if (WP_ENV === 'production') : ?>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
<?php else : ?>
function ga() {
  console.log('GoogleAnalytics: ' + [].slice.call(arguments));
}
<?php endif; ?>
ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}

function my_styles_method() {
  wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/assets/css/main.css'
  );
        $custom_css = category_navi_styles();
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );

function category_navi_styles() {

  $categories = get_categories();

  $output = '';

  foreach ($categories as $category) {

    $slug = $category->slug;
    $color = get_field('cat_color', "{$category->taxonomy}_{$category->term_id}");
    $output .= ".cat-navi > li.$slug.active{background-color: {$color};}.cat-navi > li.$slug a{color: {$color};}.category-$slug .bg-top .overlay{background-color: {$color};}";

  }

  return $output;

}
