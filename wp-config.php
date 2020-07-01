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
define( 'DB_NAME', 'aristocrat-wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '}0%#y8Nl<yL d7fhiH.a,zssLbRpFER]r&T:hs[P24;*^okUZE9 E+}&+V[@5Ic:' );
define( 'SECURE_AUTH_KEY',  '}DKFi_,?)a4dzs=rzvJyP`UZt>&vp=1.:Z+AuMV3nhN!><LnZ44A$=wX%T,fO>ou' );
define( 'LOGGED_IN_KEY',    'Oz>g&iJO9:)Ex}=-UHmFXbh/CCRc4K>~f%:)8</j1&r;am,BFZS/e3W{c<a(k&O5' );
define( 'NONCE_KEY',        'K` ;FYSULh+Z]h>YK5piy9!;rX*Xu<!_OD[qo%$7__0QiBr]Ql9BL*}mD|}&n|Et' );
define( 'AUTH_SALT',        '6*+faO+D==zm&(f~BkJ6TrkYxQAR7Q,ZtO}nl*Qsb-6EvCDnyu<F||3;AZ9zlJx$' );
define( 'SECURE_AUTH_SALT', 'j5Ab+CwU2oz?@!50^=hI~@}eZj%~ -P)ddGn@?4fj4}Nm%n_RFpcxB+k5~V]jJ-f' );
define( 'LOGGED_IN_SALT',   '|G,CZ X_99t6Q7tH9]Q:@/{QxBnd:?:EG-Qt63dvQrQ^]lq^4tWxsxY):^*piz^E' );
define( 'NONCE_SALT',       ';{T>yol?>{3{fpU?sG}}W6b6Wh>yq~t13^jG?oMx{+D4dk0hHf]5X$E(qz:6}49x' );

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
