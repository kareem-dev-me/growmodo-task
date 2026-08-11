<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'min-h-screen flex flex-col' ); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:bg-white focus:px-3 focus:py-2" href="#main">
	Skip to content
</a>

<header class="site-header border-b border-brand-800/40">
	<nav class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-4" aria-label="Primary">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="font-display text-xl font-semibold tracking-tight text-white no-underline">
			<?php bloginfo( 'name' ); ?>
		</a>

		<button
			type="button"
			class="inline-flex items-center rounded-md border border-white/30 px-3 py-2 text-sm text-white md:hidden"
			data-collapse-toggle="primary-nav"
			aria-controls="primary-nav"
			aria-expanded="false"
		>
			<span class="sr-only">Open menu</span>
			<svg class="h-5 w-5" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
			</svg>
		</button>

		<div id="primary-nav" class="hidden w-full md:block md:w-auto">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'mt-3 flex flex-col gap-2 md:mt-0 md:flex-row md:items-center md:gap-6',
					'fallback_cb'    => 'growmodo_fallback_menu',
				)
			);
			?>
		</div>
	</nav>
</header>

<main id="main" class="flex-1">
