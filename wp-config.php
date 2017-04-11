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
define('AUTH_KEY',         'X`cH!xuR V;rd]OxK<^PY;,lvpBl}(~Gd)PllyjI5s~N?%P<@VzgE~9;0ePC1gu7');
define('SECURE_AUTH_KEY',  'o#0GK%/e@B?Q FdVV`6c:o*7R.cP7lV1tOSi.rw0G/>_sWCgGz6Qoq4X&_-lu$O+');
define('LOGGED_IN_KEY',    'qdn+3{<eJTraYYt?vYID)*q<OIp[he+}k50Pw{#EB+ -kqV=M0ny~zI2sj4PNC{q');
define('NONCE_KEY',        'de#`7k/NUbeyEauwr[&fw.|DxuZ;pTiV_^RkC@FR[JUiZU?HV-#!D:6%Pwo|sKgt');
define('AUTH_SALT',        'aX~H~7q{(t8qHO2KVS?7Rg1!KZ5~<Ur>^,DsN@tK[.)3qO` Ret s]0DK:0;91C`');
define('SECURE_AUTH_SALT', 'jIbvEGKP{U+_cmFs:r#q~_H+o.v?`a}uCY$,V=p`Q}_|Q^}2a+cYvwXTUgg`.gT-');
define('LOGGED_IN_SALT',   'q6h95UP_n*Yv0=1K&E/{Tsl{Y=E07S6]HMgV-|fWq4i{M-I}6p1vPZZ8oUc7hV]%');
define('NONCE_SALT',       'q@`AzpwoQd>g0JU2d`4u&HjMyE81A%%$rkev7jrE9[H0mEACV+H.?q~UKw7 {B)Y');

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
