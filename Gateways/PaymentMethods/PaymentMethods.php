<?php
/**
 * Class responsible for registering and retrieving payment methods that are available on a gateway.
 *
 * @package   Charitable/Classes/\Charitable\Gateways\PaymentMethods\PaymentMethods
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
 * \Charitable\Gateways\PaymentMethods\PaymentMethods
 *
 * @since 1.0.0
 */
class PaymentMethods {

	/**
	 * Payment methods.
	 *
	 * @since 1.0.0
	 *
	 * @var   PaymentMethodInterface[]
	 */
	private static $methods = array();

	/**
	 * Register a payment method.
	 *
	 * @since  1.0.0
	 *
	 * @param  PaymentMethodInterface $method Payment method object.
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
	 * Check if there are payment methods.
	 *
	 * @since  1.0.0
	 *
	 * @return boolean
	 */
	public static function has() {
		return ! empty( self::$methods );
	}
}
