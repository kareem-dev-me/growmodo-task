<?php
/**
 * Contact — Let's Connect form.
 *
 * @package Growmodo
 */

$field_class = 'w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-lg font-medium text-absolute-white placeholder:text-grey-60 focus:border-purple-60 focus:ring-0';
$label_class = 'mb-2.5 block text-sm font-medium text-absolute-white md:text-base xl:text-lg';
?>
<section id="form" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => "Let's Connect",
			'body'  => "We're excited to connect with you and learn more about your real estate goals. Use the form below to get in touch with Estatein. Whether you're a prospective client, partner, or simply curious about our services, we're here to answer your questions and provide the assistance you need.",
		)
	);
	?>

	<?php if ( isset( $_GET['contact'] ) && 'success' === $_GET['contact'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
		<p class="mb-8 rounded-xl border border-purple-75 bg-grey-10 px-5 py-4 text-purple-75">Thanks — your message was sent. An Estatein advisor will follow up soon.</p>
	<?php elseif ( isset( $_GET['contact'] ) && 'invalid' === $_GET['contact'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
		<p class="mb-8 rounded-xl border border-grey-15 bg-grey-10 px-5 py-4 text-grey-60">Please complete all required fields with a valid email and accept the terms.</p>
	<?php endif; ?>

	<form
		method="post"
		action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
		class="card-surface rounded-xl p-5 shadow-[0_0_0_6px_#191919] md:p-10 xl:p-[100px]"
	>
		<input type="hidden" name="action" value="growmodo_contact" />
		<?php wp_nonce_field( 'growmodo_contact', 'growmodo_contact_nonce' ); ?>
		<input type="text" name="website" value="" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

		<div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3 xl:gap-[30px]">
			<div>
				<label for="contact-first-name" class="<?php echo esc_attr( $label_class ); ?>">First Name</label>
				<input id="contact-first-name" name="first_name" required placeholder="Enter First Name" autocomplete="given-name" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="contact-last-name" class="<?php echo esc_attr( $label_class ); ?>">Last Name</label>
				<input id="contact-last-name" name="last_name" required placeholder="Enter Last Name" autocomplete="family-name" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="contact-email" class="<?php echo esc_attr( $label_class ); ?>">Email</label>
				<input id="contact-email" type="email" name="email" required placeholder="Enter your Email" autocomplete="email" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="contact-phone" class="<?php echo esc_attr( $label_class ); ?>">Phone</label>
				<input id="contact-phone" type="tel" name="phone" placeholder="Enter Phone Number" autocomplete="tel" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="contact-inquiry-type" class="<?php echo esc_attr( $label_class ); ?>">Inquiry Type</label>
				<select id="contact-inquiry-type" name="inquiry_type" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select Inquiry Type</option>
					<option value="General">General</option>
					<option value="Properties">Properties</option>
					<option value="Agent">Agent</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div>
				<label for="contact-hear-about" class="<?php echo esc_attr( $label_class ); ?>">How Did You Hear About Us?</label>
				<select id="contact-hear-about" name="hear_about" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select</option>
					<option value="Social Media">Social Media</option>
					<option value="Ads">Ads</option>
					<option value="Search">Search</option>
					<option value="Business Partner">Business Partner</option>
					<option value="Friend or Family Member">Friend or Family Member</option>
					<option value="Other">Other</option>
				</select>
			</div>
		</div>

		<div class="mt-5 xl:mt-[30px]">
			<label for="contact-message" class="<?php echo esc_attr( $label_class ); ?>">Message</label>
			<textarea id="contact-message" name="message" rows="6" required placeholder="Enter your Message here." class="<?php echo esc_attr( $field_class ); ?> min-h-[170px]"></textarea>
		</div>

		<div class="mt-8 flex flex-col gap-5 xl:mt-10 xl:flex-row xl:items-center xl:justify-between">
			<label class="flex max-w-3xl items-start gap-2.5 text-sm font-medium text-grey-60 md:text-lg">
				<input type="checkbox" name="terms" value="1" required class="mt-1 size-7 shrink-0 rounded border-grey-15 bg-grey-08 text-purple-60 focus:ring-purple-60" />
				<span>I agree with <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" class="text-absolute-white underline">Terms of Use</a> and <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>" class="text-absolute-white underline">Privacy Policy</a></span>
			</label>
			<button type="submit" class="btn-primary shrink-0 xl:min-w-[250px]">Send Your Message</button>
		</div>
	</form>
</section>
