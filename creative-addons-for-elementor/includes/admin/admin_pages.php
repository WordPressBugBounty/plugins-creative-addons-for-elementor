<?php
namespace Creative_Addons\Includes\Admin;

use Elementor\Utils;
use Creative_Addons\Includes\Utilities;
use Creative_Addons\Includes\Utilities_Plugin;
use Creative_Addons\Includes\Widgets_Manager;
use Creative_Addons\Widgets;
use Creative_Addons\Includes\HTML_Elements;
use Creative_Addons\Includes\System\Logging;
use Creative_Addons\Includes\Kb\KB_Utilities;
use WP_Theme;

defined( 'ABSPATH' ) || exit();

/**
 * Display admin pages
 *
 */
class Admin_Pages {
	
	public function show_dashboard() {

		$active_tab = Utilities::get('tab', 'home'); 	?>

		<div class="crel-dashboard">

			<div class="crel-dashboard__tabs">

				<!-- Tabs -->
				<div class="crel-dashboard__tabs__nav">
					<a href="#crel-nav-home-content" id="crel-nav-home" class="crel-dashboard-tabs__nav__item <?php echo ( $active_tab == 'home' ) ? 'crel-dashboard-tabs__nav__item--active' : '' ?>"><?php esc_html_e( 'Home', 'creative-addons-for-elementor' ); ?></a>
					<a href="#crel-nav-widgets-content" id="crel-nav-widgets" class="crel-dashboard-tabs__nav__item <?php echo ( $active_tab == 'widgets' ) ? 'crel-dashboard-tabs__nav__item--active' : '' ?>"><?php esc_html_e( 'Widgets', 'creative-addons-for-elementor' ); ?></a>
					<a href="#crel-nav-presets-content" id="crel-nav-presets" class="crel-dashboard-tabs__nav__item <?php echo ( $active_tab == 'presets' ) ? 'crel-dashboard-tabs__nav__item--active' : '' ?>"><?php esc_html_e( 'Preset Library', 'creative-addons-for-elementor' ); ?></a>
					<a href="#crel-nav-debug-content" id="crel-nav-debug" class="crel-dashboard-tabs__nav__item <?php echo ( $active_tab == 'debug' ) ? 'crel-dashboard-tabs__nav__item--active' : '' ?>"><?php esc_html_e( 'Debug', 'creative-addons-for-elementor' ); ?></a>		<?php
					if ( Utilities_Plugin::use_old_widgets_without_globals() ) { ?>
						<a href="#crel-nav-settings-content" id="crel-nav-settings" class="crel-dashboard-tabs__nav__item <?php echo ( $active_tab == 'settings' ) ? 'crel-dashboard-tabs__nav__item--active' : '' ?>"><?php esc_html_e( 'Settings', 'creative-addons-for-elementor' ); ?></a>				<?php
					} ?>
				</div>

				<!-- Tabs Content -->
				<div class="crel-dashboard__tabs__content">

					<!-- Home Panel -->
					<div id="crel-nav-home-content" class="crel-dashboard-tabs__content__panel <?php echo ( $active_tab == 'home' ) ? 'crel-dashboard-tabs__content__panel--active' : '' ?>">
						<div class="crel-dashboard-row">
							<div class="crel-dashboard-tabs__content__left">
								<div class="crel-dashboard-tabs__content__panel__header">
									<img src="<?php echo esc_url( CREATIVE_ADDONS_ASSETS_URL . 'images/Top-banner-for-Settings-page.jpg' ); ?>">
								</div>

								<div class="crel-dashboard-tabs__content__panel__body">

									<div class="crel-dashboard-row crel-dashboard-2col">									<?php
										 $this->info_box(
											'crelfa crelfa-book',
											__( 'Documentation', 'creative-addons-for-elementor' ),
											__( 'Find basic and advanced examples for our Creative widgets.', 'creative-addons-for-elementor' ),
											__( 'Documentation', 'creative-addons-for-elementor' ),
											'https://www.creative-addons.com/elementor-docs/');
										 $this->info_box(
											'crelfa crelfa-puzzle-piece',
											__( 'Submit Feature Request', 'creative-addons-for-elementor' ),
											__( 'Let us know your thoughts about our widgets and any features we can add!', 'creative-addons-for-elementor' ),
											__( 'Contact Us', 'creative-addons-for-elementor' ),
											'https://www.creative-addons.com/technical-support/'); ?>
									</div>

									<div class="crel-dashboard-row">									<?php
										 /* $this->info_box(
											'far crelfa-heart',
											'Show your Love',
											'We love to have you in Creative Addons family. We are making it more awesome every day. Take your 2 minutes to review the plugin and spread the love to encourage us to keep it going.',
											'Leave a Review',
											'#'); */ ?>
									</div>

								</div>
							</div>
							<div class="crel-dashboard-tabs__content__right">	<?php
								if ( ! KB_Utilities::is_kb_plugin_active() ) {
									$this->display_ad();
								} ?>
							</div>
						</div>
					</div>

					<!-- Widgets Panel -->
					<div id="crel-nav-widgets-content" class="crel-dashboard-tabs__content__panel <?php echo ( $active_tab == 'widgets' ) ? 'crel-dashboard-tabs__content__panel--active' : '' ?>">

						<div class="crel-dashboard-tabs__content__panel__header">
							<div class="crel-dashboard-row crel-dashboard-2col">

								<div class="crel-dashboard__widget-info-container">
									<h2><?php esc_html_e( 'Creative Widgets', 'creative-addons-for-elementor' ); ?></h2>
									<p><?php esc_html_e( 'Here is a list of our widgets. You can enable or disable widgets to optimize your experience in the Elementor editor. All users will not see the disabled widgets when editing a page. After enabling or disabling widget(s), click the Save Changes button.', 'creative-addons-for-elementor' ); ?></p>
								</div>
								<div class="crel-dashboard__widget-save-container">
									<?php wp_nonce_field( 'crel_settings_nonce', 'crel_settings_nonce', false ); ?>
									<button type="submit" class="crel-dashboard__save-settings"><?php esc_html_e( 'Save Settings', 'creative-addons-for-elementor' ); ?></button>
									<div class="crel-dashboard__saving-error"></div>
								</div>

							</div>

						</div>

						<div class="crel-dashboard-tabs__content__panel__body">
							<div class="crel-dashboard-tabs__content__panel__body__widgets">									<?php

								$widgets = $this->get_widgets();
								foreach ( $widgets as $name => $widget ) { ?>
									<div class="crel-dashboard-widget-container">
										<div class="crel-dashboard-widget__icon"><i class="<?php echo esc_attr( $widget['icon'] ); ?>"></i></div>
										<div class="crel-dashboard-widget__info">
											<div class="crel-dashboard-widget__info__title"><?php echo esc_html( $widget['title'] ); ?></div>
											<div class="crel-dashboard-widget__info__demo-link"><a href="<?php echo esc_url( $widget['demo_url'] ); ?>" target="_blank" class="crelfa crelfa-laptop"></a></div>
											<div class="crel-dashboard-widget__info__info-link"><a href="<?php echo esc_url( $widget['documentation_url'] ); ?>" target="_blank" class="crelfa crelfa-question-circle"></a></div>
										</div>

										<input id="<?php echo esc_attr( $widget['name'] ); ?>" type="checkbox" name="<?php echo esc_attr( $widget['name'] ); ?>" <?php checked( $widget['is_active'], true ); ?>>

										<label for="<?php echo esc_attr( $widget['name'] ); ?>"></label>
									</div>									<?php
								} ?>
							</div>
						</div>

					</div>

					<!-- Presets Panel -->
					<div id="crel-nav-presets-content" class="crel-dashboard-tabs__content__panel <?php echo ( $active_tab == 'presets' ) ? 'crel-dashboard-tabs__content__panel--active' : '' ?>">

						<div class="crel-dashboard-tabs__content__panel__header">
							<div class="crel-dashboard-row crel-dashboard-2col">

								<div class="crel-dashboard__widget-info-container">
									<h2><?php esc_html_e( 'Creative Presets', 'creative-addons-for-elementor' ); ?></h2>
									<p><?php esc_html_e( 'Here is a list of our presets. You can enable or disable presets to optimize your experience in the Elementor editor. No users will see the disabled presets when editing a page. After enabling or disabling preset(s), click the Save Changes button.', 'creative-addons-for-elementor' ); ?></p>
								</div>
								<div class="crel-dashboard__presets-save-container">
									<button type="submit" class="crel-dashboard__save-settings"><?php esc_html_e( 'Save Settings', 'creative-addons-for-elementor' ); ?></button>
									<div class="crel-dashboard__saving-error"></div>
								</div>

							</div>

						</div>

						<div class="crel-dashboard-tabs__content__panel__body">
							<div class="crel-dashboard-tabs__content__panel__body__presets">
								<div class="crel-dashboard-presets__header"><?php

									$has_widgets = false;
									$active_widget = Utilities::get('widget');

									foreach ( $widgets as $name => $widget ) {

										if ( ! $widget['is_active'] || ! $widget['presets'] ) {
											continue;
										}

										$has_widgets = true; ?>

										<div class="crel-dashboard-widget-container <?php echo ( $widget['name'] == $active_widget ) ? 'crel-dashboard-widget-container--active' : ''; ?>" data-name="<?php echo esc_attr( $widget['name'] ); ?>">
											<div class="crel-dashboard-widget__icon"><i class="<?php echo esc_attr( $widget['icon'] ); ?>"></i></div>
											<div class="crel-dashboard-widget__info">
												<div class="crel-dashboard-widget__info__title"><?php echo esc_html( $widget['title'] ); ?></div>
											</div>
										</div> <?php
									} ?>

								</div>

								<div class="crel-dashboard-presets__content"><?php
									if ( ! $has_widgets ) { ?>
										<div class="crel-dashboard-presets__no-widgets">
											<i class="crelfa crelfa-exclamation-triangle"></i>
											<?php esc_html_e( 'All widgets are deactivated', 'creative-addons-for-elementor'); ?>
										</div><?php

									} else { ?>

										<div class="crel-dashboard-presets__widgets-preview__wrap"><?php
											 if ( empty($active_widget) ) {  ?>
												<div class="crel-dashboard-presets__widget-preview crel-dashboard-presets__widget-preview--not_selected crel-dashboard-presets__widget-preview--active">
													<i class="crelfa crelfa-exclamation-triangle"></i>
													<?php esc_html_e( 'Select widget first', 'creative-addons-for-elementor'); ?>
												</div><?php
											 }

											foreach ( $widgets as $name => $widget ) {
												if ( ! $widget['is_active'] ) {
													continue;
												}

												if ( class_exists( $widget['class_name'] ) ) {



													// skip if we have less than 2 presets as first we will skip
													if ( ! $widget['presets'] || count( $widget['presets'] ) < 2 ) {
														continue;
													}

													$this->show_preset_box( $widget );
												}
											} ?>
										 
										</div><?php
									}	?>
								</div>
							</div>
						</div>

					</div>

					<!-- Debug Panel -->
					<div id="crel-nav-debug-content" class="crel-dashboard-tabs__content__panel <?php echo ( $active_tab == 'debug' ) ? 'crel-dashboard-tabs__content__panel--active' : '' ?>">

						<div class="crel-dashboard-tabs__content__panel__body">
							<div class="crel-dashboard-row">
								<div class="crel-dashboard__widget-info-container">									<?php
									self::display_debug_info(); ?>
								</div>
							</div>

						</div>
					</div>

					<!-- Settings Panel -->
					<div id="crel-nav-settings-content" class="crel-dashboard-tabs__content__panel <?php echo ( $active_tab == 'settings' ) ? 'crel-dashboard-tabs__content__panel--active' : '' ?>">
						<div class="crel-dashboard-tabs__content__panel__header">
							<div class="crel-dashboard-row crel-dashboard-2col">

								<div class="crel-dashboard__widget-info-container">
									<h2><?php esc_html_e( 'Creative Settings', 'creative-addons-for-elementor' ); ?></h2>
									<p><?php esc_html_e( 'Here are settings for Creative Add-ons.', 'creative-addons-for-elementor' ); ?></p>
								</div>
								<div class="crel-dashboard__widget-save-container">									<?php
									wp_nonce_field( 'crel_settings_nonce', 'crel_settings_nonce', false ); ?>
									<button type="submit" class="crel-dashboard__save-settings"><?php esc_html_e( 'Save Settings', 'creative-addons-for-elementor' ); ?></button>
									<div class="crel-dashboard__saving-error"></div>
								</div>

							</div>
						</div>
						<div class="crel-dashboard-tabs__content__panel__body__settings">
							<div class="crel-dashboard-row">
								<div class="crel-dashboard__widget-info-container">
									<div class="crel-dashboard-widget-container">
										<div class="crel-dashboard-widget__info">
											<div class="crel-dashboard-widget__info__title"><?php esc_html_e( 'UPGRADE: Allow Global Fonts and Colors', 'creative-addons-for-elementor' ); ?></div>
											<div class="crel-dashboard-widget__info__info-link"><a href="https://www.creative-addons.com/elementor-docs/allow-global-fonts-and-colors/" target="_blank" class="crelfa crelfa-question-circle"></a></div>
										</div>
										<input id="switch_to_globals" type="checkbox" name="switch_to_globals" <?php checked( ! Utilities_Plugin::use_old_widgets_without_globals(), true ); ?>>
										<label for="switch_to_globals"></label>
									</div>

								</div>
							</div>

							<div class="crel-dashboard-row crel-dashboard-2col">
								<div class="crel-dashboard__widget-info-container">
									<p>
										Elementor introduced the Global values on version 3.0.  For the safest transition for our customers who are upgrading we have created a toggle so that you can turn on these settings.

										It’s best that you back up your website before turning them on. We also recommend that you turn this option on as this is now the standard for Elementor.
									</p>
								</div>
							</div>

						</div>
					</div>

					
				</div>

				</div>

		</div>		<?php
	}

