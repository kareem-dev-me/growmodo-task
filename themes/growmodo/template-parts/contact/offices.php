<?php
/**
 * Contact — office locations with tabs.
 *
 * @package Growmodo
 */

$office_body = 'Our main headquarters serve as the heart of Estatein. Located in the bustling city center, this is where our core team of experts operates, driving the excellence and innovation that define us.';

$offices = array(
	array(
		'category'    => 'regional',
		'label'       => 'Main Headquarters',
		'title'       => '123 Estatein Plaza, City Center, Metropolis',
		'body'        => $office_body,
		'email'       => 'info@estatein.com',
		'phone'       => '+1 (123) 456-7890',
		'phone_href'  => '+11234567890',
		'city'        => 'Metropolis',
		'map_url'     => 'https://www.google.com/maps/search/?api=1&query=123+Estatein+Plaza+City+Center+Metropolis',
	),
	array(
		'category'    => 'international',
		'label'       => 'International Headquarters',
		'title'       => '321 Estatein Plaza, City Center, Metropolis',
		'body'        => $office_body,
		'email'       => 'info@estatein.com',
		'phone'       => '+1 (123) 456-7890',
		'phone_href'  => '+11234567890',
		'city'        => 'Metropolis',
		'map_url'     => 'https://www.google.com/maps/search/?api=1&query=321+Estatein+Plaza+City+Center+Metropolis',
	),
	array(
		'category'    => 'regional',
		'label'       => 'Regional Headquarters',
		'title'       => '231 Estatein Plaza, City Center, Metropolis',
		'body'        => $office_body,
		'email'       => 'info@estatein.com',
		'phone'       => '+1 (123) 456-7890',
		'phone_href'  => '+11234567890',
		'city'        => 'Metropolis',
		'map_url'     => 'https://www.google.com/maps/search/?api=1&query=231+Estatein+Plaza+City+Center+Metropolis',
	),
);

$tabs = array(
	'all'           => 'All',
	'regional'      => 'Regional',
	'international' => 'International',
);
?>
<section id="offices" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Discover Our Office Locations',
			'body'  => "Estatein is here to serve you across multiple locations. Whether you're looking to meet our team, discuss real estate opportunities, or simply drop by for a chat, we have offices conveniently located to serve your needs. Explore the categories below to find the Estatein office nearest to you.",
		)
	);
	?>

	<div id="office-locations" class="flex flex-col gap-8 xl:gap-10">
		<div
			role="tablist"
			aria-label="Office categories"
			class="grid grid-cols-3 gap-2.5 self-stretch rounded-[10px] border border-grey-15 bg-grey-10 p-2.5 sm:max-w-[516px] sm:self-start"
		>
			<?php foreach ( $tabs as $tab_key => $tab_label ) : ?>
				<button
					type="button"
					role="tab"
					id="office-tab-<?php echo esc_attr( $tab_key ); ?>"
					aria-selected="<?php echo 'all' === $tab_key ? 'true' : 'false'; ?>"
					data-office-tab="<?php echo esc_attr( $tab_key ); ?>"
					class="office-tab rounded-[10px] border px-3 py-3.5 text-sm font-medium leading-[1.5] transition md:px-6 md:text-lg <?php echo 'all' === $tab_key ? 'border-grey-15 bg-grey-08 text-absolute-white' : 'border-transparent bg-transparent text-grey-60 hover:text-absolute-white'; ?>"
				>
					<?php echo esc_html( $tab_label ); ?>
				</button>
			<?php endforeach; ?>
		</div>

		<div role="tabpanel" class="grid gap-5 md:grid-cols-2 xl:gap-[30px]">
			<?php foreach ( $offices as $office ) : ?>
				<article
					class="office-card card-surface flex h-full flex-col gap-6 rounded-xl p-6 md:gap-[30px] md:p-10 xl:p-[50px]"
					data-office-category="<?php echo esc_attr( $office['category'] ); ?>"
				>
					<div>
						<p class="text-base font-medium text-grey-60 md:text-lg"><?php echo esc_html( $office['label'] ); ?></p>
						<h3 class="mt-1 text-xl font-semibold leading-[1.5] md:mt-1.5 md:text-2xl xl:mt-2.5 xl:text-[30px]">
							<?php echo esc_html( $office['title'] ); ?>
						</h3>
						<p class="text-body mt-1 md:mt-2.5 xl:mt-3.5"><?php echo esc_html( $office['body'] ); ?></p>
					</div>

					<div class="flex flex-wrap gap-2.5">
						<a
							href="<?php echo esc_url( 'mailto:' . $office['email'] ); ?>"
							class="property-badge no-underline"
						>
							<img src="<?php echo esc_url( growmodo_img( 'contact/icons/mail-pill.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
							<?php echo esc_html( $office['email'] ); ?>
						</a>
						<a
							href="<?php echo esc_url( 'tel:' . $office['phone_href'] ); ?>"
							class="property-badge no-underline"
						>
							<img src="<?php echo esc_url( growmodo_img( 'contact/icons/phone-pill.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
							<?php echo esc_html( $office['phone'] ); ?>
						</a>
						<a
							href="<?php echo esc_url( $office['map_url'] ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							class="property-badge no-underline"
						>
							<img src="<?php echo esc_url( growmodo_img( 'contact/icons/location-pill.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
							<?php echo esc_html( $office['city'] ); ?>
						</a>
					</div>

					<a
						href="<?php echo esc_url( $office['map_url'] ); ?>"
						target="_blank"
						rel="noopener noreferrer"
						class="btn-primary mt-auto w-full justify-center"
					>
						Get Direction
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
