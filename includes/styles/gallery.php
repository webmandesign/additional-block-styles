<?php
/**
 * Gallery block styles.
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
	'core/gallery',
);

Register::add_style(
	'caption-below',
	array(
		'label'  => _x( 'Caption below', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);
