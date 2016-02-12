<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'scanbacklinkscom' );

/** MySQL database username */
define( 'DB_USER', 'scanbacklinkscom' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ecJAjqSNhDThVfWr' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ';Et|(n0nlpy]e,5{140rY%x3&|^|M-^GF|#w=!aeDW3dIi=)|a2%)15UmCd+b+lV');
define('SECURE_AUTH_KEY',  'E+E4]5a_)eqYtg]qnTVJ9!w>$3Xc^%o~Mx++y]~(q:NGhX^++++>!tqEApwWV&w_');
define('LOGGED_IN_KEY',    'w}O?K>lIXD<KTTN?J!sU RuMUu,2>+|EbYYrXc=D&~-d1$8R+)bh+GNsr,+*BVM1');
define('NONCE_KEY',        'B3yKxo:Wos0s f^d^,1|6ug=q.6:$V -{dp}.#<BJ=<u1Hwn:+[2Wa:XmY<++m:z');
define('AUTH_SALT',        '{}j(u<$z-gA(xjM-+Fe!IB3-uccb88|:WavO|uMT_{Ii;.f[-<</Xy~1q`7#)r *');
define('SECURE_AUTH_SALT', ' Z^t,yW&LTey)Dy!F0%MiUs=pn^FE*A|^-cvtQ O-q.)Hj6,VbCZOtyQf?w=G1-s');
define('LOGGED_IN_SALT',   'E5Y/Yq+}_~GNGDc >I:(kRw&6@,<OC|)dX_69cV(P?w6_c,&+e{Qy-L5 3|]X{J3');
define('NONCE_SALT',       'tMP.gx|L+y{e`c8H_49<.[yJ>d%@>lj(/n&5ErhF@s?M-Yvb;|%42t?dQ+Q2eni7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Отключить автоматическое обновление ядра
define( 'WP_AUTO_UPDATE_CORE', false );