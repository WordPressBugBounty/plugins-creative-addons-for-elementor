<?php
namespace Creative_Addons\Widgets;
use Creative_Addons\Includes\Utilities;
use Creative_Addons\Includes\Kb\KB_Utilities;
use Elementor\Plugin;

defined( 'ABSPATH' ) || exit();

/**
 * Knowledge Bases widget for Elementor
 */
class Knowledge_Base extends Creative_Widget_Base {

	function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Knowledge Base', 'creative-addons-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'crelfont crel-kb-book-2-icon';
	}

	/**
	 * Retrieve the widget Demo URL.
	 *
	 * @return string Widget Demo URL.
	 */
	public function get_demo_url() {
		return 'https://www.creative-addons.com/elementor-widgets/knowledge-base/';
	}

	/**
	 * Retrieve the widget Documentation URL.
	 *
	 * @return string Widget Documentation URL.
	 */
	public function get_documentation_url() {
		return 'https://www.creative-addons.com/elementor-docs/knowledge-base-widget/';
	}
	
	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'knowledgebase', 'kb', 'knowledge', 'docs', 'documentation', 'faq', 'documents' ];
	}

	/**
	 * Return presets for this widget
	 */
	/* public function get_presets_options() {
	} */

	/**
	 * CONTENT tab for this widget
	 */
	protected function register_content_controls() {}

	/**
	 * STYLE tab for this widget
	 */
	protected function register_style_controls() {}

	/**
	 * Render the widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 */
    protected function render() {
		if ( ! $this->is_kb_plugin_activated() ) {
			$this->kb_required_html();
			return;
		}
		global $eckb_kb_id;
		global $eckb_is_kb_main_page;
		$eckb_is_kb_main_page = true;
		$eckb_kb_id = $this->get_current_kb_id();

		$this->call_missed_kb_actions();

		echo do_shortcode( '[epkb-knowledge-base id=' . $this->get_current_kb_id() . ']' );
    }
	
	/**
	 * Run all absent actions for live preview of KB main page 
	 */
	protected function call_missed_kb_actions() {

		if ( !Utilities::is_post_edit_screen()) {
			return;
		}

		// KB Core
		if ( class_exists('EPKB_Layouts_Setup') ) {
			new \EPKB_Layouts_Setup();
		}

		// ASEA 
		if ( KB_Utilities::is_asea_plugin_active() && class_exists('ASEA_Search_Box_View') && class_exists('ASEA_Search_Shortcode') ) {
			new \ASEA_Search_Box_View();
			new \ASEA_Search_Shortcode();
		}
		
		// ELAY 
		if ( KB_Utilities::is_elay_plugin_active() && class_exists('ELAY_Layout_Sidebar_v2') && class_exists('ELAY_Layout_Grid') )  {
			new \ELAY_Layout_Sidebar_v2();
			new \ELAY_Layout_Grid();
		}

		// check if kb function exists
		if ( ! function_exists( 'epkb_get_instance' ) ) {
			return;
		}

		if ( ! function_exists( 'epkb_load_public_resources' ) ) {
			return;
		}

		if ( ! function_exists( 'epkb_frontend_kb_theme_styles_now' ) ) {
			return;
		}

		if ( ! class_exists( 'EPKB_Typography' ) ) {
			return;
		}

		// on the backend iframe we need force register public resources
		epkb_load_public_resources();

		global $eckb_kb_id;

		$kb_id = empty( $eckb_kb_id ) ? 1 : $eckb_kb_id;
		$kb_config = epkb_get_instance()->kb_config_obj->get_kb_config_or_default( $kb_id );

		$modular_slug = class_exists( 'Echo_Knowledge_Base' ) && version_compare( \Echo_Knowledge_Base::$version, '11.30.0', '>=' )
							&& isset( $kb_config['modular_main_page_toggle'] ) && $kb_config['modular_main_page_toggle'] == 'on' ? 'modular-' : '';

		switch ( $kb_config['kb_main_page_layout'] ) {
			case 'Tabs': $current_css_slug = 'mp-frontend-' . $modular_slug . 'tab-layout'; break;
			case 'Categories': $current_css_slug = 'mp-frontend-' . $modular_slug . 'category-layout'; break;
			case 'Grid': $current_css_slug = KB_Utilities::is_elay_plugin_active() ? 'mp-frontend-' . $modular_slug . 'grid-layout' : 'mp-frontend-' . $modular_slug . 'basic-layout'; break;
			case 'Sidebar': $current_css_slug = KB_Utilities::is_elay_plugin_active() ? 'mp-frontend-' . $modular_slug . 'sidebar-layout' : 'mp-frontend-' . $modular_slug . 'basic-layout'; break;
			case 'Modular': $current_css_slug = 'mp-frontend-modular-layout'; break;
			case 'Classic': $current_css_slug = empty( $modular_slug ) ? 'mp-frontend-basic-layout' : 'mp-frontend-modular-classic-layout'; break;
			case 'Drill-Down': $current_css_slug = empty( $modular_slug ) ? 'mp-frontend-basic-layout' : 'mp-frontend-modular-drill-down-layout'; break;
			case 'Basic':
			default:
				$current_css_slug = 'mp-frontend-basic-layout';
		}

		// print only slug that was registered earlier - on the backend iframe we need force print them instead of enqueue
		if ( wp_style_is( 'epkb-' . $current_css_slug, 'registered' ) ) {
			wp_add_inline_style( 'epkb-' . $current_css_slug, epkb_frontend_kb_theme_styles_now( $kb_config, $current_css_slug ) );
			wp_print_styles('epkb-' .  $current_css_slug );
			if ( is_rtl() ) {
				wp_print_styles( 'epkb-' . $current_css_slug . '-rtl' );
			}
		}

		foreach ( $kb_config as $name => $value ) {
			if ( is_array( $value ) && ! empty( $value['font-family'] ) ) {
				$font_link = \EPKB_Typography::get_google_font_link( $value['font-family'] );
				if ( ! empty($font_link) ) {
					wp_register_style( 'epkb-font-' . sanitize_title( $value['font-family']), $font_link );
					wp_print_styles( array( 'epkb-font-' . sanitize_title( $value['font-family']) ) );
				}
			}
		}

		// optional ELAY styles
		if ( function_exists( 'elay_register_public_resources' ) ) {

			// on the backend iframe we need force register public resources
			elay_register_public_resources();

			// print only slug that was registered earlier - on the backend iframe we need force print them instead of enqueue
			if ( wp_style_is( 'elay-' . $current_css_slug, 'registered' ) ) {
				wp_print_styles('elay-' .  $current_css_slug );
				if ( is_rtl() ) {
					wp_print_styles( 'elay-' . $current_css_slug . '-rtl' );
				}
			}

			// FUTURE TODO: remove in December 2024
			// support for ELAY v2.14.1 and older - only newest versions have separate CSS file slugs
			if ( KB_Utilities::is_elay_plugin_active() && class_exists( 'Echo_Elegant_Layouts' ) && version_compare( \Echo_Elegant_Layouts::$version, '2.14.1', '<=' ) ) {
				$modular_slug = '';
			}

			// support for:
			// - non-ELAY layout - we still print ELAY common styles in this case
			// - ELAY v2.14.1 and older - only newest versions have separate CSS file slugs
			if ( wp_style_is( 'elay-public-' . $modular_slug . 'styles', 'registered' ) ) {
				wp_print_styles('elay-public-' . $modular_slug . 'styles' );
				if ( is_rtl() ) {
					wp_print_styles( 'elay-public-' . $modular_slug . 'styles-rtl' );
				}
			}
		}
	}
}
