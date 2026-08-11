<?php
/**
 * Template Name: Contact
 *
 * @package Growmodo
 */

get_header();
?>

<section class="border-b border-grey-15 bg-grey-10">
	<div class="container-estatein py-16 md:py-24">
		<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
		<h1 class="text-4xl font-semibold md:text-5xl">Get in Touch With Estatein</h1>
		<p class="mt-4 max-w-3xl text-lg font-medium text-grey-60">
			We're here to help you navigate the world of real estate. Reach out with questions, opportunities, or next steps.
		</p>
	</div>
</section>

<section id="form" class="container-estatein py-16 md:py-24">
	<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
	<h2 class="text-3xl font-semibold md:text-5xl">Let's Connect</h2>
	<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60">
		Send us a message and an Estatein advisor will respond promptly.
	</p>

	<?php if ( isset( $_GET['contact'] ) && 'success' === $_GET['contact'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
		<p class="mt-6 rounded-xl border border-purple-75 bg-grey-10 px-5 py-4 text-purple-75">Thanks — your message was sent.</p>
	<?php elseif ( isset( $_GET['contact'] ) && 'invalid' === $_GET['contact'] ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
		<p class="mt-6 rounded-xl border border-grey-15 bg-grey-10 px-5 py-4 text-grey-60">Please complete all required fields with a valid email.</p>
	<?php endif; ?>

	<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="mt-10 grid gap-6 md:grid-cols-2">
		<input type="hidden" name="action" value="growmodo_contact" />
		<?php wp_nonce_field( 'growmodo_contact', 'growmodo_contact_nonce' ); ?>
		<input type="text" name="website" value="" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

		<div>
			<label for="contact-name" class="mb-2 block text-sm font-medium text-grey-60">Name</label>
			<input id="contact-name" name="name" required class="w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-absolute-white" />
		</div>
		<div>
			<label for="contact-email" class="mb-2 block text-sm font-medium text-grey-60">Email</label>
			<input id="contact-email" type="email" name="email" required class="w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-absolute-white" />
		</div>
		<div class="md:col-span-2">
			<label for="contact-phone" class="mb-2 block text-sm font-medium text-grey-60">Phone</label>
			<input id="contact-phone" name="phone" class="w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-absolute-white" />
		</div>
		<div class="md:col-span-2">
			<label for="contact-message" class="mb-2 block text-sm font-medium text-grey-60">Message</label>
			<textarea id="contact-message" name="message" rows="5" required class="w-full rounded-xl border border-grey-15 bg-grey-08 px-5 py-4 text-absolute-white"></textarea>
		</div>
		<div class="md:col-span-2">
			<button type="submit" class="btn-primary">Send Your Message</button>
		</div>
	</form>
</section>

<section id="offices" class="container-estatein pb-16 md:pb-24">
	<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
	<h2 class="text-3xl font-semibold md:text-5xl">Discover Our Office Locations</h2>
	<p class="mt-3 max-w-3xl text-lg font-medium text-grey-60">Visit Estatein in person or connect with a regional team.</p>
	<div class="mt-10 grid gap-6 md:grid-cols-2">
		<article class="card-surface p-8">
			<p class="text-sm font-medium text-purple-75">Main Headquarters</p>
			<h3 class="mt-3 text-2xl font-semibold">Metropolitan City</h3>
			<p class="mt-3 text-base font-medium text-grey-60">123 Estatein Plaza, Suite 800, Metro City</p>
			<a class="btn-secondary mt-6 inline-flex" href="mailto:hello@estatein.example">Get Direction</a>
		</article>
		<article class="card-surface p-8">
			<p class="text-sm font-medium text-purple-75">Regional Office</p>
			<h3 class="mt-3 text-2xl font-semibold">Coastal Estates</h3>
			<p class="mt-3 text-base font-medium text-grey-60">45 Harbor Avenue, Coastal Estates</p>
			<a class="btn-secondary mt-6 inline-flex" href="mailto:coastal@estatein.example">Get Direction</a>
		</article>
	</div>
</section>

<?php
get_footer();
