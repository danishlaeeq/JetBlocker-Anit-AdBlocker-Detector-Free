<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.codester.com/technodigitz?ref=technodigitz/
 * @since      1.0.0
 *
 * @package    jetblocker_anti_ad_blocker
 * @subpackage jetblocker_anti_ad_blocker/admin/partials
 *
 * This file should primarily consist of HTML with a little bit of PHP.
 */

/*
 * The admin notices
 *
 * @since   1.0
 */

if ( ! is_admin() ) : ?>

	<h1 style="text-transform: uppercase;">
		<?php printf( esc_html__( 'Sorry You Are Not Allowed to Edit These Settings', 'jetblocker' ) ); ?>
	</h1>

<?php else : ?>

	<?php
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
	?>
	<div class="wrap jetblocker_settings">
		<h1 style="text-transform: uppercase;">
			<?php printf( esc_html( get_admin_page_title() ) ); ?>
		</h1>
		<!-- Displaying errors & messages -->
		<?php settings_errors(); ?>


		<div class="header">
			<div class="heading">
				<img src="<?php echo esc_url( JETBLOCKER_PLUGIN_URL . '/assets/icon.png' ); ?>" />
				<h2>JetBlocker - Anti AdBlock System</h2>
			</div>
			<p><?php printf( esc_html__( 'Here you can customize & Change settings of Jetblocker Anti AdBlock Detector\'s Notification Popup!', 'jetblocker' ) ); ?></p>
			<p><?php printf( esc_html__( 'Use custom text to show on popup notification.', 'jetblocker' ) ); ?></p>
		</div>  


		<!-- Tabs -->
		<div class="wrap tab-content">
			<!-- Tabs Navigation -->
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#general"><?php printf( esc_html__( 'General Settings', 'jetblocker' ) ); ?></a>
				</li>
			</ul>

			<!-- General Settings Tab -->
			<div id="general" class="tab-pane active">
				<form method="POST" action="options.php">
					<?php settings_fields( 'jetblocker_general_options' ); ?>
					<?php do_settings_sections( 'general' ); ?>

					<h1 style="margin-top: 2rem;"><b><?php printf( esc_html__( 'General Settings', 'jetblocker' ) ); ?></b></h1>
					<table class="form-table" role="presentation">
						<tbody>
							<tr>
								<th scope="row"><label for="jetblocker_switch"><?php printf( esc_html__( 'Enable JetBLocker:' ) ); ?></label></th>
								<td>
									<label class="control control--checkbox">
										<input type="checkbox" name="jetblocker_switch" id="jetblocker_switch" value="enabled"
										<?php checked( 'enabled', get_option( 'jetblocker_switch' ) ); ?> />
										<div class="control__indicator"></div>
									</label>
								</td>
							</tr>
							<tr>
							<th scope="row"><label for="enable_donate_btn"><?php printf( esc_html__( 'Enable Donate Button:' ) ); ?></label></th>
								<td>
									<a href="https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz" style="color:red;font-weight:bold;text-decoration:none;font-size:16px;">
										<?php printf( esc_html__( 'Upgrade', 'jetblocker' ) ); ?></a>
								</td>
							</tr>
							<tr>
								<th scope="row"><label for="jetblocker_fullscreen"><?php printf( esc_html__( 'Full Screen Mode:' ) ); ?></label></th>
								<td>
									<a href="https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz" style="color:red;font-weight:bold;text-decoration:none;font-size:16px;">
										<?php printf( esc_html__( 'Upgrade', 'jetblocker' ) ); ?></a>
								</td>
							</tr>

							<tr>
								<th scope="row"><?php printf( esc_html__( 'Heading:', 'jetblocker' ) ); ?></th>
								<td>
									<input type="text" name="jetblocker_heading" id="jetblocker_heading" placeholder="eg. AdBlock Detected"
									value="<?php printf( esc_html( get_option( 'jetblocker_heading' ) ) ); ?>" required>
								</td>
							</tr>
							<tr>
								<th scope="row"><?php printf( esc_html__( 'Sub Heading:', 'jetblocker' ) ); ?></th>
								<td>
									<input type="text" name="jetblocker_subheading" id="jetblocker_subheading" placeholder="eg. It looks like you're using an ad-blocker!" 
									value="<?php printf( esc_html( get_option( 'jetblocker_subheading' ) ) ); ?>" required>
								</td>
							</tr>
							<tr>
								<th scope="row"><?php printf( esc_html__( 'Paragraph Text:', 'jetblocker' ) ); ?></th>
								<td>
									<input type="text" name="jetblocker_text" id="jetblocker_text" placeholder="eg. Business Insider is an advertising supported site and we noticed you have ad-blocking enabled." 
									value="<?php printf( esc_html( get_option( 'jetblocker_text' ) ) ); ?>" required>
								</td>
							</tr>
							<tr>
								<th scope="row"><?php printf( esc_html__( 'Whitelist Button Text:', 'jetblocker' ) ); ?></th>
								<td>
									<a href="https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz" style="color:red;font-weight:bold;text-decoration:none;font-size:16px;">
									<?php printf( esc_html__( 'Upgrade', 'jetblocker' ) ); ?></a>
								</td>
							</tr>
							<tr>
								<th scope="row"><?php printf( esc_html__( 'Secondary Button Text:', 'jetblocker' ) ); ?></th>
								<td>
								<a href="https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz" style="color:red;font-weight:bold;text-decoration:none;font-size:16px;">
									<?php printf( esc_html__( 'Upgrade', 'jetblocker' ) ); ?></a>
								</td>
							</tr>
							<tr>
								<th scope="row"><?php printf( esc_html__( 'Secondary Button Link:', 'jetblocker' ) ); ?></th>
								<td>
								<a href="https://www.codester.com/items/38669/jetblocker-anti-adblock-wordpress-plugin?ref=technodigitz" style="color:red;font-weight:bold;text-decoration:none;font-size:16px;">
									<?php printf( esc_html__( 'Upgrade', 'jetblocker' ) ); ?></a>
								</td>
							</tr>
							
						</tbody>
					</table>

					<?php wp_nonce_field( 'jetblocker_general_options', 'jetblocker_general_nonce' ); ?>
					<?php submit_button( 'Save Settings', 'primary', 'jetblocker_general', true, null ); ?>
				</form>
			</div>
		</div>
	</div>
<?php endif ?>
