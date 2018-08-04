<?php
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

// $onGae is true on production.
if (isset($_SERVER['SERVER_SOFTWARE'])
    && strpos($_SERVER['SERVER_SOFTWARE'], 'Google App Engine') !== false) {
    $onGae = true;
} else {
    $onGae = false;
}

// Cache settings
define('WP_CACHE', true);
$batcache = [
    'seconds' => 0,
    'max_age' => 30 * 60, // 30 minutes
    'debug' => false
];

// Disable pseudo cron behavior
define('DISABLE_WP_CRON', true);

// Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) {
    $protocol_to_use = 'https://';
} else {
    $protocol_to_use = 'http://';
}
if (isset($_SERVER['HTTP_HOST'])) {
    define('HTTP_HOST', $_SERVER['HTTP_HOST']);
} else {
    define('HTTP_HOST', 'localhost');
}
define('WP_SITEURL', $protocol_to_use . HTTP_HOST);
define('WP_HOME', $protocol_to_use . HTTP_HOST);

// ** MySQL settings - You can get this info from your web host ** //
if ($onGae) {
    /** The name of the Cloud SQL database for WordPress */
    define('DB_NAME', 'wordpress');
    /** Production login info */
    define('DB_HOST', ':/cloudsql/utd-bis-exams:us-central1:wordpress');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'todosabordo');
} else {
    /** The name of the local database for WordPress */
    define('DB_NAME', 'wordpress');
    /** Local environment MySQL login info */
    define('DB_HOST', ':/cloudsql/utd-bis-exams:us-central1:wordpress');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'todosabordo');
}

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
define('AUTH_KEY',         'lEZRWb5ZiVsgJST4YqhKXA7jrbMBKpK5PVH/goos69EAu06rNnx302n7x3QHWMhr98h0RdKydB/aOwvi');
define('SECURE_AUTH_KEY',  'Wt+XmJxoNaCPdqSv+imd7uU0JGpaatI0s15u1OzI2ajw+Z2uqYEy9rN4lyLmlpfRpZwoOXPnTYsbCLFI');
define('LOGGED_IN_KEY',    'YUSVchLPp14iZ5//4Yu9e3ZutLswDvtQbHUiAlrveXYC3DGmgwW94WPmPn7UBQ1nEIjMXF+DoGxnxyVL');
define('NONCE_KEY',        'yzq+zCHSI+9XUsnw7eB97zdfr5CxUOwT5VPYEvxcGl9PucFXznipbyu/wCmFD3QCsbZDrbjdRo5XO/iw');
define('AUTH_SALT',        '1GFym/jfmK/QHQdVaAs+EVAYot4KhZS4RSwesxwAMa6v7dKSeODzY7o2IttJPfBDAmaNAl0aW0r+vLxF');
define('SECURE_AUTH_SALT', 'CZ0J2NJa3BFyjKF3bQM7frhJ10bdg0NKehKjHM+F3O894MemJdRvmjS1uvsotNVgzpE1ZhQzQd8PC2aN');
define('LOGGED_IN_SALT',   'folafVMivY08EobQoaZp6GBZaJN2OPeUqDqT/5aEqnQwTTtIyjI4O2mdNPaJT6U4LKYPUnxpHN1WI5BG');
define('NONCE_SALT',       'ZJxfa/vq11wTWFqOjb9HJIFz6v6vwmPYYFzX0JUVgwGxvSGiJ5O23ezOxRc1VE2iobedXnzeGwCQTaWF');

/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', !$onGae);

/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
