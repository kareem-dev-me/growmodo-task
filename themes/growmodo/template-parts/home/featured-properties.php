<?php
/**
 * Home featured properties section (carousel).
 *
 * @package Growmodo
 */

$query = new WP_Query(
	array(
		'post_type'      => 'property',
		'posts_per_page' => 12,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$properties_url = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );
$total_slides   = max( 1, (int) $query->post_count );
?>
<section id="properties" class="container-estatein section-y">
	<?php
	get_template_part(
		'template-parts/shared/section',
		'heading',
		array(
			'title'        => 'Featured Properties',
			'body'         => 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.',
			'button_label' => 'View All Properties',
			'button_url'   => $properties_url,
		)
	);
	?>

	<?php if ( $query->have_posts() ) : ?>
		<div id="featured-properties" class="relative" data-featured-carousel>
			<div class="overflow-hidden">
				<div
					class="flex gap-5 transition-transform duration-500 ease-out will-change-transform md:gap-[30px]"
					data-featured-track
				>
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div
							class="w-full min-w-0 shrink-0 basis-full md:basis-[calc((100%-1.875rem)/2)] xl:basis-[calc((100%-3.75rem)/3)]"
							data-featured-slide
						>
							<?php get_template_part( 'template-parts/property/card' ); ?>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
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
		<p class="text-body">No properties published yet. Activate or re-save the theme to seed demo listings.</p>
	<?php endif; ?>
</section>
