<?php
/**
 * Single property — purchase FAQ cards.
 *
 * @package Growmodo
 */

$faqs = array(
	array(
		'q' => 'How do I schedule a property viewing?',
		'a' => 'Contact our team through the inquiry form on this page or reach out via phone. An Estatein advisor will confirm a convenient time to tour the property with you.',
	),
	array(
		'q' => 'What documents do I need to buy a property?',
		'a' => 'Typically you will need proof of identity, proof of funds or mortgage pre-approval, and any relevant tax documents. Your advisor will guide you through the full checklist.',
	),
	array(
		'q' => 'How long does the buying process take?',
		'a' => 'Timelines vary by location and financing, but most purchases complete within 30–60 days after an accepted offer. We keep you informed at every milestone.',
	),
);
$total = count( $faqs );
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

	<div class="mt-8 flex items-center justify-between border-t border-grey-15 pt-5">
		<p class="text-lg font-medium text-grey-60">
			<span class="text-absolute-white">01</span> of <?php echo esc_html( str_pad( (string) $total, 2, '0', STR_PAD_LEFT ) ); ?>
		</p>
		<div class="flex gap-2.5">
			<span class="inline-flex items-center justify-center rounded-full border border-grey-15 bg-grey-08 p-3.5 opacity-50" aria-hidden="true">
				<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
			</span>
			<span class="inline-flex items-center justify-center rounded-full border border-grey-15 bg-grey-10 p-3.5 opacity-50" aria-hidden="true">
				<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
			</span>
		</div>
	</div>
</section>
