<?php
/**
 * Register block styles.
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

class Register {

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
	 * Initialization.
	 *
	 * @since    1.0.0
	 * @version  1.5.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			include_once ABS_PATH . 'includes/styles/_index.php';

			self::register();

	} // /init

	/**
	 * Register block styles.
	 *
	 * @since    1.0.0
	 * @version  1.6.0
	 *
	 * @return  void
	 */
	public static function register() {

		// Variables

			if ( ! defined( 'ABS_USE_BLOCK_LABEL_SUFFIX' ) ) {
				define( 'ABS_USE_BLOCK_LABEL_SUFFIX', true );
			}


		// Processing

			foreach ( self::get_styles_enabled() as $block_style => $args ) {

				if (
					empty( $args['blocks'] )
					|| empty( $args['label'] )
				) {
					continue;
				}

				// Convert custom arguments array into actual style properties.
				$style_properties = self::get_properties( $block_style, $args );

				// Identify block styles from this plugin.
				if ( ABS_USE_BLOCK_LABEL_SUFFIX ) {
					$style_properties['label'] = $style_properties['label'] . esc_html_x( ' (Abs)', 'Block style label suffix. Plugin name abbreviation.', 'additional-block-styles' );
				}

				// Register block styles for each block.
				foreach ( (array) $args['blocks'] as $block_name ) {
					register_block_style( $block_name, $style_properties );
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
	 * @since    1.0.0
	 * @version  1.5.0
	 *
	 * @param  string $block_style
	 * @param  array  $args
	 *
	 * @return  array
	 */
	public static function get_properties( string $block_style, array $args ): array {

		// Variables

			// Prefix the block style CSS class.
			$class = sanitize_html_class( Assets::$prefix . $block_style );


		// Output

			return array_filter(
				wp_parse_args(
					$args,
					array(
						'name'  => $class,
						'label' => $class,
					)
				)
			);

	} // /get_properties

	/**
	 * Gets all block styles setup array.
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
	 * Gets only enabled block styles setup array.
	 *
	 * @since    1.5.0
	 * @version  1.6.0
	 *
	 * @return  array
	 */
	public static function get_styles_enabled(): array {

		// Variables

			$disabled = array_filter( (array) Options::get( 'disable_block_styles' ) );


		// Output

			/**
			 * Filters enabled block styles setup array.
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
			 * @since  1.5.0
			 *
			 * @param  array $enabled_styles
			 */
			return array_filter( (array) apply_filters( 'abs/register/get_styles_enabled', array_diff_key( self::get_styles(), array_flip( $disabled ) ) ) );

	} // /get_styles_enabled

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
