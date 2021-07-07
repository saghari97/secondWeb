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
define( 'DB_NAME', 'housh' );

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
define( 'AUTH_KEY',         'gjN-cHnrP,-T:>XfZ$VPSTm) _8[]!!tPss)|y@ufZle&Y1~e1$A/9D SPKAy(9J' );
define( 'SECURE_AUTH_KEY',  'o)4xM]cprYwQ?v4i6PU`p9~e.OZIRX8V|*S,*;D@9P;lKNvV*0kO:kWzz_2~EuGM' );
define( 'LOGGED_IN_KEY',    'WTr@lA1%S-yuX/KiVsy9JKyp8qJVXy{AD5kWax{(YxqV#+V;?p2kmRzkW2`&QZ0(' );
define( 'NONCE_KEY',        '(v1r&-:Nr1i.[`B_+~z*d y+GR$bfWxq.XEi:6fTQ7n~WU@$1]!}:bws]]+)!|/$' );
define( 'AUTH_SALT',        'zsue]hID,ThSI1*Z`LtBqVEW0?!gK>%BA-fr`62AV=8cS.^)_j8`~1tL*. ,qDK4' );
define( 'SECURE_AUTH_SALT', 'UXz+},hG[H3~T8?!?#GU8e_;GE@V$+{@J!NP,alF=5eBf)9JUCIOp3*Qu!m< $wg' );
define( 'LOGGED_IN_SALT',   'H 4./_[l!a]/q(p[b1k%nh#[a_TeUTJ2mRX*M3PG4e3=a{+Aky$4V*+[%a}*D1:%' );
define( 'NONCE_SALT',       'D=MB>Ge]lpPIJ1beaMav:mkZwBk<D9n.PzM-g^BBw$<jbME P>d/`E!kp@hn0[) ' );

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
