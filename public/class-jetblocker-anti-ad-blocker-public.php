<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.codester.com/technodigitz?ref=technodigitz/
 * @since      1.0.0
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/public
 * @author     Danish Laeeq <info@technodigitz.com>
 */
class jetblocker_anti_ad_blocker_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		if ( get_option( 'jetblocker_switch' ) === 'enabled' ) {

			wp_enqueue_style( 'jetblocker_style', JETBLOCKER_PLUGIN_URL . 'assets/css/jetblocker.css', array(), $this->version, 'all' );
		
		}


	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		if ( get_option( 'jetblocker_switch' ) === 'enabled' ) {

			if ( ! wp_script_is( 'jquery', 'enqueued' ) ) {
				// if Jquery is not loaded Enqueue.
				wp_enqueue_script( 'jquery', JETBLOCKER_PLUGIN_URL . 'assets/js/jquery-3.6.0.min.js', array(), $this->version, true );
			}

			wp_enqueue_script( 'jetblocker_script', JETBLOCKER_PLUGIN_URL . 'assets/js/jetblock-scripts.js', array(), $this->version, true );
		}
	}


	/**
	 * Register the HTML to display on the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function jetblocker_display() { ?>

		<?php if ( get_option( 'jetblocker_switch' ) === 'enabled' ) : ?>	

			
			<div id="jetblocker-detect"></div>
				<div class="jetblocker_overlay
					<?php if ( get_option( 'jetblocker_fullscreen' ) == 'enabled' ): ?>
						full
					<?php endif; ?> 
				"></div>
				<div class="jetblocker-wrapper
					<?php if ( get_option( 'jetblocker_fullscreen' ) == 'enabled' ): ?>
						full
					<?php endif; ?>
					">
					<div class="jetblocker-content">
						<h1><?php echo esc_html( get_option( 'jetblocker_heading' ) ); ?></h1>
						<h2><?php echo esc_html( get_option( 'jetblocker_subheading' ) ); ?></h2>
						<p><?php echo esc_html( get_option( 'jetblocker_text' ) ); ?></p>
					<div class="jetblocker-btn-box">
						<button class="jetblocker-btn-o jetblock-whitelist-btn"><?php echo esc_html( get_option( 'whitelist_btn_text' ) ); ?></button>
					</div>
				</div>
			</div><!-- .wrapper -->

		<?php endif; ?>
		<?php
	}

}
