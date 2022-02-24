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
define( 'DB_NAME', 'techywbu_svworld_db' );

/** Database username */
define( 'DB_USER', 'techywbu_svworld_user' );

/** Database password */
define( 'DB_PASSWORD', 'e5UnV&}bincE' );

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
define( 'AUTH_KEY',         'H#o{=G&{j*e&|=FoR_(*0pZ?qlDIpU>pdAz<Cn H,:vauU/Z#-ikSIm,(Wn]sxQD' );
define( 'SECURE_AUTH_KEY',  '`ELvwY)Eig]j<YAdauD]d]+O5E|OK6+%TFpE2z0YWKy|qI(0Pc{Ua7_g~G8qkxsA' );
define( 'LOGGED_IN_KEY',    'yUIbf2en,?{d}[5TWp%SzjBHKYa;)Sr-D15Q&bmH/h>tU@E a$V2k?%~#B,f0c`;' );
define( 'NONCE_KEY',        'O.j|;lUQ<XzS5dfNbP mS3/^!)!(|I=kg|T`IpuLL~eYt#6 zX_=Z*{%9fg[1Dt3' );
define( 'AUTH_SALT',        'Tec]D$0GJPWdJw}YlUnB0os`]k:C*;H[06Hud,sMTa@]yqQ,>b=AV`RiQewR!BOy' );
define( 'SECURE_AUTH_SALT', 'T`$w$-[peg#UINhw46)0u{Epn,>zZlm7$KEhTlbMT|Co)S0CeM8>,rf,RQ;KDSxk' );
define( 'LOGGED_IN_SALT',   '*UZyi8RfzRMuF>)gK-p,O5&$+`1hQCwydHU,yfP]_{j#M([8GsY}0ctw8sJ4i-Xr' );
define( 'NONCE_SALT',       'q`FMxK04]~R_)p=O6bniXdI^yPJm[lI;E:j`|d]NUIsBk}<;3=rdjfQ!q_wIy6T>' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
