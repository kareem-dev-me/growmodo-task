<?php
/**
 * Property card.
 *
 * @package Growmodo
 */

$post_id = get_the_ID();
$meta    = growmodo_get_property_meta( $post_id );
?>
<article <?php post_class( 'card-surface flex h-full flex-col overflow-hidden p-6 md:p-10' ); ?>>
	<a href="<?php the_permalink(); ?>" class="mb-6 block overflow-hidden rounded-[10px] no-underline">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'large',
				array(
					'class'   => 'aspect-[432/318] h-auto w-full object-cover',
					'loading' => 'lazy',
					'alt'     => the_title_attribute( array( 'echo' => false ) ),
				)
			);
			?>
		<?php else : ?>
			<img
				src="<?php echo esc_url( growmodo_img( 'properties/prop-1.png' ) ); ?>"
				alt="<?php echo esc_attr( get_the_title() ); ?>"
				width="432"
				height="318"
				class="aspect-[432/318] h-auto w-full object-cover"
				loading="lazy"
			/>
		<?php endif; ?>
	</a>

	<div class="flex flex-1 flex-col gap-6">
		<div>
			<h3 class="text-xl font-semibold md:text-2xl">
				<a href="<?php the_permalink(); ?>" class="text-absolute-white no-underline hover:text-purple-75">
					<?php the_title(); ?>
				</a>
			</h3>
			<p class="mt-1 text-sm font-medium text-grey-60 md:text-base">
				<?php echo esc_html( get_the_excerpt() ); ?>
				<a href="<?php the_permalink(); ?>" class="text-absolute-white underline">Read More</a>
			</p>
		</div>

		<div class="flex flex-wrap gap-2.5">
			<span class="inline-flex items-center gap-1 rounded-[28px] border border-grey-15 bg-grey-08 px-3.5 py-2 text-sm font-medium">
				<img src="<?php echo esc_url( growmodo_img( 'icons/bed.svg' ) ); ?>" alt="" width="20" height="20" class="size-5" />
				<?php echo esc_html( $meta['bedrooms'] ?: '—' ); ?>
			</span>
			<span class="inline-flex items-center gap-1 rounded-[28px] border border-grey-15 bg-grey-08 px-3.5 py-2 text-sm font-medium">
				<img src="<?php echo esc_url( growmodo_img( 'icons/bath.svg' ) ); ?>" alt="" width="20" height="20" class="size-5" />
				<?php echo esc_html( $meta['bathrooms'] ?: '—' ); ?>
			</span>
			<span class="inline-flex items-center gap-1 rounded-[28px] border border-grey-15 bg-grey-08 px-3.5 py-2 text-sm font-medium">
				<img src="<?php echo esc_url( growmodo_img( 'icons/area.svg' ) ); ?>" alt="" width="20" height="20" class="size-5" />
				<?php echo esc_html( $meta['area'] ?: '—' ); ?>
			</span>
		</div>

		<div class="mt-auto flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
			<div>
				<p class="text-sm font-medium text-grey-60">Price</p>
				<p class="text-lg font-semibold md:text-2xl"><?php echo esc_html( $meta['price'] ?: '—' ); ?></p>
			</div>
			<a class="btn-primary w-full px-5 py-3.5 text-sm sm:w-auto md:text-lg" href="<?php the_permalink(); ?>">View Property Details</a>
		</div>
	</div>
</article>
