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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sepranatural_wp938' );

/** Database username */
define( 'DB_USER', 'sepranatural_wp938' );

/** Database password */
define( 'DB_PASSWORD', 'V[yT4.(23N-pS]3C' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'k62as9qxmzhd282bf4wlwrmzewvnivoiljp2nnmmzlxuthzhnt2vozhisnyffeoz' );
define( 'SECURE_AUTH_KEY',  'g8zuziai6nvjefchjig92xpl6heohx0fjxzbngwyg38o11rh08e6dezmhwfkdjwv' );
define( 'LOGGED_IN_KEY',    'kjm5yhtfprue28przp1lu05n87xpm2vsbqtn9g2gdzmyjx2mytersjdgtm6ruv2q' );
define( 'NONCE_KEY',        'baavldgan45r8grprlcputh12rjjr9lxsnf33q0d7cde0bexnrabclfchpc5fisf' );
define( 'AUTH_SALT',        'yjybxyikz3pyxidjuxpyvkbdchpcbpt60pmllxcrcxh2dz0bnckcm32gnzntle5f' );
define( 'SECURE_AUTH_SALT', 'wxhcblgeepgptgcgxlfthelrhviisz9277ye1ehbn8jayb9kqe0p2jzep4yhydcl' );
define( 'LOGGED_IN_SALT',   '7awlfjj9esiwzebxxovjasxxiuijkf1wubtu22mwi0hcvb5epqswa4ihu3uno02b' );
define( 'NONCE_SALT',       'zqoy91j4bipgw5ru3dr1jxbj8qif37mcdzl2g7mheqpnhvhjsqon9cipifad8esx' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpcn_';

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
