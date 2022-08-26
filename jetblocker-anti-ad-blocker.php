<?php
/**
 * Main plugin entry point
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.codester.com/technodigitz?ref=technodigitz
 * @since             1.0.0
 * @package           jetblocker_anti_ad_blocker
 *
 * @wordpress-plugin
 * Plugin Name:       Jet Blocker - Anti Ad Blocker Detector
 * Plugin URI:        https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz
 * Description:       Jet Blocker is a powerful tool and money-saving plugin for websites created by WordPress
 * Version:           1.0.0
 * Author:            Techno Digitz
 * Author URI:        https://www.codester.com/technodigitz?ref=technodigitz
 * Text Domain:       jetblocker-anti-ad-blocker
 * Domain Path:       /languages
 * Requires at least: 4.9
 * Tested up to:      5.8
 * Requires PHP:      5.2.4
 *
 * Copyright 2021-2021 technodigitz (http://technodigitz.com/)
 */

/* If this file is called directly, abort. */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

define( 'jetblocker_anti_ad_blocker_VERSION', '1.0.0' );
define( 'JETBLOCKER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-jetblocker-anti-ad-blocker-activator.php
 */
function activate_jetblocker_anti_ad_blocker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jetblocker-anti-ad-blocker-activator.php';
	$activator = new jetblocker_anti_ad_blocker_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-jetblocker-anti-ad-blocker-deactivator.php
 */
function deactivate_jetblocker_anti_ad_blocker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jetblocker-anti-ad-blocker-deactivator.php';
	jetblocker_anti_ad_blocker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_jetblocker_anti_ad_blocker' );
register_deactivation_hook( __FILE__, 'deactivate_jetblocker_anti_ad_blocker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-jetblocker-anti-ad-blocker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_jetblocker_anti_ad_blocker() {

	$plugin = new jetblocker_anti_ad_blocker();
	$plugin->run();
}
run_jetblocker_anti_ad_blocker();



/**
 * New filter of row meta to show Docs link in the Plugins list table.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
add_filter( 'plugin_row_meta', 'jetblocker_row_meta', 10, 2 );
// Add a link to the plugin's settings and/or network admin settings in the plugins list table.
add_filter( 'plugin_action_links', 'jetblocker_add_settings_link', 10, 2 );
add_filter( 'network_admin_plugin_action_links', 'jetblocker_add_settings_link', 10, 2 );


/**
 * Filters the array of row meta for each plugin in the Plugins list table.
 *
 * @param array  $links         An array of the plugin's metadata, including the version, author, author URI, and plugin URI..
 * @param string $file          Path to the plugin file relative to the plugins directory.
 *
 * @since    1.0.0
 */
function jetblocker_row_meta( $links, $file ) {
	if ( plugin_basename( __FILE__ ) === $file ) {
		$row_meta = array(
			'Documentations' => '<a href="' . esc_url( 'https://technodigitz.com/docs/jetblocker' ) . '" target="_blank" aria-label="' . esc_attr__( 'Docs', 'jetblocker' ) . '" style="color:green;font-weight:bold">' . esc_html__( 'Docs', 'jetblocker' ) . '</a>',
		);

		return array_merge( $links, $row_meta );
	}
	return (array) $links;
};

/**
 * Add a link to the settings on the Plugins screen.
 *
 * @param array  $links         An array of the plugin's metadata, including the version, author, author URI, and plugin URI..
 * @param string $file          Path to the plugin file relative to the plugins directory.
 *
 * @since    1.0.0
 */
function jetblocker_add_settings_link( $links, $file ) {
	if ( plugin_basename( __FILE__ ) === $file ) {
		$url  = admin_url( '/admin.php?page=jetblocker-settings' );
		$url2 = 'https://www.codester.com/technodigitz?ref=technodigitz';

		// Prevent warnings in PHP 7.0+ when a plugin uses this filter incorrectly.
		$links   = (array) $links;
		$links[] = sprintf( '<a href="%s">%s</a>', $url, esc_html__( 'Settings', 'jetblocker' ) );
		$links[] = sprintf( '<a style="font-weight:bolder;color:red" href="%s">%s</a>', $url2, esc_html__( 'Premium!', 'jetblocker' ) );
	}
	return (array) $links;
}


if ( ! function_exists( 'jetblocker_plugin_activation' ) ) {
	/**
	 * Add action on plugin activation
	 */
	function jetblocker_plugin_activation() {
		// Add reviews metadata on plugin activation.
		$notices   = get_option( 'jetblocker_reviews', array() );
		$notices[] = '';
		update_option( 'jetblocker_reviews', $notices );
	}
}
register_activation_hook( __FILE__, 'jetblocker_plugin_activation' );



if ( ! function_exists( 'jetblocker_reviews_notices' ) ) {
	/**
	 * Display admin notice on Card Elements activation for ratings
	 */
	function jetblocker_reviews_notices() {
		$notices = get_option( 'jetblocker_reviews' );
		if ( $notices ) {
			foreach ( $notices as $notice ) { ?>
					<div class='notice notice-success is-dismissible jetblocker_notice'>
						<div class="header">
							<div class="heading">
								<img src="<?php echo esc_url( JETBLOCKER_PLUGIN_URL . '/assets/icon.png' ); ?>" />
								<h2><?php printf( esc_html__( 'JetBlocker - Anti AdBlock System', 'jetblocker' ) ); ?></h2>								
							</div>
							<p><?php printf( esc_html__( 'You are now using ', 'jetblocker' ) ); ?>
							<strong>
								&nbsp;<?php printf( esc_html__( 'JetBlock Anti AdBlocker Free', 'jetblocker' ) ); ?>&nbsp;
							</strong>
							<?php printf( esc_html__( ' plugin.', 'jetblocker' ) ); ?>&nbsp;
							<a href="https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz"  style="text-decoration:none;    font-weight: bold;padding-left: 10px;"><?php printf( esc_html__( 'Get Premium!', 'jetblocker' ) ); ?></a></p>
							<p><?php printf( esc_html__( 'Customize & Change settings of Jetblocker Anti AdBlock Detector\'s Notification Popup!', 'jetblocker' ) ); ?>
							<a class="jetblocker_btn_secondary" style="color: #000;text-decoration:none;font-weight: bold;    font-size: 15px;padding-left: 10px;" href="<?php printf( esc_url( admin_url( '/admin.php?page=jetblocker-settings' ) ) ); ?>">
									<?php printf( esc_html( 'Goto Settings' ) ); ?>
								</a>
							</p>
						</div>  
					</div>
					<?php
			}
			delete_option( 'jetblocker_reviews' );
		}
	}
	add_action( 'admin_notices', 'jetblocker_reviews_notices' );
}

if ( ! function_exists( 'jetblocker_plugin_deactivation' ) ) {
	/**
	 * Remove reviews metadata on plugin deactivation.
	 */
	function jetblocker_plugin_deactivation() {
		delete_option( 'jetblocker_reviews' );
	}
}
register_deactivation_hook( __FILE__, 'jetblocker_plugin_deactivation' );
