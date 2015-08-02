<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', 'H:\BitNami\wampstack\apache2\htdocs\Kungfuphp.local\kungfuphp\wp-content\plugins\wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'kungfuphp');

/** MySQL database username */
define('DB_USER', 'thanhnhat');

/** MySQL database password */
define('DB_PASSWORD', 'nhat123');

/** MySQL hostname */
define('DB_HOST', '210.211.117.48');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

//Xoa Revision
define('AUTOSAVE_INTERVAL', 300 ); // seconds
define('WP_POST_REVISIONS', false );


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ' lf)`Il|v*.&?jE9dD>5a`A]tlaqo.z[C)Zd@$){D><0XAETBu@|R04?7PoB7F7p');
define('SECURE_AUTH_KEY',  'w^NIW5K}[h1[62^ypX@z/DWh:>iwu.v8YGu2S|LT(f;t1cf+%wQD^}N(9`cm1>&6');
define('LOGGED_IN_KEY',    'aCsVuzR-ipK]KG-U$Z{*Rl]mC0U55Mq6~SgG}Mm-F` Z:jpiTWzh44cGqd-vi,NF');
define('NONCE_KEY',        'Nd&sA-s7LEmMIA5X@2Yh7+_J;;#|{WB7([Ux[RoOr>K}!0e|;|B{AGjW6?WQ7`OU');
define('AUTH_SALT',        '$x)A<Q([wiQ8O1a!6YO[|Iz-#sRh>m&h!!h74RO#}echXis$VnN&XKf+[gR(UR<E');
define('SECURE_AUTH_SALT', 'GzQ],cPy7^vKY.)m-GLywaiq>-pQD]+N=iC[n v/Xlk2^)E<rXWRdL=v);Tg&c}4');
define('LOGGED_IN_SALT',   'xu}9O!E+]%PA68Pwuo QO!P8)vOX;{m;+2(K+0H9^XLpz{1)Tn>{)3bz~_nofF5%');
define('NONCE_SALT',       'dahrd|xMW|B6FZh,W+r+*QF0c?/^Nehm]]-LV%3p1Xa3a}o<Pdj`E= A^70`3#@R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


