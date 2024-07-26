<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '9Y0*|022@ZF1P|:V G[eD*c2eN1}X^^?fR53q:#3:$fAk<{5V?:m@Bqux]Cj:0=5' );
define( 'SECURE_AUTH_KEY',   'KSM23cb;f|SnX,Su f8jlT>l{J8BunX&WVJv]B(6pDB6yJziJJx<X3d$`.Q+Gh/O' );
define( 'LOGGED_IN_KEY',     '~0}RUBJ)w<(O07<=6cF4jB[}}%RNW,1}M5L~4$D3j/.Yc X>mU{G#SrbC*{)sud<' );
define( 'NONCE_KEY',         'Pz{7O0@eg^I}k5JXp3UW<v$fB/H}6BGjRO1%6MnN<9U6_fST3YJoll{%U29i5%ej' );
define( 'AUTH_SALT',         'SYJo]0A|jI+u/5a,WtL=C9cOv1,GefB,~ItatJkxp_3*7t}y3Z:d47?kc&<ViB#Q' );
define( 'SECURE_AUTH_SALT',  'S$Gf|lG qVz*Gb5i0QIMQ/Y/*I@x/P/B1nqVBf$IC*1He9Y:,.fV^[eBLU)4bxYt' );
define( 'LOGGED_IN_SALT',    'PGN_JOW06<X*pgNKVCImI,Y;<Pk-ka=!5EG*,Ds>j4duPLE{Vp!ptngHG)1}hA9Q' );
define( 'NONCE_SALT',        '#[.NPiHRbYp8eh>yjg^RteC!p7No`8bCEf=_2xSp7NVv[-#E^?9|(9ll9x_3X[DI' );
define( 'WP_CACHE_KEY_SALT', 'mWmEe)ICjQs<M{Z.CgO5mLDWBF:y!x]6*O;cC?*k26n&NT^`nD;PcNbX2NB3h^*#' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
