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

			<?php
			get_template_part(
				'template-parts/shared/carousel',
				'controls',
				array(
					'total'      => $total_slides,
					'prev_label' => 'Previous properties',
					'next_label' => 'Next properties',
				)
			);
			?>
		</div>
	<?php else : ?>
		<p class="text-body">No properties published yet. Activate or re-save the theme to seed demo listings.</p>
	<?php endif; ?>
</section>
