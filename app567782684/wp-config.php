<?php

define('FS_METHOD', 'direct');
define('DISALLOW_FILE_EDIT', true);
define('WP_HOME', 'http://agileglobalsolutions.com/');
define('WP_SITEURL', 'http://agileglobalsolutions.com/');















































































/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db550062316' );

/** MySQL database username */
define( 'DB_USER', 'dbo550062316' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wypJmcF5' );

/** MySQL hostname */
define( 'DB_HOST', 'db2042.perfora.net' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '!x&C$w$w#QJC%M0hHKRx^uIKbVf&&mo@mWsB5Iy1*NPzSEv7C3WZ$!yN8Ve2dSDP');
define('SECURE_AUTH_KEY',  'cqZqbz!LeortgmLvrkt%AovJRtuP#eL*UDe^Pae2j(OYaM*#eVScTbPX)v6Nsz(j');
define('LOGGED_IN_KEY',    ')Zfic0Iw4zoE@sPUan6famUotRFF7XUDrk5CK2A^VL%wxWnjM(Db^^Rdwu7h@ehw');
define('NONCE_KEY',        'ad#KD&AOO)9#nwBTBXnBnn)ub&paXu0RuuX6Qp*CZOONzhhx0WwN0kysI)n1y)OS');
define('AUTH_SALT',        '%GC6%VU3e*no)QYPYTcQY%Ydt^Gx%%M6qIU&27x1vwy^(Oa1J*Ri^m6OjXQ0^2HB');
define('SECURE_AUTH_SALT', 'F8$Ebx7hIqYkssGj)Tf4p)@XJpL5djF4N@Sj$Q6tB0k9J8Dkw0I6bXLCPsYG2CAg');
define('LOGGED_IN_SALT',   'FzC6E4j%H00g^HSzNK@Bve0O6C$G(Yi^3Q(z1T4iQW3l2wwYiAbdPS$ZtK#^SC%*');
define('NONCE_SALT',       ')nGnDBvOc)C)(P42tI*EwK3MLYOtb&zHHL7ytrR86thtEHMK28BnydJ7qW6h(RSU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'u5yuikrjy5';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/**
 * Disable the Plugin and Theme Editor.
 *
 * Occasionally you may wish to disable the plugin or theme editor to prevent
 * overzealous users from being able to edit sensitive files and potentially crash the site.
 * Disabling these also provides an additional layer of security if a hacker
 * gains access to a well-privileged user account.
 */

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
