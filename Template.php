<?php
/**
 * Set up the template path.
 *
 * This is not required when the package is merged into core. It is
 * used here just to make sure that the package's templates are used
 * instead of the current core templates. When merging the package
 * into core, the core templates should be updated with the package's
 * changes.
 *
 * @package   Charitable/Classes
 * @author    Eric Daams
 * @copyright Copyright (c) 2021, Studio 164a
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since     1.0.0
 * @version   1.0.0
 */

namespace Charitable;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Template class.
 *
 * @since 1.0.0
 */
class Template extends \Charitable_Template {
	/**
	 * Return the base template path.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_base_template_path() {
		return __DIR__ . '/templates/';
	}
}
