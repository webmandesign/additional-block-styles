<?php
/**
 * Assets.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Assets {

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

				add_action( 'wp_enqueue_scripts',          __CLASS__ . '::enqueue', 0 );
				add_action( 'enqueue_block_editor_assets', __CLASS__ . '::enqueue', 0 );

	} // /init

	/**
	 * Enqueue styles and scripts.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function enqueue() {

		// Processing

			/**
			 * @see  assets/scss/global.scss for more info.
			 */
			wp_add_inline_style(
				'wp-block-library',
				self::get_css( '', ABS_PATH . 'assets/css/global.css' )
			);

			if ( doing_action( 'enqueue_block_editor_assets' ) ) {
				wp_add_inline_style(
					'wp-block-library',
					self::get_css( '', ABS_PATH . 'assets/css/editor.css' )
				);
			}

	} // /enqueue

	/**
	 * Get contents of CSS file for specific block style.
	 *
	 * @since    1.0.0
	 * @version  1.1.0
	 *
	 * @param  string $block_style
	 * @param  string $file
	 *
	 * @return  string
	 */
	public static function get_css( string $block_style, string $file = '' ) {

		// Variables

			if ( empty( $file ) ) {
				$file = ABS_PATH . 'assets/css/styles/' . $block_style . '.css';
			}


		// Requirements check

			if ( ! file_exists( $file ) ) {
				return '';
			}


		// Processing

			ob_start();
			include $file;
			$css = ob_get_clean();

			// RTL support and fixing uppercase.
			$rtl_values = array( 'left-rtl', 'right-rtl' );
			if ( is_rtl() ) {
				$css = str_replace(
					$rtl_values,
					array( 'right', 'left' ),
					$css
				);
			} else {
				$css = str_replace(
					$rtl_values,
					array( 'left', 'right' ),
					$css
				);
			}

			// Plugin option values.
			foreach ( Options::$option_defaults as $key => $value ) {
				$css = str_replace(
					'%' . $key . '%',
					Options::get( $key ),
					$css
				);
			}


		// Output

			/**
			 * Filters CSS code of a block style.
			 *
			 * @since  1.0.0
			 *
			 * @param  string $css
			 * @param  string $block_style
			 * @param  string $file
			 */
			return (string) apply_filters( 'abs/assets/get_css', $css, $block_style, $file );

	} // /get_css

	/**
	 * Minify CSS.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $css
	 *
	 * @return  string
	 */
	public static function minify_css( string $css ) {

		// Variables

			$replacements = array(
				PHP_EOL       => '',
				"\t"          => '',
				' > '         => '>',
				' {'          => '{',
				'{ '          => '{',
				': '          => ':',
				', '          => ',',
				' !important' => '!important',
				'; }'         => '}',
				';}'          => '}',
			);


		// Output

			return str_replace(
				array_keys( $replacements ),
				array_values( $replacements ),
				$css
			);

	} // /minify_css

}
