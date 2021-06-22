<?php
/**
 * Interface to be implemented by gateways.
 *
 * @package   Charitable/Classes/SavedPaymentMethods
 * @author    Eric Daams
 * @copyright Copyright (c) 2021, Studio 164a
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since     1.0.0
 * @version   1.0.0
 */

namespace Charitable\Gateways\SavedPaymentMethods;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Saved Card interface.
 *
 * @since 1.0.0
 */
interface SavedCardInterface {
	/**
	 * Get the card type.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_card_type();
}
