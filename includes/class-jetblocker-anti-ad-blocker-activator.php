<?php
/**
 * Fired during plugin activation
 *
 * @link       https://www.codester.com/technodigitz?ref=technodigitz/
 * @since      1.0.0
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/includes
 * @author     Danish Laeeq <info@technodigitz.com>
 */
class jetblocker_anti_ad_blocker_Activator {

	/**
	 * Update Default Options upon plugin first activation
	 *
	 * @since    1.0.0
	 */
	public function activate() {

		if ( ! get_option( 'jetblocker_switch' ) ) {
			update_option( 'jetblocker_switch', 'enabled' );
		}
		if ( ! get_option( 'jetblocker_fullscreen' ) ) {
			update_option( 'jetblocker_fullscreen', 'enabled' );
		}
		if ( ! get_option( 'jetblocker_heading' ) ) {
			update_option( 'jetblocker_heading', 'AdBlock Detected' );
		}
		if ( ! get_option( 'jetblocker_subheading' ) ) {
			update_option( 'jetblocker_subheading', 'It looks like you\'re using an ad-blocker!' );
		}
		if ( ! get_option( 'jetblocker_text' ) ) {
			update_option( 'jetblocker_text', 'Our team work realy hard to produce quality content on this website and we noticed you have ad-blocking enabled.' );
		}
		if ( ! get_option( 'whitelist_btn_text' ) ) {
			update_option( 'whitelist_btn_text', 'Whitelist Now' );
		}
		if ( ! get_option( 'jetblocker_donate_btn_text' ) ) {
			update_option( 'jetblocker_donate_btn_text', 'Donate $1 & Get Access' );
		}
		if ( ! get_option( 'jetblocker_donate_link' ) ) {
			update_option( 'jetblocker_donate_link', '#' );
		}
	}
}

