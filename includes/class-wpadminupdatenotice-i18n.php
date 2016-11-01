<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.openstream.ch
 * @since      1.0.0
 *
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/includes
 * @author     Sandro Lucifora <sandro@openstream.ch>
 */
class Wpadminupdatenotice_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wpadminupdatenotice',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
