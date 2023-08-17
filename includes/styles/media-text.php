<?php
/**
 * Media & Text block styles.
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
	'core/media-text',
);

Register::add_style(
	'media-on-top',
	array(
		'label'  => _x( 'Media on top', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'gradient',
	array(
		'label'  => _x( 'Gradient', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'wavy',
	array(
		'label'  => _x( 'Wavy split', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);