	public function get_help() { ?>
		<div class="crel-dashboard crel-dashboard--get-help">
			<div class="crel-dashboard-row crel-dashboard-2col">									<?php
				$this->info_box(
					'crelfa crelfa-life-ring',
					__( 'Need Help?', 'creative-addons-for-elementor' ),
					__( 'Stuck with something? Contact us and we will help you get going again! We provide friendly and timely support.', 'creative-addons-for-elementor' ),
					__( 'Contact Us', 'creative-addons-for-elementor' ),
					'https://www.creative-addons.com/technical-support/'
				); ?>
			</div>
		</div> <?php 
	}

	private function get_widgets() {
		$widgets = [];

		$inactive_widgets = Widgets_Manager::get_inactive_widgets();
		foreach ( Widgets_Manager::get_all_widgets_list() as $widget_name ) {

			$widget_class_name = 'Creative_Addons\Widgets\\' . $widget_name;
			if ( class_exists( $widget_class_name ) ) {

				/** @var Widgets\Creative_Widget_Base $widget */
				$widget = new $widget_class_name();
				
				$widgets[$widget_name] = [
					'title' => $widget->get_title(),
					'icon' => $widget->get_icon(),
					'demo_url' => $widget->get_demo_url(),
					'documentation_url' => $widget->get_documentation_url(),
					'name' => $widget_name,
					'is_active' => ! in_array( $widget_name, $inactive_widgets ),
					'class_name' => $widget_class_name,
					'presets' => $widget->get_first_level_presets()
				];
			}
		}
		return $widgets;
	}

