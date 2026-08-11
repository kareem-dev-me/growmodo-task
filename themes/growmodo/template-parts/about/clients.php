<?php
/**
 * About — Our Valued Clients (carousel, same as home featured).
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

	<div id="about-clients-carousel" class="relative" data-featured-carousel data-per-md="1" data-per-xl="2">
		<div class="overflow-hidden">
			<div
				class="flex gap-5 transition-transform duration-500 ease-out will-change-transform md:gap-[30px] xl:gap-[50px]"
				data-featured-track
			>
				<?php foreach ( $clients as $card ) : ?>
					<div
						class="w-full min-w-0 shrink-0 basis-full xl:basis-[calc((100%-3.125rem)/2)]"
						data-featured-slide
					>
						<article class="card-surface flex h-full flex-col gap-[30px] rounded-[10px] p-6 shadow-[0_0_0_6px_#191919] md:gap-10 md:p-10 xl:p-[50px]">
							<header class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
								<div class="flex flex-col gap-1">
									<p class="text-body">Since <?php echo esc_html( $card['since'] ); ?></p>
									<h3 class="text-2xl font-semibold leading-[1.5] md:text-[30px]"><?php echo esc_html( $card['name'] ); ?></h3>
								</div>
								<a
									href="<?php echo esc_url( $card['url'] ); ?>"
									target="_blank"
									rel="noopener noreferrer"
									class="btn-secondary shrink-0 !px-5 !py-3.5 text-sm md:text-lg xl:!px-6 xl:!py-[18px]"
								>
									Visit Website
								</a>
							</header>

							<div class="grid grid-cols-2 gap-4 xl:gap-0">
								<div class="border-e border-grey-15 pe-4 xl:pe-5">
									<p class="mb-1 flex items-center gap-1.5 text-sm font-medium text-grey-60 md:text-lg">
										<img src="<?php echo esc_url( growmodo_img( 'about/icons/domain.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
										Domain
									</p>
									<p class="text-base font-medium text-absolute-white md:text-xl"><?php echo esc_html( $card['domain'] ); ?></p>
								</div>
								<div class="ps-1 xl:ps-5">
									<p class="mb-1 flex items-center gap-1.5 text-sm font-medium text-grey-60 md:text-lg">
										<img src="<?php echo esc_url( growmodo_img( 'about/icons/category.svg' ) ); ?>" alt="" width="24" height="24" class="size-5 md:size-6" />
										Category
									</p>
									<p class="text-base font-medium text-absolute-white md:text-xl"><?php echo esc_html( $card['category'] ); ?></p>
								</div>
							</div>

							<div class="rounded-xl border border-grey-15 p-5 md:p-[30px]">
								<p class="text-body mb-2.5 md:mb-3.5">What They Said 🤗</p>
								<p class="text-base font-medium leading-[1.5] text-absolute-white md:text-lg"><?php echo esc_html( $card['quote'] ); ?></p>
							</div>
						</article>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<?php
		get_template_part(
			'template-parts/shared/carousel',
			'controls',
			array(
				'total'      => $total,
				'prev_label' => 'Previous clients',
				'next_label' => 'Next clients',
				'class'      => 'mt-[40px] flex items-center justify-between border-t border-grey-15 pt-5 md:mt-[50px]',
			)
		);
		?>
	</div>
</section>
