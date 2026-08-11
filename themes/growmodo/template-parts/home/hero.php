<?php
/**
 * Home hero + feature shortcut cards.
 *
 * @package Growmodo
 */

$properties_url = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );
$services_url   = home_url( '/services/' );
$services       = array(
	array(
		'title' => 'Find Your Dream Home',
		'icon'  => 'icons/service-home.svg',
		'url'   => $properties_url,
	),
	array(
		'title' => 'Unlock Property Value',
		'icon'  => 'icons/service-value.svg',
		'url'   => $services_url . '#valuation',
	),
	array(
		'title' => 'Effortless Property Management',
		'icon'  => 'icons/service-manage.svg',
		'url'   => $services_url . '#management',
	),
	array(
		'title' => 'Smart Investments, Informed Decisions',
		'icon'  => 'icons/service-invest.svg',
		'url'   => $services_url . '#investments',
	),
);
?>
<section id="hero" class="bg-grey-08">
	<div class="relative flex flex-col lg:flex-row lg:items-stretch">
		<div class="order-2 flex w-full flex-col justify-center gap-10 px-4 py-12 md:gap-[50px] md:px-8 md:py-16 lg:order-1 lg:w-1/2 xl:max-w-[960px] xl:gap-[60px] xl:py-[100px] xl:ps-[162px] xl:pe-20">
			<div class="relative max-w-[758px]">
				<div class="flex flex-col gap-5 md:gap-6">
					<h1 class="text-[28px] font-semibold leading-[1.2] text-absolute-white md:text-5xl xl:text-[60px]">
						Discover Your Dream Property with Estatein
					</h1>
					<p class="text-body max-w-[758px]">
						Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.
					</p>
				</div>
			</div>

			<div class="flex flex-wrap gap-4 md:gap-5">
				<a class="btn-secondary !bg-transparent" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Learn More</a>
				<a class="btn-primary" href="<?php echo esc_url( $properties_url ); ?>">Browse Properties</a>
			</div>

			<div class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5">
				<div class="card-elevated rounded-xl px-5 py-3.5 md:px-6 md:py-4">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">200+</p>
					<p class="text-body">Happy Customers</p>
				</div>
				<div class="card-elevated rounded-xl px-5 py-3.5 md:px-6 md:py-4">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">10k+</p>
					<p class="text-body">Properties For Clients</p>
				</div>
				<div class="card-elevated rounded-xl px-5 py-3.5 md:px-6 md:py-4">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">16+</p>
					<p class="text-body">Years of Experience</p>
				</div>
			</div>
		</div>

		<div class="relative order-1 min-h-[280px] w-full overflow-hidden bg-grey-10 sm:min-h-[420px] lg:order-2 lg:min-h-[814px] lg:w-1/2 xl:max-w-[960px]">
			<img
				src="<?php echo esc_url( growmodo_img( 'patterns/hero-abstract.svg' ) ); ?>"
				alt=""
				width="1920"
				height="1280"
				class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-50"
				aria-hidden="true"
			/>
			<img
				src="<?php echo esc_url( growmodo_img( 'hero/building-1.png' ) ); ?>"
				alt="Modern glass building facade"
				width="920"
				height="814"
				class="relative z-10 h-full w-full object-cover"
				fetchpriority="high"
				decoding="async"
			/>
			<div class="pointer-events-none absolute inset-0 z-20" style="background-image:linear-gradient(234.98deg, rgb(42, 33, 63) 8.76%, rgba(25, 25, 25, 0) 50.09%);"></div>

			<?php /* Mobile / tablet: badge sits on the hero image (Figma mobile). */ ?>
			<a
				href="<?php echo esc_url( $properties_url ); ?>"
				class="absolute start-4 top-[42%] z-30 size-[100px] -translate-y-1/2 md:size-[120px] lg:hidden"
				aria-label="Discover your dream property"
			>
				<img
					src="<?php echo esc_url( growmodo_img( 'hero/dream-badge.svg' ) ); ?>"
					alt=""
					width="175"
					height="175"
					class="size-full"
				/>
			</a>
		</div>

		<?php /* Desktop: badge overlaps text/image seam (Figma 175×175). */ ?>
		<a
			href="<?php echo esc_url( $properties_url ); ?>"
			class="absolute start-1/2 top-[220px] z-30 hidden size-[129px] -translate-x-1/2 lg:block xl:top-[250px] xl:size-[175px]"
			aria-label="Discover your dream property"
		>
			<img
				src="<?php echo esc_url( growmodo_img( 'hero/dream-badge.svg' ) ); ?>"
				alt=""
				width="175"
				height="175"
				class="size-full"
			/>
		</a>
	</div>

	<div id="features" class="border border-grey-15 bg-grey-08 p-2.5 shadow-[0_0_0_10px_#191919] md:p-5">
		<div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 xl:grid-cols-4 xl:gap-5">
			<?php foreach ( $services as $service ) : ?>
				<a
					href="<?php echo esc_url( $service['url'] ); ?>"
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
							'icon' => $service['icon'],
							'size' => 'size-[74px] md:size-[82px]',
						)
					);
					?>
					<span class="text-lg font-semibold leading-[1.5] md:text-xl"><?php echo esc_html( $service['title'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
