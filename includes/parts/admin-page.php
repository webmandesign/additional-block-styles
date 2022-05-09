<?php
/**
 * Options admin page content.
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.1.0
 */

namespace WebManDesign\ABS;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<form method="post" action="options.php">
		<?php

		settings_fields( Options::$settings_group );

		do_settings_sections( Options::$admin_page_slug );

		submit_button();

		?>
	</form>
</div>
