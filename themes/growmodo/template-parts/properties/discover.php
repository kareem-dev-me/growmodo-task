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
		<p class="text-body">No properties match your search. Try adjusting filters or check back soon.</p>
	<?php endif; ?>
</section>
