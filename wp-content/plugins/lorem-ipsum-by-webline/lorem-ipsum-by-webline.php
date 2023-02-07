<?php
/**
 * Plugin Name: Lorem Ipsum by Webline
 * Plugin URI: http://www.weblineindia.com
 * Description: A Simple plugin to generate lorem ipsum dummy text using shortcode.
 * Author: weblineindia
 * Version: 1.0.4
 * Author URI: http://www.weblineindia.com
 * License: GPL
 */

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

require_once ( ABSPATH . 'wp-admin/includes/plugin.php' );

$plugin_data = get_plugin_data( __FILE__ );

define( 'WLI_LOREM_VERSION', $plugin_data['Version'] );
define( 'WLI_LOREM_DEBUG', FALSE );
define( 'WLI_LOREM_PATH', plugin_dir_path( __FILE__ ) );
define( 'WLI_LOREM_URL', plugins_url( '', __FILE__ ) );
define( 'WLI_LOREM_PLUGIN_FILE', basename( __FILE__ ) );
define( 'WLI_LOREM_PLUGIN_DIR', plugin_basename( dirname( __FILE__ ) ) );
define( 'WLI_LOREM_ADMIN_DIR', WLI_LOREM_PATH . 'Public' );

require_once ( WLI_LOREM_ADMIN_DIR . '/class/hook.php' );

require_once ( WLI_LOREM_ADMIN_DIR . '/class/lorem-ipsum-wli.php' );

require_once ( WLI_LOREM_ADMIN_DIR . '/inc/shortcode.php' );
?>
