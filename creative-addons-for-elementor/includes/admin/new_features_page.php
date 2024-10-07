<?php
namespace Creative_Addons\includes\admin;

use Creative_Addons\Includes\Utilities;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Display New Features page
 *
 * @copyright   Copyright (C) 2019, Echo Plugins
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class New_Features_Page {

	/**
	 * Filter crel features array to add latest
	 * @param $features
	 * @return array
	 */
	private static function crel_features_list( $features=array() ) {
		$features['2022.11.11'] = array(
			'plugin'            => esc_html__( 'Widget', 'creative-addons-for-elementor'),
			'title'             => esc_html__( 'Feature List Widget', 'creative-addons-for-elementor'),
			'description'       => '<p>' . esc_html__( "Display your product features with icons, learn more links, and call to action buttons.", 'creative-addons-for-elementor') . '</p>',
			'image'             => 'https://www.creative-addons.com/wp-content/uploads/2022/11/new-feature-feature-list-widget-2.jpg',
			'learn_more_url'    => 'https://www.creative-addons.com/elementor-widgets/features-list/',
			'plugin-type'       => 'elementor',
			'type'              => 'feature',
			'label'              => 'New Widget'
		);
		$features['2022.05.28'] = array(
			'plugin'            => esc_html__( 'Feature', 'creative-addons-for-elementor'),
			'title'             => esc_html__( 'Custom Presets', 'creative-addons-for-elementor'),
			'description'       => '<p>' . esc_html__( "Save your own presets for each widget according to your custom design.", 'creative-addons-for-elementor') . '</p>',
			'image'             => 'https://www.creative-addons.com/wp-content/uploads/2022/05/new-feature-custom-presets.jpg',
			'learn_more_url'    => 'https://www.creative-addons.com/elementor-docs/custom-presets/',
			'plugin-type'       => 'elementor',
			'type'              => 'feature',
			'label'              => 'New Feature'
		);

		$features['2021.05.20'] = array(
			'plugin'            => esc_html__( 'Widget', 'creative-addons-for-elementor'),
			'title'             => esc_html__( 'Code Block', 'creative-addons-for-elementor'),
			'description'       => '<p>' . esc_html__( "Embed source code examples in your article. The user can copy and expand the code. Show code examples in CSS, HTML, JS, PHP, C# and more.", 'creative-addons-for-elementor') . '</p>',
			'image'             => 'https://www.creative-addons.com/wp-content/uploads/2021/06/Code-block-top-image-5.png',
			'learn_more_url'    => 'https://www.creative-addons.com/elementor-widgets/code-block/',
			'plugin-type'       => 'elementor',
			'type'              => 'widget',
			'label'              => 'New Widget'
		);

		$features['2021.02.12'] = array(
			'plugin'            => esc_html__( 'Widget', 'creative-addons-for-elementor'),
			'title'             => esc_html__( 'Image Guide', 'creative-addons-for-elementor'),
			'description'       => '<p>' . esc_html__( "Add hotspots to screenshots and images, and connect each hotspot to a note.", 'creative-addons-for-elementor') . '</p>',
			'video'             => 'https://www.youtube.com/embed/SZEP_zxBvy4',
			'learn_more_url'    => 'https://www.creative-addons.com/elementor-widgets/image-guide/',
			'plugin-type'       => 'elementor',
			'type'              => 'widget',
			'label'              => 'New Widget'

		);

		$features['2021.02.13'] = array(
			'plugin'            => esc_html__( 'Widget', 'creative-addons-for-elementor'),
			'title'             => esc_html__( 'Text and Image', 'creative-addons-for-elementor'),
			'description'       => '<p>' . esc_html__( 'Easy way to add text and image combo with one widget.', 'creative-addons-for-elementor') . '</p>',
			'video'             => 'https://www.youtube.com/embed/0Lpi-M2i32U',
			'learn_more_url'    => 'https://www.creative-addons.com/elementor-widgets/text-image/',
			'plugin-type'       => 'elementor',
			'type'              => 'widget',
			'label'              => 'New Widget'

		);

		return $features;
	}

	/**
	 * Count new features to be used in Crel New Features menu item title
	 * @param $count
	 * @return int
	 */
	private static function get_new_crel_features_count( $count=0 ) {

		// if user did't see last new features
		$last_seen_version = Utilities::get_wp_option( 'crel_last_seen_version', '' );
		$features_list = self::crel_features_list();
		foreach ( $features_list as $key => $val ) {
			if ( version_compare( $last_seen_version, $key ) < 0 ) {
				$count++;
			}
		}

		return $count;
	}

	/**
	 * Show number of new features in red on New Features menu item in admin.
	 */
	public static function get_menu_item_title() {

		$counter = '';
		$crel_new_features_count = ''; // FUTURE TODO self::get_new_crel_features_count();


		if ( ! empty($crel_new_features_count) && Utilities::is_positive_int($crel_new_features_count) ) {
			$counter = '<span class="update-plugins"><span class="plugin-count">' . $crel_new_features_count . '</span></span>';
		}

		return '<span style="color:#5cb85c;">' . esc_html__( 'Add-ons / News', 'creative-addons-for-elementor' ) . '</span>' . $counter;
	}

	/**
	 * Display the New Features page
	 */
	public function display_new_features_page() {

		// update last seen version of KB and add-ons to current version

		ob_start(); ?>

		<!-- This is to catch WP JS garbage -->
		<div class="wrap">
			<h1></h1>
		</div>
		<div class="">		</div>

        <div class="crel-dashboard crel-features-container">

            <!-- Top Banner -->
            <div class="crel-features__top-banner">
                <div class="crel-features__top-banner__inner">
                    <h1><?php esc_html_e( 'New Features for Creative Addon', 'creative-addons-for-elementor' ); ?></h1>
                </div>
            </div>

			<div class="crel-dashboard__tabs">

				<!-- Tabs -->
				<div class="crel-dashboard__tabs__nav">
					<a href="#crel-nav-features-content" id="crel-nav-features" class="crel-dashboard-tabs__nav__item  crel-dashboard-tabs__nav__item--active"><?php esc_html_e( 'New Features', 'creative-addons-for-elementor' ); ?></a>
                    <a href="#crel-nav-plugins-content" id="crel-nav-plugins" class="crel-dashboard-tabs__nav__item"><?php esc_html_e( 'Our Free Plugins', 'creative-addons-for-elementor' ); ?></a>
				</div>

				<!-- Tabs Content -->
				<div class="crel-dashboard__tabs__content">

					<!-- Features -->
					<div id="crel-nav-features-content" class="crel-dashboard-tabs__content__panel crel-dashboard-tabs__content__panel--active">
						<div class="crel-dashboard-row">
                            <div class="crel-admin-page-tab-panel crel-features__panel crel-features__panel--active">
								<?php self::display_crel_features_details();  ?>
                            </div>
						</div>
					</div>

                    <!-- Our Free Plugins -->
                    <div id="crel-nav-plugins-content" class="crel-dashboard-tabs__content__panel">
                        <div class="crel-dashboard-row">
                            <div class="crel-dashboard-tabs__content__left">
                                <div class="crel-dashboard-tabs__content__panel__body">
                                    <?php echo wp_kses_post( self::get_our_free_plugins_boxes() );   ?>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>
            </div>
		</div>  <?php

	   self::update_last_seen_version();

		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo ob_get_clean();
	}

	/**
	 * Save which new features the user saw
	 */
	private static function update_last_seen_version() {

		$features_list = self::crel_features_list();
		krsort($features_list);
		$last_feature_date = key( $features_list );

		$result = Utilities::save_wp_option( 'crel_last_seen_version', $last_feature_date );
		if ( is_wp_error( $result ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Display all new features
	 */
	private static function display_crel_features_details() {
		$features = self::crel_features_list();  ?>
		<div class="crel-grid-row-5-col">			<?php
			foreach ( $features as $date => $feature ) {
				self::new_feature( $date, $feature );
			}        ?>
		</div>		<?php
	}

	/**
	 * Display feature information with image.
	 * @param $date
	 * @param array $values
	 */
	private static function new_feature( $date, $values = array () ) {
		global $wp_locale; 
		
		$season = explode('.', $date);
		if ( ! empty($season[0]) && ! empty($season[1]) ) {
			$monthName = ucfirst($wp_locale->get_month_abbrev($wp_locale->get_month($season[1])));
			$date = $monthName . ' ' . $season[0];
		}				?>

		<div class="crel-features__new-feature" class="add_on_product">

			<div class="crel-fnf__header">
				<span class="crel-fnf__header__new-feature"> <i class="crelfa crelfa-star" aria-hidden="true"></i><?php echo esc_html( $values['label'] ); ?></span>
				<h3 class="crel-fnf__header__title"><?php echo esc_html( $values['title'] ); ?></h3>
			</div>			<?php

			if ( isset($values['image']) ) {    ?>
				<div class="crel_img_zoom crel-fnf__img">
					<img src="<?php echo empty($values['image']) ? '' : esc_url( $values['image'] ); ?>">
				</div>			<?php
			}
			if ( isset($values['video']) ) {    ?>
				<div class="crel-fnf__video">
					<iframe width="560" height="170" src="<?php echo esc_url( $values['video'] ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>			<?php
			} ?>

			<div class="crel-fnf__meta">
				<div class="crel-fnf__meta__plugin"><?php echo esc_html( $values['plugin'] ); ?></div>
				<div class="crel-fnf__meta__date"><?php echo esc_html( $date ); ?></div>
			</div>

			<div class="crel-fnf__body">
				<p>
					<?php echo wp_kses_post( $values['description'] ); ?>
				</p>
			</div>			<?php

			if ( ! empty($values['learn_more_url']) ) {
			   $button_name = empty($values['button_name']) ? esc_html__( 'Learn More', 'creative-addons-for-elementor' ) : $values['button_name'];    ?>
				<div class="crel-fnf__button-container">
					<a class="button primary-btn" href="<?php echo esc_url( $values['learn_more_url'] ); ?>" target="_blank"><?php echo esc_html( $button_name ); ?></a>
				</div>			<?php
			}       ?>

		</div>    <?php
	}

	/**
	 * Get Our Free Plugins boxes
	 *
	 * @return string
	 */
	private static function get_our_free_plugins_boxes() {

		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}

		remove_all_filters( 'plugins_api' );

		$our_free_plugins = array();

		$args_list = array(
			array( 'slug' => 'echo-knowledge-base' ),
			array( 'slug' => 'help-dialog' ),
			array( 'slug' => 'echo-show-ids' ),
		);

		foreach( $args_list as $args ) {
			$args['fields'] = [
				'short_description' => true,
				'icons'             => true,
				'reviews'           => false,
				'banners'           => true,
			];
			$plugin_data = plugins_api( 'plugin_information', $args );
			if ( $plugin_data && ! is_wp_error( $plugin_data ) ) {
				$our_free_plugins[] = $plugin_data;
			}
		}

		ob_start(); ?>
        <div class="wrap recommended-plugins">
            <div class="wp-list-table widefat plugin-install">
                <div class="the-list">  <?php

					foreach( $our_free_plugins as $plugin ) {
						self::display_our_free_plugin_box_html( $plugin );
					}   ?>

                </div>
            </div>
        </div>  <?php

		return ob_get_clean();
	}

	/**
	 * Return HTML for a single box on Our Free Plugins tab
	 *
	 * @param $plugin
	 */
	private static function display_our_free_plugin_box_html( $plugin ) {

		$plugins_allowed_tags = array(
			'a'       => array(
				'href'   => array(),
				'title'  => array(),
				'target' => array(),
			),
			'abbr'    => array( 'title' => array() ),
			'acronym' => array( 'title' => array() ),
			'code'    => array(),
			'pre'     => array(),
			'em'      => array(),
			'strong'  => array(),
			'ul'      => array(),
			'ol'      => array(),
			'li'      => array(),
			'p'       => array(),
			'br'      => array(),
		);

		if ( is_object( $plugin ) ) {
			$plugin = (array) $plugin;
		}

		$title = wp_kses( $plugin['name'], $plugins_allowed_tags );

		// remove any HTML from the description.
		$description = wp_strip_all_tags( $plugin['short_description'] );
		$version = wp_kses( $plugin['version'], $plugins_allowed_tags );

		$name = wp_strip_all_tags( $title . ' ' . $version );

		$author = wp_kses( $plugin['author'], $plugins_allowed_tags );
		if ( ! empty( $author ) ) {
			/* translators: %s: Plugin author. */
			$author = ' <cite>' . sprintf( esc_html__( 'By %s' ), $author ) . '</cite>';
		}

		$requires_php = isset( $plugin['requires_php'] ) ? $plugin['requires_php'] : null;
		$requires_wp  = isset( $plugin['requires'] ) ? $plugin['requires'] : null;

		$compatible_php = is_php_version_compatible( $requires_php );
		$compatible_wp  = is_wp_version_compatible( $requires_wp );
		$tested_wp = empty( $plugin['tested'] ) || version_compare( get_bloginfo( 'version' ), $plugin['tested'], '<=' );

		$details_link = esc_url( self_admin_url(
			'plugin-install.php?tab=plugin-information&amp;plugin=' . $plugin['slug'] .
			'&amp;TB_iframe=true&amp;width=600&amp;height=550'
		) );

		$action_links = self::get_our_free_plugin_action_links( $plugin, $name, $compatible_php, $compatible_wp );

		$action_links[] = sprintf(
			'<a href="%s" class="thickbox open-plugin-details-modal" aria-label="%s" data-title="%s">%s</a>',
			esc_url( $details_link ),
			/* translators: %s: Plugin name and version. */
			esc_attr( sprintf( esc_html__( 'More information about %s' ), $name ) ),
			esc_attr( $name ),
			__( 'More Details' )
		);

		if ( ! empty( $plugin['icons']['svg'] ) ) {
			$plugin_icon_url = $plugin['icons']['svg'];
		} elseif ( ! empty( $plugin['icons']['2x'] ) ) {
			$plugin_icon_url = $plugin['icons']['2x'];
		} elseif ( ! empty( $plugin['icons']['1x'] ) ) {
			$plugin_icon_url = $plugin['icons']['1x'];
		} else {
			$plugin_icon_url = $plugin['icons']['default'];
		}

		$action_links = apply_filters( 'plugin_install_action_links', $action_links, $plugin );
		$action_links = implode( '</li><li>', $action_links );

		$last_updated_timestamp = strtotime( $plugin['last_updated'] ); ?>

        <div class="plugin-card plugin-card-<?php echo sanitize_html_class( $plugin['slug'] ); ?>"> <?php

			self::display_our_free_plugin_incompatible_links( $compatible_php, $compatible_wp );  ?>

            <div class="plugin-card-top">
                <div class="name column-name">
                    <h3>
                        <a href="<?php echo esc_url( $details_link ); ?>" class="thickbox open-plugin-details-modal">		<?php
	                        echo esc_html( $title ); ?>
                            <img src="<?php echo esc_attr( $plugin_icon_url ); ?>" class="plugin-icon" alt="" />
                        </a>
                    </h3>
                </div>
                <div class="action-links">  <?php
					if ( $action_links ) {  ?>
                        <ul class="plugin-action-buttons"><li><?php echo wp_kses_post( $action_links ); ?></li></ul>   <?php
					}   ?>
                </div>
                <div class="desc column-description">
                    <p><?php echo esc_html( $description ); ?></p>
                    <p class="authors"><?php echo wp_kses( $author, $plugins_allowed_tags ); ?></p>
                </div>
            </div>

            <div class="plugin-card-bottom">
                <div class="vers column-rating">    <?php
					wp_star_rating(
						array(
							'rating' => $plugin['rating'],
							'type'   => 'percent',
							'number' => $plugin['num_ratings'],
						)
					);  ?>
                    <span class="num-ratings" aria-hidden="true">(<?php echo esc_html( number_format_i18n( $plugin['num_ratings'] ) ); ?>)</span>
                </div>
                <div class="column-updated">
                    <strong><?php esc_html_e( 'Last Updated:' ); ?></strong>    <?php
					/* translators: %s: Human-readable time difference. */
					printf( esc_html__( '%s ago' ), esc_html( human_time_diff( $last_updated_timestamp ) ) );   ?>
                </div>
                <div class="column-downloaded"> <?php
					if ( $plugin['active_installs'] >= 1000000 ) {
						$active_installs_millions = floor( $plugin['active_installs'] / 1000000 );
						$active_installs_text     = sprintf(
						/* translators: %s: Number of millions. */
							_nx( '%s+ Million', '%s+ Million', $active_installs_millions, 'Active plugin installations' ),
							esc_html( number_format_i18n( $active_installs_millions ) )
						);
					} elseif ( 0 == $plugin['active_installs'] ) {
						$active_installs_text = _x( 'Less Than 10', 'Active plugin installations' );
					} else {
						$active_installs_text = number_format_i18n( $plugin['active_installs'] ) . '+';
					}
					/* translators: %s: Number of installations. */
					printf( esc_html__( '%s Active Installations' ), esc_html( $active_installs_text ) );   ?>
                </div>
                <div class="column-compatibility">  <?php
					if ( ! $tested_wp ) {   ?>
                        <span class="compatibility-untested"><?php esc_html_e( 'Untested with your version of WordPress' ); ?></span>   <?php
					} elseif ( ! $compatible_wp ) { ?>
                        <span class="compatibility-incompatible"><?php esc_html_e( '<strong>Incompatible</strong> with your version of WordPress' ); ?></span>   <?php
					} else {    ?>
                        <span class="compatibility-compatible"><?php esc_html_e( '<strong>Compatible</strong> with your version of WordPress' ); ?></span>   <?php
					}   ?>
                </div>
            </div>
        </div>  <?php
	}

	/**
	 * Display links in case if suggested plugin is incompatible with current WordPress or PHP version
	 *
	 * @param $compatible_php
	 * @param $compatible_wp
	 */
	private static function display_our_free_plugin_incompatible_links( $compatible_php, $compatible_wp ) {

		if ( $compatible_php && $compatible_wp ) {
			return;
		}   ?>

        <div class="notice inline notice-error notice-alt"><p>  <?php

				if ( ! $compatible_php && ! $compatible_wp ) {
					esc_html_e( 'This plugin doesn&#8217;t work with your versions of WordPress and PHP.' );
					if ( current_user_can( 'update_core' ) && current_user_can( 'update_php' ) ) {
						/* translators: 1: URL to WordPress Updates screen, 2: URL to Update PHP page. */
						printf(
							' ' . esc_html__( '<a href="%1$s">Please update WordPress</a>, and then <a href="%2$s">learn more about updating PHP</a>.' ),
							esc_url( self_admin_url( 'update-core.php' ) ),
							esc_url( wp_get_update_php_url() )
						);
						wp_update_php_annotation( '</p><p><em>', '</em>' );
					} elseif ( current_user_can( 'update_core' ) ) {
						printf(
						/* translators: %s: URL to WordPress Updates screen. */
							' ' . esc_html__( '<a href="%s">Please update WordPress</a>.' ),
							esc_url( self_admin_url( 'update-core.php' ) )
						);
					} elseif ( current_user_can( 'update_php' ) ) {
						printf(
						/* translators: %s: URL to Update PHP page. */
							' ' . esc_html__( '<a href="%s">Learn more about updating PHP</a>.' ),
							esc_url( wp_get_update_php_url() )
						);
						wp_update_php_annotation( '</p><p><em>', '</em>' );
					}
				} elseif ( ! $compatible_wp ) {
					esc_html_e( 'This plugin doesn&#8217;t work with your version of WordPress.' );
					if ( current_user_can( 'update_core' ) ) {
						printf(
						/* translators: %s: URL to WordPress Updates screen. */
							' ' . esc_html__( '<a href="%s">Please update WordPress</a>.' ),
							esc_url( self_admin_url( 'update-core.php' ) )
						);
					}
				} elseif ( ! $compatible_php ) {
					__( 'This plugin doesn&#8217;t work with your version of PHP.' );
					if ( current_user_can( 'update_php' ) ) {
						printf(
						/* translators: %s: URL to Update PHP page. */
							' ' . esc_html__( '<a href="%s">Learn more about updating PHP</a>.' ),
							esc_url( wp_get_update_php_url() )
						);
						wp_update_php_annotation( '</p><p><em>', '</em>' );
					}
				}   ?>

            </p></div>  <?php
	}

	/**
	 * Get action links for single plugin in Our Free Plugins list
	 *
	 * @param $plugin
	 * @param $name
	 * @param $compatible_php
	 * @param $compatible_wp
	 * @return array
	 */
	private static function get_our_free_plugin_action_links( $plugin, $name, $compatible_php, $compatible_wp ) {

		$action_links = [];

		if ( ! current_user_can( 'install_plugins' ) && ! current_user_can( 'update_plugins' ) ) {
			return $action_links;
		}

		$status = install_plugin_install_status( $plugin );

		// not installed
		if ( $status['status'] == 'install' && $status['url'] ) {

			$action_links[] = $compatible_php && $compatible_wp
				? sprintf(
					'<a class="install-now button" data-slug="%s" href="%s" aria-label="%s" data-name="%s">%s</a>',
					esc_attr( $plugin['slug'] ),
					esc_url( $status['url'] ),
					/* translators: %s: Plugin name and version. */
					esc_attr( sprintf( _x( 'Install %s now', 'plugin' ), $name ) ),
					esc_attr( $name ),
					__( 'Install Now' ) )
				: sprintf(
					'<button type="button" class="button button-disabled" disabled="disabled">%s</button>',
					_x( 'Cannot Install', 'plugin' ) );
		}

		// update is available
		if ( $status['status'] == 'update_available' && $status['url'] ) {

			$action_links[] = $compatible_php && $compatible_wp
				? sprintf(
					'<a class="update-now button aria-button-if-js" data-plugin="%s" data-slug="%s" href="%s" aria-label="%s" data-name="%s">%s</a>',
					esc_attr( $status['file'] ),
					esc_attr( $plugin['slug'] ),
					esc_url( $status['url'] ),
					/* translators: %s: Plugin name and version. */
					esc_attr( sprintf( _x( 'Update %s now', 'plugin' ), $name ) ),
					esc_attr( $name ),
					__( 'Update Now' ) )
				: sprintf(
					'<button type="button" class="button button-disabled" disabled="disabled">%s</button>',
					_x( 'Cannot Update', 'plugin' ) );
		}

		// installed
		if ( $status['status'] == 'latest_installed' || $status['status'] == 'newer_installed' ) {

			if ( is_plugin_active( $status['file'] ) ) {
				$action_links[] = sprintf(
					'<button type="button" class="button button-disabled" disabled="disabled">%s</button>',
					_x( 'Active', 'plugin' )
				);

			} elseif ( current_user_can( 'activate_plugin', $status['file'] ) ) {
				$button_text = esc_html__( 'Activate' );
				/* translators: %s: Plugin name. */
				$button_label = _x( 'Activate %s', 'plugin' );
				$activate_url = add_query_arg(
					array(
						'_wpnonce' => wp_create_nonce( 'activate-plugin_' . $status['file'] ),
						'action'   => 'activate',
						'plugin'   => $status['file'],
					),
					network_admin_url( 'plugins.php' )
				);

				if ( is_network_admin() ) {
					$button_text = esc_html__( 'Network Activate' );
					/* translators: %s: Plugin name. */
					$button_label = _x( 'Network Activate %s', 'plugin' );
					$activate_url = add_query_arg( array( 'networkwide' => 1 ), $activate_url );
				}

				$action_links[] = sprintf(
					'<a href="%1$s" class="button activate-now" aria-label="%2$s">%3$s</a>',
					esc_url( $activate_url ),
					esc_attr( sprintf( $button_label, $plugin['name'] ) ),
					$button_text
				);

			} else {
				$action_links[] = sprintf(
					'<button type="button" class="button button-disabled" disabled="disabled">%s</button>',
					_x( 'Installed', 'plugin' )
				);
			}
		}

		return $action_links;
	}

}

