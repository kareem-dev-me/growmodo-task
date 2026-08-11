<?php
/**
 * Home FAQ accordion.
 *
 * @package Growmodo
 */

$faqs = array(
	array(
		'q' => 'How do I search for properties on Estatein?',
		'a' => 'Learn how to use our user-friendly search tools to find properties that match your criteria by browsing listings, filtering by location and amenities, and saving favorites.',
	),
	array(
		'q' => 'What documents do I need to sell my property through Estatein?',
		'a' => 'Find out about the necessary documentation for listing your property with us, including proof of ownership, recent tax records, and disclosure forms.',
	),
	array(
		'q' => 'How can I contact an Estatein agent?',
		'a' => 'Discover the different ways you can get in touch with our experienced agents using the contact form, phone lines, or office visits.',
	),
);
?>
<section id="faq" class="container-estatein py-16 md:py-20 xl:py-24">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title'        => 'Frequently Asked Questions',
			'body'         => "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.",
			'button_label' => "View All FAQ's",
			'button_url'   => home_url( '/contact/' ),
		)
	);
	?>

	<div id="faq-accordion" data-accordion="collapse" class="grid gap-[30px] md:grid-cols-2 xl:grid-cols-3">
		<?php foreach ( $faqs as $index => $faq ) : ?>
			<?php
			$heading_id = 'faq-heading-' . $index;
			$body_id    = 'faq-body-' . $index;
			?>
			<div class="card-surface rounded-xl p-8 md:p-[50px]">
				<button
					type="button"
					id="<?php echo esc_attr( $heading_id ); ?>"
					data-accordion-target="#<?php echo esc_attr( $body_id ); ?>"
					aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>"
					aria-controls="<?php echo esc_attr( $body_id ); ?>"
					class="flex w-full items-start justify-between gap-4 text-left text-xl font-semibold leading-[1.5] text-absolute-white md:text-2xl"
				>
					<span><?php echo esc_html( $faq['q'] ); ?></span>
				</button>
				<div id="<?php echo esc_attr( $body_id ); ?>" class="<?php echo 0 === $index ? '' : 'hidden'; ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
					<p class="text-body mt-4"><?php echo esc_html( $faq['a'] ); ?></p>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary mt-6 inline-flex !bg-grey-10 px-5 py-3.5 text-sm">Read More</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
