<?php
/**
 * Options field type: Checkboxes.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.5.0
 * @version  1.6.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Getting disabled array, not enabled.
 * This approach is plugin update future-proof.
 * See CSS styles below for flipped `checked` styles.
 */
$value      = array_filter( (array) Options::get( $args['name'] ) );
$all_styles = (array) Register::get_styles(); // Get all available block styles.

do_action( 'abs/options/field-type/checkboxes/before', $args );

?>

<?php if ( $args['description'] ) : ?>
<p class="description"><?php

	echo wp_kses( $args['description'], array(
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
	) );

?></p>
<?php endif; ?>

<ol class="abs-form-field-checkboxes"><?php

	foreach ( $args['choices'] as $style_name => $style_label ) {

		if (
			! is_string( $style_name )
			|| ! is_string( $style_label )
		) {
			continue;
		}

		if ( isset( $all_styles[ $style_name ]['blocks'] ) ) {

			$blocks = array_map(
				function( $block ) {
					return str_replace( 'core/', '', $block );
				},
				$all_styles[ $style_name ]['blocks']
			);

			$title = ' title="' . esc_attr( sprintf(
				/* translators: %s: list of block programmatic names. */
				__( 'Related blocks: %s', 'additional-block-styles' ),
				implode( ', ', $blocks )
			) ) . '"';
		} else {
			$title = '';
		}

		echo PHP_EOL
			. '<li>'
			. '<label' . $title . '>'
			. '<input'
			. '	type="checkbox"'
			. '	name="' . esc_attr( self::$option_name . '[' . $args['name'] . '][]' ) . '"'
			. '	value="' . esc_attr( $style_name ) . '"'
			. checked( in_array( $style_name, $value ), true, false )
			. '	/>'
			. '<span class="abs-input-switch"></span>'
			. '<span>' . esc_attr( $style_label ) . '</span>'
			. '</label>'
			. '</li>';
	}

?></ol>

<?php

do_action( 'abs/options/field-type/checkboxes/after', $args );
