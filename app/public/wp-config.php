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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'gf35edjBdWwjwky1ZCiY8OfPOcQMLXbMedPDB1TwXzSRBHICR8OqU88l8tkQC/qx0PZriIir8bynb2/SB+yzqw==');
define('SECURE_AUTH_KEY',  'eUmWdRtE9UTQSqjbgr5D/NXvm2BHtYo8AtG9i8ptT9526g+C2a7KCeGd9yKTfiYzMhMVaZdNcMuomNQlYgj/gA==');
define('LOGGED_IN_KEY',    'OXcDRpc+yosfo5SOCCOTNJ3gJn/w0Pyx7LwKrz7fQq4eIuGleHkXACQaG0jdCVTE27SlkTvZrLyRvbon1G1+hg==');
define('NONCE_KEY',        'e28BVoscBsHGvH++YxPVlJYv+qEl0rFanGYzComHmMaT1xgLeOlpNmB8HuDa7GK6FcjYaKosj56Q6fv92j3KZA==');
define('AUTH_SALT',        'YsWOWPa6ITaFoYJzgHPfFpYi+hplIyOM1mP8QTduW4o/nrg9u2+3SXXWWBA1A0C8Xub1IXmjv178KtSKDew8CA==');
define('SECURE_AUTH_SALT', 'aMWH+M8ePumO7erHNxobVohT8xQiLm1XSQ6kYJoqrb/f1oB5GlOCdxaa+u+qBBr1umpJkdrXQcVGB5byS4CeOg==');
define('LOGGED_IN_SALT',   'AhvATtTmG75hAKlVI8m55javqA330an5KvTnRGMjxtE4UBkmc9MSLIWj1UNbAXg/onxkInGbRYoSCLZkgfHb8A==');
define('NONCE_SALT',       'LKLjfkCRPcBfy6zwf131HusIiXvdECuqd2sf4OFMAFEo3OY4yDdfXSGDKphYUDF0QZ9vZRehsfcgP6X6GmEr4w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