	private function info_box( $icon, $title, $dec, $buttonText, $buttonURL ) { ?>

		<div class="crel-dashboard__info-box">

			<div class="crel-dashboard__info-box__header">
				<div class="crel-dashboard__info-box__header__icon <?php echo esc_attr( $icon ); ?>"></div>
				<div class="crel-dashboard__info-box__header__title"><?php echo esc_html( $title ); ?></div>
			</div>

			<div class="crel-dashboard__info-box__body">
				<p><?php echo esc_html( $dec ); ?></p>
				<a href="<?php echo esc_url( $buttonURL ); ?>" target="_blank" class="crel-dashboard__info-box__body__btn"><?php echo esc_html( $buttonText ); ?></a>
			</div>

		</div>	<?php
	}

	/**
	 * Display Debug Data
	 */
	public function display_debug_info() {

		$is_debug_on = Utilities::get_wp_option( Admin_Handlers::CREL_DEBUG, false );
		$heading = $is_debug_on ? esc_html__( 'Debug Information:', 'creative-addons-for-elementor' ) :
			esc_html__( 'Enable debug when asked by Echo KB support team.', 'creative-addons-for-elementor' );     ?>

		<div class="form_options" id="crel_debug_info_tab_page">

			<section class="save-settings">    <?php
				$button_text = $is_debug_on ? esc_html__( 'Disable Debug', 'creative-addons-for-elementor' ) : esc_html__( 'Enable Debug', 'creative-addons-for-elementor' ); ?>
				<div class="submit crel_toggle_debug">
					<input type="hidden" id="_wpnonce_crel_toggle_debug" name="_wpnonce_crel_toggle_debug" value="<?php
						//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo wp_create_nonce( "_wpnonce_crel_toggle_debug" ); ?>"/>
					<input type="hidden" name="action" value="crel_toggle_debug"/>
					<input type="submit" id="crel_toggle_debug" class="crel_toggle_debug crel-dashboard__btn" value="<?php echo esc_attr( $button_text ); ?>" />
				</div>
			</section>

			<section>
				<h3><?php echo esc_html( $heading ); ?></h3>
			</section>     <?php
			if ( $is_debug_on ) {
				echo wp_kses_post( self::display_debug_data() );        ?>

				<form action="<?php echo esc_url( admin_url( 'admin.php?page=creative-addons' ) ); ?>" method="post" dir="ltr">

					<section class="save-settings checkbox-input">
						<div class="crel_download_debug_info">
							<input type="hidden" id="_wpnonce_crel_download_debug_info" name="_wpnonce_crel_download_debug_info" value="<?php
							//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							echo wp_create_nonce( "_wpnonce_crel_download_debug_info" ); ?>">
							<input type="hidden" name="action" value="crel_download_debug_info">
							<input type="submit" id="crel_download_debug_info" class="crel-dashboard__btn" value="<?php esc_html_e( 'Download System Information', 'creative-addons-for-elementor' ); ?>">
						</div>
					</section>
				</form>     <?php
			}    ?>

		</div>      		<?php
	}

