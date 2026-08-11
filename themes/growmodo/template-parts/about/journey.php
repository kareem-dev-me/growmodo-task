<?php
/**
 * About — Our Journey.
 *
 * @package Growmodo
 */
?>
<section id="story" class="container-estatein section-y">
	<div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-[60px] xl:gap-[80px]">
		<div class="order-2 flex flex-col gap-10 lg:order-1 xl:gap-[50px]">
			<div>
				<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3.5 h-[30px] w-[68px]" />
				<h1 class="heading-section">Our Journey</h1>
				<p class="text-body mt-3.5 max-w-[755px]">
					Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary. Over the years, we've expanded our reach, forged valuable partnerships, and gained the trust of countless clients.
				</p>
			</div>

			<div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
				<div class="card-elevated rounded-xl px-5 py-4 text-center sm:text-start xl:px-6">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">200+</p>
					<p class="text-body">Happy Customers</p>
				</div>
				<div class="card-elevated rounded-xl px-5 py-4 text-center sm:text-start xl:px-6">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">10k+</p>
					<p class="text-body">Properties For Clients</p>
				</div>
				<div class="card-elevated rounded-xl px-5 py-4 text-center sm:col-span-1 sm:text-start xl:px-6">
					<p class="text-[28px] font-bold leading-[1.5] md:text-[40px]">16+</p>
					<p class="text-body">Years of Experience</p>
				</div>
			</div>
		</div>

		<div class="order-1 overflow-hidden rounded-xl border border-grey-15 lg:order-2">
			<img
				src="<?php echo esc_url( growmodo_img( 'about/journey.png' ) ); ?>"
				alt="Hand holding a miniature model of a modern home"
				width="755"
				height="546"
				class="aspect-[755/546] h-full w-full object-cover"
				fetchpriority="high"
			/>
		</div>
	</div>
</section>
