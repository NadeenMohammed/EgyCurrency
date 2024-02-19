<?php
define('WP_CACHE', false ); // Added by AirLift

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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'egcurrency' );

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
define( 'AUTH_KEY',         '<!Qf$(r<f1b rbX0/uVNZwhi[}{pMv9*WPURyl6]Pi!*($^UEw@4s0#~EB|GldNF' );
define( 'SECURE_AUTH_KEY',  'J?2#HsJgcS+xBy~~<tfa$-RX3CDGR@iBCJ2rbW]^X#YCqJ[(?Gl=gq@%]bro,Hu,' );
define( 'LOGGED_IN_KEY',    'HSCS4z.sb0n,NO#o#[a-^Q7lAG!<mQD^Q)<Njird.uXY4VI[E&jU[ew/E7S`zD:8' );
define( 'NONCE_KEY',        '},$iBY49K2Aix+qhr_?J1+.zT*eZ/VXU*-D^&/iBmOOstseB-77y!bo`/fk-tb?m' );
define( 'AUTH_SALT',        'Q|raiIL]xA<275~d|N%UFvM!.uQZ)Zn8,+xhl|FU fnE5(zJt]o`dOfvgTekXBI%' );
define( 'SECURE_AUTH_SALT', 'fm(Q5Mmnb@Iv;],7Ar(G0!^Hk(3tYR/J@(7l@6_Jp:#J3~h_(&4KRyN{$*79`@[J' );
define( 'LOGGED_IN_SALT',   'dA6uNs_ot8J;+?DOhh-;Jj/BW,(/V[1<GQruA6.,x0j-kZ@W%+@q^p[_0#LQ_{Gu' );
define( 'NONCE_SALT',       '3@2?p!!V|(mj(B)^p!G6,-Q4+K{0<e_ai=4*(h)ueBHbkg]#M2W=n-v{,%W<eo#6' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
