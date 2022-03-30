<?php
/**
 * Other block styles.
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
	'drop-shadow',
	array(
		'label'  => _x( 'Drop shadow', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/columns',
			'core/column',
			'core/cover',
			'core/group',
			'core/image',
			'core/media-text',
		),
	)
);
