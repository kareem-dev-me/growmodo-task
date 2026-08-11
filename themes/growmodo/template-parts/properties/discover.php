<?php
/**
 * Properties archive — Discover carousel (same behavior as home featured).
 *
 * @package Growmodo
 */

global $wp_query;

$total_slides = max( 1, (int) $wp_query->post_count );
?>
<section id="discover" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title' => 'Discover a World of Possibilities',
			'body'  => 'Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.',
		)
	);
	?>

	<?php if ( have_posts() ) : ?>
		<div id="discover-properties" class="relative" data-featured-carousel>
			<div class="overflow-hidden">
				<div
					class="flex gap-5 transition-transform duration-500 ease-out will-change-transform md:gap-[30px]"
					data-featured-track
				>
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<div
							class="w-full min-w-0 shrink-0 basis-full md:basis-[calc((100%-1.875rem)/2)] xl:basis-[calc((100%-3.75rem)/3)]"
							data-featured-slide
						>
							<?php get_template_part( 'template-parts/property/card' ); ?>
						</div>
						<?php
					endwhile;
					?>
				</div>
			</div>

			<div class="mt-8 flex items-center justify-between border-t border-grey-15 pt-5 xl:mt-[50px]">
				<p class="text-lg font-medium leading-[1.5] text-grey-60 md:text-xl" aria-live="polite">
					<span class="text-absolute-white" data-featured-current>01</span>
					of
					<span data-featured-total><?php echo esc_html( str_pad( (string) $total_slides, 2, '0', STR_PAD_LEFT ) ); ?></span>
				</p>
				<div class="flex gap-2.5">
					<button
						type="button"
						class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-transparent transition hover:bg-grey-10"
						data-featured-prev
						aria-label="Previous properties"
					>
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</button>
					<button
						type="button"
						class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-grey-10 transition hover:bg-grey-08"
						data-featured-next
						aria-label="Next properties"
					>
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</button>
				</div>
			</div>
		</div>
	<?php else : ?>
		<p class="text-body">No properties match your search. Try adjusting filters or check back soon.</p>
	<?php endif; ?>
</section>
