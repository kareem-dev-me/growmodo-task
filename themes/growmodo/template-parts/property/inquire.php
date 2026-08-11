<?php
/**
 * Single property — Inquire About form.
 *
 * @package Growmodo
 *
 * @var array $args {
 *   @type array $meta Property meta.
 * }
 */

$meta        = $args['meta'] ?? growmodo_get_property_meta( get_the_ID() );
$field_class = 'w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-lg font-medium text-absolute-white placeholder:text-grey-60 focus:border-purple-60 focus:ring-0';
$label_class = 'mb-2.5 block text-sm font-medium text-absolute-white md:text-base';
$title       = get_the_title();
?>
<section id="inquiry" class="container-estatein section-y">
	<div class="grid gap-10 xl:grid-cols-2 xl:gap-[60px] xl:items-start">
		<div>
			<?php
			get_template_part(
				'template-parts/shared/section',
				'heading',
				array(
					'title' => 'Inquire About ' . $title,
					'body'  => 'Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details, including scheduling a viewing and answering any questions you may have.',
				)
			);
			?>
		</div>

		<div>
			<?php if ( isset( $_GET['inquiry'] ) && 'success' === $_GET['inquiry'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<p class="mb-6 rounded-xl border border-purple-75 bg-grey-10 px-5 py-4 text-purple-75">Thanks — your inquiry was sent. An Estatein advisor will follow up soon.</p>
			<?php elseif ( isset( $_GET['inquiry'] ) && 'invalid' === $_GET['inquiry'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
				<p class="mb-6 rounded-xl border border-grey-15 bg-grey-10 px-5 py-4 text-grey-60">Please complete all required fields with a valid email and accept the terms.</p>
			<?php endif; ?>

			<form
				method="post"
				action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"
				class="card-surface rounded-xl p-6 shadow-[0_0_0_6px_#191919] md:p-10"
			>
				<input type="hidden" name="action" value="growmodo_inquiry" />
				<?php wp_nonce_field( 'growmodo_inquiry', 'growmodo_inquiry_nonce' ); ?>
				<input type="hidden" name="property_id" value="<?php echo esc_attr( (string) get_the_ID() ); ?>" />
				<input type="hidden" name="property_title" value="<?php echo esc_attr( $title ); ?>" />
				<input type="hidden" name="redirect_to" value="<?php echo esc_url( get_permalink() ); ?>" />
				<input type="text" name="website" value="" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

				<div class="grid gap-5 md:grid-cols-2 md:gap-[30px]">
					<div>
						<label for="property-inquiry-first" class="<?php echo esc_attr( $label_class ); ?>">First Name</label>
						<input id="property-inquiry-first" name="first_name" required placeholder="Enter First Name" class="<?php echo esc_attr( $field_class ); ?>" />
					</div>
					<div>
						<label for="property-inquiry-last" class="<?php echo esc_attr( $label_class ); ?>">Last Name</label>
						<input id="property-inquiry-last" name="last_name" required placeholder="Enter Last Name" class="<?php echo esc_attr( $field_class ); ?>" />
					</div>
					<div>
						<label for="property-inquiry-email" class="<?php echo esc_attr( $label_class ); ?>">Email</label>
						<input id="property-inquiry-email" type="email" name="email" required placeholder="Enter Email" class="<?php echo esc_attr( $field_class ); ?>" />
					</div>
					<div>
						<label for="property-inquiry-phone" class="<?php echo esc_attr( $label_class ); ?>">Phone</label>
						<input id="property-inquiry-phone" name="phone" placeholder="Enter Phone Number" class="<?php echo esc_attr( $field_class ); ?>" />
					</div>
					<div>
						<label for="property-inquiry-location" class="<?php echo esc_attr( $label_class ); ?>">Preferred Location</label>
						<select id="property-inquiry-location" name="preferred_location" class="<?php echo esc_attr( $field_class ); ?>">
							<option value="">Select Location</option>
							<?php
							$locations = array( 'Coastal Estates', 'Metropolitan City', 'Suburbia' );
							if ( ! empty( $meta['location'] ) && ! in_array( $meta['location'], $locations, true ) ) {
								array_unshift( $locations, $meta['location'] );
							}
							foreach ( $locations as $loc ) :
								?>
								<option value="<?php echo esc_attr( $loc ); ?>" <?php selected( $meta['location'] ?? '', $loc ); ?>><?php echo esc_html( $loc ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div>
						<label for="property-inquiry-type" class="<?php echo esc_attr( $label_class ); ?>">Property Type</label>
						<select id="property-inquiry-type" name="property_type" class="<?php echo esc_attr( $field_class ); ?>">
							<option value="">Select Property Type</option>
							<?php foreach ( array( 'Villa', 'Apartment', 'Townhouse' ) as $type ) : ?>
								<option value="<?php echo esc_attr( $type ); ?>" <?php selected( $meta['type'] ?? '', $type ); ?>><?php echo esc_html( $type ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="mt-5 md:mt-[30px]">
					<label for="property-inquiry-message" class="<?php echo esc_attr( $label_class ); ?>">Message</label>
					<textarea id="property-inquiry-message" name="message" rows="5" required placeholder="Enter your Message here." class="<?php echo esc_attr( $field_class ); ?>"><?php echo esc_textarea( 'I am interested in ' . $title . '.' ); ?></textarea>
				</div>

				<div class="mt-8 flex flex-col gap-5 md:flex-row md:items-center md:justify-between">
					<label class="flex max-w-xl items-start gap-2.5 text-sm font-medium text-grey-60 md:text-lg">
						<input type="checkbox" name="terms" value="1" required class="mt-1 size-7 shrink-0 rounded border-grey-15 bg-grey-08 text-purple-60 focus:ring-purple-60" />
						<span>I agree with <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-absolute-white underline">Terms of Use</a> and <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-absolute-white underline">Privacy Policy</a></span>
					</label>
					<button type="submit" class="btn-primary shrink-0">Send Your Message</button>
				</div>
			</form>
		</div>
	</div>
</section>