	public static function display_debug_data() {

		// ensure user has correct permissions
		if ( ! current_user_can( 'manage_options' ) ) {
			return esc_html__( 'No access', 'creative-addons-for-elementor' );
		}

		$output = '<textarea rows="30" cols="150" style="overflow:scroll;">';

		// display PHP and WP settings
		$output .= self::get_system_info();

		// display error logs
		$output .= "\n\nERROR LOG:\n";
		$output .= "==========\n";
		$logs = Logging::get_logs();
		foreach( $logs as $log ) {
			$output .= empty($log['plugin']) ? '' : $log['plugin'] . " ";
			$output .= empty($log['kb']) ? '' : $log['kb'] . " ";
			$output .= empty($log['date']) ? '' : $log['date'] . "\n";
			$output .= empty($log['message']) ? '' : $log['message'] . "\n";
			$output .= empty($log['trace']) ? '' : $log['trace'] . "\n\n";
		}

		// retrieve add-on data
		$add_on_output = apply_filters( 'crel_add_on_debug_data', '' );
		$output .= is_string($add_on_output) ? $add_on_output : '';

		$output .= '</textarea>';

		return $output;
	}

	/**
	 * Based on EDD system-info.php file
	 * @return string
	 */
	private static function get_system_info() {

		$theme_data = wp_get_theme();
		/** @noinspection PhpUndefinedFieldInspection */
		$theme = $theme_data->Name . ' ' . $theme_data->Version;

		ob_start();     ?>

		PHP and WordPress Information:
		==============================

		Multisite:                <?php echo is_multisite() ? 'Yes' . "\n" : 'No' . "\n" ?>

		SITE_URL:                 <?php echo esc_url( site_url() ) . "\n"; ?>
		HOME_URL:                 <?php echo esc_url( home_url() ) . "\n"; ?>

		Active Theme:             <?php echo esc_html( $theme ) . "\n";

		$plugins = get_plugins();
		$active_plugins = get_option( 'active_plugins', array() );

		$kb_plugins = array(
			'KB - Article Rating and Feedback',
			'KB - Links Editor','Articles Import and Export',
			'KB - Multiple Knowledge Bases','KB - Widgets',
			'Knowledge Base for Documents and FAQs',
			'KB - Elegant Layouts',
			'KB - Advanced Search',
			'Knowledge Base with Access Manager',
			'KB - Custom Roles',
			'KB Groups',
			'KB - Articles Import and Export',
			'Blocks for Documents, Articles and FAQs',
			'Creative Addons for Elementor' );

		echo "\n\n";
		echo "KB PLUGINS:	         \n\n";

		foreach ( $plugins as $plugin_path => $plugin ) {
			// If the plugin isn't active, don't show it.
			if ( ! in_array( $plugin_path, $active_plugins ) )
				continue;

			if ( in_array( $plugin['Name'], $kb_plugins ) ) {
				echo "		" . esc_html( $plugin['Name'] . ': ' . $plugin['Version'] ) . "\n";
			}
		}

		echo "\n\n";
		echo "OTHER PLUGINS:	         \n\n";

		foreach ( $plugins as $plugin_path => $plugin ) {
			// If the plugin isn't active, don't show it.
			if ( ! in_array( $plugin_path, $active_plugins ) )
				continue;

			if ( ! in_array( $plugin['Name'], $kb_plugins ) ) {
				echo "		" . esc_html( $plugin['Name'] . ': ' . $plugin['Version'] ) . "\n";
			}
		}

		if ( is_multisite() ) {
			echo 'NETWORK ACTIVE PLUGINS:';
			echo "\n";

			$active_plugins = (array) get_site_option( 'active_sitewide_plugins', array() );

			if ( ! empty( $active_plugins ) ) {
				$active_plugins = array_keys( $active_plugins );
			}

			foreach ( $active_plugins as $plugin_path ) {

				if ( validate_file( $plugin_path ) // 0 means valid
					 || '.php' !== substr( $plugin_path, -4 )
					 || ! file_exists( WP_PLUGIN_DIR . '/' . $plugin_path )
				) {
					continue;
				}

				$plugin = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin_path );

				echo "- " . esc_html( $plugin['Name'] . ': ' . $plugin['Version'] ) . "\n";
			}
		}

