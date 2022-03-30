<?php
/**
 * Responsive design related block styles.
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
	'hidden-on-tablet',
	array(
		'label'  => _x( 'Hide on tablet', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/column',
		),
	)
);

Register::add_style(
	'stacked-on-tablet',
	array(
		'label'  => _x( 'Stack on tablet', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/columns',
			'core/media-text',
		),
	)
);
