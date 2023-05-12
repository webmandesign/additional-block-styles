<?php
/**
 * Accessibility related block styles.
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
	'screen-reader-text',
	array(
		'label'  => _x( 'Accessibly hidden', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/heading',
			'core/site-title',
			'core/site-tagline',
		),
	)
);
