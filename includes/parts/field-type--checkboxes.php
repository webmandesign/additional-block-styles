<?php
/**
 * Options field type: Checkboxes.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.5.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$value      = array_filter( (array) Options::get( $args['name'] ) );
$all_styles = (array) Register::get_styles(); // Get all available block styles.

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
			. '&nbsp;'
			. '<span>' . esc_attr( $style_label ) . '</span>'
			. '</label>'
			. '</li>';
	}

?></ol>

<style>
	.abs-form-field-checkboxes {
		display: grid;
		column-gap: 2em;
		grid-auto-columns: max-content;
		max-width: 900px;
		padding-inline: 0;
		margin-inline: 0;
		list-style: none;
	}

	.abs-form-field-checkboxes li {
		padding: 0;
		margin: 0;
		border: 1px solid transparent;
		border-bottom: 1px dotted;
	}

	.abs-form-field-checkboxes li:hover {
		border-inline-start-color: currentColor;
	}

	.abs-form-field-checkboxes label {
		display: block;
		padding: .5em;
	}

	@media (min-width: 480px) {
		.abs-form-field-checkboxes { grid-template-columns: repeat( 2, auto ); }
	}

	@media (min-width: 1200px) {
		.abs-form-field-checkboxes { grid-template-columns: repeat( 3, auto ); }
	}
</style>
