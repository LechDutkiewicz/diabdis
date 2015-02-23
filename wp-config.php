<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '16967422_0000001');

/** MySQL database username */
define('DB_USER', '16967422_0000001');

/** MySQL database password */
define('DB_PASSWORD', 'zlAs4BiIb45t5tklR42YIRRLFVDLKLUc');

/** MySQL hostname */
define('DB_HOST', 'localhost:');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tZnxrkmBBkWKEaWtJ$lR9Yp((#$5Yo3^PRNxLPnzJ!erWc(nr$%RSPCET1Wy141u');
define('SECURE_AUTH_KEY',  '!D1z4T(Gir)e3hXfNL6Z5(f0lJ3tXUnd%iGLYxi))9D%n0*8(MBMeDvvxwz2C7u%');
define('LOGGED_IN_KEY',    'Bnx86qVCI9t8t!J0f!m()n@DhsxkaSBefxHuUuygPIhCCdk*8EzuLLzcCbk&3gBs');
define('NONCE_KEY',        'kY!w#&D3uqQ8R1^hQNS^erTG!DSTLn&a4RP8qJJ(HE1K*XiV#a&uUneU(o0wFlIK');
define('AUTH_SALT',        'Ic2Nat)7(Jq9X@bARaPfyUajJeBqu)4NEoXAHjXw#Loz6re@SA!f)VLe0sw#TvT6');
define('SECURE_AUTH_SALT', '3CJoSSoHz(OdESnOTiriaJua#gRFxngb&hm!rOIpP3tKBi)SYSja&t#M(Zz3!V1y');
define('LOGGED_IN_SALT',   '4@1fkOS1b*5T5(^6&*($rjc4VY70nkIe!1zDI!mvD8P*yeh)&Lip2D)UfWV((%kr');
define('NONCE_SALT',       'l(za%7869JuKi@UZ5xW2XCiSlgHGy8GaVEQF232Dtk#dD^s6#U4&%ILUFH4kb8#G');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'pl_PL');

define ('FS_METHOD', 'direct');

define('WP_DEBUG', false);

if (!defined('WP_ENV')) {
	//define('WP_ENV', 'development');
	define('WP_ENV', 'production');
}

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

//--- disable auto upgrade
define( 'AUTOMATIC_UPDATER_DISABLED', true );



?>
