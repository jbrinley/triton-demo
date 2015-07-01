<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( __DIR__ . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( __DIR__ . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
}



$config_defaults = array(

	// Database
	'DB_NAME'                 => getenv( 'WP_DB_NAME' ),
	'DB_USER'                 => getenv( 'WP_DB_USER' ),
	'DB_PASSWORD'             => getenv( 'WP_DB_PASSWORD' ),
	'DB_HOST'                 => getenv( 'WP_DB_HOST' ),
	'DB_CHARSET'              => 'utf8',
	'DB_COLLATE'              => '',

	// Paths
	'WP_CONTENT_DIR'          => dirname( __FILE__ ) . '/content',
	'WP_CONTENT_URL'          => 'http://' . $_SERVER['HTTP_HOST'] . '/content',
	'ABSPATH'                 => dirname( __FILE__ ) . '/wp/',

	// Multisite
	//'WP_ALLOW_MULTISITE'    => true,
	//'MULTISITE'             => true,
	//'SUBDOMAIN_INSTALL'     => false,
	//'DOMAIN_CURRENT_SITE'   => '%%PRIMARY_DOMAIN%%',
	//'PATH_CURRENT_SITE'     => '/',
	//'SITE_ID_CURRENT_SITE'  => 1,
	//'BLOG_ID_CURRENT_SITE'  => 1,

	// Language
	'WPLANG'                  => '',

	// Security Hashes (grab from: https://api.wordpress.org/secret-key/1.1/salt)
	'AUTH_KEY'                => '%%AUTH_KEY%%',
	'SECURE_AUTH_KEY'         => '%%SECURE_AUTH_KEY%%',
	'LOGGED_IN_KEY'           => '%%LOGGED_IN_KEY%%',
	'NONCE_KEY'               => '%%NONCE_KEY%%',
	'AUTH_SALT'               => '%%AUTH_SALT%%',
	'SECURE_AUTH_SALT'        => '%%SECURE_AUTH_SALT%%',
	'LOGGED_IN_SALT'          => '%%LOGGED_IN_SALT%%',
	'NONCE_SALT'              => '%%NONCE_SALT%%',

	// Security Directives
	'DISALLOW_FILE_EDIT'      => true,
	'DISALLOW_FILE_MODS'      => true,
	'FORCE_SSL_LOGIN'         => false,
	'FORCE_SSL_ADMIN'         => false,

	// Performance
	'WP_CACHE'                => false,
	'DISABLE_WP_CRON'         => true,
	'WP_MEMORY_LIMIT'         => '96M',
	'WP_MAX_MEMORY_LIMIT'     => '256M',
	'EMPTY_TRASH_DAYS'        => 7,
	'WP_MEMCACHED_KEY_SALT'   => 'tribe',

	// Debug
	'WP_DEBUG'                => true,
	'WP_DEBUG_LOG'            => true,
	'WP_DEBUG_DISPLAY'        => true,
	'SAVEQUERIES'             => true,
	'SCRIPT_DEBUG'            => true,
	'CONCATENATE_SCRIPTS'     => false,
	'COMPRESS_SCRIPTS'        => false,
	'COMPRESS_CSS'            => false,

	// Miscellaneous
	'WP_POST_REVISIONS'       => true,
	'WP_DEFAULT_THEME'        => 'twentyfifteen',
);

// ==============================================================
// Assign default constant value overrides for production
// ==============================================================

if ( !WP_LOCAL_DEV ) {
	$config_defaults['WP_CACHE']            = true;
	$config_defaults['WP_DEBUG']            = false;
	$config_defaults['WP_DEBUG_LOG']        = false;
	$config_defaults['WP_DEBUG_DISPLAY']    = false;
	$config_defaults['SAVEQUERIES']         = false;
	$config_defaults['CONCATENATE_SCRIPTS'] = true;
	$config_defaults['COMPRESS_SCRIPTS']    = true;
	$config_defaults['COMPRESS_CSS']        = true;
}

// ==============================================================
// Use defaults array to define constants where applicable
// ==============================================================

foreach ( $config_defaults AS $config_default_key => $config_default_value ) {
	if ( ! defined( $config_default_key ) ) {
		define( $config_default_key, $config_default_value );
	}
}

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================

if ( empty( $table_prefix ) ) {
	$table_prefix = 'wp_';
}

// ==============================================================
// Manually back up the WP_DEBUG_DISPLAY directive
// ==============================================================

if ( ! defined( 'WP_DEBUG_DISPLAY' ) || WP_DEBUG_DISPLAY == false ) {
	ini_set( 'display_errors', 0 );
}

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) ) {
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );
}

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
