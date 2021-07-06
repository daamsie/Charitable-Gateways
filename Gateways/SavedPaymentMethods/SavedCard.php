<?php
/**
 * Base class for a saved card.
 *
 * @package   Charitable/Classes/Charitable_Webhook_Processor_Donations
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
 * Saved card.
 *
 * @since 1.0.0
 */
abstract class SavedCard extends SavedPaymentMethod implements SavedPaymentMethodInterface, SavedCardInterface {

	/**
	 * Get the payment method type.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_type() {
		return 'card';
	}

	/**
	 * Get a descriptive type.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_descriptive_type() {
		return __( 'card', 'charitable' );
	}

	/**
	 * Return the card type for the source.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_account_source() {
		return $this->get_card_type();
	}
}
