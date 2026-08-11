<?php
/**
 * Services — hero + shortcut cards.
 *
 * @package Growmodo
 */

$properties_url = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );
$shortcuts      = array(
	array(
		'title' => 'Find Your Dream Home',
		'icon'  => 'icons/service-home.svg',
		'url'   => $properties_url,
	),
	array(
		'title' => 'Unlock Property Value',
		'icon'  => 'icons/service-value.svg',
		'url'   => '#valuation',
	),
	array(
		'title' => 'Effortless Property Management',
		'icon'  => 'icons/service-manage.svg',
		'url'   => '#management',
	),
	array(
		'title' => 'Smart Investments, Informed Decisions',
		'icon'  => 'icons/service-invest.svg',
		'url'   => '#investments',
	),
);
?>
<section class="border-b border-grey-15 bg-grey-10">
	<div class="container-estatein pt-12 md:pt-16 xl:pt-[100px]">
		<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
		<h1 class="heading-section max-w-[1358px]">Elevate Your Real Estate Experience</h1>
		<p class="text-body mt-3.5 max-w-[1358px]">
			Welcome to Estatein, where your real estate aspirations meet expert guidance. Explore our comprehensive range of services, each designed to cater to your unique needs and dreams.
		</p>
	</div>

	<div class="mt-10 border border-grey-15 bg-grey-08 p-2.5 shadow-[0_0_0_10px_#191919] md:mt-12 xl:mt-[50px] xl:p-5">
		<div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-5">
			<?php foreach ( $shortcuts as $shortcut ) : ?>
				<a
					href="<?php echo esc_url( $shortcut['url'] ); ?>"
					class="card-elevated relative flex min-h-[160px] flex-col items-center justify-center gap-5 px-5 py-10 text-center no-underline transition hover:border-purple-75 md:min-h-[180px] xl:min-h-[212px]"
				>
					<img
						src="<?php echo esc_url( growmodo_img( 'icons/arrow-link.svg' ) ); ?>"
						alt=""
						width="34"
						height="34"
						class="absolute end-[19px] top-[19px] size-[34px]"
					/>
					<?php
					get_template_part(
						'template-parts/shared/icon',
						'well',
						array(
							'icon' => $shortcut['icon'],
							'size' => 'size-[74px] md:size-[82px]',
						)
					);
					?>
					<span class="text-lg font-semibold leading-[1.5] md:text-xl"><?php echo esc_html( $shortcut['title'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
