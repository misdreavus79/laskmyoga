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
define('DB_NAME', getenv('DB'));

/** MySQL database username */
define('DB_USER', getenv('USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('PW'));

/** MySQL hostname */
define('DB_HOST', getenv('HOST'));

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
define('AUTH_KEY',         ';W~a-#0:)E$.;+!~:>H5HDTKa-@PdNrzh-,`8j+91qe]d&wqB@gmTnJ(ZTT6sT6@');
define('SECURE_AUTH_KEY',  'Io6[9B]e+n2L!!Z]=3<|U%jEo=)ggEle-c92>O9T9W/7H(<#y~5w2nfD+K!>la0[');
define('LOGGED_IN_KEY',    'p~]Iu0br-D.=+,k_/QE(FV|}bsk`B~-,-LKMou`N{#mj^u*@NJRaRhA{1ycR}#b_');
define('NONCE_KEY',        '>:$FP?:gY{_RWgS%&NEaHhHHJA|8i>):pSq,#N/B]:iES|1Xi1<e&/df<0E%G@}l');
define('AUTH_SALT',        'tM6rrmPS~>mD|4iX|f]&q`.|B(E]MNkR=]3Dsb]G|BHQMTbVM2dt5FGd,JPGDq)L');
define('SECURE_AUTH_SALT', 'Ah0z:>e=qs0E@bq-/-TYoit*9g|bJ1s:IB^2oYbx2%j8c;Yld_1JMG2~M]<i0Sr2');
define('LOGGED_IN_SALT',   'Cwn_+#B7!hL:+-m0C dgU=g5|Ve6{Q0$75FVdk+KC$C& 1J/?%%3)iVk[`=~Y#;_');
define('NONCE_SALT',       '#b9C|g1L^-b0>)#:@iO=F:7MJQy+4QZGZnet2C*tu;1Kf0S-=LY[K =86ANFIq8:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ly_';

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
