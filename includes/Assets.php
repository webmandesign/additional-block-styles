<?php
/**
 * Assets.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.6.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Assets {

	/**
	 * Block style CSS class prefix.
	 *
	 * @since    1.0.0
	 * @version  1.5.0
	 * @access   public
	 * @var      string
	 */
	public static $prefix = 'abs-';

	/**
	 * Placeholder CSS selector.
	 *
	 * Can be used in CSS code and will be replaced
	 * with actual block style CSS class.
	 *
	 * @see  assets/scss/_setup/_selectors.scss
	 *
	 * @since    1.0.0
	 * @version  1.5.0
	 * @access   public
	 * @var      string
	 */
	public static $css_selector = '.abs';

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
	 * @since    1.0.0
	 * @version  1.6.0
	 *
	 * @return  void
	 */
	public static function enqueue() {

		// Variables

			$styles = Register::get_styles_enabled();
			$handle = 'wp-block-library';

			if ( ! defined( 'ABS_USE_IMPORTANT' ) ) {
				define( 'ABS_USE_IMPORTANT', true );
			}


		// Processing

			/**
			 * @see  assets/scss/global.scss for more info.
			 */
			wp_add_inline_style(
				$handle,
				'/* ABS styles start: */' . PHP_EOL
				. self::get_css( '', ABS_PATH . 'assets/css/global.css' )
			);

			// Individual block styles.
			foreach ( $styles as $block_style => $args ) {

				$css = str_replace(
					self::$css_selector,
					'.is-style-' . sanitize_html_class( self::$prefix . $block_style ),
					trim( Assets::get_css( $block_style ) )
				);

				/**
				 * Filters whether to use `!important` in CSS styles globally.
				 *
				 * @since    1.0.0
				 * @version  1.5.0
				 *
				 * @param  bool   $use_important
				 * @param  string $block_style
				 */
				$use_important = (bool) apply_filters( 'abs/use_important', ABS_USE_IMPORTANT, $block_style );

				// Remove `!important` if needed.
				if ( false === $use_important ) {
					$css = str_replace(
						'!important',
						'',
						$css
					);
				}

				wp_add_inline_style(
					$handle,
					$css
				);
			}

			if ( doing_action( 'enqueue_block_editor_assets' ) ) {
				wp_add_inline_style(
					$handle,
					self::get_css( '', ABS_PATH . 'assets/css/editor.css' )
				);
			}

			wp_add_inline_style(
				$handle,
				'/* /ABS styles end. */'
			);

	} // /enqueue

	/**
	 * Get contents of CSS file for specific block style.
	 *
	 * @since    1.0.0
	 * @version  1.5.0
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
			foreach ( Options::get_defaults() as $key => $value ) {
				if ( is_string( $value ) ) {
					$css = str_replace(
						'%' . $key . '%',
						esc_attr( Options::get( $key ) ),
						$css
					);
				}
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
