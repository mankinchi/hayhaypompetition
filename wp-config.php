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
define('DB_NAME', 'baydcc7f_baycompetition');

/** MySQL database username */
define('DB_USER', 'baydcc7f_admin');

/** MySQL database password */
define('DB_PASSWORD', 'l@mg1c0p@ss');

/** MySQL hostname */
define('DB_HOST', 'baycompetition.com');

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
define('AUTH_KEY',         'uHmL8#9m7x}u-awy}DiiATVHgqT^PQGjy)!Fcm^F6%FTwR43JB>imz)mV-leeY[@');
define('SECURE_AUTH_KEY',  'jb,u_VRX.Z$p.K]7.$HYAa1BHrO;V_ubg8es}(QI-z%vb9^f/c:;*upi~Am31HI[');
define('LOGGED_IN_KEY',    '}HM<0SR:IIsZ-a2:VI7(ovSptPgzi.?eN_QCG,:gxTPc^%xlZ8>(WsoG(EE>-j&O');
define('NONCE_KEY',        '}zZHV,zM$JR4!}V?^v9C|Z<&$-40<)*Et`zI-*qj!oPtz(VMSSe&`eF7Q8>!?ui<');
define('AUTH_SALT',        'r40ud@#`2YaDo;Fu$DR=]]98]epg=gtC240$7Q1@`8/syx8KP_8/0UWdRLYuceUl');
define('SECURE_AUTH_SALT', '3]3 Ho<e~T$21I<g|eD.?kv ao%)t[lj!gD%9`W6B}@Ij<5y]X:+o3ZLmjNSi{]o');
define('LOGGED_IN_SALT',   '6F{X^JRjYbm|T;pD/,U{W8:IbacGr&g2Ww;YZLj5@-&[5]=iOss^v`$w1=t3Y;G`');
define('NONCE_SALT',       ',JRVXe.v~D=e;RWwr%vWB43wg5d{5iNl4y*,eluI*GuBDSV)FV!$d.I|X]Q:ke>5');

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
