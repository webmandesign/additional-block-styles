<?php
/**
 * Spacing related block styles: margins, padding, gaps.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.4.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

Register::add_style(
	'no-gap-vertical',
	array(
		'label'  => _x( 'No vertical gap', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/column',
			'core/columns',
			'core/cover',
			'core/gallery',
			'core/group',
			'core/heading',
			'core/image',
			'core/latest-posts',
			'core/media-text',
			'core/paragraph',
		),
	)
);

Register::add_style(
	'no-gaps',
	array(
		'label'  => _x( 'No gaps', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/columns',
			'core/gallery',
			'core/group',
		),
	)
);
