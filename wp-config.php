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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '?bGx}f<d[xpP70HoA$PUZM);y,<Go59HWwRj7mTu3{>ucI<Vtu5ft u>1D-yO_6~' );
define( 'SECURE_AUTH_KEY',  '?#WAn(3EU.|IRlNdObt(Q=UbX0lPpQu}&kw!R*[2I5`?(g3S[{^-=z:oS|}OwK+&' );
define( 'LOGGED_IN_KEY',    '@o7nPhg>x4r/H&`|smVU,@a[y6Un2>I8biWwC-5w/%~8A:;J_dXg|=U(3zwV*F3B' );
define( 'NONCE_KEY',        ':3F^Z>)Y+_7wE|2c,8P,Be]`9>Dt`p[X~2[S>y`aG7|2L@j<XXzkiq.W:Cm;A9kL' );
define( 'AUTH_SALT',        ';7fqUz%?sX3ev|u`8|[9K`ql)wb5q;l*():2@s!Z,tqqRKm65ghFp?<C<TOJFYuR' );
define( 'SECURE_AUTH_SALT', 'Q RNyJ<*1[Y.v[g#`LIQQ;%@qlZ(][]Nu+_}M&+4a0?(E7Q}J|4oY!DL/ 2mQteE' );
define( 'LOGGED_IN_SALT',   'g,H3LDsrJ+/>S5tlsak&i]s*q-._2Om/LolzjHS/bd<OCBCWAtY^RsHr7/~Cc!a;' );
define( 'NONCE_SALT',       'a~Aw`JG7mCXD9z9p*S~0)Q@hUfU#:y>bri361n<|YV=K hUmQgMMBHZjV3(X`1?9' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
