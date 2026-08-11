<?php
/**
 * Services — Smart Investments split layout.
 *
 * @package Growmodo
 */

$cards = array(
	array(
		'title' => 'Market Insight',
		'body'  => 'Stay ahead of market trends with our expert Market Analysis. We provide in-depth insights to help you make informed investment decisions.',
		'icon'  => 'services/icons/market-insight.svg',
	),
	array(
		'title' => 'ROI Assessment',
		'body'  => 'Make investment decisions with confidence. Our ROI Assessment services evaluate the potential returns on your investments.',
		'icon'  => 'services/icons/roi.svg',
	),
	array(
		'title' => 'Customized Strategies',
		'body'  => 'Every investor is unique, and so are their goals. We develop Customized Investment Strategies tailored to your specific needs.',
		'icon'  => 'services/icons/strategies.svg',
	),
	array(
		'title' => 'Diversification Mastery',
		'body'  => 'Diversify your real estate portfolio effectively. Our experts guide you in spreading your investments across various property types and locations.',
		'icon'  => 'services/icons/diversification.svg',
	),
);
?>
<section id="investments" class="container-estatein section-y">
	<div class="grid gap-10 xl:grid-cols-[519fr_1017fr] xl:items-start xl:gap-[60px]">
		<div class="flex flex-col gap-[30px]">
			<div>
				<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
				<h2 class="heading-section">Smart Investments, Informed Decisions</h2>
				<p class="text-body mt-3.5">
					Building a real estate portfolio requires a strategic approach. Estatein's Investment Advisory Service empowers you to make smart investments and informed decisions.
				</p>
			</div>

			<article class="relative overflow-hidden rounded-xl border border-grey-15 bg-grey-10 p-6 md:p-8 xl:p-[50px]">
				<img
					src="<?php echo esc_url( growmodo_img( 'patterns/hero-abstract.svg' ) ); ?>"
					alt=""
					width="1920"
					height="1280"
					class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-40"
					aria-hidden="true"
				/>
				<div class="relative z-10 flex flex-col gap-5">
					<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl">Unlock Your Investment Potential</h3>
					<p class="text-body">
						Ready to make smarter property investments? Explore our Investment Advisory Service categories and let us help you unlock your investment potential.
					</p>
					<a class="btn-secondary self-stretch !bg-grey-08 text-center xl:self-stretch" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
						Learn More
					</a>
				</div>
			</article>
		</div>

		<div class="rounded-xl border border-grey-15 bg-grey-10 p-2.5">
			<div class="grid gap-2.5 sm:grid-cols-2">
				<?php foreach ( $cards as $card ) : ?>
					<article class="card-surface flex h-full flex-col gap-5 rounded-[10px] p-6 md:p-8 xl:p-10">
						<div class="flex items-center gap-3.5 md:gap-4">
							<span class="inline-flex shrink-0 rounded-full border border-purple-75 p-2.5" aria-hidden="true">
								<span class="inline-flex rounded-full border border-purple-75 p-3.5">
									<img
										src="<?php echo esc_url( growmodo_img( $card['icon'] ) ); ?>"
										alt=""
										width="34"
										height="34"
										class="size-[34px]"
									/>
								</span>
							</span>
							<h3 class="text-xl font-semibold leading-[1.5] md:text-2xl"><?php echo esc_html( $card['title'] ); ?></h3>
						</div>
						<p class="text-body"><?php echo esc_html( $card['body'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
