<?php
namespace Creative_Addons\Includes;

use Creative_Addons\Includes\System\Logging;
use Elementor\Plugin;

defined( 'ABSPATH' ) || exit();

/**
 * Various utility functions
 */
class Utilities_Plugin {

    /**
     * Get elementor instance
     * @return Plugin|false
     */
    public static function elementor() {
		if ( ! class_exists('\Elementor\Plugin') ) {
			Logging::add_log( "Elementor disabled or did not find elementor instance" );
			return false;
		}

		if ( get_class( Plugin::$instance ) != 'Elementor\Plugin' ) {
			return false;
		}

        return Plugin::instance();
    }

	// avoid using same name of the Elementor function as Elementor team scanner triggers false positive for deprecated function invocations
    public static function is_built_using_elementor( $post_id ) {

		if ( empty( $post_id ) ) {
			return false;
		}

		$document = self::elementor_documents_get( $post_id );
		if ( empty( $document ) ) {
			return false;
		}

		if ( ! method_exists( $document, 'is_built_with_elementor' ) ) {
			return false;
		}

        return Plugin::$instance->documents->get( $post_id )->is_built_with_elementor();
    }

    /**
     * Get type of the widget
     * @param $element
     * @return mixed|string
     */
    public static function get_widget_type( $element ) {
        $type = empty($element['widgetType']) ? $element['elType'] : $element['widgetType'];
        if ( $type === 'global' && ! empty( $element['templateID'] ) ) {
            $type = self::get_global_widget_type( $element['templateID'] );
        }
        return $type;
    }

    /**
     * Elementor PRO has Global Widget so we will get the type of that widget.
     * @param $template_id
     * @return mixed|string
     */
    public static function get_global_widget_type( $template_id ) {

        // get global widget data
        $template_data = self::elementor_get_template_data( [
            'source' => 'local',
            'template_id' => $template_id,
        ] );

        if ( ! $template_data || is_wp_error( $template_data ) ) {
            return '';
        }

        if ( empty( $template_data['content'] ) ) {
            // throw new \Exception( 'Template content not found.' );
            return '';
        }

        $original_widget_type = self::elementor_get_widget_types( $template_data['content'][0]['widgetType'] );
        /* if ( ! $original_widget_type ) {
            throw new \Exception( 'Original Widget Type not found.' );
        } */

        return $original_widget_type ? $template_data['content'][0]['widgetType'] : '';
    }
	
	/**
	 * Get users settings for presets 
	 */
	public static function get_users_inactive_presets() {
		return get_option( 'crel_preset_settings', [] );
	}
	
	public static function set_users_inactive_presets( $inactive_presets = [] ) {
		update_option( 'crel_preset_settings', $inactive_presets );
		return true;
	}

	/**
	 * Old versions of Widgets do not use Global fonts/colors so we need to set defaults for them
	 * @return mixed
	 */
	public static function use_old_widgets_without_globals() {

		// make sure we have plugin initial and current version recorded
		$plugin_first_version = Utilities::get_wp_option( 'crel_version_first', '' );
		if ( empty($plugin_first_version) ) {
			update_option( 'crel_version', CREATIVE_ADDONS_VERSION, true );
			update_option( 'crel_version_first', '1.1.0', true );
			$plugin_first_version = '1.1.0';
		}
		
		// global fonts/colors used by default from version 1.2.0 up
		return version_compare( $plugin_first_version, '1.2.0' , '<' );
	}

	/**
	 * Plugin::$instance->documents->get
	 *
	 * @param $post_id
	 * @return Document|false
	 */
	public static function elementor_documents_get( $post_id ) {

		$instance = self::elementor();
		if ( empty( $instance ) ) {
			return false;
		}

		if ( get_class( Plugin::$instance->documents ) != 'Elementor\Core\Documents_Manager' ) {
			return false;
		}

		if ( ! method_exists( Plugin::$instance->documents, 'get' ) ) {
			return false;
		}

		return Plugin::$instance->documents->get( $post_id );
	}

	/**
	 * Plugin::$instance->templates_manager->get_template_data
	 *
	 * @param $data
	 * @return false|array
	 */
	public static function elementor_get_template_data( $data ) {

		$instance = self::elementor();
		if ( empty( $instance ) ) {
			return false;
		}

		if ( get_class( Plugin::$instance->templates_manager ) != 'Elementor\TemplateLibrary\Manager' ) {
			return false;
		}

		if ( ! method_exists( $instance->templates_manager, 'get_template_data' ) ) {
			return false;
		}

		return $instance->templates_manager->get_template_data( $data );
	}

	/**
	 * Plugin::$instance->widgets_manager->get_widget_types
	 *
	 * @param $type
	 * @return array|false
	 */
	public static function elementor_get_widget_types( $type ) {

		$instance = self::elementor();
		if ( empty( $instance ) ) {
			return false;
		}

		if ( get_class( Plugin::$instance->widgets_manager ) != 'Elementor\Widgets_Manager' ) {
			return false;
		}

		if ( ! method_exists( $instance->widgets_manager, 'get_widget_types' ) ) {
			return false;
		}

		return $instance->widgets_manager->get_widget_types( $type );
	}

	/**
	 * Plugin::$instance->editor->is_edit_mode
	 *
	 * @return true|false
	 */
	public static function elementor_is_edit_mode() {

		$instance = self::elementor();
		if ( empty( $instance ) ) {
			return false;
		}

		if ( get_class( Plugin::$instance->editor ) != 'Elementor\Core\Editor\Editor' ) {
			return false;
		}

		if ( ! method_exists( $instance->editor, 'is_edit_mode' ) ) {
			return false;
		}

		return $instance->editor->is_edit_mode();
	}
}
