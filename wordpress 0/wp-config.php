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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'N#gnq4.BPc-QcC!.wsxESXOj=oW#sZRnnhH)g{4:rB!JS=TwwI9:Tri6!5C0Oi.5' );
define( 'SECURE_AUTH_KEY',  '.loX4ZW:q{JUz8:o)*`%_OG]l{U7:^s#tW,sZ*x};1uoTK75rU*mrtgh1U7:un)^' );
define( 'LOGGED_IN_KEY',    '/-38WWEv=HH [k<dc[uaXgynPj$NmvmcPE3B_i[.X3/),-ve/Xm/[!M0vl@@>Y1m' );
define( 'NONCE_KEY',        'x!|K2{PZ?l?7DDIdZC-X&n-DcKHAkqYeu1>$zyu9,__Ppl6])Xuw?V4Lyb~l)#,$' );
define( 'AUTH_SALT',        '`=8xdPF@U,GkKoA<i1lMA&8W2Ne[9J-Z*c}}}{ro2{|jmVOrIuG7{X=3)l@;CojY' );
define( 'SECURE_AUTH_SALT', 'x*mk+Qy6~<jBiWg 911n%..5d &zmzc2,riDL!IU5Vlp%U:pjk3;!HunfYB9^+8{' );
define( 'LOGGED_IN_SALT',   '0LaC7q73lm-+7*%iSh:t^rkPSi4m88b3WjdL>X,e%[PHF3-ZyuUL8]Lff@aPS:=:' );
define( 'NONCE_SALT',       '(NNUT3v+K}Jo;p1JaT!OTgJ=/qlla^e<0,4-h.@sljHla%3e={+;vWDY0gtW]96q' );

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
