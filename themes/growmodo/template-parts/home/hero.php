<?php
/**
 * Home hero + feature shortcut cards.
 *
 * @package Growmodo
 */

$properties_url = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );
$services       = array(
	array(
		'title' => 'Find Your Dream Home',
		'icon'  => 'icons/service-home.svg',
		'url'   => $properties_url,
	),
	array(
		'title' => 'Unlock Property Value',
		'icon'  => 'icons/service-value.svg',
		'url'   => home_url( '/services/' ),
	),
	array(
		'title' => 'Effortless Property Management',
		'icon'  => 'icons/service-manage.svg',
		'url'   => home_url( '/services/' ),
	),
	array(
		'title' => 'Smart Investments, Informed Decisions',
		'icon'  => 'icons/service-invest.svg',
		'url'   => home_url( '/services/' ),
	),
);
?>
<section id="hero" class="bg-grey-08">
	<div class="flex flex-col lg:flex-row lg:items-stretch">
		<div class="order-2 flex flex-1 flex-col justify-center gap-10 px-4 py-12 md:gap-[50px] md:px-8 md:py-16 lg:order-1 xl:gap-[60px] xl:py-[100px] xl:ps-[162px] xl:pe-10">
			<div class="relative max-w-[758px]">
				<div class="flex flex-col gap-6">
					<h1 class="text-[28px] font-semibold leading-[1.2] text-absolute-white md:text-5xl lg:text-[60px]">
						Discover Your Dream Property with Estatein
					</h1>
					<p class="text-body max-w-[758px]">
						Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.
					</p>
				</div>
				<a
					href="<?php echo esc_url( $properties_url ); ?>"
					class="absolute -end-6 top-0 hidden size-[175px] items-center justify-center rounded-full border-[1.6px] border-grey-15 bg-grey-08 p-[48px] xl:flex 2xl:-end-40"
					aria-label="Discover your dream property"
				>
					<span class="relative flex size-[80px] items-center justify-center rounded-full border-[1.6px] border-grey-15 bg-grey-10">
						<img src="<?php echo esc_url( growmodo_img( 'icons/arrow-circle.svg' ) ); ?>" alt="" width="34" height="34" class="size-[34px]" />
					</span>
				</a>
			</div>

			<div class="flex flex-wrap gap-5">
				<a class="btn-secondary !bg-transparent" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">Learn More</a>
				<a class="btn-primary" href="<?php echo esc_url( $properties_url ); ?>">Browse Properties</a>
			</div>

			<div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
				<div class="card-elevated rounded-xl px-6 py-4">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">200+</p>
					<p class="text-body">Happy Customers</p>
				</div>
				<div class="card-elevated rounded-xl px-6 py-4">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">10k+</p>
					<p class="text-body">Properties For Clients</p>
				</div>
				<div class="card-elevated rounded-xl px-6 py-4">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">16+</p>
					<p class="text-body">Years of Experience</p>
				</div>
			</div>
		</div>

		<div class="relative order-1 min-h-[280px] flex-1 overflow-hidden bg-grey-10 sm:min-h-[420px] lg:order-2 lg:min-h-[814px]">
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
		</div>
	</div>

	<div id="features" class="border border-grey-15 bg-grey-08 p-5 shadow-[0_0_0_10px_#191919]">
		<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
			<?php foreach ( $services as $service ) : ?>
				<a
					href="<?php echo esc_url( $service['url'] ); ?>"
					class="card-elevated relative flex flex-col items-center gap-5 px-5 py-10 text-center no-underline transition hover:border-purple-75"
				>
					<img
						src="<?php echo esc_url( growmodo_img( 'icons/arrow-link.svg' ) ); ?>"
						alt=""
						width="34"
						height="34"
						class="absolute end-[19px] top-[19px] size-[34px]"
					/>
					<span class="inline-flex rounded-full border border-purple-75 p-2.5">
						<span class="inline-flex rounded-full border border-purple-75 p-3.5">
							<img
								src="<?php echo esc_url( growmodo_img( $service['icon'] ) ); ?>"
								alt=""
								width="34"
								height="34"
								class="size-[34px]"
							/>
						</span>
					</span>
					<span class="text-xl font-semibold leading-[1.5]"><?php echo esc_html( $service['title'] ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
