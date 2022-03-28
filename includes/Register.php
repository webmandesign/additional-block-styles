<?php
/**
 * Register block styles.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Register {

	/**
	 * Block style CSS class prefix.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $prefix = 'abs-';

	/**
	 * Placeholder CSS selector.
	 *
	 * Can be used in CSS code and will be replaced
	 * with actual block style CSS class.
	 *
	 * @see  assets/scss/_setup/_selectors.scss
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $css_selector = '.abs';

	/**
	 * Block styles setup array.
	 *
	 * Contains style IDs with properties to register the style.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $styles = array();

	/**
	 * Should we use `!important` in CSS styles?.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     bool
	 */
	private static $use_important = true;

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
			 * Filters whether to use `!important` in CSS styles globally.
			 *
			 * @since  1.0.0
			 *
			 * @param  bool $use_important
			 */
			self::$use_important = (bool) apply_filters( 'abs/use_important', ABS_USE_IMPORTANT );

			include_once ABS_PATH . 'styles/_index.php';

			self::register();

	} // /init

	/**
	 * Register block styles.
	 *
	 * @since  1.0.0
	 *
	 * @return  void
	 */
	public static function register() {

		// Variables

			$styles = self::get_styles();


		// Processing

			foreach ( $styles as $block_style => $args ) {

				if (
					empty( $args['blocks'] )
					|| empty( $args['label'] )
				) {
					continue;
				}

				// Convert custom arguments array into actual style properties.
				$style_properties = self::get_properties( $block_style, $args );

				// Register block styles for each block.
				foreach ( (array) $args['blocks'] as $block_name ) {
					register_block_style( $block_name, $style_properties );

					// Make sure we enqueue inline styles just once.
					if (
						! function_exists( 'wp_should_load_separate_core_block_assets' )
						|| ! wp_should_load_separate_core_block_assets()
					) {
						unset( $style_properties['inline_style'] );
					}
				}
			}

	} // /register

	/**
	 * Gets block styles properties array.
	 *
	 * Converts custom block style setup arguments array
	 * into WordPress block style setup properties.
	 *
	 * @link  https://developer.wordpress.org/reference/functions/register_block_style/
	 *
	 * @since  1.0.0
	 *
	 * @param  string $block_style
	 * @param  array  $args
	 *
	 * @return  array
	 */
	public static function get_properties( string $block_style, array $args ): array {

		// Variables

			// Prefix the block style CSS class.
			$class = sanitize_html_class( self::$prefix . $block_style );

			// Convert `$args` to style properties array.
			$props = wp_parse_args( $args, array(
				'name'          => $class,
				'label'         => $class,
				'inline_style'  => true,
				'style_handle'  => null,
				'use_important' => self::$use_important, // Custom property needed below.
			) );


		// Processing

			// Set block style inline CSS code.
			if ( true === $props['inline_style'] ) {
				$css = trim( Assets::get_css( $block_style ) );

				if ( $css ) {
					$props['inline_style'] = str_replace(
						self::$css_selector,
						'.is-style-' . $class,
						$css
					);

					// Remove `!important` if needed.
					if ( false === $props['use_important'] ) {
						$props['inline_style'] = str_replace(
							'!important',
							'',
							$props['inline_style']
						);
					}
				} else {
					unset( $props['inline_style'] );
				}
			}


		// Output

			return array_filter( $props );

	} // /get_properties

	/**
	 * Gets block styles setup array.
	 *
	 * @since  1.0.0
	 *
	 * @return  array
	 */
	public static function get_styles(): array {

		// Output

			/**
			 * Filters block styles setup array.
			 *
			 * @example
			 *   array(
			 *     'block-style-css-class-name' => array(
			 *       'label'        => (string) 'Block style label',
			 *       'blocks'       => array( 'core/block-identifier' ),
			 *       'inline_style' => '.wp-block-identifier.is-style-block-style-css-class-name {...}',
			 *       'style_handle' => 'abs-block-style-css-class-name',
			 *     ),
			 *   )
			 *
			 * @since  1.0.0
			 *
			 * @param  array $styles
			 */
			return (array) apply_filters( 'abs/register/get_styles', self::$styles );

	} // /get_styles

	/**
	 * Adds a singular block style to styles setup array.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $class  A block style CSS class. Will get prefixed with `is-style-` automatically.
	 * @param  array  $props  A block style setup properties array.
	 *
	 * @return  void
	 */
	public static function add_style( string $class, array $props ) {

		// Requirements check

			if (
				empty( $class )
				|| empty( $props )
			) {
				return;
			}


		// Processing

			self::$styles[ $class ] = (array) $props;

	} // /add_style

}
