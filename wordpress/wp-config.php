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
define( 'DB_NAME', 'wordpress1' );

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
define( 'AUTH_KEY',         ',uV~YR]#({$4jhi>!EI/XpDLM8u*$;qGc)CYwE<^ZH)D;+Cbm43}BoQcRl (q:eU' );
define( 'SECURE_AUTH_KEY',  '.:-pm$)8sFDF.j7TK_{@XVS,F`U2YC d-~.M33ed5FAs!G,=Z8ER6Bm|oFbA3h,d' );
define( 'LOGGED_IN_KEY',    'a3se$paA9#H79]`T=Mqd+/bNcGUZO2T~e[/#MB/vZ|U:]%C:!,z~bLV6c}Ohe#h/' );
define( 'NONCE_KEY',        ',8ZIQ=S-rU]$1K?Wf2hu`([ulnKc%LOv)vb:Iu-l+AGYBWlJ`c`JO2?SJD `B*|i' );
define( 'AUTH_SALT',        ':]9G98o!1TL8Uh@~Wv:e-OR!}`wG9AV^!m )!q*T cDc#G9vM`Ra_=K0,?iIiv/o' );
define( 'SECURE_AUTH_SALT', '_K*~etvYWrr+@1=wE#<)!fa[TsD9ooCBk;VWSc#``K~U8aee]Zed*n:qZ#am7uNM' );
define( 'LOGGED_IN_SALT',   'wYvVAC%+&zJx9$U]Q=_fc{N]Dfp{26>DL2Iijy7:Mt([J*3:R;mvG#v/u{}H/NFu' );
define( 'NONCE_SALT',       '^{E#?CAw|)R;MXD@TjeC6^{p_yO$u{RwC#L=3LNrT?A`a>&cWB$He0s4QqI y:YB' );

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
