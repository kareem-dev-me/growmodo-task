<?php
/**
 * About — Navigating the Estatein Experience.
 *
 * @package Growmodo
 */

$steps = array(
	array(
		'num'   => '01',
		'title' => 'Discover a World of Possibilities',
		'body'  => 'Your journey begins with exploring our carefully curated property listings. Use our intuitive search tools to filter properties based on your preferences, including location, type, size, and budget.',
	),
	array(
		'num'   => '02',
		'title' => 'Narrowing Down Your Choices',
		'body'  => "Once you've found properties that catch your eye, save them to your account or make a shortlist. This allows you to compare and revisit your favorites as you make your decision.",
	),
	array(
		'num'   => '03',
		'title' => 'Personalized Guidance',
		'body'  => 'Have questions about a property or need more information? Our dedicated team of real estate experts is just a call or message away.',
	),
	array(
		'num'   => '04',
		'title' => 'See It for Yourself',
		'body'  => "Arrange viewings of the properties you're interested in. We'll coordinate with the property owners and accompany you to ensure you get a firsthand look at your potential new home.",
	),
	array(
		'num'   => '05',
		'title' => 'Making Informed Decisions',
		'body'  => 'Before making an offer, our team will assist you with due diligence, including property inspections, legal checks, and market analysis. We want you to be fully informed and confident in your choice.',
	),
	array(
		'num'   => '06',
		'title' => 'Getting the Best Deal',
		'body'  => "We'll help you negotiate the best terms and prepare your offer. Our goal is to secure the property at the right price and on favorable terms.",
	),
);
?>
<section id="how" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Navigating the Estatein Experience',
			'body'  => "At Estatein, we've designed a straightforward process to help you find and purchase your dream property with ease. Here's a step-by-step guide to how it all works.",
		)
	);
	?>

	<div class="grid gap-x-[30px] gap-y-10 md:grid-cols-2 xl:grid-cols-3 xl:gap-y-[50px]">
		<?php foreach ( $steps as $step ) : ?>
			<article class="step-card">
				<p class="step-card__label">Step <?php echo esc_html( $step['num'] ); ?></p>
				<div class="step-card__body">
					<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl xl:text-[26px]">
						<?php echo esc_html( $step['title'] ); ?>
					</h3>
					<p class="text-body mt-3.5 md:mt-5"><?php echo esc_html( $step['body'] ); ?></p>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
</section>
