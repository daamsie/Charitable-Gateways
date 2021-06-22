<?php
/**
 * The template used to display the gateway fields.
 *
 * @author  Studio 164a
 * @package Charitable/Templates/Donation Form
 * @since   1.0.0
 * @version 1.0.0
 */

use Charitable\Gateways\SavedPaymentMethods\SavedPaymentMethods;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! isset( $view_args['form'] ) || ! isset( $view_args['field'] ) ) {
	return;
}

$form     = $view_args['form'];
$field    = $view_args['field'];
$classes  = $view_args['classes'];
$gateways = $field['gateways'];
$default  = isset( $field['default'] ) && isset( $gateways[ $field['default'] ] ) ? $field['default'] : key( $gateways );

?>
<fieldset id="charitable-gateway-fields" class="charitable-fieldset">
	<?php
	if ( isset( $field['legend'] ) ) : ?>
		<div class="charitable-form-header"><?php echo $field['legend'] ?></div>
	<?php
	endif;

	if ( count( $gateways ) > 1 ) :
	?>
		<fieldset class="charitable-fieldset-field-wrapper">
			<div class="charitable-fieldset-field-header" id="charitable-gateway-selector-header"><?php _e( 'Choose Your Payment Method', 'charitable' ) ?></div>
			<?php
			if ( SavedPaymentMethods::has() ) :
			?>
			<ul class="charitable-saved-payment-methods charitable-form-field">
				<?php foreach ( SavedPaymentMethods::get() as $payment_method ) : ?>
				<li class="charitable-payment-method <?php echo esc_attr( $payment_method->get_type() ); ?>">
					<input type="radio"
						id="payment-method-<?php echo esc_attr( $payment_method->get_gateway_id() ); ?>"
						name="saved_payment_method"
						value="<?php echo esc_attr( $payment_method->get_system_id() ); ?>"
					/>
					<span class="charitable-payment-method-icon"><?php echo $payment_method->get_icon(); ?></span>
					<div class="charitable-payment-method-account-details">
						<span class="charitable-payment-method-account-type"><?php echo $payment_method->get_descriptive_type(); ?></span>
						<span class="charitable-payment-method-account-name"><?php echo $payment_method->get_account_name(); ?></span>
						<span class="charitable-payment-method-account-number">
							<?php printf(
								/* translators: %d: last digits of the card/bank account */
								__( 'Ending with: **%d', 'charitable' ),
								$payment_method->get_account_number()
							);
							?>
						</span>
						<span class="charitable-payment-method-account-source"><?php echo $payment_method->get_account_source(); ?></span>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php
			endif;
			?>
			<ul id="charitable-gateway-selector" class="charitable-radio-list charitable-form-field">
				<?php foreach ( $gateways as $gateway_id => $details ) : ?>
					<li><input type="radio"
							id="gateway-<?php echo esc_attr( $gateway_id ) ?>"
							name="gateway"
							value="<?php echo esc_attr( $gateway_id ) ?>"
							aria-describedby="charitable-gateway-selector-header"
							<?php checked( $default, $gateway_id ) ?> />
						<label for="gateway-<?php echo esc_attr( $gateway_id ) ?>"><?php echo $details['label'] ?></label>
					</li>
				<?php endforeach ?>
			</ul>
		</fieldset>
	<?php
	endif;

	foreach ( $gateways as $gateway_id => $details ) :
		if ( ! isset( $details['fields'] ) || empty( $details['fields'] ) ) :
			continue;
		endif;
		?>
		<div id="charitable-gateway-fields-<?php echo $gateway_id ?>" class="charitable-gateway-fields charitable-form-fields cf" data-gateway="<?php echo $gateway_id ?>">
			<?php $form->view()->render_fields( $details['fields'] ) ?>
		</div><!-- #charitable-gateway-fields-<?php echo $gateway_id ?> -->
	<?php endforeach ?>
</fieldset><!-- .charitable-fieldset -->
