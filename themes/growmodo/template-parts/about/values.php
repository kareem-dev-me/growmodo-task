<?php
/**
 * About — Our Values.
 *
 * @package Growmodo
 */

$values = array(
	array(
		'title' => 'Trust',
		'body'  => 'Trust is the cornerstone of every successful real estate transaction. We build lasting relationships through integrity and transparency.',
		'icon'  => 'about/icons/value-trust.svg',
	),
	array(
		'title' => 'Excellence',
		'body'  => 'We set the bar high for ourselves. From the properties we list to the services we provide, quality is never compromised.',
		'icon'  => 'about/icons/value-excellence.svg',
	),
	array(
		'title' => 'Client-Centric',
		'body'  => 'Your dreams and needs are at the center of our universe. We listen, understand, and act to make them a reality.',
		'icon'  => 'about/icons/value-client.svg',
	),
	array(
		'title' => 'Our Commitment',
		'body'  => 'We are dedicated to providing you with the highest level of service, professionalism, and support throughout your journey.',
		'icon'  => 'about/icons/value-commitment.svg',
	),
);
?>
<section id="values" class="container-estatein section-y">
	<div class="flex flex-col gap-10 xl:flex-row xl:items-center xl:gap-[60px]">
		<div class="max-w-lg shrink-0 xl:max-w-[517px]">
			<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
			<h2 class="heading-section">Our Values</h2>
			<p class="text-body mt-3.5">
				Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.
			</p>
		</div>

		<div class="grid flex-1 gap-2.5 rounded-xl bg-grey-10 p-2.5 sm:grid-cols-2">
			<?php foreach ( $values as $value ) : ?>
				<article class="card-surface flex flex-col gap-4 rounded-[10px] p-6 md:gap-5 md:p-8 xl:p-10">
					<div class="flex items-center gap-3.5 md:gap-4">
						<?php
						get_template_part(
							'template-parts/shared/icon',
							'well',
							array(
								'icon' => $value['icon'],
							)
						);
						?>
						<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl"><?php echo esc_html( $value['title'] ); ?></h3>
					</div>
					<p class="text-body"><?php echo esc_html( $value['body'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
