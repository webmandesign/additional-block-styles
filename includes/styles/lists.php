<?php
/**
 * Any list related block styles.
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
	'border-inner',
	array(
		'label'  => _x( 'Line separator', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/latest-posts',
			'core/list',
		),
	)
);
