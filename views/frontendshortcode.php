<?php
if (!defined('ABSPATH')) exit;

$config = paypalConfig::getInstance();

// Validate Form Handler URL
$form_handler_url = esc_url_raw($config->getItem('plugin_form_handler_url'));
?>

<form method="post" action="<?php echo $form_handler_url; ?>">
	<?php wp_nonce_field('tmm_paypal_nonce', 'tmm_paypal_security'); // Nonce for CSRF protection 
	?>

	<?php if (!empty($atts['amount'])) { ?>
		<input type="hidden" name="AMT" value="<?php echo esc_attr($atts['amount']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['currency'])) { ?>
		<input type="hidden" name="CURRENCYCODE" value="<?php echo esc_attr($atts['currency']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['packet_id'])) { ?>
		<input type="hidden" name="PAYMENTREQUEST_0_CUSTOM" value="<?php echo esc_attr($atts['packet_id']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['description'])) { ?>
		<input type="hidden" name="PAYMENTREQUEST_0_DESC" value="<?php echo esc_attr($atts['description']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['tax'])) { ?>
		<input type="hidden" name="TAXAMT" value="<?php echo esc_attr($atts['tax']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['shipping'])) { ?>
		<input type="hidden" name="SHIPPINGAMT" value="<?php echo esc_attr($atts['shipping']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['handling'])) { ?>
		<input type="hidden" name="HANDLINGAMT" value="<?php echo esc_attr($atts['handling']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['qty'])) { ?>
		<input type="hidden" name="PAYMENTREQUEST_0_QTY" value="<?php echo esc_attr($atts['qty']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['return_url'])) { ?>
		<input type="hidden" name="RETURN_URL" value="<?php echo esc_url_raw($atts['return_url']); ?>" autocomplete="off" />
	<?php } ?>

	<?php if (!empty($atts['cancel_url'])) { ?>
		<input type="hidden" name="CANCEL_URL" value="<?php echo esc_url_raw($atts['cancel_url']); ?>" autocomplete="off" />
	<?php } ?>

	<input type="hidden" name="func" value="start" />

	<?php
	// Secure Button Selection
	$button_style = !empty($atts['button_style']) ? $atts['button_style'] : '';
	if ($button_style === 'buy_now') {
		$button_src = esc_url($config->getItem('buy_now_button_src'));
	} elseif ($button_style === 'checkout') {
		$button_src = esc_url($config->getItem('checkout_button_src'));
	} else {
		$button_src = '';
	}
	?>

	<?php if (!empty($button_src)) { ?>
		<input type="image" src="<?php echo $button_src; ?>" alt="PayPal Button" />
	<?php } else { ?>
		<input type="submit" value="<?php esc_attr_e('Pay with PayPal', TMM_PAYPAL_PLUGIN_TEXTDOMAIN); ?>" />
	<?php } ?>
</form>