<?php
/**
 * About — Our Valued Clients.
 *
 * @package Growmodo
 */

$clients = array(
	array(
		'since'    => '2019',
		'name'     => 'ABC Corporation',
		'url'      => 'https://abccorp.biz',
		'domain'   => 'Commercial Real Estate',
		'category' => 'Luxury Home Development',
		'quote'    => "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs.",
	),
	array(
		'since'    => '2018',
		'name'     => 'GreenTech Enterprises',
		'url'      => 'https://www.greentechenterprise.com',
		'domain'   => 'Commercial Real Estate',
		'category' => 'Retail Space',
		'quote'    => "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth.",
	),
);

$total = count( $clients );
?>
<section id="clients" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Our Valued Clients',
			'body'  => "At Estatein, we have had the privilege of working with a diverse range of clients across various industries. Here are some of the clients we've had the pleasure of serving",
		)
	);
	?>

	<div id="about-clients-carousel" class="relative" data-carousel="slide" data-carousel-interval="7000">
		<?php /* Mobile / tablet: one card at a time. */ ?>
		<div class="relative overflow-hidden xl:hidden">
			<?php foreach ( $clients as $i => $card ) : ?>
				<div
					class="<?php echo 0 === $i ? '' : 'hidden'; ?> duration-700 ease-in-out"
					data-carousel-item="<?php echo 0 === $i ? 'active' : ''; ?>"
				>
					<article class="card-surface flex flex-col gap-[30px] rounded-[10px] p-6 shadow-[0_0_0_6px_#191919] md:gap-10 md:p-10">
						<header class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
							<div class="flex flex-col gap-1">
								<p class="text-body">Since <?php echo esc_html( $card['since'] ); ?></p>
								<h3 class="text-2xl font-semibold leading-[1.5] md:text-[30px]"><?php echo esc_html( $card['name'] ); ?></h3>
							</div>
							<a
								href="<?php echo esc_url( $card['url'] ); ?>"
								target="_blank"
								rel="noopener noreferrer"
								class="btn-secondary shrink-0 !px-5 !py-3.5 text-sm md:text-lg"
							>
								Visit Website
							</a>
						</header>

						<div class="grid grid-cols-2 gap-4">
							<div class="border-e border-grey-15 pe-4">
								<p class="mb-1 flex items-center gap-1.5 text-sm font-medium text-grey-60 md:text-lg">
									<img src="<?php echo esc_url( growmodo_img( 'about/icons/domain.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
									Domain
								</p>
								<p class="text-base font-medium text-absolute-white md:text-xl"><?php echo esc_html( $card['domain'] ); ?></p>
							</div>
							<div class="ps-1">
								<p class="mb-1 flex items-center gap-1.5 text-sm font-medium text-grey-60 md:text-lg">
									<img src="<?php echo esc_url( growmodo_img( 'about/icons/category.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
									Category
								</p>
								<p class="text-base font-medium text-absolute-white md:text-xl"><?php echo esc_html( $card['category'] ); ?></p>
							</div>
						</div>

						<div class="rounded-xl border border-grey-15 p-5 md:p-[30px]">
							<p class="text-body mb-2.5">What They Said 🤗</p>
							<p class="text-base font-medium leading-[1.5] text-absolute-white md:text-lg"><?php echo esc_html( $card['quote'] ); ?></p>
						</div>
					</article>
				</div>
			<?php endforeach; ?>
		</div>

		<?php /* Desktop: both cards side-by-side (Figma). */ ?>
		<div class="hidden gap-[50px] xl:grid xl:grid-cols-2">
			<?php foreach ( $clients as $card ) : ?>
				<article class="card-surface flex flex-col gap-10 rounded-[10px] p-[50px] shadow-[0_0_0_6px_#191919]">
					<header class="flex items-center justify-between gap-5">
						<div class="flex flex-col gap-1">
							<p class="text-body">Since <?php echo esc_html( $card['since'] ); ?></p>
							<h3 class="text-[30px] font-semibold leading-[1.5]"><?php echo esc_html( $card['name'] ); ?></h3>
						</div>
						<a
							href="<?php echo esc_url( $card['url'] ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							class="btn-secondary shrink-0 !px-6 !py-[18px]"
						>
							Visit Website
						</a>
					</header>

					<div class="grid grid-cols-2">
						<div class="border-e border-grey-15 pe-5">
							<p class="mb-1 flex items-center gap-1.5 text-lg font-medium text-grey-60">
								<img src="<?php echo esc_url( growmodo_img( 'about/icons/domain.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
								Domain
							</p>
							<p class="text-xl font-medium text-absolute-white"><?php echo esc_html( $card['domain'] ); ?></p>
						</div>
						<div class="ps-5">
							<p class="mb-1 flex items-center gap-1.5 text-lg font-medium text-grey-60">
								<img src="<?php echo esc_url( growmodo_img( 'about/icons/category.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
								Category
							</p>
							<p class="text-xl font-medium text-absolute-white"><?php echo esc_html( $card['category'] ); ?></p>
						</div>
					</div>

					<div class="rounded-xl border border-grey-15 p-[30px]">
						<p class="text-body mb-3.5">What They Said 🤗</p>
						<p class="text-lg font-medium leading-[1.5] text-absolute-white"><?php echo esc_html( $card['quote'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="mt-[40px] flex items-center justify-between border-t border-grey-15 pt-5 md:mt-[50px]">
			<p class="text-xl font-medium text-grey-60">
				<span class="text-absolute-white">01</span> of <?php echo esc_html( str_pad( (string) $total, 2, '0', STR_PAD_LEFT ) ); ?>
			</p>
			<div class="flex gap-2.5">
				<button type="button" class="inline-flex items-center justify-center rounded-full border border-grey-15 p-3.5" data-carousel-prev aria-label="Previous clients">
					<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
				</button>
				<button type="button" class="inline-flex items-center justify-center rounded-full border border-grey-15 bg-grey-10 p-3.5" data-carousel-next aria-label="Next clients">
					<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
				</button>
			</div>
		</div>
	</div>
</section>
