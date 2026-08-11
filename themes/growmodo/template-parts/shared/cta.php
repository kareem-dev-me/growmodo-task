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
	<div class="container-estatein relative z-10 flex flex-col items-start gap-8 py-16 md:flex-row md:items-center md:justify-between md:gap-16 xl:gap-[250px] xl:py-[100px]">
		<div class="flex max-w-3xl flex-1 flex-col gap-3.5">
			<h2 class="heading-section">
				Start Your Real Estate Journey Today
			</h2>
			<p class="text-body">
				Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.
			</p>
		</div>
		<a class="btn-primary shrink-0" href="<?php echo esc_url( get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' ) ); ?>">
			Explore Properties
		</a>
	</div>
</section>
