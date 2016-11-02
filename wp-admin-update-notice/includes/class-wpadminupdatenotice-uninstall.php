<?php

/**
 * Fired during plugin uninstallation
 *
 * @link       http://www.openstream.ch
 * @since      1.0.0
 *
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/includes
 */

/**
 * Fired during plugin uninstallation.
 *
 * This class defines all code necessary to run during the plugin's uninstallation.
 *
 * @since      1.0.0
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/includes
 * @author     Sandro Lucifora <sandro@openstream.ch>
 */
class Wpadminupdatenotice_Uninstaller {

	/**
	 * @since    1.0.0
	 */
	public static function uninstall() {

		// erase plugin option if flag is set
		$options = ( get_option( 'wpaun' ) );
		if ( $options['delete_settings'] == 'yes' )
			delete_option('wpaun');

	}

}
