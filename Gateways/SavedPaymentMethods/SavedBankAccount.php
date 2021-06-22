<?php
/**
 * Base class for a saved bank account.
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
abstract class SavedBankAccount extends SavedPaymentMethod implements PaymentMethodInterface, SavedBankAccountInterface {

	/**
	 * Get the payment method type.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_type() {
		return 'bank_account';
	}

	/**
	 * Get a descriptive type.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_descriptive_type() {
		return __( 'bank account', 'charitable' );
	}

	/**
	 * Get the payment method icon.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_icon() {
		return '';
	}

	/**
	 * Return the bank name to show as the account source.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_account_source() {
		return $this->get_bank_name();
	}
}
