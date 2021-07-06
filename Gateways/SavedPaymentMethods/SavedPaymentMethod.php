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
 * Saved payment method.
 *
 * @since 1.0.0
 */
abstract class SavedPaymentMethod implements SavedPaymentMethodInterface {
	/**
	 * Get a saved payment method.
	 *
	 * @since  since
	 *
	 * @return mixed
	 */
	public function get_system_id() {
		return $this->get_gateway() . '::' . $this->get_gateway_id();
	}
}
