<?php
/**
 * Overlapping related block styles.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.5.0
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
	'core/post-featured-image',
);

// Caution: This causes some issues within full-aligned containers.
Register::add_style(
	'pull-up',
	array(
		'label'  => _x( 'Pull up', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'pull-down',
	array(
		'label'  => _x( 'Pull down', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

$blocks = array(
	'core/column',
	'core/cover',
	'core/group',
	'core/heading',
	'core/image',
	'core/post-featured-image',
);

Register::add_style(
	'pull-left',
	array(
		'label'  => _x( 'Pull left', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

Register::add_style(
	'pull-right',
	array(
		'label'  => _x( 'Pull right', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);

$blocks = array(
	'core/column',
	'core/group',
	'core/image',
	'core/post-featured-image',
);

Register::add_style(
	'pull-left-right',
	array(
		'label'  => _x( 'Pull left & right', 'Block style label.', 'additional-block-styles' ),
		'blocks' => $blocks,
	)
);
