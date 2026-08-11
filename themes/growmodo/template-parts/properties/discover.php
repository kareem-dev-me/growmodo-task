<?php
/**
 * Properties archive — Discover grid + Figma pagination.
 *
 * @package Growmodo
 */

global $wp_query;

$current = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$total   = max( 1, (int) $wp_query->max_num_pages );
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
		<div class="grid gap-[30px] md:grid-cols-2 xl:grid-cols-3">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/property/card' );
			endwhile;
			?>
		</div>

		<div class="mt-[40px] flex items-center justify-between border-t border-grey-15 pt-5 md:mt-[50px]">
			<p class="text-xl font-medium text-grey-60">
				<span class="text-absolute-white"><?php echo esc_html( str_pad( (string) $current, 2, '0', STR_PAD_LEFT ) ); ?></span>
				of <?php echo esc_html( str_pad( (string) $total, 2, '0', STR_PAD_LEFT ) ); ?>
			</p>
			<div class="flex gap-2.5">
				<?php if ( $current > 1 ) : ?>
					<a
						href="<?php echo esc_url( get_pagenum_link( $current - 1 ) ); ?>"
						class="inline-flex items-center justify-center rounded-full border border-grey-15 p-3.5 transition hover:bg-grey-10"
						aria-label="Previous page"
					>
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</a>
				<?php else : ?>
					<span class="inline-flex cursor-not-allowed items-center justify-center rounded-full border border-grey-15 p-3.5 opacity-40" aria-disabled="true">
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-left.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</span>
				<?php endif; ?>

				<?php if ( $current < $total ) : ?>
					<a
						href="<?php echo esc_url( get_pagenum_link( $current + 1 ) ); ?>"
						class="inline-flex items-center justify-center rounded-full border border-grey-15 bg-grey-10 p-3.5 transition hover:bg-grey-08"
						aria-label="Next page"
					>
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</a>
				<?php else : ?>
					<span class="inline-flex cursor-not-allowed items-center justify-center rounded-full border border-grey-15 bg-grey-10 p-3.5 opacity-40" aria-disabled="true">
						<img src="<?php echo esc_url( growmodo_img( 'icons/chevron-right.svg' ) ); ?>" alt="" width="30" height="30" class="size-[30px]" />
					</span>
				<?php endif; ?>
			</div>
		</div>
	<?php else : ?>
		<p class="text-body">No properties match your search. Try adjusting filters or check back soon.</p>
	<?php endif; ?>
</section>
