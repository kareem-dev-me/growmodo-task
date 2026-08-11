<?php
/**
 * Contact — Explore Estatein's World gallery.
 *
 * @package Growmodo
 */

$images = array(
	array(
		'src' => 'contact/gallery/1.webp',
		'alt' => 'Modern Estatein office workspace with desks and monitors',
	),
	array(
		'src' => 'contact/gallery/2.webp',
		'alt' => 'Modern glass office buildings against a clear sky',
	),
	array(
		'src' => 'contact/gallery/3.webp',
		'alt' => 'Bright office corridor with glass walls',
	),
	array(
		'src' => 'contact/gallery/4.webp',
		'alt' => 'Team member with a laptop in an open-plan office',
	),
	array(
		'src' => 'contact/gallery/5.webp',
		'alt' => 'Professional standing in a modern office holding a phone',
	),
	array(
		'src' => 'contact/gallery/6.webp',
		'alt' => 'Team member smiling while working on a laptop',
	),
);
?>
<section class="container-estatein section-y !pt-0">
	<div class="relative overflow-hidden rounded-xl border border-grey-15 bg-grey-08 p-6 md:p-[60px] xl:p-20">
		<img
			src="<?php echo esc_url( growmodo_img( 'patterns/waves-1.svg' ) ); ?>"
			alt=""
			width="1102"
			height="736"
			class="pointer-events-none absolute -start-40 -top-20 h-auto w-[150%] max-w-none opacity-70"
			aria-hidden="true"
		/>

		<div class="relative z-10 flex flex-col gap-2.5 md:gap-5">
			<div class="grid grid-cols-1 gap-2.5 md:grid-cols-2 md:gap-5">
				<div class="flex flex-col gap-2.5 md:gap-5">
					<img
						src="<?php echo esc_url( growmodo_img( $images[0]['src'] ) ); ?>"
						alt="<?php echo esc_attr( $images[0]['alt'] ); ?>"
						width="709"
						height="236"
						class="aspect-[708/236] w-full rounded-[10px] object-cover"
						loading="lazy"
					/>
					<img
						src="<?php echo esc_url( growmodo_img( $images[1]['src'] ) ); ?>"
						alt="<?php echo esc_attr( $images[1]['alt'] ); ?>"
						width="709"
						height="236"
						class="aspect-[708/236] w-full rounded-[10px] object-cover"
						loading="lazy"
					/>
				</div>
				<div class="flex flex-col gap-2.5 md:gap-5">
					<img
						src="<?php echo esc_url( growmodo_img( $images[2]['src'] ) ); ?>"
						alt="<?php echo esc_attr( $images[2]['alt'] ); ?>"
						width="709"
						height="236"
						class="aspect-[708/236] w-full rounded-[10px] object-cover"
						loading="lazy"
					/>
					<div class="grid grid-cols-2 gap-2.5 md:gap-5">
						<img
							src="<?php echo esc_url( growmodo_img( $images[3]['src'] ) ); ?>"
							alt="<?php echo esc_attr( $images[3]['alt'] ); ?>"
							width="344"
							height="236"
							class="aspect-[344/236] w-full rounded-[10px] object-cover"
							loading="lazy"
						/>
						<img
							src="<?php echo esc_url( growmodo_img( $images[4]['src'] ) ); ?>"
							alt="<?php echo esc_attr( $images[4]['alt'] ); ?>"
							width="344"
							height="236"
							class="aspect-[344/236] w-full rounded-[10px] object-cover"
							loading="lazy"
						/>
					</div>
				</div>
			</div>

			<div class="grid grid-cols-1 items-center gap-6 md:grid-cols-2 md:gap-5">
				<div class="flex flex-col justify-center py-2 md:py-0">
					<img
						src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>"
						alt=""
						width="68"
						height="30"
						class="mb-3.5 h-[30px] w-[68px]"
					/>
					<h2 class="heading-section">Explore Estatein's World</h2>
					<p class="text-body mt-3.5 max-w-xl">
						Step inside the world of Estatein, where professionalism meets warmth, and expertise meets passion. Our gallery offers a glimpse into our team and workspaces, inviting you to get to know us better.
					</p>
				</div>
				<img
					src="<?php echo esc_url( growmodo_img( $images[5]['src'] ) ); ?>"
					alt="<?php echo esc_attr( $images[5]['alt'] ); ?>"
					width="709"
					height="280"
					class="aspect-[708/280] w-full rounded-[10px] object-cover object-top"
					loading="lazy"
				/>
			</div>
		</div>
	</div>
</section>
