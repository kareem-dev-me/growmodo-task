<?php
/**
 * Home FAQ cards (static — matches Figma open cards).
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
<section id="faq" class="container-estatein section-y">
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

	<div class="grid gap-[30px] md:grid-cols-2 xl:grid-cols-3">
		<?php foreach ( $faqs as $faq ) : ?>
			<article class="card-surface flex h-full flex-col rounded-xl p-8 md:p-[50px]">
				<h3 class="text-xl font-semibold leading-[1.5] text-absolute-white md:text-2xl">
					<?php echo esc_html( $faq['q'] ); ?>
				</h3>
				<p class="text-body mt-4 flex-1"><?php echo esc_html( $faq['a'] ); ?></p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-secondary mt-6 inline-flex self-start !bg-grey-10 px-5 py-3.5 text-sm">
					Read More
				</a>
			</article>
		<?php endforeach; ?>
	</div>
</section>
