<?php
/**
 * Options admin screen.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.1.0
 */

namespace WebManDesign\ABS;

use WebManDesign\ABS\Hook;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Options {

	/**
	 * User capability to edit plugin options.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     string
	 */
	public static $capability = 'edit_theme_options';

	/**
	 * WordPress admin page used as parent for plugin options.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     string
	 */
	public static $admin_page_slug = 'options-abs';

	/**
	 * WordPress admin page section for plugin options.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     string
	 */
	public static $settings_group = 'abs_options';

	/**
	 * Plugin option name.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     string
	 */
	public static $option_name = 'abs';

	/**
	 * Default option values.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     array
	 */
	public static $option_defaults = array(
		'overlap_value'          => '100px',
		'overlap_gradient_value' => '100px',
		'shadow_blur'            => '1em',
		'shadow_opacity'         => '.15',
	);

	/**
	 * Cache for saved options.
	 *
	 * @since   1.1.0
	 * @access  public
	 * @var     array
	 */
	public static $options = array();

	/**
	 * Initialization.
	 *
	 * @since  1.1.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'admin_menu', __CLASS__ . '::admin_menu' );

				add_action( 'admin_init', __CLASS__ . '::register_settings' );

			// Filters

				add_filter( 'plugin_action_links_' . plugin_basename( ABS_FILE ), __CLASS__ . '::plugin_action_links' );

	} // /init

	/**
	 * Add option page to admin menu.
	 *
	 * @since  1.1.0
	 *
	 * @return  void
	 */
	public static function admin_menu() {

		// Processing

			add_options_page(
				esc_html__( 'Abs - Additional Block Styles plugin settings', 'additional-block-styles' ),
				esc_html__( 'Abs', 'additional-block-styles' ),
				self::$capability,
				self::$admin_page_slug,
				__CLASS__ . '::admin_page'
			);

	} // /admin_menu

	/**
	 * Render admin page.
	 *
	 * @since  1.1.0
	 *
	 * @return  void
	 */
	public static function admin_page() {

		// Output

			require_once ABS_PATH . 'includes/parts/admin-page.php';

	} // /admin_page

	/**
	 * Register setting options.
	 *
	 * @since  1.1.0
	 *
	 * @return  void
	 */
	public static function register_settings() {

		// Processing

			// Register single option in database for the plugin.
			register_setting(
				self::$settings_group,
				self::$option_name,
				array(
					'type'              => 'array',
					'description'       => esc_html__( 'Abs - Additional Block Styles plugin settings', 'additional-block-styles' ),
					'default'           => self::$option_defaults,
					'sanitize_callback' => function( $value ) {
						return (array) $value;
					}
				)
			);

			// Options for overlapping.
			$section = 'overlap';
			add_settings_section(
				$section,
				esc_html__( 'Overlapping', 'additional-block-styles' ),
				'',
				self::$admin_page_slug
			);

				$key = 'overlap_value';
				add_settings_field(
					$key,
					esc_html__( 'Overlap value', 'additional-block-styles' ),
					__CLASS__ . '::form_field',
					self::$admin_page_slug,
					$section,
					array(
						'name'        => $key,
						'id'          => $key,
						'label_for'   => $key,
						'description' =>
							esc_html__( 'Set a positive value here.', 'additional-block-styles' )
							. ' '
							. sprintf(
								/* translators: %s: CSS style rule name with link to more details page at developer.mozilla.org. */
								__( 'You can use any value valid for %s CSS style.', 'additional-block-styles' ),
								'<a href="https://developer.mozilla.org/docs/Web/CSS/margin-top"><code>margin-top</code></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::$option_defaults[ $key ] . '</code>'
							),
					)
				);

				$key = 'overlap_gradient_value';
				add_settings_field(
					$key,
					esc_html__( 'Gradient overlap value', 'additional-block-styles' ),
					__CLASS__ . '::form_field',
					self::$admin_page_slug,
					$section,
					array(
						'name'        => $key,
						'id'          => $key,
						'label_for'   => $key,
						'description' =>
							esc_html__( 'This sets size of overlap gradient for "Gradient" styles of Media & Text block.', 'additional-block-styles' )
							. ' '
							. esc_html__( 'Set a positive value here.', 'additional-block-styles' )
							. ' '
							. sprintf(
								/* translators: %s: CSS style rule name with link to more details page at developer.mozilla.org. */
								__( 'You can use any value valid for %s CSS style.', 'additional-block-styles' ),
								'<a href="https://developer.mozilla.org/docs/Web/CSS/margin-left"><code>margin-left</code></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::$option_defaults[ $key ] . '</code>'
							),
					)
				);

			// Options for shadows.
			$section = 'shadow';
			add_settings_section(
				$section,
				esc_html__( 'Shadows', 'additional-block-styles' ),
				'',
				self::$admin_page_slug
			);

				$key = 'shadow_blur';
				add_settings_field(
					$key,
					esc_html__( 'Shadow blur radius', 'additional-block-styles' ),
					__CLASS__ . '::form_field',
					self::$admin_page_slug,
					$section,
					array(
						'name'        => $key,
						'id'          => $key,
						'label_for'   => $key,
						'description' =>
							sprintf(
								/* translators: %s: CSS style rule name with link to more details page at developer.mozilla.org. */
								__( 'You can use any value valid for %s CSS style.', 'additional-block-styles' ),
								'<a href="https://developer.mozilla.org/docs/Web/CSS/box-shadow#values"><code>box-shadow &lt;blur-radius></code></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::$option_defaults[ $key ] . '</code>'
							),
					)
				);

				$key = 'shadow_opacity';
				add_settings_field(
					$key,
					esc_html__( 'Shadow opacity', 'additional-block-styles' ),
					__CLASS__ . '::form_field',
					self::$admin_page_slug,
					$section,
					array(
						'name'        => $key,
						'id'          => $key,
						'label_for'   => $key,
						'description' =>
							sprintf(
								/* translators: %s: CSS style rule name with link to more details page at developer.mozilla.org. */
								__( 'You can use any value valid for %s CSS style.', 'additional-block-styles' ),
								'<a href="https://developer.mozilla.org/docs/Web/CSS/opacity#values"><code>opacity</code></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::$option_defaults[ $key ] . '</code>'
							),
					)
				);

	} // /register_settings

	/**
	 * Render setting field.
	 *
	 * @since  1.1.0
	 *
	 * @param  array $args
	 *
	 * @return  void
	 */
	public static function form_field( array $args = array() ) {

		// Variables

			$args = wp_parse_args( $args, array(
				'name'        => null,
				'id'          => null,
				'type'        => null,
				'description' => null,
			) );


		// Output

			if ( file_exists( ABS_PATH . 'includes/parts/field-name--' . $args['name'] . '.php' ) ) {
				include ABS_PATH . 'includes/parts/field-name--' . $args['name'] . '.php';
			} elseif ( file_exists( ABS_PATH . 'includes/parts/field-type--' . $args['type'] . '.php' ) ) {
				include ABS_PATH . 'includes/parts/field-type--' . $args['type'] . '.php';
			} else {

				echo '<p>'
					. '<input'
					. '	type="text"'
					. '	id="' . esc_attr( $args['id'] ) . '"'
					. '	name="' . esc_attr( self::$option_name . '[' . $args['name'] . ']' ) . '"'
					. '	value="' . esc_attr( self::get( $args['name'] ) ) . '"'
					. '	placeholder="' . esc_attr( _x( 'Default:', 'Plugin option default value label.', 'additional-block-styles' ) . ' ' . self::$option_defaults[ $args['name'] ] ) . '"'
					. '	/>'
					. '</p>';

				if ( $args['description'] ) {
					echo '<p class="description">'
						. wp_kses( $args['description'], array(
							'br'     => array(),
							'code'   => array(),
							'em'     => array(),
							'mark'   => array(),
							'strong' => array(),

							'a' => array(
								'href'   => array(),
								'rel'    => array(),
								'title'  => array(),
								'target' => array(),
							),
						) )
						. '</p>';
				}
			}

	} // /form_field

	/**
	 * Get plugin option value.
	 *
	 * @since  1.1.0
	 *
	 * @param  string $option
	 *
	 * @return  mixed
	 */
	public static function get( string $option ) {

		// Processing

				if ( empty( self::$options ) ) {
					self::$options = (array) get_option( self::$option_name, self::$option_defaults );
				}


			// Output

				if (
					isset( self::$options[ $option ] )
					&& '' !== trim( self::$options[ $option ] )
				) {
					return self::$options[ $option ];
				} elseif ( isset( self::$option_defaults[ $option ] ) ) {
					return self::$option_defaults[ $option ];
				} else {
					return null;
				}

	} // /get

	/**
	 * Set plugin action links.
	 *
	 * @since  1.1.0
	 *
	 * @param  array $links
	 *
	 * @return  array
	 */
	public static function plugin_action_links( array $links ) {

		// Processing

			$links[] =
				'<a href="' . esc_url( menu_page_url( self::$admin_page_slug, false ) ) . '">'
				. esc_html_x( 'Settings', 'Plugin action link.', 'additional-block-styles' )
				. '</a>';


		// Output

			return $links;

	} // /plugin_action_links

}
