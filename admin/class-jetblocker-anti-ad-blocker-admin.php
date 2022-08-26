<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.codester.com/technodigitz?ref=technodigitz/
 * @since      1.0.0
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/admin
 * @author     Danish Laeeq <info@technodigitz.com>
 */
class jetblocker_anti_ad_blocker_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in jetblocker_anti_ad_blocker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The jetblocker_anti_ad_blocker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jetblocker-admin-styles-css.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in jetblocker_anti_ad_blocker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The jetblocker_anti_ad_blocker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jetblocker-anti-ad-blocker-admin.js', array( 'jquery' ), $this->version, false );

	}




	/**
	 * Add menu page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function jetblocker_menu() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in jetblocker_anti_ad_blocker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The jetblocker_anti_ad_blocker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_menu_page(
			'JetBlocker - Anti AdBlock Detect Settings',             // Page Title.
			'JetBlocker',             // Menu Title.
			'manage_options',                           // capability.
			'jetblocker-settings',                            // Menu slug.
			array( $this, 'jetblocker_settings_display' ),                 // callback function.
			'dashicons-superhero'			// icon.
		);
	}


	/**
	 * Display Admin Settings Page Data
	 *
	 * @since    1.0.0
	 */
	public function jetblocker_settings_display() {
		// return views.
		require 'partials/jetblocker-anti-ad-blocker-admin-display.php';
	}


	/**
	 * Resgiter Settings Fields
	 *
	 * @since    1.0.0
	 */
	public function jetblocker_register_settings() {

		// General Section.
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_switch'               // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_fullscreen'               // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'wpcd_skin'                 	  // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_heading'              // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_subheading'           // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_text'             	  // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'whitelist_btn_text'              // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_donate_btn_text'      // Setting name = html form <input> name on settings form.
		);
		register_setting(
			'jetblocker_general_options',     // Group Name.
			'jetblocker_donate_link'          // Setting name = html form <input> name on settings form.
		);

		if ( isset( $_POST['jetblocker_general'] ) && current_user_can( 'manage_options' ) ) {
			if ( wp_verify_nonce( isset( $_POST['jetblocker_general_nonce'] ), 'jetblocker_general_options' )
			) {
				print 'Nonce Failed!';
				exit;
			} else {
				update_option(
					'jetblocker_anti_ad_blocker',
					array(
						'jetblocker_switch'       => isset( $_POST['jetblocker_switch'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_switch'] ) ) : '',
						'jetblocker_fullscreen'       => isset( $_POST['jetblocker_fullscreen'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_fullscreen'] ) ) : '',
						'jetblocker_heading'  => isset( $_POST['jetblocker_heading'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_heading'] ) ) : '',
						'jetblocker_subheading'   => isset( $_POST['jetblocker_subheading'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_subheading'] ) ) : '',
						'jetblocker_text' => isset( $_POST['jetblocker_text'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_text'] ) ) : '',
						'whitelist_btn_text'  => isset( $_POST['whitelist_btn_text'] ) ? sanitize_text_field( wp_unslash( $_POST['whitelist_btn_text'] ) ) : '',
						'jetblocker_donate_btn_text'  => isset( $_POST['jetblocker_donate_btn_text'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_donate_btn_text'] ) ) : '',
						'jetblocker_donate_link'  => isset( $_POST['jetblocker_donate_link'] ) ? sanitize_text_field( wp_unslash( $_POST['jetblocker_donate_link'] ) ) : '',
					)
				);
			}
		}
	}

}
