<?php
/**
 * Other block styles.
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

Register::add_style(
	'curved',
	array(
		'label'  => _x( 'Curved', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/group',
		),
	)
);

Register::add_style(
	'curved-top',
	array(
		'label'  => _x( 'Curved top', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/group',
		),
	)
);

Register::add_style(
	'curved-bottom',
	array(
		'label'  => _x( 'Curved bottom', 'Block style label.', 'additional-block-styles' ),
		'blocks' => array(
			'core/group',
		),
	)
);
