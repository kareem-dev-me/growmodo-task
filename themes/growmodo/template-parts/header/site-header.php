<?php
/**
 * Site header: promo banner + primary navigation.
 *
 * @package Growmodo
 */

$contact_url = home_url( '/contact/' );
?>
<header class="site-header sticky top-0 z-50 border-b border-grey-15 bg-grey-10">
	<div
		id="promo-banner"
		class="relative flex items-center justify-center gap-2.5 overflow-hidden border-b border-grey-15 bg-grey-10 px-4 py-[18px] xl:px-[160px]"
	>
		<img
			src="<?php echo esc_url( growmodo_img( 'patterns/banner-abstract.svg' ) ); ?>"
			alt=""
			width="1920"
			height="63"
			class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-40"
			aria-hidden="true"
		/>
		<p class="relative z-10 text-center text-sm font-medium text-absolute-white md:text-lg">
			✨ Discover Your Dream Property with Estatein
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="ms-1 underline decoration-solid underline-offset-2 hover:text-purple-75">
				Learn More
			</a>
		</p>
		<button
			type="button"
			id="promo-banner-close"
			class="absolute end-4 top-1/2 z-10 flex size-8 -translate-y-1/2 items-center justify-center rounded-full bg-white/10 p-1 hover:bg-white/20 xl:end-8"
			aria-label="Dismiss announcement"
		>
			<img src="<?php echo esc_url( growmodo_img( 'icons/close.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
		</button>
	</div>

	<nav class="relative flex items-center justify-between gap-4 px-4 py-5 md:px-8 xl:px-[162px]" aria-label="Primary">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative z-10 flex shrink-0 items-center gap-[10px] no-underline">
			<img src="<?php echo esc_url( growmodo_img( 'logo/symbol.svg' ) ); ?>" alt="" width="48" height="48" class="size-10 md:size-12" />
			<img src="<?php echo esc_url( growmodo_img( 'logo/wordmark.svg' ) ); ?>" alt="Estatein" width="102" height="21" class="h-[18px] w-auto md:h-5" />
		</a>

		<button
			type="button"
			class="inline-flex items-center justify-center rounded-[10px] border border-grey-15 bg-grey-08 p-3 text-absolute-white md:hidden"
			data-collapse-toggle="primary-nav"
			aria-controls="primary-nav"
			aria-expanded="false"
		>
			<span class="sr-only">Open menu</span>
			<svg class="size-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
			</svg>
		</button>

		<div
			id="primary-nav"
			class="absolute start-0 top-full z-40 hidden max-h-[80vh] w-full overflow-y-auto border-b border-grey-15 bg-grey-10 px-4 py-4 shadow-lg md:static md:flex md:max-h-none md:w-auto md:items-center md:justify-center md:overflow-visible md:border-0 md:bg-transparent md:p-0 md:shadow-none"
		>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'flex flex-col gap-2 md:flex-row md:items-center md:gap-[30px]',
					'fallback_cb'    => 'growmodo_fallback_menu',
					'walker'         => new Growmodo_Nav_Walker(),
				)
			);
			?>
			<a class="btn-nav mt-3 inline-flex w-full justify-center md:mt-0 md:hidden" href="<?php echo esc_url( $contact_url ); ?>">
				Contact Us
			</a>
		</div>

		<a class="btn-nav relative z-10 hidden shrink-0 md:inline-flex" href="<?php echo esc_url( $contact_url ); ?>">
			Contact Us
		</a>
	</nav>
</header>
