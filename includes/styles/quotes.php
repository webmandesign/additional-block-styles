<?php
/**
 * Quotes related block styles.
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
	'bubble-modern',
	array(
		'label'  => _x( 'Modern bubble', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/quote',
		),
	)
);
