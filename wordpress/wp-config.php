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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressdb' );

/** MySQL database username */
define( 'DB_USER', 'Admin2' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dM|20Z:/JD2*zxv.fj|j7so>5b3NF4<X2*Qzje[>~5q0R@CHzGn*!+Y]qi^Ec,#V' );
define( 'SECURE_AUTH_KEY',  'Z>0p7D8FF0 a~e)`E*5bm^[588J1OK?=c^+HRWSE~Q.hHVRf`:Q^OEDa.E;@R0QX' );
define( 'LOGGED_IN_KEY',    'CYYAoZ|gP:@pa^l|8Fi}4r:8pP}1Ok>d0Mf[z*>o7%H,?Y@VXG{V*)Nr9X&KU-8F' );
define( 'NONCE_KEY',        'rSG{^O{|d;F38[vUzYpH&4A+y%,c pP={T^O7=~t)gUqfT/3q2B.9Jq&]Pwlx3,8' );
define( 'AUTH_SALT',        ')JjN5^wieH:WLcMQ,37w}j0G&IQQi0E9iY oE,Lk<wA]-l$=CYzhj*4ls!KRxWVV' );
define( 'SECURE_AUTH_SALT', '^S2ezj,fU/r]/4{*W|&a=p^GPy-_Ydy?Em9ysUBd-_I2_]?!%**<6sx#q*O}mwhp' );
define( 'LOGGED_IN_SALT',   'el]`~;J/!Bi:CD,HK`o+k$G*+!aB?RSQ[0Yy,T0dL=qC3J|60?u=Mu}x*!(VF!~)' );
define( 'NONCE_SALT',       ']5:{4!qJ?tgDuD0nLxB_+`*GwC=q~xx;sy^a6ss/L/4(]g?Zqqn1Z5]iZ~`O.{6(' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
