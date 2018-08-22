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
define('DB_NAME', 'dev_db_beccamuir');

/** MySQL database username */
define('DB_USER', 'devdbbecca');

/** MySQL database password */
define('DB_PASSWORD', 'ZyzfhRpxpHGunqwZ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'eH9+5#yOAuaO3XH:px3|tr0L&dw7|c2t[O2#Pi*~zP/qV<:-B^i`5Qx|4iamyrdD');
define('SECURE_AUTH_KEY',  'sr:(;K?^kK|pevY/-FS<uG@Ec<Q<o[%} N-XD7vM{p]WDP&VuOZ!m,K w=_3h)zE');
define('LOGGED_IN_KEY',    '0Y(]2qfTuMq2p:a=d^xiFC/H-+X`cVGoSv+NI[:4Zt DT9>iV ]M5J,3j.c0($5c');
define('NONCE_KEY',        'Y42v.R=HaD+1xI MYbs,$L;dPpRt,0oR.4_+d6ETb#(|3epuZam2f7vv{Tdv*=W=');
define('AUTH_SALT',        'GZZs}JcDdN&7.r5:BjrA#bXE{++p40Ic%1Y=_I[)0-s-0dsh-M5;AgH{J.0c`9_9');
define('SECURE_AUTH_SALT', 'ePT^:&7up8<}2|?0yG_^B|;[.T_j1A|~F hX9/OI9NX5<|B!4nl?64gP 8NU-$_-');
define('LOGGED_IN_SALT',   'yvQ@O@#n/i i1[5ecylvOtl7o8uB[18o)/c1;Tr4>QcM^`|&,@KZlPK. >[o<!v|');
define('NONCE_SALT',       '<,1>$*hz <2Hh+:M~rek1G*wSIvT=/L8 (b/5c5nrv%2L.Xd +41)jYe-=p a-;k');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
