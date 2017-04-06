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


if ( file_exists( dirname( __FILE__ ) . '/local-config.php')) {
	include( dirname( __FILE__ ) . '/local-config.php'); 
} else {
	define('DB_NAME', 'damsons-wp-wp-kGKWDSbv');
	define('DB_USER', 'DAcmxKeoQDSL');
	define('DB_PASSWORD', 'ally622524');
	define('DB_HOST', 'localhost');
}


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ']}@}6as@(pyn$HBj41U#>+.P?+eZg;a}bWjZ[@E9jn<g*0A%}_ObIqgU6<Cn.>2A');
define('SECURE_AUTH_KEY',  'X1hrbK>%5<v9TT*&}.=}T +9>#=j 68AS?0rh|@&o&(v*N5:F*BKt l](y`y?]2W');
define('LOGGED_IN_KEY',    '17p4lyzw9f[OAX[ MgO,Ibt8%9*%+n6t*}2[$5G[AuzA!1ER[RpseY[.I>|QamN&');
define('NONCE_KEY',        'bq|{$vVZpwi}]1#fM<<7PJbrt:-yQX~#([GE&#p7TI(xmMuv{KAy JiS;!.k5Acy');
define('AUTH_SALT',        'J A:b|,Qw>N=%YQ1T07rQI$fkIlYExBsMm 6dT/;Kr{W:CA0/I^QYA:r%wXm7Onb');
define('SECURE_AUTH_SALT', '8 ll>d.<*N1-.q7p){-=qgh|O%}w|v$G]u_5yZ4w?SlQF:4 v9r%H&d@!h&W:;YK');
define('LOGGED_IN_SALT',   'br.5{UHs=#/LroxC|0RnGHUIrG&Ly^J][,UCfB+dYE7m#qGCZO%)Xt(gDlUE&&i*');
define('NONCE_SALT',       'm 1S_k*7;D9wWtiocr=v[DxWUiXp4*>f<o#O=2|!cZS;vN}A]/`+56wz(3JJH@V%');

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
