<?php
/**
 * Overlapping related block styles.
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
	'core/columns',
	'core/cover',
	'core/group',
	'core/image',
	'core/media-text',
);

// Caution: This causes some issues within full-aligned containers.
Register::add_style(
	'overlap-above',
	array(
		'label'  => _x( 'Overlap above', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'overlap-below',
	array(
		'label'  => _x( 'Overlap below', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);
