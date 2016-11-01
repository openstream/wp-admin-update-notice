<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://www.openstream.ch
 * @since      1.0.0
 *
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/includes
 * @author     Sandro Lucifora <sandro@openstream.ch>
 */
class Wpadminupdatenotice_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		remove_filter( 'auto_core_update_email', 'filter_auto_core_update_email', 10, 4 ); 
	}

}
