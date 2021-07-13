<?php
/**
 * Payment Method abstract model
 *
 * @version     1.0.0
 * @package     \Charitable\Gateways\PaymentMethods\PaymentMethod
 * @author      Eric Daams
 * @copyright   Copyright (c) 2021, Studio 164a
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

namespace Charitable\Gateways\PaymentMethods;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * PaymentMethod
 *
 * @abstract
 * @since   x.x.x
 */
class PaymentMethod implements PaymentMethodInterface {

	/**
	 * @var     string The payment method's gateway
	 */
	protected $gateway = '';

	/**
	 * @var     string The payment method's key
	 */
	protected $key = '';

	/**
	 * @var     string Label for the payment method
	 * @since   x.x.x
	 */
	protected $label;

	/**
	 * @var     bool Is this payment method enabled?
	 */
	protected $enabled = true;

	/**
	 * @var     string An SVG icon for this payment method
	 * @since   x.x.x
	 */
	protected $icon;

	/**
	 * @var     boolean Does this payment method require fields to be rendered
	 * @since   x.x.x
	 */
	protected $fields_required = false;

	/**
	 * @var     array Array of options that this payment method supports.
	 * @since   x.x.x
	 */
	protected $supports = array();

	/**
	 * An array of supported currencies. An empty array will support all currencies
	 *
	 * @var     string[]
	 * @since   x.x.x
	 */
	public $currencies = array();

	/**
	 * Initialize the object
	 *
	 * @since x.x.x
	 */
	public function __construct( $gateway, $key, $label, $icon, $opts = array() ) {
		$this->gateway         = $gateway;
		$this->key             = $key;
		$this->label           = $label;
		$this->icon            = $icon;
		$this->currencies      = $opts['currencies'] ?: array();
		$this->fields_required = $opts['fields_required'] ?: false;

		if ( array_key_exists( 'supports', $opts ) ) {
			$this->supports = array_replace( $this->supports, $opts['supports'] );
		}

	}

	/**
	 * Enable the payment method.
	 *
	 * @since   x.x.x
	 *
	 * @return  void
	 */
	public function enable() {
		$this->enabled = true;
	}

	/**
	 * Disable the payment method.
	 *
	 * @since   x.x.x
	 *
	 * @return  void
	 */
	public function disable() {
		$this->enabled = false;
	}

	/**
	 * Is the payment method enabled?
	 *
	 * @since   x.x.x
	 *
	 * @return  bool
	 */
	public function is_enabled() {
		return $this->enabled;
	}

	/**
	 * Return the gateway this belongs to.
	 *
	 * @since   x.x.x
	 *
	 * @return  string
	 */
	public function get_gateway() {
		return $this->gateway;
	}


	/**
	 * Return the payment method key.
	 *
	 * @since   x.x.x
	 *
	 * @return  string
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * Return the payment method label.
	 *
	 * @since   x.x.x
	 *
	 * @return  string
	 */
	public function get_label() {
		return $this->label;
	}

	/**
	 * Return the payment method icon.
	 *
	 * @since   x.x.x
	 *
	 * @return  string
	 */
	public function get_icon() {
		return $this->icon;
	}

	/**
	 * Return the payment method currencies.
	 *
	 * @since   x.x.x
	 *
	 * @return  string
	 */
	public function get_currencies() {
		return $this->currencies;
	}

	/**
	 * Are fields required?
	 *
	 * @since   x.x.x
	 *
	 * @return  boolean
	 */
	public function are_fields_required() {
		return $this->fields_required;
	}

	/**
	 * Check if a the payment method  supports a given feature.
	 *
	 * @since   1.7.0
	 *
	 * @param   string $feature string The name of a feature to test support for.
	 * @return  bool True if the payment method supports the feature, false otherwise.
	 */
	public function supports( $feature ) {
		return in_array( $feature, $this->supports, true ) ? true : false;
	}

}
