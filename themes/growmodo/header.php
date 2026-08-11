<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'min-h-screen flex flex-col bg-grey-08 text-absolute-white' ); ?>>
<?php wp_body_open(); ?>

<a class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:bg-grey-10 focus:px-3 focus:py-2" href="#main">
	Skip to content
</a>

<header class="site-header border-b border-grey-15 bg-grey-10">
	<!-- Replaced in T2 -->
	<nav class="container-estatein flex items-center justify-between gap-4 py-5" aria-label="Primary">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 no-underline">
			<img src="<?php echo esc_url( growmodo_img( 'logo/symbol.svg' ) ); ?>" alt="" width="48" height="48" class="size-12" />
			<img src="<?php echo esc_url( growmodo_img( 'logo/wordmark.svg' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="102" height="21" class="h-5 w-auto" />
		</a>
		<div class="hidden md:block">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'flex items-center gap-[30px]',
					'fallback_cb'    => 'growmodo_fallback_menu',
				)
			);
			?>
		</div>
		<a class="btn-nav hidden md:inline-flex" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Us</a>
	</nav>
</header>

<main id="main" class="flex-1">
