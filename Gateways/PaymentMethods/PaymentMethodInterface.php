<?php
/**
 * Interface to be implemented by gateways.
 *
 * @package    \Charitable\Gateways\SavedPaymentMethods\PaymentMethodInterface
 * @author    Eric Daams
 * @copyright Copyright (c) 2021, Studio 164a
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since     1.0.0
 * @version   1.0.0
 */

namespace Charitable\Gateways\PaymentMethods;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Payment Method interface.
 *
 * @since 1.0.0
 */
interface PaymentMethodInterface {
	/**
	 * Enable the payment method
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function enable();

	/**
	 * Disable the payment method
	 *
	 * @since  1.0.0
	 *
	 * @return mixed
	 */
	public function disable();

	/**
	 * Is the payment method enabled?
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function is_enabled();

	/**
	 * Get the gateway that this payment method belongs to.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_gateway();

	/**
	 * Get a key for the payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_key();

	/**
	 * Get an icon for the payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_icon();

	/**
	 * Get a label for the payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_label();

	/**
	 * Which currencies does this payment method work for?
	 *
	 * An empty array indicates it will work in all currencies.
	 *
	 * @since  1.0.0
	 *
	 * @return array
	 */
	public function get_currencies();

	/**
	 * Are fields required?
	 *
	 * For some payment methods, no fields need to be rendered - for example:
	 * Paypal will redirect to their own checkout page.
	 * Offline donations don't require anything that's not already provided in the customer details.
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public function are_fields_required();

	/**
	 * Does this payment method support recurring payments?
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public function supports_recurring();


	/**
	 * Does this payment method support refunds?
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public function supports_refunds();


	/**
	 * Does this payment method recurring cancellations?
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public function supports_recurring_cancellation();

	/**
	 * Does this payment method support 1.3.0?
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public function supports_1_3_0();

	/**
	 * Are credit cards supported?
	 *
	 * @since   1.0.0
	 *
	 * @return  boolean
	 */
	public function supports_credit_cards();

}
