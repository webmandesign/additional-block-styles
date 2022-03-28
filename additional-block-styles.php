<?php
/**
 * Plugin Name:  Additional Block Styles
 * Plugin URI:   https://www.webmandesign.eu/portfolio/additional-block-styles-wordpress-plugin/
 * Description:  Provides additional styles for WordPress native blocks.
 * Version:      1.0.0
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GNU General Public License v3
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  additional-block-styles
 * Domain Path:  /languages
 *
 * GitHub Plugin URI:  https://github.com/webmandesign/additional-block-styles
 *
 * @copyright  WebMan Design, Oliver Juhas
 * @license    GPL-3.0, https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link  https://github.com/webmandesign/additional-block-styles
 * @link  https://www.webmandesign.eu
 *
 * @package  Additional Block Styles
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Constants:

	define( 'ABS_VERSION', '1.0.0' );
	define( 'ABS_FILE', __FILE__ );
	define( 'ABS_PATH', plugin_dir_path( ABS_FILE ) ); // Trailing slashed.
	define( 'ABS_URL', plugin_dir_url( ABS_FILE ) ); // Trailing slashed.

	define( 'ABS_VERSION_WP', '5.8' );
	define( 'ABS_VERSION_PHP', '7.0' );

	if ( ! defined( 'ABS_USE_IMPORTANT' ) ) {
		define( 'ABS_USE_IMPORTANT', true );
	}

// Check that the site meets the minimum WP and PHP requirements.
if (
	version_compare( $GLOBALS['wp_version'], ABS_VERSION_WP, '<' )
	|| version_compare( PHP_VERSION, ABS_VERSION_PHP, '<' )
) {
	require_once ABS_PATH . 'includes/Compatibility.php';
	return;
}

// Load the functionality.
require_once ABS_PATH . 'includes/Autoload.php';
WebManDesign\ABS\Loader::init();
