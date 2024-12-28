<?php
/**
 * Plugin Name: Creative Addons for Elementor
 * Plugin URI: https://www.creative-addons.com
 * Description: Creative Addons makes writing professional documents and articles easy.
 * Version: 1.8.3
 * Author: Echo Plugins
 * Author URI: https://www.creative-addons.com/about-us/
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25
 * Elementor Pro tested up to: 3.25
 * Text Domain: creative-addons-for-elementor
 * Domain Path: languages
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Elementor KB is distributed under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Elementor KB is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Elementor KB. If not, see <http://www.gnu.org/licenses/>.
 *
*/

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'CREATIVE_ADDONS_VERSION', '1.8.3' );
define( 'CREATIVE_ADDONS_PLUGIN_NAME', 'Creative Addons for Elementor' );
define( 'CREATIVE_ADDONS_MINIMUM_ELEMENTOR_VERSION', '2.7.0' );
define( 'CREATIVE_ADDONS_MINIMUM_PHP_VERSION', '7.0' );
define( 'CREATIVE_ADDONS__FILE__', __FILE__ );

define( 'CREATIVE_ADDONS_DIR_PATH', plugin_dir_path( CREATIVE_ADDONS__FILE__ ) );
define( 'CREATIVE_ADDONS_DIR_URL', plugin_dir_url( CREATIVE_ADDONS__FILE__ ) );
define( 'CREATIVE_ADDONS_URL', plugins_url( '/', CREATIVE_ADDONS__FILE__ ) );

define( 'CREATIVE_ADDONS_ASSETS', trailingslashit( CREATIVE_ADDONS_DIR_URL . 'assets' ) );
define( 'CREATIVE_ADDONS_ASSETS_PATH', CREATIVE_ADDONS_DIR_PATH . 'assets/' );
define( 'CREATIVE_ADDONS_ASSETS_URL', CREATIVE_ADDONS_URL . 'assets/' );

/**
 * Load the plugin after Elementor loads.
 */
function crel_load_plugin() {

	load_plugin_textdomain( 'creative-addons-for-elementor' );

	// Check that builder is installed and activated
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'crel_admin_notice_builder_is_missing' );
		return;
	}

	// Check that Elementor version is not too old
	if ( ! version_compare( ELEMENTOR_VERSION, CREATIVE_ADDONS_MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
		add_action( 'admin_notices', 'crel_admin_notice_elementor_is_old' );
		return;
	}

	// Check for required PHP version
	if ( version_compare( PHP_VERSION, CREATIVE_ADDONS_MINIMUM_PHP_VERSION, '<' ) ) {
		add_action( 'admin_notices', 'crel_admin_notice_php_is_old' );
		return;
	}

	require CREATIVE_ADDONS_DIR_PATH . 'creative-addons-for-elementor-plugin.php';
}
add_action( 'plugins_loaded', 'crel_load_plugin' );

/**
 * Show Admin notice if the builder is missing
 */
function crel_admin_notice_builder_is_missing() {
	printf( '<div class="notice crel-notice notice-warning is-dismissible"><p style="padding: 13px 0">%1$s</p></div>',
		esc_html__( 'Creative Addons for Elementor needs Elementor plugin to be installed and activated in order to work.', 'creative-addons-for-elementor' ) );
}

/**
 * Show Admin notice if Elementor version is old
 */
function crel_admin_notice_elementor_is_old() {
	printf( '<div class="notice crel-notice notice-warning is-dismissible"><p style="padding: 13px 0">%1$s</p></div>',
		esc_html__( 'Creative Addons for Elementor requires higher Elementor version.', 'creative-addons-for-elementor' ));
}

/**
 * Show Admin notice if PHP version is old
 */
function crel_admin_notice_php_is_old() {
	printf( '<div class="notice crel-notice notice-warning is-dismissible"><p style="padding: 13px 0">%1$s</p></div>',
		esc_html__( 'Creative Addons for Elementor requires higher PHP version.', 'creative-addons-for-elementor' ));
}

require_once CREATIVE_ADDONS_DIR_PATH . 'includes/system/plugin-setup.php';
