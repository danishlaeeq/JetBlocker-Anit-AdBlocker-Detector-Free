<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.codester.com/technodigitz?ref=technodigitz/
 * @since      1.0.0
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/includes
 * @author     Danish Laeeq <info@technodigitz.com>
 */
class jetblocker_anti_ad_blocker_I18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'jetblocker',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
