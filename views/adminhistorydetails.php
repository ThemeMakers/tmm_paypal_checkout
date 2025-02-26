<?php if (!defined('ABSPATH')) exit; ?>

<div class="wrap">
	<h2><?php esc_html_e('PayPal Express Checkout - Payment details', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></h2>

	<p>
		<a href="<?php echo $config->getItem('plugin_history_url'); ?>" title="Back to the payments history">&laquo; <?php esc_html_e('Back to the payments history', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></a>
	</p>

	<table class="form-table">
		<tr>
			<th><strong><?php esc_html_e('Status', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td style="<?php echo $details->status == 'success' ? 'color:#339900;' : ''; ?>"><?php echo $details->status; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Date', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo date('Y-m-d H:i', $details->created); ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Amount', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo number_format($details->amount, 2); ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Currency', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo $details->currency; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Package ID', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo $details->packet_id; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Description', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo $details->description; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Firstname', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo $details->firstname; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('Lastname', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo $details->lastname; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('E-mail', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td><?php echo $details->email; ?></td>
		</tr>
		<tr>
			<th><strong><?php esc_html_e('API call result', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></strong></th>
			<td>
				<?php
				if (is_serialized($details->summary)) {
					$summary = unserialize($details->summary);
					if (!empty($summary)) {
						foreach ($summary as $key => $value) {
							echo "$key: $value<br />";
						}
					}
				}
				?>
			</td>
		</tr>
	</table>

	<p>
		<a href="<?php echo $config->getItem('plugin_history_url'); ?>" title="<?php esc_html_e('Back to the payments history', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?>">&laquo; <?php esc_html_e('Back to the payments history', TMM_PAYPAL_PLUGIN_TEXTDOMAIN) ?></a>
	</p>
</div><!-- .wrap -->