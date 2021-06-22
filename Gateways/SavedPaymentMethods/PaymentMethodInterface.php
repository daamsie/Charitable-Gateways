<?php
/**
 * Interface to be implemented by gateways.
 *
 * @package   Charitable/Classes/ProcessorInterface
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
 * Payment Method interface.
 *
 * @since 1.0.0
 */
interface PaymentMethodInterface {
	/**
	 * Get the payment method's gateway.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_gateway();

	/**
	 * Get the gateway's ID for the payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return mixed
	 */
	public function get_gateway_id();

	/**
	 * An ID we use internally to get a specific saved payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_system_id();

	/**
	 * Get the type of payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_type();

	/**
	 * Get a descriptive type.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_descriptive_type();

	/**
	 * Get an icon for the payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_icon();

	/**
	 * Get the card/account name.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_account_name();

	/**
	 * Get the card/account number.
	 *
	 * This will only show the final few digits for
	 * security purposes (and because that's all we
	 * have access to anyway).
	 *
	 * @since  1.0.0
	 *
	 * @return int
	 */
	public function get_account_number();

	/**
	 * Get the account source.
	 *
	 * For example, for a card, this could be MasterCard or
	 * Visa. For a bank account, this will be the name of the
	 * bank.
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	public function get_account_source();
}