		echo "\n";
		echo "\n";

		return ob_get_clean();
	}

	protected function show_preset_box( $widget ) { 
	
		$first_preset = true;
		$active_widget = Utilities::get('widget') ? Utilities::get('widget') : '';
		$inactive_presets = Utilities_Plugin::get_users_inactive_presets(); ?>
		<div class="crel-dashboard-presets__widget-preview <?php echo esc_attr( $widget['name'] ); ?> <?php echo ( $widget['name'] == $active_widget ) ? 'crel-dashboard-presets__widget-preview--active' : ''; ?>"><?php
			
			foreach ( $widget['presets'] as $preset_name => $preset) {
				
				$preview_url = empty( $preset['preview_url'] ) ? Utils::get_placeholder_image_src() : $preset['preview_url']; 
				$disabled = ! empty( $inactive_presets ) && ! empty( $inactive_presets[$widget['name']] ) && in_array( $preset_name, $inactive_presets[$widget['name']] ); ?>
				
				<div class="crel-dashboard-presets__preset-preview">
					<h4><?php echo esc_html( $preset['title'] ); ?></h4>
					<img src="<?php echo esc_url( $preview_url ); ?>"><?php
					if ( $first_preset ) {
						$first_preset = false; 		?>
						<div class="crel-dashboard-presets__preset-preview__note"><?php esc_html_e( 'Default style cannot be disabled ', 'creative-addons-for-elementor' ); ?></div><?php
					} else { ?>
						<input id="<?php echo esc_attr( $widget['name'] ); ?>-<?php echo esc_attr( $preset_name ); ?>" type="checkbox" name="<?php echo esc_attr( $widget['name'] ); ?>-<?php echo esc_attr( $preset_name) ; ?>" <?php checked( $disabled, false ); ?>  data-widget="<?php echo esc_attr( $widget['name'] ); ?>" data-preset="<?php echo esc_attr( $preset_name ); ?>">
						<label for="<?php echo esc_attr( $widget['name'] ); ?>-<?php echo esc_attr( $preset_name ); ?>"></label><?php
					} ?>
				</div><?php 
			} ?>
		</div><?php 
		
	}

	/**
	 * Ad Box
	 */
	public function display_ad() {

		$HTML = New HTML_Elements();

		$HTML->advertisement_ad_box( array(
			'icon'              => 'crelfa-linode',
			'title'             => esc_html__( 'Knowledge Base Plugin', 'creative-addons-for-elementor' ),
			'img_url'           => 'https://www.echoknowledgebase.com/wp-content/uploads/2020/12/KB-Preview-ad.jpg',
			'desc'              =>  esc_html__( 'Import articles and categories into your knowledge base.', 'creative-addons-for-elementor' ),
			'list'              => array(
					__( 'Build powerful Documentation', 'creative-addons-for-elementor' ),
					__( 'Search Analytics', 'creative-addons-for-elementor' ),
					__( 'Content Restrictions', 'creative-addons-for-elementor' ),
					__( 'Multiple Knowledge Bases', 'creative-addons-for-elementor' ),
					__( 'User Ratings and FeedBack', 'creative-addons-for-elementor' ),
			),
			'btn_text'          => esc_html__( 'Learn More', 'creative-addons-for-elementor' ),
			'btn_url'           => 'https://www.echoknowledgebase.com/documentation/',
			'btn_color'         => 'green',

			'box_type'			   => 'new-feature',
		));
	}
	
}
