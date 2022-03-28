<?php
/**
 * Spacing related block styles: margins, padding, gaps.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
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
			'core/media-text',
			'core/paragraph',
			'core/post-content',
			'core/post-date',
			'core/post-excerpt',
			'core/post-featured-image',
			'core/post-terms',
			'core/post-title',
			'core/query',
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
		),
	)
);
