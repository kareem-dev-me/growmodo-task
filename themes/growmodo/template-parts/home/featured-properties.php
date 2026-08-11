<?php
/**
 * Home featured properties section.
 *
 * @package Growmodo
 */

$query = new WP_Query(
	array(
		'post_type'      => 'property',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
	)
);

$properties_url = get_post_type_archive_link( 'property' ) ?: home_url( '/properties/' );
?>
<section id="properties" class="container-estatein py-16 md:py-24">
	<div class="mb-10 flex flex-col gap-6 md:mb-14 md:flex-row md:items-end md:justify-between">
		<div class="max-w-4xl">
			<img src="<?php echo esc_url( growmodo_img( 'icons/section-sparkles.svg' ) ); ?>" alt="" width="68" height="30" class="mb-3 h-[30px] w-auto" />
			<h2 class="text-3xl font-semibold md:text-4xl lg:text-5xl">Featured Properties</h2>
			<p class="mt-3 max-w-3xl text-base font-medium text-grey-60 md:text-lg">
				Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein.
			</p>
		</div>
		<a class="btn-secondary shrink-0 self-start md:self-auto" href="<?php echo esc_url( $properties_url ); ?>">View All Properties</a>
	</div>

	<?php if ( $query->have_posts() ) : ?>
		<div id="featured-properties-carousel" class="relative" data-carousel="slide" data-carousel-interval="6000">
			<div class="overflow-hidden">
				<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						get_template_part( 'template-parts/property/card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>

			<div class="mt-8 flex items-center justify-between border-t border-grey-15 pt-5">
				<p class="text-lg font-medium text-grey-60">
					<span class="text-absolute-white">01</span> of <?php echo esc_html( str_pad( (string) max( 1, (int) $query->post_count ), 2, '0', STR_PAD_LEFT ) ); ?>
				</p>
				<div class="flex gap-2.5">
					<button type="button" class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-grey-10" data-carousel-prev aria-label="Previous">
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</button>
					<button type="button" class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-grey-10" data-carousel-next aria-label="Next">
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</button>
				</div>
			</div>
		</div>
	<?php else : ?>
		<p class="text-grey-60">No properties published yet. Activate or re-save the theme to seed demo listings.</p>
	<?php endif; ?>
</section>
