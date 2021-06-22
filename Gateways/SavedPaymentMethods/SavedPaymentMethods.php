<?php
/**
 * Class responsible for registering and retrieving payment methods.
 *
 * @package   Charitable/Classes/\Charitable\Gateways\Payment\Processors
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
 * \Charitable\Gateways\SavedPaymentMethods\SavedPaymentMethods
 *
 * @since 1.0.0
 */
class SavedPaymentMethods {

	/**
	 * Saved payment methods.
	 *
	 * @since 1.0.0
	 *
	 * @var   PaymentMethodInterface[]
	 */
	private static $methods = array();

	/**
	 * Register a saved payment method.
	 *
	 * @since  1.0.0
	 *
	 * @param  PaymentMethodInterface $method Saved payment method object.
	 * @return void
	 */
	public static function register( $method ) {
		self::$methods[] = $method;
	}

	/**
	 * Return the payment methods.
	 *
	 * @since  1.0.0
	 *
	 * @return PaymentMethodInterface[]
	 */
	public static function get() {
		return self::$methods;
	}

	/**
	 * Check if there are saved payment methods.
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public static function has() {
		return ! empty( self::$methods );
	}
}
