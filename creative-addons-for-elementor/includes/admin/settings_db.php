<?php
namespace Creative_Addons\includes\admin;

use Creative_Addons\Includes\Input_Filter;
use Creative_Addons\Includes\System\Logging;
use Creative_Addons\Includes\Utilities;
use WP_Error;

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Manage plugin settings (plugin-wide settings) in the database.
 *
 * @copyright   Copyright (C) 2018, Echo Plugins
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class Settings_DB {

	// Prefix for WP option name that stores settings
	const SETTINGS_NAME =  'crel_settings';
	private $cached_settings = array();

	/**
	 * Get settings from the WP Options table.
	 * If settings are missing then use defaults.
	 *
	 * @return array|WP_Error return current settings; if not found return defaults
	 */
	public function get_settings() {
		/** @var $wpdb \Wpdb */
		global $wpdb;

		// retrieve settings if already cached
		if ( ! empty($this->cached_settings) ) {
			$settings = wp_parse_args( $this->cached_settings, Settings_Specs::get_default_settings() );
			return $settings;
		}

		// retrieve Plugin settings
		$settings = $wpdb->get_var( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = %s", self::SETTINGS_NAME ) );
		if ( ! empty($settings) ) {
			$settings = maybe_unserialize( $settings );
		}

		// if Plugin settings is missing then return error
		if ( empty($settings) || ! is_array($settings) ) {
			Logging::add_log( "Did not find Plugin settings (DB331)." );
			return new WP_Error('DB331', "Did not find Plugin settings. Try to deactivate and reactivate the plugin to see if this fixes the issue. " . Utilities::contact_us_for_support() );
		}

		if ( count($settings) < 1 ) {
			Logging::add_log("Found Plugin settings incomplete", count($settings));
		}

		// use defaults for missing or empty fields
		$settings = wp_parse_args( $settings, Settings_Specs::get_default_settings() );

		// cached the settings for future use
		$this->cached_settings = $settings;

		return $settings;
	}

	/**
	 * GET Plugin settings from the WP Options table. If not found then return default.
	 *
	 * @return array return current Plugin Settings
	 */
	public function get_settings_or_default() {

		$settings = $this->get_settings();
		if ( is_wp_error( $settings ) ) {
			return Settings_Specs::get_default_settings();
		}

		return $settings;
	}

	/**
	 * Return specific value from the plugin settings values. Values are automatically trimmed.
	 *
	 * @param $setting_name
	 *
	 * @param string $default
	 * @return string with value or empty string if this settings not found
	 */
	public function get_value( $setting_name, $default='' ) {

		if ( empty($setting_name) ) {
			return $default;
		}

		$settings = $this->get_settings();
		if ( is_wp_error( $settings ) ) {
			Logging::add_log( "Could not retrieve Plugin settings. Settings name: ", $setting_name, $settings );
			return $default;
		}
		
		if ( isset($settings[$setting_name]) ) {
			return $settings[$setting_name];
		}

		$default_settings = Settings_Specs::get_default_settings();

		return  isset($default_settings[$setting_name]) ? $default_settings[$setting_name] : $default;
	}

	/**
	 * Set specific value in Plugin settings
	 *
	 * @param $key
	 * @param $value
	 * @return array| WP_Error
	 */
	public function set_value( $key, $value ) {

		$settings = $this->get_settings();
		if ( is_wp_error($settings) ) {
			return $settings;
		}

		$settings[$key] = $value;

		return $this->update_settings( $settings );
    }

	/**
	 * Sanitize and validate input data. Then add or update SINGLE or MULTIPLE settings. Does NOT override current settings if new value
	 * is not supplied.
	 *
	 * @param array $settings contains settings or empty if adding default settings
	 *
	 * @return true | WP_Error
	 */
	public function update_settings( array $settings=array() ) {

		// first sanitize and validate input
		$fields_specification = Settings_Specs::get_fields_specification();
		$input_filter = new Input_Filter();
		$sanitized_settings = $input_filter->validate_and_sanitize_specs( $settings, $fields_specification );
		if ( is_wp_error($sanitized_settings) ) {
			Logging::add_log( 'Failed to sanitize Plugin settings', $sanitized_settings );
			return $sanitized_settings;
		}

		$sanitized_settings = wp_parse_args( $sanitized_settings, Settings_Specs::get_default_settings() );

		return $this->save_settings( $sanitized_settings );
	}

	/**
	 * Save new settings into the database
	 *
	 * @param $settings
	 * @return array| WP_Error - return settings or WP_Error
	 */
	private function save_settings( $settings ) {
		/** @var $wpdb \Wpdb */
		global $wpdb;

		if ( empty($settings) || ! is_array($settings) ) {
			return new WP_Error( 'save_crel_config', 'Plugint settings is empty' );
		}

		// add or update the option
		$serialized_config = maybe_serialize($settings);
		if ( empty($serialized_config) ) {
			return new WP_Error( 'save_crel_config', 'Failed to serialize Plugin settings.' );
		}

		$result = $wpdb->query( $wpdb->prepare( "INSERT INTO $wpdb->options (`option_name`, `option_value`, `autoload`) VALUES (%s, %s, %s)
 												 ON DUPLICATE KEY UPDATE `option_name` = VALUES(`option_name`), `option_value` = VALUES(`option_value`), `autoload` = VALUES(`autoload`)",
												self::SETTINGS_NAME, $serialized_config, 'no' ) );
		if ( $result === false ) {
			$wpdb_last_error = $wpdb->last_error;   // add_log changes last_error so store it first
			Logging::add_log( 'Failed to update Plugin settings', 'Last DB ERROR: (' . $wpdb_last_error . ')' );
			return new WP_Error( 'save_crel_config', 'Failed to update Plugin settings. Last DB ERROR: (' . $wpdb_last_error . ')');
		}

		// cached the settings for future use
		$this->cached_settings = $settings;

		return $settings;
	}
}