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
class SavedPaymentMethods implements Iterator {

	/**
	 * Saved payment methods.
	 *
	 * @since 1.0.0
	 *
	 * @var   PaymentMethodInterface[]
	 */
	public static $methods = array();

	/**
	 * Iterator position.
	 *
	 * @since 1.0.0
	 *
	 * @var   int
	 */
	private $position = 0;

	/**
	 * Register a saved payment method.
	 *
	 * @since  1.0.0
	 *
	 * @param  PaymentMethodInterface $method Saved payment method object.
	 * @return void
	 */
	public function register( $method ) {
		self::$methods[] = $method;
	}

	/**
	 * Rewind position to the start.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
    public function rewind() {
		$this->position = 0;
    }

	/**
	 * Get the current payment method.
	 *
	 * @since  1.0.0
	 *
	 * @return PaymentMethodInterface
	 */
    public function current() {
        return self::$methods[ $this->position ];
    }

	/**
	 * Get the current position.
	 *
	 * @since  1.0.0
	 *
	 * @return int
	 */
    public function key() {
        return $this->position;
    }

	/**
	 * Iterate to the next position.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function next() {
		++$this->position;
	}

	/**
	 * Check that the current position exists within the array.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function valid() {
		return isset( self::$methods[ $this->position ] );
	}
}
