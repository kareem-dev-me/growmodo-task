<?php
/**
 * Front page template — proves Tailwind + Flowbite.
 *
 * @package Growmodo
 */

get_header();
?>

<section class="relative overflow-hidden bg-gradient-to-br from-brand-50 via-paper to-brand-100">
	<div class="pointer-events-none absolute inset-0 opacity-40" aria-hidden="true" style="background-image:radial-gradient(circle at 20% 20%, rgba(40,143,122,.25), transparent 40%), radial-gradient(circle at 80% 0%, rgba(196,92,38,.18), transparent 35%);"></div>

	<div class="relative mx-auto grid max-w-6xl gap-10 px-4 py-20 md:grid-cols-2 md:items-center md:py-28">
		<div>
			<p class="mb-3 text-sm font-medium uppercase tracking-[0.2em] text-brand-700">
				Growmodo
			</p>
			<h1 class="max-w-xl text-4xl font-bold text-ink md:text-5xl lg:text-6xl">
				Design systems that ship.
			</h1>
			<p class="mt-5 max-w-md text-lg text-ink/70">
				A classic WordPress theme scaffold with Vite, Tailwind CSS v4, and selective Flowbite.
			</p>
			<div class="mt-8 flex flex-wrap gap-3">
				<a href="#features" class="inline-flex items-center rounded-md bg-brand-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-800">
					See the stack
				</a>
				<button
					id="demoDropdownButton"
					data-dropdown-toggle="demoDropdown"
					class="inline-flex items-center rounded-md border border-brand-700/30 bg-white/70 px-5 py-3 text-sm font-semibold text-brand-800 backdrop-blur transition hover:bg-white"
					type="button"
				>
					Flowbite demo
					<svg class="ms-2 h-3.5 w-3.5" aria-hidden="true" fill="none" viewBox="0 0 10 6">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
					</svg>
				</button>
				<div id="demoDropdown" class="z-10 hidden w-44 divide-y divide-brand-100 rounded-md border border-brand-100 bg-white shadow-sm">
					<ul class="py-2 text-sm text-ink" aria-labelledby="demoDropdownButton">
						<li><a href="#features" class="block px-4 py-2 hover:bg-brand-50">Features</a></li>
						<li><a href="#carousel" class="block px-4 py-2 hover:bg-brand-50">Carousel</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div id="carousel" class="relative overflow-hidden rounded-2xl border border-brand-200/60 bg-white shadow-sm" data-carousel="slide">
			<div class="relative h-64 overflow-hidden md:h-80">
				<div class="hidden duration-700 ease-in-out" data-carousel-item>
					<div class="flex h-full items-center justify-center bg-brand-700 px-8 text-center text-white">
						<p class="font-display text-2xl font-semibold">Tailwind utilities live here</p>
					</div>
				</div>
				<div class="hidden duration-700 ease-in-out" data-carousel-item>
					<div class="flex h-full items-center justify-center bg-ink px-8 text-center text-brand-100">
						<p class="font-display text-2xl font-semibold">Flowbite carousel initialized</p>
					</div>
				</div>
				<div class="hidden duration-700 ease-in-out" data-carousel-item>
					<div class="flex h-full items-center justify-center bg-accent px-8 text-center text-white">
						<p class="font-display text-2xl font-semibold">Vite build → dist/</p>
					</div>
				</div>
			</div>
			<button type="button" class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none" data-carousel-prev>
				<span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/80 text-ink group-hover:bg-white">
					<svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/></svg>
					<span class="sr-only">Previous</span>
				</span>
			</button>
			<button type="button" class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none" data-carousel-next>
				<span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/80 text-ink group-hover:bg-white">
					<svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
					<span class="sr-only">Next</span>
				</span>
			</button>
		</div>
	</div>
</section>

<section id="features" class="mx-auto max-w-6xl px-4 py-16 md:py-24">
	<h2 class="text-3xl font-bold text-ink md:text-4xl">
		Built for production themes
	</h2>
	<p class="mt-3 max-w-2xl text-ink/70">
		One job per section. Mobile-first. Cache-busted dist assets.
	</p>

	<div class="mt-10 grid gap-8 md:grid-cols-3">
		<?php
		get_template_part( 'template-parts/content', 'feature', array(
			'title' => 'Vite 8',
			'body'  => 'Watch builds to dist/ with hashed-free asset names and filemtime versions.',
		) );
		get_template_part( 'template-parts/content', 'feature', array(
			'title' => 'Tailwind v4',
			'body'  => 'CSS-first @theme tokens with brand teal — not purple-gradient defaults.',
		) );
		get_template_part( 'template-parts/content', 'feature', array(
			'title' => 'Flowbite selective',
			'body'  => 'Only initCollapses, initCarousels, initDropdowns from deep ESM paths.',
		) );
		?>
	</div>
</section>

<?php
get_footer();
