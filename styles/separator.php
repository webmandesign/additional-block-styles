<?php
/**
 * Separator block styles.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$blocks = array(
	'core/separator',
);

Register::add_style(
	'double-line',
	array(
		'label'  => _x( 'Double-line', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'zigzag',
	array(
		'label'  => _x( 'Zigzag', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);
