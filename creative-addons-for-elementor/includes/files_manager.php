<?php
namespace Creative_Addons\includes;

use Creative_Addons\Includes\System\Logging;

defined( 'ABSPATH' ) || exit();

class Files_Manager {

	const UPLOADS_DIR = 'creative-addons/';

	private static $wp_uploads_dir = '';
	private static $wp_uploads_url = '';

	/**
	 * Get plugin UPLOAD directory
	 */
	public static function get_plugin_base_uploads_dir() {

		if ( ! empty(self::$wp_uploads_dir) ) {
			return self::$wp_uploads_dir;
		}

		$wp_upload_dir = wp_upload_dir(); // if we handle directory creation in the future: wp_upload_dir( null, false );

		if ( $wp_upload_dir['error'] ) {
			Logging::add_log('WordPress root uploads directory issue', $wp_upload_dir['error'] );
		}

		self::$wp_uploads_dir = $wp_upload_dir['basedir'] . '/' . self::UPLOADS_DIR;

		return self::$wp_uploads_dir;
	}

	public static function get_upload_path_dir( $directory ) {
		return self::get_plugin_base_uploads_dir() . trailingslashit( $directory );
	}

	/**
	 * Get plugin UPLOAD URL
	 */
	public static function get_plugin_base_uploads_url() {

		if ( ! empty(self::$wp_uploads_url) ) {
			return self::$wp_uploads_url;
		}

		$wp_upload_dir = wp_upload_dir();

		if ( $wp_upload_dir['error'] ) {
			Logging::add_log('WordPress root uploads directory issue', $wp_upload_dir['error'] );
		}

		self::$wp_uploads_url = set_url_scheme ( $wp_upload_dir['baseurl'] . '/' . self::UPLOADS_DIR );

		return self::$wp_uploads_url;
	}

	public static function get_upload_path_url( $directory ) {
		return  self::get_plugin_base_uploads_url() . trailingslashit( $directory );
	}

	/**
	 * Make directory if needed
	 *
	 * @param $dir_path
	 */
	public static function make_directory( $dir_path ) {
		if ( ! is_dir( $dir_path ) ) {
			// @mkdir( $this->get_cache_assets_dir(), 0755, true );
			wp_mkdir_p( $dir_path );
		}
	}

	/**
	 * Delete a single file.
	 * @param $file_name
	 */
	public static function delete_file( $file_name ) {
		wp_delete_file($file_name);
	}

	/**
	 * Delete all files in a directory
	 * @param $directory
	 */
	public static function delete_all_files( $directory ) {
		$files = glob( $directory . '*' );
		foreach ( $files as $file ) {
			if ( is_file( $file ) ) {
				//phpcs:ignore  WordPress.WP.AlternativeFunctions.unlink_unlink
				@unlink( $file );
			}
		}
	}
}
