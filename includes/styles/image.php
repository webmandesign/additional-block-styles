<?php
/**
 * Gallery block styles.
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
	'paint-brush',
	array(
		'label'  => _x( 'Paint brush', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/image',
			'core/media-text',
		),
	)
);

Register::add_style(
	'flower',
	array(
		'label'  => _x( 'Flower', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/image',
			'core/media-text',
		),
	)
);

Register::add_style(
	'oval',
	array(
		'label'  => _x( 'Oval', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/image',
			'core/media-text',
		),
	)
);

Register::add_style(
	'inset-shadow',
	array(
		'label'  => _x( 'Inner shadow', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/cover',
		),
	)
);
