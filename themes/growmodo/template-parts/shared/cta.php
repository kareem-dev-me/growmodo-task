<?php
/**
 * Shared CTA band.
 *
 * @package Growmodo
 */
?>
<section class="relative overflow-hidden border-y border-grey-15 bg-grey-08">
	<img
		src="<?php echo esc_url( growmodo_img( 'patterns/cta-left.svg' ) ); ?>"
		alt=""
		width="566"
		height="308"
		class="pointer-events-none absolute bottom-0 start-0 hidden w-[40%] max-w-[566px] opacity-60 lg:block"
		aria-hidden="true"
	/>
	<img
		src="<?php echo esc_url( growmodo_img( 'patterns/cta-right.svg' ) ); ?>"
		alt=""
		width="725"
		height="394"
		class="pointer-events-none absolute bottom-0 end-0 hidden w-[45%] max-w-[725px] opacity-60 lg:block"
		aria-hidden="true"
	/>
	<div class="container-estatein relative z-10 flex flex-col items-start gap-8 py-16 md:flex-row md:items-center md:justify-between md:gap-16 md:py-[100px]">
		<div class="max-w-3xl">
			<h2 class="text-3xl font-semibold md:text-4xl lg:text-[48px] lg:leading-[1.5]">
				Start Your Real Estate Journey Today
			</h2>
			<p class="mt-3.5 text-base font-medium text-grey-60 md:text-lg">
				Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way.
			</p>
		</div>
		<a class="btn-primary shrink-0" href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ) ); ?>">
			Explore Properties
		</a>
	</div>
</section>
