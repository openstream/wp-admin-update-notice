<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.openstream.ch
 * @since             1.0.0
 * @package           Wpadminupdatenotice
 *
 * @wordpress-plugin
 * Plugin Name:       WP Admin Update Notice
 * Plugin URI:        www.openstream.ch
 * Description:       This Plugin allows you to modify the text which will be send by WordPress after an auto update.
 * Version:           1.1.0
 * Author:            Openstream Internet Solutions
 * Author URI:        http://www.openstream.ch
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpadminupdatenotice
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpadminupdatenotice-deactivator.php
 */
function deactivate_wpadminupdatenotice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpadminupdatenotice-deactivator.php';
	Wpadminupdatenotice_Deactivator::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_wpadminupdatenotice');



/**
 * The code that runs during plugin deleteion.
 * This action is documented in includes/class-wpadminupdatenotice-uninstall.php
 */
function uninstall_wpadminupdatenotice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpadminupdatenotice-uninstall.php';
	Wpadminupdatenotice_Uninstaller::uninstall();
}

register_uninstall_hook(__FILE__, 'uninstall_wpadminupdatenotice');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpadminupdatenotice.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpadminupdatenotice() {

	$wpaun = new Wpadminupdatenotice();
	$wpaun->run();

}
run_wpadminupdatenotice();
