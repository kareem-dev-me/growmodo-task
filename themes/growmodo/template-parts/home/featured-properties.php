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
$counts         = wp_count_posts( 'property' );
$total          = isset( $counts->publish ) ? max( 1, (int) $counts->publish ) : max( 1, (int) $query->post_count );
/* Figma featured chrome shows a large catalog total (e.g. 60). */
$total_label = max( 60, $total );
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
		<div class="relative">
			<div class="grid gap-[20px] md:grid-cols-2 md:gap-[30px] xl:grid-cols-3">
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/property/card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>

			<div class="mt-8 flex items-center justify-between border-t border-grey-15 pt-5 xl:mt-[50px]">
				<p class="text-lg font-medium leading-[1.5] text-grey-60 md:text-xl">
					<span class="text-absolute-white">01</span> of <?php echo esc_html( str_pad( (string) $total_label, 2, '0', STR_PAD_LEFT ) ); ?>
				</p>
				<div class="flex gap-2.5">
					<span class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-transparent" aria-hidden="true">
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</span>
					<span class="inline-flex size-[58px] items-center justify-center rounded-full border border-grey-15 bg-grey-10" aria-hidden="true">
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</span>
				</div>
			</div>
		</div>
	<?php else : ?>
		<p class="text-body">No properties published yet. Activate or re-save the theme to seed demo listings.</p>
	<?php endif; ?>
</section>
