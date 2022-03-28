<?php
/**
 * Custom PSR-4 autoloader.
 *
 * @link  https://www.php-fig.org/psr/psr-4/
 *
 * @package    Additional Block Styles
 * @copyright  WebMan Design, Oliver Juhas
 *
 * @since  1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class ABS_Autoload {

	/**
	 * PHP class namespace.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $namespace = 'WebManDesign\ABS';

	/**
	 * Directory to load PHP classes from.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string
	 */
	private static $directory = 'includes';

	/**
	 * Array of white-listed, allowed files for improved security.
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     array
	 */
	private static $allowed_files = array(
		'/Assets.php',
		'/Loader.php',
		'/Register.php',
		'/Setup_Editor.php',
	);

	/**
	 * Register custom autoload.
	 *
	 * @since  1.0.0
	 *
	 * @param  string $class_name  Class name to load.
	 *
	 * @return  bool  True if the class was loaded, false otherwise.
	 */
	public static function register( $class_name ) {

		// Requirements check

			if ( 0 !== strpos( $class_name, self::$namespace . '\\' ) ) {
				return false;
			}


		// Variables

			$path  = '';
			$parts = explode( '\\', substr( $class_name, strlen( self::$namespace . '\\' ) ) );


		// Processing

			foreach ( $parts as $part ) {
				$path .= '/' . $part;
			}
			$path .= '.php';

			if ( ! in_array( $path, self::$allowed_files ) ) {
				return false;
			}

			$path = ABS_PATH . self::$directory . $path;

			if ( ! file_exists( $path ) ) {
				return false;
			}

			require_once $path;


		// Output

			return true;

	} // /register

}

spl_autoload_register( 'ABS_Autoload::register' );
