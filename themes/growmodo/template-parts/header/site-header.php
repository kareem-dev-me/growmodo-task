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
		class="relative grid grid-cols-[2rem_minmax(0,1fr)_2rem] items-center gap-2.5 overflow-hidden border-b border-grey-15 bg-grey-10 px-4 py-[14px] md:py-[18px] xl:grid-cols-[2.5rem_minmax(0,1fr)_2.5rem] xl:gap-4 xl:px-20 min-[1920px]:px-[162px]"
	>
		<img
			src="<?php echo esc_url( growmodo_img( 'patterns/banner-abstract.svg' ) ); ?>"
			alt=""
			width="1920"
			height="63"
			class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-50 mix-blend-color-dodge"
			aria-hidden="true"
		/>
		<span class="relative z-10 size-8 shrink-0" aria-hidden="true"></span>
		<p class="relative z-10 min-w-0 text-center text-sm font-medium leading-[1.5] text-absolute-white md:text-base xl:text-lg">
			<span aria-hidden="true">✨</span>Discover Your Dream Property with Estatein
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="ms-1 inline-block underline decoration-solid underline-offset-from-font hover:text-purple-75">
				Learn More
			</a>
		</p>
		<button
			type="button"
			id="promo-banner-close"
			class="relative z-10 flex size-8 shrink-0 items-center justify-center justify-self-end rounded-full bg-white/10 p-1 hover:bg-white/20"
			aria-label="Dismiss announcement"
		>
			<img src="<?php echo esc_url( growmodo_img( 'icons/close.svg' ) ); ?>" alt="" width="24" height="24" class="size-6" />
		</button>
	</div>

	<nav class="relative flex h-[99px] items-center justify-between gap-4 px-4 py-5 md:px-8 xl:px-20 min-[1920px]:px-[162px]" aria-label="Primary">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative z-10 flex h-12 w-40 shrink-0 items-center gap-[10px] no-underline">
			<img src="<?php echo esc_url( growmodo_img( 'logo/symbol.svg' ) ); ?>" alt="" width="48" height="48" class="size-12 shrink-0" />
			<img src="<?php echo esc_url( growmodo_img( 'logo/wordmark.svg' ) ); ?>" alt="Estatein" width="102" height="21" class="h-[21px] w-auto" />
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
			class="absolute start-0 top-full z-40 hidden max-h-[80vh] w-full overflow-y-auto border-b border-grey-15 bg-grey-10 px-4 py-4 shadow-lg md:absolute md:start-1/2 md:top-1/2 md:flex md:max-h-none md:w-auto md:-translate-x-1/2 md:-translate-y-1/2 md:items-center md:justify-center md:overflow-visible md:border-0 md:bg-transparent md:p-0 md:shadow-none"
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
			<a class="btn-contact mt-3 inline-flex w-full justify-center md:mt-0 md:hidden" href="<?php echo esc_url( $contact_url ); ?>">
				Contact Us
			</a>
		</div>

		<a class="btn-contact relative z-10 hidden shrink-0 md:inline-flex" href="<?php echo esc_url( $contact_url ); ?>">
			Contact Us
		</a>
	</nav>
</header>
