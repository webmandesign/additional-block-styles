<?php
/**
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since    1.0.0
 * @version  1.8.1
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$files = array(
	'a11y',
	'alignment',
	'gallery',
	'image',
	'lists',
	'media-text',
	'others',
	'overlap',
	'quotes',
	'responsiveness',
	'separator',
	'spacing',
);

foreach ( $files as $file ) {
	include_once __DIR__ . '/' . $file . '.php';
}
