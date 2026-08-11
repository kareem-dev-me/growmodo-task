<?php
/**
 * Properties archive — Let's Make it Happen inquiry form.
 *
 * @package Growmodo
 */

$field_class = 'w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-lg font-medium text-absolute-white placeholder:text-grey-60 focus:border-purple-60 focus:ring-0';
$label_class = 'mb-2.5 block text-sm font-medium text-absolute-white md:text-base';
?>
<section id="inquiry" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => "Let's Make it Happen",
			'body'  => "Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match. Don't wait; let's embark on this exciting journey together.",
		)
	);
	?>

	<?php if ( isset( $_GET['inquiry'] ) && 'success' === $_GET['inquiry'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
		<p class="mb-8 rounded-xl border border-purple-75 bg-grey-10 px-5 py-4 text-purple-75">Thanks — your inquiry was sent. An Estatein advisor will follow up soon.</p>
	<?php elseif ( isset( $_GET['inquiry'] ) && 'invalid' === $_GET['inquiry'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
		<p class="mb-8 rounded-xl border border-grey-15 bg-grey-10 px-5 py-4 text-grey-60">Please complete all required fields with a valid email and accept the terms.</p>
	<?php endif; ?>

	<form
		method="post"
		action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
		class="card-surface rounded-xl p-6 shadow-[0_0_0_6px_#191919] md:p-10 xl:p-[100px]"
	>
		<input type="hidden" name="action" value="growmodo_inquiry" />
		<?php wp_nonce_field( 'growmodo_inquiry', 'growmodo_inquiry_nonce' ); ?>
		<input type="text" name="website" value="" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

		<div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4 xl:gap-[30px]">
			<div>
				<label for="inquiry-first-name" class="<?php echo esc_attr( $label_class ); ?>">First Name</label>
				<input id="inquiry-first-name" name="first_name" required placeholder="Enter First Name" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="inquiry-last-name" class="<?php echo esc_attr( $label_class ); ?>">Last Name</label>
				<input id="inquiry-last-name" name="last_name" required placeholder="Enter Last Name" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="inquiry-email" class="<?php echo esc_attr( $label_class ); ?>">Email</label>
				<input id="inquiry-email" type="email" name="email" required placeholder="Enter Email" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
			<div>
				<label for="inquiry-phone" class="<?php echo esc_attr( $label_class ); ?>">Phone</label>
				<input id="inquiry-phone" name="phone" placeholder="Enter Phone Number" class="<?php echo esc_attr( $field_class ); ?>" />
			</div>
		</div>

		<div class="mt-5 grid gap-5 md:grid-cols-2 xl:mt-[30px] xl:grid-cols-4 xl:gap-[30px]">
			<div>
				<label for="inquiry-location" class="<?php echo esc_attr( $label_class ); ?>">Preferred Location</label>
				<select id="inquiry-location" name="preferred_location" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select Location</option>
					<option value="Coastal Estates">Coastal Estates</option>
					<option value="Metropolitan City">Metropolitan City</option>
					<option value="Suburbia">Suburbia</option>
				</select>
			</div>
			<div>
				<label for="inquiry-type" class="<?php echo esc_attr( $label_class ); ?>">Property Type</label>
				<select id="inquiry-type" name="property_type" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select Property Type</option>
					<option value="Villa">Villa</option>
					<option value="Apartment">Apartment</option>
					<option value="Townhouse">Townhouse</option>
				</select>
			</div>
			<div>
				<label for="inquiry-bathrooms" class="<?php echo esc_attr( $label_class ); ?>">No. of Bathrooms</label>
				<select id="inquiry-bathrooms" name="bathrooms" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select no. of Bathrooms</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4+">4+</option>
				</select>
			</div>
			<div>
				<label for="inquiry-bedrooms" class="<?php echo esc_attr( $label_class ); ?>">No. of Bedrooms</label>
				<select id="inquiry-bedrooms" name="bedrooms" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select no. of Bedrooms</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4+">4+</option>
				</select>
			</div>
		</div>

		<div class="mt-5 grid gap-5 md:grid-cols-2 xl:mt-[30px] xl:gap-[30px]">
			<div>
				<label for="inquiry-budget" class="<?php echo esc_attr( $label_class ); ?>">Budget</label>
				<select id="inquiry-budget" name="budget" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select Budget</option>
					<option value="Under $500,000">Under $500,000</option>
					<option value="$500,000 – $750,000">$500,000 – $750,000</option>
					<option value="$750,000+">$750,000+</option>
				</select>
			</div>
			<div>
				<label for="inquiry-contact-method" class="<?php echo esc_attr( $label_class ); ?>">Preferred Contact Method</label>
				<select id="inquiry-contact-method" name="contact_method" class="<?php echo esc_attr( $field_class ); ?>">
					<option value="">Select Contact Method</option>
					<option value="Email">Email</option>
					<option value="Phone">Phone</option>
					<option value="Either">Either</option>
				</select>
			</div>
		</div>

		<div class="mt-5 xl:mt-[30px]">
			<label for="inquiry-message" class="<?php echo esc_attr( $label_class ); ?>">Message</label>
			<textarea id="inquiry-message" name="message" rows="5" required placeholder="Enter your Message here." class="<?php echo esc_attr( $field_class ); ?>"></textarea>
		</div>

		<div class="mt-8 flex flex-col gap-5 xl:mt-10 xl:flex-row xl:items-center xl:justify-between">
			<label class="flex max-w-3xl items-start gap-2.5 text-sm font-medium text-grey-60 md:text-lg">
				<input type="checkbox" name="terms" value="1" required class="mt-1 size-7 shrink-0 rounded border-grey-15 bg-grey-08 text-purple-60 focus:ring-purple-60" />
				<span>I agree with <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-absolute-white underline">Terms of Use</a> and <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-absolute-white underline">Privacy Policy</a></span>
			</label>
			<button type="submit" class="btn-primary shrink-0">Send Your Message</button>
		</div>
	</form>
</section>
