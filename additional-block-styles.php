<?php
/**
 * Plugin Name:  Abs - Additional block styles
 * Plugin URI:   https://www.webmandesign.eu/portfolio/additional-block-styles-wordpress-plugin/
 * Description:  Provides additional styles for WordPress native blocks.
 * Version:      1.7.0
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GPL-3.0-or-later
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  additional-block-styles
 * Domain Path:  /languages
 *
 * Requires PHP:       7.0
 * Requires at least:  6.0
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
define( 'ABS_VERSION', '1.7.0' );
define( 'ABS_FILE', __FILE__ );
define( 'ABS_PATH', plugin_dir_path( ABS_FILE ) ); // Trailing slashed.
define( 'ABS_URL', plugin_dir_url( ABS_FILE ) ); // Trailing slashed.

// Load the functionality.
require_once ABS_PATH . 'includes/Autoload.php';
WebManDesign\ABS\Loader::init();
