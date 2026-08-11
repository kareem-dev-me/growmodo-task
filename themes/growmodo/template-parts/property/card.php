<?php
/**
 * Property card — Figma Card 75:564 (512×692).
 *
 * @package Growmodo
 */

$post_id = get_the_ID();
$meta    = growmodo_get_property_meta( $post_id );
$type    = (string) get_post_meta( $post_id, '_property_type', true );
if ( '' === $type ) {
	$type = 'Villa';
}

$excerpt = wp_trim_words( get_the_excerpt(), 18, '...' );
?>
<article <?php post_class( 'card-surface flex h-full flex-col gap-[30px] rounded-xl border border-grey-15 bg-grey-08 p-6 md:p-[30px] xl:p-10' ); ?>>
	<a href="<?php the_permalink(); ?>" class="block w-full shrink-0 overflow-hidden rounded-[10px] no-underline">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php
			the_post_thumbnail(
				'large',
				array(
					'class'   => 'aspect-[432/318] h-auto w-full object-cover md:aspect-auto md:h-[318px]',
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
				class="aspect-[432/318] h-auto w-full object-cover md:aspect-auto md:h-[318px]"
				loading="lazy"
			/>
		<?php endif; ?>
	</a>

	<div class="flex min-h-0 flex-1 flex-col gap-[30px]">
		<div class="flex flex-col gap-1.5">
			<h3 class="text-xl font-semibold leading-[1.5] text-absolute-white xl:text-2xl">
				<a href="<?php the_permalink(); ?>" class="text-absolute-white no-underline transition hover:text-purple-75">
					<?php the_title(); ?>
				</a>
			</h3>
			<p class="text-base font-medium leading-[1.5] text-grey-60 md:text-lg">
				<?php echo esc_html( $excerpt ); ?>
				<a href="<?php the_permalink(); ?>" class="font-medium text-purple-75 underline decoration-solid underline-offset-2 transition hover:text-purple-60">Read More</a>
			</p>
		</div>

		<div class="flex flex-wrap gap-2.5">
			<span class="property-badge">
				<img src="<?php echo esc_url( growmodo_img( 'icons/bed.svg' ) ); ?>" alt="" width="24" height="24" class="size-6 shrink-0" />
				<span class="whitespace-nowrap"><?php echo esc_html( $meta['bedrooms'] ?: '—' ); ?></span>
			</span>
			<span class="property-badge">
				<img src="<?php echo esc_url( growmodo_img( 'icons/bath.svg' ) ); ?>" alt="" width="24" height="24" class="size-6 shrink-0" />
				<span class="whitespace-nowrap"><?php echo esc_html( $meta['bathrooms'] ?: '—' ); ?></span>
			</span>
			<span class="property-badge">
				<img src="<?php echo esc_url( growmodo_img( 'icons/villa.svg' ) ); ?>" alt="" width="24" height="24" class="size-6 shrink-0" />
				<span class="whitespace-nowrap"><?php echo esc_html( $type ); ?></span>
			</span>
		</div>

		<div class="mt-auto flex flex-col gap-5 sm:flex-row sm:items-center sm:gap-[50px]">
			<div class="min-w-[103px] shrink-0">
				<p class="text-base font-medium leading-[1.5] text-grey-60 md:text-lg">Price</p>
				<p class="text-xl font-semibold leading-[1.5] text-absolute-white xl:text-2xl"><?php echo esc_html( $meta['price'] ?: '—' ); ?></p>
			</div>
			<a class="btn-primary w-full flex-1 justify-center whitespace-nowrap sm:min-h-[63px]" href="<?php the_permalink(); ?>">
				View Property Details
			</a>
		</div>
	</div>
</article>
