<?php
/**
 * Options admin screen.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.1.0
 * @version  1.6.0
 */

namespace WebManDesign\ABS;

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
	 * @since    1.1.0
	 * @version  1.6.0
	 *
	 * @return  void
	 */
	public static function init() {

		// Processing

			// Actions

				add_action( 'admin_menu', __CLASS__ . '::admin_menu' );

				add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles' );

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
	 * Options screen CSS styles.
	 *
	 * @since  1.6.0
	 *
	 * @param  string $hook
	 *
	 * @return  void
	 */
	public static function styles( string $hook ) {

		// Requirements check

			if ( 'settings_page_' . self::$admin_page_slug !== $hook ) {
				return;
			}


		// Processing

			wp_enqueue_style(
				'abs-options',
				ABS_URL . 'assets/css/options.css',
				array(),
				'v' . ABS_VERSION
			);

	} // /styles

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
	 * @since    1.1.0
	 * @version  1.6.0
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
					'default'           => self::get_defaults(),
					'sanitize_callback' => function( $option ) {

						foreach ( (array) $option as $key => $value ) {
							if ( 'disable_block_styles' === $key ) {
								$option[ $key ] = array_filter( (array) $option[ $key ] );
							} else {
								$option[ $key ] = sanitize_text_field( $option[ $key ] );
							}
						}

						return $option;
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
								'<a href="https://developer.mozilla.org/docs/Web/CSS/margin-top"><code>margin-top</code><span aria-hidden="true">↗︎</span></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::get_defaults( $key ) . '</code>'
							),
					)
				);

				$key = 'overlap_inline_value';
				add_settings_field(
					$key,
					esc_html__( 'Pull left/right value', 'additional-block-styles' ),
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
								'<a href="https://developer.mozilla.org/docs/Web/CSS/margin-left"><code>margin-left</code><span aria-hidden="true">↗︎</span></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::get_defaults( $key ) . '</code>'
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
							esc_html__( 'This sets the size of overlap gradient for "Gradient" style of Media & Text block.', 'additional-block-styles' )
							. ' '
							. esc_html__( 'Set a positive value here.', 'additional-block-styles' )
							. ' '
							. sprintf(
								/* translators: %s: CSS style rule name with link to more details page at developer.mozilla.org. */
								__( 'You can use any value valid for %s CSS style.', 'additional-block-styles' ),
								'<a href="https://developer.mozilla.org/docs/Web/CSS/margin-left"><code>margin-left</code><span aria-hidden="true">↗︎</span></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::get_defaults( $key ) . '</code>'
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
								'<a href="https://developer.mozilla.org/docs/Web/CSS/box-shadow#values"><code>box-shadow &lt;blur-radius></code><span aria-hidden="true">↗︎</span></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::get_defaults( $key ) . '</code>'
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
								'<a href="https://developer.mozilla.org/docs/Web/CSS/opacity#values"><code>opacity</code><span aria-hidden="true">↗︎</span></a>'
							)
							. '<br>'
							. sprintf(
								/* translators: %s: default plugin option value. */
								__( 'Default value: %s', 'additional-block-styles' ),
								'<code>' . self::get_defaults( $key ) . '</code>'
							),
					)
				);

			// Option for toggling styles.
			$section = 'toggles';
			add_settings_section(
				$section,
				esc_html__( 'Toggle block styles', 'additional-block-styles' ),
				'',
				self::$admin_page_slug
			);

				$key = 'disable_block_styles';

				$choices = (array) Register::get_styles(); // Get all available block styles.
				$choices = array_combine( array_keys( $choices ), array_column( $choices, 'label' ) );

				asort( $choices );

				add_settings_field(
					$key,
					esc_html__( 'Enable/disable block styles', 'additional-block-styles' ),
					__CLASS__ . '::form_field',
					self::$admin_page_slug,
					$section,
					array(
						'name'      => $key,
						'id'        => $key,
						'label_for' => $key,
						'type'      => 'checkboxes',
						'choices'   => $choices,
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

				do_action( 'abs/options/field-type/text/before', $args );

				echo '<p>'
					. '<input'
					. '	type="text"'
					. '	class="abs-input-code"'
					. '	id="' . esc_attr( $args['id'] ) . '"'
					. '	name="' . esc_attr( self::$option_name . '[' . $args['name'] . ']' ) . '"'
					. '	value="' . esc_attr( self::get( $args['name'] ) ) . '"'
					. '	placeholder="' . esc_attr( _x( 'Default:', 'Plugin option default value label.', 'additional-block-styles' ) . ' ' . self::get_defaults( $args['name'] ) ) . '"'
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

				do_action( 'abs/options/field-type/text/after', $args );
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
					self::$options = (array) get_option( self::$option_name, self::get_defaults() );
				}


		// Output

			if (
				isset( self::$options[ $option ] )
				&& (
					(
						is_string( self::$options[ $option ] )
						&& '' !== trim( self::$options[ $option ] )
					)
					|| is_array( self::$options[ $option ] )
				)
			) {
				return self::$options[ $option ];
			} else {
				return self::get_defaults( $option );
			}

	} // /get

	/**
	 * Get default plugin option value.
	 *
	 * @since    1.5.0
	 * @version  1.6.0
	 *
	 * @param  string $option
	 *
	 * @return  mixed
	 */
	public static function get_defaults( string $option = null ) {

		// Variables

			$defaults = array(
				'overlap_value'          => '100px',
				'overlap_inline_value'   => 'min(10vw, 100px)',
				'overlap_gradient_value' => '100px',
				'shadow_blur'            => '1em',
				'shadow_opacity'         => '.15',
				'disable_block_styles'   => array(),
			);


		// Output

			if ( ! is_null( $option ) ) {
				return ( isset( $defaults[ $option ] ) ) ? ( $defaults[ $option ] ) : ( null );
			} else {
				return $defaults;
			}

	} // /get_defaults

	/**
	 * Set plugin action links.
	 *
	 * @since  1.1.0
	 *
	 * @param  array $links
	 *
	 * @return  array
	 */
	public static function plugin_action_links( array $links ): array {

		// Processing

			$links[] =
				'<a href="' . esc_url( menu_page_url( self::$admin_page_slug, false ) ) . '">'
				. esc_html_x( 'Settings', 'Plugin action link.', 'additional-block-styles' )
				. '</a>';


		// Output

			return $links;

	} // /plugin_action_links

}
