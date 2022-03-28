<?php
/**
 * Editor setup.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\ABS;

use WebManDesign\ABS\Hook;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Setup_Editor {

	/**
	 * Initialization.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			/**
			 * Enabling theme-independent editor features.
			 */
			add_theme_support( 'custom-line-height' );
			add_theme_support( 'custom-units' );
			add_theme_support( 'custom-spacing' );

	} // /init

}
