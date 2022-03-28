<?php
/**
 * Alignment related block styles.
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
	'core/column',
);

Register::add_style(
	'alignleft',
	array(
		'label'  => _x( 'Single column: align left', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'alignright',
	array(
		'label'  => _x( 'Single column: align right', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);
