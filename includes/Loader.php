<?php
/**
 * Loader.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.5.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Loader {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'after_setup_theme', __CLASS__ . '::after_setup_theme', 20 );

	} // /init

	/**
	 * After setup theme.
	 *
	 * @since    1.0.0
	 * @version  1.5.0
	 *
	 * @return  void
	 */
	public static function after_setup_theme() {

		// Requirements check

			if ( ! function_exists( 'register_block_style' ) ) {
				return;
			}


		// Processing

			Assets::init();
			Register::init();
			Setup_Editor::init();

			Options::init(); // Has to be after Register class.

	} // /after_setup_theme

}
